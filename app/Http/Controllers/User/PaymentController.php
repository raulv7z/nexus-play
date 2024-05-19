<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CartState;
use App\Models\Invoice;
use App\Services\CartService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function checkout(Request $request)
    {
        // Obtener el usuario actual
        $user = $request->user();

        // Obtener el carrito del usuario
        $cart = $this->cartService->getOrCreatePendingCart($user);

        // Verificar si el carrito está vacío
        if (!$cart || $cart->entries->isEmpty()) {
            return redirect()->route('content.carts.show')->with('error', 'The shopping cart is empty.');
        }

        // !update
        // todo no se debería crear aquí la factura, si no mostrar una vista de checkout con campos
        // todo y al darle al botón de confirmar compra se crea la factura y demás

        // Crear la factura asociada al carrito
        //* funciona
        $invoice = Invoice::create([
            'user_id' => $user->id,
            'invoice_number' => 'INV-' . uniqid(), // Generar un número de factura único
            'issued_at' => now(),
            'total_amount' => $cart->full_amount,
            'currency' => 'EUR',
        ]);

        // Actualizar el estado del carrito
        // Obtener el ID del estado "Completed" de la tabla cart_states
        $paidStateId = CartState::where('state', 'Completed')->value('id');

        // Actualizar el estado del carrito a "pagado" o al estado "Completed"
        $cart->update(['cart_state_id' => $paidStateId]);

        // Enviar correo electrónico con la factura
        // Mail::to($user->email)->send(new InvoiceEmail($invoice));

        // Redirigir o mostrar mensaje de éxito
    }
}

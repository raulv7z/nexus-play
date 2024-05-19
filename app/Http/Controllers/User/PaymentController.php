<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CartState;
use App\Models\Invoice;
use App\Services\CartService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoiceRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceEmail;

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
        $title = "Checkout";
        $user = $request->user();
        $cart = $this->cartService->getOrCreatePendingCart($user);

        // Verificar si el carrito está vacío
        if (!$cart || $cart->entries->isEmpty()) {
            return redirect()->route('content.carts.show')->with('error', 'The shopping cart is empty.');
        }

        // Redirigir a la vista de checkout
        return view('content.payments.checkout', compact('title', 'cart', 'user'));
    }

    public function confirm(Request $request)
    {        
        $user = $request->user();
        $cart = $this->cartService->getOrCreatePendingCart($user);

        // Verificar si el carrito está vacío
        if (!$cart || $cart->entries->isEmpty()) {
            return redirect()->route('content.carts.show')->with('error', 'The shopping cart is empty.');
        }

        $paidStateId = CartState::where('state', 'Completed')->value('id');
        $cart->update(['cart_state_id' => $paidStateId]);

        $invoice = Invoice::create([
            'user_id' => $user->id,
            'invoice_number' => 'INV-' . uniqid(), // Generar un número de factura único
            'issued_at' => now(),
            'total_amount' => $cart->full_amount,
            'currency' => 'EUR',
        ]);

        // Enviar correo electrónico con la factura
        Mail::to($user->email)->send(new InvoiceEmail($invoice));

        // Redirigir o mostrar mensaje de éxito
        return redirect()->route('content.payments.paid')->with('success', 'The order was completed successfully. Check your email.');
    }

    public function paid() {
        $title = 'Order Completed';
        return view('content.payments.paid', compact('title'));
    }
}

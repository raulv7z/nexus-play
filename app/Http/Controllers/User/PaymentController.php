<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentValidationRequest;
use App\Models\CartState;
use App\Models\Invoice;
use App\Services\CartService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoiceRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceEmail;
use Illuminate\Support\Facades\Validator;

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
        $user = $request->user();
        $cart = $this->cartService->getOrCreatePendingCart($user);

        // Verificar si el carrito está vacío
        if (!$cart || $cart->entries->isEmpty()) {
            return redirect()->route('auth.carts.show')->with('error', 'The shopping cart is empty.');
        }

        // Redirigir a la vista de checkout
        return view('content.auth.payments.checkout', compact('cart', 'user'));
    }

    public function confirm(PaymentValidationRequest $request)
    {
        // Validate payment form data
        $validated = $request->validated();

        // Redirect back if gets an error
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors())->withInput();
        }

        // Validate credit card number with luhn algorythm
        if (!self::isRealCardNumber($request->card_number)) {
            return redirect()->back()->withErrors(['card_number' => 'El número de tarjeta de crédito no es válido'])->withInput();
        }

        // Success code from then on here
        $user = $request->user();
        $cart = $this->cartService->getOrCreatePendingCart($user);

        $paidStateId = CartState::where('state', 'Completed')->value('id');
        $cart->update(['cart_state_id' => $paidStateId]);
        $cart->delete();
        $invoice = Invoice::where('cart_id', $cart->id)->first();

        try {
            Mail::to($user->email)->send(new InvoiceEmail($invoice, $user));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send email. Please contact support.');
        }

        return redirect()->route('auth.payments.paid')->with('success', 'The order was completed successfully. Check your email.');
    }

    public function paid(Request $request)
    {
        $title = 'Order Completed';
        return view('content.auth.payments.paid', compact('title'));
    }

    private static function isRealCardNumber($cardNumber)
    {
        $cardNumber = preg_replace('/\D/', '', $cardNumber); // Eliminar cualquier carácter no numérico

        // Convertir el número de tarjeta en un array de dígitos y revertirlo
        $digits = str_split(strrev($cardNumber));

        $sum = 0;
        $alt = false;

        foreach ($digits as $digit) {
            $digit = intval($digit);

            if ($alt) {
                $digit *= 2;

                if ($digit > 9) {
                    $digit -= 9;
                }
            }

            $sum += $digit;
            $alt = !$alt;
        }

        // La suma debe ser un múltiplo de 10 para que el número sea válido
        return $sum % 10 === 0;
    }
}

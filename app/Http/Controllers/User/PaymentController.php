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
        $user = $request->user();
        $cart = $this->cartService->getOrCreatePendingCart($user);

        // Verificar si el carrito está vacío
        if (!$cart || $cart->entries->isEmpty()) {
            return redirect()->route('content.carts.show')->with('error', 'The shopping cart is empty.');
        }
        
        // Redirigir a la vista de checkout
        return view('content.payments.checkout', compact('cart', 'user'));
    }

    public function confirm(Request $request)
    {        
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

        return redirect()->route('content.payments.paid')->with('success', 'The order was completed successfully. Check your email.');
    }

    public function paid(Request $request) {
        $title = 'Order Completed';
        return view('content.payments.paid', compact('title'));
    }
}
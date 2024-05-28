<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Edition;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function show(Request $request)
    {
        $user = $request->user();

        // Get 'pending' cart or create a new one
        $cart = $this->cartService->getOrCreatePendingCart($user);

        return view('content.carts.show', compact('cart'));
    }

    public function addToCart(Request $request, $editionId)
    {
        $user = $request->user();
        $quantity = $request->input('quantity', 1);

        // Encuentra la edición del videojuego
        $edition = Edition::findOrFail($editionId);

        // Añade la entrada al carrito
        $this->cartService->addToCart($user, $edition, $quantity);

        return back()->with('success', 'The item has been added to the cart successfully.');
    }

    public function removeFromCart(Request $request, $editionId)
    {
        $user = $request->user();
        $edition = Edition::findOrFail($editionId);
        $this->cartService->removeFromCart($user, $edition);

        return redirect()->route('content.carts.show')->with('success', 'The item has been deleted from the cart successfully.');
    }

    public function increaseQuantity(Request $request, $editionId)
    {
        $user = $request->user();

        $edition = Edition::findOrFail($editionId);
        $this->cartService->increaseQuantity($user, $edition);

        return back();
    }

    public function decreaseQuantity(Request $request, $editionId)
    {
        $user = $request->user();

        $edition = Edition::findOrFail($editionId);
        $this->cartService->decreaseQuantity($user, $edition);

        return back();
    }

    public function proceedToCheckout(Request $request)
    {
        return view('content.payments.checkout');
    }
}

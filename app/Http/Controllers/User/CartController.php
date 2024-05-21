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
        $title = 'Show Cart';
        $user = $request->user();

        // Get 'pending' cart or create a new one
        $cart = $this->cartService->getOrCreatePendingCart($user);

        return view('content.carts.show', compact('title', 'cart'));
    }

    public function addToCart(Request $request, $editionId)
    {
        $user = $request->user();
        $quantity = $request->input('quantity', 1);

        // Encuentra la edición del videojuego
        $edition = Edition::findOrFail($editionId);

        // Añade la entrada al carrito
        $this->cartService->addToCart($user, $edition, $quantity);

        return back()->with('success', 'Producto añadido al carrito correctamente.');
    }

    public function removeFromCart(Request $request, $editionId)
    {
        $user = $request->user();
        $edition = Edition::findOrFail($editionId);
        $this->cartService->removeFromCart($user, $edition);

        return redirect()->route('content.carts.show')->with('success', 'Producto añadido al carrito correctamente.');
    }

    public function increaseQuantity(Request $request, $editionId)
    {
        $user = $request->user();

        $edition = Edition::findOrFail($editionId);
        $this->cartService->increaseQuantity($user, $edition);

        return redirect()->route('content.carts.show')->with('success', 'Cantidad aumentada correctamente.');
    }

    public function decreaseQuantity(Request $request, $editionId)
    {
        $user = $request->user();

        $edition = Edition::findOrFail($editionId);
        $this->cartService->decreaseQuantity($user, $edition);

        return redirect()->route('content.carts.show')->with('success', 'Cantidad decrease correctamente.');
    }

    public function proceedToCheckout(Request $request)
    {
        $user = $request->user();
        $cart = $this->cartService->getOrCreatePendingCart($user);

        if (!$cart || $cart->entries->isEmpty()) {
            return redirect()->route('content.carts.show')->with('error', 'El carrito está vacío.');
        }

        return view('content.payments.checkout');
    }
}

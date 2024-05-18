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

        // añade productos de prueba
        // $this->addToCart($request, 5);
        // $this->addToCart($request, 10);
        // $this->addToCart($request, 15);
        // $this->addToCart($request, 20);
        // $this->addToCart($request, 25);
        // $this->addToCart($request, 30);

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

        return redirect()->route('content.carts.show')->with('success', 'Producto añadido al carrito correctamente.');
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
}

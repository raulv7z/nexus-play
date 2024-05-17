<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Edition;
use App\Services\CartService;
use Illuminate\Http\Request;

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

        // Obtén el carrito 'pending' o crea uno nuevo si no existe
        $cart = $this->cartService->getOrCreatePendingCart($user);

        // prueba de añadir edicion
        $this->addToCart($request, 24);

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

        return redirect()->route('content.carts.show');
    }
}
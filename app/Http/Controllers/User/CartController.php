<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\CartState;
use App\Models\Edition;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show(Request $request)
    {
        $title = 'Show Cart';
        $user = $request->user();

        // Obtén el carrito 'pending' o crea uno nuevo si no existe
        $cart = $this->getOrCreatePendingCart($user);

        return view('content.carts.show', compact('title', 'cart'));
    }

    public function addToCart(Request $request, $editionId)
    {
        $user = $request->user();
        $quantity = $request->input('quantity', 1);

        // Obtén el carrito 'pending' o crea uno nuevo si no existe
        $cart = $this->getOrCreatePendingCart($user);

        // Encuentra la edición del videojuego
        $edition = Edition::findOrFail($editionId);

        // Añade la entrada al carrito
        $entry = $cart->entries()->where('edition_id', $edition->id)->first();
        if ($entry) {
            $entry->quantity += $quantity;
            $entry->save();
        } else {
            $cart->entries()->create([
                'edition_id' => $edition->id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->route('content.carts.show');
    }

    private function getOrCreatePendingCart($user)
    {
        // Verifica si el usuario tiene un carrito 'pending'
        $cart = $user->pendingCart;

        if (!$cart) {
            // Obtén el estado 'pending'
            $pendingState = CartState::where('state', 'pending')->first();

            // Crea un nuevo carrito en estado 'pending'
            $cart = $user->carts()->create([
                'cart_state_id' => $pendingState->id,
                'iva' => 21.0,
                'base_amount' => 0.00,
                'full_amount' => 0.00,
                'purchased_at' => null,
            ]);
        }

        return $cart;
    }
}

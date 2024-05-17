<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\CartState;
use App\Models\User;

class CartRepository
{
    public function getPendingCart(User $user)
    {
        return $user->pendingCart;
    }

    public function createPendingCart(User $user)
    {
        $pendingState = CartState::where('state', 'pending')->first();

        return $user->carts()->create([
            'cart_state_id' => $pendingState->id,
            'iva' => 21.0,
            'base_amount' => 0.00,
            'full_amount' => 0.00,
            'purchased_at' => null,
        ]);
    }
}

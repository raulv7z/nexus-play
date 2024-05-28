<?php
// app/Repositories/CartRepository.php

namespace App\Repositories;

use App\Exceptions\MaxAmountReachedException;
use App\Models\Cart;
use App\Models\CartState;
use App\Models\Edition;
use App\Models\User;
use Exception;

class CartRepository
{
    public function getPendingCart(User $user)
    {
        return $user->carts()->whereHas('cartState', function ($query) {
            $query->where('state', 'pending');
        })->first();
    }

    public function createPendingCart(User $user)
    {
        $pendingState = CartState::where('state', 'pending')->first();

        return $user->carts()->create([
            'cart_state_id' => $pendingState->id,
            'base_amount' => 0,
            'full_amount' => 0,
        ]);
    }

    public function getOrCreatePendingCart(User $user) {
        return $this->getPendingCart($user) ?? $this->createPendingCart($user);
    }

    public function addToCart(User $user, Edition $edition, $quantity)
    {
        $cart = $this->getOrCreatePendingCart($user);

        if (!$cart) {
            throw new Exception('At least a pending cart should have been created at this point');
        }

        $this->handleAmountLimiter($cart, $edition);

        $entry = $cart->entries()->where('edition_id', $edition->id)->first();
        if ($entry) {
            // Si la entrada ya existe en el carrito, aumentamos la cantidad utilizando el método increaseQuantity
            $this->increaseQuantity($user, $edition);
        } else {
            // Si la entrada no existe, la creamos con la cantidad proporcionada
            $cart->entries()->create([
                'edition_id' => $edition->id,
                'quantity' => $quantity,
            ]);
        }

        return $cart;
    }

    public function increaseQuantity(User $user, Edition $edition)
    {
        $cart = $this->getPendingCart($user);
        $this->handleAmountLimiter($cart, $edition);

        if ($cart) {
            $entry = $cart->entries()->where('edition_id', $edition->id)->first();
            if ($entry) {
                $entry->quantity++;
                $entry->save();
            }
        }

        return $cart;
    }

    public function decreaseQuantity(User $user, Edition $edition)
    {
        $cart = $this->getPendingCart($user);

        if ($cart) {
            $entry = $cart->entries()->where('edition_id', $edition->id)->first();
            if ($entry) {
                if ($entry->quantity > 1) {
                    $entry->quantity--;
                    $entry->save();
                } else {
                    $entry->delete();
                }
            }
        }

        return $cart;
    }

    public function removeFromCart(User $user, Edition $edition)
    {
        $cart = $this->getPendingCart($user);

        if ($cart) {
            $cart->entries()->where('edition_id', $edition->id)->delete();
        }

        return $cart;
    }

    protected function handleAmountLimiter(Cart $cart, Edition $edition) {
        $potentialNewTotal = $this->calculateFullAmount($cart) + $edition->amount;

        if ($potentialNewTotal > 500) {
            throw new MaxAmountReachedException('You have reached the maximum amount of the shopping cart. (500 EUR)');
        }
    }

    protected function calculateFullAmount(Cart $cart)
    {
        $total = 0;

        foreach ($cart->entries as $entry) {
            $total += $entry->edition->amount * $entry->quantity;
        }

        return $total;
    }
}

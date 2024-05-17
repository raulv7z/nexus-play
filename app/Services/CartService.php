<?php

namespace App\Services;

use App\Models\Edition;
use App\Models\User;
use App\Repositories\CartRepository;

class CartService
{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function getOrCreatePendingCart(User $user)
    {
        $cart = $this->cartRepository->getPendingCart($user);

        if (!$cart) {
            $cart = $this->cartRepository->createPendingCart($user);
        }

        return $cart;
    }

    public function addToCart(User $user, Edition $edition, $quantity)
    {
        $cart = $this->getOrCreatePendingCart($user);

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

        return $cart;
    }
}
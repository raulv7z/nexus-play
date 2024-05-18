<?php

// app/Services/CartService.php

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
        return $this->cartRepository->getPendingCart($user) ?? $this->cartRepository->createPendingCart($user);
    }

    public function addToCart(User $user, Edition $edition, $quantity)
    {
        return $this->cartRepository->addToCart($user, $edition, $quantity);
    }

    public function decreaseQuantity(User $user, Edition $edition)
    {
        return $this->cartRepository->decreaseQuantity($user, $edition);
    }

    public function removeFromCart(User $user, Edition $edition)
    {
        return $this->cartRepository->removeFromCart($user, $edition);
    }
}
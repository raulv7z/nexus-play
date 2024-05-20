<?php

namespace App\Observers;

use App\Models\Cart;

class CartObserver
{
    /**
     * Handle the Cart "retrieved" event.
     *
     * @param  \App\Models\Cart  $cart
     * @return void
     */
    public function retrieved(Cart $cart)
    {
        $this->updateCartAmounts($cart);
    }

    /**
     * Update the base_amount and full_amount for the given cart.
     *
     * @param  \App\Models\Cart  $cart
     * @return void
     */
    protected function updateCartAmounts(Cart $cart)
    {
        $baseAmount = 0;
        $fullAmount = 0;

        foreach ($cart->entries as $entry) {
            $baseAmount += $entry->edition->amount * $entry->quantity;
            $fullAmount += $entry->edition->amount * $entry->quantity * (1 + ($cart->iva / 100));
        }

        $cart->base_amount = $baseAmount;
        $cart->full_amount = $fullAmount;

        // Guarda los cambios en la base de datos
        $cart->save();
    }
}

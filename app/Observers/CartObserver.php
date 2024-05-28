<?php

namespace App\Observers;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

    public function deleted(Cart $cart)
    {
        // update amounts for ensure the prices are setted properly for the invoice
        $this->updateCartAmounts($cart);

        // create their invoices
        $user = User::find($cart->user_id);
        $this->createInvoiceAndEntries($cart, $user);
    }

    protected function createInvoiceAndEntries(Cart $cart, User $user)
    {
        $invoice = Invoice::create([
            'user_id' => $user->id,
            'cart_id' => $cart->id,
            'invoice_number' => 'INV-' . uniqid(), // unique invoice number
            'issued_at' => now(),
            'base_amount' => $cart->base_amount,
            'full_amount' => $cart->full_amount,
            'currency' => 'EUR',
        ]);

        foreach ($cart->entries as $entry) {
            $invoice->entries()->create([
                'invoice_id' => $invoice->id,
                'edition_id' => $entry->edition->id,
                'videogame_name' => $entry->edition->videogame->name,
                'platform_name' => $entry->edition->platform->name,
                'quantity' => $entry->quantity,
                'unit_amount' => $entry->edition->amount,
            ]);
        }
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
            $fullAmount += $entry->edition->amount * $entry->quantity;
        }

        $cart->base_amount = round($baseAmount, 2);
        $cart->full_amount = round($fullAmount, 2);
        $cart->save();
    }
}

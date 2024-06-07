<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;
use App\Models\CartEntry;

class CartSeeder extends Seeder
{
    public function run()
    {
        $carts = Cart::factory(50)->create();

        $carts->each(function ($cart) {

            $entries = CartEntry::factory(2)->create([
                'cart_id' => $cart->id
            ]);

            $cart->delete();
        });
    }
}

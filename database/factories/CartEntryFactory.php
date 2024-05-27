<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\CartEntry;
use App\Models\Edition;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartEntryFactory extends Factory
{
    protected $model = CartEntry::class;

    public function definition()
    {
        return [
            'cart_id' => Cart::factory(),
            'edition_id' => Edition::all()->random()->id,
            'quantity' => $this->faker->numberBetween(1, 5),
        ];
    }
}

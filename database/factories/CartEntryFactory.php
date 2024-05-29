<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\CartEntry;
use App\Models\CartState;
use App\Models\Edition;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartEntryFactory extends Factory
{
    protected $model = CartEntry::class;

    public function definition()
    {
        
        // Obtener el id del estado "Completed"
        $completedStateId = CartState::where('state', 'Completed')->first()->id;

        return [
            // 'cart_id' => Cart::where('cart_state_id', $completedStateId)->random()->id,
            'cart_id' => null,
            'edition_id' => Edition::all()->random()->id,
            'quantity' => $this->faker->numberBetween(1, 3),
        ];
    }
}

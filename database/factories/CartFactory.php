<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\CartState;
use App\Models\Review;
use App\Models\User;
use App\Models\Edition;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Obtener el id del estado "Completed"
        $completedStateId = CartState::where('state', 'Completed')->first()->id;

        return [
            'user_id' => User::all()->random()->id,
            'cart_state_id' => $completedStateId,
            'iva' => 21.0,
            'base_amount' => 0.00,
            'full_amount' => 0.00,
            'deleted_at' => Carbon::now(), // check as soft deleted
        ];
    }
}

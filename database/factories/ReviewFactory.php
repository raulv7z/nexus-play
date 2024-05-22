<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use App\Models\Edition;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'edition_id' => Edition::all()->random()->id,
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->text(120),
            'verified' => $this->faker->boolean(),
        ];
    }
}
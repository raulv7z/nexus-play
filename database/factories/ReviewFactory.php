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
        $user = User::all()->random();
        $edition = Edition::all()->random();
        $verified = $user->hasBoughtEdition($edition->id) ? 1 : 0;

        return [
            'user_id' => $user->id,
            'edition_id' => $edition->id,
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->text(255),
            'verified' => $verified,
        ];
    }
}
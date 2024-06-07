<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\TicketState;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        return [
            'ticket_state_id' => TicketState::inRandomOrder()->first()->id,
            'ticket_code' => Str::upper(Str::random(10)),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'message' => $this->faker->paragraph,
            'issued_at' => now(),
        ];
    }
}

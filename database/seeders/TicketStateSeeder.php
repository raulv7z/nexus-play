<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TicketState;

class TicketStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $states = [
            ['state' => 'Open'],
            ['state' => 'Pending'],
            ['state' => 'Closed'],
            ['state' => 'Cancelled'],
        ];

        foreach ($states as $state) {
            TicketState::create($state);
        }
    }
}

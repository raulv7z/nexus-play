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
            [
                'en' => 'Open',
                'es' => 'Abierto',
            ],
            [
                'en' => 'Pending',
                'es' => 'Pendiente',
            ],
            [
                'en' => 'Closed',
                'es' => 'Cerrado',
            ],
            [
                'en' => 'Cancelled',
                'es' => 'Cancelado',
            ],
        ];

        foreach ($states as $state) {
            TicketState::create(['state' => $state]);
        }
    }
}

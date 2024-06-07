<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CartState;

class CartStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $states = [
            [
                'en' => 'Pending',
                'es' => 'Pendiente',
            ],
            [
                'en' => 'Processing',
                'es' => 'Procesando',
            ],
            [
                'en' => 'Completed',
                'es' => 'Completado',
            ],
            [
                'en' => 'Cancelled',
                'es' => 'Cancelado',
            ],
        ];

        foreach ($states as $state) {
            CartState::create(['state' => $state]);
        }
    }
}

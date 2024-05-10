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
            ['state' => 'Pending'],
            ['state' => 'Processing'],
            ['state' => 'Completed'],
            ['state' => 'Cancelled'],
        ];

        foreach ($states as $state) {
            CartState::create($state);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CartEntry;

class CartEntrySeeder extends Seeder
{
    public function run()
    {
        CartEntry::factory(200)->create();
    }
}

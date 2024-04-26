<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PlatformGroup;

class PlatformGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        PlatformGroup::create([
            'name' => 'Sobremesa',
        ]);
        
        PlatformGroup::create([
            'name' => 'Play Station',
        ]);

        PlatformGroup::create([
            'name' => 'X Box',
        ]);

        // PlatformGroup::create([
        //     'name' => 'Nintendo',
        // ]);
    }
}

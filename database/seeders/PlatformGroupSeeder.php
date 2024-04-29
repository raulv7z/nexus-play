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

        $platformGroups = [
            [
                'name' => 'PC',
            ],
            [
                'name' => 'Play Station',
            ],
            [
                'name' => 'X Box',
            ],
            [
                'name' => 'Nintendo',
            ],
        ];

        foreach($platformGroups as $group) {
            PlatformGroup::create($group);
        }
    }
}

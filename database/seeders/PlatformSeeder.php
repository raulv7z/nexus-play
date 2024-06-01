<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Platform;
use App\Models\PlatformGroup;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the platforms with their respective groups
        $platforms = [
            [
                'name' => 'Steam',
                'plus' => 15,
                'group' => 'PC'
            ],
            [
                'name' => 'Epic Games',
                'plus' => 10,
                'group' => 'PC'
            ],
            [
                'name' => 'Rockstar Games',
                'plus' => 20,
                'group' => 'PC'
            ],
            [
                'name' => 'Play Station 3',
                'plus' => 5,
                'group' => 'Play Station'
            ],
            [
                'name' => 'Play Station 4',
                'plus' => 7,
                'group' => 'Play Station'
            ],
            [
                'name' => 'Play Station 5',
                'plus' => 12,
                'group' => 'Play Station'
            ],
            [
                'name' => 'X Box 360',
                'plus' => 3,
                'group' => 'X Box'
            ],
            [
                'name' => 'X Box One',
                'plus' => 9,
                'group' => 'X Box'
            ],
            [
                'name' => 'X Box Series X',
                'plus' => 15,
                'group' => 'X Box'
            ],
            [
                'name' => 'Nintendo 2DS',
                'plus' => 2,
                'group' => 'Nintendo'
            ],
            [
                'name' => 'Nintendo 3DS',
                'plus' => 4,
                'group' => 'Nintendo'
            ],
            [
                'name' => 'Nintendo Switch',
                'plus' => 18,
                'group' => 'Nintendo'
            ]
        ];

        // Iterate over the platforms and create them
        foreach ($platforms as $platform) {
            $group = PlatformGroup::where('name', $platform['group'])->first();

            if ($group) {
                Platform::create([
                    'name' => $platform['name'],
                    'plus' => $platform['plus'],
                    'platform_group_id' => $group->id
                ]);
            }
        }
    }
}

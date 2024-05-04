<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // Seed the application's database.
    
    public function run(): void
    {
        $seeders = [
            UserSeeder::class,
            CartStateSeeder::class,
            PlatformGroupSeeder::class,
            PlatformSeeder::class,
            VideogameSeeder::class,
            EditionSeeder::class,
        ];

        foreach ($seeders as $seeder) {
            $this->call($seeder);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // Seed the application's database.
    
    public function run(): void
    {

        $seeders = [
            RolePermissionSeeder::class,
            UserSeeder::class,
            CartStateSeeder::class,
            PlatformGroupSeeder::class,
            PlatformSeeder::class,
            VideogameSeeder::class,
            EditionSeeder::class,
            CartEntrySeeder::class,
            CartSeeder::class,
            ReviewSeeder::class,
            TicketStateSeeder::class,
            TicketSeeder::class,
        ];

        foreach ($seeders as $seeder) {
            $this->call($seeder);
        }
    }
}

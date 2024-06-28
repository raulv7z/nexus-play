<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // manual fills
        $users = [
            [
                'name' => 'Nexus Admin',
                'email' => 'your-support-email@example.com',
                'password' => Hash::make('nexusplay'), // ! --> highly recommended to change password
                'email_verified_at' => Carbon::today(),
                'role' => 'admin',
            ],
            [
                'name' => 'Nexus User',
                'email' => 'your-user-email@example.com',
                'password' => Hash::make('nexusplay'), // ! --> highly recommended to change password
                'email_verified_at' => Carbon::today(),
                'role' => 'user',
            ],
        ];

        foreach ($users as $user) {
            $createdUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'email_verified_at' => $user['email_verified_at'],
            ]);

            // assign role
            if (isset($user['role'])) {
                $createdUser->assignRole($user['role']);
            }
        }

        // factory fills
        User::factory()->count(30)->create()->each(function ($user) {
            $user->assignRole('user'); // Regular users
        });
    }
}

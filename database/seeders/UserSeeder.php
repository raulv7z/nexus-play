<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
                'name' => 'Administrador',
                'email' => 'admin@example.com',
                'password' => Hash::make('administrador'),
                'role' => 'admin',
            ],
            [
                'name' => 'Usuario',
                'email' => 'usuario@example.com',
                'password' => Hash::make('usuario'), 
                'role' => 'user',
            ]
        ];

        foreach ($users as $user) {
            $createdUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);

            // assign role
            if (isset($user['role'])) {
                $createdUser->assignRole($user['role']);
            }
        }

        // factory fills
        User::factory()->count(20)->create()->each(function ($user) {
            $user->assignRole('user'); // Asumiendo que todos son usuarios regulares
        });
        
        
    }
}

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
        $users = [
            [
                'name' => 'Administrador',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin'),
            ],
            [
                'name' => 'Usuario',
                'email' => 'usuario@example.com',
                'password' => Hash::make('usuario'), 
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

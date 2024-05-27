<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Vaciar tablas para evitar duplicados
        Permission::query()->delete();
        Role::query()->delete();

        // Definir roles
        $roles = [
            'admin' =>
            [                
                'manage admin',

                'view platform groups',
                'create platform groups',
                'update platform groups',
                'delete platform groups',

                'view platforms',
                'create platforms',
                'update platforms',
                'delete platforms',

                'view editions',
                'create editions',
                'update editions',
                'delete editions',

                'view videogames',
                'create videogames',
                'update videogames',
                'delete videogames',
            ],
            'user' =>
            [
                'view platform groups',
            ]
        ];

        // Crear roles y asignar permisos
        foreach ($roles as $roleName => $permissions) {
            $role = Role::create(['name' => $roleName]);
            foreach ($permissions as $permissionName) {
                $permission = Permission::firstOrCreate(['name' => $permissionName]);
                $role->givePermissionTo($permission);
            }
        }
    }
}

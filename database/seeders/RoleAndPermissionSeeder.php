<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Define roles
        $roles = ['admin', 'teacher', 'student'];

        foreach ($roles as $role) {
            if (!Role::where('name', $role)->exists()) {
                Role::create(['name' => $role, 'guard_name' => 'web']);
            }
        }

        // Define permissions
        $permissions = ['manage exams', 'view results', 'take exams','manage users','view-dashboard'];

        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission, 'guard_name' => 'web']);
                
            }
        }

        // Assign permissions to roles
        Role::where('name', 'admin')->first()->givePermissionTo($permissions);
         }
}

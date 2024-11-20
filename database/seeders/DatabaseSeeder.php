<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


     public function run()

     {
        // Check if each role exists before creating it
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin', 'guard_name' => 'web']);
        }
        if (!Role::where('name', 'teacher')->exists()) {
            Role::create(['name' => 'teacher', 'guard_name' => 'web']);
        }
        if (!Role::where('name', 'student')->exists()) {
            Role::create(['name' => 'student', 'guard_name' => 'web']);
        }
    }

}

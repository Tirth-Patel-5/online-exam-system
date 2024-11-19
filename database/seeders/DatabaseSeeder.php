<?php


use Illuminate\Database\Seeder;
use App\Models\User;
 use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    public function run()
    {

            $admin = User::find(1);
            $admin->assignRole('admin');

            

    }
}

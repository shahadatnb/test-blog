<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->description = 'A normal User';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'Author';
        $role_user->description = 'A Author User';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'Admin';
        $role_user->description = 'A Admin User';
        $role_user->save();
    }
}

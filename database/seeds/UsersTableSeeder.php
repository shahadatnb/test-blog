<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','User')->first();
        $role_author = Role::where('name','Author')->first();
        $role_admin = Role::where('name','Admin')->first();

        $user = new User();
        $user->name = 'Zakir';
        $user->email = 'visitor@gmail.com';
        $user->password = bcrypt('visitor');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Azmira';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('azmin');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Saima';
        $user->email = 'author@gmail.com';
        $user->password = bcrypt('author');
        $user->save();
        $user->roles()->attach($role_author);
    }
}

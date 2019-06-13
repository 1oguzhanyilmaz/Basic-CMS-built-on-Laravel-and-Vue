<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'oguzhan';
        $user->email = 'oguzhan@gmail.com';
        $user->password = bcrypt('123123123');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());

        $admin = new User;
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('123123123');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'admin')->first());
    }
}

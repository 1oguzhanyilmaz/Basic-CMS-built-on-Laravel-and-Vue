<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'nazim@gmail.com')->first();

        if(!$user)
        {
            User::create([
                'name' => 'Nazim Yilmaz',
                'email' => 'nazim@gmail.com',
                'password' => Hash::make('123123123'),
                'role' => 'admin'
            ]);
        }
    }
}

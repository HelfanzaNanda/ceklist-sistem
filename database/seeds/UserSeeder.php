<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role'=> 'admin'
        ]);

        User::create([
            'name' => 'ob1',
            'email' => 'ob1@gmail.com',
            'password' => Hash::make('12345678'),
            'role'=> 'indoor'
        ]);

        User::create([
            'name' => 'ob2',
            'email' => 'ob2@gmail.com',
            'password' => Hash::make('12345678'),
            'role'=> 'outdoor'
        ]);
    }
}

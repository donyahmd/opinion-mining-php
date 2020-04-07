<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        static $password = 'samarinda';

        $users = [
            'Doni Ahmad',
            'donyahmd24@gmail.com',
            Hash::make($password)
        ];

        User::create([
            'name'      =>  $users[0],
            'email'     =>  $users[1],
            'password'  =>  $users[2],
        ]);
    }
}

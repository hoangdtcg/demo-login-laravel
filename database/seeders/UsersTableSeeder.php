<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make("123123");
        $user->save();

        $user = new User();
        $user->name = "user1";
        $user->email = "user@gmail.com";
        $user->password = Hash::make("123456");
        $user->save();
    }
}

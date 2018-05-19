<?php

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
        $user->name = "Levi";
        $user->email = "levi.durfee@gmail.com";
        $user->password = bcrypt('password');
        $user->save();
    }
}

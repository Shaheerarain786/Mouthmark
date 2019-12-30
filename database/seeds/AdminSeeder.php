<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->username= "admin";
        $user->email = "admin@admin.com";
        $user->password = bcrypt("123456");
        $user->role_id = "2";
        $user->type = "admin";
        $user->save();
    }
}

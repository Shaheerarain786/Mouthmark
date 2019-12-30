<?php

use Illuminate\Database\Seeder;
class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->username= "superadmin";
        $user->email = "superadmin@admin.com";
        $user->password = bcrypt("123123");
        $user->type = "super_admin";
        $user->role_id = "1";
        $user->save();
    }
}

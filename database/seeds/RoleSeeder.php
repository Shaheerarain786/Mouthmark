<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['super_admin','admin'];
        foreach ($roles as $key => $role){
            $create = new \App\Role();
            $create->role = $role;
            $create->save();
        }

        $role_permission = [1,2,3,4];
        foreach ($role_permission as $key => $value){
            $permission = new \App\RolePersmission();
            $permission->role_id = 1;
            $permission->persmission_id = $value;
            $permission->save();
        }
        foreach ($role_permission as $key => $value){
            $permission = new \App\RolePersmission();
            $permission->role_id = 2;
            $permission->persmission_id = $value;
            $permission->save();
        }
    }
}

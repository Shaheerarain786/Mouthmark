<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permision = ['Create','Read', 'Update', 'Delete'];

        foreach ($permision as $key => $value){
            $per = new \App\Persmission();
            $per->name = $value;
            $per->save();
        }
    }
}

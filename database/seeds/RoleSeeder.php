<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin', 'Data Collector', 'Asst. Manager'];
        foreach($roles as $role){
            DB::table('roles')->insert([
                'role_name'=>$role
            ]);
        }
    }
}

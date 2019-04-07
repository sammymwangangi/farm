<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('role_user')->delete();
        
        \DB::table('role_user')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'user_id' => 1,
                'user_type' => 'App\\User',
            ),
            1 => 
            array (
                'role_id' => 2,
                'user_id' => 4,
                'user_type' => 'App\\User',
            ),
            2 => 
            array (
                'role_id' => 3,
                'user_id' => 3,
                'user_type' => 'App\\User',
            ),
            3 => 
            array (
                'role_id' => 2,
                'user_id' => 2,
                'user_type' => 'App\\User',
            ),
            4 => 
            array (
                'role_id' => 1,
                'user_id' => 6,
                'user_type' => 'App\\User',
            ),
            5 => 
            array (
                'role_id' => 3,
                'user_id' => 5,
                'user_type' => 'App\\User',
            ),
        ));
    }
}

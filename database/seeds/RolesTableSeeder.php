<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'manager',
                'display_name' => 'MANAGER',
                'description' => 'MANAGER',
                'created_at' => '2019-01-14 09:00:06',
                'updated_at' => '2019-01-14 09:00:06',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'supervisor',
                'display_name' => 'SUPERVISOR',
                'description' => 'SUPERVISOR',
                'created_at' => '2019-01-17 23:52:44',
                'updated_at' => '2019-01-17 23:54:26',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'clerk',
                'display_name' => 'CLERK',
                'description' => 'CLERK',
                'created_at' => '2019-01-17 23:54:08',
                'updated_at' => '2019-01-17 23:54:08',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'farmer',
                'display_name' => 'FARMER',
                'description' => 'FARMER',
                'created_at' => '2019-01-17 23:54:08',
                'updated_at' => '2019-01-17 23:54:08',
            ),
        ));
    }
}

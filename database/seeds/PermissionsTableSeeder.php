<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'CREATE-USER',
                'display_name' => 'CREATE-USER',
                'description' => 'CREATE-USER',
                'created_at' => '2018-01-17 23:14:15',
                'updated_at' => '2018-01-17 23:14:15',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'EDIT-USER',
                'display_name' => 'EDIT-USER',
                'description' => 'EDIT-USER',
                'created_at' => '2018-01-17 23:14:35',
                'updated_at' => '2018-01-17 23:14:35',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'VIEW-USER',
                'display_name' => 'VIEW-USER',
                'description' => 'VIEW-USER',
                'created_at' => '2018-01-17 23:14:52',
                'updated_at' => '2018-01-17 23:14:52',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'DELETE-USER',
                'display_name' => 'DELETE-USER',
                'description' => 'DELETE-USER',
                'created_at' => '2018-01-17 23:15:11',
                'updated_at' => '2018-01-17 23:15:11',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'CREATE-ROLE',
                'display_name' => 'CREATE-ROLE',
                'description' => 'CREATE-ROLE',
                'created_at' => '2018-01-17 23:15:51',
                'updated_at' => '2018-01-17 23:15:51',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'EDIT-ROLE',
                'display_name' => 'EDIT-ROLE',
                'description' => 'EDIT-ROLE',
                'created_at' => '2018-01-17 23:16:12',
                'updated_at' => '2018-01-17 23:16:12',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'VIEW-ROLES',
                'display_name' => 'VIEW-ROLES',
                'description' => 'VIEW-ROLES',
                'created_at' => '2018-01-17 23:16:47',
                'updated_at' => '2018-01-17 23:16:47',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'DELETE-ROLE',
                'display_name' => 'DELETE-ROLE',
                'description' => 'DELETE-ROLE',
                'created_at' => '2018-01-17 23:17:10',
                'updated_at' => '2018-01-17 23:17:10',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'CREATE-FARMER',
                'display_name' => 'CREATE-FARMER',
                'description' => 'CREATE-FARMER',
                'created_at' => '2018-01-17 23:19:40',
                'updated_at' => '2018-01-17 23:19:40',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'VIEW-FARMER',
                'display_name' => 'VIEW-FARMER',
                'description' => 'VIEW-FARMER',
                'created_at' => '2018-01-17 23:19:58',
                'updated_at' => '2018-01-17 23:19:58',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'EDIT-FARMER',
                'display_name' => 'EDIT-FARMER',
                'description' => 'EDIT-FARMER',
                'created_at' => '2018-01-17 23:20:38',
                'updated_at' => '2018-01-17 23:20:38',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'DELETE-FARMER',
                'display_name' => 'DELETE-FARMER',
                'description' => 'DELETE-FARMER',
                'created_at' => '2018-01-17 23:21:02',
                'updated_at' => '2018-01-17 23:21:02',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'MANAGE-SETTINGS',
                'display_name' => 'MANAGE-SETTINGS',
                'description' => 'MANAGE-SETTINGS',
                'created_at' => '2018-01-17 23:29:29',
                'updated_at' => '2018-01-17 23:29:29',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'CREATE-EMPLOYEE',
                'display_name' => 'CREATE-EMPLOYEE',
                'description' => 'CREATE-EMPLOYEE',
                'created_at' => '2018-01-17 23:47:34',
                'updated_at' => '2018-01-17 23:47:34',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'EDIT-EMPLOYEE',
                'display_name' => 'EDIT-EMPLOYEE',
                'description' => 'EDIT-EMPLOYEE',
                'created_at' => '2018-01-17 23:48:38',
                'updated_at' => '2018-01-17 23:48:38',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'VIEW-EMPLOYEE',
                'display_name' => 'VIEW-EMPLOYEE',
                'description' => 'VIEW-EMPLOYEE',
                'created_at' => '2018-01-17 23:48:54',
                'updated_at' => '2018-01-17 23:48:54',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'DELETE-EMPLOYEE',
                'display_name' => 'DELETE-EMPLOYEE',
                'description' => 'DELETE-EMPLOYEE',
                'created_at' => '2018-01-17 23:49:11',
                'updated_at' => '2018-01-17 23:49:11',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'UPDATE-PROFILE',
                'display_name' => 'UPDATE-PROFILE',
                'description' => 'UPDATE-PROFILE',
                'created_at' => '2018-01-17 23:49:52',
                'updated_at' => '2018-01-17 23:49:52',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'CHANGE-PASSWORD',
                'display_name' => 'CHANGE-PASSWORD',
                'description' => 'CHANGE-PASSWORD',
                'created_at' => '2018-01-17 23:50:19',
                'updated_at' => '2018-01-17 23:50:19',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'CREATE-PERMISSION',
                'display_name' => 'CREATE-PERMISSION',
                'description' => 'CREATE-PERMISSION',
                'created_at' => '2018-02-22 03:54:02',
                'updated_at' => '2018-02-22 03:54:02',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'VIEW-PERMISSION',
                'display_name' => 'VIEW-PERMISSION',
                'description' => 'VIEW-PERMISSION',
                'created_at' => '2018-02-22 03:56:44',
                'updated_at' => '2018-02-22 03:56:44',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'DELETE-PERMISSION',
                'display_name' => 'DELETE-PERMISSION',
                'description' => 'DELETE-PERMISSION',
                'created_at' => '2018-02-22 03:57:17',
                'updated_at' => '2018-02-22 03:57:17',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'CLERK',
                'display_name' => 'CLERK',
                'description' => 'CLERK',
                'created_at' => '2018-05-20 17:36:17',
                'updated_at' => '2018-05-20 17:36:17',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'CREATE-COMMENT',
                'display_name' => 'CREATE-COMMENT',
                'description' => 'CREATE-COMMENT',
                'created_at' => '2018-05-20 17:36:17',
                'updated_at' => '2018-05-20 17:36:17',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'VIEW-COMMENT',
                'display_name' => 'VIEW-COMMENT',
                'description' => 'VIEW-COMMENT',
                'created_at' => '2018-05-20 17:36:17',
                'updated_at' => '2018-05-20 17:36:17',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'MANAGE-DELIVERIES',
                'display_name' => 'MANAGE-DELIVERIES',
                'description' => 'MANAGE-DELIVERIES',
                'created_at' => '2018-05-20 17:36:17',
                'updated_at' => '2018-05-20 17:36:17',
            ),
        ));
    }
}

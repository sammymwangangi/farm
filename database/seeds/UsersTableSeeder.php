<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@mkulima.com',
                'password' => '$2y$10$43FsHsYIiYvaUzRRQwR1x.T.v2JDBWNXnaFNrugLHERSyWLpIBq/G',
                'remember_token' => NULL,
                'created_at' => '2019-02-22 04:01:38',
                'updated_at' => '2019-02-22 04:01:38',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Kim',
                'email' => 'kim@mkulima.com',
                'password' => '$2y$10$GMfx4f.Eu7.wRnRdIgnLpegphKr7gry.ausTXQme7jKhoRrEDOZQO',
                'remember_token' => 'aowtkbgi32vjRyhe92jyKzD3fdhiC5c8ft8QWf3YzoOQ3oXKQiAcFiWL2wi5',
                'created_at' => '2019-03-21 22:50:55',
                'updated_at' => '2019-03-21 22:50:55',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'nelly',
                'email' => 'nelly@mkulima.com',
                'password' => '$2y$10$MRTruW1pFYS0twptdLtMIe51Xr6jfoYB.OlJVbUrBVfCfsOfmCXda',
                'remember_token' => NULL,
                'created_at' => '2019-03-22 00:01:32',
                'updated_at' => '2019-03-22 00:01:32',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'sammy',
                'email' => 'sam@mkulima.com',
                'password' => '$2y$10$zZgyGcOtbI6UxZ8A1ratUORP3JzB/RpUaUWs2D65SsM9TFh6/HCLG',
                'remember_token' => 'fKMuvbXOg70mfokeiWSR6nRYdma3h9mx1pDXPdfzM57X7OZtPmhl5f0IS2ZD',
                'created_at' => '2019-04-1 00:24:38',
                'updated_at' => '2019-04-1 00:24:38',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Joshua',
                'email' => 'joshua@mkulima.com',
                'password' => '$2y$10$Se3lxmXH8zN39IJniALC4.IOsXll9p/wP49MwVygrynpJkyrxMTCO',
                'remember_token' => '3m13v4PMJiOo7z7AWosVT1wmXINMJxxE81MTiJ4CSp7oomi0wxG9maHG3EFI',
                'created_at' => '2018-05-24 21:09:14',
                'updated_at' => '2018-05-24 21:09:14',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Rixton Sam',
                'email' => 'rixton@mkulima.com',
                'password' => '$2y$10$Bcm4xpbne.gX6aDF51LJMuYnyOIifEOl9iehMpADeoCX/O12QqIkC',
                'remember_token' => NULL,
                'created_at' => '2019-03-26 02:39:14',
                'updated_at' => '2019-03-26 02:39:14',
            ),
        ));
    }
}

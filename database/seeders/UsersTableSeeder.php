<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
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
                'name' => 'test',
                'email' => 'test@test.com',
                'email_verified_at' => NULL,
                'password' => bcrypt('12345678'),
                'remember_token' => NULL,
                'created_at' => '2021-06-15 06:35:14',
                'updated_at' => '2021-06-15 06:35:14',
            ),
        ));
        
        
    }
}
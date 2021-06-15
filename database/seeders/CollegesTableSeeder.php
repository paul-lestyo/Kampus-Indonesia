<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CollegesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('colleges')->delete();
        
        \DB::table('colleges')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'UGM',
                'created_at' => '2021-06-15 06:38:35',
                'updated_at' => '2021-06-15 06:38:35',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'UNS',
                'created_at' => '2021-06-15 06:38:46',
                'updated_at' => '2021-06-15 06:38:46',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'UNPAS',
                'created_at' => '2021-06-15 06:39:02',
                'updated_at' => '2021-06-15 06:39:02',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'UI',
                'created_at' => '2021-06-15 06:39:07',
                'updated_at' => '2021-06-15 06:39:07',
            ),
        ));
        
        
    }
}
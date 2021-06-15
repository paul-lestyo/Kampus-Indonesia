<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blogs')->delete();
        
        \DB::table('blogs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'judul pertama',
                'content' => 'ini content pertama dari judul pertama',
                'created_at' => '2021-06-01 13:47:51',
                'updated_at' => '2021-06-01 13:47:54',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'judul kedua',
                'content' => 'ini content kedua dari judul kedua',
                'created_at' => '2021-06-04 13:47:57',
                'updated_at' => '2021-06-18 13:47:59',
            ),
        ));
        
        
    }
}
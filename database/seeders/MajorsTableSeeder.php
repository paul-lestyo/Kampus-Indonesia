<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MajorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('majors')->delete();
        
        \DB::table('majors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'PGSD',
                'college_id' => 1,
                'created_at' => '2021-06-15 06:39:32',
                'updated_at' => '2021-06-15 06:39:32',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'PTIK',
                'college_id' => 1,
                'created_at' => '2021-06-15 06:39:38',
                'updated_at' => '2021-06-15 06:39:38',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'PTB',
                'college_id' => 1,
                'created_at' => '2021-06-15 06:39:42',
                'updated_at' => '2021-06-15 06:39:42',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Informatika',
                'college_id' => 1,
                'created_at' => '2021-06-15 06:40:06',
                'updated_at' => '2021-06-15 06:40:06',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'BIOLOGI',
                'college_id' => 2,
                'created_at' => '2021-06-15 06:40:36',
                'updated_at' => '2021-06-15 06:40:36',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'FARMASI',
                'college_id' => 2,
                'created_at' => '2021-06-15 06:40:44',
                'updated_at' => '2021-06-15 06:40:44',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'GEOGRAFI LINGKUNGAN',
                'college_id' => 2,
                'created_at' => '2021-06-15 06:40:52',
                'updated_at' => '2021-06-15 06:40:52',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'KARTOGRAFI DAN PENGINDERAAN JAUH',
                'college_id' => 2,
                'created_at' => '2021-06-15 06:41:01',
                'updated_at' => '2021-06-15 06:41:01',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Desain Komunikasi Visual',
                'college_id' => 3,
                'created_at' => '2021-06-15 06:42:14',
                'updated_at' => '2021-06-15 06:42:14',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Fotografi dan Film',
                'college_id' => 3,
                'created_at' => '2021-06-15 06:42:23',
                'updated_at' => '2021-06-15 06:42:23',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Pendidikan Dokter',
                'college_id' => 4,
                'created_at' => '2021-06-15 06:43:10',
                'updated_at' => '2021-06-15 06:43:10',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Pendidikan Dokter Gigi',
                'college_id' => 4,
                'created_at' => '2021-06-15 06:43:23',
                'updated_at' => '2021-06-15 06:43:23',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Matematika',
                'college_id' => 4,
                'created_at' => '2021-06-15 06:43:33',
                'updated_at' => '2021-06-15 06:43:33',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Biologi',
                'college_id' => 4,
                'created_at' => '2021-06-15 06:43:40',
                'updated_at' => '2021-06-15 06:43:40',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Ilmu Aktuaria',
                'college_id' => 4,
                'created_at' => '2021-06-15 06:43:48',
                'updated_at' => '2021-06-15 06:43:48',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Geofisika',
                'college_id' => 4,
                'created_at' => '2021-06-15 06:43:56',
                'updated_at' => '2021-06-15 06:43:56',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Geologi',
                'college_id' => 4,
                'created_at' => '2021-06-15 06:44:01',
                'updated_at' => '2021-06-15 06:44:01',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Teknik Sipil',
                'college_id' => 4,
                'created_at' => '2021-06-15 06:44:11',
                'updated_at' => '2021-06-15 06:44:11',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Arsitektur',
                'college_id' => 4,
                'created_at' => '2021-06-15 06:44:18',
                'updated_at' => '2021-06-15 06:44:18',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Pend. Bahasa Inggris',
                'college_id' => 1,
                'created_at' => '2021-06-15 06:45:56',
                'updated_at' => '2021-06-15 06:45:56',
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CollegesTableSeeder::class);
        $this->call(MajorsTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
    }
}

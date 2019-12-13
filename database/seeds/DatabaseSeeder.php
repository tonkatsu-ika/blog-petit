<?php

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
        // BlogsTableSeederを読み込むように指定
        $this->call(BlogsTableSeeder::class);
    }
}

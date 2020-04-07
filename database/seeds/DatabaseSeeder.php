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
        $this->call(AuthorSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(PictureSeeder::class);
        $this->call(BookTableSeeder::class);
    }
}

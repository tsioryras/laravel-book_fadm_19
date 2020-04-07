<?php

use Illuminate\Database\Seeder;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Picture::class,30)->create()->each(function ($picture){
           $picture->save();
        });
    }
}

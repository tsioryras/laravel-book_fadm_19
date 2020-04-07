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
        factory(App\Picture::class,10)->create()->each(function ($picture){
            $book = App\Book::find(rand(1,30));
            $picture->book()->associate($book);
           $picture->save();
        });
    }
}

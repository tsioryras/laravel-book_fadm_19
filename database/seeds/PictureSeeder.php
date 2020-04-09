<?php

use Illuminate\Database\Seeder;
use App\Book;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $booksKeys = [];
        $books = Book::all();
        $count = $books->count();
        for ($i = 0; $i < $count; $i++) {
            $booksKeys[] = $i;
        }

        shuffle($booksKeys);
        factory(App\Picture::class, $count)->create()->each(function ($picture, $booksKeys) {

            if(is_array($booksKeys)){
                $key = array_rand($booksKeys, 1);
                dump($key);
                $picture->book()->associate($booksKeys[$key]);
                $picture->save();
                unset($booksKeys[$key]);
            }else{
                $picture->book()->associate($booksKeys);
                $picture->save();
            }
        });
    }
}

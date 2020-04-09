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
        $books = Book::all()->all();
        $count = sizeof($books)+1;
        shuffle($books);
        factory(App\Picture::class,$count)->create()->each(function ($picture, $books) {
            $key = is_array($books) ? array_rand($books, 1):null;
            $book = is_array($books) ? $books[$key]:$books;
            $picture->book()->associate($book);
            $picture->save();
            unset($books[$key]);
        });

    }
}

<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Book::class, 30)->create()->each(function ($book) {
            $genre = App\Genre::find(rand(1, 10));
            $authors = App\Author::pluck('id')->shuffle()->slice(0, rand(1, 10))->all();

            $book->genre()->associate($genre);
            $book->authors()->attach($authors);
            $book->save();
        });
    }
}

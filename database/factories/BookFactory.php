<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'description' => $faker->paragraph(40),
        'score'=>$faker->randomNumber(2),
        'published_at'=>$faker->dateTime
    ];
});

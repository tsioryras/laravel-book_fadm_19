<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    $status=['unpublished','publish','draft'];
    $statusIndex= rand(0,2);
    $date = ($statusIndex==0) ? null:$faker->dateTime;
    $score = ($statusIndex==0) ? null:$faker->randomFloat(1,0,5);

    return [
        'title' => $faker->company,
        'description' => $faker->paragraph(40),
        'status'=>$status[$statusIndex],
        'score'=>$score,
        'published_at'=>$date
    ];
});

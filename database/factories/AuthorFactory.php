<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use Faker\Factory as Faker;

$factory->define(Author::class, function () {
    $faker = Faker::create('fr_FR');
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address
    ];
});

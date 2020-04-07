<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Picture;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\str;

Storage::disk('local')->delete(Storage::allFiles());
$factory->define(Picture::class, function (Faker $faker) {
    $link = $faker->userName . str::random(5) . 'jpg';
    $file = file_get_contents('https://loremipsum.com/futurama/250/250/' . rand(1, 9));
    Storage::disk('local')->put($link, $file);
    return [
        'title' => 'Default',
        'link' => $link
    ];
});

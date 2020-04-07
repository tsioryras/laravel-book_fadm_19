<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Picture;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

Storage::disk('local')->delete(Storage::allFiles());
$factory->define(Picture::class, function (Faker $faker) {
    $link = Str::random(15) . '.jpg';
    $file = file_get_contents('http://placeimg.com/250/250/any');
    Storage::disk('local')->put($link, $file);
    return [
        'title' => 'Default',
        'link' => $link
    ];
});

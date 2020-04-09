<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Picture;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

Storage::disk('local')->delete(Storage::allFiles());
foreach (scandir(storage_path('app/public/images')) as $file) {
    if ($file != '.' && $file != '..') {
        unlink(storage_path('app/public/images/') . $file);
    }
}
$factory->define(Picture::class, function () {
    $link = Str::random(15) . '.jpg';
    $file = file_get_contents('http://placeimg.com/250/250/any');

    Storage::disk('local')->put($link, $file);
    if (copy(storage_path('images/') . $link, storage_path('app/public/images/') . $link)) {
        unlink(storage_path('images/') . $link);
    }
    return [
        'title' => 'Default',
        'link' => $link
    ];
});

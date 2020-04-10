<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct()
    {
        view()->composer('components.menu', function ($view) {
            $genres = Genre::all();
            $view->with('genres', $genres);
        });
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

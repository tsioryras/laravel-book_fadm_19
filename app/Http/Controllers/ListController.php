<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        $books = Book::paginate(5);
        return view('home.home', ['books' => $books]);
    }
}

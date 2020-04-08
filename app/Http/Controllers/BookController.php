<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(int $id){
        $book = Book::find($id);
        return view('books.book',['book'=>$book]);
    }

    public function bookByGenre(int $id){
        $genre = Genre::find($id);
        $books = $genre->books;
        $books= Book::where('g', '>', 100)->paginate(5);
        return view('home.home',['genre'=>$genre, 'books'=>$books]);
    }
}

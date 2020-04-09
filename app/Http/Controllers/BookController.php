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
        $booksId = [];
        foreach ($genre->books as $book){
            $booksId[]=$book->id;
        }
        //return $booksId;
        $books= Book::WhereIn('id',$booksId)->paginate(2);
        return view('home.home',['genre'=>$genre, 'books'=>$books, 'booksId'=>$booksId]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::all();
        return view('authors.index',['authors'=>$authors]);
    }

    public function show(int $id){
        $author = Author::find($id);
        $books = Book::find($author);
        return view('authors.profil',['author'=>$author, 'books'=>$books]);
    }
}

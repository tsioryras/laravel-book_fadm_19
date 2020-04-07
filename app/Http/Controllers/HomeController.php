<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){
       $books = Book::paginate(5);
       return view('home.home',['books'=>$books]);
   }

    public function show(int $id){
        return Book::find($id);
    }
}

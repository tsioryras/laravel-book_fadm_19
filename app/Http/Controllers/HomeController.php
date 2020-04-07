<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){
       $books = Book::all();
       return view('welcome',['books'=>$books]);
   }

    public function show(int $id){
        return Book::find($id);
    }
}

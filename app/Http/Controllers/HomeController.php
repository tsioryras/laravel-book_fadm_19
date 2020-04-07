<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){
       return Book::all();
   }

    public function show(int $id){
        return Book::find($id);
    }
}

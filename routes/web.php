<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
//Routes admin
Route::resource('admin','AdminController')->middleware('auth');
Route::resource('books','CRUDBookController')->middleware('auth');
Route::resource('genres','CRUDGenreController')->middleware('auth');

//Routes Guests
Route::get('/', 'ListController@index');
Route::get('/book/{id}', 'BookController@index')->where(['id' => '[0-9]+']);
Route::get('/book/genre/{id}', 'BookController@bookByGenre')->where(['id' => '[0-9]+']);
Route::get('/authors', 'AuthorController@index');
Route::get('/author/{id}', 'AuthorController@show')->where(['id' => '[0-9]+']);
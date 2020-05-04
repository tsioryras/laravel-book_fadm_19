<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CRUDBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $books = Book::paginate(8);
        return view('Admin.books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $authors = Author::pluck('name', 'id')->all();
        $genders = Author::pluck('name', 'id')->all();
        return view('Admin.books.create', [
            'authors' => $authors,
            'genders' => $genders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $bookAuthors = [];
        foreach ($book->authors as $author) {
            $bookAuthors[] = $author->id;
        }

        $authors = Author::pluck('name', 'id')->all();
        $genders = Genre::pluck('name', 'id')->all();
        return view('Admin.books.create', [
            'book' => $book,
            'authors' => $authors,
            'bookAuthors' => $bookAuthors,
            'genders' => $genders
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

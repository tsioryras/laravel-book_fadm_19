<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Genre;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

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
        return view('Admin.books._form', [
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
        $book = Book::create($request->all());

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
        return view('Admin.books._form', [
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
        $book = Book::find($id);
        //updating gender
        if ($book->genre_id != $request->input('gender')) {
            $book->genre()->dissociate();
            $book->genre()->associate(Genre::find($request->input('gender')));
        }
        //updating status
        if ($book->status != $request->status) {
            $book->status = $request->status;
        }
        //updating picture
        if ($request->file('book_picture') != null) {
            $newFile = $request->file('book_picture')->getPathname();
            $originalName = $request->file('book_picture')->getClientOriginalName();
            $fileExtension = explode(".", $originalName)[1];
            $picture = Picture::find($book->picture->id);
            $newFileName = substr(Hash::make($book->title . $book->id),0,15) . "." . $fileExtension;
            if ($picture != null) {
                move_uploaded_file($newFile, storage_path('app/public/images/books/') . $newFileName);
                $link = $book->picture['link'];
                unlink(storage_path('app/public/images/books/') . $link);

            } else {
                $picture = new Picture();
                $picture->book()->associate($book);
            }
            $picture->link = $newFileName;
            $picture->title = $book->title . " cover";
            $picture->save();
        }

        $book->update($request->all());
        $book->authors()->sync($request->authors);
        $book->save();
        return redirect()->route('books.index')->with('message', 'success');
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

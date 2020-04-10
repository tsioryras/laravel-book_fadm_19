@extends('layouts.app')

@section('content')
    <div class="row list">
        @forelse($books as $book)
            <div class="card app_item text-center">
                <div class="card-header text-left">
                    <small>{{$book->title}}</small>
                </div>
                <div class="media">
                    <a href="{{url('/book',['id'=>$book->id])}}">
                        <img src="{{asset('storage/images/books/'.$book->picture['link'])}}">
                    </a>
                </div>
                <div class="card-footer">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-warning">Edit</button>
                        <button type="button" class="btn btn-outline-danger">Delete</button>
                    </div>
                </div>
            </div>
        @empty
            <h1>Aucun livre dans le catalogue</h1>
        @endforelse
    </div>
    @if(count($books)>0)
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                {{$books->links()}}
            </div>
        </div>
    @endif
@endsection
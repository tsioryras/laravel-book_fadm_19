@extends('base')

@section('content')
    <h1>About {{$author->name}}</h1>
    <ul>
        <li>Name: {{$author->name}}</li>
        <li>Address: {{$author->address}}</li>
        <li>Phone: {{$author->phone}}</li>
        <li>Email: {{$author->email}}</li>
        <li>Books:
            <div class="links">
                @forelse($books as $book)
                    <a>{{$book->title}}</a>
                @empty
                    <a>No success book yet</a>
                @endforelse
            </div>
        </li>
    </ul>
@endsection


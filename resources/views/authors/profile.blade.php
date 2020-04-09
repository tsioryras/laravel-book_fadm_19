@extends('base')

@section('content')
    <div class="row list">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>About {{$author->name}}</h1>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Name: {{$author->name}}</li>
                        <li>Address: {{$author->address}}</li>
                        <li>Phone: {{$author->phone}}</li>
                        <li>Email: {{$author->email}}</li>
                        <li>Books:
                            <div class="links">
                                @forelse($books as $book)
                                    <a href="{{url('/book',['id'=>$book->id])}}">{{$book->title}}</a><br>
                                @empty
                                    <a>No success book yet</a>
                                @endforelse
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection


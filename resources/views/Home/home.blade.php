@extends('base')

@section('content')
    <h1>Books list</h1>
    @forelse($books as $book)
        <div class="row list">
            <div class="col-md-3 list card">
                <a href="{{url('/book',['id'=>$book->id])}}">
                    <figure class="figure">
                        <img src="{{asset('storage/ACQNNIrwxK7JoA6.jpg')}}" class="img-thumbnail">
                        <figcaption class="figure-caption">{{$book->title}}</figcaption>
                    </figure>
                </a>
                <div>
                    <small>Written by:</small>
                        @foreach($book->authors as $author)
                            <a href="{{url('/author',['id'=>$author->id])}}"> {{$author->name}} </a>
                        @endforeach
                </div>
            </div>
            <div class="col-md-9 list">
                {{ Str::limit($book->description, strlen($book->description)/2, $end='...') }}
                <a href="{{url('/book',['id'=>$book->id])}}">[Lire la suite]</a>
            </div>
        </div>
    @empty
        <h1>Aucun livre dans le catalogue</h1>
    @endforelse
    @if(count($books)>0)
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                {{$books->links()}}
            </div>
        </div>
    @endif
@endsection
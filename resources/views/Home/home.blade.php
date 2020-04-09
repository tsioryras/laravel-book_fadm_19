@extends('base')

@section('content')
    @if(isset($genre))
        <h1>Books {{$genre->name}} list</h1>
    @else
        <h1>Books list</h1>
    @endif
    @forelse($books as $book)
        <div class="row list">
            <div class="row img-thumbnail">
                <div class="col-md-12">
                    <div class="media">
                        <a href="{{url('/book',['id'=>$book->id])}}">
                            <img src="{{asset('storage/images/'.$book->picture['link'])}}" class="img-thumbnail">
                            <p>
                                @if($book->score)
                                    <small>Note: {{$book->score}}/5</small>
                                @endif
                            </p>
                        </a>
                        <div class="media-body">
                            <h3 class="mt-0">{{$book->title}}</h3>
                            <div class="description">
                                {{ Str::limit($book->description, strlen($book->description)/2, $end='...') }}
                                <a href="{{url('/book',['id'=>$book->id])}}">[Lire la suite]</a>
                            </div>
                        </div>
                    </div>
                    <div class="author">
                        <small>Written by:</small>
                        @foreach($book->authors as $author)
                            <a href="{{url('/author',['id'=>$author->id])}}"> {{$author->name}} </a>
                        @endforeach
                    </div>
                </div>
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
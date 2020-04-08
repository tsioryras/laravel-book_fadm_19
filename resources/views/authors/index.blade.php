@extends('base')

@section('content')
    <h1>Authors list</h1>
    <div class="links">
        @forelse($authors as $author)
            <a href="{{url('/author',['id'=>$author->id])}}" class="btn btn-outline-dark">{{$author->name}}</a>
        @empty
            <h1>Aucun auteur à ce jour </h1>
        @endforelse
    </div>
@endsection
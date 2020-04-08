@extends('base')

@section('content')
    <div class="row list">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{$book->title}}</h3>
                </div>
                <div class="card-body text-center">
                    <img src="" class="img-thumbnail">
                    <div class="text-left">
                        {{$book->description}}
                    </div>
                </div>
                <div class="card-footer">
                    <small>Authors: </small>
                    @forelse($book->authors as $author)
                        <a href="{{url('/author',['id'=>$author->id])}}">{{$author->name}}</a>
                    @empty
                        Unknown author
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
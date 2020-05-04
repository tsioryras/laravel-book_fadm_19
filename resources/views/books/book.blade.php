@extends('layouts.app')

@section('content')
    <div class="row list book">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{$book->title}}</h3>
                    <small> {{strtoupper(trans($book->status))}}
                    @if($book->status !='unpublished')
                        in {{\Carbon\Carbon::parse($book->published_at)->format('j F, Y')}}
                    @endif
                    </small>
                    <p>
                        @if($book->score)
                            @if($book->score<2)
                                @php ($color = 'danger')
                            @elseif($book->score>=4)
                                @php ($color = 'success')
                            @else
                                @php ($color = 'warning')
                            @endif
                            <small>Score: </small><small class="text-{{$color}}">{{$book->score}}</small><small>/5</small>
                        @endif
                    </p>
                </div>
                <div class="card-body text-center">
                    <img src="{{asset('storage/images/books/'.$book->picture['link'])}}" class="img-thumbnail">
                    <div class="text-left list">
                        {{$book->description}}
                    </div>
                </div>
                <div class="card-footer">
                    <small>Authors:</small>
                    @forelse($book->authors as $author)
                        <a href="{{route('author',['id'=>$author->id])}}">{{$author->name}}</a>
                    @empty
                        Unknown author
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
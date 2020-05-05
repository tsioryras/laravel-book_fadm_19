@extends('layouts.app')

@section('content')
    @php
        $edit = false;
        $status = ['draft', 'published','unpublished']
    @endphp
    <h1>
        @if(Route::is('books.create'))
            Create Book
        @endif
        @if(Route::is('books.edit'))
            Edit Book "{{$book->title}}"
            @php $edit = true @endphp
        @endif
    </h1>
    <form action="@if($edit){{route('books.update',$book->id)}} @else {{route('books.store')}} @endif"
          enctype="multipart/form-data" method="POST">
        @if($edit)
            {{method_field('PUT')}}
        @endif
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Book Title</label>
                    <input type="text" class="form-control" id="title"
                           aria-describedby="titleHelp" name="title"
                           @if($edit && isset($book))
                           value="{{$book->title}}"
                           @endif
                           placeholder="Tape book title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description"
                              placeholder="Book resume or description">@if($edit && isset($book)){{trim($book->description)}}@endif
                </textarea>
                </div>
                <div class="form-group">
                    <label for="gender">Book gender</label>
                    <select id="gender" name="gender" class="form-control">
                        <option value="0">No gender</option>
                        @forelse($genders as $id =>$name)
                            <option @if($edit && isset($book) && $book->genre_id == $id) selected @endif
                            value="{{$id}}">{{$name}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <h6>Choose book author(s)</h6>
                    @forelse($authors as $id=>$name)
                        <div class="form-check-inline">
                            <input class="form-check-input"
                                   @if($edit == true && isset($book) && in_array($id,$bookAuthors))
                                   checked
                                   @endif
                                   name="authors[]"
                                   type="checkbox"
                                   value="{{$id}}"
                                   id="author{{$id}}">
                            <label class="control-label" for="author{{$id}}">
                                {{$name}}
                            </label>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <img class="image_preview"
                         src="@if($edit && isset($book) && isset($book->picture)){{asset('storage/images/books/'.$book->picture['link'])}}@endif">
                    <h6>Change book picture</h6>
                    <input type="file" class="custom-file-input d-none"
                           name="book_picture" id="book_picture">
                    <label class="btn btn-outline-secondary file-label" for="book_picture">Choose file</label>
                </div>
                <div class="form-group">
                    <h6>Status</h6>
                    @forelse($status as $state)
                        <div class="form-check">
                            <input class="form-check-input"
                                   @if($edit == true && isset($book) && strtolower($book->status)==$state)
                                   checked
                                   @endif
                                   name="status"
                                   type="radio"
                                   value="{{$state}}"
                                   id="{{$state}}">
                            <label class="control-label" for="{{$state}}">
                                {{$state}}
                            </label>
                        </div>
                    @empty
                    @endforelse
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save book</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection

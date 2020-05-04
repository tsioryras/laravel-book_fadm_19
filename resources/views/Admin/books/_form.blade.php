<h1>
    @if(Route::is('books.create'))
        Create Book
    @endif
    @if(Route::is('books.edit'))
        Edit Book "{{$book->title}}"
        @php $edit = true @endphp
    @endif
</h1>
<form>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title">Book Title</label>
                <input type="text" class="form-control" id="title"
                       aria-describedby="titleHelp" name="title"
                       @if($edit == true && isset($book))
                       value="{{$book->title}}"
                       @endif
                       placeholder="Tape book title" required>
            </div>
            <div class="form-group">
                <label for="book-description">Description</label>
                <textarea class="form-control" id="book-description" placeholder="Book resume or description">
                    @if($edit == true && isset($book))
                        {{$book->description}}
                    @endif
                </textarea>
            </div>
            <div class="form-group">
                <label for="book-status">Book gender</label>
                <select id="book-status" class="form-control">
                    <option value="0">No gender</option>
                    @forelse($genders as $id =>$name)
                        <option
                                @if($edit == true && isset($book) && $book->id == $id)
                                selected
                                @endif
                                value="{{$id}}">{{$name}}</option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                @if($edit==true && isset($book) && isset($book->picture))
                    <img src="{{asset('storage/images/books/'.$book->picture['link'])}}">
                    <h6>Change book picture</h6>
                @else
                    <h6>Choose book picture</h6>
                @endif
                <input type="file" class="custom-file-input d-none" id="book-picture">
                <label class="btn btn-outline-secondary file-label" for="book-picture">Choose file</label>
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
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save book</button>
            </div>
        </div>
    </div>
</form>


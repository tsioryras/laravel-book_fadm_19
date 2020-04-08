<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a href="/" class="navbar-brand" href="#">MyBookStore</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/authors')}}">Authors</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Genres
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @forelse($genres as $genre)
                        <a class="dropdown-item" href="{{url('/book/genre',['id'=>$genre->id])}}">{{$genre->name}}</a>
                    @empty
                        <a class="dropdown-item" href="#">Aucun genre existant</a>
                    @endforelse
                </div>
            </li>
        </ul>
    </div>
</nav>
@extends('components.dataTable')

@section('onTable')
<h1>Manage GENDER</h1>
@endsection

@section('thead')
    <th>Name</th>
    <th>Actions</th>
@endsection
@section('tbody')
    @forelse($genres as $genre)
        <tr>
            <td>{{$genre->name}}</td>
            <td>
                <a href="#">Edit</a>
                <a href="#">Delete</a>
            </td>
        </tr>
    @empty
        <tr>
            No gender
        </tr>
    @endforelse
@endsection
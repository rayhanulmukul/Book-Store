@extends('layout')

@section('page-content')
<h1>Show book information</h1>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <td>{{ $book->id }}</td>
    </tr>

    <tr>
        <th>Title</th>
        <td>{{ $book->title }}</td>
    </tr>

    <tr>
        <th>Author</th>
        <td>{{ $book->author }}</td>
    </tr>

    <tr>
        <th>ISBN</th>
        <td>{{ $book->isbn }}</td>
    </tr>

    <tr>
        <th>Price</th>
        <td>{{ $book->price }}</td>
    </tr>

    <tr>
        <th>Stock</th>
        <td>{{ $book->stock }}</td>
    </tr>
</table>
<a href="{{ route('books.index') }}" class="btn btn-primary" ><i class="bi bi-arrow-left-circle">Go back</i></a>
<td><a href="{{ route('books.edit', $book->id) }}" class="btn btn-info"><i class="bi bi-pencil-square"></i>Update</a></td>
@endsection
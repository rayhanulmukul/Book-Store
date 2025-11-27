@extends('layout')

@section('page-content')
   <h1>Bookstore</h1>
   <div class="row">
      <div class="col-lg-10">
        <form method="get" action="{{ route('books.index') }}">
            <div class="row">
                <div class="col-8">
                    <input type="text" class="form-control" name="search" value="{{ request('search') }}"placeholder="inter text">
                </div>
                <div>
                    <button type="submit" class="btn btn-default">Search</button>
                </div>
            </div>
        </form>
      </div>
      <div class="col-lg-2">
        <p class="text-right"> <a href="{{ route('books.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>New book</a></p>
      </div>
   </div>
   <table class = "table table-striped">
        <tr>
            <th class="td">ID</th>
            <th class="td">Title</th>
            <th class="td">Author</th>
            <th class="td">Price</th>
            <th  colspan="3" class="text-center">Action</th>
        </tr>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->price }}</td>
                <td><a href="{{ route('books.show', $book->id) }}" class="btn btn-primary"><i class="bi bi-eye-fill"></i>View</a></td>
                <td><a href="{{ route('books.edit', $book->id) }}" class="btn btn-info"><i class="bi bi-pencil-square"></i>Update</a></td>
                <td>
                    <form method="POST" action="{{ route('books.delete') }}" onsubmit="return confirm('are you sure to delete?')">
                        @csrf
                        <input type="hidden" name="id" value="{{ $book->id }}">
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i>Delete</button>
                    </form>
                </td>
            </tr>
           @endforeach
   </table>
   {{ $books->links() }}
@endsection
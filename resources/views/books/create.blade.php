@extends('layout')


@section('page-content')
<h1>New Book Information </h1>
<form method="POST" action="{{ route('books.store') }}">
	    @csrf
        <div class="form-group">
           <label for="exampleInputEmail1">ISBN</label>
           <input type="text" class="form-control" name="isbn" value="{{ old('isbn') }}" placeholder="ISBN">
        </div>
		<div>{{ $errors->first('isbn') }}</div>

        <div class="form-group">
			<label for="exampleInputEmail1">Title</label>
			<input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title">
        </div>
		<div>{{ $errors->first('title') }}</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Author</label>
			<input type="text" class="form-control" name="author" value="{{ old('author') }}" placeholder="Author">
        </div>
		<div>{{ $errors->first('author') }}</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Price</label>
			<input type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="Price">
        </div>
		<div>{{ $errors->first('price') }}</div>


		<div class="form-group">
			<label for="exampleInputEmail1">Stock</label>
			<input type="text" class="form-control" name="stock" value="{{ old('stock') }}" placeholder="Stock">
        </div>
		<div>{{ $errors->first('stock') }}</div>

        <button type="submit" class="btn btn-success"><i class="bi bi-send"></i>Submit</button>
		<a href="{{ route('books.index') }}" class="btn btn-primary" ><i class="bi bi-arrow-left-circle">Go back</i></a>
      </form>

@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Symfony\Component\HttpKernel\DataCollector\RequestDataCollector;

class BookController extends Controller
{
    public function index(Request $request){

        $books = Book::query();
        if($request->has('search')){
            $books = $books->where('title', 'like', '%'.$request->search.'%')->orWhere('author', 'like', '%'.$request->search.'%');
        }
        $books = $books->paginate(10);
        return view('books.index', ['books' => $books]);
    }

    public function show($bookId){
        $book = Book::find($bookId);
        return view('books.show',['book' => $book]);
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        $rule = [
            'isbn' => 'required|numeric|digits:13',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|integer|min:0'

        ];

        $this->validate($request, $rule);

        $book = new Book;
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->stock = $request->stock;

        $book->save();
        return redirect()->route('books.show', $book->id);
    }

    public function edit($bookId){
        $book = Book::find($bookId);
        return view('books.update', ["book" => $book]);
    }

    public function update(Request $request){
        $rule = [
            'isbn' => 'required|numeric|digits:13',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|integer|min:0'

        ];

        $this->validate($request, $rule);

        $book = Book::find($request->id);
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->stock = $request->stock;

        $book->save();
        return redirect()->route('books.show', $book->id);
    }

    public function destroy(Request $request){
        $book = Book::find($request->id);
        $book->delete();

        return redirect()->route('books.index');
    }
}

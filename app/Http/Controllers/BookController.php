<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Resources\ClientResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function list()
    {
        return Book::all();
    }

    public function show(Book $book)
    {
        return BookResource::make($book);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255', 'unique:books,title'],
            'synopsis' => ['required', 'string', 'min:10', 'max:255'],
            'category' => ['required', 'string', 'min:3', 'max:255'],
            'published_at' => ['required', 'date'],
            'quantity_in_stock' => ['required', 'integer']
        ]);

        $data = $request->all();
        $book = Book::make($data);
        $book->save();

        return BookResource::make($book);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255', "unique:books,title,$book->id"],
            'synopsis' => ['required', 'string', 'min:10', 'max:255'],
            'category' => ['required', 'string', 'min:3', 'max:255'],
            'published_at' => ['required', 'date'],
            'quantity_in_stock' => ['required', 'integer']
        ]);

        $data = $request->all();
        $book->update($data);
        return BookResource::make($book);
    }

    public function delete(Book $book)
    {
        $book->delete();
        return $book;
    }
}

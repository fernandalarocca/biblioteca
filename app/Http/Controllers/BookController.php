<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function list()
    {
        return Book::all();
    }
    public function show($id)
    {
        return Book::find($id);
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $book = Book::make($data);
        $book->save();
        return $book;
    }
    public function update(Request $request, Book $book)
    {
        $data = $request->all();
        $book->update($data);
        return $book;
    }
    public function delete($id)
    {
        $book=Book::find($id);
        $book->delete();
        return $book;
    }
}

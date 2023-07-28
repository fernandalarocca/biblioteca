<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    public function list()
    {
        $books = Book::all();
        return BookResource::collection($books);
    }

    public function show(Book $book)
    {
        return BookResource::make($book);
    }

    public function create(BookRequest $request)
    {
        $data = $request->validated();
        $book = Book::make($data);
        $book->save();

        return BookResource::make($book);
    }

    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();
        $book->update($data);
        return BookResource::make($book);
    }

    public function delete(Book $book)
    {
        $book->delete();
        return $book;
    }
}

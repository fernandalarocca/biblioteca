<?php

namespace App\Actions\Book;

use App\Http\Resources\BookResource;
use App\Models\Book;

class CreateBookAction
{
    public function execute(array $data): BookResource
    {
        $book = Book::make($data);
        $book->save();
        return BookResource::make($book);
    }
}

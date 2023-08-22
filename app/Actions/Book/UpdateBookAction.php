<?php

namespace App\Actions\Book;

use App\Http\Resources\BookResource;
use App\Models\Book;

class UpdateBookAction
{
    public function execute(array $data, Book $book): BookResource
    {
        $book->update($data);
        return BookResource::make($book);
    }
}

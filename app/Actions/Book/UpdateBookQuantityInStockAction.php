<?php

namespace App\Actions\Book;

use App\Models\Book;

class UpdateBookQuantityInStockAction
{
    public function execute(Book $book, int $quantity): Book
    {
        $quantityOld = (int)$book->quantity_in_stock;
        if ($quantityOld > 0) {
            $book->quantity_in_stock =  $quantityOld - $quantity;
            $book->save();
        }

        return $book;
    }
}

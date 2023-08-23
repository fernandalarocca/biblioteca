<?php

namespace App\Actions\Loan;

use App\Http\Resources\LoanResource;
use App\Models\Book;
use App\Models\Loan;

class CreateLoanAction
{
    public function execute(array $data): LoanResource
    {
        $loan = Loan::make($data);
        $loan->save();
        $book = Book::find($data['book_id']);
        $book->quantity_in_stock = $book->quantity_in_stock - $data['quantity'];
        $book->save();
        return LoanResource::make($loan);
    }
}

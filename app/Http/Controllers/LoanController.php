<?php

namespace App\Http\Controllers;

use App\Actions\Book\UpdateBookQuantityInStockAction;
use App\Actions\Loan\CreateLoanAction;
use App\Http\Requests\LoanRequest;
use App\Http\Resources\LoanResource;
use App\Models\Book;
use App\Models\Loan;

class LoanController extends Controller
{
    public function list()
    {
        $perpage = request()->query('limit', 5);
        $loans = Loan::query()->paginate($perpage);
        return LoanResource::collection($loans);
    }

    public function show(Loan $loan)
    {
        return LoanResource::make($loan);
    }

    public function create(LoanRequest $request)
    {
        $data = $request->validated();
        $loan = (new CreateLoanAction())->execute($data);

        $book = app(Book::class)->find($loan->book_id);
        (new UpdateBookQuantityInStockAction())
            ->execute($book, data_get($data,'quantity', 1));

        return LoanResource::make($loan);
    }

    public function update(LoanRequest $request, Loan $loan)
    {
        $data = $request->validated();
        $loan->update($data);
        return LoanResource::make($loan);
    }

    public function delete(Loan $loan)
    {
        $loan->delete();
        return $loan;
    }
}

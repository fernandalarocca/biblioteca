<?php

namespace Tests\Unit\Actions\Book;

use App\Actions\Book\UpdateBookQuantityInStockAction;
use App\Actions\Loan\CreateLoanAction;
use App\Models\Author;
use App\Models\Book;
use App\Models\Loan;
use Tests\Cases\TestCaseUnit;

class UpdateBookQuantityInStockActionUnitTest extends TestCaseUnit
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_should_created_loan_success()
    {
        $bookMock = $this->mock(Book::class)
            ->shouldReceive('save')
            ->once()
            ->andReturn(true);

        $book = new Book();
        $this->app->instance($book, $bookMock);
        (new UpdateBookQuantityInStockAction())->execute($book, 1);

        dd($book->quantity_in_stock);
    }
}

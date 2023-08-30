<?php

namespace Tests\Unit\Actions\Loan;

use App\Actions\Loan\CreateLoanAction;
use App\Models\Author;
use App\Models\Book;
use App\Models\Loan;
use Tests\Cases\TestCaseUnit;

class CreateLoanActionUnitTest extends TestCaseUnit
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_should_created_loan_success()
    {
        $author = Author::factory()->make(['id' => 1]);
        $book = Book::factory()->make(['id' => 1]);

        $data = [
            'author_id' => $author->id,
            'book_id' => $book->id,
            'quantity' => 1,
        ];

        $loanMock = $this->createMock(Loan::class);
        $this->mock(Loan::class, function ($mock) use ($loanMock, $data) {
            $mock->shouldReceive('create')
                ->with($data)
                ->andReturn($loanMock);
        });

        $loan = (new CreateLoanAction())->execute($data);
        $this->assertEquals($loan, $loanMock);
    }
}

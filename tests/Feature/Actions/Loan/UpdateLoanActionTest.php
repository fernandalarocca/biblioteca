<?php

namespace Tests\Feature\Actions\Loan;

use App\Actions\Loan\UpdateLoanAction;
use App\Models\Author;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateLoanTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_updated_loan_success()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);

        $data = [
          'book_id' => $book->id,
          'author_id' => $author->id,
          'quantity' => 1
        ];

        $loanOld = Loan::factory()->create();
        $loanNew = (new UpdateLoanAction())->execute($data, $loanOld);

        $this->assertEquals($loanOld->id, $loanNew->id);
        $this->assertDatabaseHas('loans', [
            'id' => $loanOld->id,
            'book_id' => $book->id,
            'author_id' => $author->id,
            'quantity' => 1
        ]);
    }
}

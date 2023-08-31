<?php

namespace Tests\Feature\Actions\Loan;

use App\Actions\Loan\CreateLoanAction;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateLoanTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_created_loan_success()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);

        $data = [
            'author_id' => $author->id,
            'book_id' => $book->id,
            'quantity' => 1
        ];

        $loan = (new CreateLoanAction())->execute($data);

        $this->assertNotNull($loan->id);
        $this->assertDatabaseHas('loans',[
            'author_id' => $author->id,
            'book_id' => $book->id,
            'quantity' => 1
        ]);
    }
}

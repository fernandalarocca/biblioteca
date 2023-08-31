<?php

namespace Tests\Feature\Endpoints\Loans;

use App\Actions\Loan\UpdateLoanAction;
use App\Models\Author;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Tests\TestCase;

class UpdateLoanTest extends TestCase
{
    public function test_should_updated_book_success()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);

        $payload = [
            'book_id' => $book->id,
            'author_id' => $author->id,
            'quantity' => 1
        ];

        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->postJson('api/admin/loans', $payload)
            ->assertStatus(201);
    }
}

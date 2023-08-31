<?php

namespace Tests\Feature\Endpoints\Loans;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateLoanTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_created_loan_success()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);

        $payload = [
            'author_id' => $author->id,
            'book_id' => $book->id,
            'quantity' => 1
        ];

        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->postJson('api/admin/loans', $payload)
            ->assertStatus(201);
    }

    public function test_should_created_loan_with_error_validation()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);

        $payload = [
            'author_id' => $author->id,
            'book_id' => $book->id,
            'quantity' => 'um'
        ];

        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->postJson('api/admin/loans', $payload)
            ->assertStatus(422);
    }
}

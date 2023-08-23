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
        $author = Author::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'age' => 30,
            'description' => 'Um autor fictício para teste.',
        ]);

        $book = Book::create([
            'title' => 'Aristóteles e Dante descobrem os segredos do universo',
            'synopsis' => 'Em um verão tedioso, os jovens Aristóteles e Dante são unidos pelo acaso e, embora sejam completamente diferentes um do outro, iniciam uma amizade especial, do tipo que muda a vida das pessoas e dura para sempre.',
            'category' => 'Literatura',
            'published_at' => '2012-02-21',
            'quantity_in_stock' => '4',
            'author_id' => $author->id,
        ]);

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
        $author = Author::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'age' => 30,
            'description' => 'Um autor fictício para teste.',
        ]);

        $book = Book::create([
            'title' => 'Aristóteles e Dante descobrem os segredos do universo',
            'synopsis' => 'Em um verão tedioso, os jovens Aristóteles e Dante são unidos pelo acaso e, embora sejam completamente diferentes um do outro, iniciam uma amizade especial, do tipo que muda a vida das pessoas e dura para sempre.',
            'category' => 'Literatura',
            'published_at' => '2012-02-21',
            'quantity_in_stock' => '4',
            'author_id' => $author->id,
        ]);

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

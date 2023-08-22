<?php

use App\Actions\Book\CreateBookAction;
use App\Models\Author;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateBookTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_created_book_success()
    {
        $author = Author::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'age' => 30,
            'description' => 'Um autor fictício para teste.',
        ]);

        $data = [
            'title' => 'Aristóteles e Dante descobrem os segredos do universo',
            'synopsis' => 'Em um verão tedioso, os jovens Aristóteles e Dante são unidos pelo acaso e, embora sejam completamente diferentes um do outro, iniciam uma amizade especial, do tipo que muda a vida das pessoas e dura para sempre.',
            'category' => 'Literatura',
            'published_at' => '2012-02-21',
            'quantity_in_stock' => '1',
            'author_id' => $author->id,
        ];

        $book = (new CreateBookAction())->execute($data);

        $this->assertNotNull($book->id);
        $this->assertDatabaseHas('books', [
            'title' => 'Aristóteles e Dante descobrem os segredos do universo',
            'synopsis' => 'Em um verão tedioso, os jovens Aristóteles e Dante são unidos pelo acaso e, embora sejam completamente diferentes um do outro, iniciam uma amizade especial, do tipo que muda a vida das pessoas e dura para sempre.',
            'category' => 'Literatura',
            'published_at' => '2012-02-21',
            'quantity_in_stock' => '1',
            'author_id' => $author->id,
        ]);
    }
}

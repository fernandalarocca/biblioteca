<?php

namespace Tests\Feature\Actions\Book;

use App\Actions\Book\UpdateBookAction;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateBookTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_updated_book_success()
    {
        $author = Author::factory()->create();
        $data = [
            'title' => 'Aristóteles e Dante descobrem os segredos do universo',
            'synopsis' => 'Em um verão tedioso, os jovens Aristóteles e Dante são unidos pelo acaso e, embora sejam completamente diferentes um do outro, iniciam uma amizade especial, do tipo que muda a vida das pessoas e dura para sempre.',
            'category' => 'Literatura',
            'published_at' => '2012-02-21',
            'quantity_in_stock' => '1',
            'author_id' => $author->id
        ];

        $bookOld = Book::factory()->create();
        $bookNew = (new UpdateBookAction())->execute($data, $bookOld);

        $this->assertEquals($bookOld->id, $bookNew->id);
        $this->assertDatabaseHas('books', [
            'title' => 'Aristóteles e Dante descobrem os segredos do universo',
            'synopsis' => 'Em um verão tedioso, os jovens Aristóteles e Dante são unidos pelo acaso e, embora sejam completamente diferentes um do outro, iniciam uma amizade especial, do tipo que muda a vida das pessoas e dura para sempre.',
            'category' => 'Literatura',
            'published_at' => '2012-02-21',
            'quantity_in_stock' => '1',
            'author_id' => $author->id
        ]);
    }
}

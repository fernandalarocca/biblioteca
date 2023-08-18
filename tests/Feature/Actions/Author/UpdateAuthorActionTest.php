<?php

namespace Tests\Feature\Actions\Author;

use App\Actions\Author\UpdateAuthorAction;
use Database\Factories\AuthorFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateAuthorTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_updated_author_success()
    {
        $data = [
            'first_name' => 'Elayne',
            'last_name' => 'Baeta',
            'age' => 25,
            'description' => 'Gosta de vinho tinto e não sabe dançar. Escreve as coisas que queria ter lido.'
        ];
        $author = AuthorFactory::new()->create();

        $author = (new UpdateAuthorAction())->execute($data, $author);

        $this->assertNotNull($author->id);
        $this->assertDatabaseHas('authors', [
            'first_name' => 'Elayne',
            'last_name' => 'Baeta',
            'age' => 25,
            'description' => 'Gosta de vinho tinto e não sabe dançar. Escreve as coisas que queria ter lido.'
        ]);
    }
}

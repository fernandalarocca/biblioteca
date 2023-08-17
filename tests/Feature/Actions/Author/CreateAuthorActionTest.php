<?php

namespace Tests\Feature\Actions\Author;

use App\Actions\Author\CreateAuthorAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateAuthorTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_created_author_success()
    {
        $data = [
            'first_name' => 'Elayne',
            'last_name' => 'Baeta',
            'age' => 25,
            'description' => 'Gosta de vinho tinto e não sabe dançar. Escreve as coisas que queria ter lido.'
        ];
        $author = (new CreateAuthorAction())->execute($data);
        $this->assertNotNull($author->id);
        $this->assertDatabaseHas('authors', [
            'first_name' => 'Elayne',
            'last_name' => 'Baeta',
            'age' => 25,
            'description' => 'Gosta de vinho tinto e não sabe dançar. Escreve as coisas que queria ter lido.'
        ]);
    }
}

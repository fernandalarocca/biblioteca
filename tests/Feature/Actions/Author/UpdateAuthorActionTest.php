<?php

namespace Tests\Feature\Actions\Author;

use App\Actions\Author\UpdateAuthorAction;
use App\Models\Author;
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

        $authorOld = Author::factory()->create();
        $authorNew = (new UpdateAuthorAction())->execute($data, $authorOld);

        $this->assertEquals($authorOld->id, $authorNew->id);
        $this->assertDatabaseHas('authors', [
            'first_name' => 'Elayne',
            'last_name' => 'Baeta',
            'age' => 25,
            'description' => 'Gosta de vinho tinto e não sabe dançar. Escreve as coisas que queria ter lido.'
        ]);
    }
}

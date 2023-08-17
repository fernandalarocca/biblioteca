<?php

namespace Tests\Feature\Endpoints\Author;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateAuthorTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_created_author_success()
    {
        $payload = [
            'first_name' => 'Elayne',
            'last_name' => 'Baeta',
            'age' => 25,
            'description' => 'Gosta de vinho tinto e não sabe dançar. Escreve as coisas que queria ter lido.'
        ];

        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->postJson('api/admin/authors', $payload)
            ->assertStatus(201);
    }
    public function test_should_created_author_with_error_validation()
    {
        $payload = [
            'first_name' => 'Elayne',
            'last_name' => 'Baeta',
            'age' => 'vinte e cinco',
            'description' => 'Gosta de vinho tinto e não sabe dançar. Escreve as coisas que queria ter lido.'
        ];

        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->postJson('api/admin/authors', $payload)
            ->assertStatus(422);
    }
}

<?php

namespace Feature\Endpoints\Clients;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateClientTest extends TestCase
{
    use RefreshDatabase;
    public function test_should_updated_user_success()
    {
        $payload = [
            'name' => 'teste',
            'email' => 'teste@email.com',
            'password' => '12345678',
            'is_admin' => true
        ];

        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->postJson('api/admin/clients', $payload)
            ->assertStatus(201);
    }

    public function test_should_updated_user_with_error_validation()
    {
        $payload = [
            'name' => 'teste',
            'email' => 'teste-email.com',
            'password' => '12345678',
            'is_admin' => true
        ];

        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->postJson('api/admin/clients', $payload)
            ->assertStatus(422);
    }
}

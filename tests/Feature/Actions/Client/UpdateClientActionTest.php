<?php

namespace Tests\Feature\Actions\Client;

use App\Actions\Client\UpdateClientAction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UpdateClientTest extends TestCase
{
    use RefreshDatabase;
    public function test_should_updated_user_success()
    {
        $data = [
            'name' => 'teste',
            'email' => 'teste@email.com',
            'password' => '12345678'
        ];
        $user = User::factory()->create();

        $user = (new UpdateClientAction())->execute($data, $user);

        $this->assertNotNull($user->id);
        $this->assertTrue(Hash::check($data['password'],$user->password));
        $this->assertDatabaseHas('users', [
            'name' => 'teste',
            'email' => 'teste@email.com'
        ]);
    }
}

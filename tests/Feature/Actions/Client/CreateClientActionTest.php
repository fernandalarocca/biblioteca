<?php

namespace Tests\Feature\Actions\Client;

use App\Actions\Client\CreateClientAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CreateClientTest extends TestCase
{
    use RefreshDatabase;
    public function test_should_created_user_success()
    {
        $data = [
            'name' => 'teste',
            'email' => 'teste@email.com',
            'password' => '12345678'
        ];

        $user = (new CreateClientAction())->execute($data);

        $this->assertNotNull($user->id);
        $this->assertTrue(Hash::check($data['password'],$user->password));
        $this->assertDatabaseHas('users', [
            'name' => 'teste',
            'email' => 'teste@email.com'
        ]);
    }
}

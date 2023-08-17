<?php

namespace App\Actions\Client;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateClientAction
{
    public function execute(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::make($data);
        $user->save();
        return $user;
    }
}

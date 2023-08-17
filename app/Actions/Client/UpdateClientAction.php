<?php

namespace App\Actions\Client;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateClientAction
{
    public function execute(array $data, User $user): User
    {
        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return $user;
    }
}

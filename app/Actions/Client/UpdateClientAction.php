<?php

namespace App\Actions\Client;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateClientAction
{
    public function execute(array $data, User $user): User
    {
        if($password = data_get($data, 'password')){
            $data['password'] = Hash::make($password);
        }

        $user->update($data);
        return $user;
    }
}

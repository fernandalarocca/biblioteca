<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(ClientRequest $request, int $userId)
    {
        $user = User::query()->find($userId);
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return ClientResource::make($user);
    }
}

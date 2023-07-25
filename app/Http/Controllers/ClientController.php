<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function list()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return ClientResource::make($user);
    }

    public function create(ClientRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::make($data);
        $user->save();

        return ClientResource::make($user);
    }

    public function update(ClientRequest $request, User $user)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return ClientResource::make($user);
    }

    public function delete(User $user)
    {
        $user->delete();
        return $user;
    }
}

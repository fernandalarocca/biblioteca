<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'string', 'min:5', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'max:255']
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = User::make($data);
        $user->save();

        return ClientResource::make($user);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'string', 'min:5', 'max:255', "unique:users,email,$user->id"],
            'password' => ['required', 'string', 'min:6', 'max:255']
        ]);

        $data = $request->all();
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

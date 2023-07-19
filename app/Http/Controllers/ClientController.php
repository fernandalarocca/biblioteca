<?php

namespace App\Http\Controllers;

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
        return $user;
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $author = User::make($data);
        $author->save();
        return $author;
    }
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return $user;
    }
    public function delete(User $user)
    {
        $user->delete();
        return $user;
    }
}

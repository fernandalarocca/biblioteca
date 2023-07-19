<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->all();
        $user = User::query()->where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json(['message' => 'email ou senha incorretos'], 401);
        }

        $token = $user->createToken('API TOKEN');

        return response()->json(['token' => $token->plainTextToken], 200);
    }
}

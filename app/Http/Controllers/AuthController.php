<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Método de login.
     * @header Content-Type application/json
     * @header Accept application/json
     * @bodyParam email string required. Example: admin@email.com
     * @bodyParam password string required. Example: 12345678
     * @response scenario=success {
     *   "token": "7|BsB4L6b8pbtazpCfPAEOzdr9HKs1bBpICuYq1i0c"
     *  }
     * @response status=404 scenario="user not authenticated" {"message": "email ou senha incorretos"}
     */
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

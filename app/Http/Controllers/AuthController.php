<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

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
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'username' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    public function showLogin()
    {
        $credentials = ['email' => 'admin@email.com', 'password' => '12345678'];

        Auth::attempt($credentials);
        return view("auth.login-form");
    }
}

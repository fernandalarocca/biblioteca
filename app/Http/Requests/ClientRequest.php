<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'string', 'min:5', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'max:255'],
            'is_admin' => ['required', 'boolean'],

        ];
    }
}

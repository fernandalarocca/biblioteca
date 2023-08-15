<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
{
    public function rules()
    {
        return [
            $userId = optional($this->route())->id,
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => [
                'required',
                Rule::unique('users')->ignore($userId)
            ],
            'password' => ['required', 'string', 'min:6', 'max:255'],
            'is_admin' => ['required', 'boolean']
        ];
    }
}

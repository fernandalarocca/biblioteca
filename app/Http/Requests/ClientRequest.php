<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
{
    public function rules()
    {
        $userId = optional($this->route())->user;
        $rules = [
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($userId)
            ],
            'password' => ['required', 'string', 'min:6', 'max:255'],
            'is_admin' => ['required', 'boolean']
        ];

        if($this->method('PUT') && $this->user) {
            $rules['password'] = ['sometimes', 'string', 'min:6', 'max:255'];
        }

        return $rules;
    }
}

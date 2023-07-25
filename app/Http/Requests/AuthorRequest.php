<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'min:5', 'max:255'],
            'last_name' => ['required', 'string', 'min:5', 'max:255'],
            'age' => ['required', 'integer'],
            'description' => ['required', 'string', 'min:6', 'max:255']
        ];
    }
}

<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
{
    public function rules()
    {
        return [
            'author_id' => ['required', 'integer', 'exists:authors,id'],
            'book_id' => ['required', 'integer', 'exists:books,id'],
            'quantity' => ['required', 'integer']
        ];
    }
}

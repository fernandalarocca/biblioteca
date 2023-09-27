<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'synopsis' => ['required', 'string', 'min:10', 'max:255'],
            'category' => ['required', 'string', 'min:3', 'max:255'],
            'published_at' => ['required', 'date'],
            'quantity_in_stock' => ['required', 'integer'],
            'author_id' => ['required', 'integer', 'exists:authors,id']
        ];
    }
}

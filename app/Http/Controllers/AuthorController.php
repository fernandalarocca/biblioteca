<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function list()
    {
        return Author::all();
    }

    public function show(Author $author)
    {
        return AuthorResource::make($author);
    }

    public function create(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'min:5', 'max:255'],
            'last_name' => ['required', 'string', 'min:5', 'max:255'],
            'age' => ['required', 'integer'],
            'description' => ['required', 'string', 'min:6', 'max:255']
        ]);

        $data = $request->all();
        $author = Author::make($data);
        $author->save();

        return AuthorResource::make($author);
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'min:5', 'max:255'],
            'last_name' => ['required', 'string', 'min:5', 'max:255'],
            'age' => ['required', 'integer'],
            'description' => ['required', 'string', 'min:6', 'max:255']
        ]);

        $data = $request->all();
        $author->update($data);
        return AuthorResource::make($author);
    }

    public function delete(Author $author)
    {
        $author->delete();
        return $author;
    }
}

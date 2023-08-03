<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;

class AuthorController extends Controller
{
    public function list()
    {
        $perpage = request()->query('limit', 5);
        $authors = Author::query()->paginate($perpage);
        return AuthorResource::collection($authors);
    }

    public function show(Author $author)
    {
        return AuthorResource::make($author);
    }

    public function create(AuthorRequest $request)
    {
        $data = $request->validated();
        $author = Author::make($data);
        $author->save();
        return AuthorResource::make($author);
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $data = $request->validated();
        $author->update($data);
        return AuthorResource::make($author);
    }

    public function delete(Author $author)
    {
        $author->delete();
        return $author;
    }
}

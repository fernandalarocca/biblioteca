<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function list()
    {
        return Author::all();
    }
    public function show($id)
    {
        return Author::find($id);
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $author = Author::make($data);
        $author->save();
        return $author;
    }
    public function update(Request $request, Author $author)
    {
        $data = $request->all();
        $author->update($data);
        return $author;
    }
    public function delete($id)
    {
        $author=Author::find($id);
        $author->delete();
        return $author;
    }
}

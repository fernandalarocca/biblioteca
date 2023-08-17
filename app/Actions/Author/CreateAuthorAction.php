<?php

namespace App\Actions\Author;

use App\Http\Resources\AuthorResource;
use App\Models\Author;

class CreateAuthorAction
{
    public function execute(array $data): AuthorResource
    {
        $author = Author::make($data);
        $author->save();
        return AuthorResource::make($author);
    }
}

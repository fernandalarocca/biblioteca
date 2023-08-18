<?php

namespace App\Actions\Author;

use App\Http\Resources\AuthorResource;
use App\Models\Author;

class UpdateAuthorAction
{
    public function execute(array $data, Author $author): AuthorResource
    {
        $author->update($data);
        return AuthorResource::make($author);
    }
}

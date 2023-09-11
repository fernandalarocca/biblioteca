<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Listar autores
     *
     * Endpoint para listar todos os autores
     *
     * @groups authors
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @responseFile app/api-documentation/admin/authors/list.json
     * @responseFile 404 app/api-documentation/admin/authors/404.json
     */
    public function list()
    {
        $perpage = request()->query('limit', 5);
        $authors = Author::query()->paginate($perpage);
        return AuthorResource::collection($authors);
    }

    /**
     * Visualizar autor
     *
     * Endpoint para listar um único autor
     *
     * @groups authors
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @responseFile app/api-documentation/admin/authors/show.json
     */
    public function show(Author $author)
    {
        return AuthorResource::make($author);
    }

    /**
     * Criar autor
     *
     * Endpoint para criar um autor
     *
     * @groups authors
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @bodyParam first_name string required Example: Taylor
     * @bodyParam last_name string required Example: Jenkins Reid
     * @bodyParam age int required Example: 39
     * @bodyParam description string required Example: É conhecida por seus livros Os Sete Maridos de Evelyn Hugo, Daisy Jones & The Six e Malibu Renasce.
     *
     * @responseFile app/api-documentation/admin/authors/create.json
     */
    public function create(AuthorRequest $request)
    {
        $data = $request->validated();
        $author = Author::make($data);
        $author->save();
        return AuthorResource::make($author);
    }

    /**
     * Editar autor
     *
     * Endpoint para editar um autor
     *
     * @groups authors
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @bodyParam first_name string required Example: Benjamin
     * @bodyParam last_name string required Example: Alire Sáenz
     * @bodyParam age int required Example: 18
     * @bodyParam description string required Example: Nasceu em 1954, no Novo México, Estados Unidos.
     *
     * @responseFile app/api-documentation/admin/authors/update.json
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $data = $request->validated();
        $author->update($data);
        return AuthorResource::make($author);
    }

    /**
     * Deletar autor
     *
     * Endpoint para deletar um autor
     *
     * @groups authors
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @responseFile app/api-documentation/admin/authors/delete.json
     */
    public function delete(Author $author)
    {
        $author->delete();
        return $author;
    }
}

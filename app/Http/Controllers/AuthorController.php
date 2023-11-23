<?php

namespace App\Http\Controllers;

use App\Actions\Author\CreateAuthorAction;
use App\Actions\Author\UpdateAuthorAction;
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
        $authorsResource = AuthorResource::collection($authors);
        return view("author.index", compact("authorsResource"));
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
     * @responseFile app/api-documentation/admin/authors/show.blade.php.json
     */
    public function show(Author $author)
    {
        $author = AuthorResource::make($author);
        return view('author.show', compact("author"));
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
    public function create()
    {
        return view('author.create');
    }

    public function store(AuthorRequest $request)
    {
        $data = $request->validated();
        $author = (new CreateAuthorAction())->execute($data);
        return redirect()->route('authors.list');
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
    public function edit(Author $author)
    {
        return view('author.update', compact("author"));
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $data = $request->validated();
        $author = (new UpdateAuthorAction())->execute($data, $author);
        return redirect()->route('authors.list');
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
        $author->loans()->delete();
        $author->delete();
        return redirect()->back();
    }
}

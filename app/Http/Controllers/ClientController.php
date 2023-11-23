<?php

namespace App\Http\Controllers;

use App\Actions\Client\CreateClientAction;
use App\Actions\Client\UpdateClientAction;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\ClientResource;
use App\Models\Book;
use App\Models\User;

class ClientController extends Controller
{
    /**
     * Listar usuários
     *
     * Endpoint para listar todos os usuários
     *
     * @groups clients
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @responseFile app/api-documentation/admin/clients/list.json
     * @responseFile 404 app/api-documentation/admin/clients/404.json
     */
    public function list()
    {
        $perpage = request()->query('limit', 50);
        $users = User::query()->paginate($perpage);
        $usersResource = ClientResource::collection($users);
        return view("user.index", compact("usersResource"));
    }

    /**
     * Visualizar usuário
     *
     * Endpoint para listar um único usuário
     *
     * @groups clients
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @responseFile app/api-documentation/admin/clients/show.blade.php.json
     */
    public function show(User $user)
    {
        $user = ClientResource::make($user);
        return view('user.show', compact("user"));
    }

    public function create()
    {
        return view('user.create');
    }

    /**
     * Criar usuário
     *
     * Endpoint para criar um usuário
     *
     * @groups clients
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @bodyParam name string required Example: Usuário Teste
     * @bodyParam email string required Example: teste1@email.com
     * @bodyParam password string required Example: 12345678
     * @bodyParam is_admin boolean required Example: false
     *
     * @responseFile app/api-documentation/admin/clients/create.json
     */
    public function store(ClientRequest $request)
    {
        $data = $request->validated();
        $user = (new CreateClientAction())->execute($data);
        return redirect()->route('clients.list');
    }

    public function edit(User $user)
    {
        return view('user.update', compact("user"));
    }

    /**
     * Editar usuário
     *
     * Endpoint para editar um usuário
     *
     * @groups clients
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @bodyParam name string required Example: Teste
     * @bodyParam email string required Example: teste1@email.com
     * @bodyParam password string required Example: 12345678
     * @bodyParam is_admin boolean required Example: false
     *
     * @responseFile app/api-documentation/admin/clients/update.json
     */
    public function update(ClientRequest $request, User $user)
    {
        $data = $request->validated();
        $user = (new UpdateClientAction())->execute($data, $user);
        return redirect()->route('clients.list');
    }

    /**
     * Deletar usuário
     *
     * Endpoint para deletar um usuário
     *
     * @groups clients
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @responseFile app/api-documentation/admin/clients/delete.json
     */
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}

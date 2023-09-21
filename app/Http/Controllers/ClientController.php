<?php

namespace App\Http\Controllers;

use App\Actions\Client\CreateClientAction;
use App\Actions\Client\UpdateClientAction;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
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
        return ClientResource::collection($users);
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
     * @responseFile app/api-documentation/admin/clients/show.json
     */
    public function show(User $user)
    {
        return ClientResource::make($user);
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
    public function create(ClientRequest $request)
    {
        $data = $request->validated();
        $user = (new CreateClientAction())->execute($data);
        return ClientResource::make($user);
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
        return ClientResource::make($user);
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
        return $user;
    }
}

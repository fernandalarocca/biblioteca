<?php

namespace App\Http\Controllers;

use App\Actions\Client\CreateClientAction;
use App\Actions\Client\UpdateClientAction;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\User;

class ClientController extends Controller
{
    public function list()
    {
        $perpage = request()->query('limit', 5);
        $users = User::query()->paginate($perpage);
        return ClientResource::collection($users);
    }

    public function show(User $user)
    {
        return ClientResource::make($user);
    }

    public function create(ClientRequest $request)
    {
        $data = $request->validated();
        $user = (new CreateClientAction())->execute($data);
        return ClientResource::make($user);
    }

    public function update(ClientRequest $request, User $user)
    {
        $data = $request->validated();
        $user = (new UpdateClientAction())->execute($data, $user);
        return ClientResource::make($user);
    }

    public function delete(User $user)
    {
        $user->delete();
        return $user;
    }
}

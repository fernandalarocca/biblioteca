<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Editar perfil
     *
     * Endpoint para editar o perfil do usuário
     *
     * @groups clients
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @bodyParam name string required Example: João da Silva
     * @bodyParam email string required Example: teste@email.com
     * @bodyParam password int required Example: 12345678
     * @bodyParam is_admin boolean required Example: false
     *
     * @responseFile app/api-documentation/client/profile/update.json
     */
    public function update(ClientRequest $request, int $userId)
    {
        $user = User::query()->find($userId);
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return ClientResource::make($user);
    }
}

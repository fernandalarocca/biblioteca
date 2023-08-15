<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'type' => $this->is_admin ? 'ADMIN' : 'CLIENT',
            optional($this->created_at)->format('d/m/Y H:i'),
            optional($this->updated_at)->format('d/m/Y H:i'),
        ];
    }
}

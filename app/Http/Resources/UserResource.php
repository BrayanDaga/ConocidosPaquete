<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'nombre' => (string) $this->name,
            'correo' => (string) $this->email,
            'fechaVerificacion' => (string) $this->email_verified_at,
            'fechaCreacion' => (string) $this->created_at,
            'fechaActualizacion' => (string) $this->updated_at,
            'Seguidores' => (int) $this->followersCount(),
            'Seguiendo' => (int) $this->followings()->get()->count(),
            'amigos' => (int) $this->getFriendsCount(),
            'posts' => (int) $this->posts()->count(),
        ];
    }
}

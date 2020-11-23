<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'usuario' => (int) $this->user_id,
            'titulo' => (string) $this->title,
            'contenido' => (string) $this->body,
            'fechaCreacion' => (string) $this->created_at,
            'fechaActualizacion' => (string) $this->updated_at,
            'likes' => (int) $this->likersCount(),
            'votes' => (int) $this->upvotersCount() ,
        ];
    }
}

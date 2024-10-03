<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ListaTipoServicioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [

            'id' => $this->id,
            'slug' => $this->slug,
            'nombres' => $this->nombres,
            'user_id' => $this->user_id,
            'estado' => $this->estado,
            'icono_url' => 'http://127.0.0.1:8000'.Storage::url($this->icono_url),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

        ];
    }
}

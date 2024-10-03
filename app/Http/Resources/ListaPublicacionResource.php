<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListaPublicacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'codigo_aleatorio' => $this->codigo_aleatorio,
            'created_at' => $this->created_at,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
            'estado_proceso_id' => $this->estado_proceso_id,
            'fecha_publicacion' => $this->fecha_publicacion,
            'fecha_registrada' => $this->fecha_registrada,
            'id' => $this->id,
            'nombres' => $this->nombres,
            'persona_id' => $this->persona_id,
            'servicio_id' => $this->servicio_id,

            'servicio_nombre' => $this->servicio->nombres,
            'slug' => $this->slug,
            'tipo_servicio_id' => $this->tipo_servicio_id,
            'tipo_servicio_nombre' => $this->tipoServicio->nombres,

            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
            'persona_dato' => $this->personas->nombres . ' ' . $this->personas->apellido_paterno . ' ' . $this->personas->apellido_materno,
            'persona_email' => $this->personas->email,
            'persona_numero_celular' => $this->personas->numero_celular,

            'calificacion' => round($this->calificaciones->where('estado_proceso_id', 2)->where('estado', 1)->avg('valor'))
        ];
    }
}

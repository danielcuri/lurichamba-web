<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    
    use HasFactory;
    
    protected $guarded = ['id'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function personas(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }
    public function estadosProceso(){
        return $this->belongsTo(EstadoProceso::class, 'estado_proceso_id');
    }
    public function tipoServicio(){
        return $this->belongsTo(TipoServicio::class, 'tipo_servicio_id');
    }
    public function servicio(){
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

    public function traerPublicaciones($id){

        $datos = (object)[
            'ultimos' => Publicacion::where('persona_id', $id)->where('estado', 1)->orderBy('updated_at', 'desc')->limit(5)->get(),
            'total' => Publicacion::where('persona_id', $id)->where('estado', 1)->count(),
            'aceptadas' => Publicacion::where('persona_id', $id)->where('estado_proceso_id', 2)->where('estado', 1)->count(),
            'pendientes' => Publicacion::where('persona_id', $id)->where('estado_proceso_id', 1)->where('estado', 1)->count(),
        ];

        return $datos;
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class, 'publicacion_id');
    }

    public function traerPublicacion($id)
    {
        $tipoServicios = Publicacion::where('id', [$id])->first();

        return $tipoServicios;
    }
    // public function fromDateTime($value)
    // {
    //     return DateTime::createFromFormat('Y-m-d H:i:s.u', parent::fromDateTime($value));
    // }
}

<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory; 
    protected $guarded = ['id'];
    
    public function clientes(){
        return $this->belongsTo(Persona::class, 'cliente_id');
    }
    public function estadosProceso(){
        return $this->belongsTo(EstadoProceso::class, 'estado_proceso_id');
    }
    public function personas(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }


    public function publicacion(){
        return $this->belongsTo(Publicacion::class, 'publicacion_id');
    }

    // public function fromDateTime($value)
    // {
    //     return DateTime::createFromFormat('Y-m-d H:i:s.u', parent::fromDateTime($value));
    // }
}

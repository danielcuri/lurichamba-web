<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

        public function tipoServicio(){
            return $this->belongsTo(TipoServicio::class, 'tipo_servicio_id');
        }
    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, 'servicio_id');
    }
    public function fromDateTime($value)
    {
        return DateTime::createFromFormat('Y-m-d H:i:s.u', parent::fromDateTime($value));
    }

}

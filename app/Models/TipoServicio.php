<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, 'id');
    }

    public function traerTipoServicios()
    {
        $tipoServicios = TipoServicio::all();

        return $tipoServicios;
    }
    public function fromDateTime($value)
    {
        return DateTime::createFromFormat('Y-m-d H:i:s.u', parent::fromDateTime($value));
    }

    
}

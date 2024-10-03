<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumentacion extends Model
{
    use HasFactory;

    public function personaDocumento(){
        return $this->hasMany(PersonaDocumento::class, 'tipo_documentacion_id');
    }
    public function fromDateTime($value)
    {
        return DateTime::createFromFormat('Y-m-d H:i:s.u', parent::fromDateTime($value));
    }
}

<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaDocumento extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function tipoDocumentacion(){
        return $this->belongsTo(TipoDocumentacion::class, 'tipo_documentacion_id');
    }
    
    public function estadosProceso(){
        return $this->belongsTo(EstadoProceso::class, 'estado_proceso_id');
    }

    public function traerDocumentos($id){

        $documentos = PersonaDocumento::where('persona_id', [$id])->get();
        
        return $documentos;
    }
    
}

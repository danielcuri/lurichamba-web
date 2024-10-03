<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipanteTicket extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv2';

    protected $table = 'Bd_Reporte_Satrim.sorteo.ListTikets';
    protected $primaryKey = 'persona_id';
}

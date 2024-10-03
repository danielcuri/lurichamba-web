<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv2';

    protected $table = 'Bd_Reporte_Satrim.sorteo.ListContris';
    protected $primaryKey = 'persona_id';
}

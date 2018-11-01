<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CargPers extends Model
{
    protected $table = 'cargpers';
    protected $fillable = [
        'CargPersID',
        'cargos_CargosID',
        'personas_PersonasID',
        'CargPersFechaInicio',
        'CargPersFechaFin',
        'CargPersPruebaInicio',
        'CargPersPruebaFin',
        'CargPersUsuario',
        'created_at',
        'updated_at',
        'CargPersEstado',
    ];
}

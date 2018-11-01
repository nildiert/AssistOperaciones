<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersContr extends Model
{
    protected $table='perscontr';
    protected $fillable=[
        'PersContrID',
        'Personas_PersonasID',
        'Contratos_ContId',
        'PersContrFechaInicio',
        'PersContrFechaFin',
        'created_at',
        'updated_at',
        'PersContrUsuario',
        'PersContrEstado',

    ];
}

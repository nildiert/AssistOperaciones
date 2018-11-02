<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $table = 'asignacion';
    protected $fillable = [
        'asigID',
        'personas_PersonasID',
        'proyecto_ProyID',
        'factproyec_FactProyecID',
        'asigFechaIni',
        'asigPorcentaje',
        'asigFechaFin',
        'asignacionUbicacion',
        'asig_Usuario',
        'asig_estado',
        'asigFecha',
        'created_at',
        'updated_at',

    ];
}

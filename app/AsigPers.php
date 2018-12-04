<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsigPers extends Model
{
    protected $table ="asigpers";
    protected $fillable=[
            'id',
            'asignacion_asigID',
            'personas_PersonasID',
            'fechaInicio',
            'fechaFin',
            'porcentaje',
            'observaciones',
            'ubicacion',
            'estado',
            'created_at',
            'updated_at',
    ];
}

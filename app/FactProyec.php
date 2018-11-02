<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactProyec extends Model
{
    //
    protected $table='factproyec';
    protected $fillable=[
        'FactProyecID',
        'FactProyecTipo',
        'FactProyecCodigo',
        'FactProyecFechaIni',
        'FactProyecFechaFin',
        'FactProyec_Usuario',
        'FactProyec_Estado',
        'created_at',
        'updated_at',
    ];
}

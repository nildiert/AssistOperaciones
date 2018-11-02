<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //
    protected $table="proyecto";
    protected $fillable=[
        'ProyID',
        'cliente_cliID',
        'ProyectoNombre',
        'ProyCodigo',
        'ProyFechaIni',
        'ProyectoFechaFin',
        'ProyectoPresupuesto',
        'Proyecto_Usuario',
        'ProyectoEstado',
        'ProyectoDescripcion',
        'created_at',
        'updated_at',

    ];
}

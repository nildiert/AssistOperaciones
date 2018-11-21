<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GerenProyec extends Model
{
    protected $table = 'gerenproyec';
    protected $fillable = [
        'GerenProyecID',
        'Gerente_GerenteID',
        'Proyecto_ProyID',
        'GerenProyecFechaInic',
        'GerenProyecFechaFin',
        'GerenProyec_Usuario',
        'GerenProyec_Estado',
        'created_at',
        'updated_at',

    ];
}

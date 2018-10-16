<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gerentes extends Model
{
    //
    protected $table="gerente";
    protected $fillable= [
        'GerenteID',
        'GerenteNombre',
        'GerenteFechaInicio',
        'GerenteFechaFin',
        'created_at',
        'updated_at',
        'Gerente_Usuario',
        'Gerente_estado',

    ];
}

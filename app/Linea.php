<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    //
    protected $table="lineanegocio";
    protected $fillable = [
        'linNegID',
        'linNegNombre',
        'created_at',
        'updated_at',
        'linNegUsuario',
        'linNegEstado',
    ];
}


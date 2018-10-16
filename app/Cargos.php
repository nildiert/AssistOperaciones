<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    //
    protected $table = 'cargos';
    protected $fillable = [
        'CargosID',
        'CargosNombre',
        'CargosDescripcion',
        'created_at',
        'updated_at',
        'CargosUsuario',
        'CargosEstado',
    ];
}

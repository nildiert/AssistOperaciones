<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $table = 'asignacion';
    protected $fillable = [
            'asigID',
            'asigCodigo',
            'asig_Usuario',
            'factproyec_FactProyecID',
            'asig_estado',
            'created_at',
            'updated_at',

    ];
}

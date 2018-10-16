<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
    //
    protected $table="contratos";
    protected $fillable=[
        'ContId',
        'ContTipo',
        'ContDescripcion',
        'created_at',
        'updated_at',
        'ContUsuario',
        'ContEstado',
    ];
}

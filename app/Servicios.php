<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    //
    protected $table="servicios";
    protected $fillable=[
        'ServId',
        'ServNombre',
        'created_at',
        'updated_at',
        'ServUsuario',
        'ServEstado',
    ];
}

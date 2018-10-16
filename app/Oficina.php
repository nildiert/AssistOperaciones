<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    //
    protected $table="oficina";
    protected $fillable=[
        'idOfic',
        'OficNumero',
        'updated_at',
        'created_at',
        'Ofic_usuario',
        'Ofic_estado',

    ];

}

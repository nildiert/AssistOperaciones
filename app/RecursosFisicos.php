<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecursosFisicos extends Model
{
    //
    protected $table="recursosfisicos";
    protected $fillable=[
        'RecFisID',
        'RecFisCod',
        'RecFisTipo',
        'created_at',
        'updated_at',
        'RecFis_usuario',
        'RecFis_Estado',

    ];
}

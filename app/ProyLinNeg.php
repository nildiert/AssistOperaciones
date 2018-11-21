<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyLinNeg extends Model
{
    protected $table= 'proylinneg';
    protected $fillable = [

        'proyLinNegID',
        'lineanegocio_linNegID',
        'proyecto_ProyID',
        'proyLinNegTipo',
        'proyLinNeg_Usuario',
        'proyLinNegEstado',
        'created_at',
        'updated_at',

    ];

}

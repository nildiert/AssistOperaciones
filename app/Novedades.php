<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedades extends Model
{
    //
    protected $table="novedades";
    protected $fillable=([
        'NovId',
        'NovTipo',
        'created_at',
        'updated_at',
        'NovUsuario',
        'NovEstado',
    ]);
}

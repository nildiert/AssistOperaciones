<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    //
    protected $table="empresa";
    protected $fillable=[
        'EmpId',
        'EmpNombre',
        'created_at',
        'updated_at',
        'EmpUsuario',
        'EmpEstado',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //
    protected $table="cliente";
    protected $fillable=[
        'cliID',
        'cliNombre',
        'cliCod',
        'created_at',
        'updated_at',
        'cli_Usuario',
        'cli_Estado',


    ];
}

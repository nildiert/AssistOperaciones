<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    //
    protected $table="personas";
    protected $fillable = [
        'PersonasID',
        'PersonasNombreCompleto',
        'PersonasPriApellido',
        'PersonasSegApellido',
        'PersonasPrimNombre',
        'PersonasSegNombre',
        'PersonasDocumento',
        'PersonasTipoDoc',
        'PersonasTel',
        'PersonasEspecialidad',
        'PersonasActivo',
        'PersonasTitulo',
        'PersonasFechaIngreso',
        'PersonasFechaRetiro',
        'created_at',
        'updated_at',
        'PersonasUsuario',
        'PersonasEstado'
    ];
}

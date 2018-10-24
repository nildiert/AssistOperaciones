<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersHabil extends Model
{
    //
    protected $table ='pershabil';
    protected $fillable = [
        'PersHabilID',
        'Habilidadess_HabilidadesID',
        'personas_PersonasID',
        'PersHabilCertificacion',
        'PersHabilNivExp',
        'created_at',
        'updated_at',
        'PersHabilUsuario',
        'PersHabilEstado',

    ];

    public function personas(){
        return $this->belongsTo(Personas::class, 'PersonasID', 'personas_PersonasID');
    }

    public function habilidades(){
        return $this->belongsTo(Habilidades::class,'HabilidadesID','Habilidadess_HabilidadesID');
    }
}

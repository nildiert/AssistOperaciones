<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilidades extends Model
{
    //
    protected $table ="habilidades";
    protected $fillable =[
        'HabilidadesID',
        'HabilidadesNombre',
        'HabilidadesTipo',
        'created_at',
        'updated_at',
        'HabilidadesUsuario',
        'HabilidadesEstado',
    ];
    public function habilidades(){
        return $this->hasMany(Habilidades::class);
    }
}

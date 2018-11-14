<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function users(){
        return $this->belongsToMany('App\User');
    }

    protected $table = 'roles';
    protected $fillable = [
        'id',
        'name',
        'description',
        'created_at',
        'updated_at',
    ];
}

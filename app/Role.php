<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'roles';
    protected $fillable =[
        'rolid',
        'rolName',
        'rolDescription',
        'created_at',
        'updated_at',
    ];
    public function users(){
        return $this->belongsToMany('App\User')
        ->withTimestamps();
    }
    
}

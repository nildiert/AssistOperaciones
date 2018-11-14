<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    protected $table = 'role_user';
    protected $fillable = [
        'id',
        'roles_id',
        'users_id',
        'created_at',
        'updated_at',


    ];
}

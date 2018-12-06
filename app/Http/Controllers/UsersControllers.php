<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

class UsersControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $usuarios = User::leftJoin('role_user','role_user.users_id','users.id')
        // ->leftJoin('roles','roles.rolId','role_user.roles_id')->get();
        $usuarios =User::leftJoin('role_user','role_user.user_id','users.id')
        ->leftJoin('roles','roles.id','role_user.role_id')
        ->select(
            'users.name AS name',
            'users.id AS id',
            'users.email AS email',
            'users.phone AS phone',
            'users.indenty AS indenty',
            'roles.name AS rol',
            'roles.description AS description',
            'role_user.role_id AS role_id',
            'role_user.id AS role_user_id'
        )
            ->where('roles.name','!=',NULL)
            ->get();
            // return $usuarios;
        $usuariosInactivos =User::leftJoin('role_user','role_user.user_id','users.id')
        ->leftJoin('roles','roles.id','role_user.role_id')
        ->select(
            'users.email AS email',
            'users.id AS id',
            'users.name AS name',
            'users.phone AS phone',
            'users.indenty AS indenty',
            'roles.name AS rol',
            'roles.description AS description'
        )
            ->where('roles.name',NULL)
            ->get();

            $roles= Role::select('description','id')->pluck('description','id');
            $cuenta = $usuariosInactivos->count();

            // return $usuarios;
        return view('usuarios.index',compact('usuarios','usuariosInactivos','cuenta','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

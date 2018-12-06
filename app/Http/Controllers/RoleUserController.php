<?php

namespace App\Http\Controllers;

use App\RoleUser;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

         foreach($request->input()['nuevoRol'] as $key=>$value){
             $rolUser = new RoleUser($value);
             if($rolUser->role_id !=NULL){
                    $rolUser->save();
             }
         }
         return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function show(RoleUser $roleUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleUser $roleUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $request;
    }
    // public function update(Request $request, RoleUser $roleUser)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleUser $roleUser)
    {
        //
    }
    public function actualizar(Request $request){
        
        foreach($request->input()['actualizarRol'] AS $key=>$value){
            
            $userRol =RoleUser::where('id',$value['id'])->first();
            $rol=(int)($value['role_id']);
            $userRol->role_id = $rol;
            $userRol->save();
            
        }
        return redirect()->back();
    }
    
}

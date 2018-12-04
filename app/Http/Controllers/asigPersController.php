<?php

namespace App\Http\Controllers;

use App\AsigPers;
use Illuminate\Http\Request;

class asigPersController extends Controller
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
            foreach($request->input()['nuevaAsignacion'] as $key=>$value):
            
             $asig = new AsigPers($value);
            $asig->save();
        endforeach;

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AsigPers  $asigPers
     * @return \Illuminate\Http\Response
     */
    public function show(AsigPers $asigPers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AsigPers  $asigPers
     * @return \Illuminate\Http\Response
     */
    public function edit(AsigPers $asigPers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AsigPers  $asigPers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsigPers $asigPers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AsigPers  $asigPers
     * @return \Illuminate\Http\Response
     */
    public function destroy(AsigPers $asigPers)
    {
        //
    }
}

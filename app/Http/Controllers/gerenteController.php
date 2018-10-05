<?php

namespace App\Http\Controllers;

use App\Gerentes;
use Illuminate\Http\Request;

class gerenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gerentes = Gerentes::orderBy('GerenteID','DESC')->paginate(3);
        return $gerentes;
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
     * @param  \App\Gerentes  $gerentes
     * @return \Illuminate\Http\Response
     */
    public function show(Gerentes $gerentes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gerentes  $gerentes
     * @return \Illuminate\Http\Response
     */
    public function edit(Gerentes $gerentes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gerentes  $gerentes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gerentes $gerentes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gerentes  $gerentes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gerentes $gerentes)
    {
        //
    }
}

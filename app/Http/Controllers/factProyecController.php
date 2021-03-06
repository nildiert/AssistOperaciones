<?php

namespace App\Http\Controllers;

use App\FactProyec;
use Illuminate\Http\Request;

class factProyecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factpProyecs = FactProyec::orderBy('FactProyecCodigo','DESC')->get();
        return view('factproyec.index',compact('factpProyecs'));
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
        $this->validate($request,[
            'FactProyecTipo'=>'required',
            'FactProyecCodigo'=>'required',
            'FactProyecFechaIni'=>'required',
            'proyecto_id'=>'required',
        ]);

        $factProye = FactProyec::create($request->only([
            'FactProyecTipo',
            'FactProyecCodigo',
            'FactProyecFechaIni',
            'FactProyecFechaFin',
            'proyecto_id',
        ]));
        return redirect()->route('proyecto.show',$request->proyecto_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FactpProyec  $factpProyec
     * @return \Illuminate\Http\Response
     */
    public function show(FactpProyec $factpProyec)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FactpProyec  $factpProyec
     * @return \Illuminate\Http\Response
     */
    public function edit(FactpProyec $factpProyec)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FactpProyec  $factpProyec
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FactpProyec $factpProyec)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FactpProyec  $factpProyec
     * @return \Illuminate\Http\Response
     */
    public function destroy(FactpProyec $factpProyec)
    {
        //
    }
}

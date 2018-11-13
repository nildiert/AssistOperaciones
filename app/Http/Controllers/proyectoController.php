<?php

namespace App\Http\Controllers;

use App\Proyecto;
use App\Clientes;
use App\Asignacion;
use Illuminate\Http\Request;

class proyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proyectos = Proyecto::orderBy('ProyectoNombre','DESC')->get();
        // return $proyectos;
        return view('proyecto.index',compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Contar la cantidad de proyectos por cliente y luego ejecutar el conteo
        $clientes = Clientes::orderBy('cliNombre','ASC')->pluck('cliNombre','cliID');
        return view('proyecto.create',compact('clientes'));
        // return $clientes;
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
        Proyecto::create($request->all());
        return redirect()->route('proyecto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // return $id;
        // // //
        $proyectos = Asignacion::leftJoin('proyecto','asignacion.factproyec_FactProyecID','ProyID')
        ->leftJoin('factproyec','factproyec.FactProyecID','asignacion.factproyec_FactProyecID')
        ->leftJoin('personas','personas.PersonasID','asignacion.personas_PersonasID')
        ->leftJoin('proyecto','proyecto.ProyID','asignacion.proyecto_ProyID')
        // ->where('ProyID','=',$id)
        ->get()
        ;

        // return $proyectos;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        //
    }
}

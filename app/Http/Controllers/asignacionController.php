<?php

namespace App\Http\Controllers;

use App\Asignacion;
use App\Personas;
use App\FactProyec;
use App\Proyecto;
use Alert;
use Illuminate\Http\Request;

class asignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $asignaciones = Personas::leftJoin('asignacion','personas_PersonasID','PersonasID')
        ->leftJoin('factproyec', 'FactProyecID','factproyec_FactProyecID')
        ->leftJoin('proyecto','id','proyecto_ProyID')
        ->where('asig_estado','=','1')
        ->get();
        return view('asignacion.index',compact('asignaciones'));
        // return $asignaciones;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Alert::message('Message','Optional Title');

        return view('asignacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       
        
        // $asignacionNueva = array(
        //     'personas_PersonasID'=>'',
        //     'asignacionUbicacion'=>'',
        //     'asigFechaIni'=>'',
        //     'asigFechaFin'=>'',
        //     'asigPorcentaje'=>'',
        //     'asigObservaciones'=>'',
        //     'factproyec_FactProyecID'=>'',
        //     'asigCodigo'=>'',

        // );


        // $rows = $request->input('personas_PersonasID','asigCodigo');
        // $rows = $request->asigCodigo[0];

        // $i =0;
        // $asignaciones= [];
        // dd($request->input()["asignacionUbicacion"]);
        // foreach($request->input() as $rq => $key):
        // $asig = new Asignacion();
        /* $asig->asignacionUbicacion = $rq->asignacionUbicacion[$key]; *//* 
           array_push($asignaciones, new Asignacion([
                'personas_PersonasID'=>$rq->personas_PersonasID,
                'asignacionUbicacion'=>$rq->asignacionUbicacion,
                'asigFechaIni'=>$rq->asigFechaIni,
                'asigFechaFin'=>$rq->asigFechaFin,
                'asigPorcentaje'=>$rq->asigPorcentaje,
                'asigObservaciones'=>$rq->asigObservaciones,
                'factproyec_FactProyecID'=>$rq->factproyec_FactProyecID,
                'asigCodigo'=>$rq->asigCodigo,
            ])); */
            // $i++;
            // array_push($asignaciones, $asig);
        // endforeach;
        // dd($asignaciones);

        
        // endforeach;
        // dd($asignacionNueva);    
        return dd($objeto);

        // return ($key);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function show(Asignacion $asignacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignacion $asignacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignacion $asignacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignacion $asignacion)
    {
        //
    }
}

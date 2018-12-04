<?php

namespace App\Http\Controllers;

use App\Asignacion;
use App\Personas;
use App\FactProyec;
use App\Proyecto;
use App\AsigPers;
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
        // foreach($request->input()['nuevaAsignacion'] as $key=>$value):
            
        //      $asig = new AsigPers($value);
        //     $asig->save();
        // endforeach;

        // return redirect()->back();


    
        Asignacion::create($request->only([
            'asigCodigo',
            'factproyec_FactProyecID',
        ]));
        return redirect()->back();

    //     return $request;
    //     $codigo = $request->nombreAsignacion;
    //     $factura =$request->Factura;
    //     $data=[];
        
        
    //     $proyecto = FactProyec::select('proyecto_id')->where('FactProyecID','=',$request->Factura)->pluck('proyecto_id')->first();

    //     // foreach($data as $dt=>$v){
    //     //     //Los valores del arreglo se van guardando a medida que se recorren en $v, por ello los valroes que se insertan son 
    //     //     // los de la variable $v

    //     //     Asignacion::insert($v);
    //     // }
    // // return ($data);
    // return redirect()->route('proyecto.show',$proyecto);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function show($asignacion)
    {
        $asignados = AsigPers::leftJoin('asignacion','asigpers.asignacion_asigID','asignacion.asigID')
        ->leftJoin('personas','asigpers.personas_PersonasID','personas.PersonasID')
        ->orderBy('PersonasNombreCompleto','ASC')
        ->where('asignacion.asigID',$asignacion)
        ->get();

        // return $asignados;
        $asigCodigo = Asignacion::select('asigCodigo')->where('factproyec_FactProyecID','=',$asignacion)->pluck('asigCodigo')->first();
        $personas = Personas::select('PersonasID','PersonasNombreCompleto')
        ->orderBy('PersonasNombreCompleto','ASC')
        ->pluck('PersonasNombreCompleto','PersonasID');
        // return $asignados;
        
        return view('asignacion.show',compact('asignados','asigCodigo','asignacion','personas'));
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

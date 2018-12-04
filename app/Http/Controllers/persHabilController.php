<?php

namespace App\Http\Controllers;

use DB;
use App\PersHabil;
use App\Personas;
use App\Habilidades;
use Illuminate\Http\Request;

class persHabilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pershabil = Personas::leftJoin('pershabil', 'personas.PersonasID', 'pershabil.personas_PersonasID')
            ->leftJoin('habilidades','HabilidadesID','Habilidadess_HabilidadesID')
            ->get();

            return view('pershabil.index',compact('pershabil'));

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


        $id = $request->id;
        $data=[];
        
        foreach($request->input()['nuevaHabilidad'] as $key=>$value){


            $perhabil = new PersHabil($value);
            $perhabil->personas_PersonasID = $id;
            if($perhabil->Habilidadess_HabilidadesID){
                $perhabil->save();
            }

        }
        return redirect()->route('personas.show',$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersHabil  $persHabil
     * @return \Illuminate\Http\Response
     */
    public function show(PersHabil $persHabil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersHabil  $persHabil
     * @return \Illuminate\Http\Response
     */
    public function edit(PersHabil $persHabil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersHabil  $persHabil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersHabil $persHabil) 
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersHabil  $persHabil
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersHabil $persHabil)
    {
        //
    }
    public function search(Request $skill){

        $habilidades = Personas::select('HabilidadesID','habilidades.HabilidadesNombre',DB::raw('COUNT(HabilidadesNombre) as cantidad'))
        ->leftJoin('pershabil','pershabil.personas_PersonasID','personas.PersonasID')
        ->leftJoin('habilidades','pershabil.Habilidadess_HabilidadesID','habilidades.HabilidadesID')
        ->orderBy('HabilidadesNombre','ASC')
        ->groupBy('HabilidadesNombre')
        ->where('PersonasEstado','1')
        ->where('HabilidadesNombre','like','%'.$skill->busqueda.'%')
        ->get();

        return view('habilidades.index',compact('habilidades'));
    }
}

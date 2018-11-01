<?php

namespace App\Http\Controllers;

use App\CargPers;
use App\Personas;
use App\Cargos;
use App\PersContr;
use App\Contratos;

use Illuminate\Http\Request;

class CargPersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargpers =Personas::leftJoin('cargpers','personas.PersonasID','personas_PersonasID')
        ->leftJoin('cargos','cargos.CargosID','cargpers.cargos_CargosID')
        ->leftJoin('perscontr','personas.PersonasID','perscontr.Personas_PersonasID')
        ->leftJoin('contratos','contratos.ContId','perscontr.PersContrID')
        ->get();

        return view('cargpers.index',compact('cargpers'));
        // return $cargpers;
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
     * @param  \App\CargPers  $cargPers
     * @return \Illuminate\Http\Response
     */
    public function show(CargPers $cargPers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CargPers  $cargPers
     * @return \Illuminate\Http\Response
     */
    public function edit(CargPers $cargPers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CargPers  $cargPers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CargPers $cargPers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CargPers  $cargPers
     * @return \Illuminate\Http\Response
     */
    public function destroy(CargPers $cargPers)
    {
        //
    }
    public function search(Request $request){


        $cargpers =Personas::leftJoin('cargpers','personas.PersonasID','personas_PersonasID')
                ->leftJoin('cargos','cargos.CargosID','cargpers.cargos_CargosID')
                ->leftJoin('perscontr','personas.PersonasID','perscontr.Personas_PersonasID')
                ->leftJoin('contratos','contratos.ContId','perscontr.PersContrID')
                ->where('CargosNombre','like','%'.$request->busqueda.'%')
                ->get();

                // return $cargpers;
                return view('cargpers.index',compact('cargpers'));

    }

}

<?php

namespace App\Http\Controllers;

use App\Habilidades;
use Illuminate\Http\Request;

class habilidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $habilidades = Habilidades::orderBy('HabilidadesID','DESC')->paginate(50);
        return view('habilidades.index',compact('habilidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('habilidades.create');
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
        $this->validate($request,[
            'HabilidadesNombre'=>'required',
            'HabilidadesTipo'=>'required'
        ]);
        //Pasamos los datos a mayusculas
        $request->merge([
            'HabilidadesNombre'=>strtoupper($request->HabilidadesNombre),
            'HabilidadesTipo'=>strtoupper($request->HabilidadesTipo),
        ]);

        //Insertamos los datos en la base de dtos
        Habilidades::create($request->all());

        return redirect()->route('habilidades.index')->with('succes','Registro agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habilidades  $habilidades
     * @return \Illuminate\Http\Response
     */
    public function show(Habilidades $habilidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Habilidades  $habilidades
     * @return \Illuminate\Http\Response
     */
    public function edit(Habilidades $habilidades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habilidades  $habilidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habilidades $habilidades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habilidades  $habilidades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habilidades $habilidades)
    {
        //
    }
    public function search(Request $recurso){
        dd($_GET);
     return $recurso;
    }


}

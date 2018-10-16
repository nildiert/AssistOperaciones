<?php

namespace App\Http\Controllers;

use App\Personas;
use Illuminate\Http\Request;

class personasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personas = Personas::orderBy('PersonasID','DESC')->paginate(100);
        return view('personas.index',compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('personas.create');
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
            'PersonasPriApellido'=>'required',
            'PersonasSegApellido',
            'PersonasPrimNombre'=>'required',
            'PersonasSegNombre',
            'PersonasNombreCompleto',
            'PersonasDocumento'=>'required',
            'PersonasTipoDoc'=>'required',
            'PersonasTel'=>'required',
            'PersonasEspecialidad'=>'required',
            'PersonasTitulo'=>'required',
            'created_at',
            'updated_at',
            'PersonasNombreCompleto',
            'PersonasFechaIngreso'=>'required']);

            //Concatenamos nombres y apellidos para insertar el campo de nombre completo

        if(empty($request->PersonasSegNombre)){
            $PersonasNombreCompleto = $request->PersonasPriApellido.' '.$request->PersonasSegApellido.' '.$request->PersonasPrimNombre;
        }else{
            $PersonasNombreCompleto = $request->PersonasPriApellido.' '.$request->PersonasSegApellido.' '.$request->PersonasPrimNombre.' '.$request->PersonasSegNombre;
        }

        //Conversión a mayusculas antes de insertar en la base de datos
        //Agregamos el campo de nombre completo a la variable $request
        $request->merge([
            'PersonasNombreCompleto' => strtoupper($PersonasNombreCompleto),
        ]);

        $request->merge([
            'PersonasPriApellido' => strtoupper($PersonasNombreCompleto),
            'PersonasPriApellido' => strtoupper($request->PersonasPriApellido),
            'PersonasSegApellido' => strtoupper($request->PersonasSegApellido),
            'PersonasPrimNombre' => strtoupper($request->PersonasPrimNombre),
            'PersonasSegNombre' => strtoupper($request->PersonasSegNombre),
            'PersonasNombreCompleto' => strtoupper($request->PersonasNombreCompleto),
            'PersonasTipoDoc' => strtoupper($request->PersonasTipoDoc),
            'PersonasEspecialidad' => strtoupper($request->PersonasEspecialidad),
            'PersonasTitulo' => strtoupper($request->PersonasTitulo),
        ]);



            Personas::create($request->all());
        return redirect()->route('personas.index')->with('success','Registro agregado satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show(Personas $personas)
    {
        //
        return 'Estas en show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit(Personas $personas)
    {
        return 'Estas en edit';
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personas $personas)
    {
        //
        return 'Estas en update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personas $personas)
    {
        //
        return 'Estas en destroy';
    }
}

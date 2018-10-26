<?php

namespace App\Http\Controllers;

use App\Personas;
use Alert;
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

        $personas = Personas::orderBy('PersonasID','DESC')->where('PersonasEstado','1')->paginate(50);
        $activos = Personas::where('PersonasEstado','1')->count();
        return view('personas.index',compact('personas','activos'));
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
        Alert::success('Registro agregado exitosamente!');
    return redirect()->route('personas.index')->with('success','Registro agregado satisfactoriamente');
        return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $personas=Personas::find($id);
        return view('personas.show',compact('personas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personas= Personas::find($id);
        return view('personas.edit',compact('personas'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
   //
         $this->validate($request,[
        'PersonasPriApellido'=>'required',
        'PersonasSegApellido',
        'PersonasPrimNombre'=>'required',
        'PersonasSegNombre',
        'PersonasDocumento'=>'required',
        'PersonasTipoDoc'=>'required',
        'PersonasTel'=>'required',
        'PersonasEspecialidad'=>'required',
        'PersonasTitulo'=>'required',
        'PersonasFechaIngreso'=>'required'
        ]);
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
        Alert::success('Registro actualizado correctamente');

        Personas::find($id)->update($request->all());
        return redirect()->route('personas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $personas =Personas::find($id);

        Alert::success('Registro eliminado exitosamente');

        if($personas    != null){

            $personas->PersonasEstado = 0;
            $personas->PersonasActivo='INACTIVO';
            $personas->save();

            return redirect()->route('personas.index');

        }

        return redirect()->route('personas.index');

    }

    public function eliminar(Personas $personas){

    }
    public function search(Request $recurso){

        $personas =Personas::where('PersonasNombreCompleto','like','%'.$recurso->busqueda.'%')->paginate(10);
        $activos = Personas::where('PersonasEstado','1')->count();
        return view('personas.index',compact('personas','activos'));
    }

    public function prueba(){
        return '$mensaje';

    }

}

<?php

namespace App\Http\Controllers;

use App\Personas;
use App\Asignacion;
use App\Habilidades;
use App\Cargos;
use App\Contratos;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class personasController extends Controller
{
    public function __construct(){
        // $this->middleware(['auth','role:admin']);
        $this->middleware(['auth']);
        
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // $personas = Personas::orderBy('PersonasID','DESC')->where('PersonasEstado','1')->paginate(50);
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
                // return Auth::user
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
            'PersonasTel',
            'PersonasEspecialidad',
            'PersonasTitulo',
            'created_at',
            'updated_at',
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
        $contratos = Contratos::select('ContId','ContTipo')->pluck('ContTipo','ContId');
        $habilidades = Habilidades::orderBy('HabilidadesNombre','ASC')->pluck('HabilidadesNombre','HabilidadesID');
        $pershabil =  Personas::leftJoin('pershabil', 'personas.PersonasID', 'pershabil.personas_PersonasID')
        ->leftJoin('habilidades','HabilidadesID','Habilidadess_HabilidadesID')
        ->where('PersonasID','=',$id)
        ->get();
        $estados = ['ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO'];
        $personas =Personas::leftJoin('cargpers','personas.PersonasID','personas_PersonasID')
        ->leftJoin('cargos','cargos.CargosID','cargpers.cargos_CargosID')
        ->leftJoin('perscontr','personas.PersonasID','perscontr.Personas_PersonasID')
        ->leftJoin('contratos','contratos.ContId','perscontr.Contratos_ContId')
        ->where('PersonasID','=',$id)
        ->get();
        $proyectos = Asignacion::select('asignacion.asigCodigo as asigCodigo','asignacion.asigID as asigID','asigpers.porcentaje as porcentaje')->leftJoin('asigpers','asigpers.asignacion_asigID','asignacion.asigID')
        ->where('asigpers.personas_PersonasID',$id)->get();

        $cargos = Cargos::select('CargosID','CargosNombre')->pluck('CargosNombre','CargosID');

        $retiroPendiente = Personas::select('PersonasFechaRetiro')->where('PersonasID',$id)->pluck('PersonasFechaRetiro')->first();
        
        //Convertimos la fecha en el formato usado por Carbon 
        //Verificamos si hay retiros pendientes para el día de hoy con este consultor        
        $retiroHoy = Carbon::today()->eq(Carbon::parse($retiroPendiente));
        $retiroHoy = ((json_decode($retiroHoy)));
        
        return view('personas.show',compact('personas','pershabil','habilidades','id','cargos','contratos','proyectos','estados','retiroHoy'));
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
//    return $request;
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
        'PersonasActivo'=>'required',
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
        // return $request;
        Alert::success('Registro actualizado correctamente');

        Personas::find($id)->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        // Buscamos a la persona 
        $personas =Personas::find($id);

        
        // Si recibimos valores, ejecutamos lo siguiente:
        if($personas    != null){ 

            
            //Asignamos una fecha de retiro (El retiro aún no se realiza)
            $personas->PersonasFechaRetiro=$request->PersonasFechaRetiro;
            $personas->save();

            return redirect()->back();

        }

        return redirect()->back();

    }

    public function search(Request $recurso){

        $personas =Personas::where('PersonasNombreCompleto','like','%'.$recurso->busqueda.'%')->paginate(10);
        $activos = Personas::where('PersonasEstado','1')->count();
        return view('personas.index',compact('personas','activos'));
    }

    public function retirar($id){

        //Buscamos el usuario con el id que recibimos
        $usuario = Personas::find($id);

        //Actualizamos los campos de inactividad
        $usuario->PersonasActivo = 'INACTIVO';
        $usuario->PersonasEstado = 0;

        //Guardamos los cambios realizados
        $usuario->save();

        return redirect()->back();
    }


}

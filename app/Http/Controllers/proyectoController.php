<?php

namespace App\Http\Controllers;

use App\FactProyec;
use App\Proyecto;
use App\Clientes;
use App\Linea;
use App\Asignacion;
use App\ProyLinNeg;
use App\Gerentes;
use App\GerenProyec;
use App\Personas;
use Illuminate\Http\Request;


class proyectoController extends Controller
{

    public function __construct(){
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //



        $proyectos = Proyecto::orderBy('ProyectoNombre','ASC')->get();
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
        $gerentes = Gerentes::orderBy('GerenteNombre','ASC')->pluck('GerenteNombre','GerenteID');
        $clientes = Clientes::orderBy('cliNombre','ASC')->pluck('cliNombre','cliID');
        $lineas = Linea::orderBy('linNegNombre','ASC')->pluck('linNegNombre','linNegID');

        return view('proyecto.create',compact('clientes','lineas','gerentes'));
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
        $idCliente = $request->cliente_cliID;

        $this->validate($request,[

            'Gerente_GerenteID'=>'required',
            'lineanegocio_linNegID'=>'required',
            'cliente_cliID'=>'required',
            'ProyectoNombre'=>'required',
            'ProyFechaIni'=>'required',
            'ProyectoFechaFin'=>'required',
            'ProyectoDescripcion'=>'required',
            'ProyectoPresupuesto'=>'required'
        ]);


        $request->merge([
            'ProyectoDescripcion'=>($request->ProyectoDescripcion),
            'ProyectoNombre'=>strtoupper($request->ProyectoNombre),
            'cliente_cliID'=>($request->cliente_cliID),
            'ProyFechaIni'=>($request->ProyFechaIni),
            'ProyectoFechaFin'=>($request->ProyectoFechaFin),
            'ProyectoPresupuesto'=>($request->ProyectoPresupuesto),
        ]);


        // DEBES INSERTAR ESTOS DOS DATOS EN LA TABLA DE PROYECTOS Y LINEAS DE NEGOCIO
        // '$request->lineanegocio_linNegID',
        // $idproyecto
            
        $idproyecto = Proyecto::insertGetId($request->only([
                'ProyectoDescripcion',
                'ProyectoNombre',
                'cliente_cliID',
                'ProyFechaIni',
                'ProyectoFechaFin',
                'ProyectoPresupuesto'
            ]));

            // Insertamos en la tabla de proyectos y lineas de negocio
            ProyLinNeg::insert([
                'lineanegocio_linNegID'=>$request->lineanegocio_linNegID,
                'proyecto_ProyID'=>$idproyecto
                ]);

            // Insertamos en la tabla de gerentes y proyectos
            GerenProyec::insert([
                'Gerente_GerenteID'=>$request->Gerente_GerenteID,
                'Proyecto_ProyID'=>$idproyecto
            ]);
            
        // Proyecto::create($request->all());
        return redirect()->route('proyecto.index');
        // return redirect()->;
        // return $idproyecto;
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nombres = Linea::leftJoin('proylinneg','proylinneg.lineanegocio_linNegID','lineanegocio.linNegID')
        ->leftJoin('proyecto','proyecto.id','proylinneg.proyecto_ProyID')
        ->leftJoin('cliente','cliente.cliID','proyecto.cliente_cliID')
        ->where('proyecto.id','=',$id)->get();

        // Extraemos el id del cliente

            foreach ($nombres as $nombre):
                $cliente= $nombre->cliente_cliID;
            endforeach;

        $cantProyectos = Proyecto::select('cliente_cliID')->where('cliente_cliID','=',$cliente)->count();
        $cantProyectos++;
        strval($cantProyectos);
        $cantCaracteres = strlen($cantProyectos);

        while($cantCaracteres < 3){

            
            $cantProyectos = "0".$cantProyectos;
            $cantCaracteres = strlen($cantProyectos);
        }
        
        // return strlen($cantCaracteres);
        // CUENTA DE LOS PROYECTOS QUE TIENE CADA CLIENTE

        $recursos = Personas::where('personas.PersonasEstado','=','1')->orderBy('PersonasNombreCompleto','ASC')->pluck('PersonasNombreCompleto','PersonasID');
        $gerentes = Proyecto::leftJoin('gerenproyec','gerenproyec.Proyecto_ProyID','proyecto.id')->leftJoin('gerente','gerente.GerenteID','gerenproyec.Gerente_GerenteID')->where('proyecto.id','=',$id)->get();
        $listaFacturas = FactProyec::leftJoin('proyecto','proyecto.id','factproyec.proyecto_id')->where('proyecto.id','=',$id)->pluck('FactProyecCodigo','FactProyecID');
        $facturas = FactProyec::leftJoin('proyecto','proyecto.id','factproyec.proyecto_id')->where('proyecto.id','=',$id)->get();
        $proyectos = Proyecto::find($id);
        // return $id;
        // // //
        // $proyectos = Asignacion::leftJoin('proyecto','asignacion.factproyec_FactProyecID','ProyID')
        // ->leftJoin('factproyec','factproyec.FactProyecID','asignacion.factproyec_FactProyecID')
        // ->leftJoin('personas','personas.PersonasID','asignacion.personas_PersonasID')
        // ->leftJoin('proyecto','proyecto.ProyID','asignacion.proyecto_ProyID')
        // // ->where('ProyID','=',$id)
        // ->get()
        // ;

        // return $proyectos;

        return view('proyecto.show',compact('proyectos','facturas','listaFacturas','gerentes','recursos','nombres','cantProyectos'));
        // return $cantProyectos;
        // return $gerente;

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

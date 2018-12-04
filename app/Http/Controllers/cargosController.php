<?php

namespace App\Http\Controllers;


use DB;
use App\CargPers;
use App\Personas;
use App\PersContr;
use App\Contratos;
use App\Cargos;
use Illuminate\Http\Request;

class cargosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cargos=Cargos::orderBy('CargosID','DESC')->paginate(50);
        // return compact('cargos');
        return view('cargos.index',compact('cargos'));
        // return $cargos ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cargos.create');
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
            'CargosID',
            'CargosNombre'=>'required',
            'CargosDescripcion'=>'required',
            'created_at',
            'updated_at',
            'CargosUsuario',
            'CargosEstado'
        ]);

        $request->merge([
            'CargosNombre'=>strtoupper($request->CargosNombre),
            'CargosDescripcion'=>strtoupper($request->CargosDescripcion),
        ]);

        Cargos::create($request->all());

        return redirect()->route('cargos.index')->with('success','Registro agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function show(Cargos $cargos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargos $cargos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargos $cargos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargos $cargos)
    {
        //
    }
    public function search(Request $request){


        
        $cargpers =Personas::select('CargosID','CargosNombre',DB::raw('COUNT(CargosNombre) as cuenta'))
        ->leftJoin('cargpers','personas.PersonasID','personas_PersonasID')
                ->leftJoin('cargos','cargos.CargosID','cargpers.cargos_CargosID')
                ->leftJoin('perscontr','personas.PersonasID','perscontr.Personas_PersonasID')
                ->leftJoin('contratos','contratos.ContId','perscontr.PersContrID')
                ->groupBy('CargosNombre')
                ->where('CargosNombre','like','%'.$request->busqueda.'%')
                ->where('PersonasEstado','1')
                ->get();
                
                return view('cargos.index',compact('cargpers'));

    }
}

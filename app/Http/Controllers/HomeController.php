<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use App\Personas;
use App\CargPers;
use App\Cargos;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//         $cargos = Personas::leftJoin('cargpers','cargpers.personas_PersonasID','personas.PersonasID')
//         ->leftJoin('cargos','cargos.CargosID','cargpers.cargos_CargosID')
//         ->select('CargosNombre')
//         ->count('PersonasNombreCompleto')
//         ->groupBy('CargosNombre')
//         ->get()
//         ;
    
// return $cargos;



        return view('home');
    }


}

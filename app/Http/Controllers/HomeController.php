<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personas;
use App\Proyecto;
use App\User;

use Illuminate\Support\Carbon;
use App\PersContr;


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
        $monday = Carbon::now()->startOfWeek();
        $sunday= Carbon::now()->endOfWeek();
        $inicioMes = Carbon::now()->startOfMonth();
        $finMes = Carbon::now()->endOfMonth();
        $retiradoSemana = Personas::whereBetween('PersonasFechaRetiro', [$monday, $sunday])->where('PersonasFechaRetiro','!=',NULL)->get();
        $retiradoMes = Personas::whereBetween('PersonasFechaRetiro', [$inicioMes, $finMes])->where('PersonasFechaRetiro','!=',NULL)->where('PersonasEstado','0')->get();
        $ingresosMes = Personas::whereBetween('PersonasFechaIngreso', [$inicioMes, $finMes])->where('PersonasFechaIngreso','!=',NULL)->get();
        $cuentaRetirosSemana = $retiradoSemana->count();
        $cuentaRetirosMes = $retiradoMes->count();
        $personas = Personas::select('PersonasEstado')->where('PersonasEstado','1')->count('PersonasEstado');
        $proyectos = Proyecto::select('ProyectoEstado')->where('ProyectoEstado','1')->count('ProyectoEstado');

        //Traemos la cuenta de usuarios inactivos
        $usuarios = User::leftJoin('role_user','users.id','role_user.user_id')
        ->where('role_id',NULL)->count();
        
         $retiros = Personas::select('PersonasID','PersonasNombreCompleto','PersonasFechaRetiro')->where('PersonasFechaRetiro',Carbon::today())->get();

         $finContratos = PersContr::leftJoin('contratos','Contratos_ContId','ContId')
         ->leftJoin('personas','','PersonasID');
        //  return $retiros;
        // return $retiradoSemana;
        return view('home',compact('personas','proyectos','retiradoSemana','retiradoMes','cuentaRetirosSemana','cuentaRetirosMes','ingresosMes','retiros','usuarios'));
    }
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles(‘admin’);

        return view(‘some.view’);
    }
}

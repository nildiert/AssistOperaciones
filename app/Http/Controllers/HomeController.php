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
                //Asignamos roles, si el nuevo usuario no tiene rol, no puede visualizar la información
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            // Guardamos el inicio y fin de semana 
        $monday = Carbon::now()->startOfWeek();
        $sunday= Carbon::now()->endOfWeek();

        // Guardamos el inicio y el fin del mes
        $inicioMes = Carbon::now()->startOfMonth();
        $finMes = Carbon::now()->endOfMonth();

        // Buscamos las personas que se hayan retirado en el transcurso de la semana
        $retiradoSemana = Personas::whereBetween('PersonasFechaRetiro', [$monday, $sunday])
        ->where('PersonasFechaRetiro','!=',NULL)
        ->where('PersonasEstado',0)
        ->get();

        //Buscamos las personas que se hayan retirado durante el transcurso de todo el mes
        $retiradoMes = Personas::whereBetween('PersonasFechaRetiro', [$inicioMes, $finMes])->where('PersonasFechaRetiro','!=',NULL)->where('PersonasEstado','0')->get();
        //Buscamos las personas que hayan ingresado en el mes
        $ingresosMes = Personas::whereBetween('PersonasFechaIngreso', [$inicioMes, $finMes])->where('PersonasFechaIngreso','!=',NULL)->get();
        
        // Contamos cuantos retiros se han presentado en 
        $personas = Personas::select('PersonasEstado')->where('PersonasEstado','1')->count('PersonasEstado');
        $proyectos = Proyecto::select('ProyectoEstado')->where('ProyectoEstado','1')->count('ProyectoEstado');
        
        // Buscamos las personas que van a finalizar periodo de prueba en esta semana
        $periodoPrueba = Personas::leftJoin('cargpers','personas.PersonasID','cargpers.personas_PersonasID')
        ->leftJoin('cargos','cargos.CargosID','cargpers.cargos_CargosID')
        ->whereBetween('cargpers.CargPersPruebaFin', [$monday, $sunday])->get();


        //Traemos la cuenta de usuarios que no tienen rol asignado
        $usuarios = User::leftJoin('role_user','users.id','role_user.user_id')
        ->where('role_id',NULL)->count();

        
        // Contamos la cantidad de retiros del día
        $retiros = Personas::select('PersonasID','PersonasNombreCompleto','PersonasFechaRetiro')
        ->where('PersonasFechaRetiro',Carbon::today())
        ->where('PersonasEstado','!=',0)
        ->get();
        
        
         $finContratos = PersContr::leftJoin('contratos','Contratos_ContId','ContId')
         ->leftJoin('personas','perscontr.Personas_PersonasID','PersonasID')
         ->whereBetween('perscontr.PersContrFechaFin', [$monday, $sunday])
         ->get();


         //Contamos la cantidad de novedades, para visualizarlas en la vista home
        $novedades = $usuarios+ $retiros->count()+$periodoPrueba->count()+$finContratos->count();
        return view('home',compact('personas','proyectos','retiradoSemana','retiradoMes','ingresosMes','retiros','usuarios','novedades','periodoPrueba','finContratos'));
    }
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles(‘admin’);

        return view(‘some.view’);
    }
}

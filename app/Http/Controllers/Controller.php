<?php

namespace App\Http\Controllers;

use App\Personas;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function search(Request $request){
        $validateData = $request->validate([
            'busqueda'  => 'required',
        ]);

        $tipo = $request->tipoBusqueda;
        $busqueda = $request->busqueda;
        switch($tipo){
            case 'pers':
                $route='personas.search';
                break;
            case 'habil':

                $route='pershabil.search';
                break;
            case 'cargo':
                $route='cargpers.search';
                break;
        }

        return redirect()->route($route,$busqueda);
        // return $route;

    }

}

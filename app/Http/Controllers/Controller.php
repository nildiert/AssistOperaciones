<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function search(Request $request){
        dd($request->input());
    //  return $request->tipoBusqueda;
        $action ="";
        switch ($request->tipoBusqueda){
            case "pers":
                break;
            case "habil":
            break;
            case "cargo":
            break;
        }
        // return redirect()->action($action,['recurso'=>$request->tipoBusqueda]);
        return $request;
    }
}

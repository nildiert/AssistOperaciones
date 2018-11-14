@extends('layouts.app')
@section('content')
<div class="container">
    <div class="table-container">
        {{$cargos->links()}}
        <table class="table table-hover">
            <thead>
                <th>CargosID</th>
                <th>CargosNombre</th>
                <th>CargosDescripcion</th>
                <th>Cargos_created_at</th>
                <th>Cargos_updated_at</th>
                <th>CargosUsuario</th>
                <th>CargosEstado</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </thead>
            <tbody>
                @foreach($cargos as $cargo)
                    <tr>
                        <td>{{$cargo->CargosID}}</td>
                        <td>{{$cargo->CargosNombre}}</td>
                        <td>{{$cargo->CargosDescripcion}}</td>
                        <td>{{$cargo->Cargos_created_at}}</td>
                        <td>{{$cargo->Cargos_updated_at}}</td>
                        <td>{{$cargo->CargosUsuario}}</td>
                        <td>{{$cargo->CargosEstado}}</td>
                        <td><button class="btn btn-outline-info">Actualizar</button></td>
                        <td><button class="btn btn-outline-danger">Eliminar</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$cargos->links()}}
</div>

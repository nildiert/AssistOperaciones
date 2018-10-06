@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="table-container">
            <table class="table-hover table">
                <thead>
                    <th>ServId</th>
                    <th>ServNombre</th>
                    <th>Serv_created_at</th>
                    <th>Serv_updated_at</th>
                    <th>ServUsuario</th>
                    <th>ServEstado</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    @foreach($servicios as $servicio)
                        <tr>
                            <td>{{$servicio->ServId}}</td>
                            <td>{{$servicio->ServNombre}}</td>
                            <td>{{$servicio->Serv_created_at}}</td>
                            <td>{{$servicio->Serv_updated_at}}</td>
                            <td>{{$servicio->ServUsuario}}</td>
                            <td>{{$servicio->ServEstado}}</td>
                            <td><button class="btn btn-outline-info">Actualizar</button></td>
                            <td><button class="btn btn-outline-danger">Eliminar</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

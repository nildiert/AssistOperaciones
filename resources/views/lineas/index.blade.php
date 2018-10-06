@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <th>linNegID</th>
                    <th>linNegNombre</th>
                    <th>linNeg_created_at</th>
                    <th>linNeg_updated_at</th>
                    <th>linNegUsuario</th>
                    <th>linNegEstado</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    @foreach($lineas as $linea)
                        <tr>
                            <td>{{$linea->linNegID}}</td>
                            <td>{{$linea->linNegNombre}}</td>
                            <td>{{$linea->linNeg_created_at}}</td>
                            <td>{{$linea->linNeg_updated_at}}</td>
                            <td>{{$linea->linNegUsuario}}</td>
                            <td>{{$linea->linNegEstado}}</td>
                            <td><button class="btn btn-outline-info">Actualizar</button></td>
                            <td><button class="btn btn-outline-danger">Eliminar</button></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <th>cliID</th>
                    <th>cliNombre</th>
                    <th>cliCod</th>
                    <th>clie_created_at</th>
                    <th>clie_updated_at</th>
                    <th>cli_Usuario</th>
                    <th>cli_Estado</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->cliID}}</td>
                            <td>{{$cliente->cliNombre}}</td>
                            <td>{{$cliente->cliCod}}</td>
                            <td>{{$cliente->clie_created_at}}</td>
                            <td>{{$cliente->clie_updated_at}}</td>
                            <td>{{$cliente->cli_Usuario}}</td>
                            <td>{{$cliente->cli_Estado}}</td>
                            <td><button class="btn btn-outline-info">Actualizar</button></td>
                            <td><button class="btn btn-outline-danger">Eliminar</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

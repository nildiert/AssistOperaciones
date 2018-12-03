@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="table">

        <div class="table-container">
            {{$clientes->links()}}
            <table class="table table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th colspan="2" style="width: 30%">Acciones</th>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->cliNombre}}</td>
                            <td>{{$cliente->cliCod}}</td>
                            <td><button class="btn btn-outline-info">Actualizar</button></td>
                            <td><button class="btn btn-outline-danger">Eliminar</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$clientes->links()}}
    </div>
</div>
@endsection

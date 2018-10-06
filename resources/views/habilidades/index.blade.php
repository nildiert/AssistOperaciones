@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <th>HabilidadesID</th>
                    <th>HabilidadesNombre</th>
                    <th>HabilidadesTipo</th>
                    <th>Habilidades_created_at</th>
                    <th>Habilidades_updated_at</th>
                    <th>HabilidadesUsuario</th>
                    <th>HabilidadesEstado</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    @foreach($habilidades as $habilidad)
                    <tr>
                        <td>{{$habilidad->HabilidadesID}}</td>
                        <td>{{$habilidad->HabilidadesNombre}}</td>
                        <td>{{$habilidad->HabilidadesTipo}}</td>
                        <td>{{$habilidad->Habilidades_created_at}}</td>
                        <td>{{$habilidad->Habilidades_updated_at}}</td>
                        <td>{{$habilidad->HabilidadesUsuario}}</td>
                        <td>{{$habilidad->HabilidadesEstado}}</td>
                        <td><button class="btn btn-outline-info">Actualizar</button> </td>
                        <td><button class="btn btn-outline-danger">Eliminar</button> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

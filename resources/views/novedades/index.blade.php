@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <th>NovId</th>
                    <th>NovTipo</th>
                    <th>Nov_created_at</th>
                    <th>Nov_updated_at</th>
                    <th>NovUsuario</th>
                    <th>NovEstado</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    @foreach($novedades as $novedad)
                        <tr>
                            <td>{{$novedad->NovId}}</td>
                            <td>{{$novedad->NovTipo}}</td>
                            <td>{{$novedad->Nov_created_at}}</td>
                            <td>{{$novedad->Nov_updated_at}}</td>
                            <td>{{$novedad->NovUsuario}}</td>
                            <td>{{$novedad->NovEstado}}</td>
                            <th><button class="btn btn-outline-info ">Actualizar</button></th>
                            <th><button class="btn btn-outline-danger">Eliminar</button></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

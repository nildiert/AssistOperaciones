@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="table-container">
            {{$recursosFisicos->links()}}
            <table class="table table-hover">
                <thead>
                    <th>RecFisID</th>
                    <th>RecFisCod</th>
                    <th>RecFisTipo</th>
                    <th>RecFis_created_at</th>
                    <th>RecFis_updated_at</th>
                    <th>RecFis_usuario</th>
                    <th>RecFis_Estado</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    @foreach($recursosFisicos as $recursoFisico)
                    <tr>
                        <td>{{$recursoFisico->RecFisID}}</td>
                        <td>{{$recursoFisico->RecFisCod}}</td>
                        <td>{{$recursoFisico->RecFisTipo}}</td>
                        <td>{{$recursoFisico->RecFis_created_at}}</td>
                        <td>{{$recursoFisico->RecFis_updated_at}}</td>
                        <td>{{$recursoFisico->RecFis_usuario}}</td>
                        <td>{{$recursoFisico->RecFis_Estado}}</td>
                        <td><button class="btn btn-outline-info">Actualizar</button></td>
                        <td><button class="btn btn-outline-danger">Eliminar</button></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$recursosFisicos->links()}}
    </div>
@endsection

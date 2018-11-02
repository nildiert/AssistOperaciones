@extends('layouts.app')
@section('content')
    <table class="table table-hover">
        <thead>

            <th style="font-size: 12 px">PersonasID</th>
            <th style="font-size: 12 px">PersonasNombreCompleto</th>
            <th style="font-size: 12 px">asignacionUbicacion</th>
            <th style="font-size: 12 px">ProyectoNombre</th>
            <th style="font-size: 12 px">asigFechaIni</th>
            <th style="font-size: 12 px">asigFechaFin</th>
            <th style="font-size: 12 px">asigPorcentaje</th>
            <th style="font-size: 12 px">Dias en liberarse</th>
            <th style="font-size: 12 px">Observaciones</th>

        </thead>
        <tbody>
            @foreach($asignaciones as $asignacion)
            <tr>
                <td>{{$asignacion->PersonasID}}</td>
                <td>{{$asignacion->PersonasNombreCompleto}}</td>
                <td>{{$asignacion->asignacionUbicacion}}</td>
                <td>{{$asignacion->ProyectoNombre}}</td>
                <td>{{$asignacion->asigFechaIni}}</td>
                <td>{{$asignacion->asigFechaFin}}</td>
                <td>{{$asignacion->asigPorcentaje}}</td>
                <td>Dias en liberarse</td>
                <td>Observaciones</td>

            </tr>
            @endforeach
        </tbody>
    </table>
@endsection





























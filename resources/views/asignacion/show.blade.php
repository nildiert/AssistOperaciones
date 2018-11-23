@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    {{$asigCodigo}}
                </div>
            </div>
            <div class="card-text">
                <table class="table table-hover">
                    <thead>
                            <th>Nombre</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Porcentaje</th>
                            <th>Ubicacion</th>
                            <th>Observaciones</th>

                    </thead>
                    <tbody>
                        @foreach($asignados as $asig)
                            <tr style="font-size: 14px">
                                <td>{{$asig->PersonasNombreCompleto}}</td>
                                <td>{{$asig->asigFechaIni}}</td>
                                <td>{{$asig->asigFechaFin}}</td>
                                <td>{{$asig->asigPorcentaje}}</td>
                                <td>{{$asig->asignacionUbicacion}}</td>
                                <td>{{$asig->asigObservaciones}}</td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <a href="{{URL::previous()}}" class="btn btn-info">Volver</a>
        </div>
    </div>

@endsection
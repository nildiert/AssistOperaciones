@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="table-container">
            {{$contratos->links()}}
            <table class="table table-hover">
                <thead>
                    <th>ContId</th>
                    <th>ContTipo</th>
                    <th>ContDescripcion</th>
                    <th>Cont_created_at</th>
                    <th>Cont_updated_at</th>
                    <th>ContUsuario</th>
                    <th>ContEstado</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    @foreach($contratos as $contrato)
                        <tr>
                            <td>{{$contrato->ContId}}</td>
                            <td>{{$contrato->ContTipo}}</td>
                            <td>{{$contrato->ContDescripcion}}</td>
                            <td>{{$contrato->Cont_created_at}}</td>
                            <td>{{$contrato->Cont_updated_at}}</td>
                            <td>{{$contrato->ContUsuario}}</td>
                            <td>{{$contrato->ContEstado}}</td>
                            <td><button class="btn btn-outline-info">Actualizar</button></td>
                            <td><button class="btn btn-outline-danger">Eliminar</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$contratos->links()}}
    </div>
@endsection

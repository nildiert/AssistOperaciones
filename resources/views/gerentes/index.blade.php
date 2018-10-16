@extends('layouts.layout')
@section('content')
    <div class="container">
        {{$gerentes->links()}}
        <div class="table-container">
            <table>
                <thead>
                    <th>GerenteID</th>
                    <th>GerenteNombre</th>
                    <th>GerenteFechaInicio</th>
                    <th>GerenteFechaFin</th>
                    <th>Gerente_created_at</th>
                    <th>Gerente_updated_at</th>
                    <th>Gerente_Usuario</th>
                    <th>Gerente_estado</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    @foreach($gerentes as $gerente)
                        <tr>

                            <td>{{$gerente->GerenteID}}</td>
                            <td>{{$gerente->GerenteNombre}}</td>
                            <td>{{$gerente->GerenteFechaInicio}}</td>
                            <td>{{$gerente->GerenteFechaFin}}</td>
                            <td>{{$gerente->Gerente_created_at}}</td>
                            <td>{{$gerente->Gerente_updated_at}}</td>
                            <td>{{$gerente->Gerente_Usuario}}</td>
                            <td>{{$gerente->Gerente_estado}}</td>
                            <td><button class="btn btn-outline-info">Actualizar</button></td>
                            <td><button class="btn btn-outline-danger">Eliminar</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$gerentes->links()}}
    </div>
@endsection

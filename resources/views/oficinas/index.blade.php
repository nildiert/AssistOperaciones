@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="table-container">
            {{$oficinas->links()}}
            <table class="table table-hover">
                <thead>
                    <th>idOfic</th>
                    <th>OficNumero</th>
                    <th>Ofic_updated_at</th>
                    <th>Ofic_created_at</th>
                    <th>Ofic_usuario</th>
                    <th>Ofic_estado</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    @foreach($oficinas as $oficina)
                        <tr>
                            <td>{{$oficina->idOfic}}</td>
                            <td>{{$oficina->OficNumero}}</td>
                            <td>{{$oficina->Ofic_updated_at}}</td>
                            <td>{{$oficina->Ofic_created_at}}</td>
                            <td>{{$oficina->Ofic_usuario}}</td>
                            <td>{{$oficina->Ofic_estado}}</td>
                            <td><button class="btn btn-outline-info">Actualizar</button></td>
                            <td><button class="btn btn-outline-danger">Eliminar</button></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        {{$oficinas->links()}}
    </div>

@endsection

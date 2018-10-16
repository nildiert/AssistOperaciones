@extends('layouts.layout')
@section('content')

<div class="container">


    <div class="table-container">
            {{$personas->links()}}
        <table class="table table-hover">
            <thead>
                <th>PersonasNombreCompleto</th>
                <th>PersonasDocumento</th>
                <th>PersonasTel</th>
                <th>PersonasTitulo</th>
                <th>PersonasFechaIngreso</th>
                <th>Actualizar</th>
                <th>Eliminar</th>

            </thead>
            <tbody>
                @foreach($personas as $persona)
                <tr>
                    <td>{{$persona->PersonasNombreCompleto}}</td>
                    <td>{{$persona->PersonasDocumento}}</td>
                    <td>{{$persona->PersonasTel}}</td>
                    <td>{{$persona->PersonasTitulo}}</td>
                    <td>{{$persona->PersonasFechaIngreso}}</td>
                    <td><button type="button" class="btn btn-outline-info">Actualizar</button>  </td>
                    <td><button type="button" class="btn btn-outline-danger">Eliminar</button> </td>

                </tr>

                @endforeach

            </tbody>

        </table>
    </div>
{{$personas->links()}}
</div>
@endsection

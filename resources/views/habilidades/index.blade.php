@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card pl-5 pr-5 pt-2">

            <table class="table table-hover">
                <thead>
                    <th>Habilidad</th>
                    <th>Cantidad</th>

                    <th colspan="2">Acciones</th>
                </thead>
                <tbody>
                    @foreach($habilidades as $habilidad)
                    <tr>
                        @if($habilidad->HabilidadesNombre != NULL)
                        <td>{{$habilidad->HabilidadesNombre}}</td>
                    <td><a href="{{Route('habilidades.search',$habilidad->HabilidadesID)}}">{{$habilidad->cantidad}}</a> </td>
                        <td><button class="btn btn-outline-info">Actualizar</button> </td>
                        <td><button class="btn btn-outline-danger">Eliminar</button> </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

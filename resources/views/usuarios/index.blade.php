@extends('layouts.app')
@section('content')
<div class="container">
    <div class="table">
        <table class="table table-hover">
            <thead>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Documento</th>
                <th>Rol</th>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->phone}}</td>
                <td>{{$usuario->indenty}}</td>
                    @if($usuario->rol == NULL)
                        <td class="text-danger"><a href="">Sin rol</a> </td>
                    @else
                        <td>{{$usuario->rol}}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="table">
            <h1>Sin Rol</h1>
        <table class="table table-hover">
            <thead>
                <th>sdf</th>
                <th>sdf</th>
            </thead>
            <tbody>
                <td>sdf</td>
                <td>sdf</td>
            </tbody>
        </table>
    </div>
</div>
@endsection
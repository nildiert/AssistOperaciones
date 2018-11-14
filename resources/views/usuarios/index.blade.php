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
                <td>{{$usuario->rolName}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
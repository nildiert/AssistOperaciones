@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="table-container">
            {{$empresas->links()}}
            <table class="table table-hover">
                <thead>
                    <th>EmpId</th>
                    <th>EmpNombre</th>
                    <th>Emp_created_at</th>
                    <th>Emp_updated_at</th>
                    <th>EmpUsuario</th>
                    <th>EmpEstado</th>
                    <th>Actualizar4</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    @foreach($empresas as $empresa)
                        <tr>
                            <td>{{$empresa->EmpId}}</td>
                            <td>{{$empresa->EmpNombre}}</td>
                            <td>{{$empresa->Emp_created_at}}</td>
                            <td>{{$empresa->Emp_updated_at}}</td>
                            <td>{{$empresa->EmpUsuario}}</td>
                            <td>{{$empresa->EmpEstado}}</td>
                            <td><button class="btn btn-outline-info">Actualizar</button></td>
                            <td><button class="btn btn-outline-danger">Eliminar</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$empresas->links()}}
    </div>
@endsection

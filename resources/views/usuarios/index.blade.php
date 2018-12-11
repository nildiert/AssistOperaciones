@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card p-4">
        <div class="table">
            <table class="table table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Estado</th>
                </thead>
                {!!Form::open(['action'=>'RoleUserController@actualizar'])!!}
                <tbody>
                    @foreach($usuarios as $key=>$usuario)
                    <tr>
                    <td  style="font-size: 10px" hidden>{{Form::hidden('actualizarRol['.$key.'][id]',$usuario->role_user_id)}}</td>
                    <td  style="font-size: 10px" hidden>{{Form::hidden('actualizarRol['.$key.'][user_id]',$usuario->id)}}</td>
                        <td style="font-size: 15px" >{{$usuario->name}}</td>
                        <td style="font-size: 15px" >{{$usuario->email}}</td>

                        {{-- <td>{{$usuario->description}}</td> --}}
                        <td style="font-size: 15px" >{!!Form::select('actualizarRol['.$key.'][role_id]',$roles,$usuario->role_id,['class'=>'form-control'])!!}</td>
                        <td style="font-size: 15px" >{!!Form::select('actualizarRol['.$key.'][estate]',['0'=>'Inactivo','1'=>'Activo'],'1',['class'=>'form-control'])!!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {!!Form::submit('Actualizar',['class'=>'btn btn-info'])!!}
            </div>
            {!!Form::close()!!}
        </div>
    </div>
    
    @if($cuenta)
    <div class="card pt-4 pl-4 pr-4 mt-2">
        <div class="">
            <h4 class="pl-3 card-title">Rol por asignar</h4>
        </div>
        <div class="card-body">

        
            <div class="table">
                <table class="table table-hover">
                    <thead> 
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                    </thead>
                    {!!Form::open(['action'=>'RoleUserController@store'])!!}
                    <tbody>
                        @foreach($usuariosInactivos as $key=>$value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td class="text-danger">{!!Form::select('nuevoRol['.$key.'][role_id]',$roles,'Selecciona rol',['class'=>'form-control','placeholder'=>'Selecciona rol'])!!} </td>
                            <td hidden> {!!Form::hidden('nuevoRol['.$key.'][user_id]',$value->id)!!}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>

                </table>
                <div class="d-flex justify-content-end">
                    {!!Form::submit('Guardar',['class'=>'btn btn-info'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
        @endif
</div>
    @endsection
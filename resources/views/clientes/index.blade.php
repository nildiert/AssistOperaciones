@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mb-2">
            <button class="btn btn-info" data-toggle="modal" data-target="#agregarCliente">Nuevo cliente</button>
        </div>
        <div class="card p-4">
        <div class="table-container">
            {{$clientes->links()}}
            <table class="table table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th colspan="2" style="width: 30%">Acciones</th>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->cliNombre}}</td>
                            <td>{{$cliente->cliCod}}</td>
                            <td><button class="btn btn-outline-info">Actualizar</button></td>
                            <td><button class="btn btn-outline-danger">Eliminar</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$clientes->links()}}
    </div>
</div>
<div class="modal fade" id="agregarCliente" role="dialog" aria-labelledby="exampleModalLabel" aria-hidde="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo cliente</h5>
                <button class="close" data-dismiss="modal">
                    <span >&times;</span>
                </button>
            </div>
            {!!Form::open(['action'=>'clienteController@store'])!!}
            <div class="modal-body">
                {!!Form::label('Nombre de cliente')!!}
                {!!Form::text('cliNombre',NULL,['class'=>'form-control'])!!}
                {!!Form::label('Código')!!}
                {!!Form::text('cliCod',NULL,['class'=>'form-control'])!!}

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
            </div>
            {!!Form::close()!!}
        </div>
    </div>    
</div>
@endsection

	
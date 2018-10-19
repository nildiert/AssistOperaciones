@extends('layouts.layout')
@section('content')

<div class="container">
    @include('sweet::alert')

        <div class="d-flex justify-content-between mt-3">

            {{$personas->links()}}
            <a class="btn btn-info  mb-3 text-white"  data-toggle="modal" data-target="#deleteModal">Agregar recurso</a>
            <!--href="{{route('personas.create')}}-->

        </div>



        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <th>NOMBRE COMPLETO</th>
                    <th>DOCUMENTO</th>
                    <th>TELEFONO</th>
                    <th>TITULO</th>
                    <th>INGRESO</th>

                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>

                </thead>
                <tbody>
                    @foreach($personas as $persona)
                    <tr>
                    <td  style="font-size: 14px"><a href="{{route('personas.show',$persona->PersonasID)}}"> {{$persona->PersonasNombreCompleto}}</a></td>
                    <td  style="font-size: 14px">{{$persona->PersonasDocumento}}</td>
                    <td  style="font-size: 14px">{{$persona->PersonasTel}}</td>
                    <td  style="font-size: 14px ">{{$persona->PersonasTitulo}}</td>
                    <td  style="font-size: 14px">{{$persona->PersonasFechaIngreso}}</td>

                        <td><a  class="btn btn-outline-info" href="{{route('personas.edit',$persona->PersonasID)}}">Actualizar</a>  </td>                        <td>
                                {{ Form:: open(['method' => 'DELETE','route' => ['personas.destroy', $persona->PersonasID], 'id' => 'confirm_delete']) }}

                                {!! Form::submit('Eliminar', ['class' => 'btn btn-outline-danger']) !!}





                                {!! Form::close() !!}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>
        </div>
    {{$personas->links()}}

    </div>




@endsection
<!-- Button trigger modal -->


      <!-- Modal -->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Agregar recurso</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    {!!Form::open(['action'=>'personasController@store'])!!}
                    {!!Form::label('PersonasPriApellido')!!}
                        {!!Form::text('PersonasPriApellido',null,['placeholder'=>'PersonasPriApellido', 'class'=>'toUpper'])!!} <br>
                    {!!Form::label('PersonasSegApellido')!!}
                        {!!Form::text('PersonasSegApellido',null,['placeholder'=>'PersonasSegApellido', 'class'=>'toUpper'])!!} <br>
                    {!!Form::label('PersonasPrimNombre')!!}
                        {!!Form::text('PersonasPrimNombre',null,['placeholder'=>'PersonasPrimNombre', 'class'=>'toUpper'])!!} <br>
                    {!!Form::label('PersonasSegNombre')!!}
                        {!!Form::text('PersonasSegNombre',null,['placeholder'=>'PersonasSegNombre', 'class'=>'toUpper'])!!} <br>
                    {!!Form::label('PersonasDocumento')!!}
                        {!!Form::number('PersonasDocumento',null,['placeholder'=>'PersonasDocumento'])!!} <br>
                    {!!Form::label('PersonasTipoDoc')!!}
                        {!!Form::select('PersonasTipoDoc',array('CC'=>'Cedula de Ciudadania','TI'=>'Tarjeta de identidad','PA'=>'Pasaporte','CE'=>'Cedula de extranjeria'))!!}<br>
                    {!!Form::label('PersonasTel')!!}
                        {!!Form::number('PersonasTel',null,['placeholder'=>'PersonasTel'])!!} <br>
                    {!!Form::label('PersonasEspecialidad')!!}
                        {!!Form::text('PersonasEspecialidad',null,['placeholder'=>'PersonasEspecialidad', 'class'=>'toUpper'])!!} <br>
                    {!!Form::label('PersonasTitulo')!!}
                        {!!Form::text('PersonasTitulo',null,['placeholder'=>'PersonasTitulo', 'class'=>'toUpper'])!!} <br>
                    {!!Form::label('PersonasFechaIngreso')!!}
                        {!!Form::date('PersonasFechaIngreso')!!}<br>
                        {!!Form::text('PersonasNombreCompleto',null,['hidden'=>'hidden'])!!}


            @include('sweet::alert')
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              {!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
              {!!Form::close()!!}
            </div>
          </div>
        </div>
      </div>


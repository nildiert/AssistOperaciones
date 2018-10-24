@extends('layouts.layout')
@section('content')

<div class="container">
    @include('sweet::alert')
{{--sdfsdf--}}
        <div class="d-flex justify-content-between mt-3 row">


            <!--href="{{route('personas.create')}}-->
                <div class="col-12 d-flex justify-content-end">
                        <div class="">

                                <a class="btn btn-info  mb-3 text-white"  href="{{route('personas.index')}}">Volver</a>
                                <a class="btn btn-info  mb-3 text-white"  data-toggle="modal" data-target="#deleteModal">Agregar recurso</a>
                            </div>
                </div>
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        {!!Form::open(['action'=>'personasController@search'])!!}
                        {!!Form::submit('Buscar recurso',['class'=>'btn btn-outline-info'])!!}
                    </div>
                    <input type="text" name="recurso" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    {!!Form::close()!!}
                </div>
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        {!!Form::open(['action'=>'persHabilController@search'])!!}
                        {!!Form::submit('Buscar habilidad',['class'=>'btn btn-outline-info'])!!}
                    </div>
                    <input type="text" name="skill" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    {!!Form::close()!!}
                </div>



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
            <div class="modal-body ">
                    {!!Form::open(['action'=>'personasController@store'])!!}
                    <div class="col-12">
                    {!!Form::label('Apellidos')!!}

                        {!!Form::text('PersonasPriApellido',null,['placeholder'=>'Primer apellido', 'class'=>'toUpper form-control'])!!}
                        {!!Form::label('')!!}
                        {!!Form::text('PersonasSegApellido',null,['placeholder'=>'Segundo apellido', 'class'=>'toUpper form-control'])!!} <hr>
                         {!!Form::label('Nombres')!!}
                        {!!Form::text('PersonasPrimNombre',null,['placeholder'=>'Primer nombre', 'class'=>'toUpper form-control'])!!}
                        {!!Form::label('')!!}
                        {!!Form::text('PersonasSegNombre',null,['placeholder'=>'Segundo nombre', 'class'=>'toUpper form-control'])!!} <hr>
                        {!!Form::label('Documentación')!!}
                        {!!Form::select('PersonasTipoDoc',array('CC'=>'Cedula de Ciudadania','TI'=>'Tarjeta de identidad','PA'=>'Pasaporte','CE'=>'Cedula de extranjeria'),null,['class'=>'form-control','placeholder'=>'Tipo de documento'])!!}
                        {!!Form::label('')!!}
                        {!!Form::number('PersonasDocumento',null,['placeholder'=>'Número de documento','class'=>'form-control'])!!}<hr>
                        {!!Form::label('Información personal')!!}
                        {!!Form::number('PersonasTel',null,['placeholder'=>'Telefono','class'=>'form-control'])!!}
                        {!!Form::label('')!!}
                        {!!Form::text('PersonasEspecialidad',null,['placeholder'=>'Especialidad', 'class'=>'toUpper form-control'])!!}
                        {!!Form::label('')!!}
                        {!!Form::text('PersonasTitulo',null,['placeholder'=>'Titulo', 'class'=>'toUpper form-control'])!!}<hr>
                        {!!Form::label('Fecha de ingreso')!!}
                        {!!Form::date('PersonasFechaIngreso',null,['class'=>'form-control'])!!}<br>
                        {!!Form::text('PersonasNombreCompleto',null,['hidden'=>'hidden'])!!}

                    </div>

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


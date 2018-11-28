@extends('layouts.app')
@section('content')
<div class="container">
    @include('sweet::alert')
{{--sdfsdf--}}

        <div class="d-flex mt-3 ">
            <!--href="{{route('personas.create')}}-->

            <!--Busqueda de personas-->
            <div class="col-7 ">
                @include('personas.error')
                {!!Form::open(['method' => 'get','action'=>'Controller@search'])!!}
                <div class="input-group">
                    {!!Form::select('tipoBusqueda',['pers'=>'Persona','habil'=>'Habilidad','cargo'=>'Cargo'],'Seleccione...',['class'=>'custom-select', 'id'=>'inputGroupSelect04 btn btn-outline-info'])!!}
                    {{Form::text('busqueda',null,['class'=>'form-control w-50', 'aria-label'=>'Text input with segmented dropdown button', 'placeholder'=>'Valor a buscar', 'required'])}}
                    
                    <div class="input-group-append">
                        {!!Form::submit('Buscar',['class'=>'btn btn-outline-info'])!!}
                        
                    </div>
                    {!!Form::close()!!}

                </div>
            </div>
            <div class="col-5 d-flex justify-content-end clearfix">
                    <a class="btn btn-info  mb-3 mr-1 text-white"  href="{{route('personas.index')}}">Volver</a>
                    {{-- <a class="btn btn-info  mb-3 text-white"  data-toggle="modal" data-target="#createModal">Agregar recurso</a> --}}
                    <button type="button" class="btn btn-info mb-3 mr-1 text-white" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar recurso</button>
                </div>
        </div>
        <div class="card p-4">


            <div class="table-container ">
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
                        <tr style="font-size: 14px">
                        <td  style="font-size: 14px" ><a href="{{route('personas.show',$persona->PersonasID)}}"
                                class="
                                @if($persona->PersonasEstado == 0)
                                    {{'text-danger'}}
                                @endif
                            "> {{$persona->PersonasNombreCompleto}}</a></td>
                        <td  style="font-size: 14px">{{$persona->PersonasDocumento}}</td>
                        <td  style="font-size: 14px">{{$persona->PersonasTel}}</td>
                        <td  style="font-size: 14px ">{{$persona->PersonasTitulo}}</td>
                        <td  style="font-size: 14px">{{$persona->PersonasFechaIngreso}}</td>
                            <td><a  class="btn btn-outline-info text-info" data-toggle="modal" data-target="#editModal" >Actualizar</a>  </td>                        <td>
                                    
                                
                                {{ Form:: open(['method' => 'DELETE','route' => ['personas.destroy', $persona->PersonasID], 'id' => 'confirm_delete']) }}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-outline-danger', 'onclick'=>'return confirm("Seguro que desea eliminar ?")']) !!}
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
      

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Agregar recurso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body ">
                          
                          {!!Form::open(['action'=>'personasController@store'])!!}
                          {!!Form::label('Apellidos')!!}
                          
                          <div class="form-row">
                              <div class="col">
                                  {!!Form::text('PersonasPriApellido',null,['placeholder'=>'Primer apellido', 'class'=>'toUpper form-control d-inline'])!!}
                                </div>
                                <div class="col">
                                    {!!Form::text('PersonasSegApellido',null,['placeholder'=>'Segundo apellido', 'class'=>'toUpper form-control d-inline'])!!} 
                                </div>
                            </div>
                            <hr>
                            {!!Form::label('Nombres')!!}
                            <div class="form-row">
                                <div class="col">
                                    {!!Form::text('PersonasPrimNombre',null,['placeholder'=>'Primer nombre', 'class'=>'toUpper form-control'])!!}
                                </div>
                                <div class="col">
                                    {!!Form::text('PersonasSegNombre',null,['placeholder'=>'Segundo nombre', 'class'=>'toUpper form-control'])!!} 
                                </div>
                            </div>
                            <hr>
                                    {!!Form::label('Documentación')!!}
                                    <div class="form-row">
                                        <div class="col">
                                            {!!Form::select('PersonasTipoDoc',array('CC'=>'Cedula de Ciudadania','TI'=>'Tarjeta de identidad','PA'=>'Pasaporte','CE'=>'Cedula de extranjeria'),null,['class'=>'form-control','placeholder'=>'Tipo de documento'])!!}
                                        </div>
                                        <div class="col">
                                            {!!Form::number('PersonasDocumento',null,['placeholder'=>'Número de documento','class'=>'form-control'])!!}
                                        </div>
                                    </div>
                                    <hr>
                                    {!!Form::label('Información personal')!!}
                                    <div class="form-row">
                                        <div class="col">
                                            {!!Form::number('PersonasTel',null,['placeholder'=>'Telefono','class'=>'form-control'])!!}
                                        </div>
                                        <div class="col">
                                            {!!Form::text('PersonasEspecialidad',null,['placeholder'=>'Especialidad', 'class'=>'toUpper form-control'])!!}
                                        </div>
                                    </div>
                                    <div class="form-row">
                                            <div class="col mt-2">
                                                {!!Form::label('Titulo')!!}
                                                {!!Form::text('PersonasTitulo',null,['placeholder'=>'Titulo', 'class'=>'toUpper form-control'])!!}
                                            </div>
                                            <div class="col mt-2">
                                                {!!Form::label('Fecha de ingreso')!!}

                                                {!!Form::date('PersonasFechaIngreso',null,['class'=>'form-control'])!!}
                                            </div>

                                    </div>
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



<!-- Modal Agregar-->
      <div class="modal fade bd-example-modal-lg" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createModalLabel">Agregar recurso</h5>
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

{{-- MODAL DE EDITAR --}}

    <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">Agregar recurso</h5>
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
                            <input type="submit">
                        </div>
                @include('sweet::alert')
                </div>{{--Fin modal-body--}}
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  {!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
                  {!!Form::close()!!}
                </div>
              </div>
            </div>
        </div>

{{-- DELETE MODAL --}}

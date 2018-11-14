@extends('layouts.app')
@section('content')
<div class="container ">
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
                <a class="btn btn-info  mb-3 text-white"  data-toggle="modal" data-target="#createModal">Agregar recurso</a>
            </div>
    </div>

    <div class="row ">
        <div class="col-6 ">
            <div class="card p-2 ">
                
                @foreach($personas as $persona)
                    <div class="card-title mt-3">
                        <h5 class="mt-3 d-inline">{{$persona->PersonasNombreCompleto}}</h5>
                        <span class="badge
                        @if($persona->PersonasEstado)
                            {{'badge-primary'}}
                        @else
                            {{'badge-secondary'}}
                        @endif
                        ">     {{$persona->PersonasActivo}}</span>
                        <hr>
                    </div>
                    <div class="d-flex justify-content-between pl-2 pr-5">

                        <div >
                            <p><strong>Documento:</strong> {{$persona->PersonasDocumento}}</p>
                            <p class="text-capitalize"><strong>Especialidad:</strong> {{$persona->PersonasEspecialidad}}</p>
                            <p class="text-capitalize"><strong>Telefono:</strong> {{$persona->PersonasTel}}</p>
                        </div>
                        <div>
                        <p><strong>Fecha Ingreso:</strong> {{$persona->PersonasFechaIngreso}}</p>
                        @if($persona->PersonasEstado)
                        @else
                            <p><strong>Fecha de retiro:</strong> {{$persona->PersonasFechaRetiro}}</p>
                        @endif
                        <p><strong>Contrato:</strong> {{$persona->ContTipo}}</p>
                        <p><strong>Cargo:</strong> {{$persona->CargosNombre}}</p>
                        </div>
                    </div>
                    <hr>
                    <div>

                        <strong>Skills:</strong>
                        @foreach($pershabil as $ph)
                        <span class="badge badge-success text-white">{{$ph->HabilidadesNombre}}</span>
                        @endforeach
                    </div>
                </div>{{--Fin de card--}}
            </div>{{--Fin de col-6--}}
        <div class="col-4">
            <div class="card">
                <div class="card-title pt-3 pl-3 pr-3">
                    <h4 class="mt-2">{{$persona->ProyectoNombre}} </h4>
                    <hr>
                </div>
                <div class="card-body">
                                <ul>Inicio: {{$persona->asigFechaIni}}</ul>
                                <ul>Fin: {{$persona->asigFechaFin}}</ul>
                </div>
            </div>
        </div>


    </div>{{--Fin del contenedor row--}}
    @endforeach



</div>{{--Fin del container--}}
@endsection



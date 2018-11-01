@extends('layouts.app')
@section('content')
<div class="container ">
    @include('sweet::alert')
{{--sdfsdf--}}
    <div class="row mb-2">

        <div class="col-12 d-flex justify-content-end mt-2">
            <!--href="{{route('personas.create')}}-->
            <a class="btn btn-info  mb-3 mr-1 text-white"  href="{{route('personas.index')}}">Volver</a>
            <a class="btn btn-info  mb-3 text-white"  data-toggle="modal" data-target="#deleteModal">Agregar recurso</a>
        </div>
        <div class="col-7">
            {!!Form::open(['method' => 'get','action'=>'Controller@search'])!!}
            <div class="input-group">
                {!!Form::select('tipoBusqueda',['pers'=>'Persona','habil'=>'Habilidad','cargo'=>'Cargo'],'Seleccione...',['class'=>'custom-select', 'id'=>'inputGroupSelect04 btn btn-outline-info'])!!}
                {{Form::text('busqueda',null,['class'=>'form-control w-50', 'aria-label'=>'Text input with segmented dropdown button', 'placeholder'=>'Valor a buscar'])}}
                <div class="input-group-append">
                    {!!Form::submit('Buscar',['class'=>'btn btn-outline-info'])!!}
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>{{--Fin de Row--}}

    <div class="row ">
        <div class="col-6 ">
            <div class="card p-2 ">
                @foreach($personas as $persona)
                    <div class="card-title mt-3">
                        <h4 class="mt-3 d-inline">{{$persona->PersonasNombreCompleto}}</h4>
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
                    <h4 class="mt-2">PROYECTO</h4>
                    <hr>
                </div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam similique minima et id consequatur facere doloremque, distinctio inventore quisquam veritatis officia blanditiis repellat ipsam voluptatum. Ipsum, odit. Minus, eius dolorem.Voluptatibus cupiditate eaque ab incidunt libero, fugit in voluptas modi recusandae esse laboriosam cumque aspernatur odit perspiciatis illum dolorum eum ipsam quod quisquam consequatur. Perferendis veniam ipsum sed omnis ad!
                </div>
            </div>
        </div>


    </div>{{--Fin del contenedor row--}}
    @endforeach



</div>{{--Fin del container--}}
@endsection


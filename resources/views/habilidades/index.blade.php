@extends('layouts.app')
@section('content')
@if(Auth::user()->hasRole('admin')
|| Auth::user()->hasRole('asistCom')
|| Auth::user()->hasRole('asistAdm')
|| Auth::user()->hasRole('presidente')
|| Auth::user()->hasRole('gerAdm')
|| Auth::user()->hasRole('gerCal')
|| Auth::user()->hasRole('gerOpe')
|| Auth::user()->hasRole('gerFin')
|| Auth::user()->hasRole('dirRH')
|| Auth::user()->hasRole('dirTi')
|| Auth::user()->hasRole('gerProy')
|| Auth::user()->hasRole('liderQa')
|| Auth::user()->hasRole('asistOpe'))
<div class="d-flex mt-3 ">
        <!--href="{{route('personas.create')}}-->

        <!--Busqueda de personas-->
        <div class="col-7 ">
            @include('personas.error')
            {!!Form::open(['method' => 'get','action'=>'Controller@search'])!!}
            <div class="input-group">
                {!!Form::select('tipoBusqueda',['habil'=>'Habilidad','pers'=>'Persona','cargo'=>'Cargo'],'Seleccione...',['class'=>'custom-select', 'id'=>'inputGroupSelect04 btn btn-outline-info pl-5'])!!}
                {{Form::text('busqueda',null,['class'=>'mt-1 pl-2 form-control w-50', 'aria-label'=>'Text input with segmented dropdown button', 'placeholder'=>'Buscar ', 'required'])}}
                
                <div class="input-group-append">
                    {!!Form::submit('Buscar',['class'=>'btn btn-outline-info'])!!}
                    
                </div>
                {!!Form::close()!!}
            </div>
        </div>
        <div class="col-5 d-flex justify-content-end clearfix">
                <a class="btn btn-outline-secondary  mb-3 mr-1 align-self-start"  href="{{route('personas.index')}}">Volver</a>
                {{-- <a class="btn btn-info  mb-3 text-white"  data-toggle="modal" data-target="#createModal">Agregar recurso</a> --}}
                <button class="btn btn-outline-info align-self-start" data-toggle="modal" data-target="#ingresoHabilidad">Nueva habilidad</button>
            </div>
    </div>
    <div class="container">


        <div class="card pl-5 pr-5 pt-2">
            <table class="table table-hover">
                <thead>
                    <th>Habilidad</th>
                    <th>Cantidad</th>
                </thead>
                <tbody>
                    @foreach($habilidades as $habilidad)
                    
                    <tr>
                    @if($habilidad->HabilidadesNombre != NULL)
                        
                        <td style="font-size: 14px">
                            <a href="{{Route('habilidades.search',$habilidad->HabilidadesID)}}">
                            {{$habilidad->HabilidadesNombre}}
                            </a>
                        </td>
                        <td style="font-size: 14px">{{$habilidad->cantidad}} </td>
                    
                    @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>




        
    
    
        <div class="modal fade" id="ingresoHabilidad" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nueva habilidad</h5>
                        <button class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!!Form::open(['action'=>'habilidadesController@store'])!!}
                        {!!Form::label('Nombre de habilidad')!!}
                        {!!Form::text('HabilidadesNombre',NULL,['class'=>'form-control'])!!}
                        {!!Form::label('Tipo')!!}
                        {!!Form::select('HabilidadesTipo',['HERRAMIENTA'=>'HERRAMIENTA','LENGUAJE'=>'LENGUAJE'],NULL,['class'=>'form-control'])!!}

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        {!!Form::submit('Guardar',['class'=>'btn btn-info'])!!}
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>

    @else
    <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">No tienes un rol asignado!</h4>
            <p>Pide a un administrador de plataforma que te asigne un rol para poder hacer uso de esta función</p>
          </div>
    @endif

@endsection

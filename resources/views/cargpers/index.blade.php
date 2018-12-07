@extends('layouts.app')
@section('content')
<div class="d-flex mt-3 ">
        <!--href="{{route('personas.create')}}-->

        <!--Busqueda de personas-->
        <div class="col-7 ">
            @include('personas.error')
            {!!Form::open(['method' => 'get','action'=>'Controller@search'])!!}
            <div class="input-group">
                {!!Form::select('tipoBusqueda',['habil'=>'Habilidad','pers'=>'Persona','cargo'=>'Cargo'],'Seleccione...',['class'=>'custom-select', 'id'=>'inputGroupSelect04 btn btn-outline-info pl-5'])!!}
                {{Form::text('busqueda',null,['class'=>'form-control w-50', 'aria-label'=>'Text input with segmented dropdown button', 'placeholder'=>'Valor a buscar', 'required'])}}
                
                <div class="input-group-append">
                    {!!Form::submit('Buscar',['class'=>'btn btn-outline-info'])!!}
                    
                </div>
                {!!Form::close()!!}

            </div>
        </div>
        <div class="col-5 d-flex justify-content-end clearfix">
                <a class="btn btn-info  mb-3 mr-1 text-white"  href="{{URL::previous()}}">Volver</a>
                {{-- <a class="btn btn-info  mb-3 text-white"  data-toggle="modal" data-target="#createModal">Agregar recurso</a> --}}
                
            </div>
    </div>

<div class="container">
  

    <div class="card p-4">
        <table class="table table-hover">
            <thead>
               <th>Consultor</th> 
               <th>Cargo</th> 
               <th>Contrato</th> 
               <th>Fecha inicio</th> 
               <th>Fecha fin</th> 

            </thead>
            <tbody>
                @foreach($cargpers as $cp)
                <tr>
                <td style="font-size: 15px"><a href="{{Route('personas.show',$cp->PersonasID)}}"> {{$cp->PersonasNombreCompleto}}</a></td> 
                       <td style="font-size: 15px">{{$cp->CargosNombre}}</td> 
                       <td style="font-size: 15px">{{$cp->ContTipo}}</td> 
                       <td style="font-size: 15px">{{$cp->CargPersFechaInicio}}</td> 
                       <td style="font-size: 15px">{{$cp->PersContrFechaFin}}</td> 

                
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
</div>

@endsection

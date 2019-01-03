@extends('layouts.app')
@section('content')
<div class="d-flex mt-3 ">
        <!--href="{{route('personas.create')}}-->

        <!--Busqueda de personas-->
        <div class="col-7 ">
            @include('personas.error')
            {!!Form::open(['method' => 'get','action'=>'Controller@search'])!!}
            <div class="input-group">
                {!!Form::select('tipoBusqueda',['habil'=>'Habilidad','pers'=>'Persona','cargo'=>'Cargo'],'Seleccione...',['class'=>'custom-select', 'id'=>'inputGroupSelect04 btn btn-outline-info'])!!}
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

    
    <div class="card p-4 ">
        
        {!!Form::open(['method'=>'PUT','route'=>['habilidades.update',$habilidad->HabilidadesID]])!!}
        <div class="input-group mb-4">
            {!!Form::text('HabilidadesID','Nombre habilidad',['class'=>'form-control', 'readonly','id'=>'inputGroupSelect04 btn btn-outline-info'])!!}
                    {{Form::text('HabilidadesNombre',$habilidad->HabilidadesNombre,['class'=>'ml-2 form-control w-50', 'aria-label'=>'Text input with segmented dropdown button', 'placeholder'=>'Buscar habilidad', 'required'])}}
                    @if(Auth::user()->hasRole('admin')
                    || Auth::user()->hasRole('gerOpe')
                    || Auth::user()->hasRole('asistOpe'))
                    <div class="input-group-append">
                        {!!Form::submit('Cambiar nombre',['class'=>'btn btn-outline-info'])!!}
                        
                    </div>
                    @endif
                    {!!Form::close()!!}
    
                </div>
            
            <div class="table-container">
            
                
                <div class="table">

        <table class="table table-hover">
            <thead>
                <th>NOMBRE COMPLETO</th>
                <th>CERTIFICADO</th>
                <th>NIVEL EXP</th>


            </thead>
            <tbody>
                    @foreach($pershabil as $ph)
                    <tr>

                    <td  style="font-size: 14px" ><a href="{{Route('personas.show',$ph->PersonasID)}}"
                            class="
                            @if($ph->PersonasEstado == 0)
                                {{'text-danger'}}
                            @endif
                        "> {{$ph->PersonasNombreCompleto}}</a></td>
                        <td style="font-size: 14px">{{$ph->PersHabilCertificacion}}</td>
                        <td style="font-size: 14px">{{$ph->PersHabilNivExp}}</td>
                    </tr>


                @endforeach

            </tbody>

        </table>
    </div>
</div>
</div>
</div>

@endsection

@extends('layouts.app')
@section('content')
<div class="container">
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

<div class="table">



<div class="table-container">
        <table class="table table-hover">
            <thead>
                <th>NOMBRE COMPLETO</th>
                <th>HABILIDAD</th>
                <th>CERTIFICADO</th>
                <th>NIVEL EXPERIENCIA</th>

                <th>ACTUALIZAR</th>
                <th>ELIMINAR</th>

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
                        <td style="font-size: 14px">{{$ph->HabilidadesNombre}}</td>
                        <td style="font-size: 14px">{{$ph->PersHabilCertificacion}}</td>
                        <td style="font-size: 14px">{{$ph->PersHabilNivExp}}</td>
                        <td style="font-size: 14px"><a href="" class="btn btn-outline-info">Actualizar</a>    </td>
                        <td style="font-size: 14px"><a href="" class="btn btn-outline-danger">Eliminar</a></td>
                    </tr>


                @endforeach

            </tbody>

        </table>
    </div>
</div>
</div>
@endsection

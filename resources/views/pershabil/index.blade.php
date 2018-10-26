@extends('layouts.layout')
@section('content')
<div class="container">
        <div class="d-flex justify-content-between mt-3 row">


                <!--href="{{route('personas.create')}}-->
                <div class="col-12 d-flex justify-content-end">
                        <div class="">
                                <a class="btn btn-info  mb-3 text-white"  href="{{route('personas.index')}}">Volver</a>
                                <a class="btn btn-info  mb-3 text-white"  data-toggle="modal" data-target="#deleteModal">Agregar recurso</a>
                            </div>
                </div>


                <!--Busqueda de personas-->
                <div class="col-6 mb-2">
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

            </div>



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

                        <td style="font-size: 14px"><a href=""
                            class="
                            @if($ph->PersonasEstado == 0)
                                {{'text-danger'}}
                            @endif
                            "
                            > {{$ph->PersonasNombreCompleto}}</a></td>
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
@endsection

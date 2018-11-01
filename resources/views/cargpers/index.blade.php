@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between mt-3 row">
        <!--href="{{route('personas.create')}}-->
        <div class="col-12 d-flex justify-content-end">
                <div class="">
                        <a class="btn btn-info  mb-3 text-white"  href="{{route('personas.index')}}">Volver</a>
                        <a class="btn btn-info  mb-3 text-white"  data-toggle="modal" data-target="#deleteModal">Agregar recurso</a>
                    </div>
        </div>

<div class="container">
        <div class="col-6 mb-2">
                {!!Form::open(['method' => 'get','action'=>'Controller@search'])!!}
                <div class="input-group">
                    {!!Form::select('tipoBusqueda',['cargo'=>'Cargo','habil'=>'Habilidad','pers'=>'Persona'],'Seleccione...',['class'=>'custom-select', 'id'=>'inputGroupSelect04 btn btn-outline-info'])!!}

                    {{Form::text('busqueda',null,['class'=>'form-control w-50', 'aria-label'=>'Text input with segmented dropdown button', 'placeholder'=>'Valor a buscar'])}}
                    <div class="input-group-append">
                        {!!Form::submit('Buscar',['class'=>'btn btn-outline-info'])!!}
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>

    <div class="table">
        <table class="table table-hover">
            <thead>
                        <th>NOMBRE COMPLETO</th>
                        <th>CARGO</th>
                        <th>INICIO CARGO</th>
                        <th>TIPO</th>
                        <th>INICIO CONTRATO</th>
                        <th>FIN CONTRATO</th>
                        <th>ACTUALIZAR</th>
                        <th>ELIMINAR</th>

            </thead>
            <tbody>
                @foreach($cargpers as $cp)
                <tr>

                                        <td  style="font-size: 14px" ><a href="{{Route('personas.show',$cp->PersonasID)}}"
                            class="
                            @if($cp->PersonasEstado == 0)
                                {{'text-danger'}}
                            @endif
                        "> {{$cp->PersonasNombreCompleto}}</a></td>
                        <td style="font-size: 14px">{{$cp->CargosNombre}}</td>
                        <td style="font-size: 14px">{{$cp->CargPersFechaInicio}}</td>
                        <td style="font-size: 14px">{{$cp->ContTipo}}</td>
                        <td style="font-size: 14px">{{$cp->PersContrFechaInicio}}</td>
                        <td style="font-size: 14px">{{$cp->PersContrFechaFin}}</td>
                        <td style="font-size: 14px">
                            <a href="" class="btn btn-outline-info inline">Actualizar</a>
                        </td>
                        <td style="font-size: 14px">
                            <a href="" class="btn btn-outline-danger">Eliminar</a>
                        </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
</div>

@endsection

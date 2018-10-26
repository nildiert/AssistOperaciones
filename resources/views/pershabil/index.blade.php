@extends('layouts.layout')
@section('content')
<div class="container">
        <div class="d-flex justify-content-between mt-3 row">

                <!--href="{{route('personas.create')}}-->
                    <div class="col-12 d-flex justify-content-end">
                            <div class="">

                                    <a class="btn btn-info  mb-3 text-white"  href="{{route('personas.index')}}">Volver</a>
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

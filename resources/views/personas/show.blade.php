@extends('layouts.app')
@section('content')
<div class="container ">
    @include('sweet::alert')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        @foreach($personas as $pers)

                        <h5 class="" style="font-size:18px"> {{$pers->PersonasNombreCompleto}}</h5>
                        <div class="col-2">

                            @if($pers->PersonasEstado == 0) 
                            <span class="badge badge-secondary text-white align-self-start">INACTIVO</span>
                            @else
                            <span style = "font-size:10px" class="mt-1 badge badge-primary text-white align-self-start">ACTIVO</span> 
                            @endif
                        </div>
                            @endforeach
                    </div>
                    <div class="card-text">
                                <table class="table table-hover table-responsive">
                                    <tbody>
                                        @foreach($personas as $pers)
                                        <tr> <td>Documento</td><td>{{$pers->PersonasDocumento}}</td><td></td> </tr>
                                        <tr> <td>Telefono</td><td>{{$pers->PersonasTel}}</td><td></td> </tr>
                                        <tr> <td>Especialidad</td><td>{{$pers->PersonasEspecialidad}}</td><td></td> </tr>
                                        <tr> <td>Estado</td><td>{{$pers->PersonasActivo}}</td><td></td> </tr>
                                        <tr> <td>Titulo</td><td>{{$pers->PersonasTitulo}}</td><td></td> </tr>
                                        <tr> <td>Ingreso</td><td>{{$pers->PersonasFechaIngreso}}</td><td></td> </tr>
                                        @if($pers->PersonasEstado == 0)
                                            <tr> <td>Retiro</td><td class="text-danger">{{$pers->PersonasFechaRetiro}}</td><td></td> </tr>
                                        @endif
                                    </tbody>
                                </table>
                    @endforeach
                    </div>
                    <div class="card-footer">
                            @foreach ($pershabil as $ph)
                                <span style = "font-size:12px" class="mt-1 badge badge-primary text-white align-self-start">{{$ph->HabilidadesNombre}} </span> 
                            @endforeach
                        </div>
                </div>
            </div>
        </div>

        <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex justify-content-between">
                            @foreach($personas as $pers)
        
                            <h5 class="" style="font-size:18px"> ASSIST</h5>

                                @endforeach
                        </div>
                        <div class="card-text">
                                    <table class="table table-hover table-responsive">
                                        <tbody>
                                            @foreach($personas as $pers)
                                            <tr> <td>Cargo</td><td>{{$pers->CargosNombre}}</td><td></td> </tr>
                                            <tr> <td>Contrato</td><td>{{$pers->ContTipo}}</td><td></td> </tr>
                                            
                                        </tbody>
                                    </table>
                        @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-3 card">
                        <div class="card-body">
                            <div class="card-title d-flex justify-content-between">
                                @foreach($personas as $pers)
            
                                <h5 class="" style="font-size:18px"> ASIGNACIÓN</h5>
    
                                    @endforeach
                            </div>
                            <div class="card-text">
                                        <table class="table table-hover table-responsive">
                                            <tbody>
                                                @foreach($proyectos as $proyecto)
                                            <tr><td width="400px"><a href="{{Route('proyecto.show',$proyecto->id)}}"> {{$proyecto->ProyectoNombre}}</a></td><td class="text-success"><span style = "font-size:12px" class="mt-1 badge badge-success text-white align-self-start">{{$proyecto->asigPorcentaje}} %</span></td> </tr>
                                                
                                                @endforeach
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                    </div>


            </div>
    
            {{-- <div class="col-6 align-self-start">

                </div> --}}

    </div>{{--Fin del row--}}
</div>{{--Fin del container--}}

<div class="d-flex justify-content-end">
<a href="{{URL::previous()}}" class="btn btn-info">Volver</a>
</div>
@endsection



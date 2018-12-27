@extends('layouts.app')
@section('content')
{{-- verificamos que el usuario registrado tenga un rol asignado --}}
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

    <div class="row">
        <div class="col-3">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$personas}}</h5>
                </div>
                <div class="card-footer">
                        <h5 class="text-danger">Consultores</h5>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-body">
                        <h5 class="card-title">{{$proyectos}}</h5>
                </div>
                <div class="card-footer">
                        <h5 class="text-success">Proyectos</h5>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$retiradoSemana->count()}}</h5>
                </div>
                <div class="card-footer">
                    <a data-toggle="modal" data-target=".retirosSemana" href=""> <h5 class="text-warning">Retiros semana</h5></a>
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".retirosSemana">Large modal</button> --}}
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$retiradoMes->count()}}</h5>
                </div>
                <div class="card-footer">
                    <h5 class="text-primary">Retiros mes</h5>
                </div>
            </div>
        </div> 
        <div    
        @if($novedades)
            class="col-4"
        @else
            class="col-6"
        @endif
        >
            <div class="card">
                <h5 class="card-header">Ingresos en el mes</h5>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>NOMBRE</th>
                            <th>INGRESO</th>
                        </thead>
                        <tbody>
                            @foreach($ingresosMes as $im)
                            <tr>
                            <td><a href="{{Route('personas.show',$im->PersonasID)}}"> {{$im->PersonasNombreCompleto}} </a></td>
                                <td>{{$im->PersonasFechaIngreso}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div 
        {{-- Si hay novedades disminuimos el tamaño de la tabla  --}}
        @if($novedades)
        class="col-4"
        @else
        class="col-6"
        @endif
        >
            <div class="card">
                <h5 class="card-header">Retiros en el mes</h5>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>NOMBRE</th>
                            <th>RETIRO</th>
                        </thead>

                        <tbody>
                            @foreach($retiradoMes as $rm)
                            <tr>
                            <td><a href="{{Route('personas.show',$rm->PersonasID)}}"> {{$rm->PersonasNombreCompleto}} </a></td>
                                <td>{{$rm->PersonasFechaRetiro}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
        {{-- Si hay novedades mostramos la tabla de novedades --}}
        @if($novedades)
        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Novedades</h5>
                <div class="card-body">
                    <ul class="list-group">
                        @if($periodoPrueba->count())
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a data-toggle="modal" data-target=".periodoPrueba" href="">Periodo de prueba</a>
                            
                            <span class="badge badge-primary badge-pill">{{$periodoPrueba->count()}}</span>
                            </li>
                        @endif
                        @if($finContratos->count())
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a data-toggle="modal" data-target=".finContrato" href="">Fin contrato</a>
                            <span class="badge badge-primary badge-pill">{{$finContratos->count()}}</span>
                            </li>
                        @endif
                        @if($retiros->count())
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a data-toggle="modal" data-target=".retiroDia" href="">Retiros del día</a>
                            <span class="badge badge-primary badge-pill">{{$retiros->count()}}</span>
                            </li>
                        @endif
                        @if($usuarios)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Usuarios nuevos
                            <span class="badge badge-primary badge-pill">1</span>
                            </li>
                        @endif
                        @if($usuarios) {{-- Si hay usuarios sin rol, la plataforma muestra la novedad --}}
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{route('usuarios.index')}}">Usuarios nuevos</a> 
                            <span class="badge badge-primary badge-pill">{{$usuarios}}</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        @endif

    </div>
    <!-- Modal de retiros de la semana  -->
        <div class="modal fade retirosSemana" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Retiros de la semana</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <table class="table table-hover">
                    @if($retiradoSemana->count()) 
                    <thead>
                        <th>Consultor</th>
                        <th>Ingreso</th>
                        <th>Retiro</th>
                    </thead>
                    <tbody>
                        @foreach($retiradoSemana as $rs)
                            <tr>
                                <td>{{$rs->PersonasNombreCompleto}}</td>
                                <td>{{$rs->PersonasFechaIngreso}}</td>
                                <td>{{$rs->PersonasFechaRetiro}}</td>
                            </tr>
                        @endforeach
                        @else
                            <p>No se han registrado retiros esta semana</p>
                        @endif
                    </tbody>
                </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            </div>
        </div>


{{-- Modal de periodo de prueba --}}
            <div class="modal fade periodoPrueba" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Consultores que finalizan su periodo de prueba</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <table class="table table-hover">
                            @if($periodoPrueba->count()) 
                            <thead>
                                <th>Consultor</th>
                                <th>Inicio periodo de prueba</th>
                                <th>Fin periodo de prueba</th>
                            </thead>
                            <tbody>
                                @foreach($periodoPrueba; as $pp)
                                    <tr>
                                        <td><a href="{{route('personas.show',$pp->PersonasID)}}">{{$pp->PersonasNombreCompleto}}</a></td>
                                        <td>{{$pp->CargPersPruebaInicio}}</td>
                                        <td>{{$pp->CargPersPruebaFin}}</td>
                                    </tr>
                                @endforeach
                                
                                @endif
                            </tbody>
                        </table>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                    </div>
        </div>


        {{-- Modal de finalización de contrato --}}
        <div class="modal fade finContrato" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Consultores que finalizan su contrato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <table class="table table-hover">
                        @if($finContratos->count()) 
                        <thead>
                            <th>Consultor</th>
                            <th>Inicio de contrato</th>
                            <th>Fin de contrato</th>
                        </thead>
                        <tbody>
                            @foreach($finContratos; as $fc)
                                <tr>
                                <td><a href="{{route('personas.show',$fc->PersonasID)}}"> {{$fc->PersonasNombreCompleto}}</a></td>
                                    <td>{{$fc->PersContrFechaInicio}}</td>
                                    <td>{{$fc->PersContrFechaFin}}</td>



                                </tr>
                            @endforeach
                            
                            @endif
                        </tbody>
                    </table>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                </div>
    </div>



        {{-- Modal de retiros del dia de contrato --}}
        <div class="modal fade retiroDia" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Consultores que se retiran el día de hoy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <table class="table table-hover">
                        @if($retiros->count()) 
                        <thead>
                            <th>Consultor</th>
                            <th>Fecha de retiro</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($retiros; as $rt)
                                <tr>
                                <td><a href="{{Route('personas.show',$rt->PersonasID)}}">{{$rt->PersonasNombreCompleto}}</a> </td>
                                    <td>{{$rt->PersonasFechaRetiro}}</td>

                                    <td>
                                    {!!Form::open(['method'=>'GET','route'=>['personas.retiro',$rt->PersonasID]])!!}
                                    {!!Form::submit('Confirmar retiro',['class'=>'btn btn-outline-danger'])!!}
                                    {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                            
                            @endif
                        </tbody>
                    </table>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
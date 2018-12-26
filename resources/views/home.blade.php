@extends('layouts.app')
@section('content')
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
                <h5 class="card-title">{{$cuentaRetirosSemana}}</h5>
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
                <h5 class="card-title">{{$cuentaRetirosMes}}</h5>
            </div>
            <div class="card-footer">
                <h5 class="text-primary">Retiros mes</h5>
            </div>
        </div>
    </div> 
    <div class="col-4">
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
    <div class="col-4">
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
    <div class="col-4">
        <div class="card">
            <h5 class="card-header">Novedades</h5>
            <div class="card-body">
                    <ul class="list-group">
                            {{-- <li class="list-group-item d-flex justify-content-between align-items-center">
                              Periodo de prueba
                              <span class="badge badge-primary badge-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Fin de contrato
                              <span class="badge badge-primary badge-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Retiros del día
                              <span class="badge badge-primary badge-pill">1</span>
                            </li> --}}
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{route('usuarios.index')}}">Usuarios nuevos</a> 
                              <span class="badge badge-primary badge-pill">{{$usuarios}}</span>
                            </li>
                          </ul>
            </div>
        </div>
    </div>

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
                  @if($cuentaRetirosSemana) 
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

@endsection
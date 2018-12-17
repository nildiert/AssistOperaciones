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
                <h5 class="text-warning">Retiros semana</h5>
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
    <div class="col-6">
        <div class="card">
            <h5 class="card-header">Ingresos</h5>
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
    <div class="col-6">
        <div class="card">
            <h5 class="card-header">Retiros</h5>
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

</div>






@endsection
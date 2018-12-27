@extends('layouts.app')
@section('content')
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
<div class="container">
    @if(Auth::user()->hasRole('admin'))
        <div class="d-flex justify-content-end">
            <div class=" btn btn-outline-info mb-2" data-toggle="modal" data-target="#agregarProyecto">Nuevo proyecto</div>
        </div>
    @endif
<div class="card">
    <table class="table table-hover">
        <thead>
                <th>Nombre</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Presupuesto</th>

        </thead>
        <tbody>
            @foreach($proyectos as $proyecto)
                <tr>
                <td><a href="{{Route('proyecto.show',$proyecto->id)}}"> {{$proyecto->ProyectoNombre}}</a></td>
                <td>{{$proyecto->ProyFechaIni}}</td>
                <td>{{$proyecto->ProyectoFechaFin}}</td>
                <td class="presupuesto">{{$proyecto->ProyectoPresupuesto}}</td>
                <td >@if($proyecto->ProyectoEstado == 1)
                        <span class="badge badge-primary text-white">Activo</span>
                        @else
                        <span class="badge badge-danger text-white">Inactivo</span>

                    @endif
                </tr>


            @endforeach

        </tbody>
    </table>


</div>



</div>


<div class="modal fade" id="agregarProyecto" role="dialog" aria-labelledly="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Proyecto</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
                <div class="modal-body">
                        {!!Form::open(['action'=>'proyectoController@store'])!!}
                        {!!Form::label('Cliente')!!}
                        {!!Form::select('cliente_cliID',$clientes,'Selecciona cliente', ['class'=>'form-control mb-1','id'=>'cliente','placeholder'=>'Selecciona cliente'])!!}
                        {!!Form::label('Gerente')!!}
                        {!!Form::select('Gerente_GerenteID',$gerentes,'Selecciona gerente', ['class'=>'form-control mb-1','id'=>'gerente','placeholder'=>'Selecciona gerente'])!!}
                        {!!Form::label('Linea de negocio')!!}
                        {!!Form::select('lineanegocio_linNegID',$lineas,'Selecciona linea de negocio',['class'=>'form-control mb-1','id'=>'linea','placeholder'=>'Selecciona linea de negocio'])!!}
                        {!!Form::label('ProyectoNombre','Nombre proyecto')!!}
                        {!!Form::text('ProyectoNombre',null,['class'=>'form-control','id'=>'proyNombre'])!!}
                        {!!Form::label('Fecha inicio')!!}
                        {!!Form::date('ProyFechaIni',now(),['class'=>'form-control'])!!}
                        {!!Form::label('Fecha fin')!!}
                        {!!Form::date('ProyectoFechaFin',now(),['class'=>'form-control'])!!}
                        {!!Form::label('Presupuesto')!!}
                        {!!Form::text('Pre',null,['class'=>'form-control','id'=>'pre'])!!}
                        {!!Form::label('ProyectoDescripcion','Descripción')!!}
                        {!!Form::text('ProyectoDescripcion',null,['class'=>'form-control'])!!}
                        {!!Form::text('ProyectoPresupuesto',null,['class'=>'form-control','id'=>'ProyectoPresupuesto','hidden'])!!}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        {!!Form::submit('Guardar proyecto',['class'=>' btn btn-info form-group','id'=>'enviarProyecto'])!!}
        
        
                        {!!Form::close()!!}

            </div>
        </div>
    </div>
</div>


<script>
        $(document).ready(function(){
    
            var valor ="";
    
            $("#linea").change(function(){
                var linea = "";
                var nombre = "";
    
                $("#linea option:selected").each(function(){
                    linea += $(this).text() + "";
                    nombre += $("#cliente option:selected").text() + "";
                });
                $("#proyNombre").val(nombre +"-"+linea);
    
            });
    
    
            $("#pre").number(true);
    
            $("#enviarProyecto").click(function(){
                valor = $("#pre").val();
                $("#ProyectoPresupuesto").val(valor);
                // $("#pre").remove();
            });
    
    
    
        });
    
    
    
    
    
    </script>
<script>
    $(document).ready(function(){
        $(".presupuesto").number(true);
    });

</script>

@else
<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">No tienes un rol asignado!</h4>
        <p>Pide a un administrador de plataforma que te asigne un rol para poder hacer uso de esta función</p>
      </div>
@endif

@endsection

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-6">

            <div class="card">
                <div class="card-title mt-3 ml-3">
                    <h3>NUEVO PROYECTO</h3>
                </div>
                <div class="card-body">
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
                {!!Form::submit('Enviar',['class'=>'mt-2 btn btn-info form-group','id'=>'enviarProyecto'])!!}


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

</div>
@endsection

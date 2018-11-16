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
                {!!Form::label('ProyectoNombre','Nombre proyecto')!!}
                {!!Form::text('ProyectoNombre',null,['class'=>'form-control','id'=>'proyNombre'])!!}
                {!!Form::label('ProyCodigo')!!}
                {!!Form::text('ProyCodigo',null,['class'=>'form-control','id'=>'proycodigo'])!!}
                {!!Form::label('ProyFechaIni')!!}
                {!!Form::date('ProyFechaIni',now(),['class'=>'form-control'])!!}
                {!!Form::label('ProyectoFechaFin')!!}
                {!!Form::date('ProyectoFechaFin',now(),['class'=>'form-control'])!!}
                {!!Form::label('ProyectoPresupuesto')!!}
                {!!Form::number('ProyectoPresupuesto',null,['class'=>'form-control'])!!}
                {!!Form::label('ProyectoDescripcion','Descripción')!!}
                {!!Form::text('ProyectoDescripcion',null,['class'=>'form-control'])!!}
                {!!Form::submit('Enviar',['class'=>'btn btn-info form-group'])!!}


                {!!Form::close()!!}
            </div>
        </div>

        </div>
    </div>
<script>
    $(document).ready(function(){

        $("#cliente").change(function(){
            var codigo = "";
            $("select option:selected").each(function(){
                codigo += $(this).text() + "-";
            });
            $("#proyNombre").val(codigo);
            $("#proycodigo").val(codigo);
        });

    });

    

</script>

</div>
@endsection

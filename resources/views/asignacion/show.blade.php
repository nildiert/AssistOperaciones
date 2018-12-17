@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="d-flex justify-content-between">
                        {{$asigCodigo}}
                        <button class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Asignar personas</button>
                    </div>
                </div>
            </div>
            <div class="card-text">

                <table class="table table-hover">
                    <thead>
                            <th>Nombre</th>
                            <th>Ubicación</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Porcentaje</th>
                            <th>Observaciones</th>

                    </thead>
                    <tbody>
                        @foreach($asignados as $asig)
                            <tr style="font-size: 14px">
                                <td><a class="" href="{{Route('personas.show',$asig->personas_PersonasID)}}"> {{$asig->PersonasNombreCompleto}}</a></td>
                                <td>{{$asig->ubicacion}}</td>
                                <td>{{$asig->fechaInicio}}</td>
                                <td>{{$asig->fechaFin}}</td>
                                
                                <td><span style = "font-size:12px" class="mt-1 badge badge-success text-white align-self-start">{{$asig->porcentaje}} %</span></td>
                                <td>{{$asig->observaciones}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <a href="{{URL::previous()}}" class="btn btn-info">Volver</a>
        </div>
    </div>

<div class="modal fade bd-example-modal-lg" id="asignarPersonas" role="dialog" aria-llabelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asignar personas</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="d-flex justify-content-end pt-2 pr-3">
                <button id="agregarPersona" class="btn btn-info">Agregar persona</button>
            </div>
            <div class="modal-body">
                {!!Form::open(['action'=>'asigPersController@store'])!!}
                
                <div class="form-row">
                    <div class="col">
                        {!!Form::label('Recurso')!!} 
                    </div>
                    <div class="col">
                        {!!Form::label('fecha inicio')!!} 
                    </div>
                    <div class="col">
                        {!!Form::label('fecha fin')!!} 
                    </div>
                    <div class="col">
                            {!!Form::label('porcentaje')!!}
                        </div>

                    <div class="col">
                        {!!Form::label('observaciones')!!} 
                    </div>
                    <div class="col">
                        {!!Form::label('Ubicación')!!} 
                    </div>
                    
                </div>
                <div id="contenido">
                    <div class="form-row">
                            {!!Form::hidden('nuevaAsignacion[0][asignacion_asigID]',$asignacion)!!} 
                        <div class="col">
                            {!!Form::select(' nuevaAsignacion[0][personas_PersonasID]',$personas,NULL,['class'=>'form-control'])!!} 
                        </div>
                        <div class="col">
                            {!!Form::date(' nuevaAsignacion[0][fechaInicio]',null,['class'=>'form-control mt-2'])!!} 
                        </div>
                        <div class="col">
                            {!!Form::date(' nuevaAsignacion[0][fechaFin]',null,['class'=>'form-control mt-2'])!!} 
                        </div>
                        <div class="col">
                            {!!Form::number('nuevaAsignacion[0][porcentaje]','100',['class'=>'form-control mt-2'])!!}
                        </div>
                        <div class="col">
                            {!!Form::text(' nuevaAsignacion[0][observaciones]',null,['class'=>'form-control mt-2'])!!} 
                        </div>
                        <div class="col">
                            {!!Form::select(' nuevaAsignacion[0][ubicacion]',['Cliente'=>'Cliente','Oficina'=>'Oficina','Cliente/Oficina'=>'Cliente/Oficina',],null,['class'=>'form-control'])!!} 
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                {!!Form::submit('Guardar asignación',['class'=>'btn btn-info'])!!}
                {!!Form::close()!!}
            </div>
        </div>
    </div>

</div>
<script>
    var agregar=0;
    $("#agregarPersona").click(function(){
        agregar++;
        $("#contenido").before(
                `<div id="contenido" class="mb-2">
                    <div class="form-row">
                        <div class="col">
                                {!!Form::hidden('nuevaAsignacion[${agregar}][asignacion_asigID]',$asignacion)!!} 
                            {!!Form::select(' nuevaAsignacion[${agregar}][personas_PersonasID]',$personas,NULL,['class'=>'form-control'])!!} 
                        </div>
                        <div class="col">
                            {!!Form::date(' nuevaAsignacion[${agregar}][fechaInicio]',null,['class'=>'form-control mt-2'])!!} 
                        </div>
                        <div class="col">
                            {!!Form::date(' nuevaAsignacion[${agregar}][fechaFin]',null,['class'=>'form-control mt-2'])!!} 
                        </div>
                        <div class="col">
                            {!!Form::number('nuevaAsignacion[${agregar}][porcentaje]','100',['class'=>'form-control mt-2'])!!}
                        </div>
                        <div class="col">
                            {!!Form::text(' nuevaAsignacion[${agregar}][observaciones]',null,['class'=>'form-control mt-2'])!!} 
                        </div>
                        <div class="col">
                            {!!Form::select(' nuevaAsignacion[${agregar}][ubicacion]',['Cliente'=>'Cliente','Oficina'=>'Oficina','Cliente/Oficina'=>'Cliente/Oficina',],null,['class'=>'form-control'])!!} 
                        </div>
                    </div>
                </div>`
        );
    });

</script>

@endsection




	
	
	
	
	
	
	
	
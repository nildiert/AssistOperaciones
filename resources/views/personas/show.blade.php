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
                            @if($ph->HabilidadesNombre != NULL)
                                <span style = "font-size:12px" class="mt-1 badge badge-primary text-white align-self-start">{{$ph->HabilidadesNombre}} </span> 
                                @else
                                    <p>No se han agregado habilidades</p> 
                                @endif
                                @endforeach
                            </div>
                        <div class="d-flex justify-content-end">
                                <button  type="button" class="btn btn-info mt-2" data-toggle="modal" data-target=".bd-habilidades-modal-lg">Agregar habilidades</button>
                            
                        </div>
                </div>
            </div>
        </div>

        <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex justify-content-between">
                            <h5 class="" style="font-size:18px"> ASSIST</h5>
                        </div>
                        <div class="card-text">
                                    <table class="table table-hover table-responsive">
                                        <tbody>
                                            @foreach($personas as $pers)
                                                @if($pers->CargosNombre != NULL)    
                                                <tr> <td>Cargo</td><td>{{$pers->CargosNombre}}</td><td></td> </tr>
                                                @else
                                                <tr>
                                                    <td with="100px"><span class=""><p> No se ha asignado un cargo</p></span></td>
                                                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#agregarCargo">Agregar cargo</button></td>
                                                    
                                                     
                                                </tr>
                                                <br>
                                                @endif
                                                @if($pers->ContTipo != NULL)    
                                                <tr> <td>Contrato</td><td>{{$pers->ContTipo}}</td><td></td> </tr>
                                                @else
                                                <tr>
                                                    <td><p>No se ha asignado tipo de contrato</p> </td>
                                                    <td>
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#agregarContrato">Agregar contrato</button>
                                                    </td>
                                                </tr>
                                                @endif

                                            
                                        </tbody>
                                    </table>
                        @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-3 card">
                        <div class="card-body">
                            <div class="card-title d-flex justify-content-between">
            
                                <h5 class="" style="font-size:18px"> ASIGNACIÓN</h5>
                                
                            </div>
                            <div class="card-text">
                                <table class="table table-hover table-responsive">
                                    <tbody>
                                            
                                            @foreach($proyectos as $proyect)
                                            
                                    <tr><td width="400px"><a href="{{route('asignacion.show',$proyect->asigID)}}"> {{$proyect->asigCodigo}}</a></td><td class="text-success"><span style = "font-size:12px" class="mt-1 badge badge-success text-white align-self-start">{{$proyect->porcentaje}}%</span></td> </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <hr>
                                        
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




<div class="modal fade bd-habilidades-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header">
                        <div class="d-flex justify-content-start">
                            <h5 class="modal-title" id="editModalLabel">Agregar habilidad</h5>
                        </div>  
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                                        <div class="d-flex justify-content-end pt-2 pr-2">
                                            <span> <a href="#" class="btn btn-info" id="agregarHabilidad">Agregar</a></span>
                                        </div>
                <div class="modal-body ">
                    {!!Form::open(['action'=>'persHabilController@store'])!!}
                    <div class="form-row">
                        <div class="col">{!!Form::label('Habilidad')!!}</div>
                        <div class="col">{!!Form::label('Certificación')!!}</div>
                        <div class="col">{!!Form::label('Nivel')!!}</div>
                        
                    </div>
                    <div id="contenido" class="mt-2">
                        
                        
                        
                        <div class="form-row">
                            {!!Form::hidden('id',$id)!!}
                            <div class="col">
                                {!!Form::select('nuevaHabilidad[0][Habilidadess_HabilidadesID]',$habilidades,null,['class'=>'form-control','placeholder'=>'Habilidad'])!!}
                            </div>
                            <div class="col">
                                {!!Form::text('nuevaHabilidad[0][PersHabilCertificacion]','NO',['class'=>'form-control','placeholder'=>'Certificación'])!!}
                            </div>
                            <div class="col">
                                {!!Form::select('nuevaHabilidad[0][PersHabilNivExp]',['BAJO'=>'BAJO', 'INTERMEDIO'=>'INTERMEDIO', 'AVANZADO'=>'AVANZADO'],'BAJO',['class'=>'form-control'])!!}
                            </div>
                            
                        </div>
                    </div>
                        
                </div>{{--Fin modal-body--}}
                <div class="modal-footer">
                    {!!Form::button('Cancelar',['class'=>'btn btn-secondary','data-dismiss'=>'modal'])!!}
                    {!!Form::submit('Guardar',['class'=>'btn btn-info'])!!}
                {!!Form::close()!!}
                </div>
          </div>
        </div>
      </div>


{{-- Modal agregar contrato --}}
<div class="modal fade" id="agregarContrato" role="dialog" aria-labelledby="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar contrato</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{Form::open(['action'=>'persContrController@store'])}}
                {!!Form::label('Tipo de contrato')!!}
                {!!Form::select('Contratos_ContId',$contratos,null,['class'=>'form-control'])!!}
                <div class="form-row pt-2">
                    <div class="col">
                        {!!Form::hidden('Personas_PersonasID',$id)!!}
                        {!!Form::label('Inicio')!!}
                        {!!Form::date('PersContrFechaInicio',now(),['class'=>'form-control'])!!}
                    </div>
                    <div class="col">

                        {!!Form::label('Fin')!!}
                        {!!Form::date('PersContrFechaFin',null,['class'=>'form-control'])!!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" >Guardar</button>
                {!!Form::close()!!}
            </div>

        </div>
    </div>
</div>


{{-- Modal agregar cargo --}}

<div class="modal fade" id="agregarCargo" role="dialog" aria-labelleledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle" id="exampleModalLabel">Agregar cargo</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!!Form::open(['action'=>'CargPersController@store'])!!}
                    {!!Form::label('Cargo')!!}
                    {!!Form::select('cargos_CargosID',$cargos,null,['class'=>'form-control','placeholder'=>'Selecciona el cargo'])!!}
                    <hr>
                    <div class="form-row">
                        {!!Form::hidden('personas_PersonasID',$id)!!}
                        <div class="col">
                            {!!Form::label('Fecha de inicio')!!}
                            {!!Form::date('CargPersFechaInicio',now(),['class'=>'form-control'])!!}
                        </div>
                        <div class="col">
                            {!!Form::label('Fecha de fin')!!}
                            {!!Form::date('CargPersFechaFin',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col">
                            {!!Form::label('CargPersPruebaInicio')!!}
                            {!!Form::date('CargPersPruebaInicio',now(),['class'=>'form-control'])!!}
                        </div>
                        <div class="col">
                            {!!Form::label('CargPersPruebaFin')!!}
                            {!!Form::date('CargPersPruebaFin',null,['class'=>'form-control'])!!}
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary">Guardar</button>
                </div>
                
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>

      

<script>
    var agregar = 0
    $('#agregarHabilidad').click(function(){
        agregar++;
        $("#contenido").before(
            `            <div id="contenido" class="mt-2">
                        <div class="form-row">

                            <div class="col">
                                {!!Form::select('nuevaHabilidad[${agregar}][Habilidadess_HabilidadesID]',$habilidades,null,['class'=>'form-control','placeholder'=>'Habilidad'])!!}
                            </div>
                            <div class="col">
                                {!!Form::text('nuevaHabilidad[${agregar}][PersHabilCertificacion]','NO',['class'=>'form-control','placeholder'=>'Certificación'])!!}
                            </div>
                            <div class="col">
                                {!!Form::select('nuevaHabilidad[${agregar}][PersHabilNivExp]',['BAJO'=>'BAJO', 'INTERMEDIO'=>'INTERMEDIO', 'AVANZADO'=>'AVANZADO'],'BAJO',['class'=>'form-control'])!!}
                            </div>
                        </div>
                    </div>`
        );
    });

</script>



@endsection




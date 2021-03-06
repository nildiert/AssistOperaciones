
@extends('layouts.app')
@section('content')
<div class="container ">
    @include('sweet::alert')
    <div class="row">
        <div class="col-12">
            <div class="card">
                    @if($retiroHoy)

                    <div class="alert alert-secondary" role="alert">
                    <div class="d-flex justify-content-between">
                        <span class="align-self-center"> Existe un retiro pendiente el día de hoy para este consultor!</span>
                        @foreach($personas as $pers)
                        <div>
                            <span><button class="btn btn-outline-secondary ">Cancelar retiro</button></span>
                        <span><a href="{{route('personas.retiro',$pers->PersonasID)}}" class="btn btn-outline-primary align-self-start">Confirmar retiro</a ></span>
                        @endforeach
                        </div>
                    </div>
                    </div>
                    @endif
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
                                    <tbody>
                                        @foreach($personas as $pers)
                                        {!!Form::open(['method'=>'PUT','route'=>['personas.update',$pers->PersonasID]])!!}
                                        <div class="form-row">
                                            <div class="col">
                                                {!!Form::label('PersonasPriApellido','Primer apellido')!!}{!!Form::text('PersonasPriApellido',$pers->PersonasPriApellido,['class'=>'form-control'])!!}
                                            </div>
                                            <div class="col">
                                                {!!Form::label('PersonasSegApellido','Segundo apellido')!!}{!!Form::text('PersonasSegApellido',$pers->PersonasSegApellido,['class'=>'form-control'])!!}
                                            </div>
                                            <div class="col">
                                                {!!Form::label('PersonasPrimNombre','Primer nombre')!!}{!!Form::text('PersonasPrimNombre',$pers->PersonasPrimNombre,['class'=>'form-control'])!!}
                                            </div>
                                            <div class="col">
                                                {!!Form::label('PersonasSegNombre','Segundo nombre')!!}{!!Form::text('PersonasSegNombre',$pers->PersonasSegNombre,['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="col">
                                                {!!Form::label('PersonasTipoDoc','Tipo documento')!!}
                                                {!!Form::select('PersonasTipoDoc',['CC'=>'Cedula de ciudadania','CE'=>'Cédula de extranjeria','PA'=>'Pasaporte'],$pers->PersonasTipoDoc,['class'=>'form-control'])!!}
                                            </div>
                                            <div class="col">
                                                {!!Form::label('PersonasDocumento','Documento')!!}
                                                {!!Form::text('PersonasDocumento',$pers->PersonasDocumento,['class'=>'form-control mt-2'])!!}
                                            </div>
                                            <div class="col">
                                                {!!Form::label('PersonasTel','Telefono')!!}
                                                {!!Form::number('PersonasTel',$pers->PersonasTel,['class'=>'form-control mt-2'])!!}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="col">
                                                    {!!Form::label('PersonasEspecialidad','Especialidad')!!}{!!Form::text('PersonasEspecialidad',$pers->PersonasEspecialidad,['class'=>'form-control'])!!}
                                            </div>
                                            <div class="col">
                                                {!!Form::label('PersonasTitulo','Titulo')!!}{!!Form::text('PersonasTitulo',$pers->PersonasTitulo,['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="col">
                                                {!!Form::label('PersonasFechaIngreso','Ingreso')!!}{!!Form::date('PersonasFechaIngreso',$pers->PersonasFechaIngreso,['class'=>'form-control mt-2'])!!}
                                            </div>
                                            @if(!$pers->PersonasEstado)
                                            <div class="col">
                                                {!!Form::label('PersonasFechaRetiro','Retiro')!!}
                                                {!!Form::date('PersonasFechaRetiro',$pers->PersonasFechaRetiro,['class'=>'form-control mt-2'])!!}
                                            </div>
                                            @endif
                                            <div class="col">
                                                {!!Form::label('PersonasActivo','Estado')!!}
                                                {!!Form::select('PersonasActivo',$estados,$pers->PersonasActivo,['class'=>'form-control'])!!}
                                                {!!Form::hidden('PersonasEstado',$pers->PersonasEstado)!!}
                                            </div>
                                        </div>
                                    </tbody>
                                    <div class="mt-2">
                                        @if(Auth::user()->hasRole('admin')
                                        || Auth::user()->hasRole('gerOpe')
                                        || Auth::user()->hasRole('asistOpe'))

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#retiroModal">
                                                Retiro
                                            </button>
                                            {!!Form::submit('Actualizar',['class'=>'btn btn-info '])!!}
                                        @endif
                                    </div>
                                {!!Form::close()!!}
                    @endforeach
                    </div>
                    <div class="card-footer">
                        @foreach ($pershabil as $ph)
                            @if($ph->HabilidadesNombre != NULL)
                                <span style = "font-size:12px" class="mt-1 badge badge-primary text-white align-self-start">{{$ph->HabilidadesNombre}} 
                                    <button type="button" class="btn-primary badge badge-primary align-self-start" aria-label="Close">
                                        <span aria-hidden="true" style = "font-size:12px">&times;</span>
                                    </button>
                                </span> 
                            @else
                                <p>No se han agregado habilidades</p> 
                            @endif
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-end">
                            @if(Auth::user()->hasRole('admin')
                            || Auth::user()->hasRole('gerOpe')
                            || Auth::user()->hasRole('asistOpe'))
                            <button  type="button" class="btn btn-info mt-2" data-toggle="modal" data-target=".bd-edithabilidades-modal-lg">Editar habilidades</button>
                            <button  type="button" class="btn btn-info mt-2" data-toggle="modal" data-target=".bd-habilidades-modal-lg">Agregar habilidades</button>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
<hr>
<div class="row">
        <div class="col-6 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex justify-content-between">
                            <h5 class="" style="font-size:18px"> ASSIST</h5>
                        </div>
                        <div class="card-text">
                                    <table class="table table-hover table-responsive">
                                        <thead>
                                            <th>Cargo </th>
                                            <th>Inicio prueba</th>
                                            <th>Fin prueba</th>
                                            <th></th>
                                        </thead>

                                        <tbody>
                                            @foreach($personas as $pers)
                                                @if($pers->CargosNombre != NULL)    
                                                <tr>
                                                    <td>{{$pers->CargosNombre}}</td>
                                                    <td >{{$pers->CargPersPruebaInicio}}</td> 
                                                    <td >{{$pers->CargPersPruebaInicio}}</td>
                                                    {{-- <td ><button class="btn btn-info">Actualizar</button> </td> --}}
                                                </tr>
                                                @else
                                                <tr>
                                                    <td with="100px"><span class=""><p> No se ha asignado un cargo</p></span></td>
                                                    @if(Auth::user()->hasRole('admin')
                                                    || Auth::user()->hasRole('gerOpe')
                                                    || Auth::user()->hasRole('asistOpe'))
                                                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#agregarCargo">Agregar cargo</button></td>
                                                    @endif
                                                </tr>
                                                <br>
                                                @endif
                                            </tbody>
                                        </table>
                                        <table class="table table-hover table-responsive">
                                            <thead>
                                                <th>Contrato</th>
                                                <th>Inicio</th>
                                                <th>Fin</th>
                                            </thead>
                                        
                                            <tbody>
                                        
                                                @if($pers->ContTipo != NULL)    
                                                {{now() < $pers->PersContrFechaInicio}}
                                                    <tr> 
                                                        <td>{{$pers->ContTipo}}</td>
                                                        <td>{{$pers->PersContrFechaInicio}}</td>
                                                        <td>{{$pers->ContTipo}}</td>
                                                    </tr>
                                                @else
                                                <tr>
                                                    <td><p>No se ha asignado tipo de contrato</p> </td>
                                                    @if(Auth::user()->hasRole('admin')
                                                    || Auth::user()->hasRole('gerOpe')
                                                    || Auth::user()->hasRole('asistOpe'))
                                                    <td>
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#agregarContrato">Agregar contrato</button>
                                                    </td>
                                                    @endif
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                        @endforeach

                        </div>
                    </div>
                </div>
                {{-- Botones para cambiar el tipo de cargo y contrato --}}
                <div class="d-flex justify-content-end mt-2">
                    {{-- <button class="btn btn-outline-info mr-2">Actualizar cargo</button>
                    <button class="btn btn-outline-info">Actualizar contrato</button> --}}
                </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h5 class="" style="font-size:18px"> ASIGNACIÓN</h5>

                    </div>
                    <div class="card-text">
                        <table class="table table-hover table-responsive">
                            <tbody>
                                @foreach($proyectos as $proyect)
                                    @if($proyect->asigCodigo == NULL)
                                        <p>NO HAY PROYECTOS ASIGNADOS</p>
                                    @else
                                        <tr><td width="400px"><a href="{{route('asignacion.show',$proyect->asigID)}}"> {{$proyect->asigCodigo}}</a></td><td class="text-success"><span style = "font-size:12px" class="mt-1 badge badge-success text-white align-self-start">{{$proyect->porcentaje}}%</span></td> </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <hr> 
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <a href="{{URL::previous()}}" class="btn btn-outline-info">Volver</a>
            </div>
        </div>
    </div>{{-- Fin del row --}}
</div>{{--Fin del container--}}






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
                                {!!Form::select('nuevaHabilidad[0][Habilidadess_HabilidadesID]',$habilidades,null,['class'=>'form-control ','placeholder'=>'Habilidad'])!!}
                            </div>
                            <div class="col">
                                {!!Form::text('nuevaHabilidad[0][PersHabilCertificacion]','NO',['class'=>'form-control pt-3','placeholder'=>'Certificación'])!!}
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


      {{-- Modal para editar las habilidades --}}
<div class="modal fade bd-edithabilidades-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header">
                        <div class="d-flex justify-content-start">
                            <h5 class="modal-title" id="editModalLabel">Editar habilidades</h5>
                        </div>  
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <div class="modal-body ">
                    {!!Form::open(['method'=>'PUT','action'=>'persHabilController@actualizar'])!!}
                    <div class="form-row">
                        <div class="col">{!!Form::label('Habilidad')!!}</div>
                        <div class="col">{!!Form::label('Certificación')!!}</div>
                        <div class="col">{!!Form::label('Nivel')!!}</div>
                        
                    </div>
                    @foreach($pershabil as $key=>$ph)
                    <div id="contenido" class="mt-2">
                        
                        <div class="form-row">
                            {!!Form::hidden('id',$id)!!}
                            <div class="col">
                                {!!Form::hidden('habilidades['.$key.'][PersHabilID]',$ph->PersHabilID)!!}
                                {!!Form::text('habilidades['.$key.'][HabilidadesNombre]',$ph->HabilidadesNombre,['class'=>'form-control pt-3','readonly'])!!}
                            </div>
                            <div class="col">
                                {!!Form::text('habilidades['.$key.'][PersHabilCertificacion]',$ph->PersHabilCertificacion,['class'=>'form-control pt-3','placeholder'=>'Certificación'])!!}
                            </div>
                            <div class="col">
                                {!!Form::select('habilidades['.$key.'][PersHabilNivExp]',['BAJO'=>'BAJO', 'INTERMEDIO'=>'INTERMEDIO', 'AVANZADO'=>'AVANZADO'],$ph->PersHabilNivExp,['class'=>'form-control'])!!}
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                        
                </div>{{--Fin modal-body--}}
                <div class="modal-footer">
                    {!!Form::button('Cancelar',['class'=>'btn btn-secondary','data-dismiss'=>'modal'])!!}
                    {!!Form::submit('Actualizar',['class'=>'btn btn-info'])!!}
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
                            {!!Form::label('Inicio prueba')!!}
                            {!!Form::date('CargPersPruebaInicio',now(),['class'=>'form-control'])!!}
                        </div>
                        <div class="col">
                            {!!Form::label('Fin prueba')!!}
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

 

  
  <!-- Modal retiro de personas -->
  <div class="modal fade" id="retiroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Retiro de consultor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="alert alert-warning" role="alert">
                <div class="d-flex justify-content-between">
                    <span class="align-self-center"> Si la fecha de retiro es anterior al día de hoy, el retiro se realizará inmediatamente, de lo contrario se realizará tan pronto se cumpla la fecha.</span>
                </div>
            </div>
        <div class="modal-body">

        @foreach($personas as $pers)
          {!!Form::open(['method'=>'DELETE','route'=>['personas.destroy',$pers->PersonasID]])!!}
          {!!Form::label('PersonasFechaRetiro','Ingrese la fecha de retiro')!!}
          {!!Form::date('PersonasFechaRetiro',now(),['class'=>'form-control'])!!}
        @endforeach


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
        </div>
        {!!Form::close()!!}
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
                                {!!Form::text('nuevaHabilidad[${agregar}][PersHabilCertificacion]','NO',['class'=>'form-control pt-3','placeholder'=>'Certificación'])!!}
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




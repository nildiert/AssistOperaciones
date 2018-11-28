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
                    <div class="d-flex justify-content-between">
                    <h5 class="modal-title" id="editModalLabel">Agregar habilidad</h5>
                    <div>
                        <a href="#" class="btn btn-info" id="agregarHabilidad">+</a>
                    </div>
                    </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body ">
                    {!!Form::open(['action'=>'persHabilController@store'])!!}
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




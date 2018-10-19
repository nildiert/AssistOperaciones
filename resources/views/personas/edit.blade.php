@extends('layouts.layout')
@section('content')
                    <a class="btn btn-info  mb-3 text-white"  data-toggle="modal" data-target="#updateModal" >Actualizar</a>
                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="updateModalLabel">Agregar recurso</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                                {!!Form::open(['method'=>'PUT','route'=>['personas.update',$personas->PersonasID]])!!}

                                {!!Form::label('PersonasPriApellido')!!}
                                {!!Form::text('PersonasPriApellido',$personas->PersonasPriApellido)!!}<br>
                                {!!Form::label('PersonasSegApellido')!!}
                                {!!Form::text('PersonasSegApellido',$personas->PersonasSegApellido)!!}<br>
                                {!!Form::label('PersonasPrimNombre')!!}
                                {!!Form::text('PersonasPrimNombre',$personas->PersonasPrimNombre)!!}<br>
                                {!!Form::label('PersonasSegNombre')!!}
                                {!!Form::text('PersonasSegNombre',$personas->PersonasSegNombre)!!}<br>
                                {!!Form::label('PersonasDocumento')!!}
                                {!!Form::number('PersonasDocumento',$personas->PersonasDocumento)!!}<br>
                                {!!Form::label('PersonasTipoDoc')!!}
                                {!!Form::select('PersonasTipoDoc',array('CC'=>'Cedula de Ciudadania','TI'=>'Tarjeta de identidad','PA'=>'Pasaporte','CE'=>'Cedula de extranjeria'),$personas->PersonasDocumento)!!}<br>
                                {!!Form::label('PersonasTel')!!}
                                {!!Form::number('PersonasTel',$personas->PersonasTel)!!}<br>
                                {!!Form::label('PersonasEspecialidad')!!}
                                {!!Form::text('PersonasEspecialidad',$personas->PersonasEspecialidad)!!}<br>
                                {!!Form::label('PersonasTitulo')!!}
                                {!!Form::text('PersonasTitulo',$personas->PersonasTitulo)!!}<br>
                                {!!Form::label('PersonasFechaIngreso')!!}
                                {!!Form::date('PersonasFechaIngreso',$personas->PersonasFechaIngreso)!!}<br>

                            @include('sweet::alert')
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                              {!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
                              {!!Form::close()!!}
                            </div>
                          </div>
                        </div>
                      </div>


@endsection



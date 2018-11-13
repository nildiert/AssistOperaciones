

@extends('layouts.app')
@section('create')


<!-- Button trigger modal -->


      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Agregar recurso</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        {!!Form::open(['action'=>'personasController@store'])!!}
                        {!!Form::label('PersonasPriApellido')!!}
                            {!!Form::text('PersonasPriApellido',null,['placeholder'=>'PersonasPriApellido', 'class'=>'toUpper'])!!} <br>
                        {!!Form::label('PersonasSegApellido')!!}
                            {!!Form::text('PersonasSegApellido',null,['placeholder'=>'PersonasSegApellido', 'class'=>'toUpper'])!!} <br>
                        {!!Form::label('PersonasPrimNombre')!!}
                            {!!Form::text('PersonasPrimNombre',null,['placeholder'=>'PersonasPrimNombre', 'class'=>'toUpper'])!!} <br>
                        {!!Form::label('PersonasSegNombre')!!}
                            {!!Form::text('PersonasSegNombre',null,['placeholder'=>'PersonasSegNombre', 'class'=>'toUpper'])!!} <br>
                        {!!Form::label('PersonasDocumento')!!}
                            {!!Form::number('PersonasDocumento',null,['placeholder'=>'PersonasDocumento'])!!} <br>
                        {!!Form::label('PersonasTipoDoc')!!}
                            {!!Form::select('PersonasTipoDoc',array('CC'=>'Cedula de Ciudadania','TI'=>'Tarjeta de identidad','PA'=>'Pasaporte','CE'=>'Cedula de extranjeria'))!!}<br>
                        {!!Form::label('PersonasTel')!!}
                            {!!Form::number('PersonasTel',null,['placeholder'=>'PersonasTel'])!!} <br>
                        {!!Form::label('PersonasEspecialidad')!!}
                            {!!Form::text('PersonasEspecialidad',null,['placeholder'=>'PersonasEspecialidad', 'class'=>'toUpper'])!!} <br>
                        {!!Form::label('PersonasTitulo')!!}
                            {!!Form::text('PersonasTitulo',null,['placeholder'=>'PersonasTitulo', 'class'=>'toUpper'])!!} <br>
                        {!!Form::label('PersonasFechaIngreso')!!}
                            {!!Form::date('PersonasFechaIngreso')!!}<br>
                            {!!Form::text('PersonasNombreCompleto',null,['hidden'=>'hidden'])!!}


                @include('sweet::alert')
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  {!!Form::submit('Enviar')!!}
                  {!!Form::close()!!}
                </div>
              </div>
            </div>
          </div>


@endsection





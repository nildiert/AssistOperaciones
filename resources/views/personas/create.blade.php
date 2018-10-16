@extends('layouts.layout')
@section('content')
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
            {!!Form::text('PersonasTipoDoc',null,['placeholder'=>'PersonasTipoDoc', 'class'=>'toUpper'])!!} <br>
        {!!Form::label('PersonasTel')!!}
            {!!Form::number('PersonasTel',null,['placeholder'=>'PersonasTel'])!!} <br>
        {!!Form::label('PersonasEspecialidad')!!}
            {!!Form::text('PersonasEspecialidad',null,['placeholder'=>'PersonasEspecialidad', 'class'=>'toUpper'])!!} <br>
        {!!Form::label('PersonasTitulo')!!}
            {!!Form::text('PersonasTitulo',null,['placeholder'=>'PersonasTitulo', 'class'=>'toUpper'])!!} <br>
        {!!Form::label('PersonasFechaIngreso')!!}
            {!!Form::date('PersonasFechaIngreso')!!}<br>
            {!!Form::text('PersonasNombreCompleto',null,['hidden'=>'hidden'])!!}
        {!!Form::submit('Enviar')!!}
    {!!Form::close()!!}
@endsection



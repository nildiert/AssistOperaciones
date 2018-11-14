@extends('layouts.app')
@section('content')
    {!!Form::open(['action'=>'gerenteController@store'])!!}
        {!!Form::label('GerenteNombre')!!}
        {!!Form::text('GerenteNombre',null,['placeholder'=>'GerenteNombre'])!!}
        {!!Form::label('GerenteFechaInicio')!!}
        {!!Form::date('GerenteFechaInicio',null,['placeholder'=>'GerenteFechaInicio'])!!}
        {!!Form::label('GerenteFechaFin')!!}
        {!!Form::date('GerenteFechaFin',null,['placeholder'=>'GerenteFechaFin'])!!}

        {!!Form::submit('Enviar')!!}
    {!!Form::close()!!}

@endsection


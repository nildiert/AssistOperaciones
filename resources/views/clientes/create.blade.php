@extends('layouts.layout')
@section('content')
    {!!Form::open(['action'=>'clienteController@store'])!!}
        {!!Form::label('cliNombre')!!}
            {!!Form::text('cliNombre',null,['placeholder'=>'cliNombre'])!!}
        {!!Form::label('cliCod')!!}
            {!!Form::text('cliCod',null,['placeholder'=>'cliCod'])!!}

    {!!Form::submit('Enviar')!!}
    {!!Form::close()!!}
@endsection

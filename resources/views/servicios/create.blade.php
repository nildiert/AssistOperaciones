@extends('layouts.layout')
@section('content')
    {!!Form::open(['action'=>'serviciosController@store'])!!}
        {!!Form::label('ServNombre')!!}
            {!!Form::text('ServNombre',null,['placeholder'=>'ServNombre'])!!}
    {!!Form::submit('Enviar')!!}
    {!!Form::close()!!}
@endsection


@extends('layouts.layout')
@section('content')
    {!!Form::open(['action'=>'recursosFisicosController@store'])!!}
        {!!Form::label('RecFisCod')!!}
        {!!Form::text('RecFisCod',null,['placeholder'=>'RecFisCod'])!!}
        {!!Form::label('RecFisTipo')!!}
        {!!Form::text('RecFisTipo',null,['placeholder'=>'RecFisTipo'])!!}

        {!!Form::submit('Enviar')!!}
    {!!Form::close()!!}
@endsection

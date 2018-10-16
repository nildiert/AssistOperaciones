@extends('layouts.layout')
@section('content')
    {!!Form::open(['action'=>'novedadesController@store'])!!}
        {!!Form::label('NovTipo')!!}
            {!!Form::text('NovTipo')!!}
        {!!Form::submit('Enviar')!!}
    {!!Form::close()!!}
@endsection

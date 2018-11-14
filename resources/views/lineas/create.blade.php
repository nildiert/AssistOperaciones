@extends('layouts.app')
@section('content')
    {!!Form::open(['action'=>'lineaController@store'])!!}
        {!!Form::label('linNegNombre')!!}
        {!!Form::text('linNegNombre',null,['placeholder'=>'linNegNombre'])!!}

    {!!Form::submit('Enviar')!!}
    {!!Form::close()!!}
@endsection

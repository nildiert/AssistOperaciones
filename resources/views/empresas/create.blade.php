@extends('layouts.app')
@section('content')
    {!!Form::open(['action'=>'empresasController@store'])!!}
        {!!Form::label('EmpNombre')!!}
            {!!Form::text('EmpNombre',null,['placeholder'=>'EmpNombre'])!!}

        {!!Form::submit('Enviar')!!}
    {!!Form::close()!!}
@endsection

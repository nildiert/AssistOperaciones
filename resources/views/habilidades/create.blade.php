@extends('layouts.app')
@section('content')
    {!!Form::open(['action'=>'habilidadesController@store'])!!}
        {!!Form::label('HabilidadesNombre')!!}
            {!!Form::text('HabilidadesNombre',null,['placeholder'=>'HabilidadesNombre'])!!}
        {!!Form::label('HabilidadesTipo')!!}
            {!!Form::text('HabilidadesTipo',null,['placeholder'=>'HabilidadesTipo'])!!}

        {!!Form::submit('Enviar')!!}
    {!!Form::close()!!}
@endsection

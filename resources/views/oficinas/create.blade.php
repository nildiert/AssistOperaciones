@extends('layouts.layout')
@section('content')
    {!!Form::open(['action'=>'oficinaController@store'])!!}

        {!!Form::label('OficNumero')!!}
        {!!Form::text('OficNumero',null,['placeholder'=>'OficNumero'])!!}


        {!!Form::submit('Enviar')!!}
    {!!Form::close()!!}
@endsection

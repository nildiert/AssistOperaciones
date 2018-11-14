@extends('layouts.app')
@section('content')
    {!!Form::open(['action'=>'oficinaController@store'])!!}

        {!!Form::label('OficNumero')!!}
        {!!Form::text('OficNumero',null,['placeholder'=>'OficNumero'])!!}


        {!!Form::submit('Enviar')!!}
    {!!Form::close()!!}
    @include('sweet::alert')
@endsection

@extends('layouts.app')
@section('content')
    {!!Form::open(['action'=>'contratosController@store'])!!}
        {!!Form::label('ContTipo')!!}
            {!!Form::text('ContTipo')!!}
        {!!Form::label('ContDescripcion')!!}
            {!!Form::text('ContDescripcion')!!}

    {!!Form::submit('Enviar')!!}
    {!!Form::close()!!}
@endsection

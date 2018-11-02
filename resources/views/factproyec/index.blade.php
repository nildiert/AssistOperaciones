@extends('layouts.app')
@section('content')
    <ul>
        @foreach($factpProyecs as $factpProyec)
            <ol>
                <ul>{{$factpProyec->FactProyecTipo}}</ul>
                <ul>{{$factpProyec->FactProyecCodigo}}</ul>
            </ol>
        @endforeach
    </ul>

@endsection

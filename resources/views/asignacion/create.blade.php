@extends('layouts.app')
@section('content')
    {{dd(Auth::user()->hasRole('user')) }}
@include('sweet::alert') 
@endsection


@if(Auth::user()->hasRole('admin'))
    {{-- Contenido que se muestra --}}
@else
    {{-- Contenido que no se muestra --}}
@endif

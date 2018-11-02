@extends('layouts.app')
@section('content')
<div class="container">
   @foreach($proyectos as $proyecto)
        <ul>
            <li>{{$proyecto->ProyectoNombre}}</li>
        </ul>
    @endforeach
</div>
@endsection

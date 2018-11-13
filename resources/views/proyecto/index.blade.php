@extends('layouts.app')
@section('content')
<div class="container">
    <div>
    <a href="{{Route('proyecto.create')}}" class=" text-white btn btn-info">Nuevo proyecto</a>
    </div>
   @foreach($proyectos as $proyecto)
        <ul>
        <li><a href="{{Route('proyecto.show',$proyecto->ProyID)}}"> {{$proyecto->ProyectoNombre}}</a></li>
        </ul>
    @endforeach
</div>
@endsection

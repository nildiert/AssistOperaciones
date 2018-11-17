@extends('layouts.app')
@section('content')
<div class="container">
    <div>
    <a href="{{Route('proyecto.create')}}" class=" text-white btn btn-info mb-2">Nuevo proyecto</a>
    </div>
<div class="card">
    <table class="table table-hover">
        <thead>
                <th>Nombre</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Presupuesto</th>

        </thead>
        <tbody>
            @foreach($proyectos as $proyecto)
                <tr>
                <td><a href="{{Route('proyecto.show',$proyecto->cliente_cliID)}}"> {{$proyecto->ProyectoNombre}}</a></td>
                <td>{{$proyecto->ProyFechaIni}}</td>
                <td>{{$proyecto->ProyectoFechaFin}}</td>
                <td class="presupuesto">{{$proyecto->ProyectoPresupuesto}}</td>

                </tr>


            @endforeach

        </tbody>
    </table>


</div>



</div>

<script>
    $(document).ready(function(){
        $(".presupuesto").number(true);
    });

</script>

@endsection

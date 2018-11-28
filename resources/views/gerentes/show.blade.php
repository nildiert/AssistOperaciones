@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="table-container">
            <div class="card">
            <table class="table table-hover">

                    <thead>
                        <th>Nombre proyecto</th>
                    </thead>
                    <tbody>
                        @foreach($gerentes as $gerente)
                        <tr>
                            <td>{{$gerente->ProyectoNombre}}</td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

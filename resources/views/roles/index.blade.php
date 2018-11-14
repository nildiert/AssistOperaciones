@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="">
            <div class="table">
                <table class="table table-hover">
                    <thead>
                            <th>Name</th>
                            <th>Descripción</th>
                    </thead>
                    <tbody>
                        @foreach($roles as $rol)
                            <tr>
                            <td>{{$rol->rolName}}</td>
                            <td>{{$rol->rolDescription}}</td>
                            </tr>
                        @endforeach
                    </tbody>

                    
                </table>
            </div>
        </div>
    </div>
@endsection
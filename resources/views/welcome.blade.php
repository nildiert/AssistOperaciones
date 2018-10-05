<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        {!!Html::style('css/bootstrap.min.css')!!}
        {!!Html::script('js/jquery.min.js')!!}
        {!!Html::script('js/bootstrap.min.js')!!}
        {!!Html::script('js/popper.min.js')!!}
        {!!Html::script('js/bootstrap.min.js')!!}


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Assist Operaciones
                </div>
                <div class="row"><!--Inicio de la clase Row-->

                        <div class="dropdown"><!--Inicio Div personas-->
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Personas
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('personas.index')}}">Mostrar</a>
                                <a class="dropdown-item" href="{{route('personas.create')}}">Agregar</a>
                            </div>
                        </div><!--Fin del div personas-->
                        <div class="dropdown"><!--Inicio Div cargos-->
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Cargos
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('cargos.index')}}">Mostrar</a>
                            <a class="dropdown-item" href="{{route('cargos.create')}}">Agregar</a>
                            </div>
                        </div><!--Fin div Cargos-->
                        <div class="dropdown"><!--Inicio Div habilidades-->
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Habilidades
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('habilidades.index')}}">Mostrar</a>
                                <a class="dropdown-item" href="{{route('habilidades.create')}}">Agregar</a>
                            </div>
                        </div><!--Fin del div habilidades-->
                        <div class="dropdown"><!--Inicio Div novedades-->
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Novedades
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('novedades.index')}}">Mostrar</a>
                                <a class="dropdown-item" href="{{route('novedades.create')}}">Agregar</a>
                            </div>
                        </div><!--Fin  Div novedades-->
                        <div class="dropdown"><!--Inicio  Div contratos-->
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Contratos
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('contratos.index')}}">Mostrar</a>
                                <a class="dropdown-item" href="{{route('contratos.create')}}">Agregar</a>
                            </div>
                        </div><!--Fin  Div contratos-->
                        <div class="dropdown"><!--Inicio  Div Empresa-->
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Empresa
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('empresas.index')}}">Mostrar</a>
                                <a class="dropdown-item" href="{{route('empresas.create')}}">Agregar</a>
                            </div>
                        </div><!--Fin  Div empresa-->
                        <div class="dropdown"><!--Inicio  Div Servicios-->
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Servicios
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('servicios.index')}}">Mostrar</a>
                                <a class="dropdown-item" href="{{route('servicios.create')}}">Agregar</a>
                            </div>
                        </div><!--Fin  Div Servicios-->
                        <div class="dropdown"><!--Inicio  Div Lineas de negocio-->
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Linea de Negocio
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('linea.index')}}">Mostrar</a>
                                <a class="dropdown-item" href="{{route('linea.create')}}">Agregar</a>
                            </div>
                        </div><!--Fin  Div lineas de negocio-->
                        <div class="dropdown"><!--Inicio  Div Clientes-->
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Cliente
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('cliente.index')}}">Mostrar</a>
                            <a class="dropdown-item" href="{{route('cliente.create')}}">Agregar</a>
                            </div>
                        </div><!--Fin  Div Clientes-->
                        <div class="dropdown"><!--Inicio  Div Gerente-->
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gerente
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('gerente.index')}}">Mostrar</a>
                                <a class="dropdown-item" href="{{route('gerente.create')}}">Agregar</a>
                            </div>
                        </div><!--Fin  Div novedades-->
                        <div class="dropdown"><!--Inicio  Div Recursos Fisicos-->
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Recursos fisicos
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('recursosfisicos.index')}}">Mostrar</a>
                                <a class="dropdown-item" href="{{route('recursosfisicos.create')}}">Agregar</a>
                            </div>
                        </div><!--Fin  Div Recursos Fisicos-->
                        <div class="dropdown"><!--Inicio  Div Oficina-->
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Oficina
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('oficina.index')}}">Mostrar</a>
                                <a class="dropdown-item" href="{{route('oficina.create')}}">Agregar</a>
                            </div>
                        </div><!--Fin  Div Recursos Fisicos-->

                </div><!--Fin de clase Row-->
            </div><!--Fin de la clase content-->
        </div><!--Fin de la clase flex-center-->
        <script>
            $('.dropdown-toggle').dropdown()
        </script>
    </body>
</html>

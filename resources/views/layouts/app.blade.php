<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Assist Operaciones</title>



    <!-- Bootstrap CSS CDN -->
    {!!Html::style('css/bootstrap.min.css')!!}
    <!-- Our Custom CSS -->
    {!!Html::style('css/style.css')!!}
    {!!Html::style('css/jquery-ui.min.css')!!}
    {!!Html::style('css/jquery-ui.structure.min.css')!!}
    {!!Html::style('css/jquery-ui.theme.min.css')!!}
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    {!!Html::script('js/jquery.min.js')!!}
    
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body onload="myFunction()" style="margin:0;" >
                    <div id="loader">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="lading"></div>
                    </div>
                </div>
            </div>
        
        
        <div style="display:none;" id="myDiv" class="animate-bottom">

        

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
            <a href="{{Route('home')}}">   <h3>{{ config('app.name', 'Laravel') }}</h3></a>
            </div>
            
            <ul class="list-unstyled components">
                <p>Operaciones</p>{{--Cambiar dependiendo del rol--}}
                
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Consultores</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{Route('personas.index')}}">Ver</a>
                        </li>
                        <li>
                        <a href="{{Route('personas.create')}}">Agregar</a>
                        </li>

                    </ul>
                </li>
                

                <li class="active">
                        <a href="#habilidadesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Habilidades</a>
                        <ul class="collapse list-unstyled" id="habilidadesSubmenu">
                            <li>
                                <a href="{{Route('pershabil.index')}}">Ver</a>
                            </li>
                            <li>
                            <a href="{{Route('habilidades.create')}}">Agregar</a>
                            </li>
    
                        </ul>
                    </li>
                
                    <li>

                    <a href="#proyectosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Proyectos</a>
                    <ul class="collapse list-unstyled" id="proyectosSubmenu">
                        <li>
                        <a href="{{Route('proyecto.index')}}">Ver</a>
                        </li>
                        @if(Auth::user()->hasRole('admin'))
                        <li>
                            <a href="{{Route('proyecto.create')}}">Agregar</a>
                        </li>
                        @endif

                    </ul>
                    <a href="#asignacionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Asignación</a>
                    <ul class="collapse list-unstyled" id="asignacionSubmenu">
                        <li>
                        <a href="{{Route('asignacion.index')}}">Ver</a>
                        </li>
                        <li>
                            <a href="{{Route('asignacion.create')}}">Agregar</a>
                        </li>

                    </ul>

                @if(Auth::user()->hasRole('admin'))

                    <a href="#rolesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Roles</a>
                    <ul class="collapse list-unstyled" id="rolesSubmenu">
                        <li>
                        <a href="{{Route('roles.index')}}">Ver</a>
                        </li>
                        <li>
                            <a href="{{Route('asignacion.create')}}">Agregar</a>
                        </li>
                    </ul>
                    <a href="#usuariosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Usuarios</a>
                    <ul class="collapse list-unstyled" id="usuariosSubmenu">
                        <li>
                        <a href="{{Route('usuarios.index')}}">Ver</a>
                        </li>
                        <li>
                            <a href="{{Route('asignacion.create')}}">Agregar</a>
                        </li>
                    </ul>
                @endif

                    <a href="#clientesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Clientes</a>
                    <ul class="collapse list-unstyled" id="clientesSubmenu">
                        <li>
                        <a href="{{Route('cliente.index')}}">Ver</a>
                        </li>
                        <li>
                            <a href="{{Route('asignacion.create')}}">Agregar</a>
                        </li>

                    </ul>


                    <a href="#jquerySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Curso jQuery</a>
                    <ul class="collapse list-unstyled" id="jquerySubmenu">
                        <li>
                        <a href="{{Route('jquery.index')}}">Ver</a>
                        </li>
                        <li>
                            <a href="{{Route('asignacion.create')}}">Agregar</a>
                        </li>

                    </ul>
                </li>

            </ul>
            
            
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>

{{--AUTENTICACION--}}
<ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </li>
        @else
            <li class="nav-item ">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Cerrar sesión') }}
                     </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>

{{--FIN AUTENTICACIÓN--}}                        

                </div>
            </nav>

            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    {!!Html::script('js/jquery.min.js')!!}  
    {!!Html::script('js\jquery.number.min.js')!!}
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    {{-- {!!Html::script('js/jquery.number.min.js')!!} --}}

    {!!Html::script('js/jquery-ui.min.js')!!}
    
    {!!Html::script('js/jquery-ui.min.js')!!}
    {!!Html::script('js/jquery-ui.min.js')!!}
    {!!Html::script('js/jquery-ui.min.js')!!}

    <script>
            var myVar;

            
            
            function myFunction() {
                myVar = setTimeout(showPage, 100);
            }
            
            function showPage() {
              document.getElementById("loader").style.display = "none";
              document.getElementById("myDiv").style.display = "block";
            }
            </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>


</body>

</html>



            


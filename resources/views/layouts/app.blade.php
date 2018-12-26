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
    {!!Html::script('js/Chart.min.js')!!}
    
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
                    </ul>
                </li>
                

                <li class="active">
                        <a href="#habilidadesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Habilidades</a>
                        <ul class="collapse list-unstyled" id="habilidadesSubmenu">
                            <li>
                                <a href="{{Route('habilidades.index')}}">Ver</a>
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
                        @endif
                    </ul>
                    <a href="#clientesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Clientes</a>
                    <ul class="collapse list-unstyled" id="clientesSubmenu">
                        <li>
                            <a href="{{Route('cliente.index')}}">Ver</a>
                        </li>

                    </ul>
                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('gerOpe') || Auth::user()->hasRole('asistOpe'))
                    <a href="#usuariosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Usuarios</a>
                    <ul class="collapse list-unstyled" id="usuariosSubmenu">
                        <li>
                        <a href="{{Route('usuarios.index')}}">Ver</a>
                        </li>
                    </ul>
                @endif
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
        @if(Auth::user()->hasRole('admin'))
            
                <div class="btn-group">
                    {{-- <a data-toggle="modal" class="btn btn-dark" data-target=".retirosPendientes" href="">Retiros pendientes <span class="badge badge-pill badge-secondary">{{$retiros->count()}}</span></a> --}}
                    
                    <div class="dropdown-menu">
                        {{-- @foreach($retiros as $retiro)
                        <a class="dropdown-item " href="#"><h6 class="h6"> {{$retiro->PersonasNombreCompleto}}</h6></a>
                        @endforeach --}}
                    </div>
                </div> 

        @endif
          
          {{-- Botón de cierre de sesión --}}
          <div class="btn-group">
            <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Cerrar sesión') }}
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
          </div>
            
        @endguest
    </ul>

{{--FIN AUTENTICACIÓN--}}                        

                </div>
            </nav>



<div class="modal fade retirosPendientes" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Retiros de la semana</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-hover">
                  {{-- @if($cuentaRetirosSemana) 
                  <thead>
                    <th>Consultor</th>
                    <th>Ingreso</th>
                    <th>Retiro</th>
                  </thead>
                  <tbody>
                    @foreach($retiradoSemana as $rs)
                        <tr>
                            <td>{{$rs->PersonasNombreCompleto}}</td>
                            <td>{{$rs->PersonasFechaIngreso}}</td>
                            <td>{{$rs->PersonasFechaRetiro}}</td>
                        </tr>
                    @endforeach
                    @else
                        <p>No se han registrado retiros esta semana</p>
                    @endif --}}
                  </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>

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



            


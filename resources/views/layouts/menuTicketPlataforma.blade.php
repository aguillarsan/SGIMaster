<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
                <title>
                    TSP|Tickets soporte plataformas
                </title>
                <!-- General CSS Files -->
                <!-- Desarrollado por Sebastián Aguilar Sanhueza -->
                <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
                    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet">
                        <!-- CSS Libraries -->
                        <!-- Template CSS <link rel="stylesheet" href="./css/dropzone.css"    <script src="./js/dropzone.js"></script> -->
                        <link href="../inspinia/css/animate.css" rel="stylesheet">
                            <link href="../layout/css/style.css" rel="stylesheet">
                                <link href="../layout/css/components.css" rel="stylesheet">
                                    
                                    <link href="../css/new.css" rel="stylesheet">
                                        <link href="../css/upload.css" rel="stylesheet">
                                            <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet"/>
                                            <link href="../css/sweetalert2.min.css" rel="stylesheet">
                                                <link href="../logosEntel/puntos-logo.png" rel="shortcut icon">
                                                    <meta charset="utf-8" content="{{ csrf_token()}}" name="csrf-token">
                                                    </meta>
                                                </link>
                                            </link>
                                        </link>
                                    </link>
                                </link>
                            </link>
                        </link>
                    </link>
                </link>
            </meta>
        </meta>
        @laravelPWA
    </head>
    @php
use App\User; 
use App\Configuracion_user;
$users= User::find(Auth::user()->id);
$mode = Configuracion_user::where('user_id', Auth::user()->id)->get();
foreach ($mode as $m) {
            $modeid = $m->configuracion_id;
        }
@endphp




    @if($modeid==2)
    <body class="sidebar-mini" style="background-color: #18191a">
        @else
        <body class="sidebar-mini">
            @endif
            <div class="main-wrapper">
                @if($modeid==2)
                <div class="navbar-bg" style="background:#18191a;border: 3px solid #2b2c2d; ">
                </div>
                @else
                <div class="navbar-bg" style="background: -webkit-linear-gradient(left,#00c6ff ,#0072ff)">
                </div>
                @endif
                <nav class="navbar navbar-expand-lg main-navbar">
                    <form class="form-inline mr-auto">
                        <ul class="navbar-nav mr-3">
                            <li>
                                <a class="nav-link nav-link-lg" data-toggle="sidebar" href="#">
                                    @if($modeid==2)
                                    <i class="fas fa-bars">
                                    </i>
                                    @else
                                    <i class="fas fa-bars">
                                    </i>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </form>
                    <ul class="navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" data-toggle="dropdown" href="#">
                                <img alt="image" class="rounded-circle mr-1" src="{{$users->avatar}}">
                                    <div class="d-sm-none d-lg-inline-block">
                                        {{$users->name}} {{$users->apellido}}
                                    </div>
                                </img>
                            </a>
                            @if($modeid==2)
                            <div class="dropdown-menu dropdown-menu-right" style="background-color: #9fa1a6">
                             
                                <a class="dropdown-item has-icon blanco " href="/perfilusuario">
                                    <i class="fas fa-user">
                                    </i>
                                    Perfil
                                </a>
                        
                                <a class="dropdown-item has-icon blanco" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit(); ">
                                    <i class="fas fa-sign-out-alt">
                                    </i>
                                    Cerrar sesión
                                </a>
                                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                            @else
                            <div class="dropdown-menu dropdown-menu-right">
                            
                                <a class="dropdown-item has-icon " href="/perfilusuario">
                                    <i class="fas fa-user">
                                    </i>
                                    Perfil
                                </a>
                             
                                <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit(); ">
                                    <i class="fas fa-sign-out-alt">
                                    </i>
                                    Cerrar sesión
                                </a>
                                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                            @endif
                        </li>
                    </ul>
                </nav>
                <div class="main-sidebar">
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand">
                            <img src="../logosEntel/puntos-logo.png" width="80">
                            </img>
                        </div>
                        <div class="sidebar-brand sidebar-brand-sm">
                            <img src="../logosEntel/puntos-logo.png" width="50">
                            </img>
                        </div>
                        <ul class="sidebar-menu">
                            <li class="menu-header">
                                Menú
                            </li>
                            <li>
                                <a class="nav-link" href="/modulos">
                                    <i class="fas fa-home">
                                    </i>
                                    <span>
                                        Inicio
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
        </body>
    </body>
</html>
<!-- Main Content -->
@yield('content')
            @if($modeid==2)
<footer class="main-footer" style="background-color: #18191a;border:   #2b2c2d;">
    <div class="footer-left" style="color: white;">
        Copyright © 2020
        <div class="bullet">
        </div>
        Design By
        <a href="http://www.anidalatam.com/" style="color: #2d88ff" target="blank__">
            Anida Consultores
        </a>
    </div>
    <div class="footer-right" style="color: #2d88ff">
        v.2.5
    </div>
</footer>
@else
<footer class="main-footer">
    <div class="footer-left">
        Copyright © 2020
        <div class="bullet">
        </div>
        Design By
        <a href="http://www.anidalatam.com/" target="blank__">
            Anida Consultores
        </a>
    </div>
    <div class="footer-right">
        v.2.5
    </div>
</footer>
@endif
<!-- Mainly scripts -->
<script crossorigin="anonymous" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" src="https://code.jquery.com/jquery-3.3.1.min.js">
</script>
<script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
</script>
<script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js">
</script>
<script src="../layout/js/stisla.js">
</script>
<!-- JS Libraies -->
<!-- Template JS File -->
<script src="../layout/js/scripts.js">
</script>
<script src="../layout/js/custom.js">
</script>
<!-- Page Specific JS File -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js">
</script>
<script src="../css/sweetalert2.min.js">
</script>
<script src="{{ asset('js/app.js') }} ">
   
</script>

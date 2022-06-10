<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
                <title>
                    SGI|Control de cambios
                </title>
                <!-- General CSS Files -->
                <!-- Desarrollado por Sebastián Aguilar Sanhueza -->
                <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
                                          <link rel="shortcut icon" href="../logosEntel/l-2020.png"> 
                                                    <meta charset="utf-8" content="{{ csrf_token()}}" name="csrf-token">  
                                                
                                    
                                                    @laravelPWA
    </head>
    @php
use App\User; 
use App\Configuracion_user;
$users= User::find(Auth::user()->id);

@endphp
    <body class="sidebar-mini">
        <div id="app">
            <div class="main-wrapper">
                <div class="navbar-bg" style="background: -webkit-linear-gradient(left,#6fc3f7 ,#1813a2)">
                </div>
                <nav class="navbar navbar-expand-lg main-navbar">
                    <form class="form-inline mr-auto">
                        <ul class="navbar-nav mr-3">
                            <li>
                                <a class="nav-link nav-link-lg" data-toggle="sidebar" href="#">
                                    <i class="fas fa-bars">
                                    </i>
                                </a>
                            </li>
                        </ul>
                    </form>
                    <ul class="navbar-nav navbar-right">
                        <notification>
                        </notification>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" data-toggle="dropdown" href="#">
                                <img alt="image" class="rounded-circle mr-1" src="{{$users->avatar}}">
                                    <div class="d-sm-none d-lg-inline-block">
                                        {{$users->name}} {{$users->apellido}}
                                    </div>
                                </img>
                            </a>
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
                        </li>
                    </ul>
                </nav>
                <div class="main-sidebar">
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand">
                            <img src="../logosEntel/l-2020.png" width="80">
                            </img>
                        </div>
                        <div class="sidebar-brand sidebar-brand-sm">
                            <img src="../logosEntel/l-2020.png" width="50">
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
            <!-- Main Content -->
            @yield('content')
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
                    v.3.0
                </div>
            </footer>
        </div>
    </body>
</html>
<!-- Mainly scripts -->
<script src="../jquery/jquery-3.3.1.min.js">
</script>
<script src="../jquery/popper.min.js">
</script>
<script src="../bootstrap/js/bootstrap.min.js">
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

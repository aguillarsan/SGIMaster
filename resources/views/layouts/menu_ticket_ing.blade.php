<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
                <title>
                    SGI|Gestión de tickets Infraestructura
                </title>
                <link href="../logosEntel/l-2020.png" rel="shortcut icon"/>
                <!-- General CSS Files -->
                <!-- Desarrollado por Sebastián Aguilar Sanhueza -->
                <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
                <link href="../layout/css/style.css" rel="stylesheet"/>
                <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet"/>
                <!-- CSS Libraries -->
                <!-- Template CSS <link rel="stylesheet" href="./css/dropzone.css"    <script src="./js/dropzone.js"></script> -->
                <link href="../inspinia/css/animate.css" rel="stylesheet"/>
                <link href="../css/new.css" rel="stylesheet"/>
                <link href="../css/upload.css" rel="stylesheet"/>
                <link href="../layout/css/components.css" rel="stylesheet"/>
                <link href="../css/sweetalert2.min.css" rel="stylesheet"/>
                <meta charset="utf-8" content="{{ csrf_token()}}" name="csrf-token">
                </meta>
                <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600;700&display=swap" rel="stylesheet"/>
            </meta>
        </meta>
        @laravelPWA
    </head>
    @php

 
use App\role_user;
use App\Permiso_rol;
use Carbon\Carbon;
use App\Modulo; 


$rol = role_user::where('user_id', Auth::user()->id)->get(['role_id']);
        foreach ($rol as $r) {
            $RolId = $r->role_id;
        }
    
$id_all = Permiso_rol::where('role_id', $RolId)->get(['permission_id']);
$version =   Modulo::find(10)->first('version')    
@endphp
    <body class="sidebar-mini">
        <div id="app">
            <div class="main-wrapper">
                <div class="navbar-bg" style="background: -webkit-linear-gradient(left, #34EBCC,#02CBA9 );">
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
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" data-toggle="dropdown" href="#">
                                <img alt="image" class="rounded-circle mr-1" src="{{ Auth::user()->avatar }}">
                                    <div class="d-sm-none d-lg-inline-block">
                                        {{ Auth::user()->name }}  {{ Auth::user()->apellido }}
                                    </div>
                                </img>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item has-icon " href="/perfilusuario">
                                    <i class="fas fa-user">
                                    </i>
                                    Perfil
                                </a>
                                <a class="dropdown-item has-icon " target="blank__" href="/video_ticket_ingenieria/crearTicket.mp4">
                                   <i class="fas fa-question-circle"></i>
                                    Ayuda
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
                   <menu-ing-ticket></menu-ing-ticket>
                </div>
                <!-- Main Content -->
                @yield('content')
                <footer class="main-footer">
                    <div class="footer-left">
                        Copyright © {{ Carbon::now()->format('Y')}}
                        <div class="bullet">
                        </div>
                        Design By
                        <a href="http://www.anidalatam.com/" target="blank__">
                            Anida Consultores
                        </a>
                    </div>
                    <div class="footer-right">
                        v.{{$version->version}}
                    </div>
                </footer>
            </div>
        </div>
        <div class="modal fade" id="ModalManual" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Manuales de usuario
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <a href="../ManualesTicket/funcionTicket.pdf" style="font-size: 15px;" target="_blank">
                                Cómo funciona la ticketera
                            </a>
                        </p>
                        <p>
                            <a href="../ManualesTicket/CrearTicket.pdf" style="font-size: 15px;" target="_blank">
                                Cómo crear un Ticket
                            </a>
                        </p>
                        <p>
                            <a href="../ManualesTicket/PreEwork.pdf" style="font-size: 15px;" target="_blank">
                                Pre-Ework desde la ticketera
                            </a>
                        </p>
                    </div>
                </div>
            </div>
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
<script src="../jquery/jquery.nicescroll.min.js">
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
<script src="../css/sweetalert2.min.js">
</script>
<script src="{{ asset('js/app.js') }} ">
</script>

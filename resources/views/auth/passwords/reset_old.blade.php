<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>-Gti</title>

    <link href="/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/estilos.css" rel="stylesheet">
    <link href="/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/inspinia/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="/inspinia/css/animate.css" rel="stylesheet">
    <link href="/inspinia/css/style.css" rel="stylesheet">
    <link href="/inspinia/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="/inspinia/css/animate.css" rel="stylesheet">

    <link rel="shortcut icon" href="../logosEntel/favicon.ico">



</head>



<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>



<!-- Peity -->
<script src="js/plugins/peity/jquery.peity.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- Rickshaw -->



<body class="gray-bg-login" id="fondo" >

    <main class="py-4">
        <div class="loginColumns  animated fadeInDown">
            <div class="text-center">
                <div  style="font-size:20px; color:white;" class="">Bienvenido<br/>
                    <div style="color:white; font-size:32px;">Sistema de Gestión de tickets</div>
                </div>
            </div>
            <hr/>

        
            <div class="ibox-content-dark row" style="background-color: rgba(1,1,1,0.2); height: 300px;">

                <div class="col-md-6 text-muted animated bounceIn" >
                    <div class="middle-box text-center">
                        <img src="../logosEntel/puntos-logo.png" class="" style="max-height: 180px; margin-top:;">
                    </div>
                </div>
                <div class="col-md-6" style="margin-left: -600px;margin-top: 20px;">
                    <div class="" >

                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Reestablecer Contraseña</div>

                                        <div class="panel-body">
                                            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                                                {{ csrf_field() }}
                                                <meta name="csrf-token" content="{{ csrf_token() }}">


                                                <input type="hidden" name="token" value="{{ $token }}">

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col-md-4 control-label">Correo Electronico</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                                        @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="col-md-4 control-label">Nueva Contraseña</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control" name="password" required>

                                                        @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                    <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>
                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                                        @if ($errors->has('password_confirmation'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Reestablecer Contraseña
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="m-t">
                            {{-- <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> --}}
                        </p>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-6 text-white">
                    Copyright Entel ®. Powered by Anida Consultores ®.
                </div>
                <div class="col-md-6 text-right text-white">
                   <small>© 2019</small>
               </div>
           </div>

       </div>

   </main>

</body>
</html>


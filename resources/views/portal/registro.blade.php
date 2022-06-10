<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
                <title>
                    Register — Stisla
                </title>
                <!-- General CSS Files -->
                <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
                    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet">
                        <!-- CSS Libraries -->
                        <!-- Template CSS <link rel="stylesheet" href="./css/dropzone.css"    <script src="./js/dropzone.js"></script> -->
                        <link href="../inspinia/css/animate.css" rel="stylesheet">
                            <link href="../layout/css/style.css" rel="stylesheet">
                                <link href="../layout/css/components.css" rel="stylesheet">
                                    <!-- Start GA -->
                                    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3">
                                    </script>
                                    <script>
                                        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
                                    </script>
                                    <!-- /END GA -->
                                </link>
                            </link>
                        </link>
                    </link>
                </link>
            </meta>
        </meta>
    </head>
    <body class="fondologin">
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                            <div class="login-brand">
                               <img alt="logo" class=" mb-5 mt-2" src="../logosEntel/puntos-logo.png" width="100">
                            </div>
                            <div class="card card-primary" style="border-top: 2px solid #005bff;">
                                <div class="card-header">
                                    <h4 style="color: #005bff">
                                        Registro
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" action="{{ route('register') }}" method="POST" novalidate="">
                                         @csrf
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="frist_name">
                                                    Nombre
                                                </label>
                                                <input autofocus="" class="form-control" id="frist_name" name="name" required="true" type="text">
                                                </input>
                                                <div class="invalid-feedback">
                                                    Favor ingresar nombre 
                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="last_name">
                                                    Apellido
                                                </label>
                                                <input class="form-control" required="true" id="last_name" name="last_name" type="text">
                                                </input>
                                                 <div class="invalid-feedback">
                                                    Favor ingresar apellido 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                Email
                                            </label>
                                            <input class="form-control" required="true" id="email" name="email" type="email">
                                                  <div class="invalid-feedback">
                                                    Favor ingresar un email 
                                                </div>
                                            </input>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label class="d-block" for="password">
                                                    Password
                                                </label>
                                                <input class="form-control  pwstrength"  required="true" data-indicator="pwindicator" id="password" name="password" type="password">
                                                    <div class="invalid-feedback">
                                                    Favor ingresar una contraseña
                                                </div>
                                                </input>
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="d-block" for="password2">
                                                    Password Confirmation
                                                </label>
                                                <input class="form-control"  required="true" id="password2" name="password-confirm" type="password">
                                                </input>
                                                  <div class="invalid-feedback">
                                                    Favor ingresar repetir la contraseña
                                                </div>
                                            </div>
                                        </div>
                                      
                                        
                                        
                                        <div class="form-group">
                                            <button class="btn  btn-lg btn-block boxBounce" style="color: white;background-color:#005bff " type="submit">
                                                Aceptar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="simple-footer" style="color: white">
                                      Copyright © 2020  Anida Consultores
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- General JS Scripts -->
        <
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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js">
        </script>
        <script src="../css/sweetalert2.min.js">
        </script>
    </body>
</html>
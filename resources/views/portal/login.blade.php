<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
                <title>
                    Portal Infraestructura
                </title>
                <!-- General CSS Files -->
                <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
                    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet">
                        <!-- CSS Libraries -->
                        <!-- Template CSS -->
                        <link href="../layout/css/style.css" rel="stylesheet">
                            <link href="../layout/css/components.css" rel="stylesheet">
                            </link>
                        </link>
                    </link>
                </link>
            </meta>
        </meta>
    </head>
    <body>
        <div id="app">
            <section class="section">
                <div class="d-flex flex-wrap align-items-stretch">
                    <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                        <div class="p-4 m-3">
                            <img alt="logo" class=" mb-5 mt-2" src="../logosEntel/puntos-logo.png" width="100">
                                <h4 class="text-dark font-weight-normal">
                                    Bienvenido al
                                    <span class="font-weight-bold">
                                        portal de infraestructura
                                    </span>
                                </h4>
                                <p class="text-muted">
                                    Antes de comenzar, debes iniciar sesión o registrarse si aún no tienes una cuenta.
                                </p>
                                <form action="{{ route('login') }}" class="needs-validation" method="POST" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">
                                            Email o nombre de usuario
                                        </label>
                                        <input autofocus="" class="form-control" id="username" name="username" required="" tabindex="1" type="username">
                                            <div class="invalid-feedback">
                                                Favor ingresar email o  nombre de usuario
                                            </div>
                                        </input>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label class="control-label" for="password">
                                                Password
                                            </label>
                                        </div>
                                        <input class="form-control" id="password" name="password" required="" tabindex="2" type="password">
                                            <div class="invalid-feedback">
                                                Favor de ingresar su contraseña
                                            </div>
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <div class="float">
                                            <a class="text-small" href="/password/reset">
                                                Olvido su contraseña?
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-block" style="background-color: #005bff;color: white;" tabindex="4" type="submit">
                                            Login
                                        </button>
                                    </div>
                                    <div class="mt-5 text-muted text-center">
                                        No tienes una cuenta?
                                        <a href="/formUser">
                                            Crear cuenta
                                        </a>
                                    </div>
                                </form>
                                <div class="text-center mt-5 text-small">
                                    Copyright © 2020  Anida Consultores
                                </div>
                            </img>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 position-relative overlay-gradient-bottom fondologin">
                        <div class="absolute-bottom-left index-2">
                            <div class="text-light p-5 pb-2">
                                <div class="mb-5 pb-3">
                                    <h1 class="mb-2 display-4 font-weight-bold">
                                        Buenos días
                                    </h1>
                                    <h5 class="font-weight-normal text-muted-transparent">
                                        Torre Entel, Chile
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- General JS Scripts -->
        <script src="../jquery/jquery-3.3.1.min.js">
        </script>
        <script src="../jquery/popper.min.js">
        </script>
        <script src="../bootstrap/js/bootstrap.min.js">
        </script>
    </body>
</html>
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

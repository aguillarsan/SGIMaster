<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
                <title>
                    Formulario covid-19
                </title>
                <!-- General CSS Files -->
                <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
                    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet">
                        <!-- CSS Libraries -->
                        <link href="../node_modules/bootstrap-social/bootstrap-social.css" rel="stylesheet">
                            <!-- Template CSS -->
                            <link href="../layout/css/style.css" rel="stylesheet">
                                <link href="../layout/css/components.css" rel="stylesheet">
                                    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
                                </link>
                            </link>
                        </link>
                    </link>
                </link>
            </meta>
        </meta>
    </head>
    <body class="fondo">
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="login-brand">
                                <img alt="logo" class=" " src="../logosEntel/puntos-logo.png" width="100">
                                </img>
                            </div>
                            <div class="title" style="width: 800px;margin-left: -82px;color:white;margin-top: -30px;">
                                <h2>
                                    Formulario protocolo covid-19
                                </h2>
                            </div>
                            <div style="margin-top: 20px;">
                            </div>
                            <div class="card card-primary" style="border-top: 2px solid #005bff; ">
                                <div class="card-body">
                                    <form action="/createFormCovid" class="needs-validation" method="POST" novalidate="">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">
                                                Nombre completo
                                            </label>
                                            <input autofocus="" class="form-control " id="username" name="nombre" required="" tabindex="1" type="text">
                                                <div class="invalid-feedback">
                                                    Favor ingresar nombre
                                                </div>
                                         
                                        </div>
                                        <div class="form-group">
                                            <div class="d-block">
                                                <label class="control-label" for="Mandante">
                                                    Proveedor
                                                </label>
                                            </div>
                                            <select autofocus="" class=" form-control js-example-basic-single" id="Proveedor" name="proveedor" required="" tabindex="1">
                                                <option>
                                                </option>
                                                @foreach($proveedor as $p)
                                                <option value="{{$p->id}}">
                                                    {{$p->PROVEEDOR}}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar proveedor
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-block">
                                                <label class="control-label" for="Mandante">
                                                    Responsable Entel
                                                </label>
                                            </div>
                                            <input class="form-control" id="Mandante" name="mandante" required="" tabindex="2" type="text">
                                                <div class="invalid-feedback">
                                                    Favor de rellenar el campo
                                                </div>
                                            </input>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                Actividad
                                            </label>
                                            <input autofocus="" class="form-control" id="Actividad" name="mandante" required="" tabindex="1" type="text">
                                                <div class="invalid-feedback">
                                                    Favor ingresar actividad
                                                </div>
                                            </input>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                ¿Incidencia o trabajo programado?
                                            </label>
                                            <select autofocus="" class="form-control" id="Tipo" name="tipo" required="" tabindex="1">
                                                <option>
                                                </option>
                                                <option value="1">
                                                    TP
                                                </option>
                                                <option value="2">
                                                    INCIDENCIA
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar uno
                                            </div>
                                            <input autofocus="" class="form-control" id="nrotipo" name="nrotipo" required="" tabindex="1" type="text">
                                                <div class="invalid-feedback">
                                                    Favor ingresar nro
                                                </div>
                                            </input>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                Temperatura
                                            </label>
                                            <input autofocus="" class="form-control" id="temperatura" name="Temperatura" required="" tabindex="1" type="text">
                                                <div class="invalid-feedback">
                                                    Favor ingresar temepratura
                                                </div>
                                            </input>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                Tiene dificultad para respirar?
                                            </label>
                                            <select autofocus="" class="form-control" id="Dificultad" name="dificultad" required="" tabindex="1">
                                                <option>
                                                </option>
                                                <option value="1">
                                                    SI
                                                </option>
                                                <option value="2">
                                                    NO
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar una opción
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                ¿Tuviste posible contacto con COVID-19?
                                            </label>
                                            <select autofocus="" class="form-control" id="Contacto" name="contacto" required="" tabindex="1">
                                                <option>
                                                </option>
                                                <option value="1">
                                                    SI
                                                </option>
                                                <option value="2">
                                                    NO
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar una opción
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                ¿Has regresado desde el extranjero en los ultimos 14 días?
                                            </label>
                                            <select autofocus="" class="form-control" id="Extranjero" name="extranjero" required="" tabindex="1">
                                                <option>
                                                </option>
                                                <option value="1">
                                                    SI
                                                </option>
                                                <option value="2">
                                                    NO
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar una opción
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                ¿Has estado en contacto con un paciente confirmado con COVID-19 ?
                                            </label>
                                            <select autofocus="" class="form-control" id="Paciente" name="paciente" required="" tabindex="1">
                                                <option>
                                                </option>
                                                <option value="1">
                                                    SI
                                                </option>
                                                <option value="2">
                                                    NO
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar una opción
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                ¿Tienes otros síntomas?
(Tos u otros síntomas respiratorios)
                                            </label>
                                            <select autofocus="" class="form-control" id="otros" name="otrosSintomas" required="" tabindex="1">
                                                <option>
                                                </option>
                                                <option value="1">
                                                    SI
                                                </option>
                                                <option value="2">
                                                    NO
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar una opción
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                ¿Tienes o has tenido fiebre? [Sobre 37,8°C]
                                            </label>
                                            <select autofocus="" class="form-control" id="Fiebre" name="fiebre" required="" tabindex="1">
                                                <option>
                                                </option>
                                                <option value="1">
                                                    SI
                                                </option>
                                                <option value="2">
                                                    NO
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar una opción
                                            </div>
                                        </div>
                                      
                                     
                                        <div class="form-group">
                                            <button class="btn btn-lg btn-block" style="background-color: #005bff;color: white;" tabindex="4" type="submit">
                                                Enviar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="simple-footer" style="color: white;">
                                Copyright © Anida 2020  v.2.0
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- General JS Scripts -->
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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js">
        </script>
        <!-- JS Libraies -->
        <!-- Template JS File -->
        <script src="../layout/js/scripts.js">
        </script>
        <script src="../layout/js/custom.js">
        </script>
        <script>
            $(window).on("load",function(){
    $(".loader-wrapper").fadeOut("slow");
  });

  $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
        </script>
        <!-- Page Specific JS File -->
    </body>
</html>
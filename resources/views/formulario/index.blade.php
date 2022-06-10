<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
                <title>
                    Formulario MBO
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
                            <div style="margin-top: 20px;">
                            </div>
                            <div class="card card-primary" style="border-top: 2px solid #005bff; ">
                                <div class="card-body">
                                    <form action="/register-form-data-mbo" class="needs-validation" method="POST" novalidate="">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">
                                                Incidencia
                                            </label>
                                            <input autofocus="" id="incidencia_input" class="form-control " onclick="crealInc(this.value)" onchange="setString(this.value)" maxlength="9" id="username" name="incidencia" required="" tabindex="1" type="text">
                                                <div class="invalid-feedback">
                                                    Favor ingresar Incidencia
                                                </div>
                                            </input>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-block">
                                                <label class="control-label" for="Mandante">
                                                    Condición
                                                </label>
                                            </div>
                                            <select autofocus="" class=" form-control " id="" name="condicion" required="" tabindex="1">
                                                <option disabled="true" selected="true">
                                                </option>
                                                <option>
                                                    Perdida Total
                                                </option>
                                                <option>
                                                    Perdida Parcial
                                                </option>
                                                <option>
                                                    Sin Perdida
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar Condición
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-block">
                                                <label class="control-label" for="Mandante">
                                                    MBO_N1 Revisado
                                                </label>
                                            </div>
                                            <select autofocus="" class=" form-control " id="" name="mbo_n1_revisado" onchange="setmbo2(this.value)" required="" tabindex="1">
                                                <option disabled="true" selected="true">
                                                </option>
                                                <option>
                                                    CORE y Transporte
                                                </option>
                                                <option>
                                                    CORE Móvil
                                                </option>
                                                <option>
                                                    Servicios VAS y Plataformas
                                                </option>
                                                <option>
                                                    Agregación
                                                </option>
                                                <option>
                                                    Acceso Fijo
                                                </option>
                                                <option>
                                                    Poder
                                                </option>
                                                <div class="invalid-feedback">
                                                    Favor seleccionar  MBO_N1 Revisado
                                                </div>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                MBO_N2 revisado
                                            </label>
                                            <select autofocus="" class=" form-control " id="" name="mbo_n2_revisado" required="" tabindex="1">
                                                <option disabled="true" selected="true">
                                                </option>
                                                <option id="core_transporte_1" style="display:none">
                                                    MPLS CORE CORTE.
                                                </option>
                                                <option id="core_transporte_2" style="display:none">
                                                    MPLS CORE DEGRADACIÓN
                                                </option>
                                                <option id="core_transporte_3" style="display:none">
                                                    CORE TELEFONIA
                                                </option>
                                                <option id="core_transporte_4" style="display:none">
                                                    CORE TELEFONIA PERIFERICOS
                                                </option>
                                                <option id="core_transporte_5" style="display:none">
                                                    PLATAFORMAS SATELITALES
                                                </option>
                                                <option id="core_transporte_6" style="display:none">
                                                    RED TRANSPORTE CORE CORTE
                                                </option>
                                                <option id="core_transporte_7" style="display:none">
                                                    RED TRANSPORTE CORE DEGRADACIÓN
                                                </option>
                                                <option id="core_transporte_8" style="display:none">
                                                    RED TRANSPORTE DERIVACIONES
                                                </option>
                                                <option id="core_transporte_9" style="display:none">
                                                    CABLES FO TRONCAL
                                                </option>
                                                <option id="core_transporte_10" style="display:none">
                                                    MMOO TRONCAL EQ (Red Austral&Pta; Arenas)
                                                </option>
                                                <option id="core_transporte_11" style="display:none">
                                                    IP CORE CORTE
                                                </option>
                                                <option id="core_transporte_12" style="display:none">
                                                    IP CORE DEGRADACIÓN
                                                </option>
                                                <option id="core_movil_1" style="display:none">
                                                    CORE DATOS CORTE
                                                </option>
                                                <option id="core_movil_2" style="display:none">
                                                    CORE DATOS DEGRADACION
                                                </option>
                                                <option id="core_movil_3" style="display:none">
                                                    CORE VOZ CORTE
                                                </option>
                                                <option id="core_movil_4" style="display:none">
                                                    CORE VOZ DEGRADACION (4)
                                                </option>
                                                <option id="tv_plataformas_vas_1" style="display:none">
                                                    PLATAFORMAS SERVICIOS CLIENTES  CORTE DE SERVICIO
                                                </option>
                                                <option id="tv_plataformas_vas_2" style="display:none">
                                                    PLATAFORMAS GESTION INTERNA&SERVICIOS; SIN CORTE TRAFICO
                                                </option>
                                                <option id="tv_plataformas_vas_3" style="display:none">
                                                    PLATAFORMAS TV CORTE (2)
                                                </option>
                                                <option id="tv_plataformas_vas_4" style="display:none">
                                                    PLATAFORMAS TV DEGRADACION (2)
                                                </option>
                                                <option id="agregacion_1" style="display:none">
                                                    MMOO URBANA EQ
                                                </option>
                                                <option id="agregacion_2" style="display:none">
                                                    FO AGREGACION EQ.
                                                </option>
                                                <option id="agregacion_3" style="display:none">
                                                    MPLS AGREGACION
                                                </option>
                                                <option id="acceso_fijo_1" style="display:none">
                                                    FO EQUIPOS ACCESO
                                                </option>
                                                <option id="acceso_fijo_2" style="display:none">
                                                    OLT
                                                </option>
                                                <option id="acceso_fijo_3" style="display:none">
                                                    MPLS ACCESO
                                                </option>
                                                <option id="acceso_fijo_4" style="display:none">
                                                    MMOO REGIONAL EQ: RURAL
                                                </option>
                                                <option id="acceso_fijo_5" style="display:none">
                                                    COBRE
                                                </option>
                                                <option id="acceso_fijo_6" style="display:none">
                                                    CABLES FO ACCESO
                                                </option>
                                                <option id="acceso_fijo_7" style="display:none">
                                                    XDSL URBANO
                                                </option>
                                                <option id="acceso_fijo_8" style="display:none">
                                                    XDSL RURAL
                                                </option>
                                                <option id="poder_1" style="display:none">
                                                    OPTOESTACIONES / RADIOESTACIONES
                                                </option>
                                                <option id="poder_1" style="display:none">
                                                    URA / DATACENTER
                                                </option>
                                                <option id="poder_2" style="display:none">
                                                    SITIOS MOVILES
                                                </option>
                                                <option id="poder_3" style="display:none">
                                                    SITIOS MOVILES LLOO
                                                </option>
                                                <option id="poder_4" style="display:none">
                                                    ONU
                                                </option>
                                                <option id="poder_5" style="display:none">
                                                    CLIMA
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar  MBO_N2 Revisado
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Nombre Primer Revisor
                                            </label>
                                            <select autofocus="" class="form-control" name="nombre_primer_revisor" required="" tabindex="1">
                                                <option disabled="true" selected="true">
                                                </option>
                                                <option>
                                                    Carlos Leon
                                                </option>
                                                <option>
                                                    Bruno Muñoz
                                                </option>
                                                <option>
                                                    Moises Riveros
                                                </option>
                                                <option>
                                                    Jorge Laclote
                                                </option>
                                                <option>
                                                    Sergio Nanjari
                                                </option>
                                                <option>
                                                    Alejandro Castillo
                                                </option>
                                                <option>
                                                    Jorge Alcantar
                                                </option>
                                                <option>
                                                    Sebastian Jorquera
                                                </option>
                                                <option>
                                                    Cristian Herrera
                                                </option>
                                                <option>
                                                    Cristian Escobar
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar  Nombre Primer Revisor
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                Revisión Aplica
                                            </label>
                                            <select autofocus="" class="form-control" name="revision_aplica" required="" tabindex="1">
                                                <option disabled="true" selected="true">
                                                </option>
                                                <option>
                                                    Si
                                                </option>
                                                <option>
                                                    No
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar  si la revisión aplica
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                Comentario Revisión
                                            </label>
                                            <input autofocus="" class="form-control" name="comentario_revisión" required="" style="height: 100px;"/>
                                            <div class="invalid-feedback">
                                                Favor seleccionar una opción
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                Nombre Segundo Revisor
                                            </label>
                                            <select autofocus="" class="form-control" id="Contacto" name="nombre_segundo_revisor" required="" tabindex="1">
                                                <option disabled="true" selected="true">
                                                </option>
                                                <option>
                                                    Carlos Leon
                                                </option>
                                                <option>
                                                    Bruno Muñoz
                                                </option>
                                                <option>
                                                    Moises Riveros
                                                </option>
                                                <option>
                                                    Jorge Laclote
                                                </option>
                                                <option>
                                                    Sergio Nanjari
                                                </option>
                                                <option>
                                                    Alejandro Castillo
                                                </option>
                                                <option>
                                                    Jorge Alcantar
                                                </option>
                                                <option>
                                                    Sebastian Jorquera
                                                </option>
                                                <option>
                                                    Cristian Herrera
                                                </option>
                                                <option>
                                                    Cristian Escobar
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar  Nombre Segundo Revisor
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                Segundo Revisor Acepta Incidencia
                                            </label>
                                            <select autofocus="" class="form-control" id="Extranjero" name="segundo_revisor_acepta_incidencia" required="" tabindex="1">
                                                <option disabled="true" selected="true">
                                                </option>
                                                <option>
                                                    SI
                                                </option>
                                                <option>
                                                    NO
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar una opción
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                Segundo Revisor Aplica
                                            </label>
                                            <select autofocus="" class="form-control" id="Extranjero" name="segundo_revisor_aplica" required="" tabindex="1">
                                                <option disabled="true" selected="true">
                                                </option>
                                                <option>
                                                    SI
                                                </option>
                                                <option>
                                                    NO
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar una opción
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                Duración Revisada
                                            </label>
                                            <input autofocus="" class="form-control" placeholder="Ej: 1,1" name="duracion_revisada" required="" type="text"/>
                                            <div class="invalid-feedback">
                                                Favor ingresa un dato
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                Segundo revisor Comentario Revisión
                                            </label>
                                            <input autofocus="" class="form-control" name="comentario_segundo_revisor_revision" required="" style="height: 100px;"/>
                                            <div class="invalid-feedback">
                                                Favor completar este campo
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                Fecha de Conclusión
                                            </label>
                                            <input autofocus="" class="form-control" name="fecha_conclusion" required="" type="date"/>
                                            <div class="invalid-feedback">
                                                Favor seleccione la fecha
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
        <script type="text/javascript">
            function setmbo2(value){

                  if(value=='CORE y Transporte'){
                   document.getElementById("core_transporte_1").style.display = 'block' 
                   document.getElementById("core_transporte_2").style.display = 'block' 
                   document.getElementById("core_transporte_3").style.display = 'block' 
                   document.getElementById("core_transporte_4").style.display = 'block' 
                   document.getElementById("core_transporte_5").style.display = 'block' 
                   document.getElementById("core_transporte_6").style.display = 'block' 
                   document.getElementById("core_transporte_7").style.display = 'block' 
                   document.getElementById("core_transporte_8").style.display = 'block' 
                   document.getElementById("core_transporte_9").style.display = 'block' 
                   document.getElementById("core_transporte_10").style.display = 'block' 
                   document.getElementById("core_transporte_11").style.display = 'block' 
                   document.getElementById("core_transporte_12").style.display = 'block' 
                   ////////////////////////////////////////////////////////////////////
                    document.getElementById("core_movil_1").style.display = 'none'
                    document.getElementById("core_movil_2").style.display = 'none'
                    document.getElementById("core_movil_3").style.display = 'none'
                    document.getElementById("core_movil_4").style.display = 'none'
                    ///////////////////////////////////////////////////////////////////
                    document.getElementById("tv_plataformas_vas_1").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_2").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_3").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_4").style.display = 'none' 
                       ///////////////////////////////////////////////////////////////////
                             document.getElementById("agregacion_1").style.display = 'none' 
                     document.getElementById("agregacion_2").style.display = 'none' 
                     document.getElementById("agregacion_3").style.display = 'none' 
                          ///////////////////////////////////////////////////////////////////
                       document.getElementById("acceso_fijo_1").style.display = 'none' 
                    document.getElementById("acceso_fijo_2").style.display = 'none' 
                    document.getElementById("acceso_fijo_3").style.display = 'none' 
                    document.getElementById("acceso_fijo_4").style.display = 'none' 
                    document.getElementById("acceso_fijo_5").style.display = 'none' 
                    document.getElementById("acceso_fijo_6").style.display = 'none' 
                    document.getElementById("acceso_fijo_7").style.display = 'none' 
                    document.getElementById("acceso_fijo_8").style.display = 'none' 
                        ////////////////////////////////////////////////////////////////////////
                   document.getElementById("poder_1").style.display ='none'
                   document.getElementById("poder_1").style.display ='none'
                   document.getElementById("poder_2").style.display ='none'
                   document.getElementById("poder_3").style.display ='none'
                   document.getElementById("poder_4").style.display ='none'
                   document.getElementById("poder_5").style.display ='none'

                  }
                  if(value=='CORE Móvil'){
                    document.getElementById("core_movil_1").style.display = 'block'
                    document.getElementById("core_movil_2").style.display = 'block'
                    document.getElementById("core_movil_3").style.display = 'block'
                    document.getElementById("core_movil_4").style.display = 'block'
                    ///////////////////////////////////////////////////////////////////
                    document.getElementById("core_transporte_1").style.display = 'none' 
                   document.getElementById("core_transporte_2").style.display = 'none' 
                   document.getElementById("core_transporte_3").style.display = 'none' 
                   document.getElementById("core_transporte_4").style.display = 'none' 
                   document.getElementById("core_transporte_5").style.display = 'none' 
                   document.getElementById("core_transporte_6").style.display = 'none' 
                   document.getElementById("core_transporte_7").style.display = 'none' 
                   document.getElementById("core_transporte_8").style.display = 'none' 
                   document.getElementById("core_transporte_9").style.display = 'none' 
                   document.getElementById("core_transporte_10").style.display = 'none' 
                   document.getElementById("core_transporte_11").style.display = 'none' 
                   document.getElementById("core_transporte_12").style.display = 'none'
                     /////////////////////////////////////////////////////////////////// 

                    document.getElementById("tv_plataformas_vas_1").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_2").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_3").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_4").style.display = 'none' 
                       ///////////////////////////////////////////////////////////////////
                             document.getElementById("agregacion_1").style.display = 'none' 
                     document.getElementById("agregacion_2").style.display = 'none' 
                     document.getElementById("agregacion_3").style.display = 'none' 
                          ///////////////////////////////////////////////////////////////////
                       document.getElementById("acceso_fijo_1").style.display = 'none' 
                    document.getElementById("acceso_fijo_2").style.display = 'none' 
                    document.getElementById("acceso_fijo_3").style.display = 'none' 
                    document.getElementById("acceso_fijo_4").style.display = 'none' 
                    document.getElementById("acceso_fijo_5").style.display = 'none' 
                    document.getElementById("acceso_fijo_6").style.display = 'none' 
                    document.getElementById("acceso_fijo_7").style.display = 'none' 
                    document.getElementById("acceso_fijo_8").style.display = 'none' 
                        ////////////////////////////////////////////////////////////////////////
                   document.getElementById("poder_1").style.display ='none'
                   document.getElementById("poder_1").style.display ='none'
                   document.getElementById("poder_2").style.display ='none'
                   document.getElementById("poder_3").style.display ='none'
                   document.getElementById("poder_4").style.display ='none'
                   document.getElementById("poder_5").style.display ='none'

                  }
                  if(value=='Servicios VAS y Plataformas'){

                    document.getElementById("tv_plataformas_vas_1").style.display = 'block' 
                    document.getElementById("tv_plataformas_vas_2").style.display = 'block' 
                    document.getElementById("tv_plataformas_vas_3").style.display = 'block' 
                    document.getElementById("tv_plataformas_vas_4").style.display = 'block' 

                    ///////////////////////////////////////////////////////////////////
                    document.getElementById("core_movil_1").style.display = 'none'
                    document.getElementById("core_movil_2").style.display = 'none'
                    document.getElementById("core_movil_3").style.display = 'none'
                    document.getElementById("core_movil_4").style.display = 'none'
                    ///////////////////////////////////////////////////////////////////
                    document.getElementById("core_transporte_1").style.display = 'none' 
                   document.getElementById("core_transporte_2").style.display = 'none' 
                   document.getElementById("core_transporte_3").style.display = 'none' 
                   document.getElementById("core_transporte_4").style.display = 'none' 
                   document.getElementById("core_transporte_5").style.display = 'none' 
                   document.getElementById("core_transporte_6").style.display = 'none' 
                   document.getElementById("core_transporte_7").style.display = 'none' 
                   document.getElementById("core_transporte_8").style.display = 'none' 
                   document.getElementById("core_transporte_9").style.display = 'none' 
                   document.getElementById("core_transporte_10").style.display = 'none' 
                   document.getElementById("core_transporte_11").style.display = 'none' 
                   document.getElementById("core_transporte_12").style.display = 'none' 
                      ///////////////////////////////////////////////////////////////////
                        document.getElementById("agregacion_1").style.display = 'none' 
                     document.getElementById("agregacion_2").style.display = 'none' 
                     document.getElementById("agregacion_3").style.display = 'none' 
                          ///////////////////////////////////////////////////////////////////
                       document.getElementById("acceso_fijo_1").style.display = 'none' 
                    document.getElementById("acceso_fijo_2").style.display = 'none' 
                    document.getElementById("acceso_fijo_3").style.display = 'none' 
                    document.getElementById("acceso_fijo_4").style.display = 'none' 
                    document.getElementById("acceso_fijo_5").style.display = 'none' 
                    document.getElementById("acceso_fijo_6").style.display = 'none' 
                    document.getElementById("acceso_fijo_7").style.display = 'none' 
                    document.getElementById("acceso_fijo_8").style.display = 'none' 
                        ////////////////////////////////////////////////////////////////////////
                   document.getElementById("poder_1").style.display ='none'
                   document.getElementById("poder_1").style.display ='none'
                   document.getElementById("poder_2").style.display ='none'
                   document.getElementById("poder_3").style.display ='none'
                   document.getElementById("poder_4").style.display ='none'
                   document.getElementById("poder_5").style.display ='none'


                  }
                  if(value=='Agregación'){

                     document.getElementById("agregacion_1").style.display = 'block' 
                     document.getElementById("agregacion_2").style.display = 'block' 
                     document.getElementById("agregacion_3").style.display = 'block' 
                      ///////////////////////////////////////////////////////////////////

                    document.getElementById("tv_plataformas_vas_1").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_2").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_3").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_4").style.display = 'none' 
                      ///////////////////////////////////////////////////////////////////
                    document.getElementById("core_movil_1").style.display = 'none'
                    document.getElementById("core_movil_2").style.display = 'none'
                    document.getElementById("core_movil_3").style.display = 'none'
                    document.getElementById("core_movil_4").style.display = 'none'
                    ///////////////////////////////////////////////////////////////////
                    document.getElementById("core_transporte_1").style.display = 'none' 
                   document.getElementById("core_transporte_2").style.display = 'none' 
                   document.getElementById("core_transporte_3").style.display = 'none' 
                   document.getElementById("core_transporte_4").style.display = 'none' 
                   document.getElementById("core_transporte_5").style.display = 'none' 
                   document.getElementById("core_transporte_6").style.display = 'none' 
                   document.getElementById("core_transporte_7").style.display = 'none' 
                   document.getElementById("core_transporte_8").style.display = 'none' 
                   document.getElementById("core_transporte_9").style.display = 'none' 
                   document.getElementById("core_transporte_10").style.display = 'none' 
                   document.getElementById("core_transporte_11").style.display = 'none' 
                   document.getElementById("core_transporte_12").style.display = 'none' 
                      ///////////////////////////////////////////////////////////////////
                       document.getElementById("acceso_fijo_1").style.display = 'none' 
                    document.getElementById("acceso_fijo_2").style.display = 'none' 
                    document.getElementById("acceso_fijo_3").style.display = 'none' 
                    document.getElementById("acceso_fijo_4").style.display = 'none' 
                    document.getElementById("acceso_fijo_5").style.display = 'none' 
                    document.getElementById("acceso_fijo_6").style.display = 'none' 
                    document.getElementById("acceso_fijo_7").style.display = 'none' 
                    document.getElementById("acceso_fijo_8").style.display = 'none' 
                        ////////////////////////////////////////////////////////////////////////
                   document.getElementById("poder_1").style.display ='none'
                   document.getElementById("poder_1").style.display ='none'
                   document.getElementById("poder_2").style.display ='none'
                   document.getElementById("poder_3").style.display ='none'
                   document.getElementById("poder_4").style.display ='none'
                   document.getElementById("poder_5").style.display ='none'

                  }
                  if(value=='Acceso Fijo'){

                    document.getElementById("acceso_fijo_1").style.display = 'block' 
                    document.getElementById("acceso_fijo_2").style.display = 'block' 
                    document.getElementById("acceso_fijo_3").style.display = 'block' 
                    document.getElementById("acceso_fijo_4").style.display = 'block' 
                    document.getElementById("acceso_fijo_5").style.display = 'block' 
                    document.getElementById("acceso_fijo_6").style.display = 'block' 
                    document.getElementById("acceso_fijo_7").style.display = 'block' 
                    document.getElementById("acceso_fijo_8").style.display = 'block' 
                     ///////////////////////////////////////////////////////////////////
                        document.getElementById("agregacion_1").style.display = 'none' 
                     document.getElementById("agregacion_2").style.display = 'none' 
                     document.getElementById("agregacion_3").style.display = 'none' 

                         ///////////////////////////////////////////////////////////////////

                    document.getElementById("tv_plataformas_vas_1").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_2").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_3").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_4").style.display = 'none' 
                      ///////////////////////////////////////////////////////////////////
                    document.getElementById("core_movil_1").style.display = 'none'
                    document.getElementById("core_movil_2").style.display = 'none'
                    document.getElementById("core_movil_3").style.display = 'none'
                    document.getElementById("core_movil_4").style.display = 'none'
                    ///////////////////////////////////////////////////////////////////
                    document.getElementById("core_transporte_1").style.display = 'none' 
                   document.getElementById("core_transporte_2").style.display = 'none' 
                   document.getElementById("core_transporte_3").style.display = 'none' 
                   document.getElementById("core_transporte_4").style.display = 'none' 
                   document.getElementById("core_transporte_5").style.display = 'none' 
                   document.getElementById("core_transporte_6").style.display = 'none' 
                   document.getElementById("core_transporte_7").style.display = 'none' 
                   document.getElementById("core_transporte_8").style.display = 'none' 
                   document.getElementById("core_transporte_9").style.display = 'none' 
                   document.getElementById("core_transporte_10").style.display = 'none' 
                   document.getElementById("core_transporte_11").style.display = 'none' 
                   document.getElementById("core_transporte_12").style.display = 'none' 
                   ////////////////////////////////////////////////////////////////////////
                   document.getElementById("poder_1").style.display ='none'
                   document.getElementById("poder_1").style.display ='none'
                   document.getElementById("poder_2").style.display ='none'
                   document.getElementById("poder_3").style.display ='none'
                   document.getElementById("poder_4").style.display ='none'
                   document.getElementById("poder_5").style.display ='none'

                  }
                   if(value=='Poder'){
                    document.getElementById("poder_1").style.display ='block' 
                    document.getElementById("poder_1").style.display ='block' 
                    document.getElementById("poder_2").style.display ='block' 
                    document.getElementById("poder_3").style.display ='block' 
                    document.getElementById("poder_4").style.display ='block' 
                    document.getElementById("poder_5").style.display ='block' 
                        ///////////////////////////////////////////////////////////////////
                        document.getElementById("agregacion_1").style.display = 'none' 
                     document.getElementById("agregacion_2").style.display = 'none' 
                     document.getElementById("agregacion_3").style.display = 'none' 

                         ///////////////////////////////////////////////////////////////////

                    document.getElementById("tv_plataformas_vas_1").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_2").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_3").style.display = 'none' 
                    document.getElementById("tv_plataformas_vas_4").style.display = 'none' 
                      ///////////////////////////////////////////////////////////////////
                    document.getElementById("core_movil_1").style.display = 'none'
                    document.getElementById("core_movil_2").style.display = 'none'
                    document.getElementById("core_movil_3").style.display = 'none'
                    document.getElementById("core_movil_4").style.display = 'none'
                    ///////////////////////////////////////////////////////////////////
                    document.getElementById("core_transporte_1").style.display = 'none' 
                   document.getElementById("core_transporte_2").style.display = 'none' 
                   document.getElementById("core_transporte_3").style.display = 'none' 
                   document.getElementById("core_transporte_4").style.display = 'none' 
                   document.getElementById("core_transporte_5").style.display = 'none' 
                   document.getElementById("core_transporte_6").style.display = 'none' 
                   document.getElementById("core_transporte_7").style.display = 'none' 
                   document.getElementById("core_transporte_8").style.display = 'none' 
                   document.getElementById("core_transporte_9").style.display = 'none' 
                   document.getElementById("core_transporte_10").style.display = 'none' 
                   document.getElementById("core_transporte_11").style.display = 'none' 
                   document.getElementById("core_transporte_12").style.display = 'none'
                      ///////////////////////////////////////////////////////////////////
                       document.getElementById("acceso_fijo_1").style.display = 'none' 
                    document.getElementById("acceso_fijo_2").style.display = 'none' 
                    document.getElementById("acceso_fijo_3").style.display = 'none' 
                    document.getElementById("acceso_fijo_4").style.display = 'none' 
                    document.getElementById("acceso_fijo_5").style.display = 'none' 
                    document.getElementById("acceso_fijo_6").style.display = 'none' 
                    document.getElementById("acceso_fijo_7").style.display = 'none' 
                    document.getElementById("acceso_fijo_8").style.display = 'none' 

                   }
                
            }
            function setString(value){
                $("#incidencia_input").val('INC'+value);

            }
            function crealInc(value){
               $("#incidencia_input").val(value.replace('INC',''));
                
               
            }
        </script>
        <!-- Page Specific JS File -->
    </body>
</html>
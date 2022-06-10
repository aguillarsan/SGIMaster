<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport"/>
        <title>
            SGI|Sistema gestión Infraestructura
        </title>
        <!-- General CSS Files -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <!-- CSS Libraries -->
        <!-- Template CSS -->
        <link href="../layout/css/components.css" rel="stylesheet"/>
        <link href="../layout/css/style.css" rel="stylesheet"/>
        <link href="https://fonts.gstatic.com" rel="preconnect"/>
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600;700&display=swap" rel="stylesheet"/>
        <link href="../logosEntel/l-2020.png" rel="shortcut icon"/>
        <link href="../css/new.css" rel="stylesheet"/>
        <link href="../css/sweetalert2.min.css" rel="stylesheet"/>
    </head>
    <body class="fondo">
        <div>
            <section class="section">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="login-brand">
                                <img alt="logo" class=" " src="../logosEntel/l-2020.png" width="157">
                                </img>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 blanco text_c ">
                            <h2 class="bold barlow">
                                Sistema Gestión Infraestructura
                            </h2>
                            <div class="semi_bold barlow" style="font-size: 1.3rem">
                                Subgerencia Infraestructura, Poder y Clima
                            </div>
                            <div class="regular barlow" style="font-size: 1.05rem ">
                                Gerencia O&M Redes de Acceso
                            </div>
                        </div>
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div style="margin-top: 20px;">
                            </div>
                            <div class="card card-primary" style="border-top: 2px solid #005bff; ">
                                <div class="card-header">
                                    <h4 class="barlow semi_bold " style="text-align: center;">
                                        Inicio de sesión
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('login') }}" class="needs-validation" id="form_login_sgi" method="POST" novalidate="">
                                        @csrf
                                        <div class="form-group">
                                            <label class="regular barlow control-label font_md_b" for="email">
                                                Usuario
                                            </label>
                                            <input class="form-control" id="username" name="username" onkeyup="deleteErrorInput()" required="" type="text">
                                                <div class="invalid-feedback" id="invalid_user_name">
                                                    Favor ingresar nombre de usuario
                                                </div>
                                            </input>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-block">
                                                <label class="control-label regular barlow font_md_b" for="password">
                                                    Password
                                                </label>
                                            </div>
                                            <input class="form-control" id="password" name="password" onkeyup="deleteErrorInput()" required="" tabindex="2" type="password">
                                                <div class="invalid-feedback" id="invalid_password">
                                                    Favor de ingresar su contraseña
                                                </div>
                                            </input>
                                        </div>
                                        <div class="form-group">
                                            <div class="float">
                                                <a class="regular barlow" href="/password/reset">
                                                    Olvido su contraseña?
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-lg btn-block regular barlow boxBounce" onclick="login()" style="background-color: #005bff;color: white;font-size: 15px;" tabindex="4" type="button">
                                                <span aria-hidden="true" class="spinner-border spinner-border-sm" hidden="true" id="spin_load" role="status">
                                                </span>
                                                Login
                                            </button>
                                        </div>
                                        <div class="regular barlow">
                                            No tienes una cuenta?
                                            <a class="regular barlow" href="/CreateAccount">
                                                Crear cuenta
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="simple-footer barlow regular" style="color: white;">
                                Copyright © Anida 2021  v.3.0
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- General JS Scripts -->
        <script src="../jquery/jquery-3.3.1.min.js">
        </script>
        <script src="../bootstrap/js/bootstrap.min.js">
        </script>
        <script src="../layout/js/stisla.js">
        </script>
        <!-- JS Libraies -->
        <!-- Template JS File -->
        <script src="../layout/js/scripts.js">
        </script>
        <script src="../css/sweetalert2.min.js">
        </script>
        <script type="text/javascript">
            addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
              login();
             }
            });
            function deleteErrorInput(){
                let username = document.getElementById("username").value;
                let password = document.getElementById("password").value;
                if(username){
                    document.getElementById("invalid_user_name").style.display = "none";
                }
                if(password){
                    document.getElementById("invalid_password").style.display = "none";
                }
            }
            function login(){
                let username = document.getElementById("username").value;
                let password = document.getElementById("password").value;
                if(!username){
                    document.getElementById("invalid_user_name").style.display = "block";
                }
                if(!password){
                    document.getElementById("invalid_password").style.display = "block";
                }

                if(username && password){
                    document.getElementById("spin_load").hidden = false;
                    
                  $.get(`/confirm-login-data?username=${username}&password=${password}`,function(data){
                    if(data == 2){
                        Swal.fire({
                         type: 'warning',
                         title: 'Alerta!',
                         text: 'Las credenciales no coinciden con nuestros registros',
                       })
                       document.getElementById("spin_load").hidden = true;
                       $("#username").val(''); 
                       $("#password").val('');
                  
                    }else{
                        if(data == 3){
                          Swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Su usuario se encuentra inactivo',
                            })
                           document.getElementById("spin_load").hidden = true;
                        }else{
                            if(data == 1){
                            $.get('http://172.16.100.102/outside/bridge/'+username+'/'+password)
                            let form = document.getElementById("form_login_sgi");
                            form.submit();
                           }
                        }
                     
                    }

                  });
                }
              
                    
                
            }
        </script>
    </body>
</html>
<!-- Page Specific JS File -->

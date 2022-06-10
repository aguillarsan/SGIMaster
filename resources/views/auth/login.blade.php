<html lang="en" class="">
<!--begin::Head-->

<head>
    <base href="../../../">
    <title>SGI - Sistema Gestión Infraestructura </title>
    <meta charset="utf-8">

    <link rel="canonical" href="https://preview.keenthemes.com/metronic8">
    <link rel="shortcut icon" href="logosEntel/l-2020.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css">

    <style>
        body {
            background: linear-gradient(-45deg, rgb(184, 226, 251), rgb(84, 180, 236), rgb(0, 114, 255), rgb(0, 198, 255));
            background-size: 400% 400%;
            animation: gradient 15s ease  infinite ;
            height: 100vh;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body id="kt_body" class="bg-body " style="padding-right: 0px;">

    <div class="d-flex flex-column flex-root">

        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">

            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

                <a class="mb-12">
                    <img alt="Logo" src="assets/media/logos/sgi-l-w.png" class="h-200px">
                </a>

                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

                    <form action="{{ route('login') }}" method="POST"
                        class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                        id="kt_sign_in_form" action="#">
                        @csrf

                        <div class="text-center mb-10">

                            <h1 class="text-dark mb-3"> Inicio de sesión</h1>

                            <div class="text-gray-400 fw-bold fs-4"> No tienes una cuenta?
                                <a href="/CreateAccount" class="link-primary fw-bolder"> Crear cuenta</a>
                            </div>

                        </div>

                        <div class="fv-row mb-10 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">

                            <label class="form-label fs-6 fw-bolder text-dark">Usuario</label>

                            <input class="form-control form-control-lg form-control-solid " id="username" type="text"
                                name="username">

                            <div class="fv-plugins-message-container invalid-feedback" id="invalid_user_name"
                                style="display: none">
                                <div data-field="email" data-validator="notEmpty"> Favor ingresar nombre de usuario
                                </div>
                            </div>
                        </div>

                        <div class="fv-row mb-10 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">

                            <div class="d-flex flex-stack mb-2">

                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Contraseña</label>

                                <a href="/password/reset" class="link-primary fs-6 fw-bolder">Olvido su contraseña?</a>

                            </div>

                            <input class="form-control form-control-lg form-control-solid " id="password"
                                type="password" name="password" autocomplete="off">

                            <div class="fv-plugins-message-container invalid-feedback" id="invalid_password"
                                style="display: none">
                                <div data-field="password" data-validator="notEmpty">Favor de ingresar su contraseña
                                </div>
                            </div>
                        </div>

                        <div class="text-center">

                            <button id="button_tk" type="button" onclick="login()"
                                class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Login</span>

                                <span class="indicator-progress">
                                    Login... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>

                        </div>

                        <div></div>
                    </form>

                </div>

            </div>

        </div>

    </div>

    <script>var hostUrl = "assets/";</script>

    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>

    <script src="assets/js/custom/authentication/sign-in/general.js"></script>


    <!--end::Body-->
    <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
    </svg>
    <script type="text/javascript">
        addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                login();
            }
        });
        function deleteErrorInput() {
            let username = document.getElementById("username").value;
            let password = document.getElementById("password").value;
            if (username) {
                document.getElementById("invalid_user_name").style.display = "none";
            }
            if (password) {
                document.getElementById("invalid_password").style.display = "none";
            }
        }
        function login() {
            let username = document.getElementById("username").value;
            let password = document.getElementById("password").value;
            if (!username) {
                document.getElementById("invalid_user_name").style.display = "block";
            }
            if (!password) {
                document.getElementById("invalid_password").style.display = "block";
            }

            if (username && password) {
                let button = document.getElementById("button_tk");
                button.setAttribute("data-kt-indicator", "on");
                $.get(`/confirm-login-data?username=${username}&password=${password}`, function (data) {
                    if (data == 2) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Alerta!',
                            text: 'Las credenciales no coinciden con nuestros registros',
                        })

                        $("#username").val('');
                        $("#password").val('');
                        button.removeAttribute("data-kt-indicator");

                    } else {
                        if (data == 3) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Su usuario se encuentra inactivo',
                            })
                            button.removeAttribute("data-kt-indicator");
                        } else {
                            if (data == 1) {

                                let form = document.getElementById("kt_sign_in_form");
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
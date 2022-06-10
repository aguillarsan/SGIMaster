<html lang="en" class="">
<!--begin::Head-->

<head>
    <base href="/">
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
            animation: gradient 15s ease infinite;
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

                    <form method="POST" action="{{ route('password.request') }}"
                        class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                        id="reset_password_form" action="#">

                        {{ csrf_field() }}
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Reestablecer Contraseña</h1>
                            <div class="text-gray-400 fw-bold fs-4">
                                Complete los campos para resstablecer su contraseña
                            </div>

                        </div>


                        <div class="fv-row mb-10 fv-plugins-icon-container ">

                            <label class="form-label fs-6 fw-bolder text-dark">Correo</label>

                            <input class="form-control form-control-lg form-control-solid " id="email"
                                type="email" name="email" value="{{$email}}">

                            <div class="fv-plugins-message-container invalid-feedback" id="invalid_user_name"
                                style="display: none">
                                <div data-field="email" data-validator="notEmpty"> Favor ingresar email
                                </div>
                            </div>
                        </div>
                        <div class="fv-row mb-10 fv-plugins-icon-container ">

                            <label class="form-label fs-6 fw-bolder text-dark">Contraseña</label>

                            <input class="form-control form-control-lg  " onchange="validatePassword()"
                                required id="password" type="password" name="password">


                            <div class="fv-plugins-message-container text-black">
                                Debe tener al menos 14 caracteres, una mayúscula, una minúscula y al menos un número
                            </div>
                        </div>
                        <div class="fv-row mb-10 fv-plugins-icon-container ">

                            <label class="form-label fs-6 fw-bolder text-dark">Confirmar Contraseña</label>

                            <input class="form-control form-control-lg " id="password_confirmation" type="password"
                                name="password_confirmation" required>

                            <div class="fv-plugins-message-container invalid-feedback" id="invalid_user_name"
                                style="display: none">
                                <div data-field="password" data-validator="notEmpty">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">

                            <button id="button_tk" type="button" onclick="resetPassword()"
                                class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Aceptar</span>

                                <span class="indicator-progress">
                                    Login... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>

                        </div>


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
        function validatePassword() {

            let password = document.getElementById("password").value;
            let largo = null
            let mayus = null
            let minus = null
            let number = null
            let text_error = ''
            if (password.length < 14) {
                largo = false
                text_error = 'faltan caracteres tienes ' + password.length
            } else if (password.length >= 14) {
                largo = true
            }
            if (password.match(/[A-Z]/)) {
                mayus = true
            } else {
                mayus = false
                text_error = text_error + ',' + ' te falta una mayúscula'
            }
            if (password.match(/[a-z]/)) {
                minus = true
            } else {
                minus = false
                text_error = text_error + ',' + ' te falta una minúscula'
            }
            if (password.match(/\d/)) {
                number = true
            } else {
                number = false
                text_error = text_error + ',' + ' te falta un número'
            }
            if (!largo || !mayus || !minus || !number) {
                Swal.fire({
                    icon: 'error',
                    title: 'error',
                    text: text_error,
                })
            } else if (largo || mayus || minus || number) {
                return true;
            }

        }
        function resetPassword() {
            let password = document.getElementById("password").value;
            let repeat_password = document.getElementById("password_confirmation").value;
            if (repeat_password != password) {
                Swal.fire({
                    icon: 'error',
                    title: 'error',
                    text: 'Las contraseñas no coinciden',
                })
            } else if (repeat_password == password) {
                if (validatePassword()) {
                    let form = document.getElementById("reset_password_form")
                    form.submit()
                }
            }
        }
    </script>

</body>

</html>
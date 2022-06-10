<!DOCTYPE html>

<html lang="es">

<head>

    <title>SGI|Modulos</title>
    <meta charset="utf-8" />




    <link rel="shortcut icon" href="logosEntel/l-2020.png" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />


    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>


<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div id="app">
        <div class="d-flex flex-column flex-root">

            <div class="page d-flex flex-row flex-column-fluid">

                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                    <div id="kt_header" class="header align-items-stretch ">

                        <div class="container-xxl d-flex align-items-stretch justify-content-between"
                            style=" max-width: inherit!important;">

                            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15 ">

                                <img alt="Logo" src="logosEntel/sgi.png" class="h-50px h-lg-50px" />

                            </div>

                            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">

                                <div class="d-flex align-items-stretch" id="kt_header_nav">

                                </div>

                                <div class="d-flex align-items-stretch flex-shrink-0">



                                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">

                                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px  symbol-circle"
                                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                            data-kt-menu-placement="bottom-end">
                                            <img src="{{Auth::user()->avatar}}" alt="user" />
                                        </div>

                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                            data-kt-menu="true">

                                            <div class="menu-item px-3">
                                                <div class="menu-content d-flex align-items-center px-3">

                                                    <div class="symbol symbol-50px me-5  symbol-circle">
                                                        <img alt="Logo" src="{{Auth::user()->avatar}}" />
                                                    </div>

                                                    <div class="d-flex flex-column">
                                                        <div class="fw-bolder d-flex align-items-center fs-5">
                                                            {{Auth::user()->name}} {{Auth::user()->apellido}}

                                                        </div>
                                                        <a href="#" style="word-break: break-all;"
                                                            class="fw-bold text-muted text-hover-primary fs-7">{{Auth::user()->email}}</a>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="separator my-2"></div>

                                           


                                            <div class="menu-item px-5">


                                                <a href=" /admin/user/detail/{{Auth::user()->id}}" class="menu-link px-5">

                                                    <i class="bi bi-person"
                                                        style="padding:5px;font-size: 1.5rem!important;"></i> 
                                                    Perfil </a>


                                            </div>


                                            <div class="menu-item px-5">


                                                <a href="/logout/platform" class="menu-link px-5">

                                                    <i class="bi bi-box-arrow-left"
                                                        style="padding:5px;font-size: 1.5rem!important;"></i> Cerrar
                                                    sesión </a>


                                            </div>
                                            
                                           


                                        </div>

                                    </div>


                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                        <div class="toolbar" id="kt_toolbar">

                            <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack"
                                style=" max-width: inherit!important;">

                                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Modulos</h1>



                                </div>

                            </div>

                        </div>

                        <indexsgi :modulos="'{{$modulo}}'" :usuario='@json(auth()->user())'></indexsgi>

                    </div>

                    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">

                        <div
                            class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">

                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted fw-bold me-1">2022©</span>
                                <a href="https://keenthemes.com" target="_blank"
                                    class="text-gray-800 text-hover-primary">Anida Consultores</a>
                            </div>



                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>







    <script>var hostUrl = "assets/";</script>

    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>

    <script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>

    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <script src="{{asset('js/app.js')}}"></script>

</body>


</html>
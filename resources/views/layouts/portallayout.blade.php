<!DOCTYPE html>
<html lang="zxx">
    <head>
        <title>
            Portal infraestructura
        </title>
        <meta charset="utf-8">
            <meta content="EndGam Gaming Magazine Template" name="description">
                <meta content="endGam,gGaming, magazine, html" name="keywords">
                    <meta content="width=device-width, initial-scale=1.0" name="viewport">
                        <!-- Favicon -->
                        <link href="../imagenesPortal/puntos-logo.png" rel="shortcut icon"/>
                        <!-- Google Font -->
                        <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
                            <!-- Stylesheets -->
                            <link href="../portalCss/bootstrap.min.css" rel="stylesheet"/>
                            <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet">
                                <link href="../portalCss/slicknav.min.css" rel="stylesheet"/>
                                <link href="../portalCss/owl.carousel.min.css" rel="stylesheet"/>
                                <link href="../portalCss/magnific-popup.css" rel="stylesheet"/>
                                <link href="../portalCss/animate.css" rel="stylesheet"/>
                                <!-- Main Stylesheets -->
                                <link href="../portalCss/style.css" rel="stylesheet"/>
                                <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
                            </link>
                        </link>
                    </meta>
                </meta>
            </meta>
        </meta>
        @laravelPWA
    </head>
    <body>
        <!-- Header section -->
        <header class="header-section animated fadeIn">
            <div class="header-warp">
                <div class="header-social d-flex justify-content-end">
                    <p>
                        Síguenos:
                    </p>
                    <a href="#" style="color: #191919">
                        <i class="fab fa-facebook">
                        </i>
                    </a>
                    <a href="#" style="color: #191919">
                        <i class="fab fa-twitter">
                        </i>
                    </a>
                    <a href="#" style="color: #191919">
                        <i class="fab fa-instagram">
                        </i>
                    </a>
                </div>
                <div class="header-bar-warp d-flex">
                    <!-- site logo -->
                    <a class="site-logo" href="home.html">
                        <img alt="" src="../imagenesPortal/LogoBlanco.png" style="margin-top: -30px;">
                        </img>
                    </a>
                    <nav class="top-nav-area w-100">
                        <div class="user-panel">
                            
                                <a class=" has-icon text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit(); ">
                                    <i class="fas fa-sign-out-alt">
                                    </i>
                                    Cerrar sesión
                                </a>
                                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                           
                        </div>
                        <!-- Menu -->
                        <ul class="main-menu primary-menu">
                            <li>
                                <a href="/">
                                    Inicio
                                </a>
                            </li>
                            <li>
                                <a href="/ListPlataform">
                                    Plataformas
                                </a>
                            </li>
                            <li>
                                <a href="contact.html">
                                    Contacto
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        @yield('content')
        <!-- Header section end -->
        <!-- Hero section -->
        <!-- Hero section end-->
        <!-- Intro section -->
        <!-- Intro section end -->
        <!-- Blog section -->
        <!-- Footer section end -->
        <!--====== Javascripts & Jquery ======-->
        <section class="newsletter-section" style="background: linear-gradient(to right, #005cff 0%, #10069f 100%); ">
            <div class="container">
                <h2>
                    SUSCRÍBETE A NUESTRO BOLETÍN
                </h2>
                <form class="newsletter-form">
                    <input placeholder="Ingrese su correo" type="text">
                        <button class="site-btn ">
                            suscríbete
                            <img alt="#" src="../imagenesPortal/icons/double-arrow.png"/>
                        </button>
                    </input>
                </form>
            </div>
        </section>
        <!-- Newsletter section end -->
        <!-- Footer section -->
        <footer class="footer-section" style="background:#10069f ">
            <div class="container">
                <a class="footer-logo" href="#">
                    <img alt="" src="../imagenesPortal/LogoBlanco.png">
                    </img>
                </a>
                <div class="footer-social d-flex justify-content-center">
                    <a href="#">
                        <i class="fab fa-facebook">
                        </i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter">
                        </i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram">
                        </i>
                    </a>
                </div>
                <div class="copyright">
                    <a href="">
                        Entel
                    </a>
                    2020 @ Todos los derechos reservados
                </div>
            </div>
        </footer>
    </body>
</html>
<script src="../portalJs/jquery-3.2.1.min.js">
</script>
<script src="../portalJs/bootstrap.min.js">
</script>
<script src="../portalJs/jquery.slicknav.min.js">
</script>
<script src="../portalJs/owl.carousel.min.js">
</script>
<script src="../portalJs/jquery.sticky-sidebar.min.js">
</script>
<script src="../portalJs/jquery.magnific-popup.min.js">
</script>
<script src="../portalJs/main.js">
</script>

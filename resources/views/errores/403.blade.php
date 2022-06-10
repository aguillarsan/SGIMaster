
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Work Security</title>

  <!-- General CSS Files -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
    <link href="../layout/css/style.css" rel="stylesheet">
    <link href="../layout/css/components.css" rel="stylesheet">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
   @php
   use Carbon\Carbon;
   @endphp
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>403</h1>
            <h2 style="color: #191919">Sistema Gestión Infraestructura</h2>
            <div class="page-description" style="font-size: 25px;">
            	No cuentas con los permisos para acceder a este modulo.
            </div>
            <div class="page-search">
             
              <div class="mt-3">
                <a href="/modulos" style="font-size: 20px;">Volver al inicio</a>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
             Copyright © {{ Carbon::now()->format('Y')}} 
                    <div class="bullet">
                    </div>
                    Design By
                    <a href="http://www.anidalatam.com/" target="blank__">
                        Anida Consultores
                    </a>
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
</body>
</html>
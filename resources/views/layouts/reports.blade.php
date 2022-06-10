<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <title>
            SGI|Reportes
        </title>
        <!-- General CSS Files -->
        <!-- Desarrollado por Sebastián Aguilar Sanhueza -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../fontaws/css/all.css" rel="stylesheet"/>
        <!-- CSS Libraries -->
        <!-- Template CSS <link rel="stylesheet" href="./css/dropzone.css"    <script src="./js/dropzone.js"></script> -->
        <link href="../inspinia/css/animate.css" rel="stylesheet"/>
        <link href="../layout/css/components.css" rel="stylesheet"/>
        <link href="../css/new.css" rel="stylesheet"/>
        <link href="../css/upload.css" rel="stylesheet"/>
        <meta charset="utf-8" content="{{ csrf_token()}}" name="csrf-token"/>
        <link href="../layout/css/style.css" rel="stylesheet"/>
        <link href="../logosEntel/l-2020.png" rel="shortcut icon"/>
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600;700&display=swap" rel="stylesheet"/>
       
    </head>
 
    <body class="sidebar-mini">
        <div id="app">
             <appreports :usuario='@json(auth()->user())'></appreports>
        </div>
    </body> 
</html>
<!-- Mainly scripts -->
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
<!-- Page Specific JS File -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js">
</script>
<script src="../css/sweetalert2.min.js">
</script>
<script src="{{ asset('js/app.js') }} ">
</script>

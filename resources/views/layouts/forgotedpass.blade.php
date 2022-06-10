<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GTi</title>

    <link href="../inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/estilos.css" rel="stylesheet">
    <link href="../layout/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../layout/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="../layout/css/animate.css" rel="stylesheet">
    <link href="../layout/css/style.css" rel="stylesheet">
    <link href="../layout/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../layout/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="../layout/css/animate.css" rel="stylesheet">

 <link rel="shortcut icon" href="../logosEntel/puntos-logo.png">
  
 @laravelPWA

</head>



    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Rickshaw -->
   


<body class="gray-bg-login fondo"  >

    <main class="py-4">
        <div class="loginColumns  animated fadeInDown" >
          
            <hr/>

            @if(session()->get('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            
            <div class="ibox-content-dark row" style="background-color: rgba(1,1,1,0.2); height: 300px;">

                
                <div class="col-md-6" >
                    <div class="" >
                        @yield('content')
                        <p class="m-t">
                            {{-- <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> --}}
                        </p>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-6 text-white">
                    Copyright Entel ®. Powered by Anida Consultores ®.
                </div>
                <div class="col-md-6 text-right text-white">
                 <small>© 2019</small>
             </div>
         </div>

     </div>

 </main>

</body>
</html>
@extends('layouts.portallayout')
@section('content')
<section class="page-top-section set-bg">
    <div class="page-info">
        <h2 style="color: #191919">
            Noticias
        </h2>
        <div class="site-breadcrumb" style="color: #191919">
            <a href="/portal" style="color: #191919">
                Inicio
            </a>
            /
            <span style="color: #005cff">
                Noticias Sub-Gerencia
            </span>
        </div>
    </div>
</section>
<div class="main-content" style="margin-top: -100px;">
    <div class="wrapper wrapper-content">
        <section class="games-single-page " style="background:white">
            <div class="container" style="max-width: 1400px;">
                <div class="col-lg-12">
                    <div class="row">
                        <div class=" col-lg-8 game-single-content">
                            <div class="gs-meta">
                                {{date("d-m-Y", strtotime($detail->created_at))}} /
                                <a href="" style="color: #005cff">
                                    Noticias
                                </a>
                            </div>
                            <h2 class="gs-title" style="color: #191919">
                                {{$detail->titulo}}
                            </h2>
                            <h4 style="color: #005cff">
                                De que trata
                            </h4>
                            <p>
                                {{$detail->descripcion}}
                            </p>
                            <div id="app">
                                <reaccion :id="'{{$detail->id}}'">
                                </reaccion>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 sidebar game-page-sideber">
                            <div id="">
                                <div class="widget-item">
                                    <div class="testimonials-widget" style="    background-color: rgb(16, 6, 159);">
                                        <h4 class="widget-title">
                                            Testimonios
                                        </h4>
                                        <div class="testim-text">
                                            <p style="color:white">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolo re magna aliqua. Quis ipsum suspend isse ultrices.
                                            </p>
                                            <h6>
                                                <span style="color: #2fcbf1">
                                                    James Smith,
                                                </span>
                                                Supervisor
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
    <script src="{{ asset('js/app.js') }} ">
</script>
@endsection

@extends('layouts.portallayout')
@section('content')

<section class="blog-section spad  wrap d-flex">
    <div class="container " style="margin-top: 100px;">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-7 ">
                <div class="section-title animated fadeIn">
                    <h2 style="color: #191919">
                        Portal Infraestructura
                    </h2>
                </div>
                <ul class="blog-filter">
                    <li class="animated fadeIn ButtonBounce">
                        <a href="#seccion1">
                            Noticias sub-gerencia
                        </a>
                    </li>
                    <li class="animated fadeIn ">
                        <a href="#seccion2">
                            Quienes somos?
                        </a>
                    </li>
                    <li class="animated fadeIn ">
                        <a href="#seccion3">
                            Editorial
                        </a>
                    </li>
                    <li class="animated fadeIn ">
                        <a href="#seccion4">
                           Multimedia
                        </a>
                    </li>
                </ul>
                <!-- Blog item -->
                @foreach($secOne as $one)
                <div class="blog-item" id=seccion1>
                    <div class="blog-thumb animated fadeIn">
                        <img alt="" src="{{$one->imagen}}" style="height: 250px;width: 600px;">
                        </img>
                    </div>
                    <div class="blog-text text-box text-white">
                        <div class="top-meta black">
                           {{date("d-m-Y", strtotime($one->created_at))}} /
                            <a href="" style="color:#005cff">
                                Texto 1
                            </a>
                        </div>
                        <h3 style="color: #191919">
                            {{$one->titulo}}
                        </h3>
                        <p>
                             {{$one->introduccion}}
                        </p>
                        <a class="read-more" href="/details/{{$one->id}}" style="color: #191919">
                            Leer más
                            <img alt="#" src="../imagenesPortal/icons/double-arrow.png"/>
                        </a>
                    </div>
                </div>
                @endforeach
            
               
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 sidebar">
                <div id="">
                    <div class="widget-item">
                        <h4 class="widget-title" style="color: #191919">
                             Colaboradores
                        </h4>
                        <div class="trending-widget">
                            <div class="tw-item">
                                <div class="tw-thumb">
                                    <img alt="#" src="../imagenesPortal/marca/marca5.jpg" style="width: 80px;height: 80px;">
                                    </img>
                                </div>
                                <div class="tw-text">
                                    <div class="tw-meta black">
                                        11.11.18  /
                                        <a href="" style="color: #005cff">
                                            Texto
                                        </a>
                                    </div>
                                    <h5 style="color: #191919">
                                        Descripción
                                    </h5>
                                </div>
                            </div>
                            <div class="tw-item">
                                <div class="tw-thumb">
                                    <img alt="#" src="../imagenesPortal/marca/marca6.jpg" style="width: 80px;height: 80px;">
                                    </img>
                                </div>
                                <div class="tw-text">
                                    <div class="tw-meta black">
                                        11.11.18  /
                                        <a href="" style="color: #005cff">
                                            Texto
                                        </a>
                                    </div>
                                    <h5 style="color: #191919">
                                        Descripción
                                    </h5>
                                </div>
                            </div>
                            <div class="tw-item">
                                <div class="tw-thumb">
                                    <img alt="#" src="../imagenesPortal/marca/marca7.jpg" style="width: 80px;height: 80px;">
                                    </img>
                                </div>
                                <div class="tw-text">
                                    <div class="tw-meta black">
                                        11.11.18  /
                                        <a href="" style="color: #005cff">
                                            Texto
                                        </a>
                                    </div>
                                    <h5 style="color: #191919">
                                        Descripción
                                    </h5>
                                </div>
                            </div>
                            <div class="tw-item">
                                <div class="tw-thumb">
                                    <img alt="#" src="../imagenesPortal/marca/marca8.jpg" style="width: 80px;height: 80px;">
                                    </img>
                                </div>
                                <div class="tw-text">
                                    <div class="tw-meta black">
                                        11.11.18  /
                                        <a href="" style="color: #005cff">
                                            Texto
                                        </a>
                                    </div>
                                    <div class="black">
                                    </div>
                                    <h5 style="color: #191919">
                                        Descripción
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-item">
                        <div class="categories-widget" style="background-color: #10069f; border-radius: 7px;">
                            <h4 class="widget-title">
                                Texto
                            </h4>
                            <ul>
                                <li>
                                    <a href="">
                                        Texto
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Texto
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Texto
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Texto
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Texto
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Texto
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget-item" >
                        <a class="add" href="#">
                            <img alt="" src="../imagenesPortal/add.jpg">
                            </img>
                        </a>
                    </div>
                </div>
            </div>
        </div >
    </div>
</section>

<section >
    <div class="carousel slide" data-ride="carousel" id="carouselExampleCaptions">
        <ol class="carousel-indicators" >
            <li class="active" data-slide-to="0" data-target="#carouselExampleCaptions">
            </li>
            <li data-slide-to="1" data-target="#carouselExampleCaptions">
            </li>
            <li data-slide-to="2" data-target="#carouselExampleCaptions">
            </li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img alt="..." class="d-block w-100" src="../imagenesPortal/slider-01.jpg">
                </img>
            </div>
            <div class="carousel-item">
                <img alt="..." class="d-block w-100" src="../imagenesPortal/slider-02.jpg">
                </img>
            </div>
            <div class="carousel-item">
                <img alt="..." class="d-block w-100" src="../imagenesPortal/slider-03.jpg">
                </img>
            </div>
        </div>
        <a class="carousel-control-prev" data-slide="prev" href="#carouselExampleCaptions" role="button">
            <span aria-hidden="true" class="carousel-control-prev-icon">
            </span>
            <span class="sr-only">
                Previous
            </span>
        </a>
        <a class="carousel-control-next" data-slide="next"  href="#carouselExampleCaptions" role="button">
            <span aria-hidden="true" class="carousel-control-next-icon">
            </span>
            <span class="sr-only" id="seccion3">
                Next
            </span>
        </a>
    </div>
</section>
<!-- Blog section end -->
<section class="intro-section"  style="background-color: #10069f">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="intro-text-box text-box text-white">
                    <div class="top-meta">
                        11.11.18  /
                        <a href="" style="color: #2fcbf1">
                            Texto
                        </a>
                    </div>
                    <h3>
                        Título
                    </h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida....
                    </p>
                    <a class="read-more" href="#">
                        Leer más
                        <img alt="#" src="../imagenesPortal/icons/double-arrow.png"/>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="intro-text-box text-box text-white">
                    <div class="top-meta">
                        11.11.18  /
                        <a href="" style="color: #2fcbf1">
                            Texto
                        </a>
                    </div>
                    <h3>
                        Título
                    </h3>
                    <p>
                        Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum  labore suspendisse ultrices gravida....
                    </p>
                    <a class="read-more" href="#">
                        Leer más
                        <img alt="#" src="../imagenesPortal/icons/double-arrow.png"/>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="intro-text-box text-box text-white">
                    <div class="top-meta">
                        11.11.18  /
                        <a href="" style="color: #2fcbf1">
                            Texto
                        </a>
                    </div>
                    <h3>
                        Título
                    </h3>
                    <p>
                        Sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida ncididunt ut labore ....
                    </p>
                    <a class="read-more" href="#">
                        Leer más
                        <img alt="#" src="../imagenesPortal/icons/double-arrow.png"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Intro section -->
<section class="intro-video-section set-bg d-flex align-items-end "id="seccion4" data-setbg="../imagenesPortal/marca/marca1.jpg">
    <a class="video-play-btn video-popup " href="https://www.youtube.com/watch?v=uFsGy5x_fyQ">
        <img alt="#" src="../imagenesPortal/icons/solid-right-arrow.png">
        </img>
    </a>
    <div class="container">
        <div class="video-text">
            <h2>
                Título
            </h2>
            <p>
                Sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida ncididunt ut labore ....
            </p>
        </div>
    </div>
</section>
<!-- Intro section end -->
<!-- Featured section -->
<section class="featured-section" id="seccion2">
    <div class="featured-bg set-bg animated fadeIn" data-setbg="../imagenesPortal/marca/marca10.jpg">
    </div>
    <div class="featured-box">
        <div class="text-box">
            <div class="top-meta">
                11.11.18 /
                <a href="#" style="color: #005cff">
                    Texto
                </a>
            </div>
            <h3>
                Texto
            </h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquamet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vestibulum posuere porttitor justo id pellentesque. Proin id lacus feugiat, posuere erat sit amet, commodo ipsum. Donec pellentesque vestibulum metus...
            </p>
            <a class="read-more" href="#">
                Leer más
                <img alt="#" src="../imagenesPortal/icons/double-arrow.png"/>
            </a>
        </div>
    </div>
</section>
<!-- Featured section end-->
<!-- Newsletter section -->

@endsection

@extends('layouts.menu')
@section('content')
@php
use Illuminate\Support\Facades\Auth;
$id = Auth::user()->id;


@endphp
<div class="main-content">
    <div class="wrapper wrapper-content">
        <section class="section">
            <div class="section-header box-shadow-new-card">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-6 col-12 " >
                        <div class="card-stats-title" >
                            <h1 class="barlow semi_bold">
                                Dashboard tickets
                            </h1>
                            <br>
                                <div class="dropdown d-inline">
                                    <a class="font-weight-600 dropdown-toggle barlow regular" data-toggle="dropdown" href="#" id="orders-month">
                                        Opciones
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-sm" style="z-index: 1;position:absolute;">
                                        <li class="dropdown-title barlow semi_bold">
                                            Selecione una opcion
                                        </li>
                                        <li>
                                            @if($id == 21)
                                            <a class="barlow regular" href="/ticketExcelObrasCiviles" onclick="carga()">
                                                <i class="fas fa-download">
                                                </i>
                                                Reporte general
                                            </a>
                                            @elseif($id ==14)
                                            <a class="barlow regular" href="/ticketExcelClima" onclick="carga()">
                                                <i class="fas fa-download">
                                                </i>
                                                Reporte general
                                            </a>
                                            @else
                                            <a class="barlow regular" href="/ticketExcel" onclick="carga()">
                                                <i class="fas fa-download fas fa-download">
                                                </i>
                                                Reporte general
                                            </a>
                                            @endif
                                        </li>
                                     
                                    </ul>
                                </div>
                            </br>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 box-shadow-new-card colorchange_blue boxBounce border_white borde_new "  >
                    <a href="/ticketblade/{{0}}" style="color: white; ">
                        <div class="card-icon  azul change_white" style="border-bottom-right-radius: 50% 40%;">
                            <i class="fas fa-columns" style="font-size: 25px;">
                            </i>
                        </div>
                        <div class="card-wrap" >
                            <div class="card-header">
                                <h4 class="barlow bold black_e" style="color: #191919">
                                    EN ESPERA
                                </h4>
                            </div>
                            <div class="card-body barlow semi_bold" style="font-size: 35px;">
                                {{$backlog}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 box-shadow-new-card boxBounce colorchange_green border_white borde_new">
                    <a href="/ticketblade/{{0}}" style="color: white">
                        <div class="card-icon verde" style="border-bottom-right-radius: 50% 40%;">
                            <i class="fas fa-edit" style="font-size: 23px;">
                            </i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 class="barlow bold black_e" style="color: #191919">
                                    EN CURSO
                                </h4>
                            </div>
                            <div class="card-body barlow semi_bold" style="font-size: 35px;">
                                {{$curso}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 box-shadow-new-card boxBounce color_change_blue_va border_white borde_new" >
                    <a href="/ticketblade/{{0}}" style="color: white">
                        <div class="card-icon  blue" style="border-bottom-right-radius: 50% 40%;">
                            <i class="fas fa-check" style="font-size: 23px;">
                            </i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 class="barlow bold black_e" style="color: #191919">
                                    VALIDACIÓN
                                </h4>
                            </div>
                            <div class="card-body barlow semi_bold" style="font-size: 35px;">
                                {{$validacion}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 box-shadow-new-card boxBounce color_change_pink border_white borde_new">
                    <a href="/ticketblade/{{0}}" style="color: white; ">
                        <div class="card-icon  rosa" style="border-bottom-right-radius: 50% 40%;">
                            <i class="fab fa-font-awesome-alt" style="font-size: 35px;">
                            </i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 class="barlow bold" style="color: #191919">
                                    FINALIZADAS
                                </h4>
                            </div>
                            <div class="card-body barlow semi_bold" style="font-size: 35px;">
                                {{$finalizada}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:-35px !important;" >
            @include('dashboard.crmNorte')
                    @include('dashboard.crmCentroNorte')
                    @include('dashboard.crmMetropolitano')
                    @include('dashboard.crmCentroSur')
                    @include('dashboard.crmSur')
                    @include('dashboard.crmAustral')
        </div>
     
       
    </div>
</div>
@endsection

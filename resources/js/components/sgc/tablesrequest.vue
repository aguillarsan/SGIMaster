<template>
    <div>
        <div class="main-content" id="tablesolicitud">
            <div class="wrapper wrapper-content">
                <section class="section">
                    <div class="section-header shadow-box-ag">
                        <div class="row">
                            <div class="col-lg-10 col-md-6 col-sm-6 col-12 ">
                                <div class="card-stats-title">
                                    <h1 class="barlow semi_bold">
                                        Gestión de costos {{NameModulo}}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO CONTROLLER-->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if=" opcion ==  50">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce "
                            v-bind:style=" modulo==50 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(50)">
                                <div class="card-icon shadow-box-ag " style="background-color: #f8ac59"
                                    v-bind:style=" modulo==50 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-history" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==50 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==50 ? 'color: white; ' : '' ">
                                            HISTORIAL DE SOLICITUDES SUBGERENCIA
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==50 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalHistorialController}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO ADMINISTRADOR -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if=" opcion == 27">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce "
                            v-bind:style=" modulo==23 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(23)">
                                <div class="card-icon shadow-box-ag " style="background-color: #f8ac59"
                                    v-bind:style=" modulo==23 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-history" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==23 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==23 ? 'color: white; ' : '' ">
                                            HISTORIAL DE SOLICITUDES SUBGERENCIA
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==23 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalCreada.historial}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn "
                            v-bind:style=" modulo==19 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(19)">
                                <div class="card-icon shadow-box-ag verde"
                                    v-bind:style=" modulo==19 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-check" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==19 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==19 ? 'color: white; ' : '' ">
                                            POR APROBAR VALIDADOR
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==19 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalCreada.total_validador}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==21 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(21)">
                                <div class="card-icon shadow-box-ag azul"
                                    v-bind:style=" modulo==21 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-user" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==21 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==21 ? 'color: white; ' : '' ">
                                            POR APROBAR JEFE ÁREA
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==21 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalCreada.total_jefe_area}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==43 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(43)">
                                <div class="card-icon shadow-box-ag blue"
                                    v-bind:style=" modulo==43 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-list" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==43 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==43 ? 'color: white; ' : '' ">
                                            APROBAR CONTROL & INGRESO DE CESTA
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==43 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalCreada.control_aprobar_ingreso_cesta}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO MICRM -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if="opcion == 42">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==42 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <div class="card-icon shadow-box-ag azul"
                                v-bind:style=" modulo==42 ? 'background-color: white; ' : '' ">
                                <i class="fas fa-globe-americas" style="font-size: 28px;color: white"
                                    v-bind:style=" modulo==42 ? 'color: #6c757d; ' : '' ">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header barlow bold">
                                    <h4 style="font-size: ;" v-bind:style=" modulo==42 ? 'color: white; ' : '' ">
                                        TOTAL MI CRM
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                    v-bind:style=" modulo==42 ? 'color: white; ' : '' ">
                                    <div class="spinner-border text-primary" role="status"
                                        style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                        v-if="load_data == 0">
                                    </div>
                                    {{total_crm}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO INGENIERO O&M -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if="opcion == 1 || modulo_aprobar ==43">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==1 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(1)">
                                <div class="card-icon shadow-box-ag azul"
                                    v-bind:style=" modulo==1 ? 'background-color: white; ' : '' ">
                                    <i class="far fa-list-alt" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==1 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==1 ? 'color: white; ' : '' ">
                                            SOLICITUDES CREADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==1 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{total_ing_oym.creadas}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==2 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(2)">
                                <div class="card-icon shadow-box-ag verde"
                                    v-bind:style=" modulo==2 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-check" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==2 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==2 ? 'color: white; ' : '' ">
                                            POR APROBAR
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==2 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{total_ing_oym.aprobar}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==3 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #dc3545"
                                v-on:click.prevent="getsolicitudestable(3)">
                                <div class="card-icon shadow-box-ag " style="background-color: #dc3545"
                                    v-bind:style=" modulo==3 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-times-circle" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==3 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==3 ? 'color: white; ' : '' ">
                                            RECHAZADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==3 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{total_ing_oym.rechazadas}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==4 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(4)">
                                <div class="card-icon shadow-box-ag " style="background-color: grey"
                                    v-bind:style=" modulo==4 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-file-upload" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==4 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==4 ? 'color: white; ' : '' ">
                                            INFORME FINAL / GUIA DESPACHO
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==4 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{total_ing_oym.informe_final}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                  <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO OBRAS CIVILES -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if="rol == 32">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==60 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(60)">
                                <div class="card-icon shadow-box-ag azul"
                                    v-bind:style=" modulo==60 ? 'background-color: white; ' : '' ">
                                    <i class="far fa-list-alt" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==60 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 v-bind:style=" modulo==60 ? 'color: white; ' : '' ">
                                            SOLICITUDES CREADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==60 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{total_oo_cc.creadas}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                  
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==3 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #dc3545"
                                v-on:click.prevent="getsolicitudestable(3)">
                                <div class="card-icon shadow-box-ag " style="background-color: #dc3545"
                                    v-bind:style=" modulo==3 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-times-circle" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==3 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4  v-bind:style=" modulo==3 ? 'color: white; ' : '' ">
                                            RECHAZADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==3 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{total_oo_cc.rechazadas}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==4 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(4)">
                                <div class="card-icon shadow-box-ag " style="background-color: grey"
                                    v-bind:style=" modulo==4 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-file-upload" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==4 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 v-bind:style=" modulo==4 ? 'color: white; ' : '' ">
                                            INFORME FINAL / GUIA DESPACHO
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==4 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{total_oo_cc.informe_final}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO ROL CONTROL -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if=" opcion == 5">
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12" style="max-width:20% !important;flex: 0 0 20%">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==5 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(5)">
                                <div class="card-icon shadow-box-ag azul"
                                    v-bind:style=" modulo==5 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-tasks" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==5 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4  v-bind:style=" modulo==5 ? 'color: white; ' : '' ">
                                            EN CONTROL
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==5 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalcontrol.total_control}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12" style="max-width:20% !important;flex: 0 0 20%">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==6 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(6)">
                                <div class="card-icon shadow-box-ag verde"
                                    v-bind:style=" modulo==6 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-check" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==6 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4  v-bind:style=" modulo==6 ? 'color: white; ' : '' ">
                                            POR APROBAR
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==6 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalcontrol.aprobar}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12" style="max-width:20% !important;flex: 0 0 20%">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==7 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #dc3545"
                                v-on:click.prevent="getsolicitudestable(7)">
                                <div class="card-icon shadow-box-ag " style="background-color: #dc3545"
                                    v-bind:style=" modulo==7 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-times-circle" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==7 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4  v-bind:style=" modulo==7 ? 'color: white; ' : '' ">
                                            RECHAZADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==7 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalcontrol.rechazadas}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12" style="max-width:20% !important;flex: 0 0 20%">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==8 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" @click.prevent="getsolicitudestable(8)" href=""
                                style="color: #2d88ff">
                                <div class="card-icon shadow-box-ag " style="background-color: grey"
                                    v-bind:style=" modulo==8 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-toggle-on" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==8 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4  v-bind:style=" modulo==8 ? 'color: white; ' : '' ">
                                             ACTIVAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==8 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalcontrol.activas}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12" style="max-width:20% !important;flex: 0 0 20%">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==61 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" @click.prevent="getsolicitudestable(61)" href=""
                                style="color: #2d88ff">
                                <div class="card-icon shadow-box-ag " style="background-color: rgba(255, 128, 3, 0.77)"
                                    v-bind:style=" modulo==61 ? 'background-color: white; ' : '' ">
                                   
                                    <i class="fas fa-clipboard-check" style="font-size: 28px;color: white"
                                    v-bind:style=" modulo==61 ? 'color: #6c757d; ' : '' "></i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4  v-bind:style=" modulo==61 ? 'color: white; ' : '' ">
                                             EN RECLASIFICACIÓN
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==61 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalcontrol.reclasificacion}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO ÁREA INGENIERIA -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if="opcion == 9">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==9 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(9)">
                                <div class="card-icon shadow-box-ag azul"
                                    v-bind:style=" modulo==9 ? 'background-color: white; ' : '' ">
                                    <i class="far fa-list-alt" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==9 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==9 ? 'color: white; ' : '' ">
                                            SOLICITUDES CREADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==9 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{Totales_ingeniero.creadas}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==10 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #dc3545"
                                v-on:click.prevent="getsolicitudestable(10)">
                                <div class="card-icon shadow-box-ag " style="background-color: #dc3545"
                                    v-bind:style=" modulo==10 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-times-circle" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==10 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==10 ? 'color: white; ' : '' ">
                                            SOLICITUDES RECHAZADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==10 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{Totales_ingeniero.rechazadas}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn"
                            style="background-color: rgb(215, 215, 215,0.15);"
                            v-bind:style=" modulo==11 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <div class="card-icon shadow-box-ag verde" style=""
                                v-bind:style=" modulo==11 ? 'background-color: white; ' : '' ">
                                <i class="fas fa-toggle-on" style="font-size: 28px;color: white"
                                    v-bind:style=" modulo==11 ? 'color: #6c757d; ' : '' ">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header">
                                    <h4 v-bind:style=" modulo==11 ? 'color: white; ' : '' ">
                                        SOLICITUDES ACTIVAS
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn barlow semi_bold" style="font-size:35px;"
                                    v-bind:style=" modulo==11 ? 'color: white; ' : '' ">
                                    <div class="spinner-border text-primary" role="status"
                                        style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                        v-if="load_data == 0">
                                    </div>
                                    {{Totales_ingeniero.activas}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==12 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a href="" style="color: #2d88ff" v-on:click.prevent="getsolicitudestable(12)">
                                <div class="card-icon shadow-box-ag " style="background-color: grey"
                                    v-bind:style=" modulo==12 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-users" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==12 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==12 ? 'color: white; ' : '' ">
                                            PROYECTOS VINCULADOS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==12 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{Totales_ingeniero.proyectos}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO CONTROL  INGENIERIA -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if=" opcion==13">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce "
                            v-bind:style=" modulo==13 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(13)">
                                <div class="card-icon shadow-box-ag verde" style=""
                                    v-bind:style=" modulo==13 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-toggle-on" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==13 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 v-bind:style=" modulo==13 ? 'color: white; ' : '' ">
                                            SOLICITUDES ACTIVAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==13 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{total_control_ingenieria.activas}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce"
                            v-bind:style=" modulo==16 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(16)">
                                <div class="card-icon shadow-box-ag " style="background-color: #f8ac59;"
                                    v-bind:style=" modulo==16 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-check" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==16 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 v-bind:style=" modulo==16 ? 'color: white; ' : '' ">
                                            POR APROBAR PMO
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==16 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{total_control_ingenieria.aprobar}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn"
                            style="background-color: rgb(215, 215, 215,0.15);">
                            <div class="card-icon shadow-box-ag azul" style="opacity: .4;"
                                v-bind:style=" modulo==5 ? 'background-color: white; ' : '' ">
                                <i class="fas fa-tasks" style="font-size: 28px;color: white;"
                                    v-bind:style=" modulo==5 ? 'color: #6c757d; ' : '' ">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header barlow bold">
                                    <h4 style="font-size: ;" v-bind:style=" modulo==5 ? 'color: white; ' : '' ">
                                        SOLICITUDES EN CONTROL
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                    v-bind:style=" modulo==5 ? 'color: white; ' : '' ">
                                    <div class="spinner-border text-primary" role="status"
                                        style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                        v-if="load_data == 0">
                                    </div>
                                    {{total_control_ingenieria.total_control}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce "
                            v-bind:style=" modulo==15 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(15)">
                                <div class="card-icon shadow-box-ag rosa"
                                    v-bind:style=" modulo==15 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-toggle-off" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==15 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==15 ? 'color: white; ' : '' ">
                                            SOLICITUDES INACTIVAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==15 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{total_control_ingenieria.inactivas_pmo}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO VALIDADOR OYM -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if=" opcion==19">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce"
                            v-bind:style=" modulo==19 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(19)">
                                <div class="card-icon shadow-box-ag verde"
                                    v-bind:style=" modulo==19 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-check" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==19 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==19 ? 'color: white; ' : '' ">
                                            SOLICITUDES POR APROBAR
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==19 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalValidador.aprobar}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==20 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(20)">
                                <div class="card-icon shadow-box-ag " style="background-color: #dc3545"
                                    v-bind:style=" modulo==20 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-times-circle" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==20 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==20 ? 'color: white; ' : '' ">
                                            SOLICITUDES RECHAZADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==20 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalValidador.rechazadas}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==8 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(8)">
                                <div class="card-icon shadow-box-ag " style="background-color: grey"
                                    v-bind:style=" modulo==8 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-toggle-on" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==8 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==8 ? 'color: white; ' : '' ">
                                            SOLICITUDES ACTIVAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==8 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalValidador.activas}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO JEFE ÁREA OYM -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if=" opcion==21">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce"
                            v-bind:style=" modulo==21 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(21)">
                                <div class="card-icon shadow-box-ag verde"
                                    v-bind:style=" modulo==21 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-check" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==21 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==21 ? 'color: white; ' : '' ">
                                            SOLICITUDES POR APROBAR
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==21 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalJefeArea.aprobar}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==22 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(22)">
                                <div class="card-icon shadow-box-ag " style="background-color: #dc3545"
                                    v-bind:style=" modulo==22 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-times-circle" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==22 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==222? 'color: white; ' : '' ">
                                            SOLICITUDES RECHAZADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==22 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalJefeArea.reachazadas}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce "
                            v-bind:style=" modulo==23 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(23)">
                                <div class="card-icon shadow-box-ag " style="background-color: #f8ac59"
                                    v-bind:style=" modulo==23 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-history" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==23 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==23 ? 'color: white; ' : '' ">
                                            HISTORIAL OYM
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==23 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalJefeArea.historial}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce "
                            v-bind:style=" modulo==24 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #2d88ff"
                                v-on:click.prevent="getsolicitudestable(24)">
                                <div class="card-icon shadow-box-ag " style="background-color: grey"
                                    v-bind:style=" modulo==24 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-toggle-off" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==24 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==24 ? 'color: white; ' : '' ">
                                            SOLICITUDES INACTIVAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==24 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalJefeArea.inactivas}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO HISTORIAL OYM -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if="opcion==25">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce "
                            v-bind:style=" modulo==25 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a href="" style="color: #2d88ff" v-on:click.prevent="getsolicitudestable(25)">
                                <div class="card-icon shadow-box-ag " style="background-color: #f8ac59"
                                    v-bind:style=" modulo==25 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-history" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==25 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==25 ? 'color: white; ' : '' ">
                                            HISTORIAL OYM
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==25 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalHistorialOym}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO HISTORIAL INGENIERIA -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if="opcion==26">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce "
                            v-bind:style=" modulo==26 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a href="" style="color: #2d88ff" v-on:click.prevent="getsolicitudestable(26)">
                                <div class="card-icon shadow-box-ag " style="background-color: #f8ac59"
                                    v-bind:style=" modulo==26 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-history" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==26 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==26 ? 'color: white; ' : '' ">
                                            HISTORIAL INGENIERIA
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==26 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{totalHistorialIng}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO PMO INGENIERIA -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if=" opcion==16">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce "
                            v-bind:style=" modulo==16 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="getsolicitudestable(16)" @click.prevent="set_load()" href=""
                                style="color: #2d88ff">
                                <div class="card-icon shadow-box-ag verde" style=""
                                    v-bind:style=" modulo==16 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-check" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==16 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==16 ? 'color: white; ' : '' ">
                                            SOLICITUDES POR APROBAR
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==16 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{total_Pmo.aprobar}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==17 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="set_load()" href="" style="color: #dc3545"
                                v-on:click.prevent="getsolicitudestable(17)">
                                <div class="card-icon shadow-box-ag " style="background-color: #dc3545"
                                    v-bind:style=" modulo==17 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-times-circle" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==17 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap barlow bold ">
                                    <div class="card-header">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==17 ? 'color: white; ' : '' ">
                                            SOLICITUDES RECHAZADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==17 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{total_Pmo.rechazada}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce "
                            v-bind:style=" modulo==18 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="getsolicitudestable(18)" @click.prevent="set_load()" href=""
                                style="color: #2d88ff">
                                <div class="card-icon shadow-box-ag verde" style=""
                                    v-bind:style=" modulo==18 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-toggle-on" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==18 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==18 ? 'color: white; ' : '' ">
                                            SOLICITUDES ACTIVAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==18 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{total_Pmo.activas}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce "
                            v-bind:style=" modulo==44 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a @click="getsolicitudestable(44)" @click.prevent="set_load()" href=""
                                style="color: #2d88ff">
                                <div class="card-icon shadow-box-ag verde" style=""
                                    v-bind:style=" modulo==44 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-check" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==44 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==44 ? 'color: white; ' : '' ">
                                            SOLICITUDES APROBADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==44 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 2.5rem;height: 2.5rem;color: #007bff!important;"
                                            v-if="load_data == 0">
                                        </div>
                                        {{total_aprobadas_pmo}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO ELECTRICO OYM-->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if=" opcion == 36">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==36 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a href="" style="color: #2d88ff" v-on:click.prevent="getsolicitudestable(36)">
                                <div class="card-icon shadow-box-ag azul"
                                    v-bind:style=" modulo==36 ? 'background-color: white; ' : '' ">
                                    <i class="far fa-list-alt" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==36 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap barlow bold">
                                    <div class="card-header">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==36 ? 'color: white; ' : '' ">
                                            SOLICITUDES CREADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==36 ? 'color: white; ' : '' ">
                                        {{total_electrico.creada}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==37 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a href="" style="color: #dc3545" v-on:click.prevent="getsolicitudestable(37)">
                                <div class="card-icon shadow-box-ag " style="background-color: #dc3545"
                                    v-bind:style=" modulo==37 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-times-circle" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==37 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==37 ? 'color: white; ' : '' ">
                                            RECHAZADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==37 ? 'color: white; ' : '' ">
                                        {{total_electrico.rechazada}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="" style="color: #2d88ff" v-on:click.prevent="getsolicitudestable(38)">
                            <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                                v-bind:style=" modulo==38 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                                <div class="card-icon shadow-box-ag verde"
                                    v-bind:style=" modulo==38 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-check" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==38 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==38 ? 'color: white; ' : '' ">
                                            POR APROBAR
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==38 ? 'color: white; ' : '' ">
                                        {{total_electrico.aprobar}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLERO ZONAL OYM-->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if=" opcion == 39">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==39 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a href="" style="color: #2d88ff" v-on:click.prevent="getsolicitudestable(39)">
                                <div class="card-icon shadow-box-ag azul"
                                    v-bind:style=" modulo==39 ? 'background-color: white; ' : '' ">
                                    <i class="far fa-list-alt" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==39 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==39 ? 'color: white; ' : '' ">
                                            SOLICITUDES CREADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==39 ? 'color: white; ' : '' ">
                                        {{total_zonal.creada}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==40 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <a href="" style="color: #dc3545" v-on:click.prevent="getsolicitudestable(40)">
                                <div class="card-icon shadow-box-ag " style="background-color: #dc3545"
                                    v-bind:style=" modulo==40 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-times-circle" style="font-size: 28px;color: white"
                                        v-bind:style=" modulo==40 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==40 ? 'color: white; ' : '' ">
                                            RECHAZADAS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;"
                                        v-bind:style=" modulo==40 ? 'color: white; ' : '' ">
                                        {{total_zonal.rechazada}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLA DATA SOLICITUDES -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if="modulo != 12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-lg-12">
                                    <h4 class="barlow semi_bold" style="color: rgb(102, 102, 102)">
                                        {{NameTable}}
                                    </h4>
                                    <div class="dropdown d-inline">
                                        <a class="font-weight-600 dropdown-toggle barlow bold" data-toggle="dropdown"
                                            href="#" id="orders-month">
                                            Opciones
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-sm">
                                            <li class="dropdown-title barlow semi_bold">
                                                Selecione una opción
                                            </li>
                                            <li v-if="rol == 12">
                                                <a :href="`/SgcIngOymExcelWithFilter?idsolicitud=${this.idsolicitud}&ework=${this.ework}&cotizacion=${this.cotizacion}&boleta=${this.Nroboleta}&ocCesta=${this.ocCesta}&sitio=${this.sitio}&proveedor=${this.proveedor}`"
                                                    class="dropdown-item barlow regular">
                                                    <i class="fas fa-download">
                                                    </i>
                                                    Descargar reporte
                                                </a>
                                            </li>
                                            <li
                                                v-if="rol == 8 && modulo == 25 || rol == 1 && modulo == 25 || rol == 1 && modulo == 23 ||rol == 8 && modulo == 25 || rol == 23 || rol == 16">
                                                <a :href="`/SgcSolicitudFilterExcelAll?idsolicitud=${this.idsolicitud}&ework=${this.ework}&cotizacion=${this.cotizacion}&boleta=${this.Nroboleta}&ocCesta=${this.ocCesta}&sitio=${this.sitio}&proveedor=${this.proveedor}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`"
                                                    class="dropdown-item barlow regular">
                                                    <i class="fas fa-download">
                                                    </i>
                                                    Descargar reporte
                                                </a>
                                            </li>
                                            <li v-if="rol == 10 && modulo == 9 || rol == 9 && modulo ==9">
                                                <a :href="`/SgcIngIngExcelWithFilter?idsolicitud=${this.idsolicitud}&ework=${this.ework}&cotizacion=${this.cotizacion}&boleta=${this.Nroboleta}&ocCesta=${this.ocCesta}&sitio=${this.sitio}&proveedor=${this.proveedor}`"
                                                    class="dropdown-item barlow regular">
                                                    <i class="fas fa-download">
                                                    </i>
                                                    Descargar reporte
                                                </a>
                                            </li>
                                            <li v-if="modulo == 13 || modulo == 16 || modulo == 26 ">
                                                <a :href="`/SgcPmoControlIngExcelWithFilter?idsolicitud=${this.idsolicitud}&ework=${this.ework}&cotizacion=${this.cotizacion}&boleta=${this.Nroboleta}&ocCesta=${this.ocCesta}&sitio=${this.sitio}&proveedor=${this.proveedor}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`"
                                                    class="dropdown-item barlow regular">
                                                    <i class="fas fa-download">
                                                    </i>
                                                    Descargar reporte
                                                </a>
                                            </li>
                                            <li v-if="donwload_excel == 1">
                                                <a class="dropdown-item barlow regular"
                                                    href="/planilla/Planilla_Carga_Masiva_Datos_SGC.xlsx"
                                                    target="blank_">
                                                    <i class="fas fa-download">
                                                    </i>
                                                    Planilla carga masiva
                                                </a>
                                            </li>
                                            <li v-if="upload_excel == 1">
                                                <a @click.prevent="ShowModalUpload" class="dropdown-item barlow regular"
                                                    href="#">
                                                    <i class="fas fa-upload">
                                                    </i>
                                                    Realizar carga masiva
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive table project-list">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="barlow bold" style="width: 80px;">
                                                    #
                                                </th>
                                                <th class="barlow bold" style="width: 150px;">
                                                    Sitio
                                                </th>
                                                <th class="barlow bold"
                                                    v-if="modulo == 2 || modulo == 5 || modulo == 6 || modulo == 13 || modulo == 16 || modulo== 18 || modulo == 17 || modulo == 19 || modulo == 20 || modulo == 8 || modulo == 21 || modulo == 23 || modulo == 25 || modulo == 26 || modulo == 15  || modulo == 42">
                                                    Solicitante
                                                </th>
                                                <th class="barlow bold" style="max-width: 80px;">
                                                    Proveedor
                                                </th>
                                                <th class="barlow bold" v-if="modulo == 21">
                                                    Descripción
                                                </th>
                                                <th class="barlow bold" v-if="modulo == 21">
                                                    Nro° ticket
                                                </th>
                                                <th class="barlow bold">
                                                    Costos
                                                </th>
                                                <th class="barlow bold" v-if="modulo == 21">
                                                    Tipo boleta
                                                </th>
                                                <th class="barlow bold" v-if="modulo == 22">
                                                    Bitácora
                                                </th>
                                                <th class="barlow bold" style="width: 50px;" v-if="modulo != 21">
                                                    Cesta/Oc
                                                </th>
                                                <th class="barlow bold" style="width: 50px;"
                                                    v-if="modulo == 5 || modulo == 13 || modulo== 15 || modulo== 16">
                                                    Boleta
                                                </th>
                                                <th class="barlow bold" v-if="modulo != 21">
                                                    N°ework
                                                </th>
                                                <th class="barlow bold"
                                                    v-if="modulo == 1|| modulo == 2 || modulo == 3 || modulo == 4 || modulo == 19 || modulo == 20 || modulo == 8   || modulo == 5 || modulo == 6 || modulo == 7 || modulo == 25">
                                                    N°cotización
                                                </th>
                                                <th class="barlow bold">
                                                    Estado
                                                </th>
                                                <th class="barlow bold" v-if="modulo == 21 || modulo == 22">
                                                    Opciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <th>
                                                <input @keyup.prevent="GetSolicitudes(modulo)" class="form-control"
                                                    name="" style="width: 80px; border-color:#6c757d;" type="text"
                                                    v-model="idsolicitud">
                                                </input>
                                            </th>
                                            <th>
                                                <input @keyup.prevent="GetSitios(modulo)" class="form-control"
                                                    id="input_search_site_table" name=""
                                                    style="width: 150px;border-color:#6c757d;" type="text"
                                                    v-model="sitio">
                                                </input>
                                            </th>
                                            <th
                                                v-if="modulo == 2 || modulo == 5 || modulo == 6|| modulo == 13 || modulo == 16 || modulo == 18 || modulo == 17 || modulo == 19 || modulo == 20 || modulo == 8 || modulo == 21 || modulo == 23 || modulo == 25 || modulo == 26 || modulo == 15 || modulo == 42">
                                                <input @keyup.prevent="SearchUser" class="form-control"
                                                    id="user_search_input" name="" style="border-color:#6c757d;"
                                                    type="text" v-model="user_text">
                                                <div class="s_l_p_t" id="list_users_search_table"
                                                    style="display: none;">
                                                    <div :style="'width:'+input_width+'px'+';'" class="s_l_m">
                                                        <div class="dropdown-item " v-for="user in users_list">
                                                            <a @click="set_load()" @click.prevent="SetUser(user)"
                                                                href="#">
                                                                {{user.name}} {{user.apellido}}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="sp_user_name" style="display:none">
                                                    <span class="badge s_p_e">
                                                        {{user_select}}
                                                        <a @click="set_load()" @click.prevent="cleanUserSite" href="">
                                                            <i class="fas fa-times-circle i_con_white boxBounce">
                                                            </i>
                                                        </a>
                                                    </span>
                                                </div>
                                                </input>
                                            </th>
                                            <th style="max-width: 80px;">
                                                <input @keyup.prevent="sendData(modulo)" class="form-control" name=""
                                                    style="width: ;border-color:#6c757d;" type="text"
                                                    v-model="proveedor">
                                                </input>
                                            </th>
                                            <th v-if="modulo == 21">
                                            </th>
                                            <th v-if="modulo == 21">
                                            </th>
                                            <th v-if="modulo == 22">
                                            </th>
                                            <th>
                                            </th>
                                            <th v-if="modulo != 21">
                                                <input @keyup.prevent="GetSolicitudes(modulo)" class="form-control"
                                                    name="" style="width: 80px;border-color:#6c757d; " type="text"
                                                    v-model="ocCesta">
                                                </input>
                                            </th>
                                            <th
                                                v-if="modulo== 5 || modulo== 13 || modulo== 15 || modulo== 16 || modulo== 21">
                                                <input @keyup.prevent="GetSolicitudes(modulo)" class="form-control"
                                                    name="" style="width: ;border-color:#6c757d;" type="text"
                                                    v-model="Nroboleta">
                                                </input>
                                            </th>
                                            <th v-if="modulo != 21">
                                                <input @keyup.prevent="GetSolicitudes(modulo)" class="form-control"
                                                    name="" style="width:100px; border-color:#6c757d;" type="text"
                                                    v-model="ework">
                                                </input>
                                            </th>
                                            <th
                                                v-if="modulo == 1|| modulo == 2 || modulo == 3 || modulo == 4 || modulo == 19 || modulo == 20 || modulo == 8   || modulo == 5 || modulo == 6 || modulo == 7 || modulo == 25">
                                                <input @keyup.prevent="GetSolicitudes(modulo)" class="form-control"
                                                    name="" style="width:100px; border-color:#6c757d;" type="text"
                                                    v-model="cotizacion">
                                                </input>
                                            </th>
                                            <th>
                                                <div class="form-inline">
                                                    <!-- ----------------------------------------------------------------- -->
                                                    <!-- ----------------------------------------------------------------- -->
                                                    <!-- ----------------------------------------------------------------- -->
                                                    <select @change.prevent="setProcesoSGc(modulo)"
                                                        class="form-control select barlow regular" id="selectProceso"
                                                        style="width: 130px;border-color:#6c757d;" v-model="proceso_id">
                                                        <option v-bind:value="proceso.id" v-for="proceso in procesos">
                                                            {{proceso.descripcion}}
                                                        </option>
                                                    </select>
                                                    <span class="badge " id="ProcesoName"
                                                        style="background-color:#015dff;color:white;border-radius:3px;display: none">
                                                        {{SelectProceso}}
                                                        <a @click="set_load()" @click.prevent="setProcesoSGc(modulo)"
                                                            href="" style="color:white ">
                                                            <i class="fas fa-times-circle">
                                                            </i>
                                                        </a>
                                                    </span>
                                                    <!-- ----------------------------------------------------------------- -->
                                                    <!-- ----------------------------------------------------------------- -->
                                                    <!-- ----------------------------------------------------------------- -->
                                                    <select @change.prevent="setSubprocesoSGc(modulo)"
                                                        class="form-control select barlow regular" id="selectSubproceso"
                                                        style="width: 130px;margin-left: 5px;border-color:#6c757d;"
                                                        v-model="subproceso_id">
                                                        <option v-bind:value="subproceso.id"
                                                            v-for="subproceso in subprocesos">
                                                            {{subproceso.subestado}}
                                                        </option>
                                                    </select>
                                                    <span class="badge " id="SubprocesoName"
                                                        style="background-color:#015dff;color:white;border-radius:3px;display: none;margin-left: 5px;">
                                                        {{Selectsubproceso}}
                                                        <a @click="set_load()" @click.prevent="setSubprocesoSGc(modulo)"
                                                            href="" style="color:white ">
                                                            <i class="fas fa-times-circle">
                                                            </i>
                                                        </a>
                                                    </span>
                                                    <!-- ----------------------------------------------------------------- -->
                                                    <!-- ----------------------------------------------------------------- -->
                                                    <!-- ----------------------------------------------------------------- -->
                                                </div>
                                            </th>
                                        </tr>
                                        <tbody v-if="solicitudes.total!= 0 && load_data == 1">
                                            <tr style="height: 200px;" v-for="solicitud in solicitudes.data">
                                                <td>
                                                    <div v-if="solicitud.solicitud_duplicada_id != null">
                                                        <div class="col-md-3 col-sm-3 col-12 barlow regular"
                                                            style="margin-top: 10px;">
                                                            <router-link
                                                                :to="{ path:`/show/`+solicitud.id, params: {id: solicitud.id}}"
                                                                v-slot="{ href, route, navigate, isActive, isExactActive }">
                                                                <a :href="href" target="_blank">
                                                                    <span class="badge boxBounce barlow regular"
                                                                        style="background-color: #1d548a;color: white;border-radius: 5px;font-size: 15px">
                                                                        {{solicitud.id}}
                                                                    </span>
                                                                </a>
                                                            </router-link>
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-12 barlow regular"
                                                            style="margin-top: 20px;">
                                                            <router-link
                                                                :to="{ path:`/show/`+solicitud.solicitud_duplicada_id, params: {id: solicitud.solicitud_duplicada_id}}"
                                                                v-slot="{ href, route, navigate, isActive, isExactActive }">
                                                                <a :href="href" target="_blank">
                                                                    <span class="badge boxBounce barlow regular"
                                                                        style="background-color: rgb(248, 172, 89);color: white;border-radius: 5px;font-size: 15px">
                                                                        {{solicitud.solicitud_duplicada_id}}
                                                                    </span>
                                                                </a>
                                                            </router-link>
                                                        </div>
                                                    </div>
                                                    <div v-if="solicitud.solicitud_duplicada_id == null">
                                                        <div class="col-md-3 col-sm-3 col-12 barlow regular">
                                                            <router-link
                                                                :to="{ path:`/show/`+solicitud.id, params: {id: solicitud.id}}"
                                                                v-slot="{ href, route, navigate, isActive, isExactActive }">
                                                                <a :href="href" target="_blank">
                                                                    <span class="badge boxBounce barlow regular"
                                                                        style="background-color: #1d548a;color: white;border-radius: 5px;font-size: 15px">
                                                                        {{solicitud.id}}
                                                                    </span>
                                                                </a>
                                                            </router-link>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="" style="font-size: 12px;">
                                                    <div class="col-md-12 col-sm-12 col-12 barlow semi_bold"
                                                        v-if="solicitud.site_id != null">
                                                        <div style="font-size: 10px;">
                                                            <span class="badge "
                                                                style="background-color: rgb(0, 92, 255);color: white;border-radius: 5px">
                                                                {{solicitud.site?solicitud.site.nem_site:''}}
                                                                {{solicitud.site?solicitud.site.nombre:'' }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-12 barlow semi_bold"
                                                        v-if="solicitud.temp_sgc_pop_id != null">
                                                        <div style="font-size: 10px;">
                                                            <span class="badge "
                                                                style="background-color: rgb(0, 92, 255);color: white;border-radius: 5px">
                                                                {{solicitud.temp_sgc_pop ?
                                                                solicitud.temp_sgc_pop.nem_movil :''}}
                                                                {{solicitud.temp_sgc_pop ?
                                                                solicitud.temp_sgc_pop.nombre:''}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div style="margin-top:10px;"
                                                        v-if="solicitud.area_creadora_id == null && solicitud.tipo_trabajo_id != null && solicitud.solicitud_duplicada_id != null">
                                                        <div class="col-md-3 col-sm-3 col-12">
                                                            <span
                                                                :style="'background-color:'+solicitud.tipo_trabajo.color+';'+'color:white;border-radius:5px;'"
                                                                class="badge barlow semi_bold"
                                                                v-if="solicitud.tipo_trabajo_id != null">
                                                                {{solicitud.tipo_trabajo_id
                                                                ?solicitud.tipo_trabajo.nombre_trabajo:''}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        v-if="solicitud.area_creadora_id == null && solicitud.tipo_trabajo_id != null && solicitud.solicitud_duplicada_id == null">
                                                        <div class="col-md-3 col-sm-3 col-12"
                                                            v-if="solicitud.tipo_trabajo_id != null">
                                                            <span
                                                                :style="'background-color:'+solicitud.tipo_trabajo.color+';'+'color:white;border-radius:5px;'"
                                                                class="badge barlow semi_bold">
                                                                {{solicitud.tipo_trabajo_id
                                                                ?solicitud.tipo_trabajo.nombre_trabajo:''}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div style=""
                                                        v-if="solicitud.area_creadora_id == null && solicitud.contingencia_id != null">
                                                        <div class="col-md-3 col-sm-3 col-12">
                                                            <span class="badge barlow semi_bold"
                                                                style="background-color:#ed5565;color:white;border-radius:5px;">
                                                                Contingencia {{solicitud.contingencia?
                                                                solicitud.contingencia.nombre_contingencia :''}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div style="margin-top:10px;"
                                                        v-if="solicitud.tipo_trabajo_ingenieria_id != null">
                                                        <div class="col-md-3 col-sm-3 col-12">
                                                            <span class="badge barlow semi_bold"
                                                                style="background-color:#23c6c8 ; color: white;border-radius: 5px;text-align: center;"
                                                                v-if="solicitud.tipo_trabajo_ingenieria_id== 1">
                                                                Licitación
                                                            </span>
                                                            <span class="badge barlow semi_bold"
                                                                style="background-color:#1ab394 ; color: white;border-radius: 5px;text-align: center;"
                                                                v-if="solicitud.tipo_trabajo_ingenieria_id== 2">
                                                                Cotización
                                                            </span>
                                                            <span class="badge barlow semi_bold"
                                                                style="background-color: #f8ac59; color: white;border-radius: 5px;text-align: center;"
                                                                v-if="solicitud.tipo_trabajo_ingenieria_id== 3">
                                                                LPU
                                                            </span>
                                                            <span class="badge barlow semi_bold"
                                                                style="background-color: #f66997; color: white;border-radius: 5px;text-align: center;"
                                                                v-if="solicitud.tipo_trabajo_ingenieria_id== 4">
                                                                CPU
                                                            </span>
                                                            <span class="badge barlow semi_bold"
                                                                style="background-color:#999999 ; color: white;border-radius: 5px;text-align: center;"
                                                                v-if="solicitud.tipo_trabajo_ingenieria_id== 6">
                                                                Sin asignar
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        v-if="solicitud.area_creadora_id == 1 && solicitud.proyecto_gpon==1">
                                                        <div class="col-md-3 col-sm-3 col-12">
                                                            <span class="badge barlow semi_bold"
                                                                style="background-color:#ed5565;color:white;border-radius:5px;">
                                                                Proyecto GPON 2020
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    v-if="modulo ==2 || modulo == 5 || modulo == 6|| modulo == 13 || modulo == 16 || modulo == 18 || modulo == 17 || modulo == 19 || modulo == 20 || modulo == 8 || modulo == 21 || modulo == 23 || modulo == 25 ||  modulo == 26 || modulo == 15  || modulo == 42">
                                                    <div>
                                                        <strong class="barlow semi_bold">
                                                            {{solicitud.user.name}} {{solicitud.user.apellido}}
                                                        </strong>
                                                    </div>
                                                    <div class="barlow regular">
                                                        Fecha creación
                                                    </div>
                                                    <div class="barlow regular">
                                                        {{formato(solicitud.created_at)}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="max-width: 120px;"
                                                        v-if="solicitud.proveedor_id != null">
                                                        <strong class=" barlow semi_bold" style="font-size:12px; ">
                                                            {{solicitud.proveedor?solicitud.proveedor.PROVEEDOR:''}}
                                                        </strong>
                                                    </div>
                                                </td>
                                                <td class="barlow regular" v-if="modulo == 21">
                                                    <div>
                                                        {{solicitud.descripcion}}
                                                    </div>
                                                </td>
                                                <td v-if="modulo == 21">
                                                    <div>
                                                        <a :href="'/showTicket/'+solicitud.ticket_id" style=""
                                                            target="_blanck">
                                                            <strong class=" barlow semi_bold">
                                                                {{solicitud.ticket_id}}
                                                            </strong>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        v-if="solicitud.costos_activos != 0 && solicitud.costos_activos != null ">
                                                        <div>
                                                            <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                ACTIVOS
                                                                <a @click.prevent="ModalEditMontoSolicitud(solicitud)"
                                                                    href="#" v-if="modulo == 23 && editar_monto == 1">
                                                                    <i class="fas fa-edit boxBounce">
                                                                    </i>
                                                                </a>
                                                            </strong>
                                                        </div>
                                                        <div class="barlow regular">
                                                            {{solicitud.tipo_moneda?solicitud.tipo_moneda.moneda:''}}
                                                            {{formatPrice(solicitud.costos_activos ) }}
                                                        </div>
                                                    </div>
                                                    <div
                                                        v-if="solicitud.costos_servicios != 0 && solicitud.costos_servicios != null">
                                                        <div>
                                                            <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                SERVICIOS
                                                                <a @click.prevent="ModalEditMontoSolicitud(solicitud)"
                                                                    href="#" v-if="modulo == 23 && editar_monto == 1">
                                                                    <i class="fas fa-edit boxBounce">
                                                                    </i>
                                                                </a>
                                                            </strong>
                                                            <div class="barlow regular">
                                                                {{solicitud.tipo_moneda?solicitud.tipo_moneda.moneda:''}}
                                                                {{formatPrice(solicitud.costos_servicios) }}
                                                            </div>
                                                        </div>
                                                        <div>
                                                        </div>
                                                    </div>
                                                    <div v-if="solicitud.area_creadora_id == 1 ">
                                                        <div>
                                                            <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                COSTOS TOTALES
                                                                <a @click.prevent="ModalEditMontoSolicitud(solicitud)"
                                                                    href="#" v-if="modulo == 23 && editar_monto == 1">
                                                                    <i class="fas fa-edit boxBounce">
                                                                    </i>
                                                                </a>
                                                            </strong>
                                                            <div class="barlow regular">
                                                                {{solicitud.tipo_moneda?solicitud.tipo_moneda.moneda:''}}
                                                                {{solicitud.activo_servicio ?
                                                                formatPrice(solicitud.activo_servicio):''}}
                                                            </div>
                                                        </div>
                                                        <div>
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 60px;"
                                                        v-if="solicitud.solicitud_duplicada ">
                                                        <div
                                                            v-if="solicitud.solicitud_duplicada.costos_servicios != 0 && solicitud.solicitud_duplicada.costos_servicios != null">
                                                            <div>
                                                                <strong class="barlow semi_bold"
                                                                    style="font-size: 12px;">
                                                                    SERVICIOS
                                                                    <a @click.prevent="ModalEditMontoSolicitud(solicitud.solicitud_duplicada)"
                                                                        href="#"
                                                                        v-if="modulo == 23 && editar_monto == 1">
                                                                        <i class="fas fa-edit boxBounce">
                                                                        </i>
                                                                    </a>
                                                                </strong>
                                                                <div class="barlow regular">
                                                                    {{solicitud.solicitud_duplicada.tipo_moneda.moneda}}
                                                                    {{formatPrice(solicitud.solicitud_duplicada.costos_servicios)
                                                                    }}
                                                                </div>
                                                            </div>
                                                            <div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            v-if="solicitud.solicitud_duplicada.costos_activos != 0 && solicitud.solicitud_duplicada.costos_activos != null">
                                                            <div>
                                                                <strong class="barlow semi_bold"
                                                                    style="font-size: 12px;">
                                                                    ACTIVOS
                                                                    <a @click.prevent="ModalEditMontoSolicitud(solicitud.solicitud_duplicada)"
                                                                        href="#"
                                                                        v-if="modulo == 23 && editar_monto == 1">
                                                                        <i class="fas fa-edit boxBounce">
                                                                        </i>
                                                                    </a>
                                                                </strong>
                                                                <div class="barlow regular">
                                                                    {{solicitud.solicitud_duplicada.tipo_moneda.moneda}}
                                                                    {{formatPrice(solicitud.solicitud_duplicada.costos_activos)
                                                                    }}
                                                                </div>
                                                            </div>
                                                            <div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td v-if="modulo == 22">
                                                    <button @click.prevent="Showbitacora(solicitud)"
                                                        class="btn btn-info">
                                                        Ver
                                                    </button>
                                                </td>
                                                <td v-if="modulo== 21">
                                                    <div>
                                                        <strong class="barlow semi_bold">
                                                            {{solicitud.tipo_boleta
                                                            ?solicitud.tipo_boleta.descripcion:''}}
                                                        </strong>
                                                    </div>
                                                    <div class="barlow regular">
                                                        {{solicitud.boleta}}
                                                    </div>
                                                </td>
                                                <td v-if="modulo != 21 ">
                                                    <div>
                                                        <div>
                                                            <strong class="barlow semi_bold">
                                                                Cesta
                                                            </strong>
                                                        </div>
                                                        <div class="barlow regular">
                                                            {{solicitud.cesta}}
                                                        </div>
                                                        <div style="margin-top: 10px;">
                                                            <strong class="barlow semi_bold">
                                                                OC
                                                            </strong>
                                                        </div>
                                                        <div class=" barlow regular">
                                                            {{solicitud.oc}}
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 50px" v-if="solicitud.solicitud_duplicada">
                                                        <div>
                                                            <strong class=" barlow semi_bold">
                                                                Cesta
                                                            </strong>
                                                        </div>
                                                        <div class=" barlow regular">
                                                            {{solicitud.solicitud_duplicada.cesta}}
                                                        </div>
                                                        <div style="margin-top: 10px;">
                                                            <strong class="barlow semi_bold">
                                                                OC
                                                            </strong>
                                                        </div>
                                                        <div class="barlow regular">
                                                            {{solicitud.solicitud_duplicada.oc}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td v-if="modulo== 5 || modulo== 13 || modulo== 15 || modulo== 16">
                                                    <div>
                                                        <strong class="barlow semi_bold">
                                                            {{solicitud.tipo_boleta.descripcion}}
                                                        </strong>
                                                    </div>
                                                    <div class="barlow regular">
                                                        {{solicitud.boleta}}
                                                    </div>
                                                </td>
                                                <td v-if="modulo != 21">
                                                    <div>
                                                        <div class="barlow regular">
                                                            {{solicitud.ework}}
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 50px;" v-if="solicitud.solicitud_duplicada">
                                                        <div class="barlow regular">
                                                            {{solicitud.solicitud_duplicada.ework}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    v-if="modulo == 1|| modulo == 2 || modulo == 3 || modulo == 4 || modulo == 19 || modulo == 20 || modulo == 8   || modulo == 5 || modulo == 6 || modulo == 7 || modulo == 25">
                                                    <div>
                                                        <div class="barlow regular">
                                                            {{solicitud.cotizacion}}
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 50px;" v-if="solicitud.solicitud_duplicada">
                                                        <div class="barlow regular">
                                                            {{solicitud.solicitud_duplicada.cotizacion}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <div class="barlow semi_bold">
                                                            <span
                                                                :style="'background-color:'+solicitud.proceso.color+';'+'color:white;'+'border-radius:5px;'"
                                                                class="badge" v-if="solicitud">
                                                                {{solicitud.proceso ?solicitud.proceso.descripcion:''}}
                                                            </span>
                                                            <a @click.prevent="ShowModalEditEstado(solicitud)" href="#"
                                                                v-if="modulo == 23 && editar_estado == 1">
                                                                <i class="fas fa-edit boxBounce">
                                                                </i>
                                                            </a>
                                                        </div>
                                                        <div class="barlow semi_bold" style="margin-top:5px;"
                                                            v-if="solicitud.proceso_id != 13 && solicitud.proceso_id != 14 && solicitud.proceso_id != 18">
                                                            <span
                                                                :style="'background-color:'+solicitud.subestado.color+';'+'color:white;'+'border-radius:5px;'"
                                                                class="badge" v-if="solicitud">
                                                                {{solicitud.subestado.subestado}}
                                                                {{solicitud.gestionador_id!=null ?
                                                                solicitud.gestionador_id :''}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="barlow semi_bold" style="margin-top: 50px;"
                                                        v-if="solicitud.solicitud_duplicada">
                                                        <div>
                                                            <span
                                                                :style="'background-color:'+solicitud.solicitud_duplicada.proceso.color+';'+'color:white;'+'border-radius:5px;'"
                                                                class="badge">
                                                                {{solicitud.solicitud_duplicada.proceso.descripcion}}
                                                            </span>
                                                            <a @click.prevent="ShowModalEditEstado(solicitud.solicitud_duplicada)"
                                                                href="#" v-if="modulo == 23 && editar_estado == 1">
                                                                <i class="fas fa-edit boxBounce">
                                                                </i>
                                                            </a>
                                                        </div>
                                                        <div style="margin-top:5px;"
                                                            v-if="solicitud.solicitud_duplicada.proceso_id != 13 && solicitud.solicitud_duplicada.proceso_id != 14 && solicitud.solicitud_duplicada.proceso_id != 18">
                                                            <span
                                                                :style="'background-color:'+solicitud.solicitud_duplicada.subestado.color+';'+'color:white;'+'border-radius:5px;'"
                                                                class="badge">
                                                                {{solicitud.solicitud_duplicada.subestado.subestado}}
                                                                {{solicitud.solicitud_duplicada.gestionador_id !=null ?
                                                                solicitud.solicitud_duplicada.gestionador_id :''}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td v-if="modulo == 21">
                                                    <div>
                                                        <button @click.prevent="AprobarJefe(solicitud,modulo)"
                                                            class="btn btn-success">
                                                            <i class="fa fa-check">
                                                            </i>
                                                        </button>
                                                    </div>
                                                    <div style="margin-top: 5px;">
                                                        <button @click.prevent="saveId(solicitud)"
                                                            class="btn btn-danger" data-target="#RechazoJefeArea"
                                                            data-toggle="modal">
                                                            <i class="fa fa-times-circle">
                                                            </i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td v-if="modulo == 22">
                                                    <div>
                                                        <button @click.prevent="Aprobarsolicitud(solicitud,modulo)"
                                                            class="btn btn-success">
                                                            <i class="fas fa-undo-alt">
                                                            </i>
                                                        </button>
                                                    </div>
                                                    <div style="margin-top: 5px;">
                                                        <button @click.prevent="saveId(solicitud)"
                                                            class="btn btn-danger" data-target="#RechazoJefeArea"
                                                            data-toggle="modal">
                                                            <i class="fa fa-times-circle">
                                                            </i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="col-12 col-md-12 col-sm-12" v-if="data== 0 && load_data == 1">
                                        <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                            <div class="card-body">
                                                <div class="empty-state" data-height="400">
                                                    <div class="empty-state-icon"
                                                        style="background-image: linear-gradient(rgb(0, 92, 255), rgba(0, 123, 255, 0.6))">
                                                        <i class="fas fa-question">
                                                        </i>
                                                    </div>
                                                    <h2>
                                                        No se ha encontrado ningúna Solicitud en la busqueda.
                                                    </h2>
                                                    <p class="lead">
                                                        Verifique los datos de búsqueda o el estado de esta.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-sm-12" v-if="load_data == 0 || load_data == 2">
                                        <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                            <div class="card-body">
                                                <div class="empty-state" data-height="400">
                                                    <div class="d-flex justify-content-center"
                                                        v-if="load_data == 0 || load_data == 2">
                                                        <div class="spinner-border text-primary" role="status"
                                                            style="width: 8rem;height: 8rem;color: #007bff!important;">
                                                            <span class="sr-only" style="color: #191919">
                                                                Cargando...
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top: 30px;" v-if="data != 0">
                                        <nav aria-label="pagination" class="pagination" role="navigation">
                                            <vue-pagination :offset="4" :pagination="solicitudes"
                                                @paginate="GetSolicitudes(modulo)">
                                            </vue-pagination>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TABLA DATA PROYECTOS VINCULADOS -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row" v-if="modulo == 12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 style="color: rgb(102, 102, 102)">
                                    {{NameTable}}
                                </h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 80px;">
                                                    #
                                                </th>
                                                <th style="width: 150px;">
                                                    Sitio
                                                </th>
                                                <th>
                                                    Solicitante
                                                </th>
                                                <th>
                                                    Proveedor
                                                </th>
                                                <th>
                                                    Costos
                                                </th>
                                                <th>
                                                    Cesta/Oc
                                                </th>
                                                <th>
                                                    N°ework
                                                </th>
                                                <th>
                                                    N°cotización
                                                </th>
                                                <th>
                                                    Estado
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="height: 150px;" v-for="proyecto in proyectos_vinculados">
                                                <td>
                                                    <router-link
                                                        :to="{ path:`/show/`+proyecto.id, params: {id: proyecto.id}}"
                                                        v-slot="{ href, route, navigate, isActive, isExactActive }">
                                                        <a :href="href" target="_blank">
                                                            <span class="badge boxBounce"
                                                                style="background-color: #1d548a;color: white;border-radius: 5px;font-size: 13.5px">
                                                                {{proyecto.id}}
                                                            </span>
                                                        </a>
                                                    </router-link>
                                                </td>
                                                <td>
                                                    <div class="col-md-12 col-sm-12 col-12 barlow semi_bold">
                                                        <div style="font-size: 10px;">
                                                            <span class="badge "
                                                                style="background-color: rgb(0, 92, 255);color: white;border-radius: 5px">
                                                                {{proyecto.nem_site}}
                                                                {{proyecto.nombre}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <strong class="barlow semi_bold">
                                                            {{proyecto.name}} {{proyecto.apellido}}
                                                        </strong>
                                                    </div>
                                                    <div class="barlow regular">
                                                        Fecha creación
                                                    </div>
                                                    <div class="barlow regular">
                                                        {{formato(proyecto.created_at)}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="max-width: 120px;">
                                                        <strong class=" barlow semi_bold" style="font-size:12px; ">
                                                            {{proyecto.PROVEEDOR}}
                                                        </strong>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <strong class="barlow semi_bold" style="font-size: 12px;">
                                                            COSTOS TOTALES
                                                            <a @click.prevent="ModalEditMontoSolicitud(solicitud)"
                                                                href="#" v-if="modulo == 23 && editar_monto == 1">
                                                                <i class="fas fa-edit boxBounce">
                                                                </i>
                                                            </a>
                                                        </strong>
                                                        <div class="barlow regular">
                                                            {{proyecto.moneda}} ${{proyecto.activo_servicio | currency
                                                            }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <div>
                                                            <strong class="barlow semi_bold">
                                                                Cesta
                                                            </strong>
                                                        </div>
                                                        <div class="barlow regular">
                                                            {{proyecto.cesta}}
                                                        </div>
                                                        <div style="margin-top: 10px;">
                                                            <strong class="barlow semi_bold">
                                                                OC
                                                            </strong>
                                                        </div>
                                                        <div class=" barlow regular">
                                                            {{proyecto.oc}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <div class="barlow regular">
                                                            {{proyecto.ework}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <div class="barlow regular">
                                                            {{proyecto.cotizacion}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <div class="barlow semi_bold">
                                                            <span
                                                                :style="'background-color:'+proyecto.color+';'+'color:white;'+'border-radius:5px;'"
                                                                class="badge">
                                                                {{proyecto.descripcion}}
                                                            </span>
                                                        </div>
                                                        <div class="barlow semi_bold" style="margin-top:5px;">
                                                            <span
                                                                :style="'background-color:'+proyecto.color+';'+'color:white;'+'border-radius:5px;'"
                                                                class="badge">
                                                                {{proyecto.subestado}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" id="RechazoJefeArea" role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header"
                            style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                            <h5 class="modal-title" style="color: white;">
                                Rechazo de solicitud
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>
                                    Motivo del rechazo*
                                </label>
                                <textarea class="form-control" required="true" style="height: 150px;"
                                    v-model="descripcion">
                                </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click.prevent="RechazoSolicitudJefeArea()" class=" btn boxBounce shadow-box-ag "
                                data.dissmis="modal" id="btnUploadFiles"
                                style="color: white;background-color: rgb(0 114 255)" type="button">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form-oym>
        </form-oym>
        <form-ing-sgc>
        </form-ing-sgc>
        <modal-bitacora>
        </modal-bitacora>
        <modal-costo v-if="opcion == 27">
        </modal-costo>
        <modal-edit-estado v-if="opcion == 27">
        </modal-edit-estado>
        <modal-masive-upload>
        </modal-masive-upload>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    import EventBus from "./event-bus"
    import dataoym from './dataingoym.vue';
    import VuePagination from '../VuePagination.vue';
    import modalBitacora from './modals/modalbitacora.vue'
    import formoym from './formOym.vue';
    import formsgcing from './formSgcing.vue'
    import modaldeditmonto from './modals/editcosto.vue';
    import modaleditestado from './modals/modaleditestado.vue'
    import modalmasiveupload from './modals/modalcargamasiva.vue'

    export default {
        props: ['rol', 'cargo_id'],
        components: {
            'data-oym': dataoym,
            'vue-pagination': VuePagination,

            'form-oym': formoym,
            'form-ing-sgc': formsgcing,
            'modal-bitacora': modalBitacora,
            'modal-costo': modaldeditmonto,
            'modal-edit-estado': modaleditestado,
            'modal-masive-upload': modalmasiveupload


        },
        data() {
            return {
                modulo: '',
                RolId: '',
                NameTable: '',
                solicitudes: {
                    'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0

                },
                idsolicitud: '',
                sitio: '',
                proveedor: '',
                ocCesta: '',
                ework: '',
                cotizacion: '',
                totalCreada: '',
                totalAprobar: '',
                totalRecazada: '',
                totalInformeFinal: '',
                totalcontrol: '',
                totalAprobarcontrol: '',
                totalRecazadacontrol: '',
                totalActiva: '',
                Nroboleta: '',
                TotalCreadaIng: '',
                RechazadasIng: '',
                totalActivaIng: '',
                totalProyectos: '',
                totalAprobarPmo: '',
                totalIngInactivas: '',
                Rechazadaspmo: '',
                totalValidador: '',
                total_oo_cc:'',
                totalRechazadaValidador: '',
                totalJefeArea: '',
                totalRechazadaJefeArea: '',
                totalOYMInactivas: '',
                totalHistorialOym: '',
                totalHistorialIng: '',
                opcion: '',
                NameModulo: '',
                motivoRechazo: '',
                IdslcRechazo: '',
                permisos: [],
                crearOym: 0,
                crearIng: 0,
                data: 0,
                total_electrico: '',

                total_zonal: '',

                bitacoras: [],
                descripcion: '',
                total_ing_oym: '',
                total_Pmo: '',
                total_control_ingenieria: '',
                proceso_id: '',
                procesos: [],
                subprocesos: [],
                subproceso_id: '',
                Selectsubproceso: '',
                SelectProceso: '',
                pop_list: [],
                site_id: '',
                name_site_select: '',
                Totales_ingeniero: '',
                total_crm: '',
                editar_monto: 0,
                editar_estado: 0,
                user_text: '',
                users_list: [],
                input_width: 0,
                user_id: '',
                user_select: '',
                donwload_excel: 0,
                upload_excel: 0,
                proyectos_vinculados: [],
                route: '',
                load_data: 0,
                total_aprobadas_pmo: '',
                modulo_aprobar: '',
                totalHistorialController: ''






            }
        },
        filters: {
            uppercase: function (v) {
                return v.toUpperCase();
            }
        },

        created: function () {
            this.GetRol();
            this.getPermisos();

            this.getProcesos();
            // setInterval(() => this.check_inputs(), 1 * 3000)



        },

        mounted: function () { /* Agrega mounted y con el siguiente contenido */
            let self = this;


            EventBus.$on('sgc.misSlcOym', function (id) {
                self.getsolicitudestable(id); // ejecutas el metodo que desees
                self.GetTotales()
                self.modulo = id;
                self.opcion = id
                self.NameModulo = '/ Mis solicitudes'
                self.closeShow()


            });
            EventBus.$on('sgc.RefreshTable', function (id) {
                self.GetSolicitudes(); // ejecutas el metodo que desees



            });
         
            window.Echo.channel('logout-session').listen('CloseSessionLogoutEvent',(e)=>{
             window.location.replace("/login");
            });

            window.Echo.channel('sgc-list-update').listen('updateListSgcEvent',(e)=>{
                this.GetSolicitudes()
            });
    
















        },
        methods: {
            formatPrice(value) {
                if (value % 1 == 0) {

                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                } else {
                    let val = (value / 1).toFixed(2).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                }

            },

            GetRol: function () {
                if (this.$route.params.modulo == 0) {


                    if (this.rol == 12 ) {


                        this.modulo = 1
                        this.opcion = 1
                        this.NameTable = 'Solicitudes creadas'
                        this.GetTotalesIngOym();
                        this.GetSolicitudes(this.modulo);


                    }
                    if (this.rol == 32) {


                        this.modulo = 60
                        this.opcion = 60
                        this.NameTable = 'Solicitudes creadas'
                        this.GetTotalesOOCC();
                        this.GetSolicitudes(this.modulo);


                    }
                    if (this.rol == 8) {
                        this.modulo = 5
                        this.opcion = 5
                        this.NameTable = 'Solicitudes en control'
                        this.GetTotalesControl();
                        this.GetSolicitudes(this.modulo);

                    }
                    if (this.rol == 10 || this.rol == 9) {
                        this.modulo = 9
                        this.opcion = 9
                        this.NameTable = 'Solicitudes creadas'
                        this.GetTotalesIngenieria();
                        this.GetSolicitudes(this.modulo);

                    }
                    if (this.rol == 14) {
                        this.modulo = 13
                        this.opcion = 13
                        this.NameTable = 'Solicitudes Activas'
                        this.GetTotalesControlIngenieria();
                        this.GetSolicitudes(this.modulo);

                    }
                    if (this.rol == 11) {
                        this.modulo = 16
                        this.opcion = 16
                        this.NameTable = 'Solicitudes por aprobar'
                        this.GetTotalesPmoIngenieria();
                        this.GetSolicitudes(this.modulo);

                    }
                    if (this.rol == 23) {
                        this.modulo = 19
                        this.opcion = 19
                        this.NameTable = 'Solicitudes por aprobar'
                        this.GetTotalesValidador();
                        this.GetSolicitudes(this.modulo);

                    }
                    if (this.rol == 16) {
                        this.modulo = 21
                        this.opcion = 21
                        this.NameTable = 'Solicitudes por aprobar'
                        this.GetTotalesJefearea();
                        this.GetSolicitudes(this.modulo);

                    }
                    if (this.rol == 1) {

                        this.modulo = 23
                        this.opcion = 27
                        this.NameModulo = '/ Administrador'
                        this.route = '/GetDataRequestAdmin'
                        this.GetTotalesAdmin()
                        this.GetSolicitudes();




                    }
                    if (this.rol == 5) {

                        if (this.cargo_id == 2) {
                            this.NameTable = 'Solicitudes creadas'
                            this.modulo = 36
                            this.opcion = 36
                            this.NameModulo = '/ Solicitudes creadas'
                            this.GetTotalesElectrico();
                            this.GetSolicitudes(this.modulo);

                        } else {
                            if (this.cargo_id == 1) {
                                this.NameTable = 'Solicitudes creadas'
                                this.modulo = 39
                                this.opcion = 39
                                this.NameModulo = '/ Solicitudes creadas'
                                this.GetTotalesZonal();
                                this.GetSolicitudes(this.modulo);

                            }
                        }




                    }
                    if (this.rol == 31) {


                        this.NameTable = 'Historial solicitudes'
                        this.modulo = 50
                        this.opcion = 50
                        this.NameModulo = '/ Historial solicitudes'
                        this.GetTotalesController();
                        this.GetSolicitudes(this.modulo);
                    }

                } else {


                    if (this.$route.params.modulo == 25) {
                        this.getsolicitudestable(this.$route.params.modulo); // ejecutas el metodo que desees
                        this.GetTotalHistorialOYM()
                        this.modulo = this.$route.params.modulo;
                        this.opcion = this.$route.params.modulo
                        this.NameModulo = '/ Historial O&M'

                    } else {
                        if (this.$route.params.modulo == 27) {

                            this.getsolicitudestable(23); // ejecutas el metodo que desees
                            this.GetTotalesAdmin();
                            this.modulo = 23;
                            this.opcion = 27
                            this.NameModulo = '/ Administrador'

                        } else {
                            if (this.$route.params.modulo == 19) {
                                this.getsolicitudestable(this.$route.params.modulo); // ejecutas el metodo que desees
                                this.GetTotalesValidador();
                                this.modulo = this.$route.params.modulo;
                                this.opcion = this.$route.params.modulo
                                this.NameModulo = '/ Validador O&M'

                            } else {
                                if (this.$route.params.modulo == 26) {
                                    this.getsolicitudestable(this.$route.params.modulo); // ejecutas el metodo que desees
                                    this.GetTotalHistorialIng()
                                    this.modulo = this.$route.params.modulo;
                                    this.opcion = this.$route.params.modulo
                                    this.NameModulo = '/ Historial ingenieria'

                                } else {
                                    if (this.$route.params.modulo == 21) {
                                        this.getsolicitudestable(this.$route.params.modulo); // ejecutas el metodo que desees
                                        this.GetTotalesJefearea();
                                        this.modulo = this.$route.params.modulo;
                                        this.opcion = this.$route.params.modulo
                                        this.NameModulo = '/ Jefe de área O&M'

                                    } else {
                                        if (this.$route.params.modulo == 5) {
                                            this.getsolicitudestable(this.$route.params.modulo); // ejecutas el metodo que desees
                                            this.GetTotalesControl();
                                            this.modulo = this.$route.params.modulo;
                                            this.opcion = this.$route.params.modulo
                                            this.NameModulo = '/ Control O&M'

                                        } else {
                                            if (this.$route.params.modulo == 16) {
                                                this.getsolicitudestable(this.$route.params.modulo); // ejecutas el metodo que desees
                                                this.GetTotalesPmoIngenieria();
                                                this.modulo = this.$route.params.modulo;
                                                this.opcion = this.$route.params.modulo
                                                this.NameModulo = '/ PMO'


                                            } else {
                                                if (this.$route.params.modulo == 13) {
                                                    this.getsolicitudestable(this.$route.params.modulo); // ejecutas el metodo que desees
                                                    this.GetTotalesControlIngenieria();
                                                    this.modulo = this.$route.params.modulo;
                                                    this.opcion = this.$route.params.modulo
                                                    this.NameModulo = '/ Control Ingeniería'

                                                } else {
                                                    if (this.$route.params.modulo == 42) {
                                                        this.modulo = 42
                                                        this.opcion = 42
                                                        this.NameTable = 'Mi Crm'
                                                        this.NameModulo = '/ Mi Crm'
                                                        this.getTotalCmr()
                                                        this.GetSolicitudes(this.modulo);
                                                    } else {
                                                        if (this.$route.params.modulo == 43) {
                                                            this.modulo = 2
                                                            this.opcion = 2
                                                            this.modulo_aprobar = 43;
                                                            this.NameTable = 'Solicitudes por aprobar'
                                                            this.GetTotalesIngOym();
                                                            this.GetSolicitudes(this.modulo);
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }


            },

            GetSolicitudes: function () {
                axios.get(`/GetSolicitudesSgc?page=${this.solicitudes.current_page}&modulo=${this.modulo}&idsolicitud=${this.idsolicitud}&sitio=${this.sitio}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&boleta=${this.Nroboleta}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}&user_id=${this.user_id}`).then((response) => {

                    this.solicitudes = response.data


                    if (this.solicitudes.data.length != 0) {
                        this.data = 1
                    } else {
                        this.data = 0
                    }
                    if (this.opcion == 1) {
                        this.GetTotalesIngOym()
                    }

                    if (this.opcion == 5) {
                        this.GetTotalesControl();
                    }
                    if (this.opcion == 9) {
                        this.GetTotalesIngenieria();
                    }
                    if (this.opcion == 13) {
                        this.GetTotalesControlIngenieria();
                    }
                    if (this.opcion == 16) {
                        this.GetTotalesPmoIngenieria();
                    }
                    if (this.opcion == 19) {
                        this.GetTotalesValidador();
                    }
                    if (this.opcion == 21) {
                        this.GetTotalesJefearea();
                    }

                    if (this.opcion == 36) {
                        this.GetTotalesElectrico();
                    }
                    if (this.opcion == 39) {
                        this.GetTotalesZonal()
                    }
                    if (this.opcion == 27) {
                        this.GetTotalesAdmin()
                    }
                    if (this.opcion == 42) {
                        this.getTotalCmr()
                    }



                }).finally(() => this.load_data = 1)

            },
            getsolicitudestable: function (modulo) {

                if (modulo != null) {
                    this.modulo = modulo
                    this.ClearData();

                }


            },
            set_load: function () {
                this.load_data = 2;
            },
            ClearData: function () {

                if (this.site_id != '') {
                    this.cleanSelectSite()
                }
                if (this.proceso_id != '') {
                    this.clean_proceso()
                }
                if (this.subproceso_id != '') {
                    this.clean_Subproceso()
                }

                if (this.user_id != '') {
                    this.cleanUserSite()
                }

                if (this.idsolicitud != '') {
                    this.idsolicitud = ''

                }
                if (this.proveedor != '') {
                    this.proveedor = ''

                }
                if (this.ocCesta != '') {
                    this.ocCesta = ''

                }
                if (this.Nroboleta != '') {
                    this.Nroboleta = ''

                }
                if (this.ework != '') {
                    this.ework = ''

                }
                if (this.cotizacion != '') {
                    this.cotizacion = ''

                }
                if (this.modulo == 12) {
                    axios.get('/GetProyectosVinculados').then((response) => {
                        this.proyectos_vinculados = response.data
                    })
                } else {
                    this.solicitudes.current_page = 1;
                    var page = 1;
                    axios.get(`/GetSolicitudesSgc?page=${page}&modulo=${this.modulo}&idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&boleta=${this.Nroboleta}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}&user_id=${this.user_id}`).then((response) => {

                        this.solicitudes = response.data


                        if (this.solicitudes.data.length != 0) {
                            this.data = 1
                        } else {
                            this.data = 0
                        }
                        if (this.opcion == 1) {
                            this.GetTotalesIngOym()
                        }

                        if (this.opcion == 5) {
                            this.GetTotalesControl();
                        }
                        if (this.opcion == 9) {
                            this.GetTotalesIngenieria();
                        }
                        if (this.opcion == 13) {
                            this.GetTotalesControlIngenieria();
                        }
                        if (this.opcion == 16) {
                            this.GetTotalesPmoIngenieria();
                        }
                        if (this.opcion == 19) {
                            this.GetTotalesValidador();
                        }
                        if (this.opcion == 21) {
                            this.GetTotalesJefearea();
                        }
                        if (this.opcion == 27) {
                            this.GetTotalesAdmin();
                        }
                        if (this.opcion == 36) {
                            this.GetTotalesElectrico();
                        }
                        if (this.opcion == 39) {
                            this.GetTotalesZonal()
                        }
                        if (this.opcion == 27) {
                            this.GetTotalesAdmin()
                        }
                        if (this.opcion == 42) {
                            this.getTotalCmr()
                        }
                    })
                }

            },

            check_inputs: function () {
                if (this.idsolicitud == '' && this.proveedor == '' && this.ocCesta == '' && this.Nroboleta == '' && this.ework == '' && this.cotizacion == '') {

                    this.GetSolicitudes()
                }

            },

            getPermisos: function () {
                axios.get('/getPermisos').then((reponse) => {
                    this.permisos = reponse.data;

                    for (var i = 0; i < this.permisos.length; i++) {
                        let permiso = this.permisos[i]
                        if (permiso.permission_id == 14 || permiso.permission_id == 20) {
                            this.crearOym = 1;

                        }
                        if (permiso.permission_id == 42) {
                            this.crearIng = 1;

                        }
                        if (permiso.permission_id == 171) {
                            this.editar_monto = 1;

                        }
                        if (permiso.permission_id == 172) {
                            this.editar_estado = 1;

                        }
                        if (permiso.permission_id == 174) {
                            this.donwload_excel = 1;

                        }
                        if (permiso.permission_id == 175) {
                            this.upload_excel = 1;

                        }
                    }
                });
            },


            formato: function (d) {
                return moment(d).format("DD/MM/YY");
            },

            sendData: function (modulo) {
                if (this.proveedor.length >= 3) {
                    this.set_load()
                    this.GetSolicitudes(modulo)
                } else {
                    if (this.proveedor.length == 0) {
                        this.set_load()
                        this.GetSolicitudes(modulo)

                    }
                }
            },
            Aprobarsolicitud: function (solicitud, modulo) {
                axios.get('/aprobarSolicitudOym/' + solicitud.id).then((response) => {
                    this.GetSolicitudes(modulo)
                    this.GetTotalesJefearea()
                    let mensaje = 'Solicitud nro°' + ' ' + solicitud.id + ' ' + 'reenviada'
                    this.toastFunction(mensaje)
                })
            },
            Showbitacora: function (solicitud) {
                EventBus.$emit('sgc.bitacorasgcJefe', solicitud.id);
            },
            saveId: function (solicitud) {
                this.IdslcRechazo = solicitud.id;
            },
            RechazoSolicitudJefeArea: function () {
                if (this.descripcion == '') {
                    this.$swal({
                        type: 'error',
                        title: 'Debe indicar el motivo del rechazo.',
                        showCloseButton: true,
                    });
                } else {
                    if (this.descripcion != '') {
                        $('#RechazoJefeArea').modal('hide');
                        axios.get(`/RechazoSolicitud?solicitud_id=${this.IdslcRechazo}&descripcion=${this.descripcion}`).then((response) => {

                            this.GetSolicitudes(this.modulo)
                            this.GetTotalesJefearea()
                            this.loadFunction()
                            let mensaje = 'Solicitud nro°' + ' ' + this.IdslcRechazo + ' ' + 'rechazada'
                            this.toastFunction(mensaje)
                            this.descripcion = ''
                        })
                    }
                }

            },
            showFormOym: function () {

                EventBus.$emit('sgc.form')
            },
            ShowModalUpload: function () {
                EventBus.$emit('sgc.ModalUploadShow')
            },
            showdetails: function (solicitud) {

                document.getElementById('tablesolicitud').style.display = 'none'
                EventBus.$emit('sgc.show', solicitud)
            },
            closeShow: function () {
                document.getElementById('tablesolicitud').style.display = 'block'
                EventBus.$emit('sgc.showClose')
            },


            AprobarJefe: function (solicitud, modulo) {
                this.loadFunction();
                axios.get('/aprobarSolicitudOym/' + solicitud.id).then((response) => {
                    this.GetSolicitudes(modulo)
                    this.GetTotalesJefearea()
                    let mensaje = 'Solicitud nro°' + ' ' + solicitud.id + ' ' + 'aprobada'
                    this.toastFunction(mensaje)
                }).finally(() => this.load_data = 1)
            },

            GetTotalesElectrico: function () {
                axios.get(`/GetTotalCreadaElectrico?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`).then((response) => {
                    this.total_electrico = response.data;
                }).finally(() => this.load_data = 1)



            },
            GetTotalesAdmin: function () {
                axios.get(`/GetTotalCreada?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`).then((response) => {
                    this.totalCreada = response.data;
                }).finally(() => this.load_data = 1)


            },
            GetTotalesController: function () {
                axios.get(`/GetTotalHistorialController?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`).then((response) => {
                    this.totalHistorialController = response.data;
                }).finally(() => this.load_data = 1)


            },
            GetTotalesZonal: function () {
                axios.get(`/GetTotalCreadaZonal?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`).then((response) => {
                    this.total_zonal = response.data;
                }).finally(() => this.load_data = 1)
            },
            GetTotalesJefearea: function () {
                axios.get(`/GetTotalPorAprobarJefeArea?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`).then((response) => {
                    this.totalJefeArea = response.data;
                }).finally(() => this.load_data = 1)






            },
            GetTotalHistorialOYM: function () {
                axios.get(`/GetTotalHistorialOym?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`).then((response) => {
                    this.totalHistorialOym = response.data;
                }).finally(() => this.load_data = 1)

            },
            GetTotalesIngOym: function () {
                axios.get(`/GetTotalIngOym?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`).then((response) => {
                    this.total_ing_oym = response.data;
                }).finally(() => this.load_data = 1)

            },
            GetTotalHistorialIng: function () {
                axios.get(`/GetTotalHistorialIng?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`).then((response) => {
                    this.totalHistorialIng = response.data;
                }).finally(() => this.load_data = 1)
            },
            GetTotalesValidador: function () {
                axios.get(`/GetTotalPorAprobarValidador?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}`).then((response) => {
                    this.totalValidador = response.data;
                }).finally(() => this.load_data = 1)


            },
            GetTotalesPmoIngenieria: function () {
                axios.get(`/GetTotalPorAprobarPmo?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`).then((response) => {
                    this.total_Pmo = response.data;
                    this.total_aprobadas_pmo = response.data.aprobadas_pmo
                }).finally(() => this.load_data = 1)

            },
            GetTotalesIngenieria: function () {
                axios.get(`/GetTotalCreatedIng?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`).then((response) => {
                    this.Totales_ingeniero = response.data;
                }).finally(() => this.load_data = 1)





            },
            GetTotalesControlIngenieria: function () {
                axios.get(`/GetTotalActivasIng?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`).then((response) => {
                    this.total_control_ingenieria = response.data;
                }).finally(() => this.load_data = 1)

            },
            GetTotalesControl: function () {
                axios.get(`/GetTotalControl?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`).then((response) => {
                    this.totalcontrol = response.data;
                }).finally(() => this.load_data = 1)

            },
            GetTotalesOOCC(){
                axios.get(`/GetTotalOOCC?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`).then((response) => {
                    this.total_oo_cc = response.data;
                }).finally(() => this.load_data = 1)

            },
            getTotalCmr() {
                axios.get(`/GetTotalCrm?idsolicitud=${this.idsolicitud}&sitio=${this.site_id}&proveedor=${this.proveedor}&ocCesta=${this.ocCesta}&ework=${this.ework}&cotizacion=${this.cotizacion}&proceso=${this.proceso_id}&subproceso=${this.subproceso_id}`).then((response) => {
                    this.total_crm = response.data
                }).finally(() => this.load_data = 1)
            },



            getProcesos: function () {
                axios.get('/procesos').then((response) => {
                    this.procesos = response.data
                })
                axios.get('/GetSubProcesos').then((response) => {
                    this.subprocesos = response.data
                })
            },

            setSubprocesoSGc: function (modulo) {
                this.set_load();
                if (this.Selectsubproceso == '') {
                    document.getElementById("selectSubproceso").style.display = 'none'
                    document.getElementById("SubprocesoName").style.display = 'block'
                    for (var i = 0; i < this.subprocesos.length; i++) {
                        let sub = this.subprocesos[i]
                        if (sub.id == this.subproceso_id) {
                            this.Selectsubproceso = sub.subestado;
                        }
                    }

                    this.GetSolicitudes(modulo)
                } else {
                    if (this.Selectsubproceso != '') {
                        document.getElementById("selectSubproceso").style.display = 'block'
                        document.getElementById("SubprocesoName").style.display = 'none'
                        this.subproceso_id = ''
                        this.Selectsubproceso = ''
                        this.GetSolicitudes(modulo)
                    }
                }
            },

            ShowModalEditEstado: function (solicitud) {
                EventBus.$emit('sgc.modalEditEstado', solicitud, this.procesos,
                    this.subprocesos)
            },
            GetSitios: function (modulo) {
                if (this.sitio.length >= 3) {
                    this.set_load();
                    this.GetSolicitudes(modulo)
                } else {
                    if (this.sitio.length == 0) {
                        this.set_load();
                        this.GetSolicitudes(modulo)
                    }


                }
            },
            SetSite: function (site) {
                this.site_id = site.id
                this.GetSolicitudes()
                this.sitio = ''
                this.name_site_select = site.nem_site + ' ' + site.nombre
                document.getElementById("sp_site_name").style.display = 'block'
                document.getElementById("input_search_site_table").style.display = 'none'
                document.getElementById("list_pop_search_table").style.display = 'none'
                this.loadFunction()

            },

            SearchUser: function () {
                if (this.user_text.length >= 3) {
                    axios.get(`/GetUserList?user=${this.user_text}`).then((response => {
                        this.users_list = response.data
                        this.input_width = document.getElementById("user_search_input").clientWidth

                    }))


                    document.getElementById("list_users_search_table").style.display = 'block'
                } else {
                    if (this.user_text.length < 3) {
                        document.getElementById("list_users_search_table").style.display = 'none'
                        this.users_list = []
                    }
                }
            },
            SetUser: function (user) {
                document.getElementById("sp_user_name").style.display = 'block'
                document.getElementById("list_users_search_table").style.display = 'none'
                document.getElementById("user_search_input").style.display = 'none'

                this.user_select = user.name + ' ' + user.apellido
                this.user_id = user.id
                this.GetSolicitudes()

            },
            cleanUserSite: function () {
                document.getElementById("sp_user_name").style.display = 'none'
                document.getElementById("user_search_input").style.display = 'block'
                $("#user_search_input").val('');
                this.user_text = ''
                this.user_select = ''
                this.user_id = ''
                this.GetSolicitudes()

            },
            cleanSelectSite: function () {

                this.name_site_select = ''
                this.site_id = ''
                $("#input_search_site_table").val('');
                document.getElementById("input_search_site_table").style.display = 'block'
                document.getElementById("sp_site_name").style.display = 'none'
                this.GetSolicitudes()
            },
            setProcesoSGc: function (modulo) {
                this.set_load();
                if (this.SelectProceso == '') {
                    document.getElementById("selectProceso").style.display = 'none'
                    document.getElementById("ProcesoName").style.display = 'block'
                    for (var i = 0; i < this.procesos.length; i++) {
                        let pro = this.procesos[i]
                        if (pro.id == this.proceso_id) {
                            this.SelectProceso = pro.descripcion;
                        }
                    }

                    this.GetSolicitudes(modulo)
                } else {
                    if (this.SelectProceso != '') {
                        document.getElementById("selectProceso").style.display = 'block'
                        document.getElementById("ProcesoName").style.display = 'none'
                        this.proceso_id = ''
                        this.SelectProceso = ''
                        this.GetSolicitudes(modulo)
                    }
                }
            },
            clean_proceso() {
                document.getElementById("selectProceso").style.display = 'block'
                document.getElementById("ProcesoName").style.display = 'none'
                this.proceso_id = ''
                this.SelectProceso = ''
            },
            clean_Subproceso() {
                document.getElementById("selectSubproceso").style.display = 'block'
                document.getElementById("SubprocesoName").style.display = 'none'
                this.subproceso_id = ''
                this.Selectsubproceso = ''
            },
            loadFunction: function () {
                let loader = this.$loading.show({
                    // Optional parameters
                    container: this.fullPage ? null : this.$refs.formContainer,
                    canCancel: true,
                    onCancel: this.onCancel,
                });
                // simulate AJAX
                setTimeout(() => {
                    loader.hide()
                }, 400)
            },
            toastFunction: function (messaje) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,

                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    type: 'success',
                    title: messaje
                })
            },
            ModalEditMontoSolicitud: function (solicitud) {
                EventBus.$emit('sgc.modalEditCosto', solicitud);

            },
        }
    }
</script>
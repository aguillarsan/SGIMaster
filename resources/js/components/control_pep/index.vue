<template>
    <div>
        <div class="main-content">
            <div class="wrapper wrapper-content">
                <section class="section">
                    <div class="section-header shadow-box-ag">
                        <div class="row">
                            <div class="col-lg-10 col-md-6 col-sm-6 col-12 ">
                                <div class="card-stats-title">
                                    <h1 class="barlow semi_bold">
                                        Control PEP
                                    </h1>
                                    <br/>
                                    <div class="dropdown d-inline">
                                        <a class="font-weight-600 dropdown-toggle barlow regular" data-toggle="dropdown" href="#" id="orders-month">
                                            Opciones
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-sm" style="z-index: 1;position:absolute;">
                                            <li class="dropdown-title barlow semi_bold">
                                                Selecione una opcion
                                            </li>
                                            <li>
                                                <a class="barlow regular" href="#" id="upload_file_pep">
                                                    <i class="fas fa-upload">
                                                    </i>
                                                    Cargar archivo
                                                </a>
                                                <input @change="getFile" hidden="true" id="input_file_pep" name="filepep" type="file" value=""/>
                                            </li>
                                            <li v-if="opciones_carga_masiva == 1">
                                                <a class="barlow regular" href="/planilla/planilla_carga_masiva_control_pep.xlsx">
                                                    <i class="fas fa-download">
                                                    </i>
                                                    Planilla carga masiva
                                                </a>
                                            </li>
                                            <li v-if="opciones_carga_masiva == 1">
                                                <a class="barlow regular" href="/pep-export-excel">
                                                    <i class="fas fa-download">
                                                    </i>
                                                    Descargar reporte
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6 col-12 ">
                                <div>
                                    <h5 class="barlow semi_bold">
                                        Última actualización
                                    </h5>
                                </div>
                                <div>
                                    <h5 class="barlow semi_bold" v-if="load_data != 1">
                                        {{formato(actualizacion.created_at)}}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- TOTALES -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12" style="flex:20% !important;max-width: 20% !important;">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce ">
                            <div class="card-icon shadow-box-ag " style="background-color: rgb(116, 142, 254)">
                                <i class="fas fa-lock-open" style="font-size: ;color: white">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header barlow bold">
                                    <h4 style="font-size: ;">
                                        TOTAL PEPS
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn barlow semi_bold " style="font-size: ;">
                                    <div class="spinner-border text-primary" role="status" style="width: 2.5rem;height: 2.5rem;color: #007bff!important;" v-if="load_data == 1">
                                    </div>
                                    <div v-for="total in total_peps_sin_ticket" v-if="load_data != 1">
                                        {{total_pep_crm}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12" style="flex:20% !important;max-width: 20% !important;">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce ">
                            <div class="card-icon shadow-box-ag verde">
                                <i class="fas fa-ticket-alt" style="font-size: ;color: white">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header barlow bold">
                                    <h4 style="font-size: ;">
                                        PEPS SIN TICKET
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn barlow semi_bold " style="font-size: ;">
                                    <div class="spinner-border text-primary" role="status" style="width: 2.5rem;height: 2.5rem;color: #007bff!important;" v-if="load_data == 1">
                                    </div>
                                    <div v-for="total in total_peps_sin_ticket" v-if="load_data != 1">
                                        {{total.total_pep_sin_ticket}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12" style="flex:20% !important;max-width: 20% !important;">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce ">
                            <div class="card-icon shadow-box-ag " style="background-color: #3abaf4">
                                <i class="fas fa-dollar-sign" style="font-size: ;color: white">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header barlow bold">
                                    <h4 style="font-size: ;">
                                        TOTAL DISPONIBLE REAL
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn barlow semi_bold " style="font-size: ;">
                                    <div class="spinner-border text-primary" role="status" style="width: 2.5rem;height: 2.5rem;color: #007bff!important;" v-if="load_data == 1">
                                    </div>
                                    <div v-if="load_data != 1">
                                        ${{formatPrice(total_real_pep)}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12" style="flex:20% !important;max-width: 20% !important;">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce ">
                            <div class="card-icon shadow-box-ag " style="background-color: #ffa426">
                                <i class="fas fa-money-check-alt" style="font-size: ;color: white">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header barlow bold">
                                    <h4 style="font-size: ;">
                                        TOTAL COMPROMETIDO CLP
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn barlow semi_bold " style="font-size: ;">
                                    <div class="spinner-border text-primary" role="status" style="width: 2.5rem;height: 2.5rem;color: #007bff!important;" v-if="load_data == 1">
                                    </div>
                                    <div v-if="load_data != 1">
                                        ${{formatPrice(total_comprometido_clp)}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12" style="flex:20% !important;max-width: 20% !important;">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce ">
                            <div class="card-icon shadow-box-ag " style="background-color: rgb(0, 92, 255)">
                                <i class="fas fa-hand-holding-usd" style="font-size: ;color: white">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header barlow bold">
                                    <h4 style="font-size: ;">
                                        TOTAL
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn barlow semi_bold " style="font-size: ;">
                                    <div class="spinner-border text-primary" role="status" style="width: 2.5rem;height: 2.5rem;color: #007bff!important;" v-if="load_data == 1">
                                    </div>
                                    <div v-if="load_data != 1">
                                        ${{formatPrice(total_comprometido_clp + total_real_pep)}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a @click.prevent="select_modulo(4)" href="" style="color: #2d88ff">
                            <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce " v-bind:style=" modulo==4 ? 'background-color: rgb(0, 92, 255); border: 2px solid white;' : '' ">
                                <div class="card-icon shadow-box-ag verde" v-bind:style=" modulo==4 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-globe-americas" style="font-size: 28px;color: white" v-bind:style=" modulo==4 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==4 ? 'color: white; ' : '' ">
                                            RANKING CRM
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold " style="font-size: 35px;" v-bind:style=" modulo==4 ? 'color: white; ' : '' ">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce " v-bind:style=" modulo==1 ? 'background-color: rgb(0, 92, 255); border: 2px solid white;' : '' ">
                            <a @click="load()" @click.prevent="get_data(1)" href="" style="color: #2d88ff">
                                <div class="card-icon shadow-box-ag verde" v-bind:style=" modulo==1 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-lock-open" style="font-size: 28px;color: white" v-bind:style=" modulo==1 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==1 ? 'color: white; ' : '' ">
                                            PEPS APERTURADOS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold " style="font-size: 35px;" v-bind:style=" modulo==1 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status" style="width: 2.5rem;height: 2.5rem;color: #007bff!important;" v-if="load_data == 1">
                                        </div>
                                        <div v-if="load_data != 1">
                                            {{total_apertureado}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce " v-bind:style=" modulo==2 ? 'background-color: rgb(0, 92, 255); border: 2px solid white;' : '' ">
                            <a @click="load()" @click.prevent="get_data(2)" href="" style="color: #2d88ff">
                                <div class="card-icon shadow-box-ag rosa" v-bind:style=" modulo==2 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-slash" style="font-size: 28px;color: white" v-bind:style=" modulo==2 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==2 ? 'color: white; ' : '' ">
                                            PEPS ENVIADOS A CERRAR
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;" v-bind:style=" modulo==2 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status" style="width: 2.5rem;height: 2.5rem;color: #007bff!important;" v-if="load_data == 1">
                                        </div>
                                        <div v-if="load_data != 1">
                                            {{total_enviado_cerrar}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce " v-bind:style=" modulo==3 ? 'background-color: rgb(0, 92, 255); border: 2px solid white;' : '' ">
                            <a @click="load()" @click.prevent="get_data(3)" href="" style="color: #2d88ff">
                                <div class="card-icon shadow-box-ag " style="background-color:rgb(153, 153, 153);" v-bind:style=" modulo==3 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-window-close" style="font-size: 28px;color: white" v-bind:style=" modulo==3 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow bold">
                                        <h4 style="font-size: ;" v-bind:style=" modulo==3 ? 'color: white; ' : '' ">
                                            PEPS CERRADOS
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;" v-bind:style=" modulo==3 ? 'color: white; ' : '' ">
                                        <div class="spinner-border text-primary" role="status" style="width: 2.5rem;height: 2.5rem;color: #007bff!important;" v-if="load_data == 1">
                                        </div>
                                        <div v-if="load_data != 1">
                                            {{total_cerrados}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- DATA TABLE -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------- -->
                <div class="row">
                    <div class="col-12" v-if="modulo != 4">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-lg-1" id="btn_show">
                                    <button @click.prevent="show_filter" class="btn btn-primary">
                                        <i class="fas fa-filter">
                                        </i>
                                    </button>
                                </div>
                                <div class="col-lg-1" id="btn_hiden" style="display: none">
                                    <button @click.prevent="hiden_filter" class="btn btn-primary">
                                        <i class="fas fa-minus-circle">
                                        </i>
                                    </button>
                                </div>
                                <div class="col-lg-2" v-if="actualizar_data_sin_oc_sgc == 1">
                                    <button @click="update_data_pep" class="btn btn-info">
                                        Actualizar total SGC sin OC
                                    </button>
                                </div>
                            </div>
                            <div class="card-header animated fadeIn" id="filtros" style="display: none">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>
                                                Nemonico
                                            </label>
                                            <input @keyup.prevent="filter_data" class="form-control" name="" type="text" v-model="site_name"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>
                                                Categoria
                                            </label>
                                            <select @change="filter_data" class="form-control select" v-model="categoria">
                                                <option>
                                                </option>
                                                <option :value="1">
                                                    A
                                                </option>
                                                <option :value="2">
                                                    B
                                                </option>
                                                <option :value="3">
                                                    C
                                                </option>
                                                <option :value="4">
                                                    D
                                                </option>
                                                <option :value="5">
                                                    E
                                                </option>
                                                <option :value="6">
                                                    NN
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>
                                                Crm
                                            </label>
                                            <select @change="filter_data" class="form-control select" v-model="crm_id">
                                                <option>
                                                </option>
                                                <option :value="1">
                                                    Norte
                                                </option>
                                                <option :value="2">
                                                    Centro Norte
                                                </option>
                                                <option :value="3">
                                                    Metropolitano
                                                </option>
                                                <option :value="4">
                                                    Centro Sur
                                                </option>
                                                <option :value="5">
                                                    Sur
                                                </option>
                                                <option :value="6">
                                                    Austral
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>
                                                Zona
                                            </label>
                                            <select @change="filter_data" class="form-control select" v-model="zona">
                                                <option>
                                                </option>
                                                <option :value="1">
                                                    Arica
                                                </option>
                                                <option :value="2">
                                                    Iquique
                                                </option>
                                                <option :value="3">
                                                    Calama
                                                </option>
                                                <option :value="4">
                                                    Antofagasta
                                                </option>
                                                <option :value="5">
                                                    Copiapo
                                                </option>
                                                <option :value="6">
                                                    La Serena
                                                </option>
                                                <option :value="7">
                                                    Valparaiso
                                                </option>
                                                <option :value="8">
                                                    Metropolitana Oriente
                                                </option>
                                                <option :value="9">
                                                    Rancagua
                                                </option>
                                                <option :value="10">
                                                    Talca
                                                </option>
                                                <option :value="11">
                                                    Chillan
                                                </option>
                                                <option :value="12">
                                                    Concepción
                                                </option>
                                                <option :value="13">
                                                    Los Angeles
                                                </option>
                                                <option :value="14">
                                                    Temuco
                                                </option>
                                                <option :value="15">
                                                    Valdivia
                                                </option>
                                                <option :value="16">
                                                    Osorno
                                                </option>
                                                <option :value="17">
                                                    Puerto Montt
                                                </option>
                                                <option :value="18">
                                                    Chiloe
                                                </option>
                                                <option :value="19">
                                                    Coyhaique
                                                </option>
                                                <option :value="20">
                                                    Punta Arenas
                                                </option>
                                                <option :value="21">
                                                    Metropolitana Poniente
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>
                                                Tipo de pep
                                            </label>
                                            <select @change="filter_data" class="form-control select" v-model="tipo_pep_id">
                                                <option>
                                                </option>
                                                <option :value="1">
                                                    Batería
                                                </option>
                                                <option :value="2">
                                                    Falla mayor
                                                </option>
                                                <option :value="3">
                                                    Falla menor
                                                </option>
                                                <option :value="4">
                                                    Offgrid
                                                </option>
                                                <option :value="5">
                                                    Siniestro
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>
                                                Ework
                                            </label>
                                            <input @keyup="filter_data" class="form-control" name="" type="text" v-model="ework"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-2" style="margin-top: -40px;">
                                        <div class="form-group">
                                            <label>
                                                Pep
                                            </label>
                                            <input @keyup="filter_data" class="form-control" name="" type="text" v-model="pep"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive project-list project-table ">
                                    <table class="table table-hover">
                                        <thead class="">
                                            <tr>
                                                <th class="barlow bold">
                                                    #
                                                </th>
                                                <th class="barlow bold" style="width: 50px;text-align: center">
                                                    SITIO
                                                </th>
                                                <th class="barlow bold" style="width: 200px;text-align: center">
                                                    T.PEP / FLUJO
                                                </th>
                                                <th class="barlow bold " style="text-align: center">
                                                    EWORK / PEP
                                                </th>
                                                <th class="barlow bold" style="width: 200px;text-align: center">
                                                    PPTO SAP / REAL
                                                </th>
                                                <th class="barlow bold" style="width: 300px;text-align: center">
                                                    Comprometido CLP / Activación pendiente
                                                </th>
                                                <th class="barlow bold" style="width: 200px;text-align: center">
                                                    SGC SIN OC / DIS. REAL
                                                </th>
                                                <th class="barlow bold" style="text-align: center">
                                                    ESTADO
                                                </th>
                                                <th class="barlow bold">
                                                    OPCIONES
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody v-if="load_data == 2">
                                            <tr style="height: 220px;border-color: black !important;" v-for="pep in peps.data">
                                                <td style="border-bottom: 2px solid #191919;border-right: 1px solid #191919;text-align: center">
                                                    <a :href="'/data-pep-asociate/'+ pep.id" style="margin-top: 120px;" target="blank__">
                                                        <span class="badge boxBounce barlow regular" style="background-color: #005cff;color: white;border-radius: 5px;font-size: 15px">
                                                            {{pep.id}}
                                                        </span>
                                                    </a>
                                                    <div style="margin-top: 10px">
                                                        <strong class="barlow semi_bold">
                                                            Fecha término
                                                        </strong>
                                                        <p class="barlow regular">
                                                            {{formato(pep.fecha_termino_sap)}}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td style="border-bottom: 2px solid #191919;border-right: 1px solid #191919;text-align: center">
                                                    <div>
                                                        <div class="barlow semi_bold">
                                                            <span class="badge" style="border-radius: 5px;background-color: rgb(255, 164, 38);color: white">
                                                                {{pep.site ? pep.site.nem_site :''}}
                                                            </span>
                                                        </div>
                                                        <div style="margin-top: 5px;" v-if="pep.site">
                                                            <span :style=" pep.site.pop.comuna.zona.crm.id == 1 ? 'background-color:#FF3D00;color:white':(pep.site.pop.comuna.zona.crm.id == 2 ? 'background-color:#FF753A;color:white':(pep.site.pop.comuna.zona.crm.id == 3 ? 'background-color:#999999;color:white':(pep.site.pop.comuna.zona.crm.id == 4 ? 'background-color:#748EFE;color:white':(pep.site.pop.comuna.zona.crm.id == 5 ? 'background-color:#005CFF;color:white':(pep.site.pop.comuna.zona.crm.id == 6 ? 'background-color:#24B2EA;color:white':''))))) " class="barlow semi_bold badge" style="border-radius: 5px;">
                                                                {{pep.site ? pep.site.pop.comuna.zona.crm.nombre_crm :''}}
                                                            </span>
                                                        </div>
                                                        <div class="barlow semi_bold" style="margin-top: 5px;width: 130px;">
                                                            {{pep.site ? pep.site.nombre :''}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="border-bottom: 2px solid #191919;border-right: 1px solid #191919;text-align: center">
                                                    <div>
                                                        <div>
                                                            <strong class="barlow semi_bold" style="font-size: 13px;">
                                                                TIPO DE PEP
                                                            </strong>
                                                        </div>
                                                        <div class="barlow bold" style="font-size:16px ">
                                                            {{pep.tipo_pep ? pep.tipo_pep.descripcion :'0'}}
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 18px;">
                                                        <div>
                                                            <strong class="barlow semi_bold" style="font-size: 13px;">
                                                                FLUJO
                                                            </strong>
                                                        </div>
                                                        <div class="barlow bold" style="font-size:16px ">
                                                            {{pep.flujo ? pep.flujo.descripcion :'0'}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="border-bottom: 2px solid #191919;border-right: 1px solid #191919;text-align: center">
                                                    <div>
                                                        <div>
                                                            <strong class="barlow semi_bold" style="font-size: 13px;">
                                                                EWORK
                                                            </strong>
                                                        </div>
                                                        <div class="barlow bold" style="font-size:16px ">
                                                            {{pep.ework}}
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 18px;">
                                                        <div>
                                                            <strong class="barlow semi_bold" style="font-size: 13px;">
                                                                PEP
                                                            </strong>
                                                        </div>
                                                        <div class="barlow bold" style="font-size:16px ">
                                                            {{pep.pep}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="border-bottom: 2px solid #191919;border-right: 1px solid #191919;text-align: center">
                                                    <div>
                                                        <strong class="barlow semi_bold" style="font-size: 13px;">
                                                            PPTO SAP
                                                        </strong>
                                                        <div class="barlow bold" style="font-size:16px ">
                                                            {{pep.ppto_sap ? '$'+formatPrice(pep.ppto_sap) :'0'}}
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 18px;">
                                                        <div>
                                                            <strong class="barlow semi_bold" style="font-size: 13px;">
                                                                REAL
                                                            </strong>
                                                        </div>
                                                        <div class="barlow bold" style="font-size:16px ">
                                                            {{pep.real_sap ? '$'+formatPrice(pep.real_sap) :'0'}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="border-bottom: 2px solid #191919;border-right: 1px solid #191919;text-align: center">
                                                    <div>
                                                        <strong class="barlow semi_bold" style="font-size: 13px;">
                                                            COMPROMETIDO CLP
                                                        </strong>
                                                        <div class="barlow bold" style="font-size:16px ">
                                                            {{pep.comprometido_clp ? '$'+formatPrice(pep.comprometido_clp) :'0'}}
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 18px;">
                                                        <div>
                                                            <strong class="barlow semi_bold" style="font-size: 13px">
                                                                ACTIVACIÓN PENDIENTE
                                                            </strong>
                                                        </div>
                                                        <div class="barlow bold" style="font-size:16px ">
                                                            {{pep.activacion_pendiente ? '$'+formatPrice(pep.activacion_pendiente) :'0'}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="border-bottom: 2px solid #191919;border-right: 1px solid #191919;text-align: center">
                                                    <div>
                                                        <strong class="barlow semi_bold" style="font-size: 13px;">
                                                            TOTAL SGC SIN OC
                                                        </strong>
                                                        <div class="barlow bold" style="font-size:16px ">
                                                            {{pep.total_pep ? '$'+formatPrice(pep.total_pep.total) :'0'}}
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 18px;">
                                                        <div>
                                                            <strong class="barlow semi_bold" style="font-size: 13px;">
                                                                DISPONIBLE REAL
                                                            </strong>
                                                        </div>
                                                        <div class="barlow bold" style="font-size:16px ">
                                                            {{pep.disponible_real ? '$'+formatPrice(pep.disponible_real) :'0'}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="border-bottom: 2px solid #191919;border-right: 1px solid #191919;text-align: center">
                                                    <div>
                                                        <span :style="'background-color:'+pep.estado.color+';'" class="badge blanco barlow semi_bold" style="border-radius:5px;font-size:13px;">
                                                            {{pep.estado ? pep.estado.descripcion:''}}
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <span :style="'background-color:'+pep.subestado.color+';'" class="badge blanco barlow semi_bold" style="margin-top:5px;border-radius:5px;font-size:13px;" v-if="pep.subestado_id != null">
                                                            {{pep.subestado ? pep.subestado.descripcion:''}}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td style="border-bottom: 2px solid #191919;">
                                                    <div class="col-md-6 col-sm-6 col-12">
                                                        <button @click.prevent="aprobar_solicitud_pep(pep)" class="btn btn-success" v-if="pep.estado_id == 1 && solicitar_cierre_pep_aperturado == 1">
                                                            <i class="fas fa-check">
                                                            </i>
                                                        </button>
                                                    </div>
                                                    <div style="margin-top: -15px;" v-if="confirmar_cierre_pep == 1">
                                                        <div class="col-md-6 col-sm-6 col-12" v-if="pep.subestado_id == 3">
                                                            <a class="titletip" href="#">
                                                                <button @click.prevent="aprobar_solicitud_pep(pep)" class="btn btn-success">
                                                                    <i class="fas fa-check">
                                                                    </i>
                                                                </button>
                                                                <span class="textTop">
                                                                    Cerrar pep
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-12">
                                                            <a class="titletip" href="#">
                                                                <button @click.prevent="aperturar_pep(pep)" class="btn shadow-box-ag " id="btn_aperturar" style="background-color: #42E8B4;color:white;" v-if="pep.estado_id == 2  ">
                                                                    <i class="fas fa-lock-open">
                                                                    </i>
                                                                </button>
                                                                <span class="textTop">
                                                                    Aperturar pep
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-12" v-if="pep.subestado_id != 4 && pep.subestado_id != 3 ">
                                                            <a class="titletip" href="#">
                                                                <button :class=" pep.subestado_id == null? 'btn btn-primary':(pep.subestado_id == 1 ? 'btn btn btn-danger':(pep.subestado_id == 2 ? 'btn btn-secondary':''))" @click="cambiarSubestado(pep)" v-if="pep.estado_id == 2 && confirmar_cierre_pep == 1">
                                                                    <i :class=" pep.subestado_id == null ? 'fas fa-envelope':(pep.subestado_id == 1 ? 'fas fa-ban':(pep.subestado_id==2 ? 'fas fa-file-signature':''))" style="">
                                                                    </i>
                                                                </button>
                                                                <span class="textTop">
                                                                    {{pep.subestado_id == null ? 'Correo enviado a CG':(pep.subestado_id == 1 ? 'Bloqueo en SAP':(pep.subestado_id==2 ? 'Con acta final':''))}}
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-12" v-if="pep.estado_id == 2  ">
                                                            <a class="titletip" href="#">
                                                                <button @click.prevent="revision_pep(pep)" class="btn btn-warning ">
                                                                    <i :class="pep.subestado_id == null ? 'fas fa-fa-eye':(pep.subestado_id == 4 ? 'fas fa-eye-slash':'')" class="fas fa-eye">
                                                                    </i>
                                                                </button>
                                                                <span class="textTop">
                                                                    {{pep.subestado_id == null || pep.subestado_id != 4 ? 'Dejar en revisión':(pep.subestado_id == 4 ? 'Finalizar revisión':'')}}
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-12" v-if="pep.subestado_id != null && pep.subestado_id != 4 ">
                                                            <a class="titletip" href="#">
                                                                <button @click="volverEstado(pep)" class="btn btn-secondary">
                                                                    <i class="fas fa-arrow-left">
                                                                    </i>
                                                                </button>
                                                                <span class="textTop">
                                                                    Voler a {{pep.subestado_id == 3 ?'Bloqueo en SAP':(pep.subestado_id == 2 ? 'Correo enviado a CG':(pep.subestado_id == 1 ? 'sin proceso de cierre':''))}}
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 col-md-12 col-sm-12" v-if="load_data == 1 || load_data == 3 ">
                                    <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                        <div class="card-body">
                                            <div class="empty-state" data-height="400">
                                                <div class="d-flex justify-content-center" v-if="load_data == 1 || load_data == 3">
                                                    <div class="spinner-border text-primary" role="status" style="width: 8rem;height: 8rem;color: #007bff!important;">
                                                        <span class="sr-only" style="color: #191919">
                                                            Cargando...
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-top: 30px;">
                                    <nav aria-label="pagination" class="pagination" role="navigation">
                                        <vue-pagination :offset="4" :pagination="peps" @paginate="filter_data()">
                                        </vue-pagination>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" style="margin-bottom: 70px" v-if="modulo == 4">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-lg-4 ">
                                    <button :class="ranking_historico == 1 ? 'btn-info' : 'btn-primary'" @click="get_ranking_historico" class="btn " v-text="ranking_historico == 1 ? 'Ranking actual':'Ver ranking historico'">
                                    </button>
                                </div>
                                <div class="col-lg-4 " v-if="ranking_historico==1">
                                    <div class="form-group">
                                        <label>
                                            Seleccione una fecha
                                        </label>
                                        <select @change.prevent="search_data_old_ranking" class="select form-control" v-model="fecha_filtro_ranking">
                                            <option v-for="fechas_filtro in fechas_filtro_ranking">
                                                {{(fechas_filtro.fecha)}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class=" table-responsive project-list project-table">
                                    <table class="table table-hover ">
                                        <thead class="">
                                            <tr>
                                                <th class="barlow bold" width="50px">
                                                    Posición
                                                </th>
                                                <th class="barlow bold">
                                                    Crm
                                                </th>
                                                <th class="barlow bold" style="text-align:center" v-if="ranking_historico == 0">
                                                    Cantidad de PEPS
                                                </th>
                                                <th class="barlow bold" style="text-align:center" v-if="ranking_historico == 0">
                                                    Promedio de días aperturado
                                                </th>
                                                <th class="barlow bold">
                                                    Disponible Real
                                                </th>
                                                <th class="barlow bold">
                                                    Comprometido CLP
                                                </th>
                                                <th class="barlow bold">
                                                    Total
                                                </th>
                                                <th v-if="ranking_historico == 1">
                                                    Fecha
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(ran,index) in ranking" v-if="ranking_historico == 0">
                                                <td style="text-align: center;font-size: 15px;font-weight: 700">
                                                    {{addValue(index)}}
                                                </td>
                                                <td>
                                                    <span :style=" ran.nombre_crm == 'Norte' ? 'background-color:#FF3D00;color:white':
                                                     (ran.nombre_crm == 'Centro Norte' ? 'background-color:#FF753A;color:white':
                                                     (ran.nombre_crm == 'Metropolitano' ? 'background-color:#999999;color:white':
                                                     (ran.nombre_crm == 'Centro Sur' ? 'background-color:#748EFE;color:white':
                                                     (ran.nombre_crm == 'Sur' ? 'background-color:#005CFF;color:white':
                                                     (ran.nombre_crm == 'Austral' ? 'background-color:#24B2EA;color:white':''))))) " class="badge">
                                                        {{ran.nombre_crm}}
                                                    </span>
                                                </td>
                                                <td style="text-align:center">
                                                    {{ran.cantidad_pep}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{ran.promedio_dias}}
                                                </td>
                                                <td>
                                                    ${{formatPrice(ran.disponible_real)}}
                                                </td>
                                                <td>
                                                    ${{formatPrice(ran.comprometido_clp)}}
                                                </td>
                                                <td>
                                                    <div style="font-weight: 600;font-size: 16px;color: rgb(0, 92, 255)">
                                                        ${{formatPrice(ran.total)}}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr v-for="(ran,index) in data_old_ranking" v-if="ranking_historico == 1">
                                                <td style="text-align: center;font-size: 15px;font-weight: 700">
                                                    {{addValue(index)}}
                                                </td>
                                                <td>
                                                    <span :style=" ran.nombre_crm == 'Norte' ? 'background-color:#FF3D00;color:white':
                                                     (ran.nombre_crm == 'Centro Norte' ? 'background-color:#FF753A;color:white':
                                                     (ran.nombre_crm == 'Metropolitano' ? 'background-color:#999999;color:white':
                                                     (ran.nombre_crm == 'Centro Sur' ? 'background-color:#748EFE;color:white':
                                                     (ran.nombre_crm == 'Sur' ? 'background-color:#005CFF;color:white':
                                                     (ran.nombre_crm == 'Austral' ? 'background-color:#24B2EA;color:white':''))))) " class="badge">
                                                        {{ran.nombre_crm}}
                                                    </span>
                                                </td>
                                                <td>
                                                    ${{formatPrice(ran.disponible_real)}}
                                                </td>
                                                <td>
                                                    ${{formatPrice(ran.comprometido_clp)}}
                                                </td>
                                                <td>
                                                    <div style="font-weight: 600;font-size: 16px;color: rgb(0, 92, 255)">
                                                        ${{formatPrice(ran.total)}}
                                                    </div>
                                                </td>
                                                <td>
                                                    {{formato(ran.created_at)}}
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
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
import moment from 'moment';
import VuePagination from '../VuePagination.vue';



export default {
       props:['permisos'],
       components: {
            
            'vue-pagination': VuePagination,
           
           

        },
     
    data(){
        return{
          ranking_historico:0,
          total_apertureado:'',
          total_enviado_cerrar:'',
          total_cerrados:'',
          total_comprometido_clp:0,
          total_real_pep:0,
          peps: {
                'total': 0,
                'current_page': 1,
                'per_page': 10,

                'from': 2,
                'to': 0

          },
          file:'',

          estado:'',
          load_data:1,
          site_name:'',
          crm_id:'',
          categoria:'',
          flujo_id:'',
          ework:'',
          pep:'',
          zona:'',
          ranking:[],
          modulo:4,
          solicitar_cierre_pep_aperturado:0,
          confirmar_cierre_pep:0,
          actualizar_data_sin_oc_sgc:0,
          opciones_carga_masiva:0,
          tipo_pep_id:'',
          total_peps_sin_ticket:'',
          fechas_filtro_ranking:'',
          fecha_filtro_ranking:'',
          data_old_ranking:[],
          total_pep_crm:0,
          calcular:0,
          actualizacion:'',
          filtro:0,
          opciones:''


        }
    },
   

    created:function(){
        this.get_data();



    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        
        
        for (var i = 0; i < this.permisos.length; i++) {
          let permiso = this.permisos[i]
          if (permiso.permission_id == 195) {
              this.solicitar_cierre_pep_aperturado = 1;
            
          }
          if (permiso.permission_id == 196) {
              this.confirmar_cierre_pep = 1;
          }
          if (permiso.permission_id == 197) {
              this.actualizar_data_sin_oc_sgc = 1;
          }
          if (permiso.permission_id == 198) {
              this.opciones_carga_masiva = 1;
          }
          if (permiso.permission_id == 199) {
              this.opciones = 1;
          }
         
        }

        let upload = document.getElementById("upload_file_pep");
        let input = document.getElementById("input_file_pep");
        upload.addEventListener('click', function(){
         
                 input.click()
                
            
        });
    },
    methods:{
      formato: function(d) {
        return moment(d).format("DD/MM/YYYY");
      },
       
      load:function()
      {
        this.load_data = 3;
 

     },
     revision_pep:function(pep){
        axios.get(`/set-estado-revision?pep_id=${pep.id}`).then(response=>{
            this.mensajeExito(response.data)
           this.get_data()
       })
 
     },
    
     cambiarSubestado:function(pep){
       axios.get(`/update-subestado-pep?pep_id=${pep.id}`).then(response=>{
           this.mensajeExito(response.data)
           this.get_data()
       })
     }, 
     volverEstado:function(pep){
        axios.get(`/back-subestado-pep?pep_id=${pep.id}`).then(response=>{
           this.mensajeExito(response.data)
           this.get_data()
       })
     },
     get_ranking_historico:function(){
        if(this.ranking_historico == 0){
            this.ranking_historico = 1;
        }else{
            if(this.ranking_historico == 1){
                 this.ranking_historico = 0;
                 this.get_data();

            }
        }
       

     },
     aperturar_pep:function(pep){
        axios.get(`/update-pep-re-apertura?pep_id=${pep.id}`).then(response=>{
           this.get_data()
       })
     },
     get_data:function(state){

        this.clearfiltro();

        if(state == null){
            var estatus = this.estado;
        }else{
            var estatus = state;
            this.estado = state;
            this.modulo = state;
        }
        if(status != 4 || this.modulo!= 4){
            this.fecha_filtro_ranking = '';
            this.ranking_historico = 0;

        }
        this.peps.current_page = 1;
        this.total_comprometido_clp = 0;
        this.total_real_pep = 0;
        this.total_pep_crm = 0;
        axios.get(`/get-data-control-pep?page=${this.peps.current_page}&estado=${estatus}`).then(response=>{
              this.total_apertureado = response.data.pep_aperturado;
              this.total_enviado_cerrar = response.data.pep_enviado_cerrar;
              this.total_cerrados = response.data.pep_cerrado;
              this.peps = response.data.peps
              this.ranking = response.data.ranking;
              this.total_peps_sin_ticket = response.data.total_peps_sin_ticket;
              this.fechas_filtro_ranking = response.data.fechas;
              this.actualizacion = response.data.ultima_fecha;

             
                for (var i = 0; i < response.data.ranking.length; i++) {
                 let data = response.data.ranking[i]
                 this.total_comprometido_clp += data.comprometido_clp;
                 this.total_real_pep += data.disponible_real;
               
                }
              
               

                this.total_pep_crm = response.data.pep_total;

             
                /*for (var i = 0; i < response.data.ranking.length; i++) {
                let data = response.data.ranking[i]
              
                this.total_pep_crm += data.cantidad_pep
                

                }
              */
              
              
              
            

              
        }).finally(() => this.load_data=2)
      },
      search_data_old_ranking:function(){
           this.total_comprometido_clp = 0;
           this.total_real_pep = 0;
           
           axios.get(`/old-data-ranking?fecha=${this.fecha_filtro_ranking}`).then(response=>{
              this.data_old_ranking = response.data;
               for (var i = 0; i < response.data.length; i++) {
                 let data = response.data[i]
                 this.total_comprometido_clp += data.comprometido_clp;
                 this.total_real_pep += data.disponible_real;

               
                }

           })
      },

      select_modulo:function(modulo){
          this.modulo = modulo;
          document.getElementById("btn_show").style.display = 'block'
          document.getElementById("btn_hiden").style.display = 'none'
          document.getElementById("filtros").style.display = 'none'
      },
    
      filter_data:function(){
         axios.get(`/get-data-control-pep?page=${this.peps.current_page}&estado=${this.estado}&site=${this.site_name}&crm=${this.crm_id}&categoria=${this.categoria}&flujo_id=${this.flujo_id}&pep=${this.pep}&ework=${this.ework}&zona=${this.zona}&tipo_pep_id=${this.tipo_pep_id}`).then(response=>{
              this.total_apertureado = response.data.pep_aperturado;
              this.total_enviado_cerrar = response.data.pep_enviado_cerrar;
              this.peps = response.data.peps
        }).finally(() => this.load_data=2)

      },
      clearfiltro:function(){
        this.site_name = '';
        this.crm_id = '';
        this.categoria = '';
        this.flujo_id = '';
        this.pep = '';
        this.ework = '';
        this.zona = '';
        this.tipo_pep_id = '';

        if(this.filtro == 1){

            this.hiden_filter()
        }

      },
      formatPrice(value) {
         if (value % 1 == 0) {
      
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
          } else {
            let val = (value/1).toFixed(2).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
         }
      
       },
       addValue(value){
          let new_val = value +1;
          return new_val;
       },
        getFile:function(e){

        let file = e.target.files[0];
        this.file = file;
       

        this.uploadFile();
       
        },

        uploadFile:function(){
        let formData = new FormData();
        formData.append('filepep',this.file);
        this.load_data = 1;
        axios.post('/upload-pep-data',formData).then(response=>{
            $("#input_file_pep").val('');
           
        }).finally(()=>this.get_data());
      
        

       },
       show_filter:function(){
         this.filtro = 1;
         document.getElementById("btn_show").style.display = 'none'
         document.getElementById("btn_hiden").style.display = 'block'
  
         document.getElementById("filtros").style.display = 'block'
       },
       hiden_filter:function(){
         this.filtro = 0;
         document.getElementById("btn_show").style.display = 'block'
         document.getElementById("btn_hiden").style.display = 'none'
  
         document.getElementById("filtros").style.display = 'none'
       },
       aprobar_solicitud_pep:function(pep){

              if(pep.estado_id == 1){
                Swal.fire({
                 type:'warning',   
                 title: 'Desea confirmar que no imputara más costos a este pep nro°'+' '+pep.pep+'?',
                 showDenyButton: true,
                 showCancelButton: true,
                 confirmButtonText: `Aceptar`,
                 cancelButtonText: `Cancelar`,
                 denyButtonText: `Don't save`,
               }).then((result) => {
                 
                 if (result.value == true) {
                      axios.get('/change-status-request/'+pep.id).then(response=>{
                      }).finally(this.get_data());
                 } else if (result.isDenied) {
                     Swal.fire('Changes are not saved', '', 'info')
                 }
               })
            
              }else{
                 axios.get('/change-status-request/'+pep.id).then(response=>{
                   
                 }).finally(this.get_data());
              }
              
       },
       update_data_pep:function(){
       
        this.load_data = 3;
         console.log(this.load_data);
        axios.get('/calculate-total-sgc-pep').then(response=>{
                   
        }).finally(this.get_data());
       },
       mensajeExito:function(mensaje){
          this.$swal({
                  type: 'success',
                  title: mensaje,
                  showCloseButton: true,
            });
       }

      
    }
}
</script>

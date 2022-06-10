<template>
    <div>
        <div class="main-content">
            <section class="section">
                <div class="section-header box-shadow-new-card ">
                
                    <div class="row"  id="head_data_ticket">
                        <div class="col-lg-5 col-md-6 col-sm-6 col-12 ">
                            <div class="card-stats-title">
                                <h1 class="barlow bold" style="font-size: 23px;">
                                    Ticket Nro° {{ticket.id}} -
                                    <span style="font-size: 20px; color:#3abaf4">
                                        <strong>
                                            {{ticket.tipo_motivo ? ticket.tipo_motivo.descripcion:''}}
                                            {{ticket.tipo_mantencion_id != null ?
                                            ticket.tipo_mantencion.descripcion:''}}
                                        </strong>
                                    </span>
                                </h1>
                                <h5 class="barlow semi_bold" style="font-size:20px;">
                                    {{ticket.estado ? ticket.estado.descripcion:''}}
                                </h5>
                                <button @click.prevnt="datosTicektShow" class="btn shadow-box-ag boxBounce" id="BtnBack"
                                    style="display: none; background-color: #3386ff;color: white;">
                                    <i class="fas fa-arrow-left">
                                    </i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6 col-12 ">
                            <div class="card-stats-title barlow bold">
                                <h1 style="font-size: 20px;margin-top: 7px;">
                                    {{ticket.site ? ticket.site.nem_site : '' }} - {{ticket.site ? ticket.site.nombre :
                                    ''}}
                                </h1>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12 ">
                            <form @submit="SearchTicket">
                                <div class="search-element" style="margin-left: ;">
                                    <input aria-label="Search" class="form-control" placeholder="Buscar Ticket"
                                        type="search" v-model="searchidTicket">
                                    <button class="btn" style="display: none" type="submit">
                                        <i class="fas fa-search">
                                        </i>
                                    </button>
                                    </input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row" id="linea1">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 ">
                    <div class="card card-hero box-shadow-new-card border-r-8">
                        <div class="card-header car_header_ticket_detail  border-r-top">
                            <div class="card-icon">
                                <i class="fas fa-ticket-alt green_secondary_color">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Ticket
                            </h4>
                            <div class="card-description barlow regular">
                                Datos del ticket
                            </div>
                        </div>
                        <div class="animated fadeIn">
                            <div class="card-body p-0 border-r-bottom">
                                <div class="empty-state" data-height="400" v-if="load_data == 0">
                                    <div class="d-flex justify-content-center">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 6rem;height: 6rem;color: #007bff!important;">
                                            <span class="sr-only" style="color: #191919">
                                                Cargando...
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tickets-list" v-if="load_data == 1"
                                    style="max-height:380px;overflow-y:auto">
                                    <div class="ticket-item" v-if="ticket.tipo_motivo_id == 8">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#005cff;">
                                                        Equipo/Material
                                                    </h4>
                                                </div>
                                                <div v-if="ticket.activo_id == 1">
                                                    Equipo
                                                </div>
                                                <div v-if="ticket.activo_id == 2">
                                                    Material
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#005cff;">
                                                        Descripción Equipo/Material
                                                    </h4>
                                                </div>
                                                <div>
                                                    {{ticket.descripcion_activo}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#005cff;">
                                                        Código SAP
                                                    </h4>
                                                </div>
                                                <div>
                                                    {{ticket.cod_sap}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item" v-if="ticket.tipo_motivo_id == 8">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#005cff;">
                                                        Cantidad
                                                    </h4>
                                                </div>
                                                <div>
                                                    {{ticket.cantidad_activo}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#005cff;">
                                                        Fecha puesta en marcha
                                                    </h4>
                                                </div>
                                                <div>
                                                    {{formatoDos(ticket.fecha_puesta_marcha)}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#005cff;">
                                                        Valor estimado
                                                    </h4>
                                                </div>
                                                <div>
                                                    ${{ticket.valor_estimado | currency }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item" v-if="ticket.tipo_motivo_id != 8">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Área
                                                    </h4>
                                                </div>
                                                <div class="barlow regular" v-if="ticket.area_id != null">
                                                    {{ticket.area.descripcion}}
                                                </div>
                                                <button class="btn btn-primary" data-toggle="modal"
                                                    data-target="#addInfoTicket"
                                                    v-if="ticket.area_id == null && ticket.tipo_motivo_id == 12"><i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Técnica
                                                    </h4>
                                                </div>
                                                <div class="barlow regular" v-if="ticket.tecnica_id != null">
                                                    {{ticket.tecnica.descripcion}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Equipo
                                                    </h4>
                                                </div>
                                                <div class="barlow regular" v-if="ticket.equipo_id != null">
                                                    {{ticket.equipo.descripcion}}
                                                </div>
                                                <div class="ticket-title barlow semi_bold"
                                                    v-if="ticket.cantidad_equipo != null">
                                                    <h4 class="barlow regular" style="color:#005cff;">
                                                        Cantidad
                                                    </h4>
                                                </div>
                                                <div class="barlow regular" v-if="ticket.cantidad_equipo != null">
                                                    {{ticket.cantidad_equipo}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Motivo
                                                        <a data-toggle="modal" href="#EditMotivoTicket"
                                                            v-if="editarMotivo== 1">
                                                            <i class="fas fa-edit boxBounce">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{ticket.tipo_motivo ? ticket.tipo_motivo.descripcion:''}}
                                                    {{ticket.tipo_mantencion ? ticket.tipo_mantencion.descripcion:''}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Descripción
                                                        <a @click.prevent="editDescription(ticket)" href="">
                                                            <i class="fas fa-edit boxBounce">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{ticket.descripcion}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Creador
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{ticket.user.name}} {{ticket.user.apellido}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Fecha Creación
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{ticket.created_at ? formato(ticket.created_at):''}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Nro Office Track
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{ticket.nro_tarea_office}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title class barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Ework
                                                        <a data-toggle="modal" href="#edit_ework"
                                                            v-if="ticket.ework != null && editar_nro_ework == 1 || ticket.ework != null && user.id == 25 ">
                                                            <i class="fas fa-edit">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class="barlow regular" v-if="ticket.ework != null">
                                                    {{ticket.ework}}
                                                </div>
                                                <div class="form-inline" id="inputEwork" v-if="ticket.ework == null ">
                                                    <div v-if="editar_nro_ework==1 || user.id == 25">
                                                        <input class="form-control" name="ework" style="width:90px;"
                                                            type="text" v-model="nroEwork" />
                                                        <a @click.prevent="AddEwork()" href="">
                                                            <i class="fas fa-save" style="font-size:22px;">
                                                            </i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Prevalorización
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    ${{ticket.prevalorizacion | currency}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Elementos
                                                    </h4>
                                                </div>
                                                <div>
                                                    <button @click.prevent="getElementos()"
                                                        class="btn btn-info barlow semi_bold"
                                                        data-target="#ModalElementos" data-toggle="modal">
                                                        ver elementos
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12" v-if="ticket.inputacion">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        {{ticket.inputacion ? ticket.inputacion.descripcion :'' }}
                                                        <a href="" v-if="eliminarImputacion == 1">
                                                            <i @click.prevent="deleteimputacion(ticket.id)"
                                                                class="fas fa-times-circle" style="color:#ed5565;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{ticket.nro_imputacion}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        PEP puesta en marcha/origen
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{ticket.pep_resago}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item" v-if="tps != 0">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-6 col-sm-6 col-12" v-for="tp in  tps">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Nro° Tp
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{tp.nro_tp}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 ">
                    <div class="card card-hero  box-shadow-new-card border-r-8">
                        <div class="card-header car_header_ticket_detail border-r-top">
                            <div class="card-icon">
                                <i class="fas fa-globe-americas green_secondary_color">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Sitio
                            </h4>
                            <div class="card-description barlow regular">
                                Datos del sitio
                                <a data-toggle="modal" href="#ModalEditSite" style="color: white;">
                                    <i class="fas fa-edit boxBounce">
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="animated fadeIn">
                            <div class="card-body p-0 border-r-bottom" style="max-height:376px;overflow-y:auto">
                                <div class="empty-state" data-height="400" v-if="load_data == 0">
                                    <div class="d-flex justify-content-center">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 6rem;height: 6rem;color: #007bff!important;">
                                            <span class="sr-only" style="color: #191919">
                                                Cargando...
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tickets-list" v-if="load_data == 1">
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Nombre
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{ticket.site.nombre}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Nemonico
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{ticket.site.nem_site}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Tipo
                                                    </h4>
                                                </div>
                                                <div class="barlow regular" v-if="ticket.site.site_type_id==1">
                                                    FIJO
                                                </div>
                                                <div class="barlow regular" v-if="ticket.site.site_type_id==2">
                                                    MOVIL
                                                </div>
                                                <div class="barlow regular" v-if="ticket.site.site_type_id==3">
                                                    SWITCH
                                                </div>
                                                <div class="barlow regular" v-if="ticket.site.site_type_id==4">
                                                    PHONE
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row wrapper wrapper-content">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Clasificación
                                                    </h4>
                                                </div>
                                                <span class="badge barlow regular"
                                                    style="background-color:#42e8b4;color: white; "
                                                    v-if="ticket.site.classification_type_id == 1 ">
                                                    A
                                                </span>
                                                <span class="badge barlow regular"
                                                    style="background-color:#005cff;color: white; "
                                                    v-if="ticket.site.classification_type_id == 2 ">
                                                    B
                                                </span>
                                                <span class="badge badge-warning barlow regular" style=""
                                                    v-if="ticket.site.classification_type_id == 3 ">
                                                    C
                                                </span>
                                                <span class="badge barlow regular"
                                                    style="background-color:#6c757d;color: white ; "
                                                    v-if="ticket.site.classification_type_id == 4 ">
                                                    D
                                                </span>
                                                <span class="badge barlow regular"
                                                    style="background-color:#6c757d;color: white ; "
                                                    v-if="ticket.site.classification_type_id == 5 ">
                                                    E
                                                </span>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Atención en Terreno
                                                    </h4>
                                                </div>
                                                <span class="badge badge-info barlow regular" style="font-size: 15px;"
                                                    v-if="ticket.site.attention_priority_type_id == 1">
                                                    P1
                                                </span>
                                                <span class="badge badge-success barlow regular"
                                                    style="font-size: 15px;"
                                                    v-if="ticket.site.attention_priority_type_id == 2">
                                                    P2
                                                </span>
                                                <span class="badge badge-dark barlow regular" style="font-size: 15px;"
                                                    v-if="ticket.site.attention_priority_type_id == 3">
                                                    P3
                                                </span>
                                                <span class="badge badge-light barlow regular" style="font-size: 15px;"
                                                    v-if="ticket.site.attention_priority_type_id == 4">
                                                    P4
                                                </span>
                                                <span class="badge badge-light barlow regular" style="font-size: 15px;"
                                                    v-if="ticket.site.attention_priority_type_id == 5">
                                                    P5
                                                </span>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Tipo de Atención
                                                    </h4>
                                                </div>
                                                <div class="barlow regular" v-if="ticket.site.attention_type_id == 1">
                                                    5X8
                                                </div>
                                                <div class="barlow regular" v-if="ticket.site.attention_type_id == 2">
                                                    24/7
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row wrapper wrapper-content">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Planificación
                                                    </h4>
                                                </div>
                                                <span class="badge badge-info barlow regular" style="font-size: 15px;"
                                                    v-if="ticket.site.category_type_id ==1">
                                                    A
                                                </span>
                                                <span class="badge badge-success barlow regular"
                                                    style="font-size: 15px;" v-if="ticket.site.category_type_id ==2">
                                                    A+
                                                </span>
                                                <span class="badge badge-dark barlow regular" style="font-size: 15px;"
                                                    v-if="ticket.site.category_type_id ==3">
                                                    A++
                                                </span>
                                                <span class="badge badge-light barlow regular" style="font-size: 15px;"
                                                    v-if="ticket.site.category_type_id ==4">
                                                    B+
                                                </span>
                                                <span class="badge badge-primary barlow regular"
                                                    style="font-size: 15px;" v-if="ticket.site.category_type_id ==5">
                                                    C
                                                </span>
                                                <span class="badge badge-danger barlow regular" style="font-size: 15px;"
                                                    v-if="ticket.site.category_type_id ==6">
                                                    C+
                                                </span>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Bafi
                                                    </h4>
                                                </div>
                                                <div class="barlow regular" v-if="ticket.site.bafi == 1">
                                                    <i class="fas fa-check" style="color:#47c363;font-size:18px;">
                                                    </i>
                                                </div>
                                                <div class="barlow regular" v-if="ticket.site.bafi == 0">
                                                    <i class="fas fa-times-circle"
                                                        style="color:#ed5565;font-size:22px;">
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Olt 3Play
                                                    </h4>
                                                </div>
                                                <div v-if="ticket.site.olt_3play == 1">
                                                    <i class="fas fa-check" style="color:#47c363;font-size:18px;">
                                                    </i>
                                                </div>
                                                <div v-if="ticket.site.olt_3play == 0">
                                                    <i class="fas fa-times-circle"
                                                        style="color:#ed5565;font-size:22px;">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Core
                                                    </h4>
                                                </div>
                                                <div v-if="ticket.site.core == 1">
                                                    <i class="fas fa-check" style="color:#47c363;font-size:18px;">
                                                    </i>
                                                </div>
                                                <div v-if="ticket.site.core == 0">
                                                    <i class="fas fa-times-circle"
                                                        style="color:#ed5565;font-size:22px;">
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Mpls
                                                    </h4>
                                                </div>
                                                <div v-if="ticket.site.mpls == 1">
                                                    <i class="fas fa-check" style="color:#47c363;font-size:18px;">
                                                    </i>
                                                </div>
                                                <div v-if="ticket.site.mpls == 0">
                                                    <i class="fas fa-times-circle"
                                                        style="color:#ed5565;font-size:22px;">
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Pe 3G
                                                    </h4>
                                                </div>
                                                <div v-if="ticket.site.pe_3g == 1">
                                                    <i class="fas fa-check" style="color:#47c363;font-size:18px;">
                                                    </i>
                                                </div>
                                                <div v-if="ticket.site.pe_3g == 0">
                                                    <i class="fas fa-times-circle"
                                                        style="color:#ed5565;font-size:22px;">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Dirección
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{ticket.site.pop.direccion}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Región
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    <div v-if="ticket.site.pop.comuna.region_id == 1">
                                                        Arica y Parinacota
                                                    </div>
                                                    <div v-if="ticket.site.pop.comuna.region_id == 2">
                                                        Tarapacá
                                                    </div>
                                                    <div v-if="ticket.site.pop.comuna.region_id == 3">
                                                        Antofagasta
                                                    </div>
                                                    <div v-if="ticket.site.pop.comuna.region_id == 4">
                                                        Atacama
                                                    </div>
                                                    <div v-if="ticket.site.pop.comuna.region_id == 5">
                                                        Coquimbo
                                                    </div>
                                                    <div v-if="ticket.site.pop.comuna.region_id == 6">
                                                        Valparaíso
                                                    </div>
                                                    <div v-if="ticket.site.pop.comuna.region_id == 7">
                                                        Región Metropolitana
                                                    </div>
                                                    <div v-if="ticket.site.pop.comuna.region_id == 8">
                                                        Libertador Bernardo O'Higgins
                                                    </div>
                                                    <div v-if="ticket.site.pop.comuna.region_id == 9">
                                                        Maule
                                                    </div>
                                                    <div v-if="ticket.site.pop.comuna.region_id == 10">
                                                        Bío-Bío
                                                    </div>
                                                    <div v-if="ticket.site.pop.comuna.region_id == 11">
                                                        Araucanía
                                                    </div>
                                                    <div v-if="ticket.site.pop.comuna.region_id == 12">
                                                        Los Ríos
                                                    </div>
                                                    <div v-if="ticket.site.pop.comuna.region_id == 13">
                                                        Los Lagos
                                                    </div>
                                                    <div v-if="ticket.site.pop.comuna.region_id == 14">
                                                        Aisén del General Carlos Ibáñez del Campo
                                                    </div>
                                                    <div v-if="ticket.site.pop.comuna.region_id == 15">
                                                        Magallanes y Antártica Chilena
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Comuna
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{ticket.site.pop.comuna.nombre_comuna}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Latitud
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{ticket.site.pop.latitude}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow semi_bold">
                                                    <h4 style="color:#005cff;">
                                                        Longitud
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{ticket.site.pop.longitude}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card chat-box  box-shadow-new-card border-r-8" id="mychatbox">
                        <div class="">
                            <div class="card-header barlow semi_bold">
                                <h4 style="color: #005cff; font-size:25px;">
                                    {{nombre}}
                                </h4>
                            </div>
                            <div>
                                <div class="selectgroup w-100 p-d-5">
                                    <label class="selectgroup-item">
                                        <input @click.prevent="getBitacora" class="selectgroup-input " name="Si"
                                            type="radio">
                                        <span class="selectgroup-button barlow regular "
                                            :class="active == 1 ? 'active-group-button' :''">
                                            Bitácora
                                        </span>
                                        </input>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input @click.prevent="getBitacora2" class="selectgroup-input" name="no"
                                            type="radio">
                                        <span class="selectgroup-button barlow regular"
                                            :class="active == 2 ? 'active-group-button' :''">
                                            Control de cambios
                                        </span>
                                        </input>
                                    </label>
                                </div>
                            </div>
                            <div class="card-body chat-content">
                                <div class="empty-state" data-height="400" v-if="load_data == 0">
                                    <div class="d-flex justify-content-center">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 6rem;height: 6rem;color: #007bff!important;">
                                            <span class="sr-only" style="color: #191919">
                                                Cargando...
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div v-for="bitacora in bitacoras">
                                    <div class="chat-item chat-left" >
                                        <a href="#" data-toggle="tooltip"  data-placement="top" title="" :data-original-title="bitacora.user.name +' '+ bitacora.user.apellido">
                                            <figure :data-initial="shortName(bitacora.user.name,bitacora.user.apellido)"
                                            class="avatar mr-2 bg-info text-white avatar-bitacora">
                                           </figure>
                                       
                                        </a>
                                          

                                        <div class="chat-details">
                                            <div class="chat barlow bold">
                                                {{bitacora.user.name}} {{bitacora.user.apellido}}
                                            </div>
                                            <div class="chat-text barlow regular">
                                                {{bitacora.descripcion}}
                                            </div>
                                            <div class="chat-time barlow semi_bold">
                                                {{formato(bitacora.created_at)}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer chat-form border-r-bottom ">
                                <form method="POST" v-on:submit.prevent="EnviarMensaje">
                                    <input class="form-control" id="descripcion" name="descripcion"
                                        placeholder="Escribe un mensaje" required="true" type="text"
                                        v-model="datoslog.descripcion">
                                    <button class="btn btn-primary">
                                        <i class="far fa-paper-plane">
                                        </i>
                                    </button>
                                    </input>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="montos_pep" v-if="pep">
                <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                    <div class="card card-hero box-shadow-new-card border-r-8">
                        <div class="card-header car_header_ticket_detail border-r-top" >
                            <div class="card-icon">
                                <i class="fas fa-money-check-alt green_secondary_color">
                                   
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Detalle PEP -
                                <span
                                    :class="pep.estado_id == 1 ? 'badge-success' :(pep.estado_id == 2 ? 'badge-warning' :(pep.estado_id == 3 ? 'badge-danger' :''))"
                                    class="badge" style="font-size:20px;">
                                    {{pep.estado_id == 1 ? 'Pep aperturado' :(pep.estado_id == 2 ? 'Enviado a cerrar'
                                    :(pep.estado_id == 3 ? 'Pep cerrado' :'')) }}
                                </span>
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Listado de montos
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="animated fadeIn">
                                <div class="table-responsive project-list project-table">
                                    <table class="table table-hover table-striped ">
                                        <thead>
                                            <tr>
                                                <th class=" barlow bold">
                                                    Pep
                                                </th>
                                                <th class=" barlow bold">
                                                    PPTO SAP
                                                </th>
                                                <th class=" barlow bold">
                                                    Real
                                                </th>
                                                <th>
                                                    Disponible real
                                                </th>
                                                <th>
                                                    Estado
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{pep.pep}}
                                                </td>
                                                <td>
                                                    {{pep.ppto_sap ? '$'+formatPrice(pep.ppto_sap) :''}}
                                                </td>
                                                <td>
                                                    {{pep.real_sap ? '$'+formatPrice(pep.real_sap) :''}}
                                                </td>
                                                <td>
                                                    {{pep.disponible_real ? '$'+formatPrice(pep.disponible_real) :''}}
                                                </td>
                                                <td>
                                                    <span
                                                        :class="pep.estado_id == 1 ? 'badge-success' :(pep.estado_id == 2 ? 'badge-warning' :(pep.estado_id == 3 ? 'badge-danger' :''))"
                                                        class="badge">
                                                        {{pep.estado_id == 1 ? 'Pep aperturado' :(pep.estado_id == 2 ?
                                                        'Enviado a cerrar' :(pep.estado_id == 3 ? 'Pep cerrado' :'')) }}
                                                    </span>
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
            <div class=" row" id="linea2">
                <div class="col-12 col-sm-6 col-lg-8">
                    <div class="card card-hero box-shadow-new-card border-r-8">
                        <div class="card-header car_header_ticket_detail border-r-top">
                            <div class="card-icon">
                                <i class="fas fa-archive green_secondary_color">
                                  
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Archivos
                                <button data-target="#SubirArchivo" data-toggle="modal">
                                    <i class="fas fa-upload boxBounce " style="font-size: 30px;color: #42E8B4">
                                    </i>
                                </button>
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Lista de archivos
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="">
                                <div class="gallery gallery-md" style="min-height:450px;">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-lg-12">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item ">
                                                    <a @click.prevent="setFile(1)" aria-controls="cotizaciones"
                                                        aria-selected="true" class="nav-link active barlow regular"
                                                        data-toggle="tab" href="#cotizaciones" id="cotizaciones-tab"
                                                        role="tab">
                                                        Cotizaciones
                                                        <span class="badge badge-info" v-if="cotizacion!= 0">
                                                            {{cotizacion}}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a @click.prevent="setFile(2)" aria-controls="informe"
                                                        aria-selected="false" class="nav-link barlow regular"
                                                        data-toggle="tab" href="#informe" id="Informe-tab" role="tab">
                                                        Informe Final
                                                        <span class="badge badge-info" v-if="informeFinal!= 0">
                                                            {{informeFinal}}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a @click.prevent="setFile(4)" aria-controls="guia"
                                                        aria-selected="false" class="nav-link barlow regular"
                                                        data-toggle="tab" href="#guia" id="guia-tab" role="tab">
                                                        Guía de despacho
                                                        <span class="badge badge-info" v-if="guiaDespacho!= 0">
                                                            {{guiaDespacho}}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a @click.prevent="setFile(6)" aria-controls="lpu"
                                                        aria-selected="false" class="nav-link barlow regular"
                                                        data-toggle="tab" href="#lpu" id="lpu-tab" role="tab">
                                                        LPU
                                                        <span class="badge badge-info" v-if="lpu!= 0">
                                                            {{lpu}}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a @click.prevent="setFile(7)" aria-controls="mail"
                                                        aria-selected="false" class="nav-link barlow regular"
                                                        data-toggle="tab" href="#mail" id="mail-tab" role="tab">
                                                        Mail
                                                        <span class="badge badge-info" v-if="Mail!= 0">
                                                            {{Mail}}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a @click.prevent="setFile(8)" aria-controls="adjudicación"
                                                        aria-selected="false" class="nav-link barlow regular"
                                                        data-toggle="tab" href="#adjudicación" id="adjudicación-tab"
                                                        role="tab">
                                                        Carta de adjudicación
                                                        <span class="badge badge-info" v-if="adjudicacion!= 0">
                                                            {{adjudicacion}}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a @click.prevent="setFile(17)" aria-controls="adjudicación"
                                                        aria-selected="false" class="nav-link barlow regular"
                                                        data-toggle="tab" href="#adjudicación" id="adjudicación-tab"
                                                        role="tab">
                                                        Validación de compras
                                                        <span class="badge badge-info"
                                                            v-if="total_validacion_compras!= 0">
                                                            {{total_validacion_compras}}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a @click.prevent="setFile(9)" aria-controls="parcial"
                                                        aria-selected="false" class="nav-link barlow regular"
                                                        data-toggle="tab" href="#parcial" id="parcial-tab" role="tab">
                                                        Informe parcial
                                                        <span class="badge badge-info" v-if="informeParcial!= 0">
                                                            {{informeParcial}}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a @click.prevent="setFile(11)" aria-controls="pxq"
                                                        aria-selected="false" class="nav-link barlow regular"
                                                        data-toggle="tab" href="#pxq" id="pxq-tab" role="tab">
                                                        PXQ
                                                        <span class="badge badge-info" v-if="pxqtotal!= 0">
                                                            {{pxqtotal}}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a @click.prevent="setFile(12)" aria-controls="pxq"
                                                        aria-selected="false" class="nav-link barlow regular"
                                                        data-toggle="tab" href="#pxq" id="pxq-tab" role="tab">
                                                        Imagenes Inf.Fotografico
                                                        <span class="badge badge-info" v-if="TotalImagenes != 0">
                                                            {{TotalImagenes}}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a @click.prevent="setFile(13)" aria-controls="denuncia"
                                                        aria-selected="false" class="nav-link barlow regular"
                                                        data-toggle="tab" href="#denuncia" id="pxq-tab" role="tab">
                                                        Documentos denuncia
                                                        <span class="badge badge-info"
                                                            v-if="TotalDocumentoDenuncia != 0">
                                                            {{TotalDocumentoDenuncia}}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a @click.prevent="setFile(14)" aria-controls="cheklist"
                                                        aria-selected="false" class="nav-link barlow regular"
                                                        data-toggle="tab" href="#cheklist" id="pxq-tab" role="tab">
                                                        Cheklist
                                                        <span class="badge badge-info" v-if="TotalCheckList != 0">
                                                            {{TotalCheckList}}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a @click.prevent="setFile(5)" aria-controls="otros"
                                                        aria-selected="false" class="nav-link barlow regular"
                                                        data-toggle="tab" href="#otros" id="otros-tab" role="tab">
                                                        Otros
                                                        <span class="badge badge-info" v-if="otro!= 0">
                                                            {{otro}}
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div aria-labelledby="cotizaciones-tab"
                                                    class="tab-pane fade show active" id="cotizaciones" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-lg-2" v-for="archivo in archivos"
                                                            v-if="archivo.tipo_archivo_id == typeFile">
                                                            <div class="col text-center">
                                                                <a :href="'/archivos/'+archivo.nombre_archivo"
                                                                    target="blank_">
                                                                    <div class="browser boxBounce">
                                                                        <i :class="getFileExtension(archivo.nombre_archivo) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(archivo.nombre_archivo) == 'xls' || getFileExtension(archivo.nombre_archivo) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(archivo.nombre_archivo) == 'doc' || getFileExtension(archivo.nombre_archivo) == 'docx' ? 'far fa-file-word':( getFileExtension(archivo.nombre_archivo) == 'img' || getFileExtension(archivo.nombre_archivo) == 'jpg' || getFileExtension(archivo.nombre_archivo) == 'jpeg' ||  getFileExtension(archivo.nombre_archivo) == 'png' ? 'far fa-image':'far fa-file')))"
                                                                            :style="archivo.cotizacion_select == 1 ? 'color:rgb(66, 232, 180);':''"
                                                                            style="font-size: 55px;color:#191919;">
                                                                        </i>
                                                                    </div>
                                                                    <div :style="archivo.cotizacion_select == 1 ? 'color:rgb(66, 232, 180);':''"
                                                                        class="mt-2 font-weight-bold">
                                                                        {{archivo.nombre_archivo}}
                                                                    </div>
                                                                </a>
                                                                <button @click.prevent="DeleteArchivos(archivo)"
                                                                    class="btn btn-danger">
                                                                    Eliminar
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-hero box-shadow-new-card border-r-8">
                        <div class="card-header car_header_ticket_detail border-r-top" >
                            <div class="card-icon">
                                <i class="fas fa-cog green_secondary_color"
                                   >
                                </i>
                            </div>
                            <h4 class=" barlow bold">
                                Opciones
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Gestión del ticket
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="">
                                <div v-if="ticket.tipo_motivo_id != 12">

                                    <button @click.prevent="showModalSgc" data-target="#formulario_sgc_ticket"
                                        class="btn btn-sgc-blue azul_sgc btn-block barlow semi_bold"
                                        style="font-size: 17px;">
                                        <i class="fas fa-plus">
                                        </i>
                                        Crear SGC
                                    </button>
                                </div>
                                <div v-if="ticket.tipo_motivo_id == 12">

                                    <button data-toggle="modal" data-target="#modalCreateSgcExpres"
                                        class="btn btn-sgc-blue azul_sgc btn-block barlow semi_bold"
                                        style="font-size: 17px;">
                                        <i class="fas fa-plus">
                                        </i>
                                        Crear SGC Exprés
                                    </button>
                                </div>

                                <!-- <div style="margin-top:10px;" v-if="user.id == 79 || user.id == 217 || user.id == 11 || user.id == 9 || user.id == 73 || user.id == 25 || user.id == 12 ">
                                </div>
                                <div v-if="user.id == 79 || user.id == 217 || user.id == 11 || user.id == 9 || user.id == 73 || user.id == 25 || user.id == 12 ">
                                    <button @click.prevent="showModalPresupuestoCeco" class="btn btn-sgc-blue azul_sgc btn-block barlow semi_bold" style="font-size: 17px;">
                                        <i class="fas fa-dollar-sign">
                                        </i>
                                        Presupuesto CECO
                                    </button>
                                </div> -->
                                <div style="margin-top:10px;">
                                </div>
                                <div>
                                    <button @click.prevent="showformPreework"
                                        class="btn btn-block btn-green barlow semi_bold" style="font-size: 17px;">
                                        <i class="fas fa-plus">
                                        </i>
                                        Datos para ework
                                    </button>
                                </div>
                                <div style="margin-top:10px;">
                                </div>
                                <div>
                                    <button @click.prevent="show_form_psa"
                                        class="btn btn-block btn-warning barlow semi_bold" style="font-size: 17px;">
                                        <i class="fas fa-plus">
                                        </i>
                                        Solicitud de baterías
                                    </button>
                                </div>
                                <div style="margin-top:10px;">
                                </div>
                                <div>
                                    <a :href="'/InformeFotografico/'+ticket.id" style="color:#e3eaef" target="blank__">
                                        <button class="btn btn-light btn-block barlow semi_bold"
                                            style="font-size: 17px;">
                                            Informe fotográfico
                                        </button>
                                    </a>
                                </div>
                                <div style="margin-top:10px;">
                                </div>
                                <div v-if="ticket.area_id == 2 ">
                                    <div v-if="derivacion == 2 ">
                                        <button @click.prevent="especialistaClima"
                                            class="btn btn-success btn-block barlow semi_bold" style="font-size: 17px;"
                                            v-if="ticket.especialista_id == null ">
                                            Derivar a especialista de clima
                                        </button>
                                    </div>
                                </div>
                                <div style="margin-top:10px;">
                                </div>
                                <div v-if="ticket.area_id == 3">
                                    <div v-if="derivacion == 2 ">
                                        <button @click.prevent="especialistaOOCC"
                                            class="btn btn-warning btn-block barlow semi_bold" style="font-size: 17px;"
                                            v-if="ticket.especialista_id  == null ">
                                            Derivar a especialista de OO.CC
                                        </button>
                                    </div>
                                </div>
                                <div style="margin-top:10px;">
                                </div>
                                <div v-if="ticket.nro_imputacion == null">
                                    <button class="btn btn-info btn-block barlow semi_bold" data-target="#imputaciones"
                                        data-toggle="modal" style="font-size: 17px;">
                                        <i class="fas fa-plus">
                                        </i>
                                        Agregar imputación
                                    </button>
                                </div>
                                <div style="margin-top:10px;">
                                </div>
                                <div>
                                    <button class="btn btn-info btn-block barlow semi_bold" data-target="#tp"
                                        data-toggle="modal" style="font-size: 17px;">
                                        <i class="fas fa-plus">
                                        </i>
                                        Agregar TP
                                    </button>
                                </div>
                                <div style="margin-top:10px;">
                                </div>
                                <div>
                                    <button class="btn btn-info btn-block barlow semi_bold" data-target="#NroOffice"
                                        data-toggle="modal" style="font-size: 17px;">
                                        <i class="fas fa-plus">
                                        </i>
                                        Agregar Tarea Office Track
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" row" id="linea3">
                <div class="col-12 col-sm-6 col-lg-12">
                    <div class="card card-hero box-shadow-new-card border-r-8">
                        <div class="card-header car_header_ticket_detail border-r-top" >
                            <div class="card-icon">
                                <i class="fas fa-dollar-sign green_secondary_color"
                                    style="margin-left: -160px;margin-top: 22px;">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Solicitudes SGC
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Listado de solicitudes
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="animated fadeIn">
                                <div class="table-responsive project-list project-table">
                                    <table class="table table-hover table-striped ">
                                        <thead>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="barlow bold">
                                                    #
                                                </th>
                                                <th class="barlow bold">
                                                    Sitio
                                                </th>
                                                <th class="barlow bold">
                                                    Creador
                                                </th>
                                                <th>
                                                    Proveedor
                                                </th>
                                                <th class="barlow bold">
                                                    Costos
                                                </th>
                                                <th class="barlow bold">
                                                    Boleta
                                                </th>
                                                <th>
                                                    Cesta/OC
                                                </th>
                                                <th class="barlow bold">
                                                    Ework
                                                </th>
                                                <th class="barlow bold">
                                                    Cotización
                                                </th>
                                                <th class="barlow bold">
                                                    Estado
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="height: 150px;" v-for="solicitud in solicitudes.data">
                                                <td>
                                                    <router-link
                                                        :to="{ path:`/show/`+solicitud.id, params: {id: solicitud.id}}"
                                                        v-slot="{ href, route, navigate, isActive, isExactActive }">
                                                        <a :href="href" target="_blank">
                                                            <span class="badge boxBounce"
                                                                style="background-color: #1d548a;color: white;border-radius: 5px;font-size: 13.5px">
                                                                {{solicitud.id}}
                                                            </span>
                                                        </a>
                                                    </router-link>
                                                </td>
                                                <td>
                                                    <div v-if="solicitud.site_id != null">
                                                        <div style="font-size: 12px">
                                                            {{solicitud.site.nem_site}}
                                                        </div>
                                                        <div style="font-size: 12px">
                                                            {{solicitud.site.nombre}}
                                                        </div>
                                                        <div v-if="solicitud.site.site_type_id==1">
                                                            <span class="badge"
                                                                style="background-color: #42e8b4;color: white;font-size: 10px">
                                                                FIJO
                                                            </span>
                                                        </div>
                                                        <div v-if="solicitud.site.site_type_id==2">
                                                            <span class="badge"
                                                                style="background-color: #005cff;color: white; font-size:10px ">
                                                                MOVIL
                                                            </span>
                                                        </div>
                                                        <div v-if="solicitud.site.site_type_id==3">
                                                            <span class="badge"
                                                                style="background-color: #005cff;color: white; font-size:10px; ">
                                                                SWITCH
                                                            </span>
                                                        </div>
                                                        <div v-if="solicitud.site.site_type_id==4">
                                                            <span class="badge"
                                                                style="background-color: #005cff;color: white; font-size: 10px">
                                                                PHONE
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 5px;"
                                                        v-if="solicitud.tipo_trabajo_id != null">
                                                        <span class="badge box-shadow-ag"
                                                            style="background-color: #42e8b4;color: white">
                                                            {{solicitud.tipo_trabajo.nombre_trabajo}}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <strong>
                                                            {{solicitud.user.name}} {{solicitud.user.apellido}}
                                                        </strong>
                                                    </div>
                                                    <div>
                                                        Fecha creación
                                                    </div>
                                                    <div>
                                                        {{formato(solicitud.fecha_creacion)}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div v-if="solicitud.proveedor_id != null">
                                                        <span class="badge"
                                                            style="background-color:#0072ff;color: white;font-size: 10px;">
                                                            {{solicitud.proveedor.PROVEEDOR}}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        v-if="solicitud.costos_activos != 0 && solicitud.costos_activos != null ">
                                                        <div>
                                                            <strong style="font-size: 12px;">
                                                                ACTIVOS
                                                            </strong>
                                                        </div>
                                                        <div>
                                                            {{solicitud.tipo_moneda.moneda}}
                                                            {{formatPrice(solicitud.costos_activos) }}
                                                        </div>
                                                    </div>
                                                    <div
                                                        v-if="solicitud.costos_servicios != 0 && solicitud.costos_servicios != null ">
                                                        <div>
                                                            <strong style="font-size: 12px;">
                                                                SERVICIOS
                                                            </strong>
                                                            <div>
                                                                {{solicitud.tipo_moneda.moneda}}
                                                                {{formatPrice(solicitud.costos_servicios)}}
                                                            </div>
                                                        </div>
                                                        <div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div v-if="solicitud.tipo_boleta_id">
                                                        <strong>
                                                            {{solicitud.tipo_boleta.descripcion}}
                                                        </strong>
                                                    </div>
                                                    <div>
                                                        {{solicitud.boleta}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <strong style="font-size: 15px;">
                                                            Cesta
                                                        </strong>
                                                        <div>
                                                            {{solicitud.cesta}}
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 10px;">
                                                        <strong style="font-size: 15px;">
                                                            Oc
                                                        </strong>
                                                        <div>
                                                            {{solicitud.oc}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        {{solicitud.ework}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        {{solicitud.cotizacion}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span
                                                            :style="'background-color:'+solicitud.proceso.color+';'+'color:white;'"
                                                            class="badge">
                                                            {{solicitud.proceso.descripcion}}
                                                        </span>
                                                    </div>
                                                    <div style="margin-top:5px;" v-if="solicitud.proceso_id != 13">
                                                        <span
                                                            :style="'background-color:'+solicitud.subestado.color+';'+'color:white;'"
                                                            class="badge">
                                                            {{solicitud.subestado.subestado}}
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="col-12 col-md-12 col-sm-12" v-if="vacio == 1">
                                        <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                            <div class="card-body">
                                                <div class="empty-state" data-height="400">
                                                    <div class="empty-state-icon"
                                                        style="background-image: linear-gradient(rgb(0, 92, 255), rgba(0, 123, 255, 0.6))">
                                                        <i class="fas fa-question">
                                                        </i>
                                                    </div>
                                                    <h2>
                                                        No existe ninguna solicitud de sgc asociada a este ticket
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <nav aria-label="pagination" class="pagination" role="navigation">
                                            <vue-pagination :offset="4" :pagination="solicitudes" @paginate="getSlcSgc">
                                            </vue-pagination>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <psa-request>
            </psa-request>
            <form-sgc :usuario="user">
            </form-sgc>
            <form-ework>
            </form-ework>
        </div>
        <form @submit.prevent="AddImputacion" action="">
            <div aria-hidden="true" class="modal inmodal" id="imputaciones" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header"
                            style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                            <h5 class="modal-title" style="color: white">
                                Imputación
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" id="textInpu">
                                <label style="color: #999999">
                                    Imputaciones
                                </label>
                                <select class="form-control" name="inputacion" v-model="inputacion">
                                    <option disabled="true" selected="true">
                                        Seleccione
                                    </option>
                                    <option v-bind:value="1">
                                        CECO
                                    </option>
                                    <option v-bind:value="3">
                                        BLT-RED
                                    </option>
                                    <option v-bind:value="4">
                                        ELEMENTO PEP
                                    </option>
                                </select>
                            </div>
                            <div class="form-group" id="datoImpu">
                                <label>
                                    Ingrese Nro de imputacion
                                </label>
                                <input class="form-control" name="nroImputacion" type="text" v-model="nroImputacion">
                                </input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form action="" v-on:submit.prevent="AddTp">
            <div aria-hidden="true" class="modal inmodal" id="tp" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header"
                            style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                            <h5 class="modal-title" style="color: white">
                                Ingreso Nro° TP
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" id="textInpu">
                                <p style="color: #999999">
                                    Ingrese el número de TP
                                </p>
                                <input class="form-control " id="nroTp" name="tp" style="color:#999999" type="text"
                                    v-model="tp">
                                </input>
                            </div>
                            <div>
                                <p style="color: #999999">
                                    Motivo Tp
                                </p>
                                <input class="form-control " maxlength="150" name="motivoTp" style="color:#999999"
                                    type="text" v-model="motivoTp">
                                </input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form v-on:submit.prevent="AddTarea">
            <div aria-hidden="true" class="modal inmodal" id="NroOffice" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header"
                            style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                            <h5 class="modal-title" style="color: white">
                                Ingreso Nro° Office Track
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" id="textInpu">
                                <p style="color: #999999">
                                    Ingrese el número Office Track
                                </p>
                                <input class="form-control " id="tarea" name="tarea" required="" style="color:#999999"
                                    type="text" v-model="tarea">
                                </input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form v-on:submit.prevent="EditDesc">
            <div aria-hidden="true" class="modal inmodal" id="EditDesc" role="dialog" tabindex="-1">
                <div class="modal-dialog ">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header"
                            style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                            <h5 class="modal-title" style="color: white">
                                Editar Descripción
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" id="textInpu">
                                <label class="barlow semi_bold">
                                    Edite La descripción
                                </label>
                                <textarea class="form-control" id="descripcionTicketShow" placeholder=""
                                    style="width: 100%; height: 150px;" v-model="descripcion">
                                    {{descripcion}}
                                </textarea>
                            </div>
                        </div>
                        <div class="modal-footer"
                            style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99);">
                            <button class="btn btn-secondary btn-grey" type="submit">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div aria-hidden="true" class="modal inmodal" id="edit_ework" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header"
                        style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                        <h5 class="modal-title barlow bold" style="color: white">
                            Editar nro° de ework
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" id="textInpu">
                            <label class="barlow semi_bold">
                                Nro° de ework
                            </label>
                            <input class="form-control" name="" type="text" v-model="nroEwork" />
                        </div>
                    </div>
                    <div class="modal-footer" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99);">
                        <button @click.prevent="edit_number_ework()" class="btn btn-secondary btn-grey" type="button">
                            Aceptar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div aria-hidden="true" class="modal inmodal" id="presupuesto_ceco" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header"
                        style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                        <h5 class="modal-title barlow bold" style="color: white">
                            Presupuesto ceco
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>
                                        Año
                                    </label>
                                    <select class="form-control select" v-model="year">
                                        <option v-for="year in years">
                                            {{year}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>
                                        Mes
                                    </label>
                                    <select class="form-control select" v-model="month">
                                        <option v-for="mes in meses">
                                            {{mes}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-secondary" @click.prevent="buscarPresupuesto"
                                    style="margin-top: 30px;"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="animated fadeIn">
                            <div class="table-responsive project-list project-table">
                                <table class="table table-hover table-striped ">
                                    <thead>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th class="barlow bold">
                                                Monto disponible
                                            </th>
                                            <th class="barlow bold">
                                                Monto utilizado
                                            </th>
                                            <th class="barlow bold">
                                                Monto limite
                                            </th>
                                            <th class="barlow bold">
                                                Periodo
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="barlow semi_bold">
                                                ${{formatPrice(presupuesto_ceco.monto_disponible)}}
                                            </td>
                                            <td class="barlow semi_bold">
                                                ${{formatPrice(presupuesto_ceco.monto_utilizado)}}
                                            </td>
                                            <td class="barlow semi_bold ">
                                                ${{formatPrice(presupuesto_ceco.monto_limite)}}
                                            </td>
                                            <td class="barlow semi_bold">
                                                {{formatoFecha(presupuesto_ceco.periodo)}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99);">
                        <button class="btn btn-secondary btn-grey" data-dismiss="modal" type="button">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="EditMotivoTicket" role="dialog"
            tabindex="-1">
            <div class="modal-dialog modal-sm ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header"
                        style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Ediar motivo
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>
                                Motivo*
                            </label>
                            <select class="form-control select" name="motivo" v-model="motivo_id">
                                <option :value="tipo_motivo.id" v-for="tipo_motivo in tipo_motivos">
                                    {{tipo_motivo.nombre}}
                                </option>

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99);">
                        <button @click.prevent="updateMotivo" class="btn btn-secondary btn-grey">
                            Aceptar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <psa-form>
        </psa-form>
        <sgc-expres></sgc-expres>
        <add-info-modal></add-info-modal>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    import EventBus from "../event-bus"
    import VuePagination from '../VuePagination.vue'
    import formsgc from '../formsgc.vue'
    import dataework from './dataework.vue'
    import psaRequest from './psarequest.vue'
    import psaform from './psaform.vue'
    import addInfoModal from './Addinfo.vue'
    import sgcexpress from './sgcExpres.vue'




    export default {
        props: ['permisos', 'tickets', 'bitacora', 'peps', 'archivo', 'tpsticket', 'user'],
        components: {
            'vue-pagination': VuePagination,
            'form-sgc': formsgc,
            'form-ework': dataework,
            'psa-request': psaRequest,
            'psa-form': psaform,
            'sgc-expres': sgcexpress,
            'add-info-modal': addInfoModal




        },
        data() {
            return {
                ticket: [],
                ework: '',
                imputaciones: [],
                tps: [],
                permisosUser: [],
                nroEwork: '',
                bitacoras: [],
                datoslog: { 'descripcion': '' },
                nombre: 'Bitácora',
                archivos: [],
                typeFile: 1,
                cotizacion: '',
                informeFinal: '',
                guiaDespacho: '',
                otro: '',
                lpu: '',
                adjudicacion: '',
                informeParcial: '',
                Mail: '',
                informeMantencion: '',
                pxqtotal: '',
                TotalImagenes: '',
                TotalDocumentoDenuncia: '',
                TotalCheckList: '',
                solicitudes: {
                    'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0
                },
                vacio: '',
                area: '',
                especialista: '',
                fullPage: false,
                derivacion: 2,
                tp: '',
                inputacion: '',
                nroImputacion: '',
                tp: '',
                motivoTp: '',
                tarea: '',
                searchidTicket: '',
                descripcion: '',
                descripcionOld: '',
                motivo_id: '',
                editarMotivo: '',
                eliminarImputacion: '',
                areas: [],
                editar_nro_ework: 0,
                load_data: 1,
                pep: [],
                presupuesto_ceco: [],
                meses: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
                years: [2021, 2022],
                year: '',
                month: '',
                tipo_motivos: [
                    { id: 12, nombre: 'Ticket exprés' },
                    { id: 1, nombre: 'Vandalismo menor' },
                    { id: 7, nombre: 'Vandalismo mayor' },
                    { id: 2, nombre: 'Falla Mayor' },
                    { id: 6, nombre: 'Falla menor' },
                    { id: 3, nombre: 'Mantenimiento' },
                    { id: 9, nombre: 'Degradación' },
                    { id: 4, nombre: 'Solicitud Stock' },
                    { id: 5, nombre: 'Solicitud de mejora' },
                    { id: 10, nombre: 'Gastos Reembolsables' },
                    { id: 11, nombre: 'Recurrente anual' },
                    { id: 8, nombre: 'Gestión de residuo' }
                ],
                total_validacion_compras: '',
                active: 1



            }
        },

        created: function () {
            this.ticket = this.tickets;
            this.bitacoras = this.bitacora;
            this.pep = this.peps;
            this.archivos = this.archivo;
            this.tps = this.tp;
            this.getSlcSgc()
            this.GetTotalFiles()
            this.getPermisos()





        },
        mounted: function () {
            /* Agrega mounted y con el siguiente contenido */

            let self = this;
            EventBus.$on('bitacora.getBitacora', function () {
                self.getBitacora(); // ejecutas el metodo que desees
            });

            EventBus.$on('ticket.editpop', function () {
                self.getTicket()
                self.getBitacora() // ejecutas el metodo que desees
            });



            EventBus.$on('archivosTick.load', function () {
                self.getArchivos(); // ejecutas el metodo que desees 
                self.GetTotalFiles();
            });
            EventBus.$on('sgcSlc.load', function () {
                self.getSlcSgc(); // ejecutas el metodo que desees 
            });
            EventBus.$on('ticket.getdata', function () {
                self.getTicket(); // ejecutas el metodo que desees
                self.getimputacion()
                self.getBitacora()
            });
            EventBus.$on('ticket.getTicket', function () {
                self.getTicket(); // ejecutas el metodo que desees 
            });

            EventBus.$on('ticket.ticketData', function () {
                self.getTicket(); // ejecutas el metodo que desees 
            });
            EventBus.$on('sgc.CloseFormTicket', function () {
                self.getTicket()
                self.datosTicektShow(); // ejecutas el metodo que desees 
                self.getBitacora()
                self.getSlcSgc(); // 
                self.getArchivos()
                self.GetTotalFiles()
            });








        },
        methods: {
            getAllData: function () {
                axios.get('/datosTicket/' + this.$route.params.id).then((response) => {
                    this.bitacoras = response.data.bitacora;
                    this.archivos = response.data.archivos;
                    this.tps = response.data.tps;
                    this.pep = response.data.pep;

                });

            },
            getTicket: function () {

                axios.get('/datosTicket/' + this.$route.params.id).then((response) => {

                    this.ticket = response.data.ticket;
                    this.bitacoras = response.data.bitacora;
                    this.archivos = response.data.archivos;
                    this.tps = response.data.tps;
                    this.pep = response.data.pep;

                }).finally(() => this.load_data = 1)


            },
            formatPrice(value) {
                if (value % 1 == 0) {

                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                } else {
                    let val = (value / 1).toFixed(2).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                }

            },
            formato: function (d) {
                return moment(d).format("DD/MM/YY - hh:mm:ss");
            },
            formatoDos: function (d) {
                return moment(d).format("DD/MM/YY");
            },
            formatoFecha: function (d) {
                return moment(d).format("DD-MM-Y");
            },
            SearchTicket: function () {
                this.$router.push('/showTicket/' + this.searchidTicket)
            },
            editMotivo: function (ticket) {
                console.log('hola')
                EventBus.$emit('ticket.modalEditMotivo', ticket.id);
            },
            deleteimputacion: function (id) {
                axios.get(`/deleImputacion?ticket_id=${id}`).then((response => {
                    EventBus.$emit('ticket.editpop');
                    this.getTicket()
                }))
            },
            getSlcSgc: function () {
                axios.get(`/slcTicket?page=${this.solicitudes.current_page}&ticket=${this.$route.params.id}`).then((response) => {
                    this.solicitudes = response.data;
                    if (this.solicitudes.data.length == 0) {
                        this.vacio = 1;
                    } else {
                        this.vacio = '';
                    }
                })
            },
            getPermisos: function () {



                for (var i = 0; i < this.permisos.length; i++) {
                    let permiso = this.permisos[i]
                    if (permiso.permission_id == 168) {
                        this.editarMotivo = 1;
                    }
                    if (permiso.permission_id == 169) {
                        this.eliminarImputacion = 1;
                    }
                    if (permiso.permission_id == 180) {
                        this.editar_nro_ework = 1;
                    }
                }
            },
            updateMotivo: function () {
                if (this.motivo_id != '') {
                    axios.get(`/editMotivoTicket?ticket_id=${this.$route.params.id}&motivo_id=${this.motivo_id}`).then((response) => {
                        $('#EditMotivoTicket').modal('hide');
                        let mensanje = 'Motivo de trabajo editado.'
                        this.motivo_id = '';
                        this.loadfunction()
                        this.toastfunction(mensanje)
                    })
                    EventBus.$emit('ticket.ticketData')
                } else {
                    if (this.motivo_id == '') {
                        this.$swal({
                            type: 'error',
                            title: 'Error',
                            text: 'Debe seleccionar un motivo.',
                            showCloseButton: true,
                        });
                    }
                }
            },
            toastfunction: function (mensanje) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    type: 'success',
                    title: mensanje
                })
            },
            cleanViewPreework: function () {
                document.getElementById("ticektList").style.display = "none";
                document.getElementById("linea1").style.display = "none";
                document.getElementById("linea2").style.display = "none";
                document.getElementById("linea3").style.display = "none";
                document.getElementById("BtnBack").style.display = "";
                document.getElementById("SgcTkc").style.display = "none";
                document.getElementById("PreWorkTkc").style.display = "block";
                document.getElementById("tab_psa_request").style.display = "none";
            },
            showformPreework: function () {
                this.cleanViewPreework()
            },
            EditDesc: function () {
                if (this.descripcion == '') {
                    this.$swal({
                        type: 'error',
                        title: 'Debe ingresar una descripción',
                        showCloseButton: true,
                    });
                } else {
                    $('#EditDesc').modal('hide');
                    axios.put(`/descripcionedit/${this.$route.params.id}?descripcion=${this.descripcion}`).then(response => {
                        this.loadfunction()
                        this.getTicket()
                        this.getBitacora()
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            type: 'success',
                            title: 'Descripción Editada'
                        })
                    });
                }
            },
            AddTarea: function () {
                if (this.tarea == '') {
                    this.$swal({
                        type: 'error',
                        title: 'Debe ingresar un número de tarea de Office Track',
                        showCloseButton: true,
                    });
                } else {
                    $('#NroOffice').modal('hide');
                    axios.post(`/addTarea/${this.$route.params.id}?tarea=${this.tarea}`).then(response => {
                        $('#tarea').val('');
                        this.loadfunction()
                        this.tp = '';
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            type: 'success',
                            title: 'Nro° de tarea Ingresado'
                        })
                        EventBus.$emit('ticket.ticketData');
                        EventBus.$emit('bitacora.getBitacora');
                    });
                }
            },
            AddTp: function () {
                if (this.tp == '') {
                    this.$swal({
                        type: 'error',
                        title: 'Debe ingresar un número de TP',
                        showCloseButton: true,
                    });
                } else {
                    if (this.motivoTp == '') {
                        this.$swal({
                            type: 'error',
                            title: 'Debe ingresar el motivo del TP',
                            showCloseButton: true,
                        });
                    } else {
                        $('#tp').modal('hide');
                        axios.get(`/addTp/${this.$route.params.id}?tp=${this.tp}&motivoTp=${this.motivoTp}`).then(response => {
                            $('#tp').val('');
                            this.loadfunction()
                            this.tp = '';
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })
                            Toast.fire({
                                type: 'success',
                                title: 'Nro° de Tp Agregado'
                            })
                            this.getTp()
                            EventBus.$emit('bitacora.getBitacora');
                        });
                    }
                }
            },
            AddImputacion: function () {
                if (this.inputacion == '') {
                    this.$swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Debe seleccionar un tipo de imputacion',
                        showCloseButton: true,
                    });
                } else {
                    if (this.nroImputacion == '') {
                        this.$swal({
                            type: 'error',
                            title: 'Error',
                            text: 'Debe ingresar el número de imputación',
                            showCloseButton: true,
                        });
                    } else {
                        if (this.inputacion == 4) {
                            axios.get(`/pep-blocked?pep=${this.nroImputacion}`).then((response) => {
                                if (response.data == 1) {
                                    this.$swal({
                                        type: 'error',
                                        title: 'Error',
                                        text: 'El PEP ' + ' ' + this.nroImputacion + ' ' + ' se encuentra bloqueado actualmente, favor contactar a jefatura directa para mayor información.',
                                        showCloseButton: true,
                                    });
                                    this.nroImputacion = '';
                                } else {
                                    $('#imputaciones').modal('hide');
                                    axios.post(`/inputacion/${this.$route.params.id}?inputacion=${this.inputacion}&nroinputacion=${this.nroImputacion}`).then((response) => {
                                        this.loadfunction()
                                        this.inputacion = '';
                                        this.nroImputacion = '';
                                        this.sendMail(2);
                                        EventBus.$emit('ticket.getdata');
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                            onOpen: (toast) => {
                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            }
                                        })
                                        Toast.fire({
                                            type: 'success',
                                            title: 'Imputación Ingresada'
                                        })
                                    })
                                }
                            })
                        } else {
                            $('#imputaciones').modal('hide');
                            axios.post(`/inputacion/${this.$route.params.id}?inputacion=${this.inputacion}&nroinputacion=${this.nroImputacion}`).then((response) => {
                                this.loadfunction()
                                this.inputacion = '';
                                this.nroImputacion = '';
                                EventBus.$emit('ticket.getdata');
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    onOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })
                                Toast.fire({
                                    type: 'success',
                                    title: 'Imputación Ingresada'
                                })
                            })
                        }
                    }
                }
            },
            loadfunction: function () {
                let loader = this.$loading.show({
                    // Optional parameters
                    container: this.fullPage ? null : this.$refs.formContainer,
                    canCancel: true,
                    onCancel: this.onCancel,
                });
                // simulate AJAX
                setTimeout(() => {
                    loader.hide()
                }, 500)
            },
            datosTicektShow: function () {
                document.getElementById("ticektList").style.display = "";
                document.getElementById("linea1").style.display = "";
                document.getElementById("linea2").style.display = "";
                document.getElementById("linea3").style.display = "";
                document.getElementById("SgcTkc").style.display = "none";
                document.getElementById("BtnBack").style.display = "none";
                document.getElementById("PreWorkTkc").style.display = "none";
                document.getElementById("tab_psa_request").style.display = "block";
            },
            AddEwork: function () {
                axios.get(`/AddEwork?id=${this.$route.params.id}&ework=${this.nroEwork}`).then((response) => {
                    this.getTicket();
                    this.getBitacora()
                    this.sendMail(1)
                })
            },
            sendMail(motivo){
                axios.get('/send/mail/update/data/notification',{
                    params: {
                        'plataforma':1,
                        'ticket_id':this.$route.params.id,
                        'motivo':motivo
                    }
                }).then(response=>{

                })
            },
            getimputacion: function () {
                axios.get('/GetImputacion/' + this.$route.params.id).then((response) => {
                    this.imputaciones = response.data;
                })
            },
            getTp: function () {
                axios.get('/getTp/' + this.$route.params.id).then((response) => {
                    this.tps = response.data
                })
            },
            getElementos: function () {
                EventBus.$emit('Elementos.GetElementos');
            },
            editDescription: function (ticket) {
                this.descripcion = ticket.descripcion
                $('#EditDesc').modal('show');
            },
            getBitacora: function () {
                this.active = 1
                this.nombre = "Bitácora";
                axios.get('/bitacoraTicket/' + this.$route.params.id).then((response) => {
                    this.bitacoras = response.data


                })
            },
            getBitacora2: function () {
                this.active = 1
                this.nombre = "Control de cambios";
                axios.get('/bitacoraTicket2/' + this.$route.params.id).then((response) => {
                    this.bitacoras = response.data

                    this.active = 2
                })
            },
            EnviarMensaje: function () {
                var url = '/log/' + this.$route.params.id
                axios.post(url, this.datoslog).then(response => {
                    this.getBitacora();
                    $('#descripcion').val('');
                    this.datoslog.descripcion = '';
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        type: 'success',
                        title: 'Mensaje enviado'
                    })
                });
            },
            setFile: function (id) {
                this.typeFile = id;
            },
            getArchivos: function () {
                axios.get('/searchArchivo/' + this.$route.params.id).then((response) => {
                    this.archivos = response.data
                })
            },
            GetTotalFiles: function () {
                axios.get('/totalCotizaciones/' + this.$route.params.id).then((response) => {
                    this.cotizacion = response.data.cotizaciones;
                    this.informeFinal = response.data.informe_final;
                    this.guiaDespacho = response.data.guia_despacho;
                    this.otro = response.data.otro;
                    this.lpu = response.data.lpu;
                    this.adjudicacion = response.data.carta_adjudicacion;
                    this.informeParcial = response.data.informe_parcial;
                    this.Mail = response.data.mail;
                    this.pxqtotal = response.data.pxq;
                    this.TotalImagenes = response.data.informe_fotografico;
                    this.TotalDocumentoDenuncia = response.data.archivo_denuncia;
                    this.TotalCheckList = response.data.checklist;
                    this.total_validacion_compras = response.data.total_validacion_compras;
                })
            },
            DeleteArchivos: function (archivo) {
                let loader = this.$loading.show({
                    // Optional parameters
                    container: this.fullPage ? null : this.$refs.formContainer,
                    canCancel: true,
                    onCancel: this.onCancel,
                });
                // simulate AJAX
                setTimeout(() => {
                    loader.hide()
                }, 500)
                axios.get('/DeleteFile/' + archivo.id).then((response) => {
                    this.getArchivos();
                    this.GetTotalFiles();
                    this.getBitacora()
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        type: 'success',
                        title: 'Archivo Eliminado'
                    })
                })
            },
            ShowTareas: function () {
                $('#Tareas').modal('show');
            },
            showModalSgc: function () {

                EventBus.$emit('sgc.getDatosform');
                document.getElementById("tab_psa_request").style.display = "none";
                document.getElementById("montos_pep").style.display = 'none'
            },
            showModalPresupuestoCeco: function () {
                axios.get(`/get-presupuesto-ceco?year=${this.year}&month=${this.month}`).then(response => {
                    this.presupuesto_ceco = response.data;
                }).finally(() => $('#presupuesto_ceco').modal('show'))

            },
            buscarPresupuesto: function () {
                if (this.year != '' && this.month != '') {
                    axios.get(`/get-presupuesto-ceco?year=${this.year}&month=${this.month}`).then(response => {
                        this.presupuesto_ceco = response.data;
                    })
                }

            },
            showModalPreework: function () {
                EventBus.$emit('preEwork.getDatos');
            },
            showModalImputacion: function () {
                $('#imputaciones').modal('show');
            },
            showModalTp: function () {
                $('#tp').modal('show');
            },
            showModalOficce: function () {
                $('#NroOffice').modal('show');
            },
            especialistaOOCC: function () {
                var url = '/especialista2/' + this.$route.params.id
                let loader = this.$loading.show({
                    // Optional parameters
                    container: this.fullPage ? null : this.$refs.formContainer,
                    canCancel: true,
                    onCancel: this.onCancel,
                });
                // simulate AJAX
                setTimeout(() => {
                    loader.hide()
                }, 800)
                axios.put(url).then(response => {
                    this.derivacion = 1;
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3500,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        type: 'success',
                        title: 'Ticket derivado a especialista de OO.CC'
                    })
                    EventBus.$emit('bitacora.getBitacora');
                });
            },
            especialistaClima: function () {
                var url = '/especialista/' + this.$route.params.id
                let loader = this.$loading.show({
                    // Optional parameters
                    container: this.fullPage ? null : this.$refs.formContainer,
                    canCancel: true,
                    onCancel: this.onCancel,
                });
                // simulate AJAX
                setTimeout(() => {
                    loader.hide()
                }, 800)
                axios.put(url).then(response => {
                    this.derivacion = 1;
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3500,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        type: 'success',
                        title: 'Ticket derivado a especialista de Clima'
                    })
                    EventBus.$emit('bitacora.getBitacora');
                });
            },
            edit_number_ework: function () {
                if (this.nroEwork == '') {
                    Swal.fire({
                        type: 'error',
                        title: 'Error',
                        text: 'Debe ingresar un número de ework.',
                    })
                } else {
                    $('#edit_ework').modal('hide');
                    axios.get(`/ework_edit_ticket?nro_ework=${this.nroEwork}&id=${this.$route.params.id}`).then(response => {
                        this.nroEwork = ''
                        this.getTicket()
                        var mensaje = 'El número de ework fue editado correctamente.'
                        this.succes_alert(mensaje);
                        this.getBitacora()
                    })
                }

            },
            succes_alert: function (mensaje) {
                Swal.fire({
                    type: 'success',
                    title: 'Éxito',
                    text: mensaje,
                })
            },
            show_form_psa: function () {
                EventBus.$emit('ticket.show_modal_psa_form');
            },
            getFileExtension: function (filename) {
                return (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename)[0] : undefined;
            },
            formatPrice(value) {
                if (value % 1 == 0) {

                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                } else {
                    let val = (value / 1).toFixed(2).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                }

            },
            shortName(name, lastname) {
                let short = name.substr(0, 1) + lastname.substr(0, 1)
                return short;
            },




        }
    }
</script>
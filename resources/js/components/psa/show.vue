<template>
    <div>
        <div class="main-content" v-if="busqueda ==1 ">
            <section class="section">
                <div class="section-header shadow-box-ag">
                    <div class="col-lg-5 col-md-6 col-sm-6 col-12 ">
                        <h1 class="barlow semi_bold" v-for="solicitud in solicitudes">
                            Solicitud Nro {{solicitud.id}} - <strong class="barlow semi_bold" style="color:rgb(254, 168, 88);">{{solicitud.motivo.descripcion}}</strong>
                        </h1>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-6 col-12 ">
                        <div class="card-stats-title" v-for="solicitud in solicitudes">
                            <h1 class="barlow bold">
                                <div v-if="solicitud.ticket_id !=null ">
                                    <router-link :to="{ path:`/showTicket/`+solicitud.ticket_id, params: {id: solicitud.ticket_id}}" v-if="solicitud.ticket_id" v-slot="{ href, route, navigate, isActive, isExactActive }">
                                        <a :href="href" class="boxBounce" style="color: #fea858;font-size: 24px;" target="_blank">
                                            Ticket Nro°{{solicitud.ticket_id}}
                                        </a>
                                    </router-link>
                                </div>
                            </h1>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="card-body">
                    <div class="row mt-4">
                        <div class="col-12 col-lg-8 offset-lg-2" v-for="solicitud in solicitudes">
                            <div class="wizard-steps" v-if="solicitud.estado_id != 9">
                                <div class="wizard-step wizard-step" v-bind:class="solicitud.estado_id == 1  && solicitud.subestado_id == 14 ||solicitud.estado_id == 2 || solicitud.estado_id == 3 || solicitud.estado_id == 4 || solicitud.estado_id == 5 && solicitud.estado_id != 7 && solicitud.estado_id != 8  ? 'wizard-step-active':'wizard-step'" v-if="solicitud.estado_id != 8 &&  solicitud.estado_id != 7">
                                    <div class="wizard-step-icon">
                                        <i class="fas fa-check">
                                        </i>
                                    </div>
                                    <div class="wizard-step-label barlow semi_bold">
                                        Validación
                                    </div>
                                </div>
                                <div class="wizard-step wizard-step" v-bind:class="  solicitud.estado_id == 2||solicitud.estado_id == 3 || solicitud.estado_id == 4 || solicitud.estado_id == 5 ? 'wizard-step-active':'wizard-step'" v-for="solicitud in solicitudes" v-if="solicitud.estado_id != 8 &&  solicitud.estado_id != 7">
                                    <div class="wizard-step-icon">
                                        <i class="fas fa-edit">
                                        </i>
                                    </div>
                                    <div class="wizard-step-label barlow semi_bold">
                                        Gestión
                                    </div>
                                </div>
                                <div class="wizard-step wizard-step" v-bind:class=" solicitud.estado_id == 3|| solicitud.estado_id == 4 || solicitud.estado_id == 5 && solicitud.estado_id != 7 && solicitud.estado_id != 8  ? 'wizard-step-active':'wizard-step'" v-for="solicitud in solicitudes" v-if="solicitud.estado_id != 8 &&  solicitud.estado_id != 7">
                                    <div class="wizard-step-icon">
                                        <i class="fas fa-shipping-fast">
                                        </i>
                                    </div>
                                    <div class="wizard-step-label barlow semi_bold">
                                        Despacho
                                    </div>
                                </div>
                                <div class="wizard-step wizard-step" v-bind:class=" solicitud.estado_id == 4||solicitud.estado_id == 5 && solicitud.estado_id != 7 && solicitud.estado_id != 8  ? 'wizard-step-active':'wizard-step'" v-for="solicitud in solicitudes" v-if="solicitud.estado_id != 8 &&  solicitud.estado_id != 7">
                                    <div class="wizard-step-icon">
                                        <i class="fas fa-toolbox">
                                        </i>
                                    </div>
                                    <div class="wizard-step-label barlow semi_bold">
                                        Instalación
                                    </div>
                                </div>
                                <div class="wizard-step wizard-step" v-bind:class="solicitud.estado_id == 5  ? 'wizard-step-active-finish':'wizard-step'" v-for="solicitud in solicitudes">
                                    <div class="wizard-step-icon">
                                        <i class="fab fa-font-awesome-alt">
                                        </i>
                                    </div>
                                    <div class="wizard-step-label barlow semi_bold">
                                        Finalizado
                                    </div>
                                </div>
                                <div class="wizard-step wizard-step" v-bind:class="solicitud.estado_id == 7  ? 'wizard-step-danger':'wizard-step'" v-for="solicitud in solicitudes" v-if="solicitud.estado_id == 7">
                                    <div class="wizard-step-icon">
                                        <i class="fas fa-times-circle">
                                        </i>
                                    </div>
                                    <div class="wizard-step-label barlow semi_bold">
                                        Rechazado
                                    </div>
                                </div>
                                <div class="wizard-step wizard-step" v-bind:class="solicitud.estado_id == 8  ? 'wizard-step-ligth':'wizard-step'" v-for="solicitud in solicitudes" v-if="solicitud.estado_id == 8">
                                    <div class="wizard-step-icon">
                                        <i class="fas fa-times-circle">
                                        </i>
                                    </div>
                                    <div class="wizard-step-label barlow semi_bold">
                                        Eliminado
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-steps" v-if="solicitud.estado_id == 9">
                                <div class="wizard-step wizard-step-danger">
                                    <div class="wizard-step-icon">
                                        <i class="fas fa-window-close">
                                        </i>
                                    </div>
                                    <div class="wizard-step-label barlow semi_bold">
                                        Anulada
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 ">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(#fea858 ,#ed765e);">
                            <div class="card-icon">
                                <i class="fas fa-edit" style="color: white;margin-top:25px;">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Solicitud
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Datos de la solicitud
                            </div>
                        </div>
                        <div class="animated fadeIn">
                            <div class="card-body p-0" style="height:330px;overflow-y:auto">
                                <div class="tickets-list" v-for="solicitud in solicitudes">
                                    <div class="ticket-item">
                                        <div class="row barlow semi_bold">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Activo
                                                    </h4>
                                                </div>
                                                <div>
                                                </div>
                                                <div>
                                                    {{solicitud.activo.descripcion}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Marca
                                                        <a @click="get_marcas()" data-toggle="modal" href="#modal_add_marca" v-if="agregar_marca == 1 && solicitud.estado_id != 9">
                                                            <i class="fas fa-edit">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.marca_id == null">
                                                    <button @click="get_marcas()" class="btn btn-warning" data-target="#modal_add_marca" data-toggle="modal" v-if="agregar_marca == 1 && solicitud.estado_id == 2 && solicitud.subestado_id == 3">
                                                        <i class="fas fa-plus">
                                                        </i>
                                                    </button>
                                                </div>
                                                <div>
                                                </div>
                                                <div>
                                                    {{solicitud.marca ? solicitud.marca.descripcion:''}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Capacidad
                                                        <a @click="get_capacidades()" data-toggle="modal" href="#modal_add_capacidad" v-if="agregar_capacidad== 1 && solicitud.estado_id != 9">
                                                            <i class="fas fa-edit">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.capacidad_id == null">
                                                    <button @click="get_capacidades()" class="btn btn-warning" data-target="#modal_add_capacidad" data-toggle="modal" v-if="agregar_capacidad== 1  && solicitud.estado_id == 2 && solicitud.subestado_id == 3">
                                                        <i class="fas fa-plus">
                                                        </i>
                                                    </button>
                                                </div>
                                                <div>
                                                    {{solicitud.capacidad ? solicitud.capacidad.descripcion:''}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Total Solicitado
                                                        <a data-toggle="modal" href="#modal_edit_total_solicitado" v-if="editar_solicitado == 1 && solicitud.estado_id != 9">
                                                            <i class="fas fa-edit">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div>
                                                    <span class="badge badge-warning" style="font-size: 13px;">
                                                        {{solicitud.total_activo}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row barlow semi_bold">
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Stock
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.validacion_stock == 1">
                                                    SI
                                                </div>
                                                <div>
                                                    <div class="form-group" v-if="solicitud.marca_id != null & solicitud.capacidad_id != null">
                                                        <div class="selectgroup w-100" v-if="solicitud.validacion_stock != 1 & solicitud.validacion_stock != 2">
                                                            <button @click.prevent="updateSolcitudStock(solicitud)" class="btn shadow-box-ag boxBounce" style=" background-color: #ed765e;color: white;border-radius: 3px;" v-if="Aprobar_stock==1">
                                                                Si
                                                            </button>
                                                            <label class="selectgroup-item" style="display:none">
                                                                <input @click.prevent="ShowModalNoStock" class="selectgroup-input" name="no" type="radio"/>
                                                                <span class="selectgroup-button">
                                                                    No
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Negocio
                                                        <a data-toggle="modal" href="#edit_negocio" v-if="agregar_negocio == 1 && solicitud.estado_id != 9 && solicitud.negocio_id != null">
                                                            <i class="fas fa-edit">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.negocio_id == null && agregar_negocio == 1 &&  solicitud.estado_id == 2 && solicitud.subestado_id == 3 || solicitud.negocio_id == null && agregar_negocio == 1 &&  solicitud.estado_id == 2 && solicitud.subestado_id == 4 ">
                                                    <select @change.prevent="updateNecogioCodSap(solicitud)" class="form-control select" v-model="negocioId">
                                                        <option v-bind:value="negocio.id" v-for="negocio in negocios">
                                                            {{negocio.descripcion}}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div v-if="solicitud.negocio_id == 1">
                                                    FIJO
                                                </div>
                                                <div v-if="solicitud.negocio_id == 2">
                                                    MOVIL
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Cod Sap
                                                        <a @click="get_cod_sap" data-toggle="modal" href="#edit_cod_sap" v-if="agregar_cod_sap == 1 && solicitud.estado_id != 9 && solicitud.cod_sap_id != null">
                                                            <i class="fas fa-edit">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.cod_sap_id == null && agregar_cod_sap == 1  && solicitud.estado_id == 2 && solicitud.subestado_id == 3 || solicitud.cod_sap_id == null && agregar_cod_sap == 1  && solicitud.estado_id == 2 && solicitud.subestado_id == 4 ">
                                                    <select @change.prevent="updateCodSap(solicitud)" class="form-control select" v-model="idSap">
                                                        <option v-bind:value="sap.id" v-for="sap in codsaps">
                                                            {{sap.descripcion}}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div v-if="solicitud.cod_sap_id != null">
                                                    {{solicitud.cod_sap ? solicitud.cod_sap.descripcion:''}}
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Ework
                                                        <a @click.prevent="ModalDataDespacho(16)" href="" v-if="solicitud.ework != null & ingresar_nro_ework == 1 ">
                                                            <i class="fas fa-edit">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.ework != null">
                                                    {{solicitud.ework}}
                                                </div>
                                                <div v-if="solicitud.ework == null ">
                                                    <button @click.prevent="ModalDataDespacho(13)" class="btn btn btn-light">
                                                        <i class="fas fa-plus">
                                                        </i>
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
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 ">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(#fea858 ,#ed765e);">
                            <div class="card-icon">
                                <i class="fas fa-dolly" style="color: white;margin-top:30px; ">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Despacho
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Datos del despacho
                            </div>
                        </div>
                        <div class="animated fadeIn">
                            <div class="card-body p-0" style="height:330px;overflow-y:auto">
                                <div class="tickets-list" v-for="solicitud in solicitudes">
                                    <div class="ticket-item">
                                        <div class="row barlow semi_bold">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Pep Origen
                                                        <a @click.prevent="ModalDataDespacho(4)" class="boxBounce" href="" v-if="solicitud.pep_origen != null && ingresar_editar_pep_origen == 1 && solicitud.estado_id != 9">
                                                            <i class="fas fa-edit boxBounce">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.pep_origen != null">
                                                    {{solicitud.pep_origen}}
                                                </div>
                                                <div v-if="solicitud.subestado_id== 5">
                                                    <button @click.prevent="ModalDataDespacho(1)" class="btn btn-light " v-if="solicitud.pep_origen == null && ingresar_editar_pep_origen == 1  && solicitud.estado_id != 9 ">
                                                        <i class="fas fa-plus">
                                                        </i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Pep Destino
                                                        <a @click.prevent="ModalDataDespacho(5)" href="" v-if="solicitud.pep_destino != null  &&
                                                     ingresar_editar_pep_destino == 1 && solicitud.estado_id != 9">
                                                            <i class="fas fa-edit boxBounce">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.pep_destino != null">
                                                    {{solicitud.pep_destino}}
                                                </div>
                                                <div>
                                                    <button @click.prevent="ModalDataDespacho(2)" class="btn btn-light " v-if="solicitud.pep_destino == null && ingresar_editar_pep_destino==1 && solicitud.estado_id == 3">
                                                        <i class="fas fa-plus">
                                                        </i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Nro lote
                                                        <a @click.prevent="ModalDataDespacho(6)" href="" v-if="solicitud.lote != null  && ingresar_editar_nro_lote == 1 && solicitud.estado_id != 9">
                                                            <i class="fas fa-edit boxBounce">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.lote != null">
                                                    {{solicitud.lote}}
                                                </div>
                                                <div>
                                                    <button @click.prevent="ModalDataDespacho(3)" class="btn btn-light" v-if="solicitud.lote == null && ingresar_editar_nro_lote == 1 && solicitud.estado_id == 3">
                                                        <i class="fas fa-plus">
                                                        </i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row barlow semi_bold">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Almacen
                                                        <a @click.prevent="EditAlmacen" href="" v-if="solicitud.almacen_id != null && ingresar_editar_alamacen==1 && solicitud.estado_id != 9 ">
                                                            <i class="fas fa-edit boxBounce">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div>
                                                    <select @change.prevent="AddAlmacen(solicitud,1)" class="form-control" v-if="solicitud.almacen_id== null && ingresar_editar_alamacen == 1 && solicitud.estado_id == 3" v-model="almacenId">
                                                        <option v-bind:value="almacen.id" v-for="almacen in almacenes">
                                                            {{almacen.descripcion}}
                                                        </option>
                                                    </select>
                                                    <div id="datoAlmacen" v-if="solicitud.almacen_id!= null">
                                                        {{solicitud.almacen.descripcion}}
                                                    </div>
                                                </div>
                                                <div id="editDivAlmacen" style="display:none">
                                                    <select @change.prevent="AddAlmacen(solicitud,2)" class="form-control" v-model="almacenId">
                                                        <option v-bind:value="almacen.id" v-for="almacen in almacenes">
                                                            {{almacen.descripcion}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Nro de retiro
                                                        <a @click.prevent="ModalDataDespacho(9)" href="" v-if="solicitud.nro_pedido != null && ingresar_editar_nro_retiro == 1  && solicitud.estado_id != 9">
                                                            <i class="fas fa-edit">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.nro_pedido != null">
                                                    {{solicitud.nro_pedido}}
                                                </div>
                                                <div id="btnpedido">
                                                    <button @click.prevent="ModalDataDespacho(7)" class="btn btn btn-light " v-if="solicitud.nro_pedido == null & ingresar_editar_nro_retiro ==1 && solicitud.estado_id == 3">
                                                        <i class="fas fa-plus">
                                                        </i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Id pedido
                                                        <a @click.prevent="ModalDataDespacho(10)" href="" v-if="solicitud.pedido_id != null && ingresar_editar_id_pedido == 1 && solicitud.estado_id != 9">
                                                            <i class="fas fa-edit">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.pedido_id != null">
                                                    {{solicitud.pedido_id}}
                                                </div>
                                                <div id="btnpedido">
                                                    <button @click.prevent="ModalDataDespacho(8)" class="btn btn btn-light" v-if="solicitud.pedido_id == null  && ingresar_editar_id_pedido == 1 && solicitud.estado_id == 3">
                                                        <i class="fas fa-plus">
                                                        </i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row barlow semi_bold">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Orden de servicio
                                                        <a @click.prevent="ModalDataDespacho(14)" href="" v-if="solicitud.os != null && ingresar_editar_orden_servicio == 1 && solicitud.estado_id != 9 ">
                                                            <i class="fas fa-edit">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.os != null">
                                                    {{solicitud.os}}
                                                </div>
                                                <div id="btn_os" v-if="solicitud.os == null ">
                                                    <button @click.prevent="ModalDataDespacho(11)" class="btn btn btn-light" v-if=" ingresar_editar_orden_servicio == 1 && solicitud.estado_id == 3">
                                                        <i class="fas fa-plus">
                                                        </i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Nro g.despacho
                                                        <a @click.prevent="ModalDataDespacho(15)" href="" v-if="solicitud.nro_guia_despacho != null && ingresar_editar_nro_guia_despacho == 1  && solicitud.estado_id != 9">
                                                            <i class="fas fa-edit">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.nro_guia_despacho != null">
                                                    {{solicitud.nro_guia_despacho}}
                                                </div>
                                                <div id="btn_guia_despacho" v-if="solicitud.nro_guia_despacho == null ">
                                                    <button @click.prevent="ModalDataDespacho(12)" class="btn btn btn-light" v-if="solicitud.nro_guia_despacho == null  && ingresar_editar_nro_guia_despacho == 1 && solicitud.estado_id == 3">
                                                        <i class="fas fa-plus">
                                                        </i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Orden de traslado
                                                        <a @click.prevent="ModalDataDespacho(18)" href="" v-if="solicitud.orden_traslado != null & ingresar_orden_traslado == 1 ">
                                                            <i class="fas fa-edit">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.orden_traslado != null">
                                                    {{solicitud.orden_traslado}}
                                                </div>
                                                <div v-if="solicitud.orden_traslado == null  && ingresar_orden_traslado == 1 && solicitud.estado_id == 3">
                                                    <button @click.prevent="ModalDataDespacho(17)" class="btn btn btn-light">
                                                        <i class="fas fa-plus">
                                                        </i>
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
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 ">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(#fea858 ,#ed765e);">
                            <div class="card-icon">
                                <i class="fas fa-cog" style="color: white;margin-top:30px;">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Estado
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Estado solicitud/Gestión
                            </div>
                        </div>
                        <div class="animated fadeIn">
                            <div class="card-body " style="height:270px;overflow-y:auto" v-for="solicitud in solicitudes">
                                <div class="card">
                                    <span :style="'width:100%;'+'border-radius:3px;'+'background-color:'+solicitud.estado.color+';'+'color:white;'+'opacity: .9'" class="badge ">
                                        <div class="barlow bold" style="font-size: 30px;">
                                            {{solicitud.estado.descripcion }}
                                        </div>
                                        <div class="barlow semi_bold" style="font-size: 26px;margin-top: 5px;">
                                            {{solicitud.subestado ?solicitud.subestado.descripcion:''}}
                                        </div>
                                    </span>
                                </div>
                                <div class="">
                                    <div class="barlow semi_bold" v-if="gestionar_despacho == 1">
                                        <button @click.prevent="AprobarSoliIng(solicitud)" class="btn btn-block btn-info" style="font-size: 17px;" v-if="solicitud.cod_sap_id != null && solicitud.estado_id == 2  ">
                                            Gestionar despacho
                                        </button>
                                    </div>
                                    <div class="barlow semi_bold" v-if="derivar_recepcion == 1">
                                        <button @click.prevent="AprobarSoliIng(solicitud)" class="btn btn-block btn-warning" style="font-size: 17px;" v-if="solicitud.estado_id == 3 ">
                                            Derivar a Recepción
                                        </button>
                                    </div>
                                    <div class="barlow semi_bold">
                                        <button class="btn btn-block btn-success" data-target="#recepcion" data-toggle="modal" style="font-size: 17px;" v-if="solicitud.subestado_id == 11  && solicitud.recepcion == null && confirmar_recepcion == 1 ">
                                            Confirmar Recepción
                                        </button>
                                    </div>
                                    <div class="barlow semi_bold">
                                        <button @click="show_site_select(solicitud)" class="btn btn-block btn-info" data-target="#ModalInstalacion" data-toggle="modal" style="font-size: 17px;" v-if="solicitud.subestado_id==12 && solicitud.instalacion == null && confirmar_instalacion == 1">
                                            Confirmar instalación
                                        </button>
                                    </div>
                                    <div class="barlow semi_bold">
                                        <button @click.prevent="AprobarSoliIng(solicitud)" class="btn btn-block btn-light" style="font-size: 17px;" v-if="solicitud.fecha_instalacion != null && solicitud.subestado_id == 13  && finalizar_solicitud == 1">
                                            Finalizar Solicitud
                                        </button>
                                    </div>
                                    <div class="barlow semi_bold" style="margin-top: 10px;" v-if="anular_solicitud==1 && solicitud.estado_id == 1 && solicitud.subestado_id == 14">
                                        <button @click.prevent="AprobarSoliIng(solicitud)" class="btn btn-success btn-block" style="font-size: 17px;">
                                            Aprobar solicitud
                                        </button>
                                    </div>
                                    <div class="barlow semi_bold" style="margin-top: 10px;" v-if="anular_solicitud==1 && solicitud.estado_id != 9">
                                        <button class="btn btn-danger btn-block" data-target="#anular_solicitud" data-toggle="modal" style="font-size: 17px;">
                                            Anular solicitud
                                        </button>
                                    </div>
                                    <div class="barlow semi_bold" style="margin-top: 10px;" v-if="modificar_estado ==1 && solicitud.estado_id != 9">
                                        <button @click.prevent="getEstados()" class="btn btn-secondary btn-block" data-target="#cambiar_estado_solicitud" data-toggle="modal" style="font-size: 17px;">
                                            Modificar estado
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 " v-for="solicitud in solicitudes">
                    <div class="card card-hero shadow-box-ag" v-if="solicitud.site_id != null">
                        <div class="card-header" style="background-image: linear-gradient(#fea858 ,#ed765e);">
                            <div class="card-icon">
                                <i class="fas fa-globe-americas" style="color: white;margin-top:30px;">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Sitio
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Datos del sitio
                            </div>
                        </div>
                        <div class="animated fadeIn">
                            <div class="card-body p-0" style="max-height:270px;overflow-y:auto">
                                <div class="tickets-list">
                                    <div class="ticket-item">
                                        <div class="row barlow semi_bold">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Nombre
                                                    </h4>
                                                </div>
                                                <div>
                                                    {{solicitud.site.nombre}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Nemonico
                                                    </h4>
                                                </div>
                                                <div>
                                                    {{solicitud.site.nem_site}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Tipo
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.site.site_type_id==1">
                                                    FIJO
                                                </div>
                                                <div v-if="solicitud.site.site_type_id==2">
                                                    MOVIL
                                                </div>
                                                <div v-if="solicitud.site.site_type_id==3">
                                                    SWITCH
                                                </div>
                                                <div v-if="solicitud.site.site_type_id==4">
                                                    PHONE
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row wrapper wrapper-content barlow semi_bold">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Clasificación
                                                    </h4>
                                                </div>
                                                <span class="badge " style="background-color:#42e8b4;color: white; " v-if="solicitud.site.classification_type_id == 1 ">
                                                    A
                                                </span>
                                                <span class="badge " style="background-color:#005cff;color: white; " v-if="solicitud.site.classification_type_id == 2 ">
                                                    B
                                                </span>
                                                <span class="badge badge-warning" style="" v-if="solicitud.site.classification_type_id == 3 ">
                                                    C
                                                </span>
                                                <span class="badge " style="background-color:#6c757d;color: white ; " v-if="solicitud.site.classification_type_id == 4 ">
                                                    D
                                                </span>
                                                <span class="badge " style="background-color:#6c757d;color: white ; " v-if="solicitud.site.classification_type_id == 5 ">
                                                    E
                                                </span>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Atención en Terreno
                                                    </h4>
                                                </div>
                                                <span class="badge badge-info " style="font-size: 15px;" v-if="solicitud.site.attention_priority_type_id == 1">
                                                    P1
                                                </span>
                                                <span class="badge badge-success" style="font-size: 15px;" v-if="solicitud.site.attention_priority_type_id == 2">
                                                    P2
                                                </span>
                                                <span class="badge badge-dark" style="font-size: 15px;" v-if="solicitud.site.attention_priority_type_id == 3">
                                                    P3
                                                </span>
                                                <span class="badge badge-light" style="font-size: 15px;" v-if="solicitud.site.attention_priority_type_id == 4">
                                                    P4
                                                </span>
                                                <span class="badge badge-light" style="font-size: 15px;" v-if="solicitud.site.attention_priority_type_id == 5">
                                                    P5
                                                </span>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Tipo de Atención
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.site.attention_type_id == 1">
                                                    5X8
                                                </div>
                                                <div v-if="solicitud.site.attention_type_id == 2">
                                                    24/7
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row wrapper wrapper-content barlow semi_bold">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Planificación
                                                    </h4>
                                                </div>
                                                <span class="badge badge-info " style="font-size: 15px;" v-if="solicitud.site.category_type_id ==1">
                                                    A
                                                </span>
                                                <span class="badge badge-success " style="font-size: 15px;" v-if="solicitud.site.category_type_id ==2">
                                                    A+
                                                </span>
                                                <span class="badge badge-dark " style="font-size: 15px;" v-if="solicitud.site.category_type_id ==3">
                                                    A++
                                                </span>
                                                <span class="badge badge-light " style="font-size: 15px;" v-if="solicitud.site.category_type_id ==4">
                                                    B+
                                                </span>
                                                <span class="badge badge-primary " style="font-size: 15px;" v-if="solicitud.site.category_type_id ==5">
                                                    C
                                                </span>
                                                <span class="badge badge-danger " style="font-size: 15px;" v-if="solicitud.site.category_type_id ==6">
                                                    C+
                                                </span>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Cód planificación
                                                    </h4>
                                                </div>
                                                <div>
                                                    {{solicitud.site.cod_planificacion}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row barlow semi_bold">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Dirección
                                                    </h4>
                                                </div>
                                                <div>
                                                    {{solicitud.site.pop.direccion}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Región
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 1">
                                                    Arica y Parinacota
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 2">
                                                    Tarapacá
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 3">
                                                    Antofagasta
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 4">
                                                    Atacama
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 5">
                                                    Coquimbo
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 6">
                                                    Valparaíso
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 7">
                                                    Región Metropolitana
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 8">
                                                    Libertador Bernardo O'Higgins
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 9">
                                                    Maule
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 10">
                                                    Bío-Bío
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 11">
                                                    Araucanía
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 12">
                                                    Los Ríos
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 13">
                                                    Los Lagos
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 14">
                                                    Aisén del General Carlos Ibáñez del Campo
                                                </div>
                                                <div v-if="solicitud.site.pop.comuna.region_id == 15">
                                                    Magallanes y Antártica Chilena
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Comuna
                                                    </h4>
                                                </div>
                                                <div>
                                                    {{solicitud.site.pop.comuna.nombre_comuna}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row barlow semi_bold">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Latitud
                                                    </h4>
                                                </div>
                                                <div>
                                                    {{solicitud.site.pop.latitude}}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Longitud
                                                    </h4>
                                                </div>
                                                <div>
                                                    {{solicitud.site.pop.longitude}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-hero shadow-box-ag" v-if="solicitud.oficina_id != null">
                        <div class="card-header" style="background-image: linear-gradient(#fea858 ,#ed765e);">
                            <div class="card-icon">
                                <i class="fas fa-building" style="color: white;margin-top:30px;">
                                </i>
                            </div>
                            <h4>
                                Oficina Zonal
                            </h4>
                            <div class="card-description">
                                Datos de la oficina zonal
                            </div>
                        </div>
                        <div class="animated fadeIn">
                            <div class="card-body p-0" style="max-height:270px;overflow-y:auto">
                                <div class="tickets-list">
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Región
                                                    </h4>
                                                    <div>
                                                        {{solicitud.oficina.region}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Zona
                                                    </h4>
                                                    <div>
                                                        {{solicitud.oficina.zona}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Crm
                                                    </h4>
                                                    <div v-if="solicitud.oficina.crm_id==1">
                                                        Norte
                                                    </div>
                                                    <div v-if="solicitud.oficina.crm_id==2">
                                                        Centro Norte
                                                    </div>
                                                    <div v-if="solicitud.oficina.crm_id==3">
                                                        Metropolitano
                                                    </div>
                                                    <div v-if="solicitud.oficina.crm_id==4">
                                                        Centro Sur
                                                    </div>
                                                    <div v-if="solicitud.oficina.crm_id==5">
                                                        Sur
                                                    </div>
                                                    <div v-if="solicitud.oficina.crm_id==6">
                                                        Austral
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Agregar sitio
                                                    </h4>
                                                    <div>
                                                        <button class="btn btn-warning" data-target="#AddSiteModal" data-toggle="modal" v-for="permiso in permisos" v-if="permiso.permission_id == 164">
                                                            <i class="fas fa-plus">
                                                            </i>
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
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 ">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(#fea858 ,#ed765e);">
                            <div class="card-icon">
                                <i class="fas fa-truck-loading" style="color:white;margin-top:30px;">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Recepción
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Datos de la Recepción
                            </div>
                        </div>
                        <div class="animated fadeIn">
                            <div class="card-body p-0" style="height:270px;overflow-y:auto">
                                <div class="tickets-list">
                                    <div class="ticket-item">
                                        <div class="row barlow semi_bold" v-for="solicitud in solicitudes">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Fecha estimada Instalación
                                                    </h4>
                                                </div>
                                                <div>
                                                    {{formato(solicitud.fecha_estimada_instalacion)}}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Cantidad recibida
                                                    </h4>
                                                </div>
                                                <div>
                                                    <span class="badge badge-danger" v-if="solicitud.total_activo != solicitud.cantidad_recepcionada">
                                                        {{solicitud.cantidad_recepcionada}}
                                                    </span>
                                                    <span class="badge badge-info" v-if="solicitud.total_activo == solicitud.cantidad_recepcionada">
                                                        {{solicitud.cantidad_recepcionada}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row barlow semi_bold" v-for="recepcionista in recepcionistas">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Recepcionista
                                                    </h4>
                                                </div>
                                                <div>
                                                    {{recepcionista.name}} {{recepcionista.apellido}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 ">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(#fea858 ,#ed765e);">
                            <div class="card-icon">
                                <i class="fas fa-car-battery" style="color: white;margin-top:30px;">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Instalación
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Datos de la instalación
                            </div>
                        </div>
                        <div class="animated fadeIn">
                            <div class="card-body p-0" style="height:270px;overflow-y:auto">
                                <div class="tickets-list" v-for="solicitud in solicitudes">
                                    <div class="ticket-item">
                                        <div class="row barlow semi_bold">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Fecha instalación
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.fecha_instalacion != null">
                                                    {{formato(solicitud.fecha_instalacion)}}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Sitio
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.nombre_sitio_instalacion != null">
                                                    {{solicitud.nombre_sitio_instalacion}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row barlow semi_bold">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Documento(s)
                                                    </h4>
                                                </div>
                                                <div class="gallery-item" data-image="../layout/img/news/img01.jpg" data-title="Image 1" v-for="archivo in archivos">
                                                    <a :href="'/archivospsa/'+archivo.nombre_archivo" target="blank_">
                                                        <div>
                                                            <i :class="getFileExtension(archivo.nombre_archivo) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(archivo.nombre_archivo) == 'xls' || getFileExtension(archivo.nombre_archivo) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(archivo.nombre_archivo) == 'doc' || getFileExtension(archivo.nombre_archivo) == 'docx' ? 'far fa-file-word':( getFileExtension(archivo.nombre_archivo) == 'img' || getFileExtension(archivo.nombre_archivo) == 'jpg' || getFileExtension(archivo.nombre_archivo) == 'jpeg' ||  getFileExtension(archivo.nombre_archivo) == 'png' ? 'far fa-image':'far fa-file')))" class="fas fa-file mr-3" style="font-size: 50px;color: #191919">
                                                            </i>
                                                        </div>
                                                        <div>
                                                            {{archivo.nombre_archivo}}
                                                        </div>
                                                    </a>
                                                    <button @click.prevent="DeleteArchivos(archivo)" class="btn btn-danger" style="display:none">
                                                        Eliminar
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title">
                                                    <h4 style="color:#191919;">
                                                        Baterías instaladas
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.total_bateria_instalado != null">
                                                    {{solicitud.total_bateria_instalado}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 ">
                    <div class="card card-hero chat-box shadow-box-ag" id="mychatbox">
                        <div class="card-header" style="background-image: linear-gradient(#fea858 ,#ed765e);">
                            <div class="card-icon">
                                <i class="fas fa-comment-alt" style="color: white;font-size: ;margin-left: -170px;margin-top: 30px;">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Bitácora
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Información de cambios
                            </div>
                        </div>
                        <div class="card-body chat-content ">
                            <div v-for="bita in bitacoras">
                                <div class="chat-item chat-left" style="">
                                    <img v-bind:src="bita.user.avatar"/>
                                    <div class="chat-details">
                                        <div class="chat barlow bold">
                                            {{bita.user.name}} {{bita.user.apellido}}
                                        </div>
                                        <div class="chat-text barlow semi_bold">
                                            {{bita.descripcion}}
                                        </div>
                                        <div class="chat-time barlow regular">
                                            {{formato(bita.created_at)}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer chat-form">
                            <form v-on:submit.prevent="registrarBitacoraPsa">
                                <input class="form-control" id="descripcion" name="descripcion" placeholder="Escribe un mensaje" required="true" type="text" v-model="mensaje_bitacora"/>
                                <button class="btn btn-warning" type="submit">
                                    <i class="far fa-paper-plane" style="color:white">
                                    </i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" id="AddSiteModal" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);">
                            <h4 class="modal-title" style="color: white">
                                Añadir sitio
                            </h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>
                                    Sitio
                                </label>
                                <div id="popcheck" style="display: none">
                                    <div class="input-group ">
                                        <input @click.prevent="
                                                      changePop" class="form-control " id="popName" name="" type="text" value="">
                                        </input>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fas fa-undo-alt">
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="popSearch">
                                    <div class="input-group ">
                                        <input class="form-control " id="inputSitio" name="datositio" placeholder="Buscar Sitio" type="text" v-model="datositio" v-on:keyup="BuscarSitio">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-search">
                                                    </i>
                                                </div>
                                            </div>
                                        </input>
                                    </div>
                                    <div class="row" id="listPops" style="display:none;">
                                        <div class="col-lg-12 col-md-4 col-sm-4 col-10 shadow-box-ag full-height-scroll " style="max-height:120px;overflow-y:auto">
                                            <div v-for="pop in pops">
                                                <a @click.prevent="selectdpop(pop)" href="" id="selectpopvalue" style="color:black">
                                                    {{pop.nem_site}}  {{pop.nombre}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="errorPop" style="display: none">
                                    <p style="color: red">
                                        Favor Seleccionar el sitio o la oficina
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" v-for="solicitud in solicitudes">
                            <a @click.prevent="AddDataSite(solicitud)" class="btn btn-info " href="#" style="color:white">
                                Aceptar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" id="Datosdespacho" role="dialog" tabindex="-1">
                <div class="modal-dialog ">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);">
                            <h5 class="modal-title" style="color:white">
                                {{nombreDatoDespacho}}
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
                                    {{nombreDatoDespacho}}*
                                </label>
                                <input class="form-control" name="" type="" v-model="datoDespacho">
                                    <div id="errorDatosDespacho" style="display: none">
                                        <p style="color: red">
                                            Favor rellenar el campo
                                        </p>
                                    </div>
                                </input>
                            </div>
                        </div>
                        <div class="modal-footer" v-for="solicitud in solicitudes">
                            <a @click.prevent="AddDataDespacho(solicitud)" class="btn btn-info " href="#" style="color:white">
                                Aceptar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <form @submit.prevent="RecepcionBaterias(solicitud)" class="needs-validation" novalidate="" v-for="solicitud in solicitudes">
                <div aria-hidden="true" class="modal inmodal" id="recepcion" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);height: 70px;">
                                <h5 class="modal-title blanco barlow semi_bold">
                                    Confirmación de recepción
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>
                                                Fecha de Instalación*
                                            </label>
                                            <input @change.prevent="deleteError()" autofocus="" class="form-control" name="fechaInstalacion" require="true" required="true" type="date" v-model="fechaInstalacion"/>
                                            <div id="errorFechaInstalacion" style="display: none">
                                                <p style="color: red">
                                                    Favor ingresar fecha
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Cantidad recibida de  Baterías*
                                            </label>
                                            <input @keyup.prevent="deleteError()" autofocus="" class="form-control" name="" require="true" style="width: 100%" type="number" v-model="CantidadRecepcionada"/>
                                            <div id="errorCantidadRecibida" style="display: none">
                                                <p style="color: red">
                                                    Favor ingresar la cantidad recibida
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-warning" style="color: white" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form class="needs-validation" novalidate="">
                <div aria-hidden="true" class="modal inmodal" id="cambiar_estado_solicitud" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);height: 70px;">
                                <h5 class="modal-title blanco barlow semi_bold">
                                    Cambiar estado
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>
                                                Estado*
                                            </label>
                                            <select @change.prevent="getSubEstados()" class="form-control select" v-model="estado_select_id">
                                                <option :value="estado.id" v-for="estado in estados">
                                                    {{estado.descripcion}}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Sub Estado*
                                            </label>
                                            <select class="form-control select" v-model="sub_estado_select_id">
                                                <option :value="subestado.id" v-for="subestado in subestados">
                                                    {{subestado.descripcion}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button @click.prevent="updateSateRequestPsa" class="btn btn-warning" style="color: white" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form>
                <div aria-hidden="true" class="modal inmodal" id="ModalInstalacion" role="dialog" tabindex="-1">
                    <div class="modal-dialog ">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);height: 70px;">
                                <h5 class="modal-title blanco">
                                    Confirmación de instalación
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true" class="blanco">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>
                                                Sitio *
                                            </label>
                                            <div id="site_search_show_view">
                                                <div class="input-group ">
                                                    <input class="form-control " id="input_search_site_show_view" name="datositio" placeholder="Buscar Sitio" type="text" v-model="datositio" v-on:keyup="search_sites"/>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-search">
                                                            </i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="list_sites_psa" style="display: none">
                                                <div class="s_l">
                                                    <div :style="'width:'+input_width_form+'px'+';'" class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                                        <div v-for="site in sites">
                                                            <a @click.prevent="select_site_install_batery(site)" href="" id="selectpopvalue" style="color:black">
                                                                {{site.nem_site}}  {{site.nombre}}
                                                                <hr style="margin-top: -1px;"/>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="site_select_psa_show_view" style="display: none">
                                                <div class="input-group">
                                                    <input class="form-control" disabled="true" name="" style="background-color:rgb(254, 168, 88);color:white;" type="" v-bind:value="site_info_select"/>
                                                    <div class="input-group-append">
                                                        <div @click.prevent="change_site_show_view()" class="input-group-text " style="cursor: pointer  ">
                                                            <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                                            </i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="error_select_site_show_view" style="display: none">
                                                <p style="color: red">
                                                    Favor Seleccionar el sitio
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Archivos*
                                            </label>
                                            <input class="form-control" id="archivos" multiple="" ref="archivos" type="file" v-on:change="handleFileUploads()"/>
                                            <div id="errorfile" style="display: none">
                                                <p style="color: red">
                                                    Favor subir uno o mas archivos
                                                </p>
                                            </div>
                                            <div class="card" style="border-radius: 5px; margin-top: 10px;" v-if="archivos.length != 0">
                                                <div class="card-body">
                                                    <p class="barlow semi_bold" style="text-align: center">
                                                        {{archivos.length == 1 ? archivos.length+' '+'Archivo seleccionado' :(archivos.length > 1 ? archivos.length +' '+ 'Archivos seleccionados':'')}}
                                                    </p>
                                                    <ul class="list-unstyled">
                                                        <li class="media" style="margin-top: 10px;" v-for="(file, key) in archivos">
                                                            <i :class="getFileExtension(file.name) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(file.name) == 'xls' || getFileExtension(file.name) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(file.name) == 'doc' || getFileExtension(file.name) == 'docx' ? 'far fa-file-word':( getFileExtension(file.name) == 'img' || getFileExtension(file.name) == 'jpg' || getFileExtension(file.name) == 'jpeg' ||  getFileExtension(file.name) == 'png' ? 'far fa-image':'far fa-file')))" class="fas fa-file mr-3" style="font-size: 50px;">
                                                            </i>
                                                            <div class="media-body">
                                                                <p class="barlow regular">
                                                                    {{file.name}}
                                                                </p>
                                                            </div>
                                                            <button @click.prevent="removeFileArchivo( key )" class="btn btn-danger mr-3" style="margin-top: 18px; ">
                                                                <i class="fas fa-window-close blanco">
                                                                </i>
                                                            </button>
                                                        </li>
                                                        <hr/>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Total de baterías instaladas*
                                            </label>
                                            <input class="form-control" name="" type="number" v-model="total_bateria_instalada">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color: white" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="ConfirmacionInstalacion(solicitud)" class="btn btn-warning" style="color: white" type="submit" v-for="solicitud in solicitudes">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div aria-hidden="true" class="modal inmodal" id="modal_add_marca" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);height: 70px;">
                            <h5 class="modal-title blanco barlow semi_bold">
                                Indicar marca
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>
                                            Marcas*
                                        </label>
                                        <select class="form-control select" v-model="marca_id">
                                            <option v-bind:value="marca.id" v-for="marca in marcas">
                                                {{marca.descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click.prevent="add_marca_request()" class="btn btn-warning" style="color: white" type="button">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" id="modal_add_capacidad" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);height: 70px;">
                            <h5 class="modal-title blanco barlow semi_bold">
                                Indicar capacidad
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>
                                            Capacidades*
                                        </label>
                                        <select class="form-control select" v-model="capacidad_id">
                                            <option v-bind:value="capacidad.id" v-for="capacidad in capacidades">
                                                {{capacidad.descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click.prevent="add_capacidad_request()" class="btn btn-warning" style="color: white" type="button">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" id="modal_edit_total_solicitado" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);height: 70px;">
                            <h5 class="modal-title blanco barlow semi_bold">
                                Editar total solicitado
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>
                                            Cantidad de baterías*
                                        </label>
                                        <input class="form-control" name="" type="text" v-model="total_activo"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click.prevent="edit_total_batery()" class="btn btn-warning" style="color: white" type="button">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" id="edit_negocio" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);height: 70px;">
                            <h5 class="modal-title blanco barlow semi_bold">
                                Editar negocio
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>
                                            Negocio*
                                        </label>
                                        <select class="form-control select" v-model="negocioId">
                                            <option v-bind:value="negocio.id" v-for="negocio in negocios">
                                                {{negocio.descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click.prevent="edit_negocio()" class="btn btn-warning" style="color: white" type="button">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" id="edit_cod_sap" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);height: 70px;">
                            <h5 class="modal-title blanco barlow semi_bold">
                                Editar codigo sap
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>
                                            Cod Sap*
                                        </label>
                                        <select class="form-control select" v-model="idSap">
                                            <option v-bind:value="sap.id" v-for="sap in codsaps">
                                                {{sap.descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click.prevent="editar_codigo_sap()" class="btn btn-warning" style="color: white" type="button">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" id="anular_solicitud" role="dialog" tabindex="-1">
                <div class="modal-dialog ">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);height: 70px;">
                            <h5 class="modal-title blanco barlow semi_bold">
                                Anular solicitud
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>
                                            Motivo*
                                        </label>
                                        <textarea class="form-control" style="height:150px;" v-model="motivo_anulacion">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click.prevent="anular_solicitud_psa()" class="btn btn-warning" style="color: white" type="button">
                                Aceptar
                            </button>
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
import EventBus from "./event-bus"


export default {
    props: [ 'id','permisos','solicitud','bitacora' ],
    data(){
        return{
          bitacoras:[],  
          solicitudes:[],
          idSearch:'',
          busqueda:1,
          permissions:[],
          almacenes:[],
          negocios:[],
          negocioId:'',
          idSap:'',
          codsaps:[],
          almacenId:'',
          nombreDatoDespacho:'',
          tipoDataDespacho:'',
          datoDespacho:'',
          fechaInstalacion:'',
          CantidadRecepcionada:'',
          datositio:'',
          pops:[],
          popId:'',
          archivos:[],
          recepcionistas:[],
          archivos:[],
          pops:[],
          popId:'',
          sitioSelected:'',
          sites:[],
          input_width_form:0,
          site_info_select:'',
          marcas:[],
          marca_id:'',
          capacidad_id:'',
          capacidades:[],
          agregar_marca:0,
          agregar_capacidad:0,
          Aprobar_stock:0,
          seleccionar_negocio:0,
          seleccionar_cod_sap:0,
          ingresar_editar_pep_origen:0,
          ingresar_editar_pep_destino:0,
          ingresar_editar_nro_lote:0,
          ingresar_editar_alamacen:0,
          ingresar_editar_nro_retiro:0,
          ingresar_editar_id_pedido:0,
          ingresar_editar_orden_servicio:0,
          ingresar_editar_nro_guia_despacho:0,
          gestionar_despacho:0,
          derivar_recepcion:0,
          ingresar_nro_ework:0,
          finalizar_solicitud:0,
          confirmar_recepcion:0,
          confirmar_instalacion:0,
          editar_solicitado:0,
          total_activo:'',
          agregar_negocio:0,
          agregar_cod_sap:0,
          anular_solicitud:0,
          motivo_anulacion:'',
          modificar_estado:0,
          estados:[],
          subestados:[],
          estado_select_id:'',
          mensaje_bitacora:'',
          sub_estado_select_id:'',
          ingresar_orden_traslado:'',
          total_bateria_instalada:''



        }
    },

    created:function(){
  
    this.solicitudes = this.solicitud;
    this.bitacoras = this.bitacora;
    this.GetPermisos()
    this.getAlmacen()
    this.GetNegocio()
    this.GetRecepcionista()
    this.GetFiles()
    this.getExtensions()
        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('bitacora.getBitacora', function () {
            self.getBitacora(); // ejecutas el metodo que desees
        });
        window.Echo.channel('logout-session').listen('CloseSessionLogoutEvent',(e)=>{
             window.location.replace("/login");
            });

    },
    methods:{
        updateNecogioCodSap: function(solicitud) {
         axios.get(`/updateNecogioCodSap?id=${solicitud.id}&negocio=${this.negocioId}&marca=${solicitud.marca_id}`).then((response) => {
             this.codsaps = response.data;
             if (this.idSearch != '') {
                 this.getSolicitudSearch()
             } else {
                 if (this.idSearch == '') {
                     this.getSolicitud()
                 }
             }
         })
     },
     getExtensions() {
                axios.get('/repositorio/extensions').then((response) => {
                    this.extensions = response.data;
                })
    },
     GetPermisos: function() {
     
        for (var i = 0; i < this.permisos.length; i++) {
               let per = this.permisos[i]
               if(per.permission_id == 2){
                   this.agregar_marca = 1;
               }
               if(per.permission_id == 3){
                   this.agregar_capacidad = 1;
               }
               if(per.permission_id == 4){
                   this.Aprobar_stock = 1;
               }
               if(per.permission_id == 5){
                   this.seleccionar_negocio = 1;
               }
               if(per.permission_id == 6){
                   this.seleccionar_cod_sap = 1;
               }
               if(per.permission_id == 7){
                   this.ingresar_editar_pep_origen = 1;
               }
                if(per.permission_id == 8){
                   this.ingresar_editar_pep_destino = 1;
               }
               if(per.permission_id == 9){
                   this.ingresar_editar_nro_lote = 1;
               }
                if(per.permission_id == 10){
                   this.ingresar_editar_alamacen = 1;
               }
                if(per.permission_id == 11){
                   this.ingresar_editar_nro_retiro = 1;
               }
                if(per.permission_id == 12){
                   this.ingresar_editar_id_pedido = 1;
               }
                if(per.permission_id == 13){
                   this.ingresar_editar_orden_servicio = 1;
               }
               if(per.permission_id == 14){
                   this.ingresar_editar_nro_guia_despacho = 1;
               }
               if(per.permission_id == 15){
                   this.gestionar_despacho = 1;
               }
               if(per.permission_id == 16){
                   this.derivar_recepcion = 1;
               }
               if(per.permission_id == 17){
                   this.ingresar_nro_ework = 1;
               }
               if(per.permission_id == 18){
                   this.finalizar_solicitud = 1;
               }
               if(per.permission_id == 19){
                   this.confirmar_recepcion = 1;
               }
               if(per.permission_id == 20){
                   this.confirmar_instalacion = 1;
               }
               if(per.permission_id == 24){
                 this.editar_solicitado = 1;
               }
               if(per.permission_id == 25){
                 this.agregar_negocio = 1;
               }
               if(per.permission_id == 26){
                 this.agregar_cod_sap = 1;
               }
               if(per.permission_id == 23){
                 this.anular_solicitud = 1;
               }
              if(per.permission_id == 27){
                 this.modificar_estado = 1;
               }
               if(per.permission_id == 28){
                 this.ingresar_orden_traslado = 1;
               }

               
               
               
               
               
               
        }
       
     },
     getEstados:function(){
        axios.get('/get-estados-psa').then(response=>{
            this.estados = response.data;
        })
     },
     getSubEstados:function(){
       
        axios.get(`/get-sub-estados-psa?estado_id=${this.estado_select_id}`).then(response=>{
            this.subestados = response.data;

        })
     },
     AddDataSite: function(solicitud) {
         if (this.popId != '') {
             $('#AddSiteModal').modal('hide');
             axios.get(`/AddSitePsa?site_id=${this.popId}&id=${solicitud.id}`).then((response) => {
                 this.changePop()
                 this.load()
                 this.loadSolicitudData()
             })
         }
     },
     updateSateRequestPsa:function(){
         for (var i = 0; i < this.solicitudes.length; i++) {
             let solicitud = this.solicitudes[i]
             var id = solicitud.id
         }

       
        if(this.estado_select_id != '' && this.sub_estado_select_id != ''){
            axios.get(`/update-estado-sub-estado-psa?estado_id=${this.estado_select_id}&subestado_id=${this.sub_estado_select_id}&solicitud_id=${this.id}`).then(response=>{
                $("#cambiar_estado_solicitud").modal('hide');
                this.estado_select_id = '';
                this.sub_estado_select_id = '';
                this.subestados=[];
            }).finally(() => this.getSolicitud())
        }
       
     },
     GetFiles: function() {
         if (this.idSearch != '') {
             axios.get('/GetFilesPsa/' + this.idSearch).then((response) => {
                 this.archivos = response.data;
             })
         } else {
             if (this.idSearch == '') {
                 axios.get('/GetFilesPsa/' + this.id).then((response) => {
                     this.archivos = response.data;
                 })
             }
         }
     },
     formato: function(d) {
         return moment(d).format("DD/MM/YY - hh:mm:ss");
     },
     AprobarSoliIng: function(solicitud) {
         axios.get('/updateSlc/' + solicitud.id).then((response) => {
             this.load()
             this.loadSolicitudData()
         })
     },
     ConfirmacionInstalacion: function(solicitud) {
         if (this.popId == '') {
             document.getElementById('error_select_site_show_view').style.display = 'block'
         }
         if (this.archivos.length == 0) {
             document.getElementById('errorfile').style.display = 'block'
         }
         if (this.popId != '' && this.archivos.length != 0 && this.total_bateria_instalada != '') {
             let formData = new FormData();
             formData.append('pop', this.popId);
             formData.append('total_bateria_instalada', this.total_bateria_instalada);
             formData.append('id', solicitud.id);
             for (var i = 0; i < this.archivos.length; i++) {
                 let archivo = this.archivos[i];
                 formData.append('files[' + i + ']', archivo);
             }
             axios.post('/confirmacionInstlacion', formData, {
                 headers: {
                     'Content-Type': 'multipart/form-data'
                 }
             }).then((response) => {
                 $("#ModalInstalacion").modal('hide');
                 this.load();
                 this.change_site_show_view();
                 this.archivos = [];
                 this.loadSolicitudData();
                 this.GetFiles()
                 $("#archivos").val('');
             })
         }
     },
     AddSite: function() {},
     search_sites: function() {
         if (this.datositio.length >= 3) {
             this.input_width_form = document.getElementById("input_search_site_show_view").clientWidth;
             document.getElementById("list_sites_psa").style.display = 'block';
             axios.get(`/GetPop?datositio=${this.datositio}`).then((response) => {
                 this.sites = response.data
             });
         } else {
            document.getElementById("list_sites_psa").style.display = 'none';
             this.sites = '';
            
         }
     },
     deleteError: function() {
         if (this.fechaInstalacion != '') {
             document.getElementById('errorFechaInstalacion').style.display = 'none'
         }
         if (this.CantidadRecepcionada != '') {
             document.getElementById('errorCantidadRecibida').style.display = 'none'
         }
         if (this.archivos.length != 0) {
             document.getElementById('errorfile').style.display = 'none'
         }
     },
     RecepcionBaterias: function(solicitud) {
         if (this.fechaInstalacion == '') {
             document.getElementById('errorFechaInstalacion').style.display = 'block'
         }
         if (this.CantidadRecepcionada == '') {
             document.getElementById('errorCantidadRecibida').style.display = 'block'
         }
         if (this.fechaInstalacion != '' && this.CantidadRecepcionada != '') {
             $('#recepcion').modal('hide');
             axios.get(`/receptionBaterias?id=${solicitud.id}&fechaInstalacion=${this.fechaInstalacion}&cantidadRecivida=${this.CantidadRecepcionada}`).then((response) => {
                 this.load()
                 this.loadSolicitudData()
                 this.GetRecepcionista()
             })
         }
     },

     registrarBitacoraPsa:function(){
             axios.get(`/regsitrar-bitacora-psa?mensaje=${this.mensaje_bitacora}&solicitud_id=${this.id}`).then(response=>{
                   this.get_bitacora();
                   this.mensaje_bitacora = '';
             })
     },

     get_bitacora:function(){
         axios.get('/get-msj-log-psa/'+this.id).then(response=>{
            this.bitacoras = response.data
         })
     },
     handleFileUploads: function() {
         var uploadedFiles = this.$refs.archivos.files;
         for (var i = 0; i < uploadedFiles.length; i++) {

            let file = uploadedFiles[i];
            let file_extension = file.name.split(".").pop()
            let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
              if (extension_permited) {
                this.archivos.push(uploadedFiles[i]);
             }
        }
         
         this.deleteError()
     },
     removeFileArchivo(key) {
         this.archivos.splice(key, 1);
     },
     BuscarSitio: function() {
         if (this.datositio.length >= 3) {
             var url = '/GetPop'
             var box = document.getElementById('listPops');
             box.style.display = '';
             axios.get(`/GetPop?datositio=${this.datositio}`).then((response) => {
                 this.pops = response.data
             });
         } else {
             this.pops = '';
             var box = document.getElementById('listPops');
             box.style.display = 'none';
         }
     },
     GetRecepcionista: function() {
        axios.get('/recepcionista/' + this.id).then((response) => {
            this.recepcionistas = response.data;
        })
             
       
     },
   
     select_site_install_batery:function(site){
          document.getElementById("site_search_show_view").style.display='none'; 
          document.getElementById("list_sites_psa").style.display='none'; 
          document.getElementById("site_select_psa_show_view").style.display='block'; 
          document.getElementById("error_select_site_show_view").style.display='none'; 
          this.site_info_select = site.nem_site + '-' + site.nombre
          this.popId = site.id;
          this.sites = [];

     },
     change_site_show_view:function(){
          document.getElementById("site_search_show_view").style.display='block'; 
          document.getElementById("site_select_psa_show_view").style.display='none'; 
   
          this.site_info_select ='';
          this.popId = '';
          this.sites = [];
          this.datositio = '';
     },
     EditAlmacen: function() {
         var dato = document.getElementById('datoAlmacen').style.display = 'none';
         var select = document.getElementById('editDivAlmacen').style.display = 'block';
     },
     selectdpop: function(pop) {
         this.popId = pop.id;
         var box = document.getElementById('listPops');
         var selectPop = document.getElementById('popcheck');
         var searchPop = document.getElementById('popSearch');
         var divAlertPop = document.getElementById('errorPop');
         this.pops = '';
         searchPop.style.display = 'none';
         selectPop.style.display = '';
         divAlertPop.style.display = 'none';
         $("#popName").val(pop.nem_site + '-' + pop.nombre);
         box.style.display = 'none';
     },
     AddDataDespacho: function(solicitud) {
       
       
         if (this.tipoDataDespacho == 1 || this.tipoDataDespacho == 4) {
             if (this.datoDespacho == '') {
                 var mensaje = 'Favor rellenar el campo'
                 this.alert_error(mensaje)
             } else {
                 if (this.datoDespacho != '') {
                      $('#Datosdespacho').modal('hide');
                     axios.get(`/addPepOrigen?id=${solicitud.id}&dato=${this.datoDespacho}`).then((response) => {
                         this.datoDespacho = ''
                         this.load()
                         this.loadSolicitudData()
                     })
                 }
             }
         } else {
             if (this.tipoDataDespacho == 2 || this.tipoDataDespacho == 5) {
                 if (this.datoDespacho == '') {
                     var mensaje = 'Favor rellenar el campo'
                     this.alert_error(mensaje)
                 } else {
                     if (this.datoDespacho != '') {
                         $('#Datosdespacho').modal('hide');
                         axios.get(`/addPepDestino?id=${solicitud.id}&dato=${this.datoDespacho}`).then((response) => {
                             this.datoDespacho = ''
                             this.load()
                             this.loadSolicitudData()
                         })
                     }
                 }
             } else {
                 if (this.tipoDataDespacho == 3 || this.tipoDataDespacho == 6) {
                     if (this.datoDespacho == '') {
                         var mensaje = 'Favor rellenar el campo'
                         this.alert_error(mensaje)
                     } else {
                         if (this.datoDespacho != '') {
                             $('#Datosdespacho').modal('hide');
                             axios.get(`/addNroLote?id=${solicitud.id}&dato=${this.datoDespacho}`).then((response) => {
                                 this.datoDespacho = ''
                                 this.load()
                                 this.loadSolicitudData()
                             })
                         }
                     }
                 } else {
                     if (this.tipoDataDespacho == 7 || this.tipoDataDespacho == 9) {
                         if (this.datoDespacho == '') {
                             var mensaje = 'Favor rellenar el campo'
                             this.alert_error(mensaje)
                         } else {
                             if (this.datoDespacho != '') {
                                  $('#Datosdespacho').modal('hide');
                                 axios.get(`/addNroPedido?id=${solicitud.id}&dato=${this.datoDespacho}`).then((response) => {
                                     this.datoDespacho = ''
                                     this.load()
                                     this.loadSolicitudData()
                                 })
                             }
                         }
                     } else {
                         if (this.tipoDataDespacho == 8 || this.tipoDataDespacho == 10) {
                             if (this.datoDespacho == '') {
                                 var mensaje = 'Favor rellenar el campo'
                                 this.alert_error(mensaje)
                             } else {
                                  $('#Datosdespacho').modal('hide');
                                 axios.get(`/addIdPedido?id=${solicitud.id}&dato=${this.datoDespacho}`).then((response) => {
                                     this.datoDespacho = ''
                                     this.load()
                                     this.loadSolicitudData()
                                 })
                             }
                         } else {
                             if (this.tipoDataDespacho == 11 || this.tipoDataDespacho == 14) {
                                 if (this.datoDespacho == '') {
                                     var mensaje = 'Favor rellenar el campo'
                                     this.alert_error(mensaje)
                                 }else{
                                     $('#Datosdespacho').modal('hide');
                                     axios.get(`/add_orden_servicio?id=${solicitud.id}&dato=${this.datoDespacho}`).then((response) => {
                                     this.datoDespacho = ''
                                     this.load()
                                     this.loadSolicitudData()
                                     })
                                 }
                             }else{
                                if(this.tipoDataDespacho == 12 ||  this.tipoDataDespacho == 15 ){
                                     if (this.datoDespacho == '') {
                                         var mensaje = 'Favor rellenar el campo'
                                         this.alert_error(mensaje)
                                     }else{
                                        $('#Datosdespacho').modal('hide');
                                        axios.get(`/add_nro_guia_despacho?id=${solicitud.id}&dato=${this.datoDespacho}`).then((response) => {
                                          this.datoDespacho = ''
                                          this.load()
                                          this.loadSolicitudData()
                                       })
                                    }
                                }else{
                                    if(this.tipoDataDespacho == 13 || this.tipoDataDespacho == 16){
                                        if (this.datoDespacho == '') {
                                         var mensaje = 'Favor rellenar el campo'
                                         this.alert_error(mensaje)
                                        }else{
                                          $('#Datosdespacho').modal('hide');
                                           axios.get(`/add_nro_ework?id=${solicitud.id}&dato=${this.datoDespacho}`).then((response) => {
                                           this.datoDespacho = ''
                                           this.loadSolicitudData()
                                           this.load()
                                           })
                                        }
                                    }else{
                                        if(this.tipoDataDespacho == 17 || this.tipoDataDespacho == 18){
                                           if (this.datoDespacho == '') {
                                             var mensaje = 'Favor rellenar el campo'
                                             this.alert_error(mensaje)
                                           }else{
                                             $('#Datosdespacho').modal('hide');
                                              axios.get(`/add-orden-traslado?id=${solicitud.id}&dato=${this.datoDespacho}`).then((response) => {
                                              this.datoDespacho = ''
                                              this.loadSolicitudData()
                                              this.load()
                                              })
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
     loadSolicitudData: function() {
         if (this.idSearch != '') {
             this.getSolicitudSearch()
         } else {
             if (this.idSearch == '') {
                 this.getSolicitud()
             }
         }
     },
    
     
     AddAlmacen: function(solicitud, tipo) {
         axios.get(`/addAlmacen?id=${solicitud.id}&almacen=${this.almacenId}`).then((response) => {
             this.load()
             this.loadSolicitudData();
             if (tipo == 2) {
                 var dato = document.getElementById('datoAlmacen').style.display = 'block';
                 var select = document.getElementById('editDivAlmacen').style.display = 'none';
             }
         })
     },
     ModalDataDespacho: function(tipo) {
         this.tipoDataDespacho = tipo
         if (tipo == 1) {
             this.nombreDatoDespacho = ' Agregar pep origen'
         } else {
             if (tipo == 2) {
                 this.nombreDatoDespacho = ' Agregar pep de destino'
             } else {
                 if (tipo == 3) {
                     this.nombreDatoDespacho = ' Agregar nro lote'
                 } else {
                     if (tipo == 4) {
                         this.nombreDatoDespacho = 'Editar pep origen'
                     } else {
                         if (tipo == 5) {
                             this.nombreDatoDespacho = 'Editar pep de destino'
                         } else {
                             if (tipo == 6) {
                                 this.nombreDatoDespacho = 'Editar nro de lote'
                             } else {
                                 if (tipo == 7) {
                                     this.nombreDatoDespacho = 'Agregar nro de retiro'
                                 } else {
                                     if (tipo == 8) {
                                         this.nombreDatoDespacho = 'Agregar id de pedido'
                                     } else {
                                         if (tipo == 9) {
                                             this.nombreDatoDespacho = 'Editar nro de retiro'
                                         } else {
                                             if (tipo == 10) {
                                                 this.nombreDatoDespacho = 'Editar id de pedido'
                                             } else {
                                                 if (tipo == 11) {
                                                     this.nombreDatoDespacho = 'Ingresar orden de servicio'
                                                 } else {
                                                     if (tipo == 12) {
                                                         this.nombreDatoDespacho = 'Ingresar nro° guia de despacho'
                                                     }else{
                                                         if (tipo == 13) {
                                                           this.nombreDatoDespacho = 'Ingresar nro° de ework'
                                                          }else{
                                                            if(tipo==14){
                                                                this.nombreDatoDespacho = 'Editar orden de servicio'
                                                            }else{
                                                                if(tipo==15){
                                                                  this.nombreDatoDespacho = 'Editar nro° guia de despacho'
                                                                }else{
                                                                    if(tipo == 16){
                                                                        this.nombreDatoDespacho = 'Editar nro° de ework'
                                                                    }else{
                                                                        if(tipo == 17){
                                                                            this.nombreDatoDespacho = 'Agregar orden de traslado'

                                                                        }else{
                                                                            if(tipo == 18){
                                                                                   this.nombreDatoDespacho = 'Editar orden de traslado'
 
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
                                 }
                             }
                         }
                     }
                 }
             }
         }
         $('#Datosdespacho').modal('show');
     },
     updateSolcitudStock: function(solicitud) {
         axios.get('/stockAprob/' + solicitud.id).then((response) => {
             this.load()
             if (this.idSearch != '') {
                 this.getSolicitudSearch()
             } else {
                 if (this.idSearch == '') {
                     this.getSolicitud()
                 }
             }
         })
     },
     getSolicitud: function() {
         axios.get('/datosSolicitudPsa/' + this.id).then((response) => {
          
             this.solicitudes = response.data
         })
     },
     getSolicitudSearch: function() {
         axios.get('/datosSolicitudPsa/' + this.idSearch).then((response) => {
             this.load()
             this.GetFiles()
             this.GetRecepcionista()
             this.solicitudes = response.data
             if (this.solicitudes.length == 0) {
                 this.busqueda = 0
             } else {
                 if (this.solicitudes.length != 0) {
                     this.busqueda = 1
                 }
             }
         })
     },
     updateCodSap: function(solicitud) {
         axios.get(`/updateCodSap?id=${solicitud.id}&sapId=${this.idSap}`).then((response) => {
             if (this.idSearch != '') {
                 this.getSolicitudSearch()
             } else {
                 if (this.idSearch == '') {
                     this.getSolicitud()
                 }
             }
         })
     },
     load: function() {
         let loader = this.$loading.show({
             // Optional parameters
             container: this.fullPage ? null : this.$refs.formContainer,
             canCancel: true,
             onCancel: this.onCancel,
         });
         // simulate AJAX
         setTimeout(() => {
             loader.hide()
         }, 300)
     },
    
     getAlmacen: function() {
         axios.get('/GetAlmacenes').then((response) => {
             this.almacenes = response.data;
         })
     },
     GetNegocio: function() {
         axios.get('/GetNegocio').then((response) => {
             this.negocios = response.data;
         })
     },
     alert_error: function(mensaje) {
          Swal.fire({
               type: 'error',
               title: 'Error',
               text: mensaje,
              
          })
     },
     getFileExtension: function(filename) {
          return (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename)[0] : undefined;
     },
     get_marcas:function(){
         axios.get(`/GetMarca?activo=${1}`).then((response) => {
                this.marcas = response.data
         })
     },
     add_marca_request:function(){
        axios.get(`/add_marca_request?marca_id=${this.marca_id}&solicitud_id=${this.id}`).then(response=>{
            this.marca_id = '';
            $("#modal_add_marca").modal('hide');
            this.loadSolicitudData()
            this.load();


        })
     },
     get_capacidades:function(){
         axios.get(`/get_capacidades_request?solicitud_id=${this.id}`).then((response) => {
                this.capacidades = response.data
         })
     },
     show_site_select:function(solicitud){
          document.getElementById("site_search_show_view").style.display='none'; 
          document.getElementById("list_sites_psa").style.display='none'; 
          document.getElementById("site_select_psa_show_view").style.display='block'; 
          document.getElementById("error_select_site_show_view").style.display='none'; 
          this.site_info_select = solicitud.site.nem_site + '-' + solicitud.site.nombre
          this.popId = solicitud.site.id;
          this.sites = [];

     },
     add_capacidad_request:function(){
         axios.get(`/add_capacidad_request?capacidad_id=${this.capacidad_id}&solicitud_id=${this.id}`).then(response=>{
            this.capacidad_id = '';
            $("#modal_add_capacidad").modal('hide');
            this.loadSolicitudData()
            this.load();


        })
     },
     edit_total_batery:function(){
        if(this.total_activo == ''){
             this.$swal({
                type: 'error',
                title: 'Error',
                text: 'Debe ingresar el total de baterías.',
                confirmButtonText: 'Ok'
              });
        }else{
            axios.get(`/edit-total-batery-psa?total=${this.total_activo}&solicitud_id=${this.id}`).then(response=>{
                $("#modal_edit_total_solicitado").modal('hide');
                this.total_activo='';
                this.loadSolicitudData();
                this.load();
            })
        }
     },
     edit_negocio:function(){
          if(this.negocioId == ''){
            this.$swal({
                type: 'error',
                title: 'Error',
                text: 'Debe seleccionar el tipo de negocio.',
                confirmButtonText: 'Ok'
            });

          }else{
            axios.get(`/updateNecogioCodSap?id=${this.id}&negocio=${this.negocioId}`).then((response) => {
              $("#edit_negocio").modal('hide');
              this.loadSolicitudData()
               this.load();
           
            })
          } 
         
     },
     get_cod_sap:function(){
        axios.get('/get-cod-sap-psa-request/'+this.id).then(response=>{
          this.codsaps = response.data;
        }) 
     },
     editar_codigo_sap:function(){
        if(this.idSap == ''){
            this.$swal({
                type: 'error',
                title: 'Error',
                text: 'Debe seleccionar un codigo sap.',
                confirmButtonText: 'Ok'
            });
        }else{
         axios.get(`/updateCodSap?id=${this.id}&sapId=${this.idSap}`).then((response) => {
              $("#edit_cod_sap").modal('hide');
              this.codsaps = [];
              this.loadSolicitudData();
              this.load();
         }) 
        }
         
     },
     anular_solicitud_psa:function(){
        axios.get(`/anular-solicitud?solicitud_id=${this.id}&motivo=${this.motivo_anulacion}`).then(response=>{
            $("#anular_solicitud").modal('hide');
            this.loadSolicitudData();
            this.load();
        })
     }
   }
}
</script>

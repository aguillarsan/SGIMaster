<template>
    <div class="main-content">
        <div class="wrapper wrapper-content">
            <section class="section">
                <div class="section-header shadow-box-ag">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6 col-12 ">
                            <div class="card-stats-title">
                                <h1>
                                    Tickets
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row" v-if="RolId == 16 || RolId == 1">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12" id="SgcTkc">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-body ">
                            <div class="tickets-list">
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                            <div class="form-inline">
                                                <p style="">
                                                    <strong>
                                                        CORE
                                                    </strong>
                                                </p>
                                                <div style="margin-top:-15px; ">
                                                    <input name="core" style="margin-left: 6px;width: 20px;height: 20px;" type="checkbox" v-model="sitiocore" v-on:change="setvalueSearchCore">
                                                    </input>
                                                </div>
                                                <p style="margin-left: 40px;">
                                                    <strong>
                                                        OLT 3PLAY
                                                    </strong>
                                                </p>
                                                <div style="margin-top:-15px; ">
                                                    <input name="olt" style="margin-left: 6px;width: 20px;height: 20px;" type="checkbox" v-model="sitioOlt" v-on:change="setvalueSearcholt">
                                                    </input>
                                                </div>
                                                <p style="margin-left: 40px;">
                                                    <strong>
                                                        BAFI
                                                    </strong>
                                                </p>
                                                <div style="margin-top:-15px; ">
                                                    <input name="bafi" style="margin-left: 6px;width: 20px;height: 20px;" type="checkbox" v-model="bafis" v-on:change="setvalueSearchBafi">
                                                    </input>
                                                </div>
                                                <p style="margin-left: 40px;">
                                                    <strong>
                                                        MPLS
                                                    </strong>
                                                </p>
                                                <div style="margin-top:-15px; ">
                                                    <input name="mpls" style="margin-left: 6px;width: 20px;height: 20px;" type="checkbox" v-model="mplscheck" v-on:change="setvalueSearchMpls">
                                                    </input>
                                                </div>
                                                <p style="margin-left: 40px;">
                                                    <strong>
                                                        PE 3G
                                                    </strong>
                                                </p>
                                                <div style="margin-top:-15px; ">
                                                    <input name="peg" style="margin-left: 6px;width: 20px;height: 20px;" type="checkbox" v-model="pe3gchek" v-on:change="setvalueSearchPg3">
                                                    </input>
                                                </div>
                                                <p style="margin-left: 40px;">
                                                    <strong>
                                                        LOCALIDAD OBLIGATORIA
                                                    </strong>
                                                </p>
                                                <div style="margin-top:-15px; ">
                                                    <input name="localidad" style="margin-left: 6px;width: 20px;height: 20px;" type="checkbox" v-model="localidadcheck" v-on:change="setvalueSearchLocalidad">
                                                    </input>
                                                </div>
                                                <p style="margin-left: 40px;">
                                                    <strong>
                                                        VIP
                                                    </strong>
                                                </p>
                                                <div style="margin-top:-15px; ">
                                                    <input name="core" style="margin-left: 6px;width: 20px;height: 20px;" type="checkbox" v-model="coveragecheck" v-on:change="setvaluecoverage">
                                                    </input>
                                                </div>
                                                <p style="margin-left: 40px;">
                                                    <strong>
                                                        COTIZACIONES
                                                    </strong>
                                                </p>
                                                <div style="margin-top:-15px; ">
                                                    <input name="cotizaciones" style="margin-left: 6px;width: 20px;height: 20px;" type="checkbox" v-model="coticheck" v-on:change="CotizacionesSearch">
                                                    </input>
                                                </div>
                                                <p style="margin-left: 40px;">
                                                    <strong>
                                                        INFORME FINAL
                                                    </strong>
                                                </p>
                                                <div style="margin-top:-15px; ">
                                                    <input name="informe" style="margin-left: 6px;width: 20px;height: 20px;" type="checkbox" v-model="informecheck" v-on:change="informeFinalSearch">
                                                    </input>
                                                </div>
                                                <p style="margin-left: 40px;">
                                                    <strong>
                                                        PXQ
                                                    </strong>
                                                </p>
                                                <div style="margin-top:-15px; ">
                                                    <input name="pxq" style="margin-left: 6px;width: 20px;height: 20px;" type="checkbox" v-model="pxqCheck" v-on:change="pqxSearch">
                                                    </input>
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
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card shadow-box-ag">
                    <div class="card-header">
                        <h4 style="color: #666">
                            Listado de tickets
                        </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive project-list project-table">
                            <table class="table table-hover table-striped ">
                                <thead>
                                    <tr>
                                        <th class="">
                                            #
                                        </th>
                                        <th class="">
                                            Área
                                        </th>
                                        <th class="">
                                            Sitio
                                        </th>
                                        <th>
                                            Crm
                                        </th>
                                        <th class="">
                                            Categoría
                                        </th>
                                        <th class="">
                                            Motivo
                                        </th>
                                        <th class="">
                                            Fecha Inicio
                                        </th>
                                        <th class="">
                                            Fecha Termino
                                        </th>
                                        <th class="">
                                            Descripción
                                        </th>
                                        <th class="centrado">
                                            Estado
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <th style="width: 50px;">
                                        <input class="form-control" name="codigo" placeholder="" style="width:80px; " type="" v-model="codigo" v-on:keyup="BuscarTicket">
                                        </input>
                                    </th>
                                    <th>
                                        <div id="divSelecArea">
                                            <select class="form-control " name="area" style="width:80px;" v-model="area" v-on:change="BuscarTicket">
                                                <option v-bind:value="1">
                                                    Energia
                                                </option>
                                                <option v-bind:value="2">
                                                    Clima
                                                </option>
                                                <option v-bind:value="3">
                                                    Obras Civiles
                                                </option>
                                                <option v-bind:value="4">
                                                    Medio Ambiente
                                                </option>
                                            </select>
                                        </div>
                                        <div id="selectedAreaDivInfo" style="display:none">
                                            <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                                {{SelectAreaName}}
                                                <a @click.prevent="clearArea" href="" style="color:white ">
                                                    <i class="fas fa-times-circle">
                                                    </i>
                                                </a>
                                            </span>
                                        </div>
                                    </th>
                                    <th>
                                        <input class="form-control" name="sitio" placeholder="" style="width:80px; " type="" v-model="sitio" v-on:keyup="BuscarTicket">
                                        </input>
                                    </th>
                                    <th>
                                        <div id="crmSelect">
                                            <select class="form-control" style="width:80px;" v-model="crmId" v-on:change="BuscarTicket">
                                                <option v-bind:value="1">
                                                    Norte
                                                </option>
                                                <option v-bind:value="2">
                                                    Centro Norte
                                                </option>
                                                <option v-bind:value="3">
                                                    Metropolitano
                                                </option>
                                                <option v-bind:value="4">
                                                    Centro Sur
                                                </option>
                                                <option v-bind:value="5">
                                                    Sur
                                                </option>
                                                <option v-bind:value="6">
                                                    Austral
                                                </option>
                                            </select>
                                        </div>
                                        <div id="selectedCrm" style="display:none">
                                            <span class="badge " style="background-color:#015dff;color:white; font-size:10px;margin-left:-25px;border-radius:3px;">
                                                {{crmName}}
                                                <a @click.prevent="clearCrm" href="" style="color:white ">
                                                    <i class="fas fa-times-circle">
                                                    </i>
                                                </a>
                                            </span>
                                        </div>
                                    </th>
                                    <th>
                                        <div id="selectCategoria">
                                            <select class="form-control " name="categoria" style="width:50px;" v-model="categoria" v-on:change="BuscarTicket">
                                                <option v-bind:value="1">
                                                    A
                                                </option>
                                                <option v-bind:value="2">
                                                    B
                                                </option>
                                                <option v-bind:value="3">
                                                    C
                                                </option>
                                                <option v-bind:value="4">
                                                    D
                                                </option>
                                                <option v-bind:value="5">
                                                    E
                                                </option>
                                            </select>
                                        </div>
                                        <div id="selectedCateInfo" style="display:none">
                                            <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                                {{SelectCategoryLeter}}
                                                <a @click.prevent="ClearCate" href="" style="color:white ">
                                                    <i class="fas fa-times-circle">
                                                    </i>
                                                </a>
                                            </span>
                                        </div>
                                    </th>
                                    <th>
                                        <div id="selectMotivo">
                                            <select class="form-control " name="motivo" style="width:60px;" v-model="motivo" v-on:change="BuscarTicket">
                                                <option v-bind:value="1">
                                                    Vandalismo menor
                                                </option>
                                                <option v-bind:value="7">
                                                    Vandalismo mayor
                                                </option>
                                                <option v-bind:value="2">
                                                    Falla Mayor
                                                </option>
                                                <option v-bind:value="6">
                                                    Falla menor
                                                </option>
                                                <option v-bind:value="3">
                                                    Mantenimiento
                                                </option>
                                                <option v-bind:value="4">
                                                    Solicitud Stock
                                                </option>
                                                <option v-bind:value="5">
                                                    Solicitud de mejora
                                                </option>
                                            </select>
                                        </div>
                                        <div id="selectedMotivoInfo" style="display:none">
                                            <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                                {{SelectMotivo}}
                                                <a @click.prevent="ClearMotivo" href="" style="color:white ">
                                                    <i class="fas fa-times-circle">
                                                    </i>
                                                </a>
                                            </span>
                                        </div>
                                    </th>
                                    <th>
                                        <div id="InputFecha1">
                                            <input class="form-control" name="fecha1" style="width:80px" type="date" v-model="fecha1" v-on:change="BuscarTicket">
                                            </input>
                                        </div>
                                        <div id="selectedFecha1" style="display:none">
                                            <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                                {{formato(fecha1)}}
                                                <a @click.prevent="ClearFecha1" href="" style="color:white ">
                                                    <i class="fas fa-times-circle">
                                                    </i>
                                                </a>
                                            </span>
                                        </div>
                                    </th>
                                    <th>
                                        <div id="InputFecha2">
                                            <input class="form-control" name="fecha2" style="width:80px" type="date" v-model="fecha2" v-on:change="BuscarTicket">
                                            </input>
                                        </div>
                                        <div id="selectedFecha2" style="display:none">
                                            <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                                {{formato(fecha2)}}
                                                <a @click.prevent="ClearFecha2" href="" style="color:white ">
                                                    <i class="fas fa-times-circle">
                                                    </i>
                                                </a>
                                            </span>
                                        </div>
                                    </th>
                                    <th>
                                        <input class="form-control" name="descripcion" style="width:150px;" type="text" v-model="searchDescripcion" v-on:keyup="BuscarTicket">
                                        </input>
                                    </th>
                                    <th>
                                        <div id="selectEstado">
                                            <select class="form-control " name="estado" style="width:100%;" v-model="estado" v-on:change="BuscarTicket">
                                                <option v-bind:value="1">
                                                    En espera
                                                </option>
                                                <option v-bind:value="2">
                                                    En curso
                                                </option>
                                                <option v-bind:value="3">
                                                    Validación
                                                </option>
                                                <option v-bind:value="4">
                                                    Finalizadas
                                                </option>
                                            </select>
                                        </div>
                                        <div id="selectedEstadoInfo" style="display:none">
                                            <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                                {{SelectEstado}}
                                                <a @click.prevent="ClearEestado" href="" style="color:white ">
                                                    <i class="fas fa-times-circle">
                                                    </i>
                                                </a>
                                            </span>
                                        </div>
                                    </th>
                                    <tr style="height: 150px;" v-for="ticket in tickets.data">
                                        <td class="">
                                            <a :href="'/showTicket/'+ticket.id" target="blank__">
                                                <span class="badge badge-info boxBounce" style="">
                                                    {{ticket.id}}
                                                </span>
                                            </a>
                                        </td>
                                        <td class="">
                                            <div v-if="ticket.area_id != null">
                                                <span class="badge" style="background-color: #005cff;color: white;" v-if="ticket.area_id == 1">
                                                    {{ticket.area.descripcion}}
                                                </span>
                                                <span class="badge badge-info" v-if="ticket.area_id == 2">
                                                    {{ticket.area.descripcion}}
                                                </span>
                                                <span class="badge badge-warning" v-if="ticket.area_id == 3">
                                                    {{ticket.area.descripcion}}
                                                </span>
                                                <span class="badge badge-success" v-if="ticket.area_id == 4">
                                                    {{ticket.area.descripcion}}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="" style="font-size: 12px;">
                                            <div v-if="ticket.site_id != null">
                                                <div>
                                                    {{ticket.site.nem_site}}
                                                </div>
                                                <div>
                                                    {{ticket.site.nombre}}
                                                </div>
                                                <div v-if="ticket.site.site_type_id==1">
                                                    <span class="badge" style="background-color: #42e8b4;color: white">
                                                        FIJO
                                                    </span>
                                                </div>
                                                <div v-if="ticket.site.site_type_id==2">
                                                    <span class="badge" style="background-color: #005cff;color: white; font-size: ">
                                                        MOVIL
                                                    </span>
                                                </div>
                                                <div v-if="ticket.site.site_type_id==3">
                                                    <span class="badge" style="background-color: #005cff;color: white; font-size: ">
                                                        SWITCH
                                                    </span>
                                                </div>
                                                <div v-if="ticket.site.site_type_id==4">
                                                    <span class="badge" style="background-color: #005cff;color: white; font-size: ">
                                                        PHONE
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div v-if="ticket.crm_id == 1">
                                                <p style="font-size:10px;">
                                                    NORTE
                                                </p>
                                            </div>
                                            <div v-if="ticket.crm_id == 2">
                                                <p style="font-size:10px;">
                                                    CENTRO NORTE
                                                </p>
                                            </div>
                                            <div v-if="ticket.crm_id == 3">
                                                <p style="font-size:10px;">
                                                    METROPOLITANO
                                                </p>
                                            </div>
                                            <div v-if="ticket.crm_id == 4">
                                                <p style="font-size:10px;">
                                                    CENTRO SUR
                                                </p>
                                            </div>
                                            <div v-if="ticket.crm_id == 5">
                                                <p style="font-size:10px;">
                                                    SUR
                                                </p>
                                            </div>
                                            <div v-if="ticket.crm_id == 6">
                                                <p style="font-size:10px;">
                                                    AUSTRAL
                                                </p>
                                            </div>
                                        </td>
                                        <td class="centrado">
                                            <div v-if="ticket.site_id != null">
                                                <div v-if="ticket.site.classification_type_id != null">
                                                    <span class="badge " style="background-color:#42e8b4;color: white " v-if="ticket.site.classification_type_id == 1 ">
                                                        A
                                                    </span>
                                                    <span class="badge " style="background-color:#005cff;color: white " v-if="ticket.site.classification_type_id == 2 ">
                                                        B
                                                    </span>
                                                    <span class="badge badge-warning" v-if="ticket.site.classification_type_id == 3 ">
                                                        C
                                                    </span>
                                                    <span class="badge " style="background-color:#6c757d;color: white " v-if="ticket.site.classification_type_id == 4 ">
                                                        D
                                                    </span>
                                                    <span class="badge " style="background-color:#6c757d;color: white " v-if="ticket.site.classification_type_id == 5 ">
                                                        E
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="centrado">
                                            <div v-if="ticket.tipo_motivo_id != null">
                                                <div v-if="ticket.tipo_mantencion_id== 1">
                                                    {{ticket.tipo_motivo.descripcion}}  red core
                                                </div>
                                                <div v-if="ticket.tipo_motivo_id != 3">
                                                    {{ticket.tipo_motivo.descripcion}}
                                                </div>
                                            </div>
                                            <div v-if="ticket.trimestre == 1">
                                                <span class="badge badge-success">
                                                    Primera mantención
                                                </span>
                                            </div>
                                            <div v-if="ticket.trimestre == 2">
                                                <span class="badge badge-info">
                                                    Segunda mantención
                                                </span>
                                            </div>
                                        </td>
                                        <td class="centrado">
                                            <div v-if="ticket.created_at != null">
                                                {{formato(ticket.created_at)}}
                                            </div>
                                        </td>
                                        <td class="centrado">
                                            <div v-if="ticket.fecha_compromiso != null">
                                                {{formato(ticket.fecha_compromiso)}}
                                            </div>
                                        </td>
                                        <td class="">
                                            <div style="width:200px;">
                                                {{ticket.descripcion}}
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge" style="color:white; background-color:#2fcbf1;font-size:12px;" v-if="ticket.estado_id==1">
                                                {{ticket.estado.descripcion}}
                                            </span>
                                            <span class="badge" style="color:white; background-color:#42e8b4;font-size:12px;" v-if="ticket.estado_id==2">
                                                {{ticket.estado.descripcion}}
                                            </span>
                                            <span class="badge" style="color:white; background-color:#005cff;font-size:12px;" v-if="ticket.estado_id==3">
                                                {{ticket.estado.descripcion}}
                                            </span>
                                            <span class="badge" style="color:white; background-color:#fd6c98;font-size:12px;" v-if="ticket.estado_id==4">
                                                {{ticket.estado.descripcion}}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <nav aria-label="pagination" class="pagination" role="navigation">
                                    <vue-pagination :offset="4" :pagination="tickets" @paginate="BuscarTicket">
                                    </vue-pagination>
                                </nav>
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
import EventBus from "./event-bus"
import VuePagination from './VuePagination.vue';

export default {
    components: {
        'vue-pagination': VuePagination,


    },
    data() {
        return {
            tickets: {
                'total': 0,
                'current_page': 1,
                'per_page': 10,

                'from': 2,
                'to': 0

            },
            codigo: '',
            area: '',
            SelectAreaName: '',
            sitio: '',
            crmId: '',
            crmName: '',
            categoria: '',
            SelectCategoryLeter: '',
            motivo: '',
            SelectMotivo: '',
            fecha1: '',
            fecha2: '',
            searchDescripcion: '',
            estado: '',
            SelectEstado: '',
            sitiocore: '',
            corevalue: '',
            sitioOlt: '',
            oltValue: '',
            bafis: '',
            bafivalue: '',
            mplscheck: '',
            mplsvalue: '',
            pe3gchek: '',
            pe3gvalue: '',
            localidadcheck: '',
            localidadvalue: '',
            coveragecheck: '',
            coveragevalue: '',
            RolId: '',
            coticheck: '',
            cotivalue: '',
            informecheck: '',
            informevalue: '',
            pxqCheck: '',
            pxqvalue: ''



        }
    },

    created: function() {

        this.BuscarTicket();
        this.GetRol();


    },
    mounted: function() {
        /* Agrega mounted y con el siguiente contenido */

    },
    methods: {
        formato: function(d) {
            return moment(d).format("DD/MM/YY");
        },
        GetRol: function() {
            axios.get('/GetRolUser').then((response) => {
                this.RolId = response.data;

            })
        },
        CotizacionesSearch: function() {
            if (this.coticheck == true) {

                this.cotivalue = 1;
                this.BuscarTicket();
            } else {
                this.cotivalue = '';
                this.BuscarTicket();


            }



        },

        informeFinalSearch: function() {
            if (this.informecheck == true) {

                this.informevalue = 1;
                this.BuscarTicket();
            } else {
                this.informevalue = '';
                this.BuscarTicket();


            }
        },
        setvalueSearchCore: function() {
            if (this.sitiocore == true) {

                this.corevalue = 1;
                this.BuscarTicket();
            } else {

                this.corevalue = '';
                this.BuscarTicket();
            }
        },
        pqxSearch: function() {
            if (this.pxqCheck == true) {

                this.pxqvalue = 1;
                this.BuscarTicket();
            } else {

                this.pxqvalue = '';
                this.BuscarTicket();
            }
        },
        setvalueSearcholt: function() {
            if (this.sitioOlt == true) {

                this.oltValue = 1;
                this.BuscarTicket();
            } else {

                this.oltValue = '';
                this.BuscarTicket();
            }
        },
        setvalueSearchBafi: function() {
            if (this.bafis == true) {

                this.bafivalue = 1;
                this.BuscarTicket();
            } else {

                this.bafivalue = '';
                this.BuscarTicket();
            }
        },
        setvalueSearchMpls: function() {
            if (this.mplscheck == true) {

                this.mplsvalue = 1;
                this.BuscarTicket();
            } else {

                this.mplsvalue = '';
                this.BuscarTicket();
            }
        },
        setvalueSearchPg3: function() {
            if (this.pe3gchek == true) {

                this.pe3gvalue = 1;
                this.BuscarTicket();
            } else {

                this.pe3gvalue = '';
                this.BuscarTicket();
            }
        },
        setvalueSearchLocalidad: function() {
            if (this.localidadcheck == true) {

                this.localidadvalue = 1;
                this.BuscarTicket();
            } else {

                this.localidadvalue = '';
                this.BuscarTicket();
            }
        },
        setvaluecoverage: function() {
            if (this.coveragecheck == true) {

                this.coveragevalue = 10;
                this.BuscarTicket();
            } else {

                this.coveragevalue = '';
                this.BuscarTicket();
            }


        },
        setNameArea: function() {
            if (this.area == 1) {
                this.SelectAreaName = 'Energía';
            }
            if (this.area == 2) {
                this.SelectAreaName = 'Clima';
            }
            if (this.area == 3) {
                this.SelectAreaName = 'Obras civiles';
            }
            if (this.area == 4) {
                this.SelectAreaName = 'Medio ambiente';
            }
        },
        clearArea: function() {
            this.area = '';
            var selectArea = document.getElementById('divSelecArea');
            selectArea.style.display = '';
            var selectedArea = document.getElementById('selectedAreaDivInfo');
            selectedArea.style.display = 'none';
            this.BuscarTicket();

        },
        selectedCrmSet: function() {
            if (this.crmId == 1) {
                this.crmName = 'NORTE'
            }
            if (this.crmId == 2) {
                this.crmName = 'CENTRO NORTE'
            }
            if (this.crmId == 3) {
                this.crmName = 'METROPOLITANO'
            }
            if (this.crmId == 4) {
                this.crmName = 'CENTRO SUR'
            }
            if (this.crmId == 5) {
                this.crmName = 'SUR'
            }
            if (this.crmId == 6) {
                this.crmName = 'AUSTRAL'
            }

        },

        setLeterCategory: function() {
            if (this.categoria == 1) {
                this.SelectCategoryLeter = 'A';
            }
            if (this.categoria == 2) {
                this.SelectCategoryLeter = 'B';
            }
            if (this.categoria == 3) {
                this.SelectCategoryLeter = 'C';
            }
            if (this.categoria == 4) {
                this.SelectCategoryLeter = 'D';
            }
            if (this.categoria == 5) {
                this.SelectCategoryLeter = 'E';
            }
        },
        selectedMotivoInfoSet: function() {
            if (this.motivo == 1) {
                this.SelectMotivo = 'SINIESTRO';
            }
            if (this.motivo == 2) {
                this.SelectMotivo = 'FALLA';
            }
            if (this.motivo == 3) {
                this.SelectMotivo = 'MANTENCIÓN';
            }
            if (this.motivo == 4) {
                this.SelectMotivo = 'SOLICITUD STOCK';
            }
            if (this.motivo == 6) {
                this.SelectMotivo = 'FALLA MOVIL';
            }
        },

        ClearMotivo: function() {
            this.motivo = '';
            var selectMotivo = document.getElementById('selectMotivo');
            selectMotivo.style.display = '';

            var selectedMotivoInfo = document.getElementById('selectedMotivoInfo');
            selectedMotivoInfo.style.display = 'none';
            this.BuscarTicket();
        },
        ClearCate: function() {
            this.categoria = '';
            var selectCategoria = document.getElementById('selectCategoria');
            selectCategoria.style.display = '';

            var selectCategoriaInfo = document.getElementById('selectedCateInfo');
            selectCategoriaInfo.style.display = 'none';
            this.BuscarTicket();

        },
        clearCrm: function() {
            if (this.crmId != '') {
                this.crmId = '';
                var crmSelect = document.getElementById('crmSelect');
                crmSelect.style.display = '';
            }

            var selectedCrm = document.getElementById('selectedCrm');
            selectedCrm.style.display = 'none';
            this.BuscarTicket();
        },
        ClearFecha1: function() {
            this.fecha1 = '';
            var selectfecha1 = document.getElementById('InputFecha1');
            selectfecha1.style.display = '';

            var selectedFecha1 = document.getElementById('selectedFecha1');
            selectedFecha1.style.display = 'none';
            this.BuscarTicket();
        },
        ClearFecha2: function() {
            this.fecha2 = '';
            var selectfecha2 = document.getElementById('InputFecha2');
            selectfecha2.style.display = '';

            var selectedFecha2 = document.getElementById('selectedFecha2');
            selectedFecha2.style.display = 'none';
            this.BuscarTicket();
        },
        setEestado: function() {
            if (this.estado == 1) {
                this.SelectEstado = 'En espera';
            }
            if (this.estado == 2) {
                this.SelectEstado = 'En curso';
            }
            if (this.estado == 3) {
                this.SelectEstado = 'Validación';
            }
            if (this.estado == 4) {
                this.SelectEstado = 'Finalizadas';
            }

        },
        ClearEestado: function() {
            this.estado = '';

            var selectEstado = document.getElementById('selectEstado');
            selectEstado.style.display = '';

            var selectedEstadoInfo = document.getElementById('selectedEstadoInfo');
            selectedEstadoInfo.style.display = 'none';
            this.BuscarTicket();
        },

        BuscarTicket: function() {



            if (this.area != '') {
                var selectArea = document.getElementById('divSelecArea');
                selectArea.style.display = 'none';
                var selectedArea = document.getElementById('selectedAreaDivInfo');
                selectedArea.style.display = '';

                this.setNameArea();
            }

            if (this.categoria != '') {
                var selectCategoria = document.getElementById('selectCategoria');
                selectCategoria.style.display = 'none';

                var selectCategoriaInfo = document.getElementById('selectedCateInfo');
                selectCategoriaInfo.style.display = '';
                this.setLeterCategory();
            }
            if (this.estado != '') {
                var selectEstado = document.getElementById('selectEstado');
                selectEstado.style.display = 'none';

                var selectedEstadoInfo = document.getElementById('selectedEstadoInfo');
                selectedEstadoInfo.style.display = '';
                this.setEestado();
            }

            if (this.motivo != '') {
                var selectMotivo = document.getElementById('selectMotivo');
                selectMotivo.style.display = 'none';

                var selectedMotivoInfo = document.getElementById('selectedMotivoInfo');
                selectedMotivoInfo.style.display = '';
                this.selectedMotivoInfoSet();
            }
            if (this.fecha1 != '') {
                var selectfecha1 = document.getElementById('InputFecha1');
                selectfecha1.style.display = 'none';

                var selectedFecha1 = document.getElementById('selectedFecha1');
                selectedFecha1.style.display = '';

            }

            if (this.fecha2 != '') {
                var selectfecha2 = document.getElementById('InputFecha2');
                selectfecha2.style.display = 'none';

                var selectedFecha2 = document.getElementById('selectedFecha2');
                selectedFecha2.style.display = '';

            }
            if (this.crmId != '') {
                var crmSelect = document.getElementById('crmSelect');
                crmSelect.style.display = 'none';

                var selectedCrm = document.getElementById('selectedCrm');
                selectedCrm.style.display = '';
                this.selectedCrmSet();
            }

            var state = 0;

            axios.get(`/ControlTicketGet?page=${this.tickets.current_page}&estado=${this.estado}&codigo=${this.codigo}&area=${this.area}&sitio=${this.sitio}&categoria=${this.categoria}&motivo=${this.motivo}&fecha1=${this.fecha1}&fecha2=${this.fecha2}&descripcion=${this.searchDescripcion}&crm=${this.crmId}&user=${this.user}&crmSelect=${this.crm}&zona=${this.zona}&core=${this.corevalue}&olt=${this.oltValue}&bafi=${this.bafivalue}&mpls=${this.mplsvalue}&pe_3g=${this.pe3gvalue}&localidad=${this.localidadvalue}&coverage=${this.coveragevalue}&cotizacion=${this.cotivalue}&informeFinal=${this.informevalue}&pxq=${this.pxqvalue}`)
                .then((response) => {

                    this.tickets = response.data;

                })


        },


    }
}
</script>
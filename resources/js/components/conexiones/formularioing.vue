<template>
    <div>
        <form enctype="multipart/form-data" method="POST" v-on:submit.prevent="CreateSolicitud">
            <div aria-hidden="true" class="modal inmodal" id="formularioIng" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg " style="max-width: 1000px !important;">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(#02CBA9 , #34EBCC); height: 70px;">
                            <h5 class="modal-title" style="color:white">
                                Formulario
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color:white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-body">
                                        <div class="row mt-4">
                                            <div class="col-12 col-lg-8 offset-lg-2">
                                                <div class="wizard-steps">
                                                    <div class="wizard-step " v-bind:class="step == 1 ?'wizard-step-active-secondary':''">
                                                        <div class="wizard-step-icon">
                                                            <i class="fas fa-ticket-alt">
                                                            </i>
                                                        </div>
                                                        <div class="wizard-step-label barlow bold">
                                                            Datos del ticket
                                                        </div>
                                                    </div>
                                                    <div class="wizard-step " v-bind:class="step == 2 ?'wizard-step-active-secondary':''">
                                                        <div class="wizard-step-icon">
                                                            <i class="fas fa-globe-americas">
                                                            </i>
                                                        </div>
                                                        <div class="wizard-step-label barlow bold">
                                                            Datos del sitio
                                                        </div>
                                                    </div>
                                                    <div class="wizard-step" v-bind:class="step == 3 ?'wizard-step-active-secondary':''">
                                                        <div class="wizard-step-icon">
                                                            <i class="fas fa-car-battery">
                                                            </i>
                                                        </div>
                                                        <div class="wizard-step-label barlow bold">
                                                            Datos del equipo
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step1">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group semi_bold">
                                                        <label>
                                                            Subgerencia*
                                                        </label>
                                                        <select @change="deleteErrorIngForm" class="form-control select" v-model="sub_gerencia_id">
                                                            <option :value="subgerencia.id" v-for="subgerencia in subgerencias">
                                                                {{subgerencia.subgerencia}} /  {{subgerencia.subgerente}}
                                                            </option>
                                                        </select>
                                                        <div id="error_subgerencia" style="display: none">
                                                            <p style="color: red">
                                                                Favor seleccionar subgerencia
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group semi_bold">
                                                        <label>
                                                            Responsable entel*
                                                        </label>
                                                        <input type="text" class="form-control" v-model="responsable_id" name="responsable_entel">
                                                        <div id="error_responsable" style="display: none">
                                                            <p style="color: red">
                                                                {{mensaje_error_responsable}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group semi_bold">
                                                        <label>
                                                            Nombre Proyecto*
                                                        </label>
                                                        <input @keyup.prevent="deleteErrorIngForm()" class="form-control" name="" type="text" v-model="nombre_proyecto"/>
                                                        <div id="error_nombre" style="display: none">
                                                            <p style="color: red">
                                                                {{mensaje_error_nombre_proyecto}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group ">
                                                        <label>
                                                            Fecha de implementación*
                                                        </label>
                                                        <input @change="deleteErrorIngForm" class="form-control" name="" type="date" v-model="fecha_implementacion"/>
                                                        <div id="error_fecha_implementacion" style="display: none">
                                                            <p style="color: red">
                                                                Favor indicar la fecha de implementación
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group ">
                                                        <label>
                                                            Tipo de rack*
                                                        </label>
                                                        <select class="form-control select" v-model="tipo_rack" @change="tipo_rack_input">
                                                            <option :value="1">
                                                                Rack nuevo
                                                            </option>
                                                            <option :value="2">
                                                                Rack existente
                                                            </option>
                                                            <option :value="3">
                                                                Nuevos y Existentes
                                                            </option>
                                                        </select>
                                                         <div id="error_tipo_rack" style="display: none">
                                                            <p style="color: red">
                                                                Favor seleccionar el tipo de rack
                                                            </p>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold" id="cantidad_rack_div" style="display: none">
                                                    <div class="form-group ">
                                                        <label>
                                                            Cantidad de racks*
                                                        </label>
                                                        <input @change="deleteErrorIngForm" class="form-control" min="1" name="" type="number" v-model="cantidad_rack"/>
                                                        <div id="error_cantidad_rack" style="display: none">
                                                            <p style="color: red">
                                                                Favor indicar la cantidad de racks
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group ">
                                                        <label>
                                                            Cantidad de equipos*
                                                        </label>
                                                        <input @change="deleteErrorIngForm" class="form-control" min="1" name="" type="number" v-model="cantidad_equipo"/>
                                                        <div id="error_cantidad_equipos" style="display: none">
                                                            <p style="color: red">
                                                                Favor indicar la cantidad de equipos
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group ">
                                                        <label>
                                                            Potencia total del proyecto (kiloWatt)*
                                                        </label>
                                                        <input @change="deleteErrorIngForm" class="form-control" min="1" name="" type="number" v-model="potencia_total_proyecto"/>
                                                        <div id="error_potencia" style="display: none">
                                                            <p style="color: red">
                                                                Favor indicar la potencia del equipo
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step2" style="display: none">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group ">
                                                        <label>
                                                            Sitio*
                                                        </label>
                                                        <div id="pop_selected" style="display: none">
                                                            <div class="input-group">
                                                                <input class="form-control" disabled="true" name="" style="background-color:#42E8B4;color:white;" type="" v-bind:value="site_info_select"/>
                                                                <div class="input-group-append">
                                                                    <div @click.prevent="change_site()" class="input-group-text " style="cursor: pointer  ">
                                                                        <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                                                        </i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="search_pop">
                                                            <div class="input-group">
                                                                <input class="form-control" id="intp_site" name="datositio" placeholder="Buscar Sitio" style="position: relative;" type="text" v-model="datositio" v-on:keyup="search_site()" value=""/>
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-search">
                                                                        </i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="listado_sites" style="display: none">
                                                            <div :style="'width:'+input_width_form+'px'+';'" class="s_l">
                                                                <div class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                                                    <div v-for="site in sites">
                                                                        <a @click.prevent="select_site(site)" href="" id="selectpopvalue" style="color:black">
                                                                            {{site.nem_site}} {{site.nombre}}
                                                                            <hr style="margin-top: -1px;"/>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="error_site" style="display: none">
                                                            <p style="color: red">
                                                                Favor seleccionar el sitio
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group">
                                                        <label>
                                                            Sala*
                                                        </label>
                                                        <select @change.prevent="deleteErrorIngForm()" class="form-control select barlow semi_bold" v-model="salaId">
                                                            <option disabled="true" selected="true">
                                                                Seleccione
                                                            </option>
                                                            <option v-bind:value="sala.id" v-for="sala in  salas">
                                                                {{sala.name}}__{{sala.old_name}}
                                                            </option>
                                                        </select>
                                                        <div id="errorSala" style="display: none">
                                                            <p style="color: red">
                                                                Favor Seleccionar la sala
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group ">
                                                        <label>
                                                            Coordenada de la sala (opcional)
                                                        </label>
                                                        <input class="form-control" name="" type="text" v-model="coordenada_sala"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group ">
                                                        <label>
                                                            Comentario (opcional)
                                                        </label>
                                                        <textarea class="form-control" style="height: 120px;" v-model="comentario_coordenada_sala">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step3" style="display: none">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group ">
                                                        <label>
                                                            Equipo*
                                                        </label>
                                                        <input @keyup.prevent="deleteErrorIngForm()" class="form-control" type="text" v-model="equipo"/>
                                                        <div id="errorEquipo" style="display: none">
                                                            <p style="color: red">
                                                                Favor indicar el equipo
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group">
                                                        <label>
                                                            Item
                                                        </label>
                                                        <input @keyup.prevent="deleteErrorIngForm()" class="form-control" type="text" v-model="item"/>
                                                        <div id="errorItem" style="display: none">
                                                            <p style="color: red">
                                                                Favor indicar el item
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group">
                                                        <label>
                                                            Voltaje*
                                                        </label>
                                                        <select @change.prevent="deleteErrorIngForm()" class="form-control select" v-model="voltajeId">
                                                            <option value="1">
                                                                AC
                                                            </option>
                                                            <option value="2">
                                                                DC
                                                            </option>
                                                        </select>
                                                        <div id="errorVoltaje" style="display: none">
                                                            <p style="color: red">
                                                                Favor seleccionar el tipo de voltaje
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group">
                                                        <label>
                                                            Potencia real(kiloWatt)*
                                                        </label>
                                                        <input @keyup.prevent="deleteErrorIngForm()" class="form-control" name="" style="width:100%;" type="number" v-model="potencia_real"/>
                                                        <div id="errorPotenciaReal" style="display: none">
                                                            <p style="color: red">
                                                                Favor Indicar la potencia.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group">
                                                        <label>
                                                            Configuración de fuente*
                                                        </label>
                                                        <select @change.prevent="deleteErrorIngForm()" class="form-control select" v-model="tip_fuente">
                                                            <option v-bind:value="1">
                                                                Simple
                                                            </option>
                                                            <option v-bind:value="2">
                                                                Doble
                                                            </option>
                                                        </select>
                                                        <div id="errorFuente" style="display: none">
                                                            <p style="color: red">
                                                                Favor Seleccionar el tipo de fuente
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group" id="cantFuente">
                                                        <label id="Fsimple" v-text="tip_fuente == 1 ? ' Cantidad de fuente*':(tip_fuente==2?' Cantidad de de fuentes totales A & B*':'Cantidad fuente*')">
                                                            Cantidad de fuente*
                                                        </label>
                                                        <input @keyup.prevent="deleteErrorIngForm()" class="form-control" name="" style="width: 100%" type="number" v-model="cantidadFuente"/>
                                                        <div id="errorCantFuente" style="display: none">
                                                            <p style="color: red">
                                                                Favor indicar la cantidad
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group">
                                                        <label>
                                                            Capacidad disyuntor*
                                                        </label>
                                                        <input @keyup.prevent="deleteErrorIngForm()" class="form-control" name="" style="width:100%;" type="number" v-model="cap_disyuntor"/>
                                                        <div id="errorDisyuntor" style="display: none">
                                                            <p style="color: red">
                                                                Favor indicar la cap. disyuntor
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group">
                                                        <label>
                                                            Nro Cable interno
                                                        </label>
                                                        <input @keyup.prevent="deleteErrorIngForm()" class="form-control" name="" style="width:100%;" type="number" v-model="cab_interno"/>
                                                        <div id="errorCabInterno" style="display: none">
                                                            <p style="color: red">
                                                                Favor indicar la cant. de cable
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group">
                                                        <label>
                                                            Características del dispositivo
                                                        </label>
                                                        <textarea @keyup.prevent="deleteErrorIngForm()" class="form-control" style="width:100%;height:200px;" v-model="caracteristica">
                                                        </textarea>
                                                        <div id="errorCaracteristicas" style="display: none">
                                                            <p style="color: red">
                                                                Favor indicar las caracteristicas del dispositivo
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-6 col-sm-6 col-12 barlow semi_bold">
                                                    <div class="form-group">
                                                        <button @click.prevent="AddEquipement()" class="btn btn-success">
                                                            <i class="fas fa-plus">
                                                            </i>
                                                            Añadir
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-6 col-sm-6 col-12" id="step2Tab" style="display: none">
                                                    <div class="card">
                                                        <div>
                                                            <h3 class="barlow bold" style="font-size: 15px;">
                                                                Total equipo(s): {{Equipos.length}}
                                                            </h3>
                                                        </div>
                                                        <div class="card-body p-0" style="max-height:300px;overflow-y:auto">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-md">
                                                                    <thead>
                                                                        <tr class="barlow semi_bold">
                                                                            <th>
                                                                                Equipo
                                                                            </th>
                                                                            <th>
                                                                                Item
                                                                            </th>
                                                                            <th>
                                                                                Caracteristicas
                                                                            </th>
                                                                            <th>
                                                                                Voltaje
                                                                            </th>
                                                                            <th>
                                                                                P.real (W)
                                                                            </th>
                                                                            <th>
                                                                                fuente
                                                                            </th>
                                                                            <th>
                                                                                Cantidad
                                                                            </th>
                                                                            <th>
                                                                                C.disyuntor
                                                                            </th>
                                                                            <th>
                                                                                N.cable interno
                                                                            </th>
                                                                            <th>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr v-for="(equipo, key) in Equipos">
                                                                            <td>
                                                                                {{equipo.equipo}}
                                                                            </td>
                                                                            <td>
                                                                                {{equipo.item}}
                                                                            </td>
                                                                            <td>
                                                                                {{equipo.caracteristica}}
                                                                            </td>
                                                                            <td>
                                                                                <div v-if="equipo.voltaje == 1">
                                                                                    AC
                                                                                </div>
                                                                                <div v-if="equipo.voltaje == 2">
                                                                                    DC
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                {{equipo.potencia}}
                                                                            </td>
                                                                            <td>
                                                                                <div v-if="equipo.tipoFuente == 1">
                                                                                    Simple
                                                                                </div>
                                                                                <div v-if="equipo.tipoFuente == 2">
                                                                                    Doble
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                {{equipo.cantFuente}}
                                                                            </td>
                                                                            <td>
                                                                                {{equipo.capacidadDisyuntor}}
                                                                            </td>
                                                                            <td>
                                                                                {{equipo.cableInterno}}
                                                                            </td>
                                                                            <td>
                                                                                <a @click.prevent="DeleteEquipo(key)" class="boxBounce" href="#" style="color: #dc3545">
                                                                                    <i class="fas fa-times-circle boxBounce" style="font-size:22px;  ">
                                                                                    </i>
                                                                                </a>
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
                            </div>
                        </div>
                        <div class="modal-footer barlow semi_bold">
                            <button class="btn btn-secondary" data-dismiss="modal" type="button" v-if="step==1">
                                Cerrar
                            </button>
                            <a @click.prevent="BackStepOne()" class="btn btn-icon icon-left" href="#" id="backStep1" style="border-radius:5px;background-color:#42E8B4;color:white" v-if="step == 2 || step == 3">
                                <i class="fas fa-arrow-left">
                                </i>
                                Atrás
                            </a>
                            <a @click.prevent="ValidateFormTicektStepOne()" class="btn btn-icon icon-right " href="#" id="btnNextStepOne" style="border-radius:5px;background-color:#42E8B4;color:white" v-if="step != 3">
                                Siguiente
                                <i class="fas fa-arrow-right">
                                </i>
                            </a>
                            <a @click.prevent="CreateTicket()" class="btn btn-icon icon-right " href="#" id="btnCreateTicket" style="border-radius:5px;background-color:#42E8B4;color:white" v-if="step==3">
                                Finalizar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    import EventBus from "../event-bus"

    export default {
         props:['opcion'],
        data() {
                return {

                    salas: [],
                    pops: [],
                    datoPop: '',
                    popid: '',
                    popNombre: '',
                    popDireccion: '',
                    salaId:'',
                    sistema:'',
                    bastidor:'',
                    equipo:'',
                    cab_interno:'',
                    potencia_real:'',
                    voltajeId:'',
                    cap_disyuntor:'',
                    cant_cable:'',
                    tip_fuente:'',
                    types:[],
                    typeId:'',
                    item:'',
                    caracteristica:'',
                    step:1,
                    Equipos:[],
                    cantidadFuente:'',
                    idSolicitud:'',
                    responsable_entel:'',
                    nombre_proyecto:'',
                    mensaje_error_responsable:'',
                    mensaje_error_nombre_proyecto:'',
                    datositio:'',
                    sites:[],
                    input_width_form:0,
                    site_info_select:'',
                    site_id:'',
                    np:'',
                    r_pass:'',
                    sub_gerencia_id:'',
                    fecha_implementacion:'',
                    cantidad_equipo:'',
                    cantidad_rack:'',
                    potencia_total_proyecto:'',
                    tipo_ticket:'',
                    actual_date:'',
                    coordenada_sala:'',
                    comentario_coordenada_sala:'',
                    subgerencias:[],
                    responsables:[],
                    responsable_id:'',
                    tipo_rack:'',
                    validar_tipo_rack:''


                }
            },

            created: function() {
              this.getsubgerencia();  
             this.getNetTypes();

             this.actual_date = moment();
               

            },

    methods: {
     getNetTypes: function() {
         axios.get('/getTypes').then((response) => {
             this.types = response.data;
         })
     },
     getsubgerencia:function(){
         axios.get('/get-all-subgerencia').then((response) => {
             this.subgerencias = response.data;
         })
     },
   
     AddEquipement: function() {
         this.ValidacionAddEquipo()
         if (this.equipo != ''  && this.voltajeId != '' && this.potencia_real != '' && this.tip_fuente != '' && this.cantidadFuente != '' && this.cap_disyuntor != '' ) {
             this.Equipos.push({
                 equipo: this.equipo,
                 item: this.item,
                 caracteristica: this.caracteristica,
                 voltaje: this.voltajeId,
                 potencia: this.potencia_real,
                 tipoFuente: this.tip_fuente,
                 capacidadDisyuntor: this.cap_disyuntor,
                 cableInterno: this.cab_interno,
                 cantFuente: this.cantidadFuente
             });
             this.ClearFormEquipo()
        }
     },
     ClearFormEquipo: function() {

         this.typeId = '';
         this.equipo = '';
         this.item = '';
         this.caracteristica = '';
         this.voltajeId = '';
         this.potencia_real = '';
         this.tip_fuente = '';
         this.cap_disyuntor = '';
         this.cab_interno = '';
         this.cantidadFuente = '';
       

     },
  
     ValidacionAddEquipo: function() {
         if (this.equipo == '') {
             document.getElementById('errorEquipo').style.display = 'block'
         }
         
         
         if (this.voltajeId == '') {
             document.getElementById('errorVoltaje').style.display = 'block'
         }
         if (this.potencia_real == '') {
             document.getElementById('errorPotenciaReal').style.display = 'block'
         }
         if (this.tip_fuente == '') {
             document.getElementById('errorFuente').style.display = 'block'
         }
         if (this.cantidadFuente == '') {
             document.getElementById('errorCantFuente').style.display = 'block'
         }
         if (this.cap_disyuntor == '') {
             document.getElementById('errorDisyuntor').style.display = 'block'
         }
         
     },
     tipo_rack_input:function(){
         if(this.tipo_rack == 1 || this.tipo_rack == 3){
             document.getElementById('cantidad_rack_div').style.display = 'block';
         }else{
            if(this.tipo_rack == 2){
                document.getElementById('cantidad_rack_div').style.display = 'none';
                this.validar_tipo_rack = 1;
                this.cantidad_rack = '';
            }
         }
        if (this.tipo_rack != '') {

                 document.getElementById("error_tipo_rack").style.display = 'none';
        }
     },
     CreateTicket: function() {
         if (this.Equipos.length == 0) {
             this.$swal({
                 type: 'error',
                 title: 'Error',
                 text: 'Debes agregar un total de'+' '+ this.cantidad_equipo+' '+'equipo(s)',
                 showCloseButton: true,
             });
         } else {
             if(this.Equipos.length != this.cantidad_equipo ){
                 this.$swal({
                 type: 'error',
                 title: 'Error',
                 text: 'Debes agregar un total de'+' '+ this.cantidad_equipo + ' '+'equipo(s), llevas un total de'+' '+this.Equipos.length+' '+'equipo(s) agregado',
                 showCloseButton: true,
                 });
 
             }else{
             let formData = new FormData();
             formData.append('site_id', this.site_id);
             formData.append('room', this.salaId);
             formData.append('responsable_id', this.responsable_id);
             formData.append('nombre_proyecto', this.nombre_proyecto);
             formData.append('subgerencia_id', this.sub_gerencia_id);
             formData.append('fecha_implementacion', this.fecha_implementacion);
             formData.append('cantidad_equipo', this.cantidad_equipo);
             formData.append('cantidad_rack', this.cantidad_rack);
             formData.append('potencia_proyecto', this.potencia_total_proyecto);
             formData.append('tipo_ticket_id', this.tipo_ticket);
             formData.append('coordenada_sala', this.coordenada_sala);
             formData.append('comentario_coordenada_sala', this.comentario_coordenada_sala);
             formData.append('tipo_rack', this.tipo_rack);
             
             

            
             axios.post('/CreateSolicitudIng', formData).then((response) => {
                 console.log(response.data);
                 this.idSolicitud = response.data
                 $('#formularioIng').modal('hide');
                 for (var i = 0; i < this.Equipos.length; i++) {
                     let equipo = this.Equipos[i]
                     let NewformData = new FormData()
                     NewformData.append('equipo', equipo.equipo)
                     NewformData.append('item', equipo.item)
                     NewformData.append('caracteristica_equipo', equipo.caracteristica)
                     NewformData.append('voltaje_id', equipo.voltaje)
                     NewformData.append('potencia_real', equipo.potencia)
                     NewformData.append('tipo_fuente_id', equipo.tipoFuente)
                     NewformData.append('capacidad_disyutor', equipo.capacidadDisyuntor)
                     NewformData.append('cable_interno', equipo.cableInterno)
                     NewformData.append('cantidad_fuente', equipo.cantFuente)
                     NewformData.append('solicitud_id', this.idSolicitud)
                     axios.post('/setEquiposIngSolicitud', NewformData).then((response) => {})
                 }
                 this.ClearFormEquipo()
                 this.change_site()
                 // this.loadFunction()
                 this.Equipos = []
                 this.resetForm()
                 EventBus.$emit('ing.getableticket', this.opcion);
                 EventBus.$emit('ing.ticket.getTotal.tipo.ticket');
                 Swal.fire({
                     type: 'success',
                     title: 'Ticket creado',
                     text: 'Ticket nro°' + ' ' + this.idSolicitud + ' ' + 'creado.',
                 })
             })

             }
            
         }
     },
     DeleteEquipo: function(key) {
         this.Equipos.splice(key, 1)
     },
     ValidateFormTicektStepOne: function() {
         if (this.step == 1) {
            let validacion_rack = 0;
            if(this.tipo_rack == 1 || this.tipo_rack == 3){
                 if (this.cantidad_rack == '') {
                 document.getElementById("error_cantidad_rack").style.display = 'block';
                  this.validar_tipo_rack = 0;
                 }else{
                    if(this.cantidad_rack != ''){
                     this.validar_tipo_rack = 1
                   }
                 }
                 
            }else{
                if(this.tipo_rack == 3){
                   this.validar_tipo_rack = 1
                }
            }
             if (this.sub_gerencia_id == '') {
                 document.getElementById("error_subgerencia").style.display = 'block';
             }
             if (this.fecha_implementacion == '') {
                 document.getElementById("error_fecha_implementacion").style.display = 'block';
             }
             if (this.cantidad_equipo == '') {
                 document.getElementById("error_cantidad_equipos").style.display = 'block';
             }
            
             if (this.potencia_total_proyecto == '') {
                 document.getElementById("error_potencia").style.display = 'block';
             }
             if (this.tipo_rack == '') {
                 document.getElementById("error_tipo_rack").style.display = 'block';
             }
             if (this.nombre_proyecto == '') {
                 this.mensaje_error_nombre_proyecto = 'Favor ingresar el nombre del proyecto'
                 document.getElementById('error_nombre').style.display = 'block'
             } else {
             
                if (this.nombre_proyecto != '' ) {
                         this.np = 1;
                }
                 
             }

             if (this.responsable_id == '') {
                 this.mensaje_error_responsable = 'Favor seleccionar un responsable'
                 document.getElementById('error_responsable').style.display = 'block'
             }

             var dateObj = new Date(this.fecha_implementacion);
             var momentDateObj = moment(dateObj);
             var total_days = momentDateObj.diff(this.actual_date,'days');
           
             if(this.potencia_total_proyecto <= 7 && this.cantidad_equipo <= 10 && total_days <=15 ){
                this.tipo_ticket = 1;
             }else{
                if(this.potencia_total_proyecto > 7 || this.cantidad_equipo > 10 || total_days > 15){
                   this.tipo_ticket = 2;
                }
             }

             if (this.np == 1 && this.sub_gerencia_id != '' && this.fecha_implementacion != '' && this.cantidad_equipo != ''  && this.potencia_total_proyecto != '' && this.responsable_id != '' &&  this.validar_tipo_rack == 1 ) {
                 document.getElementById('step1').style.display = 'none'
                 document.getElementById('step2').style.display = 'block'
                 this.step = 2
             }
         } else {
             if (this.site_id == '') {
                 document.getElementById('error_site').style.display = 'block'
             }
             if (this.salaId == '') {
                 document.getElementById('errorSala').style.display = 'block'
             }
           
             if (this.site_id != '' && this.salaId != '') {
                 document.getElementById('step2').style.display = 'none'
                 document.getElementById('step3').style.display = 'block'
                 document.getElementById('step2Tab').style.display = 'block'
                 this.step = 3
             }
         }
     },
     BackStepOne: function() {
         if (this.step == 2) {
             document.getElementById('step1').style.display = 'block'
             document.getElementById('step2').style.display = 'none'
             document.getElementById('step2Tab').style.display = 'none'
             this.step = 1
         } else {
             if (this.step == 3) {
                 document.getElementById('step2').style.display = 'block'
                 document.getElementById('step3').style.display = 'none'
                 document.getElementById('step2Tab').style.display = 'none'
                 this.step = 2
             }
         }
     },
     resetForm:function(){
        document.getElementById('step1').style.display = 'block'
        document.getElementById('step2').style.display = 'none'
        document.getElementById('step3').style.display = 'none'
        document.getElementById('step2Tab').style.display = 'none'
        document.getElementById("error_subgerencia").style.display = 'none';
        document.getElementById("error_fecha_implementacion").style.display = 'none';
        document.getElementById("error_cantidad_equipos").style.display = 'none';
        document.getElementById("error_cantidad_rack").style.display = 'none';
        document.getElementById("error_potencia").style.display = 'none';
        document.getElementById('error_nombre').style.display = 'none';
        document.getElementById('error_site').style.display = 'none';
        document.getElementById('errorSala').style.display = 'none';
        document.getElementById('error_responsable').style.display = 'none';
        this.sub_gerencia_id = '';
        this.fecha_implementacion = '';
        this.cantidad_equipo = '';
        this.cantidad_rack = '';
        this.potencia_total_proyecto = '';
        this.tipo_ticket = '';
        this.step = 1;
        this.responsable_id='';
        this.responsables = [];
     },
     loadFunction: function() {
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
     deleteErrorIngForm: function() {
         if (this.step == 1) {
             if (this.sub_gerencia_id != '') {
                 document.getElementById("error_subgerencia").style.display = 'none';
                 this.getResponsables();
             }
             if (this.fecha_implementacion != '') {

                 document.getElementById("error_fecha_implementacion").style.display = 'none';
             }
             if (this.cantidad_equipo != '') {
                 if(this.cantidad_equipo == 0){
                      this.cantidad_equipo = '';
                      this.error_c_input();
                 }else{
                     document.getElementById("error_cantidad_equipos").style.display = 'none';
                 }
                
             }
             if (this.cantidad_rack != '') {
                if(this.cantidad_rack == 0){
                    this.cantidad_rack = '';
                    this.error_c_input();
                }else{
                    document.getElementById("error_cantidad_rack").style.display = 'none';
                }

               
             }
             
             if (this.potencia_total_proyecto != '') {
                if(this.potencia_total_proyecto == 0){
                    this.potencia_total_proyecto = '';
                    this.error_c_input();
                }else{
                    document.getElementById("error_potencia").style.display = 'none';
                }
               
             }
             if (this.nombre_proyecto != '') {
                 document.getElementById("error_nombre").style.display = 'none';
                 this.np = 1;
             }
             

              if (this.responsable_id != '') {
                    
                             document.getElementById('error_responsable').style.display = 'none'
                      
                 }
         } else {
             if (this.step == 2) {
                 if (this.salaId != '') {
                     document.getElementById('errorSala').style.display = 'none';
                 }
                
             } else {
                 if (this.step == 3) {
                     if (this.equipo != '') {
                         document.getElementById('errorEquipo').style.display = 'none';
                     }
                     if (this.item != '') {
                         document.getElementById('errorItem').style.display = 'none';
                     }
                     if (this.caracteristica != '') {
                         document.getElementById('errorCaracteristicas').style.display = 'none';
                     }
                     if (this.voltajeId != '') {
                         document.getElementById('errorVoltaje').style.display = 'none';
                     }
                     if (this.potencia_real != '') {
                         document.getElementById('errorPotenciaReal').style.display = 'none'
                     }
                     if (this.tip_fuente != '') {
                         document.getElementById('errorFuente').style.display = 'none'
                     }
                     if (this.cantidadFuente != '') {
                         document.getElementById('errorCantFuente').style.display = 'none'
                     }
                     if (this.cap_disyuntor != '') {
                         document.getElementById('errorDisyuntor').style.display = 'none'
                     }
                     if (this.cab_interno != '') {
                         document.getElementById('errorCabInterno').style.display = 'none'
                     }
                     if (this.tip_fuente != '') {
                         document.getElementById('errorFuente').style.display = 'none'
                         
                         
                     }
                 }
             }
         }
     },
     formato: function(d) {
         return moment(d).format("DD/MM/YY");
     },
     getResponsables:function(){
        axios.get(`/getl-all-responsable-subgerencia?subgerencia_id=${this.sub_gerencia_id}`).then((response) => {
            this.responsables = response.data;
        })
     },
     search_site: function() {
         if (this.datositio.length >= 3) {
             this.input_width_form = document.getElementById("intp_site").clientWidth;
             document.getElementById('listado_sites').style.display = 'block';
             axios.get(`/GetPop?datositio=${this.datositio}`).then((response) => {
                 this.sites = response.data
             });
         } else {
             this.sites = '';
             document.getElementById('listado_sites').style.display = 'none';
         }
     },
     select_site: function(site) {
         this.site_id = site.id;
         document.getElementById('listado_sites').style.display = 'none';
         document.getElementById('pop_selected').style.display = 'block';
         document.getElementById('search_pop').style.display = 'none';
         document.getElementById('error_site').style.display = 'none';
         this.sites = '';
         this.site_info_select = site.nem_site + ' ' + site.nombre;
         axios.get('/GetSalas/' + site.pop_id).then(response => {
             this.salas = response.data;
         })
     },
     change_site: function() {
         this.datositio = '';
         this.site_id = '';
         this.salas = [];
         document.getElementById('pop_selected').style.display = 'none';
         document.getElementById('search_pop').style.display = 'block';
         this.sites = '';
         this.site_info_select = '';
     },
     error_c_input:function(){
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El valor debe ser distinto de cero',
       })

     }


    }
}
</script>
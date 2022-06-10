<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="SolicitudControlCambioModal" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg " style="max-width: 1200px;">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header " style="background: -webkit-linear-gradient(#6fc3f7 ,#1813a2); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Formulario solicitud
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
                                Tipo de documento*
                            </label>
                            <select @change.prevent="setform()" class="form-control select" v-model="tipo_documento_id">
                                <option v-bind:value="tipo_documento.id" v-for="tipo_documento in tipo_documentos">
                                    {{tipo_documento.descripcion}}
                                </option>
                            </select>
                        </div>
                        <div id="actaAceptación" style="display: none">
                            <div class="row mt-4">
                                <div class="col-12 col-lg-8 offset-lg-2">
                                    <div class="wizard-steps">
                                        <div class="wizard-step " v-bind:class="step == 1 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-file-prescription">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Descripción
                                            </div>
                                        </div>
                                        <div class="wizard-step" v-bind:class="step == 2 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-pen">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Introducción
                                            </div>
                                        </div>
                                        <div class="wizard-step" v-bind:class="step == 3 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="far fa-file-alt">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Entregables
                                            </div>
                                        </div>
                                        <div class="wizard-step">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-search">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Analisis de la ejecución
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="StepOneActa">
                                <div class="form-group">
                                    <label>
                                        Nombre proyecto
                                    </label>
                                    <input @keyup.prevent="deleteError()" class="form-control" name="" type="text" v-model="nombre_proyecto_acta_aceptación">
                                        <div id="errorNombre" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar nombre del proyecto
                                            </p>
                                        </div>
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Subgerencia
                                    </label>
                                    <input @keyup.prevent="deleteError()" class="form-control" name="" type="text" v-model="subgerencia_acta_aceptación">
                                        <div id="errorsubg" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar subgerencia
                                            </p>
                                        </div>
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Nombre del área
                                    </label>
                                    <input @keyup.prevent="deleteError()" class="form-control" name="" type="text" v-model="area_acta_aceptación">
                                        <div id="errorArea" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar el  área de trabajo
                                            </p>
                                        </div>
                                    </input>
                                </div>
                            </div>
                            <div id="StepTwoActa" style="display:none">
                                <div class="form-group">
                                    <label>
                                        Objetivo del documento
                                    </label>
                                    <textarea @keyup.prevent="deleteError()" class="form-control" style="height: 80px;" v-model="objetivo_acta_aceptación">
                                    </textarea>
                                    <div id="errorObjetivoTrabajo" style="display: none">
                                        <p style="color: red">
                                            Favor indicar el objetivo del documento
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div id="StepThreeActa" style="display:none">
                            </div>
                        </div>
                        <div id="controlCambio" style="display:none">
                            <div class="row mt-4">
                                <div class="col-12 col-lg-8 offset-lg-2">
                                    <div class="wizard-steps">
                                        <div class="wizard-step " v-bind:class="step == 5 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-pen">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Datos del proyecto
                                            </div>
                                        </div>
                                        <div class="wizard-step" v-bind:class="step == 6 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-users">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Identificación solicitante
                                            </div>
                                        </div>
                                        <div class="wizard-step" v-bind:class="step == 7 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="far fa-file-alt">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Tipo solicitud
                                            </div>
                                        </div>
                                        <div class="wizard-step" v-bind:class="step == 8 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-edit">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Descripción solicitud
                                            </div>
                                        </div>
                                        <div class="wizard-step" v-bind:class="step == 9 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="far fa-money-bill-alt">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Capex
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="StepOneControl">
                                <div class="form-group">
                                    <label>Nombre proyecto*</label>
                                    <input type="text" name="" v-model="nombre_proyecto" class="form-control">
                                      <div id="errorNombreProyecto" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar el nombre del proyecto
                                            </p>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Pep del proyecto*
                                        <em style="color:grey;">
                                            (Ingrese la cuenta PEP del proyecto)
                                        </em>
                                    </label>
                                    <input @keyup.prevent="deleteError()" class="form-control" name="" type="text" v-model="pep_proyecto">
                                        <div id="errorPepProyectoCambio" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar el pep
                                            </p>
                                        </div>
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Nombre del cliente*
                                        <em style="color:grey;">
                                            (Indique su sponsor o cliente)
                                        </em>
                                    </label>
                                    <input @keyup.prevent="deleteError()" class="form-control" name="" type="text" v-model="cliente_cambio">
                                        <div id="errorCliente_cambio" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar el nombre del cliente
                                            </p>
                                        </div>
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Control de cambio*
                                        <em style="color:grey;">
                                            (Nro° del control en el proyecto)
                                        </em>
                                    </label>
                                    <input @keyup.prevent="deleteError()" class="form-control" min="1" name="" style="width: 100%" type="number" v-model="nro_control_cambio">
                                        <div id="errorNroControlCambio" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar el número de control de proyecto
                                            </p>
                                        </div>
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Estado*
                                    </label>
                                    <select @change.prevent="deleteError()" class="form-control select" v-model="estado_control_cambio_id">
                                        <option v-bind:value="1">
                                            Ejecución
                                        </option>
                                        <option v-bind:value="2">
                                            Planificación
                                        </option>
                                    </select>
                                    <div id="errorEstadoControl" style="display: none">
                                        <p style="color: red">
                                            Favor seleccionar un estado
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Autor*
                                        <em style="color:grey;">
                                            (Nombre JP)
                                        </em>
                                    </label>
                                    <input @keyup.prevent="deleteError()" class="form-control" name="" type="text" v-model="autor_control_cambio">
                                        <div id="errorAutorControlCambio" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar el nombre del autor
                                            </p>
                                        </div>
                                    </input>
                                </div>
                            </div>
                            <div id="StepTwoControl" style="display: none">
                                <div class="form-group">
                                    <label>
                                        Área o departamento*
                                    </label>
                                    <input @keyup.prevent="deleteError()" class="form-control" name="" type="text" v-model="area_depa_control_cambio">
                                        <div id="errorAreaDep" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar área o departamento
                                            </p>
                                        </div>
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Lugar de trabajo JP*
                                    </label>
                                    <input @keyup.prevent="deleteError()" class="form-control" name="" type="text" v-model="lugar_trabajo_jp">
                                        <div id="errorLugarTrabajo" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar lugar de trabajo
                                            </p>
                                        </div>
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Dirección email*
                                    </label>
                                    <input @keyup.prevent="deleteError()" class="form-control" name="" type="email" v-model="email_control_cambio_solicitante">
                                        <div id="errorEmailControl" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar dirección email
                                            </p>
                                        </div>
                                    </input>
                                </div>
                            </div>
                            <div id="StepThreeControl" style="display: none">
                                <div class="form-group">
                                    <label>
                                        Tipo Solicitud de Cambio por Cliente*
                                    </label>
                                    <div class="wrapper wrapper-content" style="background-color: #f4f6f9; border-radius: 3px;margin-top: 10px;">
                                        <div class="wrapper wrapper-content" style="background-color: #f4f6f9; border-radius: 3px;margin-top: 10px;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-check form-check-inline" style="margin-left: 8px;" v-for="tipo_solicitud in tipo_solicitudes">
                                                        <input @change.prevent="deleteError()" class="form-check-input" type="checkbox" v-bind:value="tipo_solicitud.id" v-model="list_tipo_documento">
                                                            <label class="form-check-label" for="inlineCheckbox1">
                                                                {{tipo_solicitud.descripcion}}
                                                            </label>
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="errorTipoSolicitud" style="display: none">
                                        <p style="color: red">
                                            Favor seleccionar una opción
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div id="StepFourControl" style="display: none">
                                <div class="form-group">
                                    <label>
                                        Alcance*
                                        <div>
                                            <em style="color:grey;">
                                                (Indicar  si por el cambio de Alcance existe impacto en PLAZO y/o en Capex/Opex. Justificar según corresponda)
                                            </em>
                                        </div>
                                    </label>
                                    <input @keyup.prevent="deleteError()" class="form-control" name="" type="text" v-model="alcance_control_cambio">
                                        <div id="errorAlcance" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar lugar de trabajo
                                            </p>
                                        </div>
                                    </input>
                                </div>
                                <div class="form-group">
                                    <h5 class="title">
                                        Plazo
                                    </h5>
                                    <label>
                                        Nueva fecha de término
                                    </label>
                                    <input  class="form-control" name="" type="date" v-model="nueva_fecha_termino">
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Fecha término anterior
                                    </label>
                                    <input  class="form-control" name="" type="date" v-model="fecha_termino_anterior">
                                    </input>
                                </div>
                                <div class="form-group">
                                     <label>
                                        Fecha paso producción
                                    </label>
                                    <input type="date" name="" class="form-control" v-model="paso_produccion">
                                </div>
                                
                                <div class="form-group">
                                    <label>
                                        Total días de desvío
                                    </label>
                                    <input type="number" name="" v-model="dias_desvio" style="width: 100%" class="form-control">
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label>
                                        Justificación de extensión de plazo
                                    </label>
                                    <input type="text" name="" v-model="extension_plazo" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>
                                        Cambio estado*
                                    </label>
                                    <div class="wrapper wrapper-content" style="background-color: #f4f6f9; border-radius: 3px;margin-top: 10px;">
                                        <div class="wrapper wrapper-content" style="background-color: #f4f6f9; border-radius: 3px;margin-top: 10px;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-check form-check-inline" style="margin-left: 8px;" v-for="cambio_estado in cambio_estados">
                                                        <input @click="setInput(cambio_estado)" :id="'checkEstado('+cambio_estado.id+')'" class="form-check-input" type="checkbox" v-bind:value="cambio_estado.id" v-model="combio_estado_id">
                                                            <label class="form-check-label" for="inlineCheckbox1">
                                                                {{cambio_estado.descripcion}}
                                                            </label>
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" v-for="(cambio_s,key) in cambio_select">
                                    <label>{{cambio_s.nombre_estado}}</label>
                                    <textarea class="form-control" style="height: 150px;"></textarea>
                                </div>
                                
                            </div>
                            <div id="StepFiveControl" style="display: none">
                                <h5 class="title">
                                    Capex
                                </h5>
                                <div class="form-group">
                                    <label>
                                        Justificación de aumento de capex*
                                    </label>
                                    <input class="form-control" name="" type="text" v-model="justificacion_aumento_capex">
                                    </input>
                                </div>
                                <h5 class="title">
                                    Desglose de lo solicitado
                                </h5>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>
                                                Item
                                            </label>
                                            <input class="form-control" name="" type="text" v-model="item_desglose">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>
                                                Costo
                                            </label>
                                            <input class="form-control" name="" type="number" v-model="costo_item">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>
                                            Añadir item
                                        </label>
                                        <div class="form-group">
                                            <button @click.prevent="addItem()" class="btn btn-success ">
                                                <i class="fas fa-plus">
                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-md">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Item
                                                                </th>
                                                                <th>
                                                                    Costo
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="item_solicitado in item_solicitados">
                                                                <td>
                                                                    {{item_solicitado.item}}
                                                                </td>
                                                                <td>
                                                                    $ {{item_solicitado.item_costo | currency}}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Total
                                                                </th>
                                                                <th>
                                                                    ${{total_items | currency}}
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="title">
                                    Causa raiz
                                </h5>
                                <div class="form-group">
                                    <label>
                                        Causa raiz del problema*
                                        <em style="color:grey;">
                                            (Se debe indicar la causa raiz del problema que origina el cambio, debe ser explicito y no ambiguo.)
                                        </em>
                                    </label>
                                    <textarea class="form-control" name="" style="height: 200px;" v-model="causa_raiz">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="footer-ActaAceptacion" style="display: none">
                        <div class="modal-footer " style="background: -webkit-linear-gradient(#6fc3f7 ,#1813a2); ">
                            <a @click.prevent="ValidateFormActaStepOne()" class="btn btn-icon icon-right btn-secondary" href="#" id="btnNextStepOne" style="box-shadow: 0 0px 0px;color: #191919">
                                Siguiente
                                <i class="fas fa-arrow-right">
                                </i>
                            </a>
                            <a @click.prevent="ValidateFormActaStepTwo()" class="btn btn-icon icon-right btn-secondary" href="#" id="btnNextStepTwo" style="box-shadow: 0 0px 0px;color: #191919;display: none">
                                Siguiente
                                <i class="fas fa-arrow-right">
                                </i>
                            </a>
                        </div>
                    </div>
                    <div id="footer-ControlCambio" style="display: none">
                        
                        <div class="modal-footer " style="background: -webkit-linear-gradient(#6fc3f7 ,#1813a2); ">
                            <a @click.prevent="backformControlCambio()" v-if="backStepControl != 0" class="btn btn-icon icon-right btn-secondary" href="#" id="btnNextStepOneControl" style="box-shadow: 0 0px 0px;color: #191919">
                                <i class="fas fa-arrow-left">
                                </i>
                                Atrás
                                
                            </a>
                            <a @click.prevent="ValidateFormControl()" class="btn btn-icon icon-right btn-secondary" href="#" id="btnNextStepOneControl" style="box-shadow: 0 0px 0px;color: #191919">
                                {{name_boton_step}}
                                <i class="fas fa-arrow-right">
                                </i>
                            </a>
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
import EventBus from "../event-bus"


export default {
    data(){
        return{
            
            tipo_documentos:[],
            tipo_documento_id:'',
            step:0,
            nombre_proyecto_acta_aceptación:null,
            subgerencia_acta_aceptación:null,
            area_acta_aceptación:null,
            objetivo_acta_aceptación:null,
            pep_proyecto:null,
            cliente_cambio:null,
            nro_control_cambio:null,
            estado_control_cambio_id:null,
            autor_control_cambio:null,
            area_depa_control_cambio:null,
            lugar_trabajo_jp:null,
            email_control_cambio_solicitante:null,
            stepControl:1,
            tipo_solicitudes:[],
            list_tipo_documento:[],
            alcance_control_cambio:null,
            cambio_estados:[],
            combio_estado_id:[],
            nueva_fecha_termino:'',
            fecha_termino_anterior:'',
            paso_produccion:'',
            dias_desvio:'',
            extension_plazo:null,
            justificacion_aumento_capex:null,
            item_desglose:null,
            costo_item:'',
            item_solicitados:[],
            escenario_facturacion:null,
            total_items:0,
            causa_raiz:null,
            backStepControl:0,
            name_boton_step:'Siguiente',
            cambio_select:[],
            nombre_proyecto:null

        }
    },

    created:function(){


   
        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('cambios.getData', function () {
            self.GetDataForm(); // ejecutas el metodo que desees
        });
    },
    methods:{
        formato:function(d){
            return moment(d).format("DD/MM/YY - hh:mm:ss");
        },
        addItem:function(){
            if(this.item_desglose && this.costo_item != ''){
                this.item_solicitados.push({item:this.item_desglose,item_costo:this.costo_item})
                this.total_items =  parseInt(this.total_items)  + parseInt(this.costo_item) 
                this.item_desglose = null
                this.costo_item = null
            }else{
                let mensaje = 'Debe ingresar el item y el costo'
                this.ErrorMessaje(mensaje)
            }
           
         
           
           
        },
        setInput:function(estado){
            if(this.cambio_select.length != 0){
                this.cambio_select.forEach(data => {
                     if(data.id == estado.id){
                        this.cambio_select.splice(data.id,1)
                     }else{
                        this.cambio_select.push({nombre_estado:estado.descripcion,id:estado.id}) 
                     }
                });
            }else{
                 this.cambio_select.push({nombre_estado:estado.descripcion,id:estado.id}) 
            }

          
         
           
          
            
            
          

            
        },
        ErrorMessaje:function(mensaje){
          Swal.fire({
            type: 'error',
            title: 'Error',
            text: mensaje,
            })
                                  
        },
        GetDataForm:function(){
            axios.get('/GetTipoDocumentos').then((response)=>{
                 this.tipo_documentos = response.data
            })
            $('#SolicitudControlCambioModal').modal('show');
        },
        setform:function(){
            if(this.tipo_documento_id == 1){
                document.getElementById('actaAceptación').style.display = 'block'
                document.getElementById('controlCambio').style.display = 'none'
                this.step = 1
               document.getElementById('footer-ActaAceptacion').style.display = 'block' 
               document.getElementById('footer-ControlCambio').style.display = 'none' 
            }else{
                if(this.tipo_documento_id == 4){
                    document.getElementById('controlCambio').style.display = 'block'
                    document.getElementById('actaAceptación').style.display = 'none'
                    this.step = 5
                   document.getElementById('footer-ActaAceptacion').style.display = 'none' 
                   document.getElementById('footer-ControlCambio').style.display = 'block' 
                   axios.get('/tipo-solicitud-control-cambio').then((response)=>{
                      this.tipo_solicitudes = response.data
                   })
                   axios.get('/GetCambioEstado').then((response)=>{
                     this.cambio_estados = response.data
                   })
                }
            }
        },
        deleteError:function(){
            if(this.nombre_proyecto_acta_aceptación ){
                    document.getElementById('errorNombre').style.display = 'none'
            }
            if(this.subgerencia_acta_aceptación ){
                    document.getElementById('errorsubg').style.display = 'none'
            }
            if(this.area_acta_aceptación){
                    document.getElementById('errorArea').style.display = 'none'
            }
            if(this.objetivo_acta_aceptación){
                    document.getElementById('errorObjetivoTrabajo').style.display = 'none'
            }

            if(this.pep_proyecto ){
                    document.getElementById('errorPepProyectoCambio').style.display = 'none'
                 }
            if(this.cliente_cambio ){
                    document.getElementById('errorCliente_cambio').style.display = 'none'
                 }
            if(this.nro_control_cambio){
                    document.getElementById('errorNroControlCambio').style.display = 'none'
                 }
            if(this.estado_control_cambio_id){
                    document.getElementById('errorEstadoControl').style.display = 'none'
                 }
            if(this.autor_control_cambio){
                    document.getElementById('errorAutorControlCambio').style.display = 'none'
              }
            if(this.area_depa_control_cambio ){
                    document.getElementById('errorAreaDep').style.display = 'none'
                 }
            if(this.lugar_trabajo_jp ){
                    document.getElementById('errorLugarTrabajo').style.display = 'none'
                 }
            if(this.email_control_cambio_solicitante){
                    document.getElementById('errorEmailControl').style.display = 'none'
                 }

            if(this.list_tipo_documento.length != 0){
                              document.getElementById('errorTipoSolicitud').style.display = 'none'
                        }
        },
        ValidateFormActaStepOne:function(){
            if(this.tipo_documento_id==1){
                 if(!this.nombre_proyecto_acta_aceptación ){
                    document.getElementById('errorNombre').style.display = 'block'
                 }
                 if(!this.subgerencia_acta_aceptación ){
                    document.getElementById('errorsubg').style.display = 'block'
                 }
                 if(!this.area_acta_aceptación){
                    document.getElementById('errorArea').style.display = 'block'
                 }
                 
                 if(this.nombre_proyecto_acta_aceptación && this.subgerencia_acta_aceptación && this.area_acta_aceptación  )
                 {
                     document.getElementById('StepOneActa').style.display = 'none'
                     document.getElementById('StepTwoActa').style.display = 'block'
                     document.getElementById('btnNextStepOne').style.display = 'none'
                     document.getElementById('btnNextStepTwo').style.display = 'block'
                     this.step = 2
                 }
            }
        },

        ValidateFormActaStepTwo:function(){
               if(!this.objetivo_acta_aceptación){
                    document.getElementById('errorObjetivoTrabajo').style.display = 'block'
                }
                if(this.objetivo_acta_aceptación){
                      document.getElementById('btnNextStepTwo').style.display = 'none'
                        document.getElementById('StepTwoActa').style.display = 'none'
                        document.getElementById('StepThreeActa').style.display = 'block' 
                        this.step = 3

                }
        },
        ValidateFormControl:function(){
            if(this.stepControl == 1){
                if(!this.pep_proyecto ){
                    document.getElementById('errorPepProyectoCambio').style.display = 'block'
                 }
                if(!this.cliente_cambio ){
                    document.getElementById('errorCliente_cambio').style.display = 'block'
                 }
                if(!this.nro_control_cambio){
                    document.getElementById('errorNroControlCambio').style.display = 'block'
                 }
                if(!this.estado_control_cambio_id){
                    document.getElementById('errorEstadoControl').style.display = 'block'
                 }
                if(!this.autor_control_cambio){
                    document.getElementById('errorAutorControlCambio').style.display = 'block'
                  }
                  if(!this.nombre_proyecto){
                       document.getElementById('errorNombreProyecto').style.display = 'block'
                  }
                if(this.pep_proyecto && this.cliente_cambio && this.nro_control_cambio && this.estado_control_cambio_id && this.autor_control_cambio && this.nombre_proyecto){
                  document.getElementById('StepOneControl').style.display = 'none'
                  
                  document.getElementById('StepTwoControl').style.display = 'block'
                
                  this.backStepControl = 1
                  this.step = 6
                  this.stepControl=2
                }
            }else{
                if(this.stepControl == 2){
                    if(!this.area_depa_control_cambio ){
                    document.getElementById('errorAreaDep').style.display = 'block'
                    }
                if(!this.lugar_trabajo_jp ){
                    document.getElementById('errorLugarTrabajo').style.display = 'block'
                    }
                if(!this.email_control_cambio_solicitante){
                    document.getElementById('errorEmailControl').style.display = 'block'
                    }

                if(this.area_depa_control_cambio && this.lugar_trabajo_jp && this.email_control_cambio_solicitante){
                    document.getElementById('StepTwoControl').style.display = 'none'
                    document.getElementById('StepThreeControl').style.display = 'block'
                    this.step = 7
                    this.stepControl=3
                    this.backStepControl = 2
                  
                    }
                }else{
                     if(this.stepControl == 3 ){
                        if(this.list_tipo_documento.length == 0){
                              document.getElementById('errorTipoSolicitud').style.display = 'block'
                        }
                        if(this.list_tipo_documento.length != 0){
                         document.getElementById('StepFourControl').style.display='block'
                         document.getElementById('StepThreeControl').style.display = 'none'
                         this.step = 8
                         this.stepControl=4
                         this.backStepControl = 3
                        }
                     }else{
                        if(this.stepControl == 4){
                                document.getElementById('StepFourControl').style.display='none'
                                document.getElementById('StepFiveControl').style.display = 'block'
                                this.step = 9
                                this.stepControl=5
                                this.backStepControl = 4
                                this.name_boton_step = 'Finalizar'
                        }else{
                            if(this.stepControl == 5){
                                this.CreateFormControlCambio()
                            }
                        }
                     }
                 }
            }
           

        },
        CreateFormControlCambio:function(){
            let items = Object.values(this.item_solicitados)
            let convert = JSON.stringify(items)
            let form =   new FormData()
            form.append('nombre_proyecto', this.nombre_proyecto)
            form.append('pep_proyecto', this.pep_proyecto)
            form.append('cliente_cambio',this.cliente_cambio)
            form.append('nro_control_cambio',this.nro_control_cambio)
            form.append('estado_control_cambio_id',this.estado_control_cambio_id)
            form.append('autor_control_cambio',this.autor_control_cambio)
            form.append('area_depa_control_cambio',this.area_depa_control_cambio)
            form.append('lugar_trabajo_jp',this.lugar_trabajo_jp)
            form.append('email_control_cambio_solicitante',this.email_control_cambio_solicitante)
            form.append('list_tipo_documento',this.list_tipo_documento)
            form.append('alcance_control_cambio',this.alcance_control_cambio)
            form.append('nueva_fecha_termino',this.nueva_fecha_termino)
            form.append('fecha_termino_anterior',this.fecha_termino_anterior)
            form.append('fecha_paso_produccion',this.paso_produccion)
            form.append('total_dias_desvio',this.dias_desvio)
            form.append('justificacion_extension_plazo',this.extension_plazo)
            form.append('cambio_estado_id',this.combio_estado_id)
            form.append('escenario_facturacion',this.escenario_facturacion)
            form.append('justificacion_aumento_capex',this.justificacion_aumento_capex)
            form.append('item_solicitados',convert)
            form.append('causa_raiz',this.causa_raiz)

            axios.post('/PostControlCambio',form).then((response=>{
                   console.log(response.data)
                   $('#SolicitudControlCambioModal').modal('hide');
                   this.loadFunction()
                   this.ClearnFormControlCambio()
                   EventBus.$emit('control.getData'); 
            }))

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
        }, 400)
        },
        ClearnFormControlCambio:function(){
          this.item_solicitados=[]
          this.nombre_proyecto=null
          this.pep_proyecto=null
          this.cliente_cambio=null
          this.nro_control_cambio=null
          this.estado_control_cambio_id=[]
          this.autor_control_cambio=null
          this.area_depa_control_cambio=null
          this.lugar_trabajo_jp=null
          this.email_control_cambio_solicitante=null
          this.list_tipo_documento=[]
          this.alcance_control_cambio=null
          this.nueva_fecha_termino=''
          this.fecha_termino_anterior=''
          this.paso_produccion=''
          this.dias_desvio=null
          this.extension_plazo=null
          this.combio_estado_id=[]
          this.escenario_facturacion=null
          this.justificacion_aumento_capex=null
          this.causa_raiz=null
          this.tipo_documento_id = null
          document.getElementById('controlCambio').style.display = 'none'
       
          document.getElementById('StepOneControl').style.display = 'block'
          document.getElementById('StepTwoControl').style.display = 'none'
          this.backStepControl = 0
          this.step = 0
          this.stepControl=1
        },
        backformControlCambio:function(){
           if(this.backStepControl == 1){
              document.getElementById('StepOneControl').style.display = 'block'
              document.getElementById('StepTwoControl').style.display = 'none'
              this.backStepControl = 0
              this.step = 5
              this.stepControl=1
           }else{
            if(this.backStepControl == 2){
                 document.getElementById('StepTwoControl').style.display = 'block'
                 document.getElementById('StepThreeControl').style.display = 'none'
                 this.step = 6
                 this.stepControl=2
                this.backStepControl = 1
            }else{
                if(this.backStepControl == 3){
                         document.getElementById('StepFourControl').style.display='none'
                         document.getElementById('StepThreeControl').style.display = 'block'
                         this.step = 7
                         this.stepControl=3
                         this.backStepControl = 2
                }else{
                    if(this.backStepControl == 4){
                         document.getElementById('StepFourControl').style.display='block'
                         document.getElementById('StepFiveControl').style.display = 'none'
                         this.step = 8
                         this.stepControl=4
                         this.backStepControl = 3
                          this.name_boton_step = 'Siguiente'
                    }
                }
            }
           }

        }

    
    }
}
</script>

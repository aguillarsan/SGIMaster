<template>
    <div class="wrapper wrapper-content">
        <section class="section">
            <div class="section-header shadow-box-ag">
                <div class="row">
                    <div class="col-lg-10 col-md-6 col-sm-6 col-12 ">
                        <div class="card-stats-title">
                            <h1>
                                Tickets 
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn">
                    <a href="" v-on:click.prevent="GetTicketsDenuncia(1)" style="color: #2FCBF1">
                        <div class="card-icon shadow-box-ag azul">
                            <i class="fas fa-columns" style="font-size: 25px;color: white">
                            </i>
                        </div>
                        <div class="card-wrap ">
                            <div class="card-header">
                                <h4 style="font-size: ;">
                                    TOTAL SIN DENUNCIAR
                                </h4>
                            </div>
                            <div class="card-body animated fadeIn" style="font-size: 35px;">
                                {{totalDenuncia}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
             <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn">
                    <a href="" v-on:click.prevent="GetTicketsDenuncia(2)" style="color: #2FCBF1">
                        <div class="card-icon shadow-box-ag verde">
                            <i class="fas fa-check" style="font-size: 25px;color: white">
                            </i>
                        </div>
                        <div class="card-wrap ">
                            <div class="card-header">
                                <h4 style="font-size: ;">
                                    TOTAL DENUNCIADOS
                                </h4>
                            </div>
                            <div class="card-body animated fadeIn" style="font-size: 35px;">
                                {{totalDenunciado}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 ">
                <div class="ibox float-e-margins">
                    <div class="card shadow-box-ag" style="border-radius:10px;">
                        <div class="card-header">
                            <div class="col-lg-11">
                                <h4 style="color: #666">
                                    TICKETS {{nombre}}
                                </h4>
                            </div>
                        </div>
                        <div class="ibox">
                            <div class=" table-responsive project-list project-table">
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
                                            <th v-if="modulo==1">
                                                Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <th style="width: 50px;">
                                            <input class="form-control" name="codigo" placeholder="" style="width:80px; " type="" v-model="codigo" v-on:keyup="GetTicketsDenuncia(modulo)">
                                            </input>
                                        </th>
                                        <th>
                                            <div id="divSelecArea">
                                                <select class="form-control " name="area" style="width:80px;" v-model="area" v-on:change="GetTicketsDenuncia(modulo)">
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
                                            <input class="form-control" name="sitio" placeholder="" style="width:80px; " type="" v-model="sitio" v-on:keyup="GetTicketsDenuncia(modulo)">
                                            </input>
                                        </th>
                                        <th>
                                            <div id="crmSelect">
                                                <select class="form-control" style="width:80px;" v-model="crmId" v-on:change="GetTicketsDenuncia(modulo)">
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
                                                <select class="form-control " name="categoria" style="width:50px;" v-model="categoria" v-on:change="GetTicketsDenuncia(modulo)">
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
                                                <select class="form-control " name="motivo" style="width:60px;" v-model="motivo" v-on:change="GetTicketsDenuncia(modulo)">
                                                    <option v-bind:value="1">
                                                        Vandalismo menor
                                                    </option>
                                                    <option v-bind:value="7">
                                                        Vandalismo mayor
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
                                                <input class="form-control" name="fecha1" style="width:80px" type="date" v-model="fecha1" v-on:change="GetTicketsDenuncia(modulo)">
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
                                                <input class="form-control" name="fecha2" style="width:80px" type="date" v-model="fecha2" v-on:change="GetTicketsDenuncia(modulo)">
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
                                            <input class="form-control" name="descripcion" style="width:150px;" type="text" v-model="searchDescripcion" v-on:keyup="GetTicketsDenuncia(modulo)">
                                            </input>
                                        </th>
                                        <th>
                                        </th>
                                        <tr style="height: 150px;" v-for="ticket in tickets.data">
                                            <td class="">
                                                <a :href="'/Tkc/'+ticket.id" target="blank__">
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
                                                <div style="margin-top:5px;" v-if="ticket.denuncia_id == 1">
                                                    <span class="badge " style="background-color:#ed5666;color:white">
                                                        SIN DENUNCIAR
                                                    </span>
                                                </div>
                                                <div style="margin-top:5px;" v-if="ticket.denuncia_id == 2">
                                                    <span class="badge " style="background-color:#005cff;color:white">
                                                        DENUNCIADO
                                                    </span>
                                                </div>
                                            </td>
                                            <td v-if="modulo==1">
                                                <button class="btn btn-success"  data-target="#ModalArchivosDenuncia" @click.prevent="SetNumberTicket(ticket.id)" data-toggle="modal">
                                                    <i class="fas fa-check">
                                                    </i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <nav aria-label="pagination" class="pagination" role="navigation">
                                        <vue-pagination :offset="4" :pagination="tickets" @paginate="GetTicketsDenuncia">
                                        </vue-pagination>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <form>
                <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="ModalArchivosDenuncia" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content animated bounceIn">
                            <div class="modal-header">
                                <p class="modal-title" style="color: #999999;font-size: 28px;">
                                    Carga de archivos
                                </p>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="tickets-list">
                                    <div class="ticket-item">
                                        <p class="title" style="color: #999999; font-size: 21px;">
                                            <strong>
                                                Archivos denuncia
                                            </strong>
                                        </p>
                                        <div class="row">
                                            <div class="file-upload" style="margin-top: -20px">
                                                <div class="image-upload-wrap" style="height: 200px;">
                                                    
                                                    
                                                    <input type="file" id="files" class="file-upload-input" ref="files" multiple v-on:change="handleFileUploads()"/>
                                                    <div class="drag-text">
                                                        <h2 style="font-size: 28px;">
                                                            Arrastre o selecciones sus archivos.
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                               <p class="title" style="color: #999999; font-size: 21px;">
                                                 <strong>
                                                    Archivos cargados
                                                  </strong>
                                              </p>
                                               <div v-for="(file, key) in files" class="file-listing">{{ file.name }} <i class="fas fa-times-circle btn boxBounce" v-on:click="removeFile( key )" style="color:#fb544c"></i></div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger boxBounce" data-dismiss="modal" type="">
                                        Cancelar
                                    </button>
                                    <button  class="btn shadow-box-ag boxBounce " type="button" v-on:click="submitFiles()" style="background-color: #3386ff;color:white;">
                                        Aceptar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
	data(){
		return{
			
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
            totalDenuncia:'',
            totalDenunciado:'',
            modulo:'',
            nombre:'',
            files: [],
            TicketId:''


		}
	},

	created:function(){

        this.GetTotalDenucia();
        this.GetTicketsDenuncia();
        this.GetTotalDenuciado();

		

	},
	mounted: function() { /* Agrega mounted y con el siguiente contenido */
		let self = this;
		EventBus.$on('bitacora.getBitacora', function () {
            self.getBitacora(); // ejecutas el metodo que desees
        });
	},
	methods:{
        SetNumberTicket:function(id){
            this.TicketId = id;
        },
        handleFileUploads:function(){
            let uploadedFiles = this.$refs.files.files;

/*
  Adds the uploaded file to the files array
*/
           for( var i = 0; i < uploadedFiles.length; i++ ){
           this.files.push( uploadedFiles[i] );
            }
        },
        removeFile( key ){
        this.files.splice( key, 1 );
        },
        submitFiles:function(){
           let formData = new FormData();

           for( var i = 0; i < this.files.length; i++ ){
           let file = this.files[i];


           formData.append('files[' + i + ']', file);
           }
           if(this.files.length < 4){
              Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Debes cargar minimo 4 archivos'
               
              })
           }else{
             $('#ModalArchivosDenuncia').modal('hide');
            let loader = this.$loading.show({
                            // Optional parameters
                            container: this.fullPage ? null : this.$refs.formContainer,
                            canCancel: true,
                            onCancel: this.onCancel,
                        });
                        // simulate AJAX
                        setTimeout(() => {
                            loader.hide()
                        }, 350) 
            axios.post( '/uploadFilesComplaint/'+this.TicketId,
            formData,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }
            ).then((response)=>{
                let loader = this.$loading.show({
                            // Optional parameters
                            container: this.fullPage ? null : this.$refs.formContainer,
                            canCancel: true,
                            onCancel: this.onCancel,
                        });
                        // simulate AJAX
                        setTimeout(() => {
                            loader.hide()
                        }, 350)  
            this.GetTicketsDenuncia();
            this.GetTotalDenucia();
            this.GetTotalDenuciado();
            this.files=[];
           

            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 6500,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast.fire({
            type: 'success',
            title: 'Ticket Nro'+' '+this.TicketId+' '+'denunciado'
          })

            });
           }
          
        },
		formato:function(d){
			return moment(d).format("DD/MM/YY");
		},
		GetTotalDenucia:function(){
          axios.get(`/totalDenuncia?estado=${this.estado}&codigo=${this.codigo}&area=${this.area}&sitio=${this.sitio}&categoria=${this.categoria}&motivo=${this.motivo}&fecha1=${this.fecha1}&fecha2=${this.fecha2}&descripcion=${this.searchDescripcion}&crm=${this.crmId}&user=${this.user}&crmSelect=${this.crm}&zona=${this.zona}`).then((response)=>{
          	this.totalDenuncia = response.data;
          })
		},
        GetTotalDenuciado:function(){
          axios.get(`/totalDenunciado?estado=${this.estado}&codigo=${this.codigo}&area=${this.area}&sitio=${this.sitio}&categoria=${this.categoria}&motivo=${this.motivo}&fecha1=${this.fecha1}&fecha2=${this.fecha2}&descripcion=${this.searchDescripcion}&crm=${this.crmId}&user=${this.user}&crmSelect=${this.crm}&zona=${this.zona}`).then((response)=>{
            this.totalDenunciado = response.data;
          })
        },
		GetTicketsDenuncia:function(id) {
               
                if (id == 2) {
                    var state = 2;
                    this.nombre = 'DENUNCIADOS';
                    this.modulo = 2;

                } else {
                   
                        var state = 1;
                        this.nombre = 'SIN DENUNCIAR';
                        this.modulo = 1;
                    

                }



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

            axios.get(`/DenunciaTicketGet?page=${this.tickets.current_page}&estado=${this.estado}&codigo=${this.codigo}&area=${this.area}&sitio=${this.sitio}&categoria=${this.categoria}&motivo=${this.motivo}&fecha1=${this.fecha1}&fecha2=${this.fecha2}&descripcion=${this.searchDescripcion}&crm=${this.crmId}&user=${this.user}&crmSelect=${this.crm}&zona=${this.zona}&modulo=${this.modulo}`)
                .then((response) => {

                    this.tickets = response.data;
                    this.GetTotalDenucia();
                    this.GetTotalDenuciado();

                })


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
            this.GetTicketsDenuncia();

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
            this.GetTicketsDenuncia();
        },
        ClearCate: function() {
            this.categoria = '';
            var selectCategoria = document.getElementById('selectCategoria');
            selectCategoria.style.display = '';

            var selectCategoriaInfo = document.getElementById('selectedCateInfo');
            selectCategoriaInfo.style.display = 'none';
            this.GetTicketsDenuncia();

        },
        clearCrm: function() {
            if (this.crmId != '') {
                this.crmId = '';
                var crmSelect = document.getElementById('crmSelect');
                crmSelect.style.display = '';
            }

            var selectedCrm = document.getElementById('selectedCrm');
            selectedCrm.style.display = 'none';
            this.GetTicketsDenuncia();
        },
        ClearFecha1: function() {
            this.fecha1 = '';
            var selectfecha1 = document.getElementById('InputFecha1');
            selectfecha1.style.display = '';

            var selectedFecha1 = document.getElementById('selectedFecha1');
            selectedFecha1.style.display = 'none';
            this.GetTicketsDenuncia();
        },
        ClearFecha2: function() {
            this.fecha2 = '';
            var selectfecha2 = document.getElementById('InputFecha2');
            selectfecha2.style.display = '';

            var selectedFecha2 = document.getElementById('selectedFecha2');
            selectedFecha2.style.display = 'none';
            this.GetTicketsDenuncia();
        },
		
		
	}
}
</script>

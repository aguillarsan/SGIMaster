<template>
    <div class="main-content">
        <div class="wrapper wrapper-content">
            <section class="section">
                <div class="section-header shadow-box-ag">
                    <div class="row">
                        <div class="col-lg-10 col-md-6 col-sm-6 col-12 ">
                            <div class="card-stats-title">
                                <h1>
                                    Tickets de soporte para plataformas
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn">
                        <a href="" style="color: #2FCBF1" v-on:click.prevent="GetSolicitudes(1)">
                            <div class="card-icon shadow-box-ag verde">
                                <i class="fas fa-check" style="font-size: 25px;color: white">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header">
                                    <h4 style="font-size: ;">
                                        VALIDACIÓN
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn" style="font-size: 35px;">
                                    {{validacion}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn">
                        <a href="" style="color: #2FCBF1" v-on:click.prevent="GetSolicitudes(2)">
                            <div class="card-icon shadow-box-ag azul">
                                <i class="fas fa-code-branch" style="font-size: 25px;color: white">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header">
                                    <h4 style="font-size: ;">
                                        EN CURSO
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn" style="font-size: 35px;">
                                    {{curso}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn">
                        <a href="" style="color: #2FCBF1" v-on:click.prevent="GetSolicitudes(3)">
                            <div class="card-icon shadow-box-ag rosa">
                                <i class="fas fa-calendar-check" style="font-size: 25px;color: white">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header">
                                    <h4 style="font-size: ;">
                                        FINALIZADOS
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn" style="font-size: 35px;">
                                    {{finalizada}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-lg-11">
                                <h4 style=" color:#343a40">
                                    Tickets {{nombre}}
                                </h4>
                            </div>
                            <div class="col-lg-1">
                                <button class="btn boxBounce shadow-box-ag " data-target="#ModalTicketPlataforma" data-toggle="modal" style="border-radius: 5px; width: 80px;color: white;background-color: #43e8b4">
                                    <i class="fa fa-plus">
                                    </i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <a class="btn shadow-box-ag boxBounce btn-icon icon-left btn-lg btn-block mb-4 d-md-none" data-toggle-slide="#ticket-items" href="#" style="background-color: #005cff;color: white;">
                                <i class="fas fa-list">
                                </i>
                                Todos los tickets
                            </a>
                            <div class="tickets">
                                <div class="ticket-items" id="ticket-items">
                                    <div class="ticket-item " v-bind:style=" TicketInfo.id==ticket.id ? 'box-shadow: 0 2px 6px #acb5f6; border-radius: 3px;background-color: #005cff;border-bottom: none;' : '' " v-for="ticket in tickets.data">
                                        <a @click.prevent="ShowTicketInfo(ticket)" href="" style="color: #005cff">
                                            <div class="ticket-title">
                                                <h4 style="font-size: 17px;" v-bind:style=" TicketInfo.id==ticket.id ? 'color:white':'color:#343a40'">
                                                    {{ticket.tipo_requisito.descripcion}}
                                                </h4>
                                            </div>
                                            <div class="ticket-desc">
                                                <div v-bind:style=" TicketInfo.id==ticket.id ? 'color:white':'color:#343a40'">
                                                    {{ticket.user.name}} {{ticket.user.apellido}}
                                                </div>
                                                <div class="bullet">
                                                </div>
                                                <div v-bind:style=" TicketInfo.id==ticket.id ? 'color:white':''" v-if="fechaActual.diff(ticket.created_at,'days') == 0 && fechaActual.diff(ticket.created_at,'minute') >= 60">
                                                    Hace {{fechaActual.diff(ticket.created_at,'hours')}} hrs.
                                                </div>
                                                 <div v-bind:style=" TicketInfo.id==ticket.id ? 'color:white':''" v-if="fechaActual.diff(ticket.created_at,'days') >= 1">
                                                    Hace {{fechaActual.diff(ticket.created_at,'days')}} día(s)
                                                </div>
                                                 <div v-bind:style=" TicketInfo.id==ticket.id ? 'color:white':''" v-if="fechaActual.diff(ticket.created_at,'minute') < 60">
                                                    Hace {{fechaActual.diff(ticket.created_at,'minute')}} min.
                                                </div>
                                            </div>
                                            <div class="ticket-desc" style="margin-top: 5px;">
                                                <span class="badge badge-success" style="border-radius:5px;background-color:#42E8B4;color: white   " v-if="ticket.prioridad_id == 1">
                                                    {{ticket.prioridad.descripcion}}
                                                </span>
                                                <span class="badge " style="border-radius:5px;background-color:#ff753a;color: white  " v-if="ticket.prioridad_id == 2">
                                                    {{ticket.prioridad.descripcion}}
                                                </span>
                                                <span class="badge badge-danger" style="border-radius:5px;  " v-if="ticket.prioridad_id == 3">
                                                    {{ticket.prioridad.descripcion}}
                                                </span>
                                            </div>
                                            <div class="ticket-desc" style="margin-top: 10px;">
                                                <strong v-bind:style=" TicketInfo.id==ticket.id ? 'color:white':''">
                                                    TICKET NRO°{{ticket.id}}
                                                </strong>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <nav aria-label="pagination" class="pagination" role="navigation">
                                            <vue-pagination :offset="4" :pagination="tickets" @paginate="GetSolicitudes(modulo)">
                                            </vue-pagination>
                                        </nav>
                                    </div>
                                </div>
                                <div class="ticket-content animated fadeIn sha" v-if="TicketInfo != '' ">
                                    <div class="ticket-header">
                                        <div class="ticket-sender-picture ">
                                            <img :src="TicketInfo.user.avatar" alt="image" class="rounded-circle mr-1 ">
                                            </img>
                                        </div>
                                        <div class="ticket-detail">
                                            <div class="ticket-title">
                                                <h4>
                                                    {{TicketInfo.tipo_requisito.descripcion}}
                                                </h4>
                                            </div>
                                            <div class="ticket-info">
                                                <div class="font-weight-600">
                                                    {{TicketInfo.user.name}} {{TicketInfo.user.apellido}}
                                                </div>
                                                <div class="bullet">
                                                </div>
                                                <div class="font-weight-600">
                                                    {{formato(TicketInfo.created_at)}}
                                                </div>
                                                <div class="bullet">
                                                </div>
                                                <div class=" font-weight-600" style="color:#005cff" v-if="fechaActual.diff(TicketInfo.created_at,'days') == 0 && fechaActual.diff(TicketInfo.created_at,'minute') >= 60">
                                                    Hace {{fechaActual.diff(TicketInfo.created_at,'hours')}} hrs.
                                                </div>
                                                 <div class=" font-weight-600" style="color:#005cff" v-if="fechaActual.diff(TicketInfo.created_at,'days') >= 1">
                                                    Hace {{fechaActual.diff(TicketInfo.created_at,'days')}} día(s)
                                                </div>
                                                <div class=" font-weight-600" style="color:#005cff" v-if="fechaActual.diff(TicketInfo.created_at,'minute') < 60">
                                                    Hace {{fechaActual.diff(TicketInfo.created_at,'minute')}} min.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-description">
                                        <div class="ticket-item">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                                    <div class="ticket-title">
                                                        <h4 style="font-size: 16px;">
                                                            Área
                                                        </h4>
                                                    </div>
                                                    <div>
                                                        {{TicketInfo.area.descripcion}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                                    <div class="ticket-title">
                                                        <h4 style="font-size: 16px;">
                                                            Plataforma
                                                        </h4>
                                                    </div>
                                                    <div>
                                                        {{TicketInfo.plataforma.descripcion}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                                    <div class="ticket-title">
                                                        <h4 style="font-size: 16px;">
                                                            Responsable
                                                        </h4>
                                                    </div>
                                                    <div>
                                                        {{TicketInfo.responsable.descripcion}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                                    <div class="ticket-title">
                                                        <h4 style="font-size: 16px;">
                                                            Motivo
                                                        </h4>
                                                    </div>
                                                    <div>
                                                        {{TicketInfo.tipo_requisito.descripcion}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ticket-item">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                    <div class="ticket-title">
                                                        <h4 style="font-size: 16px;">
                                                            Descripción
                                                        </h4>
                                                    </div>
                                                    <div>
                                                        {{TicketInfo.descripcion}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ticket-divider">
                                        </div>
                                        <div class="gallery">
                                            <div class="ticket-title">
                                                <h4 style="font-size: 16px;">
                                                    Imagenes
                                                </h4>
                                            </div>
                                            <div class="gallery-item" v-for="Archivo in Archivos" v-if="Archivo.tipo_archivo_id==4">
                                                <a @click.prevent="ShowImg(Archivo)" data-toggle="modal" href="#archivo">
                                                    <img :src="'evidencia/'+Archivo.nombre_archivo" style="width: 50px;height: 50px;">
                                                    </img>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ticket-divider">
                                        </div>
                                        <div class="gallery">
                                            <div class="ticket-title">
                                                <h4 style="font-size: 16px;">
                                                    Otros archivos
                                                </h4>
                                            </div>
                                            <div class="gallery-item" v-for="Archivo in Archivos" v-if="Archivo.tipo_archivo_id!=4">
                                                <a :href="'evidencia/'+Archivo.nombre_archivo" target="blanck__">
                                                    <img :src="Archivo.icono_archivo" style="width: 50px;height: 50px;">
                                                    </img>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ticket-divider">
                                        </div>
                                        <div class="ticket-item">
                                            <div class="ticket-title">
                                                <h4 style="font-size: 16px;">
                                                    Opciones
                                                </h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                    <button class="btn btn-block shadow-box-ag boxBounce" style="background-color: #42E8B4;color: white">
                                                        Aprobar
                                                    </button>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                    <button class="btn btn-block shadow-box-ag boxBounce" style="background-color: #f1574f;color: white">
                                                        Rechazar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ticket-divider">
                                        </div>
                                        <div class="ticket-form">
                                            <div class="ticket-title">
                                                <h4 style="font-size: 16px;">
                                                    Enviar mensaje
                                                </h4>
                                            </div>
                                            <form>
                                                <div class="form-group">
                                                    <textarea class="summernote form-control" placeholder="">
                                                    </textarea>
                                                </div>
                                                <div class="form-group text-right ">
                                                    <button class="btn boxBounce shadow-box-ag "  style="border-radius: 5px; width: 80px;color: white;background-color: #43e8b4">
                                                        Enviar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <div aria-hidden="true" class="modal " id="archivo" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content animated bounceIn">
                    <div class="chocolat-content">
                        <img :src="'evidencia/'+dataArchivo.nombre_archivo" style="width: 100%;height: 100%;">
                        </img>
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
import Vue from 'vue'




export default {
      components: {
            'vue-pagination': VuePagination,
          

        },
    data(){
        return{
            
            
            
            
             tickets:{ 'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0},
             fechaActual:'',
             TicketInfo:'',
             Archivos:[],
             dataArchivo:'',
             validacion:'',
             modulo:'',
             nombre:'',
             curso:'',
             finalizada:''


        }
    },

    created:function(){
       this.GetSolicitudes();


    

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        
    },
    methods:{
        formato:function(d){
            return moment(d).format("DD/MM/YYYY");
        },
        GetSolicitudes:function(id){
             if (id == 2) {
                    var state = 2;
                    this.nombre = 'en curso';
                    this.modulo = 2;

                } else {
                    if (id == 3) {
                        var state = 3;
                        this.nombre = 'finalizados';
                        this.modulo = 3;
                    } else {
                      
                            var state = 1;
                            this.nombre = ' validación';
                            this.modulo = 1;
                        
                    }

                }  
          axios.get(`/ticketsTrabajos?page=${this.tickets.current_page}&estado=${state}`).then((response)=>{
                this.tickets = response.data;
                this.fechaActual = moment();
                  this.TicketInfo ='';
          })
          axios.get(`/ValidacionTotalTicketPlataforma`).then((response)=>{
            this.validacion = response.data;
          })
           axios.get(`/CursoTotalTicketPlataforma`).then((response)=>{
            this.curso = response.data;
          })
            axios.get(`/finalizadaTotalTicketPlataforma`).then((response)=>{
            this.finalizada = response.data;
          })
        },
        ShowTicketInfo:function(ticket){
            this.TicketInfo = ticket;
            axios.get('/ArchivosTicketanida/'+ticket.id).then((response)=>{
                this.Archivos = response.data;
            })
        },
        ShowImg:function(Archivo){
            this.dataArchivo = Archivo;
            document.getElementById('archivo').show;
        }
      
     
        
        
        
    }
}
</script>

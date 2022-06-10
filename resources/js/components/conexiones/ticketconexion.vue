<template>
    <div>
        <section class="section" v-if="tipo_ticket != ''">
            <div class="row">
                <div class="col-lg-12 col-md-4 col-sm-12">
                    <div class="row">
                        <div class="col-12 " v-if="role == 26 || role == 29">
                            <div class=" mb-0 ">
                                <div class="card-body">
                                    <ul class="nav nav-pills">
                                        <div class="col-lg-3" v-if="role == 26 || role == 29">
                                            <li class="nav-item">
                                                <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color: #005cff;">
                                                    <div class="card-icon " style="float: left; background-color:#005cff;color:white;border-radius: 2px;">
                                                        <i class=" fas fa-list" style=" color:white;font-size: 25px;">
                                                        </i>
                                                    </div>
                                                    TICKETS CREADOS
                                                    <span class="badge badge-white barlow semi_bold" style="float: right; font-size: 22px;border-radius: 4px;">
                                                        <div class="spinner-border text-primary" role="status" style="width: 1.5rem;height: 1.5rem;color: #007bff!important;" v-if="load == 0">
                                                       </div>
                                                        <div v-if="load == 1">
                                                             {{totales.total_creada}}
                                                        </div>
                                                    </span>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="col-lg-3" v-if="role == 26">
                                            <li class="nav-item">
                                                <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color: #FD6C98;">
                                                    <div class="card-icon " style="float: left; background-color:#FD6C98;color:white;border-radius: 2px;">
                                                        <i class=" fas fa-list" style=" color:white;font-size: 25px;">
                                                        </i>
                                                    </div>
                                                    CREACIÓN EWORK
                                                    <span class="badge badge-white barlow semi_bold" style="float: right; font-size: 22px;border-radius: 4px;">
                                                          <div class="spinner-border text-primary" role="status" style="width: 1.5rem;height: 1.5rem;color: #007bff!important;" v-if="load == 0">
                                                       </div>
                                                       <div v-if="load == 1">
                                                        {{totales.total_ework}}
                                                    </div>
                                                    </span>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="col-lg-3" v-if="role == 26">
                                            <li class="nav-item">
                                                <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color: #42E8B4;">
                                                    <div class="card-icon " style="float: left; background-color:#42E8B4;color:white;border-radius: 2px;">
                                                        <i class=" fas fa-list" style=" color:white;font-size: 25px;">
                                                        </i>
                                                    </div>
                                                    ESPERA DE  PAGO
                                                    <span class="badge badge-white barlow semi_bold" style="float: right; font-size: 22px;border-radius: 4px;">
                                                          <div class="spinner-border text-primary" role="status" style="width: 1.5rem;height: 1.5rem;color: #007bff!important;" v-if="load == 0">
                                                       </div>
                                                         <div v-if="load == 1">
                                                        {{totales.total_espera_pago}}
                                                    </div>
                                                    </span>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 " v-if="role == 1">
                            <div class=" mb-0 ">
                                <div class="card-body">
                                    <ul class="nav nav-pills">
                                        <div class="col-lg-3">
                                            <li class="nav-item">
                                                <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color: #42E8B4;">
                                                    <div class="card-icon " style="float: left; background-color:#42E8B4;color:white;border-radius: 2px;">
                                                        <i class=" fas fa-list" style=" color:white;font-size: 25px;">
                                                        </i>
                                                    </div>
                                                    TICKETS TOTALES
                                                    <span class="badge badge-white barlow semi_bold" style="float: right; font-size: 22px;border-radius: 4px;">
                                                        {{solicitudes.data.length}}
                                                    </span>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 " v-if="role == 10">
                            <div class=" mb-0 ">
                                <div class="card-body">
                                    <ul class="nav nav-pills">
                                        <div class="col-lg-3">
                                            <li class="nav-item">
                                                <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color: #42E8B4;">
                                                    <div class="card-icon " style="float: left; background-color:#42E8B4;color:white;border-radius: 2px;">
                                                        <i class=" fas fa-list" style=" color:white;font-size: 25px;">
                                                        </i>
                                                    </div>
                                                    FACTIBILIDAD
                                                    <span class="badge badge-white barlow semi_bold" style="float: right; font-size: 22px;border-radius: 4px;">
                                                        {{total_validador_ing.total_validacion}}
                                                    </span>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="col-lg-3">
                                            <li class="nav-item">
                                                <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color: #005cff;">
                                                    <div class="card-icon " style="float: left; background-color:#005cff;color:white;border-radius: 2px;">
                                                        <i class=" fas fa-list" style=" color:white;font-size: 25px;">
                                                        </i>
                                                    </div>
                                                    EJECUCIÓN
                                                    <span class="badge badge-white barlow semi_bold" style="float: right; font-size: 22px;border-radius: 4px;">
                                                        {{total_validador_ing.total_ejecucion}}
                                                    </span>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="col-lg-3">
                                            <li class="nav-item">
                                                <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color:#2FCBF1;">
                                                    <div class="card-icon " style="float: left; background-color:#2FCBF1;color:white;border-radius: 2px;">
                                                        <i class=" fas fa-list" style=" color:white;font-size: 25px;">
                                                        </i>
                                                    </div>
                                                    GESTIÓN DE  PAGO
                                                    <span class="badge badge-white barlow semi_bold" style="float: right; font-size: 22px;border-radius: 4px;">
                                                        {{total_validador_ing.total_gestion}}
                                                    </span>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="col-lg-3">
                                            <li class="nav-item">
                                                <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color: #CCCCCC;">
                                                    <div class="card-icon " style="float: left; background-color:#CCCCCC;color:white;border-radius: 2px;">
                                                        <i class=" fas fa-list" style=" color:white;font-size: 25px;">
                                                        </i>
                                                    </div>
                                                    ESPERA DE  PAGO
                                                    <span class="badge badge-white barlow semi_bold" style="float: right; font-size: 22px;border-radius: 4px;">
                                                        {{total_validador_ing.total_espera_pago}}
                                                    </span>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12" v-if="role == 14">
                    <a href="" style="color: #2FCBF1" v-on:click.prevent="getSolicitudesPmo(14)">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce" v-bind:style=" modulo==14 ? 'background-color: #005cff; border: 2px solid white;' : '' ">
                            <div class="card-icon azul shadow-box-ag" v-bind:style=" modulo==14  ? 'background-color: white; ' : '' ">
                                <i class="fas fa-check" v-bind:style=" modulo==14  ? 'color: #6c757d; ' : '' ">
                                </i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4 v-bind:style=" modulo==14? 'color: white; ' : '' ">
                                        TICKETS ACTIVOS
                                    </h4>
                                </div>
                                <div class="card-body" style="font-size: 35px;" v-bind:style=" modulo==14? 'color: white; ' : '' ">
                                    {{TotalActiva}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12" v-if="role == 14">
                    <a href="" style="color: #2FCBF1" v-on:click.prevent="getSolicitudesPmo(15)">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce" v-bind:style=" modulo==15 ? 'background-color: #005cff; border: 2px solid white;' : '' ">
                            <div class="card-icon azul shadow-box-ag" v-bind:style=" modulo==15  ? 'background-color: white; ' : '' ">
                                <i class="fab fa-font-awesome-alt" style="font-size: 35px;color: white" v-bind:style=" modulo==15  ? 'color: #6c757d; ' : '' ">
                                </i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4 v-bind:style=" modulo==15? 'color: white; ' : '' ">
                                        TICKETS FINALIZADOS
                                    </h4>
                                </div>
                                <div class="card-body" style="font-size: 35px;" v-bind:style=" modulo==15? 'color: white; ' : '' ">
                                    {{TotalInactiva}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <div class="col-12 col-md-6 col-lg-12" v-if="tipo_ticket != ''">
            <div class="card shadow-box-ag">
                <div class="card-header">
                    <div class="col-lg-11 barlow semi_bold">
                        <h4 style="color: #666" v-text="tipo_ticket == 1 ? 'Tickets conexiones':(tipo_ticket == 2 ? 'Tickets grandes proyectos':'')">
                          
                        </h4>
                    </div>
                    <div class="col-lg- 1">
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive project-list project-table">
                        <table class="table table-hover table-striped ">
                            <thead>
                                <tr class="barlow semi_bold">
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Nombre del proyecto
                                    </th>
                                    <th>
                                        Sitio/Sala
                                    </th>
                                    <th>
                                        Solicitante
                                    </th>
                                    <th>
                                        TP
                                    </th>
                                    <th>
                                        Sla
                                    </th>
                                    <th>
                                        Estado
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-if="load == 1">
                                <th>
                                    <input class="form-control" name="codigo" placeholder="" style="width:80px; " type="" v-if="role != 14" v-model="codigo" v-on:keyup="GetSolicitudes()">
                                    </input>
                                    <input class="form-control" name="codigo" placeholder="" style="width:80px; " type="" v-if="role == 14" v-model="codigo" v-on:keyup="getSolicitudesPmo()">
                                    </input>
                                </th>
                                <th></th>
                                <th>
                                    <input class="form-control" name="PopSala" placeholder="" style="width:80px; " type="" v-if="role != 14" v-model="PopSala" v-on:keyup="GetSolicitudes()">
                                    </input>
                                    <input class="form-control" name="PopSala" placeholder="" style="width:80px; " type="" v-if="role == 14" v-model="PopSala" v-on:keyup="getSolicitudesPmo()">
                                    </input>
                                </th>
                                <th>
                                    <input class="form-control" name="Solicitante" placeholder="" style="width:80px; " type="" v-if="role != 14 && role == 10" v-model="solicitante" v-on:keyup="GetSolicitudes()">
                                    </input>
                                    <input class="form-control" name="Solicitante" placeholder="" style="width:80px; " type="" v-if="role == 14" v-model="solicitante" v-on:keyup="getSolicitudesPmo()">
                                    </input>
                                </th>
                                <th>
                                    <input class="form-control" name="tp" placeholder="" style="width:80px; " type="" v-if="role != 14" v-model="tp" v-on:keyup="GetSolicitudes()">
                                    </input>
                                    <input class="form-control" name="tp" placeholder="" style="width:80px; " type="" v-if="role == 14" v-model="tp" v-on:keyup="getSolicitudesPmo()">
                                    </input>
                                </th>
                                <th>
                                </th>
                                <th>
                                    <div id="select_state">
                                        <select @change.prevent="search_for_state()" class="form-control select" style="width: 170px;" v-model="estado_id">
                                            <option v-bind:value="[estado.id,estado.descripcion]" v-for="estado in estados">
                                                {{estado.descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                    <div id="sate_name" style="display:none">
                                        <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                            {{state_name}}
                                            <a @click.prevent="clear_state" href="" style="color:white ">
                                                <i class="fas fa-times-circle">
                                                </i>
                                            </a>
                                        </span>
                                    </div>
                                </th>
                                <tr style="height: 100px; " v-for="solicitud in solicitudes.data">
                                    <td>
                                        <a :href="'/Slc/'+solicitud.id" target="blank__">
                                            <span class="badge verde blanco boxBounce" style="border-radius: 5px;">
                                                {{solicitud.id}}
                                            </span>
                                        </a>
                                    </td>
                                    <td>
                                        {{solicitud.nombre_proyecto}}
                                    </td>
                                    <td>
                                        <div style="margin-top: 10px;">
                                            <span class="badge verde blanco" style="border-radius: 5px;">
                                                {{solicitud.pop? solicitud.pop.nombre+'-'+ solicitud.pop.direccion :(solicitud.site?solicitud.site.nem_site +'-'+ solicitud.site.nombre:'')}}
                                            </span>
                                        </div>
                                        <div style="margin-top: 5px;">
                                            {{solicitud.room.name}} {{solicitud.room.old_name}}
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            {{solicitud.user.name}} {{solicitud.user.apellido}}
                                        </div>
                                        <div>
                                            {{formato(solicitud.created_at)}}
                                        </div>
                                    </td>
                                    <td>
                                        {{solicitud.tp}}
                                    </td>
                                    <td>
                                        <div v-if="solicitud.subproceso_id == 4">
                                            <div v-if="fechaActual.diff(solicitud.fecha_estado_ework,'days') ==1">
                                                <span class="badge badge-success">
                                                    {{fechaActual.diff(solicitud.fecha_estado_ework,'days')}} Día(s) en {{solicitud.subproceso.descripcion}}
                                                </span>
                                            </div>
                                            <div v-if="fechaActual.diff(solicitud.fecha_estado_ework,'days') ==2">
                                                <span class="badge badge-warning">
                                                    {{fechaActual.diff(solicitud.fecha_estado_ework,'days')}} Día(s) en {{solicitud.subproceso.descripcion}}
                                                </span>
                                            </div>
                                            <div v-if="fechaActual.diff(solicitud.fecha_estado_ework,'days') ==3">
                                                <span class="badge badge-danger">
                                                    {{fechaActual.diff(solicitud.fecha_estado_ework,'days')}} Día(s) en {{solicitud.subproceso.descripcion}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div :style="'background-color:'+solicitud.subproceso.color+';'+'color:white;'+'border-radius:5px;'" class="badge badge-success">
                                            {{solicitud.subproceso.descripcion}}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-12 col-md-12 col-sm-12" v-if="load == 0">
                                    <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                        <div class="card-body">
                                            <div class="empty-state" data-height="400">
                                                <div class="d-flex justify-content-center" v-if="load == 0">
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
                        <nav aria-label="pagination" class="pagination" role="navigation">
                            <vue-pagination :offset="4" :pagination="solicitudes" @paginate="GetSolicitudes()">
                            </vue-pagination>
                        </nav>
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
 
    import VuePagination from '../VuePagination.vue';
 

    export default {
        props:['role'],
        components: {

           
            'vue-pagination': VuePagination,
        

        },
        data() {
            return {

               

                solicitudes: {
                    'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0
                },
                rolId:'',
                totalGestion:'',
                totalValidacion:'',
                totalCreada:'',
                totalEwork:'',
                totalTp:'',
                modulo:'',
                nombre:'',
                nombreTab:'',
                codigo:'',
                PopSala:'',
                sistema:'',
                bastidor:'',
                tp:'',
                solicitante:'',
                estado:'',
                totalEsperaPago:'',
                fechaActual:'',
                TotalActiva:'',
                TotalInactiva:'',
                totales:'',
                total_validador_ing:'',
                estado_id:'',
                estados:[],
                state_name:'',
                tipo_ticket:'',
                load:0

            }
        }, 

        mounted: function() { /* Agrega mounted y con el siguiente contenido */
            let self = this;
            EventBus.$on('indexing.GetSolicitudes', function() {
                self.GetSolicitudes(); // ejecutas el metodo que desees
            });

            EventBus.$on('ing.getableticket', function(option) {
                self.getTableTicket(option); // ejecutas el metodo que desees
            });


        },

        created: function() {
           
               

        },

        methods: {

            getTableTicket:function(option){
               this.tipo_ticket = option;
               if(this.role == 26  || this.role == 29  || this.role ==10 || this.role == 1){
                
                 this.GetSolicitudes();

                }else{
                  if(this.role == 14){
                  this.modulo=14;
                  this.getSolicitudesPmo(this.modulo)
                  this.gettotalesPmo()
                }
              }
              this.get_estados();
              this.fechaActual = moment();
         
            },
            formato: function(d) {
                return moment(d).format("DD/MM/YYYY");
            },
            GetSolicitudes: function(id) {

               this.load = 0
               



                

                axios.get(`/GetSolicitudesIng?page=${this.solicitudes.current_page}&id=${this.codigo}&PopSalaSite=${this.PopSala}&user=${this.solicitante}&sistema=${this.sistema}&bastidor=${this.bastidor}&tp=${this.tp}&estado=${this.estado}&tipo_ticket=${this.tipo_ticket}`).then((response) => {

                    if(this.codigo != '' || this.PopSala != '' || this.solicitante != '' || this.sistema != '' || this.bastidor !='' || this.tp !='' || this.estado !=''){
                       
                    }
                    this.solicitudes = response.data;    
                        
                  
                 if(this.role == 29 || this.role ==26){
                    axios.get(`/get_totales_cliente_ing?id=${this.codigo}&PopSala=${this.PopSala}&user=${this.solicitante}&sistema=${this.sistema}&bastidor=${this.bastidor}&tp=${this.tp}&estado=${this.estado}&tipo_ticket=${this.tipo_ticket}`).then((response)=>{
                       this.totales = response.data;
                   }).finally(()=>this.load =1 )
                 }
              

                if(this.role == 10){
                    axios.get(`/GetTotalValidacionIng?id=${this.codigo}&PopSala=${this.PopSala}&user=${this.solicitante}&sistema=${this.sistema}&bastidor=${this.bastidor}&tp=${this.tp}&estado=${this.estado}&tipo_ticket=${this.tipo_ticket}`).then((response)=>{
                        this.total_validador_ing = response.data;
                   }).finally(()=>this.load =1 )
                  
            
                 
                }
              

                
               
              
                   
                }).finally(()=>this.load =1)
            },
            get_estados:function(){
              axios.get('/get_estados').then(response=>{
                 this.estados = response.data;
              })
            },
           

            getSolicitudesPmo:function(modulo) {
            
               let state = 0
               if (modulo == 14) {

                   state = 14;
                   this.nombre = 'TICKETS ACTIVOS';
                   this.modulo = 14;
                   axios.get(`/GetSolicitudesIng?page=${this.solicitudes.current_page}&state=${this.modulo}&id=${this.codigo}&PopSala=${this.PopSala}&user=${this.solicitante}&sistema=${this.sistema}&bastidor=${this.bastidor}&tp=${this.tp}&estado=${this.estado}&tipo_ticket=${this.tipo_ticket}`).then((response) => {
                       this.solicitudes = response.data
                      
                   }).finally(()=>this.load =1 )
               } else {
                   if (modulo == 15) {
                       
                       state = 15;
                       this.nombre = 'TICKETS FINAILZADOS';
                       this.modulo = 15;
                       axios.get(`/GetSolicitudesIng?page=${this.solicitudes.current_page}&state=${this.modulo}&id=${this.codigo}&PopSala=${this.PopSala}&user=${this.solicitante}&sistema=${this.sistema}&bastidor=${this.bastidor}&tp=${this.tp}&estado=${this.estado}&tipo_ticket=${this.tipo_ticket}`).then((response) => {
                           this.solicitudes = response.data
                          
                       }).finally(()=>this.load =1 )
                   }
               }
            },
            gettotalesPmo:function(){
              axios.get(`/GetTotalActiva?id=${this.codigo}&PopSala=${this.PopSala}&user=${this.solicitante}&sistema=${this.sistema}&bastidor=${this.bastidor}&tp=${this.tp}&estado=${this.estado}&tipo_ticket=${this.tipoticket}`).then((response=>{
                this.TotalActiva = response.data
              }))
              axios.get(`/GetTotalFinalizada?id=${this.codigo}&PopSala=${this.PopSala}&user=${this.solicitante}&sistema=${this.sistema}&bastidor=${this.bastidor}&tp=${this.tp}&estado=${this.estado}&tipo_ticket=${this.tipo_ticket}`).then((response=>{
                this.TotalInactiva = response.data
              }))
            },
            search_for_state:function(){
               this.estado = this.estado_id[0];
               this.set_state_info(this.estado_id[1]);
               this.GetSolicitudes();
            },
            set_state_info:function(name){
                  this.state_name = name;
                  document.getElementById("sate_name").style.display='block';
                  document.getElementById("select_state").style.display='none';
                  
            },
            clear_state:function(){
                  this.estado = '';
                  this.estado_id='';
                  this.GetSolicitudes();
                  this.state_name = '';
                  document.getElementById("sate_name").style.display='none';
                  document.getElementById("select_state").style.display='block';
                  
            }

                
            

        }
    }
</script>


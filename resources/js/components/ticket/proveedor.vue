<template>
    <div>
        <div class="main-content">
            <div class="wrapper wrapper-content">
                <section class="section">
                    <div class="section-header shadow-box-ag">
                        <div class="card-stats-title">
                            <h1 class="barlow bold">
                                Trabajos proveedores
                            </h1>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-lg-12 col-md-4 col-sm-12">
                        <div class="row">
                            <div class="col-12 ">
                                <div class=" mb-0 ">
                                    <div class="card-body">
                                        <ul class="nav nav-pills">
                                            <div class="col-lg-3">
                                                <li class="nav-item">
                                                    <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color: #005cff;">
                                                        <div class="card-icon " style="float: left; background-color:#005cff;color:white;border-radius: 2px;">
                                                            <i class=" fas fa-check" style=" color:white;font-size: 25px;">
                                                            </i>
                                                        </div>
                                                        Trabajos por aprobar
                                                        <span class="badge badge-white barlow regular" style="float: right; font-size: 20px;border-radius: 4px;">
                                                            {{total_pendiente}}
                                                        </span>
                                                    </a>
                                                </li>
                                            </div>
                                            <div class="col-lg-3">
                                                <li class="nav-item">
                                                    <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color: #42E8B4;">
                                                        <div class="card-icon " style="float: left; background-color:#42E8B4;color:white;border-radius: 2px;">
                                                            <i class=" fas fa-edit" style=" color:white;font-size: 25px;">
                                                            </i>
                                                        </div>
                                                         Trabajos por crear
                                                        <span class="badge badge-white barlow regular" style="float: right; font-size: 20px;border-radius: 4px;">
                                                            {{total_creados}}
                                                        </span>
                                                    </a>
                                                </li>
                                            </div>
                                            <div class="col-lg-3">
                                                <li class="nav-item">
                                                    <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color: #2FCBF1;">
                                                        <div class="card-icon " style="float: left; background-color:rgb(47, 203, 241);color:white;border-radius: 2px;">
                                                            <i class=" fas fa-list" style=" color:white;font-size: 25px;">
                                                            </i>
                                                        </div>
                                                         Trabajos creados
                                                        <span class="badge badge-white barlow regular" style="float: right; font-size: 20px;border-radius: 4px;">
                                                            {{total_creados}}
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
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="barlow semi_bold" style="color: #191919">
                                    Pre-SGC
                                </h4>
                                <div class="card-header-form" v-if="module == 1">
                                    <button @click="set_trabajos_selects()" class="btn btn-primary">
                                        <i class="fas fa-plus">
                                        </i>
                                        Declarar trabajo
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive project-list project-table">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="barlow semi_bold">
                                                <th>
                                                    Pre-codigo
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
                                                    N°cotización
                                                </th>
                                                <th>
                                                    Descripción
                                                </th>
                                                <th>
                                                    Estado
                                                </th>
                                                <th>
                                                    Opciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="height: 130px; " v-for="job in jobs.data">
                                                <td>
                                                    <span class="badge verde barlow semi_bold" style="border-radius: 5px;color: white">
                                                        {{job.id}}
                                                    </span>
                                                    <div style="margin-top:10px;">
                                                    </div>
                                                    <div class=" barlow semi_bold" style="margin-top: 10px;" v-if="job.site_id != null">
                                                        <div style="font-size: 10px;">
                                                            <span class="badge " style="background-color: rgb(0, 92, 255);color: white;border-radius: 5px">
                                                                {{job.site?job.site.nem_site:''}} - {{job.site?job.site.nombre:'' }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <span :style="'background-color:'+job.type_job.color +';'+ 'border-radius:5px;'+'margin-top:10px;'" class="badge blanco barlow semi_bold" v-if="job.type_job">
                                                        {{job.type_job ?job.type_job.descripcion:''}}  {{job.visita_fuera_horario == 1 ? '- fuera del horario':(job.visita_fuera_horario == 2 ? '- dentro del horario' :'')}}
                                                    </span>
                                                </td>
                                                <td>
                                                    <strong class="barlow semi_bold">
                                                        {{job.user.name}}  {{job.user.apellido}}
                                                    </strong>
                                                    <div style="margin-top: 7px;">
                                                        <span class="badge blue blanco" style="border-radius: 5px;">
                                                            {{date_format(job.created_at)}}
                                                        </span>
                                                    </div>
                                                    <div class="barlow regular" style="margin-top: 3px;">
                                                        {{job.contact_type_job.descripcion}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="barlow semi_bold" style="font-size: 13.5px;">
                                                        {{job.proveedor.PROVEEDOR}}
                                                    </div>
                                                    <div class="" style="margin-top: 5px;">
                                                        <span class="badge blue blanco" style="border-radius: 5px" v-if="job.trabajo_realizado == 1">
                                                            Trabajo ejecutado  {{job.trabajo_realizado == 1 ?  job.fecha_ejecucion_trabajo:''}}
                                                        </span>
                                                        <span class="badge blanco" style="background-color: #6c757d;border-radius: 5px" v-if="job.trabajo_realizado == 2">
                                                            Trabajo no ejecutado
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div v-if="job.activo != null ">
                                                        <div>
                                                            <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                ACTIVOS
                                                            </strong>
                                                        </div>
                                                        <div class="barlow regular">
                                                            ${{formatPrice(job.activo)}}
                                                        </div>
                                                    </div>
                                                    <div v-if="job.servicio != null ">
                                                        <div>
                                                            <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                SERVICIOS
                                                            </strong>
                                                            <div class="barlow regular">
                                                                ${{formatPrice(job.servicio)}}
                                                            </div>
                                                        </div>
                                                        <div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        {{job.numero_cotizacion}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="barlow regular">
                                                        {{job.descripcion}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span :style="'background-color:'+job.providers_pre_tickets_state.color+';'+'color:white;'+'border-radius:5px;'" class="badge barlow regular">
                                                            {{job.providers_pre_tickets_state.descripcion}}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div v-if="job.providers_pre_tickets_state_id == 1">
                                                        <div>
                                                            <button @click.prevent="aprove_job(job)" class="btn btn-success">
                                                                <i class="fa fa-check">
                                                                </i>
                                                            </button>
                                                        </div>
                                                        <div @click.prevent="reject_job(job)" style="margin-top: 20px;">
                                                            <button class="btn btn-danger">
                                                                <i class="fas fa-window-close">
                                                                </i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div v-if="job.providers_pre_tickets_state_id == 2">
                                                        <input :id="job.id" :value="[job]" class="form-control" name="" style="width: 20px;height: 20px;" type="checkbox" v-model="select_jobs">
                                                        </input>
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
            <form-prov :rol="12">
            </form-prov>
            <modal-rechazo-trabajo>
            </modal-rechazo-trabajo>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    import EventBus from "./event-bus";
    import VuePagination from '../VuePagination.vue';
    import Formulario from './modals/formprovider.vue';
    import ModalRechazoTrabajo from './modals/modalrechazotrabajo.vue';

    export default{
        props:['request'],
        components: {
        
            'vue-pagination': VuePagination,
            'form-prov':Formulario,
            'modal-rechazo-trabajo':ModalRechazoTrabajo
            
         
           

        },
         data() {
            return {
                
                total_pendiente:0,
                module:1,
                jobs:{
                    'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0
                },
                total_creados:0,
                select_jobs:[]
            }
              
        },
        created: function() {
          this.get_jobs()

          
         
        },
        mounted:function(){
           let self = this;
           EventBus.$on('job.created.ticket', function() {
                self.get_jobs(); // ejecutas el metodo que desees
           });
        },


        methods: {
            get_jobs:function(){
               axios.get(`/get_job_created?page=${this.jobs.current_page}`).then(response=>{
                   this.jobs = response.data.jobs; 
                   this.total_pendiente = this.jobs.data.filter(job => job.providers_pre_tickets_state_id == 1).length;
                   this.total_creados   = this.jobs.data.filter(job => job.providers_pre_tickets_state_id == 2).length;
                   
                   this.loadFunction();
               })
            },

            set_trabajos_selects:function(){
               if(this.select_jobs.length == 0){
                   this.$swal({
                      type: 'error',
                      title: 'Error',
                      text:'Debe seleccionar al menos un trabajo.',
                      showCloseButton: true,
                    });
               }else{
                 EventBus.$emit('set.data.job.select',this.select_jobs);
               }
             
               
              
            },

            aprove_job:function(job){

                axios.get(`/provider_update_ticket?pre_ticket_id=${job.id}`).then(response=>{
                  this.loadFunction();
                  this.get_jobs();
                })

            },
            reject_job:function(job){
                EventBus.$emit('modal.rechazo.trabajo',job.id);
            },
            
            

            date_format:function(d){
              return moment(d).format("DD/MM/YYYY");
            },
          

            loadFunction: function() {
              let loader = this.$loading.show({
          
                 container: this.fullPage ? null : this.$refs.formContainer,
                 canCancel: true,
                 onCancel: this.onCancel,
               });
     
               setTimeout(() => {
                 loader.hide()
               }, 300)
            },
            formatPrice(value) {
               if (value % 1 == 0) {
                  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                } else {
                    let val = (value/1).toFixed(2).replace('.', ',')
                      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
               }    
      
            },
 
        }
    }
</script>
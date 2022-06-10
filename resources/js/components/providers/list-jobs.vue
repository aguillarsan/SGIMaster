<template>
    <div>
        <table class="table table-striped">
            <thead>
                <tr class="barlow semi_bold">
                    <th>
                        #
                    </th>
                    <th>
                        Solicitante
                    </th>
                    <th>
                        Trabajo ejecutado
                    </th>
                    <th>
                        N°cotización
                    </th>
                    <th>
                        Costos
                    </th>
                    <th>
                        Descripción
                    </th>
                    <th>
                        Estado
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
                        <div class="col-md-12 col-sm-3 col-12">
                            <span class="badge verde blanco" style="border-radius: 5px" v-if="job.trabajo_realizado == 1">
                                Si
                            </span>
                            <span class="badge blanco" style="background-color: #6c757d;border-radius: 5px" v-if="job.trabajo_realizado == 2">
                                No
                            </span>
                        </div>
                        <div class="col-md-12 col-sm-3 col-12 barlow semi_bold" style="margin-top: -8px;">
                            {{job.trabajo_realizado == 1 ?  job.fecha_ejecucion_trabajo:''}}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{job.numero_cotizacion}}
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
                </tr>
            </tbody>
        </table>
        <nav aria-label="pagination" class="pagination" role="navigation">
            <vue-pagination :offset="4" :pagination="jobs" @paginate="get_jobs()">
            </vue-pagination>
        </nav>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    import EventBus from "../event-bus";
    import VuePagination from '../VuePagination.vue';

    export default{
        props:['request'],
        components: {
        
            'vue-pagination': VuePagination,
            
         
           

        },
         data() {
            return {
                
              
                
                jobs:{
                    'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0
                }
            }
              
        },
        created: function() {
          this.get_jobs()

          
         
        },
        mounted:function(){
           let self = this;
           EventBus.$on('job.created', function() {
                self.get_jobs(); // ejecutas el metodo que desees
           });
        },


        methods: {
            get_jobs:function(){
               axios.get(`/get_job_created?page=${this.jobs.current_page}`).then(response=>{
                   this.jobs = response.data.jobs; 
                  
                   this.loadFunction();
               })
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
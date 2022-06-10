<template>
    <div class="animated fadeIn">
        <div class="table-responsive project-list project-table" >
            <table class="table table-hover table-striped ">
                <thead>
                    <tr>
                        <th class="">
                            #
                        </th>
                        <th class="">
                            Sitio
                        </th>
                        <th class="">
                            Creador
                        </th>
                        <th>
                            Proveedor
                        </th>
                        <th class="">
                            Costos
                        </th>
                        <th class="">
                            Boleta
                        </th>
                        <th class="">
                            Ework
                        </th>
                        <th class="">
                            Cotización
                        </th>
                        <th class="">
                            Estado
                        </th>
                    </tr>
                </thead>

                <tbody>
                 
                    <tr style="height: 150px;" v-for="solicitud in solicitudes.data">
                        <td>
                            <a :href="'http://172.16.100.113/sho2/'+solicitud.id" target="blank__">
                                <span class="badge boxBounce" style="background-color: #0072ff;color:white">
                                    {{solicitud.id}}
                                </span>
                            </a>
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
                                    <span class="badge" style="background-color: #42e8b4;color: white;font-size: 10px">
                                        FIJO
                                    </span>
                                </div>
                                <div v-if="solicitud.site.site_type_id==2">
                                    <span class="badge" style="background-color: #005cff;color: white; font-size:10px ">
                                        MOVIL
                                    </span>
                                </div>
                                <div v-if="solicitud.site.site_type_id==3">
                                    <span class="badge" style="background-color: #005cff;color: white; font-size:10px; ">
                                        SWITCH
                                    </span>
                                </div>
                                <div v-if="solicitud.site.site_type_id==4">
                                    <span class="badge" style="background-color: #005cff;color: white; font-size: 10px">
                                        PHONE
                                    </span>
                                </div>
                            </div>
                            <div style="margin-top: 5px;" v-if="solicitud.tipo_trabajo_id != null">
                                <span class="badge box-shadow-ag" style="background-color: #42e8b4;color: white">
                                    {{solicitud.tipo_trabajo.nombre_trabajo}}
                                </span>
                            </div>
                        </td>
                        <td>
                            <div>
                                <strong>
                                    {{solicitud.user.name}}  {{solicitud.user.apellido}}
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
                                <span class="badge" style="background-color:#0072ff;color: white;font-size: 10px;">
                                    {{solicitud.proveedor.PROVEEDOR}}
                                </span>
                            </div>
                        </td>
                        <td>
                            <div v-if="solicitud.costos_activos != 0">
                                <div>
                                    <strong style="font-size: 12px;">
                                        ACTIVOS
                                    </strong>
                                </div>
                                <div>
                                    {{solicitud.tipo_moneda.moneda}} {{solicitud.costos_activos | currency}}
                                </div>
                            </div>
                            <div v-if="solicitud.costos_servicios != 0">
                                <div>
                                    <strong style="font-size: 12px;">
                                        SERVICIOS
                                    </strong>
                                    <div>
                                        {{solicitud.tipo_moneda.moneda}} {{solicitud.costos_servicios | currency}}
                                    </div>
                                </div>
                                <div>
                                </div>
                            </div>
                        </td>
                        <td >
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
                                <span :style="'background-color:'+solicitud.proceso.color+';'+'color:white;'" class="badge">
                                    {{solicitud.proceso.descripcion}}
                                </span>
                            </div>
                            <div style="margin-top:5px;">
                                <span :style="'background-color:'+solicitud.subestado.color+';'+'color:white;'" class="badge">
                                    {{solicitud.subestado.subestado}}
                                </span>
                            </div>
                        </td>
                    </tr>
                </tbody>

            </table>
             <div class="col-12 col-md-12 col-sm-12" v-if="vacio == 1">
                        <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                            <div class="card-body" >
                                <div class="empty-state" data-height="400">
                                    <div class="empty-state-icon" style="background-image: linear-gradient(rgb(0, 92, 255), rgba(0, 123, 255, 0.6))">
                                        <i class="fas fa-question" >
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
    props: [ 'idticket' ],
    data(){
        return{
           solicitudes:{
            'total': 0,
            'current_page': 1,
            'per_page': 10,

            'from': 2,
            'to': 0
           },
           vacio:''
           
        }
    },
      mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
         EventBus.$on('sgcSlc.load', function() {
            self.getSlcSgc(); // ejecutas el metodo que desees 
        });
     
    },

    created:function(){

      this.getSlcSgc();

        

    },
  
    methods:{
        formato:function(d){
            return moment(d).format("DD/MM/YY");
        },
        
        getSlcSgc:function(){
          axios.get(`/slcTicket?page=${this.solicitudes.current_page}&ticket=${this.idticket}`).then((response)=>{
            this.solicitudes = response.data;

            if(this.solicitudes.data.length == 0){
               this.vacio = 1;
            }else{
                this.vacio = '';
            }
          })
        },
        
    
    }
}
</script>

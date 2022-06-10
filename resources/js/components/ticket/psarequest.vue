<template>
    <div>
        <div class="row" id="tab_psa_request" ref="tab_psa">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card card-hero box-shadow-new-card border-r-8">
                    <div class="card-header car_header_ticket_detail border-r-top" >
                        <div class="card-icon">
                            <i class="fas fa-truck-loading green_secondary_color" style="margin-left: -160px;margin-top: 22px;">
                            </i>
                        </div>
                        <h4 class="barlow bold">
                            Solicitudes PSA
                        </h4>
                        <div class="card-description barlow semi_bold">
                            Listado de solicitudes
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="animated fadeIn">
                            <div class="d-flex justify-content-center"   v-if="loading == 1">
                                <div class="spinner-border text-primary" role="status" style="width: 6rem;height: 6rem;color: #007bff!important;">
                                    <span class="sr-only" style="color: #191919">
                                        Cargando...
                                    </span>
                                </div>
                            </div>
                            <div class="table-responsive project-list project-table" v-if="loading == 2">
                                <table class="table table-hover table-striped ">
                                    <thead>
                                        <tr class=" barlow bold">
                                            <th class="">
                                                #
                                            </th>
                                            <th>
                                                Solicitante
                                            </th>
                                            <th style="width: 100px;">
                                                Sitio/Crm/Categoría
                                            </th>
                                            <th>
                                                Motivo
                                            </th>
                                             <th>
                                                Flujo simple
                                            </th>
                                            <th>
                                                Total activo
                                            </th>
                                            <th>
                                                Descripción
                                            </th>
                                            <th style="text-align: center">
                                                Estado
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <tr style="height: 150px;" v-for="solicitud in solcitud_psa">
                                                <td>
                                                    <a :href="'/DetalleSolicitudPsa/'+(solicitud.id)" target="blank__">
                                                        <span class="badge shadow-box-ag boxBounce barlow regular" style="background: -webkit-linear-gradient(left,#fea858 ,#ed765e);color: white;border-radius:5px;font-size:15px;">
                                                            {{solicitud.id}}
                                                        </span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div>
                                                        <strong class="barlow semi_bold">
                                                            {{solicitud.user?solicitud.user.name:''}} {{solicitud.user?solicitud.user.apellido:''}}
                                                        </strong>
                                                    </div>
                                                    <div style="margin-top: 7px;">
                                                        <span class="badge blue blanco" style="border-radius: 5px;">
                                                            {{formato(solicitud.created_at)}}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class=" barlow semi_bold" style="margin-top: 5px;">
                                                        <div style="font-size: 10px;">
                                                            <span class="badge " style="background-color: rgb(0, 92, 255);color: white;border-radius: 5px">
                                                                {{solicitud.site ?solicitud.site.nem_site:''}} - {{solicitud.site ?solicitud.site.nombre:''}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class=" barlow semi_bold" style="margin-top: 10px;" v-if="solicitud.crm">
                                                        <div style="font-size: 10px;">
                                                            <span class="badge verde blanco" style="border-radius: 5px;">
                                                                {{solicitud.crm ? solicitud.crm.nombre_crm:''}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="barlow semi_bold" style="margin-top: 10px;" v-if="solicitud.site_id != null">
                                                        <span class="badge " style="background-color:#42e8b4;color: white;border-radius:3px; " v-if="solicitud.site.classification_type_id == 1 ">
                                                            A
                                                        </span>
                                                        <span class="badge " style="background-color:#005cff;color: white;border-radius:3px; " v-if="solicitud.site.classification_type_id == 2 ">
                                                            B
                                                        </span>
                                                        <span class="badge badge-warning" style="border-radius:3px;" v-if="solicitud.site.classification_type_id == 3">
                                                            C
                                                        </span>
                                                        <span class="badge " style="background-color:#6c757d;color: white;border-radius:3px; " v-if="solicitud.site.classification_type_id == 4 ">
                                                            D
                                                        </span>
                                                        <span class="badge " style="background-color:#6c757d;color: white;border-radius:3px; " v-if="solicitud.site.classification_type_id == 5 ">
                                                            E
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="barlow semi_bold">
                                                    {{solicitud.motivo? solicitud.motivo.descripcion:''}}
                                                </td>
                                                <td>
                                                    <strong class="barlow semi_bold">{{solicitud.flujo_simple == 1 ? 'SI':(solicitud.flujo_simple == 0 ? 'NO':'')}}</strong>
                                                    
                                                </td>
                                                <td style="width:120px;">
                                                    <div>
                                                        {{solicitud.total_activo}}
                                                    </div>
                                                </td>
                                                <td>
                                                    {{solicitud.descripcion}}
                                                </td>
                                                <td>
                                                    <div style="text-align: center">
                                                        <span :style="'color:white;border-radius:5px;font-size:15px;'+'background-color:#2fcbf1;'+'font-size:12px;'+'background-color:'+solicitud.estado.color+';'" class="badge badge-info barlow semi_bold">
                                                            {{solicitud.estado.descripcion}}
                                                        </span>
                                                    </div>
                                                    <div class="barlow semi_bold" style="text-align: center" v-if="solicitud.subestado_id != null">
                                                        {{solicitud.subestado.descripcion}}
                                                    </div>
                                                </td>
                                            </tr>
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
</template>
<script>
    import EventBus from "../event-bus";
import axios from 'axios';
import moment from 'moment';

export default {
  
  
    data(){
        return{
            solcitud_psa:[],
            fullPage: false,
            loading: 1
          

        }
    },
    created:function(){

    this.get_data_psa_ticket()
    

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('psaticket.get_request', function () {
            self.get_data_psa_ticket(); // ejecutas el metodo que desees
        });
 
    },

    
   
    methods:{
        
      get_data_psa_ticket:function(){
      	axios.get('/data_psa_ticket/'+this.$route.params.id).then(response=>{
      		this.solcitud_psa = response.data
      		
      	}).finally(() => this.loading = 2)
      },
       formato: function(d) {
           return moment(d).format("DD/MM/YY");
       },
 
    
    
    }
}
</script>

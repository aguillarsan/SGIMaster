<template>
    <div>
        <table class="table table-striped">
            <thead>
                <tr class="barlow semi_bold">
                    <th>
                        Código SGC
                    </th>
                    <th style="width: 150px;">
                        Sitio
                    </th>
                    <th style="width: 200px;">
                        Solicitante
                    </th>
                    <th style="width: 200px;">
                        Fecha de creación
                    </th>
                    <th>
                        Proveedor
                    </th>
                    <th>
                        Costos
                    </th>
                    <th>
                        Estado
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="solicitud in solicitudes_sgc.data">
                    <td>
                        <div class="col-md-3 col-sm-3 col-12 barlow regular" style="margin-top: 10px;">
                            <span class="badge verde" style="border-radius: 5px;color: white">
                                {{solicitud.id}}
                            </span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-12">
                            <span :style="'background-color:'+solicitud.tipo_trabajo.color+';'+'color:white;border-radius:5px;'" class="badge barlow semi_bold" v-if="solicitud.tipo_trabajo_id != null">
                                {{solicitud.tipo_trabajo_id ?solicitud.tipo_trabajo.nombre_trabajo:''}}
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class="col-md-12 col-sm-12 col-12 barlow semi_bold" v-if="solicitud.site_id != null">
                            <div style="font-size: 10px;">
                                <span class="badge " style="background-color: rgb(0, 92, 255);color: white;border-radius: 5px">
                                    {{solicitud.site?solicitud.site.nem_site:''}} {{solicitud.site?solicitud.site.nombre:'' }}
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <strong class="barlow semi_bold">
                            {{solicitud.user.name}}  {{solicitud.user.apellido}}
                        </strong>
                    </td>
                    <td>
                        <div class="barlow regular">
                            {{date_format(solicitud.created_at)}}
                        </div>
                    </td>
                    <td>
                        <div style="max-width: 180px;" v-if="solicitud.proveedor_id != null">
                            <strong class=" barlow semi_bold" style="font-size:12px; ">
                                {{solicitud.proveedor?solicitud.proveedor.PROVEEDOR:''}}
                            </strong>
                        </div>
                    </td>
                    <td>
                        <div v-if="solicitud.costos_activos != 0 && solicitud.costos_activos != null ">
                            <div>
                                <strong class="barlow semi_bold" style="font-size: 12px;">
                                    ACTIVOS
                                </strong>
                            </div>
                            <div class="barlow regular">
                                {{solicitud.tipo_moneda.moneda}} ${{formatPrice(solicitud.costos_activos ) }}
                            </div>
                        </div>
                        <div v-if="solicitud.costos_servicios != 0 && solicitud.costos_servicios != null">
                            <div>
                                <strong class="barlow semi_bold" style="font-size: 12px;">
                                    SERVICIOS
                                </strong>
                                <div class="barlow regular">
                                    {{solicitud.tipo_moneda.moneda}} ${{formatPrice(solicitud.costos_servicios) }}
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                        <div v-if="solicitud.area_creadora_id == 1 ">
                            <div>
                                <strong class="barlow semi_bold" style="font-size: 12px;">
                                    COSTOS TOTALES
                                </strong>
                                <div class="barlow regular">
                                    {{solicitud.tipo_moneda.moneda}} ${{formatPrice(solicitud.activo_servicio)}}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div>
                            <div>
                                <div class="barlow semi_bold">
                                    <span :style="'background-color:'+solicitud.proceso.color+';'+'color:white;'+'border-radius:5px;'" class="badge" v-if="solicitud">
                                        {{solicitud.proceso ?solicitud.proceso.descripcion:''}}
                                    </span>
                                </div>
                                <div class="barlow semi_bold" style="margin-top:5px;" v-if="solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                    <span :style="'background-color:'+solicitud.subestado.color+';'+'color:white;'+'border-radius:5px;'" class="badge" v-if="solicitud">
                                        {{solicitud.subestado.subestado}} {{solicitud.gestionador_id!=null ? solicitud.gestionador_id :''}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <nav aria-label="pagination" class="pagination" role="navigation">
            <vue-pagination :offset="4" :pagination="solicitudes_sgc" @paginate="get_sgc_data()">
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
        
        components: {
         
            'vue-pagination': VuePagination,
            
         
           

        },
         data() {
            return {
            
         
               
                solicitudes_sgc:{
                    'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0
                },
              
            }
              
        },
        mounted: function() {
        this.get_sgc_data();
     
         
        },

        methods: {
            
            get_sgc_data:function(){
                
                
                axios.get(`proveedor_solicitudes_sgc?page=${this.solicitudes_sgc.current_page}`).then(response=>{
                          this.loadFunction();
                          this.solicitudes_sgc = response.data
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
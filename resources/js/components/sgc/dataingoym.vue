<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 style="color: rgb(102, 102, 102)">
                        {{NameTable}}
                    </h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 80px;">
                                        #
                                    </th>
                                    <th style="width: 150px;">
                                        Sitio
                                    </th>
                                    <th v-if="modulo != 1">
                                        Solicitante
                                    </th>
                                    <th>
                                        Proveedor
                                    </th>
                                    <th>
                                        Costos
                                    </th>
                                    <th>
                                        Cesta/Oc
                                    </th>
                                    <th>
                                        N°ework
                                    </th>
                                    <th>
                                        N°cotización
                                    </th>
                                    <th>
                                        Estado
                                    </th>
                                </tr>
                            </thead>
                            <tr>
                                <th>
                                    <input @keyup.prevent="GetSolicitudes(modulo)" class="form-control" name="" style="width: 80px;" type="text" v-model="idsolicitud">
                                    </input>
                                </th>
                                <th>
                                    <input @keyup.prevent="GetSolicitudes(modulo)" class="form-control" name="" style="width: 150px;" type="text" v-model="sitio">
                                    </input>
                                </th>
                                <th>
                                    <input @keyup.prevent="GetSolicitudes(modulo)" class="form-control" name="" style="width: ;" type="text" v-model="proveedor">
                                    </input>
                                </th>
                                <th>
                                </th>
                                <th>
                                    <input @keyup.prevent="GetSolicitudes(modulo)" class="form-control" name="" style="width: ;" type="text" v-model="ocCesta">
                                    </input>
                                </th>
                                <th>
                                    <input @keyup.prevent="GetSolicitudes(modulo)" class="form-control" name="" style="width:100px; ;" type="text" v-model="ework">
                                    </input>
                                </th>
                                <th>
                                    <input @keyup.prevent="GetSolicitudes(modulo)" class="form-control" name="" style="width:100px; ;" type="text" v-model="cotizacion">
                                    </input>
                                </th>
                            </tr>
                            <tbody>
                                <tr style="height: 150px;" v-for="solicitud in solicitudes.data">
                                    <td>
                                        <a href="#" target="blank__">
                                            <span class="badge boxBounce" style="background-color: #1d548a;color: white;border-radius: 5px;font-size: 12.2px">
                                                {{solicitud.id}}
                                            </span>
                                        </a>
                                    </td>
                                    <td class="" style="font-size: 12px;">
                                        <div v-if="solicitud.site_id != null">
                                            <div style="font-size: 13px;">
                                                {{solicitud.site.nem_site}}
                                            </div>
                                            <div style="font-size: 13px;">
                                                {{solicitud.site.nombre | uppercase}}
                                            </div>
                                            <div v-if="solicitud.site.site_type_id==1">
                                                <span class="badge" style="background-color: #42e8b4;color: white;font-size: 11px">
                                                    FIJO
                                                </span>
                                            </div>
                                            <div v-if="solicitud.site.site_type_id==2">
                                                <span class="badge" style="background-color: #005cff;color: white; font-size: 11px">
                                                    MOVIL
                                                </span>
                                            </div>
                                            <div v-if="solicitud.site.site_type_id==3">
                                                <span class="badge" style="background-color: #005cff;color: white; font-size: 11px">
                                                    SWITCH
                                                </span>
                                            </div>
                                            <div v-if="solicitud.site.site_type_id==4">
                                                <span class="badge" style="background-color: #005cff;color: white; font-size:11px ">
                                                    PHONE
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td v-if="modulo != 1">
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
                                                {{solicitud.tipo_moneda.moneda}} ${{solicitud.costos_activos | currency}}
                                            </div>
                                        </div>
                                        <div v-if="solicitud.costos_servicios != 0">
                                            <div>
                                                <strong style="font-size: 12px;">
                                                    SERVICIOS
                                                </strong>
                                                <div>
                                                    {{solicitud.tipo_moneda.moneda}} ${{solicitud.costos_servicios | currency}}
                                                </div>
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <strong>
                                                Cesta
                                            </strong>
                                        </div>
                                        <div>
                                            {{solicitud.cesta}}
                                        </div>
                                        <div style="margin-top: 10px;">
                                            <strong>
                                                OC
                                            </strong>
                                        </div>
                                        <div>
                                            {{solicitud.oc}}
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
                        <div style="margin-top: 30px;">
                            <nav aria-label="pagination" class="pagination" role="navigation" v-if="modulo==1">
                                <vue-pagination :offset="4" :pagination="solicitudes" @paginate="GetSolicitudes(modulo)">
                                </vue-pagination>
                            </nav>
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
import EventBus from "./event-bus"


export default {
	props:['moduloselect'],
		
	
	 
	data(){
		return{
			
			totalCreada:'',
			totalAprobar:'',
			totalRecazada:'',
			totalInformeFinal:''


		}
	},

	created:function(){
       this.GetTotales();

	},
	mounted: function() { /* Agrega mounted y con el siguiente contenido */
		let self = this;
		EventBus.$on('oym.getTotales', function () {
            self.GetTotales(); // ejecutas el metodo que desees
        });

	},
	methods:{
		formato:function(d){
			return moment(d).format("DD/MM/YY - hh:mm:ss");
		},
		GetTotales:function(){
			axios.get('/GetTotalCreada').then((response)=>{
				this.totalCreada = response.data;
			})
			axios.get('/GetTotalPorAprobar').then((response)=>{
				this.totalAprobar = response.data;
			})
			axios.get('/GetTotalRechazada').then((response)=>{
				this.totalRecazada = response.data;
			})
			axios.get('/GetTotalInformeFinal').then((response)=>{
				this.totalInformeFinal = response.data;
			})
		},
		getsolicitudes:function(id){
			EventBus.$emit('oym.getrequest',id);
		}
		
	}
}
</script>
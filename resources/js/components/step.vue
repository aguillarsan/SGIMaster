<template>
	<div class="">


		
		<li class="active" v-if="cotizacion== 1">Solicitar cotizaciones</li>
		<li  v-if="cotizacion != 1">Solicitar cotizaciones</li>

		<li v-if="pxq == 1 " class="active">Generar PxQ</li>
		<li v-if="pxq != 1 ">Generar PxQ</li>

		<li v-if="cuenta == 1 " class="active">Indicar cuenta de cargo</li>
		<li v-if="cuenta != 1 ">Indicar cuenta de cargo</li>

		<li v-if="empresa == 1 " class="active">Definir empresa</li>
		<li v-if="empresa != 1 " >Definir empresa</li>

		<li v-if="sgc == 1 " class="active">Crear SGC</li>
		<li v-if="sgc != 1 " >Crear SGC</li>

		<li v-if="oc == 1 " class="active">Número OC</li>
		<li v-if="oc != 1 " >Número OC</li>
		<li v-if="informeFinal == 1 " class="active">Informe Final</li>
		<li v-if="informeFinal != 1 " >Informe Final</li>


		

	</div>

</template>

<script>
import axios from 'axios';
import moment from 'moment';
import EventBus from "./event-bus"


export default {
	data(){
		return{
			cotizacion:'',
			pxq:'',
			cuenta:'',
			empresa:'',
			sgc:'',
			oc:'',
			informeFinal:'',
			fullPage: false,


		}
	},

	created:function(){

		this.GetCoti();



	},
	mounted: function() { /* Agrega mounted y con el siguiente contenido */
		let self = this;
		EventBus.$on('step.GetCoti', function () {
            self.GetCoti(); // ejecutas el metodo que desees 
        });
	},
	methods:{
		GetCoti:function(){


			               

                var id = document.getElementById('number').value;

                axios.get('/listCotizacion/'+id)
                .then((response) => {

                	this.cotizacion = response.data
                })
   ////////////////////////////////////////////////////////////
   axios.get('/listPxq/'+id)
   .then((response) => {

   	this.pxq = response.data
   })

      ////////////////////////////////////////////////////////////
      axios.get('/listCuenta/'+id)
      .then((response) => {

      	this.cuenta = response.data
      })
       ////////////////////////////////////////////////////////////
       axios.get('/listEmpresa/'+id)
       .then((response) => {

       	this.empresa = response.data
       })

        ////////////////////////////////////////////////////////////
        axios.get('/listSgc/'+id)
        .then((response) => {

        	this.sgc = response.data
        })

        ////////////////////////////////////////////////////////////
        axios.get('/listOc/'+id)
        .then((response) => {

        	this.oc = response.data
        })

         ////////////////////////////////////////////////////////////
         axios.get('/listInforme/'+id)
         .then((response) => {

         	this.informeFinal = response.data
         })
     }

 }
}
</script>

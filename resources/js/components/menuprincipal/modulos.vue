<template>
 
        <div class="main-content main-wrapper container">
            <div class="wrapper wrapper-content">
                <section class="section">
                    <div class="section-header shadow-box-ag" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.09);">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6 col-12 ">
                                <div class="card-stats-title" style="text-align: center;">
                                    <h1 style="text-align: center;">
                                        Modulos de gestión
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="ibox float-e-margins">
                    <div class="row">
                        <div class="col-lg-6" v-for="m in modulos">
                            <div class="card card-large-icons shadow-box-ag boxBounce">
                                <div class="card-icon bg-primary text-white" :style="'background: -webkit-linear-gradient(left,'+m.color+');'">
                                    <i :class="m.icono">
                                    </i>
                                </div>
                                <div class="card-body">
                                    <h4>
                                        {{m.nombre}}
                                    </h4>
                                    <p>
                                        {{m.descripcion}}
                                    </p>
                                    <a :href="m.ruta" class="card-cta" style="color:#007eff" target="__blank">
                                        Entrar
                                        <i class="fas fa-chevron-right">
                                        </i>
                                    </a>
                                </div>
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
	data(){
		return{
			modulos:[],
			


		}
	},

	created:function(){



		this.getModulos();

	},
	mounted: function() { /* Agrega mounted y con el siguiente contenido */
		let self = this;
		EventBus.$on('bitacora.getBitacora', function () {
            self.getBitacora(); // ejecutas el metodo que desees
        });
	},
	methods:{
		
		getModulos:function(){

			axios.get('/GetModulos')
			.then((response) => {

				this.modulos = response.data
				
			})


		},
		
		
	}
}
</script>

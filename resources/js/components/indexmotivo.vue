<template>
    <div>
        <div class="main-content">
            <div class="wrapper wrapper-content">
                <section class="section">
                    <div class="section-header shadow-box-ag">
                        <div class="row">
                            <div class="col-lg-10 col-md-6 col-sm-6 col-12 ">
                                <div class="card-stats-title">
                                    <h1 v-if="id== 1">
                                        Tickets mantención red core
                                    </h1>
                                    <h1 v-if="id== 2">
                                        Tickets en operación
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 ">
                            <a href="" style="color: #2FCBF1">
                                <div class="card card-statistic-1 shadow-box-ag boxBounce">
                                    <div class="card-icon azul shadow-box-ag">
                                        <i class="fas fa-list">
                                        </i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4>
                                                TOTAL
                                            </h4>
                                        </div>
                                        <div class="card-body" style="font-size: 35px;">
                                            {{totalTickets}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card shadow-box-ag">
                        <div class="card-header">
                            <div class="col-lg-11">
                                <h4 style="color: #666" v-if="id== 1">
                                    Tickets mantención red core
                                </h4>
                                <h4 style="color: #666" v-if="id== 2">
                                    Tickets en operación
                                </h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive project-list project-table">
                                <table class="table table-hover table-striped ">
                                    <thead>
                                        <tr>
                                        	<th class="">#</th>

                                            <th class="">Área</th>
                                            <th class="">Sitio</th>
                                            <th>Crm</th>

                                            <th class="">Categoría</th>
                                            <th class="">Motivo</th>

                                            <th class="">Fecha Inicio</th>
                                            <th class="">Fecha Termino</th>
                                            <th class="">Descripción</th>

                                            <th class="centrado">Estado</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
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
    import axios from 'axios';
import moment from 'moment';
import EventBus from "./event-bus"


export default {
	props: [ 'id' ],
	data(){
		return{
		   totalTickets:''


		}
	},

	created:function(){

         this.GetTotalTickets();

		

	},
	mounted: function() { /* Agrega mounted y con el siguiente contenido */
		let self = this;
		EventBus.$on('bitacora.getBitacora', function () {
            self.getBitacora(); // ejecutas el metodo que desees
        });
	},
	methods:{
		GetTotalTickets:function(){
			axios.get(`/GetTotalTicketMotivo?motivo=${this.id}`).then((response)=>{
				this.totalTickets = response.data;
			})
		},
		
		
	}
}
</script>

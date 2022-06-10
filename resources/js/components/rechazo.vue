<template>
	<div>
		<div class="row">
			<div class="col-lg-12 " >
				<div class="ibox float-e-margins">
					<div class="card shadow-box-ag" style="border-radius:10px;">
						<div class="card-header">
							<div class="col-lg-11">
								<h4 style="color: #666">Total {{TotalRechazadas}} </h4>
							</div>
						</div>
						<div class="ibox">
							<div class=" table-responsive project-list project-table">
								<table class="table table-hover table-striped  ">
									<thead>
										<tr>
											<th class="centrado">#</th>

											<th class="centrado">Área</th>
											<th class="" >Sitio</th>
											<th class="centrado">Categoría</th>
											<th class="centrado">Motivo</th>

											<th class="centrado">Fecha Inicio</th>
											<th class="centrado">Fecha Termino</th>
											<th class="">Descripción</th>

											<th class="">Estado</th>
											<th>Opciones</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="ticket in tickets">

											<td class="centrado">
												<a :href="'/Tkc/'+ticket.id" target="blank__" ><span class="badge  badge-info">{{ticket.id}}</span></a> 
											</td>
											<td class="centrado">
												<div v-if="ticket.area_id != null">

													<span v-if="ticket.area_id == 1" class="badge" style="background-color: #005cff;color: white;"> 
														{{ticket.area.descripcion}}
													</span>
													<span v-if="ticket.area_id == 2" class="badge badge-info">
														{{ticket.area.descripcion}}
													</span>
													<span v-if="ticket.area_id == 3" class="badge badge-warning">
														{{ticket.area.descripcion}}
													</span>

												</div>

											</td>
											<td class="" style="font-size: 12px;">
												<div v-if="ticket.site_id != null">
													<div>
														{{ticket.site.nem_site}} 
													</div>
													<div>
														{{ticket.site.nombre}} 
													</div>

													
													
													<div v-if="ticket.site.site_type_id==1">
														<span class="badge" style="background-color: #42e8b4;color: white">FIJO </span>
													</div>
													<div v-if="ticket.site.site_type_id==2">
														<span class="badge" style="background-color: #005cff;color: white; font-size: ">  MOVIL</span>
													</div>
													<div v-if="ticket.site.site_type_id==3">
														<span class="badge" style="background-color: #005cff;color: white; font-size: ">  SWITCH</span>
													</div>
													<div v-if="ticket.site.site_type_id==4">
														<span class="badge" style="background-color: #005cff;color: white; font-size: ">  PHONE</span>
													</div>             

												</div>
											</td>
											<td class="centrado">
												<div v-if="ticket.site_id != null">
													<div v-if="ticket.site.classification_type_id != null">
														<span  class="badge " style="background-color:#42e8b4;color: white " v-if="ticket.site.classification_type_id == 1 ">
															A
														</span>
														<span  class="badge " style="background-color:#005cff;color: white " v-if="ticket.site.classification_type_id == 2 ">
															B
														</span>
														<span  class="badge badge-warning"  v-if="ticket.site.classification_type_id == 3 ">
															C
														</span>
														<span  class="badge " style="background-color:#6c757d;color: white " v-if="ticket.site.classification_type_id == 4 ">
															D
														</span>
														<span  class="badge " style="background-color:#6c757d;color: white " v-if="ticket.site.classification_type_id == 5 ">
															E
														</span>

													</div>
												</div>
											</td>
											<td class="centrado">
												<div v-if = "ticket.tipo_motivo_id != null">
													{{ticket.tipo_motivo.descripcion}}
												</div>

											</td>


											<td class="centrado">
												<div  v-if="ticket.created_at != null">
													{{formato(ticket.created_at)}} 


												</div>
											</td>
											<td class="centrado">
												<div v-if="ticket.fecha_compromiso != null">
													{{formato(ticket.fecha_compromiso)}}  
													
												</div>
											</td>
											<td class="" >
												<div style="width:200px;">
													{{ticket.descripcion}}
												</div>


											</td>
											<td>
												
												<div>
													<span class="badge badge-light" > {{ticket.estado.descripcion}}</span> 
												</div>


											</td>
											<td>
												<button class="btn btn-success" @click.prevent="ReenviarTicket(ticket)"><i class="fas fa-undo"></i></button>
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
	</div>
</template>
<script>
import axios from 'axios';
import moment from 'moment';
import EventBus from "./event-bus"


export default {
	data(){
		return{
			tickets:[],
			TotalRechazadas:''


		}
	},

	created:function(){



		this.getRechazadas();
		this.GetTotalRechazadas();

	},
	mounted: function() { /* Agrega mounted y con el siguiente contenido */
		
	},
	methods:{
		formato:function(d){
			return moment(d).format("DD/MM/YY");
		},
		getRechazadas:function(){
			
			axios.get('/rechazadasList')
			.then((response) => {

				this.tickets = response.data
			})

		},
		GetTotalRechazadas:function(){
			let loader = this.$loading.show({
                  // Optional parameters
                  container: this.fullPage ? null : this.$refs.formContainer,
                  canCancel: true,
                  onCancel: this.onCancel,
              });
                // simulate AJAX
                setTimeout(() => {
                	loader.hide()
                },500) 
                axios.get('/GetTotalRechazadas').then((response)=>{

                	this.TotalRechazadas = response.data;
                })
            },
            ReenviarTicket:function(ticket){
            	axios.post('/reenvio/'+ticket.id).then((response)=>{
            		let loader = this.$loading.show({
                  // Optional parameters
                  container: this.fullPage ? null : this.$refs.formContainer,
                  canCancel: true,
                  onCancel: this.onCancel,
              });
                // simulate AJAX
                setTimeout(() => {
                	loader.hide()
                },500) 
                this.getRechazadas();
                this.GetTotalRechazadas();
                const Toast = Swal.mixin({
                	toast: true,
                	position: 'top-end',
                	showConfirmButton: false,
                	timer: 3000,
                	timerProgressBar: true,
                	onOpen: (toast) => {
                		toast.addEventListener('mouseenter', Swal.stopTimer)
                		toast.addEventListener('mouseleave', Swal.resumeTimer)
                	}
                })

                Toast.fire({
                	icon: 'success',
                	title: 'Ticket Nro' +' '+ticket.id+' '+'Reenviado.'
                })
            })
            }

        }
    }
    </script>

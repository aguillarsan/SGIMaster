<template>
	<div class="main-content" >
		<section class="section">
			<div class="section-header shadow-box-ag" >
				<div class="col-lg-10 col-md-6 col-sm-6 col-12">

					<div class="card-stats-title" ><h1> Listado de sitios </h1>
					</div>


				</div>


			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
					<div class="card card-statistic-1 shadow-box-ag boxBounce" v-bind:style=" modulo==1 ? 'background-color: #005cff; border: 2px solid white;' : '' ">
						<a href=""  v-on:click.prevent="GetSitios">
							<div class="card-icon bg-info" v-bind:style=" modulo==1 ? 'background-color: white; ' : '' " >
								<i class="fas fa-globe-americas" v-bind:style=" modulo==1 ? 'color: white; ' : '' "></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4  v-bind:style=" modulo==1 ? 'color: white; ' : '' ">HALTED</h4>
								</div>
								<div class="card-body" style="font-size: 35px;"  v-bind:style=" modulo==1 ? 'color: white; ' : '' ">
									{{totalHalted}}
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-12">
					<div class="card card-statistic-1 shadow-box-ag boxBounce" v-bind:style=" modulo==2 ? 'background-color: #005cff; border: 2px solid white;' : '' ">
						<a href="" v-on:click.prevent="GetSitiosOperativos">
							<div class="card-icon " style="background-color: #42e8b4;">
								<i class="fas fa-check"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4 v-bind:style=" modulo==2 ? 'color: white; ' : '' " >OPERATIVOS</h4>
								</div>
								<div class="card-body" style="font-size: 35px;" v-bind:style=" modulo==2 ? 'color: white; ' : '' ">
									{{totalOperativo}}
								</div>
							</div>
						</a>
					</div>
				</div>

			</div>
			
			<div class="row">
				<div class="col-12">
					<div class="card shadow-box-ag">
						<div class="card-header">
							<h4 v-if="modulo==1">Sitios halted</h4>
							<h4 v-if="modulo==2">Sitios operativos</h4>
							
						</div>
						<div class="card-body p-0">
							<div class="table-responsive project-list project-table">
								<table class="table table-striped  table-hover ">
									<thead>
										<tr>

											<th class="centro">#</th>
											<th class="centro">Creador</th>
											<th class="centro">Área</th>
											<th class="centro">Sitio</th>
											<th class="centro">Categoria</th>
											<th class="centro">Zona </th>
											<th class="centro">Crm </th>
											<th class="centro">Fecha inicio </th>
											<th class="centro">Fecha termino</th>
											<th class="centro">Días en halted</th>
											

											<th class="centro">Estado</th>

											<th class="centro"  v-if="modulo == 1">Opciones</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="sitio in sitios">

											<td>
												<span class="badge  badge-info boxBounce">	{{sitio.id}}</span>
											</td>
											<td>
												<div>
													{{sitio.user.name}}
												</div>
												<div>
													{{sitio.user.apellido}}
												</div>


											</td>
											<td>
												<div v-if="sitio.area_id != null">

													<span v-if="sitio.area_id == 1" class="badge" style="background-color: #005cff;color: white;"> 
														Energia
													</span>
													<span v-if="sitio.area_id == 2" class="badge badge-info">
														Clima
													</span>
													<span v-if="sitio.area_id == 3" class="badge badge-warning">
														Obras Civiles
													</span>
													<span v-if="sitio.area_id == 4" class="badge badge-success">
														Medio Ambiente
													</span>


												</div>
											</td>
											<td class="" style="font-size: 12px;">
												<div v-if="sitio.site_id != null">
													<div>
														{{sitio.site.nem_site}} 
													</div>
													<div>
														{{sitio.site.nombre}} 
													</div>



													<div v-if="sitio.site.site_type_id==1">
														<span class="badge" style="background-color: #42e8b4;color: white;font-size: 10px;">FIJO </span>
													</div>
													<div v-if="sitio.site.site_type_id==2"  >
														<span class="badge" style="background-color: #005cff;color: white; font-size: 10px; ">  MOVIL</span>
													</div>
													<div v-if="sitio.site.site_type_id==3">
														<span class="badge" style="background-color: #005cff;color: white; font-size:10px ">  SWITCH</span>
													</div>
													<div v-if="sitio.site.site_type_id==4">
														<span class="badge" style="background-color: #005cff;color: white; font-size:10px ">  PHONE</span>
													</div>             

												</div>
											</td>

											<td class="centrado">
												<div v-if="sitio.site_id != null">
													<div v-if="sitio.site.classification_type_id != null">
														<span  class="badge " style="background-color:#42e8b4;color: white " v-if="sitio.site.classification_type_id == 1 ">
															A
														</span>
														<span  class="badge " style="background-color:#005cff;color: white " v-if="sitio.site.classification_type_id == 2 ">
															B
														</span>
														<span  class="badge badge-warning"  v-if="sitio.site.classification_type_id == 3 ">
															C
														</span>
														<span  class="badge " style="background-color:#6c757d;color: white " v-if="sitio.site.classification_type_id == 4 ">
															D
														</span>
														<span  class="badge " style="background-color:#6c757d;color: white " v-if="sitio.site.classification_type_id == 5 ">
															E
														</span>

													</div>
												</div>
											</td>
											<td>
												<div v-if="sitio.site_id != null">
													<div>
														{{sitio.site.pop.comuna.zona.nombre_zona}}({{sitio.site.pop.comuna.zona.cod_zona}})
													</div>
													
												</div>
											</td>
											<td>
												<div v-if="sitio.site_id != null">
													<div>
														{{sitio.site.pop.comuna.zona.crm.nombre_crm}}
													</div>
													
												</div>
											</td>
											<td>
												{{formato(sitio.fecha_inicio)}}
											</td>
											<td>
												{{formato(sitio.fecha_solucion)}}
											</td>
											<td>
												
												<span class="badge badge-info">{{date.diff(sitio.fecha_inicio,"days")}}</span>
												
											</td>
											<td>
												
												<div v-if="sitio.state_pop_halted_id != null">{{sitio.state_pop_halted.descripcion}}</div>
												
												
											</td>
											<td v-if="modulo==1">
												<button class="btn btn-success" @click.prevent="UpdateSitio(sitio)"><i class="fas fa-check"></i></button>
											</td>
										</tr>
									</tbody>

								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</template>

<script>
import axios from 'axios';
import moment from 'moment';
import EventBus from "./event-bus"


export default {
	data(){
		return{
			sitios:[],
			date:'',
			totalHalted:'',
			totalOperativo:'',
			modulo:''


		}
	},

	created:function(){

		this.GetSitios();

		

	},
	mounted: function() { /* Agrega mounted y con el siguiente contenido */
		
	},
	methods:{
		formato:function(d){
			return moment(d).format("DD/MM/YY");

		},
		UpdateSitio:function(sitio){
           axios.get('/AprobarSitio/'+sitio.id).then((response)=>{
           	 this.GetSitios()
           })
           	
           
		},
		GetSitios:function(){
			axios.get('/GetStios').then((response)=>{
				this.sitios = response.data;
			})
			axios.get('/getHaltedTotal').then((response)=>{
				this.totalHalted=response.data;
			})
			axios.get('/getOperativoTotal').then((response)=>{
				this.totalOperativo=response.data;
			})
			this.modulo=1;

			this.date=moment();
		},
		GetSitiosOperativos:function(){
			axios.get('/GetStiosOperativos').then((response)=>{
				this.sitios = response.data;
			})
			axios.get('/getHaltedTotal').then((response)=>{
				this.totalHalted=response.data;
			})
			axios.get('/getOperativoTotal').then((response)=>{
				this.totalOperativo=response.data;
			})

			this.date=moment();
			this.modulo=2;
		}

	}
}
</script>

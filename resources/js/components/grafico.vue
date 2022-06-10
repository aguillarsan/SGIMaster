<template>
	<div class="wrapper wrapper-content">
		<section class="section">
			<div class="section-header shadow-box-ag" >
				<div class="row">
					<div class="col-lg-12 col-md-6 col-sm-6 col-12 ">
						<div class="card-stats-title" ><h1>Gráficos </h1>



						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							
							<div class="custom-switches-stacked mt-2">
								<label class="custom-switch">
									<input type="radio" name="option" value="1" class="custom-switch-input" @change.prevent="getGraficoEnergia" v-model="area">
									<span class="custom-switch-indicator"></span>
									<span class="custom-switch-description">Técnicas Energia</span>
								</label>

								
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<div class="custom-switches-stacked mt-2">
								<label class="custom-switch">
									<input type="radio" name="option" value="2" class="custom-switch-input" v-model="area"  @change.prevent="getGraficoClima">
									<span class="custom-switch-indicator"></span>
									<span class="custom-switch-description">Técnicas Clima</span>
								</label>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6 col-12">
						<div class="custom-switches-stacked mt-2">
							<label class="custom-switch">
								<input type="radio" name="option" value="3" class="custom-switch-input" v-model="area"  @change.prevent="getGraficoOOCC">
								<span class="custom-switch-indicator"></span>
								<span class="custom-switch-description">Técnicas OO.CC</span>
							</label>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6 col-12">
						<div class="custom-switches-stacked mt-2">
							<label class="custom-switch">
								<input type="radio" name="option" value="4" class="custom-switch-input"v-model="area"  @change.prevent="getGraficoMedioAmbiente">
								<span class="custom-switch-indicator"></span>
								<span class="custom-switch-description">Técnicas Medio ambiente</span>
							</label>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6 col-12">
						<div class="custom-switches-stacked mt-2">
							<label class="custom-switch">
								<input type="radio" name="option" value="5" class="custom-switch-input"v-model="area"  @change.prevent="GetTotalesTecnica">
								<span class="custom-switch-indicator"></span>
								<span class="custom-switch-description">Técnicas</span>
							</label>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6 col-12">
					</div>


					<div class="col-lg-10 col-md-6 col-sm-6 col-12" id="DivTecnicaEnergia"  style="display:none" >

						<div class="form-group">
							
							<div class="selectgroup w-100">
								<label class="selectgroup-item">
									<input type="radio" name="lineas" id="inputLineas" value="1" class="selectgroup-input"  @change.prevent="GetGraficoEquipoEnergia" >
									<span class="selectgroup-button">Líneas Eléctricas</span>
								</label>
								<label class="selectgroup-item">
									<input type="radio" name="grupos" id="inputGruposElectrogenos" value="2" class="selectgroup-input" @change.prevent="GetGraficoGruposElectrogenos" >
									<span class="selectgroup-button">Grupos Electrógenos</span>
								</label>
								<label class="selectgroup-item">
									<input type="radio" name="plantas" id="inputPlantasRectificadora" value="3" class="selectgroup-input" @change.prevent="GetGraficoPlantasRectificadoras">
									<span class="selectgroup-button">Plantas Rectificadoras</span>
								</label>
								<label class="selectgroup-item">
									<input type="radio" name="paneles" id="inputPanelesSolares"  value="4" class="selectgroup-input" @change.prevent="GetGraficoPanelesSolares">
									<span class="selectgroup-button">Paneles Solares</span>
								</label>
								<label class="selectgroup-item">
									<input type="radio" name="baterias" value="5" class="selectgroup-input">
									<span class="selectgroup-button">Baterías</span>
								</label>
								<label class="selectgroup-item">
									<input type="radio" name="eolicos" value="6" class="selectgroup-input">
									<span class="selectgroup-button">Eolicos</span>
								</label>
							</div>
						</div>
					</div>
					
					

					


				</div>
				


			</div>
		</section>
		<div class="row">

			<div class="col-lg-5 col-md-6 col-sm-6 col-12 ">

				<div class="pricing shadow-box-ag">
					<div class="pricing-title">
						Áreas
					</div>
					<div class="pricing-padding">
						<div id="chart" style="width: 100%; height: 400px;"></div>

					</div>

				</div>

				
			</div>
			<div class="col-lg-7 col-md-6 col-sm-6 col-12">
				<div class="pricing shadow-box-ag">
					<div class="pricing-title">
						Técnicas {{NombreFiltro}}
					</div>
					<div class="pricing-padding">
						<div id="tecnicas">
							<div id="chartdiv2" style="width: 100%; height: 400px;"></div>
						</div>
						<div id="DivEnergiaDisabled" style="display:none">
							<div id="charEnergia" style="width: 100%; height: 400px;"></div>
						</div>
						<div id="DivClimaaDisabled" style="display:none">
							<div id="chartClima" style="width: 100%; height: 400px;"></div>
						</div>
						<div id="DivOOCCDisabled" style="display:none">
							<div id="chartOOCC" style="width: 100%; height: 400px;"></div>
						</div>
						<div id="DivMedioAMbienteDisabled" style="display:none">
							<div id="chartMedioAmbiente" style="width: 100%; height: 400px;"></div>
						</div>




					</div>

				</div>

			</div>
			<div class="col-lg-12 col-md-6 col-sm-6 col-12">
				<div class="pricing shadow-box-ag">
					<div class="pricing-title">
						Equipos 
					</div>
					<div class="pricing-padding">
						<div id="EquiposEnergia">
							<div id="chartEquipo" style="width: 100%; height: 400px;"></div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
</template>

<script>
import axios from 'axios';
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";


am4core.useTheme(am4themes_animated);


export default {
	data(){
		return{
			TotalTicekts:'',
			TotalClima:'',
			ClimaPorcentaje:'',
			TotalEnergia:'',
			TotalObras:'',
			TotalMedio:'',
			TotalLineasElectricas:'',
			TotalGrupoElectrogeno:'',
			TotalPlantaRectificadora:'',
			TotalPanelesSolares:'',
			TotalBaterias:'',
			Totaleolicos:'',
			TotalAireAcondicionado:'',
			TotalVentiladores:'',
			TotalEstructuraVertical:'',
			TotalInfraestructura:'',
			TotalCercoPerimetral:'',
			TotalReforzamiento:'',
			area:'',
			NombreFiltro:'',
			TecnicasEnergias:[],
			TecnicaSelected:[],
			EquipoLiniaElectrica:'',
			EquipoTransformador:'',
			EquipoCompactoMedida:'',
			NombreEquipoSelected:'',
			GetEquipoTecnicaGrupoElectrogeno:'',
			GetEquipoTecnicaMotor:'',
			GetEquipoTecnicaGenerador:'',
			GetEquipoTecnicaEstanqueCombustibler:'',
			GetEquipoTecnicaControladorG:'',
			GetEquipoTecnicaControladorTTA:'',
			GetEquipoTecnicaRectificadores:'',
			total:''

		}

	},

	mounted() {
		
		

	},
	created:function(){
		this.GetTotalticket();
        this.GetTotalesTecnica()
		
	
	},
	methods:{
	GetTotalticket: function() {
	    axios.get('/TotalTicketsAreas').then((response) => {
	        this.total = response.data;
	        console.log(this.total);
	        var chart = am4core.create("chart", am4charts.PieChart);
	        // Add data
	        chart.data = [{
	            "Áreas": "Energía",
	            "litres": Number(this.total.energia),
	        }, {
	            "Áreas": "Clima",
	            "litres": Number(this.total.clima),
	        }, {
	            "Áreas": "M.ambiente",
	            "litres": Number(this.total.medio),
	        }, {
	            "Áreas": "OO.CC",
	            "litres": Number(this.total.obras),
	        }];
	        // Add and configure Series
	        var pieSeries = chart.series.push(new am4charts.PieSeries());
	        pieSeries.dataFields.value = "litres";
	        pieSeries.dataFields.category = "Áreas";
	     })
	    },
		GetGraficoPanelesSolares:function(){
			var  inputLineas = document.getElementById('inputLineas');
			inputLineas.checked=false;
			var  inputPlantasRectificadora = document.getElementById('inputPlantasRectificadora');
			inputPlantasRectificadora.checked=false;
			var  inputGruposElectrogenos = document.getElementById('inputGruposElectrogenos');
			inputGruposElectrogenos.checked=false;
			this.EquipoLiniaElectrica ='';
			this.EquipoTransformador = '';
			this.EquipoCompactoMedida = '';

		},
		GetGraficoPlantasRectificadoras:function(){
			var  inputLineas = document.getElementById('inputLineas');
			inputLineas.checked=false;
			var  inputGruposElectrogenos = document.getElementById('inputGruposElectrogenos');
			inputGruposElectrogenos.checked=false;

			this.GetEquipoTecnicaGrupoElectrogeno = '';
			this.GetEquipoTecnicaMotor = '';
			this.GetEquipoTecnicaGenerador = '';
			this.GetEquipoTecnicaEstanqueCombustibler = '';
			this.GetEquipoTecnicaControladorG ='';
			this.GetEquipoTecnicaControladorTTA = '';
			axios.get('/GetEquipoTecnicaRectificadores').then((response)=>{
				this.GetEquipoTecnicaRectificadores = response.data;
				var chart = am4core.create("chartEquipo", am4charts.PieChart);
				chart.data = [{

					"Equipo": "Rectificadores",
					"litres":this.GetEquipoTecnicaRectificadores,
				}];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "Equipo";
})

		},
		GetGraficoGruposElectrogenos:function(){
			var  inputLineas = document.getElementById('inputLineas');
			inputLineas.checked=false;
			var  inputPlantasRectificadora = document.getElementById('inputPlantasRectificadora');
			inputPlantasRectificadora.checked=false;
			this.EquipoLiniaElectrica ='';
			this.EquipoTransformador = '';
			this.EquipoCompactoMedida = '';

			axios.get('/GetEquipoTecnicaGrupoElectrogeno').then((response)=>{
				this.GetEquipoTecnicaGrupoElectrogeno = response.data;
			})
			axios.get('/GetEquipoTecnicaMotor').then((response)=>{
				this.GetEquipoTecnicaMotor = response.data;
			})
			axios.get('/GetEquipoTecnicaGenerador').then((response)=>{
				this.GetEquipoTecnicaGenerador = response.data;
			})
			axios.get('/GetEquipoTecnicaEstanqueCombustibler').then((response)=>{
				this.GetEquipoTecnicaEstanqueCombustibler = response.data;
			})
			axios.get('/GetEquipoTecnicaControladorG').then((response)=>{
				this.GetEquipoTecnicaControladorG = response.data;
			})
			axios.get('/GetEquipoTecnicaControladorTTA').then((response)=>{
				this.GetEquipoTecnicaControladorTTA = response.data;

				var chart = am4core.create("chartEquipo", am4charts.PieChart);
				chart.data = [{

					"Equipo": "Grupo electrogeno",
					"litres":this.GetEquipoTecnicaGrupoElectrogeno,
				},{
					"Equipo": "Motor",
					"litres":this.GetEquipoTecnicaMotor,
				},{
					"Equipo": "Generador",
					"litres":this.GetEquipoTecnicaGenerador,
				},{
					"Equipo": "Estanque de combustibles",
					"litres":this.GetEquipoTecnicaEstanqueCombustibler,
				},{
					"Equipo": "Controlador GE",
					"litres":this.GetEquipoTecnicaControladorG,
				},{
					"Equipo": "Controlador TTA",
					"litres":this.GetEquipoTecnicaControladorTTA,
				}];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "Equipo";
})


		},
		GetGraficoEquipoEnergia:function(){
			var  inputGruposElectrogenos = document.getElementById('inputGruposElectrogenos');
			inputGruposElectrogenos.checked=false;
			var  inputPlantasRectificadora = document.getElementById('inputPlantasRectificadora');
			inputPlantasRectificadora.checked=false;

			axios.get('/GetEquipoTecnicaLineaElectrica').then((response)=>{
				this.EquipoLiniaElectrica = response.data;
			})
			axios.get('/GetEquipoTecnicaTransformador').then((response)=>{
				this.EquipoTransformador = response.data;
			})
			axios.get('/GetEquipoTecnicaCompactoDeMedida').then((response)=>{
				this.EquipoCompactoMedida = response.data;
				var chart = am4core.create("chartEquipo", am4charts.PieChart);
				chart.data = [{

					"Equipo": "Linea Electrica",
					"litres":this.EquipoLiniaElectrica,
				},{
					"Equipo": "Transformador",
					"litres":this.EquipoTransformador,
				},{
					"Equipo": "Compacto de medida",
					"litres":this.EquipoCompactoMedida,
				}];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "Equipo";
})


		},
		GetTotalesTecnica:function(){
			this.area = '';
			axios.get(`/TotalGrupoElectrogeno?area=${this.area}`).then((response)=>{
				this.TotalGrupoElectrogeno =Number( response.data);
			})
			axios.get(`/TotalPanelesSolares?area=${this.area}`).then((response)=>{
				this.TotalPanelesSolares =Number( response.data);
			})
			axios.get(`/TotalPlantaRectificadora?area=${this.area}`).then((response)=>{
				this.TotalPlantaRectificadora =Number( response.data);
			})
			axios.get(`/TotalBaterias?area=${this.area}`).then((response)=>{
				this.TotalBaterias =Number( response.data);
			})
			axios.get(`/Totaleolicos?area=${this.area}`).then((response)=>{
				this.Totaleolicos =Number( response.data);
			})
			axios.get(`/TotalAireAcondicionado?area=${this.area}`).then((response)=>{
				this.TotalAireAcondicionado =Number( response.data);
			})
			axios.get(`/TotalVentiladores?area=${this.area}`).then((response)=>{
				this.TotalVentiladores =Number( response.data);
			})
			axios.get(`/TotalEstructuraVertical?area=${this.area}`).then((response)=>{
				this.TotalEstructuraVertical =Number( response.data);
			})
			axios.get(`/TotalInfraestructura?area=${this.area}`).then((response)=>{
				this.TotalInfraestructura =Number( response.data);
			})
			axios.get(`/TotalCercoPerimetral?area=${this.area}`).then((response)=>{
				this.TotalCercoPerimetral =Number( response.data);
			})
			axios.get(`/TotalReforzamiento?area=${this.area}`).then((response)=>{
				this.TotalReforzamiento =Number( response.data);
			})
			axios.get(`/TotalDerrameCombustible?area=${this.area}`).then((response)=>{
				this.TotalDerrameCombustible =Number( response.data);
			})
			axios.get(`/TotalLineasElectricas?area=${this.area}`).then((response)=>{
				this.TotalLineasElectricas = response.data;
				var divTecnica = document.getElementById('tecnicas');
				var denergia = document.getElementById('DivEnergiaDisabled');
				var dclima = document.getElementById('DivClimaaDisabled');
				var DivOOCCDisabled = document.getElementById('DivOOCCDisabled');
				var DivMedioAMbienteDisabled=document.getElementById('DivMedioAMbienteDisabled');
				DivMedioAMbienteDisabled.style.display='none';
				DivOOCCDisabled.style.display='none';
				divTecnica.style.display='';
				dclima.style.display='none';
				denergia.style.display='none';

				if(this.area==''){
					this.NombreFiltro = '';
				}
				var chart = am4core.create("chartdiv2", am4charts.PieChart);
				chart.data = [{
					"Tencnica":"Lineas electricas",
					"litres": this.TotalLineasElectricas,

				}, {
					"Tencnica": "Groupos Electrogenos",
					"litres": this.TotalGrupoElectrogeno,
				}, {
					"Tencnica": "Plantas Rectificadoras",
					"litres": this.TotalPlantaRectificadora,
				},{
					"Tencnica": "Paneles Solares",
					"litres":this.TotalPanelesSolares,
				},{
					"Tencnica": "Baterias",
					"litres":this.TotalBaterias,
				},{
					"Tencnica": "Eolicos",
					"litres":this.Totaleolicos,
				},{
					"Tencnica": "Aire acondicionado",
					"litres":this.TotalAireAcondicionado,
				},{
					"Tencnica": "Ventiladores",
					"litres":this.TotalVentiladores,
				},{
					"Tencnica": "Estructura vertical",
					"litres":this.TotalEstructuraVertical,
				},{
					"Tencnica": "Infraestructura",
					"litres":this.TotalInfraestructura,
				},{
					"Tencnica": "Ceroco perimetral",
					"litres":this.TotalCercoPerimetral,
				},{
					"Tencnica": "Reforzamiento",
					"litres":this.TotalReforzamiento,
				},{
					"Tencnica": "Derrame combustible",
					"litres":this.TotalDerrameCombustible,
				}];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "Tencnica";
})

		},
	
		getGraficoEnergia:function(){

			axios.get(`/TotalGrupoElectrogeno?area=${this.area}`).then((response)=>{
				this.TotalGrupoElectrogeno =Number( response.data);
			})
			axios.get(`/TotalPanelesSolares?area=${this.area}`).then((response)=>{
				this.TotalPanelesSolares =Number( response.data);
			})
			axios.get(`/TotalPlantaRectificadora?area=${this.area}`).then((response)=>{
				this.TotalPlantaRectificadora =Number( response.data);
			})
			axios.get(`/TotalBaterias?area=${this.area}`).then((response)=>{
				this.TotalBaterias =Number( response.data);
			})
			axios.get(`/Totaleolicos?area=${this.area}`).then((response)=>{
				this.Totaleolicos =Number( response.data);
			})

			axios.get(`/TotalLineasElectricas?area=${this.area}`).then((response)=>{
				var divTecnica = document.getElementById('tecnicas');
				var denergia = document.getElementById('DivEnergiaDisabled');
				var dclima = document.getElementById('DivClimaaDisabled');
				var DivOOCCDisabled = document.getElementById('DivOOCCDisabled');
				var DivMedioAMbienteDisabled=document.getElementById('DivMedioAMbienteDisabled');
				var EquipoTecniaEnergia = document.getElementById('EquipoTecniaEnergia');
				var DivTecnicaEnergia = document.getElementById('DivTecnicaEnergia');
				DivMedioAMbienteDisabled.style.display='none';
				DivOOCCDisabled.style.display='none';
				divTecnica.style.display='none';
				dclima.style.display='none';
				denergia.style.display='';
				DivTecnicaEnergia.style.display = '';



				this.TotalLineasElectricas = response.data;
				if(this.area==1){
					this.NombreFiltro = 'Energía';
				}

				var chart = am4core.create("charEnergia", am4charts.PieChart);
				chart.data = [{
					"Tencnica":"Lineas electricas",
					"litres": this.TotalLineasElectricas,

				}, {
					"Tencnica": "Groupos Electrogenos",
					"litres": this.TotalGrupoElectrogeno,
				}, {
					"Tencnica": "Plantas Rectificadoras",
					"litres": this.TotalPlantaRectificadora,
				},{
					"Tencnica": "Paneles Solares",
					"litres":this.TotalPanelesSolares,
				},{
					"Tencnica": "Baterias",
					"litres":this.TotalBaterias,
				},{
					"Tencnica": "Eolicos",
					"litres":this.Totaleolicos,
				}];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "Tencnica";
})

		},
		getGraficoClima:function(){

			axios.get(`/TotalAireAcondicionado?area=${this.area}`).then((response)=>{
				this.TotalAireAcondicionado =Number( response.data);
			})
			axios.get(`/TotalVentiladores?area=${this.area}`).then((response)=>{
				this.TotalVentiladores =Number( response.data);
				var denergia = document.getElementById('DivEnergiaDisabled');
				var divTecnica = document.getElementById('tecnicas');

				var dclima = document.getElementById('DivClimaaDisabled');
				var DivOOCCDisabled = document.getElementById('DivOOCCDisabled');
				var DivMedioAMbienteDisabled=document.getElementById('DivMedioAMbienteDisabled');
				DivMedioAMbienteDisabled.style.display='none';
				DivOOCCDisabled.style.display='none';
				denergia.style.display='none';
				divTecnica.style.display='none';

				dclima.style.display='';

				if(this.area==2){
					this.NombreFiltro = 'Clima';
				}

				var chart = am4core.create("chartClima", am4charts.PieChart);
				chart.data = [{

					"Tencnica": "Aire acondicionado",
					"litres":this.TotalAireAcondicionado,
				},{
					"Tencnica": "Ventiladores",
					"litres":this.TotalVentiladores,
				}];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "Tencnica";
})


		},
		getGraficoOOCC:function(){

			axios.get(`/TotalEstructuraVertical?area=${this.area}`).then((response)=>{
				this.TotalEstructuraVertical =Number( response.data);
			})
			axios.get(`/TotalInfraestructura?area=${this.area}`).then((response)=>{
				this.TotalInfraestructura =Number( response.data);
			})
			axios.get(`/TotalCercoPerimetral?area=${this.area}`).then((response)=>{
				this.TotalCercoPerimetral =Number( response.data);
			})
			axios.get(`/TotalReforzamiento?area=${this.area}`).then((response)=>{
				this.TotalReforzamiento =Number( response.data);
				var denergia = document.getElementById('DivEnergiaDisabled');
				var divTecnica = document.getElementById('tecnicas');

				var dclima = document.getElementById('DivClimaaDisabled');
				var DivOOCCDisabled = document.getElementById('DivOOCCDisabled');
				var DivMedioAMbienteDisabled=document.getElementById('DivMedioAMbienteDisabled');
				DivMedioAMbienteDisabled.style.display='none';
				denergia.style.display='none';
				divTecnica.style.display='none';

				dclima.style.display='none';

				DivOOCCDisabled.style.display='';


				if(this.area==3){
					this.NombreFiltro = 'OO.CC';
				}

				var chart = am4core.create("chartOOCC", am4charts.PieChart);
				chart.data = [{

					"Tencnica": "Estructura vertical",
					"litres":this.TotalEstructuraVertical,
				},{
					"Tencnica": "Infraestructura",
					"litres":this.TotalInfraestructura,
				},{
					"Tencnica": "Ceroco perimetral",
					"litres":this.TotalCercoPerimetral,
				},{
					"Tencnica": "Reforzamiento",
					"litres":this.TotalReforzamiento,
				}];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "Tencnica";
})



		},

		getGraficoMedioAmbiente:function(){
			axios.get(`/TotalDerrameCombustible?area=${this.area}`).then((response)=>{
				this.TotalDerrameCombustible =Number( response.data);

				var denergia = document.getElementById('DivEnergiaDisabled');
				var divTecnica = document.getElementById('tecnicas');
				var dclima = document.getElementById('DivClimaaDisabled');
				var DivOOCCDisabled = document.getElementById('DivOOCCDisabled');
				var DivMedioAMbienteDisabled=document.getElementById('DivMedioAMbienteDisabled');
				DivMedioAMbienteDisabled.style.display='';
				denergia.style.display='none';
				divTecnica.style.display='none';
				dclima.style.display='none';
				DivOOCCDisabled.style.display='none';


				if(this.area==4){
					this.NombreFiltro = 'Medio ambiente';
				}
				var chart = am4core.create("chartMedioAmbiente", am4charts.PieChart);

				chart.data=[{
					"Tencnica": "Derrame combustible",
					"litres":this.TotalDerrameCombustible,
				}];
				// Add and configure Series
				var pieSeries = chart.series.push(new am4charts.PieSeries());
				pieSeries.dataFields.value = "litres";
				pieSeries.dataFields.category = "Tencnica";
			})
		},

		
	
	}

}
</script>


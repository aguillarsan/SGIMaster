<template>
    <div>
        <div class="main-content">
            <section class="section">
                <div class="section-header shadow-box-ag">
                    <h1>
                        Stock disponible de baterías
                    </h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 style="color: #191919">
                                    Stock
                                </h4>
                                <div class="card-header-form">
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Marca
                                                </th>
                                                <th>
                                                    Capacidad
                                                </th>
                                                <th>
                                                    Cantidad
                                                </th>
                                                <th>
                                                    Negocio
                                                </th>
                                            </tr>
                                        </thead>
                                        <th>
                                            <div id="SelectMarca">
                                                <select @change.prevent="GetBaterias()" class="form-control select" style="width: 50%" v-model="marcaId">
                                                    <option v-bind:value="1">
                                                        Northstar
                                                    </option>
                                                    <option v-bind:value="2">
                                                        PowerSafe
                                                    </option>
                                                    <option v-bind:value="3">
                                                        Narada
                                                    </option>
                                                    <option v-bind:value="7">
                                                        Generico
                                                    </option>
                                                    <option v-bind:value="8">
                                                        Leoch
                                                    </option>
                                                    <option v-bind:value="9">
                                                        Shoto
                                                    </option>
                                                    <option v-bind:value="10">
                                                        Hresys
                                                    </option>
                                                </select>
                                            </div>
                                            <div id="MarcaSelected" style="display: none">
                                                <span class="badge " style="background-color:#fea858;color:white;border-radius:3px;">
                                                    {{SelectMarcaLeter}}
                                                    <a @click.prevent="ClearMarca()" href="" style="color:white ">
                                                        <i class="fas fa-times-circle">
                                                        </i>
                                                    </a>
                                                </span>
                                            </div>
                                        </th>
                                        <th>
                                        </th>
                                        <th>
                                        </th>
                                        <th>
                                            <div id="SelectNegocio">
                                                <select @change.prevent="GetBaterias()" class="form-control select" style="width: 50%" v-model="negocioId">
                                                    <option v-bind:value="1">
                                                        Fijo
                                                    </option>
                                                    <option v-bind:value="2">
                                                        Móvil
                                                    </option>
                                                </select>
                                            </div>
                                            <div id="NegocioSelected" style="display: none">
                                                <span class="badge " style="background-color:#fea858;color:white;border-radius:3px;">
                                                    {{SelectNegocioLeter}}
                                                    <a @click.prevent="ClearNegocio()" href="" style="color:white ">
                                                        <i class="fas fa-times-circle">
                                                        </i>
                                                    </a>
                                                </span>
                                            </div>
                                        </th>
                                        <tbody>
                                            <tr v-for="bateria in baterias">
                                                <td>
                                                    {{bateria.marca.descripcion}}
                                                </td>
                                                <td>
                                                    {{bateria.capacidad.descripcion}}
                                                </td>
                                                <td>
                                                    {{bateria.cantidad}}
                                                    <a @click.prevent="ShowModalEditCantidad(bateria)" href="">
                                                        <i class="fas fa-edit boxBounce" style="font-size: 14px;">
                                                        </i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div v-if="bateria.negocio_id == 1">
                                                        <span class="badge" style="background-color:rgb(66, 232, 180);  color: white; font-size: 14px;">
                                                            {{bateria.negocio.descripcion}}
                                                        </span>
                                                    </div>
                                                    <div v-if="bateria.negocio_id == 2">
                                                        <span class="badge" style="background-color:#ed765e ; color: white;font-size: 14px;">
                                                            {{bateria.negocio.descripcion}}
                                                        </span>
                                                    </div>
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
        <div aria-hidden="true" class="modal inmodal" id="StockModal" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <h4 class="modal-title" style="color: #999999">
                            {{nombreEdit}} 
                        </h4>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>
                                Cantidad*
                            </label>
                            <input class="form-control" name="" type=""  v-model="cantidad">
                                <div id="errorDatosDespacho" style="display: none">
                                    <p style="color: red">
                                        Favor rellenar el campo
                                    </p>
                                </div>
                            </input>
                        </div>
                    </div>
                    <div class="modal-footer" >
                        <a @click.prevent="EditaCantidad()" class="btn btn-info " href="#" style="color:white">
                            Aceptar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';

import moment from 'moment';


export default {
	data(){
		return{
			
         baterias:[],
         marcaId:'',
        negocioId:'',
        SelectMarcaLeter:'',
        SelectNegocioLeter:'',
        bateriaId:'',
        cantidad:'',
        cantidaActual:'',
        nombreEdit:''

			


		}
	},

	created:function(){
         this.GetBaterias()
 
	},
	methods:{
		GetBaterias:function(){
			if(this.marcaId != ''){
				this.marcaSelec();
			}
			if(this.negocioId != ''){
				this.negocioSelec();
			}
			axios.get(`/getBateriaStock?marca=${this.marcaId}&negocio=${this.negocioId}`).then((response)=>{
				this.baterias = response.data
			})
		},
		ShowModalEditCantidad:function(bateria){
            this.bateriaId = bateria.id
            this.cantidaActual = bateria.cantidad
            this.nombreEdit = bateria.marca.descripcion+' '+bateria.capacidad.descripcion+' '+bateria.negocio.descripcion
            $('#StockModal').modal('show');
		},
		negocioSelec:function(){
            if(this.negocioId == 1){
              this.SelectNegocioLeter = 'Fijo'
            }else{
            	if(this.negocioId ==2){
                 this.SelectNegocioLeter = 'Móvil'
            	}
            }

			document.getElementById('NegocioSelected').style.display = 'block'
			document.getElementById('SelectNegocio').style.display = 'none'
		},
		EditaCantidad:function(){
            if(this.cantidad!= ''){
            	 $('#StockModal').modal('hide');
            	axios.get(`updateStockBatery?id=${this.bateriaId}&cantidad=${this.cantidad}`).then((response)=>{
            		this.cantidad = ''
                   this.GetBaterias()
            	})
            }
		},
		ClearNegocio:function(){
			  this.SelectNegocioLeter = ''
			  this.negocioId = ''
			  this.GetBaterias()
			document.getElementById('NegocioSelected').style.display = 'none'
			document.getElementById('SelectNegocio').style.display = 'block'
		},
		marcaSelec:function(){
			if(this.marcaId == 1){
                this.SelectMarcaLeter="Northstar"
			}else{
				if(this.marcaId == 2){
                   this.SelectMarcaLeter="PowerSafe"
				}else{
					if(this.marcaId == 3){
                      this.SelectMarcaLeter="Narada"
					}else{
						if(this.marcaId == 7){
							this.SelectMarcaLeter="Generico"

						}else{
							if(this.marcaId == 8){
								this.SelectMarcaLeter="Leoch"

							}else{
								if(this.marcaId == 9){
									this.SelectMarcaLeter="Shoto"

								}else{
									if(this.marcaId == 10){
										this.SelectMarcaLeter="Hresys"

									}
								}
							}
						}
					}
				}
			}

			document.getElementById('MarcaSelected').style.display = 'block'
			document.getElementById('SelectMarca').style.display = 'none'
		},
		ClearMarca:function(){

			document.getElementById('MarcaSelected').style.display = 'none'
			document.getElementById('SelectMarca').style.display = 'block'
			this.SelectMarcaLeter=''
			this.marcaId = ''
			this.GetBaterias()
		}
		

	}
}
</script>
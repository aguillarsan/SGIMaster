<template>
    <form action="" enctype="multipart/form-data">
        <div aria-hidden="true" class="modal inmodal" id="ModalEditSite" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                        <h5 class="modal-title" style="color:white">
                            Edición del sitio
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color:white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>
                            Sitio *
                        </label>
                        <input name="pop" type="hidden" v-bind:value="popid">
                            <input @click.prevent="
													changePop" class="form-control" id="popcheck" name="" style="display: none" type="text" value="">
                                <div id="popSearch">
                                    <input class="form-control" id="inputSitio" name="datositio" placeholder="Buscar Sitio" type="text" v-model="datositio" v-on:keyup="BuscarSitio" value="">
                                        <div class="row" id="listPops" style="display:none;">
                                            <div class="col-lg-12 col-md-4 col-sm-4 col-10 shadow-box-ag full-height-scroll " style="max-height:120px;overflow-y:auto">
                                                <div v-for="pop in pops">
                                                    <a @click.prevent="selectdpop(pop.id,pop.nem_site,pop.nombre)" href="" id="selectpopvalue" style="color:black">
                                                        {{pop.nem_site}} {{pop.nombre}}
                                                        <hr style="margin-top: -1px;"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </input>
                                </div>
                                <div id="errorPop" style="display: none">
                                    <p style="color: red">
                                        Favor Seleccionar el sitio
                                    </p>
                                </div>
                            </input>
                        </input>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" @click.prevent="EditSite" type="submit">
                            Aceptar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
<script>
import axios from 'axios';
import moment from 'moment';
import EventBus from "./event-bus"


export default {
	props: [ 'idticket' ],
	data(){
		return{
			
          	pops:[],
          	datositio:'',
          	popid:'',
          	dataPop:[],

		}
	},

	created:function(){



	

	},
	
	methods:{
		formato:function(d){
			return moment(d).format("DD/MM/YY - hh:mm:ss");
		},
		changePop: function() {
        var selectPop = document.getElementById('popcheck');
        var searchPop = document.getElementById('popSearch');
        searchPop.style.display = '';
        selectPop.style.display = 'none';
        this.popId = '';
        this.dataPop = '';
        $('#inputSitio').val('');
    },
    EditSite:function(){
      if (this.popid == '') {
            document.getElementById('errorPop').style.display = '';
        }
        if(this.popid != ''){
        	$('#ModalEditSite').modal('hide');
        	axios.get(`/editSite?ticketid=${this.$route.params.id}&site_id=${this.popid}`).then((response)=>{
        		 EventBus.$emit('ticket.editpop');
        		 ;
        		 let message = 'Sitio editado';
                 this.changePop()
        		 this.toastFunction(message);
        	
            	            
        	})
        }
    },

    BuscarSitio: function() {
        if (this.datositio.length >= 3) {
            var url = '/GetPop'
            var box = document.getElementById('listPops');
            box.style.display = '';
            axios.get(`/GetPop?datositio=${this.datositio}`).then((response) => {
                this.pops = response.data
            });
        } else {
            this.pops = '';
            var box = document.getElementById('listPops');
            box.style.display = 'none';
        }
    },
      selectdpop: function(id, nemSite, Nombre) {
        this.popid = id;
        var box = document.getElementById('listPops');
        var selectPop = document.getElementById('popcheck');
        var searchPop = document.getElementById('popSearch');
        var divAlertPop = document.getElementById('errorPop');
        this.pops = '';
        searchPop.style.display = 'none';
        selectPop.style.display = '';
        divAlertPop.style.display = 'none';
        box.style.display = 'none';
        $("#popcheck").val(nemSite + '-' + Nombre);
    },

     toastFunction: function(messaje) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            type: 'success',
            title: messaje
        })
    },
		
	
	
	}
}
</script>

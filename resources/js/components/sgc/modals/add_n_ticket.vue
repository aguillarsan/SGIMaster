<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="addNticket" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                           Agregar número de ticket
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button" @click.prevent="cleanthisData">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>
                                N° ticket*
                            </label>
                            <input type="text" class="form-control" v-model="nro_ticket" name="">
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="addticket" class="btn btn-info " href="#" style="color:white">
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
import EventBus from "../event-bus"


export default {
    data(){
        return{
         nro_ticket:'',
         solicitud_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalAddTicket', function (id) {
      
           

            self.ShowModal(id); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        cleanthisData:function(){
          this.nro_ticket = '';
          this.solicitud_id = '';
        },
        ShowModal:function(id){
            this.solicitud_id=id
            $('#addNticket').modal('show');
        },
       
       
        addticket:function(){
           
           if(this.nro_ticket != ''){
              
                axios.get(`/addticketSgc?solicitud_id=${this.solicitud_id}&nro_ticket=${this.nro_ticket}`).then((response)=>{
                	if(response.data == 1){
                         this.error_mensaje();
                	}else{
                		if(response.data == 0){
                           this.success_mensaje();
                           $('#addNticket').modal('hide');
                           this.loadFunction()
                           this.cleanthisData()
                           EventBus.$emit('sgc.showRefresh')
                		}
                	}
                    
                  
                })
           }else{
              if(this.nro_ticket == ''){
              
                  this.$swal({
                  type: 'error',
                  title: 'Error',
                  text:'Debe ingresar un número de ticket',
                  showCloseButton: true,
                 });
           
             }
           }   
        },
      
          
        loadFunction: function() {
           let loader = this.$loading.show({
            // Optional parameters
            container: this.fullPage ? null : this.$refs.formContainer,
            canCancel: true,
            onCancel: this.onCancel,
          });
           // simulate AJAX
           setTimeout(() => {
            loader.hide()
           }, 300)
        },

        error_mensaje:function(){

                  this.$swal({
                  type: 'error',
                  title: 'Error',
                  text:'El número de ticket ingresado no existe',
                  showCloseButton: true,
                 });
        },
        success_mensaje:function(){

                  this.$swal({
                  type: 'success',
                  title: 'Éxito',
                  text:'El número de ticket fue ingresado correctamente',
                  showCloseButton: true,
                 });
        }

          
        },
      
        
    }
</script>

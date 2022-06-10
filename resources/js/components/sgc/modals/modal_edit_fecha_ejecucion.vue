<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="edit_fecha_ejecucion" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                           Editar fecha de ejecución
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
                                Fecha de ejecución*
                            </label>
                            <input type="date" class="form-control" v-model="fecha_ejecucion" name="">
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="edit_fecha_ejecucion_func" class="btn btn-info " href="#" style="color:white">
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
         fecha_ejecucion:'',
         solicitud_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalEditFechaEjecucion', function (id) {
      
           

            self.ShowModal(id); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        cleanthisData:function(){
          this.fecha_ejecucion = '';
          this.solicitud_id = '';
        },
        ShowModal:function(id){
            this.solicitud_id=id
            $('#edit_fecha_ejecucion').modal('show');
        },
       
       
        edit_fecha_ejecucion_func:function(){
           
           if(this.fecha_ejecucion != ''){
              
                axios.get(`/edit-fecha-ejecucion?solicitud_id=${this.solicitud_id}&fecha_ejecucion=${this.fecha_ejecucion}`).then((response)=>{
                	
                  this.success_mensaje();
                  $('#edit_fecha_ejecucion').modal('hide');
                  this.loadFunction()
                  this.cleanthisData()
                  EventBus.$emit('sgc.showRefresh')
                		
                    
                  
                })
           }else{
              if(this.fecha_ejecucion == ''){
              
                  this.$swal({
                  type: 'error',
                  title: 'Error',
                  text:'Debe ingresar una fecha de ejecución',
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

       
        success_mensaje:function(){

                  this.$swal({
                  type: 'success',
                  title: 'Éxito',
                  text:'La fecha de ejecución fue editada correctamente',
                  showCloseButton: true,
                 });
        }

          
        },
      
        
    }
</script>

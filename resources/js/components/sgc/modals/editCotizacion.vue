<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="EditCotizacion" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 80px;">
                        <h5 class="modal-title" style="color: white">
                            Agregar / Editar cotización
                        </h5>
                        <button @click.prevent="cleanthisData" aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>
                                Nro° de cotización*
                            </label>
                            <input type="text" name="" class="form-control" v-model="cotizacion">
                        </div>
                     
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="updateCotizacionRequest" class="btn btn-info " href="#" style="color:white">
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
         cotizacion:'',
         solicitud_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalEditcotizacion', function (solicitud) {
      
           

            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        cleanthisData:function(){
          this.cotizacion = ''
         
        },
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud
            $('#EditCotizacion').modal('show');
      
        },
      
       
        updateCotizacionRequest:function(){
           if(this.cotizacion == ''){
                  this.$swal({
                    type: 'error',
                    title: 'Debes ingresar un número de cotización.',
                    showCloseButton: true,
                     });
           }else{
            if(this.cotizacion != ''){
               axios.get(`/UpdateCotizacionSgc?cotizacion=${this.cotizacion}&solicitud_id=${this.solicitud_id}`).then((respone)=>{
                  $('#EditCotizacion').modal('hide');
                   this.loadFunction()
                   this.toastfunction()
                   this.cleanthisData()
                   EventBus.$emit('sgc.showRefresh')
               })
            }
           }
             
        },
        toastfunction:function(){
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
           })
           Toast.fire({
            type: 'success',
            title: 'Cotización ingresada'
           })
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

          
      },
           
           

      
        
    }
</script>

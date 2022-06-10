<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="EditTipoPago" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Editar tipo de pago
                        </h5>
                        <button @click.prevent="closefunction" aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>
                                Tipos de pago*
                            </label>
                            <select  class="form-control select" v-model="tipo_pago_id">
                                <option v-bind:value="1">
                                    Fijo
                                </option>
                                <option v-bind:value="2">
                                    Variable
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="updateRequest" class="btn btn-info " href="#" style="color:white">
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
         tipo_pago_id:'',
     
    
         solicitud_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalTipoPago', function (solicitud) {
      
           
         
            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud
           
            $('#EditTipoPago').modal('show');
        },
     
        closefunction:function(){
          this.tipo_pago_id = ''
 
        },
        updateRequest:function(){
           if(this.tipo_pago_id != ''){
             axios.get(`/editTipoPagoSgc?solicitud_id=${this.solicitud_id}&tipo_pago_id=${this.tipo_pago_id}`).then((response)=>{
              
                $('#EditTipoPago').modal('hide');
                this.toastfunction()
                this.loadFunction()
                this.closefunction()
                EventBus.$emit('sgc.showRefresh')

             })
           }else{
             if(this.tipo_pago_id == ''){
                 this.$swal({
                  type: 'error',
                  title: 'Debe seleccionar una opción.',
                  showCloseButton: true,
                 });
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
            title: 'Tipo de pago editado'
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

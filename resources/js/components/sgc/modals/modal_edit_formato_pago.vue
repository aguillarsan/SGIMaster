<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="edit_formato_pago" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Editar formato de pago
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
                               formato de pago*
                            </label>
                           <select class="form-control select" v-model="tipo_gasto_id">
                               
                                <option v-bind:value="1"> Gasto Normal</option>
                                <option v-bind:value="2"> Gasto reembolsable</option>
                                <option v-bind:value="3"> Gasto recurrente</option>
                                <option v-bind:value="4"> Contingencia</option>
                           </select>
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="updateCodSapRequest" class="btn btn-info " href="#" style="color:white">
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
         tipo_gasto_id:'',
         solicitud_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalEditFormatoPago', function (solicitud) {
      
           

            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        cleanthisData:function(){
          this.tipo_gasto_id = '';
          this.solicitud_id = '';
        },
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud
            $('#edit_formato_pago').modal('show');
        },
       
       
        updateCodSapRequest:function(){
           
           if(this.tipo_gasto_id != ''){
              
                axios.get(`/update-formato-pago?solicitud_id=${this.solicitud_id}&tipo_gasto_id=${this.tipo_gasto_id}`).then((response)=>{
                    $('#edit_formato_pago').modal('hide');
                    this.loadFunction()
                    this.cleanthisData()
                    EventBus.$emit('sgc.showRefresh')
                    this.toastfunction()
                })
           }else{
              if(this.tipo_gasto_id == ''){
              
                  this.$swal({
                  type: 'error',
                  title: 'Error',
                  text:'Debe seleccionar un formato de pago',
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
            title: 'Formato de pago editado'
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

<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="finalizarSolicitud" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Finalizar solicitud
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>
                                Fecha Facturación*
                            </label>
                           <input type="date" name="" class="form-control" v-model="fecha_facturacion">
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-info " @click.prevent="FinalizarSolictudSgc" href="#" style="color:white">
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
         fecha_facturacion:'',
         
         solicitud_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalFinalizarSgc', function (solicitud) {
      
           
         
            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud
      
            $('#finalizarSolicitud').modal('show');
        },
      
      
        FinalizarSolictudSgc:function(){
           if(this.fecha_facturacion != ''){
             axios.get(`/FinalizarSolictudSgc?solicitud_id=${this.solicitud_id}&fecha_facturacion=${this.fecha_facturacion}`).then((response)=>{
              
                $('#finalizarSolicitud').modal('hide');
                this.toastfunction()
                this.loadFunction()
                this.descripcion= ''
           
                EventBus.$emit('sgc.showRefresh')
                EventBus.$emit('sgc.sendMail')

             })
           }else{
             if(this.fecha_facturacion == ''){
                 this.$swal({
                  type: 'error',
                  title: 'Debe indicar la fecha de facturación.',
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
            title: 'Solicitud finalizada  |1'
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

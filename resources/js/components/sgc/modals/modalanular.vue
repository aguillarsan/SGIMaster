<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="AnularSolicitud" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Anular solicitud
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
                                Motivo*
                            </label>
                            <textarea class="form-control" style="height:150px;" v-model="descripcion"></textarea>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-info " @click.prevent="AnularSolicitudSgc" href="#" style="color:white">
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
         descripcion:'',
         
         solicitud_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalAnularSgc', function (solicitud) {
      
           
         
            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud
            this.descripcion_old = solicitud.descripcion
            $('#AnularSolicitud').modal('show');
        },
      
      
        AnularSolicitudSgc:function(){
           if(this.descripcion != ''){
             axios.get(`/AnularSolicitudSgc?solicitud_id=${this.solicitud_id}&descripcion=${this.descripcion}`).then((response)=>{
              
                $('#AnularSolicitud').modal('hide');
                this.toastfunction()
                this.loadFunction()
                this.descripcion= ''
           
                EventBus.$emit('sgc.showRefresh')
                EventBus.$emit('sgc.sendMail')

             })
           }else{
             if(this.descripcion == ''){
                 this.$swal({
                  type: 'error',
                  title: 'Debe indicar el motivo de la anulación.',
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
            title: 'Solicitud Anulada'
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

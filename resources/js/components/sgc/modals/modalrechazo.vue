<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="ModalRechazo" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                           Rechazar solicitud
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
                                Motivo del rechazo*
                            </label>
                            <textarea class="form-control" v-model="descripcion" style="height:100px;"></textarea>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-info " @click.prevent="RechazoRequest" href="#" style="color:white">
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
         
         solicitud_id:'',
         solicitud_data:[]
            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalRechazo', function (solicitud) {
      
           
         
            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud.id
            this.solicitud_data = solicitud
         
            $('#ModalRechazo').modal('show');
        },
      
      
        RechazoRequest:function(){

           if(this.descripcion != ''){
             axios.get(`/RechazoSolicitud?solicitud_id=${this.solicitud_id}&descripcion=${this.descripcion}`).then((response)=>{
                $('#ModalRechazo').modal('hide');
                EventBus.$emit('sgc.showRefresh')
                this.toastfunction()
                if(this.solicitud_data.proceso_id == 15 && this.solicitud_data.subestado_id == 8 || this.solicitud_data.proceso_id == 15 && this.solicitud_data.subestado_id == 7  ){
                  axios.get(`/sendmailrechazosgc?user_id=${this.solicitud_data.user_id}&motivo_rechazo=${this.descripcion}&solicitud_id=${this.solicitud_data.id}`).then((response)=>{
                    
                  })
                }

              
                

                this.descripcion=''
           
                

             })
           }else{
             if(this.descripcion == ''){
                 this.$swal({
                  type: 'error',
                  title: 'Debe indicar el motivo del rechazo.',
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
            title: 'Solicitud rechazada'
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

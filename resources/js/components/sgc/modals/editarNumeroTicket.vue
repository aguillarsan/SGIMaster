<template>
	<div>
		  <div aria-hidden="true" class="modal inmodal" id="EditNumeroTicket" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Editar número de ticket
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
                                Número ticket
                            </label>
                           <input type="text" v-model="nro_ticket" class="form-control" name="">
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-info " @click.prevent="updateAreaRequest" href="#" style="color:white">
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
         
         

            
   

        }
    },

    created:function(){

        console.log(this.$route.params.id)

        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
       
       
      
    },
    methods:{
        
     
      
      
        updateAreaRequest:function(){
         
             axios.get(`/edit-numero-ticket-sgc?solicitud_id=${this.$route.params.id}&ticket_id=${this.nro_ticket}`).then((response)=>{
              
                $('#EditNumeroTicket').modal('hide');
                this.toastfunction()
                this.loadFunction()
           
                EventBus.$emit('sgc.showRefresh')

             })
         
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
            title: 'Número de ticket editado'
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
<template>
	<div>
		  <div aria-hidden="true" class="modal inmodal" id="editNameProject" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Editar nombre de proyecto
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
                                *Nombre de proyecto
                            </label>
                           <input type="text" v-model="name_project" class="form-control" name="">
                            
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
         name_project:'',
         
         

            
   

        }
    },

    created:function(){

       

        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
       
       
      
    },
    methods:{
        
     
      
      
        updateAreaRequest:function(){
         
             axios.get(`/sgc/edit/name/project?solicitud_id=${this.$route.params.id}&name_project=${this.name_project}`).then((response)=>{
              
                $('#editNameProject').modal('hide');
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
            title: 'Nombre de proyecto editado'
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
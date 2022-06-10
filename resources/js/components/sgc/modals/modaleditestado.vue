<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="EditEstado" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Editar estado
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
                                Estado*
                            </label>
                            <select class="form-control select barlow regular" v-model="proceso_id">
                                <option v-bind:value="proceso.id" v-for="proceso in procesos">
                                    {{proceso.descripcion}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                Sub Estado*
                            </label>
                            <select  class="form-control select barlow regular"  v-model="subproceso_id">
                                <option v-bind:value="subproceso.id" v-for="subproceso in subprocesos">
                                    {{subproceso.subestado}}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="updateState" class="btn btn-info " href="#" style="color:white">
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
        
         
         solicitud_id:'',
         procesos:[],
         subprocesos:[],
         subproceso_id:'',
         proceso_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalEditEstado', function (solicitud,estado,subestado) {
      
           
         
            self.ShowModal(solicitud,estado,subestado); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
        ShowModal:function(solicitud,estado,subestado){
            this.solicitud_id=solicitud.id
            this.procesos = estado 
            this.subprocesos = subestado
            $('#EditEstado').modal('show');
        },
      
      
        updateState:function(){
           if(this.proceso_id != '' && this.subproceso_id != ''){
             axios.get(`/EditEstadoSolicitud?solicitud_id=${this.solicitud_id}&subproceso_id=${this.subproceso_id}&proceso_id=${this.proceso_id}`).then((response)=>{
              
                $('#EditEstado').modal('hide');
                this.toastfunction()
                this.loadFunction()
           
                EventBus.$emit('sgc.RefreshTable')

             })
           }else{
             if(this.proceso_id == ''){
                 this.$swal({
                  type: 'error',
                  title: 'Error',
                  text:'Debe indicar el estado.',
                  showCloseButton: true,
                 });
             }else{
              if(this.subproceso_id == ''){
                  this.$swal({
                  type: 'error',
                  title: 'Error',
                  text:'Debe indicar el sub estado.',
                  showCloseButton: true,
                 });
              }
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
            title: 'Estado editado'
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

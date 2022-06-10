<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="EditPmProyecto" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Editar Pm del proyecto
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button" @click.prevent="closefunction">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>
                                Pm proyecto*
                            </label>
                            <select class="form-control select" v-model="pm_proyecto_id">
                                <option v-for="pm_proyecto in pm_proyectos" v-bind:value="pm_proyecto.id">{{pm_proyecto.nombre_completo}}</option>
                            </select>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-info " @click.prevent="updateRequest" href="#" style="color:white">
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
         pm_proyecto_id:'',
         pm_proyectos:[],
    
         solicitud_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalPmProyecto', function (solicitud) {
      
           
         
            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud
            this.getPmproyecto()
            $('#EditPmProyecto').modal('show');
        },
        getPmproyecto:function(){
            axios.get('/GetPmProyecto').then((response) => {
              this.pm_proyectos = response.data
          })
        },
        closefunction:function(){
          this.pm_proyecto_id = ''
          this.pm_proyectos=[]
        },
        updateRequest:function(){
           if(this.pm_proyecto_id != ''){
             axios.get(`/editPmProyectoSgc?solicitud_id=${this.solicitud_id}&pm_proyecto_id=${this.pm_proyecto_id}`).then((response)=>{
              
                $('#EditPmProyecto').modal('hide');
                this.toastfunction()
                this.loadFunction()
                this.closefunction()
                EventBus.$emit('sgc.showRefresh')

             })
           }else{
             if(this.pm_proyecto_id == ''){
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
            title: 'Pm de proyecto editado'
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

<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="EditTipoTrabajoIng" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Editar Tipo de trabajo
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
                                Tipo trabajo*
                            </label>
                            <select class="form-control select" v-model="tipo_trabajo_id">
                                <option v-for="tipo_trabajo in tipo_trabajos" v-bind:value="tipo_trabajo.id">
                                    {{tipo_trabajo.nombre_trabajo_ingenieria}}
                                </option>
                                
                            </select>
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="updateProveedorRequest" class="btn btn-info " href="#" style="color:white">
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
         tipo_trabajo_id:'',
         tipo_trabajos:[],
      
         solicitud_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalEditTipoTrabajoIng', function (solicitud) {
      
           

            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        cleanthisData:function(){
          this.tipo_trabajos = []
          this.tipo_trabajo_id = ''
          this.solicitud_id = ''
        },
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud
            this.getTipoTrabajo()
            $('#EditTipoTrabajoIng').modal('show');
        },
        getTipoTrabajo:function(){
            axios.get('/GetTipoTrabajoIng').then((response) => {
                this.tipo_trabajos = response.data;
            })
        },
       
        updateProveedorRequest:function(){
           
           if(this.tipo_trabajo_id != ''){
              
                axios.get(`/tipoTrabajoIngupdateSgc?solicitud_id=${this.solicitud_id}&tipo_trabajo_id=${this.tipo_trabajo_id}`).then((response)=>{
                    $('#EditTipoTrabajoIng').modal('hide');
                    this.loadFunction()
                    this.cleanthisData()
                    EventBus.$emit('sgc.showRefresh')
                    this.toastfunction()
                })
           }else{
              if(this.tipo_trabajo_id == ''){
              
                  this.$swal({
                  type: 'error',
                  title: 'Debe seleccionar un tipo de trabajo.',
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
            title: 'Tipo de trabajo editado'
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

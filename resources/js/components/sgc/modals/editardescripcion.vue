<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="EditDescripcion" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Editar descripción
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
                                Descripción*
                            </label>
                            <textarea class="form-control" v-model="descripcion_old">{{descripcion_old}}</textarea>
                            
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
         descripcion_old:'',
         
         solicitud_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalEditDescripcion', function (solicitud) {
      
           
         
            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud.id
            this.descripcion_old = solicitud.descripcion
            $('#EditDescripcion').modal('show');
        },
      
      
        updateAreaRequest:function(){
           if(this.descripcion_old != ''){
             axios.get(`/editDescripcionSgc?solicitud_id=${this.solicitud_id}&descripcion=${this.descripcion_old}`).then((response)=>{
              
                $('#EditDescripcion').modal('hide');
                this.toastfunction()
                this.loadFunction()
           
                EventBus.$emit('sgc.showRefresh')

             })
           }else{
             if(this.descripcion_old == ''){
                 this.$swal({
                  type: 'error',
                  title: 'Debe indicar la descripción.',
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
            title: 'Descripción de trabajo editada'
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

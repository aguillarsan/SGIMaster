<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="EditArea" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Editar área
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
                                Área*
                            </label>
                            <select class="form-control select" v-model="area_id">
                                <option v-for="area in areas" v-bind:value="area.id">{{area.area}}</option>
                            </select>
                            
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
         area_id:'',
         areas:[],
    
         solicitud_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalEditAreaTrabajo', function (solicitud) {
      
           
         
            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud
            this.getArea()
            $('#EditArea').modal('show');
        },
        getArea:function(){
            axios.get('/GetAreaTrabajo').then((response) => {
                this.areas = response.data;
            }) 
        },
        closefunction:function(){
          this.area_id = ''
          this.areas=[]
        },
        updateAreaRequest:function(){
           if(this.area_id != ''){
             axios.get(`/editAreaTrabajoSgc?solicitud_id=${this.solicitud_id}&area_id=${this.area_id}`).then((response)=>{
              
                $('#EditArea').modal('hide');
                this.toastfunction()
                this.loadFunction()
                this.closefunction()
                EventBus.$emit('sgc.showRefresh')

             })
           }else{
             if(this.area_id == ''){
                 this.$swal({
                  type: 'error',
                  title: 'Debe seleccionar el área de trabajo.',
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
            title: 'Área de trabajo editada'
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

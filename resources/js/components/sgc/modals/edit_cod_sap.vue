<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="editCodSap" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Editar código SAP
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
                                Código SAP*
                            </label>
                            <input type="text" class="form-control" v-model="cod_sap" name="">
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="updateCodSapRequest" class="btn btn-info " href="#" style="color:white">
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
         cod_sap:'',
         solicitud_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalEditCodSap', function (solicitud) {
      
           

            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        cleanthisData:function(){
          this.cod_sap = '';
          this.solicitud_id = '';
        },
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud
            $('#editCodSap').modal('show');
        },
       
       
        updateCodSapRequest:function(){
           
           if(this.cod_sap != ''){
              
                axios.get(`/codSapUpdate?solicitud_id=${this.solicitud_id}&cod_sap=${this.cod_sap}`).then((response)=>{
                    $('#editCodSap').modal('hide');
                    this.loadFunction()
                    this.cleanthisData()
                    EventBus.$emit('sgc.showRefresh')
                    this.toastfunction()
                })
           }else{
              if(this.cod_sap == ''){
              
                  this.$swal({
                  type: 'error',
                  title: 'Debe ingresar un código SAP',
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

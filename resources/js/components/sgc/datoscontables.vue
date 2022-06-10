<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="EditDatosContables" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 80px;">
                        <h5 class="modal-title" style="color: white">
                            Editar\Agregar tipo de boleta                        
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button" @click.prevent="cleanthisData">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" >
                            <label>
                                Tipo Boleta*
                            </label>
                            <select  class="form-control select" v-model="tipo_boleta_id">
                                <option v-bind:value="Tipo_boleta.id" v-for="Tipo_boleta in Tipo_boletas">
                                    {{Tipo_boleta.descripcion}}
                                </option>
                            </select>
                        </div>
                         <div class="form-group" >
                             <label>
                                Nro boleta*
                            </label>
                            <input type="text" name="" class="form-control" v-model="nro_boleta">
                         </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-info " @click.prevent="updateBoletasgc" href="#" style="color:white">
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
import EventBus from "./event-bus"


export default {
    data(){
        return{
        
           
            idSolicitud:'',
            tipo_boleta_id :'',
            Tipo_boletas:[],
            nro_boleta:''
            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('show.modalEditDatoContable', function (solicitud) {
            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
           
        });
     
      
    },
    methods:{
        formato:function(d){
            return moment(d).format("DD/MM/YY - hh:mm:ss");
        },
        ShowModal:function(solicitud){
             this.idSolicitud = solicitud
             $('#EditDatosContables').modal('show');
             this.getDataBoleta()
        },

        getDataBoleta:function(){
           
                axios.get('/GetTipoBoleta').then((response) => {
                this.Tipo_boletas = response.data;
                })
        
         },  
         updateBoletasgc:function(){
           if(this.tipo_boleta_id == ''){
               this.$swal({
                    type: 'error',
                    title: 'Debe seleccionar un tipo de boleta.',
                    showCloseButton: true,
                     });
           }else{
             if(this.nro_boleta == ''){
                 this.$swal({
                    type: 'error',
                    title: 'Debe ingresar un nro° de boleta.',
                    showCloseButton: true,
                     });
             }else{
                 if(this.tipo_boleta_id != '' && this.nro_boleta!= ''){

                    if(this.tipo_boleta_id == 3){
                            
                            axios.get(`/pep-blocked?pep=${this.nro_boleta}`).then(response=>{
                                
                                if (response.data == 1) {
                                  this.$swal({
                                  type: 'error',
                                  title: 'Error',
                                  text: 'El PEP ' + ' ' + '"'+this.nro_boleta +'"'+ ' ' + ' se encuentra bloqueado actualmente, favor contactar a jefatura directa para mayor información.',
                                  showCloseButton: true,
                                  });
                                  this.nro_boleta = '';
                                }else{
                                   
                                    this.guardar_dato_contable()
                                    this.sendMail()
                                }
                            })
                    }else{
                       this.guardar_dato_contable()

                    }
                 
                 }
             }
           }
         },
         guardar_dato_contable:function(){
                 axios.get(`/updateTipoBoleta?tipo_boleta_id=${this.tipo_boleta_id}&nro_boleta=${this.nro_boleta}&solicitud_id=${this.idSolicitud}`).then((response)=>{
                                $('#EditDatosContables').modal('hide')
                                 this.loadFunction()
                                 this.cleanthisData()
                                 EventBus.$emit('sgc.showRefresh')
                                 this.toastfunction()
                        })
         },
         sendMail(){
             
                axios.get('/send/mail/update/data/notification',{
                    params: {
                        'plataforma':2,
                        'solicitud_id':this.$route.params.id,
                       
                    }
                }).then(response=>{
                console.log(response.data)
                })
            },
         cleanthisData:function(){
              this.idSolicitud = ''
              this.tipo_boleta_id = ''
              this.Tipo_boletas = []
              this.nro_boleta = ''
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
            title: 'Boleta editada'
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

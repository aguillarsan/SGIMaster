<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="EditCosto" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Editar costos
                        </h5>
                        <button @click.prevent="cleanthisData" aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>
                                Tipo moneda*
                            </label>
                            <select class="form-control select" v-model="tipo_moneda_id">
                                <option v-bind:value="tipo_moneda.id" v-for="tipo_moneda in tipo_monedas">
                                    {{tipo_moneda.moneda}}
                                </option>
                            </select>
                        </div>
                        <div v-if="solicitud_data.area_creadora_id == null">
                            <div class="form-group">
                                <label>
                                    Activo
                                </label>
                                <currency-input class="form-control "  currency="USD" locale="de" v-model="activo">
                                </currency-input>
                            </div>
                            <div class="form-group">
                                <label>
                                    Servicio
                                </label>
                                <currency-input class="form-control " currency="USD" locale="de" v-model="servicio">
                                </currency-input>
                            </div>
                        </div>
                        <div class="form-group" v-if="solicitud_data.area_creadora_id == 1">
                            <label>
                                Costo total*
                            </label>
                            <currency-input class="form-control " currency="USD" locale="de" v-model="activo_servicio">
                            </currency-input>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="updatecostosRequest" class="btn btn-info " href="#" style="color:white">
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
         tipo_moneda_id:'',
         tipo_monedas:[],
         activo:0,
         servicio:0,
         activo_servicio:0,
      
         solicitud_data:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalEditCosto', function (solicitud) {
      
           

            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        cleanthisData:function(){
          this.tipo_trabajos = []
          this.tipo_trabajo_id = ''
          this.solicitud_id = ''
          this.tipo_moneda_id = ''
          this.tipo_monedas = []
          this.activo = ''
          this.servicio= ''
          this.activo_servicio= null
          this.solicitud_data=''
        },
        ShowModal:function(solicitud){
            this.solicitud_data=solicitud
            this.getTipoMonedas()
            $('#EditCosto').modal('show');
        },
        getTipoMonedas:function(){
              axios.get('/GetTipoMoneda').then((response) => {
                this.tipo_monedas = response.data;
            })
        },
       
        updatecostosRequest:function(){
           
             if(this.solicitud_data.area_creadora_id == null){
                   if(this.tipo_moneda_id == ''){
                    this.$swal({
                    type: 'error',
                    title: 'Error',
                    text:'Debe seleccionar un tipo de moneda.',
                   
                    showCloseButton: true,
                     });
                   }else{
                      if(this.activo == 0  && this.servicio  == 0  ){
                         this.$swal({
                          type: 'error',
                          title: 'Error',
                          text:'Debe ingresar un activo o servicio.',
                          showCloseButton: true,
                         });
                      }else{
                           if(this.activo  != 0 || this.servicio != 0){
                             axios.get(`/editCostosSgc?solicitud_id=${this.solicitud_data.id}&activo=${this.activo}&servicio=${this.servicio}&activo_servicio=${this.activo_servicio}&tipo_moneda_id=${this.tipo_moneda_id}`).then((response)=>{
                               
                                 $('#EditCosto').modal('hide')
                                 this.loadFunction()
                                 this.cleanthisData()
                                 EventBus.$emit('sgc.showRefresh')
                                 EventBus.$emit('sgc.RefreshTable')
                                 this.toastfunction()
                             })
                           }
                      } 
                   }
             }else{
               if(this.solicitud_data.area_creadora_id == 1){
                  if(this.tipo_moneda_id == ''){
                      this.$swal({
                      type: 'error',
                      title: 'Error',
                      text:'Debe seleccionar un tipo de moneda.',
                      showCloseButton: true,
                     });
                  }else{
                      if(this.activo_servicio == 0){
                          this.$swal({
                          type: 'error',
                          title: 'Error',
                          text:'Debe ingresar el monto.',
                          showCloseButton: true,
                        });
                      }else{
                         if(this.tipo_moneda_id != '' && this.activo_servicio != 0){
                            
                                  axios.get(`/editCostosSgc?solicitud_id=${this.solicitud_data.id}&activo=${this.activo}&activo_servicio=${this.activo_servicio}&tipo_moneda_id=${this.tipo_moneda_id}&servicio=${this.servicio}`).then((response)=>{
                                 console.log(response.data)
                                 $('#EditCosto').modal('hide')
                                 this.loadFunction()
                                 this.cleanthisData()
                                 EventBus.$emit('sgc.showRefresh')
                                 this.toastfunction()
                                 EventBus.$emit('sgc.RefreshTable')
                               })
                           
                        }
                     }
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
            title: 'Monto editado'
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

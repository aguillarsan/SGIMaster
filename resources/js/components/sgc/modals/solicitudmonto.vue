<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="solicitudmonto" role="dialog" tabindex="-1">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title barlow bold" style="color: white">
                            Solicitud de liberacion de pago
                        </h5>
                        <button @click.prevent="closefunction" aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="barlow semi_bold">
                                Formato*
                            </label>
                            <select @change.prevent="setType" class="form-control select barlow regular" v-model="formato_id">
                                <option v-bind:value="1">
                                    Porcentaje
                                </option>
                                <option v-bind:value="2">
                                    Pesos
                                </option>
                            </select>
                        </div>
                        <div class="form-group" id="monto" style="display:none">
                            <label class="barlow semi_bold">
                                {{type}}*
                            </label>
                            <input class="form-control" name="" type="number" v-model="monto_solicitado">
                            </input>
                        </div>
                        <div class="form-group" >
                            <label class="barlow semi_bold">
                                Informe final*
                            </label>
                            <input @change.prevent="ShowFilesinf" class="form-control" id="informe_parcial_solicitud_monto" multiple="true" name="" ref="informe_parcial_solicitud_monto" type="file">
                                <div class="file-listing " v-for="(file, key) in archivos">
                                    <div>
                                        <div style="margin-top: 8px;">
                                        </div>
                                        <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                            {{ file.name }}
                                            <a href="#" v-on:click="removeFiles( key )">
                                                <i class="fas fa-times-circle boxBounce" style="color:white">
                                                </i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </input>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="SendRequest" class="btn btn-info " href="#" style="color:white">
                            Guardar
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
         formato_id:'',
         type:'',
         monto_solicitado:'',
         solicitud_informe_final:'',
         solicitud_guia_despacho:'',
         archivos:[],
         solicitar_informe_parcial:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.SolicitudMonto', function (solicitud) {
      
            
         
            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
    ShowModal: function(solicitud) {
        this.solicitud_id = solicitud.id;
        this.solicitud_informe_final = solicitud.informefinal;
        this.solicitud_guia_despacho = solicitud.guiadespacho;
        if(this.solicitud_informe_final != null || this.solicitud_guia_despacho != null){
          this.solicitar_informe_parcial = 0;
        }else{
          this.solicitar_informe_parcial = 1;
        }
        $('#solicitudmonto').modal('show');
    },
    setType: function() {
        if (this.formato_id == 1) {
            this.type = 'indique el monto en Procentaje'
            document.getElementById("monto").style.display = 'block'
        } else {
            if (this.formato_id == 2) {
                this.type = 'indique el monto en pesos'
                document.getElementById("monto").style.display = 'block'
            }
        }
    },
    closefunction: function() {
         this.formato_id=''
         this.type=''
         this.monto_solicitado=''
         $("#informe_parcial_solicitud_monto").val('');
         this.archivos = []
         $('#solicitudmonto').modal('hide');
         document.getElementById("monto").style.display = 'none'
    },
    SendRequest: function() {
       
           
                if (this.type == '') {
                    this.$swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Debe indicar el formato del monto',
                        showCloseButton: true,
                    });
                } else {
                    if (this.monto_solicitado == '') {
                        this.$swal({
                            type: 'error',
                            title: 'Error',
                            text: 'Debe indicar el monto',
                            showCloseButton: true,
                        });
                    } else {
                        if (this.archivos.length == 0) {
                            this.$swal({
                                type: 'error',
                                title: 'Error',
                                text: 'Debe cargar un informe liberación de pago',
                                showCloseButton: true,
                            });
                        }else{
                          if(this.monto_solicitado != '' && this.type != '' && this.archivos.length != 0 ){
                              let form = new FormData();
                             for( var i = 0; i < this.archivos.length; i++ ){
                             let file = this.archivos[i];
                               form.append('files[' + i + ']', file);
                             }
                             form.append('solicitud_id', this.solicitud_id)
                             form.append('formato_id', this.formato_id)
                             form.append('monto_solicitado', this.monto_solicitado) 
                             axios.post('/requestAmount',form,
                             {
                               headers:{
                                 'Content-Type': 'multipart/form-data'
                               },
                             }).then((response=>{
                                this.closefunction();
                                this.alert(response.data)
                                EventBus.$emit('sgc.RefrheshFiles')
                                EventBus.$emit('sgc.refreshMontos')
                              
                             })) 
                          }
                       }
                    }
                }
            
        
    },
    toastfunction: function() {
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

    ShowFilesinf: function(e) {
            let Files_inf = this.$refs.informe_parcial_solicitud_monto.files;
              
           for( var i = 0; i < Files_inf.length; i++ ){
             this.archivos.push( Files_inf[i] );
            }
           
    },
    removeFiles( key ){
        this.archivos.splice( key, 1 );
        $("#informe_parcial_solicitud_monto").val('');
        
    },
    alert:function(m){
         this.$swal({
                type: 'info',
                title: m,
                showCloseButton: true,
          });
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

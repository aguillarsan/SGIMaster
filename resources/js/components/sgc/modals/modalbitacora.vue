<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="BitacoraJefeArea" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Bitácora
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card chat-box " id="mychatbox" style="width: 100%; height: 100%">
                            <div class="card-body chat-content">
                                <div v-for="bitacora in bitacoras">
                                    <div class="chat-item chat-left" style="">
                                        <img v-bind:src="bitacora.user.avatar">
                                            <div class="chat-details">
                                                <div class="chat">
                                                    {{bitacora.user.name}} {{bitacora.user.apellido}}
                                                </div>
                                                <div class="chat-text">
                                                    {{bitacora.mensaje}}
                                                </div>
                                                <div class="chat-time">
                                                    {{formato2(bitacora.created_at)}}
                                                </div>
                                            </div>
                                        </img>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-info " data-dismiss="modal" href="#" style="color:white">
                            Cerrar
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
   
         bitacoras:[],
    
         solicitud_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.bitacorasgcJefe', function (solicitud) {
      
           
         
            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        formato2:function(d){
            return moment(d).format("DD/MM/YY - hh:mm:ss");
        },
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud
            this.getBitacora()
            $('#BitacoraJefeArea').modal('show');
        },
        getBitacora:function(){
             axios.get('/GetBitacoraSgc/'+this.solicitud_id).then((response)=>{
             this.bitacoras = response.data
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

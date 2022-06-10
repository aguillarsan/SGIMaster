<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="modalAprobarMonto" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg" style="min-width: 1000px;">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title barlow bold" style="color: white">
                            Montos solicitados
                        </h5>
                        <button @click.prevent="closefunction" aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class=" table-responsive table project-list">
                            <table class="table table-striped table-md table-hover" v-if="load_request == 0">
                                <thead>
                                    <tr>
                                        <th class="barlow bold text_c">
                                            Monto total
                                        </th>
                                        <th class="barlow bold text_c">
                                            Monto solicitado en pesos
                                        </th>
                                        <th class="barlow bold text_c">
                                            Monto solicitado en %
                                        </th>
                                        <th class="barlow bold text_c">
                                            Monto restantesty
                                        </th>
                                        <th class="barlow bold text_c">
                                            Fecha de solicitud
                                        </th>
                                        <th class="barlow bold ">
                                            Estado
                                        </th>
                                        <th class="barlow bold ">
                                            DAS
                                        </th>
                                        <th class="barlow bold ">
                                            #
                                        </th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <tr v-for="(monto_solicitado, index) in montos_solicitados">
                                        <td class="barlow regular text_c">
                                            ${{monto_solicitado.monto_total | currency}}
                                        </td>
                                        <td class="barlow regular text_c">
                                            ${{monto_solicitado.monto_solicitado | currency}}
                                        </td>
                                        <td class="barlow regular text_c">
                                            {{monto_solicitado.monto_solicitado_porcentaje }}
                                        </td>
                                        <td class="barlow regular text_c">
                                            {{monto_solicitado.monto_restante }}
                                        </td>
                                        <td class="barlow regular text_c">
                                            {{formato(monto_solicitado.created_at)}}
                                        </td>
                                        <td>
                                            <div v-if="monto_solicitado.estado == 1">
                                                <span class="badge badge-warning barlow regular text_c" style="border-radius: 5px;font-size: 13px">
                                                    Pendiente
                                                </span>
                                            </div>
                                            <div v-if="monto_solicitado.estado == 2">
                                                <span class="badge badge-success barlow regular text_c" style="border-radius: 5px;font-size: 13px">
                                                    Aprobado
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <input class="form-control" name="" type="text" v-bind:style="monto_solicitado.estado==2? 'display:none':''" v-if="aprobar_liberaciones ==1 " v-model="das[index]">
                                            </input>
                                        </td>
                                        <td>
                                            <button @click="SendRequest(index,monto_solicitado.id)" class="btn boxBounce" style="background-color:rgb(66, 232, 180);color:white;box-shadow: 0 2px 6px rgb(66, 232, 180);" v-bind:style="monto_solicitado.estado==2? 'display:none':''" v-if="aprobar_liberaciones ==1 ">
                                                <i class="fas fa-check">
                                                </i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="col-12 col-md-12 col-sm-12" v-if="load_request == 1">
                                <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                    <div class="card-body">
                                        <div class="empty-state" data-height="400">
                                            <div class="d-flex justify-content-center">
                                                <div class="spinner-border text-primary" role="status" style="width: 8rem;height: 8rem;color: #007bff!important;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); ">
                     <button class="btn btn-secondary boxBounce" style="box-shadow: 0 0px 0px;color: #191919"  data-dismiss="modal" type="button">
                         Cerrar
                     </button>
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
    props:['montos_pendientes','aprobar_liberaciones'],
    data(){
        return{
         
         solicitud_id:'',
        
         montos_solicitados:[],
         das:[],
         aprobar:[],
         load_request:0

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.AprobarMonto', function (solicitud) {
      
            
         
            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
    ShowModal: function(solicitud) {
      
        this.montos_solicitados = this.montos_pendientes
        this.solicitud_id = solicitud.id
        
        
        $('#modalAprobarMonto').modal('show');
    },
     formato:function(d){
            return moment(d).format("DD/MM/YY");
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
         $('#modalAprobarMonto').modal('hide');
         document.getElementById("monto").style.display = 'none'
    },
    SendRequest: function(i,monto_id) {
         
         let nro_das = this.das[i]
         if(nro_das == undefined || nro_das == ''){
             this.$swal({
                type: 'error',
                title:'Error',
                text: 'Debes ingresar el nro° de DAS',
                showCloseButton: true,
            });
         }else{
            if(nro_das != undefined || nro_das != ''){
                this.load_request = 1;
               let form = new FormData();
               form.append('solicitud_id', this.solicitud_id)
               form.append('monto_id', monto_id)
               form.append('das',nro_das)
               axios.post('/aprobraMontoLiberacionPago',form).then((response)=>{
                console.log(response.data)
                  axios.get('/montosSolicitados/'+this.$route.params.id).then((response)=>{
                  
                   this.montos_solicitados = response.data
                   
                    EventBus.$emit('sgc.showRefresh')
                   EventBus.$emit('sgc.refreshMontos')
                  }).finally(()=>this.load_request = 0)
              })
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

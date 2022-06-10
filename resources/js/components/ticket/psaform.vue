<template>
    <div>
        <form method="POST" v-on:submit.prevent="create_request_psa">
            <div aria-hidden="true" class="modal inmodal" id="form_psa_request_ticket" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                            <h5 class="modal-title barlow semi_bold" style="color: white;">
                                Formulario
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" class="blanco">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label class="barlow semi_bold">
                                            Activo *
                                        </label>
                                        <select class="form-control select" v-model="activoId">
                                            <option v-bind:value="activo.id" v-for="activo in activos">
                                                {{activo.descripcion}}
                                            </option>
                                        </select>
                                        <div id="errorActivo" style="display: none">
                                            <p style="color: red">
                                                Favor seleccionar el activo
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="barlow semi_bold">
                                            Descripción *
                                        </label>
                                        <textarea class="form-control" style="height: 100px;" v-model="descripcion">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label class="barlow semi_bold" v-if="activoId == 1">
                                            Total baterías (unidad) *
                                        </label>
                                        <label class="barlow semi_bold" v-if="activoId != 1">
                                            Total activos *
                                        </label>
                                        <div class="input-group">
                                            <input class="form-control" name="" type="number" v-model="cantidad"/>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-boxes">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="errorCantidad" style="display: none">
                                            <p style="color: red">
                                                Favor indicar la cantidad
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group" v-if="activoId==1">
                                        <label class="barlow semi_bold">
                                            Prioritario *
                                        </label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input class="selectgroup-input" name="value" type="radio" v-model="prioridad_select" value="1"/>
                                                <span class="selectgroup-button">
                                                    Si
                                                </span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input class="selectgroup-input" name="value" type="radio" v-model="prioridad_select" value="2"/>
                                                <span class="selectgroup-button">
                                                    No
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="barlow semi_bold">
                                            Motivo *
                                        </label>
                                        <select class="form-control select" v-model="motivoId">
                                            <option v-bind:value="motivo.id" v-for="motivo in motivos">
                                                {{motivo.descripcion}}
                                            </option>
                                        </select>
                                        <div id="errorMotivo" style="display: none">
                                            <p style="color: red">
                                                Favor Seleccionar el motivo
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="barlow semi_bold">
                                            Flujo simple? *
                                        </label>
                                        <select  class="form-control select" v-model="flujo_simple">
                                            <option :value="1">
                                                Si
                                            </option>
                                            <option :value="0">
                                                No
                                            </option>
                                        </select>
                                        <div id="error_flujo_simple" style="display:none">
                                            <p style="color:red">
                                                Favor seleccionar una opción
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal" style="color: white" type="button">
                                Cerrar
                            </button>
                            <button class=" btn btn-info "  @click="create_request_psa()" style="color: white" type="button">
                                Crear
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import axios from 'axios';
import moment from 'moment';
import EventBus from "../event-bus"


export default {
    data(){
        return{
         activoId:'',
         descripcion:'',
         cantidad:'',
         prioridad_select:'',
         motivoId:'',
         activos:[],
         motivos:[],
         flujo_simple:null
            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('ticket.show_modal_psa_form', function () {
           self.ShowModal(); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
        ShowModal:function(){
           axios.get('/GetActivo').then((response) => {
               this.activos = response.data;
           })
           axios.get('/GetMotivo').then((response) => {
               this.motivos = response.data;
           })
            $('#form_psa_request_ticket').modal('show');
        },
        create_request_psa:function(){
            console.log("hola")
            if(this.activoId != '' && this.cantidad != '' && this.descripcion != '' && this.motivoId != '' && this.flujo_simple != null ){
                axios.get(`/request-ticket-psa?activo=${this.activoId}&total_activo=${this.cantidad}&descripcion=${this.descripcion}&motivo=${this.motivoId}&ticket_id=${this.$route.params.id}&flujo_simple=${this.flujo_simple}`).then(response=>{
                    $('#form_psa_request_ticket').modal('hide');
                    let mensaje = 'Solicitud de activos nro°'+' '+response.data+' '+'creada';
                    this.succes_alert(mensaje);
                    
                    EventBus.$emit('bitacora.getBitacora');
                    EventBus.$emit('psaticket.get_request');

                    this.activoId = '';
                    this.cantidad  = '';
                    this.descripcion = '';
                    this.motivoId = '';
                    this.flujo_simple = '';

                })
            }
        },
       

        succes_alert: function(mensaje) {
          Swal.fire({
              type: 'success',
              title: 'Éxito',
              text: mensaje,
          })
        },
      
      

          
    },
      
        
}
</script>

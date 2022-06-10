<template>
    <div>
        <div class="main-content">
            <div class="wrapper wrapper-content">
                <section class="section">
                    <div class="section-header shadow-box-ag">
                        <div class="row">
                            <div class="col-lg-10 col-md-6 col-sm-6 col-12 ">
                                <div class="card-stats-title">
                                    <h1>
                                        Gestión de control de cambios
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-lg-11">
                                    <h4 style="color: rgb(102, 102, 102)">
                                        Solicitudes
                                    </h4>
                                </div>
                                 <div class="col-lg-1">
                                    <button class="btn btn-primary" style="border-radius: 3px;" @click.prevent="Openform()"><i class="fas fa-plus"></i></button>
                                 </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>
                                                Solicitante
                                            </th>
                                             <th>
                                                Nombre Proyecto
                                            </th>
                                            <th>
                                                Tipo Documento
                                            </th>
                                            <th>Opciones</th>
                                        </thead>
                                        <tbody>
                                            <tr v-for="solicitud_control_cambio in solicitud_control_cambios">
                                                <td>
                                                    {{solicitud_control_cambio.user.name}} {{solicitud_control_cambio.user.apellido}}
                                                </td>
                                                <td>
                                                    {{solicitud_control_cambio.nombre_proyecto}}
                                                </td>
                                                <td>
                                                    {{solicitud_control_cambio.tipo_documento.descripcion}}
                                                </td>
                                                <td>
                                                    <a :href="'/donwloadDocumentControlCambio/'+solicitud_control_cambio.id" >Ver documento</a> 
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form-control-cambio>
        </form-control-cambio>
    </div>
</template>
<script>
    import axios from 'axios';
import moment from 'moment';
import EventBus from "../event-bus"
import form from'./form.vue'

export default {
      components: {
            'form-control-cambio': form,
           
           

        },
    data(){
        return{
          solicitud_control_cambios:[]
    
        }
    },

    created:function(){


     this.getSolicitudes()
        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
         let self = this;
        EventBus.$on('control.getData', function () {
            self.getSolicitudes(); // ejecutas el metodo que desees
        });
    },
    methods:{
        formato:function(d){
            return moment(d).format("DD/MM/YY - hh:mm:ss");
        },
        Openform:function(){ 
             EventBus.$emit('cambios.getData'); 
        },
        getSolicitudes:function(){
            axios.get('/GetsolcitudControlCambio').then((response)=>{
                this.solicitud_control_cambios = response.data
            })
        },
        donwloadDocumentControlCambio:function(solicitud){
            axios.get('/donwloadDocumentControlCambio/'+solicitud.id).then((response)=>{
                let mensaje = 'Su descarga se realizo con exito.'
                this.toastSuccessFunction(mensaje)
                console.log(response)
            })
        },
        toastSuccessFunction: function(messaje) {
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
            title: messaje
        })
    },
      
    
    }
}
</script>

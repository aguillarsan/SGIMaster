<template>
    <div aria-hidden="true" class="modal inmodal" id="ModalElementos" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                    <h5 class="modal-title barlow bold" style="color: white">
                        Elementos siniestrados
                    </h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true" style="color: white">
                            ×
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="card " style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0.0);">
                                <div class="card-body p-0">
                                    <div class="table-responsive table-hover">
                                        <table class="table table-striped ">
                                            <thead class="barlow semi_bold">
                                                <tr>
                                                    <th>
                                                        Elemento
                                                    </th>
                                                    <th>
                                                        Cantidad/Descripción/Nivel
                                                    </th>
                                                    <th>
                                                        Total
                                                    </th>
                                                    <th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="barlow regular" v-for="activos in elementos">
                                                    <td>
                                                        {{activos.elemento.descripcion}}
                                                        <i class="fas fa-car-battery" style="font-size: 18px;color: #fea858;" v-if="activos.elemento_id==1">
                                                        </i>
                                                        <i class="fas fa-lightbulb" style="font-size: 18px;color: #f9d466" v-if="activos.elemento_id==2">
                                                        </i>
                                                        <i class="fas fa-wind" style="font-size: 18px;color: #64aefe" v-if="activos.elemento_id==4">
                                                        </i>
                                                        <i class="fas fa-bolt" style="font-size: 18px;color:#0560ff " v-if="activos.elemento_id==5">
                                                        </i>
                                                        <i class="fas fa-hard-hat" style="font-size: 18px;color: #ffc107;" v-if="activos.elemento_id==3">
                                                        </i>
                                                        <i class="fas fa-question" style="font-size: 18px;color:grey" v-if="activos.elemento_id==6">
                                                        </i>
                                                    </td>
                                                    <td v-if=" activos.elemento_id==1 || activos.elemento_id==2 || activos.elemento_id==4 || activos.elemento_id==5">
                                                        <div style="text-align: center;">
                                                            {{activos.cantidad}}
                                                        </div>
                                                    </td>
                                                    <td v-if=" activos.elemento_id==3 ">
                                                        <div style="text-align: center;" v-if=" activos.nivel_id==1 ">
                                                            BAJO
                                                        </div>
                                                        <div style="text-align: center;" v-if=" activos.nivel_id==2 ">
                                                            MEDIO
                                                        </div>
                                                        <div style="text-align: center;" v-if=" activos.nivel_id==3 ">
                                                            ALTO
                                                        </div>
                                                    </td>
                                                    <td v-if=" activos.elemento_id==6 ">
                                                        <div style="text-align: center;">
                                                            {{activos.descripcion}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            ${{activos.total | currency}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a @click.prevent="DeleteRecord(activos.id)" class=" boxBounce" href="#">
                                                            <i class="fas fa-times-circle boxBounce" style="color:#ed5565;font-size:22px;">
                                                            </i>
                                                        </a>
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
                <div class="modal-footer" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99);">
                    <button class="btn btn-secondary btn-grey" data-dismiss="modal"  type="button">
                        Cerrar
                    </button>
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
     props: [ 'idticket' ],
    data(){
        return{
            elementos:[],
            

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('Elementos.GetElementos', function () {
            self.GetElementosTicket(); // ejecutas el metodo que desees
        });
    },
    methods:{
        formato:function(d){
            return moment(d).format("DD/MM/YY - hh:mm:ss");
        },
        GetElementosTicket:function(){
            axios.get('/GetElementosTicket/'+this.idticket).then((response)=>{
                this.elementos = response.data;
            })
        },
        DeleteRecord:function(id){
                axios.get('/DeleteRecordElemento/'+id).then((response)=>{
                    this.GetElementosTicket();
                    EventBus.$emit('ticket.getTicket');
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    type: 'success',
                    title: 'Elemento Eliminado'
                })

                    
                })
        }
        
        
    }
}
</script>

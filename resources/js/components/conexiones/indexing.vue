<template>
    <div class="wrapper wrapper-content">
        <section class="section">
            <div class="section-header shadow-box-ag">
                <div class="row">
                    <div class="col-lg-11 col-md-6 col-sm-6 col-12 ">
                        <div class="card-stats-title barlow bold">
                            <h1>
                                Tickets
                            </h1>
                        </div>
                        <div class="dropdown d-inline">
                            <a class="font-weight-600 dropdown-toggle barlow bold" data-toggle="dropdown" href="#" id="orders-month">
                                Opciones
                            </a>
                            <ul class="dropdown-menu dropdown-menu-sm" style="z-index: 1;position:absolute;">
                                <li class="dropdown-title barlow semi_bold">
                                    Selecione una opción
                                </li>
                                <li>
                                    <a href="/export-data-tp-ticket-ingenieria" class="barlow regular">
                                        <i class="fas fa-download">
                                        </i>
                                        Reporte General
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-6 col-sm-6 col-12 ">
                        <button class="btn barlow semi_bold boxBounce" data-target="#formularioIng" data-toggle="modal" style="border-radius:5px;background-color:#42E8B4;color:white">
                            <i class="fas fa-plus">
                            </i>
                            Crear Ticket
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div @click="showModulo(1)" class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <a href="#">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce " v-bind:style=" opcion==1 ? 'background-color: #42E8B4; border: 2px solid white;' : '' ">
                            <div class="card-icon shadow-box-ag " style=" background-color: rgb(66, 232, 180);" v-bind:style=" opcion==1 ? 'background-color: white; ' : '' ">
                                <i class="fab fa-connectdevelop" style="font-size: 40px;color: white;margin-top: 20px;" v-bind:style=" opcion==1 ? 'color: #6c757d; ' : '' ">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header barlow bold">
                                    <h4 style="font-size: ;" v-bind:style=" opcion==1 ? 'color: white; ' : '' ">
                                        TICKETS CONEXIONES
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn barlow semi_bold " style="font-size: ;" v-bind:style=" opcion==1 ? 'color: white; ' : '' ">
                                    <div>
                                        {{total_conexion}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div @click="showModulo(2)" class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <a href="#">
                        <div class="card card-statistic-1 shadow-box-ag animated fadeIn boxBounce " v-bind:style=" opcion==2 ? 'background-color: #42E8B4; border: 2px solid white;' : '' ">
                            <div class="card-icon shadow-box-ag " style="background-color: rgb(0, 92, 255);" v-bind:style=" opcion==2 ? 'background-color: white; ' : '' ">
                                <i class="fas fa-network-wired" style="font-size: ;color: white" v-bind:style=" opcion==2 ? 'color: #6c757d; ' : '' ">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header barlow bold">
                                    <h4 style="font-size: ;" v-bind:style=" opcion==2 ? 'color: white; ' : '' ">
                                        TICKETS PROYECTOS
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn barlow semi_bold " style="font-size: ;" v-bind:style=" opcion==2 ? 'color: white; ' : '' ">
                                    <div>
                                        {{total_grandes_proyectos}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <tickets-conexion :role="rol">
        </tickets-conexion>
        <formularioing :opcion="opcion">
        </formularioing>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    import EventBus from "../event-bus"
    import formularioing from './formularioing.vue';
   
    import ticketconexion from './ticketconexion';

    export default {
        props:['rol','total_ticket_conexion','total_ticket_grandes_proyectos'],
        components: {

            'formularioing': formularioing,
           
            'tickets-conexion':ticketconexion

        },
        data() {
            return {

                opcion:0,
                total_conexion:0,
                total_grandes_proyectos:0

              

            }
        },

        mounted: function() { /* Agrega mounted y con el siguiente contenido */
            let self = this;
            EventBus.$on('ing.ticket.getTotal.tipo.ticket', function() {
                self.getTotalesTickets(); // ejecutas el metodo que desees
            });
              EventBus.$on('ing.ticket.reload', function() {
                self.showModulo(); // ejecutas el metodo que desees
            });
        },

        created: function() {
           this.total_conexion=this.total_ticket_conexion;
           this.total_grandes_proyectos=this.total_ticket_grandes_proyectos;
           this.fechaActual = moment();
           
         

        },

        methods: {
            showModulo:function(modulo){
                this.opcion = modulo
                EventBus.$emit('ing.getableticket', this.opcion);
            },
            getTotalesTickets:function(){
                axios.get('/get-totales-tipo-tickets').then(response=>{
                   this.total_conexion=response.data.total_ticket_conexion;
                   this.total_grandes_proyectos=response.data.total_ticket_grandes_proyectos;
                })
            }
          

                
            

        }
    }
</script>

<template>
    <div>
        <section class="section">
            <div class="section-header shadow-box-ag">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-6 col-12 ">
                        <div class="card-stats-title">
                            <h1 class="barlow semi_bold">
                                Itos / Tareas
                            </h1>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card shadow-box-ag " v-for="task in tasks" v-if="!load">
                <div class="card-header">
                    <h4 class="barlow bold">Tarea nro° {{task.id}}</h4>
                    <div class="card-header-action">
                        <a href="#" style="border-radius: 5px !important;" @click.prevent="changeStatus(task)"
                            :class="task.state_id == 1 ? 'btn btn-primary':'btn btn-success'"
                            v-if="task.state_id == 1 || task.state_id == 2 " >{{textButton (task)}}</a>
                        
                        <a href="#detailEvent" data-toggle="modal" style="border-radius: 5px !important;"
                            @click="moreDetail(task)" class="btn btn-info">Más detalles</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-2">
                            <p class="barlow semi_bold">{{task.title}}</p>
                        </div>

                        <div class="col-12 col-md-6 col-lg-2">
                            <div class="ticket-desc barlow semi_bold">
                                <div>
                                    Fecha de inicio
                                </div>

                                <div>
                                    {{formato(task.start)}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="ticket-desc barlow semi_bold">
                                <div>
                                    Fecha de término
                                </div>

                                <div>
                                    {{formato(task.end)}}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            
            <div class="empty-state" data-height="400" v-if="load">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-primary" role="status"
                        style="width: 8rem;height: 8rem;color: #007bff!important;">
                        <span class="sr-only" style="color: #191919">
                            Cargando...
                        </span>
                    </div>
                </div>
            </div>


        </div>
        <div aria-hidden="true" class="modal inmodal" id="detailEvent" role="dialog" tabindex="-1"
            data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header"
                        style="background: -webkit-linear-gradient(#4776E6,#8E54E9); height: 70px;">
                        <h5 class="modal-title barlow bold" style="color: white">
                            Detalles de la tarea
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body" >
                        <div class="row" v-if="task_detail">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="description" class="barlow semi_bold">
                                        Descripción
                                    </label>
                                    <div class="barlow regular">{{task_detail.title}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">

                                    <label for="description" class="barlow semi_bold">
                                        Fecha de inicio
                                    </label>
                                    <div class="barlow regular">{{formato(task_detail.start)}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="description" class="barlow semi_bold">
                                        Fecha de termino
                                    </label>

                                    <div class="barlow regular"> {{formato(task_detail.end)}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="description" class="barlow semi_bold">
                                        Estado
                                    </label>
                                    <div>{{task_detail.state ? task_detail.state.state : ''}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Jefe_de_proyecto" class="barlow semi_bold">
                                        Jefe de proyecto
                                    </label>

                                    <div class="barlow regular">{{task_detail.project_manager ?
                                        task_detail.project_manager.name_manager:''}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="recurso" class="barlow semi_bold">
                                        Supervisor
                                    </label>

                                    <div class="barlow regular">{{task_detail.resource ?
                                        task_detail.resource.name_resource:''}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="sitio " class="barlow semi_bold">
                                        Nombre sitio
                                    </label>

                                    <div class="barlow regular">{{task_detail.site ? task_detail.site.nombre:'' }}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="sitio " class="barlow semi_bold">
                                        Nemónico
                                    </label>

                                    <div class="barlow regular">{{task_detail.site ? task_detail.site.nem_site:''}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="sitio " class="barlow semi_bold">
                                        Dirección
                                    </label>

                                    <div class="barlow regular">{{task_detail.site ? task_detail.site.pop.direccion:''}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="pep " class="barlow semi_bold">
                                        Pep
                                    </label>

                                    <div class="barlow regular">{{task_detail.pep}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="pep " class="barlow semi_bold">
                                        TP
                                    </label>

                                    <div class="barlow regular">{{task_detail.tp}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="categoria" class="barlow semi_bold">
                                        Categoría de tarea
                                    </label>

                                    <div class="barlow regular">{{task_detail.category ?
                                        task_detail.category.category:'' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</template>
<script>
    import moment from 'moment';
    import axios from 'axios';
    import VueGeolocation from 'vue-browser-geolocation';
    Vue.use(VueGeolocation);
    export default {
        data() {
            return {
                tasks: [],
                task_detail: '',
                options: {
                    enableHighAccuracy: true,
                    timeout: 6000,
                    maximumAge: 0
                },
                coords: [],
                load: true,
                change_data:false

            }
        },
        created: function () {
            this.getData()
        },

        methods: {
            getData() {
                axios.get('/get/task/itos').then((response => {
                    this.tasks = response.data
                    this.load = false

                }))
            },
            moreDetail(task) {
                this.task_detail = task;

            },
            formato: function (d) {
                return moment(d).format("DD/MM/YYYY");
            },
            changeStatus(task) {

                let formData = new FormData
                if (task.state_id == 1) {
                    this.getLocation();
                    formData.append('lat', this.coords.lat)
                    formData.append('lng', this.coords.lng)
                    
                }
                this.change_data = true

                formData.append('task_id', task.id)

                axios.post('/update/state/task', formData).then(response => {
                    this.getData()
                    this.change_data = false
                })
            },
            getLocation() {
                this.$getLocation(this.options)
                    .then(coordinates => {
                        this.coords = coordinates
                    })
            },
            textButton(task) {
                if (task.state_id == 1) {
                    return "Iniciar tarea"
                } else if (task.state_id == 2) {
                    return "Finalizar tarea"
                }
            }

        }

    }
</script>
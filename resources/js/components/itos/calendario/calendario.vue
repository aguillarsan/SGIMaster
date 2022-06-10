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
        <div class="card">
            <div class="card-body">
                <FullCalendar :options="calendarOptions" />
            </div>

        </div>
        <input hidden="true" @change="uploadFle" id="file" name="file" type="file" value="" />
        <div aria-hidden="true" class="modal inmodal" id="addEvent" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header"
                        style="background: -webkit-linear-gradient(#4776E6,#8E54E9); height: 70px;">
                        <h5 class="modal-title barlow bold" style="color: white">
                            Crear tarea
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="description" class="barlow semi_bold">
                                        Descripción*
                                    </label>
                                    <input name="description" type="text" class="form-control"
                                        v-model="form_input.description"></input>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="category" class="barlow semi_bold">
                                        Categoría de tarea*
                                    </label>
                                    <select class="form-control select" name="category"
                                        v-model="form_input.category_id">
                                        <option :value="category.id" v-for="category in categories">
                                            {{category.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="date_start" class="barlow semi_bold">
                                        Fecha de inicio*
                                    </label>
                                    <input class="form-control" v-model="form_input.start_date" name="date_start"
                                        type="date" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="date_start" class="barlow semi_bold">
                                        Fecha de término*
                                    </label>
                                    <input class="form-control" v-model="form_input.finish_date" name="date_finish"
                                        type="date" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="project_manager" class="barlow semi_bold">
                                        Jefe de proyecto*
                                    </label>
                                    <select class="form-control select" v-model="form_input.project_manager_id"
                                        name="project_manager">
                                        <option :value="project_manager.id" v-for="project_manager in managers">
                                            {{project_manager.name_manager}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <search-site :event_name="event_name"></search-site>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="pep" class="barlow semi_bold">
                                        Pep
                                    </label>
                                    <input class="form-control" type="text" name="pep" v-model="form_input.pep">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tp " class="barlow semi_bold">
                                        Tp
                                    </label>
                                    <input class="form-control" type="text" name="tp" v-model="form_input.tp">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="recurso" class="barlow semi_bold">
                                        Supervisor*
                                    </label>
                                    <select class="form-control select" v-model="form_input.resource_id" name="recurso">
                                        <option :value="resource.id" v-for="resource in resources">
                                            {{resource.name_resource}}</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="createEvent" class="btn btn-info barlow semi_bold" href="#"
                            style="color:white">
                            Crear tarea
                        </a>
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
                    <div class="modal-body" style="margin-left:50px">
                        <div class="row" v-if="event_selects">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="description" class="barlow semi_bold">
                                        Descripción
                                    </label>
                                    <div class="barlow regular">{{event_selects.title}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">

                                    <label for="description" class="barlow semi_bold">
                                        Fecha de inicio
                                    </label>
                                    <div class="barlow regular">{{formato(event_selects.start)}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="description" class="barlow semi_bold">
                                        Fecha de termino
                                    </label>

                                    <div class="barlow regular"> {{formato(event_selects.end)}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="description" class="barlow semi_bold">
                                        Estado
                                    </label>
                                    <div style="width:120px">
                                        <select name="" @change.prevent="updateState(event_selects)"
                                            class="form-control select" v-model="state_change_id">
                                            <option class="barlow regular" v-for="state in states" :value="state.id">
                                                {{state.state}}
                                            </option>
                                        </select>
                                    </div>



                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Jefe_de_proyecto" class="barlow semi_bold">
                                        Jefe de proyecto
                                    </label>

                                    <div class="barlow regular">{{event_selects.project_manager ?
                                        event_selects.project_manager.name_manager:''}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="recurso" class="barlow semi_bold">
                                        Supervisor
                                    </label>

                                    <div class="barlow regular">{{event_selects.resource ?
                                        event_selects.resource.name_resource:''}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="sitio " class="barlow semi_bold">
                                        Sitio
                                    </label>

                                    <div class="barlow regular">{{event_selects.site ? event_selects.site.nem_site +'-'+
                                        event_selects.site.nombre:''}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="pep " class="barlow semi_bold">
                                        Pep
                                    </label>

                                    <div class="barlow regular">{{event_selects.pep}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="pep " class="barlow semi_bold">
                                        TP
                                    </label>

                                    <div class="barlow regular">{{event_selects.tp}}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="categoria" class="barlow semi_bold">
                                        Categoría de tarea
                                    </label>

                                    <div class="barlow regular">{{event_selects.category ?
                                        event_selects.category.category:'' }}</div>
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

    import '@fullcalendar/core/vdom' // solves problem with Vite
    import FullCalendar from '@fullcalendar/vue'
    import dayGridPlugin from '@fullcalendar/daygrid'
    import interactionPlugin from '@fullcalendar/interaction'
    import ListPlugin from '@fullcalendar/list'
    import TimeGridPlugin from '@fullcalendar/timegrid'
    import moment from 'moment'
    import axios from 'axios';
    import searchSite from './SearchSite'
    import EventBus from "../event-bus"
    export default {

        data() {
            return {
                event_name: 'get-site-id',

                calendarOptions: {
                    customButtons: {
                        myCustomButton: {
                            text: 'Crear tarea',
                            click: function () {
                                $("#addEvent").modal('show')
                            }
                        },
                        importTask: {
                            text: 'Importar tareas',
                            click: function () {
                                document.getElementById("file").click();
                            }
                        }
                    },
                    plugins: [dayGridPlugin, interactionPlugin, ListPlugin, TimeGridPlugin],

                    dateClick: this.handleDateClick,
                    eventClick: this.handleEventClick,

                    events: [

                    ],
                    locale: 'es',
                    headerToolbar: {
                        //left: 'dayGridMonth,timeGridWeek,timeGridDay, myCustomButton',
                        left: 'myCustomButton importTask',
                        center: 'title',
                        right: 'today,dayGridMonth,timeGridWeek,timeGridDay prev,next'
                    }




                },
                date_event: '',
                formData: new FormData,
                form_input: {
                    user_id: '',
                    description: '',
                    tp: '',
                    pep: '',
                    start_date: '',
                    finish_date: '',
                    state_id: 1,
                    site_id: '',
                    category_id: '',
                    project_manager_id: '',
                    resource_id: ''

                },
                event_selects: '',
                states: [],
                state_change_id: '',
                managers: [],
                resources: [],
                categories: [{ id: 1, name: 'Supervisión' }],
                file:''




            }
        },
        components: {
            FullCalendar,
            'search-site': searchSite
        },
        created: function () {
            this.getEvents()
            this.getDataForm()
        },
        mounted() {
            let self = this;


            EventBus.$on(this.event_name, function (site) {
                self.updateSite(site)


            });
        },
        computed: {

        },
        methods: {
            updateSite(site) {
                this.form_input.site_id = site;
                console.log(this.form_input.site_id)
            },
            getEvents() {
                axios.get('/get/all/event/ito').then(response => {
                    this.calendarOptions.events = response.data
                    this.event_selects = response.data
                })
            },
            handleDateClick: function (arg) {

                console.log(arg.dateStr)
                this.date_event = this.formato(arg.dateStr)
                $("#addEvent").modal('show')

            },
            getDataForm() {

                axios.get('/data/form/itos').then(response => {



                    this.managers = response.data.project_managers
                    this.resources = response.data.resources

                })
            },
            handleEventClick: function (arg) {
                axios.get('/event/select/' + arg.event.id).then(response => {
                    this.event_selects = response.data.events
                    this.state_change_id = this.event_selects.state.id
                    this.states = response.data.states
                    $("#detailEvent").modal('show')
                })




            },
            formato: function (d) {
                return moment(d).format("DD/MM/YYYY");
            },
            createEvent() {

                if (this.form_input.start_date != "" && this.form_input.finish_date != "" && this.form_input.description != ""
                    && this.form_input.project_manager_id != "" && this.form_input.category_id != "" && this.form_input.site_id != "") {

                    this.formData.append('start_date', this.form_input.start_date)
                    this.formData.append('finish_date', this.form_input.finish_date)
                    this.formData.append('description', this.form_input.description)
                    this.formData.append('pep', this.form_input.pep)
                    this.formData.append('tp', this.form_input.tp)
                    this.formData.append('project_manager_id', this.form_input.project_manager_id)
                    this.formData.append('category_id', this.form_input.category_id)
                    this.formData.append('resource_id', this.form_input.resource_id)
                    this.formData.append('site_id', this.form_input.site_id)


                    axios.post('/create/event/ito', this.formData).then(response => {

                        $("#addEvent").modal('hide')
                        this.alertFunction('success', 'Tarea creada', 'Su tarea fue creda exitosamente.')
                        this.getEvents()
                        this.cleanForm()
                    }).catch(
                        error => {


                            $("#addEvent").modal('hide')
                            this.alertFunction('error', 'Error', 'Se produjo un error al crear la tarea, favor contactar con soporte.')
                            this.cleanForm()
                        });
                }


            },

            alertFunction(Type, Title, Text) {
                Swal.fire({
                    type: Type,
                    title: Title,
                    text: Text,
                })
            },
            cleanForm() {
                    this.user_id = '',
                    this.description = '',
                    this.tp = '',
                    this.pep = '',
                    this.start_date = '',
                    this.finish_date = '',
                    this.site_id = '',
                    this.category_id = '',
                    this.project_manager_id = '',
                    this.resource_id = ''
                    EventBus.$emit('clean-site-select')
            },
            updateState(task) {
                let formData = new FormData
                formData.append('task_id', task.id)
                formData.append('state_id', this.state_change_id)
                axios.post('/update/state/task', formData).then(response => {
                    this.getEventNew()

                })
            },

            getEventNew() {
                axios.get('/get/all/event/ito').then(response => {
                    this.calendarOptions.events = response.data
                    
                })
            },
            uploadFle(e) {
                let file = e.target.files[0];
                this.file = file;
                let formData = new FormData();
                formData.append('file', this.file);
                axios.post('/upload/task/itos', formData).then(response => {
                    console.log(response.data)
                    $("#file").val('');
                    this.file = '';
                    this.getEvents()
                    alert("Datos importados")
                   
                }).catch(
                    error => {
                        $("#file").val('');
                        this.file = '';
                        alert("Se produjo un error al importar los datos")
                    });
            },

        }
    }
</script>
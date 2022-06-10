<template>
  <div class="main-content">
    <div class="wrapper wrapper-content">
      <section class="section">
        <div class="section-header shadow-box-ag">
          <div class="row">
            <div class="col-lg-11 col-md-6 col-sm-6 col-12">
              <div class="card-stats-title">
                <h1 class="barlow semi_bold">
                  Tickets
                </h1>
              </div>
            </div>
            <div class="col-lg-1 col-md-6 col-sm-6 col-12">
              <button class="btn btn-info btn-block barlow semi_bold" data-target="#form_ticket" data-toggle="modal">
                <i class="fas fa-plus">
                </i>
                Crear Ticket
              </button>
            </div>
          </div>
        </div>
      </section>
      <div class="row">
        <div :key="index" class="col-lg-3 col-md-6 col-sm-6 col-12" v-for="(card,index) in cards">
          <div :style="card.id ==module ? 'background-color:#093BC8':''"
            class="card card-statistic-1 boxBounce animated fadeIn">
            <a href="" style="color: #2fcbf1" v-on:click.prevent="getTickets(card.id)">
              <div :class="card.card_class" :style="card.id ==module ? 'background-color:white;':''">
                <i :class="card.i_class" :style="card.id ==module ? 'color:#191919':''"
                  style="font-size: 25px; color: white">
                </i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4 :style="card.id ==module ? 'color:white':''" class="barlow semi_bold">
                    {{card.name}}
                  </h4>
                </div>
                <div :style="card.id ==module ? 'color:white':''" class="card-body animated fadeIn barlow semi_bold"
                  style="font-size: 35px">
                  {{load_count ? card.value : ''}}
                  <div class="spinner-border text-primary" role="status"
                    style="width: 3rem;height: 3rem;color: #007bff!important;" v-if="!load_count">
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12" style="min-height:300px">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-lg-6">
                  <h4 class="card-title" style="color:#191919">
                    {{nameModule}}
                  </h4>
                </div>
                <div class="col-lg-6">
                  <input @keyup="filterTicker" class="form-control" placeholder="buscar" type="text"
                    v-model="search_input">
                  </input>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tickets" v-if="load_data">
                <div class="ticket-items animated animated fadeIn" id="ticket-items" style="width: 100%!important">
                  <div :class="ticket.id == data_ticket.id ? 'active_ticketd_card':''" @click="setDataTicket(ticket)"
                    class="ticket-item mt-2 tck_suport" v-for="ticket in tickets.data">
                    <div class="ticket-title barlow bold">
                      <h5 style="font-size:16px">
                        Ticket N° {{ticket.id}} - {{ticket.plataforma?ticket.plataforma.descripcion:''}}
                      </h5>
                    </div>
                    <div class="ticket-title barlow semi_bold">
                      <h4>
                        {{ticket.tipo_requisito.descripcion}}
                      </h4>
                    </div>
                    <div class="ticket-desc barlow semi_bold">
                      <div :style="ticket.id == data_ticket.id ? 'color:#191919':''">
                        {{ticket.user.name}}
                        {{ticket.user.apellido}}
                      </div>
                      <div class="bullet">
                      </div>
                      <div :style="ticket.id == data_ticket.id ? 'color:#191919':''">
                        Hace {{time(ticket.created_at)}}
                      </div>
                    </div>
                    <div class="ticket-desc mt-2">
                      <span
                        :class="ticket.prioridad_id == 1 ? 'badge-success':(ticket.prioridad_id == 2 ? 'badge-warning':(ticket.prioridad_id == 3 ? 'badge-danger':''))"
                        class="badge barlow semi_bold">
                        {{ticket.prioridad.descripcion}}
                      </span>
                    </div>
                  </div>
                  <div style="margin-top: 30px;">
                    <nav aria-label="pagination" class="pagination" role="navigation">
                      <vue-pagination :offset="4" :pagination="tickets" @paginate="paginateTickets()">
                      </vue-pagination>
                    </nav>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-center" v-if="!load_data">
                <div class="spinner-border text-primary" role="status"
                  style="width: 8rem;height: 8rem;color: #007bff!important;">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-6 col-sm-6 col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-lg-10">
                  <h4 class="card-title barlow semi_bold" style="color:#191919">
                    Detalle del ticket
                  </h4>
                </div>
                <div class="col-lg-2" v-if="ticket_id != '' && usuario.id == 1 || ticket_id != '' && usuario.id == 2 ">
                  <button class="btn btn-success" @click.prevent="aproveTicket" style="border-radius:5px;"
                    v-if="data_ticket.estado_id == 1 || data_ticket.estado_id == 2"><i class="fa fa-check"></i></button>
                  <button class="btn btn-danger" style="border-radius:5px;" v-if="data_ticket.estado_id == 1"><i
                      class="fas fa-times-circle"></i></button>
                  <button class="btn btn-info" style="border-radius:5px;" data-toggle="modal" data-target="#modal_message"><i class="fas fa-comment-alt"></i></i></button>
                </div>
              </div>

            </div>
            <div class="card-body">
              <div class="tickets" v-if="!load_data_ticket">
                <div class="ticket-content" style="width: 100%!important" v-if="data_ticket">
                  <div class="ticket-header">
                    <div class="ticket-sender-picture img-shadow" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                      <div class="card-icon dropdown-item-avatar">
                        <a :title="data_ticket.user.name +' '+ data_ticket.user.apellido" href="#">
                          <figure :data-initial="shortName(data_ticket.user.name,data_ticket.user.apellido)"
                            class="avatar mr-2 bg-primary text-white">
                          </figure>
                        </a>
                      </div>
                    </div>
                    <div class="ticket-detail">
                      <div class="ticket-title">
                        <h4 class="barlow semi_bold">
                          {{data_ticket.tipo_requisito.descripcion}} -
                          {{data_ticket.plataforma?data_ticket.plataforma.descripcion:''}}
                        </h4>
                      </div>
                      <div class="ticket-info">
                        <div class="font-weight-600 barlow regular">
                          {{data_ticket.user.name}}
                          {{data_ticket.user.apellido}}
                        </div>
                        <div class="bullet">
                        </div>
                        <div class=" font-weight-600 barlow regular">
                          Hace {{time(data_ticket.created_at)}}
                        </div>
                      </div>
                    </div>

                  </div>
                  <hr />
                  <div class="ticket-description barlow regular" style="margin-top:-10px;">
                    <div>
                      <div class="title barlow blod">
                        <strong>
                          Descripción
                        </strong>
                      </div>
                      <p>
                        <textarea class="form-control barlow regular" disabled="true"
                          :style="'height:'+data_ticket.descripcion.length+'px' " maxlength="1000"
                          :value=" data_ticket.descripcion">   {{data_ticket.descripcion}}</textarea>

                      </p>
                    </div>
                    <hr />
                    <div class="">

                      <div class="title barlow blod">
                        <strong>
                          Tareas
                        </strong>
                      </div>
                      <div class="card-body"
                        v-if="task_ticket.length != 0 && usuario.id == 1 || task_ticket.length != 0 &&  usuario.id == 2">
                        <div class="progress mb-3" style="height:22px">
                          <div class="progress-bar bg-info" style="font-size:15px" :data-with="porcent_complete+'%'"
                            :style="'width:'+porcent_complete+'%'" role="progressbar" :aria-valuenow="porcent_complete"
                            aria-valuemin="0" aria-valuemax="100">
                            {{porcent_complete}}% </div>
                        </div>
                        <div class="row tck_suport mt-3">
                          <div class="col-lg-12" style="max-height: 380px;overflow-y:scroll;margin-top: 10px;">
                            <ul class="list-group">
                              <li class="list-group-item d-flex justify-content-between align-items-center"
                                v-for="(task,key) in task_ticket"
                                :style="task.complete == 1 ? 'background: rgba(0, 151, 19, 0.3);':''">
                                {{task.name_task}}
                                <input class="form control" style="cursor:pointer" v-if="data_ticket.estado_id != 3"
                                  :id="'taskcheck'+task.id" @click="updateList(task)"
                                  :checked="task.complete == 1 ? true:false" type="checkbox">
                              </li>

                            </ul>
                          </div>

                        </div>
                      </div>
                      <div class="card-body" v-if="task_ticket.length != 0 && usuario.id != 1 && usuario.id != 2">
                        <div class="progress mb-3" style="height:22px">
                          <div class="progress-bar bg-info" style="font-size:15px" :data-with="porcent_complete+'%'"
                            :style="'width:'+porcent_complete+'%'" role="progressbar" :aria-valuenow="porcent_complete"
                            aria-valuemin="0" aria-valuemax="100"> {{porcent_complete}}% </div>
                        </div>
                        <div class="row tck_suport mt-3">
                          <div class="col-lg-12" style="max-height: 380px;overflow-y:scroll;margin-top: 10px;">
                            <ul class="list-group">
                              <li class="list-group-item d-flex justify-content-between align-items-center"
                                v-for="(task,key) in task_ticket"
                                :style="task.complete == 1 ? 'background: rgba(0, 151, 19, 0.3);':''">
                                <strong style="color:#191919">{{task.name_task}}</strong>
                                <i :class="task.complete == 1 ? 'fas fa-check':'fas fa-pause'"></i>

                              </li>

                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card-body" v-if="task_ticket.length == 0">
                        <div class="row tck_suport mt-3">
                          <div class="col-12 col-md-12 col-sm-12">
                            <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                              <div class="card-body">
                                <div class="empty-state" data-height="400">
                                  <div class="empty-state-icon"
                                    style="background-image: linear-gradient(rgb(0, 92, 255), rgba(0, 123, 255, 0.6))">
                                    <i class="fas fa-tasks"></i>
                                  </div>
                                  <h2>
                                    No se ha creado ninguna tarea
                                  </h2>

                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-2" style="margin-left: 15px;">
                          <div class="form-group text-left">
                            {{total_complete}}/{{total_task}}
                          </div>
                        </div>

                      </div>

                      <div class="form-group text-right"
                        v-if="data_ticket.estado_id != 3 && usuario.id == 1 || data_ticket.estado_id != 3 && usuario.id == 2">
                        <button class="btn btn-primary btn-lg" data-target="#modal_task" data-toggle="modal">
                          Crear tarea
                        </button>
                      </div>

                    </div>
                    <hr />
                    <div class="gallery">
                      <div class="title barlow blod">
                        <strong>
                          Archivos
                        </strong>
                      </div>
                      <div>
                        <div class="card-body">
                          <div class="row tck_suport mt-2" v-if="task_files.length != 0">
                            <div class="col-lg-3 text-center" v-for="(file,key) in task_files">
                              <div class="browser " :title="file.nombre_archivo"> <i style="font-size:55px"
                                  :class="typeFile(file.nombre_archivo)"></i></div>
                              <div class="mt-2 barlow regular">{{file.nombre_archivo}}</div>
                              <div class="text-muted text-small">
                                <a :href="'http://172.16.100.112/SupportFiles/'+file.nombre_archivo" target="blank__"><i
                                    class="fa fa-eye" style="font-size:18px"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="card-body">
                          <div class="row tck_suport " v-if="task_files.length == 0">
                            <div class="col-12 col-md-12 col-sm-12">
                              <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                <div class="card-body">
                                  <div class="empty-state" data-height="400">
                                    <div class="empty-state-icon"
                                      style="background-image: linear-gradient(rgb(0, 92, 255), rgba(0, 123, 255, 0.6))">
                                      <i class="fas fa-question">
                                      </i>
                                    </div>
                                    <h2>
                                      No se ha cargado ningún archivo
                                    </h2>

                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>

                      </div>
                    </div>
                    <hr class="mt-5" />
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-center" v-if="load_data_ticket">
                <div class="spinner-border text-primary" role="status"
                  style="width: 8rem;height: 8rem;color: #007bff!important;">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <ticket-form :usuario="usuario">
    </ticket-form>
    <task-form :ticket="data_ticket"></task-form>
    <send-message :ticket="ticket_id"></send-message>
  </div>
</template>

<script>
  import axios from 'axios';
  import moment from 'moment';
  import Ticketform from './Modals/form.vue'
  import TaskForm from './Modals/Task.vue'
  import Message from './Modals/Message.vue'
  import EventBus from "./event-bus"
  import VuePagination from '../VuePagination.vue';

  export default {
    components: {
      'ticket-form': Ticketform,
      'task-form': TaskForm,
      'vue-pagination': VuePagination,
      'send-message':Message
    },
    props: ['usuario'],

    data() {
      return {
        tickets: {
          'total': 0,
          'current_page': 1,
          'per_page': 10,

          'from': 2,
          'to': 0

        },
        cards: [
          { id: 1, name: 'En espera', i_class: 'fas fa-check', card_class: 'card-icon verde', value: 0 },
          { id: 2, name: 'En curso', i_class: 'fas fa-code-branch', card_class: 'card-icon azul', value: 0 },
          { id: 3, name: 'Finalizado', i_class: 'fas fa-calendar-check', card_class: 'card-icon rosa', value: 0 },
          { id: 7, name: 'Rechazado', i_class: 'fas fa-times-circle', card_class: 'card-icon red', value: 0 }
        ],
        module: 1,
        load_data: null,
        load_count: false,
        actualy_date: moment(),
        data_ticket: '',
        search_input: '',
        ticket_id: '',
        load_data_ticket: false,
        task_ticket: [],
        total_task: 0,
        total_complete: 0,
        porcent_complete: 0,
        value_complete: '',
        task_files: [],
        setTimeoutBuscador: '',

      };
    },
    mounted() {
      let self = this
      EventBus.$on('update.ticket.support', function () {
        self.getTickets();
      });
      EventBus.$on('update.task.ticket.support', function (ticket) {
        self.setDataTicket(ticket);
      });


    },
    computed: {
      nameModule() {
        let name = this.module == 1 ? 'Validación' : (this.module == 2 ? 'En proceso' : (this.module == 3 ? 'Finalizado' : (this.module == 4 ? 'Rechazado' : '')));
        return name;

      },

    },
    created: function () {
      this.getTickets()
    },
    methods: {
      getTickets(module) { 
        
        this.load_data = false;
        this.data_ticket = '';
        if (module) {
          this.module = module
        } else {
          this.module = this.module
        }
        this.tickets.current_page = 1;

        axios.get(`/tickets/support?page=${this.tickets.current_page}&module=${this.module}&search=${this.search_input}`).then(response => {
          this.tickets = response.data.tickets;
          this.cards.map(function (card) {
            if (card.id == 1) {
              card.value = response.data.validacion;
            } else if (card.id == 2) {
              card.value = response.data.proceso;
            } else if (card.id == 3) {
              card.value = response.data.finalizado;
            } else if (card.id == 7) {
              card.value = response.data.rechazado;
            }


          });
          this.load_data = !this.load_data;
          if (!this.load_count) {
            this.load_count = !this.load_count;
          }

        })



      },
      paginateTickets(module) {

        this.data_ticket = '';
        if (module) {
          this.module = module
        } else {
          this.module = this.module
        }

        axios.get(`/tickets/support?page=${this.tickets.current_page}&module=${this.module}&search=${this.search_input}`).then(response => {
          this.tickets = response.data.tickets;



        })



      },
      time(created_at) {
        if (this.actualy_date.diff(created_at, 'minute') < 60 && this.actualy_date.diff(created_at, 'minute') >= 1) {
          return this.actualy_date.diff(created_at, "minute") + ' minutos'
        } else {
          if (this.actualy_date.diff(created_at, 'days') == 0 && this.actualy_date.diff(created_at, 'minute') >= 60) {
            return this.actualy_date.diff(created_at, "hours") + ' hrs'

          } else {
            if (this.actualy_date.diff(created_at, 'days') >= 1) {
              return this.actualy_date.diff(created_at, "days") + ' días'
            } else {
              if (this.actualy_date.diff(created_at, 'minute') < 1) {
                return this.actualy_date.diff(created_at, "seconds") + ' segundos'
              }
            }
          }
        }

      },
      setDataTicket(ticket) {
        this.porcent_complete = 0;
        this.total_complete = 0;
        this.load_data_ticket = true;
        axios.get('/task/ticket/select', {
          params: {
            'ticket_id': ticket.id
          }
        }).then(response => {
          this.data_ticket = ticket;
          this.ticket_id = ticket.id
          this.task_ticket = response.data.tasks
          this.task_files = response.data.archivos
          this.load_data_ticket = false;
          this.total_task = this.task_ticket.length

          for (let index = 0; index < this.task_ticket.length; index++) {
            let element = this.task_ticket[index];

            if (element.complete == 1) {
              this.total_complete += 1
            }

          }

          this.porcent_complete = Math.round((this.total_complete * 100) / this.total_task)

        })

      },
      shortName(name, lastname) {
        let short = name.substr(0, 1) + lastname.substr(0, 1)
        return short;
      },
      filterTicker() {


        clearTimeout(this.setTimeoutBuscador)

        this.setTimeoutBuscador = setTimeout(() => this.getTickets(), 300);


      },
      updateList(task) {
        let check = document.getElementById("taskcheck" + task.id)

        if (check.checked) {
          this.value_complete = 1
        } else {
          this.value_complete = 0
        }

        axios.get('/update/task/list/ticket', {
          params: {
            'complete': this.value_complete,
            'task_id': task.id
          }
        }).then(response => {
          this.updateProgressBar()
        })

      },
      updateProgressBar() {
        axios.get('/task/ticket/select', {
          params: {
            'ticket_id': this.ticket_id
          }
        }).then(response => {
          this.task_ticket = response.data.tasks
          this.porcent_complete = 0;
          this.total_complete = 0;
          for (let index = 0; index < this.task_ticket.length; index++) {
            let element = this.task_ticket[index];

            if (element.complete == 1) {
              this.total_complete += 1
            }

          }

          this.porcent_complete = Math.round((this.total_complete * 100) / this.total_task)
        })


      },
      aproveTicket() {
        axios.get('/ticket/support/aprove', {
          params: {
            'ticket_id': this.ticket_id
          }
        }).then(response => {
          this.getTickets()
          this.sendNotificationMail()
        })
      },
      sendNotificationMail() {
        
        axios.get('/send/mail/change/status/ticket/support', {
          params: {
            'ticket_id': this.ticket_id
          }
        }).then(response => {
            this.ticket_id = ''
        })
      },
      typeFile(file) {
        let type = file.split(".").pop()
        if (type == "xlsx" || type == "xls" || type == "xlm") {
          return "fas fa-file-excel"

        } else if (type == "png" || type == "jpg" || type == "jpeg") {
          return "fas fa-file-image"
        } else if (type == "pdf" || type == "PDF") {
          return "fas fa-file-pdf"
        } else {
          return "fas fa-file"
        }
      },
      shortNameFile(name) {
        if (name.length > 14) {
          let short_name = name.substr(0, 12) + '...';
          return short_name;
        } else {
          let short_name = name;
          return short_name;
        }
      },


    }
  };
</script>
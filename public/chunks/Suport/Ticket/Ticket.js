(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunks/Suport/Ticket/Ticket"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Modals/Message.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Suport/Ticket/Modals/Message.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['ticket'],
  data: function data() {
    return {
      mensaje: ''
    };
  },
  methods: {
    sendMessage: function sendMessage() {
      var _this = this;

      $("#modal_message").modal("hide");
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/send/message/suport', {
        params: {
          'mensaje': this.mensaje,
          'ticket_id': this.ticket
        }
      }).then(function (response) {
        _this.alertFunction('success', 'Mensaje enviado');
      })["catch"](function (error) {
        _this.alertFunction('error', 'Error al enviar mensaje');
      });
    },
    alertFunction: function alertFunction(Type, Title) {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: function didOpen(toast) {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
      });
      Toast.fire({
        type: Type,
        title: Title
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Modals/Task.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Suport/Ticket/Modals/Task.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _event_bus__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../event-bus */ "./resources/js/components/Suport/Ticket/event-bus.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['ticket'],
  data: function data() {
    return {
      tasks: [],
      tarea: '',
      formData: new FormData(),
      success: ''
    };
  },
  created: function created() {},
  methods: {
    addTask: function addTask() {
      this.tasks.push({
        name: this.tarea
      });
      this.tarea = '';
    },
    deleteTast: function deleteTast(key) {
      this.tasks.splice(key, 1);
    },
    saveList: function saveList() {
      if (this.tasks.length != 0) {
        for (var index = 0; index < this.tasks.length; index++) {
          var element = this.tasks[index];
          var formData = new FormData();
          formData.append('name_task', element.name);
          formData.append('ticket_support_id', this.ticket.id);
          axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/ticket/suport/create/task', formData).then(function (response) {})["catch"](function (error) {});
        }

        this.alertFunction('success', 'Éxito', 'Su listado de tareas fue creado');
        this.tasks = [];
        $("#modal_task").modal('hide');
        _event_bus__WEBPACK_IMPORTED_MODULE_1__["default"].$emit('update.task.ticket.support', this.ticket);
      }
    },
    alertFunction: function alertFunction(Type, Title, Text) {
      Swal.fire({
        type: Type,
        title: Title,
        text: Text
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Modals/form.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Suport/Ticket/Modals/form.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _event_bus__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../event-bus */ "./resources/js/components/Suport/Ticket/event-bus.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['usuario'],
  data: function data() {
    return {
      plataformas: [],
      motivos: [],
      input: {
        plataforma_id: "",
        motivo_id: "",
        descripcion: "",
        files: []
      },
      formData: new FormData(),
      priorityValue: 0,
      priority_id: '',
      responsable_id: ''
    };
  },
  created: function created() {
    this.getData();
  },
  computed: {},
  methods: {
    getData: function getData() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/tickets/form/data').then(function (response) {
        _this.plataformas = response.data.plataformas;
        _this.motivos = response.data.motivo;
      });
    },
    getFiles: function getFiles(e) {
      var files = this.$refs.inpFile.files;

      for (var i = 0; i < files.length; i++) {
        this.input.files.push(files[i]);
      }
    },
    shortName: function shortName(name) {
      if (name.length > 14) {
        var short_name = name.substr(0, 12) + '...';
        return short_name;
      } else {
        var _short_name = name;
        return _short_name;
      }
    },
    typeFile: function typeFile(file) {
      var type = file.split(".").pop();

      if (type == "xlsx" || type == "xls" || type == "xlm") {
        return "fas fa-file-excel";
      } else if (type == "png" || type == "jpg" || type == "jpeg") {
        return "fas fa-file-image";
      } else if (type == "pdf" || type == "PDF") {
        return "fas fa-file-pdf";
      } else {
        return "fas fa-file";
      }
    },
    deleteFile: function deleteFile(key) {
      this.input.files.splice(key, 1);
    },
    createTicket: function createTicket() {
      var _this2 = this;

      if (this.input.descripcion != "" && this.input.plataforma_id != "" && this.input.motivo_id != "") {
        this.calculatePriority();
        this.formData.append('plataforma_id', this.input.plataforma_id);
        this.formData.append('descripcion', this.input.descripcion);
        this.formData.append('tipo_requisito_id', this.input.motivo_id);
        this.formData.append('prioridad_id', this.priority_id);
        this.formData.append('responsable_id', this.responsable_id);

        for (var i = 0; i < this.input.files.length; i++) {
          var archivo = this.input.files[i];
          this.formData.append('files[' + i + ']', archivo);
        }

        axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/ticket/suport/create', this.formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }).then(function (response) {
          $("#form_ticket").modal("hide");

          _this2.alertFunction('success', 'Ticket creado', 'Su ticket fue creado exitosamente, una vez este avance de estado sera notificado por correo eléctronico');

          _event_bus__WEBPACK_IMPORTED_MODULE_1__["default"].$emit('update.ticket.support');

          _this2.cleanForm();

          _this2.sendMail(response.data);
        })["catch"](function (error) {
          _this2.alertFunction('error', 'Error', 'Se produjo un error al crear el ticket, favor contactar con soporte');
        });
      }
    },
    calculatePriority: function calculatePriority() {
      if (this.usuario.rol == 1 || this.usuario.rol == 16 || this.usuario.rol == 6 || this.usuario.rol == 7 || this.usuario.rol == 17) {
        this.priorityValue = 5;
      } else if (this.usuario.rol == 8 || this.usuario.rol == 11) {
        this.priorityValue = 3;
      } else if (this.usuario.rol == 12 || this.usuario.rol == 10 || this.usuario.rol == 14) {
        this.priorityValue = 1;
      }

      if (this.input.plataforma_id == 5) {
        this.priorityValue += 3;
        this.responsable_id = 1;
      } else {
        this.priorityValue += 2;
        this.responsable_id = 2;
      }

      if (this.input.motivo_id == 1 || this.input.motivo_id == 2 || this.input.motivo_id == 8 || this.input.motivo_id == 7) {
        this.priorityValue += 1;
      } else if (this.input.motivo_id == 3 || this.input.motivo_id == 4 || this.input.motivo_id == 5 || this.input.motivo_id == 6) {
        this.priorityValue += 3;
      }

      if (this.priorityValue <= 4) {
        this.priority_id = 1;
      } else if (this.priorityValue >= 5 && this.priorityValue <= 8) {
        this.priority_id = 2;
      } else if (this.priorityValue > 8) {
        this.priority_id = 3;
      }
    },
    alertFunction: function alertFunction(Type, Title, Text) {
      Swal.fire({
        type: Type,
        title: Title,
        text: Text
      });
    },
    cleanForm: function cleanForm() {
      this.input.plataforma_id = "";
      this.input.motivo_id = "";
      this.input.descripcion = "";
      this.input.files = [];
    },
    sendMail: function sendMail(ticket) {
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/send/mail/developer', {
        params: {
          'ticket_id': ticket
        }
      }).then(function (response) {});
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Ticket.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Suport/Ticket/Ticket.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _Modals_form_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Modals/form.vue */ "./resources/js/components/Suport/Ticket/Modals/form.vue");
/* harmony import */ var _Modals_Task_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./Modals/Task.vue */ "./resources/js/components/Suport/Ticket/Modals/Task.vue");
/* harmony import */ var _Modals_Message_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./Modals/Message.vue */ "./resources/js/components/Suport/Ticket/Modals/Message.vue");
/* harmony import */ var _event_bus__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./event-bus */ "./resources/js/components/Suport/Ticket/event-bus.js");
/* harmony import */ var _VuePagination_vue__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../VuePagination.vue */ "./resources/js/components/Suport/VuePagination.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//







/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    'ticket-form': _Modals_form_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
    'task-form': _Modals_Task_vue__WEBPACK_IMPORTED_MODULE_3__["default"],
    'vue-pagination': _VuePagination_vue__WEBPACK_IMPORTED_MODULE_6__["default"],
    'send-message': _Modals_Message_vue__WEBPACK_IMPORTED_MODULE_4__["default"]
  },
  props: ['usuario'],
  data: function data() {
    return {
      tickets: {
        'total': 0,
        'current_page': 1,
        'per_page': 10,
        'from': 2,
        'to': 0
      },
      cards: [{
        id: 1,
        name: 'En espera',
        i_class: 'fas fa-check',
        card_class: 'card-icon verde',
        value: 0
      }, {
        id: 2,
        name: 'En curso',
        i_class: 'fas fa-code-branch',
        card_class: 'card-icon azul',
        value: 0
      }, {
        id: 3,
        name: 'Finalizado',
        i_class: 'fas fa-calendar-check',
        card_class: 'card-icon rosa',
        value: 0
      }, {
        id: 7,
        name: 'Rechazado',
        i_class: 'fas fa-times-circle',
        card_class: 'card-icon red',
        value: 0
      }],
      module: 1,
      load_data: null,
      load_count: false,
      actualy_date: moment__WEBPACK_IMPORTED_MODULE_1___default()(),
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
      setTimeoutBuscador: ''
    };
  },
  mounted: function mounted() {
    var self = this;
    _event_bus__WEBPACK_IMPORTED_MODULE_5__["default"].$on('update.ticket.support', function () {
      self.getTickets();
    });
    _event_bus__WEBPACK_IMPORTED_MODULE_5__["default"].$on('update.task.ticket.support', function (ticket) {
      self.setDataTicket(ticket);
    });
  },
  computed: {
    nameModule: function nameModule() {
      var name = this.module == 1 ? 'Validación' : this.module == 2 ? 'En proceso' : this.module == 3 ? 'Finalizado' : this.module == 4 ? 'Rechazado' : '';
      return name;
    }
  },
  created: function created() {
    this.getTickets();
  },
  methods: {
    getTickets: function getTickets(module) {
      var _this = this;

      this.load_data = false;
      this.data_ticket = '';

      if (module) {
        this.module = module;
      } else {
        this.module = this.module;
      }

      this.tickets.current_page = 1;
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/tickets/support?page=".concat(this.tickets.current_page, "&module=").concat(this.module, "&search=").concat(this.search_input)).then(function (response) {
        _this.tickets = response.data.tickets;

        _this.cards.map(function (card) {
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

        _this.load_data = !_this.load_data;

        if (!_this.load_count) {
          _this.load_count = !_this.load_count;
        }
      });
    },
    paginateTickets: function paginateTickets(module) {
      var _this2 = this;

      this.data_ticket = '';

      if (module) {
        this.module = module;
      } else {
        this.module = this.module;
      }

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/tickets/support?page=".concat(this.tickets.current_page, "&module=").concat(this.module, "&search=").concat(this.search_input)).then(function (response) {
        _this2.tickets = response.data.tickets;
      });
    },
    time: function time(created_at) {
      if (this.actualy_date.diff(created_at, 'minute') < 60 && this.actualy_date.diff(created_at, 'minute') >= 1) {
        return this.actualy_date.diff(created_at, "minute") + ' minutos';
      } else {
        if (this.actualy_date.diff(created_at, 'days') == 0 && this.actualy_date.diff(created_at, 'minute') >= 60) {
          return this.actualy_date.diff(created_at, "hours") + ' hrs';
        } else {
          if (this.actualy_date.diff(created_at, 'days') >= 1) {
            return this.actualy_date.diff(created_at, "days") + ' días';
          } else {
            if (this.actualy_date.diff(created_at, 'minute') < 1) {
              return this.actualy_date.diff(created_at, "seconds") + ' segundos';
            }
          }
        }
      }
    },
    setDataTicket: function setDataTicket(ticket) {
      var _this3 = this;

      this.porcent_complete = 0;
      this.total_complete = 0;
      this.load_data_ticket = true;
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/task/ticket/select', {
        params: {
          'ticket_id': ticket.id
        }
      }).then(function (response) {
        _this3.data_ticket = ticket;
        _this3.ticket_id = ticket.id;
        _this3.task_ticket = response.data.tasks;
        _this3.task_files = response.data.archivos;
        _this3.load_data_ticket = false;
        _this3.total_task = _this3.task_ticket.length;

        for (var index = 0; index < _this3.task_ticket.length; index++) {
          var element = _this3.task_ticket[index];

          if (element.complete == 1) {
            _this3.total_complete += 1;
          }
        }

        _this3.porcent_complete = Math.round(_this3.total_complete * 100 / _this3.total_task);
      });
    },
    shortName: function shortName(name, lastname) {
      var _short = name.substr(0, 1) + lastname.substr(0, 1);

      return _short;
    },
    filterTicker: function filterTicker() {
      var _this4 = this;

      clearTimeout(this.setTimeoutBuscador);
      this.setTimeoutBuscador = setTimeout(function () {
        return _this4.getTickets();
      }, 300);
    },
    updateList: function updateList(task) {
      var _this5 = this;

      var check = document.getElementById("taskcheck" + task.id);

      if (check.checked) {
        this.value_complete = 1;
      } else {
        this.value_complete = 0;
      }

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/update/task/list/ticket', {
        params: {
          'complete': this.value_complete,
          'task_id': task.id
        }
      }).then(function (response) {
        _this5.updateProgressBar();
      });
    },
    updateProgressBar: function updateProgressBar() {
      var _this6 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/task/ticket/select', {
        params: {
          'ticket_id': this.ticket_id
        }
      }).then(function (response) {
        _this6.task_ticket = response.data.tasks;
        _this6.porcent_complete = 0;
        _this6.total_complete = 0;

        for (var index = 0; index < _this6.task_ticket.length; index++) {
          var element = _this6.task_ticket[index];

          if (element.complete == 1) {
            _this6.total_complete += 1;
          }
        }

        _this6.porcent_complete = Math.round(_this6.total_complete * 100 / _this6.total_task);
      });
    },
    aproveTicket: function aproveTicket() {
      var _this7 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/ticket/support/aprove', {
        params: {
          'ticket_id': this.ticket_id
        }
      }).then(function (response) {
        _this7.getTickets();

        _this7.sendNotificationMail();
      });
    },
    sendNotificationMail: function sendNotificationMail() {
      var _this8 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/send/mail/change/status/ticket/support', {
        params: {
          'ticket_id': this.ticket_id
        }
      }).then(function (response) {
        _this8.ticket_id = '';
      });
    },
    typeFile: function typeFile(file) {
      var type = file.split(".").pop();

      if (type == "xlsx" || type == "xls" || type == "xlm") {
        return "fas fa-file-excel";
      } else if (type == "png" || type == "jpg" || type == "jpeg") {
        return "fas fa-file-image";
      } else if (type == "pdf" || type == "PDF") {
        return "fas fa-file-pdf";
      } else {
        return "fas fa-file";
      }
    },
    shortNameFile: function shortNameFile(name) {
      if (name.length > 14) {
        var short_name = name.substr(0, 12) + '...';
        return short_name;
      } else {
        var _short_name = name;
        return _short_name;
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/VuePagination.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Suport/VuePagination.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    pagination: {
      type: Object,
      required: true
    },
    offset: {
      type: Number,
      "default": 4
    },
    primaryText: String
  },
  computed: {
    pagesNumber: function pagesNumber() {
      if (!this.pagination.to) {
        return [];
      }

      var from = this.pagination.current_page - this.offset;

      if (from < 1) {
        from = 1;
      }

      var to = from + this.offset * 2;

      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }

      var pagesArray = [];

      for (var page = from; page <= to; page++) {
        pagesArray.push(page);
      }

      return pagesArray;
    }
  },
  methods: {
    changePage: function changePage(page) {
      this.pagination.current_page = page;
      this.$emit('paginate');
      this.loadFunction();
    },
    loadFunction: function loadFunction() {
      var loader = this.$loading.show({
        // Optional parameters
        container: this.fullPage ? null : this.$refs.formContainer,
        canCancel: true,
        onCancel: this.onCancel
      }); // simulate AJAX

      setTimeout(function () {
        loader.hide();
      }, 300);
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Modals/Message.vue?vue&type=template&id=ec6e4840&":
/*!*******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Suport/Ticket/Modals/Message.vue?vue&type=template&id=ec6e4840& ***!
  \*******************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "modal inmodal",
      attrs: {
        "aria-hidden": "true",
        id: "modal_message",
        role: "dialog",
        tabindex: "-1",
        "data-backdrop": "static",
      },
    },
    [
      _c("div", { staticClass: "modal-dialog " }, [
        _c("div", { staticClass: "modal-content animated bounceInRight" }, [
          _vm._m(0),
          _vm._v(" "),
          _c("div", { staticClass: "modal-body" }, [
            _c("div", { staticClass: "form-group" }, [
              _c("label", [_vm._v("Mensaje")]),
              _vm._v(" "),
              _c("textarea", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.mensaje,
                    expression: "mensaje",
                  },
                ],
                staticClass: "form-control",
                staticStyle: { height: "150px" },
                domProps: { value: _vm.mensaje },
                on: {
                  input: function ($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.mensaje = $event.target.value
                  },
                },
              }),
            ]),
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "modal-footer" }, [
            _c(
              "a",
              {
                staticClass: "btn btn-info barlow semi_bold",
                staticStyle: { color: "white" },
                attrs: { href: "#" },
                on: { click: _vm.sendMessage },
              },
              [_vm._v("\n                    Enviar\n                ")]
            ),
          ]),
        ]),
      ]),
    ]
  )
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-header md_h_s" }, [
      _c(
        "h5",
        { staticClass: "modal-title", staticStyle: { color: "white" } },
        [_vm._v("\n                    Enviar mensaje\n                ")]
      ),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass: "close",
          attrs: {
            "aria-label": "Close",
            "data-dismiss": "modal",
            type: "button",
          },
        },
        [
          _c(
            "span",
            {
              staticStyle: { color: "white" },
              attrs: { "aria-hidden": "true" },
            },
            [_vm._v("\n                        ×\n                    ")]
          ),
        ]
      ),
    ])
  },
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Modals/Task.vue?vue&type=template&id=5e818f08&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Suport/Ticket/Modals/Task.vue?vue&type=template&id=5e818f08& ***!
  \****************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "modal inmodal",
      attrs: {
        "aria-hidden": "true",
        id: "modal_task",
        role: "dialog",
        tabindex: "-1",
        "data-backdrop": "static",
      },
    },
    [
      _c("div", { staticClass: "modal-dialog " }, [
        _c("div", { staticClass: "modal-content animated bounceInRight" }, [
          _vm._m(0),
          _vm._v(" "),
          _c("div", { staticClass: "modal-body" }, [
            _c("div", { staticClass: "form-group" }, [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-lg-10" }, [
                  _c("label", { staticClass: "barlow semi_bold" }, [
                    _vm._v("Nombre tarea"),
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.tarea,
                        expression: "tarea",
                      },
                    ],
                    staticClass: "form-control",
                    attrs: { type: "text" },
                    domProps: { value: _vm.tarea },
                    on: {
                      input: function ($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.tarea = $event.target.value
                      },
                    },
                  }),
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-lg-2" }, [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-success ",
                      staticStyle: { "margin-top": "2rem" },
                      on: { click: _vm.addTask },
                    },
                    [_c("i", { staticClass: "fa fa-plus" })]
                  ),
                ]),
              ]),
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "card-body" }, [
              _c(
                "ul",
                { staticClass: "list-group" },
                _vm._l(_vm.tasks, function (task, key) {
                  return _c(
                    "li",
                    {
                      staticClass:
                        "list-group-item d-flex justify-content-between align-items-center",
                    },
                    [
                      _vm._v(
                        "\n                            " +
                          _vm._s(task.name) +
                          "\n                            "
                      ),
                      _c(
                        "a",
                        {
                          staticClass: "badge-pill",
                          staticStyle: { cursor: "pointer", color: "red" },
                          on: {
                            click: function ($event) {
                              return _vm.deleteTast(key)
                            },
                          },
                        },
                        [
                          _c("i", {
                            staticClass: "fas fa-times-circle",
                            staticStyle: { "font-size": "18px" },
                          }),
                        ]
                      ),
                    ]
                  )
                }),
                0
              ),
            ]),
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "modal-footer" }, [
            _c(
              "a",
              {
                staticClass: "btn btn-info barlow semi_bold",
                staticStyle: { color: "white" },
                attrs: { href: "#" },
                on: { click: _vm.saveList },
              },
              [
                _vm._v(
                  "\n                    Guardar listado\n                "
                ),
              ]
            ),
          ]),
        ]),
      ]),
    ]
  )
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-header md_h_s" }, [
      _c(
        "h5",
        { staticClass: "modal-title", staticStyle: { color: "white" } },
        [_vm._v("\n                    Listado de tareas\n                ")]
      ),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass: "close",
          attrs: {
            "aria-label": "Close",
            "data-dismiss": "modal",
            type: "button",
          },
        },
        [
          _c(
            "span",
            {
              staticStyle: { color: "white" },
              attrs: { "aria-hidden": "true" },
            },
            [_vm._v("\n                        ×\n                    ")]
          ),
        ]
      ),
    ])
  },
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Modals/form.vue?vue&type=template&id=0192f41b&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Suport/Ticket/Modals/form.vue?vue&type=template&id=0192f41b& ***!
  \****************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "modal inmodal",
      attrs: {
        "aria-hidden": "true",
        id: "form_ticket",
        role: "dialog",
        tabindex: "-1",
        "data-backdrop": "static",
      },
    },
    [
      _c("div", { staticClass: "modal-dialog " }, [
        _c("div", { staticClass: "modal-content animated bounceInRight" }, [
          _vm._m(0),
          _vm._v(" "),
          _c("div", { staticClass: "modal-body" }, [
            _c("div", { staticClass: "form-group" }, [
              _c("label", { staticClass: "barlow semi_bold" }, [
                _vm._v("*Plataforma"),
              ]),
              _vm._v(" "),
              _c(
                "select",
                {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.input.plataforma_id,
                      expression: "input.plataforma_id",
                    },
                  ],
                  staticClass: "form-control select barlow regular",
                  on: {
                    change: function ($event) {
                      var $$selectedVal = Array.prototype.filter
                        .call($event.target.options, function (o) {
                          return o.selected
                        })
                        .map(function (o) {
                          var val = "_value" in o ? o._value : o.value
                          return val
                        })
                      _vm.$set(
                        _vm.input,
                        "plataforma_id",
                        $event.target.multiple
                          ? $$selectedVal
                          : $$selectedVal[0]
                      )
                    },
                  },
                },
                _vm._l(_vm.plataformas, function (plataforma) {
                  return _c(
                    "option",
                    {
                      staticClass: "barlow regular",
                      domProps: { value: plataforma.id },
                    },
                    [
                      _vm._v(
                        "\n                            " +
                          _vm._s(plataforma.descripcion) +
                          "\n                        "
                      ),
                    ]
                  )
                }),
                0
              ),
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group" }, [
              _c("label", { staticClass: "barlow semi_bold" }, [
                _vm._v("*Motivo"),
              ]),
              _vm._v(" "),
              _c(
                "select",
                {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.input.motivo_id,
                      expression: "input.motivo_id",
                    },
                  ],
                  staticClass: "form-control select",
                  on: {
                    change: function ($event) {
                      var $$selectedVal = Array.prototype.filter
                        .call($event.target.options, function (o) {
                          return o.selected
                        })
                        .map(function (o) {
                          var val = "_value" in o ? o._value : o.value
                          return val
                        })
                      _vm.$set(
                        _vm.input,
                        "motivo_id",
                        $event.target.multiple
                          ? $$selectedVal
                          : $$selectedVal[0]
                      )
                    },
                  },
                },
                _vm._l(_vm.motivos, function (motivo) {
                  return _c(
                    "option",
                    {
                      staticClass: "barlow regular",
                      domProps: { value: motivo.id },
                    },
                    [
                      _vm._v(
                        "\n                            " +
                          _vm._s(motivo.descripcion) +
                          "\n                        "
                      ),
                    ]
                  )
                }),
                0
              ),
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group" }, [
              _c("label", { staticClass: "barlow semi_bold" }, [
                _vm._v("*Descripción"),
              ]),
              _vm._v(" "),
              _c("textarea", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.input.descripcion,
                    expression: "input.descripcion",
                  },
                ],
                staticClass: "form-control",
                staticStyle: { height: "150px" },
                attrs: { maxlength: "1000" },
                domProps: { value: _vm.input.descripcion },
                on: {
                  input: function ($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.input, "descripcion", $event.target.value)
                  },
                },
              }),
              _vm._v(" "),
              _c("div", { staticClass: "barlow regular" }, [
                _vm._v(
                  "\n                        " +
                    _vm._s(_vm.input.descripcion.length) +
                    "/1000\n                    "
                ),
              ]),
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group" }, [
              _c("label", { staticClass: "barlow semi_bold" }, [
                _vm._v("Archivos (opcional)"),
              ]),
              _vm._v(" "),
              _c("input", {
                ref: "inpFile",
                staticClass: "form-control",
                attrs: { type: "file", multiple: "true" },
                on: { change: _vm.getFiles },
              }),
            ]),
            _vm._v(" "),
            _vm.input.files.length != 0
              ? _c(
                  "div",
                  { staticClass: "row tck_suport" },
                  _vm._l(_vm.input.files, function (file, key) {
                    return _c("div", { staticClass: "col-lg-3 text-center" }, [
                      _c(
                        "div",
                        {
                          staticClass: "browser ",
                          attrs: { title: file.name },
                        },
                        [
                          _c("i", {
                            class: _vm.typeFile(file.name),
                            staticStyle: { "font-size": "55px" },
                          }),
                        ]
                      ),
                      _vm._v(" "),
                      _c("div", { staticClass: "mt-2 barlow regular" }, [
                        _vm._v(_vm._s(_vm.shortName(file.name))),
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "text-muted text-small" }, [
                        _c(
                          "a",
                          {
                            attrs: { href: "#" },
                            on: {
                              click: function ($event) {
                                return _vm.deleteFile(key)
                              },
                            },
                          },
                          [_c("i", { staticClass: "fa fa-trash" })]
                        ),
                      ]),
                    ])
                  }),
                  0
                )
              : _vm._e(),
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "modal-footer" }, [
            _c(
              "a",
              {
                staticClass: "btn btn-info barlow semi_bold",
                staticStyle: { color: "white" },
                attrs: { href: "#" },
                on: { click: _vm.createTicket },
              },
              [_vm._v("\n                    Generar ticket\n                ")]
            ),
          ]),
        ]),
      ]),
    ]
  )
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-header md_h_s" }, [
      _c(
        "h5",
        { staticClass: "modal-title", staticStyle: { color: "white" } },
        [_vm._v("\n                    Formulario\n                ")]
      ),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass: "close",
          attrs: {
            "aria-label": "Close",
            "data-dismiss": "modal",
            type: "button",
          },
        },
        [
          _c(
            "span",
            {
              staticStyle: { color: "white" },
              attrs: { "aria-hidden": "true" },
            },
            [_vm._v("\n                        ×\n                    ")]
          ),
        ]
      ),
    ])
  },
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Ticket.vue?vue&type=template&id=58946fae&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Suport/Ticket/Ticket.vue?vue&type=template&id=58946fae& ***!
  \***********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "main-content" },
    [
      _c("div", { staticClass: "wrapper wrapper-content" }, [
        _vm._m(0),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "row" },
          _vm._l(_vm.cards, function (card, index) {
            return _c(
              "div",
              { key: index, staticClass: "col-lg-3 col-md-6 col-sm-6 col-12" },
              [
                _c(
                  "div",
                  {
                    staticClass:
                      "card card-statistic-1 boxBounce animated fadeIn",
                    style:
                      card.id == _vm.module ? "background-color:#093BC8" : "",
                  },
                  [
                    _c(
                      "a",
                      {
                        staticStyle: { color: "#2fcbf1" },
                        attrs: { href: "" },
                        on: {
                          click: function ($event) {
                            $event.preventDefault()
                            return _vm.getTickets(card.id)
                          },
                        },
                      },
                      [
                        _c(
                          "div",
                          {
                            class: card.card_class,
                            style:
                              card.id == _vm.module
                                ? "background-color:white;"
                                : "",
                          },
                          [
                            _c("i", {
                              class: card.i_class,
                              staticStyle: {
                                "font-size": "25px",
                                color: "white",
                              },
                              style:
                                card.id == _vm.module ? "color:#191919" : "",
                            }),
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "card-wrap" }, [
                          _c("div", { staticClass: "card-header" }, [
                            _c(
                              "h4",
                              {
                                staticClass: "barlow semi_bold",
                                style:
                                  card.id == _vm.module ? "color:white" : "",
                              },
                              [
                                _vm._v(
                                  "\n                  " +
                                    _vm._s(card.name) +
                                    "\n                "
                                ),
                              ]
                            ),
                          ]),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "card-body animated fadeIn barlow semi_bold",
                              staticStyle: { "font-size": "35px" },
                              style: card.id == _vm.module ? "color:white" : "",
                            },
                            [
                              _vm._v(
                                "\n                " +
                                  _vm._s(_vm.load_count ? card.value : "") +
                                  "\n                "
                              ),
                              !_vm.load_count
                                ? _c("div", {
                                    staticClass: "spinner-border text-primary",
                                    staticStyle: {
                                      width: "3rem",
                                      height: "3rem",
                                      color: "#007bff!important",
                                    },
                                    attrs: { role: "status" },
                                  })
                                : _vm._e(),
                            ]
                          ),
                        ]),
                      ]
                    ),
                  ]
                ),
              ]
            )
          }),
          0
        ),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c(
            "div",
            {
              staticClass: "col-lg-3 col-md-6 col-sm-6 col-12",
              staticStyle: { "min-height": "300px" },
            },
            [
              _c("div", { staticClass: "card" }, [
                _c("div", { staticClass: "card-header" }, [
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-lg-6" }, [
                      _c(
                        "h4",
                        {
                          staticClass: "card-title",
                          staticStyle: { color: "#191919" },
                        },
                        [
                          _vm._v(
                            "\n                  " +
                              _vm._s(_vm.nameModule) +
                              "\n                "
                          ),
                        ]
                      ),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-6" }, [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.search_input,
                            expression: "search_input",
                          },
                        ],
                        staticClass: "form-control",
                        attrs: { placeholder: "buscar", type: "text" },
                        domProps: { value: _vm.search_input },
                        on: {
                          keyup: _vm.filterTicker,
                          input: function ($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.search_input = $event.target.value
                          },
                        },
                      }),
                    ]),
                  ]),
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "card-body" }, [
                  _vm.load_data
                    ? _c("div", { staticClass: "tickets" }, [
                        _c(
                          "div",
                          {
                            staticClass:
                              "ticket-items animated animated fadeIn",
                            staticStyle: { width: "100%!important" },
                            attrs: { id: "ticket-items" },
                          },
                          [
                            _vm._l(_vm.tickets.data, function (ticket) {
                              return _c(
                                "div",
                                {
                                  staticClass: "ticket-item mt-2 tck_suport",
                                  class:
                                    ticket.id == _vm.data_ticket.id
                                      ? "active_ticketd_card"
                                      : "",
                                  on: {
                                    click: function ($event) {
                                      return _vm.setDataTicket(ticket)
                                    },
                                  },
                                },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "ticket-title barlow bold" },
                                    [
                                      _c(
                                        "h5",
                                        {
                                          staticStyle: { "font-size": "16px" },
                                        },
                                        [
                                          _vm._v(
                                            "\n                      Ticket N° " +
                                              _vm._s(ticket.id) +
                                              " - " +
                                              _vm._s(
                                                ticket.plataforma
                                                  ? ticket.plataforma
                                                      .descripcion
                                                  : ""
                                              ) +
                                              "\n                    "
                                          ),
                                        ]
                                      ),
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "ticket-title barlow semi_bold",
                                    },
                                    [
                                      _c("h4", [
                                        _vm._v(
                                          "\n                      " +
                                            _vm._s(
                                              ticket.tipo_requisito.descripcion
                                            ) +
                                            "\n                    "
                                        ),
                                      ]),
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "ticket-desc barlow semi_bold",
                                    },
                                    [
                                      _c(
                                        "div",
                                        {
                                          style:
                                            ticket.id == _vm.data_ticket.id
                                              ? "color:#191919"
                                              : "",
                                        },
                                        [
                                          _vm._v(
                                            "\n                      " +
                                              _vm._s(ticket.user.name) +
                                              "\n                      " +
                                              _vm._s(ticket.user.apellido) +
                                              "\n                    "
                                          ),
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("div", { staticClass: "bullet" }),
                                      _vm._v(" "),
                                      _c(
                                        "div",
                                        {
                                          style:
                                            ticket.id == _vm.data_ticket.id
                                              ? "color:#191919"
                                              : "",
                                        },
                                        [
                                          _vm._v(
                                            "\n                      Hace " +
                                              _vm._s(
                                                _vm.time(ticket.created_at)
                                              ) +
                                              "\n                    "
                                          ),
                                        ]
                                      ),
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    { staticClass: "ticket-desc mt-2" },
                                    [
                                      _c(
                                        "span",
                                        {
                                          staticClass: "badge barlow semi_bold",
                                          class:
                                            ticket.prioridad_id == 1
                                              ? "badge-success"
                                              : ticket.prioridad_id == 2
                                              ? "badge-warning"
                                              : ticket.prioridad_id == 3
                                              ? "badge-danger"
                                              : "",
                                        },
                                        [
                                          _vm._v(
                                            "\n                      " +
                                              _vm._s(
                                                ticket.prioridad.descripcion
                                              ) +
                                              "\n                    "
                                          ),
                                        ]
                                      ),
                                    ]
                                  ),
                                ]
                              )
                            }),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticStyle: { "margin-top": "30px" } },
                              [
                                _c(
                                  "nav",
                                  {
                                    staticClass: "pagination",
                                    attrs: {
                                      "aria-label": "pagination",
                                      role: "navigation",
                                    },
                                  },
                                  [
                                    _c("vue-pagination", {
                                      attrs: {
                                        offset: 4,
                                        pagination: _vm.tickets,
                                      },
                                      on: {
                                        paginate: function ($event) {
                                          return _vm.paginateTickets()
                                        },
                                      },
                                    }),
                                  ],
                                  1
                                ),
                              ]
                            ),
                          ],
                          2
                        ),
                      ])
                    : _vm._e(),
                  _vm._v(" "),
                  !_vm.load_data
                    ? _c(
                        "div",
                        { staticClass: "d-flex justify-content-center" },
                        [
                          _c("div", {
                            staticClass: "spinner-border text-primary",
                            staticStyle: {
                              width: "8rem",
                              height: "8rem",
                              color: "#007bff!important",
                            },
                            attrs: { role: "status" },
                          }),
                        ]
                      )
                    : _vm._e(),
                ]),
              ]),
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-9 col-md-6 col-sm-6 col-12" }, [
            _c("div", { staticClass: "card" }, [
              _c("div", { staticClass: "card-header" }, [
                _c("div", { staticClass: "row" }, [
                  _vm._m(1),
                  _vm._v(" "),
                  (_vm.ticket_id != "" && _vm.usuario.id == 1) ||
                  (_vm.ticket_id != "" && _vm.usuario.id == 2)
                    ? _c("div", { staticClass: "col-lg-2" }, [
                        _vm.data_ticket.estado_id == 1 ||
                        _vm.data_ticket.estado_id == 2
                          ? _c(
                              "button",
                              {
                                staticClass: "btn btn-success",
                                staticStyle: { "border-radius": "5px" },
                                on: {
                                  click: function ($event) {
                                    $event.preventDefault()
                                    return _vm.aproveTicket.apply(
                                      null,
                                      arguments
                                    )
                                  },
                                },
                              },
                              [_c("i", { staticClass: "fa fa-check" })]
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        _vm.data_ticket.estado_id == 1
                          ? _c(
                              "button",
                              {
                                staticClass: "btn btn-danger",
                                staticStyle: { "border-radius": "5px" },
                              },
                              [_c("i", { staticClass: "fas fa-times-circle" })]
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        _vm._m(2),
                      ])
                    : _vm._e(),
                ]),
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "card-body" }, [
                !_vm.load_data_ticket
                  ? _c("div", { staticClass: "tickets" }, [
                      _vm.data_ticket
                        ? _c(
                            "div",
                            {
                              staticClass: "ticket-content",
                              staticStyle: { width: "100%!important" },
                            },
                            [
                              _c("div", { staticClass: "ticket-header" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "ticket-sender-picture img-shadow",
                                    staticStyle: {
                                      "box-shadow":
                                        "0 0px 0px rgba(0, 0, 0, 0)",
                                    },
                                  },
                                  [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "card-icon dropdown-item-avatar",
                                      },
                                      [
                                        _c(
                                          "a",
                                          {
                                            attrs: {
                                              title:
                                                _vm.data_ticket.user.name +
                                                " " +
                                                _vm.data_ticket.user.apellido,
                                              href: "#",
                                            },
                                          },
                                          [
                                            _c("figure", {
                                              staticClass:
                                                "avatar mr-2 bg-primary text-white",
                                              attrs: {
                                                "data-initial": _vm.shortName(
                                                  _vm.data_ticket.user.name,
                                                  _vm.data_ticket.user.apellido
                                                ),
                                              },
                                            }),
                                          ]
                                        ),
                                      ]
                                    ),
                                  ]
                                ),
                                _vm._v(" "),
                                _c("div", { staticClass: "ticket-detail" }, [
                                  _c("div", { staticClass: "ticket-title" }, [
                                    _c(
                                      "h4",
                                      { staticClass: "barlow semi_bold" },
                                      [
                                        _vm._v(
                                          "\n                        " +
                                            _vm._s(
                                              _vm.data_ticket.tipo_requisito
                                                .descripcion
                                            ) +
                                            " -\n                        " +
                                            _vm._s(
                                              _vm.data_ticket.plataforma
                                                ? _vm.data_ticket.plataforma
                                                    .descripcion
                                                : ""
                                            ) +
                                            "\n                      "
                                        ),
                                      ]
                                    ),
                                  ]),
                                  _vm._v(" "),
                                  _c("div", { staticClass: "ticket-info" }, [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "font-weight-600 barlow regular",
                                      },
                                      [
                                        _vm._v(
                                          "\n                        " +
                                            _vm._s(_vm.data_ticket.user.name) +
                                            "\n                        " +
                                            _vm._s(
                                              _vm.data_ticket.user.apellido
                                            ) +
                                            "\n                      "
                                        ),
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "bullet" }),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          " font-weight-600 barlow regular",
                                      },
                                      [
                                        _vm._v(
                                          "\n                        Hace " +
                                            _vm._s(
                                              _vm.time(
                                                _vm.data_ticket.created_at
                                              )
                                            ) +
                                            "\n                      "
                                        ),
                                      ]
                                    ),
                                  ]),
                                ]),
                              ]),
                              _vm._v(" "),
                              _c("hr"),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "ticket-description barlow regular",
                                  staticStyle: { "margin-top": "-10px" },
                                },
                                [
                                  _c("div", [
                                    _vm._m(3),
                                    _vm._v(" "),
                                    _c("p", [
                                      _c(
                                        "textarea",
                                        {
                                          staticClass:
                                            "form-control barlow regular",
                                          style:
                                            "height:" +
                                            _vm.data_ticket.descripcion.length +
                                            "px",
                                          attrs: {
                                            disabled: "true",
                                            maxlength: "1000",
                                          },
                                          domProps: {
                                            value: _vm.data_ticket.descripcion,
                                          },
                                        },
                                        [
                                          _vm._v(
                                            "   " +
                                              _vm._s(
                                                _vm.data_ticket.descripcion
                                              )
                                          ),
                                        ]
                                      ),
                                    ]),
                                  ]),
                                  _vm._v(" "),
                                  _c("hr"),
                                  _vm._v(" "),
                                  _c("div", {}, [
                                    _vm._m(4),
                                    _vm._v(" "),
                                    (_vm.task_ticket.length != 0 &&
                                      _vm.usuario.id == 1) ||
                                    (_vm.task_ticket.length != 0 &&
                                      _vm.usuario.id == 2)
                                      ? _c(
                                          "div",
                                          { staticClass: "card-body" },
                                          [
                                            _c(
                                              "div",
                                              {
                                                staticClass: "progress mb-3",
                                                staticStyle: { height: "22px" },
                                              },
                                              [
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "progress-bar bg-info",
                                                    staticStyle: {
                                                      "font-size": "15px",
                                                    },
                                                    style:
                                                      "width:" +
                                                      _vm.porcent_complete +
                                                      "%",
                                                    attrs: {
                                                      "data-with":
                                                        _vm.porcent_complete +
                                                        "%",
                                                      role: "progressbar",
                                                      "aria-valuenow":
                                                        _vm.porcent_complete,
                                                      "aria-valuemin": "0",
                                                      "aria-valuemax": "100",
                                                    },
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                          " +
                                                        _vm._s(
                                                          _vm.porcent_complete
                                                        ) +
                                                        "% "
                                                    ),
                                                  ]
                                                ),
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "row tck_suport mt-3",
                                              },
                                              [
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass: "col-lg-12",
                                                    staticStyle: {
                                                      "max-height": "380px",
                                                      "overflow-y": "scroll",
                                                      "margin-top": "10px",
                                                    },
                                                  },
                                                  [
                                                    _c(
                                                      "ul",
                                                      {
                                                        staticClass:
                                                          "list-group",
                                                      },
                                                      _vm._l(
                                                        _vm.task_ticket,
                                                        function (task, key) {
                                                          return _c(
                                                            "li",
                                                            {
                                                              staticClass:
                                                                "list-group-item d-flex justify-content-between align-items-center",
                                                              style:
                                                                task.complete ==
                                                                1
                                                                  ? "background: rgba(0, 151, 19, 0.3);"
                                                                  : "",
                                                            },
                                                            [
                                                              _vm._v(
                                                                "\n                              " +
                                                                  _vm._s(
                                                                    task.name_task
                                                                  ) +
                                                                  "\n                              "
                                                              ),
                                                              _vm.data_ticket
                                                                .estado_id != 3
                                                                ? _c("input", {
                                                                    staticClass:
                                                                      "form control",
                                                                    staticStyle:
                                                                      {
                                                                        cursor:
                                                                          "pointer",
                                                                      },
                                                                    attrs: {
                                                                      id:
                                                                        "taskcheck" +
                                                                        task.id,
                                                                      type: "checkbox",
                                                                    },
                                                                    domProps: {
                                                                      checked:
                                                                        task.complete ==
                                                                        1
                                                                          ? true
                                                                          : false,
                                                                    },
                                                                    on: {
                                                                      click:
                                                                        function (
                                                                          $event
                                                                        ) {
                                                                          return _vm.updateList(
                                                                            task
                                                                          )
                                                                        },
                                                                    },
                                                                  })
                                                                : _vm._e(),
                                                            ]
                                                          )
                                                        }
                                                      ),
                                                      0
                                                    ),
                                                  ]
                                                ),
                                              ]
                                            ),
                                          ]
                                        )
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.task_ticket.length != 0 &&
                                    _vm.usuario.id != 1 &&
                                    _vm.usuario.id != 2
                                      ? _c(
                                          "div",
                                          { staticClass: "card-body" },
                                          [
                                            _c(
                                              "div",
                                              {
                                                staticClass: "progress mb-3",
                                                staticStyle: { height: "22px" },
                                              },
                                              [
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "progress-bar bg-info",
                                                    staticStyle: {
                                                      "font-size": "15px",
                                                    },
                                                    style:
                                                      "width:" +
                                                      _vm.porcent_complete +
                                                      "%",
                                                    attrs: {
                                                      "data-with":
                                                        _vm.porcent_complete +
                                                        "%",
                                                      role: "progressbar",
                                                      "aria-valuenow":
                                                        _vm.porcent_complete,
                                                      "aria-valuemin": "0",
                                                      "aria-valuemax": "100",
                                                    },
                                                  },
                                                  [
                                                    _vm._v(
                                                      " " +
                                                        _vm._s(
                                                          _vm.porcent_complete
                                                        ) +
                                                        "% "
                                                    ),
                                                  ]
                                                ),
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "row tck_suport mt-3",
                                              },
                                              [
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass: "col-lg-12",
                                                    staticStyle: {
                                                      "max-height": "380px",
                                                      "overflow-y": "scroll",
                                                      "margin-top": "10px",
                                                    },
                                                  },
                                                  [
                                                    _c(
                                                      "ul",
                                                      {
                                                        staticClass:
                                                          "list-group",
                                                      },
                                                      _vm._l(
                                                        _vm.task_ticket,
                                                        function (task, key) {
                                                          return _c(
                                                            "li",
                                                            {
                                                              staticClass:
                                                                "list-group-item d-flex justify-content-between align-items-center",
                                                              style:
                                                                task.complete ==
                                                                1
                                                                  ? "background: rgba(0, 151, 19, 0.3);"
                                                                  : "",
                                                            },
                                                            [
                                                              _c(
                                                                "strong",
                                                                {
                                                                  staticStyle: {
                                                                    color:
                                                                      "#191919",
                                                                  },
                                                                },
                                                                [
                                                                  _vm._v(
                                                                    _vm._s(
                                                                      task.name_task
                                                                    )
                                                                  ),
                                                                ]
                                                              ),
                                                              _vm._v(" "),
                                                              _c("i", {
                                                                class:
                                                                  task.complete ==
                                                                  1
                                                                    ? "fas fa-check"
                                                                    : "fas fa-pause",
                                                              }),
                                                            ]
                                                          )
                                                        }
                                                      ),
                                                      0
                                                    ),
                                                  ]
                                                ),
                                              ]
                                            ),
                                          ]
                                        )
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.task_ticket.length == 0
                                      ? _c(
                                          "div",
                                          { staticClass: "card-body" },
                                          [_vm._m(5)]
                                        )
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "row" }, [
                                      _c(
                                        "div",
                                        {
                                          staticClass: "col-lg-2",
                                          staticStyle: {
                                            "margin-left": "15px",
                                          },
                                        },
                                        [
                                          _c(
                                            "div",
                                            {
                                              staticClass:
                                                "form-group text-left",
                                            },
                                            [
                                              _vm._v(
                                                "\n                          " +
                                                  _vm._s(_vm.total_complete) +
                                                  "/" +
                                                  _vm._s(_vm.total_task) +
                                                  "\n                        "
                                              ),
                                            ]
                                          ),
                                        ]
                                      ),
                                    ]),
                                    _vm._v(" "),
                                    (_vm.data_ticket.estado_id != 3 &&
                                      _vm.usuario.id == 1) ||
                                    (_vm.data_ticket.estado_id != 3 &&
                                      _vm.usuario.id == 2)
                                      ? _c(
                                          "div",
                                          {
                                            staticClass:
                                              "form-group text-right",
                                          },
                                          [
                                            _c(
                                              "button",
                                              {
                                                staticClass:
                                                  "btn btn-primary btn-lg",
                                                attrs: {
                                                  "data-target": "#modal_task",
                                                  "data-toggle": "modal",
                                                },
                                              },
                                              [
                                                _vm._v(
                                                  "\n                        Crear tarea\n                      "
                                                ),
                                              ]
                                            ),
                                          ]
                                        )
                                      : _vm._e(),
                                  ]),
                                  _vm._v(" "),
                                  _c("hr"),
                                  _vm._v(" "),
                                  _c("div", { staticClass: "gallery" }, [
                                    _vm._m(6),
                                    _vm._v(" "),
                                    _c("div", [
                                      _c("div", { staticClass: "card-body" }, [
                                        _vm.task_files.length != 0
                                          ? _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "row tck_suport mt-2",
                                              },
                                              _vm._l(
                                                _vm.task_files,
                                                function (file, key) {
                                                  return _c(
                                                    "div",
                                                    {
                                                      staticClass:
                                                        "col-lg-3 text-center",
                                                    },
                                                    [
                                                      _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "browser ",
                                                          attrs: {
                                                            title:
                                                              file.nombre_archivo,
                                                          },
                                                        },
                                                        [
                                                          _c("i", {
                                                            class: _vm.typeFile(
                                                              file.nombre_archivo
                                                            ),
                                                            staticStyle: {
                                                              "font-size":
                                                                "55px",
                                                            },
                                                          }),
                                                        ]
                                                      ),
                                                      _vm._v(" "),
                                                      _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "mt-2 barlow regular",
                                                        },
                                                        [
                                                          _vm._v(
                                                            _vm._s(
                                                              file.nombre_archivo
                                                            )
                                                          ),
                                                        ]
                                                      ),
                                                      _vm._v(" "),
                                                      _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "text-muted text-small",
                                                        },
                                                        [
                                                          _c(
                                                            "a",
                                                            {
                                                              attrs: {
                                                                href:
                                                                  "http://172.16.100.112/SupportFiles/" +
                                                                  file.nombre_archivo,
                                                                target:
                                                                  "blank__",
                                                              },
                                                            },
                                                            [
                                                              _c("i", {
                                                                staticClass:
                                                                  "fa fa-eye",
                                                                staticStyle: {
                                                                  "font-size":
                                                                    "18px",
                                                                },
                                                              }),
                                                            ]
                                                          ),
                                                        ]
                                                      ),
                                                    ]
                                                  )
                                                }
                                              ),
                                              0
                                            )
                                          : _vm._e(),
                                      ]),
                                      _vm._v(" "),
                                      _c("div", { staticClass: "card-body" }, [
                                        _vm.task_files.length == 0
                                          ? _c(
                                              "div",
                                              {
                                                staticClass: "row tck_suport ",
                                              },
                                              [_vm._m(7)]
                                            )
                                          : _vm._e(),
                                      ]),
                                    ]),
                                  ]),
                                  _vm._v(" "),
                                  _c("hr", { staticClass: "mt-5" }),
                                ]
                              ),
                            ]
                          )
                        : _vm._e(),
                    ])
                  : _vm._e(),
                _vm._v(" "),
                _vm.load_data_ticket
                  ? _c(
                      "div",
                      { staticClass: "d-flex justify-content-center" },
                      [
                        _c("div", {
                          staticClass: "spinner-border text-primary",
                          staticStyle: {
                            width: "8rem",
                            height: "8rem",
                            color: "#007bff!important",
                          },
                          attrs: { role: "status" },
                        }),
                      ]
                    )
                  : _vm._e(),
              ]),
            ]),
          ]),
        ]),
      ]),
      _vm._v(" "),
      _c("ticket-form", { attrs: { usuario: _vm.usuario } }),
      _vm._v(" "),
      _c("task-form", { attrs: { ticket: _vm.data_ticket } }),
      _vm._v(" "),
      _c("send-message", { attrs: { ticket: _vm.ticket_id } }),
    ],
    1
  )
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("section", { staticClass: "section" }, [
      _c("div", { staticClass: "section-header shadow-box-ag" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-lg-11 col-md-6 col-sm-6 col-12" }, [
            _c("div", { staticClass: "card-stats-title" }, [
              _c("h1", { staticClass: "barlow semi_bold" }, [
                _vm._v("\n                Tickets\n              "),
              ]),
            ]),
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-1 col-md-6 col-sm-6 col-12" }, [
            _c(
              "button",
              {
                staticClass: "btn btn-info btn-block barlow semi_bold",
                attrs: {
                  "data-target": "#form_ticket",
                  "data-toggle": "modal",
                },
              },
              [
                _c("i", { staticClass: "fas fa-plus" }),
                _vm._v("\n              Crear Ticket\n            "),
              ]
            ),
          ]),
        ]),
      ]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-lg-10" }, [
      _c(
        "h4",
        {
          staticClass: "card-title barlow semi_bold",
          staticStyle: { color: "#191919" },
        },
        [_vm._v("\n                  Detalle del ticket\n                ")]
      ),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "btn btn-info",
        staticStyle: { "border-radius": "5px" },
        attrs: { "data-toggle": "modal", "data-target": "#modal_message" },
      },
      [_c("i", { staticClass: "fas fa-comment-alt" })]
    )
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "title barlow blod" }, [
      _c("strong", [
        _vm._v("\n                        Descripción\n                      "),
      ]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "title barlow blod" }, [
      _c("strong", [
        _vm._v("\n                        Tareas\n                      "),
      ]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row tck_suport mt-3" }, [
      _c("div", { staticClass: "col-12 col-md-12 col-sm-12" }, [
        _c(
          "div",
          {
            staticClass: "card",
            staticStyle: { "box-shadow": "0 0px 0px rgba(0, 0, 0, 0)" },
          },
          [
            _c("div", { staticClass: "card-body" }, [
              _c(
                "div",
                { staticClass: "empty-state", attrs: { "data-height": "400" } },
                [
                  _c(
                    "div",
                    {
                      staticClass: "empty-state-icon",
                      staticStyle: {
                        "background-image":
                          "linear-gradient(rgb(0, 92, 255), rgba(0, 123, 255, 0.6))",
                      },
                    },
                    [_c("i", { staticClass: "fas fa-tasks" })]
                  ),
                  _vm._v(" "),
                  _c("h2", [
                    _vm._v(
                      "\n                                  No se ha creado ninguna tarea\n                                "
                    ),
                  ]),
                ]
              ),
            ]),
          ]
        ),
      ]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "title barlow blod" }, [
      _c("strong", [
        _vm._v("\n                        Archivos\n                      "),
      ]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-12 col-md-12 col-sm-12" }, [
      _c(
        "div",
        {
          staticClass: "card",
          staticStyle: { "box-shadow": "0 0px 0px rgba(0, 0, 0, 0)" },
        },
        [
          _c("div", { staticClass: "card-body" }, [
            _c(
              "div",
              { staticClass: "empty-state", attrs: { "data-height": "400" } },
              [
                _c(
                  "div",
                  {
                    staticClass: "empty-state-icon",
                    staticStyle: {
                      "background-image":
                        "linear-gradient(rgb(0, 92, 255), rgba(0, 123, 255, 0.6))",
                    },
                  },
                  [_c("i", { staticClass: "fas fa-question" })]
                ),
                _vm._v(" "),
                _c("h2", [
                  _vm._v(
                    "\n                                    No se ha cargado ningún archivo\n                                  "
                  ),
                ]),
              ]
            ),
          ]),
        ]
      ),
    ])
  },
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/VuePagination.vue?vue&type=template&id=73f4d542&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Suport/VuePagination.vue?vue&type=template&id=73f4d542& ***!
  \***********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("nav", { staticClass: "d-inline-block" }, [
    _c(
      "ul",
      { staticClass: "pagination mb-0" },
      [
        _vm.pagination.current_page == 1
          ? _c("li", { staticClass: "page-item " }, [_vm._m(0)])
          : _vm._e(),
        _vm._v(" "),
        _vm.pagination.current_page > 1
          ? _c("li", { staticClass: "page-item " }, [
              _c(
                "a",
                {
                  staticClass: "page-link",
                  attrs: { href: "javascript:void(0)", tabindex: "-1" },
                  on: {
                    click: function ($event) {
                      $event.preventDefault()
                      return _vm.changePage(_vm.pagination.current_page - 1)
                    },
                  },
                },
                [_c("i", { staticClass: "fas fa-chevron-left" })]
              ),
            ])
          : _vm._e(),
        _vm._v(" "),
        _vm._l(_vm.pagesNumber, function (page) {
          return _c("li", [
            _c(
              "a",
              {
                staticClass: "page-link",
                class: page == _vm.pagination.current_page ? "pag" : " ",
                attrs: { href: "javascript:void(0)" },
                on: {
                  click: function ($event) {
                    $event.preventDefault()
                    return _vm.changePage(page)
                  },
                },
              },
              [
                _vm._v(_vm._s(page) + " "),
                _c("span", { staticClass: "sr-only" }),
              ]
            ),
          ])
        }),
        _vm._v(" "),
        _vm.pagination.current_page < _vm.pagination.last_page
          ? _c("li", { staticClass: "page-item" }, [
              _c(
                "a",
                {
                  staticClass: "page-link",
                  attrs: { href: "javascript:void(0)" },
                  on: {
                    click: function ($event) {
                      $event.preventDefault()
                      return _vm.changePage(_vm.pagination.current_page + 1)
                    },
                  },
                },
                [_c("i", { staticClass: "fas fa-chevron-right" })]
              ),
            ])
          : _vm._e(),
        _vm._v(" "),
        _vm.pagination.current_page == _vm.pagination.last_page
          ? _c("li", { staticClass: "page-item" }, [_vm._m(1)])
          : _vm._e(),
      ],
      2
    ),
  ])
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "page-link",
        attrs: { href: "javascript:void(0)", tabindex: "-1" },
      },
      [_c("i", { staticClass: "fas fa-chevron-left" })]
    )
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "page-link",
        attrs: { href: "javascript:void(0)", disabled: "" },
      },
      [_c("i", { staticClass: "fas fa-chevron-right" })]
    )
  },
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/Suport/Ticket/Modals/Message.vue":
/*!******************************************************************!*\
  !*** ./resources/js/components/Suport/Ticket/Modals/Message.vue ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Message_vue_vue_type_template_id_ec6e4840___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Message.vue?vue&type=template&id=ec6e4840& */ "./resources/js/components/Suport/Ticket/Modals/Message.vue?vue&type=template&id=ec6e4840&");
/* harmony import */ var _Message_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Message.vue?vue&type=script&lang=js& */ "./resources/js/components/Suport/Ticket/Modals/Message.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Message_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Message_vue_vue_type_template_id_ec6e4840___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Message_vue_vue_type_template_id_ec6e4840___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Suport/Ticket/Modals/Message.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Suport/Ticket/Modals/Message.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/components/Suport/Ticket/Modals/Message.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Message_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Message.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Modals/Message.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Message_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Suport/Ticket/Modals/Message.vue?vue&type=template&id=ec6e4840&":
/*!*************************************************************************************************!*\
  !*** ./resources/js/components/Suport/Ticket/Modals/Message.vue?vue&type=template&id=ec6e4840& ***!
  \*************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Message_vue_vue_type_template_id_ec6e4840___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Message.vue?vue&type=template&id=ec6e4840& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Modals/Message.vue?vue&type=template&id=ec6e4840&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Message_vue_vue_type_template_id_ec6e4840___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Message_vue_vue_type_template_id_ec6e4840___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/Suport/Ticket/Modals/Task.vue":
/*!***************************************************************!*\
  !*** ./resources/js/components/Suport/Ticket/Modals/Task.vue ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Task_vue_vue_type_template_id_5e818f08___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Task.vue?vue&type=template&id=5e818f08& */ "./resources/js/components/Suport/Ticket/Modals/Task.vue?vue&type=template&id=5e818f08&");
/* harmony import */ var _Task_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Task.vue?vue&type=script&lang=js& */ "./resources/js/components/Suport/Ticket/Modals/Task.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Task_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Task_vue_vue_type_template_id_5e818f08___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Task_vue_vue_type_template_id_5e818f08___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Suport/Ticket/Modals/Task.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Suport/Ticket/Modals/Task.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/Suport/Ticket/Modals/Task.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Task_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Task.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Modals/Task.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Task_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Suport/Ticket/Modals/Task.vue?vue&type=template&id=5e818f08&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/Suport/Ticket/Modals/Task.vue?vue&type=template&id=5e818f08& ***!
  \**********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Task_vue_vue_type_template_id_5e818f08___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Task.vue?vue&type=template&id=5e818f08& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Modals/Task.vue?vue&type=template&id=5e818f08&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Task_vue_vue_type_template_id_5e818f08___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Task_vue_vue_type_template_id_5e818f08___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/Suport/Ticket/Modals/form.vue":
/*!***************************************************************!*\
  !*** ./resources/js/components/Suport/Ticket/Modals/form.vue ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _form_vue_vue_type_template_id_0192f41b___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./form.vue?vue&type=template&id=0192f41b& */ "./resources/js/components/Suport/Ticket/Modals/form.vue?vue&type=template&id=0192f41b&");
/* harmony import */ var _form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./form.vue?vue&type=script&lang=js& */ "./resources/js/components/Suport/Ticket/Modals/form.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _form_vue_vue_type_template_id_0192f41b___WEBPACK_IMPORTED_MODULE_0__["render"],
  _form_vue_vue_type_template_id_0192f41b___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Suport/Ticket/Modals/form.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Suport/Ticket/Modals/form.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/Suport/Ticket/Modals/form.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./form.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Modals/form.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Suport/Ticket/Modals/form.vue?vue&type=template&id=0192f41b&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/Suport/Ticket/Modals/form.vue?vue&type=template&id=0192f41b& ***!
  \**********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_form_vue_vue_type_template_id_0192f41b___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./form.vue?vue&type=template&id=0192f41b& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Modals/form.vue?vue&type=template&id=0192f41b&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_form_vue_vue_type_template_id_0192f41b___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_form_vue_vue_type_template_id_0192f41b___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/Suport/Ticket/Ticket.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/Suport/Ticket/Ticket.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Ticket_vue_vue_type_template_id_58946fae___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Ticket.vue?vue&type=template&id=58946fae& */ "./resources/js/components/Suport/Ticket/Ticket.vue?vue&type=template&id=58946fae&");
/* harmony import */ var _Ticket_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Ticket.vue?vue&type=script&lang=js& */ "./resources/js/components/Suport/Ticket/Ticket.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Ticket_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Ticket_vue_vue_type_template_id_58946fae___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Ticket_vue_vue_type_template_id_58946fae___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Suport/Ticket/Ticket.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Suport/Ticket/Ticket.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/Suport/Ticket/Ticket.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Ticket_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Ticket.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Ticket.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Ticket_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Suport/Ticket/Ticket.vue?vue&type=template&id=58946fae&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/Suport/Ticket/Ticket.vue?vue&type=template&id=58946fae& ***!
  \*****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Ticket_vue_vue_type_template_id_58946fae___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Ticket.vue?vue&type=template&id=58946fae& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/Ticket/Ticket.vue?vue&type=template&id=58946fae&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Ticket_vue_vue_type_template_id_58946fae___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Ticket_vue_vue_type_template_id_58946fae___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/Suport/Ticket/event-bus.js":
/*!************************************************************!*\
  !*** ./resources/js/components/Suport/Ticket/event-bus.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_0__);

var EventBus = new vue__WEBPACK_IMPORTED_MODULE_0___default.a();
/* harmony default export */ __webpack_exports__["default"] = (EventBus);

/***/ }),

/***/ "./resources/js/components/Suport/VuePagination.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/Suport/VuePagination.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VuePagination_vue_vue_type_template_id_73f4d542___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VuePagination.vue?vue&type=template&id=73f4d542& */ "./resources/js/components/Suport/VuePagination.vue?vue&type=template&id=73f4d542&");
/* harmony import */ var _VuePagination_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./VuePagination.vue?vue&type=script&lang=js& */ "./resources/js/components/Suport/VuePagination.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _VuePagination_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _VuePagination_vue_vue_type_template_id_73f4d542___WEBPACK_IMPORTED_MODULE_0__["render"],
  _VuePagination_vue_vue_type_template_id_73f4d542___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Suport/VuePagination.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Suport/VuePagination.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/Suport/VuePagination.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VuePagination_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./VuePagination.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/VuePagination.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VuePagination_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Suport/VuePagination.vue?vue&type=template&id=73f4d542&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/Suport/VuePagination.vue?vue&type=template&id=73f4d542& ***!
  \*****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VuePagination_vue_vue_type_template_id_73f4d542___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./VuePagination.vue?vue&type=template&id=73f4d542& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Suport/VuePagination.vue?vue&type=template&id=73f4d542&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VuePagination_vue_vue_type_template_id_73f4d542___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VuePagination_vue_vue_type_template_id_73f4d542___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
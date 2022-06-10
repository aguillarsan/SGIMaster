(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/baglog.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/baglog.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _formulario_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./formulario.vue */ "./resources/js/components/formulario.vue");
/* harmony import */ var _event_bus__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./event-bus */ "./resources/js/components/event-bus.js");
/* harmony import */ var _VuePagination_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./VuePagination.vue */ "./resources/js/components/VuePagination.vue");
/* harmony import */ var vue_loading_overlay__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue-loading-overlay */ "./node_modules/vue-loading-overlay/dist/vue-loading.min.js");
/* harmony import */ var vue_loading_overlay__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue_loading_overlay__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var vue_loading_overlay_dist_vue_loading_css__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! vue-loading-overlay/dist/vue-loading.css */ "./node_modules/vue-loading-overlay/dist/vue-loading.css");
/* harmony import */ var vue_loading_overlay_dist_vue_loading_css__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(vue_loading_overlay_dist_vue_loading_css__WEBPACK_IMPORTED_MODULE_6__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//





 // Import stylesheet

 // Init plugin

Vue.use(vue_loading_overlay__WEBPACK_IMPORTED_MODULE_5___default.a);
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['config', 'selectmotivo', 'crm_select', 'rol_id'],
  components: {
    'vue-pagination': _VuePagination_vue__WEBPACK_IMPORTED_MODULE_4__["default"],
    'formulario': _formulario_vue__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      tickets: {
        'total': 0,
        'current_page': 1,
        'per_page': 10,
        'from': 2,
        'to': 0
      },
      crmId: '',
      fecha1Update: '',
      newIdea: '',
      backlog: '',
      curso: '',
      nombre: '',
      SelectFecha1: '',
      validacion: '',
      finalizada: '',
      sitio: '',
      motivos: [],
      areas: [],
      fullPage: false,
      opcion: '',
      codigo: '',
      area: '',
      crm: this.crm_select,
      NombreCrm: '',
      crmNombre: '',
      nuevoEstado: '',
      IdUpdateFecha: '',
      modulo: '',
      datosTicket: {
        'id': '',
        'fechaCompromiso': ''
      },
      datos: {
        'codigo': ''
      },
      datosLog: {
        'id': '',
        'descripcion': ''
      },
      categoria: '',
      motivo: '',
      fecha1: '',
      fecha2: '',
      searchDescripcion: '',
      UserId: '',
      TipoFecha: '',
      OldIdTicket: '',
      SelectAreaName: '',
      SelectCategoryLeter: '',
      SelectMotivo: '',
      user: '',
      SelectCrm: '',
      crmName: '',
      zona: '',
      ListTicket: [],
      NombreModuloMotivo: '',
      vacio: '',
      TotalTicektsUser: '',
      TotalMiCrm: '',
      estadoValue: '',
      SelectEstado: '',
      pops: [],
      datapopSelec: '',
      datositio: '',
      fechaActual: '',
      files_masive: '',
      screen_width: 0
    };
  },
  mounted: function mounted() {
    var _this = this;

    this.screen_width = screen.width;
    setInterval(function () {
      return _this.screen_width = screen.width;
    }, 1 * 400);
    this.getBacklog();
    this.SearchTicket();
    /* Agrega mounted y con el siguiente contenido */

    var self = this;
    _event_bus__WEBPACK_IMPORTED_MODULE_3__["default"].$on('ticket.created', function () {
      self.getTickets(); // ejecutas el metodo que desees
    });
    _event_bus__WEBPACK_IMPORTED_MODULE_3__["default"].$on('GetTotalTicekts.getBacklog', function () {
      self.getBacklog(); // ejecutas el metodo que desees
    });
  },
  filters: {
    uppercase: function uppercase(v) {
      return v.toUpperCase();
    }
  },
  methods: {
    getBacklog: function getBacklog() {
      var _this2 = this;

      this.UserId = document.getElementById('userid').value;

      if (this.crm_select == 0) {
        if (this.selectmotivo != 10) {
          axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/totalBacklog?&codigo=".concat(this.codigo, "&area=").concat(this.area, "&sitio=").concat(this.sitio, "&categoria=").concat(this.categoria, "&motivo=").concat(this.motivo, "&fecha1=").concat(this.fecha1, "&fecha2=").concat(this.fecha2, "&descripcion=").concat(this.searchDescripcion, "&crm=").concat(this.crmId, "&user=").concat(this.user, "&crmSelect=").concat(this.crm, "&zona=").concat(this.zona, "&motivoSelectIng=").concat(this.selectmotivo, "&estado=").concat(this.estadoValue)).then(function (response) {
            _this2.backlog = response.data;
          });
        } else {
          if (this.selectmotivo == 10) {
            axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/TotalTicketsCrm?&codigo=".concat(this.codigo, "&area=").concat(this.area, "&sitio=").concat(this.sitio, "&categoria=").concat(this.categoria, "&motivo=").concat(this.motivo, "&fecha1=").concat(this.fecha1, "&fecha2=").concat(this.fecha2, "&descripcion=").concat(this.searchDescripcion, "&crm=").concat(this.crmId, "&user=").concat(this.user, "&crmSelect=").concat(this.crm, "&zona=").concat(this.zona, "&motivoSelectIng=").concat(this.selectmotivo, "&estado=").concat(this.estadoValue)).then(function (response) {
              _this2.TotalMiCrm = response.data;
            });
          }
        }
      }

      if (this.crm_select != 0) {
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/totalBacklogCrm/' + this.crm_select).then(function (response) {
          _this2.backlog = response.data;
        });
      }
    },
    SearchTicket: function SearchTicket(id) {
      var _this3 = this;

      this.fechaActual = moment__WEBPACK_IMPORTED_MODULE_1___default()();
      var state = '';

      if (id == 2) {
        state = 2;
        this.modulo = 2;
        this.nombre = ' TICKETS EN CURSO';
      } else {
        if (id == 3) {
          state = 3;
          this.modulo = 3;
          this.nombre = 'TICKETS VALIDACIÓN';
        } else {
          if (id == 4) {
            state = 4;
            this.modulo = 4;
            this.nombre = ' TICKETS FINALIZADOS';
          } else {
            state = 1;
            this.nombre = 'TICKETS EN ESPERA';
            this.modulo = 1;
          }
        }
      }

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/tikectList?page=".concat(this.tickets.current_page, "&state=").concat(state, "&codigo=").concat(this.codigo, "&area=").concat(this.area, "&sitio=").concat(this.sitio, "&categoria=").concat(this.categoria, "&motivo=").concat(this.motivo, "&fecha1=").concat(this.fecha1, "&fecha2=").concat(this.fecha2, "&descripcion=").concat(this.searchDescripcion, "&crm=").concat(this.crmId, "&user=").concat(this.user, "&crmSelect=").concat(this.crm, "&zona=").concat(this.zona, "&motivoSelectIng=").concat(this.selectmotivo, "&estado=").concat(this.estadoValue)).then(function (response) {
        _this3.tickets = response.data;

        if (_this3.tickets.data.length == 0) {
          _this3.vacio = 1;
        } else {
          _this3.vacio = '';
        }

        _this3.getBacklog();
      });

      if (this.crm == 1) {
        this.NombreCrm = 'CRM NORTE';
        this.crmNombre = 'Crm Norte';
      }

      if (this.crm == 2) {
        this.NombreCrm = 'CRM CENTRO NORTE';
        this.crmNombre = 'Crm Centro Norte';
      }

      if (this.crm == 3) {
        this.NombreCrm = 'CRM METROPOLITANO';
        this.crmNombre = 'Crm Metropolitano';
      }

      if (this.crm == 4) {
        this.NombreCrm = 'CRM CENTRO SUR';
        this.crmNombre = 'Crm Centro Sur';
      }

      if (this.crm == 5) {
        this.NombreCrm = 'CRM SUR';
        this.crmNombre = 'Crm Sur';
      }

      if (this.crm == 6) {
        this.NombreCrm = 'CRM AUSTRAL';
        this.crmNombre = 'Crm Austral';
      }

      if (this.selectmotivo != 0) {
        if (this.selectmotivo == 7) {
          this.NombreModuloMotivo = 'mantención red core 2020';
        } else {
          if (this.selectmotivo == 8) {
            this.NombreModuloMotivo = 'en operación';
          } else {
            if (this.selectmotivo == 9) {
              this.NombreModuloMotivo = 'totales';
            } else {
              if (this.selectmotivo == 11) {
                this.NombreModuloMotivo = 'en Gestión de residuos';
              } else {
                if (this.selectmotivo == 12) {
                  this.NombreModuloMotivo = 'mantención red core 2021';
                }
              }
            }
          }
        }
      } else {
        this.NombreModuloMotivo = '';
      }
    },
    BoxSearch: function BoxSearch(modulo) {
      if (this.area != '') {
        var selectArea = document.getElementById('divSelecArea');
        selectArea.style.display = 'none';
        var selectedArea = document.getElementById('selectedAreaDivInfo');
        selectedArea.style.display = '';
        this.setNameArea();
        this.SearchTicket(modulo);
        this.loadFunction();
      }

      if (this.categoria != '') {
        var selectCategoria = document.getElementById('selectCategoria');
        selectCategoria.style.display = 'none';
        var selectCategoriaInfo = document.getElementById('selectedCateInfo');
        selectCategoriaInfo.style.display = '';
        this.setLeterCategory();
        this.SearchTicket(modulo);
        this.loadFunction();
      }

      if (this.motivo != '') {
        var selectMotivo = document.getElementById('selectMotivo');
        selectMotivo.style.display = 'none';
        var selectedMotivoInfo = document.getElementById('selectedMotivoInfo');
        selectedMotivoInfo.style.display = '';
        this.selectedMotivoInfoSet();
        this.SearchTicket(modulo);
        this.loadFunction();
      }

      if (this.fecha1 != '') {
        var selectfecha1 = document.getElementById('InputFecha1');
        selectfecha1.style.display = 'none';
        var selectedFecha1 = document.getElementById('selectedFecha1');
        selectedFecha1.style.display = '';
        this.SearchTicket(modulo);
        this.loadFunction();
      }

      if (this.fecha2 != '') {
        var selectfecha2 = document.getElementById('InputFecha2');
        selectfecha2.style.display = 'none';
        var selectedFecha2 = document.getElementById('selectedFecha2');
        selectedFecha2.style.display = '';
        this.SearchTicket(modulo);
        this.loadFunction();
      }

      if (this.crmId != '') {
        var crmSelect = document.getElementById('crmSelect');
        crmSelect.style.display = 'none';
        var selectedCrm = document.getElementById('selectedCrm');
        selectedCrm.style.display = '';
        this.selectedCrmSet();
        this.SearchTicket(modulo);
        this.loadFunction();
      }

      if (this.estadoValue != '') {
        var selectEstado = document.getElementById('selectEstado');
        selectEstado.style.display = 'none';
        var selectedEstadoInfo = document.getElementById('selectedEstadoInfo');
        selectedEstadoInfo.style.display = '';
        this.setEestado();
        this.SearchTicket(modulo);
        this.loadFunction();
      }
    },
    listLast: function listLast() {
      var _this4 = this;

      $('#listaLastTickets').modal('show');
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/LastTicketsCreated').then(function (response) {
        _this4.ListTicket = response.data;
      });
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
    },
    UploadExcelTickets: function UploadExcelTickets() {
      var _this5 = this;

      $('#upload_masive_tickets_red_core').modal('hide');
      var formData = new FormData();
      formData.append('file_masive', this.files_masive);
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/UploadTickets', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then(function (response) {
        _this5.loadFunction();

        Swal.fire({
          type: 'success',
          title: 'Tickets creados',
          text: 'Su carga masiva fue todo un exito'
        });

        _this5.SearchTicket();

        _this5.files_masive = '';
      });
    },
    uploadFileTicketsMasive: function uploadFileTicketsMasive(event) {
      this.files_masive = event.target.files[0];
      /*
        Adds the uploaded file to the files array
      */
    },
    BuscarSitioTab: function BuscarSitioTab() {
      var _this6 = this;

      if (this.datositio.length >= 3) {
        var url = '/GetPop';
        var box = document.getElementById('listPopsTab');
        box.style.display = '';
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/GetPop?datositio=".concat(this.datositio)).then(function (response) {
          _this6.pops = response.data;
        });
      } else {
        this.pops = '';
        var box = document.getElementById('listPopsTab');
        box.style.display = 'none';
      }
    },
    selectdpopSearch: function selectdpopSearch(pop) {
      this.sitio = pop.id;
      this.datapopSelec = pop.nem_site + ' ' + pop.nombre;
      document.getElementById('listPopsTab').style.display = 'none';
      document.getElementById('inputSitioSearchPop').style.display = 'none';
      document.getElementById('selectedSitio').style.display = 'block';
      this.SearchTicket();
      this.loadFunction();
    },
    Clearsitio: function Clearsitio() {
      this.sitio = '';
      this.datapopSelec = '';
      document.getElementById('inputSitioSearchPop').style.display = 'block';
      document.getElementById('listPopsTab').style.display = 'none';
      document.getElementById('popSearch').style.display = 'block';
      document.getElementById('selectedSitio').style.display = 'none';
      this.datositio = '';
      this.SearchTicket();
      this.loadFunction();
    },
    ClearMotivo: function ClearMotivo() {
      this.motivo = '';
      var selectMotivo = document.getElementById('selectMotivo');
      selectMotivo.style.display = '';
      var selectedMotivoInfo = document.getElementById('selectedMotivoInfo');
      selectedMotivoInfo.style.display = 'none';
      this.SearchTicket(this.modulo);
      this.loadFunction();
    },
    ClearFecha1: function ClearFecha1() {
      this.fecha1 = '';
      var selectfecha1 = document.getElementById('InputFecha1');
      selectfecha1.style.display = '';
      var selectedFecha1 = document.getElementById('selectedFecha1');
      selectedFecha1.style.display = 'none';
      this.SearchTicket(this.modulo);
      this.loadFunction();
    },
    ClearFecha2: function ClearFecha2() {
      this.fecha2 = '';
      var selectfecha2 = document.getElementById('InputFecha2');
      selectfecha2.style.display = '';
      var selectedFecha2 = document.getElementById('selectedFecha2');
      selectedFecha2.style.display = 'none';
      this.SearchTicket(this.modulo);
      this.loadFunction();
    },
    clearCrm: function clearCrm() {
      if (this.crmId != '') {
        this.crmId = '';
        var crmSelect = document.getElementById('crmSelect');
        crmSelect.style.display = '';
      }

      var selectedCrm = document.getElementById('selectedCrm');
      selectedCrm.style.display = 'none';
      this.SearchTicket(this.modulo);
      this.loadFunction();
    },
    clearCrm2: function clearCrm2() {
      if (this.crmId != '') {
        this.crmId = '';
        var crmSelect = document.getElementById('crmSelect');
        crmSelect.style.display = '';
      }

      var selectedCrm = document.getElementById('selectedCrm');
      selectedCrm.style.display = 'none';
      this.SearchTicket(this.modulo);
    },
    ClearMotivo2: function ClearMotivo2() {
      this.motivo = '';
      var selectMotivo = document.getElementById('selectMotivo');
      selectMotivo.style.display = '';
      var selectedMotivoInfo = document.getElementById('selectedMotivoInfo');
      selectedMotivoInfo.style.display = 'none';
    },
    clearArea: function clearArea() {
      this.area = '';
      var selectArea = document.getElementById('divSelecArea');
      selectArea.style.display = '';
      var selectedArea = document.getElementById('selectedAreaDivInfo');
      selectedArea.style.display = 'none';
      this.SearchTicket(this.modulo);
      this.loadFunction();
    },
    clearArea2: function clearArea2() {
      this.area = '';
      var selectArea = document.getElementById('divSelecArea');
      selectArea.style.display = '';
      var selectedArea = document.getElementById('selectedAreaDivInfo');
      selectedArea.style.display = 'none';
    },
    ClearCate: function ClearCate() {
      this.categoria = '';
      var selectCategoria = document.getElementById('selectCategoria');
      selectCategoria.style.display = '';
      var selectCategoriaInfo = document.getElementById('selectedCateInfo');
      selectCategoriaInfo.style.display = 'none';
      this.SearchTicket(this.modulo);
      this.loadFunction();
    },
    ClearCate2: function ClearCate2() {
      this.categoria = '';
      var selectCategoria = document.getElementById('selectCategoria');
      selectCategoria.style.display = '';
      var selectCategoriaInfo = document.getElementById('selectedCateInfo');
      selectCategoriaInfo.style.display = 'none';
    },
    selectedMotivoInfoSet: function selectedMotivoInfoSet() {
      if (this.motivo == 1) {
        this.SelectMotivo = 'Vandalismo menor';
      }

      if (this.motivo == 2) {
        this.SelectMotivo = 'Falla mayor';
      }

      if (this.motivo == 3) {
        this.SelectMotivo = 'Mantención';
      }

      if (this.motivo == 4) {
        this.SelectMotivo = 'solicitud stock';
      }

      if (this.motivo == 6) {
        this.SelectMotivo = 'Falla menor';
      }

      if (this.motivo == 7) {
        this.SelectMotivo = 'Vandalismo menor';
      }

      if (this.motivo == 5) {
        this.SelectMotivo = 'Solicitud de mejora';
      }
    },
    selectedCrmSet: function selectedCrmSet() {
      if (this.crmId == 1) {
        this.crmName = 'NORTE';
      }

      if (this.crmId == 2) {
        this.crmName = 'CENTRO NORTE';
      }

      if (this.crmId == 3) {
        this.crmName = 'METROPOLITANO';
      }

      if (this.crmId == 4) {
        this.crmName = 'CENTRO SUR';
      }

      if (this.crmId == 5) {
        this.crmName = 'SUR';
      }

      if (this.crmId == 6) {
        this.crmName = 'AUSTRAL';
      }
    },
    setNameArea: function setNameArea() {
      if (this.area == 1) {
        this.SelectAreaName = 'Energía';
      }

      if (this.area == 2) {
        this.SelectAreaName = 'Clima';
      }

      if (this.area == 3) {
        this.SelectAreaName = 'Obras civiles';
      }

      if (this.area == 4) {
        this.SelectAreaName = 'Medio ambiente';
      }
    },
    setLeterCategory: function setLeterCategory() {
      if (this.categoria == 1) {
        this.SelectCategoryLeter = 'A';
      }

      if (this.categoria == 2) {
        this.SelectCategoryLeter = 'B';
      }

      if (this.categoria == 3) {
        this.SelectCategoryLeter = 'C';
      }

      if (this.categoria == 4) {
        this.SelectCategoryLeter = 'D';
      }

      if (this.categoria == 5) {
        this.SelectCategoryLeter = 'E';
      }
    },
    RedirectionTicket: function RedirectionTicket() {
      var _this7 = this;

      $('#NuevoRumbo').modal('hide');

      if (this.nuevoEstado == 4) {
        var estado = 'Finalizada';
      }

      if (this.nuevoEstado == 3) {
        var estado = 'Validación';
      }

      if (this.nuevoEstado == 2) {
        var estado = 'En curso';
      }

      if (this.nuevoEstado == 1) {
        var estado = 'En Espera';
      }

      if (this.nuevoEstado == 7) {
        var estado = 'Eliminada';
      }

      if (this.nuevoEstado == 5) {
        var estado = 'Ingeniero OYM Rechazada';
      }

      if (this.nuevoEstado == 6) {
        var estado = 'Ingeniero  Rechazada';
      }

      var loader = this.$loading.show({
        // Optional parameters
        container: this.fullPage ? null : this.$refs.formContainer,
        canCancel: true,
        onCancel: this.onCancel
      }); // simulate AJAX

      setTimeout(function () {
        loader.hide();
      }, 1300);
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/RedirectTicket?id=".concat(this.OldIdTicket, "&estado=").concat(this.nuevoEstado)).then(function (response) {
        _this7.SearchTicket(_this7.modulo);

        _this7.getBacklog();

        _this7.nuevoEstado = '';

        _this7.$swal({
          type: 'success',
          title: 'Ticket Numero ' + _this7.OldIdTicket + ' ' + 'Cambio de estado a' + ' ' + estado,
          showCloseButton: true
        });
      });
    },
    ClearAllData: function ClearAllData(id) {
      var _this8 = this;

      if (id == 2) {
        var state = 2;
        this.nombre = ' TICKETS EN CURSO';
        this.modulo = 2;
      } else {
        if (id == 3) {
          var state = 3;
          this.nombre = 'TICKETS VALIDACIÓN';
          this.modulo = 3;
        } else {
          if (id == 4) {
            var state = 4;
            this.nombre = ' TICKETS FINALIZADOS';
            this.modulo = 4;
          } else {
            var state = 1;
            this.nombre = 'TICKETS EN ESPERA';
            this.modulo = 1;
          }
        }
      }

      if (this.codigo != null) {
        this.codigo = '';
      }

      if (this.area != null) {
        this.area = '';
      }

      if (this.zona != null) {
        this.zona = '';
      }

      if (this.categoria != null) {
        this.categoria = '';
      }

      if (this.sitio != null) {
        this.sitio = '';
      }

      if (this.motivo != null) {
        this.motivo = '';
      }

      if (this.fecha1 != null) {
        this.fecha1 = '';
      }

      if (this.fecha2 != null) {
        this.fecha2 = '';
      }

      if (this.searchDescripcion != null) {
        this.searchDescripcion = '';
      }

      if (this.user != null) {
        this.user = '';
      }

      if (this.zona != null) {
        this.zona = '';
      }

      if (this.crm == 1) {
        this.NombreCrm = 'CRM NORTE';
        this.crmNombre = 'Crm Norte';
      }

      if (this.crm == 2) {
        this.NombreCrm = 'CRM CENTRO NORTE';
        this.crmNombre = 'Crm Centro Norte';
      }

      if (this.crm == 3) {
        this.NombreCrm = 'CRM METROPOLITANO';
        this.crmNombre = 'Crm Metropolitano';
      }

      if (this.crm == 4) {
        this.NombreCrm = 'CRM CENTRO SUR';
        this.crmNombre = 'Crm Centro Sur';
      }

      if (this.crm == 5) {
        this.NombreCrm = 'CRM SUR';
        this.crmNombre = 'Crm Sur';
      }

      if (this.crm == 6) {
        this.NombreCrm = 'CRM AUSTRAL';
        this.crmNombre = 'Crm Austral';
      }

      if (this.selectmotivo != 0) {
        if (this.selectmotivo == 7) {
          this.NombreModuloMotivo = 'mantención red core';
        } else {
          if (this.selectmotivo == 8) {
            this.NombreModuloMotivo = 'en operación';
          }
        }
      } else {
        this.NombreModuloMotivo = '';
      }

      if (this.screen_width > 1024) {
        this.clearArea2();
        this.ClearCate2();
        this.ClearMotivo2();
        this.clearCrm2();
      }

      this.tickets.current_page = 1;
      var page = 1;
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/tikectList?page=".concat(page, "&state=").concat(state, "&codigo=").concat(this.codigo, "&area=").concat(this.area, "&sitio=").concat(this.sitio, "&categoria=").concat(this.categoria, "&motivo=").concat(this.motivo, "&fecha1=").concat(this.fecha1, "&fecha2=").concat(this.fecha2, "&descripcion=").concat(this.searchDescripcion, "&crm=").concat(this.crm, "&motivoSelectIng=").concat(this.selectmotivo)).then(function (response) {
        var loader = _this8.$loading.show({
          // Optional parameters
          container: _this8.fullPage ? null : _this8.$refs.formContainer,
          canCancel: true,
          onCancel: _this8.onCancel
        }); // simulate AJAX


        setTimeout(function () {
          loader.hide();
        }, 350);

        _this8.getBacklog();

        _this8.tickets = response.data;
        _this8.tickets.current_page = 1;
      });
    },
    filtroCrm: function filtroCrm() {
      this.crm = document.getElementById('crmId').value;
      this.SearchTicket(this.modulo);
    },
    UpdateFechaCreacion: function UpdateFechaCreacion(id) {
      var _this9 = this;

      $('#fecha1Update').modal('hide');
      var loader = this.$loading.show({
        // Optional parameters
        container: this.fullPage ? null : this.$refs.formContainer,
        canCancel: true,
        onCancel: this.onCancel
      }); // simulate AJAX

      setTimeout(function () {
        loader.hide();
      }, 200);
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/UpdateFecha1?id=".concat(this.IdUpdateFecha, "&Fechanueva=").concat(this.fecha1Update, "&tipoFecha=").concat(this.TipoFecha)).then(function (response) {
        _this9.getTickets(_this9.modulo);
      });
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3200,
        timerProgressBar: true,
        onOpen: function onOpen(toast) {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
      });
      Toast.fire({
        type: 'success',
        title: 'Fecha Actualizada '
      });
    },
    OpenModalUpdateDate1: function OpenModalUpdateDate1(ticket, mod) {
      this.IdUpdateFecha = ticket.id;
      this.TipoFecha = mod;
      $('#fecha1Update').modal('show');
    },
    GetRol: function GetRol() {
      var _this10 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/GetRolUser').then(function (response) {
        _this10.rol_id = response.data;
      });
    },
    CleanData: function CleanData(id) {
      var _this11 = this;

      if (id == 2) {
        var state = 2;
        this.nombre = 'TICKETS EN CURSO';
        this.modulo = 2;
      } else {
        if (id == 3) {
          var state = 3;
          this.nombre = ' TICKETS EN VALIDACIÓN';
          this.modulo = 3;
        } else {
          if (id == 4) {
            var state = 4;
            this.nombre = 'TICKETS FINALIZADOS';
            this.modulo = 4;
          } else {
            var state = 1;
            this.nombre = ' TICKETS EN ESPERA';
            this.modulo = 1;
          }
        }
      }

      if (this.codigo != null) {
        this.codigo = '';
      }

      if (this.area != null) {
        this.area = '';
      }

      if (this.zona != null) {
        this.zona = '';
      }

      if (this.categoria != null) {
        this.categoria = '';
      }

      if (this.sitio != null) {
        this.sitio = '';
      }

      if (this.motivo != null) {
        this.motivo = '';
      }

      if (this.fecha1 != null) {
        this.fecha1 = '';
      }

      if (this.fecha2 != null) {
        this.fecha2 = '';
      }

      if (this.searchDescripcion != null) {
        this.searchDescripcion = '';
      }

      if (this.user != null) {
        this.user = '';
      }

      this.clearArea2();
      this.ClearCate2();
      this.ClearMotivo2();
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/tikectList?page=".concat(this.tickets.current_page, "&state=").concat(state)).then(function (response) {
        _this11.tickets = response.data;
      });
    },
    formato: function formato(d) {
      return moment__WEBPACK_IMPORTED_MODULE_1___default()(d).format("DD/MM/YY");
    },
    crearSolicitud: function crearSolicitud() {
      $('#formulario').modal('hide');
      var loader = this.$loading.show({
        // Optional parameters
        container: this.fullPage ? null : this.$refs.formContainer,
        canCancel: true,
        onCancel: this.onCancel
      }); // simulate AJAX

      setTimeout(function () {
        loader.hide();
      }, 5000);
    },
    onCancel: function onCancel() {
      console.log('User cancelled the loader.');
    },
    getTickets: function getTickets(id) {
      var _this12 = this;

      if (id == 2) {
        var state = 2;
        this.nombre = ' TICKETS EN CURSO';
        this.modulo = 2;
      } else {
        if (id == 3) {
          var state = 3;
          this.nombre = ' TICKETS EN VALIDACIÓN';
          this.modulo = 3;
        } else {
          if (id == 4) {
            var state = 4;
            this.nombre = 'TICKETS FINALIZADOS';
            this.modulo = 4;
          } else {
            var state = 1;
            this.nombre = 'TICKETS EN ESPERA';
            this.modulo = 1;
          }
        }
      }

      if (this.codigo != null) {
        this.codigo = '';
      }

      if (this.area != null) {
        this.area = '';
      }

      if (this.zona != null) {
        this.zona = '';
      }

      if (this.categoria != null) {
        this.categoria = '';
      }

      if (this.sitio != null) {
        this.sitio = '';
      }

      if (this.motivo != null) {
        this.motivo = '';
      }

      if (this.fecha1 != null) {
        this.fecha1 = '';
      }

      if (this.fecha2 != null) {
        this.fecha2 = '';
      }

      if (this.searchDescripcion != null) {
        this.searchDescripcion = '';
      }

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/tikectList?page=".concat(this.tickets.current_page, "&state=").concat(state)).then(function (response) {
        var loader = _this12.$loading.show({
          // Optional parameters
          container: _this12.fullPage ? null : _this12.$refs.formContainer,
          canCancel: true,
          onCancel: _this12.onCancel
        }); // simulate AJAX


        setTimeout(function () {
          loader.hide();
        }, 350);
        _this12.tickets = response.data;
      });
    },
    setEestado: function setEestado() {
      if (this.estadoValue == 1) {
        this.SelectEstado = 'En espera';
      }

      if (this.estadoValue == 8) {
        this.SelectEstado = 'Apobación ing oym';
      }

      if (this.estadoValue == 2) {
        this.SelectEstado = 'En curso';
      }

      if (this.estadoValue == 3) {
        this.SelectEstado = 'Validación';
      }

      if (this.estadoValue == 4) {
        this.SelectEstado = 'Finalizadas';
      }
    },
    ClearEestado: function ClearEestado() {
      this.estadoValue = '';
      var selectEstado = document.getElementById('selectEstado');
      selectEstado.style.display = '';
      var selectedEstadoInfo = document.getElementById('selectedEstadoInfo');
      selectedEstadoInfo.style.display = 'none';
      this.SearchTicket();
    },
    crearTicket: function crearTicket() {
      alert('hola');
    },
    getInfo: function getInfo(ticket) {
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/Tkc/".concat(ticket.id)).then(function (response) {});
    },
    Aprobartck: function Aprobartck(ticket) {
      this.datosTicket.id = ticket.id;
      console.log(ticket.id);
      $('#fecha').modal('show');
    },
    Aprobartck2: function Aprobartck2(ticket, m) {
      var id = ticket.id;
      var url = '/cambioestado2/' + id;
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.put(url, this.datosTicket).then(function (response) {});
      this.SearchTicket(m);
      this.getBacklog();
      this.errors = [];
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: function onOpen(toast) {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
      });
      Toast.fire({
        type: 'success',
        title: 'Ticket Nro' + ' ' + id + ' ' + 'Aprobado.'
      });
    },
    Aprobartck3: function Aprobartck3(ticket) {
      var id = ticket.id;
      var url = '/cambioestado2/' + id;
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.put(url, this.datosTicket).then(function (response) {});
      var m = 1;
      this.SearchTicket(m);
      this.getBacklog();
      this.errors = [];
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: function onOpen(toast) {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
      });
      Toast.fire({
        type: 'success',
        title: 'Ticket Nro' + ' ' + id + ' ' + 'Aprobado.'
      });
    },
    retroceso: function retroceso(ticket) {
      $('#NuevoRumbo').modal('show');
      this.OldIdTicket = ticket.id;
    },
    ModalRechazo: function ModalRechazo(ticket) {
      this.datosLog.id = ticket.id;
      $('#desc').val('');
      $('#rechazo').modal('show');
    },
    ModalCrear: function ModalCrear() {
      _event_bus__WEBPACK_IMPORTED_MODULE_3__["default"].$emit('app.getBFormulario');
      $('#formulario').modal('show');
    },
    RechazarTicket: function RechazarTicket(id, m) {
      var url = '/rechazo/' + id;
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.put(url, this.datosLog).then(function (response) {});
      $('#rechazo').modal('hide');
      $('#desc').val('');
      this.getTickets(m);
      this.getBacklog();
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: function onOpen(toast) {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
      });
      Toast.fire({
        type: 'success',
        title: 'Ticket Nro' + ' ' + id + ' ' + 'Rechazado.'
      });
    },
    AprobarTicket: function AprobarTicket(id) {
      var _this13 = this;

      var url = '/cambioestado/' + id;
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.put(url, this.datosTicket).then(function (response) {
        $('#fecha').modal('hide');
        $('#fechaInput').val('');

        _this13.SearchTicket();

        _this13.getBacklog();

        _this13.datosTicket = {
          'id': '',
          'fechaCompromiso': ''
        };
        _this13.errors = [];
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: function onOpen(toast) {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
          }
        });
        Toast.fire({
          type: 'success',
          title: 'Ticket Nro' + ' ' + id + ' ' + 'Aprobado.'
        });
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/formulario.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/formulario.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _event_bus__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./event-bus */ "./resources/js/components/event-bus.js");
var _methods;

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  data: function data() {
    var _ref;

    return _ref = {
      imagen: '',
      pops: [],
      motivos: [],
      areas: [],
      tecnicas: [],
      equipos: [],
      mantencionId: '',
      datositio: '',
      popid: '',
      dataPop: [],
      archivos: [],
      descripcion: '',
      motivoId: '',
      feinicioproblema: '',
      areaId: '',
      tecnicaId: '',
      ticektCreado: '',
      cantidadEquipo: '',
      validacionCampo: '',
      attachment: null,
      tipoArchivos: [],
      mantenciones: []
    }, _defineProperty(_ref, "motivoId", ''), _defineProperty(_ref, "areaId", ''), _defineProperty(_ref, "tecnicaId", ''), _defineProperty(_ref, "equipoId", ''), _defineProperty(_ref, "cantidadEquipo", ''), _defineProperty(_ref, "tipo_archivo", ''), _defineProperty(_ref, "AllData", 0), _defineProperty(_ref, "cotizaciones", []), _defineProperty(_ref, "lpu", []), _defineProperty(_ref, "checklist", []), _defineProperty(_ref, "step", 1), _defineProperty(_ref, "pxqs", []), _defineProperty(_ref, "informefotografico", []), _defineProperty(_ref, "docdenuncia", []), _defineProperty(_ref, "porcentaje", {
      type: Number,
      "default": 0
    }), _defineProperty(_ref, "tipo_activo_id", ''), _defineProperty(_ref, "desc_activo", ''), _defineProperty(_ref, "cod_sap_activo_resago", ''), _defineProperty(_ref, "cant_activo_resago", ''), _defineProperty(_ref, "fecha_puesta_marcha", ''), _defineProperty(_ref, "pep_puesta_marcha", ''), _defineProperty(_ref, "ework_pep_asociado", ''), _defineProperty(_ref, "valor_estimado", ''), _defineProperty(_ref, "antiguedad", ''), _ref;
  },
  computed: {
    getProgress: function getProgress() {
      return Math.round(this.porcentaje) + '%';
    }
  },
  mounted: function mounted() {
    var self = this;
    _event_bus__WEBPACK_IMPORTED_MODULE_1__["default"].$on('app.getBFormulario', function () {
      self.getFormulario(); // ejecutas el metodo que desees 
    });
  },
  created: function created() {
    this.getFormulario();
  },
  methods: (_methods = {
    changeFiles: function changeFiles(e) {
      var selectedFile = e.target.files[0];
      this.attachment = selectedFile;
    },
    removeFileCotizaciones: function removeFileCotizaciones(key) {
      this.cotizaciones.splice(key, 1);
    },
    removeFileLpu: function removeFileLpu(key) {
      this.lpu.splice(key, 1);
    },
    removeFileCheckList: function removeFileCheckList(key) {
      this.checklist.splice(key, 1);
    },
    removeFilePxQ: function removeFilePxQ(key) {
      this.pxqs.splice(key, 1);
    },
    removeFileInformefotografico: function removeFileInformefotografico(key) {
      this.informefotografico.splice(key, 1);
    },
    removeFileDocdenuncia: function removeFileDocdenuncia(key) {
      this.docdenuncia.splice(key, 1);
    },
    handleFileUploads: function handleFileUploads() {
      var uploadedFiles = this.$refs.cotizaciones.files;
      /*
        Adds the uploaded file to the files array
      */

      for (var i = 0; i < uploadedFiles.length; i++) {
        this.cotizaciones.push(uploadedFiles[i]);
      }
    },
    handleLpuUploads: function handleLpuUploads() {
      var uploadedFiles = this.$refs.lpu.files;
      /*
        Adds the uploaded file to the files array
      */

      for (var i = 0; i < uploadedFiles.length; i++) {
        this.lpu.push(uploadedFiles[i]);
      }
    },
    handleChecklistUploads: function handleChecklistUploads() {
      var uploadedFiles = this.$refs.checklist.files;
      /*
        Adds the uploaded file to the files array
      */

      for (var i = 0; i < uploadedFiles.length; i++) {
        this.checklist.push(uploadedFiles[i]);
      }
    },
    handleFileUploadsPxq: function handleFileUploadsPxq() {
      var uploadedFiles = this.$refs.pxqs.files;
      /*
        Adds the uploaded file to the files array
      */

      for (var i = 0; i < uploadedFiles.length; i++) {
        this.pxqs.push(uploadedFiles[i]);
      }
    },
    handleFileUploadsInformefotografico: function handleFileUploadsInformefotografico() {
      var uploadedFiles = this.$refs.informefotografico.files;
      /*
        Adds the uploaded file to the files array
      */

      for (var i = 0; i < uploadedFiles.length; i++) {
        this.informefotografico.push(uploadedFiles[i]);
      }
    },
    handleFileUploadsDocdenuncia: function handleFileUploadsDocdenuncia() {
      var uploadedFiles = this.$refs.docdenuncia.files;
      /*
        Adds the uploaded file to the files array
      */

      for (var i = 0; i < uploadedFiles.length; i++) {
        this.docdenuncia.push(uploadedFiles[i]);
      }
    },
    BackStepOne: function BackStepOne() {
      if (this.motivoId == 8) {
        document.getElementById("stepOneDivTwo").style.display = 'none';
        document.getElementById("stepOneDivOne").style.display = 'block';
        this.step = 1;
        document.getElementById("backStep1").style.display = 'none';
        document.getElementById('stepOneDivTwoResago').style.display = 'block';
        document.getElementById('DivResago').style.display = 'block';
        document.getElementById("btnNextStepOne").style.display = 'block';
        document.getElementById("btnCreateTicket").style.display = 'none';
        document.getElementById("stepTwoneDivOne").style.display = 'none';
        document.getElementById("stepTwoneDivTwo").style.display = 'none';
      } else {
        document.getElementById("stepOneDivTwo").style.display = 'block';
        document.getElementById("stepOneDivOne").style.display = 'block';
        document.getElementById("backStep1").style.display = 'none';
        document.getElementById("btnNextStepOne").style.display = 'block';
        document.getElementById("btnCreateTicket").style.display = 'none';
        document.getElementById("stepTwoneDivOne").style.display = 'none';
        document.getElementById("stepTwoneDivTwo").style.display = 'none';
      }
    },
    deleteError: function deleteError() {
      var _this = this;

      if (this.motivoId != '') {
        var errorMotivo = document.getElementById('errorMotivo');
        errorMotivo.style.display = 'none';

        if (this.motivoId == 4) {
          axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/GetFilterArea').then(function (response) {
            _this.areas = response.data;
          });
          var ChancheEquipoId = document.getElementById('equiposId');
          var ChangeCantEquipo = document.getElementById('CantidadEquipo');
          ChancheEquipoId.style.display = 'none';
          ChangeCantEquipo.style.display = '';
        } else {
          if (this.motivoId == 8) {
            document.getElementById('stepOneDivTwo').style.display = 'none';
            document.getElementById('stepOneDivTwoResago').style.display = 'block';
            document.getElementById('DivResago').style.display = 'block';

            if (this.desc_activo != '') {
              document.getElementById('errorDescActivo').style.display = 'none';
            }

            if (this.cod_sap_activo_resago != '') {
              document.getElementById('errorCodSapActivo').style.display = 'none';
            }

            if (this.fecha_puesta_marcha != '') {
              document.getElementById('errorFechaResago').style.display = 'none';
            }

            if (this.pep_puesta_marcha != '') {
              document.getElementById('errorPepOrigen').style.display = 'none';
            }

            if (this.ework_pep_asociado != '') {
              document.getElementById('errorEworkResago').style.display = 'none';
            }

            if (this.cant_activo_resago != '') {
              document.getElementById('errorCAntidadActivoResago').style.display = 'none';
            }

            if (this.valor_estimado != '') {
              document.getElementById('errorValorEstimado').style.display = 'none';
            }

            if (this.tipo_activo_id != '') {
              document.getElementById('errorEquipoMaterial').style.display = 'none';
            }
          } else {
            axios__WEBPACK_IMPORTED_MODULE_0___default()({
              method: 'Get',
              responseType: 'json',
              url: '/Getarea'
            }).then(function (response) {
              _this.areas = response.data;
            });
            var ChancheEquipoId = document.getElementById('equiposId');
            var ChangeCantEquipo = document.getElementById('CantidadEquipo');
            document.getElementById('stepOneDivTwo').style.display = 'block';
            document.getElementById('stepOneDivTwoResago').style.display = 'none';
            document.getElementById('DivResago').style.display = 'none';
            ChancheEquipoId.style.display = '';
            ChangeCantEquipo.style.display = 'none';
          }
        }

        if (this.motivoId == 3) {
          var tipoMantencion = document.getElementById('TipoMantencion');
          tipoMantencion.style.display = '';
          axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/tipoMantencion').then(function (response) {
            _this.mantenciones = response.data;
          });
        } else {
          this.mantenciones = '';
          this.mantencionId = '';
          var tipoMantencion = document.getElementById('TipoMantencion');
          tipoMantencion.style.display = 'none';
        }
      }

      if (this.mantencionId != '') {
        var errortipoMantencion = document.getElementById('errortipoMantencion');
        errortipoMantencion.style.display = 'none';
      }

      if (this.descripcion != '') {
        var errorDescripcion = document.getElementById('errorDescripcion');
        errorDescripcion.style.display = 'none';
      }

      if (this.areaId != '') {
        var errorArea = document.getElementById('errorArea');
        errorArea.style.display = 'none';
      }

      if (this.tecnicaId != '') {
        var errorTecnica = document.getElementById('errorTecnica');
        errorTecnica.style.display = 'none';
      }

      if (this.tipo_archivo != '') {
        var errorTipoArchivpo = document.getElementById('errorTipoArchivpo');
        errorTipoArchivpo.style.display = 'none';
      }

      if (this.motivoId == 4) {
        if (this.cantidadEquipo != '') {
          var errorCantidadEquipo = document.getElementById('errorCantidadEquipo');
          errorCantidadEquipo.style.display = 'none';
        }
      } else {
        if (this.equipoId != '') {
          var errorEquipo = document.getElementById('errorEquipo');
          errorEquipo.style.display = 'none';
        }
      }

      if (this.equipoId != '' || this.cantidadEquipo != '') {
        this.validacionCampo = 1;
      }

      if (this.popid != '' && this.motivoId != '' && this.descripcion != '' && this.areaId != '' && this.tecnicaId != '' && this.validacionCampo == 1) {
        this.AllData = 1;
      } else {
        this.AllData = 0;
      }
    },
    CleandForm: function CleandForm() {
      this.changePop();
      this.descripcion = '';
      this.cantidadEquipo = '';
      this.areaId = '';
      this.tecnicaId = '';
      this.equipoId = '';
      this.motivoId = '';
      this.mantencionId = '';
      this.tipo_archivo = '';
      this.files = [];
      this.cotizaciones = [];
      this.lpu = [];
      this.checklist = [];
      this.pxqs = [];
      this.informefotografico = [];
      this.docdenuncia = [];
      this.porcentaje = 0;
      this.tipo_activo_id = '';
      this.desc_activo = '';
      this.cod_sap_activo_resago = '';
      this.cant_activo_resago = '';
      this.fecha_puesta_marcha = '';
      this.valor_estimado = '';
      this.pep_puesta_marcha = '';
      this.ework_pep_asociado = '';
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
      }, 500);
    },
    toastFunction: function toastFunction(Messaje) {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 6500,
        onOpen: function onOpen(toast) {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
      });
      Toast.fire({
        type: 'success',
        title: 'Ticket nro°' + ' ' + Messaje + ' ' + 'creado'
      });
    },
    ValidateFormTicektStepOne: function ValidateFormTicektStepOne() {
      if (this.popid == '') {
        document.getElementById('errorPop').style.display = '';
      }

      if (this.motivoId == 3) {
        if (this.mantencionId == '') {
          var errortipoMantencion = document.getElementById('errortipoMantencion');
          errortipoMantencion.style.display = '';
        }
      }

      if (this.motivoId == '') {
        var errorMotivo = document.getElementById('errorMotivo');
        errorMotivo.style.display = '';
      }

      if (this.descripcion == '') {
        var errorDescripcion = document.getElementById('errorDescripcion');
        errorDescripcion.style.display = '';
      }

      if (this.motivoId == 3) {} else {
        if (this.areaId == '') {
          var errorArea = document.getElementById('errorArea');
          errorArea.style.display = '';
        }

        if (this.tecnicaId == '') {
          var errorTecnica = document.getElementById('errorTecnica');
          errorTecnica.style.display = '';
        }

        if (this.motivoId == 4) {
          if (this.cantidadEquipo == '') {
            var errorCantidadEquipo = document.getElementById('errorCantidadEquipo');
            errorCantidadEquipo.style.display = '';
          }
        } else {
          if (this.equipoId == '') {
            var errorEquipo = document.getElementById('errorEquipo');
            errorEquipo.style.display = '';
          }
        }
      }

      if (this.motivoId == 8) {
        if (this.antiguedad == 1) {
          if (this.desc_activo == '') {
            document.getElementById('errorDescActivo').style.display = 'block';
          }

          if (this.fecha_puesta_marcha == '') {
            document.getElementById('errorFechaResago').style.display = 'block';
          }

          if (this.cant_activo_resago == '') {
            document.getElementById('errorCAntidadActivoResago').style.display = 'block';
          }

          if (this.valor_estimado == '') {
            document.getElementById('errorValorEstimado').style.display = 'block';
          }

          if (this.tipo_activo_id == '') {
            document.getElementById('errorEquipoMaterial').style.display = 'block';
          }
        } else {
          if (this.antiguedad == 2) {
            if (this.desc_activo == '') {
              document.getElementById('errorDescActivo').style.display = 'block';
            }

            if (this.cod_sap_activo_resago == '') {
              document.getElementById('errorCodSapActivo').style.display = 'block';
            }

            if (this.fecha_puesta_marcha == '') {
              document.getElementById('errorFechaResago').style.display = 'block';
            }

            if (this.pep_puesta_marcha == '') {
              document.getElementById('errorPepOrigen').style.display = 'block';
            }

            if (this.ework_pep_asociado == '') {
              document.getElementById('errorEworkResago').style.display = 'block';
            }

            if (this.cant_activo_resago == '') {
              document.getElementById('errorCAntidadActivoResago').style.display = 'block';
            }

            if (this.valor_estimado == '') {
              document.getElementById('errorValorEstimado').style.display = 'block';
            }

            if (this.tipo_activo_id == '') {
              document.getElementById('errorEquipoMaterial').style.display = 'block';
            }
          }
        }
      }

      if (this.tecnicaId != '' || this.cantidadEquipo != '') {
        this.validacionCampo = 1;
      }

      if (this.motivoId == 3) {
        if (this.popid != '' && this.motivoId != '' && this.descripcion != '' && this.mantencionId != '') {
          document.getElementById("stepOneDivTwo").style.display = 'none';
          document.getElementById("stepOneDivOne").style.display = 'none';
          this.step = 2;
          document.getElementById("backStep1").style.display = 'block';
          document.getElementById("btnNextStepOne").style.display = 'none';
          document.getElementById("btnCreateTicket").style.display = 'block';
          document.getElementById("stepTwoneDivOne").style.display = 'block';
          document.getElementById('stepOneDivTwoResago').style.display = 'none';
          document.getElementById('DivResago').style.display = 'none';
        }
      } else {
        if (this.motivoId == 8) {
          if (this.antiguedad == 1) {
            if (this.tipo_activo_id != '' && this.desc_activo != '' && this.cant_activo_resago != '' && this.fecha_puesta_marcha != '' && this.valor_estimado != '') {
              document.getElementById("stepOneDivTwo").style.display = 'none';
              document.getElementById("stepOneDivOne").style.display = 'none';
              this.step = 2;
              document.getElementById("backStep1").style.display = 'block';
              document.getElementById("btnNextStepOne").style.display = 'none';
              document.getElementById("btnCreateTicket").style.display = 'block';
              document.getElementById("stepTwoneDivOne").style.display = 'block';
              document.getElementById('stepOneDivTwoResago').style.display = 'none';
              document.getElementById('DivResago').style.display = 'none';
              document.getElementById("stepTwoneDivTwo").style.display = 'block';
            }
          } else {
            if (this.antiguedad == 2) {
              if (this.tipo_activo_id != '' && this.desc_activo != '' && this.cod_sap_activo_resago != '' && this.cant_activo_resago != '' && this.fecha_puesta_marcha != '' && this.valor_estimado != '' && this.pep_puesta_marcha != '' && this.ework_pep_asociado != '') {
                document.getElementById("stepOneDivTwo").style.display = 'none';
                document.getElementById("stepOneDivOne").style.display = 'none';
                this.step = 2;
                document.getElementById("backStep1").style.display = 'block';
                document.getElementById("btnNextStepOne").style.display = 'none';
                document.getElementById("btnCreateTicket").style.display = 'block';
                document.getElementById("stepTwoneDivOne").style.display = 'block';
                document.getElementById('stepOneDivTwoResago').style.display = 'none';
                document.getElementById('DivResago').style.display = 'none';
                document.getElementById("stepTwoneDivTwo").style.display = 'block';
              }
            }
          }
        } else {
          if (this.popid != '' && this.motivoId != '' && this.descripcion != '' && this.areaId != '' && this.tecnicaId != '' && this.validacionCampo == 1) {
            document.getElementById("stepOneDivTwo").style.display = 'none';
            document.getElementById("stepOneDivOne").style.display = 'none';
            this.step = 2;
            document.getElementById("backStep1").style.display = 'block';
            document.getElementById("btnNextStepOne").style.display = 'none';
            document.getElementById("btnCreateTicket").style.display = 'block';
            document.getElementById("stepTwoneDivOne").style.display = 'block';
            document.getElementById("stepTwoneDivTwo").style.display = 'block';
            document.getElementById('stepOneDivTwoResago').style.display = 'none';
            document.getElementById('DivResago').style.display = 'none';
          }
        }
      }
    },
    CreateTicket: function CreateTicket() {
      var _this2 = this;

      var formData = new FormData();
      formData.append('pop', this.popid);
      formData.append('descripcion', this.descripcion);
      formData.append('cantidad', this.cantidadEquipo);
      formData.append('area', this.areaId);
      formData.append('tecnica', this.tecnicaId);
      formData.append('equipo', this.equipoId);
      formData.append('motivo', this.motivoId);
      formData.append('mantencion', this.mantencionId);
      formData.append('tipo_archivo', this.tipo_archivo);
      formData.append('activo_id', this.tipo_activo_id);
      formData.append('desc_activo', this.desc_activo);
      formData.append('cod_sap', this.cod_sap_activo_resago);
      formData.append('cant_activo_resago', this.cant_activo_resago);
      formData.append('fecha_puesta_marcha', this.fecha_puesta_marcha);
      formData.append('valor_estimado', this.valor_estimado);
      formData.append('pep', this.pep_puesta_marcha);
      formData.append('ework', this.ework_pep_asociado);

      for (var i = 0; i < this.cotizaciones.length; i++) {
        var cotizacion = this.cotizaciones[i];
        formData.append('cotizacion[' + i + ']', cotizacion);
      }

      for (var i = 0; i < this.lpu.length; i++) {
        var lpus = this.lpu[i];
        formData.append('lpu[' + i + ']', lpus);
      }

      for (var i = 0; i < this.checklist.length; i++) {
        var checklists = this.checklist[i];
        formData.append('checklist[' + i + ']', checklists);
      }

      for (var i = 0; i < this.pxqs.length; i++) {
        var pxq = this.pxqs[i];
        formData.append('pxq[' + i + ']', pxq);
      }

      for (var i = 0; i < this.informefotografico.length; i++) {
        var informefotograficos = this.informefotografico[i];
        formData.append('informefotografico[' + i + ']', informefotograficos);
      }

      for (var i = 0; i < this.docdenuncia.length; i++) {
        var docdenuncias = this.docdenuncia[i];
        formData.append('docdenuncia[' + i + ']', docdenuncias);
      }

      if (this.motivoId == 3) {
        if (this.popid != '' && this.motivoId != '' && this.descripcion != '' && this.mantencionId != '') {
          document.getElementById("progressBarFileUpoad").style.display = 'block';
          document.getElementById("backStep1").style.display = 'none';
          document.getElementById("btnCreateTicket").style.display = 'none';
          axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/CrearTicket', formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            },
            onUploadProgress: function onUploadProgress(e) {
              if (e.lengthComputable) {
                _this2.porcentaje = e.loaded / e.total * 100;
              }
            }
          }).then(function (response) {
            $('#formulario').modal('hide');
            document.getElementById("backStep1").style.display = 'block';
            document.getElementById("btnCreateTicket").style.display = 'block';
            document.getElementById("progressBarFileUpoad").style.display = 'none';

            _this2.loadFunction();

            _this2.AlertFunction(response.data);

            _this2.CleandForm();

            _this2.BackStepOne();

            _event_bus__WEBPACK_IMPORTED_MODULE_1__["default"].$emit('GetTotalTicekts.getBacklog');
          });
        }
      } else {
        if (this.popid != '' && this.motivoId != '' && this.descripcion != '' && this.areaId != '' && this.tecnicaId != '' && this.validacionCampo == 1) {
          //$('#formulario').modal('hide');
          document.getElementById("progressBarFileUpoad").style.display = 'block';
          document.getElementById("backStep1").style.display = 'none';
          document.getElementById("btnCreateTicket").style.display = 'none';
          axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/CrearTicket', formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            },
            onUploadProgress: function onUploadProgress(e) {
              if (e.lengthComputable) {
                _this2.porcentaje = e.loaded / e.total * 100;
              }
            }
          }).then(function (response) {
            $('#formulario').modal('hide');
            document.getElementById("backStep1").style.display = 'block';
            document.getElementById("btnCreateTicket").style.display = 'block';
            document.getElementById("progressBarFileUpoad").style.display = 'none';

            _this2.loadFunction();

            _this2.AlertFunction(response.data);

            _this2.CleandForm();

            _this2.BackStepOne();

            _event_bus__WEBPACK_IMPORTED_MODULE_1__["default"].$emit('GetTotalTicekts.getBacklog');
          });
        } else {
          if (this.motivoId == 8) {
            if (this.antiguedad == 1) {
              if (this.tipo_activo_id != '' && this.desc_activo != '' && this.cant_activo_resago != '' && this.fecha_puesta_marcha != '' && this.valor_estimado != '' && this.popid != '' && this.descripcion != '') {
                document.getElementById("progressBarFileUpoad").style.display = 'block';
                document.getElementById("backStep1").style.display = 'none';
                document.getElementById("btnCreateTicket").style.display = 'none';
                axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/CrearTicket', formData, {
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  },
                  onUploadProgress: function onUploadProgress(e) {
                    if (e.lengthComputable) {
                      _this2.porcentaje = e.loaded / e.total * 100;
                    }
                  }
                }).then(function (response) {
                  $('#formulario').modal('hide');
                  document.getElementById("backStep1").style.display = 'block';
                  document.getElementById("btnCreateTicket").style.display = 'block';
                  document.getElementById("progressBarFileUpoad").style.display = 'none';

                  _this2.loadFunction();

                  _this2.AlertFunction(response.data);

                  _this2.CleandForm();

                  _this2.BackStepOne();

                  document.getElementById('stepOneDivTwoResago').style.display = 'none';
                  document.getElementById('DivResago').style.display = 'none';
                  _event_bus__WEBPACK_IMPORTED_MODULE_1__["default"].$emit('GetTotalTicekts.getBacklog');
                  document.getElementById('errorArea').style.display = 'none';
                  document.getElementById('errorTecnica').style.display = 'none';
                  document.getElementById('errorEquipo').style.display = 'none';
                });
              }
            } else {
              if (this.antiguedad == 2) {
                if (this.tipo_activo_id != '' && this.desc_activo != '' && this.cod_sap_activo_resago != '' && this.cant_activo_resago != '' && this.fecha_puesta_marcha != '' && this.valor_estimado != '' && this.pep_puesta_marcha != '' && this.ework_pep_asociado != '' && this.popid != '' && this.descripcion != '') {
                  document.getElementById("progressBarFileUpoad").style.display = 'block';
                  document.getElementById("backStep1").style.display = 'none';
                  document.getElementById("btnCreateTicket").style.display = 'none';
                  axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/CrearTicket', formData, {
                    headers: {
                      'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: function onUploadProgress(e) {
                      if (e.lengthComputable) {
                        _this2.porcentaje = e.loaded / e.total * 100;
                      }
                    }
                  }).then(function (response) {
                    $('#formulario').modal('hide');
                    document.getElementById("backStep1").style.display = 'block';
                    document.getElementById("btnCreateTicket").style.display = 'block';
                    document.getElementById("progressBarFileUpoad").style.display = 'none';

                    _this2.loadFunction();

                    _this2.AlertFunction(response.data);

                    _this2.CleandForm();

                    _this2.BackStepOne();

                    document.getElementById('stepOneDivTwoResago').style.display = 'none';
                    document.getElementById('DivResago').style.display = 'none';
                    _event_bus__WEBPACK_IMPORTED_MODULE_1__["default"].$emit('GetTotalTicekts.getBacklog');
                    document.getElementById('errorArea').style.display = 'none';
                    document.getElementById('errorTecnica').style.display = 'none';
                    document.getElementById('errorEquipo').style.display = 'none';
                  });
                }
              }
            }
          }
        }
      }
    },
    AlertFunction: function AlertFunction(messaje) {
      Swal.fire({
        type: 'success',
        title: 'Ticket creado',
        text: 'Ticket nro°' + ' ' + messaje + ' ' + 'creado.'
      });
    },
    getFormulario: function getFormulario() {
      var _this3 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default()({
        method: 'Get',
        responseType: 'json',
        url: '/Tipomotivo'
      }).then(function (response) {
        _this3.motivos = response.data;
      });
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/getTipoArchivos').then(function (response) {
        _this3.tipoArchivos = response.data;
      });
      axios__WEBPACK_IMPORTED_MODULE_0___default()({
        method: 'Get',
        responseType: 'json',
        url: '/Getarea'
      }).then(function (response) {
        _this3.areas = response.data;
      });
    },
    BuscarSitio: function BuscarSitio() {
      var _this4 = this;

      if (this.datositio.length >= 3) {
        var url = '/GetPop';
        var box = document.getElementById('listPops');
        box.style.display = '';
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/GetPop?datositio=".concat(this.datositio)).then(function (response) {
          _this4.pops = response.data;
        });
      } else {
        this.pops = '';
        var box = document.getElementById('listPops');
        box.style.display = 'none';
      }
    },
    getFiles: function getFiles() {
      this.archivos = document.getElementById('filesupload').value;
      console.log(this.archivos);
    },
    selectdpop: function selectdpop(id, nemSite, Nombre) {
      this.popid = id;
      var box = document.getElementById('listPops');
      var selectPop = document.getElementById('popcheck');
      var searchPop = document.getElementById('popSearch');
      var divAlertPop = document.getElementById('errorPop');
      this.pops = '';
      searchPop.style.display = 'none';
      selectPop.style.display = '';
      divAlertPop.style.display = 'none';
      box.style.display = 'none';
      $("#popcheck").val(nemSite + '-' + Nombre);
    },
    tecnica: function tecnica() {
      var _this5 = this;

      var idaea = document.getElementById('areas').value;

      if (this.motivoId == 4 && this.areaId == 1) {
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/GetFilterTecnica').then(function (response) {
          _this5.tecnicas = response.data;
        });
      } else {
        if (this.motivoId == 4 && this.areaId == 2) {
          axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/GetFilterTecnicaClima').then(function (response) {
            _this5.tecnicas = response.data;
          });
        } else {
          axios__WEBPACK_IMPORTED_MODULE_0___default()({
            method: 'Get',
            responseType: 'json',
            url: '/GetTecnica/' + idaea
          }).then(function (response) {
            _this5.tecnicas = response.data;
          });
        }
      }
    },
    equipo: function equipo() {
      var _this6 = this;

      var idtecnica = document.getElementById('tecnicas').value;
      axios__WEBPACK_IMPORTED_MODULE_0___default()({
        method: 'Get',
        responseType: 'json',
        url: '/GetEquipo/' + idtecnica
      }).then(function (response) {
        _this6.equipos = response.data;
      });
    },
    changePop: function changePop() {
      var selectPop = document.getElementById('popcheck');
      var searchPop = document.getElementById('popSearch');
      searchPop.style.display = '';
      selectPop.style.display = 'none';
      this.popId = '';
      this.popid = '';
      this.dataPop = '';
      $('#inputSitio').val('');
    }
  }, _defineProperty(_methods, "tecnica", function tecnica() {
    var _this7 = this;

    var idaea = document.getElementById('areas').value;

    if (this.motivoId == 4 && this.areaId == 1) {
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/GetFilterTecnica').then(function (response) {
        _this7.tecnicas = response.data;
      });
    } else {
      if (this.motivoId == 4 && this.areaId == 2) {
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/GetFilterTecnicaClima').then(function (response) {
          _this7.tecnicas = response.data;
        });
      } else {
        axios__WEBPACK_IMPORTED_MODULE_0___default()({
          method: 'Get',
          responseType: 'json',
          url: '/GetTecnica/' + idaea
        }).then(function (response) {
          _this7.tecnicas = response.data;
        });
      }
    }
  }), _defineProperty(_methods, "equipo", function equipo() {
    var _this8 = this;

    var idtecnica = document.getElementById('tecnicas').value;
    axios__WEBPACK_IMPORTED_MODULE_0___default()({
      method: 'Get',
      responseType: 'json',
      url: '/GetEquipo/' + idtecnica
    }).then(function (response) {
      _this8.equipos = response.data;
    });
  }), _methods)
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/baglog.vue?vue&type=template&id=d49ec372&":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/baglog.vue?vue&type=template&id=d49ec372& ***!
  \*********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "wrapper wrapper-content" },
    [
      _c("section", { staticClass: "section" }, [
        _c(
          "div",
          {
            staticClass: "section-header shadow-box-ag",
            style: _vm.config == 2 ? "background-color: #35363a; " : ""
          },
          [
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "col-lg-10 col-md-6 col-sm-6 col-12 " },
                [
                  _c("div", { staticClass: "card-stats-title" }, [
                    _c("h1", { staticClass: "barlow bold" }, [
                      _vm._v(
                        "\n                            Tickets " +
                          _vm._s(_vm.crmNombre) +
                          " " +
                          _vm._s(_vm.NombreModuloMotivo) +
                          "\n                        "
                      )
                    ]),
                    _vm._v(" "),
                    _c("br"),
                    _vm._v(" "),
                    _vm.crm == 0
                      ? _c("div", [
                          _vm.UserId == 21 ? _c("div", [_vm._m(0)]) : _vm._e(),
                          _vm._v(" "),
                          _vm.UserId == 14 ? _c("div", [_vm._m(1)]) : _vm._e(),
                          _vm._v(" "),
                          _vm.UserId != 21 && _vm.UserId != 14
                            ? _c("div", [_vm._m(2)])
                            : _vm._e(),
                          _vm._v(" "),
                          _vm.selectmotivo == 11
                            ? _c("div", [_vm._m(3)])
                            : _vm._e()
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _vm.crm != 0
                      ? _c("div", { staticClass: "dropdown d-inline" }, [
                          _c(
                            "a",
                            {
                              staticClass: "font-weight-600 dropdown-toggle",
                              attrs: {
                                "data-toggle": "dropdown",
                                href: "#",
                                id: "orders-month"
                              }
                            },
                            [
                              _vm._v(
                                "\n                                    Opciones\n                                "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "ul",
                            {
                              staticClass: "dropdown-menu dropdown-menu-sm",
                              staticStyle: {
                                "z-index": "1",
                                position: "absolute"
                              }
                            },
                            [
                              _c("li", { staticClass: "dropdown-title" }, [
                                _vm._v(
                                  "\n                                        Selecione una opción\n                                    "
                                )
                              ]),
                              _vm._v(" "),
                              _c("li", [
                                _c(
                                  "a",
                                  {
                                    attrs: {
                                      href: "/ticketExcelCrm/" + _vm.crm
                                    }
                                  },
                                  [
                                    _c("i", { staticClass: "fas fa-download" }),
                                    _vm._v(
                                      "\n                                            Reporte " +
                                        _vm._s(_vm.crmNombre) +
                                        "\n                                        "
                                    )
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _vm._m(4)
                            ]
                          )
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _c("br")
                  ])
                ]
              )
            ])
          ]
        )
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _vm.selectmotivo == 9
          ? _c("div", { staticClass: "col-lg-12 col-md-4 col-sm-12" }, [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-12 " }, [
                  _c("div", { staticClass: "card mb-0 shadow-box-ag " }, [
                    _c("div", { staticClass: "card-body" }, [
                      _c(
                        "h4",
                        {
                          staticClass: "barlow semi_bold",
                          staticStyle: { color: "#191919" }
                        },
                        [
                          _vm._v(
                            "\n                                Total Tickes\n                            "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c("ul", { staticClass: "nav nav-pills" }, [
                        _c("div", { staticClass: "col-lg-3" }, [
                          _c("li", { staticClass: "nav-item" }, [
                            _c(
                              "a",
                              {
                                staticClass: "nav-link active barlow semi_bold",
                                staticStyle: {
                                  "font-size": "19px",
                                  "text-align": "center",
                                  "background-color": "#2FCBF1"
                                }
                              },
                              [
                                _vm._m(5),
                                _vm._v(
                                  "\n                                            En espera\n                                            "
                                ),
                                _c(
                                  "span",
                                  {
                                    staticClass:
                                      "badge badge-white barlow regular",
                                    staticStyle: {
                                      float: "right",
                                      "font-size": "16px"
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "\n                                                " +
                                        _vm._s(_vm.backlog.backlog) +
                                        "\n                                            "
                                    )
                                  ]
                                )
                              ]
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-lg-3" }, [
                          _c("li", { staticClass: "nav-item" }, [
                            _c(
                              "a",
                              {
                                staticClass: "nav-link active barlow semi_bold",
                                staticStyle: {
                                  "font-size": "19px",
                                  "text-align": "center",
                                  "background-color": "#42E8B4"
                                }
                              },
                              [
                                _vm._m(6),
                                _vm._v(
                                  "\n                                            En curso\n                                            "
                                ),
                                _c(
                                  "span",
                                  {
                                    staticClass:
                                      "badge badge-white barlow regular",
                                    staticStyle: {
                                      float: "right",
                                      "font-size": "16px"
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "\n                                                " +
                                        _vm._s(_vm.backlog.curso) +
                                        "\n                                            "
                                    )
                                  ]
                                )
                              ]
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-lg-3" }, [
                          _c("li", { staticClass: "nav-item" }, [
                            _c(
                              "a",
                              {
                                staticClass: "nav-link active barlow semi_bold",
                                staticStyle: {
                                  "font-size": "19px",
                                  "text-align": "center",
                                  "background-color": "#005cff"
                                }
                              },
                              [
                                _vm._m(7),
                                _vm._v(
                                  "\n                                            Validación\n                                            "
                                ),
                                _c(
                                  "span",
                                  {
                                    staticClass:
                                      "badge badge-white barlow regular",
                                    staticStyle: {
                                      float: "right",
                                      "font-size": "16px"
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "\n                                                " +
                                        _vm._s(_vm.backlog.validacion) +
                                        "\n                                            "
                                    )
                                  ]
                                )
                              ]
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-lg-3" }, [
                          _c("li", { staticClass: "nav-item" }, [
                            _c(
                              "a",
                              {
                                staticClass: "nav-link active barlow semi_bold",
                                staticStyle: {
                                  "font-size": "19px",
                                  "text-align": "center",
                                  "background-color": "#FD6C98"
                                }
                              },
                              [
                                _vm._m(8),
                                _vm._v(
                                  "\n                                            Finalizadas\n                                            "
                                ),
                                _c(
                                  "span",
                                  {
                                    staticClass:
                                      "badge badge-white barlow regular",
                                    staticStyle: {
                                      float: "right",
                                      "font-size": "16px"
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "\n                                                " +
                                        _vm._s(_vm.backlog.finalizada) +
                                        "\n                                            "
                                    )
                                  ]
                                )
                              ]
                            )
                          ])
                        ])
                      ])
                    ])
                  ])
                ])
              ])
            ])
          : _vm._e(),
        _vm._v(" "),
        _vm.selectmotivo == 10
          ? _c("div", { staticClass: "col-lg-3 col-md-6 col-sm-6 col-12" }, [
              _c(
                "div",
                {
                  staticClass:
                    "card card-statistic-1 shadow-box-ag boxBounce animated fadeIn",
                  style:
                    _vm.modulo == 1
                      ? "background-color: #005cff; border: 2px solid white;"
                      : ""
                },
                [
                  _c(
                    "div",
                    {
                      staticClass: "card-icon shadow-box-ag azul",
                      style: _vm.modulo == 1 ? "background-color: white; " : ""
                    },
                    [
                      _c("i", {
                        staticClass: "fas fa-globe-americas",
                        staticStyle: { "font-size": "28px", color: "white" },
                        style: _vm.modulo == 1 ? "color: #6c757d; " : ""
                      })
                    ]
                  ),
                  _vm._v(" "),
                  _c("div", { staticClass: "card-wrap " }, [
                    _c("div", { staticClass: "card-header" }, [
                      _c(
                        "h4",
                        {
                          staticStyle: { "font-size": "" },
                          style: _vm.modulo == 1 ? "color: white; " : ""
                        },
                        [
                          _vm._v(
                            "\n                            TOTAL MI CRM\n                        "
                          )
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "card-body animated fadeIn",
                        staticStyle: { "font-size": "35px" },
                        style: _vm.modulo == 1 ? "color: white; " : ""
                      },
                      [
                        _vm._v(
                          "\n                        " +
                            _vm._s(_vm.TotalMiCrm) +
                            "\n                    "
                        )
                      ]
                    )
                  ])
                ]
              )
            ])
          : _vm._e(),
        _vm._v(" "),
        _vm.selectmotivo != 9 && _vm.selectmotivo != 10
          ? _c("div", { staticClass: "col-lg-3 col-md-6 col-sm-6 col-12" }, [
              _c(
                "div",
                {
                  staticClass:
                    "card card-statistic-1 shadow-box-ag boxBounce animated fadeIn ",
                  style:
                    _vm.modulo == 1
                      ? "background-color: #005cff; border: 2px solid white;"
                      : ""
                },
                [
                  _c(
                    "a",
                    {
                      staticStyle: { color: "#2FCBF1" },
                      attrs: { href: "" },
                      on: {
                        click: function($event) {
                          $event.preventDefault()
                          return _vm.ClearAllData($event)
                        }
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "card-icon shadow-box-ag azul",
                          style:
                            _vm.modulo == 1 ? "background-color: white; " : ""
                        },
                        [
                          _c("i", {
                            staticClass: "fas fa-columns",
                            staticStyle: {
                              "font-size": "25px",
                              color: "white"
                            },
                            style: _vm.modulo == 1 ? "color: #6c757d; " : ""
                          })
                        ]
                      ),
                      _vm._v(" "),
                      _c("div", { staticClass: "card-wrap " }, [
                        _c("div", { staticClass: "card-header" }, [
                          _c(
                            "h4",
                            {
                              staticClass: "barlow bold",
                              staticStyle: { "font-size": "" },
                              style: _vm.modulo == 1 ? "color: white; " : ""
                            },
                            [
                              _vm._v(
                                "\n                                EN ESPERA\n                            "
                              )
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "card-body animated fadeIn barlow semi_bold",
                            staticStyle: { "font-size": "35px" },
                            style: _vm.modulo == 1 ? "color: white; " : ""
                          },
                          [
                            _vm._v(
                              "\n                            " +
                                _vm._s(_vm.backlog.backlog) +
                                "\n                        "
                            )
                          ]
                        )
                      ])
                    ]
                  )
                ]
              )
            ])
          : _vm._e(),
        _vm._v(" "),
        _vm.selectmotivo != 9 && _vm.selectmotivo != 10
          ? _c("div", { staticClass: "col-lg-3 col-md-6 col-sm-6 col-12" }, [
              _c(
                "div",
                {
                  staticClass:
                    "card card-statistic-1 shadow-box-ag boxBounce animated fadeIn",
                  style:
                    _vm.modulo == 2
                      ? "background-color: #005cff; border: 2px solid white;"
                      : ""
                },
                [
                  _c(
                    "a",
                    {
                      staticStyle: { color: "#2d88ff" },
                      attrs: { href: "" },
                      on: {
                        click: function($event) {
                          $event.preventDefault()
                          return _vm.ClearAllData(2)
                        }
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "card-icon shadow-box-ag verde",
                          style:
                            _vm.modulo == 2 ? "background-color: white; " : ""
                        },
                        [
                          _c("i", {
                            staticClass: "fa fa-edit",
                            staticStyle: {
                              "font-size": "23px",
                              color: "white"
                            },
                            style: _vm.modulo == 2 ? "color: #6c757d; " : ""
                          })
                        ]
                      ),
                      _vm._v(" "),
                      _c("div", { staticClass: "card-wrap" }, [
                        _c("div", { staticClass: "card-header" }, [
                          _c(
                            "h4",
                            {
                              staticClass: "barlow bold",
                              style: _vm.modulo == 2 ? "color: white; " : ""
                            },
                            [
                              _vm._v(
                                "\n                                EN CURSO\n                            "
                              )
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "card-body animated fadeIn barlow semi_bold",
                            staticStyle: { "font-size": "35px" },
                            style: _vm.modulo == 2 ? "color: white; " : ""
                          },
                          [
                            _vm._v(
                              "\n                            " +
                                _vm._s(_vm.backlog.curso) +
                                "\n                        "
                            )
                          ]
                        )
                      ])
                    ]
                  )
                ]
              )
            ])
          : _vm._e(),
        _vm._v(" "),
        _vm.selectmotivo != 9 && _vm.selectmotivo != 10
          ? _c("div", { staticClass: "col-lg-3 col-md-6 col-sm-6 col-12" }, [
              _c(
                "div",
                {
                  staticClass:
                    "card card-statistic-1 shadow-box-ag boxBounce animated fadeIn",
                  style:
                    _vm.modulo == 3
                      ? "background-color: #005cff; border: 2px solid white;"
                      : ""
                },
                [
                  _c(
                    "a",
                    {
                      staticStyle: { color: "#005cff" },
                      attrs: { href: "" },
                      on: {
                        click: function($event) {
                          $event.preventDefault()
                          return _vm.ClearAllData(3)
                        }
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "card-icon shadow-box-ag blue",
                          style:
                            _vm.modulo == 3 ? "background-color: white; " : ""
                        },
                        [
                          _c("i", {
                            staticClass: "fa fa-check",
                            staticStyle: {
                              "font-size": "23px",
                              color: "white"
                            },
                            style: _vm.modulo == 3 ? "color: #6c757d; " : ""
                          })
                        ]
                      ),
                      _vm._v(" "),
                      _c("div", { staticClass: "card-wrap" }, [
                        _c("div", { staticClass: "card-header" }, [
                          _c(
                            "h4",
                            {
                              staticClass: "barlow bold",
                              style: _vm.modulo == 3 ? "color: white; " : ""
                            },
                            [
                              _vm._v(
                                "\n                                VALIDACIÓN\n                            "
                              )
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "card-body animated fadeIn barlow semi_bold",
                            staticStyle: { "font-size": "35px" },
                            style: _vm.modulo == 3 ? "color: white; " : ""
                          },
                          [
                            _vm._v(
                              "\n                            " +
                                _vm._s(_vm.backlog.validacion) +
                                "\n                        "
                            )
                          ]
                        )
                      ])
                    ]
                  )
                ]
              )
            ])
          : _vm._e(),
        _vm._v(" "),
        _vm.selectmotivo != 9 && _vm.selectmotivo != 10
          ? _c("div", { staticClass: "col-lg-3 col-md-6 col-sm-6 col-12" }, [
              _c(
                "div",
                {
                  staticClass:
                    "card card-statistic-1 shadow-box-ag boxBounce animated fadeIn",
                  style:
                    _vm.modulo == 4
                      ? "background-color: #005cff; border: 2px solid white;"
                      : ""
                },
                [
                  _c(
                    "a",
                    {
                      staticStyle: { color: "#FD6C98" },
                      attrs: { href: "" },
                      on: {
                        click: function($event) {
                          $event.preventDefault()
                          return _vm.ClearAllData(4)
                        }
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "card-icon shadow-box-ag rosa",
                          style:
                            _vm.modulo == 4 ? "background-color: white; " : ""
                        },
                        [
                          _c("i", {
                            staticClass: "fab fa-font-awesome-alt",
                            staticStyle: {
                              "font-size": "35px",
                              color: "white"
                            },
                            style: _vm.modulo == 4 ? "color: #6c757d; " : ""
                          })
                        ]
                      ),
                      _vm._v(" "),
                      _c("div", { staticClass: "card-wrap" }, [
                        _c("div", { staticClass: "card-header" }, [
                          _c(
                            "h4",
                            {
                              staticClass: "barlow bold",
                              style: _vm.modulo == 4 ? "color: white; " : ""
                            },
                            [
                              _vm._v(
                                "\n                                FINALIZADAS\n                            "
                              )
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "card-body animated fadeIn barlow semi_bold",
                            staticStyle: { "font-size": "35px" },
                            style: _vm.modulo == 4 ? "color: white; " : ""
                          },
                          [
                            _vm._v(
                              "\n                            " +
                                _vm._s(_vm.backlog.finalizada) +
                                "\n                        "
                            )
                          ]
                        )
                      ])
                    ]
                  )
                ]
              )
            ])
          : _vm._e()
      ]),
      _vm._v(" "),
      _vm.screen_width <= 1024
        ? _c(
            "div",
            { staticClass: "row", staticStyle: { "margin-top": "20px" } },
            [
              _c("div", { staticClass: "col-lg-12 " }, [
                _c(
                  "div",
                  {
                    staticClass:
                      "card card-statistic-1 shadow-box-ag animated fadeIn",
                    staticStyle: { "border-radius": "5px" }
                  },
                  [
                    _c("div", { staticClass: "col-lg-12 " }, [
                      _c(
                        "button",
                        {
                          staticClass:
                            "btn btn-info boxBounce barlow semi_bold btn-block",
                          staticStyle: {
                            "border-radius": "5px",
                            "font-size": "15px"
                          },
                          style:
                            _vm.config == 2
                              ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1); "
                              : "",
                          on: {
                            click: function($event) {
                              $event.preventDefault()
                              return _vm.ModalCrear($event)
                            }
                          }
                        },
                        [
                          _vm._v(
                            "\n                        Crear Ticket\n                    "
                          )
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-12 " }, [
                      _c("div", { staticClass: "ticket-item " }, [
                        _c("div", { staticClass: "ticket-title" }, [
                          _c(
                            "h4",
                            {
                              staticClass: "barlow bold",
                              staticStyle: { "font-size": "16px" }
                            },
                            [
                              _vm._v(
                                "\n                                Nro° Ticket\n                            "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.codigo,
                                expression: "codigo"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              name: "codigo",
                              placeholder: "",
                              type: ""
                            },
                            domProps: { value: _vm.codigo },
                            on: {
                              keyup: function($event) {
                                return _vm.SearchTicket(_vm.modulo)
                              },
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.codigo = $event.target.value
                              }
                            }
                          })
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-12 " }, [
                      _c("div", { staticClass: "ticket-item " }, [
                        _c("div", { staticClass: "ticket-title" }, [
                          _c(
                            "h4",
                            {
                              staticClass: "barlow bold",
                              staticStyle: { "font-size": "16px" }
                            },
                            [
                              _vm._v(
                                "\n                                Sitio\n                            "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.datositio,
                                expression: "datositio"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "inputSitioSearchPop",
                              name: "datositio",
                              placeholder: "Buscar Sitio",
                              type: "text",
                              value: ""
                            },
                            domProps: { value: _vm.datositio },
                            on: {
                              keyup: _vm.BuscarSitioTab,
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.datositio = $event.target.value
                              }
                            }
                          }),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "row",
                              staticStyle: { display: "none" },
                              attrs: { id: "listPopsTab" }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "col-lg-12 col-md-4 col-sm-4 col-10 shadow-box-ag full-height-scroll ",
                                  staticStyle: {
                                    "max-height": "120px",
                                    "overflow-y": "auto"
                                  }
                                },
                                _vm._l(_vm.pops, function(pop) {
                                  return _c("div", [
                                    _c(
                                      "a",
                                      {
                                        staticStyle: { color: "black" },
                                        attrs: {
                                          href: "",
                                          id: "selectpopvalue"
                                        },
                                        on: {
                                          click: function($event) {
                                            $event.preventDefault()
                                            return _vm.selectdpopSearch(pop)
                                          }
                                        }
                                      },
                                      [
                                        _vm._v(
                                          "\n                                                " +
                                            _vm._s(pop.nem_site) +
                                            " " +
                                            _vm._s(pop.nombre) +
                                            "\n                                                "
                                        ),
                                        _c("hr", {
                                          staticStyle: { "margin-top": "-1px" }
                                        })
                                      ]
                                    )
                                  ])
                                }),
                                0
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticStyle: { display: "none" },
                              attrs: { id: "selectedSitio" }
                            },
                            [
                              _c(
                                "span",
                                {
                                  staticClass: "badge ",
                                  staticStyle: {
                                    "background-color": "#015dff",
                                    color: "white",
                                    "border-radius": "3px"
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                        " +
                                      _vm._s(_vm.datapopSelec) +
                                      "\n                                        "
                                  ),
                                  _c(
                                    "a",
                                    {
                                      staticStyle: { color: "white" },
                                      attrs: { href: "" },
                                      on: {
                                        click: function($event) {
                                          $event.preventDefault()
                                          return _vm.Clearsitio($event)
                                        }
                                      }
                                    },
                                    [
                                      _c("i", {
                                        staticClass: "fas fa-times-circle"
                                      })
                                    ]
                                  )
                                ]
                              )
                            ]
                          )
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-2" }, [
                      _c("div", { staticClass: "ticket-item" }, [
                        _vm._m(9),
                        _vm._v(" "),
                        _c("div", { attrs: { id: "selectMotivo" } }, [
                          _c(
                            "select",
                            {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.motivo,
                                  expression: "motivo"
                                }
                              ],
                              staticClass: "form-control select",
                              attrs: { name: "motivo" },
                              on: {
                                change: [
                                  function($event) {
                                    var $$selectedVal = Array.prototype.filter
                                      .call($event.target.options, function(o) {
                                        return o.selected
                                      })
                                      .map(function(o) {
                                        var val =
                                          "_value" in o ? o._value : o.value
                                        return val
                                      })
                                    _vm.motivo = $event.target.multiple
                                      ? $$selectedVal
                                      : $$selectedVal[0]
                                  },
                                  function($event) {
                                    return _vm.BoxSearch(_vm.modulo)
                                  }
                                ]
                              }
                            },
                            [
                              _c("option", { domProps: { value: 1 } }, [
                                _vm._v(
                                  "\n                                    Vandalismo menor\n                                "
                                )
                              ]),
                              _vm._v(" "),
                              _c("option", { domProps: { value: 7 } }, [
                                _vm._v(
                                  "\n                                    Vandalismo mayor\n                                "
                                )
                              ]),
                              _vm._v(" "),
                              _c("option", { domProps: { value: 2 } }, [
                                _vm._v(
                                  "\n                                    Falla Mayor\n                                "
                                )
                              ]),
                              _vm._v(" "),
                              _c("option", { domProps: { value: 6 } }, [
                                _vm._v(
                                  "\n                                    Falla menor\n                                "
                                )
                              ]),
                              _vm._v(" "),
                              _c("option", { domProps: { value: 3 } }, [
                                _vm._v(
                                  "\n                                    Mantenimiento\n                                "
                                )
                              ]),
                              _vm._v(" "),
                              _c("option", { domProps: { value: 4 } }, [
                                _vm._v(
                                  "\n                                    Solicitud Stock\n                                "
                                )
                              ]),
                              _vm._v(" "),
                              _c("option", { domProps: { value: 5 } }, [
                                _vm._v(
                                  "\n                                    Solicitud de mejora\n                                "
                                )
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticStyle: { display: "none" },
                            attrs: { id: "selectedMotivoInfo" }
                          },
                          [
                            _c(
                              "span",
                              {
                                staticClass: "badge ",
                                staticStyle: {
                                  "background-color": "#015dff",
                                  color: "white",
                                  "border-radius": "3px"
                                }
                              },
                              [
                                _vm._v(
                                  "\n                                " +
                                    _vm._s(_vm.SelectMotivo) +
                                    "\n                                "
                                ),
                                _c(
                                  "a",
                                  {
                                    staticStyle: { color: "white" },
                                    attrs: { href: "" },
                                    on: {
                                      click: function($event) {
                                        $event.preventDefault()
                                        return _vm.ClearMotivo($event)
                                      }
                                    }
                                  },
                                  [
                                    _c("i", {
                                      staticClass: "fas fa-times-circle"
                                    })
                                  ]
                                )
                              ]
                            )
                          ]
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _vm.selectmotivo == 9
                      ? _c("div", { staticClass: "col-lg-12 " }, [
                          _c("div", { staticClass: "ticket-item " }, [
                            _vm._m(10),
                            _vm._v(" "),
                            _c("div", { attrs: { id: "selectEstado" } }, [
                              _vm.selectmotivo == 9
                                ? _c(
                                    "select",
                                    {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.estadoValue,
                                          expression: "estadoValue"
                                        }
                                      ],
                                      staticClass: "form-control select",
                                      on: {
                                        change: [
                                          function($event) {
                                            var $$selectedVal = Array.prototype.filter
                                              .call(
                                                $event.target.options,
                                                function(o) {
                                                  return o.selected
                                                }
                                              )
                                              .map(function(o) {
                                                var val =
                                                  "_value" in o
                                                    ? o._value
                                                    : o.value
                                                return val
                                              })
                                            _vm.estadoValue = $event.target
                                              .multiple
                                              ? $$selectedVal
                                              : $$selectedVal[0]
                                          },
                                          function($event) {
                                            return _vm.SearchTicket(_vm.modulo)
                                          }
                                        ]
                                      }
                                    },
                                    [
                                      _c("option", { domProps: { value: 8 } }, [
                                        _vm._v(
                                          "\n                                    Aprobación ing oym\n                                "
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("option", { domProps: { value: 1 } }, [
                                        _vm._v(
                                          "\n                                    En espera\n                                "
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("option", { domProps: { value: 2 } }, [
                                        _vm._v(
                                          "\n                                    En curso\n                                "
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("option", { domProps: { value: 3 } }, [
                                        _vm._v(
                                          "\n                                    Validación\n                                "
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("option", { domProps: { value: 4 } }, [
                                        _vm._v(
                                          "\n                                    Finalizada\n                                "
                                        )
                                      ])
                                    ]
                                  )
                                : _vm._e()
                            ]),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticStyle: { display: "none" },
                                attrs: { id: "selectedEstadoInfo" }
                              },
                              [
                                _c(
                                  "span",
                                  {
                                    staticClass: "badge ",
                                    staticStyle: {
                                      "background-color": "#015dff",
                                      color: "white",
                                      "border-radius": "3px"
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "\n                                " +
                                        _vm._s(_vm.SelectEstado) +
                                        "\n                                "
                                    ),
                                    _c(
                                      "a",
                                      {
                                        staticStyle: { color: "white" },
                                        attrs: { href: "" },
                                        on: {
                                          click: function($event) {
                                            $event.preventDefault()
                                            return _vm.ClearEestado($event)
                                          }
                                        }
                                      },
                                      [
                                        _c("i", {
                                          staticClass: "fas fa-times-circle"
                                        })
                                      ]
                                    )
                                  ]
                                )
                              ]
                            )
                          ])
                        ])
                      : _vm._e()
                  ]
                )
              ])
            ]
          )
        : _vm._e(),
      _vm._v(" "),
      _vm.screen_width <= 1024
        ? _c(
            "div",
            { staticClass: "row", staticStyle: { "margin-top": "20px" } },
            [
              _vm._l(_vm.tickets.data, function(ticket) {
                return _c(
                  "div",
                  { staticClass: "col-lg-12 col-md-6 col-sm-6 col-12" },
                  [
                    _c(
                      "div",
                      {
                        staticClass:
                          "card card-statistic-1 shadow-box-ag animated fadeIn",
                        staticStyle: { "border-radius": "5px" }
                      },
                      [
                        _c("div", { staticClass: "tickets" }, [
                          _c(
                            "div",
                            {
                              staticClass: "ticket-items",
                              staticStyle: { width: "100%" }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass: "ticket-item ",
                                  staticStyle: {
                                    "background-color": "white",
                                    "border-radius": "5px"
                                  }
                                },
                                [
                                  _vm._m(11, true),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "ticket-desc barlow regular",
                                      staticStyle: {
                                        "font-size": "15px",
                                        "margin-top": "-5px"
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                " +
                                          _vm._s(ticket.id) +
                                          "\n                            "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _vm._m(12, true),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "ticket-desc barlow regular",
                                      staticStyle: {
                                        "font-size": "15px",
                                        "margin-top": "-5px"
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                " +
                                          _vm._s(
                                            ticket.site
                                              ? ticket.site.nem_site
                                              : ""
                                          ) +
                                          " " +
                                          _vm._s(
                                            ticket.site
                                              ? ticket.site.nombre
                                              : ""
                                          ) +
                                          "\n                            "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _vm._m(13, true),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "ticket-desc barlow regular",
                                      staticStyle: {
                                        "font-size": "15px",
                                        "margin-top": "-5px"
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                " +
                                          _vm._s(
                                            ticket.tipo_motivo
                                              ? ticket.tipo_motivo.descripcion
                                              : ""
                                          ) +
                                          " " +
                                          _vm._s(
                                            ticket.trimestre == 1
                                              ? "Primera mantención"
                                              : ticket.trimestre == 2
                                              ? "Segunda mantención"
                                              : ticket.trimestre == 3
                                              ? "Tercera mantención"
                                              : ticket.trimestre == 4
                                              ? "Cuarta mantención"
                                              : ticket.trimestre == 5
                                              ? "Quinta mantención"
                                              : ""
                                          ) +
                                          "\n                            "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _vm._m(14, true),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "ticket-desc barlow regular",
                                      staticStyle: {
                                        "font-size": "15px",
                                        "margin-top": "-5px"
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                " +
                                          _vm._s(
                                            ticket.estado
                                              ? ticket.estado.descripcion
                                              : ""
                                          ) +
                                          "\n                            "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _vm._m(15, true),
                                  _vm._v(" "),
                                  ticket.estado_id == 1
                                    ? _c("div", [
                                        _vm.rol_id == 1 ||
                                        _vm.rol_id == 16 ||
                                        _vm.rol_id == 12 ||
                                        _vm.rol_id == 5
                                          ? _c(
                                              "button",
                                              {
                                                staticClass: "btn btn-success",
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.Aprobartck(
                                                      ticket
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass: "fa fa-check"
                                                })
                                              ]
                                            )
                                          : _vm._e(),
                                        _vm._v(" "),
                                        _vm.rol_id == 1 ||
                                        _vm.rol_id == 16 ||
                                        _vm.rol_id == 12 ||
                                        _vm.rol_id == 5
                                          ? _c(
                                              "button",
                                              {
                                                staticClass:
                                                  "btn btn-secondary",
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.retroceso(
                                                      ticket,
                                                      _vm.modulo
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass: "fas fa-cog"
                                                })
                                              ]
                                            )
                                          : _vm._e()
                                      ])
                                    : _vm._e(),
                                  _vm._v(" "),
                                  ticket.estado_id == 2
                                    ? _c("div", [
                                        (ticket.mantencion_data == 1 &&
                                          _vm.rol_id == 1) ||
                                        (ticket.mantencion_data == 1 &&
                                          _vm.rol_id == 16) ||
                                        (ticket.mantencion_data == 1 &&
                                          _vm.rol_id == 12) ||
                                        (ticket.mantencion_data == 1 &&
                                          _vm.rol_id == 5)
                                          ? _c(
                                              "button",
                                              {
                                                staticClass: "btn btn-success",
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.Aprobartck2(
                                                      ticket,
                                                      _vm.modulo
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass: "fa fa-check"
                                                })
                                              ]
                                            )
                                          : _vm._e(),
                                        _vm._v(" "),
                                        (ticket.tipo_mantencion_id == null &&
                                          _vm.rol_id == 1) ||
                                        (ticket.tipo_mantencion_id == null &&
                                          _vm.rol_id == 16) ||
                                        (ticket.tipo_mantencion_id == null &&
                                          _vm.rol_id == 12) ||
                                        (ticket.tipo_mantencion_id == null &&
                                          _vm.rol_id == 5)
                                          ? _c(
                                              "button",
                                              {
                                                staticClass: "btn btn-success",
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.Aprobartck2(
                                                      ticket,
                                                      _vm.modulo
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass: "fa fa-check"
                                                })
                                              ]
                                            )
                                          : _vm._e(),
                                        _vm._v(" "),
                                        _vm.rol_id == 1 ||
                                        _vm.rol_id == 16 ||
                                        _vm.rol_id == 8
                                          ? _c(
                                              "button",
                                              {
                                                staticClass:
                                                  "btn btn-secondary",
                                                style:
                                                  _vm.config == 2
                                                    ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);"
                                                    : "",
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.retroceso(
                                                      ticket,
                                                      _vm.modulo
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass: "fas fa-cog"
                                                })
                                              ]
                                            )
                                          : _vm._e()
                                      ])
                                    : _vm._e(),
                                  _vm._v(" "),
                                  ticket.estado_id == 3
                                    ? _c("div", [
                                        _vm.rol_id == 1 || _vm.rol_id == 16
                                          ? _c(
                                              "button",
                                              {
                                                staticClass: "btn btn-success",
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.Aprobartck2(
                                                      ticket,
                                                      _vm.modulo
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass: "fa fa-check"
                                                })
                                              ]
                                            )
                                          : _vm._e(),
                                        _vm._v(" "),
                                        _vm.rol_id == 1 ||
                                        _vm.rol_id == 16 ||
                                        _vm.rol_id == 8
                                          ? _c(
                                              "button",
                                              {
                                                staticClass:
                                                  "btn btn-secondary",
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.retroceso(
                                                      ticket,
                                                      _vm.modulo
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass: "fas fa-cog"
                                                })
                                              ]
                                            )
                                          : _vm._e()
                                      ])
                                    : _vm._e(),
                                  _vm._v(" "),
                                  ticket.estado_id == 4
                                    ? _c("div", [
                                        _vm.rol_id == 1 ||
                                        _vm.rol_id == 16 ||
                                        _vm.rol_id == 8
                                          ? _c(
                                              "button",
                                              {
                                                staticClass:
                                                  "btn btn-secondary",
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.retroceso(
                                                      ticket,
                                                      _vm.modulo
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass: "fas fa-cog"
                                                })
                                              ]
                                            )
                                          : _vm._e()
                                      ])
                                    : _vm._e(),
                                  _vm._v(" "),
                                  (ticket.estado_id == 8 && _vm.rol_id == 12) ||
                                  (ticket.estado_id == 8 && _vm.rol_id == 1)
                                    ? _c(
                                        "button",
                                        {
                                          staticClass: "btn btn-success",
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                              return _vm.Aprobartck3(ticket)
                                            }
                                          }
                                        },
                                        [
                                          _c("i", {
                                            staticClass: "fas fa-check"
                                          })
                                        ]
                                      )
                                    : _vm._e()
                                ]
                              )
                            ]
                          )
                        ])
                      ]
                    )
                  ]
                )
              }),
              _vm._v(" "),
              _c(
                "nav",
                {
                  staticClass: "pagination",
                  attrs: { "aria-label": "pagination", role: "navigation" }
                },
                [
                  _c("vue-pagination", {
                    attrs: { offset: 4, pagination: _vm.tickets },
                    on: {
                      paginate: function($event) {
                        return _vm.SearchTicket(_vm.modulo)
                      }
                    }
                  })
                ],
                1
              )
            ],
            2
          )
        : _vm._e(),
      _vm._v(" "),
      _vm.screen_width > 1024
        ? _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-lg-12 " }, [
              _c("div", { staticClass: "ibox float-e-margins" }, [
                _c(
                  "div",
                  {
                    staticClass: "card shadow-box-ag",
                    style: _vm.config == 2 ? "background-color: #35363a; " : ""
                  },
                  [
                    _c("div", { staticClass: "card-header" }, [
                      _c("div", { staticClass: "col-lg-11" }, [
                        _vm.selectmotivo != 9 && _vm.selectmotivo != 10
                          ? _c(
                              "h4",
                              {
                                staticClass: "barlow semi_bold",
                                staticStyle: { color: "#666" }
                              },
                              [
                                _vm._v(
                                  "\n                                " +
                                    _vm._s(_vm.nombre) +
                                    " " +
                                    _vm._s(_vm.NombreCrm) +
                                    "\n                            "
                                )
                              ]
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        _vm.selectmotivo == 9 || _vm.selectmotivo == 10
                          ? _c(
                              "h4",
                              {
                                staticClass: "barlow semi_bold",
                                staticStyle: { color: "#666" }
                              },
                              [
                                _vm._v(
                                  "\n                                TICKETS\n                            "
                                )
                              ]
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        _vm.selectmotivo != 11
                          ? _c("div", { staticClass: "dropdown d-inline" }, [
                              _c(
                                "a",
                                {
                                  staticClass:
                                    "font-weight-600 dropdown-toggle barlow regular",
                                  attrs: {
                                    "data-toggle": "dropdown",
                                    href: "#",
                                    id: "orders-month"
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                    Opciones\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "ul",
                                {
                                  staticClass: "dropdown-menu dropdown-menu-sm"
                                },
                                [
                                  _c(
                                    "li",
                                    {
                                      staticClass:
                                        "dropdown-title barlow semi_bold"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        Selecione una opcion\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("li", [
                                    _c(
                                      "a",
                                      {
                                        staticClass:
                                          "dropdown-item barlow regular",
                                        attrs: {
                                          href:
                                            "/TkcfilterExcel?codigo=" +
                                            this.codigo +
                                            "&modulo=" +
                                            this.modulo +
                                            "&area=" +
                                            this.area +
                                            "&sitio=" +
                                            this.sitio +
                                            "&categoria=" +
                                            this.categoria +
                                            "&motivo=" +
                                            this.motivo +
                                            "&fecha1=" +
                                            this.fecha1 +
                                            "&fecha2=" +
                                            this.fecha2 +
                                            "&descripcion=" +
                                            this.searchDescripcion +
                                            "&crm=" +
                                            this.crmId +
                                            "&user=" +
                                            this.user +
                                            "&crmSelect=" +
                                            this.crm +
                                            "&zona=" +
                                            this.zona +
                                            "&motivoSelectIng=" +
                                            this.selectmotivo
                                        }
                                      },
                                      [
                                        _c("i", {
                                          staticClass: "fas fa-download"
                                        }),
                                        _vm._v(
                                          "\n                                            Descargar  Reporte\n                                        "
                                        )
                                      ]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("li", [
                                    _c(
                                      "a",
                                      {
                                        staticClass:
                                          "dropdown-item barlow regular",
                                        attrs: { href: "#" },
                                        on: {
                                          click: function($event) {
                                            $event.preventDefault()
                                            return _vm.listLast($event)
                                          }
                                        }
                                      },
                                      [
                                        _c("i", { staticClass: "fas fa-list" }),
                                        _vm._v(
                                          "\n                                            Últimos tickets creados\n                                        "
                                        )
                                      ]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _vm._m(16),
                                  _vm._v(" "),
                                  _vm.rol_id == 1
                                    ? _c("li", [_vm._m(17)])
                                    : _vm._e()
                                ]
                              )
                            ])
                          : _vm._e()
                      ]),
                      _vm._v(" "),
                      _vm.modulo == 1
                        ? _c("div", { staticClass: "col-lg-1" }, [
                            _c(
                              "button",
                              {
                                staticClass:
                                  "btn btn-info boxBounce barlow semi_bold",
                                staticStyle: {
                                  "border-radius": "5px",
                                  "font-size": "15px"
                                },
                                style:
                                  _vm.config == 2
                                    ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1); "
                                    : "",
                                on: {
                                  click: function($event) {
                                    $event.preventDefault()
                                    return _vm.ModalCrear($event)
                                  }
                                }
                              },
                              [
                                _vm._v(
                                  "\n                                Crear Ticket\n                            "
                                )
                              ]
                            )
                          ])
                        : _vm._e()
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "ibox" }, [
                      _c(
                        "div",
                        {
                          staticClass:
                            " table-responsive project-list project-table"
                        },
                        [
                          _c(
                            "table",
                            { staticClass: "table table-hover table-striped " },
                            [
                              _c("thead", [
                                _c("tr", [
                                  _c(
                                    "th",
                                    {
                                      staticClass: " barlow bold",
                                      style:
                                        _vm.config == 2 ? "color: white; " : ""
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            #\n                                        "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "th",
                                    {
                                      staticClass: " barlow bold",
                                      style:
                                        _vm.config == 2 ? "color: white; " : ""
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Área\n                                        "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "th",
                                    {
                                      staticClass: " barlow bold",
                                      style:
                                        _vm.config == 2 ? "color: white; " : ""
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Sitio\n                                        "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "th",
                                    {
                                      style:
                                        _vm.config == 2 ? "color: white; " : ""
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Crm\n                                        "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "th",
                                    {
                                      staticClass: " barlow bold",
                                      style:
                                        _vm.config == 2 ? "color: white; " : ""
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Categoría\n                                        "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "th",
                                    {
                                      staticClass: " barlow bold",
                                      style:
                                        _vm.config == 2 ? "color: white; " : ""
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Motivo\n                                        "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "th",
                                    {
                                      staticClass: " barlow bold",
                                      style:
                                        _vm.config == 2 ? "color: white; " : ""
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Fecha Inicio\n                                        "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "th",
                                    {
                                      staticClass: " barlow bold",
                                      style:
                                        _vm.config == 2 ? "color: white; " : ""
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Fecha Termino\n                                        "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "th",
                                    {
                                      staticClass: " barlow bold",
                                      style:
                                        _vm.config == 2 ? "color: white; " : ""
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Descripción\n                                        "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "th",
                                    {
                                      staticClass: "centrado barlow bold",
                                      style:
                                        _vm.config == 2 ? "color: white; " : ""
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Estado / SLA\n                                        "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "th",
                                    {
                                      staticClass: "barlow bold",
                                      style:
                                        _vm.config == 2 ? "color: white; " : ""
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Opciones\n                                        "
                                      )
                                    ]
                                  )
                                ])
                              ]),
                              _vm._v(" "),
                              _c(
                                "tbody",
                                [
                                  _c("th", [
                                    _c("input", {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.codigo,
                                          expression: "codigo"
                                        }
                                      ],
                                      staticClass: "form-control",
                                      staticStyle: { width: "80px" },
                                      style:
                                        _vm.config == 2
                                          ? "background-color: #85888b;border:1px solid #85888b;color:white; "
                                          : "",
                                      attrs: {
                                        name: "codigo",
                                        placeholder: "",
                                        type: ""
                                      },
                                      domProps: { value: _vm.codigo },
                                      on: {
                                        keyup: function($event) {
                                          return _vm.SearchTicket(_vm.modulo)
                                        },
                                        input: function($event) {
                                          if ($event.target.composing) {
                                            return
                                          }
                                          _vm.codigo = $event.target.value
                                        }
                                      }
                                    })
                                  ]),
                                  _vm._v(" "),
                                  _c("th", [
                                    _c(
                                      "div",
                                      { attrs: { id: "divSelecArea" } },
                                      [
                                        _c(
                                          "select",
                                          {
                                            directives: [
                                              {
                                                name: "model",
                                                rawName: "v-model",
                                                value: _vm.area,
                                                expression: "area"
                                              }
                                            ],
                                            staticClass: "form-control select",
                                            staticStyle: { width: "80px" },
                                            style:
                                              _vm.config == 2
                                                ? "background-color: #85888b;border:1px solid #85888b;color:white; "
                                                : "",
                                            attrs: { name: "area" },
                                            on: {
                                              change: [
                                                function($event) {
                                                  var $$selectedVal = Array.prototype.filter
                                                    .call(
                                                      $event.target.options,
                                                      function(o) {
                                                        return o.selected
                                                      }
                                                    )
                                                    .map(function(o) {
                                                      var val =
                                                        "_value" in o
                                                          ? o._value
                                                          : o.value
                                                      return val
                                                    })
                                                  _vm.area = $event.target
                                                    .multiple
                                                    ? $$selectedVal
                                                    : $$selectedVal[0]
                                                },
                                                function($event) {
                                                  return _vm.BoxSearch(
                                                    _vm.modulo
                                                  )
                                                }
                                              ]
                                            }
                                          },
                                          [
                                            _c(
                                              "option",
                                              { domProps: { value: 1 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    Energia\n                                                "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "option",
                                              { domProps: { value: 2 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    Clima\n                                                "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "option",
                                              { domProps: { value: 3 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    Obras Civiles\n                                                "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "option",
                                              { domProps: { value: 4 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    Medio Ambiente\n                                                "
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticStyle: { display: "none" },
                                        attrs: { id: "selectedAreaDivInfo" }
                                      },
                                      [
                                        _c(
                                          "span",
                                          {
                                            staticClass: "badge ",
                                            staticStyle: {
                                              "background-color": "#015dff",
                                              color: "white",
                                              "border-radius": "3px"
                                            }
                                          },
                                          [
                                            _vm._v(
                                              "\n                                                " +
                                                _vm._s(_vm.SelectAreaName) +
                                                "\n                                                "
                                            ),
                                            _c(
                                              "a",
                                              {
                                                staticStyle: { color: "white" },
                                                attrs: { href: "" },
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.clearArea($event)
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass:
                                                    "fas fa-times-circle"
                                                })
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("th", [
                                    _c("input", {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.datositio,
                                          expression: "datositio"
                                        }
                                      ],
                                      staticClass: "form-control",
                                      attrs: {
                                        id: "inputSitioSearchPop",
                                        name: "datositio",
                                        placeholder: "Buscar Sitio",
                                        type: "text",
                                        value: ""
                                      },
                                      domProps: { value: _vm.datositio },
                                      on: {
                                        keyup: _vm.BuscarSitioTab,
                                        input: function($event) {
                                          if ($event.target.composing) {
                                            return
                                          }
                                          _vm.datositio = $event.target.value
                                        }
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticClass: "row",
                                        staticStyle: { display: "none" },
                                        attrs: { id: "listPopsTab" }
                                      },
                                      [
                                        _c(
                                          "div",
                                          {
                                            staticClass:
                                              "col-lg-12 col-md-4 col-sm-4 col-10 shadow-box-ag full-height-scroll ",
                                            staticStyle: {
                                              "max-height": "120px",
                                              "overflow-y": "auto"
                                            }
                                          },
                                          _vm._l(_vm.pops, function(pop) {
                                            return _c("div", [
                                              _c(
                                                "a",
                                                {
                                                  staticStyle: {
                                                    color: "black"
                                                  },
                                                  attrs: {
                                                    href: "",
                                                    id: "selectpopvalue"
                                                  },
                                                  on: {
                                                    click: function($event) {
                                                      $event.preventDefault()
                                                      return _vm.selectdpopSearch(
                                                        pop
                                                      )
                                                    }
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    "\n                                                            " +
                                                      _vm._s(pop.nem_site) +
                                                      " " +
                                                      _vm._s(pop.nombre) +
                                                      "\n                                                            "
                                                  ),
                                                  _c("hr", {
                                                    staticStyle: {
                                                      "margin-top": "-1px"
                                                    }
                                                  })
                                                ]
                                              )
                                            ])
                                          }),
                                          0
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticStyle: { display: "none" },
                                        attrs: { id: "selectedSitio" }
                                      },
                                      [
                                        _c(
                                          "span",
                                          {
                                            staticClass: "badge ",
                                            staticStyle: {
                                              "background-color": "#015dff",
                                              color: "white",
                                              "border-radius": "3px"
                                            }
                                          },
                                          [
                                            _vm._v(
                                              "\n                                                " +
                                                _vm._s(_vm.datapopSelec) +
                                                "\n                                                "
                                            ),
                                            _c(
                                              "a",
                                              {
                                                staticStyle: { color: "white" },
                                                attrs: { href: "" },
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.Clearsitio(
                                                      $event
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass:
                                                    "fas fa-times-circle"
                                                })
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("th", [
                                    _c("div", { attrs: { id: "crmSelect" } }, [
                                      _c(
                                        "select",
                                        {
                                          directives: [
                                            {
                                              name: "model",
                                              rawName: "v-model",
                                              value: _vm.crmId,
                                              expression: "crmId"
                                            }
                                          ],
                                          staticClass: "form-control select",
                                          staticStyle: { width: "80px" },
                                          style:
                                            _vm.config == 2
                                              ? "background-color: #85888b;border:1px solid #85888b;color:white; "
                                              : "",
                                          on: {
                                            change: [
                                              function($event) {
                                                var $$selectedVal = Array.prototype.filter
                                                  .call(
                                                    $event.target.options,
                                                    function(o) {
                                                      return o.selected
                                                    }
                                                  )
                                                  .map(function(o) {
                                                    var val =
                                                      "_value" in o
                                                        ? o._value
                                                        : o.value
                                                    return val
                                                  })
                                                _vm.crmId = $event.target
                                                  .multiple
                                                  ? $$selectedVal
                                                  : $$selectedVal[0]
                                              },
                                              function($event) {
                                                return _vm.BoxSearch(_vm.modulo)
                                              }
                                            ]
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            { domProps: { value: 1 } },
                                            [
                                              _vm._v(
                                                "\n                                                    Norte\n                                                "
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { domProps: { value: 2 } },
                                            [
                                              _vm._v(
                                                "\n                                                    Centro Norte\n                                                "
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { domProps: { value: 3 } },
                                            [
                                              _vm._v(
                                                "\n                                                    Metropolitano\n                                                "
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { domProps: { value: 4 } },
                                            [
                                              _vm._v(
                                                "\n                                                    Centro Sur\n                                                "
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { domProps: { value: 5 } },
                                            [
                                              _vm._v(
                                                "\n                                                    Sur\n                                                "
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { domProps: { value: 6 } },
                                            [
                                              _vm._v(
                                                "\n                                                    Austral\n                                                "
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticStyle: { display: "none" },
                                        attrs: { id: "selectedCrm" }
                                      },
                                      [
                                        _c(
                                          "span",
                                          {
                                            staticClass: "badge ",
                                            staticStyle: {
                                              "background-color": "#015dff",
                                              color: "white",
                                              "font-size": "10px",
                                              "margin-left": "-25px",
                                              "border-radius": "3px"
                                            }
                                          },
                                          [
                                            _vm._v(
                                              "\n                                                " +
                                                _vm._s(_vm.crmName) +
                                                "\n                                                "
                                            ),
                                            _c(
                                              "a",
                                              {
                                                staticStyle: { color: "white" },
                                                attrs: { href: "" },
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.clearCrm($event)
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass:
                                                    "fas fa-times-circle"
                                                })
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("th", [
                                    _c(
                                      "div",
                                      { attrs: { id: "selectCategoria" } },
                                      [
                                        _c(
                                          "select",
                                          {
                                            directives: [
                                              {
                                                name: "model",
                                                rawName: "v-model",
                                                value: _vm.categoria,
                                                expression: "categoria"
                                              }
                                            ],
                                            staticClass: "form-control select",
                                            staticStyle: { width: "50px" },
                                            style:
                                              _vm.config == 2
                                                ? "background-color: #85888b;border:1px solid #85888b;color:white; "
                                                : "",
                                            attrs: { name: "categoria" },
                                            on: {
                                              change: [
                                                function($event) {
                                                  var $$selectedVal = Array.prototype.filter
                                                    .call(
                                                      $event.target.options,
                                                      function(o) {
                                                        return o.selected
                                                      }
                                                    )
                                                    .map(function(o) {
                                                      var val =
                                                        "_value" in o
                                                          ? o._value
                                                          : o.value
                                                      return val
                                                    })
                                                  _vm.categoria = $event.target
                                                    .multiple
                                                    ? $$selectedVal
                                                    : $$selectedVal[0]
                                                },
                                                function($event) {
                                                  return _vm.BoxSearch(
                                                    _vm.modulo
                                                  )
                                                }
                                              ]
                                            }
                                          },
                                          [
                                            _c(
                                              "option",
                                              { domProps: { value: 1 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    A\n                                                "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "option",
                                              { domProps: { value: 2 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    B\n                                                "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "option",
                                              { domProps: { value: 3 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    C\n                                                "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "option",
                                              { domProps: { value: 4 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    D\n                                                "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "option",
                                              { domProps: { value: 5 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    E\n                                                "
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticStyle: { display: "none" },
                                        attrs: { id: "selectedCateInfo" }
                                      },
                                      [
                                        _c(
                                          "span",
                                          {
                                            staticClass: "badge ",
                                            staticStyle: {
                                              "background-color": "#015dff",
                                              color: "white",
                                              "border-radius": "3px"
                                            }
                                          },
                                          [
                                            _vm._v(
                                              "\n                                                " +
                                                _vm._s(
                                                  _vm.SelectCategoryLeter
                                                ) +
                                                "\n                                                "
                                            ),
                                            _c(
                                              "a",
                                              {
                                                staticStyle: { color: "white" },
                                                attrs: { href: "" },
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.ClearCate($event)
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass:
                                                    "fas fa-times-circle"
                                                })
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("th", [
                                    _c(
                                      "div",
                                      { attrs: { id: "selectMotivo" } },
                                      [
                                        _c(
                                          "select",
                                          {
                                            directives: [
                                              {
                                                name: "model",
                                                rawName: "v-model",
                                                value: _vm.motivo,
                                                expression: "motivo"
                                              }
                                            ],
                                            staticClass: "form-control select",
                                            staticStyle: { width: "60px" },
                                            style:
                                              _vm.config == 2
                                                ? "background-color: #85888b;border:1px solid #85888b;color:white; "
                                                : "",
                                            attrs: { name: "motivo" },
                                            on: {
                                              change: [
                                                function($event) {
                                                  var $$selectedVal = Array.prototype.filter
                                                    .call(
                                                      $event.target.options,
                                                      function(o) {
                                                        return o.selected
                                                      }
                                                    )
                                                    .map(function(o) {
                                                      var val =
                                                        "_value" in o
                                                          ? o._value
                                                          : o.value
                                                      return val
                                                    })
                                                  _vm.motivo = $event.target
                                                    .multiple
                                                    ? $$selectedVal
                                                    : $$selectedVal[0]
                                                },
                                                function($event) {
                                                  return _vm.BoxSearch(
                                                    _vm.modulo
                                                  )
                                                }
                                              ]
                                            }
                                          },
                                          [
                                            _c(
                                              "option",
                                              { domProps: { value: 1 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    Vandalismo menor\n                                                "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "option",
                                              { domProps: { value: 7 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    Vandalismo mayor\n                                                "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "option",
                                              { domProps: { value: 2 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    Falla Mayor\n                                                "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "option",
                                              { domProps: { value: 6 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    Falla menor\n                                                "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "option",
                                              { domProps: { value: 3 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    Mantenimiento\n                                                "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "option",
                                              { domProps: { value: 4 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    Solicitud Stock\n                                                "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "option",
                                              { domProps: { value: 5 } },
                                              [
                                                _vm._v(
                                                  "\n                                                    Solicitud de mejora\n                                                "
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticStyle: { display: "none" },
                                        attrs: { id: "selectedMotivoInfo" }
                                      },
                                      [
                                        _c(
                                          "span",
                                          {
                                            staticClass: "badge ",
                                            staticStyle: {
                                              "background-color": "#015dff",
                                              color: "white",
                                              "border-radius": "3px"
                                            }
                                          },
                                          [
                                            _vm._v(
                                              "\n                                                " +
                                                _vm._s(_vm.SelectMotivo) +
                                                "\n                                                "
                                            ),
                                            _c(
                                              "a",
                                              {
                                                staticStyle: { color: "white" },
                                                attrs: { href: "" },
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.ClearMotivo(
                                                      $event
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass:
                                                    "fas fa-times-circle"
                                                })
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("th", [
                                    _c(
                                      "div",
                                      { attrs: { id: "InputFecha1" } },
                                      [
                                        _c("input", {
                                          directives: [
                                            {
                                              name: "model",
                                              rawName: "v-model",
                                              value: _vm.fecha1,
                                              expression: "fecha1"
                                            }
                                          ],
                                          staticClass: "form-control",
                                          staticStyle: { width: "80px" },
                                          style:
                                            _vm.config == 2
                                              ? "background-color: #85888b;border:1px solid #85888b;color:white; "
                                              : "",
                                          attrs: {
                                            name: "fecha1",
                                            type: "date"
                                          },
                                          domProps: { value: _vm.fecha1 },
                                          on: {
                                            change: function($event) {
                                              return _vm.BoxSearch(_vm.modulo)
                                            },
                                            input: function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.fecha1 = $event.target.value
                                            }
                                          }
                                        })
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticStyle: { display: "none" },
                                        attrs: { id: "selectedFecha1" }
                                      },
                                      [
                                        _c(
                                          "span",
                                          {
                                            staticClass: "badge ",
                                            staticStyle: {
                                              "background-color": "#015dff",
                                              color: "white",
                                              "border-radius": "3px"
                                            }
                                          },
                                          [
                                            _vm._v(
                                              "\n                                                " +
                                                _vm._s(
                                                  _vm.formato(_vm.fecha1)
                                                ) +
                                                "\n                                                "
                                            ),
                                            _c(
                                              "a",
                                              {
                                                staticStyle: { color: "white" },
                                                attrs: { href: "" },
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.ClearFecha1(
                                                      $event
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass:
                                                    "fas fa-times-circle"
                                                })
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("th", [
                                    _c(
                                      "div",
                                      { attrs: { id: "InputFecha2" } },
                                      [
                                        _c("input", {
                                          directives: [
                                            {
                                              name: "model",
                                              rawName: "v-model",
                                              value: _vm.fecha2,
                                              expression: "fecha2"
                                            }
                                          ],
                                          staticClass: "form-control",
                                          staticStyle: { width: "80px" },
                                          style:
                                            _vm.config == 2
                                              ? "background-color: #85888b;border:1px solid #85888b;color:white; "
                                              : "",
                                          attrs: {
                                            name: "fecha2",
                                            type: "date"
                                          },
                                          domProps: { value: _vm.fecha2 },
                                          on: {
                                            change: function($event) {
                                              return _vm.BoxSearch(_vm.modulo)
                                            },
                                            input: function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.fecha2 = $event.target.value
                                            }
                                          }
                                        })
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticStyle: { display: "none" },
                                        attrs: { id: "selectedFecha2" }
                                      },
                                      [
                                        _c(
                                          "span",
                                          {
                                            staticClass: "badge ",
                                            staticStyle: {
                                              "background-color": "#015dff",
                                              color: "white",
                                              "border-radius": "3px"
                                            }
                                          },
                                          [
                                            _vm._v(
                                              "\n                                                " +
                                                _vm._s(
                                                  _vm.formato(_vm.fecha2)
                                                ) +
                                                "\n                                                "
                                            ),
                                            _c(
                                              "a",
                                              {
                                                staticStyle: { color: "white" },
                                                attrs: { href: "" },
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.ClearFecha2(
                                                      $event
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass:
                                                    "fas fa-times-circle"
                                                })
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("th", [
                                    _c("input", {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.searchDescripcion,
                                          expression: "searchDescripcion"
                                        }
                                      ],
                                      staticClass: "form-control",
                                      staticStyle: { width: "150px" },
                                      style:
                                        _vm.config == 2
                                          ? "background-color: #85888b;border:1px solid #85888b;color:white; "
                                          : "",
                                      attrs: {
                                        name: "descripcion",
                                        type: "text"
                                      },
                                      domProps: {
                                        value: _vm.searchDescripcion
                                      },
                                      on: {
                                        keyup: function($event) {
                                          return _vm.SearchTicket(_vm.modulo)
                                        },
                                        input: function($event) {
                                          if ($event.target.composing) {
                                            return
                                          }
                                          _vm.searchDescripcion =
                                            $event.target.value
                                        }
                                      }
                                    })
                                  ]),
                                  _vm._v(" "),
                                  _c("th", [
                                    _c(
                                      "div",
                                      { attrs: { id: "selectEstado" } },
                                      [
                                        _vm.selectmotivo == 9
                                          ? _c(
                                              "select",
                                              {
                                                directives: [
                                                  {
                                                    name: "model",
                                                    rawName: "v-model",
                                                    value: _vm.estadoValue,
                                                    expression: "estadoValue"
                                                  }
                                                ],
                                                staticClass:
                                                  "form-control select",
                                                on: {
                                                  change: [
                                                    function($event) {
                                                      var $$selectedVal = Array.prototype.filter
                                                        .call(
                                                          $event.target.options,
                                                          function(o) {
                                                            return o.selected
                                                          }
                                                        )
                                                        .map(function(o) {
                                                          var val =
                                                            "_value" in o
                                                              ? o._value
                                                              : o.value
                                                          return val
                                                        })
                                                      _vm.estadoValue = $event
                                                        .target.multiple
                                                        ? $$selectedVal
                                                        : $$selectedVal[0]
                                                    },
                                                    function($event) {
                                                      return _vm.SearchTicket(
                                                        _vm.modulo
                                                      )
                                                    }
                                                  ]
                                                }
                                              },
                                              [
                                                _c(
                                                  "option",
                                                  { domProps: { value: 8 } },
                                                  [
                                                    _vm._v(
                                                      "\n                                                    Aprobación ing oym\n                                                "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "option",
                                                  { domProps: { value: 1 } },
                                                  [
                                                    _vm._v(
                                                      "\n                                                    En espera\n                                                "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "option",
                                                  { domProps: { value: 2 } },
                                                  [
                                                    _vm._v(
                                                      "\n                                                    En curso\n                                                "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "option",
                                                  { domProps: { value: 3 } },
                                                  [
                                                    _vm._v(
                                                      "\n                                                    Validación\n                                                "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "option",
                                                  { domProps: { value: 4 } },
                                                  [
                                                    _vm._v(
                                                      "\n                                                    Finalizada\n                                                "
                                                    )
                                                  ]
                                                )
                                              ]
                                            )
                                          : _vm._e()
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticStyle: { display: "none" },
                                        attrs: { id: "selectedEstadoInfo" }
                                      },
                                      [
                                        _c(
                                          "span",
                                          {
                                            staticClass: "badge ",
                                            staticStyle: {
                                              "background-color": "#015dff",
                                              color: "white",
                                              "border-radius": "3px"
                                            }
                                          },
                                          [
                                            _vm._v(
                                              "\n                                                " +
                                                _vm._s(_vm.SelectEstado) +
                                                "\n                                                "
                                            ),
                                            _c(
                                              "a",
                                              {
                                                staticStyle: { color: "white" },
                                                attrs: { href: "" },
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.ClearEestado(
                                                      $event
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass:
                                                    "fas fa-times-circle"
                                                })
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("th", [
                                    _c(
                                      "button",
                                      {
                                        staticClass: "btn btn-info",
                                        style:
                                          _vm.config == 2
                                            ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);"
                                            : "",
                                        on: {
                                          click: function($event) {
                                            $event.preventDefault()
                                            return _vm.CleanData(_vm.modulo)
                                          }
                                        }
                                      },
                                      [
                                        _c("i", {
                                          staticClass: "fas fa-undo-alt"
                                        })
                                      ]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _vm._l(_vm.tickets.data, function(ticket) {
                                    return _c(
                                      "tr",
                                      {
                                        staticClass: "animated fadeIn",
                                        staticStyle: { height: "150px" }
                                      },
                                      [
                                        _c(
                                          "td",
                                          {},
                                          [
                                            _c("router-link", {
                                              attrs: {
                                                to: {
                                                  path:
                                                    "/showTicket/" + ticket.id,
                                                  params: { id: ticket.id }
                                                }
                                              },
                                              scopedSlots: _vm._u(
                                                [
                                                  {
                                                    key: "default",
                                                    fn: function(ref) {
                                                      var href = ref.href
                                                      var route = ref.route
                                                      var navigate =
                                                        ref.navigate
                                                      var isActive =
                                                        ref.isActive
                                                      var isExactActive =
                                                        ref.isExactActive
                                                      return [
                                                        _c(
                                                          "a",
                                                          {
                                                            attrs: {
                                                              href: href,
                                                              target: "_blank"
                                                            }
                                                          },
                                                          [
                                                            _c(
                                                              "span",
                                                              {
                                                                staticClass:
                                                                  "badge badge-info boxBounce barlow regular",
                                                                staticStyle: {
                                                                  "font-size":
                                                                    "13.5px"
                                                                },
                                                                style:
                                                                  _vm.config ==
                                                                  2
                                                                    ? "color:white;background-color: #2d87fe "
                                                                    : ""
                                                              },
                                                              [
                                                                _vm._v(
                                                                  "\n                                                        " +
                                                                    _vm._s(
                                                                      ticket.id
                                                                    ) +
                                                                    "\n                                                    "
                                                                )
                                                              ]
                                                            )
                                                          ]
                                                        )
                                                      ]
                                                    }
                                                  }
                                                ],
                                                null,
                                                true
                                              )
                                            })
                                          ],
                                          1
                                        ),
                                        _vm._v(" "),
                                        _c("td", { staticClass: "centrado" }, [
                                          ticket.area_id != null
                                            ? _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "barlow semi_bold",
                                                  staticStyle: {
                                                    "font-size": "13.5"
                                                  }
                                                },
                                                [
                                                  ticket.area_id == 1
                                                    ? _c(
                                                        "span",
                                                        {
                                                          staticClass: "badge",
                                                          staticStyle: {
                                                            "background-color":
                                                              "#005cff",
                                                            color: "white"
                                                          }
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                    " +
                                                              _vm._s(
                                                                ticket.area
                                                                  .descripcion
                                                              ) +
                                                              "\n                                                "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e(),
                                                  _vm._v(" "),
                                                  ticket.area_id == 2
                                                    ? _c(
                                                        "span",
                                                        {
                                                          staticClass:
                                                            "badge badge-info"
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                    " +
                                                              _vm._s(
                                                                ticket.area
                                                                  .descripcion
                                                              ) +
                                                              "\n                                                "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e(),
                                                  _vm._v(" "),
                                                  ticket.area_id == 3
                                                    ? _c(
                                                        "span",
                                                        {
                                                          staticClass:
                                                            "badge badge-warning"
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                    " +
                                                              _vm._s(
                                                                ticket.area
                                                                  .descripcion
                                                              ) +
                                                              "\n                                                "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e(),
                                                  _vm._v(" "),
                                                  ticket.area_id == 4
                                                    ? _c(
                                                        "span",
                                                        {
                                                          staticClass:
                                                            "badge badge-success"
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                    " +
                                                              _vm._s(
                                                                ticket.area
                                                                  .descripcion
                                                              ) +
                                                              "\n                                                "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e()
                                                ]
                                              )
                                            : _vm._e()
                                        ]),
                                        _vm._v(" "),
                                        _c(
                                          "td",
                                          {
                                            staticStyle: {
                                              "font-size": "13.5px"
                                            }
                                          },
                                          [
                                            ticket.site
                                              ? _c("div", [
                                                  _c(
                                                    "div",
                                                    {
                                                      staticClass:
                                                        "barlow semi_bold"
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                                    " +
                                                          _vm._s(
                                                            ticket.site
                                                              ? ticket.site
                                                                  .nem_site
                                                              : ""
                                                          ) +
                                                          "\n                                                "
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "div",
                                                    {
                                                      staticClass:
                                                        "barlow semi_bold"
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                                    " +
                                                          _vm._s(
                                                            ticket.site
                                                              ? ticket.site
                                                                  .nombre
                                                              : ""
                                                          ) +
                                                          "\n                                                "
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  ticket.site.site_type_id == 1
                                                    ? _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "barlow regular"
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "badge",
                                                              staticStyle: {
                                                                "background-color":
                                                                  "#42e8b4",
                                                                color: "white"
                                                              },
                                                              style:
                                                                _vm.config == 2
                                                                  ? "color:white;background-color: #16af7f "
                                                                  : ""
                                                            },
                                                            [
                                                              _vm._v(
                                                                "\n                                                        FIJO\n                                                    "
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e(),
                                                  _vm._v(" "),
                                                  ticket.site.site_type_id == 2
                                                    ? _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "barlow regular"
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "badge",
                                                              staticStyle: {
                                                                "background-color":
                                                                  "#005cff",
                                                                color: "white",
                                                                "font-size": ""
                                                              }
                                                            },
                                                            [
                                                              _vm._v(
                                                                "\n                                                        MOVIL\n                                                    "
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e(),
                                                  _vm._v(" "),
                                                  ticket.site.site_type_id == 3
                                                    ? _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "barlow regular"
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "badge",
                                                              staticStyle: {
                                                                "background-color":
                                                                  "#005cff",
                                                                color: "white",
                                                                "font-size": ""
                                                              }
                                                            },
                                                            [
                                                              _vm._v(
                                                                "\n                                                        SWITCH\n                                                    "
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e(),
                                                  _vm._v(" "),
                                                  ticket.site.site_type_id == 4
                                                    ? _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "barlow regular"
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "badge",
                                                              staticStyle: {
                                                                "background-color":
                                                                  "#005cff",
                                                                color: "white",
                                                                "font-size": ""
                                                              }
                                                            },
                                                            [
                                                              _vm._v(
                                                                "\n                                                        PHONE\n                                                    "
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e()
                                                ])
                                              : _vm._e()
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c("td", [
                                          ticket.site
                                            ? _c("div", [
                                                _c(
                                                  "p",
                                                  {
                                                    staticClass:
                                                      "barlow semi_bold",
                                                    staticStyle: {
                                                      "font-size": "13.5px"
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                                                    " +
                                                        _vm._s(
                                                          _vm._f("uppercase")(
                                                            ticket.site.pop
                                                              .comuna.zona.crm
                                                              .nombre_crm
                                                          )
                                                        ) +
                                                        "\n                                                "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "barlow regular"
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                                                    " +
                                                        _vm._s(
                                                          ticket.site.pop.comuna
                                                            .zona.cod_zona
                                                        ) +
                                                        "\n                                                "
                                                    )
                                                  ]
                                                )
                                              ])
                                            : _vm._e()
                                        ]),
                                        _vm._v(" "),
                                        _c("td", { staticClass: "centrado" }, [
                                          ticket.site
                                            ? _c("div", [
                                                ticket.site
                                                  .classification_type_id !=
                                                null
                                                  ? _c(
                                                      "div",
                                                      {
                                                        staticClass:
                                                          "barlow semi_bold",
                                                        staticStyle: {
                                                          "font-size": "13.5"
                                                        }
                                                      },
                                                      [
                                                        ticket.clasificacion_id ==
                                                        1
                                                          ? _c(
                                                              "span",
                                                              {
                                                                staticClass:
                                                                  "badge ",
                                                                staticStyle: {
                                                                  "background-color":
                                                                    "#43e8b4",
                                                                  color: "white"
                                                                },
                                                                style:
                                                                  _vm.config ==
                                                                  2
                                                                    ? "color:white;background-color: #16af7f "
                                                                    : ""
                                                              },
                                                              [
                                                                _vm._v(
                                                                  "\n                                                        A\n                                                    "
                                                                )
                                                              ]
                                                            )
                                                          : _vm._e(),
                                                        _vm._v(" "),
                                                        ticket.clasificacion_id ==
                                                        2
                                                          ? _c(
                                                              "span",
                                                              {
                                                                staticClass:
                                                                  "badge ",
                                                                staticStyle: {
                                                                  "background-color":
                                                                    "#005cff",
                                                                  color: "white"
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  "\n                                                        B\n                                                    "
                                                                )
                                                              ]
                                                            )
                                                          : _vm._e(),
                                                        _vm._v(" "),
                                                        ticket.clasificacion_id ==
                                                        3
                                                          ? _c(
                                                              "span",
                                                              {
                                                                staticClass:
                                                                  "badge badge-warning"
                                                              },
                                                              [
                                                                _vm._v(
                                                                  "\n                                                        C\n                                                    "
                                                                )
                                                              ]
                                                            )
                                                          : _vm._e(),
                                                        _vm._v(" "),
                                                        ticket.clasificacion_id ==
                                                        4
                                                          ? _c(
                                                              "span",
                                                              {
                                                                staticClass:
                                                                  "badge ",
                                                                staticStyle: {
                                                                  "background-color":
                                                                    "#6c757d",
                                                                  color: "white"
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  "\n                                                        D\n                                                    "
                                                                )
                                                              ]
                                                            )
                                                          : _vm._e(),
                                                        _vm._v(" "),
                                                        ticket.clasificacion_id ==
                                                        5
                                                          ? _c(
                                                              "span",
                                                              {
                                                                staticClass:
                                                                  "badge ",
                                                                staticStyle: {
                                                                  "background-color":
                                                                    "#6c757d",
                                                                  color: "white"
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  "\n                                                        E\n                                                    "
                                                                )
                                                              ]
                                                            )
                                                          : _vm._e()
                                                      ]
                                                    )
                                                  : _vm._e()
                                              ])
                                            : _vm._e()
                                        ]),
                                        _vm._v(" "),
                                        _c(
                                          "td",
                                          {
                                            staticClass:
                                              "centrado barlow semi_bold"
                                          },
                                          [
                                            ticket.tipo_motivo_id != null
                                              ? _c("div", [
                                                  ticket.tipo_mantencion_id == 1
                                                    ? _c(
                                                        "div",
                                                        {
                                                          style:
                                                            _vm.config == 2
                                                              ? "color:white; "
                                                              : ""
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                    " +
                                                              _vm._s(
                                                                ticket
                                                                  .tipo_motivo
                                                                  .descripcion
                                                              ) +
                                                              "  red core\n                                                "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e(),
                                                  _vm._v(" "),
                                                  ticket.tipo_motivo_id != 3
                                                    ? _c(
                                                        "div",
                                                        {
                                                          style:
                                                            _vm.config == 2
                                                              ? "color:white; "
                                                              : ""
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                    " +
                                                              _vm._s(
                                                                ticket
                                                                  .tipo_motivo
                                                                  .descripcion
                                                              ) +
                                                              "\n                                                "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e()
                                                ])
                                              : _vm._e(),
                                            _vm._v(" "),
                                            ticket.trimestre == 1
                                              ? _c("div", [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "badge badge-success",
                                                      style:
                                                        _vm.config == 2
                                                          ? "color:white; "
                                                          : ""
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                                    Primera mantención\n                                                "
                                                      )
                                                    ]
                                                  )
                                                ])
                                              : _vm._e(),
                                            _vm._v(" "),
                                            ticket.trimestre == 2
                                              ? _c("div", [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "badge badge-info",
                                                      style:
                                                        _vm.config == 2
                                                          ? "color:white; "
                                                          : ""
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                                    Segunda mantención\n                                                "
                                                      )
                                                    ]
                                                  )
                                                ])
                                              : _vm._e(),
                                            _vm._v(" "),
                                            ticket.trimestre == 3
                                              ? _c("div", [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "badge badge-warning"
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                                    Tercera mantención\n                                                "
                                                      )
                                                    ]
                                                  )
                                                ])
                                              : _vm._e(),
                                            _vm._v(" "),
                                            ticket.trimestre == 4
                                              ? _c("div", [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "badge badge-primary"
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                                    Cuarta mantención\n                                                "
                                                      )
                                                    ]
                                                  )
                                                ])
                                              : _vm._e(),
                                            _vm._v(" "),
                                            ticket.trimestre == 5
                                              ? _c("div", [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "badge badge-secondary"
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                                    Quinta mantención\n                                                "
                                                      )
                                                    ]
                                                  )
                                                ])
                                              : _vm._e()
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "td",
                                          {
                                            staticClass:
                                              "centrado barlow regular"
                                          },
                                          [
                                            ticket.created_at != null
                                              ? _c(
                                                  "div",
                                                  {
                                                    style:
                                                      _vm.config == 2
                                                        ? "color:white; "
                                                        : ""
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                                                " +
                                                        _vm._s(
                                                          _vm.formato(
                                                            ticket.created_at
                                                          )
                                                        ) +
                                                        "\n                                                "
                                                    ),
                                                    _vm.rol_id == 1 ||
                                                    _vm.rol_id == 16
                                                      ? _c("div", [
                                                          _c(
                                                            "a",
                                                            {
                                                              attrs: {
                                                                href: ""
                                                              },
                                                              on: {
                                                                click: function(
                                                                  $event
                                                                ) {
                                                                  $event.preventDefault()
                                                                  return _vm.OpenModalUpdateDate1(
                                                                    ticket,
                                                                    1
                                                                  )
                                                                }
                                                              }
                                                            },
                                                            [
                                                              _c("i", {
                                                                staticClass:
                                                                  "fa fa-edit"
                                                              })
                                                            ]
                                                          )
                                                        ])
                                                      : _vm._e()
                                                  ]
                                                )
                                              : _vm._e()
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "td",
                                          {
                                            staticClass:
                                              "centrado barlow regular"
                                          },
                                          [
                                            ticket.fecha_compromiso != null
                                              ? _c(
                                                  "div",
                                                  {
                                                    style:
                                                      _vm.config == 2
                                                        ? "color:white; "
                                                        : ""
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                                                " +
                                                        _vm._s(
                                                          _vm.formato(
                                                            ticket.fecha_compromiso
                                                          )
                                                        ) +
                                                        "\n                                                "
                                                    ),
                                                    _vm.rol_id == 1 ||
                                                    _vm.rol_id == 16
                                                      ? _c("div", [
                                                          _c(
                                                            "a",
                                                            {
                                                              attrs: {
                                                                href: ""
                                                              },
                                                              on: {
                                                                click: function(
                                                                  $event
                                                                ) {
                                                                  $event.preventDefault()
                                                                  return _vm.OpenModalUpdateDate1(
                                                                    ticket,
                                                                    2
                                                                  )
                                                                }
                                                              }
                                                            },
                                                            [
                                                              _c("i", {
                                                                staticClass:
                                                                  "fa fa-edit"
                                                              })
                                                            ]
                                                          )
                                                        ])
                                                      : _vm._e()
                                                  ]
                                                )
                                              : _vm._e()
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "td",
                                          { staticClass: "barlow regular" },
                                          [
                                            _c(
                                              "div",
                                              {
                                                staticStyle: { width: "200px" },
                                                style:
                                                  _vm.config == 2
                                                    ? "color:white; "
                                                    : ""
                                              },
                                              [
                                                _vm._v(
                                                  "\n                                                " +
                                                    _vm._s(ticket.descripcion) +
                                                    "\n                                            "
                                                )
                                              ]
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass:
                                                "badge barlow semi_bold",
                                              style:
                                                "color:white;" +
                                                "background-color:#2fcbf1;" +
                                                "font-size:12px;" +
                                                "background-color:" +
                                                ticket.estado.color +
                                                ";"
                                            },
                                            [
                                              _vm._v(
                                                "\n                                                " +
                                                  _vm._s(
                                                    ticket.estado.descripcion
                                                  ) +
                                                  "\n                                            "
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          ticket.denuncia_id == 1
                                            ? _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "badge barlow semi_bold",
                                                  staticStyle: {
                                                    "margin-top": "5px"
                                                  }
                                                },
                                                [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass: "badge ",
                                                      staticStyle: {
                                                        "background-color":
                                                          "#ed5666",
                                                        color: "white"
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                                    SIN DENUNCIAR\n                                                "
                                                      )
                                                    ]
                                                  )
                                                ]
                                              )
                                            : _vm._e(),
                                          _vm._v(" "),
                                          ticket.denuncia_id == 2
                                            ? _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "badge barlow semi_bold",
                                                  staticStyle: {
                                                    "margin-top": "5px"
                                                  }
                                                },
                                                [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "badge badge-success"
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                                    DENUNCIADO\n                                                "
                                                      )
                                                    ]
                                                  )
                                                ]
                                              )
                                            : _vm._e()
                                        ]),
                                        _vm._v(" "),
                                        _c("td", [
                                          ticket.estado_id == 1
                                            ? _c("div", [
                                                _vm.rol_id == 1 ||
                                                _vm.rol_id == 16 ||
                                                _vm.rol_id == 12 ||
                                                _vm.rol_id == 5
                                                  ? _c("div", [
                                                      _c(
                                                        "button",
                                                        {
                                                          staticClass:
                                                            "btn btn-success",
                                                          style:
                                                            _vm.config == 2
                                                              ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);"
                                                              : "",
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.Aprobartck(
                                                                ticket
                                                              )
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fa fa-check"
                                                          })
                                                        ]
                                                      )
                                                    ])
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                _c("div", {
                                                  staticStyle: {
                                                    "margin-top": "4px"
                                                  }
                                                }),
                                                _vm._v(" "),
                                                _vm.rol_id == 1 ||
                                                _vm.rol_id == 16 ||
                                                _vm.rol_id == 8
                                                  ? _c("div", [
                                                      _c(
                                                        "button",
                                                        {
                                                          staticClass:
                                                            "btn btn-secondary",
                                                          style:
                                                            _vm.config == 2
                                                              ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);"
                                                              : "",
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.retroceso(
                                                                ticket,
                                                                _vm.modulo
                                                              )
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-cog"
                                                          })
                                                        ]
                                                      )
                                                    ])
                                                  : _vm._e()
                                              ])
                                            : _vm._e(),
                                          _vm._v(" "),
                                          ticket.estado_id == 2
                                            ? _c("div", [
                                                _vm.rol_id == 1 ||
                                                _vm.rol_id == 16 ||
                                                _vm.rol_id == 12 ||
                                                _vm.rol_id == 5
                                                  ? _c("div", [
                                                      ticket.tipo_mantencion_id ==
                                                      1
                                                        ? _c("div", [
                                                            ticket.mantencion_data ==
                                                            1
                                                              ? _c(
                                                                  "button",
                                                                  {
                                                                    staticClass:
                                                                      "btn btn-success",
                                                                    style:
                                                                      _vm.config ==
                                                                      2
                                                                        ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);"
                                                                        : "",
                                                                    on: {
                                                                      click: function(
                                                                        $event
                                                                      ) {
                                                                        $event.preventDefault()
                                                                        return _vm.Aprobartck2(
                                                                          ticket,
                                                                          _vm.modulo
                                                                        )
                                                                      }
                                                                    }
                                                                  },
                                                                  [
                                                                    _c("i", {
                                                                      staticClass:
                                                                        "fa fa-check"
                                                                    })
                                                                  ]
                                                                )
                                                              : _vm._e()
                                                          ])
                                                        : _vm._e()
                                                    ])
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                _vm.rol_id == 1 ||
                                                _vm.rol_id == 16 ||
                                                _vm.rol_id == 12 ||
                                                _vm.rol_id == 5
                                                  ? _c("div", [
                                                      ticket.tipo_mantencion_id ==
                                                      null
                                                        ? _c("div", [
                                                            _c(
                                                              "button",
                                                              {
                                                                staticClass:
                                                                  "btn btn-success",
                                                                style:
                                                                  _vm.config ==
                                                                  2
                                                                    ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);"
                                                                    : "",
                                                                on: {
                                                                  click: function(
                                                                    $event
                                                                  ) {
                                                                    $event.preventDefault()
                                                                    return _vm.Aprobartck2(
                                                                      ticket,
                                                                      _vm.modulo
                                                                    )
                                                                  }
                                                                }
                                                              },
                                                              [
                                                                _c("i", {
                                                                  staticClass:
                                                                    "fa fa-check"
                                                                })
                                                              ]
                                                            )
                                                          ])
                                                        : _vm._e()
                                                    ])
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                _c("div", {
                                                  staticStyle: {
                                                    "margin-top": "4px"
                                                  }
                                                }),
                                                _vm._v(" "),
                                                _vm.rol_id == 1 ||
                                                _vm.rol_id == 16 ||
                                                _vm.rol_id == 8
                                                  ? _c("div", [
                                                      _c(
                                                        "button",
                                                        {
                                                          staticClass:
                                                            "btn btn-secondary",
                                                          style:
                                                            _vm.config == 2
                                                              ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);"
                                                              : "",
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.retroceso(
                                                                ticket,
                                                                _vm.modulo
                                                              )
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-cog"
                                                          })
                                                        ]
                                                      )
                                                    ])
                                                  : _vm._e()
                                              ])
                                            : _vm._e(),
                                          _vm._v(" "),
                                          ticket.estado_id == 3
                                            ? _c("div", [
                                                _vm.rol_id == 1 ||
                                                _vm.rol_id == 16
                                                  ? _c("div", [
                                                      _c(
                                                        "button",
                                                        {
                                                          staticClass:
                                                            "btn btn-success",
                                                          style:
                                                            _vm.config == 2
                                                              ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);"
                                                              : "",
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.Aprobartck2(
                                                                ticket,
                                                                _vm.modulo
                                                              )
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fa fa-check"
                                                          })
                                                        ]
                                                      )
                                                    ])
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                _c("div", {
                                                  staticStyle: {
                                                    "margin-top": "4px"
                                                  }
                                                }),
                                                _vm._v(" "),
                                                _vm.rol_id == 1 ||
                                                _vm.rol_id == 16 ||
                                                _vm.rol_id == 8
                                                  ? _c("div", [
                                                      _c(
                                                        "button",
                                                        {
                                                          staticClass:
                                                            "btn btn-secondary",
                                                          style:
                                                            _vm.config == 2
                                                              ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);"
                                                              : "",
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.retroceso(
                                                                ticket,
                                                                _vm.modulo
                                                              )
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-cog"
                                                          })
                                                        ]
                                                      )
                                                    ])
                                                  : _vm._e()
                                              ])
                                            : _vm._e(),
                                          _vm._v(" "),
                                          ticket.estado_id == 4
                                            ? _c("div", [
                                                _vm.rol_id == 1 ||
                                                _vm.rol_id == 16 ||
                                                _vm.rol_id == 8
                                                  ? _c("div", [
                                                      _c(
                                                        "button",
                                                        {
                                                          staticClass:
                                                            "btn btn-secondary",
                                                          style:
                                                            _vm.config == 2
                                                              ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);"
                                                              : "",
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.retroceso(
                                                                ticket,
                                                                _vm.modulo
                                                              )
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-cog"
                                                          })
                                                        ]
                                                      )
                                                    ])
                                                  : _vm._e()
                                              ])
                                            : _vm._e(),
                                          _vm._v(" "),
                                          _c("div", {
                                            staticStyle: { "margin-top": "4px" }
                                          }),
                                          _vm._v(" "),
                                          ticket.estado_id == 1
                                            ? _c("div", [
                                                _vm.rol_id == 1 ||
                                                _vm.rol_id == 16 ||
                                                _vm.rol_id == 12 ||
                                                _vm.rol_id == 5
                                                  ? _c("div", [
                                                      _c(
                                                        "button",
                                                        {
                                                          staticClass:
                                                            "btn btn-danger",
                                                          style:
                                                            _vm.config == 2
                                                              ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);"
                                                              : "",
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.ModalRechazo(
                                                                ticket
                                                              )
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-times-circle"
                                                          })
                                                        ]
                                                      )
                                                    ])
                                                  : _vm._e()
                                              ])
                                            : _vm._e(),
                                          _vm._v(" "),
                                          ticket.estado_id == 2
                                            ? _c("div", [
                                                _vm.rol_id == 1 ||
                                                _vm.rol_id == 16 ||
                                                _vm.rol_id == 12 ||
                                                _vm.rol_id == 5
                                                  ? _c("div", [
                                                      _c(
                                                        "button",
                                                        {
                                                          staticClass:
                                                            "btn btn-danger",
                                                          style:
                                                            _vm.config == 2
                                                              ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);"
                                                              : "",
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.ModalRechazo(
                                                                ticket
                                                              )
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-times-circle"
                                                          })
                                                        ]
                                                      )
                                                    ])
                                                  : _vm._e()
                                              ])
                                            : _vm._e(),
                                          _vm._v(" "),
                                          ticket.estado_id == 3
                                            ? _c("div", [
                                                _vm.rol_id == 1 ||
                                                _vm.rol_id == 16
                                                  ? _c("div", [
                                                      _c(
                                                        "button",
                                                        {
                                                          staticClass:
                                                            "btn btn-danger",
                                                          style:
                                                            _vm.config == 2
                                                              ? "box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);"
                                                              : "",
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.ModalRechazo(
                                                                ticket
                                                              )
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-times-circle"
                                                          })
                                                        ]
                                                      )
                                                    ])
                                                  : _vm._e()
                                              ])
                                            : _vm._e(),
                                          _vm._v(" "),
                                          ticket.estado_id == 8
                                            ? _c("div", [
                                                _vm.rol_id == 12 ||
                                                _vm.rol_id == 1
                                                  ? _c("div", [
                                                      _c(
                                                        "button",
                                                        {
                                                          staticClass:
                                                            "btn btn-success",
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.Aprobartck3(
                                                                ticket
                                                              )
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-check"
                                                          })
                                                        ]
                                                      )
                                                    ])
                                                  : _vm._e()
                                              ])
                                            : _vm._e()
                                        ])
                                      ]
                                    )
                                  })
                                ],
                                2
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _vm.vacio == 1
                            ? _c(
                                "div",
                                { staticClass: "col-12 col-md-12 col-sm-12" },
                                [_vm._m(18)]
                              )
                            : _vm._e(),
                          _vm._v(" "),
                          _c(
                            "nav",
                            {
                              staticClass: "pagination",
                              attrs: {
                                "aria-label": "pagination",
                                role: "navigation"
                              }
                            },
                            [
                              _c("vue-pagination", {
                                attrs: { offset: 4, pagination: _vm.tickets },
                                on: {
                                  paginate: function($event) {
                                    return _vm.SearchTicket(_vm.modulo)
                                  }
                                }
                              })
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c("div", { staticClass: "card-footer text-right" })
                        ]
                      )
                    ])
                  ]
                )
              ])
            ])
          ])
        : _vm._e(),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "modal inmodal",
          attrs: {
            "aria-hidden": "true",
            id: "listaLastTickets",
            role: "dialog",
            tabindex: "-1"
          }
        },
        [
          _c("div", { staticClass: "modal-dialog modal-lg" }, [
            _c("div", { staticClass: "modal-content animated bounceInRight" }, [
              _vm._m(19),
              _vm._v(" "),
              _c("div", { staticClass: "modal-body" }, [
                _c(
                  "div",
                  { staticClass: "row" },
                  _vm._l(_vm.ListTicket.data, function(ListTickets) {
                    return _c(
                      "div",
                      { staticClass: "col-lg-2 col-md-6 col-sm-6 col-12" },
                      [
                        _c(
                          "a",
                          {
                            attrs: {
                              href: "/Tkc/" + ListTickets.id,
                              target: "blank__"
                            }
                          },
                          [
                            _c(
                              "span",
                              { staticClass: "badge badge-info boxBounce" },
                              [
                                _vm._v(
                                  "\n                                    " +
                                    _vm._s(ListTickets.id) +
                                    "\n                                "
                                )
                              ]
                            )
                          ]
                        )
                      ]
                    )
                  }),
                  0
                )
              ]),
              _vm._v(" "),
              _vm._m(20)
            ])
          ])
        ]
      ),
      _vm._v(" "),
      _c(
        "form",
        {
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.UploadExcelTickets($event)
            }
          }
        },
        [
          _c(
            "div",
            {
              staticClass: "modal inmodal",
              attrs: {
                "aria-hidden": "true",
                id: "upload_masive_tickets_red_core",
                role: "dialog",
                tabindex: "-1"
              }
            },
            [
              _c("div", { staticClass: "modal-dialog " }, [
                _c(
                  "div",
                  { staticClass: "modal-content animated bounceInRight" },
                  [
                    _vm._m(21),
                    _vm._v(" "),
                    _c("div", { staticClass: "modal-body" }, [
                      _c(
                        "div",
                        {
                          staticClass: "form-group",
                          attrs: { id: "textInpu" }
                        },
                        [
                          _c("p", { staticStyle: { color: "#999999" } }, [
                            _vm._v(
                              "\n                                Seleccione o arraste el archivo\n                            "
                            )
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            staticClass: "form-control",
                            attrs: { name: "myfile", type: "file" },
                            on: { change: _vm.uploadFileTicketsMasive }
                          })
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _vm._m(22)
                  ]
                )
              ])
            ]
          )
        ]
      ),
      _vm._v(" "),
      _c("formulario"),
      _vm._v(" "),
      _c(
        "form",
        {
          attrs: { method: "PUT" },
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.AprobarTicket(_vm.datosTicket.id)
            }
          }
        },
        [
          _c(
            "div",
            {
              staticClass: "modal inmodal",
              attrs: {
                "aria-hidden": "true",
                id: "fecha",
                role: "dialog",
                tabindex: "-1"
              }
            },
            [
              _c("div", { staticClass: "modal-dialog modal-sm" }, [
                _c(
                  "div",
                  { staticClass: "modal-content animated bounceInRight" },
                  [
                    _vm._m(23),
                    _vm._v(" "),
                    _c("div", { staticClass: "modal-body" }, [
                      _c(
                        "div",
                        {
                          staticClass: "form-group",
                          attrs: { id: "textInpu" }
                        },
                        [
                          _c("p", { staticStyle: { color: "#999999" } }, [
                            _vm._v(
                              "\n                                Ingrese Fecha de termino\n                            "
                            )
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.datosTicket.fechaCompromiso,
                                expression: "datosTicket.fechaCompromiso"
                              }
                            ],
                            staticClass: "form-control ",
                            staticStyle: { color: "#999999" },
                            attrs: {
                              id: "fechaInput",
                              name: "fechaCompromiso",
                              required: "",
                              type: "date"
                            },
                            domProps: {
                              value: _vm.datosTicket.fechaCompromiso
                            },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.datosTicket,
                                  "fechaCompromiso",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _vm._m(24)
                  ]
                )
              ])
            ]
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "form",
        {
          attrs: { method: "PUT" },
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.UpdateFechaCreacion(_vm.IdUpdateFecha)
            }
          }
        },
        [
          _c(
            "div",
            {
              staticClass: "modal inmodal",
              attrs: {
                "aria-hidden": "true",
                id: "fecha1Update",
                role: "dialog",
                tabindex: "-1"
              }
            },
            [
              _c("div", { staticClass: "modal-dialog modal-sm" }, [
                _c(
                  "div",
                  { staticClass: "modal-content animated bounceInRight" },
                  [
                    _vm._m(25),
                    _vm._v(" "),
                    _c("div", { staticClass: "modal-body" }, [
                      _c(
                        "div",
                        {
                          staticClass: "form-group",
                          attrs: { id: "textInpu" }
                        },
                        [
                          _c("p", { staticStyle: { color: "#999999" } }, [
                            _vm._v(
                              "\n                                Ingrese La nueva fecha\n                            "
                            )
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.fecha1Update,
                                expression: "fecha1Update"
                              }
                            ],
                            staticClass: "form-control ",
                            staticStyle: { color: "#999999" },
                            attrs: {
                              id: "fechaInput",
                              name: "fecha1Update",
                              required: "",
                              type: "date"
                            },
                            domProps: { value: _vm.fecha1Update },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.fecha1Update = $event.target.value
                              }
                            }
                          })
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _vm._m(26)
                  ]
                )
              ])
            ]
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "form",
        {
          attrs: { method: "PUT" },
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.RechazarTicket(_vm.datosLog.id, _vm.modulo)
            }
          }
        },
        [
          _c(
            "div",
            {
              staticClass: "modal inmodal",
              attrs: {
                "aria-hidden": "true",
                id: "rechazo",
                role: "dialog",
                tabindex: "-1"
              }
            },
            [
              _c("div", { staticClass: "modal-dialog modal-lg" }, [
                _c(
                  "div",
                  { staticClass: "modal-content animated bounceInRight" },
                  [
                    _vm._m(27),
                    _vm._v(" "),
                    _c("div", { staticClass: "modal-body" }, [
                      _c(
                        "div",
                        {
                          staticClass: "form-group",
                          attrs: { id: "textInpu" }
                        },
                        [
                          _c("p", { staticStyle: { color: "#999999" } }, [
                            _vm._v(
                              "\n                                Motivo Rechazo\n                            "
                            )
                          ]),
                          _vm._v(" "),
                          _c("textarea", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.datosLog.descripcion,
                                expression: "datosLog.descripcion"
                              }
                            ],
                            staticClass: "form-control ",
                            staticStyle: { color: "#999999", height: "200px" },
                            attrs: {
                              id: "desc",
                              name: "descripcion",
                              required: "",
                              type: "text-area"
                            },
                            domProps: { value: _vm.datosLog.descripcion },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.datosLog,
                                  "descripcion",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _vm._m(28)
                  ]
                )
              ])
            ]
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "form",
        {
          attrs: { method: "PUT" },
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.RedirectionTicket()
            }
          }
        },
        [
          _c(
            "div",
            {
              staticClass: "modal inmodal",
              attrs: {
                "aria-hidden": "true",
                id: "NuevoRumbo",
                role: "dialog",
                tabindex: "-1"
              }
            },
            [
              _c("div", { staticClass: "modal-dialog modal-sm" }, [
                _c(
                  "div",
                  { staticClass: "modal-content animated bounceInRight" },
                  [
                    _vm._m(29),
                    _vm._v(" "),
                    _c("div", { staticClass: "modal-body" }, [
                      _c(
                        "div",
                        {
                          staticClass: "form-group",
                          attrs: { id: "textInpu" }
                        },
                        [
                          _c("p", { staticStyle: { color: "#999999" } }, [
                            _vm._v(
                              "\n                                Estados\n                            "
                            )
                          ]),
                          _vm._v(" "),
                          _c(
                            "select",
                            {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.nuevoEstado,
                                  expression: "nuevoEstado"
                                }
                              ],
                              staticClass: "form-control",
                              on: {
                                change: function($event) {
                                  var $$selectedVal = Array.prototype.filter
                                    .call($event.target.options, function(o) {
                                      return o.selected
                                    })
                                    .map(function(o) {
                                      var val =
                                        "_value" in o ? o._value : o.value
                                      return val
                                    })
                                  _vm.nuevoEstado = $event.target.multiple
                                    ? $$selectedVal
                                    : $$selectedVal[0]
                                }
                              }
                            },
                            [
                              _vm.modulo == 2 ||
                              _vm.modulo == 3 ||
                              _vm.modulo == 4
                                ? _c("option", { domProps: { value: 1 } }, [
                                    _vm._v(
                                      "\n                                    EN ESPERA\n                                "
                                    )
                                  ])
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.modulo == 1 ||
                              _vm.modulo == 3 ||
                              _vm.modulo == 4
                                ? _c("option", { domProps: { value: 2 } }, [
                                    _vm._v(
                                      "\n                                    EN CURSO\n                                "
                                    )
                                  ])
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.modulo == 2 ||
                              _vm.modulo == 1 ||
                              _vm.modulo == 4
                                ? _c("option", { domProps: { value: 3 } }, [
                                    _vm._v(
                                      "\n                                    VALIDACIÓN\n                                "
                                    )
                                  ])
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.modulo == 2 ||
                              _vm.modulo == 3 ||
                              _vm.modulo == 1
                                ? _c("option", { domProps: { value: 4 } }, [
                                    _vm._v(
                                      "\n                                    FINALIZADA\n                                "
                                    )
                                  ])
                                : _vm._e(),
                              _vm._v(" "),
                              _c("option", { domProps: { value: 7 } }, [
                                _vm._v(
                                  "\n                                    ELIMINADA\n                                "
                                )
                              ])
                            ]
                          )
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _vm._m(30)
                  ]
                )
              ])
            ]
          )
        ]
      )
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "barlow regular",
        attrs: { href: "/ticketExcelObrasCiviles" }
      },
      [
        _c("i", { staticClass: "fas fa-download" }),
        _vm._v(
          "\n                                        Descargar Reporte General\n                                    "
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      { staticClass: "barlow regular", attrs: { href: "/ticketExcelClima" } },
      [
        _c("i", { staticClass: "fas fa-download" }),
        _vm._v(
          "\n                                        Descargar  Reporte General\n                                    "
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      { staticClass: "barlow regular", attrs: { href: "/ticketExcel" } },
      [
        _c("i", { staticClass: "fas fa-download" }),
        _vm._v(
          "\n                                        Descargar  Reporte General\n                                    "
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", [
      _c(
        "a",
        {
          staticClass: "barlow regular",
          attrs: { href: "/ticketExcelResago" }
        },
        [
          _c("i", { staticClass: "fas fa-download" }),
          _vm._v(
            "\n                                            Descargar Reporte General\n                                        "
          )
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("li", [
      _c("a", { attrs: { href: "/ticketExcel" } }, [
        _c("i", { staticClass: "fas fa-download" }),
        _vm._v(
          "\n                                            Reporte General\n                                        "
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "card-icon ",
        staticStyle: {
          float: "left",
          "background-color": "white",
          color: "#191919",
          "border-radius": "2px"
        }
      },
      [
        _c("i", {
          staticClass: " fas fa-columns",
          staticStyle: { color: "#191919", "font-size": "20px" }
        })
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "card-icon",
        staticStyle: {
          float: "left",
          "background-color": "white",
          color: "#191919",
          "border-radius": "2px"
        }
      },
      [
        _c("i", {
          staticClass: "fas fa-edit",
          staticStyle: { color: "#191919", "font-size": "20px" }
        })
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "card-icon",
        staticStyle: {
          float: "left",
          "background-color": "white",
          color: "#191919",
          "border-radius": "2px"
        }
      },
      [
        _c("i", {
          staticClass: "fas fa-check",
          staticStyle: { color: "#191919", "font-size": "20px" }
        })
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "card-icon",
        staticStyle: {
          float: "left",
          "background-color": "white",
          color: "#191919",
          "border-radius": "2px"
        }
      },
      [
        _c("i", {
          staticClass: "fab fa-font-awesome-alt",
          staticStyle: { color: "#191919", "font-size": "25px" }
        })
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "ticket-title" }, [
      _c(
        "h4",
        { staticClass: "barlow bold", staticStyle: { "font-size": "16px" } },
        [
          _vm._v(
            "\n                                Motivo\n                            "
          )
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "ticket-title" }, [
      _c(
        "h4",
        { staticClass: "barlow bold", staticStyle: { "font-size": "16px" } },
        [
          _vm._v(
            "\n                                Estado\n                            "
          )
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "ticket-title" }, [
      _c(
        "h4",
        { staticClass: "barlow bold", staticStyle: { "font-size": "16px" } },
        [
          _vm._v(
            "\n                                    Nro° Ticket\n                                "
          )
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "ticket-title", staticStyle: { "margin-top": "8px" } },
      [
        _c(
          "h4",
          { staticClass: "barlow bold", staticStyle: { "font-size": "16px" } },
          [
            _vm._v(
              "\n                                    Sitio\n                                "
            )
          ]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "ticket-title", staticStyle: { "margin-top": "8px" } },
      [
        _c(
          "h4",
          { staticClass: "barlow bold", staticStyle: { "font-size": "16px" } },
          [
            _vm._v(
              "\n                                    Motivo\n                                "
            )
          ]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "ticket-title", staticStyle: { "margin-top": "8px" } },
      [
        _c(
          "h4",
          { staticClass: "barlow bold", staticStyle: { "font-size": "16px" } },
          [
            _vm._v(
              "\n                                    Estado\n                                "
            )
          ]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "ticket-title", staticStyle: { "margin-top": "8px" } },
      [
        _c(
          "h4",
          { staticClass: "barlow bold", staticStyle: { "font-size": "16px" } },
          [
            _vm._v(
              "\n                                    Opciones\n                                "
            )
          ]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("li", [
      _c(
        "a",
        {
          staticClass: "dropdown-item barlow regular",
          attrs: { href: "/InputacionExcel" }
        },
        [
          _c("i", { staticClass: "fas fa-download" }),
          _vm._v(
            "\n                                            Imputaciones ticket\n                                        "
          )
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "dropdown-item barlow regular",
        attrs: {
          "data-toggle": "modal",
          href: "#upload_masive_tickets_red_core"
        }
      },
      [
        _c("i", { staticClass: "fas fa-upload" }),
        _vm._v(
          "\n                                            Carga masiva\n                                        "
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "card",
        staticStyle: { "box-shadow": "0 0px 0px rgba(0, 0, 0, 0)" }
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
                      "linear-gradient(rgb(0, 92, 255), rgba(0, 123, 255, 0.6))"
                  }
                },
                [_c("i", { staticClass: "fas fa-question" })]
              ),
              _vm._v(" "),
              _c("h2", [
                _vm._v(
                  "\n                                                No se ha encontrado ningún ticket en la busqueda.\n                                            "
                )
              ]),
              _vm._v(" "),
              _c("p", { staticClass: "lead" }, [
                _vm._v(
                  "\n                                                Verifique los datos de busqueda o el estado de este.\n                                            "
                )
              ])
            ]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-header" }, [
      _c(
        "h4",
        {
          staticClass: "modal-title",
          staticStyle: {
            color: "#999999",
            "text-align": "center",
            "margin-left": ""
          }
        },
        [
          _vm._v(
            "\n                        Ultimos tickets Creados\n                    "
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass: "close",
          attrs: {
            "aria-label": "Close",
            "data-dismiss": "modal",
            type: "button"
          }
        },
        [
          _c("span", { attrs: { "aria-hidden": "true" } }, [
            _vm._v("\n                            ×\n                        ")
          ])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-footer" }, [
      _c(
        "button",
        {
          staticClass: "btn btn-white",
          attrs: { "data-dismiss": "modal", type: "button" }
        },
        [_vm._v("\n                        Cerrar\n                    ")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "modal-header",
        staticStyle: {
          background: "-webkit-linear-gradient(rgb(0, 92, 255), #007bff99)",
          height: "70px"
        }
      },
      [
        _c(
          "h5",
          { staticClass: "modal-title", staticStyle: { color: "white" } },
          [
            _vm._v(
              "\n                            Carga masiva de tickets\n                        "
            )
          ]
        ),
        _vm._v(" "),
        _c(
          "button",
          {
            staticClass: "close",
            attrs: {
              "aria-label": "Close",
              "data-dismiss": "modal",
              type: "button"
            }
          },
          [
            _c(
              "span",
              {
                staticStyle: { color: "white" },
                attrs: { "aria-hidden": "true" }
              },
              [
                _vm._v(
                  "\n                                ×\n                            "
                )
              ]
            )
          ]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-footer" }, [
      _c(
        "button",
        {
          staticClass: "btn",
          staticStyle: { "background-color": "#007bff99", color: "white" },
          attrs: { type: "submit" }
        },
        [
          _vm._v(
            "\n                            Aceptar\n                        "
          )
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "modal-header",
        staticStyle: {
          background: "-webkit-linear-gradient(rgb(0, 92, 255), #007bff99)",
          height: "80px"
        }
      },
      [
        _c(
          "h5",
          { staticClass: "modal-title", staticStyle: { color: "white" } },
          [
            _vm._v(
              "\n                            Ingreso de fecha de termino\n                        "
            )
          ]
        ),
        _vm._v(" "),
        _c(
          "button",
          {
            staticClass: "close",
            attrs: {
              "aria-label": "Close",
              "data-dismiss": "modal",
              type: "button"
            }
          },
          [
            _c(
              "span",
              {
                staticStyle: { color: "white" },
                attrs: { "aria-hidden": "true" }
              },
              [
                _vm._v(
                  "\n                                ×\n                            "
                )
              ]
            )
          ]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-footer" }, [
      _c(
        "button",
        {
          staticClass: "btn btn-success",
          staticStyle: { color: "white" },
          attrs: { type: "submit" }
        },
        [
          _vm._v(
            "\n                            Aprobar\n                        "
          )
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-header" }, [
      _c(
        "h4",
        { staticClass: "modal-title", staticStyle: { color: "#999999" } },
        [
          _vm._v(
            "\n                            Actualizar Fecha\n                        "
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass: "close",
          attrs: {
            "aria-label": "Close",
            "data-dismiss": "modal",
            type: "button"
          }
        },
        [
          _c("span", { attrs: { "aria-hidden": "true" } }, [
            _vm._v(
              "\n                                ×\n                            "
            )
          ])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-footer" }, [
      _c(
        "button",
        { staticClass: "btn btn-success", attrs: { type: "submit" } },
        [
          _vm._v(
            "\n                            Aceptar\n                        "
          )
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "modal-header",
        staticStyle: {
          background: "-webkit-linear-gradient(rgb(0, 92, 255), #007bff99)",
          height: "80px"
        }
      },
      [
        _c(
          "h5",
          { staticClass: "modal-title", staticStyle: { color: "white" } },
          [
            _vm._v(
              "\n                            Rechazo de ticket\n                        "
            )
          ]
        ),
        _vm._v(" "),
        _c(
          "button",
          {
            staticClass: "close",
            attrs: {
              "aria-label": "Close",
              "data-dismiss": "modal",
              type: "button"
            }
          },
          [
            _c(
              "span",
              {
                staticStyle: { color: "white" },
                attrs: { "aria-hidden": "true" }
              },
              [
                _vm._v(
                  "\n                                ×\n                            "
                )
              ]
            )
          ]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-footer" }, [
      _c(
        "button",
        {
          staticClass: "btn btn-success",
          staticStyle: { color: "white" },
          attrs: { type: "submit" }
        },
        [
          _vm._v(
            "\n                            Aceptar\n                        "
          )
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-header" }, [
      _c(
        "h4",
        { staticClass: "modal-title", staticStyle: { color: "#999999" } },
        [
          _vm._v(
            "\n                            Seleccione el estado\n                        "
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass: "close",
          attrs: {
            "aria-label": "Close",
            "data-dismiss": "modal",
            type: "button"
          }
        },
        [
          _c("span", { attrs: { "aria-hidden": "true" } }, [
            _vm._v(
              "\n                                ×\n                            "
            )
          ])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-footer" }, [
      _c(
        "button",
        { staticClass: "btn btn-success", attrs: { type: "submit" } },
        [
          _vm._v(
            "\n                            Aceptar\n                        "
          )
        ]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/formulario.vue?vue&type=template&id=4c848506&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/formulario.vue?vue&type=template&id=4c848506& ***!
  \*************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("form", [
      _c(
        "div",
        {
          staticClass: "modal inmodal",
          attrs: {
            "aria-hidden": "true",
            id: "formulario",
            role: "dialog",
            tabindex: "-1"
          }
        },
        [
          _c("div", { staticClass: "modal-dialog modal-lg" }, [
            _c("div", { staticClass: "modal-content animated bounceInRight" }, [
              _c(
                "div",
                {
                  staticClass: "card",
                  staticStyle: { "box-shadow": "0 0px 0px rgba(0, 0, 0, 0)" }
                },
                [
                  _vm._m(0),
                  _vm._v(" "),
                  _c("div", { staticClass: "card-body" }, [
                    _c("div", { staticClass: "row mt-4" }, [
                      _c(
                        "div",
                        { staticClass: "col-12 col-lg-8 offset-lg-2" },
                        [
                          _c("div", { staticClass: "wizard-steps" }, [
                            _c(
                              "div",
                              {
                                staticClass: "wizard-step ",
                                class: _vm.step == 1 ? "wizard-step-active" : ""
                              },
                              [
                                _vm._m(1),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "wizard-step-label" },
                                  [
                                    _vm._v(
                                      "\n                                                Datos del ticket\n                                            "
                                    )
                                  ]
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass: "wizard-step",
                                class: _vm.step == 2 ? "wizard-step-active" : ""
                              },
                              [
                                _vm._m(2),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "wizard-step-label" },
                                  [
                                    _vm._v(
                                      "\n                                                Archivos\n                                            "
                                    )
                                  ]
                                )
                              ]
                            )
                          ])
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _c("form", { staticClass: "wizard-content mt-2" }, [
                      _c("div", { staticClass: "wizard-pane" }, [
                        _c("div", { staticClass: "row" }, [
                          _c(
                            "div",
                            {
                              staticClass: "col-lg-6 col-md-6 col-sm-6 col-12",
                              attrs: { id: "stepOneDivOne" }
                            },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", [
                                  _vm._v(
                                    "\n                                                    Sitio *\n                                                "
                                  )
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  attrs: { name: "pop", type: "hidden" },
                                  domProps: { value: _vm.popid }
                                }),
                                _vm._v(" "),
                                _c("input", {
                                  staticClass: "form-control",
                                  staticStyle: { display: "none" },
                                  attrs: {
                                    id: "popcheck",
                                    name: "",
                                    type: "text",
                                    value: ""
                                  },
                                  on: {
                                    click: function($event) {
                                      $event.preventDefault()
                                      return _vm.changePop($event)
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  {
                                    staticClass: "input-group",
                                    attrs: { id: "popSearch" }
                                  },
                                  [
                                    _c("input", {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.datositio,
                                          expression: "datositio"
                                        }
                                      ],
                                      staticClass: "form-control",
                                      staticStyle: { position: "relative" },
                                      attrs: {
                                        id: "inputSitio",
                                        name: "datositio",
                                        placeholder: "Buscar Sitio",
                                        type: "text",
                                        value: ""
                                      },
                                      domProps: { value: _vm.datositio },
                                      on: {
                                        keyup: _vm.BuscarSitio,
                                        input: function($event) {
                                          if ($event.target.composing) {
                                            return
                                          }
                                          _vm.datositio = $event.target.value
                                        }
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm._m(3),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticClass: "row",
                                        staticStyle: {
                                          display: "none",
                                          right: "230px top: 54px"
                                        },
                                        attrs: { id: "listPops" }
                                      },
                                      [
                                        _c(
                                          "div",
                                          {
                                            staticClass:
                                              "col-lg-11 col-md-4 col-sm-4 col-10 shadow-box-ag full-height-scroll ",
                                            staticStyle: {
                                              "max-height": "120px",
                                              "overflow-y": "auto",
                                              "background-color": "white"
                                            }
                                          },
                                          _vm._l(_vm.pops, function(pop) {
                                            return _c("div", [
                                              _c(
                                                "a",
                                                {
                                                  staticStyle: {
                                                    color: "black"
                                                  },
                                                  attrs: {
                                                    href: "",
                                                    id: "selectpopvalue"
                                                  },
                                                  on: {
                                                    click: function($event) {
                                                      $event.preventDefault()
                                                      return _vm.selectdpop(
                                                        pop.id,
                                                        pop.nem_site,
                                                        pop.nombre
                                                      )
                                                    }
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    "\n                                                                                " +
                                                      _vm._s(pop.nem_site) +
                                                      " " +
                                                      _vm._s(pop.nombre) +
                                                      "\n                                                                                "
                                                  ),
                                                  _c("hr", {
                                                    staticStyle: {
                                                      "margin-top": "-1px"
                                                    }
                                                  })
                                                ]
                                              )
                                            ])
                                          }),
                                          0
                                        )
                                      ]
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _vm._m(4)
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", [
                                  _vm._v(
                                    "\n                                                    Motivo *\n                                                "
                                  )
                                ]),
                                _vm._v(" "),
                                _c(
                                  "select",
                                  {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.motivoId,
                                        expression: "motivoId"
                                      }
                                    ],
                                    staticClass: "form-control select",
                                    attrs: { id: "motivo", name: "motivo" },
                                    on: {
                                      change: [
                                        function($event) {
                                          var $$selectedVal = Array.prototype.filter
                                            .call(
                                              $event.target.options,
                                              function(o) {
                                                return o.selected
                                              }
                                            )
                                            .map(function(o) {
                                              var val =
                                                "_value" in o
                                                  ? o._value
                                                  : o.value
                                              return val
                                            })
                                          _vm.motivoId = $event.target.multiple
                                            ? $$selectedVal
                                            : $$selectedVal[0]
                                        },
                                        function($event) {
                                          $event.preventDefault()
                                          return _vm.deleteError($event)
                                        }
                                      ]
                                    }
                                  },
                                  [
                                    _c("option", { domProps: { value: 1 } }, [
                                      _vm._v(
                                        "\n                                                        Vandalismo menor\n                                                    "
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c("option", { domProps: { value: 7 } }, [
                                      _vm._v(
                                        "\n                                                        Vandalismo mayor\n                                                    "
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c("option", { domProps: { value: 2 } }, [
                                      _vm._v(
                                        "\n                                                        Falla Mayor\n                                                    "
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c("option", { domProps: { value: 6 } }, [
                                      _vm._v(
                                        "\n                                                        Falla menor\n                                                    "
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c("option", { domProps: { value: 3 } }, [
                                      _vm._v(
                                        "\n                                                        Mantenimiento\n                                                    "
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c("option", { domProps: { value: 4 } }, [
                                      _vm._v(
                                        "\n                                                        Solicitud Stock\n                                                    "
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c("option", { domProps: { value: 5 } }, [
                                      _vm._v(
                                        "\n                                                        Solicitud de mejora\n                                                    "
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c("option", { domProps: { value: 8 } }, [
                                      _vm._v(
                                        "\n                                                        Gestión de residuo\n                                                    "
                                      )
                                    ])
                                  ]
                                ),
                                _vm._v(" "),
                                _vm._m(5)
                              ]),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "form-group",
                                  staticStyle: { display: "none" },
                                  attrs: { id: "TipoMantencion" }
                                },
                                [
                                  _c("label", [
                                    _vm._v(
                                      "\n                                                    Tipo mantención *\n                                                "
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c(
                                    "select",
                                    {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.mantencionId,
                                          expression: "mantencionId"
                                        }
                                      ],
                                      staticClass: "form-control select",
                                      attrs: {
                                        id: "mantencion",
                                        name: "mantencion"
                                      },
                                      on: {
                                        change: [
                                          function($event) {
                                            var $$selectedVal = Array.prototype.filter
                                              .call(
                                                $event.target.options,
                                                function(o) {
                                                  return o.selected
                                                }
                                              )
                                              .map(function(o) {
                                                var val =
                                                  "_value" in o
                                                    ? o._value
                                                    : o.value
                                                return val
                                              })
                                            _vm.mantencionId = $event.target
                                              .multiple
                                              ? $$selectedVal
                                              : $$selectedVal[0]
                                          },
                                          function($event) {
                                            $event.preventDefault()
                                            return _vm.deleteError($event)
                                          }
                                        ]
                                      }
                                    },
                                    _vm._l(_vm.mantenciones, function(
                                      mantencion
                                    ) {
                                      return _c(
                                        "option",
                                        { domProps: { value: mantencion.id } },
                                        [
                                          _vm._v(
                                            "\n                                                        " +
                                              _vm._s(mantencion.descripcion) +
                                              "\n                                                    "
                                          )
                                        ]
                                      )
                                    }),
                                    0
                                  ),
                                  _vm._v(" "),
                                  _vm._m(6)
                                ]
                              ),
                              _vm._v(" "),
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", [
                                  _vm._v(
                                    "\n                                                    Descripción*\n                                                "
                                  )
                                ]),
                                _vm._v(" "),
                                _c("textarea", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.descripcion,
                                      expression: "descripcion"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  staticStyle: {
                                    width: "100%",
                                    height: "100px"
                                  },
                                  attrs: {
                                    id: "descripcion",
                                    name: "descripcion",
                                    placeholder: ""
                                  },
                                  domProps: { value: _vm.descripcion },
                                  on: {
                                    keyup: function($event) {
                                      $event.preventDefault()
                                      return _vm.deleteError($event)
                                    },
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.descripcion = $event.target.value
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _vm._m(7)
                              ]),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticStyle: { display: "none" },
                                  attrs: { id: "DivResago" }
                                },
                                [
                                  _c("div", { staticClass: "form-group" }, [
                                    _c("label", [
                                      _vm._v(
                                        "\n                                                        Más de 10 años de antigüedad *\n                                                    "
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c(
                                      "select",
                                      {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.antiguedad,
                                            expression: "antiguedad"
                                          }
                                        ],
                                        staticClass: "form-control select",
                                        on: {
                                          change: [
                                            function($event) {
                                              var $$selectedVal = Array.prototype.filter
                                                .call(
                                                  $event.target.options,
                                                  function(o) {
                                                    return o.selected
                                                  }
                                                )
                                                .map(function(o) {
                                                  var val =
                                                    "_value" in o
                                                      ? o._value
                                                      : o.value
                                                  return val
                                                })
                                              _vm.antiguedad = $event.target
                                                .multiple
                                                ? $$selectedVal
                                                : $$selectedVal[0]
                                            },
                                            function($event) {
                                              $event.preventDefault()
                                              return _vm.deleteError($event)
                                            }
                                          ]
                                        }
                                      },
                                      [
                                        _c(
                                          "option",
                                          { domProps: { value: 1 } },
                                          [
                                            _vm._v(
                                              "\n                                                            Si\n                                                        "
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "option",
                                          { domProps: { value: 2 } },
                                          [
                                            _vm._v(
                                              "\n                                                            No\n                                                        "
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(8)
                                  ]),
                                  _vm._v(" "),
                                  _c("div", { staticClass: "form-group" }, [
                                    _c("label", [
                                      _vm._v(
                                        "\n                                                        Equipo/Material *\n                                                    "
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c(
                                      "select",
                                      {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.tipo_activo_id,
                                            expression: "tipo_activo_id"
                                          }
                                        ],
                                        staticClass: "form-control select",
                                        on: {
                                          change: [
                                            function($event) {
                                              var $$selectedVal = Array.prototype.filter
                                                .call(
                                                  $event.target.options,
                                                  function(o) {
                                                    return o.selected
                                                  }
                                                )
                                                .map(function(o) {
                                                  var val =
                                                    "_value" in o
                                                      ? o._value
                                                      : o.value
                                                  return val
                                                })
                                              _vm.tipo_activo_id = $event.target
                                                .multiple
                                                ? $$selectedVal
                                                : $$selectedVal[0]
                                            },
                                            function($event) {
                                              $event.preventDefault()
                                              return _vm.deleteError($event)
                                            }
                                          ]
                                        }
                                      },
                                      [
                                        _c(
                                          "option",
                                          { domProps: { value: 1 } },
                                          [
                                            _vm._v(
                                              "\n                                                            Equipo\n                                                        "
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "option",
                                          { domProps: { value: 2 } },
                                          [
                                            _vm._v(
                                              "\n                                                            Material\n                                                        "
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(9)
                                  ]),
                                  _vm._v(" "),
                                  _c("div", { staticClass: "form-group" }, [
                                    _c("label", [
                                      _vm._v(
                                        "\n                                                        Descripción del activo *\n                                                    "
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c("input", {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.desc_activo,
                                          expression: "desc_activo"
                                        }
                                      ],
                                      staticClass: "form-control",
                                      attrs: { name: "", type: "text" },
                                      domProps: { value: _vm.desc_activo },
                                      on: {
                                        keyup: function($event) {
                                          $event.preventDefault()
                                          return _vm.deleteError($event)
                                        },
                                        input: function($event) {
                                          if ($event.target.composing) {
                                            return
                                          }
                                          _vm.desc_activo = $event.target.value
                                        }
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm._m(10)
                                  ]),
                                  _vm._v(" "),
                                  _c("div", { staticClass: "form-group" }, [
                                    _c("label", [
                                      _vm._v(
                                        "\n                                                        Código SAP\n                                                    "
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c("input", {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.cod_sap_activo_resago,
                                          expression: "cod_sap_activo_resago"
                                        }
                                      ],
                                      staticClass: "form-control",
                                      attrs: { name: "", type: "text" },
                                      domProps: {
                                        value: _vm.cod_sap_activo_resago
                                      },
                                      on: {
                                        keyup: function($event) {
                                          $event.preventDefault()
                                          return _vm.deleteError($event)
                                        },
                                        input: function($event) {
                                          if ($event.target.composing) {
                                            return
                                          }
                                          _vm.cod_sap_activo_resago =
                                            $event.target.value
                                        }
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm._m(11)
                                  ])
                                ]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "col-lg-6 col-md-6 col-sm-6 col-12",
                              staticStyle: { display: "none" },
                              attrs: { id: "stepOneDivTwoResago" }
                            },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", [
                                  _vm._v(
                                    "\n                                                    Cantidad *\n                                                "
                                  )
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.cant_activo_resago,
                                      expression: "cant_activo_resago"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  staticStyle: { width: "100%" },
                                  attrs: { name: "", type: "number" },
                                  domProps: { value: _vm.cant_activo_resago },
                                  on: {
                                    keyup: function($event) {
                                      $event.preventDefault()
                                      return _vm.deleteError($event)
                                    },
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.cant_activo_resago =
                                        $event.target.value
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _vm._m(12)
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", [
                                  _vm._v(
                                    "\n                                                    Fecha puesta en marcha *\n                                                "
                                  )
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.fecha_puesta_marcha,
                                      expression: "fecha_puesta_marcha"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: { name: "", type: "date" },
                                  domProps: { value: _vm.fecha_puesta_marcha },
                                  on: {
                                    change: function($event) {
                                      $event.preventDefault()
                                      return _vm.deleteError($event)
                                    },
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.fecha_puesta_marcha =
                                        $event.target.value
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _vm._m(13)
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", [
                                  _vm._v(
                                    "\n                                                    Valor estimado *\n                                                "
                                  )
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.valor_estimado,
                                      expression: "valor_estimado"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  staticStyle: { width: "100%" },
                                  attrs: { name: "", type: "number" },
                                  domProps: { value: _vm.valor_estimado },
                                  on: {
                                    keyup: function($event) {
                                      $event.preventDefault()
                                      return _vm.deleteError($event)
                                    },
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.valor_estimado = $event.target.value
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _vm._m(14)
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", [
                                  _vm._v(
                                    "\n                                                    PEP de puesta en marcha/origen\n                                                "
                                  )
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.pep_puesta_marcha,
                                      expression: "pep_puesta_marcha"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: { name: "", type: "text" },
                                  domProps: { value: _vm.pep_puesta_marcha },
                                  on: {
                                    keyup: function($event) {
                                      $event.preventDefault()
                                      return _vm.deleteError($event)
                                    },
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.pep_puesta_marcha =
                                        $event.target.value
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _vm._m(15)
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", [
                                  _vm._v(
                                    "\n                                                    Número de ework al pep asociado\n                                                "
                                  )
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.ework_pep_asociado,
                                      expression: "ework_pep_asociado"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: { name: "", type: "text" },
                                  domProps: { value: _vm.ework_pep_asociado },
                                  on: {
                                    keyup: function($event) {
                                      $event.preventDefault()
                                      return _vm.deleteError($event)
                                    },
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.ework_pep_asociado =
                                        $event.target.value
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _vm._m(16)
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "col-lg-6 col-md-6 col-sm-6 col-12",
                              attrs: { id: "stepOneDivTwo" }
                            },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", [
                                  _vm._v(
                                    "\n                                                    Área *\n                                                "
                                  )
                                ]),
                                _vm._v(" "),
                                _c(
                                  "select",
                                  {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.areaId,
                                        expression: "areaId"
                                      }
                                    ],
                                    staticClass: "form-control select",
                                    attrs: { id: "areas", name: "area" },
                                    on: {
                                      change: [
                                        function($event) {
                                          var $$selectedVal = Array.prototype.filter
                                            .call(
                                              $event.target.options,
                                              function(o) {
                                                return o.selected
                                              }
                                            )
                                            .map(function(o) {
                                              var val =
                                                "_value" in o
                                                  ? o._value
                                                  : o.value
                                              return val
                                            })
                                          _vm.areaId = $event.target.multiple
                                            ? $$selectedVal
                                            : $$selectedVal[0]
                                        },
                                        function($event) {
                                          $event.preventDefault()
                                          return _vm.deleteError($event)
                                        },
                                        _vm.tecnica
                                      ]
                                    }
                                  },
                                  _vm._l(_vm.areas, function(area) {
                                    return _c(
                                      "option",
                                      { domProps: { value: area.id } },
                                      [
                                        _vm._v(
                                          "\n                                                        " +
                                            _vm._s(area.descripcion) +
                                            "\n                                                    "
                                        )
                                      ]
                                    )
                                  }),
                                  0
                                ),
                                _vm._v(" "),
                                _vm._m(17)
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", { attrs: { for: "fechaInicio" } }, [
                                  _vm._v(
                                    "\n                                                    Técnica *\n                                                "
                                  )
                                ]),
                                _vm._v(" "),
                                _c(
                                  "select",
                                  {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.tecnicaId,
                                        expression: "tecnicaId"
                                      }
                                    ],
                                    staticClass: "form-control select",
                                    attrs: { id: "tecnicas", name: "tecnica" },
                                    on: {
                                      change: [
                                        function($event) {
                                          var $$selectedVal = Array.prototype.filter
                                            .call(
                                              $event.target.options,
                                              function(o) {
                                                return o.selected
                                              }
                                            )
                                            .map(function(o) {
                                              var val =
                                                "_value" in o
                                                  ? o._value
                                                  : o.value
                                              return val
                                            })
                                          _vm.tecnicaId = $event.target.multiple
                                            ? $$selectedVal
                                            : $$selectedVal[0]
                                        },
                                        function($event) {
                                          $event.preventDefault()
                                          return _vm.deleteError($event)
                                        },
                                        _vm.equipo
                                      ]
                                    }
                                  },
                                  _vm._l(_vm.tecnicas, function(tecnica) {
                                    return _c(
                                      "option",
                                      { domProps: { value: tecnica.id } },
                                      [
                                        _vm._v(
                                          "\n                                                        " +
                                            _vm._s(tecnica.descripcion) +
                                            "\n                                                    "
                                        )
                                      ]
                                    )
                                  }),
                                  0
                                ),
                                _vm._v(" "),
                                _vm._m(18)
                              ]),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "form-group",
                                  attrs: { id: "equiposId" }
                                },
                                [
                                  _c(
                                    "label",
                                    { attrs: { for: "fechaInicio" } },
                                    [
                                      _vm._v(
                                        "\n                                                    Equipos *\n                                                "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "select",
                                    {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.equipoId,
                                          expression: "equipoId"
                                        }
                                      ],
                                      staticClass: "form-control select",
                                      attrs: { id: "equipo", name: "equipo" },
                                      on: {
                                        change: [
                                          function($event) {
                                            var $$selectedVal = Array.prototype.filter
                                              .call(
                                                $event.target.options,
                                                function(o) {
                                                  return o.selected
                                                }
                                              )
                                              .map(function(o) {
                                                var val =
                                                  "_value" in o
                                                    ? o._value
                                                    : o.value
                                                return val
                                              })
                                            _vm.equipoId = $event.target
                                              .multiple
                                              ? $$selectedVal
                                              : $$selectedVal[0]
                                          },
                                          function($event) {
                                            $event.preventDefault()
                                            return _vm.deleteError($event)
                                          }
                                        ]
                                      }
                                    },
                                    _vm._l(_vm.equipos, function(equipo) {
                                      return _c(
                                        "option",
                                        { domProps: { value: equipo.id } },
                                        [
                                          _vm._v(
                                            "\n                                                        " +
                                              _vm._s(equipo.descripcion) +
                                              "\n                                                    "
                                          )
                                        ]
                                      )
                                    }),
                                    0
                                  ),
                                  _vm._v(" "),
                                  _vm._m(19)
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "form-group",
                                  staticStyle: { display: "none" },
                                  attrs: { id: "CantidadEquipo" }
                                },
                                [
                                  _c("label", [
                                    _vm._v(
                                      "\n                                                    Cantidad *\n                                                "
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.cantidadEquipo,
                                        expression: "cantidadEquipo"
                                      }
                                    ],
                                    staticClass: "form-control",
                                    staticStyle: { width: "100%" },
                                    attrs: { name: "cantidad", type: "number" },
                                    domProps: { value: _vm.cantidadEquipo },
                                    on: {
                                      keyup: function($event) {
                                        $event.preventDefault()
                                        return _vm.deleteError($event)
                                      },
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.cantidadEquipo = $event.target.value
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _vm._m(20)
                                ]
                              )
                            ]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "row" }, [
                        _c(
                          "div",
                          {
                            staticClass: "col-lg-6 col-md-6 col-sm-6 col-12",
                            staticStyle: { display: "none" },
                            attrs: { id: "stepTwoneDivOne" }
                          },
                          [
                            _c("div", { staticClass: "form-group" }, [
                              _c(
                                "div",
                                {
                                  staticClass: "file-upload",
                                  staticStyle: {
                                    "margin-top": "-20px",
                                    width: "90%",
                                    "margin-left": ""
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "image-upload-wrap" },
                                    [
                                      _c("input", {
                                        ref: "cotizaciones",
                                        staticClass: "file-upload-input",
                                        attrs: {
                                          id: "cotizaciones",
                                          multiple: "",
                                          type: "file"
                                        },
                                        on: {
                                          change: function($event) {
                                            return _vm.handleFileUploads()
                                          }
                                        }
                                      }),
                                      _vm._v(" "),
                                      _vm._m(21)
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _vm._l(_vm.cotizaciones, function(file, key) {
                                    return _c(
                                      "div",
                                      { staticClass: "file-listing " },
                                      [
                                        _c("div", [
                                          _c("div", {
                                            staticStyle: { "margin-top": "8px" }
                                          }),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge ",
                                              staticStyle: {
                                                "border-radius": "5px",
                                                "background-color": "#015dff",
                                                color: "white"
                                              }
                                            },
                                            [
                                              _vm._v(
                                                "\n                                                            " +
                                                  _vm._s(file.name) +
                                                  "\n                                                            "
                                              ),
                                              _c(
                                                "a",
                                                {
                                                  attrs: { href: "#" },
                                                  on: {
                                                    click: function($event) {
                                                      return _vm.removeFileCotizaciones(
                                                        key
                                                      )
                                                    }
                                                  }
                                                },
                                                [
                                                  _c("i", {
                                                    staticClass:
                                                      "fas fa-times-circle boxBounce",
                                                    staticStyle: {
                                                      color: "white"
                                                    }
                                                  })
                                                ]
                                              )
                                            ]
                                          )
                                        ])
                                      ]
                                    )
                                  })
                                ],
                                2
                              )
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "form-group" }, [
                              _c(
                                "div",
                                {
                                  staticClass: "file-upload",
                                  staticStyle: {
                                    "margin-top": "-20px",
                                    width: "90%",
                                    "margin-left": ""
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "image-upload-wrap" },
                                    [
                                      _c("input", {
                                        ref: "lpu",
                                        staticClass: "file-upload-input",
                                        attrs: {
                                          id: "lpu",
                                          multiple: "",
                                          type: "file"
                                        },
                                        on: {
                                          change: function($event) {
                                            return _vm.handleLpuUploads()
                                          }
                                        }
                                      }),
                                      _vm._v(" "),
                                      _vm._m(22)
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _vm._l(_vm.lpu, function(file, key) {
                                    return _c(
                                      "div",
                                      { staticClass: "file-listing " },
                                      [
                                        _c("div", [
                                          _c("div", {
                                            staticStyle: { "margin-top": "8px" }
                                          }),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge ",
                                              staticStyle: {
                                                "border-radius": "5px",
                                                "background-color": "#015dff",
                                                color: "white"
                                              }
                                            },
                                            [
                                              _vm._v(
                                                "\n                                                            " +
                                                  _vm._s(file.name) +
                                                  "\n                                                            "
                                              ),
                                              _c(
                                                "a",
                                                {
                                                  attrs: { href: "#" },
                                                  on: {
                                                    click: function($event) {
                                                      return _vm.removeFileLpu(
                                                        key
                                                      )
                                                    }
                                                  }
                                                },
                                                [
                                                  _c("i", {
                                                    staticClass:
                                                      "fas fa-times-circle boxBounce",
                                                    staticStyle: {
                                                      color: "white"
                                                    }
                                                  })
                                                ]
                                              )
                                            ]
                                          )
                                        ])
                                      ]
                                    )
                                  })
                                ],
                                2
                              )
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "form-group" }, [
                              _c(
                                "div",
                                {
                                  staticClass: "file-upload",
                                  staticStyle: {
                                    "margin-top": "-20px",
                                    width: "90%",
                                    "margin-left": ""
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "image-upload-wrap" },
                                    [
                                      _c("input", {
                                        ref: "checklist",
                                        staticClass: "file-upload-input",
                                        attrs: {
                                          id: "checklist",
                                          multiple: "",
                                          type: "file"
                                        },
                                        on: {
                                          change: function($event) {
                                            return _vm.handleChecklistUploads()
                                          }
                                        }
                                      }),
                                      _vm._v(" "),
                                      _vm._m(23)
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _vm._l(_vm.checklist, function(file, key) {
                                    return _c(
                                      "div",
                                      { staticClass: "file-listing " },
                                      [
                                        _c("div", [
                                          _c("div", {
                                            staticStyle: { "margin-top": "8px" }
                                          }),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge ",
                                              staticStyle: {
                                                "border-radius": "5px",
                                                "background-color": "#015dff",
                                                color: "white"
                                              }
                                            },
                                            [
                                              _vm._v(
                                                "\n                                                            " +
                                                  _vm._s(file.name) +
                                                  "\n                                                            "
                                              ),
                                              _c(
                                                "a",
                                                {
                                                  attrs: { href: "#" },
                                                  on: {
                                                    click: function($event) {
                                                      return _vm.removeFileCheckList(
                                                        key
                                                      )
                                                    }
                                                  }
                                                },
                                                [
                                                  _c("i", {
                                                    staticClass:
                                                      "fas fa-times-circle boxBounce",
                                                    staticStyle: {
                                                      color: "white"
                                                    }
                                                  })
                                                ]
                                              )
                                            ]
                                          )
                                        ])
                                      ]
                                    )
                                  })
                                ],
                                2
                              )
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "col-lg-6 col-md-6 col-sm-6 col-12",
                            staticStyle: { display: "none" },
                            attrs: { id: "stepTwoneDivTwo" }
                          },
                          [
                            _c("div", { staticClass: "form-group" }, [
                              _c(
                                "div",
                                {
                                  staticClass: "file-upload",
                                  staticStyle: {
                                    "margin-top": "-20px",
                                    width: "90%",
                                    "margin-left": ""
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "image-upload-wrap" },
                                    [
                                      _c("input", {
                                        ref: "pxqs",
                                        staticClass: "file-upload-input",
                                        attrs: {
                                          id: "pxqs",
                                          multiple: "",
                                          type: "file"
                                        },
                                        on: {
                                          change: function($event) {
                                            return _vm.handleFileUploadsPxq()
                                          }
                                        }
                                      }),
                                      _vm._v(" "),
                                      _vm._m(24)
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _vm._l(_vm.pxqs, function(file, key) {
                                    return _c(
                                      "div",
                                      { staticClass: "file-listing " },
                                      [
                                        _c("div", [
                                          _c("div", {
                                            staticStyle: { "margin-top": "8px" }
                                          }),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge ",
                                              staticStyle: {
                                                "border-radius": "5px",
                                                "background-color": "#015dff",
                                                color: "white"
                                              }
                                            },
                                            [
                                              _vm._v(
                                                "\n                                                            " +
                                                  _vm._s(file.name) +
                                                  "\n                                                            "
                                              ),
                                              _c(
                                                "a",
                                                {
                                                  attrs: { href: "#" },
                                                  on: {
                                                    click: function($event) {
                                                      return _vm.removeFilePxQ(
                                                        key
                                                      )
                                                    }
                                                  }
                                                },
                                                [
                                                  _c("i", {
                                                    staticClass:
                                                      "fas fa-times-circle boxBounce",
                                                    staticStyle: {
                                                      color: "white"
                                                    }
                                                  })
                                                ]
                                              )
                                            ]
                                          )
                                        ])
                                      ]
                                    )
                                  })
                                ],
                                2
                              )
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "form-group" }, [
                              _c(
                                "div",
                                {
                                  staticClass: "file-upload",
                                  staticStyle: {
                                    "margin-top": "-20px",
                                    width: "90%",
                                    "margin-left": ""
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "image-upload-wrap" },
                                    [
                                      _c("input", {
                                        ref: "informefotografico",
                                        staticClass: "file-upload-input",
                                        attrs: {
                                          id: "informefotografico",
                                          multiple: "",
                                          type: "file"
                                        },
                                        on: {
                                          change: function($event) {
                                            return _vm.handleFileUploadsInformefotografico()
                                          }
                                        }
                                      }),
                                      _vm._v(" "),
                                      _vm._m(25)
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _vm._l(_vm.informefotografico, function(
                                    file,
                                    key
                                  ) {
                                    return _c(
                                      "div",
                                      { staticClass: "file-listing " },
                                      [
                                        _c("div", [
                                          _c("div", {
                                            staticStyle: { "margin-top": "8px" }
                                          }),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge ",
                                              staticStyle: {
                                                "border-radius": "5px",
                                                "background-color": "#015dff",
                                                color: "white"
                                              }
                                            },
                                            [
                                              _vm._v(
                                                "\n                                                            " +
                                                  _vm._s(file.name) +
                                                  "\n                                                            "
                                              ),
                                              _c(
                                                "a",
                                                {
                                                  attrs: { href: "#" },
                                                  on: {
                                                    click: function($event) {
                                                      return _vm.removeFileInformefotografico(
                                                        key
                                                      )
                                                    }
                                                  }
                                                },
                                                [
                                                  _c("i", {
                                                    staticClass:
                                                      "fas fa-times-circle boxBounce",
                                                    staticStyle: {
                                                      color: "white"
                                                    }
                                                  })
                                                ]
                                              )
                                            ]
                                          )
                                        ])
                                      ]
                                    )
                                  })
                                ],
                                2
                              )
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "form-group" }, [
                              _c(
                                "div",
                                {
                                  staticClass: "file-upload",
                                  staticStyle: {
                                    "margin-top": "-20px",
                                    width: "90%",
                                    "margin-left": ""
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "image-upload-wrap" },
                                    [
                                      _c("input", {
                                        ref: "docdenuncia",
                                        staticClass: "file-upload-input",
                                        attrs: {
                                          id: "docdenuncia",
                                          multiple: "",
                                          type: "file"
                                        },
                                        on: {
                                          change: function($event) {
                                            return _vm.handleFileUploadsDocdenuncia()
                                          }
                                        }
                                      }),
                                      _vm._v(" "),
                                      _vm._m(26)
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _vm._l(_vm.docdenuncia, function(file, key) {
                                    return _c(
                                      "div",
                                      { staticClass: "file-listing " },
                                      [
                                        _c("div", [
                                          _c("div", {
                                            staticStyle: { "margin-top": "8px" }
                                          }),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge ",
                                              staticStyle: {
                                                "border-radius": "5px",
                                                "background-color": "#015dff",
                                                color: "white"
                                              }
                                            },
                                            [
                                              _vm._v(
                                                "\n                                                            " +
                                                  _vm._s(file.name) +
                                                  "\n                                                            "
                                              ),
                                              _c(
                                                "a",
                                                {
                                                  attrs: { href: "#" },
                                                  on: {
                                                    click: function($event) {
                                                      return _vm.removeFileDocdenuncia(
                                                        key
                                                      )
                                                    }
                                                  }
                                                },
                                                [
                                                  _c("i", {
                                                    staticClass:
                                                      "fas fa-times-circle boxBounce",
                                                    staticStyle: {
                                                      color: "white"
                                                    }
                                                  })
                                                ]
                                              )
                                            ]
                                          )
                                        ])
                                      ]
                                    )
                                  })
                                ],
                                2
                              )
                            ])
                          ]
                        )
                      ]),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "col-lg-12 col-md-6 col-sm-6 col-12",
                          staticStyle: { display: "none" },
                          attrs: { id: "progressBarFileUpoad" }
                        },
                        [
                          _vm._m(27),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "progress mb-3 ",
                              attrs: { "data-height": "25" }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass: "progress-bar bg-info",
                                  style: "width:" + _vm.getProgress,
                                  attrs: {
                                    "aria-valuemax": "100",
                                    "aria-valuemin": "0",
                                    "aria-valuenow": "100",
                                    role: "progressbar"
                                  }
                                },
                                [
                                  _vm.getProgress == "NaN%"
                                    ? _c("div")
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _vm.getProgress != "NaN%"
                                    ? _c("div", [
                                        _vm._v(
                                          "\n                                                " +
                                            _vm._s(_vm.getProgress) +
                                            "\n                                            "
                                        )
                                      ])
                                    : _vm._e()
                                ]
                              )
                            ]
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c("div", { staticClass: "modal-footer" }, [
                        _c(
                          "a",
                          {
                            staticClass: "btn btn-icon icon-left btn-info",
                            staticStyle: { display: "none" },
                            attrs: { href: "#", id: "backStep1" },
                            on: {
                              click: function($event) {
                                $event.preventDefault()
                                return _vm.BackStepOne()
                              }
                            }
                          },
                          [
                            _c("i", { staticClass: "fas fa-arrow-left" }),
                            _vm._v(
                              "\n                                        Atrás\n                                    "
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "a",
                          {
                            staticClass: "btn btn-icon icon-right btn-info",
                            attrs: { href: "#", id: "btnNextStepOne" },
                            on: {
                              click: function($event) {
                                $event.preventDefault()
                                return _vm.ValidateFormTicektStepOne()
                              }
                            }
                          },
                          [
                            _vm._v(
                              "\n                                        Siguiente\n                                        "
                            ),
                            _c("i", { staticClass: "fas fa-arrow-right" })
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "a",
                          {
                            staticClass: "btn btn-icon icon-right btn-info",
                            staticStyle: { display: "none" },
                            attrs: { href: "#", id: "btnCreateTicket" },
                            on: {
                              click: function($event) {
                                $event.preventDefault()
                                return _vm.CreateTicket()
                              }
                            }
                          },
                          [
                            _vm._v(
                              "\n                                        Finalizar\n                                        "
                            ),
                            _c("i", { staticClass: "fas fa-arrow-right" })
                          ]
                        )
                      ])
                    ])
                  ])
                ]
              )
            ])
          ])
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "modal-header",
        staticStyle: {
          background: "-webkit-linear-gradient(rgb(0, 92, 255), #007bff99)",
          height: "70px"
        }
      },
      [
        _c(
          "h5",
          { staticClass: "modal-title", staticStyle: { color: "white" } },
          [
            _vm._v(
              "\n                                Formulario creación de ticket\n                            "
            )
          ]
        ),
        _vm._v(" "),
        _c(
          "button",
          {
            staticClass: "close",
            attrs: {
              "aria-label": "Close",
              "data-dismiss": "modal",
              type: "button"
            }
          },
          [
            _c(
              "span",
              {
                staticStyle: { color: "white" },
                attrs: { "aria-hidden": "true" }
              },
              [
                _vm._v(
                  "\n                                    ×\n                                "
                )
              ]
            )
          ]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "wizard-step-icon" }, [
      _c("i", { staticClass: "fas fa-ticket-alt" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "wizard-step-icon" }, [
      _c("i", { staticClass: "fas fa-file-upload" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group-append" }, [
      _c("div", { staticClass: "input-group-text" }, [
        _c("i", { staticClass: "fas fa-search" })
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticStyle: { display: "none" }, attrs: { id: "errorPop" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                                Favor Seleccionar el sitio\n                                                            "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticStyle: { display: "none" }, attrs: { id: "errorMotivo" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                        Favor seleccionar el Motivo\n                                                    "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: { display: "none" },
        attrs: { id: "errortipoMantencion" }
      },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                        Favor seleccionar el Tipo de mantención\n                                                    "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticStyle: { display: "none" }, attrs: { id: "errorDescripcion" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                        Favor indicar una descripción\n                                                    "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticStyle: { display: "none" }, attrs: { id: "errorantiguedad" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                            Favor seleccionar la antigüedad\n                                                        "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: { display: "none" },
        attrs: { id: "errorEquipoMaterial" }
      },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                            Favor seleccionar el equipo o material\n                                                        "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticStyle: { display: "none" }, attrs: { id: "errorDescActivo" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                            Favor indicar la descripción del activo\n                                                        "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticStyle: { display: "none" }, attrs: { id: "errorCodSapActivo" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                            Favor indicar el codigo sap\n                                                        "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: { display: "none" },
        attrs: { id: "errorCAntidadActivoResago" }
      },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                        Favor indicar la cantidad\n                                                    "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticStyle: { display: "none" }, attrs: { id: "errorFechaResago" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                        Favor indicar la fecha\n                                                    "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticStyle: { display: "none" }, attrs: { id: "errorValorEstimado" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                        Favor indicar el valor estimado\n                                                    "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticStyle: { display: "none" }, attrs: { id: "errorPepOrigen" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                        Favor indicar el PEP\n                                                    "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticStyle: { display: "none" }, attrs: { id: "errorEworkResago" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                        Favor indicar el n° de ework\n                                                    "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticStyle: { display: "none" }, attrs: { id: "errorArea" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                        Favor seleccionar el área\n                                                    "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticStyle: { display: "none" }, attrs: { id: "errorTecnica" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                        Favor seleccionar la Tecnia\n                                                    "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticStyle: { display: "none" }, attrs: { id: "errorEquipo" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                        Favor seleccionar el equipo\n                                                    "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: { display: "none" },
        attrs: { id: "errorCantidadEquipo" }
      },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                            Favor Indicar la Cantidad\n                                                        "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "drag-text" }, [
      _c("h2", { staticStyle: { "font-size": "20px" } }, [
        _vm._v(
          "\n                                                            Cotizaciones\n                                                        "
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "drag-text" }, [
      _c("h2", { staticStyle: { "font-size": "20px" } }, [
        _vm._v(
          "\n                                                            Lpu\n                                                        "
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "drag-text" }, [
      _c("h2", { staticStyle: { "font-size": "20px" } }, [
        _vm._v(
          "\n                                                            Chek list\n                                                        "
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "drag-text" }, [
      _c("h2", { staticStyle: { "font-size": "18px" } }, [
        _vm._v(
          "\n                                                            PXQ\n                                                        "
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "drag-text" }, [
      _c("h2", { staticStyle: { "font-size": "20px" } }, [
        _vm._v(
          "\n                                                            Imagenes\n                                                            "
        ),
        _c("small", [
          _vm._v(
            "\n                                                                (informe fotográfico)\n                                                            "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "drag-text" }, [
      _c("h2", { staticStyle: { "font-size": "20px" } }, [
        _vm._v(
          "\n                                                            Documento denuncia\n                                                        "
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-title" }, [
      _c("h2", { staticStyle: { "font-size": "20px" } }, [
        _vm._v(
          "\n                                            Subiendo archivos...\n                                        "
        )
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/baglog.vue":
/*!********************************************!*\
  !*** ./resources/js/components/baglog.vue ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _baglog_vue_vue_type_template_id_d49ec372___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./baglog.vue?vue&type=template&id=d49ec372& */ "./resources/js/components/baglog.vue?vue&type=template&id=d49ec372&");
/* harmony import */ var _baglog_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./baglog.vue?vue&type=script&lang=js& */ "./resources/js/components/baglog.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _baglog_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _baglog_vue_vue_type_template_id_d49ec372___WEBPACK_IMPORTED_MODULE_0__["render"],
  _baglog_vue_vue_type_template_id_d49ec372___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/baglog.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/baglog.vue?vue&type=script&lang=js&":
/*!*********************************************************************!*\
  !*** ./resources/js/components/baglog.vue?vue&type=script&lang=js& ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_baglog_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./baglog.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/baglog.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_baglog_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/baglog.vue?vue&type=template&id=d49ec372&":
/*!***************************************************************************!*\
  !*** ./resources/js/components/baglog.vue?vue&type=template&id=d49ec372& ***!
  \***************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_baglog_vue_vue_type_template_id_d49ec372___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./baglog.vue?vue&type=template&id=d49ec372& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/baglog.vue?vue&type=template&id=d49ec372&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_baglog_vue_vue_type_template_id_d49ec372___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_baglog_vue_vue_type_template_id_d49ec372___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/formulario.vue":
/*!************************************************!*\
  !*** ./resources/js/components/formulario.vue ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _formulario_vue_vue_type_template_id_4c848506___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./formulario.vue?vue&type=template&id=4c848506& */ "./resources/js/components/formulario.vue?vue&type=template&id=4c848506&");
/* harmony import */ var _formulario_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./formulario.vue?vue&type=script&lang=js& */ "./resources/js/components/formulario.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _formulario_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _formulario_vue_vue_type_template_id_4c848506___WEBPACK_IMPORTED_MODULE_0__["render"],
  _formulario_vue_vue_type_template_id_4c848506___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/formulario.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/formulario.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/components/formulario.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_formulario_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./formulario.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/formulario.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_formulario_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/formulario.vue?vue&type=template&id=4c848506&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/formulario.vue?vue&type=template&id=4c848506& ***!
  \*******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_formulario_vue_vue_type_template_id_4c848506___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./formulario.vue?vue&type=template&id=4c848506& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/formulario.vue?vue&type=template&id=4c848506&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_formulario_vue_vue_type_template_id_4c848506___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_formulario_vue_vue_type_template_id_4c848506___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
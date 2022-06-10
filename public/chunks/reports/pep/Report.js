(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunks/reports/pep/Report"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/reports/Pagination.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/reports/Pagination.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
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

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/reports/pep/BaseReporte.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/reports/pep/BaseReporte.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_1__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    return {
      data: {
        'total': 0,
        'current_page': 1,
        'per_page': 10,
        'from': 2,
        'to': 0
      },
      load: false,
      load_excel: false,
      heads: [],
      column_select: [],
      name_layout: '',
      layouts: [],
      layout_id: '',
      layout_name: ''
    };
  },
  created: function created() {
    this.getData();
  },
  mounted: function mounted() {// let self = this;
    // this.$eventBus.$on('get-data-base-reporte', function () {
    //     self.getData();
    // });
  },
  methods: {
    getData: function getData() {
      var _this = this;

      this.load = true;
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/data/base/report?page=".concat(this.data.current_page)).then(function (response) {
        _this.data = response.data;
        _this.load = false;
      });
    },
    updateData: function updateData() {
      var _this2 = this;

      this.load = true;
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/update/data/base/report').then(function (response) {
        _this2.getData();
      });
    },
    exportExcelData: function exportExcelData() {
      var _this3 = this;

      if (this.layout_id != "") {
        $("#layoutsAll").modal("hide");
        this.load_excel = true;
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/excel/export/base/report/' + this.layout_id, {
          responseType: 'arraybuffer'
        }).then(function (response) {
          var blob = new Blob([response.data], {
            type: 'application/xlsx'
          });

          if (window.navigator && window.navigator.msSaveOrOpenBlob) {
            window.navigator.msSaveOrOpenBlob(newBlob);
            return;
          }

          var data = window.URL.createObjectURL(blob);
          var link = document.createElement('a');
          link.href = data;
          link.download = _this3.layout_name + '_' + moment__WEBPACK_IMPORTED_MODULE_1___default()().format('YYYY-MM-DD hh:mm:ss') + '.xlsx';
          link.click();
          _this3.load_excel = false;

          _this3.message('success', 'Éxito al descargar', 'Su reporte  ' + '"' + _this3.layout_name + '"' + ' fue generado exitosamente');

          _this3.layout_id = '';
          _this3.layout_name = '';
        })["catch"](function (error) {
          _this3.load_excel = false;

          _this3.message('error', 'Error', 'Se produjo un error inesperado al generar el reporte, favor contactar con soporte');
        });
      }
    },
    toastFunction: function toastFunction(messaje) {
      var Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        onOpen: function onOpen(toast) {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
      });
      Toast.fire({
        type: 'success',
        title: messaje
      });
    },
    getDataHead: function getDataHead() {
      var _this4 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/base/report/name/tabs/layout').then(function (response) {
        _this4.heads = response.data;
      });
    },
    selectColumn: function selectColumn(column) {
      var check = document.getElementById("columName" + column.id);

      if (check.checked) {
        this.column_select.push({
          column_id: column.id
        });
      } else {
        var filter = this.column_select.filter(function (item) {
          return item.column_id != column.id;
        });
        this.column_select = filter;
      }
    },
    saveLayout: function saveLayout() {
      var _this5 = this;

      if (this.name_layout != "" && this.column_select.length != 0) {
        var formData = new FormData();
        formData.append('name_layout', this.name_layout);
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/create/layout/base/report', formData).then(function (response) {
          $("#modalCreateLayout").modal("hide");

          _this5.message('success', 'Éxito', 'Layout creado');

          var layout_id = response.data;

          for (var index = 0; index < _this5.column_select.length; index++) {
            var element = _this5.column_select[index];

            var _formData = new FormData();

            _formData.append('column_id', element.column_id);

            _formData.append('layout_id', layout_id);

            axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/register/columns/layout', _formData).then(function (response) {
              _this5.column_select = [];
              _this5.name_layout = '';
            });
          }
        });
      }
    },
    getLayouts: function getLayouts() {
      var _this6 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/get/layouts/created').then(function (response) {
        _this6.layouts = response.data;
      });
    },
    selectLayout: function selectLayout(layout) {
      this.layout_id = layout.id;
      this.layout_name = layout.name_layout;
    },
    message: function message(Type, Title, Text) {
      Swal.fire({
        type: Type,
        title: Title,
        text: Text
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/reports/pep/Report.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/reports/pep/Report.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _BaseReporte_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./BaseReporte.vue */ "./resources/js/components/reports/pep/BaseReporte.vue");
/* harmony import */ var _Pagination_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../Pagination.vue */ "./resources/js/components/reports/Pagination.vue");
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




/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    'vue-pagination': _Pagination_vue__WEBPACK_IMPORTED_MODULE_3__["default"],
    base_reporte: function base_reporte() {
      return Promise.resolve(/*! import() */).then(__webpack_require__.bind(null, /*! ./BaseReporte */ "./resources/js/components/reports/pep/BaseReporte.vue"));
    }
  },
  data: function data() {
    var _ref;

    return _ref = {
      current_tab: null,
      load: false,
      tabs: [{
        id: 1,
        name: 'DD SAP',
        url: '/dd/sap/data'
      }, {
        id: 2,
        name: 'Inf. Apertura SAP',
        url: '/opening/report/data'
      }, {
        id: 3,
        name: 'SAP',
        url: ''
      }, {
        id: 4,
        name: 'Detalle PPTO',
        url: ''
      }, {
        id: 5,
        name: 'Ework',
        url: ''
      }, {
        id: 6,
        name: 'OC sin facturar',
        url: ''
      }, {
        id: 7,
        name: 'Baterías en estado 11',
        url: ''
      }, {
        id: 8,
        name: 'Consolidado',
        url: ''
      }],
      data_head: null,
      data_t_body: {
        'total': 0,
        'current_page': 1,
        'per_page': 10,
        'from': 2,
        'to': 0
      },
      options_tab: [{
        id: 1,
        name: 'Importar Excel',
        "class": 'fas fa-upload',
        metod: 1
      }, {
        id: 1,
        name: 'Formato Excel',
        "class": 'fas fa-download',
        metod: 2,
        rute_file: 'Formatos_reporte/formato_dd_sap.xlsx',
        name_file: 'formato_dd_sap.xlsx'
      }, {
        id: 2,
        name: 'Importar Excel',
        "class": 'fas fa-upload',
        metod: 1
      }, {
        id: 3,
        name: 'Importal Excel',
        "class": 'fas fa-upload',
        metod: 1
      }, {
        id: 3,
        name: "Formato Excel",
        "class": 'fas fa-download',
        metod: 2,
        rute_file: 'Formatos_reporte/formato_sap.xlsx',
        name_file: 'formato_sap.xlsx'
      }, {
        id: 4,
        name: 'Importal Excel',
        "class": 'fas fa-upload',
        metod: 1
      }, {
        id: 5,
        name: 'Importal Excel',
        "class": 'fas fa-upload',
        metod: 1
      }, {
        id: 6,
        name: 'Importal Excel',
        "class": 'fas fa-upload',
        metod: 1
      }, {
        id: 7,
        name: 'Importal Excel',
        "class": 'fas fa-upload',
        metod: 1
      }, {
        id: 7,
        name: 'Formato Excel',
        "class": 'fas fa-download',
        metod: 2,
        rute_file: 'Formatos_reporte/formato_baterias_estado_11.xlsx',
        name_file: 'formato_baterias_estado_11.xlsx'
      }],
      options_tab_select: null,
      file: '',
      document_url: '',
      url_prod: 'http://172.16.100.112/',
      url_dev: 'http://127.0.0.1:8000/'
    }, _defineProperty(_ref, "load", false), _defineProperty(_ref, "tab", ''), _defineProperty(_ref, "extensions", []), _ref;
  },
  created: function created() {
    this.getExtensions();
  },
  methods: {
    selectTab: function selectTab(tab) {
      this.options_tab_select = this.options_tab.filter(function (obj) {
        return obj.id == tab.id;
      });
      this.current_tab = tab;
      this.load = true;
      this.data_t_body.current_page = 1;
      this.tab = tab.id;

      if (tab.id != 8) {
        this.getData();
      }
    },
    getExtensions: function getExtensions() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/repositorio/extensions').then(function (response) {
        _this.extensions = response.data;
      });
    },
    getData: function getData() {
      var _this2 = this;

      var url_get = '/report/data/' + this.current_tab.id + "?page=".concat(this.data_t_body.current_page);
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get(url_get).then(function (response) {
        _this2.data_head = response.data.head;
        _this2.data_t_body = response.data.data;
        _this2.load = false;
      });
    },
    paginateData: function paginateData() {
      var _this3 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/report/data/" + this.current_tab.id + "?page=".concat(this.data_t_body.current_page)).then(function (response) {
        _this3.data_t_body = response.data.data;
      });
    },
    moneyFormat: function moneyFormat(value) {
      if (value % 1 == 0) {
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      } else {
        var val = (value / 1).toFixed(2).replace('.', ',');
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }
    },
    selecOption: function selecOption(option) {
      if (option.metod == 1) {
        document.getElementById("file").click();
      } else {
        if (option.metod == 2) {
          this.downloadFile(option);
        }
      }
    },
    uploadFle: function uploadFle(e) {
      var _this4 = this;

      var file = e.target.files[0];
      this.file = file;
      var file_extension = file.name.split(".").pop();
      var extension_permited = this.extensions.find(function (obj) {
        return obj.extension == file_extension;
      });

      if (extension_permited) {
        var formData = new FormData();
        formData.append('file', this.file);
        formData.append('current_tab', this.current_tab.id);
        this.load = !this.load;
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/upload/data/pep/report', formData).then(function (response) {
          console.log(response.data);
          $("#file").val('');
          _this4.file = '';
          _this4.load = !_this4.load;
        })["finally"](function () {
          return _this4.paginateData();
        })["catch"](function (error) {
          _this4.load = !_this4.load;
          _this4.file = '';

          _this4.alert('error', 'Error', 'Se produjo un error al importar los datos, favor contactar con soporte.');
        });
      } else {
        this.alert('error', 'Error de archivo', 'El tipo de archivo selecionado no esta permitido.');
      }
    },
    downloadFile: function downloadFile(option) {
      axios__WEBPACK_IMPORTED_MODULE_0___default()({
        url: this.url_prod + option.rute_file,
        method: 'GET',
        responseType: 'blob'
      }).then(function (response) {
        var url = window.URL.createObjectURL(new Blob([response.data]));
        var link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', option.name_file);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      });
    },
    dateFormat: function dateFormat(d) {
      return moment__WEBPACK_IMPORTED_MODULE_1___default()(d).format("DD/MM/YYYY");
    },
    alert: function alert(Type, Title, Text) {
      Swal.fire({
        type: Type,
        title: Title,
        text: Text
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/reports/Pagination.vue?vue&type=template&id=79f47e95&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/reports/Pagination.vue?vue&type=template&id=79f47e95& ***!
  \*********************************************************************************************************************************************************************************************************************/
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/reports/pep/BaseReporte.vue?vue&type=template&id=1177e3c1&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/reports/pep/BaseReporte.vue?vue&type=template&id=1177e3c1& ***!
  \**************************************************************************************************************************************************************************************************************************/
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
  return _c("div", [
    _c("div", { staticClass: "card-header" }, [
      _c("div", { staticClass: "col-lg-10" }, [
        _c("div", { staticClass: "dropdown d-inline" }, [
          _c(
            "a",
            {
              staticClass: "font-weight-600 dropdown-toggle barlow bold",
              attrs: {
                "data-toggle": "dropdown",
                href: "#",
                id: "orders-month",
              },
            },
            [_vm._v("\n                    Opciones\n                ")]
          ),
          _vm._v(" "),
          _c("ul", { staticClass: "dropdown-menu dropdown-menu-sm" }, [
            _c("li", { staticClass: "dropdown-title barlow semi_bold" }, [
              _vm._v(
                "\n                        Selecione una opción\n                    "
              ),
            ]),
            _vm._v(" "),
            _c("li", [
              _c(
                "a",
                {
                  staticClass: "dropdown-item barlow regular",
                  attrs: { href: "#" },
                  on: {
                    click: function ($event) {
                      return _vm.updateData()
                    },
                  },
                },
                [
                  _c("i", { staticClass: "fas fa-sync" }),
                  _vm._v(
                    "\n\n                            Actualizar consolidado\n\n                        "
                  ),
                ]
              ),
            ]),
            _vm._v(" "),
            _c("li", [
              _c(
                "a",
                {
                  staticClass: "dropdown-item barlow regular",
                  attrs: { href: "#modalCreateLayout", "data-toggle": "modal" },
                  on: { click: _vm.getDataHead },
                },
                [
                  _c("i", { staticClass: "fas fa-bezier-curve" }),
                  _vm._v(
                    "\n\n                            Crear layout\n                        "
                  ),
                ]
              ),
            ]),
          ]),
        ]),
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "col-lg-2" }, [
        !_vm.load_excel
          ? _c(
              "button",
              {
                staticClass: "btn btn-primary barlow regular btn-block",
                staticStyle: { "border-radius": "5px" },
                attrs: { "data-toggle": "modal", "data-target": "#layoutsAll" },
                on: { click: _vm.getLayouts },
              },
              [_vm._v(" Generar reporte")]
            )
          : _vm._e(),
        _vm._v(" "),
        _vm.load_excel
          ? _c(
              "a",
              {
                staticClass: "btn disabled btn-primary btn-progress",
                staticStyle: { "border-radius": "5px" },
                attrs: { href: "#" },
              },
              [_vm._v("Progress")]
            )
          : _vm._e(),
      ]),
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "card-body p-0" }, [
      _c("div", { staticClass: "table-responsive" }, [
        _c("table", { staticClass: "table table-striped" }, [
          _vm._m(0),
          _vm._v(" "),
          !_vm.load
            ? _c(
                "tbody",
                _vm._l(_vm.data.data, function (d) {
                  return _c("tr", [
                    _c("td", {
                      staticStyle: { width: "250px" },
                      domProps: { textContent: _vm._s(d.pep) },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      staticStyle: { width: "150px" },
                      domProps: { textContent: _vm._s(d.inicio_extremo) },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      staticStyle: { width: "150px" },
                      domProps: { textContent: _vm._s(d.fin_extremo) },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      staticStyle: { width: "100px" },
                      domProps: { textContent: _vm._s(d.dias_vigencia) },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      staticStyle: { width: "50px" },
                      domProps: { textContent: _vm._s(d.mes) },
                    }),
                    _vm._v(" "),
                    _c("td", { domProps: { textContent: _vm._s(d.mes_n) } }),
                    _vm._v(" "),
                    _c("td", {
                      domProps: { textContent: _vm._s(d.ejecucion) },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      domProps: { textContent: _vm._s(d.observacion) },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      domProps: { textContent: _vm._s(d.estado_once) },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      domProps: {
                        textContent: _vm._s(d.cuenta_de_documento_compras),
                      },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      domProps: {
                        textContent: _vm._s(d.ework_id ? "data" : ""),
                      },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      domProps: {
                        textContent: _vm._s(d.ppto_sap == 0 ? "X" : ""),
                      },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      domProps: {
                        textContent: _vm._s(d.ework_id ? "data" : ""),
                      },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      domProps: {
                        textContent: _vm._s(d.ework_id ? "data" : ""),
                      },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      domProps: {
                        textContent: _vm._s(d.ework_id ? "data" : ""),
                      },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      domProps: {
                        textContent: _vm._s(d.ework_id ? "data" : ""),
                      },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      domProps: {
                        textContent: _vm._s(d.ework_id ? "data" : ""),
                      },
                    }),
                    _vm._v(" "),
                    _c("td", {
                      domProps: { textContent: _vm._s(d.estado_dd_sap) },
                    }),
                    _vm._v(" "),
                    _c("td", { domProps: { textContent: _vm._s(d.dif_ppto) } }),
                    _vm._v(" "),
                    _c("td", { domProps: { textContent: _vm._s(d.ppto_sap) } }),
                  ])
                }),
                0
              )
            : _vm._e(),
        ]),
        _vm._v(" "),
        _vm.load
          ? _c("div", { staticClass: "col-12 col-md-12 col-sm-12" }, [
              _vm._m(1),
            ])
          : _vm._e(),
      ]),
    ]),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "modal inmodal",
        attrs: {
          "aria-hidden": "true",
          id: "modalCreateLayout",
          role: "dialog",
          tabindex: "-1",
          "data-backdrop": "static",
        },
      },
      [
        _c("div", { staticClass: "modal-dialog modal-lg " }, [
          _c("div", { staticClass: "modal-content animated bounceInRight" }, [
            _vm._m(2),
            _vm._v(" "),
            _c("div", { staticClass: "modal-body" }, [
              _c(
                "h5",
                {
                  staticClass: "barlow semi_bold",
                  staticStyle: { "text-align": "center" },
                },
                [_vm._v("Columnas")]
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "row tck_suport mt-1" },
                _vm._l(_vm.heads, function (head) {
                  return _c("div", { staticClass: "col-lg-3" }, [
                    _c("div", { staticClass: "form-check form-check-inline" }, [
                      _c("input", {
                        staticClass: "form-check-input",
                        attrs: { type: "checkbox", id: "columName" + head.id },
                        on: {
                          click: function ($event) {
                            return _vm.selectColumn(head)
                          },
                        },
                      }),
                      _vm._v(" "),
                      _c(
                        "label",
                        {
                          staticClass: "form-check-label",
                          staticStyle: { "word-break": "break-all" },
                          attrs: { for: "inlineCheckbox1" },
                        },
                        [_vm._v(_vm._s(head.name_head))]
                      ),
                    ]),
                  ])
                }),
                0
              ),
              _vm._v(" "),
              _c("div", { staticClass: "form-group mt-5" }, [
                _c("label", [_vm._v("Nombre del Layout*")]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.name_layout,
                      expression: "name_layout",
                    },
                  ],
                  staticClass: "form-control",
                  attrs: { type: "text" },
                  domProps: { value: _vm.name_layout },
                  on: {
                    input: function ($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.name_layout = $event.target.value
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
                  staticClass: "btn btn-info ",
                  staticStyle: { color: "white" },
                  attrs: { href: "#" },
                  on: { click: _vm.saveLayout },
                },
                [
                  _vm._v(
                    "\n                        Guardar layout\n                    "
                  ),
                ]
              ),
            ]),
          ]),
        ]),
      ]
    ),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "modal inmodal",
        attrs: {
          "aria-hidden": "true",
          id: "layoutsAll",
          role: "dialog",
          tabindex: "-1",
          "data-backdrop": "static",
        },
      },
      [
        _c("div", { staticClass: "modal-dialog  " }, [
          _c("div", { staticClass: "modal-content animated bounceInRight" }, [
            _vm._m(3),
            _vm._v(" "),
            _c("div", { staticClass: "modal-body" }, [
              _c("ul", { staticClass: "list-group" }, [
                _c(
                  "a",
                  { staticStyle: { cursor: "pointer" } },
                  _vm._l(_vm.layouts, function (layout) {
                    return _c(
                      "li",
                      {
                        staticClass: "list-group-item barlow semi_bold",
                        style:
                          _vm.layout_id == layout.id
                            ? "background-color:#005cff;color:white"
                            : "",
                        on: {
                          click: function ($event) {
                            return _vm.selectLayout(layout)
                          },
                        },
                      },
                      [
                        _vm._v(
                          _vm._s(layout.name_layout) +
                            "\n                            "
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
                  staticClass: "btn btn-info",
                  staticStyle: { color: "white" },
                  attrs: { href: "#" },
                  on: {
                    click: function ($event) {
                      $event.preventDefault()
                      return _vm.exportExcelData.apply(null, arguments)
                    },
                  },
                },
                [
                  _vm._v(
                    "\n                        Descargar reporte\n                    "
                  ),
                ]
              ),
            ]),
          ]),
        ]),
      ]
    ),
  ])
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", { staticClass: "barlow bold" }, [
          _vm._v("\n                            Pep\n                        "),
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "barlow bold" }, [
          _vm._v(
            "\n                            In.extremo\n                        "
          ),
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "barlow bold" }, [
          _vm._v(
            "\n                            Fin extremo\n                        "
          ),
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "barlow bold" }, [
          _vm._v(
            "\n                            Dias de Vigencia\n                        "
          ),
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "barlow bold" }, [
          _vm._v(
            "\n                            Mes texto\n                        "
          ),
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "barlow bold" }, [
          _vm._v("\n                            Mes\n                        "),
        ]),
        _vm._v(" "),
        _c("th", [_vm._v("Ejecucion ")]),
        _vm._v(" "),
        _c("th", [_vm._v("Observacion de Cierre ")]),
        _vm._v(" "),
        _c("th", [_vm._v("Estado 11 ")]),
        _vm._v(" "),
        _c("th", [_vm._v("OC sin Facturar")]),
        _vm._v(" "),
        _c("th", [_vm._v("flujo")]),
        _vm._v(" "),
        _c("th", [_vm._v("Disminuido")]),
        _vm._v(" "),
        _c("th", [_vm._v("Nombre Ework")]),
        _vm._v(" "),
        _c("th", [_vm._v("nombre_actividad")]),
        _vm._v(" "),
        _c("th", [_vm._v("f_habilitacion")]),
        _vm._v(" "),
        _c("th", [_vm._v("unidad_ejecutora")]),
        _vm._v(" "),
        _c("th", [_vm._v("usuario")]),
        _vm._v(" "),
        _c("th", [_vm._v("Status")]),
        _vm._v(" "),
        _c("th", [_vm._v("Diff_pptop")]),
        _vm._v(" "),
        _c("th", [_vm._v("ppto_sap")]),
      ]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
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
              _c("div", { staticClass: "d-flex justify-content-center" }, [
                _c(
                  "div",
                  {
                    staticClass: "spinner-border text-primary",
                    staticStyle: {
                      width: "8rem",
                      height: "8rem",
                      color: "#007bff!important",
                    },
                    attrs: { role: "status" },
                  },
                  [
                    _c(
                      "span",
                      {
                        staticClass: "sr-only",
                        staticStyle: { color: "#191919" },
                      },
                      [
                        _vm._v(
                          "\n                                        Cargando...\n                                    "
                        ),
                      ]
                    ),
                  ]
                ),
              ]),
            ]
          ),
        ]),
      ]
    )
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "modal-header",
        staticStyle: {
          background:
            "-webkit-linear-gradient(rgb(0, 210, 255), rgb(58, 123, 213)",
          height: "70px",
        },
      },
      [
        _c(
          "h5",
          {
            staticClass: "modal-title barlow semi_bold",
            staticStyle: { color: "white" },
          },
          [
            _vm._v(
              "\n                        Crear layout\n                    "
            ),
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
              [
                _vm._v(
                  "\n                            ×\n                        "
                ),
              ]
            ),
          ]
        ),
      ]
    )
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "modal-header",
        staticStyle: {
          background:
            "-webkit-linear-gradient(rgb(0, 210, 255), rgb(58, 123, 213)",
          height: "70px",
        },
      },
      [
        _c(
          "h5",
          {
            staticClass: "modal-title barlow semi_bold",
            staticStyle: { color: "white" },
          },
          [
            _vm._v(
              "\n                        Layouts creados\n                    "
            ),
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
              [
                _vm._v(
                  "\n                            ×\n                        "
                ),
              ]
            ),
          ]
        ),
      ]
    )
  },
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/reports/pep/Report.vue?vue&type=template&id=358540a3&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/reports/pep/Report.vue?vue&type=template&id=358540a3& ***!
  \*********************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "main-content" }, [
    _c("div", { staticClass: "wrapper wrapper-content" }, [
      _c("section", { staticClass: "section" }, [
        _c("div", { staticClass: "section-header shadow-box-ag" }, [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-lg-12 col-md-6 col-sm-6 col-12 " }, [
              _c("div", { staticClass: "card-stats-title" }, [
                _c("h1", { staticClass: "barlow semi_bold" }, [
                  _vm._v(
                    "\n                                Reportes " +
                      _vm._s(
                        _vm.current_tab ? "/ " + _vm.current_tab.name : ""
                      ) +
                      "\n                            "
                  ),
                ]),
              ]),
            ]),
          ]),
        ]),
      ]),
      _vm._v(" "),
      _c("a", {
        attrs: {
          type: "hidden",
          href: _vm.document_url,
          id: "download_document",
        },
      }),
      _vm._v(" "),
      _c("input", {
        attrs: {
          hidden: "true",
          id: "file",
          name: "file",
          type: "file",
          value: "",
        },
        on: { change: _vm.uploadFle },
      }),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-12" }, [
          _c("div", { staticClass: "card" }, [
            _c("div", { staticClass: "card-header" }, [
              _c("div", { staticClass: "col-lg-12" }, [
                _vm._m(0),
                _vm._v(" "),
                _c(
                  "ul",
                  {
                    staticClass: "nav nav-pills",
                    staticStyle: {
                      "align-items": "center",
                      display: "flex",
                      "justify-content": "center",
                      "margin-top": "10px",
                    },
                  },
                  _vm._l(_vm.tabs, function (tab) {
                    return _c(
                      "a",
                      {
                        staticClass:
                          "btn btn-outline-primary btn-lg barlow regular",
                        staticStyle: {
                          "margin-left": "10px",
                          "border-radius": "5px",
                          "font-size": "16px",
                        },
                        style:
                          _vm.current_tab != null &&
                          _vm.current_tab.id == tab.id
                            ? "background: #005CFF;color:white"
                            : "",
                        attrs: { href: "#" },
                        on: {
                          click: function ($event) {
                            return _vm.selectTab(tab)
                          },
                        },
                      },
                      [_vm._v(_vm._s(tab.name))]
                    )
                  }),
                  0
                ),
              ]),
            ]),
            _vm._v(" "),
            _vm.tab != 8
              ? _c("div", { attrs: { id: "data_report" } }, [
                  _vm.current_tab
                    ? _c("div", { staticClass: "card-header" }, [
                        _c("div", { staticClass: "col-lg-12" }, [
                          _c("div", { staticClass: "dropdown d-inline" }, [
                            _c(
                              "a",
                              {
                                staticClass:
                                  "font-weight-600 dropdown-toggle barlow bold",
                                attrs: {
                                  "data-toggle": "dropdown",
                                  href: "#",
                                  id: "orders-month",
                                },
                              },
                              [
                                _vm._v(
                                  "\n                                        Opciones\n                                    "
                                ),
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "ul",
                              { staticClass: "dropdown-menu dropdown-menu-sm" },
                              [
                                _c(
                                  "li",
                                  {
                                    staticClass:
                                      "dropdown-title barlow semi_bold",
                                  },
                                  [
                                    _vm._v(
                                      "\n                                            Selecione una opción\n                                        "
                                    ),
                                  ]
                                ),
                                _vm._v(" "),
                                _vm._l(
                                  _vm.options_tab_select,
                                  function (options) {
                                    return _c("li", [
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "dropdown-item barlow regular",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function ($event) {
                                              return _vm.selecOption(options)
                                            },
                                          },
                                        },
                                        [
                                          _c("i", { class: options.class }),
                                          _vm._v(
                                            "\n                                                " +
                                              _vm._s(options.name) +
                                              "\n                                            "
                                          ),
                                        ]
                                      ),
                                    ])
                                  }
                                ),
                              ],
                              2
                            ),
                          ]),
                        ]),
                      ])
                    : _vm._e(),
                  _vm._v(" "),
                  _c("div", { staticClass: "card-body p-0" }, [
                    _c("div", { staticClass: "table-responsive" }, [
                      !_vm.load
                        ? _c("table", { staticClass: "table table-striped" }, [
                            _c("thead", [
                              _c(
                                "tr",
                                _vm._l(_vm.data_head, function (head) {
                                  return _c(
                                    "th",
                                    { staticClass: "barlow bold" },
                                    [
                                      _vm._v(
                                        _vm._s(head.name_head) +
                                          "\n                                            "
                                      ),
                                    ]
                                  )
                                }),
                                0
                              ),
                            ]),
                            _vm._v(" "),
                            _vm.current_tab != null && _vm.current_tab.id == 1
                              ? _c(
                                  "tbody",
                                  _vm._l(_vm.data_t_body.data, function (data) {
                                    return _c("tr", [
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.pep),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.pop),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            _vm.dateFormat(
                                              data.date_extreme_start
                                            )
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            _vm.dateFormat(
                                              data.date_extreme_finish
                                            )
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", [
                                        _vm._v(
                                          " " +
                                            _vm._s(
                                              data.estimate
                                                ? "$" +
                                                    _vm.moneyFormat(
                                                      data.estimate
                                                    )
                                                : ""
                                            )
                                        ),
                                      ]),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.responsible),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.status),
                                        },
                                      }),
                                    ])
                                  }),
                                  0
                                )
                              : _vm._e(),
                            _vm._v(" "),
                            _vm.current_tab != null && _vm.current_tab.id == 2
                              ? _c(
                                  "tbody",
                                  _vm._l(_vm.data_t_body.data, function (data) {
                                    return _c("tr", [
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.pep),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.store
                                              ? "$" +
                                                  _vm.moneyFormat(data.store)
                                              : ""
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.services
                                              ? "$" +
                                                  _vm.moneyFormat(data.services)
                                              : ""
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.activation
                                              ? "$" +
                                                  _vm.moneyFormat(
                                                    data.activation
                                                  )
                                              : ""
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.total_general
                                              ? "$" +
                                                  _vm.moneyFormat(
                                                    data.total_general
                                                  )
                                              : ""
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.q_batery
                                              ? _vm.moneyFormat(data.q_batery)
                                              : ""
                                          ),
                                        },
                                      }),
                                    ])
                                  }),
                                  0
                                )
                              : _vm._e(),
                            _vm._v(" "),
                            _vm.current_tab != null && _vm.current_tab.id == 3
                              ? _c(
                                  "tbody",
                                  _vm._l(_vm.data_t_body.data, function (data) {
                                    return _c("tr", [
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.pep),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.pop),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.estimate
                                              ? "$" +
                                                  _vm.moneyFormat(data.estimate)
                                              : ""
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.real
                                              ? "$" + _vm.moneyFormat(data.real)
                                              : ""
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.committed
                                              ? "$" +
                                                  _vm.moneyFormat(
                                                    data.committed
                                                  )
                                              : ""
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.plan_res_ord
                                              ? "$" +
                                                  _vm.moneyFormat(
                                                    data.plan_res_ord
                                                  )
                                              : ""
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.disposed
                                              ? "$" +
                                                  _vm.moneyFormat(data.disposed)
                                              : ""
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.available
                                              ? "$" +
                                                  _vm.moneyFormat(
                                                    data.available
                                                  )
                                              : ""
                                          ),
                                        },
                                      }),
                                    ])
                                  }),
                                  0
                                )
                              : _vm._e(),
                            _vm._v(" "),
                            _vm.current_tab != null && _vm.current_tab.id == 4
                              ? _c(
                                  "tbody",
                                  _vm._l(_vm.data_t_body.data, function (data) {
                                    return _c("tr", [
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.pep),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.bateria
                                              ? "$" +
                                                  _vm.moneyFormat(data.bateria)
                                              : ""
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.q_baterias),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.teams
                                              ? "$" +
                                                  _vm.moneyFormat(data.teams)
                                              : ""
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.total_bodega
                                              ? "$" +
                                                  _vm.moneyFormat(
                                                    data.total_bodega
                                                  )
                                              : ""
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.total_servicio
                                              ? "$" +
                                                  _vm.moneyFormat(
                                                    data.total_servicio
                                                  )
                                              : ""
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.total_activacion
                                              ? "$" +
                                                  _vm.moneyFormat(
                                                    data.total_activacion
                                                  )
                                              : ""
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.inversion_total_aperturada
                                              ? "$" +
                                                  _vm.moneyFormat(
                                                    data.inversion_total_aperturada
                                                  )
                                              : ""
                                          ),
                                        },
                                      }),
                                    ])
                                  }),
                                  0
                                )
                              : _vm._e(),
                            _vm._v(" "),
                            _vm.current_tab != null && _vm.current_tab.id == 5
                              ? _c(
                                  "tbody",
                                  _vm._l(_vm.data_t_body.data, function (data) {
                                    return _c("tr", [
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.ework_id),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.nombre_solicitud
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.estado_solicitud
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.nombre_solicitante
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.unidad_solicitante
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.usuario),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.activo_siniestrado
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.fecha_siniestro
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.lugar),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.tipo_evento),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.pep),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.nro_denuncia
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.total_reporte
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.valor_recuperado_seguro
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.tipo_sitio),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.pxq_completo
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.boleta_red),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.id_reza),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.tipo_flujo),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.nombre_actividad
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.fecha_habilitacion
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.unidad_ejecutora
                                          ),
                                        },
                                      }),
                                    ])
                                  }),
                                  0
                                )
                              : _vm._e(),
                            _vm._v(" "),
                            _vm.current_tab != null && _vm.current_tab.id == 6
                              ? _c(
                                  "tbody",
                                  _vm._l(_vm.data_t_body.data, function (data) {
                                    return _c("tr", [
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.pep),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.total_oc_sin_facturar
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.cuenta_doc_compras
                                          ),
                                        },
                                      }),
                                    ])
                                  }),
                                  0
                                )
                              : _vm._e(),
                            _vm._v(" "),
                            _vm.current_tab != null && _vm.current_tab.id == 7
                              ? _c(
                                  "tbody",
                                  _vm._l(_vm.data_t_body.data, function (data) {
                                    return _c("tr", [
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.pep),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(data.material),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.descripcion_material
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.valor_mon_so_co
                                          ),
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("td", {
                                        domProps: {
                                          textContent: _vm._s(
                                            data.sum_total_red
                                          ),
                                        },
                                      }),
                                    ])
                                  }),
                                  0
                                )
                              : _vm._e(),
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _vm.load
                        ? _c(
                            "div",
                            { staticClass: "col-12 col-md-12 col-sm-12" },
                            [_vm._m(1)]
                          )
                        : _vm._e(),
                      _vm._v(" "),
                      _vm.data_t_body != null
                        ? _c("div", { staticStyle: { "margin-top": "30px" } }, [
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
                                    pagination: _vm.data_t_body,
                                  },
                                  on: {
                                    paginate: function ($event) {
                                      return _vm.paginateData()
                                    },
                                  },
                                }),
                              ],
                              1
                            ),
                          ])
                        : _vm._e(),
                    ]),
                  ]),
                ])
              : _vm._e(),
            _vm._v(" "),
            _vm.tab == 8
              ? _c(
                  "div",
                  { attrs: { id: "data_report" } },
                  [_c("base_reporte")],
                  1
                )
              : _vm._e(),
          ]),
        ]),
      ]),
    ]),
  ])
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: {
          "align-items": "center",
          display: "flex",
          "justify-content": "center",
          color: "#191919",
        },
      },
      [
        _c("h3", { staticClass: "barlow semi_bold" }, [
          _vm._v("Seleccione una opción"),
        ]),
      ]
    )
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
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
              _c("div", { staticClass: "d-flex justify-content-center" }, [
                _c(
                  "div",
                  {
                    staticClass: "spinner-border text-primary",
                    staticStyle: {
                      width: "8rem",
                      height: "8rem",
                      color: "#007bff!important",
                    },
                    attrs: { role: "status" },
                  },
                  [
                    _c(
                      "span",
                      {
                        staticClass: "sr-only",
                        staticStyle: { color: "#191919" },
                      },
                      [
                        _vm._v(
                          "\n                                                            Cargando...\n                                                        "
                        ),
                      ]
                    ),
                  ]
                ),
              ]),
            ]
          ),
        ]),
      ]
    )
  },
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/reports/Pagination.vue":
/*!********************************************************!*\
  !*** ./resources/js/components/reports/Pagination.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Pagination_vue_vue_type_template_id_79f47e95___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Pagination.vue?vue&type=template&id=79f47e95& */ "./resources/js/components/reports/Pagination.vue?vue&type=template&id=79f47e95&");
/* harmony import */ var _Pagination_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Pagination.vue?vue&type=script&lang=js& */ "./resources/js/components/reports/Pagination.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Pagination_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Pagination_vue_vue_type_template_id_79f47e95___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Pagination_vue_vue_type_template_id_79f47e95___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/reports/Pagination.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/reports/Pagination.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/reports/Pagination.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Pagination_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Pagination.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/reports/Pagination.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Pagination_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/reports/Pagination.vue?vue&type=template&id=79f47e95&":
/*!***************************************************************************************!*\
  !*** ./resources/js/components/reports/Pagination.vue?vue&type=template&id=79f47e95& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Pagination_vue_vue_type_template_id_79f47e95___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Pagination.vue?vue&type=template&id=79f47e95& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/reports/Pagination.vue?vue&type=template&id=79f47e95&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Pagination_vue_vue_type_template_id_79f47e95___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Pagination_vue_vue_type_template_id_79f47e95___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/reports/pep/BaseReporte.vue":
/*!*************************************************************!*\
  !*** ./resources/js/components/reports/pep/BaseReporte.vue ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _BaseReporte_vue_vue_type_template_id_1177e3c1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BaseReporte.vue?vue&type=template&id=1177e3c1& */ "./resources/js/components/reports/pep/BaseReporte.vue?vue&type=template&id=1177e3c1&");
/* harmony import */ var _BaseReporte_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./BaseReporte.vue?vue&type=script&lang=js& */ "./resources/js/components/reports/pep/BaseReporte.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _BaseReporte_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _BaseReporte_vue_vue_type_template_id_1177e3c1___WEBPACK_IMPORTED_MODULE_0__["render"],
  _BaseReporte_vue_vue_type_template_id_1177e3c1___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/reports/pep/BaseReporte.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/reports/pep/BaseReporte.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/reports/pep/BaseReporte.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_BaseReporte_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./BaseReporte.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/reports/pep/BaseReporte.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_BaseReporte_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/reports/pep/BaseReporte.vue?vue&type=template&id=1177e3c1&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/reports/pep/BaseReporte.vue?vue&type=template&id=1177e3c1& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BaseReporte_vue_vue_type_template_id_1177e3c1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./BaseReporte.vue?vue&type=template&id=1177e3c1& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/reports/pep/BaseReporte.vue?vue&type=template&id=1177e3c1&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BaseReporte_vue_vue_type_template_id_1177e3c1___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BaseReporte_vue_vue_type_template_id_1177e3c1___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/reports/pep/Report.vue":
/*!********************************************************!*\
  !*** ./resources/js/components/reports/pep/Report.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Report_vue_vue_type_template_id_358540a3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Report.vue?vue&type=template&id=358540a3& */ "./resources/js/components/reports/pep/Report.vue?vue&type=template&id=358540a3&");
/* harmony import */ var _Report_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Report.vue?vue&type=script&lang=js& */ "./resources/js/components/reports/pep/Report.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Report_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Report_vue_vue_type_template_id_358540a3___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Report_vue_vue_type_template_id_358540a3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/reports/pep/Report.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/reports/pep/Report.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/reports/pep/Report.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Report_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Report.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/reports/pep/Report.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Report_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/reports/pep/Report.vue?vue&type=template&id=358540a3&":
/*!***************************************************************************************!*\
  !*** ./resources/js/components/reports/pep/Report.vue?vue&type=template&id=358540a3& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Report_vue_vue_type_template_id_358540a3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Report.vue?vue&type=template&id=358540a3& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/reports/pep/Report.vue?vue&type=template&id=358540a3&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Report_vue_vue_type_template_id_358540a3___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Report_vue_vue_type_template_id_358540a3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
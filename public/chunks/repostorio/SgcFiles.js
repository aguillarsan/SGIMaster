(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunks/repostorio/SgcFiles"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/repositorio/SgcFiles.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/repositorio/SgcFiles.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VuePagination_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../VuePagination.vue */ "./resources/js/components/VuePagination.vue");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _event_bus__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./event-bus */ "./resources/js/components/repositorio/event-bus.js");
/* harmony import */ var vue_pdf__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vue-pdf */ "./node_modules/vue-pdf/src/vuePdfNoSss.vue");
/* harmony import */ var _pdftron_webviewer__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @pdftron/webviewer */ "./node_modules/@pdftron/webviewer/webviewer.min.js");
/* harmony import */ var _pdftron_webviewer__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_pdftron_webviewer__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_6__);
var _components$component;

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







var pdfDocument = null;
/* harmony default export */ __webpack_exports__["default"] = (_components$component = {
  components: {
    pdf: vue_pdf__WEBPACK_IMPORTED_MODULE_4__["default"]
  }
}, _defineProperty(_components$component, "components", {
  'vue-pagination': _VuePagination_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
}), _defineProperty(_components$component, "data", function data() {
  return {
    folders: {
      'total': 0,
      'current_page': 1,
      'per_page': 10,
      'from': 2,
      'to': 0
    },
    nombre: '',
    vacio: '',
    popId: '',
    dataPop: [],
    pops: [],
    popid: '',
    datositio: '',
    nameFolder: '',
    contenFold: [],
    nombFolder: '',
    idContentFold: '',
    files: [],
    folderUpdateNameId: '',
    DefaultName: 'Office track',
    DetailsFolder: [],
    DefaultIcon: 'fas fa-hdd',
    activitys: [],
    nameUser: '',
    users: [],
    userSelects: [],
    userShared: [],
    moduloName: '',
    moduloId: 1,
    permissions: '',
    folderSharedId: '',
    filesupload: [],
    porcentaje: {
      type: Number,
      "default": 0
    },
    FilesDuplicates: [],
    folderData: [],
    idFolderSelected: '',
    Folderpermisison: '',
    src: '',
    numPages: 0,
    page: 1,
    fileShow: '',
    tipeFile: 0,
    comprobacion: 0,
    load_data: 0,
    type_files: [{
      'id': 1,
      'nombre': 'Cotizaciones'
    }, {
      'id': 2,
      'nombre': 'Informe Final'
    }, {
      'id': 4,
      'nombre': 'Guía de despacho'
    }, {
      'id': 6,
      'nombre': 'LPU'
    }, {
      'id': 7,
      'nombre': 'Mail'
    }, {
      'id': 9,
      'nombre': 'Informe Parcial'
    }, {
      'id': 8,
      'nombre': 'Carta de adjudicación'
    }, {
      'id': 5,
      'nombre': 'Otros'
    }],
    sgc_folders_show: true,
    type_files_show: false,
    Total_files: '',
    type_file: null,
    files_sgc_show: false,
    folder_id: ""
  };
}), _defineProperty(_components$component, "computed", {
  getProgress: function getProgress() {
    return Math.round(this.porcentaje) + '%';
  }
}), _defineProperty(_components$component, "created", function created() {
  this.load_data = 1;
  this.getSgcRequest();
}), _defineProperty(_components$component, "methods", {
  getSgcRequest: function getSgcRequest() {
    var _this = this;

    axios__WEBPACK_IMPORTED_MODULE_1___default.a.get("/sgc/folders/data?page=".concat(this.folders.current_page, "&search=").concat(this.nombre)).then(function (response) {
      _this.sgc_folders_show = true;
      _this.type_files_show = false;
      _this.folders = response.data;
      _this.nombFolder = '';

      if (_this.folders.length == 0) {
        _this.vacio = 1;
      } else {
        _this.vacio = '';
      }

      _this.contenFold = [];
      _this.moduloName = 'SGC';
      _this.moduloId = 1;
      _this.files = [];
      _this.activitys = [];
      _this.idContentFold = '';
      _this.DetailsFolder = [];
      _this.DefaultName = 'SGC';
      _this.idFolderSelected = '';
    })["finally"](function () {
      return _this.load_data = 2;
    });
  },
  ShowInfoFolder: function ShowInfoFolder(folder) {
    var _this2 = this;

    this.DefaultName = folder.nombre;
    this.idFolderSelected = folder.id;
    this.DetailsFolder = folder;
    axios__WEBPACK_IMPORTED_MODULE_1___default.a.get('/GetActivityFolder/' + folder.id).then(function (response) {
      _this2.activitys = response.data;
      _this2.DefaultIcon = 'fas fa-folder';
    });
  },
  formato: function formato(d) {
    return moment__WEBPACK_IMPORTED_MODULE_2___default()(d).format("MMM-DD-YYYY - hh:mm:ss");
  },
  Previsualizacion: function Previsualizacion(file) {
    var _this3 = this;

    var nomFile = file.nombre;
    var PdfFileNom = nomFile.substr(nomFile.length - 3);
    var DocxFileNom = nomFile.substr(nomFile.length - 4);
    var ImgFileNom = nomFile.substr(nomFile.length - 3);

    if (PdfFileNom == 'pdf' || PdfFileNom == 'PDF') {
      console.log(PdfFileNom);

      if (file.directorio != null) {
        pdfDocument = vue_pdf__WEBPACK_IMPORTED_MODULE_4__["default"].createLoadingTask(file.directorio + '/' + file.nombre);
        this.fileShow = file.directorio + '/' + file.nombre;
        this.src = pdfDocument;
        this.src.promise.then(function (pdf) {
          _this3.numPages = pdf.numPages;
          _this3.tipeFile = 1;
        });
      } else {
        pdfDocument = vue_pdf__WEBPACK_IMPORTED_MODULE_4__["default"].createLoadingTask('/ArchivosRepositorio/' + file.nombre);
        this.fileShow = '/ArchivosRepositorio/' + file.nombre;
        this.src = pdfDocument;
        this.src.promise.then(function (pdf) {
          _this3.numPages = pdf.numPages;
          _this3.tipeFile = 1;
        });
      }

      $('#ShowDocument').modal('show');
    } else {
      if (DocxFileNom == 'docx') {
        this.fileShow = file;
        this.tipeFile = 2;
        $('#ShowDocument').modal('show');
      } else {
        if (ImgFileNom == 'png' || ImgFileNom == 'jpg' || ImgFileNom == 'jpeg') {
          if (file.directorio != null) {
            this.fileShow = file.directorio + '/' + file.nombre;
          } else {
            this.fileShow = '/ArchivosRepositorio/' + file.nombre;
          }

          this.tipeFile = 3;
          $('#ShowDocument').modal('show');
        }
      }
    }
  },
  GetContent: function GetContent(id) {
    var _this4 = this;

    axios__WEBPACK_IMPORTED_MODULE_1___default.a.get("/GetFiles?folderid=".concat(id)).then(function (response) {
      _this4.files = response.data;
    });
  },
  BackFold: function BackFold(id, name) {
    this.set_load();
    this.idContentFold = id;
    this.nombFolder = name;
    this.contenFold.splice(-1, 1);
    this.sgc_folders_show = false;
    this.type_files_show = true;
    this.files_sgc_show = false;
    this.load_data = 2;
  },
  GetContentFolder: function GetContentFolder(folder) {
    var _this5 = this;

    this.folder_id = folder.id;
    this.set_load();
    this.sgc_folders_show = false;
    axios__WEBPACK_IMPORTED_MODULE_1___default.a.get('/totalCotizacionesSgc/' + folder.id).then(function (response) {
      _this5.Total_files = response.data;
      _this5.type_files_show = true;
      _this5.nombre = '';
      _this5.idContentFold = folder.id;

      _this5.contenFold.push({
        id: folder.id,
        name: folder.id
      });

      _this5.nombFolder = folder.id;
      _this5.load_data = 2;
    });
  },
  getFilesSgc: function getFilesSgc(type_file) {
    var _this6 = this;

    this.type_file = type_file.id;
    this.nombre = '';
    this.idContentFold = type_file.id;
    this.nombFolder = type_file.nombre;
    this.contenFold.push({
      id: type_file.id,
      name: type_file.nombre
    });
    axios__WEBPACK_IMPORTED_MODULE_1___default.a.get('/searchArchivoSgc/' + this.folder_id).then(function (response) {
      var file = response.data;
      console.log(file);
      _this6.files = file.filter(function (obj) {
        return obj.tipo_archivo_id == type_file.id;
      });
      _this6.sgc_folders_show = false;
      _this6.type_files_show = false;
      _this6.files_sgc_show = true;
    });
  },
  GetContentFolderAction: function GetContentFolderAction() {
    var _this7 = this;

    axios__WEBPACK_IMPORTED_MODULE_1___default.a.get("/GetSubFolder?folderid=".concat(this.idContentFold)).then(function (response) {
      _this7.folders = response.data.folder;
      _this7.files = response.data.files;
    });
  },
  GetContentFolderSearch: function GetContentFolderSearch() {
    var _this8 = this;

    axios__WEBPACK_IMPORTED_MODULE_1___default.a.get("/officetrack/sub/folders?folderid=".concat(this.idContentFold, "&nombre=").concat(this.nombre)).then(function (response) {
      _this8.folders = response.data.folder;
      _this8.files = response.data.files;
    });
  },
  messajeError: function messajeError(mensaje) {
    this.$swal({
      type: 'error',
      title: 'Error',
      text: mensaje,
      showCloseButton: true
    });
  },
  GetContentFolderSubFolder: function GetContentFolderSubFolder(folder) {
    var _this9 = this;

    axios__WEBPACK_IMPORTED_MODULE_1___default.a.get("/GetSubFolder?folderid=".concat(folder)).then(function (response) {
      _this9.folders = response.data.folder;
      _this9.files = response.data.files;
    })["finally"](function () {
      return _this9.load_data = 2;
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
    }, 400);
  },
  toastFunction: function toastFunction(messaje) {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000,
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
  getFileExtension: function getFileExtension(filename) {
    return /[.]/.exec(filename) ? /[^.]+$/.exec(filename)[0] : undefined;
  },
  set_load: function set_load() {
    this.load_data = 1;
  }
}), _components$component);

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/repositorio/SgcFiles.vue?vue&type=template&id=4c82a76d&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/repositorio/SgcFiles.vue?vue&type=template&id=4c82a76d& ***!
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
  return _c("div", { staticClass: "main-content" }, [
    _c("div", { staticClass: "wrapper wrapper-content" }, [
      _c("section", { staticClass: "section" }, [
        _c(
          "div",
          { staticClass: "section-header shadow-box-ag barlow bold" },
          [
            _c("div", { staticClass: "breadcrumb-item active" }, [
              _c(
                "a",
                {
                  staticStyle: { "font-size": "18px" },
                  attrs: { href: "#" },
                  on: {
                    click: function ($event) {
                      $event.preventDefault()
                      return _vm.getSgcRequest.apply(null, arguments)
                    },
                  },
                },
                [
                  _vm._v(
                    "\n                        Archivos SGC\n                    "
                  ),
                ]
              ),
            ]),
            _vm._v(" "),
            _vm._l(_vm.contenFold, function (Fold) {
              return _c(
                "div",
                {
                  staticClass: "breadcrumb-item barlow bold",
                  staticStyle: { "font-size": "17px" },
                },
                [
                  _vm.idContentFold != Fold.id
                    ? _c(
                        "a",
                        {
                          attrs: { href: "" },
                          on: {
                            click: function ($event) {
                              $event.preventDefault()
                              return _vm.BackFold(Fold.id, Fold.name)
                            },
                          },
                        },
                        [
                          _vm._v(
                            "\n                        " +
                              _vm._s(Fold.name) +
                              "\n                    "
                          ),
                        ]
                      )
                    : _c("a", [
                        _vm._v(
                          "\n                        " +
                            _vm._s(Fold.name) +
                            "\n                    "
                        ),
                      ]),
                ]
              )
            }),
          ],
          2
        ),
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-lg-12 " }, [
          _c("div", { staticClass: "ibox float-e-margins" }, [
            _c("div", { staticClass: "card shadow-box-ag" }, [
              _c("div", { staticClass: "card-header" }, [
                _c("div", { staticClass: "row" }, [
                  _c("div", {
                    staticClass: "col-lg-4 col-md-6 col-sm-6 col-12",
                  }),
                  _vm._v(" "),
                  _c("div", {
                    staticClass: "col-lg-4 col-md-6 col-sm-6 col-12",
                  }),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "col-lg-4 col-md-6 col-sm-6 col-12" },
                    [
                      _c("div", { staticClass: "input-group" }, [
                        _vm.moduloId == 1 && _vm.idContentFold == ""
                          ? _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.nombre,
                                  expression: "nombre",
                                },
                              ],
                              staticClass: "form-control",
                              staticStyle: {
                                "border-radius": "0px",
                                height: "35px",
                              },
                              attrs: {
                                placeholder:
                                  "Buscar por sitio, codigo solicitud o creador",
                                type: "text",
                              },
                              domProps: { value: _vm.nombre },
                              on: {
                                keyup: function ($event) {
                                  $event.preventDefault()
                                  return _vm.getSgcRequest.apply(
                                    null,
                                    arguments
                                  )
                                },
                                input: function ($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.nombre = $event.target.value
                                },
                              },
                            })
                          : _vm._e(),
                        _vm._v(" "),
                        _vm.moduloId == 1 && _vm.idContentFold == ""
                          ? _c("div", { staticClass: "input-group-append" }, [
                              _vm._m(0),
                            ])
                          : _vm._e(),
                      ]),
                    ]
                  ),
                ]),
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "card-body" }, [
                _c(
                  "div",
                  { staticClass: "row" },
                  [
                    _vm._l(_vm.folders.data, function (folder) {
                      return _vm.load_data == 2 && _vm.sgc_folders_show
                        ? _c(
                            "div",
                            {
                              staticClass: "col-lg-3 col-md-6 col-sm-6 col-12",
                            },
                            [
                              _c(
                                "a",
                                {
                                  staticStyle: { color: "#f2f2f2" },
                                  attrs: { href: "#" },
                                  on: {
                                    click: function ($event) {
                                      $event.preventDefault()
                                      return _vm.ShowInfoFolder(folder)
                                    },
                                    dblclick: function ($event) {
                                      $event.preventDefault()
                                      return _vm.GetContentFolder(folder)
                                    },
                                  },
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "card card-statistic-1 greyHover ",
                                      staticStyle: {
                                        "border-radius": "8px",
                                        transition: "transform 0.5s",
                                        "border-color": "#e5e7eb",
                                        border: "1px solid rgba(0,0,0,.125)",
                                      },
                                      style:
                                        folder.id == _vm.idFolderSelected
                                          ? "background-color: #e0e0e0; "
                                          : "",
                                    },
                                    [
                                      _vm._m(1, true),
                                      _vm._v(" "),
                                      _c("div", { staticClass: "card-wrap" }, [
                                        _c(
                                          "div",
                                          {
                                            staticClass:
                                              "card-header barlow semi_bold",
                                          },
                                          [
                                            _c(
                                              "h4",
                                              {
                                                staticStyle: {
                                                  "font-size": "14px",
                                                  color: "black",
                                                },
                                              },
                                              [
                                                _vm._v(
                                                  "\n                                                        " +
                                                    _vm._s(folder.id) +
                                                    " " +
                                                    _vm._s(
                                                      folder.site
                                                        ? "/" +
                                                            folder.site.nem_site
                                                        : ""
                                                    ) +
                                                    "\n                                                    "
                                                ),
                                              ]
                                            ),
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "barlow semi_bold ",
                                            staticStyle: {
                                              color: "#191919",
                                              "font-size": "12px",
                                            },
                                          },
                                          [
                                            _vm._v(
                                              "\n                                                    " +
                                                _vm._s(
                                                  folder.user
                                                    ? folder.user.name +
                                                        " " +
                                                        folder.user.apellido
                                                    : ""
                                                ) +
                                                "\n                                                "
                                            ),
                                          ]
                                        ),
                                      ]),
                                    ]
                                  ),
                                ]
                              ),
                            ]
                          )
                        : _vm._e()
                    }),
                    _vm._v(" "),
                    _vm.sgc_folders_show
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
                                attrs: { offset: 4, pagination: _vm.folders },
                                on: {
                                  paginate: function ($event) {
                                    return _vm.getSgcRequest()
                                  },
                                },
                              }),
                            ],
                            1
                          ),
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _vm._l(_vm.type_files, function (type_file) {
                      return _vm.type_files_show && _vm.load_data == 2
                        ? _c(
                            "div",
                            {
                              staticClass: "col-lg-3 col-md-6 col-sm-6 col-12",
                            },
                            [
                              _c(
                                "a",
                                {
                                  staticStyle: {
                                    color: "#f2f2f2",
                                    cursor: "pointer",
                                  },
                                  on: {
                                    dblclick: function ($event) {
                                      $event.preventDefault()
                                      return _vm.getFilesSgc(type_file)
                                    },
                                  },
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "card card-statistic-1 greyHover ",
                                      staticStyle: {
                                        "border-radius": "8px",
                                        transition: "transform 0.5s",
                                        "border-color": "#e5e7eb",
                                        border: "1px solid rgba(0,0,0,.125)",
                                      },
                                      style:
                                        type_file.id == _vm.idFolderSelected
                                          ? "background-color: #e0e0e0; "
                                          : "",
                                    },
                                    [
                                      _vm._m(2, true),
                                      _vm._v(" "),
                                      _c("div", { staticClass: "card-wrap" }, [
                                        _c(
                                          "div",
                                          {
                                            staticClass:
                                              "card-header barlow semi_bold",
                                          },
                                          [
                                            _c(
                                              "h4",
                                              {
                                                staticStyle: {
                                                  "font-size": "14px",
                                                  color: "black",
                                                },
                                              },
                                              [
                                                _vm._v(
                                                  "\n                                                        " +
                                                    _vm._s(type_file.nombre) +
                                                    "\n                                                    "
                                                ),
                                              ]
                                            ),
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c("div", [
                                          _c(
                                            "span",
                                            {
                                              staticClass:
                                                "badge badge-primary",
                                            },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  type_file.id == 1 &&
                                                    _vm.Total_files
                                                      .cotizacion != 0
                                                    ? _vm.Total_files.cotizacion
                                                    : type_file.id == 2 &&
                                                      _vm.Total_files
                                                        .informe_final != 0
                                                    ? _vm.Total_files
                                                        .informe_final
                                                    : type_file.id == 4 &&
                                                      _vm.Total_files
                                                        .guia_despacho != 0
                                                    ? _vm.Total_files
                                                        .guia_despacho
                                                    : type_file.id == 6 &&
                                                      _vm.Total_files.lpu != 0
                                                    ? _vm.Total_files.lpu
                                                    : type_file.id == 7 &&
                                                      _vm.Total_files.mail != 0
                                                    ? _vm.Total_files.mail
                                                    : type_file.id == 9 &&
                                                      _vm.Total_files
                                                        .informe_parcial != 0
                                                    ? _vm.Total_files
                                                        .informe_parcial
                                                    : type_file.id == 8 &&
                                                      _vm.Total_files
                                                        .carta_adjudicacion != 0
                                                    ? _vm.Total_files
                                                        .carta_adjudicacion
                                                    : type_file.id == 5 &&
                                                      _vm.Total_files.otros != 0
                                                    ? _vm.Total_files.otros
                                                    : ""
                                                )
                                              ),
                                            ]
                                          ),
                                        ]),
                                      ]),
                                    ]
                                  ),
                                ]
                              ),
                            ]
                          )
                        : _vm._e()
                    }),
                    _vm._v(" "),
                    _vm._l(_vm.files, function (file) {
                      return _vm.files_sgc_show
                        ? _c("div", { staticClass: "col-lg-2" }, [
                            _c("div", { staticClass: "col text-center" }, [
                              _c(
                                "a",
                                {
                                  attrs: {
                                    href: "/archivosSgc/" + file.nombre_archivo,
                                    target: "blank_",
                                  },
                                },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "browser boxBounce" },
                                    [
                                      file.class
                                        ? _c("i", {
                                            class: file.class,
                                            staticStyle: {
                                              "font-size": "50px",
                                            },
                                          })
                                        : _vm._e(),
                                      _vm._v(" "),
                                      !file.class
                                        ? _c("i", {
                                            staticClass: "fas fa-file",
                                            staticStyle: {
                                              "font-size": "50px",
                                            },
                                          })
                                        : _vm._e(),
                                    ]
                                  ),
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                { staticClass: "mt-2 font-weight-bold" },
                                [
                                  _vm._v(
                                    "\n                                                " +
                                      _vm._s(file.nombre_archivo) +
                                      "\n                                            "
                                  ),
                                ]
                              ),
                            ]),
                          ])
                        : _vm._e()
                    }),
                  ],
                  2
                ),
                _vm._v(" "),
                _vm.load_data == 1
                  ? _c("div", { staticClass: "col-12 col-md-12 col-sm-12" }, [
                      _c(
                        "div",
                        {
                          staticClass: "card",
                          staticStyle: {
                            "box-shadow": "0 0px 0px rgba(0, 0, 0, 0)",
                          },
                        },
                        [
                          _c("div", { staticClass: "card-body" }, [
                            _c(
                              "div",
                              {
                                staticClass: "empty-state",
                                attrs: { "data-height": "400" },
                              },
                              [
                                _vm.load_data == 1
                                  ? _c(
                                      "div",
                                      {
                                        staticClass:
                                          "d-flex justify-content-center",
                                      },
                                      [_vm._m(3)]
                                    )
                                  : _vm._e(),
                              ]
                            ),
                          ]),
                        ]
                      ),
                    ])
                  : _vm._e(),
              ]),
            ]),
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
      { staticClass: "input-group-text", staticStyle: { height: "35px" } },
      [_c("i", { staticClass: "fas fa-search" })]
    )
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-icon " }, [
      _c("i", {
        staticClass: "far fa-folder",
        staticStyle: { color: "#191919", "font-size": "50px" },
      }),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-icon " }, [
      _c("i", {
        staticClass: "far fa-folder",
        staticStyle: { color: "#191919", "font-size": "50px" },
      }),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "spinner-border text-primary",
        staticStyle: {
          width: "8rem",
          height: "8rem",
          color: "rgba(212, 125, 222)!important",
        },
        attrs: { role: "status" },
      },
      [
        _c(
          "span",
          { staticClass: "sr-only", staticStyle: { color: "#191919" } },
          [
            _vm._v(
              "\n                                                            Cargando...\n                                                        "
            ),
          ]
        ),
      ]
    )
  },
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/repositorio/SgcFiles.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/repositorio/SgcFiles.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SgcFiles_vue_vue_type_template_id_4c82a76d___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SgcFiles.vue?vue&type=template&id=4c82a76d& */ "./resources/js/components/repositorio/SgcFiles.vue?vue&type=template&id=4c82a76d&");
/* harmony import */ var _SgcFiles_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SgcFiles.vue?vue&type=script&lang=js& */ "./resources/js/components/repositorio/SgcFiles.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _SgcFiles_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _SgcFiles_vue_vue_type_template_id_4c82a76d___WEBPACK_IMPORTED_MODULE_0__["render"],
  _SgcFiles_vue_vue_type_template_id_4c82a76d___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/repositorio/SgcFiles.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/repositorio/SgcFiles.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/repositorio/SgcFiles.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SgcFiles_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./SgcFiles.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/repositorio/SgcFiles.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SgcFiles_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/repositorio/SgcFiles.vue?vue&type=template&id=4c82a76d&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/repositorio/SgcFiles.vue?vue&type=template&id=4c82a76d& ***!
  \*****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SgcFiles_vue_vue_type_template_id_4c82a76d___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./SgcFiles.vue?vue&type=template&id=4c82a76d& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/repositorio/SgcFiles.vue?vue&type=template&id=4c82a76d&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SgcFiles_vue_vue_type_template_id_4c82a76d___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SgcFiles_vue_vue_type_template_id_4c82a76d___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
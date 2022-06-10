(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunks/ticket/FormCnt"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ticket/FormCnt.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/ticket/FormCnt.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _event_bus__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../event-bus */ "./resources/js/components/event-bus.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      step: 1,
      site_data: "",
      site: "",
      sites: [],
      input_width_form: "",
      tipo_motivos: [{
        id: 3,
        nombre: 'Mantenimiento'
      }, {
        id: 9,
        nombre: 'Degradación'
      }, {
        id: 11,
        nombre: 'Recurrente anual'
      }],
      areas: [],
      tecnicas: [],
      equipos: [],
      formInput: {
        motivo_id: null,
        site_id: null,
        tipo_mantencion_id: null,
        descripcion: null,
        area_id: null,
        tecnica_id: null,
        equipo_id: null,
        cotizaciones: [],
        validacion_compras: []
      },
      tipo_mantenciones: [{
        id: 3,
        name: 'Correctiva'
      }, {
        id: 4,
        name: 'Preventiva'
      }],
      errors: {
        site: false,
        motivo: false,
        descripcion: false,
        area: false,
        tecnica: false,
        equipo: false,
        tipo_mantencion: false
      },
      formData: new FormData(),
      extensions: []
    };
  },
  mounted: function mounted() {
    var self = this;
    _event_bus__WEBPACK_IMPORTED_MODULE_1__["default"].$on('get-data-form-cnt', function () {
      self.getDataArea();
    });
    this.getExtensions();
  },
  computed: {},
  watch: {
    'formInput.site_id': function formInputSite_id(v, b) {
      if (this.formInput.site_id) {
        this.errors.site = false;
      }
    },
    'formInput.motivo_id': function formInputMotivo_id(v, b) {
      if (this.formInput.motivo_id) {
        this.errors.motivo = false;
      }
    },
    'formInput.tipo_mantencion_id': function formInputTipo_mantencion_id(v, b) {
      if (this.formInput.tipo_mantencion_id) {
        this.errors.tipo_mantencion = false;
      }
    },
    'formInput.descripcion': function formInputDescripcion(v, b) {
      if (this.formInput.descripcion) {
        this.errors.descripcion = false;
      }
    },
    'formInput.area_id': function formInputArea_id(v, b) {
      if (this.formInput.area_id) {
        this.errors.area = false;
      }
    },
    'formInput.tecnica_id': function formInputTecnica_id(v, b) {
      if (this.formInput.tecnica_id) {
        this.errors.tecnica = false;
      }
    },
    'formInput.equipo_id': function formInputEquipo_id(v, b) {
      if (this.formInput.equipo_id) {
        this.errors.equipo = false;
      }
    }
  },
  methods: {
    changeSite: function changeSite() {
      this.site_data = "";
      this.formInput.site_id = "";
    },
    getExtensions: function getExtensions() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/repositorio/extensions').then(function (response) {
        _this.extensions = response.data;
      });
    },
    searchSite: function searchSite() {
      var _this2 = this;

      if (this.site.length >= 3) {
        this.input_width_form = document.getElementById("siteInput").clientWidth;
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/GetPop?datositio=".concat(this.site)).then(function (response) {
          _this2.sites = response.data;
        });
      } else {
        this.sites = '';
      }
    },
    selectSite: function selectSite(site) {
      this.site = '';
      this.sites = '';
      this.site_data = site.nombre + ' ' + site.nem_site;
      this.formInput.site_id = site.id;
    },
    getDataArea: function getDataArea() {
      var _this3 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/Getarea').then(function (response) {
        _this3.areas = response.data;
      });
    },
    getTecnica: function getTecnica() {
      var _this4 = this;

      this.formInput.tecnica_id = null;
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/GetTecnica/' + this.formInput.area_id).then(function (response) {
        _this4.tecnicas = response.data;
      });
    },
    getEquipo: function getEquipo() {
      var _this5 = this;

      this.formInput.equipo_id = null;
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/GetEquipo/' + this.formInput.tecnica_id).then(function (response) {
        _this5.equipos = response.data;
      });
    },
    nextStep: function nextStep() {
      this.validateFormStepOne();

      if (this.formInput.motivo_id == 3) {
        if (this.formInput.site_id && this.formInput.motivo_id && this.formInput.tipo_mantencion_id && this.formInput.descripcion && this.formInput.area_id && this.formInput.tecnica_id && this.formInput.equipo_id) {
          this.step = 2;
        }
      } else if (this.formInput.site_id && this.formInput.motivo_id && this.formInput.descripcion && this.formInput.area_id && this.formInput.tecnica_id && this.formInput.equipo_id) {
        this.formInput.tipo_mantencion_id = null;
        this.step = 2;
      }
    },
    crateTicket: function crateTicket() {
      var _this6 = this;

      this.formData.append('site_id', this.formInput.site_id);
      this.formData.append('tipo_motivo_id', this.formInput.motivo_id);
      this.formData.append('tipo_mantencion_id', this.formInput.tipo_mantencion_id != null ? this.formInput.tipo_mantencion_id : '');
      this.formData.append('descripcion', this.formInput.descripcion);
      this.formData.append('area_id', this.formInput.area_id);
      this.formData.append('tecnica_id', this.formInput.tecnica_id);
      this.formData.append('equipo_id', this.formInput.equipo_id);
      this.formData.append('estado_id', 1);

      for (var i = 0; i < this.formInput.cotizaciones.length; i++) {
        var cotizacion = this.formInput.cotizaciones[i];
        this.formData.append('cotizacion[' + i + ']', cotizacion);
      }

      for (var i = 0; i < this.formInput.validacion_compras.length; i++) {
        var validacion_compras = this.formInput.validacion_compras[i];
        this.formData.append('validacion_compra[' + i + ']', validacion_compras);
      }

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/create/ticket/cnt', this.formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        },
        onUploadProgress: function onUploadProgress(e) {
          if (e.lengthComputable) {
            _this6.porcentaje = e.loaded / e.total * 100;
          }
        }
      }).then(function (response) {
        $('#formCnt').modal('hide');

        _this6.AlertFunction('success', 'Éxito', response.data);

        _this6.CleandForm();

        _event_bus__WEBPACK_IMPORTED_MODULE_1__["default"].$emit('ticket.created');
      })["catch"](function (error) {
        $('#formCnt').modal('hide');

        _this6.AlertFunction('error', 'Error', 'Se produjo un error al crear el ticket, favor contactarse con soporte');

        _this6.CleandForm();
      });
    },
    validateFormStepOne: function validateFormStepOne() {
      if (!this.formInput.site_id) {
        this.errors.site = true;
      }

      if (!this.formInput.motivo_id) {
        this.errors.motivo = true;
      }

      if (this.formInput.motivo_id == 3) {
        if (!this.formInput.tipo_mantencion_id) {
          this.errors.tipo_mantencion = true;
        }
      }

      if (!this.formInput.descripcion) {
        this.errors.descripcion = true;
      }

      if (!this.formInput.area_id) {
        this.errors.area = true;
      }

      if (!this.formInput.tecnica_id) {
        this.errors.tecnica = true;
      }

      if (!this.formInput.equipo_id) {
        this.errors.equipo = true;
      }
    },
    BackStep: function BackStep() {
      this.step = 1;
    },
    getCotizaciones: function getCotizaciones() {
      var _this7 = this;

      var files = this.$refs.cotizaciones.files;

      var _loop = function _loop() {
        var file = files[i];
        var file_extension = file.name.split(".").pop();

        var extension_permited = _this7.extensions.find(function (obj) {
          return obj.extension == file_extension;
        });

        if (extension_permited) {
          _this7.formInput.cotizaciones.push(files[i]);
        }
      };

      for (var i = 0; i < files.length; i++) {
        _loop();
      }
    },
    getValidacionCompras: function getValidacionCompras() {
      var _this8 = this;

      var files = this.$refs.validacionCompras.files;

      var _loop2 = function _loop2() {
        var file = files[i];
        var file_extension = file.name.split(".").pop();

        var extension_permited = _this8.extensions.find(function (obj) {
          return obj.extension == file_extension;
        });

        if (extension_permited) {
          _this8.formInput.validacion_compras.push(files[i]);
        }
      };

      for (var i = 0; i < files.length; i++) {
        _loop2();
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
    shortName: function shortName(name) {
      if (name.length > 14) {
        var short_name = name.substr(0, 12) + '...';
        return short_name;
      } else {
        var _short_name = name;
        return _short_name;
      }
    },
    deleteFile: function deleteFile(key, type_file) {
      if (type_file == 1) {
        this.formInput.cotizaciones.splice(key, 1);
      } else if (type_file == 2) {
        this.formInput.validacion_compras.splice(key, 1);
      }
    },
    AlertFunction: function AlertFunction(Type, Title, Message) {
      Swal.fire({
        type: Type,
        title: Title,
        text: Message
      });
    },
    CleandForm: function CleandForm() {
      this.changeSite();
      this.step = 1;
      this.formInput.motivo_id = null, this.formInput.site_id = null, this.formInput.tipo_mantencion_id = null, this.formInput.descripcion = null, this.formInput.area_id = null, this.formInput.tecnica_id = null, this.formInput.equipo_id = null, this.formInput.cotizaciones = [], this.formInput.validacion_compras = [];
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ticket/FormCnt.vue?vue&type=template&id=7b0c1026&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/ticket/FormCnt.vue?vue&type=template&id=7b0c1026& ***!
  \*****************************************************************************************************************************************************************************************************************/
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
        "data-backdrop": "static",
        id: "formCnt",
        role: "dialog",
        tabindex: "-1",
      },
    },
    [
      _c("div", { staticClass: "modal-dialog  modal-lg" }, [
        _c("div", { staticClass: "modal-content animated bounceInRight" }, [
          _c(
            "div",
            {
              staticClass: "modal-header",
              staticStyle: {
                background:
                  "-webkit-linear-gradient(rgb(0, 92, 255), #007bff99)",
                height: "70px",
              },
            },
            [
              _c(
                "h5",
                {
                  staticClass: "modal-title barlow bold",
                  staticStyle: { color: "white" },
                },
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
                  on: { click: _vm.CleandForm },
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
                        "\n                        ×\n                    "
                      ),
                    ]
                  ),
                ]
              ),
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "modal-body" }, [
            _c("div", { staticClass: "form-group" }, [
              _c("div", { staticClass: "col-12 col-lg-8 offset-lg-2" }, [
                _c("div", { staticClass: "wizard-steps" }, [
                  _c(
                    "div",
                    {
                      staticClass: "wizard-step ",
                      class: _vm.step == 1 ? "wizard-step-active" : "",
                    },
                    [
                      _vm._m(0),
                      _vm._v(" "),
                      _c(
                        "div",
                        { staticClass: "wizard-step-label barlow semi_bold" },
                        [
                          _vm._v(
                            "\n                                    Datos del ticket\n                                "
                          ),
                        ]
                      ),
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "wizard-step",
                      class: _vm.step == 2 ? "wizard-step-active" : "",
                    },
                    [
                      _vm._m(1),
                      _vm._v(" "),
                      _c(
                        "div",
                        { staticClass: "wizard-step-label barlow semi_bold" },
                        [
                          _vm._v(
                            "\n                                    Archivos\n                                "
                          ),
                        ]
                      ),
                    ]
                  ),
                ]),
              ]),
            ]),
            _vm._v(" "),
            _c("form", { staticClass: "wizard-content mt-2" }, [
              _c("div", { staticClass: "wizard-pane" }, [
                _c("div", { staticClass: "row" }, [
                  _vm.step == 1
                    ? _c(
                        "div",
                        { staticClass: "col-lg-6 col-md-6 col-sm-6 col-12" },
                        [
                          _c("div", { staticClass: "form-group " }, [
                            _c("label", { staticClass: "barlow semi_bold" }, [
                              _vm._v(
                                "\n                                        Sitio\n                                    "
                              ),
                            ]),
                            _vm._v(" "),
                            _vm.site_data
                              ? _c("div", { attrs: { id: "site_select" } }, [
                                  _c("div", { staticClass: "input-group" }, [
                                    _c("input", {
                                      staticClass: "form-control",
                                      staticStyle: {
                                        "background-color": "#015dff",
                                        color: "white",
                                      },
                                      attrs: {
                                        disabled: "true",
                                        name: "",
                                        type: "",
                                      },
                                      domProps: { value: _vm.site_data },
                                    }),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "input-group-append" },
                                      [
                                        _c(
                                          "div",
                                          {
                                            staticClass: "input-group-text ",
                                            staticStyle: { cursor: "pointer" },
                                            on: {
                                              click: function ($event) {
                                                $event.preventDefault()
                                                return _vm.changeSite()
                                              },
                                            },
                                          },
                                          [
                                            _c("i", {
                                              staticClass:
                                                "fas fa-times boxBounce text_red",
                                              staticStyle: {
                                                "font-size": "18px",
                                              },
                                            }),
                                          ]
                                        ),
                                      ]
                                    ),
                                  ]),
                                ])
                              : _vm._e(),
                            _vm._v(" "),
                            _vm.site_data == ""
                              ? _c("div", [
                                  _c("div", { staticClass: "input-group" }, [
                                    _c("input", {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.site,
                                          expression: "site",
                                        },
                                      ],
                                      staticClass: "form-control",
                                      staticStyle: { position: "relative" },
                                      attrs: {
                                        name: "siteName",
                                        placeholder: "Buscar Sitio",
                                        id: "siteInput",
                                        type: "text",
                                        value: "",
                                      },
                                      domProps: { value: _vm.site },
                                      on: {
                                        keyup: _vm.searchSite,
                                        input: function ($event) {
                                          if ($event.target.composing) {
                                            return
                                          }
                                          _vm.site = $event.target.value
                                        },
                                      },
                                    }),
                                    _vm._v(" "),
                                    _vm._m(2),
                                  ]),
                                ])
                              : _vm._e(),
                            _vm._v(" "),
                            _vm.sites.length != 0
                              ? _c("div", { attrs: { id: "listPops" } }, [
                                  _c("div", { staticClass: "s_l" }, [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "col-lg-12 col-md-4 col-sm-4 col-10 s_l_m",
                                        style:
                                          "width:" +
                                          _vm.input_width_form +
                                          "px" +
                                          ";",
                                      },
                                      _vm._l(_vm.sites, function (site) {
                                        return _c("div", [
                                          _c(
                                            "a",
                                            {
                                              staticClass: "text_black",
                                              attrs: { href: "" },
                                              on: {
                                                click: function ($event) {
                                                  $event.preventDefault()
                                                  return _vm.selectSite(site)
                                                },
                                              },
                                            },
                                            [
                                              _vm._v(
                                                "\n                                                        " +
                                                  _vm._s(site.nem_site) +
                                                  " " +
                                                  _vm._s(site.nombre) +
                                                  "\n                                                        "
                                              ),
                                              _c("hr", {
                                                staticStyle: {
                                                  "margin-top": "-1px",
                                                },
                                              }),
                                            ]
                                          ),
                                        ])
                                      }),
                                      0
                                    ),
                                  ]),
                                ])
                              : _vm._e(),
                            _vm._v(" "),
                            _vm.errors.site
                              ? _c("div", [
                                  _c("p", { staticClass: "text_red" }, [
                                    _vm._v(
                                      "\n                                            Favor seleccionar un sitio\n                                        "
                                    ),
                                  ]),
                                ])
                              : _vm._e(),
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "form-group" }, [
                            _c("label", { staticClass: "barlow semi_bold" }, [
                              _vm._v(
                                "\n                                        Motivo *\n                                    "
                              ),
                            ]),
                            _vm._v(" "),
                            _c(
                              "select",
                              {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.formInput.motivo_id,
                                    expression: "formInput.motivo_id",
                                  },
                                ],
                                staticClass:
                                  "form-control select barlow regular",
                                attrs: { id: "motivo", name: "motivo" },
                                on: {
                                  change: function ($event) {
                                    var $$selectedVal = Array.prototype.filter
                                      .call(
                                        $event.target.options,
                                        function (o) {
                                          return o.selected
                                        }
                                      )
                                      .map(function (o) {
                                        var val =
                                          "_value" in o ? o._value : o.value
                                        return val
                                      })
                                    _vm.$set(
                                      _vm.formInput,
                                      "motivo_id",
                                      $event.target.multiple
                                        ? $$selectedVal
                                        : $$selectedVal[0]
                                    )
                                  },
                                },
                              },
                              _vm._l(_vm.tipo_motivos, function (motivo) {
                                return _c(
                                  "option",
                                  { domProps: { value: motivo.id } },
                                  [
                                    _vm._v(
                                      "\n                                            " +
                                        _vm._s(motivo.nombre) +
                                        "\n                                        "
                                    ),
                                  ]
                                )
                              }),
                              0
                            ),
                            _vm._v(" "),
                            _vm.errors.motivo
                              ? _c("div", [
                                  _c("p", { staticClass: "text_red" }, [
                                    _vm._v(
                                      "\n                                            Favor seleccionar el Motivo\n                                        "
                                    ),
                                  ]),
                                ])
                              : _vm._e(),
                          ]),
                          _vm._v(" "),
                          _vm.formInput.motivo_id == 3
                            ? _c("div", { staticClass: "form-group" }, [
                                _c(
                                  "label",
                                  { staticClass: "barlow semi_bold" },
                                  [
                                    _vm._v(
                                      "\n                                        Tipo mantención *\n                                    "
                                    ),
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
                                        value: _vm.formInput.tipo_mantencion_id,
                                        expression:
                                          "formInput.tipo_mantencion_id",
                                      },
                                    ],
                                    staticClass:
                                      "form-control select barlow regular",
                                    attrs: { name: "mantencion" },
                                    on: {
                                      change: function ($event) {
                                        var $$selectedVal =
                                          Array.prototype.filter
                                            .call(
                                              $event.target.options,
                                              function (o) {
                                                return o.selected
                                              }
                                            )
                                            .map(function (o) {
                                              var val =
                                                "_value" in o
                                                  ? o._value
                                                  : o.value
                                              return val
                                            })
                                        _vm.$set(
                                          _vm.formInput,
                                          "tipo_mantencion_id",
                                          $event.target.multiple
                                            ? $$selectedVal
                                            : $$selectedVal[0]
                                        )
                                      },
                                    },
                                  },
                                  _vm._l(
                                    _vm.tipo_mantenciones,
                                    function (mantencion) {
                                      return _c(
                                        "option",
                                        { domProps: { value: mantencion.id } },
                                        [
                                          _vm._v(
                                            "\n                                            " +
                                              _vm._s(mantencion.name) +
                                              "\n                                        "
                                          ),
                                        ]
                                      )
                                    }
                                  ),
                                  0
                                ),
                                _vm._v(" "),
                                _vm.errors.tipo_mantencion
                                  ? _c("div", [
                                      _c("p", { staticClass: "text_red" }, [
                                        _vm._v(
                                          "\n                                            Favor seleccionar el Tipo de mantención\n                                        "
                                        ),
                                      ]),
                                    ])
                                  : _vm._e(),
                              ])
                            : _vm._e(),
                          _vm._v(" "),
                          _c("div", { staticClass: "form-group" }, [
                            _c("label", { staticClass: "barlow semi_bold" }, [
                              _vm._v(
                                "\n                                        Descripción*\n                                    "
                              ),
                            ]),
                            _vm._v(" "),
                            _c("textarea", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.formInput.descripcion,
                                  expression: "formInput.descripcion",
                                },
                              ],
                              staticClass: "form-control",
                              staticStyle: { width: "100%", height: "100px" },
                              attrs: { placeholder: "" },
                              domProps: { value: _vm.formInput.descripcion },
                              on: {
                                input: function ($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.formInput,
                                    "descripcion",
                                    $event.target.value
                                  )
                                },
                              },
                            }),
                            _vm._v(" "),
                            _vm.errors.descripcion
                              ? _c("div", [
                                  _c("p", { staticClass: "text_red" }, [
                                    _vm._v(
                                      "\n                                            Favor indicar una descripción\n                                        "
                                    ),
                                  ]),
                                ])
                              : _vm._e(),
                          ]),
                        ]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _vm.step == 1
                    ? _c(
                        "div",
                        { staticClass: "col-lg-6 col-md-6 col-sm-6 col-12" },
                        [
                          _c("div", { staticClass: "form-group" }, [
                            _c("label", { staticClass: "barlow semi_bold" }, [
                              _vm._v(
                                "\n                                        Área *\n                                    "
                              ),
                            ]),
                            _vm._v(" "),
                            _c(
                              "select",
                              {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.formInput.area_id,
                                    expression: "formInput.area_id",
                                  },
                                ],
                                staticClass:
                                  "form-control select barlow regular",
                                attrs: { id: "areas", name: "area" },
                                on: {
                                  change: [
                                    function ($event) {
                                      var $$selectedVal = Array.prototype.filter
                                        .call(
                                          $event.target.options,
                                          function (o) {
                                            return o.selected
                                          }
                                        )
                                        .map(function (o) {
                                          var val =
                                            "_value" in o ? o._value : o.value
                                          return val
                                        })
                                      _vm.$set(
                                        _vm.formInput,
                                        "area_id",
                                        $event.target.multiple
                                          ? $$selectedVal
                                          : $$selectedVal[0]
                                      )
                                    },
                                    _vm.getTecnica,
                                  ],
                                },
                              },
                              _vm._l(_vm.areas, function (area) {
                                return _c(
                                  "option",
                                  { domProps: { value: area.id } },
                                  [
                                    _vm._v(
                                      "\n                                            " +
                                        _vm._s(area.descripcion) +
                                        "\n                                        "
                                    ),
                                  ]
                                )
                              }),
                              0
                            ),
                            _vm._v(" "),
                            _vm.errors.area
                              ? _c("div", [
                                  _c("p", { staticClass: "text_red" }, [
                                    _vm._v(
                                      "\n                                            Favor seleccionar el área\n                                        "
                                    ),
                                  ]),
                                ])
                              : _vm._e(),
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "form-group" }, [
                            _c("label", { staticClass: "barlow semi_bold" }, [
                              _vm._v(
                                "\n                                        Técnica *\n                                    "
                              ),
                            ]),
                            _vm._v(" "),
                            _c(
                              "select",
                              {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.formInput.tecnica_id,
                                    expression: "formInput.tecnica_id",
                                  },
                                ],
                                staticClass:
                                  "form-control select barlow regular ",
                                attrs: { id: "tecnicas", name: "tecnica" },
                                on: {
                                  change: [
                                    function ($event) {
                                      var $$selectedVal = Array.prototype.filter
                                        .call(
                                          $event.target.options,
                                          function (o) {
                                            return o.selected
                                          }
                                        )
                                        .map(function (o) {
                                          var val =
                                            "_value" in o ? o._value : o.value
                                          return val
                                        })
                                      _vm.$set(
                                        _vm.formInput,
                                        "tecnica_id",
                                        $event.target.multiple
                                          ? $$selectedVal
                                          : $$selectedVal[0]
                                      )
                                    },
                                    _vm.getEquipo,
                                  ],
                                },
                              },
                              _vm._l(_vm.tecnicas, function (tecnica) {
                                return _c(
                                  "option",
                                  { domProps: { value: tecnica.id } },
                                  [
                                    _vm._v(
                                      "\n                                            " +
                                        _vm._s(tecnica.descripcion) +
                                        "\n                                        "
                                    ),
                                  ]
                                )
                              }),
                              0
                            ),
                            _vm._v(" "),
                            _vm.errors.tecnica
                              ? _c("div", [
                                  _c("p", { staticClass: "text_red" }, [
                                    _vm._v(
                                      "\n                                            Favor seleccionar la Tecnia\n                                        "
                                    ),
                                  ]),
                                ])
                              : _vm._e(),
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "form-group" }, [
                            _c("label", { staticClass: "barlow semi_bold" }, [
                              _vm._v(
                                "\n                                        Equipos *\n                                    "
                              ),
                            ]),
                            _vm._v(" "),
                            _c(
                              "select",
                              {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.formInput.equipo_id,
                                    expression: "formInput.equipo_id",
                                  },
                                ],
                                staticClass:
                                  "form-control select barlow regular",
                                on: {
                                  change: function ($event) {
                                    var $$selectedVal = Array.prototype.filter
                                      .call(
                                        $event.target.options,
                                        function (o) {
                                          return o.selected
                                        }
                                      )
                                      .map(function (o) {
                                        var val =
                                          "_value" in o ? o._value : o.value
                                        return val
                                      })
                                    _vm.$set(
                                      _vm.formInput,
                                      "equipo_id",
                                      $event.target.multiple
                                        ? $$selectedVal
                                        : $$selectedVal[0]
                                    )
                                  },
                                },
                              },
                              _vm._l(_vm.equipos, function (equipo) {
                                return _c(
                                  "option",
                                  { domProps: { value: equipo.id } },
                                  [
                                    _vm._v(
                                      "\n                                            " +
                                        _vm._s(equipo.descripcion) +
                                        "\n                                        "
                                    ),
                                  ]
                                )
                              }),
                              0
                            ),
                            _vm._v(" "),
                            _vm.errors.equipo
                              ? _c("div", [
                                  _c("p", { staticClass: "text_red" }, [
                                    _vm._v(
                                      "\n                                            Favor seleccionar el equipo\n                                        "
                                    ),
                                  ]),
                                ])
                              : _vm._e(),
                          ]),
                        ]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _vm.step == 2
                    ? _c("div", { staticClass: "col-lg-12" }, [
                        _c("div", [
                          _c("div", { staticClass: "image-upload-wrap" }, [
                            _c("input", {
                              ref: "cotizaciones",
                              staticClass: "file-upload-input",
                              attrs: {
                                id: "cotizaciones",
                                multiple: "",
                                type: "file",
                              },
                              on: {
                                change: function ($event) {
                                  return _vm.getCotizaciones()
                                },
                              },
                            }),
                            _vm._v(" "),
                            _vm._m(3),
                          ]),
                          _vm._v(" "),
                          _vm.formInput.cotizaciones.length != 0
                            ? _c(
                                "div",
                                { staticClass: "row tck_suport mt-2" },
                                _vm._l(
                                  _vm.formInput.cotizaciones,
                                  function (file, key) {
                                    return _c(
                                      "div",
                                      { staticClass: "col-lg-3 text-center" },
                                      [
                                        _c(
                                          "div",
                                          {
                                            staticClass: "browser ",
                                            attrs: { title: file.name },
                                          },
                                          [
                                            _c("i", {
                                              class: _vm.typeFile(file.name),
                                              staticStyle: {
                                                "font-size": "55px",
                                              },
                                            }),
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "mt-2 barlow regular",
                                          },
                                          [
                                            _vm._v(
                                              _vm._s(_vm.shortName(file.name))
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
                                                attrs: { href: "#" },
                                                on: {
                                                  click: function ($event) {
                                                    return _vm.deleteFile(
                                                      key,
                                                      1
                                                    )
                                                  },
                                                },
                                              },
                                              [
                                                _c("i", {
                                                  staticClass:
                                                    "fa fa-trash text_red",
                                                  staticStyle: {
                                                    "font-size": "15px",
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
                        _c("div", { staticClass: "mt-5" }, [
                          _c("div", { staticClass: "image-upload-wrap" }, [
                            _c("input", {
                              ref: "validacionCompras",
                              staticClass: "file-upload-input",
                              attrs: {
                                id: "validacionCompras",
                                multiple: "",
                                type: "file",
                              },
                              on: {
                                change: function ($event) {
                                  return _vm.getValidacionCompras()
                                },
                              },
                            }),
                            _vm._v(" "),
                            _vm._m(4),
                          ]),
                          _vm._v(" "),
                          _vm.formInput.validacion_compras.length != 0
                            ? _c(
                                "div",
                                { staticClass: "row tck_suport mt-2" },
                                _vm._l(
                                  _vm.formInput.validacion_compras,
                                  function (file, key) {
                                    return _c(
                                      "div",
                                      { staticClass: "col-lg-3 text-center" },
                                      [
                                        _c(
                                          "div",
                                          {
                                            staticClass: "browser ",
                                            attrs: { title: file.name },
                                          },
                                          [
                                            _c("i", {
                                              class: _vm.typeFile(file.name),
                                              staticStyle: {
                                                "font-size": "55px",
                                              },
                                            }),
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "mt-2 barlow regular",
                                          },
                                          [
                                            _vm._v(
                                              _vm._s(_vm.shortName(file.name))
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
                                                attrs: { href: "#" },
                                                on: {
                                                  click: function ($event) {
                                                    return _vm.deleteFile(
                                                      key,
                                                      2
                                                    )
                                                  },
                                                },
                                              },
                                              [
                                                _c("i", {
                                                  staticClass:
                                                    "fa fa-trash text_red",
                                                  staticStyle: {
                                                    "font-size": "15px",
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
                      ])
                    : _vm._e(),
                ]),
              ]),
            ]),
          ]),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "modal-footer",
              staticStyle: {
                background:
                  "-webkit-linear-gradient(rgb(0, 92, 255), #007bff99)",
              },
            },
            [
              _vm.step == 1
                ? _c(
                    "button",
                    {
                      staticClass: "btn btn-secondary btn-grey",
                      on: { click: _vm.nextStep },
                    },
                    [
                      _vm._v(
                        "\n                    Siguiente\n                    "
                      ),
                      _c("i", { staticClass: "fas fa-angle-right" }),
                    ]
                  )
                : _vm._e(),
              _vm._v(" "),
              _vm.step == 2
                ? _c(
                    "button",
                    {
                      staticClass: "btn btn-secondary btn-grey",
                      on: { click: _vm.BackStep },
                    },
                    [
                      _c("i", { staticClass: "fas fa-angle-left" }),
                      _vm._v("\n                    Atrás\n\n                "),
                    ]
                  )
                : _vm._e(),
              _vm._v(" "),
              _vm.step == 2
                ? _c(
                    "button",
                    {
                      staticClass: "btn btn-success btn-grey",
                      on: { click: _vm.crateTicket },
                    },
                    [
                      _vm._v(
                        "\n                    Crear Ticket\n                "
                      ),
                    ]
                  )
                : _vm._e(),
            ]
          ),
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
    return _c("div", { staticClass: "wizard-step-icon" }, [
      _c("i", { staticClass: "fas fa-ticket-alt" }),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "wizard-step-icon" }, [
      _c("i", { staticClass: "fas fa-file-upload" }),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group-append" }, [
      _c("div", { staticClass: "input-group-text" }, [
        _c("i", { staticClass: "fas fa-search" }),
      ]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "drag-text" }, [
      _c(
        "h2",
        {
          staticClass: "barlow semi_bold",
          staticStyle: { "font-size": "20px" },
        },
        [
          _vm._v(
            "\n                                                Cotizaciones\n\n                                            "
          ),
        ]
      ),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "drag-text" }, [
      _c(
        "h2",
        {
          staticClass: "barlow semi_bold",
          staticStyle: { "font-size": "20px" },
        },
        [
          _vm._v(
            "\n                                                Validación de compras\n\n                                            "
          ),
        ]
      ),
    ])
  },
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/ticket/FormCnt.vue":
/*!****************************************************!*\
  !*** ./resources/js/components/ticket/FormCnt.vue ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _FormCnt_vue_vue_type_template_id_7b0c1026___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./FormCnt.vue?vue&type=template&id=7b0c1026& */ "./resources/js/components/ticket/FormCnt.vue?vue&type=template&id=7b0c1026&");
/* harmony import */ var _FormCnt_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./FormCnt.vue?vue&type=script&lang=js& */ "./resources/js/components/ticket/FormCnt.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _FormCnt_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _FormCnt_vue_vue_type_template_id_7b0c1026___WEBPACK_IMPORTED_MODULE_0__["render"],
  _FormCnt_vue_vue_type_template_id_7b0c1026___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/ticket/FormCnt.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/ticket/FormCnt.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/ticket/FormCnt.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FormCnt_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./FormCnt.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ticket/FormCnt.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FormCnt_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/ticket/FormCnt.vue?vue&type=template&id=7b0c1026&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/ticket/FormCnt.vue?vue&type=template&id=7b0c1026& ***!
  \***********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormCnt_vue_vue_type_template_id_7b0c1026___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./FormCnt.vue?vue&type=template&id=7b0c1026& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ticket/FormCnt.vue?vue&type=template&id=7b0c1026&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormCnt_vue_vue_type_template_id_7b0c1026___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormCnt_vue_vue_type_template_id_7b0c1026___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
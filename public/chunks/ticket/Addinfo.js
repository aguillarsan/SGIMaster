(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunks/ticket/Addinfo"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ticket/Addinfo.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/ticket/Addinfo.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _event_bus__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../event-bus */ "./resources/js/components/event-bus.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      areas: [],
      tecnicas: [],
      equipos: [],
      area_id: '',
      tecnica_id: '',
      equipo_id: '',
      formData: new FormData()
    };
  },
  created: function created() {
    this.getData();
  },
  mounted: function mounted() {},
  methods: {
    updateTicket: function updateTicket() {
      if (this.area_id != "" && this.tecnica_id != "" && this.equipo_id != "") {
        this.formData.append('area_id', this.area_id);
        this.formData.append('tecnica_id', this.tecnica_id);
        this.formData.append('equipo_id', this.equipo_id);
        this.formData.append('ticket_id', this.$route.params.id);
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/udpate/data/ticket/expres', this.formData).then(function (response) {
          $('#addInfoTicket').modal('hide');
        });
        _event_bus__WEBPACK_IMPORTED_MODULE_2__["default"].$emit('ticket.ticketData');
      }
    },
    getData: function getData() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/Getarea').then(function (response) {
        _this.areas = response.data;
      });
    },
    tecnica: function tecnica() {
      var _this2 = this;

      var idaea = document.getElementById('areas').value;

      if (this.motivoId == 4 && this.areaId == 1) {
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/GetFilterTecnica').then(function (response) {
          _this2.tecnicas = response.data;
        });
      } else {
        if (this.motivoId == 4 && this.areaId == 2) {
          axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/GetFilterTecnicaClima').then(function (response) {
            _this2.tecnicas = response.data;
          });
        } else {
          axios__WEBPACK_IMPORTED_MODULE_0___default()({
            method: 'Get',
            responseType: 'json',
            url: '/GetTecnica/' + idaea
          }).then(function (response) {
            _this2.tecnicas = response.data;
          });
        }
      }
    },
    equipo: function equipo() {
      var _this3 = this;

      var idtecnica = document.getElementById('tecnicas').value;
      axios__WEBPACK_IMPORTED_MODULE_0___default()({
        method: 'Get',
        responseType: 'json',
        url: '/GetEquipo/' + idtecnica
      }).then(function (response) {
        _this3.equipos = response.data;
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ticket/Addinfo.vue?vue&type=template&id=745691b7&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/ticket/Addinfo.vue?vue&type=template&id=745691b7& ***!
  \*****************************************************************************************************************************************************************************************************************/
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
    _c(
      "div",
      {
        staticClass: "modal inmodal",
        attrs: {
          "aria-hidden": "true",
          "data-backdrop": "static",
          id: "addInfoTicket",
          role: "dialog",
          tabindex: "-1"
        }
      },
      [
        _c("div", { staticClass: "modal-dialog" }, [
          _c("div", { staticClass: "modal-content animated bounceInRight" }, [
            _vm._m(0),
            _vm._v(" "),
            _c("div", { staticClass: "modal-body" }, [
              _c("div", { staticClass: "form-group" }, [
                _c("label", { staticClass: "barlow semi_bold" }, [
                  _vm._v(
                    "\n                            Área *\n                        "
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
                        value: _vm.area_id,
                        expression: "area_id"
                      }
                    ],
                    staticClass: "form-control select barlow regular",
                    attrs: { id: "areas", name: "area" },
                    on: {
                      change: [
                        function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.area_id = $event.target.multiple
                            ? $$selectedVal
                            : $$selectedVal[0]
                        },
                        _vm.tecnica
                      ]
                    }
                  },
                  _vm._l(_vm.areas, function(area) {
                    return _c("option", { domProps: { value: area.id } }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(area.descripcion) +
                          "\n                            "
                      )
                    ])
                  }),
                  0
                ),
                _vm._v(" "),
                _vm._m(1)
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "form-group" }, [
                _c(
                  "label",
                  {
                    staticClass: "barlow semi_bold",
                    attrs: { for: "fechaInicio" }
                  },
                  [
                    _vm._v(
                      "\n                            Técnica *\n                        "
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
                        value: _vm.tecnica_id,
                        expression: "tecnica_id"
                      }
                    ],
                    staticClass: "form-control select barlow regular ",
                    attrs: { id: "tecnicas", name: "tecnica" },
                    on: {
                      change: [
                        function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.tecnica_id = $event.target.multiple
                            ? $$selectedVal
                            : $$selectedVal[0]
                        },
                        _vm.equipo
                      ]
                    }
                  },
                  _vm._l(_vm.tecnicas, function(tecnica) {
                    return _c("option", { domProps: { value: tecnica.id } }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(tecnica.descripcion) +
                          "\n                            "
                      )
                    ])
                  }),
                  0
                ),
                _vm._v(" "),
                _vm._m(2)
              ]),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "form-group", attrs: { id: "equiposId" } },
                [
                  _c(
                    "label",
                    {
                      staticClass: "barlow semi_bold",
                      attrs: { for: "fechaInicio" }
                    },
                    [
                      _vm._v(
                        "\n                            Equipos *\n                        "
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
                          value: _vm.equipo_id,
                          expression: "equipo_id"
                        }
                      ],
                      staticClass: "form-control select barlow regular",
                      attrs: { id: "equipo", name: "equipo" },
                      on: {
                        change: function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.equipo_id = $event.target.multiple
                            ? $$selectedVal
                            : $$selectedVal[0]
                        }
                      }
                    },
                    _vm._l(_vm.equipos, function(equipo) {
                      return _c("option", { domProps: { value: equipo.id } }, [
                        _vm._v(
                          "\n                                " +
                            _vm._s(equipo.descripcion) +
                            "\n                            "
                        )
                      ])
                    }),
                    0
                  ),
                  _vm._v(" "),
                  _vm._m(3)
                ]
              )
            ]),
            _vm._v(" "),
            _c(
              "div",
              {
                staticClass: "modal-footer",
                staticStyle: {
                  background:
                    "-webkit-linear-gradient(rgb(0, 92, 255), #007bff99)"
                }
              },
              [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-secondary btn-grey",
                    on: { click: _vm.updateTicket }
                  },
                  [
                    _vm._v(
                      "\n                        Guardar cambios\n                    "
                    )
                  ]
                )
              ]
            )
          ])
        ])
      ]
    )
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
              "\n                        Completar datos del ticket\n                    "
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
                  "\n                            ×\n                        "
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
    return _c(
      "div",
      { staticStyle: { display: "none" }, attrs: { id: "errorArea" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                Favor seleccionar el área\n                            "
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
            "\n                                Favor seleccionar la Tecnia\n                            "
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
            "\n                                Favor seleccionar el equipo\n                            "
          )
        ])
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/ticket/Addinfo.vue":
/*!****************************************************!*\
  !*** ./resources/js/components/ticket/Addinfo.vue ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Addinfo_vue_vue_type_template_id_745691b7___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Addinfo.vue?vue&type=template&id=745691b7& */ "./resources/js/components/ticket/Addinfo.vue?vue&type=template&id=745691b7&");
/* harmony import */ var _Addinfo_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Addinfo.vue?vue&type=script&lang=js& */ "./resources/js/components/ticket/Addinfo.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Addinfo_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Addinfo_vue_vue_type_template_id_745691b7___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Addinfo_vue_vue_type_template_id_745691b7___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/ticket/Addinfo.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/ticket/Addinfo.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/ticket/Addinfo.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Addinfo_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Addinfo.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ticket/Addinfo.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Addinfo_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/ticket/Addinfo.vue?vue&type=template&id=745691b7&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/ticket/Addinfo.vue?vue&type=template&id=745691b7& ***!
  \***********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Addinfo_vue_vue_type_template_id_745691b7___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Addinfo.vue?vue&type=template&id=745691b7& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ticket/Addinfo.vue?vue&type=template&id=745691b7&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Addinfo_vue_vue_type_template_id_745691b7___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Addinfo_vue_vue_type_template_id_745691b7___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
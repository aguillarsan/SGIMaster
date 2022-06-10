(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunks/itos/calendario/task"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/itos/calendario/task.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/itos/calendario/task.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var vue_browser_geolocation__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-browser-geolocation */ "./node_modules/vue-browser-geolocation/dist/vue-geolocation.js");
/* harmony import */ var vue_browser_geolocation__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue_browser_geolocation__WEBPACK_IMPORTED_MODULE_2__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



Vue.use(vue_browser_geolocation__WEBPACK_IMPORTED_MODULE_2___default.a);
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
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
      change_data: false
    };
  },
  created: function created() {
    this.getData();
  },
  methods: {
    getData: function getData() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_1___default.a.get('/get/task/itos').then(function (response) {
        _this.tasks = response.data;
        _this.load = false;
      });
    },
    moreDetail: function moreDetail(task) {
      this.task_detail = task;
    },
    formato: function formato(d) {
      return moment__WEBPACK_IMPORTED_MODULE_0___default()(d).format("DD/MM/YYYY");
    },
    changeStatus: function changeStatus(task) {
      var _this2 = this;

      var formData = new FormData();

      if (task.state_id == 1) {
        this.getLocation();
        formData.append('lat', this.coords.lat);
        formData.append('lng', this.coords.lng);
      }

      this.change_data = true;
      formData.append('task_id', task.id);
      axios__WEBPACK_IMPORTED_MODULE_1___default.a.post('/update/state/task', formData).then(function (response) {
        _this2.getData();

        _this2.change_data = false;
      });
    },
    getLocation: function getLocation() {
      var _this3 = this;

      this.$getLocation(this.options).then(function (coordinates) {
        _this3.coords = coordinates;
      });
    },
    textButton: function textButton(task) {
      if (task.state_id == 1) {
        return "Iniciar tarea";
      } else if (task.state_id == 2) {
        return "Finalizar tarea";
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-browser-geolocation/dist/vue-geolocation.js":
/*!**********************************************************************!*\
  !*** ./node_modules/vue-browser-geolocation/dist/vue-geolocation.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

!function(o,t){ true?module.exports=t():undefined}(this,function(){return function(o){function t(n){if(e[n])return e[n].exports;var r=e[n]={i:n,l:!1,exports:{}};return o[n].call(r.exports,r,r.exports,t),r.l=!0,r.exports}var e={};return t.m=o,t.c=e,t.i=function(o){return o},t.d=function(o,e,n){t.o(o,e)||Object.defineProperty(o,e,{configurable:!1,enumerable:!0,get:n})},t.n=function(o){var e=o&&o.__esModule?function(){return o.default}:function(){return o};return t.d(e,"a",e),e},t.o=function(o,t){return Object.prototype.hasOwnProperty.call(o,t)},t.p="",t(t.s=0)}([function(o,t,e){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n={install:function(o){o.prototype.$getLocation=n.getLocation,o.prototype.$watchLocation=n.watchLocation,o.prototype.$clearLocationWatch=n.clearLocation},getLocation:function(){var o=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=arguments.length>1&&void 0!==arguments[1]&&arguments[1];return new Promise(function(e,r){if(t)return void r("reject forced for testing purposes");n._isAvailable()?window.navigator.geolocation.getCurrentPosition(function(o){e({lat:o.coords.latitude,lng:o.coords.longitude,altitude:o.coords.altitude,altitudeAccuracy:o.coords.altitudeAccuracy,accuracy:o.coords.accuracy})},function(){r("no position access")},o):r("no browser support")})},watchLocation:function(){var o=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=arguments.length>1&&void 0!==arguments[1]&&arguments[1];return new Promise(function(e,r){if(t)return void r("reject forced for testing purposes");n._isAvailable()?window.navigator.geolocation.watchPosition(function(o){e({lat:o.coords.latitude,lng:o.coords.longitude,altitude:o.coords.altitude,altitudeAccuracy:o.coords.altitudeAccuracy,accuracy:o.coords.accuracy,heading:o.coords.heading,speed:o.coords.speed})},function(){r("no position access")},o):r("no browser support")})},clearLocation:function(o){return new Promise(function(t,e){n._isAvailable()?o?t(window.navigator.geolocation.clearWatch(o)):e("please provide watchID"):e("no browser support")})},_isAvailable:function(){return"geolocation"in window.navigator}};t.default=n,"undefined"!=typeof window&&window.Vue&&window.Vue.use(n)}])});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/itos/calendario/task.vue?vue&type=template&id=4331c2db&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/itos/calendario/task.vue?vue&type=template&id=4331c2db& ***!
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
  return _c("div", [
    _vm._m(0),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "col-12 col-md-6 col-lg-12" },
      [
        _vm._l(_vm.tasks, function (task) {
          return !_vm.load
            ? _c("div", { staticClass: "card shadow-box-ag " }, [
                _c("div", { staticClass: "card-header" }, [
                  _c("h4", { staticClass: "barlow bold" }, [
                    _vm._v("Tarea nro° " + _vm._s(task.id)),
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "card-header-action" }, [
                    task.state_id == 1 || task.state_id == 2
                      ? _c(
                          "a",
                          {
                            class:
                              task.state_id == 1
                                ? "btn btn-primary"
                                : "btn btn-success",
                            staticStyle: { "border-radius": "5px !important" },
                            attrs: { href: "#" },
                            on: {
                              click: function ($event) {
                                $event.preventDefault()
                                return _vm.changeStatus(task)
                              },
                            },
                          },
                          [_vm._v(_vm._s(_vm.textButton(task)))]
                        )
                      : _vm._e(),
                    _vm._v(" "),
                    _c(
                      "a",
                      {
                        staticClass: "btn btn-info",
                        staticStyle: { "border-radius": "5px !important" },
                        attrs: { href: "#detailEvent", "data-toggle": "modal" },
                        on: {
                          click: function ($event) {
                            return _vm.moreDetail(task)
                          },
                        },
                      },
                      [_vm._v("Más detalles")]
                    ),
                  ]),
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "card-body" }, [
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-12 col-md-6 col-lg-2" }, [
                      _c("p", { staticClass: "barlow semi_bold" }, [
                        _vm._v(_vm._s(task.title)),
                      ]),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-12 col-md-6 col-lg-2" }, [
                      _c(
                        "div",
                        { staticClass: "ticket-desc barlow semi_bold" },
                        [
                          _c("div", [
                            _vm._v(
                              "\n                                Fecha de inicio\n                            "
                            ),
                          ]),
                          _vm._v(" "),
                          _c("div", [
                            _vm._v(
                              "\n                                " +
                                _vm._s(_vm.formato(task.start)) +
                                "\n                            "
                            ),
                          ]),
                        ]
                      ),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-12 col-md-6 col-lg-3" }, [
                      _c(
                        "div",
                        { staticClass: "ticket-desc barlow semi_bold" },
                        [
                          _c("div", [
                            _vm._v(
                              "\n                                Fecha de término\n                            "
                            ),
                          ]),
                          _vm._v(" "),
                          _c("div", [
                            _vm._v(
                              "\n                                " +
                                _vm._s(_vm.formato(task.end)) +
                                "\n                            "
                            ),
                          ]),
                        ]
                      ),
                    ]),
                  ]),
                ]),
              ])
            : _vm._e()
        }),
        _vm._v(" "),
        _vm.load
          ? _c(
              "div",
              { staticClass: "empty-state", attrs: { "data-height": "400" } },
              [_vm._m(1)]
            )
          : _vm._e(),
      ],
      2
    ),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "modal inmodal",
        attrs: {
          "aria-hidden": "true",
          id: "detailEvent",
          role: "dialog",
          tabindex: "-1",
          "data-backdrop": "static",
        },
      },
      [
        _c("div", { staticClass: "modal-dialog modal-lg" }, [
          _c("div", { staticClass: "modal-content animated bounceInRight" }, [
            _vm._m(2),
            _vm._v(" "),
            _c("div", { staticClass: "modal-body" }, [
              _vm.task_detail
                ? _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c(
                          "label",
                          {
                            staticClass: "barlow semi_bold",
                            attrs: { for: "description" },
                          },
                          [
                            _vm._v(
                              "\n                                    Descripción\n                                "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "barlow regular" }, [
                          _vm._v(_vm._s(_vm.task_detail.title)),
                        ]),
                      ]),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c(
                          "label",
                          {
                            staticClass: "barlow semi_bold",
                            attrs: { for: "description" },
                          },
                          [
                            _vm._v(
                              "\n                                    Fecha de inicio\n                                "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "barlow regular" }, [
                          _vm._v(_vm._s(_vm.formato(_vm.task_detail.start))),
                        ]),
                      ]),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c(
                          "label",
                          {
                            staticClass: "barlow semi_bold",
                            attrs: { for: "description" },
                          },
                          [
                            _vm._v(
                              "\n                                    Fecha de termino\n                                "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "barlow regular" }, [
                          _vm._v(
                            " " + _vm._s(_vm.formato(_vm.task_detail.end))
                          ),
                        ]),
                      ]),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c(
                          "label",
                          {
                            staticClass: "barlow semi_bold",
                            attrs: { for: "description" },
                          },
                          [
                            _vm._v(
                              "\n                                    Estado\n                                "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", [
                          _vm._v(
                            _vm._s(
                              _vm.task_detail.state
                                ? _vm.task_detail.state.state
                                : ""
                            )
                          ),
                        ]),
                      ]),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c(
                          "label",
                          {
                            staticClass: "barlow semi_bold",
                            attrs: { for: "Jefe_de_proyecto" },
                          },
                          [
                            _vm._v(
                              "\n                                    Jefe de proyecto\n                                "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "barlow regular" }, [
                          _vm._v(
                            _vm._s(
                              _vm.task_detail.project_manager
                                ? _vm.task_detail.project_manager.name_manager
                                : ""
                            )
                          ),
                        ]),
                      ]),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c(
                          "label",
                          {
                            staticClass: "barlow semi_bold",
                            attrs: { for: "recurso" },
                          },
                          [
                            _vm._v(
                              "\n                                    Supervisor\n                                "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "barlow regular" }, [
                          _vm._v(
                            _vm._s(
                              _vm.task_detail.resource
                                ? _vm.task_detail.resource.name_resource
                                : ""
                            )
                          ),
                        ]),
                      ]),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c(
                          "label",
                          {
                            staticClass: "barlow semi_bold",
                            attrs: { for: "sitio " },
                          },
                          [
                            _vm._v(
                              "\n                                    Nombre sitio\n                                "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "barlow regular" }, [
                          _vm._v(
                            _vm._s(
                              _vm.task_detail.site
                                ? _vm.task_detail.site.nombre
                                : ""
                            )
                          ),
                        ]),
                      ]),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c(
                          "label",
                          {
                            staticClass: "barlow semi_bold",
                            attrs: { for: "sitio " },
                          },
                          [
                            _vm._v(
                              "\n                                    Nemónico\n                                "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "barlow regular" }, [
                          _vm._v(
                            _vm._s(
                              _vm.task_detail.site
                                ? _vm.task_detail.site.nem_site
                                : ""
                            ) + "\n                                "
                          ),
                        ]),
                      ]),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c(
                          "label",
                          {
                            staticClass: "barlow semi_bold",
                            attrs: { for: "sitio " },
                          },
                          [
                            _vm._v(
                              "\n                                    Dirección\n                                "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "barlow regular" }, [
                          _vm._v(
                            _vm._s(
                              _vm.task_detail.site
                                ? _vm.task_detail.site.pop.direccion
                                : ""
                            ) + "\n                                "
                          ),
                        ]),
                      ]),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c(
                          "label",
                          {
                            staticClass: "barlow semi_bold",
                            attrs: { for: "pep " },
                          },
                          [
                            _vm._v(
                              "\n                                    Pep\n                                "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "barlow regular" }, [
                          _vm._v(_vm._s(_vm.task_detail.pep)),
                        ]),
                      ]),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c(
                          "label",
                          {
                            staticClass: "barlow semi_bold",
                            attrs: { for: "pep " },
                          },
                          [
                            _vm._v(
                              "\n                                    TP\n                                "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "barlow regular" }, [
                          _vm._v(_vm._s(_vm.task_detail.tp)),
                        ]),
                      ]),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c(
                          "label",
                          {
                            staticClass: "barlow semi_bold",
                            attrs: { for: "categoria" },
                          },
                          [
                            _vm._v(
                              "\n                                    Categoría de tarea\n                                "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "barlow regular" }, [
                          _vm._v(
                            _vm._s(
                              _vm.task_detail.category
                                ? _vm.task_detail.category.category
                                : ""
                            )
                          ),
                        ]),
                      ]),
                    ]),
                  ])
                : _vm._e(),
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
    return _c("section", { staticClass: "section" }, [
      _c("div", { staticClass: "section-header shadow-box-ag" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-lg-12 col-md-6 col-sm-6 col-12 " }, [
            _c("div", { staticClass: "card-stats-title" }, [
              _c("h1", { staticClass: "barlow semi_bold" }, [
                _vm._v(
                  "\n                            Itos / Tareas\n                        "
                ),
              ]),
            ]),
          ]),
        ]),
      ]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "d-flex justify-content-center" }, [
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
            { staticClass: "sr-only", staticStyle: { color: "#191919" } },
            [
              _vm._v(
                "\n                        Cargando...\n                    "
              ),
            ]
          ),
        ]
      ),
    ])
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
          background: "-webkit-linear-gradient(#4776E6,#8E54E9)",
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
          [
            _vm._v(
              "\n                        Detalles de la tarea\n                    "
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

/***/ "./resources/js/components/itos/calendario/task.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/itos/calendario/task.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _task_vue_vue_type_template_id_4331c2db___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./task.vue?vue&type=template&id=4331c2db& */ "./resources/js/components/itos/calendario/task.vue?vue&type=template&id=4331c2db&");
/* harmony import */ var _task_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./task.vue?vue&type=script&lang=js& */ "./resources/js/components/itos/calendario/task.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _task_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _task_vue_vue_type_template_id_4331c2db___WEBPACK_IMPORTED_MODULE_0__["render"],
  _task_vue_vue_type_template_id_4331c2db___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/itos/calendario/task.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/itos/calendario/task.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/itos/calendario/task.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_task_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./task.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/itos/calendario/task.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_task_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/itos/calendario/task.vue?vue&type=template&id=4331c2db&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/itos/calendario/task.vue?vue&type=template&id=4331c2db& ***!
  \*****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_task_vue_vue_type_template_id_4331c2db___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./task.vue?vue&type=template&id=4331c2db& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/itos/calendario/task.vue?vue&type=template&id=4331c2db&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_task_vue_vue_type_template_id_4331c2db___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_task_vue_vue_type_template_id_4331c2db___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
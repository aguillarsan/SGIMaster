(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunks/cambiarcontrasenia"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/cambiarcontrasenia.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/cambiarcontrasenia.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _event_bus__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./event-bus */ "./resources/js/components/event-bus.js");
/* harmony import */ var vue_sweetalert2__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-sweetalert2 */ "./node_modules/vue-sweetalert2/dist/index.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




Vue.use(vue_sweetalert2__WEBPACK_IMPORTED_MODULE_3__["default"]);
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      new_pass: '',
      new_pass_confirm: '',
      actual_pass: '',
      actual_pass_correct: true,
      inputs: [{
        'label': ' Contraseña actual *',
        'model': 'actual_pass'
      }, {
        'label': '   Nueva contraseña *',
        'model': 'new_pass'
      }, {
        'label': 'Repetir Contraseña *',
        'model': 'new_pass_confirm'
      }],
      has_number: false,
      large: false,
      has_lowercase: false,
      has_uppercase: false,
      has_special: false,
      pass_distinct: false
    };
  },
  created: function created() {
    $("input").bind('paste', function (e) {
      e.preventDefault();
    });
  },
  methods: {
    verifyPass: function verifyPass(key) {
      var _this = this;

      var pass = document.getElementById("input" + key).value;

      if (key == 0) {
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/verify-pass?password=".concat(pass)).then(function (response) {
          _this.actual_pass_correct = response.data;
          _this.actual_pass = pass;
        });
      } else {
        if (key == 1) {
          this.new_pass = pass;
          this.has_lowercase = /[a-z]/.test(pass);
          this.has_uppercase = /[A-Z]/.test(pass);
          this.has_number = /\d/.test(pass);
          this.large = pass.length > 14;
          this.has_special = /[!@#\$%\^\&*\)\(+=._-]/.test(pass);

          if (this.new_pass_confirm != '') {
            if (this.new_pass_confirm != this.new_pass) {
              this.pass_distinct = false;
            } else {
              if (this.new_pass_confirm == this.new_pass) {
                this.pass_distinct = true;
              }
            }
          }
        } else {
          if (key == 2) {
            this.new_pass_confirm = pass;

            if (this.new_pass_confirm != this.new_pass) {
              this.pass_distinct = false;
            } else {
              if (this.new_pass_confirm == this.new_pass) {
                this.pass_distinct = true;
              }
            }
          }
        }
      }
    },
    showPassWord: function showPassWord(key) {
      var pass = document.getElementById("input" + key);
      var icon = document.getElementById("eye" + key);

      if (pass.type == 'password') {
        pass.type = 'text';
        icon.style = "color:#007bff";
      } else {
        if (pass.type == 'text') {
          pass.type = 'password';
          icon.style = "color:grey";
        }
      }
    },
    changePassword: function changePassword() {
      if (this.actual_pass != '') {
        if (this.actual_pass_correct) {
          if (this.new_pass != '' && this.new_pass_confirm != '') {
            if (this.has_lowercase && this.has_uppercase && this.has_number && this.large && this.has_special && this.pass_distinct) {
              var formData = new FormData();
              formData.append('new_pass', this.new_pass);
              $("#modal_change_password").modal("hide");
              axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/change-pass', formData).then(function (response) {
                alert("Su contraseña fue modificada con éxito");
              });
            }
          }
        }
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/cambiarcontrasenia.vue?vue&type=template&id=8d1b6f52&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/cambiarcontrasenia.vue?vue&type=template&id=8d1b6f52& ***!
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
  return _c("div", [
    _c(
      "div",
      {
        staticClass: "modal fade",
        attrs: {
          "aria-hidden": "true",
          "aria-labelledby": "exampleModalLabel",
          id: "modal_change_password",
          tabindex: "-1",
        },
      },
      [
        _c("div", { staticClass: "modal-dialog" }, [
          _c("div", { staticClass: "modal-content" }, [
            _vm._m(0),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "modal-body" },
              [
                _vm._l(_vm.inputs, function (input, key) {
                  return _c("div", { staticClass: "form-group" }, [
                    _c("label", [
                      _vm._v(
                        "\n                            " +
                          _vm._s(input.label) +
                          " \n                        "
                      ),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "input-group mb-3" }, [
                      _c("input", {
                        staticClass: "form-control",
                        attrs: {
                          id: "input" + key,
                          name: "",
                          type: "password",
                        },
                        on: {
                          keyup: function ($event) {
                            return _vm.verifyPass(key)
                          },
                        },
                      }),
                      _vm._v(" "),
                      _c("div", { staticClass: "input-group-append" }, [
                        _c(
                          "span",
                          {
                            staticClass: "input-group-text",
                            attrs: { id: "basic-addon2" },
                          },
                          [
                            _c(
                              "a",
                              {
                                staticStyle: { color: "grey" },
                                attrs: { href: "#" },
                                on: {
                                  click: function ($event) {
                                    return _vm.showPassWord(key)
                                  },
                                },
                              },
                              [
                                _c("i", {
                                  staticClass: "fas fa-eye",
                                  attrs: { id: "eye" + key },
                                }),
                              ]
                            ),
                          ]
                        ),
                      ]),
                    ]),
                    _vm._v(" "),
                    (!_vm.actual_pass_correct && key == 0) ||
                    (_vm.pass_distinct && key == 2)
                      ? _c(
                          "p",
                          {
                            staticStyle: {
                              color: "red",
                              "margin-top": "-10px",
                            },
                          },
                          [
                            _vm._v(
                              "\n                            \n                            " +
                                _vm._s(
                                  !_vm.actual_pass_correct && key == 0
                                    ? "La contraseña ingresada es incorrecta"
                                    : _vm.pass_distinct == false && key == 2
                                    ? "Las contraseñas no coinciden"
                                    : ""
                                ) +
                                "\n                        "
                            ),
                          ]
                        )
                      : _vm._e(),
                  ])
                }),
                _vm._v(" "),
                _c("ul", { staticClass: "list-group list-group-flush" }, [
                  _c(
                    "p",
                    {
                      style:
                        _vm.large == false
                          ? "color:grey"
                          : _vm.large == true
                          ? "color:#28a745"
                          : _vm.large == ""
                          ? "color:grey"
                          : "",
                    },
                    [
                      _vm._v(
                        "\n                            * La contraseña dene tener al menos 14 caracteres\n                        "
                      ),
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "p",
                    {
                      style:
                        _vm.has_lowercase == false
                          ? "color:grey"
                          : _vm.has_lowercase == true
                          ? "color:#28a745"
                          : "",
                    },
                    [
                      _vm._v(
                        "\n                            * La contraseña dene tener al menos 1 letra en minúscula\n                        "
                      ),
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "p",
                    {
                      style:
                        _vm.has_uppercase == false
                          ? "color:grey"
                          : _vm.has_uppercase == true
                          ? "color:#28a745"
                          : "",
                    },
                    [
                      _vm._v(
                        "\n                            * La contraseña dene tener al menos 1 letra en Mayúscula\n                        "
                      ),
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "p",
                    {
                      style:
                        _vm.has_number == false
                          ? "color:grey"
                          : _vm.has_number == true
                          ? "color:#28a745"
                          : "",
                    },
                    [
                      _vm._v(
                        "\n                            * La contraseña dene tener al menos 1 caracterer númerico\n                        "
                      ),
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "p",
                    {
                      style:
                        _vm.has_special == false
                          ? "color:grey"
                          : _vm.has_special == true
                          ? "color:#28a745"
                          : "",
                    },
                    [
                      _vm._v(
                        "\n                            * La contraseña dene tener al menos 1 caracterer especial\n                        "
                      ),
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "p",
                    {
                      staticStyle: { color: "grey" },
                      style:
                        _vm.new_pass != _vm.actual_pass ? "color:#28a745" : "",
                    },
                    [
                      _vm._v(
                        "\n                            * La contraseña no puede ser igual a la anterior\n                        "
                      ),
                    ]
                  ),
                ]),
              ],
              2
            ),
            _vm._v(" "),
            _c("div", { staticClass: "modal-footer" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-secondary",
                  staticStyle: { color: "white" },
                  attrs: { "data-dismiss": "modal", type: "button" },
                },
                [
                  _vm._v(
                    "\n                        Cerrar\n                    "
                  ),
                ]
              ),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass: "btn btn-primary",
                  staticStyle: { color: "white" },
                  attrs: { type: "button" },
                  on: {
                    click: function ($event) {
                      if (
                        !$event.type.indexOf("key") &&
                        _vm._k(
                          $event.keyCode,
                          "prevnt",
                          undefined,
                          $event.key,
                          undefined
                        )
                      ) {
                        return null
                      }
                      return _vm.changePassword()
                    },
                  },
                },
                [
                  _vm._v(
                    "\n                        Aceptar\n                    "
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
    return _c("div", { staticClass: "modal-header" }, [
      _c(
        "h5",
        {
          staticClass: "modal-title",
          staticStyle: { "font-size": "25px" },
          attrs: { id: "exampleModalLabel" },
        },
        [
          _vm._v(
            "\n                        Cambiar contraseña\n                    "
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
          _c("span", { attrs: { "aria-hidden": "true" } }, [
            _vm._v("\n                            ×\n                        "),
          ]),
        ]
      ),
    ])
  },
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/cambiarcontrasenia.vue":
/*!********************************************************!*\
  !*** ./resources/js/components/cambiarcontrasenia.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _cambiarcontrasenia_vue_vue_type_template_id_8d1b6f52___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./cambiarcontrasenia.vue?vue&type=template&id=8d1b6f52& */ "./resources/js/components/cambiarcontrasenia.vue?vue&type=template&id=8d1b6f52&");
/* harmony import */ var _cambiarcontrasenia_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./cambiarcontrasenia.vue?vue&type=script&lang=js& */ "./resources/js/components/cambiarcontrasenia.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _cambiarcontrasenia_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _cambiarcontrasenia_vue_vue_type_template_id_8d1b6f52___WEBPACK_IMPORTED_MODULE_0__["render"],
  _cambiarcontrasenia_vue_vue_type_template_id_8d1b6f52___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/cambiarcontrasenia.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/cambiarcontrasenia.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/cambiarcontrasenia.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_cambiarcontrasenia_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./cambiarcontrasenia.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/cambiarcontrasenia.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_cambiarcontrasenia_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/cambiarcontrasenia.vue?vue&type=template&id=8d1b6f52&":
/*!***************************************************************************************!*\
  !*** ./resources/js/components/cambiarcontrasenia.vue?vue&type=template&id=8d1b6f52& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_cambiarcontrasenia_vue_vue_type_template_id_8d1b6f52___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./cambiarcontrasenia.vue?vue&type=template&id=8d1b6f52& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/cambiarcontrasenia.vue?vue&type=template&id=8d1b6f52&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_cambiarcontrasenia_vue_vue_type_template_id_8d1b6f52___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_cambiarcontrasenia_vue_vue_type_template_id_8d1b6f52___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
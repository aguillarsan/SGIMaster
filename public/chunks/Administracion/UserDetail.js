(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunks/Administracion/UserDetail"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Administracion/UserDetail.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Administracion/UserDetail.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['userAuth'],
  data: function data() {
    return {
      user: [],
      load: true,
      userDetalId: this.$route.params.id,
      items_password: [{
        id: 1,
        name: '14 o más caracteres',
        check: false,
        cls: 'bg-secondary'
      }, {
        id: 2,
        name: 'Una letra mayúscula',
        check: false,
        cls: 'bg-secondary'
      }, {
        id: 3,
        name: 'Una letra minúscula',
        check: false,
        cls: 'bg-secondary'
      }, {
        id: 5,
        name: 'Debe contener un número',
        check: false,
        cls: 'bg-secondary'
      }, {
        id: 6,
        name: 'Debe ser diferente a la contraseña actual',
        check: false,
        cls: 'bg-secondary'
      }],
      new_pass: '',
      letras_mayusculas: "ABCDEFGHYJKLMNÑOPQRSTUVWXYZ",
      numeros: "0123456789",
      letras_minusculas: "abcdefghyjklmnñopqrstuvwxyz",
      total: 0,
      confirm_passwd: '',
      repeat_pass: '',
      current_password: '',
      check_current_pass: true,
      roles: [],
      role_id: null
    };
  },
  created: function created() {
    this.getUserInfo();
  },
  methods: {
    getUserInfo: function getUserInfo() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/user/detail/info', {
        params: {
          user_id: this.$route.params.id
        }
      }).then(function (response) {
        _this.user = response.data;
        _this.load = false;
      });
    },
    getRolName: function getRolName(role_user) {
      if (role_user) {
        for (var index = 0; index < role_user.length; index++) {
          var rolData = role_user[index];
          return rolData.role.name;
        }
      }
    },
    dateFormat: function dateFormat(d) {
      return moment__WEBPACK_IMPORTED_MODULE_1___default()(d).format("DD/MM/YY");
    },
    verifyPassWord: function verifyPassWord() {
      //Validar mayuscula
      if (this.new_pass.match(/[A-Z]/)) {
        var elementIndex = this.items_password.findIndex(function (obj) {
          return obj.id == 2;
        });
        this.items_password[elementIndex].cls = 'bg-success';
        this.items_password[elementIndex].check = true;
      } else {
        var _elementIndex = this.items_password.findIndex(function (obj) {
          return obj.id == 2;
        });

        this.items_password[_elementIndex].cls = 'bg-secondary';
        this.items_password[_elementIndex].check = false;
      } //Validar largo


      if (this.new_pass.length >= 14) {
        var _elementIndex2 = this.items_password.findIndex(function (obj) {
          return obj.id == 1;
        });

        this.items_password[_elementIndex2].cls = 'bg-success';
        this.items_password[_elementIndex2].check = true;
      } else {
        var _elementIndex3 = this.items_password.findIndex(function (obj) {
          return obj.id == 1;
        });

        this.items_password[_elementIndex3].cls = 'bg-secondary';
        this.items_password[_elementIndex3].check = false;
      } //Validar minuscula


      if (this.new_pass.match(/[a-z]/)) {
        var _elementIndex4 = this.items_password.findIndex(function (obj) {
          return obj.id == 3;
        });

        this.items_password[_elementIndex4].cls = 'bg-success';
        this.items_password[_elementIndex4].check = true;
      } else {
        var _elementIndex5 = this.items_password.findIndex(function (obj) {
          return obj.id == 3;
        });

        this.items_password[_elementIndex5].cls = 'bg-secondary';
        this.items_password[_elementIndex5].check = false;
      } //Validar numero


      if (this.new_pass.match(/\d/)) {
        var _elementIndex6 = this.items_password.findIndex(function (obj) {
          return obj.id == 5;
        });

        this.items_password[_elementIndex6].cls = 'bg-success';
        this.items_password[_elementIndex6].check = true;
      } else {
        var _elementIndex7 = this.items_password.findIndex(function (obj) {
          return obj.id == 5;
        });

        this.items_password[_elementIndex7].cls = 'bg-secondary';
        this.items_password[_elementIndex7].check = false;
      } //Validar que las claves sean distintas


      if (this.userAuth.id == this.userDetalId) {
        if (this.new_pass != this.current_password) {
          var _elementIndex8 = this.items_password.findIndex(function (obj) {
            return obj.id == 6;
          });

          this.items_password[_elementIndex8].cls = 'bg-success';
          this.items_password[_elementIndex8].check = true;
        } else {
          var _elementIndex9 = this.items_password.findIndex(function (obj) {
            return obj.id == 6;
          });

          this.items_password[_elementIndex9].cls = 'bg-secondary';
          this.items_password[_elementIndex9].check = false;
        }
      }
    },
    changePass: function changePass() {
      var success = this.items_password.filter(function (element) {
        return element.check == true;
      });

      if (this.userAuth.rol == 1 && this.userAuth.id != this.userDetalId) {
        if (success.length == 4) {
          if (this.repeat_pass != this.new_pass) return Swal.fire('Las contraseñas no coinciden', '', 'error');
          if (this.repeat_pass == this.new_pass) return this.updatePass();
        } else {
          return Swal.fire('La nueva contraseña no cumple con los requisitos', '', 'error');
        }
      } else {
        if (success.length == 5) {
          this.verifyPass();
          if (this.repeat_pass != this.new_pass) return Swal.fire('Las contraseñas no coinciden', '', 'error');
          if (this.check_current_pass) return this.updatePass();
        } else {
          return Swal.fire('La nueva contraseña no cumple con los requisitos', '', 'error');
        }
      }
    },
    showPass: function showPass(val) {
      var input = document.getElementById(val == 2 ? "new_password" : val == 3 ? "repeat_pass" : val == 1 ? "current_password" : '');
      var icon = document.getElementById(val == 2 ? "eye_bi" : val == 3 ? "eye_bi_repeat_pass" : val == 1 ? "eye_actual" : '');
      if (input.type == 'password') return input.type = 'text', icon.className = 'bi bi-eye fs-2';
      if (input.type == 'text') return input.type = 'password', icon.className = 'bi bi-eye-slash fs-2';
    },
    verifyPass: function verifyPass() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/verify-pass', {
        params: {
          'password': this.current_password
        }
      }).then(function (response) {
        if (!response.data) return _this2.check_current_pass = false;
        if (response.data) return _this2.check_current_pass = true;
      });
    },
    updatePass: function updatePass() {
      var _this3 = this;

      var formData = new FormData();
      formData.append('password', this.new_pass);
      formData.append('user_id', this.userDetalId);
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/change-pass', formData).then(function (response) {
        $("#kt_modal_update_password").modal('hide');
        Swal.fire('Contraseña actualizada', '', 'success');

        _this3.cleanForm();
      });
    },
    cleanForm: function cleanForm() {
      this.confirm_passwd = '';
      this.repeat_pass = '';
      this.current_password = '';
      this.new_pass = '';
      this.check_current_pass = true;
    },
    getRoles: function getRoles() {
      var _this4 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/admin/get/rol').then(function (response) {
        _this4.roles = response.data;
      });
    },
    updateRolUser: function updateRolUser() {
      if (this.role_id) {
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/update/rol/user', {
          params: {
            'user_id': this.$route.params.id,
            'role_id': this.role_id
          }
        }).then(function (response) {
          $("#kt_modal_update_role").modal('hide');
          Swal.fire('Rol actualizado', '', 'success');
        });
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Administracion/UserDetail.vue?vue&type=template&id=fcd3f37e&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Administracion/UserDetail.vue?vue&type=template&id=fcd3f37e& ***!
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
    { staticClass: "container", attrs: { id: "kt_content_container" } },
    [
      _c("div", { staticClass: "d-flex flex-column flex-lg-row" }, [
        _c(
          "div",
          {
            staticClass:
              "flex-column flex-lg-row-auto  w-lg-250px w-xl-350px mb-10",
          },
          [
            _c("div", { staticClass: "card mb-5 mb-xl-8" }, [
              _vm.load
                ? _c(
                    "div",
                    {
                      staticClass: "card-body",
                      staticStyle: { height: "400px" },
                    },
                    [_vm._m(0)]
                  )
                : _vm._e(),
              _vm._v(" "),
              !_vm.load
                ? _c("div", { staticClass: "card-body" }, [
                    _c(
                      "div",
                      { staticClass: "d-flex flex-center flex-column py-5" },
                      [
                        _c(
                          "div",
                          {
                            staticClass: "image-input image-input-outline",
                            attrs: { "data-kt-image-input": "true" },
                          },
                          [
                            _c("div", {
                              staticClass:
                                "image-input-wrapper w-125px h-125px",
                              staticStyle: { "border-radius": "100px" },
                              style:
                                "background-image: url(" +
                                _vm.user.avatar +
                                ")",
                            }),
                            _vm._v(" "),
                            _vm._m(1),
                            _vm._v(" "),
                            _vm._m(2),
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "a",
                          {
                            staticClass:
                              "fs-3 text-gray-800 text-hover-primary fw-bolder mb-3 ",
                            attrs: { href: "#" },
                          },
                          [_vm._v(_vm._s(_vm.user.fullname))]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "mb-9" }, [
                          _c(
                            "div",
                            {
                              staticClass:
                                "badge badge-lg badge-light-primary d-inline",
                            },
                            [
                              _vm._v(
                                _vm._s(
                                  _vm.getRolName(_vm.user.role_user)
                                    ? _vm.getRolName(_vm.user.role_user)
                                    : "N/A"
                                ) + "\n                            "
                              ),
                            ]
                          ),
                        ]),
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "d-flex flex-stack fs-4 py-3" }, [
                      _c(
                        "div",
                        {
                          staticClass: "fw-bolder rotate collapsible",
                          attrs: {
                            "data-bs-toggle": "collapse",
                            href: "#kt_user_view_details",
                            role: "button",
                            "aria-expanded": "false",
                            "aria-controls": "kt_user_view_details",
                          },
                        },
                        [
                          _vm._v("Detalles\n                            "),
                          _c("span", { staticClass: "ms-2 rotate-180" }, [
                            _c("span", { staticClass: "svg-icon svg-icon-3" }, [
                              _c(
                                "svg",
                                {
                                  attrs: {
                                    xmlns: "http://www.w3.org/2000/svg",
                                    width: "24",
                                    height: "24",
                                    viewBox: "0 0 24 24",
                                    fill: "none",
                                  },
                                },
                                [
                                  _c("path", {
                                    attrs: {
                                      d: "M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z",
                                      fill: "black",
                                    },
                                  }),
                                ]
                              ),
                            ]),
                          ]),
                        ]
                      ),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "separator" }),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "collapse show",
                        attrs: { id: "kt_user_view_details" },
                      },
                      [
                        _c("div", { staticClass: "pb-5 fs-6" }, [
                          _c("div", { staticClass: "fw-bolder mt-5" }, [
                            _vm._v("Email"),
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "text-gray-600" }, [
                            _c(
                              "a",
                              {
                                staticClass: "text-gray-600 text-hover-primary",
                                attrs: { href: "#" },
                              },
                              [
                                _vm._v(
                                  _vm._s(
                                    _vm.user.email ? _vm.user.email : "N/A"
                                  )
                                ),
                              ]
                            ),
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "fw-bolder mt-5" }, [
                            _vm._v("Telefono"),
                          ]),
                          _vm._v(
                            "\n                            " +
                              _vm._s(_vm.user.telefono) +
                              "\n                            "
                          ),
                          _c("div", { staticClass: "text-gray-600" }),
                          _vm._v(" "),
                          _c("div", { staticClass: "fw-bolder mt-5" }, [
                            _vm._v("Área"),
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "text-gray-600" }, [
                            _vm._v(
                              _vm._s(
                                _vm.user.area_id == 1 ? "O&M" : "Ingenieria"
                              )
                            ),
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "fw-bolder mt-5" }, [
                            _vm._v("Fecha de creación"),
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "text-gray-600" }, [
                            _vm._v(_vm._s(_vm.dateFormat(_vm.user.created_at))),
                          ]),
                        ]),
                      ]
                    ),
                  ])
                : _vm._e(),
            ]),
          ]
        ),
        _vm._v(" "),
        _c("div", { staticClass: "flex-lg-row-fluid ms-lg-15 " }, [
          _vm._m(3),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "tab-content", attrs: { id: "myTabContent" } },
            [
              _c(
                "div",
                {
                  staticClass: "tab-pane fade active show",
                  attrs: {
                    id: "kt_user_view_overview_security",
                    role: "tabpanel",
                  },
                },
                [
                  _c("div", { staticClass: "card pt-4 mb-6 mb-xl-9" }, [
                    _vm._m(4),
                    _vm._v(" "),
                    _c("div", { staticClass: "card-body pt-0 pb-5" }, [
                      _c("div", { staticClass: "table-responsive" }, [
                        _c(
                          "table",
                          {
                            staticClass:
                              "table align-middle table-row-dashed gy-5",
                            attrs: { id: "kt_table_users_login_session" },
                          },
                          [
                            _c(
                              "tbody",
                              { staticClass: "fs-6 fw-bold text-gray-600" },
                              [
                                _c("tr", [
                                  _c("td", [_vm._v("Email")]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(
                                      _vm._s(
                                        _vm.user.email ? _vm.user.email : "N/A"
                                      )
                                    ),
                                  ]),
                                ]),
                                _vm._v(" "),
                                _c("tr", [
                                  _c("td", [_vm._v("Password")]),
                                  _vm._v(" "),
                                  _c("td", [_vm._v("******")]),
                                  _vm._v(" "),
                                  _c("td", { staticClass: "text-end" }, [
                                    _vm.userAuth.rol == 1 ||
                                    _vm.userAuth.id == _vm.userDetalId
                                      ? _c(
                                          "button",
                                          {
                                            staticClass:
                                              "btn btn-icon btn-active-light-primary w-30px h-30px ms-auto",
                                            attrs: {
                                              type: "button",
                                              "data-bs-toggle": "modal",
                                              "data-bs-target":
                                                "#kt_modal_update_password",
                                            },
                                          },
                                          [
                                            _c(
                                              "span",
                                              {
                                                staticClass:
                                                  "svg-icon svg-icon-3",
                                              },
                                              [
                                                _c(
                                                  "svg",
                                                  {
                                                    attrs: {
                                                      xmlns:
                                                        "http://www.w3.org/2000/svg",
                                                      width: "24",
                                                      height: "24",
                                                      viewBox: "0 0 24 24",
                                                      fill: "none",
                                                    },
                                                  },
                                                  [
                                                    _c("path", {
                                                      attrs: {
                                                        opacity: "0.3",
                                                        d: "M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z",
                                                        fill: "black",
                                                      },
                                                    }),
                                                    _vm._v(" "),
                                                    _c("path", {
                                                      attrs: {
                                                        d: "M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z",
                                                        fill: "black",
                                                      },
                                                    }),
                                                  ]
                                                ),
                                              ]
                                            ),
                                          ]
                                        )
                                      : _vm._e(),
                                  ]),
                                ]),
                                _vm._v(" "),
                                _c("tr", [
                                  _c("td", [_vm._v("Role")]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(
                                      _vm._s(
                                        _vm.getRolName(_vm.user.role_user)
                                          ? _vm.getRolName(_vm.user.role_user)
                                          : "N/A"
                                      ) +
                                        "\n                                            "
                                    ),
                                  ]),
                                  _vm._v(" "),
                                  _c("td", { staticClass: "text-end" }, [
                                    _vm.userAuth.rol == 1
                                      ? _c(
                                          "button",
                                          {
                                            staticClass:
                                              "btn btn-icon btn-active-light-primary w-30px h-30px ms-auto",
                                            attrs: {
                                              type: "button",
                                              "data-bs-toggle": "modal",
                                              "data-bs-target":
                                                "#kt_modal_update_role",
                                            },
                                            on: { click: _vm.getRoles },
                                          },
                                          [
                                            _c(
                                              "span",
                                              {
                                                staticClass:
                                                  "svg-icon svg-icon-3",
                                              },
                                              [
                                                _c(
                                                  "svg",
                                                  {
                                                    attrs: {
                                                      xmlns:
                                                        "http://www.w3.org/2000/svg",
                                                      width: "24",
                                                      height: "24",
                                                      viewBox: "0 0 24 24",
                                                      fill: "none",
                                                    },
                                                  },
                                                  [
                                                    _c("path", {
                                                      attrs: {
                                                        opacity: "0.3",
                                                        d: "M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z",
                                                        fill: "black",
                                                      },
                                                    }),
                                                    _vm._v(" "),
                                                    _c("path", {
                                                      attrs: {
                                                        d: "M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z",
                                                        fill: "black",
                                                      },
                                                    }),
                                                  ]
                                                ),
                                              ]
                                            ),
                                          ]
                                        )
                                      : _vm._e(),
                                  ]),
                                ]),
                              ]
                            ),
                          ]
                        ),
                      ]),
                    ]),
                  ]),
                ]
              ),
            ]
          ),
        ]),
        _vm._v(" "),
        _c(
          "div",
          {
            staticClass: "modal fade",
            staticStyle: { display: "none" },
            attrs: {
              id: "kt_modal_update_password",
              tabindex: "-1",
              "aria-hidden": "true",
            },
          },
          [
            _c(
              "div",
              { staticClass: "modal-dialog modal-dialog-centered mw-650px" },
              [
                _c("div", { staticClass: "modal-content" }, [
                  _c("div", { staticClass: "modal-header" }, [
                    _c("h2", { staticClass: "fw-bolder" }, [
                      _vm._v("Actualizar contraseña"),
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "btn btn-icon btn-sm btn-active-icon-primary",
                        attrs: { "data-bs-dismiss": "modal" },
                      },
                      [
                        _c("span", { staticClass: "svg-icon svg-icon-1" }, [
                          _c(
                            "svg",
                            {
                              attrs: {
                                xmlns: "http://www.w3.org/2000/svg",
                                width: "24",
                                height: "24",
                                viewBox: "0 0 24 24",
                                fill: "none",
                              },
                            },
                            [
                              _c("rect", {
                                attrs: {
                                  opacity: "0.5",
                                  x: "6",
                                  y: "17.3137",
                                  width: "16",
                                  height: "2",
                                  rx: "1",
                                  transform: "rotate(-45 6 17.3137)",
                                  fill: "black",
                                },
                              }),
                              _vm._v(" "),
                              _c("rect", {
                                attrs: {
                                  x: "7.41422",
                                  y: "6",
                                  width: "16",
                                  height: "2",
                                  rx: "1",
                                  transform: "rotate(45 7.41422 6)",
                                  fill: "black",
                                },
                              }),
                            ]
                          ),
                        ]),
                      ]
                    ),
                  ]),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "modal-body scroll-y mx-5 mx-xl-15 my-7" },
                    [
                      _c(
                        "form",
                        {
                          staticClass:
                            "form fv-plugins-bootstrap5 fv-plugins-framework",
                          attrs: {
                            id: "kt_modal_update_password_form",
                            action: "#",
                          },
                        },
                        [
                          _vm.userAuth.id == _vm.userDetalId
                            ? _c(
                                "div",
                                {
                                  staticClass:
                                    "fv-row mb-10 fv-plugins-icon-container",
                                },
                                [
                                  _c("div", { staticClass: "mb-1" }, [
                                    _c(
                                      "label",
                                      {
                                        staticClass:
                                          "required form-label fs-6 mb-2",
                                      },
                                      [_vm._v("Contraseña actual")]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "position-relative mb-3" },
                                      [
                                        _c("input", {
                                          directives: [
                                            {
                                              name: "model",
                                              rawName: "v-model",
                                              value: _vm.current_password,
                                              expression: "current_password",
                                            },
                                          ],
                                          staticClass:
                                            "form-control form-control-lg form-control-solid",
                                          attrs: {
                                            type: "password",
                                            placeholder: "",
                                            name: "current_password",
                                            id: "current_password",
                                            autocomplete: "off",
                                          },
                                          domProps: {
                                            value: _vm.current_password,
                                          },
                                          on: {
                                            change: _vm.verifyPass,
                                            input: function ($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.current_password =
                                                $event.target.value
                                            },
                                          },
                                        }),
                                        _vm._v(" "),
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2",
                                            attrs: {
                                              "data-kt-password-meter-control":
                                                "visibility",
                                            },
                                            on: {
                                              click: function ($event) {
                                                return _vm.showPass(1)
                                              },
                                            },
                                          },
                                          [
                                            _c("i", {
                                              staticClass:
                                                "bi bi-eye-slash fs-2",
                                              attrs: { id: "eye_actual" },
                                            }),
                                          ]
                                        ),
                                      ]
                                    ),
                                    _vm._v(" "),
                                    !_vm.check_current_pass
                                      ? _c(
                                          "div",
                                          {
                                            staticClass:
                                              "fv-plugins-message-container invalid-feedback",
                                          },
                                          [
                                            _c("div", [
                                              _vm._v(
                                                "La contrseña ingresada es incorrecta\n                                        "
                                              ),
                                            ]),
                                          ]
                                        )
                                      : _vm._e(),
                                  ]),
                                ]
                              )
                            : _vm._e(),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "mb-10 fv-row fv-plugins-icon-container",
                              attrs: { "data-kt-password-meter": "true" },
                            },
                            [
                              _c("div", { staticClass: "mb-1" }, [
                                _c(
                                  "label",
                                  {
                                    staticClass:
                                      " required form-label fw-bold fs-6 mb-2",
                                  },
                                  [_vm._v("Nueva contraseña")]
                                ),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "position-relative mb-3" },
                                  [
                                    _c("input", {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.new_pass,
                                          expression: "new_pass",
                                        },
                                      ],
                                      staticClass:
                                        "form-control form-control-lg form-control-solid",
                                      attrs: {
                                        type: "password",
                                        placeholder: "",
                                        name: "new_password",
                                        id: "new_password",
                                        autocomplete: "off",
                                      },
                                      domProps: { value: _vm.new_pass },
                                      on: {
                                        keyup: function ($event) {
                                          $event.preventDefault()
                                          return _vm.verifyPassWord.apply(
                                            null,
                                            arguments
                                          )
                                        },
                                        input: function ($event) {
                                          if ($event.target.composing) {
                                            return
                                          }
                                          _vm.new_pass = $event.target.value
                                        },
                                      },
                                    }),
                                    _vm._v(" "),
                                    _c("div", {
                                      staticClass:
                                        "fv-plugins-message-container invalid-feedback",
                                    }),
                                    _vm._v(" "),
                                    _c(
                                      "span",
                                      {
                                        staticClass:
                                          "btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2",
                                        attrs: {
                                          "data-kt-password-meter-control":
                                            "visibility",
                                        },
                                        on: {
                                          click: function ($event) {
                                            return _vm.showPass(2)
                                          },
                                        },
                                      },
                                      [
                                        _c("i", {
                                          staticClass: "bi bi-eye-slash fs-2",
                                          attrs: { id: "eye_bi" },
                                        }),
                                      ]
                                    ),
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "d-flex flex-column" },
                                  _vm._l(
                                    _vm.items_password,
                                    function (items_passwd) {
                                      return _c(
                                        "li",
                                        {
                                          staticClass:
                                            "d-flex align-items-center py-2",
                                          style:
                                            items_passwd.id == 6 &&
                                            _vm.userAuth.rol == 1 &&
                                            _vm.userAuth.id != _vm.userDetalId
                                              ? "visibility:hidden"
                                              : "display:block",
                                        },
                                        [
                                          _c("span", {
                                            staticClass: "bullet me-5",
                                            class: items_passwd.cls,
                                          }),
                                          _vm._v(
                                            "\n                                            " +
                                              _vm._s(items_passwd.name) +
                                              "\n                                        "
                                          ),
                                        ]
                                      )
                                    }
                                  ),
                                  0
                                ),
                              ]),
                              _vm._v(" "),
                              _c("div", {
                                staticClass:
                                  "fv-plugins-message-container invalid-feedback",
                              }),
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "mb-10 fv-row fv-plugins-icon-container",
                              attrs: { "data-kt-password-meter": "true" },
                            },
                            [
                              _c("div", { staticClass: "mb-1" }, [
                                _c(
                                  "label",
                                  {
                                    staticClass:
                                      " required form-label fw-bold fs-6 mb-2",
                                  },
                                  [
                                    _vm._v(
                                      "Confirmar\n                                        contraseña"
                                    ),
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "position-relative mb-3" },
                                  [
                                    _c("input", {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.repeat_pass,
                                          expression: "repeat_pass",
                                        },
                                      ],
                                      staticClass:
                                        "form-control form-control-lg form-control-solid",
                                      attrs: {
                                        type: "password",
                                        placeholder: "",
                                        name: "repeat_pass",
                                        id: "repeat_pass",
                                        autocomplete: "off",
                                      },
                                      domProps: { value: _vm.repeat_pass },
                                      on: {
                                        input: function ($event) {
                                          if ($event.target.composing) {
                                            return
                                          }
                                          _vm.repeat_pass = $event.target.value
                                        },
                                      },
                                    }),
                                    _vm._v(" "),
                                    _c("div", {
                                      staticClass:
                                        "fv-plugins-message-container invalid-feedback",
                                    }),
                                    _vm._v(" "),
                                    _c(
                                      "span",
                                      {
                                        staticClass:
                                          "btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2",
                                        attrs: {
                                          "data-kt-password-meter-control":
                                            "visibility",
                                        },
                                        on: {
                                          click: function ($event) {
                                            return _vm.showPass(3)
                                          },
                                        },
                                      },
                                      [
                                        _c("i", {
                                          staticClass: "bi bi-eye-slash fs-2",
                                          attrs: { id: "eye_bi_repeat_pass" },
                                        }),
                                      ]
                                    ),
                                  ]
                                ),
                              ]),
                            ]
                          ),
                          _vm._v(" "),
                          _c("div", { staticClass: "text-center pt-15" }, [
                            _c(
                              "button",
                              {
                                staticClass: "btn btn-light me-3",
                                attrs: {
                                  type: "button",
                                  "data-bs-dismiss": "modal",
                                },
                              },
                              [_vm._v("Cancelar")]
                            ),
                            _vm._v(" "),
                            _vm.userAuth.id == _vm.userDetalId ||
                            _vm.userAuth.rol == 1
                              ? _c(
                                  "button",
                                  {
                                    staticClass: "btn btn-primary",
                                    attrs: {
                                      type: "button",
                                      "data-kt-users-modal-action": "submit",
                                    },
                                    on: { click: _vm.changePass },
                                  },
                                  [
                                    _c(
                                      "span",
                                      { staticClass: "indicator-label" },
                                      [_vm._v("Guardar cambios")]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(5),
                                  ]
                                )
                              : _vm._e(),
                          ]),
                          _vm._v(" "),
                          _c("div"),
                        ]
                      ),
                    ]
                  ),
                ]),
              ]
            ),
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticClass: "modal fade",
            staticStyle: { display: "none" },
            attrs: {
              id: "kt_modal_update_role",
              tabindex: "-1",
              "aria-hidden": "true",
            },
          },
          [
            _c(
              "div",
              { staticClass: "modal-dialog modal-dialog-centered mw-650px" },
              [
                _c("div", { staticClass: "modal-content" }, [
                  _c("div", { staticClass: "modal-header" }, [
                    _c("h2", { staticClass: "fw-bolder" }, [
                      _vm._v("Actualizar Rol"),
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "btn btn-icon btn-sm btn-active-icon-primary",
                        attrs: { "data-bs-dismiss": "modal" },
                      },
                      [
                        _c("span", { staticClass: "svg-icon svg-icon-1" }, [
                          _c(
                            "svg",
                            {
                              attrs: {
                                xmlns: "http://www.w3.org/2000/svg",
                                width: "24",
                                height: "24",
                                viewBox: "0 0 24 24",
                                fill: "none",
                              },
                            },
                            [
                              _c("rect", {
                                attrs: {
                                  opacity: "0.5",
                                  x: "6",
                                  y: "17.3137",
                                  width: "16",
                                  height: "2",
                                  rx: "1",
                                  transform: "rotate(-45 6 17.3137)",
                                  fill: "black",
                                },
                              }),
                              _vm._v(" "),
                              _c("rect", {
                                attrs: {
                                  x: "7.41422",
                                  y: "6",
                                  width: "16",
                                  height: "2",
                                  rx: "1",
                                  transform: "rotate(45 7.41422 6)",
                                  fill: "black",
                                },
                              }),
                            ]
                          ),
                        ]),
                      ]
                    ),
                  ]),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "modal-body scroll-y mx-5 mx-xl-15 my-7" },
                    [
                      _c(
                        "form",
                        {
                          staticClass: "form",
                          attrs: {
                            id: "kt_modal_update_role_form",
                            action: "#",
                          },
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass:
                                "notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6",
                            },
                            [
                              _c(
                                "span",
                                {
                                  staticClass:
                                    "svg-icon svg-icon-2tx svg-icon-primary me-4",
                                },
                                [
                                  _c(
                                    "svg",
                                    {
                                      attrs: {
                                        xmlns: "http://www.w3.org/2000/svg",
                                        width: "24",
                                        height: "24",
                                        viewBox: "0 0 24 24",
                                        fill: "none",
                                      },
                                    },
                                    [
                                      _c("rect", {
                                        attrs: {
                                          opacity: "0.3",
                                          x: "2",
                                          y: "2",
                                          width: "20",
                                          height: "20",
                                          rx: "10",
                                          fill: "black",
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("rect", {
                                        attrs: {
                                          x: "11",
                                          y: "14",
                                          width: "7",
                                          height: "2",
                                          rx: "1",
                                          transform: "rotate(-90 11 14)",
                                          fill: "black",
                                        },
                                      }),
                                      _vm._v(" "),
                                      _c("rect", {
                                        attrs: {
                                          x: "11",
                                          y: "17",
                                          width: "2",
                                          height: "2",
                                          rx: "1",
                                          transform: "rotate(-90 11 17)",
                                          fill: "black",
                                        },
                                      }),
                                    ]
                                  ),
                                ]
                              ),
                              _vm._v(" "),
                              _vm._m(6),
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "fv-row mb-7 scroll-y h-400px" },
                            [
                              _vm._m(7),
                              _vm._v(" "),
                              _vm._l(_vm.roles, function (rol) {
                                return _c("div", [
                                  _c("div", { staticClass: "d-flex" }, [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "form-check form-check-custom form-check-solid",
                                      },
                                      [
                                        _c("input", {
                                          directives: [
                                            {
                                              name: "model",
                                              rawName: "v-model",
                                              value: _vm.role_id,
                                              expression: "role_id",
                                            },
                                          ],
                                          staticClass: "form-check-input me-3",
                                          attrs: {
                                            name: "user_role",
                                            type: "radio",
                                            id: "kt_modal_update_role_option_0",
                                          },
                                          domProps: {
                                            value: rol.id,
                                            checked: _vm._q(
                                              _vm.role_id,
                                              rol.id
                                            ),
                                          },
                                          on: {
                                            change: function ($event) {
                                              _vm.role_id = rol.id
                                            },
                                          },
                                        }),
                                        _vm._v(" "),
                                        _c(
                                          "label",
                                          {
                                            staticClass: "form-check-label",
                                            attrs: {
                                              for: "kt_modal_update_role_option_0",
                                            },
                                          },
                                          [
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "fw-bolder text-gray-800",
                                              },
                                              [_vm._v(_vm._s(rol.name))]
                                            ),
                                          ]
                                        ),
                                      ]
                                    ),
                                  ]),
                                  _vm._v(" "),
                                  _c("div", {
                                    staticClass:
                                      "separator separator-dashed my-5",
                                  }),
                                ])
                              }),
                            ],
                            2
                          ),
                          _vm._v(" "),
                          _c("div", { staticClass: "text-center pt-15" }, [
                            _c(
                              "button",
                              {
                                staticClass: "btn btn-light me-3",
                                attrs: {
                                  type: "reset",
                                  "data-bs-dismiss": "modal",
                                },
                              },
                              [_vm._v("Cancelar")]
                            ),
                            _vm._v(" "),
                            _c(
                              "button",
                              {
                                staticClass: "btn btn-primary",
                                attrs: {
                                  type: "button",
                                  "data-kt-users-modal-action": "submit",
                                },
                                on: { click: _vm.updateRolUser },
                              },
                              [
                                _c("span", { staticClass: "indicator-label" }, [
                                  _vm._v("Aceptar"),
                                ]),
                                _vm._v(" "),
                                _vm._m(8),
                              ]
                            ),
                          ]),
                        ]
                      ),
                    ]
                  ),
                ]),
              ]
            ),
          ]
        ),
      ]),
    ]
  )
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "empty-state", attrs: { "data-height": "400" } },
      [
        _c("div", { staticClass: "d-flex justify-content-center  mt-5" }, [
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
                    "\n                                    Cargando...\n                                "
                  ),
                ]
              ),
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
      "label",
      {
        staticClass:
          "btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow",
        attrs: {
          "data-kt-image-input-action": "change",
          "data-bs-toggle": "tooltip",
          title: "",
          "data-bs-original-title": "Change avatar",
        },
      },
      [
        _c("i", { staticClass: "bi bi-pencil-fill fs-7" }),
        _vm._v(" "),
        _c("input", {
          attrs: { type: "file", name: "avatar", accept: ".png, .jpg, .jpeg" },
        }),
        _vm._v(" "),
        _c("input", { attrs: { type: "hidden", name: "avatar_remove" } }),
      ]
    )
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "span",
      {
        staticClass:
          "btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow",
        attrs: {
          "data-kt-image-input-action": "cancel",
          "data-bs-toggle": "tooltip",
          title: "",
          "data-bs-original-title": "Cancel avatar",
        },
      },
      [_c("i", { staticClass: "bi bi-x fs-2" })]
    )
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "ul",
      {
        staticClass:
          "nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8",
      },
      [
        _c("li", { staticClass: "nav-item" }, [
          _c(
            "a",
            {
              staticClass: "nav-link text-active-primary pb-4 active",
              attrs: {
                "data-kt-countup-tabs": "true",
                "data-bs-toggle": "tab",
                href: "#kt_user_view_overview_security",
              },
            },
            [_vm._v("Seguridad")]
          ),
        ]),
      ]
    )
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-header border-0" }, [
      _c("div", { staticClass: "card-title" }, [_c("h2", [_vm._v("Perfil")])]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", { staticClass: "indicator-progress" }, [
      _vm._v("Please wait...\n                                        "),
      _c("span", {
        staticClass: "spinner-border spinner-border-sm align-middle ms-2",
      }),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "d-flex flex-stack flex-grow-1" }, [
      _c("div", { staticClass: "fw-bold" }, [
        _c("div", { staticClass: "fs-6 text-gray-700" }, [
          _vm._v(
            "\n                                            Tenga en cuenta que al cambiar el rol de un usuario, ese usuario perderá\n                                            todos los privilegios que se le asignaron a al rol anterior"
          ),
        ]),
      ]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "fs-6 fw-bold form-label mb-5 " }, [
      _c("span", { staticClass: "required" }, [_vm._v("Seleccione un Rol")]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", { staticClass: "indicator-progress" }, [
      _vm._v("Please wait...\n                                        "),
      _c("span", {
        staticClass: "spinner-border spinner-border-sm align-middle ms-2",
      }),
    ])
  },
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/Administracion/UserDetail.vue":
/*!***************************************************************!*\
  !*** ./resources/js/components/Administracion/UserDetail.vue ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _UserDetail_vue_vue_type_template_id_fcd3f37e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./UserDetail.vue?vue&type=template&id=fcd3f37e& */ "./resources/js/components/Administracion/UserDetail.vue?vue&type=template&id=fcd3f37e&");
/* harmony import */ var _UserDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./UserDetail.vue?vue&type=script&lang=js& */ "./resources/js/components/Administracion/UserDetail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _UserDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _UserDetail_vue_vue_type_template_id_fcd3f37e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _UserDetail_vue_vue_type_template_id_fcd3f37e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Administracion/UserDetail.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Administracion/UserDetail.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/Administracion/UserDetail.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UserDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./UserDetail.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Administracion/UserDetail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UserDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Administracion/UserDetail.vue?vue&type=template&id=fcd3f37e&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/Administracion/UserDetail.vue?vue&type=template&id=fcd3f37e& ***!
  \**********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UserDetail_vue_vue_type_template_id_fcd3f37e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./UserDetail.vue?vue&type=template&id=fcd3f37e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Administracion/UserDetail.vue?vue&type=template&id=fcd3f37e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UserDetail_vue_vue_type_template_id_fcd3f37e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UserDetail_vue_vue_type_template_id_fcd3f37e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunks/repostorio/folderAdmin"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/repositorio/folderAdmin.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/repositorio/folderAdmin.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _event_bus__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./event-bus */ "./resources/js/components/repositorio/event-bus.js");
/* harmony import */ var vue_pdf__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-pdf */ "./node_modules/vue-pdf/src/vuePdfNoSss.vue");
/* harmony import */ var _pdftron_webviewer__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @pdftron/webviewer */ "./node_modules/@pdftron/webviewer/webviewer.min.js");
/* harmony import */ var _pdftron_webviewer__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_pdftron_webviewer__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_5__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    pdf: vue_pdf__WEBPACK_IMPORTED_MODULE_3__["default"]
  },
  data: function data() {
    return {
      folders: [],
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
      DefaultName: 'Mi unidad',
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
      extensions: []
    };
  },
  computed: {
    getProgress: function getProgress() {
      return Math.round(this.porcentaje) + '%';
    }
  },
  created: function created() {
    this.GetFoldersUsersArea();
    this.getExtensions();
    var self = this;
    _event_bus__WEBPACK_IMPORTED_MODULE_2__["default"].$on('folder.Delete', function () {
      self.GetFolderDelete();
    });
    _event_bus__WEBPACK_IMPORTED_MODULE_2__["default"].$on('folder.unidad', function () {
      self.GetFolders();
    });
    _event_bus__WEBPACK_IMPORTED_MODULE_2__["default"].$on('folder.shared', function () {
      self.GetFoldersShared();
    });
    _event_bus__WEBPACK_IMPORTED_MODULE_2__["default"].$on('folders.UsersArea', function () {
      self.GetFoldersUsersArea();
    });
  },
  methods: {
    GetFolders: function GetFolders() {
      var _this = this;

      this.set_load();
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/getFolders?nombre=".concat(this.nombre)).then(function (response) {
        _this.folders = response.data;
        _this.nombFolder = '';

        if (_this.folders.length == 0) {
          _this.vacio = 1;
        } else {
          _this.vacio = '';
        }

        _this.contenFold = [];
        _this.moduloName = 'Mi unidad';
        _this.moduloId = 1;
        _this.files = [];
        _this.activitys = [];
        _this.idContentFold = '';
        _this.DetailsFolder = [];
        _this.DefaultName = 'Mi unidad';
        _this.idFolderSelected = '';
      })["finally"](function () {
        return _this.load_data = 2;
      });
    },
    getExtensions: function getExtensions() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/repositorio/extensions').then(function (response) {
        _this2.extensions = response.data;
      });
    },
    ShowInfoFolder: function ShowInfoFolder(folder) {
      var _this3 = this;

      console.log(folder);
      this.DefaultName = folder.nombre;
      this.idFolderSelected = folder.id;
      this.DetailsFolder = folder;
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/GetActivityFolder/' + folder.id).then(function (response) {
        _this3.activitys = response.data;
        _this3.DefaultIcon = 'fas fa-folder';
      });
    },
    formato: function formato(d) {
      return moment__WEBPACK_IMPORTED_MODULE_1___default()(d).format("MMM-DD-YYYY - hh:mm:ss");
    },
    NameUpdateFolder: function NameUpdateFolder() {
      var _this4 = this;

      if (this.nameFolder == '') {
        document.getElementById("errorNameEdit").style.display = 'block';
      }

      if (this.nameFolder != '') {
        $('#FolderUpdateName').modal('hide');
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/updateNameFolder?nombre=".concat(this.nameFolder, "&id=").concat(this.folderUpdateNameId)).then(function (response) {
          _this4.loadFunction();

          _this4.GetFolders();

          _this4.ShowInfoFolder(_this4.folderData);

          var messaje = 'Carpeta editada.';

          _this4.toastFunction(messaje);

          _this4.nameFolder = '';
        });
      }
    },
    Previsualizacion: function Previsualizacion(file) {
      var _this5 = this;

      var nomFile = file.nombre;
      var PdfFileNom = nomFile.substr(nomFile.length - 3);
      var DocxFileNom = nomFile.substr(nomFile.length - 4);
      var ImgFileNom = nomFile.substr(nomFile.length - 3);

      if (PdfFileNom == 'pdf' || PdfFileNom == 'PDF') {
        console.log(PdfFileNom);

        if (file.directorio != null) {
          pdfDocument = vue_pdf__WEBPACK_IMPORTED_MODULE_3__["default"].createLoadingTask(file.directorio + '/' + file.nombre);
          this.fileShow = file.directorio + '/' + file.nombre;
          this.src = pdfDocument;
          this.src.promise.then(function (pdf) {
            _this5.numPages = pdf.numPages;
            _this5.tipeFile = 1;
          });
        } else {
          pdfDocument = vue_pdf__WEBPACK_IMPORTED_MODULE_3__["default"].createLoadingTask('/ArchivosRepositorio/' + file.nombre);
          this.fileShow = '/ArchivosRepositorio/' + file.nombre;
          this.src = pdfDocument;
          this.src.promise.then(function (pdf) {
            _this5.numPages = pdf.numPages;
            _this5.tipeFile = 1;
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
    NameUpdateFolderShared: function NameUpdateFolderShared() {
      var _this6 = this;

      if (this.nameFolder == '') {
        document.getElementById("errorNameEdit").style.display = 'block';
      }

      if (this.nameFolder != '') {
        $('#FolderUpdateName').modal('hide');
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/updateNameFolderShared?nombre=".concat(this.nameFolder, "&id=").concat(this.folderUpdateNameId)).then(function (response) {
          _this6.GetFoldersShared();

          _this6.loadFunction();

          _this6.ShowInfoFolder(_this6.folderData);

          var messaje = 'Carpeta editada.';

          _this6.toastFunction(messaje);

          _this6.nameFolder = '';
        });
      }
    },
    handleFileUploads: function handleFileUploads() {
      var _this7 = this;

      var uploadedFiles = this.$refs.files.files;

      var _loop = function _loop() {
        var file = uploadedFiles[i];
        var file_extension = file.name.split(".").pop();

        var extension_permited = _this7.extensions.find(function (obj) {
          return obj.extension == file_extension;
        });

        if (extension_permited) {
          _this7.filesupload.push(uploadedFiles[i]);
        }
      };

      for (var i = 0; i < uploadedFiles.length; i++) {
        _loop();
      }

      var formData = new FormData();

      for (var i = 0; i < this.filesupload.length; i++) {
        var file = this.filesupload[i];
        formData.append('files[' + i + ']', file);
      }

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/SearchFileDuplicatesRepositorio', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then(function (response) {
        _this7.FilesDuplicates = response.data;

        if (_this7.FilesDuplicates.length != 0) {
          document.getElementById("filesDuplicates").style.display = 'block';
          Swal.fire({
            type: 'warning',
            title: 'Archivos Duplicados',
            text: 'Uno o varios archivos seleccionados ya se encuentran registrados, si los cargas se subira una versión 2 tomando el nuevo y dejando el antiguo de lado'
          });
        }
      });
    },
    removeFile: function removeFile(key) {
      this.filesupload.splice(key, 1);
    },
    Deltefile: function Deltefile(file) {
      var _this8 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/Deletefile/' + file.id).then(function (response) {
        var message = 'Archivo' + ' ' + file.nombre + ' ' + 'eliminado.';

        _this8.toastFunction(message);

        _this8.GetContent(_this8.idContentFold);
      });
    },
    GetContent: function GetContent(id) {
      var _this9 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/GetFiles?folderid=".concat(id)).then(function (response) {
        _this9.files = response.data;
      });
    },
    UploadFiles: function UploadFiles() {
      var _this10 = this;

      var formData = new FormData();

      for (var i = 0; i < this.filesupload.length; i++) {
        var file = this.filesupload[i];
        formData.append('files[' + i + ']', file);
      }

      document.getElementById("btnUploadFiles").disabled = 'true';
      document.getElementById("progressBarFileUpoad").style.display = 'block';
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/uploadFilesRepositorio/' + this.idContentFold, formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        },
        onUploadProgress: function onUploadProgress(e) {
          if (e.lengthComputable) {
            _this10.porcentaje = e.loaded / e.total * 100;
          }
        }
      }).then(function (response) {
        console.log(response.data);
        $('#UploadFile').modal('hide');
        _this10.filesupload = [];
        _this10.porcentaje = 0;

        _this10.loadFunction();

        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/GetFiles?folderid=".concat(_this10.idContentFold)).then(function (response) {
          _this10.files = response.data;
        });
        document.getElementById("btnUploadFiles").disabled = '';
        var message = 'Archio(s) cargado(s)';

        _this10.toastFunction(message);

        document.getElementById("progressBarFileUpoad").style.display = 'none';
        document.getElementById("filesDuplicates").style.display = 'none';
        _this10.FilesDuplicates = [];
      });
    },
    GetFoldersUsersArea: function GetFoldersUsersArea() {
      var _this11 = this;

      this.set_load();
      this.DefaultName = 'Administrador';
      this.DefaultIcon = 'fas fa-user';
      this.DetailsFolder = [];
      this.idContentFold = '';
      this.files = [];
      this.activitys = [];
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/getFoldersAreaUsers?nombre=".concat(this.nombre)).then(function (response) {
        _this11.nombFolder = '';
        _this11.moduloId = 4;
        _this11.moduloName = 'Administrador';
        _this11.folders = response.data;

        if (_this11.folders.length == 0) {
          _this11.vacio = 1;
        } else {
          _this11.vacio = '';
        }

        _this11.contenFold = [];
      })["finally"](function () {
        return _this11.load_data = 2;
      });
    },
    selectUser: function selectUser(user) {
      this.userSelects.push({
        id: user.id,
        name: user.name,
        apellido: user.apellido
      });
      this.userShared.push(user.id);
      document.getElementById("errorCompaprtirUsuario").style.display = 'none';
      document.getElementById('listUsers').style.display = 'none';
      $("#InputUser").val("");
    },
    DeleteError: function DeleteError() {
      if (this.nameFolder != '') {
        document.getElementById("errorNombre").style.display = 'none';
        this.fordelExist();
      }

      if (this.permissions != '') {
        document.getElementById("errorCompaprtirPrivilegios").style.display = 'none';
      }
    },
    validation: function validation() {
      if (this.permissions == '') {
        document.getElementById("errorCompaprtirPrivilegios").style.display = 'block';
      }

      if (this.userShared.length == 0) {
        document.getElementById("errorCompaprtirUsuario").style.display = 'block';
      }
    },
    ShareFolderUsers: function ShareFolderUsers() {
      var _this12 = this;

      this.validation();

      if (this.permissions != '' && this.userShared.length != 0) {
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("SetSharedFolder?folderId=".concat(this.folderSharedId, "&permisos=").concat(this.permissions, "&users=").concat(this.userShared)).then(function (response) {
          $('#ShareFolder').modal('hide');

          _this12.loadFunction();

          var message = 'Carpeta compartida';

          _this12.toastFunction(message);

          _this12.permissions = '';
          _this12.userShared = [];
          _this12.userSelects = [];
          $('#InputUser').val('');
        });
      }
    },
    GetFolderDelete: function GetFolderDelete() {
      var _this13 = this;

      this.set_load();
      this.DefaultName = 'Papelera';
      this.DefaultIcon = 'fas fa-trash';
      this.DetailsFolder = [];
      this.idContentFold = '';
      this.activitys = [];
      this.files = [];
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/getFoldersDelete?nombre=".concat(this.nombre)).then(function (response) {
        _this13.nombFolder = '';
        _this13.moduloId = 3;
        _this13.moduloName = 'Papelera';
        _this13.folders = response.data;

        if (_this13.folders.length == 0) {
          _this13.vacio = 1;
        } else {
          _this13.vacio = '';
        }

        _this13.contenFold = [];
      })["finally"](function () {
        return _this13.load_data = 2;
      });
    },
    GetFoldersShared: function GetFoldersShared() {
      var _this14 = this;

      this.set_load();
      this.DefaultName = 'Compartido conmigo';
      this.DefaultIcon = 'fas fa-user-friends';
      this.DetailsFolder = [];
      this.idContentFold = '';
      this.files = [];
      this.activitys = [];
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/getFoldersShared?nombre=".concat(this.nombre)).then(function (response) {
        _this14.nombFolder = '';
        _this14.moduloId = 2;
        _this14.moduloName = 'Compartido conmigo';
        _this14.folders = response.data;

        if (_this14.folders.length == 0) {
          _this14.vacio = 1;
        } else {
          _this14.vacio = '';
        }

        _this14.contenFold = [];
      })["finally"](function () {
        return _this14.load_data = 2;
      });
    },
    deleUserThisSelect: function deleUserThisSelect(user) {
      var index = this.userSelects.indexOf(user);
      this.userSelects.splice(index, 1);
      this.userShared.splice(index, 1);
    },
    CleanSelectAndInfo: function CleanSelectAndInfo() {
      if (this.moduloId == 1) {
        this.DetailsFolder = [];
        this.activitys = [];
        this.DefaultName = 'Mi unidad';
        this.DefaultIcon = 'fas fa-hdd';
      }

      if (this.moduloId == 3) {
        this.DefaultName = 'Papelera';
        this.DefaultIcon = 'fas fa-trash';
        this.DetailsFolder = [];
        this.activitys = [];
      }

      if (this.moduloId == 2) {
        this.DefaultName = 'Compartido conmigo';
        this.DefaultIcon = 'fas fa-user-friends';
        this.DetailsFolder = [];
        this.activitys = [];
      }

      if (this.moduloId == 4) {
        this.DefaultName = 'Administrador';
        this.DefaultIcon = 'fas fa-hdd';
        this.DetailsFolder = [];
        this.activitys = [];
      }
    },
    SearchUser: function SearchUser() {
      var _this15 = this;

      if (this.nameUser.length >= 3) {
        document.getElementById('listUsers').style.display = '';
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/GetUsers?user=".concat(this.nameUser)).then(function (response) {
          _this15.users = response.data;
        });
      } else {
        this.users = '';
        document.getElementById('listUsers').style.display = 'none';
      }
    },
    shareFolder: function shareFolder(folder) {
      $('#ShareFolder').modal('show');
      this.folderSharedId = folder.id;
    },
    changeStatus: function changeStatus(folder) {
      var _this16 = this;

      if (this.moduloId == 1) {
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/moveToFolderTrash/' + folder.id).then(function (response) {
          _this16.loadFunction();

          _this16.activitys = [];

          if (_this16.idContentFold != '') {
            _this16.GetContentFolderAction();
          } else {
            _this16.GetFolders();
          }

          _this16.CleanSelectAndInfo();

          var messaje = 'Carpeta enviada a la papelera.';

          _this16.toastFunction(messaje);
        });
      } else {
        if (this.moduloId == 2) {
          this.activitys = [];
          axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/trashFolderShared/' + folder.id).then(function (response) {
            _this16.loadFunction();

            _this16.GetFoldersShared();
          });
        }
      }
    },
    DeleteFolder: function DeleteFolder(folder) {
      var _this17 = this;

      Swal.fire({
        title: 'Esta seguro que desea eliminar esta carpeta?',
        text: "Se eliminara de forma permanente incluyendo su contenido",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#6877ef',
        cancelButtonColor: '#e3eaef',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
      }).then(function (result) {
        if (result.value) {
          axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/deleteFolderBd/' + folder.id).then(function (response) {
            _this17.GetFolderDelete();

            var message = 'Capeta eliminada';

            _this17.toastFunction(message);
          });
        }
      });
    },
    DeleAllFolders: function DeleAllFolders() {
      var _this18 = this;

      Swal.fire({
        title: 'Esta seguro que desea vaciar la papelera?',
        text: "Se eliminara todo el contenido de forma permanente ",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#6877ef',
        cancelButtonColor: '#e3eaef',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
      }).then(function (result) {
        if (result.value) {
          axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/delteAllfoldersUserTrash/').then(function (response) {
            _this18.GetFolderDelete();

            var message = 'Papelera limpiada';

            _this18.toastFunction(message);
          });
        }
      });
    },
    BackFold: function BackFold(id, name) {
      var _this19 = this;

      this.set_load();
      this.idContentFold = id;
      this.nombFolder = name;
      this.contenFold.splice(-1, 1);
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/GetSubFolder?folderid=".concat(id)).then(function (response) {
        _this19.folders = response.data.folder;
        _this19.files = response.data.files;
      })["finally"](function () {
        return _this19.load_data = 2;
      });
    },
    changeName: function changeName(folder) {
      this.folderUpdateNameId = folder.id;
      this.folderData = folder;
      $('#FolderUpdateName').modal('show');
    },
    GetContentFolder: function GetContentFolder(folder) {
      var _this20 = this;

      this.set_load();
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/GetSubFolder?folderid=".concat(folder.id)).then(function (response) {
        _this20.folders = response.data.folder;
        _this20.files = response.data.files;
      })["finally"](function () {
        return _this20.load_data = 2;
      });

      if (this.moduloId == 2) {
        this.Folderpermisison = folder.permiso_id;
      }

      this.nombre = '';
      this.idContentFold = folder.id;
      this.contenFold.push({
        id: folder.id,
        name: folder.nombre
      });
      this.nombFolder = folder.nombre;
    },
    GetContentFolderAction: function GetContentFolderAction() {
      var _this21 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/GetSubFolder?folderid=".concat(this.idContentFold)).then(function (response) {
        _this21.folders = response.data.folder;
        _this21.files = response.data.files;
      });
    },
    GetContentFolderSearch: function GetContentFolderSearch() {
      var _this22 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/GetSubFolder?folderid=".concat(this.idContentFold, "&nombre=").concat(this.nombre)).then(function (response) {
        _this22.folders = response.data.folder;
        _this22.files = response.data.files;
      });
    },
    changePop: function changePop() {
      var selectPop = document.getElementById('popcheck');
      var searchPop = document.getElementById('popSearch');
      searchPop.style.display = '';
      selectPop.style.display = 'none';
      this.popId = '';
      this.dataPop = '';
      $('#inputSitio').val('');
    },
    BuscarSitio: function BuscarSitio() {
      var _this23 = this;

      if (this.datositio.length >= 3) {
        var url = '/GetPop';
        document.getElementById('listPopsRepo').style.display = 'block';
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/GetPop?datositio=".concat(this.datositio)).then(function (response) {
          _this23.pops = response.data;
        });
      } else {
        this.pops = '';
        document.getElementById('listPopsRepo').style.display = 'none';
      }
    },
    selectdpop: function selectdpop(id, nemSite, Nombre) {
      this.popid = id;
      var selectPop = document.getElementById('popcheck');
      var searchPop = document.getElementById('popSearch');
      var divAlertPop = document.getElementById('errorPop');
      this.pops = '';
      searchPop.style.display = 'none';
      selectPop.style.display = '';
      divAlertPop.style.display = 'none';
      document.getElementById('listPopsRepo').style.display = 'none';
      $("#popcheck").val(nemSite + '-' + Nombre);
    },
    CreateNewFolder: function CreateNewFolder() {
      var _this24 = this;

      console.log(this.comprobacion);

      if (this.nameFolder == '') {
        document.getElementById("errorNombre").style.display = 'block';
      }

      if (this.nameFolder != '') {
        if (this.comprobacion == 1) {
          axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/createNewFolder?nombre=".concat(this.nameFolder, "&site=").concat(this.popid)).then(function (response) {
            $('#FolderAdd').modal('hide');

            _this24.loadFunction();

            _this24.GetFolders();

            _this24.changePop();

            _this24.nameFolder = '';
            _this24.popid = '';
            var messaje = 'Carpeta creada.';

            _this24.toastFunction(messaje);
          });
        } else {
          if (this.comprobacion == 2) {
            var mensaje = 'ya existe una carpeta con ese nombre';
            this.messajeError(mensaje);
          }
        }
      }
    },
    fordelExist: function fordelExist() {
      var _this25 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/FindNewFolder?nombre=".concat(this.nameFolder)).then(function (response) {
        if (response.data.length == 0) {
          _this25.comprobacion = 1;
        }

        if (response.data.length != 0) {
          _this25.comprobacion = 2;
        }
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
    CreateNewFolder2: function CreateNewFolder2() {
      var _this26 = this;

      if (this.nameFolder == '') {
        document.getElementById("errorNombre").style.display = 'block';
      }

      if (this.nameFolder != '') {
        this.set_load();
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/createSubFolder?nombre=".concat(this.nameFolder, "&site=").concat(this.popid, "&idFolder=").concat(this.idContentFold)).then(function (response) {
          $('#FolderAdd2').modal('hide');

          _this26.changePop();

          _this26.nameFolder = '';
          _this26.popid = '';
          var messaje = 'Carpeta creada.';

          _this26.toastFunction(messaje);

          _this26.GetContentFolderSubFolder(_this26.idContentFold);
        });
      }
    },
    GetContentFolderSubFolder: function GetContentFolderSubFolder(folder) {
      var _this27 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/GetSubFolder?folderid=".concat(folder)).then(function (response) {
        _this27.folders = response.data.folder;
        _this27.files = response.data.files;
      })["finally"](function () {
        return _this27.load_data = 2;
      });
    },
    RecoveryFolder: function RecoveryFolder(folder) {
      var _this28 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/RecoveryFolder/' + folder.id).then(function (response) {
        _this28.GetFolderDelete();

        var message = 'Carpeta' + ' ' + folder.nombre + ' ' + 'restaurada';

        _this28.toastFunction(message);
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
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/repositorio/folderAdmin.vue?vue&type=template&id=0051a8ec&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/repositorio/folderAdmin.vue?vue&type=template&id=0051a8ec& ***!
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
    _c("div", { staticClass: "main-content" }, [
      _c("div", { staticClass: "wrapper wrapper-content" }, [
        _c("section", { staticClass: "section" }, [
          _c(
            "div",
            { staticClass: "section-header shadow-box-ag barlow bold" },
            [
              _c("div", { staticClass: "breadcrumb-item active" }, [
                _vm.moduloId == 1
                  ? _c(
                      "a",
                      {
                        staticStyle: { "font-size": "18px" },
                        attrs: { href: "#" },
                        on: {
                          click: function ($event) {
                            $event.preventDefault()
                            return _vm.GetFolders.apply(null, arguments)
                          },
                        },
                      },
                      [
                        _vm._v(
                          "\n                            " +
                            _vm._s(_vm.moduloName) +
                            "\n                        "
                        ),
                      ]
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.moduloId == 3
                  ? _c(
                      "a",
                      {
                        staticStyle: { "font-size": "18px" },
                        attrs: { href: "#" },
                        on: {
                          click: function ($event) {
                            $event.preventDefault()
                            return _vm.GetFolderDelete.apply(null, arguments)
                          },
                        },
                      },
                      [
                        _vm._v(
                          "\n                            " +
                            _vm._s(_vm.moduloName) +
                            "\n                        "
                        ),
                      ]
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.moduloId == 2
                  ? _c(
                      "a",
                      {
                        staticStyle: { "font-size": "18px" },
                        attrs: { href: "#" },
                        on: {
                          click: function ($event) {
                            $event.preventDefault()
                            return _vm.GetFoldersShared.apply(null, arguments)
                          },
                        },
                      },
                      [
                        _vm._v(
                          "\n                            " +
                            _vm._s(_vm.moduloName) +
                            "\n                        "
                        ),
                      ]
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.moduloId == 4
                  ? _c(
                      "a",
                      {
                        staticStyle: { "font-size": "18px" },
                        attrs: { href: "#" },
                        on: {
                          click: function ($event) {
                            $event.preventDefault()
                            return _vm.GetFoldersUsersArea.apply(
                              null,
                              arguments
                            )
                          },
                        },
                      },
                      [
                        _vm._v(
                          "\n                            " +
                            _vm._s(_vm.moduloName) +
                            "\n                        "
                        ),
                      ]
                    )
                  : _vm._e(),
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
                              "\n                            " +
                                _vm._s(Fold.name) +
                                "\n                        "
                            ),
                          ]
                        )
                      : _c("a", [
                          _vm._v(
                            "\n                            " +
                              _vm._s(Fold.name) +
                              "\n                        "
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
          _c("div", { staticClass: "col-lg-9 " }, [
            _c("div", { staticClass: "ibox float-e-margins" }, [
              _c("div", { staticClass: "card shadow-box-ag" }, [
                _c("div", { staticClass: "card-header" }, [
                  _c("div", { staticClass: "row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-4 col-md-6 col-sm-6 col-12" },
                      [
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
                                "\n                                                Opciones\n                                            "
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
                                    "\n                                                    Selecione una opción\n                                                "
                                  ),
                                ]
                              ),
                              _vm._v(" "),
                              _vm.moduloId == 1 && _vm.idContentFold == ""
                                ? _c("li", [_vm._m(0)])
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.moduloId == 1 && _vm.idContentFold != ""
                                ? _c("li", [_vm._m(1)])
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.moduloId == 1 && _vm.idContentFold != ""
                                ? _c("li", [_vm._m(2)])
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.moduloId == 3
                                ? _c("li", [
                                    _c(
                                      "a",
                                      {
                                        staticClass:
                                          "dropdown-item barlow regular",
                                        attrs: {
                                          "data-toggle": "modal",
                                          href: "",
                                        },
                                        on: {
                                          click: function ($event) {
                                            $event.preventDefault()
                                            return _vm.DeleAllFolders()
                                          },
                                        },
                                      },
                                      [
                                        _c("i", {
                                          staticClass: "fas fa-trash",
                                        }),
                                        _vm._v(
                                          "\n                                                        Vaciar papelera\n                                                    "
                                        ),
                                      ]
                                    ),
                                  ])
                                : _vm._e(),
                            ]
                          ),
                        ]),
                      ]
                    ),
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
                                attrs: { placeholder: "Buscar", type: "text" },
                                domProps: { value: _vm.nombre },
                                on: {
                                  keyup: function ($event) {
                                    $event.preventDefault()
                                    return _vm.GetFolders.apply(null, arguments)
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
                          (_vm.moduloId == 1 && _vm.idContentFold != "") ||
                          (_vm.moduloId == 4 && _vm.idContentFold != "")
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
                                attrs: { placeholder: "Buscar", type: "text" },
                                domProps: { value: _vm.nombre },
                                on: {
                                  keyup: function ($event) {
                                    $event.preventDefault()
                                    return _vm.GetContentFolderSearch.apply(
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
                          _vm.moduloId == 3
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
                                attrs: { placeholder: "Buscar", type: "text" },
                                domProps: { value: _vm.nombre },
                                on: {
                                  keyup: function ($event) {
                                    $event.preventDefault()
                                    return _vm.GetFolderDelete.apply(
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
                          _vm.moduloId == 4 && _vm.idContentFold == ""
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
                                attrs: { placeholder: "Buscar", type: "text" },
                                domProps: { value: _vm.nombre },
                                on: {
                                  keyup: function ($event) {
                                    $event.preventDefault()
                                    return _vm.GetFoldersUsersArea.apply(
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
                          _vm.moduloId == 2
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
                                attrs: { placeholder: "Buscar", type: "text" },
                                domProps: { value: _vm.nombre },
                                on: {
                                  keyup: function ($event) {
                                    $event.preventDefault()
                                    return _vm.GetFoldersShared.apply(
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
                          _vm._m(3),
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
                      _vm._l(_vm.folders, function (folder) {
                        return _vm.load_data == 2
                          ? _c(
                              "div",
                              {
                                staticClass:
                                  "col-lg-3 col-md-6 col-sm-6 col-12",
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
                                        _vm._m(4, true),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          { staticClass: "card-wrap" },
                                          [
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
                                                      "font-size": "13px",
                                                      color: "black",
                                                    },
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                                                            " +
                                                        _vm._s(folder.nombre) +
                                                        "\n                                                        "
                                                    ),
                                                  ]
                                                ),
                                              ]
                                            ),
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          { staticClass: "dropdown d-inline " },
                                          [
                                            _vm._m(5, true),
                                            _vm._v(" "),
                                            _c(
                                              "ul",
                                              {
                                                staticClass:
                                                  "dropdown-menu dropdown-menu-sm boxBounce",
                                              },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "dropdown-title barlow semi_bold",
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                                                            Opciones\n                                                        "
                                                    ),
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _vm.moduloId == 1
                                                  ? _c("li", [
                                                      _c(
                                                        "a",
                                                        {
                                                          staticClass:
                                                            "dropdown-item barlow regular",
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function (
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.changeName(
                                                                folder
                                                              )
                                                            },
                                                          },
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-edit",
                                                          }),
                                                          _vm._v(
                                                            "\n                                                                Editar nombre\n                                                            "
                                                          ),
                                                        ]
                                                      ),
                                                    ])
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                _vm.moduloId == 1
                                                  ? _c("li", [
                                                      _c(
                                                        "a",
                                                        {
                                                          staticClass:
                                                            "dropdown-item barlow regular",
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function (
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.shareFolder(
                                                                folder
                                                              )
                                                            },
                                                          },
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-user-plus",
                                                          }),
                                                          _vm._v(
                                                            "\n                                                                Compartir\n                                                            "
                                                          ),
                                                        ]
                                                      ),
                                                    ])
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                _vm.moduloId == 1
                                                  ? _c("li", [
                                                      _c(
                                                        "a",
                                                        {
                                                          staticClass:
                                                            "dropdown-item barlow regular",
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function (
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.changeStatus(
                                                                folder
                                                              )
                                                            },
                                                          },
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-trash",
                                                          }),
                                                          _vm._v(
                                                            "\n                                                                Quitar\n                                                            "
                                                          ),
                                                        ]
                                                      ),
                                                    ])
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                _vm.moduloId == 2 &&
                                                folder.permiso_id == 2
                                                  ? _c("li", [
                                                      _c(
                                                        "a",
                                                        {
                                                          staticClass:
                                                            "dropdown-item barlow regular",
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function (
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.changeName(
                                                                folder
                                                              )
                                                            },
                                                          },
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-edit",
                                                          }),
                                                          _vm._v(
                                                            "\n                                                                Editar nombre\n                                                            "
                                                          ),
                                                        ]
                                                      ),
                                                    ])
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                _vm.moduloId == 2 &&
                                                folder.permiso_id == 2
                                                  ? _c("li", [
                                                      _c(
                                                        "a",
                                                        {
                                                          staticClass:
                                                            "dropdown-item barlow regular",
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function (
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.shareFolder(
                                                                folder
                                                              )
                                                            },
                                                          },
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-user-plus",
                                                          }),
                                                          _vm._v(
                                                            "\n                                                                Compartir\n                                                            "
                                                          ),
                                                        ]
                                                      ),
                                                    ])
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                _vm.moduloId == 2 &&
                                                folder.permiso_id == 2
                                                  ? _c("li", [
                                                      _c(
                                                        "a",
                                                        {
                                                          staticClass:
                                                            "dropdown-item barlow regular",
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function (
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.changeStatus(
                                                                folder
                                                              )
                                                            },
                                                          },
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-trash",
                                                          }),
                                                          _vm._v(
                                                            "\n                                                                Quitar\n                                                            "
                                                          ),
                                                        ]
                                                      ),
                                                    ])
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                _vm.moduloId == 3
                                                  ? _c("li", [
                                                      _c(
                                                        "a",
                                                        {
                                                          staticClass:
                                                            "dropdown-item barlow regular",
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function (
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.RecoveryFolder(
                                                                folder
                                                              )
                                                            },
                                                          },
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-history",
                                                          }),
                                                          _vm._v(
                                                            "\n                                                                Restaurar\n                                                            "
                                                          ),
                                                        ]
                                                      ),
                                                    ])
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                _vm.moduloId == 3
                                                  ? _c("li", [
                                                      _c(
                                                        "a",
                                                        {
                                                          staticClass:
                                                            "dropdown-item barlow regular",
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function (
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.DeleteFolder(
                                                                folder
                                                              )
                                                            },
                                                          },
                                                        },
                                                        [
                                                          _c("i", {
                                                            staticClass:
                                                              "fas fa-trash",
                                                          }),
                                                          _vm._v(
                                                            "\n                                                                Eliminar definitivamente\n                                                            "
                                                          ),
                                                        ]
                                                      ),
                                                    ])
                                                  : _vm._e(),
                                              ]
                                            ),
                                          ]
                                        ),
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
                        return _vm.load_data == 2
                          ? _c("div", { staticClass: "col-lg-2" }, [
                              _c("div", { staticClass: "col text-center" }, [
                                _c(
                                  "a",
                                  {
                                    attrs: {
                                      "data-toggle": "dropdown",
                                      href: "#",
                                    },
                                    on: {
                                      dblclick: function ($event) {
                                        $event.preventDefault()
                                        return _vm.Previsualizacion(file)
                                      },
                                    },
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "browser boxBounce" },
                                      [
                                        _vm.getFileExtension(file.nombre) !=
                                        "jpg"
                                          ? _c("i", {
                                              class: file.class,
                                              staticStyle: {
                                                "font-size": "50px",
                                              },
                                            })
                                          : _vm._e(),
                                      ]
                                    ),
                                    _vm._v(" "),
                                    file.directorio == null
                                      ? _c("div", [
                                          _vm.getFileExtension(file.nombre) ==
                                            "jpg" ||
                                          _vm.getFileExtension(file.nombre) ==
                                            "png" ||
                                          _vm.getFileExtension(file.nombre) ==
                                            "jpeg"
                                            ? _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "gallery gallery-md",
                                                },
                                                [
                                                  _vm.getFileExtension(
                                                    file.nombre
                                                  ) == "jpg"
                                                    ? _c("img", {
                                                        staticStyle: {
                                                          width: "100%",
                                                          height: "50%",
                                                        },
                                                        attrs: {
                                                          src:
                                                            "/ArchivosRepositorio/" +
                                                            file.nombre,
                                                        },
                                                      })
                                                    : _vm._e(),
                                                ]
                                              )
                                            : _vm._e(),
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    file.directorio != null
                                      ? _c("div", [
                                          _vm.getFileExtension(file.nombre) ==
                                            "jpg" ||
                                          _vm.getFileExtension(file.nombre) ==
                                            "png" ||
                                          _vm.getFileExtension(file.nombre) ==
                                            "jpeg"
                                            ? _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "gallery gallery-md",
                                                },
                                                [
                                                  _vm.getFileExtension(
                                                    file.nombre
                                                  ) == "jpg"
                                                    ? _c("img", {
                                                        staticStyle: {
                                                          width: "100%",
                                                          height: "50%",
                                                        },
                                                        attrs: {
                                                          src:
                                                            file.directorio +
                                                            "/" +
                                                            file.nombre,
                                                        },
                                                      })
                                                    : _vm._e(),
                                                ]
                                              )
                                            : _vm._e(),
                                        ])
                                      : _vm._e(),
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "mt-2 font-weight-bold" },
                                  [
                                    _vm._v(
                                      "\n                                                " +
                                        _vm._s(file.nombre) +
                                        "\n                                            "
                                    ),
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "ul",
                                  {
                                    staticClass:
                                      "dropdown-menu dropdown-menu-sm",
                                  },
                                  [
                                    _c(
                                      "li",
                                      { staticClass: "dropdown-title" },
                                      [
                                        _vm._v(
                                          "\n                                                    Opciones\n                                                "
                                        ),
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm.moduloId == 1 || _vm.moduloId == 4
                                      ? _c("li", [
                                          file.directorio == null
                                            ? _c(
                                                "a",
                                                {
                                                  staticClass: "dropdown-item",
                                                  attrs: {
                                                    href:
                                                      "/ArchivosRepositorio/" +
                                                      file.nombre,
                                                    download: "",
                                                  },
                                                },
                                                [
                                                  _c("i", {
                                                    staticClass:
                                                      "fas fa-download",
                                                  }),
                                                  _vm._v(
                                                    "\n                                                        Descargar archivo\n                                                    "
                                                  ),
                                                ]
                                              )
                                            : _vm._e(),
                                          _vm._v(" "),
                                          file.directorio != null
                                            ? _c(
                                                "a",
                                                {
                                                  staticClass: "dropdown-item",
                                                  attrs: {
                                                    href:
                                                      file.directorio +
                                                      "/" +
                                                      file.nombre,
                                                    download: "",
                                                  },
                                                },
                                                [
                                                  _c("i", {
                                                    staticClass:
                                                      "fas fa-download",
                                                  }),
                                                  _vm._v(
                                                    "\n                                                        Descargar archivo\n                                                    "
                                                  ),
                                                ]
                                              )
                                            : _vm._e(),
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _c("li", [
                                      _c(
                                        "a",
                                        {
                                          staticClass: "dropdown-item",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function ($event) {
                                              $event.preventDefault()
                                              return _vm.Previsualizacion(file)
                                            },
                                          },
                                        },
                                        [
                                          _c("i", {
                                            staticClass: "fas fa-eye",
                                          }),
                                          _vm._v(
                                            "\n                                                        Ver\n                                                    "
                                          ),
                                        ]
                                      ),
                                    ]),
                                    _vm._v(" "),
                                    _vm.moduloId == 1
                                      ? _c("li", [
                                          _c(
                                            "a",
                                            {
                                              staticClass: "dropdown-item",
                                              attrs: { href: "#" },
                                              on: {
                                                click: function ($event) {
                                                  $event.preventDefault()
                                                  return _vm.Deltefile(file)
                                                },
                                              },
                                            },
                                            [
                                              _c("i", {
                                                staticClass: "fas fa-trash",
                                              }),
                                              _vm._v(
                                                "\n                                                        Eliminar archivo\n                                                    "
                                              ),
                                            ]
                                          ),
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.moduloId == 2
                                      ? _c("li", [
                                          _c(
                                            "a",
                                            {
                                              staticClass: "dropdown-item",
                                              attrs: {
                                                href:
                                                  "/ArchivosRepositorio/" +
                                                  file.nombre,
                                                download: "",
                                              },
                                            },
                                            [
                                              _c("i", {
                                                staticClass: "fas fa-download",
                                              }),
                                              _vm._v(
                                                "\n                                                        Descargar archivo\n                                                    "
                                              ),
                                            ]
                                          ),
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.moduloId == 2 &&
                                    _vm.Folderpermisison == 2
                                      ? _c("li", [
                                          _c(
                                            "a",
                                            {
                                              staticClass: "dropdown-item",
                                              attrs: { href: "#" },
                                              on: {
                                                click: function ($event) {
                                                  $event.preventDefault()
                                                  return _vm.Deltefile(file)
                                                },
                                              },
                                            },
                                            [
                                              _c("i", {
                                                staticClass: "fas fa-trash",
                                              }),
                                              _vm._v(
                                                "\n                                                        Eliminar archivo\n                                                    "
                                              ),
                                            ]
                                          ),
                                        ])
                                      : _vm._e(),
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
                  _vm.vacio == 1 && _vm.load_data == 2
                    ? _c("div", { staticClass: "col-12 col-md-12 col-sm-12" }, [
                        _vm._m(6),
                      ])
                    : _vm._e(),
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
                                        [_vm._m(7)]
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
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-3 " }, [
            _c("div", { staticClass: "card shadow-box-ag" }, [
              _c("div", { staticClass: "card-header" }, [
                _c(
                  "h2",
                  {
                    staticClass: "barlow bold",
                    staticStyle: { "font-size": "22px" },
                  },
                  [
                    _c("i", {
                      class: _vm.DefaultIcon,
                      staticStyle: { "font-size": "20px" },
                    }),
                    _vm._v(
                      "\n                                " +
                        _vm._s(_vm.DefaultName) +
                        "\n                            "
                    ),
                  ]
                ),
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "card-body" }, [
                _vm._m(8),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "tab-content", attrs: { id: "myTabContent" } },
                  [
                    _c(
                      "div",
                      {
                        staticClass: "tab-pane fade show active",
                        attrs: {
                          "aria-labelledby": "home-tab",
                          id: "home",
                          role: "tabpanel",
                        },
                      },
                      [
                        _c("div", { staticClass: "card-body p-0" }, [
                          _c("div", { staticClass: "tickets-list" }, [
                            _vm.DetailsFolder.length != 0
                              ? _c("div", { staticClass: "ticket-item" }, [
                                  _c("div", { staticClass: "row" }, [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "col-lg-12 col-md-6 col-sm-6 col-12",
                                      },
                                      [
                                        _vm._m(9),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          { staticClass: "barlow regular" },
                                          [
                                            _vm._v(
                                              "\n                                                            " +
                                                _vm._s(
                                                  _vm.DetailsFolder.user.name
                                                ) +
                                                " " +
                                                _vm._s(
                                                  _vm.DetailsFolder.user
                                                    .apellido
                                                ) +
                                                "\n                                                        "
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
                                          "col-lg-12 col-md-6 col-sm-6 col-12",
                                      },
                                      [
                                        _vm._m(10),
                                        _vm._v(" "),
                                        _vm.DetailsFolder.length != 0
                                          ? _c(
                                              "div",
                                              {
                                                staticClass: " barlow regular",
                                              },
                                              [
                                                _vm._v(
                                                  "\n                                                            " +
                                                    _vm._s(
                                                      _vm.formato(
                                                        _vm.DetailsFolder
                                                          .created_at
                                                      )
                                                    ) +
                                                    "\n                                                        "
                                                ),
                                              ]
                                            )
                                          : _vm._e(),
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "col-lg-12 col-md-6 col-sm-6 col-12",
                                      },
                                      [
                                        _vm._m(11),
                                        _vm._v(" "),
                                        _vm.DetailsFolder.length != 0
                                          ? _c(
                                              "div",
                                              { staticClass: "barlow regular" },
                                              [
                                                _vm._v(
                                                  "\n                                                            " +
                                                    _vm._s(
                                                      _vm.formato(
                                                        _vm.DetailsFolder
                                                          .updated_at
                                                      )
                                                    ) +
                                                    "\n                                                        "
                                                ),
                                              ]
                                            )
                                          : _vm._e(),
                                      ]
                                    ),
                                  ]),
                                ])
                              : _vm._e(),
                          ]),
                        ]),
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "tab-pane fade",
                        staticStyle: {
                          "max-height": "700px",
                          "overflow-y": "auto",
                        },
                        attrs: {
                          "aria-labelledby": "profile-tab",
                          id: "profile",
                          role: "tabpanel",
                        },
                      },
                      _vm._l(_vm.activitys, function (activity) {
                        return _vm.activitys.length != 0
                          ? _c(
                              "div",
                              {
                                staticClass:
                                  "col-lg-12 col-md-3 col-sm-6 col-12",
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass: "card card-statistic-1 ",
                                    staticStyle: { "border-radius": "15px" },
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
                                                activity.user.name +
                                                " " +
                                                activity.user.apellido,
                                              href: "#",
                                            },
                                          },
                                          [
                                            _c("figure", {
                                              staticClass:
                                                "avatar mr-2 bg-primary text-white",
                                              attrs: {
                                                "data-initial":
                                                  activity.iniciales,
                                              },
                                            }),
                                          ]
                                        ),
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "card-wrap" }, [
                                      _c("div", { staticClass: "card-header" }),
                                      _vm._v(" "),
                                      _c(
                                        "div",
                                        {
                                          staticClass:
                                            "chat-text barlow regular",
                                        },
                                        [
                                          _vm._v(
                                            "\n                                                    " +
                                              _vm._s(activity.descripcion) +
                                              "\n                                                "
                                          ),
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("div", { staticClass: "chat-time" }, [
                                        _c(
                                          "small",
                                          { staticClass: "barlow semi_bold" },
                                          [
                                            _vm._v(
                                              "\n                                                        " +
                                                _vm._s(
                                                  _vm.formato(
                                                    activity.created_at
                                                  )
                                                ) +
                                                "\n                                                    "
                                            ),
                                          ]
                                        ),
                                      ]),
                                    ]),
                                  ]
                                ),
                              ]
                            )
                          : _vm._e()
                      }),
                      0
                    ),
                  ]
                ),
              ]),
            ]),
          ]),
        ]),
      ]),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "modal inmodal",
          attrs: {
            "aria-hidden": "true",
            "data-backdrop": "static",
            id: "FolderAdd2",
            role: "dialog",
            tabindex: "-1",
          },
        },
        [
          _c("div", { staticClass: "modal-dialog " }, [
            _c("div", { staticClass: "modal-content animated bounceInRight" }, [
              _vm._m(12),
              _vm._v(" "),
              _c("div", { staticClass: "modal-body" }, [
                _c("div", { staticClass: "row" }, [
                  _c(
                    "div",
                    { staticClass: "col-lg-12 col-md-6 col-sm-6 col-12" },
                    [
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", [
                          _vm._v(
                            "\n                                        Nombre *\n                                    "
                          ),
                        ]),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.nameFolder,
                              expression: "nameFolder",
                            },
                          ],
                          staticClass: "form-control",
                          attrs: { type: "text" },
                          domProps: { value: _vm.nameFolder },
                          on: {
                            keyup: function ($event) {
                              $event.preventDefault()
                              return _vm.DeleteError.apply(null, arguments)
                            },
                            input: function ($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.nameFolder = $event.target.value
                            },
                          },
                        }),
                        _vm._v(" "),
                        _vm._m(13),
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", [
                          _vm._v(
                            "\n                                        Sitio\n                                    "
                          ),
                        ]),
                        _vm._v(" "),
                        _c("input", {
                          attrs: { name: "pop", type: "hidden" },
                          domProps: { value: _vm.popid },
                        }),
                        _vm._v(" "),
                        _c("input", {
                          staticClass: "form-control",
                          staticStyle: { display: "none" },
                          attrs: {
                            id: "popcheck",
                            name: "",
                            type: "text",
                            value: "",
                          },
                          on: {
                            click: function ($event) {
                              $event.preventDefault()
                              return _vm.changePop.apply(null, arguments)
                            },
                          },
                        }),
                        _vm._v(" "),
                        _c("div", { attrs: { id: "popSearch" } }, [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.datositio,
                                expression: "datositio",
                              },
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "inputSitio",
                              name: "datositio",
                              placeholder: "Buscar Sitio",
                              type: "text",
                              value: "",
                            },
                            domProps: { value: _vm.datositio },
                            on: {
                              keyup: function ($event) {
                                $event.preventDefault()
                                return _vm.BuscarSitio()
                              },
                              input: function ($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.datositio = $event.target.value
                              },
                            },
                          }),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "row",
                              staticStyle: { display: "none" },
                              attrs: { id: "listPopsRepo" },
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "col-lg-12 col-md-4 col-sm-4 col-10 shadow-box-ag full-height-scroll ",
                                  staticStyle: {
                                    "max-height": "120px",
                                    "overflow-y": "auto",
                                  },
                                },
                                _vm._l(_vm.pops, function (pop) {
                                  return _c("div", [
                                    _c(
                                      "a",
                                      {
                                        staticStyle: { color: "black" },
                                        attrs: {
                                          href: "",
                                          id: "selectpopvalue",
                                        },
                                        on: {
                                          click: function ($event) {
                                            $event.preventDefault()
                                            return _vm.selectdpop(
                                              pop.id,
                                              pop.nem_site,
                                              pop.nombre
                                            )
                                          },
                                        },
                                      },
                                      [
                                        _vm._v(
                                          "\n                                                                    " +
                                            _vm._s(pop.nem_site) +
                                            " " +
                                            _vm._s(pop.nombre) +
                                            "\n                                                                    "
                                        ),
                                        _c("hr", {
                                          staticStyle: { "margin-top": "-1px" },
                                        }),
                                      ]
                                    ),
                                  ])
                                }),
                                0
                              ),
                            ]
                          ),
                        ]),
                        _vm._v(" "),
                        _vm._m(14),
                      ]),
                    ]
                  ),
                ]),
              ]),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "modal-footer",
                  staticStyle: {
                    background: "-webkit-linear-gradient(#ff8ddb ,#bb73e0)",
                    height: "60px",
                  },
                },
                [
                  _c(
                    "button",
                    {
                      staticClass: " btn btn-secondary",
                      staticStyle: {
                        "box-shadow": "0 0px 0px",
                        color: "#191919",
                      },
                      attrs: { type: "button" },
                      on: {
                        click: function ($event) {
                          $event.preventDefault()
                          return _vm.CreateNewFolder2.apply(null, arguments)
                        },
                      },
                    },
                    [
                      _vm._v(
                        "\n                            Crear\n                        "
                      ),
                    ]
                  ),
                ]
              ),
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
            "data-backdrop": "static",
            id: "FolderAdd",
            role: "dialog",
            tabindex: "-1",
          },
        },
        [
          _c("div", { staticClass: "modal-dialog " }, [
            _c("div", { staticClass: "modal-content animated bounceInRight" }, [
              _vm._m(15),
              _vm._v(" "),
              _c("div", { staticClass: "modal-body" }, [
                _c("div", { staticClass: "row" }, [
                  _c(
                    "div",
                    { staticClass: "col-lg-12 col-md-6 col-sm-6 col-12" },
                    [
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", [
                          _vm._v(
                            "\n                                        Nombre *\n                                    "
                          ),
                        ]),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.nameFolder,
                              expression: "nameFolder",
                            },
                          ],
                          staticClass: "form-control",
                          attrs: { type: "text" },
                          domProps: { value: _vm.nameFolder },
                          on: {
                            keyup: function ($event) {
                              $event.preventDefault()
                              return _vm.DeleteError.apply(null, arguments)
                            },
                            input: function ($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.nameFolder = $event.target.value
                            },
                          },
                        }),
                        _vm._v(" "),
                        _vm._m(16),
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", [
                          _vm._v(
                            "\n                                        Sitio\n                                    "
                          ),
                        ]),
                        _vm._v(" "),
                        _c("input", {
                          attrs: { name: "pop", type: "hidden" },
                          domProps: { value: _vm.popid },
                        }),
                        _vm._v(" "),
                        _c("input", {
                          staticClass: "form-control",
                          staticStyle: { display: "none" },
                          attrs: {
                            id: "popcheck",
                            name: "",
                            type: "text",
                            value: "",
                          },
                          on: {
                            click: function ($event) {
                              $event.preventDefault()
                              return _vm.changePop.apply(null, arguments)
                            },
                          },
                        }),
                        _vm._v(" "),
                        _c("div", { attrs: { id: "popSearch" } }, [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.datositio,
                                expression: "datositio",
                              },
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "inputSitio",
                              name: "datositio",
                              placeholder: "Buscar Sitio",
                              type: "text",
                              value: "",
                            },
                            domProps: { value: _vm.datositio },
                            on: {
                              keyup: function ($event) {
                                $event.preventDefault()
                                return _vm.BuscarSitio()
                              },
                              input: function ($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.datositio = $event.target.value
                              },
                            },
                          }),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "row",
                              staticStyle: { display: "none" },
                              attrs: { id: "listPops" },
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "col-lg-12 col-md-4 col-sm-4 col-10 shadow-box-ag full-height-scroll ",
                                  staticStyle: {
                                    "max-height": "120px",
                                    "overflow-y": "auto",
                                  },
                                },
                                _vm._l(_vm.pops, function (pop) {
                                  return _c("div", [
                                    _c(
                                      "a",
                                      {
                                        staticStyle: { color: "black" },
                                        attrs: {
                                          href: "",
                                          id: "selectpopvalue",
                                        },
                                        on: {
                                          click: function ($event) {
                                            $event.preventDefault()
                                            return _vm.selectdpop(
                                              pop.id,
                                              pop.nem_site,
                                              pop.nombre
                                            )
                                          },
                                        },
                                      },
                                      [
                                        _vm._v(
                                          "\n                                                                    " +
                                            _vm._s(pop.nem_site) +
                                            " " +
                                            _vm._s(pop.nombre) +
                                            "\n                                                                    "
                                        ),
                                        _c("hr", {
                                          staticStyle: { "margin-top": "-1px" },
                                        }),
                                      ]
                                    ),
                                  ])
                                }),
                                0
                              ),
                            ]
                          ),
                        ]),
                        _vm._v(" "),
                        _vm._m(17),
                      ]),
                    ]
                  ),
                ]),
              ]),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "modal-footer",
                  staticStyle: {
                    background: "-webkit-linear-gradient(#ff8ddb ,#bb73e0)",
                    height: "65px",
                  },
                },
                [
                  _c(
                    "button",
                    {
                      staticClass: " btn btn-secondary",
                      staticStyle: {
                        "box-shadow": "0 0px 0px",
                        color: "#191919",
                      },
                      attrs: { type: "button" },
                      on: {
                        click: function ($event) {
                          $event.preventDefault()
                          return _vm.CreateNewFolder.apply(null, arguments)
                        },
                      },
                    },
                    [
                      _vm._v(
                        "\n                            Crear\n                        "
                      ),
                    ]
                  ),
                ]
              ),
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
            "data-backdrop": "static",
            id: "FolderUpdateName",
            role: "dialog",
            tabindex: "-1",
          },
        },
        [
          _c("div", { staticClass: "modal-dialog modal-sm" }, [
            _c("div", { staticClass: "modal-content animated bounceInRight" }, [
              _vm._m(18),
              _vm._v(" "),
              _c("div", { staticClass: "modal-body" }, [
                _c("div", { staticClass: "row" }, [
                  _c(
                    "div",
                    { staticClass: "col-lg-12 col-md-6 col-sm-6 col-12" },
                    [
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", [
                          _vm._v(
                            "\n                                        Nuevo nombre *\n                                    "
                          ),
                        ]),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.nameFolder,
                              expression: "nameFolder",
                            },
                          ],
                          staticClass: "form-control",
                          attrs: { type: "text" },
                          domProps: { value: _vm.nameFolder },
                          on: {
                            input: function ($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.nameFolder = $event.target.value
                            },
                          },
                        }),
                        _vm._v(" "),
                        _vm._m(19),
                      ]),
                    ]
                  ),
                ]),
              ]),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "modal-footer",
                  staticStyle: {
                    background: "-webkit-linear-gradient(#ff8ddb ,#bb73e0)",
                    height: "65px",
                  },
                },
                [
                  _vm.moduloId == 1
                    ? _c(
                        "button",
                        {
                          staticClass: " btn btn-secondary",
                          staticStyle: {
                            "box-shadow": "0 0px 0px",
                            color: "#191919",
                          },
                          attrs: { type: "button" },
                          on: {
                            click: function ($event) {
                              $event.preventDefault()
                              return _vm.NameUpdateFolder.apply(null, arguments)
                            },
                          },
                        },
                        [
                          _vm._v(
                            "\n                            Guardar\n                        "
                          ),
                        ]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _vm.moduloId == 2
                    ? _c(
                        "button",
                        {
                          staticClass: " btn btn-secondary",
                          staticStyle: {
                            "box-shadow": "0 0px 0px",
                            color: "#191919",
                          },
                          attrs: { type: "button" },
                          on: {
                            click: function ($event) {
                              $event.preventDefault()
                              return _vm.NameUpdateFolderShared.apply(
                                null,
                                arguments
                              )
                            },
                          },
                        },
                        [
                          _vm._v(
                            "\n                            Guardar\n                        "
                          ),
                        ]
                      )
                    : _vm._e(),
                ]
              ),
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
            id: "UploadFile",
            role: "dialog",
            tabindex: "-1",
          },
        },
        [
          _c("div", { staticClass: "modal-dialog modal-lg" }, [
            _c("div", { staticClass: "modal-content animated bounceInRight" }, [
              _vm._m(20),
              _vm._v(" "),
              _c("div", { staticClass: "modal-body" }, [
                _c("div", { staticClass: "tickets-list" }, [
                  _c("div", { staticClass: "ticket-item" }, [
                    _c("div", { staticClass: "row" }, [
                      _c(
                        "div",
                        {
                          staticClass: "file-upload",
                          staticStyle: { "margin-top": "-20px" },
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "image-upload-wrap",
                              staticStyle: {
                                height: "100px",
                                border: "4px dashed #f98bdb",
                              },
                            },
                            [
                              _c("input", {
                                ref: "files",
                                staticClass: "file-upload-input",
                                attrs: {
                                  id: "files",
                                  multiple: "",
                                  type: "file",
                                },
                                on: {
                                  change: function ($event) {
                                    return _vm.handleFileUploads()
                                  },
                                },
                              }),
                              _vm._v(" "),
                              _vm._m(21),
                            ]
                          ),
                        ]
                      ),
                    ]),
                    _vm._v(" "),
                    _vm.filesupload.length != 0
                      ? _c(
                          "div",
                          {
                            staticClass: "card",
                            staticStyle: { "border-radius": "5px" },
                          },
                          [
                            _c("div", { staticClass: "card-body" }, [
                              _c(
                                "p",
                                {
                                  staticClass: "barlow semi_bold",
                                  staticStyle: { "text-align": "center" },
                                },
                                [
                                  _vm._v(
                                    "\n                                            " +
                                      _vm._s(
                                        _vm.filesupload.length == 1
                                          ? _vm.filesupload.length +
                                              " " +
                                              "Archivo seleccionado"
                                          : _vm.filesupload.length > 1
                                          ? _vm.filesupload.length +
                                            " " +
                                            "Archivos seleccionados"
                                          : ""
                                      ) +
                                      "\n                                        "
                                  ),
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "ul",
                                { staticClass: "list-unstyled" },
                                [
                                  _vm._l(_vm.filesupload, function (file, key) {
                                    return _c(
                                      "li",
                                      {
                                        staticClass: "media",
                                        staticStyle: { "margin-top": "10px" },
                                      },
                                      [
                                        _c("i", {
                                          staticClass: "fas fa-file mr-3",
                                          class:
                                            _vm.getFileExtension(file.name) ==
                                            "pdf"
                                              ? "far fa-file-pdf"
                                              : _vm.getFileExtension(
                                                  file.name
                                                ) == "xls" ||
                                                _vm.getFileExtension(
                                                  file.name
                                                ) == "xlsx"
                                              ? "far fa-file-excel"
                                              : _vm.getFileExtension(
                                                  file.name
                                                ) == "doc" ||
                                                _vm.getFileExtension(
                                                  file.name
                                                ) == "docx"
                                              ? "far fa-file-word"
                                              : _vm.getFileExtension(
                                                  file.name
                                                ) == "img" ||
                                                _vm.getFileExtension(
                                                  file.name
                                                ) == "jpg" ||
                                                _vm.getFileExtension(
                                                  file.name
                                                ) == "jpeg" ||
                                                _vm.getFileExtension(
                                                  file.name
                                                ) == "png"
                                              ? "far fa-image"
                                              : "far fa-file",
                                          staticStyle: { "font-size": "50px" },
                                        }),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          { staticClass: "media-body" },
                                          [
                                            _c(
                                              "p",
                                              { staticClass: "barlow regular" },
                                              [
                                                _vm._v(
                                                  "\n                                                        " +
                                                    _vm._s(file.name) +
                                                    "\n                                                    "
                                                ),
                                              ]
                                            ),
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "button",
                                          {
                                            staticClass: "btn btn-danger mr-3",
                                            staticStyle: {
                                              "margin-top": "18px",
                                            },
                                            on: {
                                              click: function ($event) {
                                                $event.preventDefault()
                                                return _vm.removeFile(key)
                                              },
                                            },
                                          },
                                          [
                                            _c("i", {
                                              staticClass:
                                                "fas fa-window-close blanco",
                                            }),
                                          ]
                                        ),
                                      ]
                                    )
                                  }),
                                  _vm._v(" "),
                                  _c("hr"),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticStyle: { display: "none" },
                                      attrs: { id: "progressBarFileUpoad" },
                                    },
                                    [
                                      _c(
                                        "div",
                                        {
                                          staticClass: "progress mb-3 ",
                                          attrs: { "data-height": "25" },
                                        },
                                        [
                                          _c(
                                            "div",
                                            {
                                              staticClass:
                                                "progress-bar bg-primary",
                                              style: "width:" + _vm.getProgress,
                                              attrs: {
                                                "aria-valuemax": "100",
                                                "aria-valuemin": "0",
                                                "aria-valuenow": "100",
                                                role: "progressbar",
                                              },
                                            },
                                            [
                                              _vm.getProgress == "NaN%"
                                                ? _c("div")
                                                : _vm._e(),
                                              _vm._v(" "),
                                              _vm.getProgress != "NaN%"
                                                ? _c("div", [
                                                    _vm._v(
                                                      "\n                                                            " +
                                                        _vm._s(
                                                          _vm.getProgress
                                                        ) +
                                                        "\n                                                        "
                                                    ),
                                                  ])
                                                : _vm._e(),
                                            ]
                                          ),
                                        ]
                                      ),
                                    ]
                                  ),
                                ],
                                2
                              ),
                            ]),
                          ]
                        )
                      : _vm._e(),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "card",
                        staticStyle: { display: "none" },
                        attrs: { id: "filesDuplicates" },
                      },
                      [
                        _c(
                          "p",
                          {
                            staticClass: "barlow semi_bold",
                            staticStyle: { "text-align": "center" },
                          },
                          [
                            _vm._v(
                              "\n                                        Archivos duplicados\n                                    "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "card-body" }, [
                          _c(
                            "ul",
                            { staticClass: "list-unstyled" },
                            [
                              _vm._l(
                                _vm.FilesDuplicates,
                                function (FilesDuplicate) {
                                  return _c(
                                    "li",
                                    {
                                      staticClass: "media",
                                      staticStyle: { "margin-top": "10px" },
                                    },
                                    [
                                      _c("i", {
                                        staticClass: "fas fa-file mr-3",
                                        class:
                                          _vm.getFileExtension(
                                            FilesDuplicate.name
                                          ) == "pdf"
                                            ? "far fa-file-pdf"
                                            : _vm.getFileExtension(
                                                FilesDuplicate.name
                                              ) == "xls" ||
                                              _vm.getFileExtension(
                                                FilesDuplicate.name
                                              ) == "xlsx"
                                            ? "far fa-file-excel"
                                            : _vm.getFileExtension(
                                                FilesDuplicate.name
                                              ) == "doc" ||
                                              _vm.getFileExtension(
                                                FilesDuplicate.name
                                              ) == "docx"
                                            ? "far fa-file-word"
                                            : _vm.getFileExtension(
                                                FilesDuplicate.name
                                              ) == "img" ||
                                              _vm.getFileExtension(
                                                FilesDuplicate.name
                                              ) == "jpg" ||
                                              _vm.getFileExtension(
                                                FilesDuplicate.name
                                              ) == "jpeg" ||
                                              _vm.getFileExtension(
                                                FilesDuplicate.name
                                              ) == "png"
                                            ? "far fa-image"
                                            : "far fa-file",
                                        staticStyle: { "font-size": "50px" },
                                      }),
                                      _vm._v(" "),
                                      _c("div", { staticClass: "media-body" }, [
                                        _c(
                                          "p",
                                          { staticClass: "barlow regular" },
                                          [
                                            _vm._v(
                                              "\n                                                        " +
                                                _vm._s(FilesDuplicate.nombre) +
                                                "\n                                                    "
                                            ),
                                          ]
                                        ),
                                      ]),
                                    ]
                                  )
                                }
                              ),
                              _vm._v(" "),
                              _c("hr"),
                            ],
                            2
                          ),
                        ]),
                      ]
                    ),
                  ]),
                ]),
              ]),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "modal-footer",
                  staticStyle: {
                    background: "-webkit-linear-gradient(#ff8ddb ,#bb73e0)",
                    height: "65px",
                  },
                },
                [
                  _c(
                    "button",
                    {
                      staticClass: " btn btn-secondary",
                      staticStyle: {
                        "box-shadow": "0 0px 0px",
                        color: "#191919",
                      },
                      attrs: { id: "btnUploadFiles", type: "button" },
                      on: {
                        click: function ($event) {
                          $event.preventDefault()
                          return _vm.UploadFiles.apply(null, arguments)
                        },
                      },
                    },
                    [
                      _vm._v(
                        "\n                            Subir archivos\n                        "
                      ),
                    ]
                  ),
                ]
              ),
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
            "data-backdrop": "static",
            id: "ShowDocument",
            role: "dialog",
            tabindex: "-1",
          },
        },
        [
          _c(
            "div",
            {
              staticClass: "modal-dialog modal-lg",
              staticStyle: { "max-width": "1500px" },
            },
            [
              _c(
                "div",
                { staticClass: "modal-content animated bounceInRight" },
                [
                  _vm._m(22),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "modal-body",
                      staticStyle: { "background-color": "#e3eaef" },
                    },
                    [
                      _vm.tipeFile == 1
                        ? _c("div", { attrs: { id: "pdf" } }, [
                            _c("iframe", {
                              staticStyle: { width: "100%", height: "1000px" },
                              attrs: { src: _vm.fileShow },
                            }),
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _vm.tipeFile == 2
                        ? _c("div", { attrs: { id: "docx" } }, [
                            _c("iframe", {
                              staticStyle: { width: "100%", height: "100%" },
                              attrs: { src: _vm.fileShow },
                            }),
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _vm.tipeFile == 3
                        ? _c("div", [
                            _c("img", {
                              staticStyle: { width: "100%", height: "100%" },
                              attrs: { src: _vm.fileShow },
                            }),
                          ])
                        : _vm._e(),
                    ]
                  ),
                  _vm._v(" "),
                  _c("div", {
                    staticClass: "modal-footer",
                    staticStyle: {
                      background: "-webkit-linear-gradient(#ff8ddb ,#bb73e0)",
                      height: "65px",
                    },
                  }),
                ]
              ),
            ]
          ),
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "modal inmodal",
          attrs: {
            "aria-hidden": "true",
            "data-backdrop": "static",
            id: "ShareFolder",
            role: "dialog",
            tabindex: "-1",
          },
        },
        [
          _c("div", { staticClass: "modal-dialog " }, [
            _c("div", { staticClass: "modal-content animated bounceInRight" }, [
              _vm._m(23),
              _vm._v(" "),
              _c("div", { staticClass: "modal-body" }, [
                _c("div", { staticClass: "row" }, [
                  _c(
                    "div",
                    { staticClass: "col-lg-9 col-md-6 col-sm-6 col-12" },
                    [
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", [
                          _vm._v(
                            "\n                                        Usuario(s) *\n                                    "
                          ),
                        ]),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.nameUser,
                              expression: "nameUser",
                            },
                          ],
                          staticClass: "form-control",
                          attrs: { id: "InputUser", type: "text", value: "" },
                          domProps: { value: _vm.nameUser },
                          on: {
                            keyup: function ($event) {
                              $event.preventDefault()
                              return _vm.SearchUser.apply(null, arguments)
                            },
                            input: function ($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.nameUser = $event.target.value
                            },
                          },
                        }),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "row",
                            staticStyle: { display: "none" },
                            attrs: { id: "listUsers" },
                          },
                          [
                            _c(
                              "div",
                              {
                                staticClass:
                                  "col-lg-12 col-md-4 col-sm-4 col-10 shadow-box-ag full-height-scroll ",
                                staticStyle: {
                                  "max-height": "120px",
                                  "overflow-y": "auto",
                                },
                              },
                              _vm._l(_vm.users, function (user) {
                                return _c("div", [
                                  _c(
                                    "a",
                                    {
                                      staticStyle: { color: "black" },
                                      attrs: { href: "", id: "selectpopvalue" },
                                      on: {
                                        click: function ($event) {
                                          $event.preventDefault()
                                          return _vm.selectUser(user)
                                        },
                                      },
                                    },
                                    [
                                      _vm._v(
                                        "\n                                                        " +
                                          _vm._s(user.name) +
                                          " " +
                                          _vm._s(user.apellido) +
                                          "\n                                                        "
                                      ),
                                      _c("hr", {
                                        staticStyle: { "margin-top": "-1px" },
                                      }),
                                    ]
                                  ),
                                ])
                              }),
                              0
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _vm._m(24),
                      ]),
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "col-lg-3 col-md-6 col-sm-6 col-12" },
                    [
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", [
                          _vm._v(
                            "\n                                        Permiso *\n                                    "
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
                                value: _vm.permissions,
                                expression: "permissions",
                              },
                            ],
                            staticClass: "form-control",
                            on: {
                              change: [
                                function ($event) {
                                  var $$selectedVal = Array.prototype.filter
                                    .call($event.target.options, function (o) {
                                      return o.selected
                                    })
                                    .map(function (o) {
                                      var val =
                                        "_value" in o ? o._value : o.value
                                      return val
                                    })
                                  _vm.permissions = $event.target.multiple
                                    ? $$selectedVal
                                    : $$selectedVal[0]
                                },
                                function ($event) {
                                  $event.preventDefault()
                                  return _vm.DeleteError.apply(null, arguments)
                                },
                              ],
                            },
                          },
                          [
                            _c(
                              "option",
                              { attrs: { selected: "true", value: "1" } },
                              [
                                _vm._v(
                                  "\n                                            Lector\n                                        "
                                ),
                              ]
                            ),
                            _vm._v(" "),
                            _vm._m(25),
                          ]
                        ),
                        _vm._v(" "),
                        _vm._m(26),
                      ]),
                    ]
                  ),
                  _vm._v(" "),
                  _vm.userSelects.length != 0
                    ? _c("div", { staticClass: "row" }, [
                        _c(
                          "div",
                          { staticClass: "col-lg-12 col-md-6 col-sm-6 col-12" },
                          [
                            _c(
                              "div",
                              { staticClass: "form-inline" },
                              _vm._l(_vm.userSelects, function (userSelect) {
                                return _c("div", [
                                  _c(
                                    "span",
                                    { staticClass: "badge badge-primary" },
                                    [
                                      _vm._v(
                                        "\n                                                " +
                                          _vm._s(userSelect.name) +
                                          " " +
                                          _vm._s(userSelect.apellido) +
                                          "\n                                                "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticStyle: { color: "white" },
                                          attrs: { href: "#" },
                                          on: {
                                            click: function ($event) {
                                              $event.preventDefault()
                                              return _vm.deleUserThisSelect(
                                                userSelect
                                              )
                                            },
                                          },
                                        },
                                        [
                                          _c("i", {
                                            staticClass:
                                              "fas fa-times-circle boxBounce",
                                            staticStyle: {
                                              "font-size": "13px",
                                            },
                                          }),
                                        ]
                                      ),
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("div", {
                                    staticStyle: { "margin-top": "5px" },
                                  }),
                                ])
                              }),
                              0
                            ),
                          ]
                        ),
                      ])
                    : _vm._e(),
                ]),
              ]),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "modal-footer",
                  staticStyle: {
                    background: "-webkit-linear-gradient(#ff8ddb ,#bb73e0)",
                    height: "65px",
                  },
                },
                [
                  _c(
                    "button",
                    {
                      staticClass: " btn btn-secondary",
                      staticStyle: {
                        "box-shadow": "0 0px 0px",
                        color: "#191919",
                      },
                      attrs: { type: "button" },
                      on: {
                        click: function ($event) {
                          $event.preventDefault()
                          return _vm.ShareFolderUsers.apply(null, arguments)
                        },
                      },
                    },
                    [
                      _vm._v(
                        "\n                            Compartir\n                        "
                      ),
                    ]
                  ),
                ]
              ),
            ]),
          ]),
        ]
      ),
    ]),
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
        staticClass: "dropdown-item barlow regular",
        attrs: { "data-toggle": "modal", href: "#FolderAdd" },
      },
      [
        _c("i", { staticClass: "fas fa-plus" }),
        _vm._v(
          "\n                                                        Crear carpeta\n                                                    "
        ),
      ]
    )
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "dropdown-item barlow regular",
        attrs: { "data-toggle": "modal", href: "#FolderAdd2" },
      },
      [
        _c("i", { staticClass: "fas fa-plus" }),
        _vm._v(
          "\n                                                        Crear carpeta\n                                                    "
        ),
      ]
    )
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "dropdown-item barlow regular",
        attrs: { "data-toggle": "modal", href: "#UploadFile" },
      },
      [
        _c("i", { staticClass: "fas fa-upload" }),
        _vm._v(
          "\n                                                        Subir archivos\n                                                    "
        ),
      ]
    )
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group-append" }, [
      _c(
        "div",
        { staticClass: "input-group-text", staticStyle: { height: "35px" } },
        [_c("i", { staticClass: "fas fa-search" })]
      ),
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
      "a",
      {
        staticClass: "font-weight-600 ",
        staticStyle: { color: "#d47dde" },
        attrs: { "data-toggle": "dropdown", href: "#", id: "orders-month" },
      },
      [
        _c("i", {
          staticClass: "fas fa-ellipsis-h boxBounce",
          staticStyle: { "font-size": "28px" },
        }),
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
              _c(
                "div",
                {
                  staticClass: "empty-state-icon",
                  staticStyle: {
                    "background-image": "linear-gradient(#ff8ddb, #bb73e0)",
                  },
                },
                [_c("i", { staticClass: "fas fa-question" })]
              ),
              _vm._v(" "),
              _c("h2", [
                _vm._v(
                  "\n                                                    No se ha encontrado la carpeta o archivo.\n                                                "
                ),
              ]),
              _vm._v(" "),
              _c("p", { staticClass: "lead" }, [
                _vm._v(
                  "\n                                                    Verifique los datos de busqueda.\n                                                "
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
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "ul",
      { staticClass: "nav nav-tabs", attrs: { id: "myTab", role: "tablist" } },
      [
        _c("li", { staticClass: "nav-item" }, [
          _c(
            "a",
            {
              staticClass: "nav-link active barlow regular",
              attrs: {
                "aria-controls": "home",
                "aria-selected": "true",
                "data-toggle": "tab",
                href: "#home",
                id: "home-tab",
                role: "tab",
              },
            },
            [
              _vm._v(
                "\n                                        Detalles\n                                    "
              ),
            ]
          ),
        ]),
        _vm._v(" "),
        _c("li", { staticClass: "nav-item" }, [
          _c(
            "a",
            {
              staticClass: "nav-link barlow regular",
              attrs: {
                "aria-controls": "profile",
                "aria-selected": "false",
                "data-toggle": "tab",
                href: "#profile",
                id: "profile-tab",
                role: "tab",
              },
            },
            [
              _vm._v(
                "\n                                        Actividad\n                                    "
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
    return _c("div", { staticClass: "ticket-title barlow semi_bold" }, [
      _c("h4", { staticStyle: { color: "#6c757d" } }, [
        _vm._v(
          "\n                                                                Creador\n                                                            "
        ),
      ]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "ticket-title barlow semi_bold" }, [
      _c("h4", { staticStyle: { color: "#6c757d" } }, [
        _vm._v(
          "\n                                                                Fecha de creación\n                                                            "
        ),
      ]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "ticket-title barlow semi_bold" }, [
      _c("h4", { staticStyle: { color: "#6c757d" } }, [
        _vm._v(
          "\n                                                                Última modificación\n                                                            "
        ),
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
        staticClass: "modal-header ",
        staticStyle: {
          background: "-webkit-linear-gradient(#ff8ddb ,#bb73e0)",
          height: "70px",
        },
      },
      [
        _c(
          "h5",
          { staticClass: "modal-title", staticStyle: { color: "white" } },
          [
            _vm._v(
              "\n                            Crear Carpeta\n                        "
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
                  "\n                                ×\n                            "
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
      { staticStyle: { display: "none" }, attrs: { id: "errorNombre" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                            Favor indicar un nombre\n                                        "
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
      { staticStyle: { display: "none" }, attrs: { id: "errorPop" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                    Favor Seleccionar el sitio\n                                                "
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
        staticClass: "modal-header ",
        staticStyle: {
          background: "-webkit-linear-gradient(#ff8ddb ,#bb73e0)",
          height: "70px",
        },
      },
      [
        _c(
          "h5",
          { staticClass: "modal-title", staticStyle: { color: "white" } },
          [
            _vm._v(
              "\n                            Crear Carpeta\n                        "
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
                  "\n                                ×\n                            "
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
      { staticStyle: { display: "none" }, attrs: { id: "errorNombre" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                            Favor indicar un nombre\n                                        "
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
      { staticStyle: { display: "none" }, attrs: { id: "errorPop" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                    Favor Seleccionar el sitio\n                                                "
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
        staticClass: "modal-header ",
        staticStyle: {
          background: "-webkit-linear-gradient(#ff8ddb ,#bb73e0)",
          height: "70px",
        },
      },
      [
        _c(
          "h5",
          { staticClass: "modal-title", staticStyle: { color: "white" } },
          [
            _vm._v(
              "\n                            Editar Carpeta\n                        "
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
                  "\n                                ×\n                            "
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
      { staticStyle: { display: "none" }, attrs: { id: "errorNameEdit" } },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                            Favor ingresar un nombre\n                                        "
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
        staticClass: "modal-header ",
        staticStyle: {
          background: "-webkit-linear-gradient(#ff8ddb ,#bb73e0)",
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
              "\n                            Subir archivos\n                        "
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
                  "\n                                ×\n                            "
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
    return _c("div", { staticClass: "drag-text" }, [
      _c("h2", { staticStyle: { "font-size": "28px" } }, [
        _vm._v(
          "\n                                                    Arrastre o selecciones sus archivos.\n                                                "
        ),
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
        staticClass: "modal-header ",
        staticStyle: {
          background: "-webkit-linear-gradient(#ff8ddb ,#bb73e0)",
          height: "70px",
        },
      },
      [
        _c(
          "h5",
          { staticClass: "modal-title", staticStyle: { color: "white" } },
          [
            _vm._v(
              "\n                            Previsualización\n                        "
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
                  "\n                                ×\n                            "
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
        staticClass: "modal-header ",
        staticStyle: {
          background: "-webkit-linear-gradient(#ff8ddb ,#bb73e0)",
          height: "70px",
        },
      },
      [
        _c(
          "h5",
          { staticClass: "modal-title", staticStyle: { color: "white" } },
          [
            _vm._v(
              "\n                            Compartir carpeta\n                        "
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
                  "\n                                ×\n                            "
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
        staticStyle: { display: "none" },
        attrs: { id: "errorCompaprtirUsuario" },
      },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                                Favor seleccionar un usuario\n                                            "
          ),
        ]),
      ]
    )
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("option", { attrs: { value: "2" } }, [
      _vm._v(
        "\n                                            Editor\n                                            "
      ),
      _c("small", [
        _vm._v(
          "\n                                                (añade, elimina y edita)\n                                            "
        ),
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
        staticStyle: { display: "none" },
        attrs: { id: "errorCompaprtirPrivilegios" },
      },
      [
        _c("p", { staticStyle: { color: "red" } }, [
          _vm._v(
            "\n                                            Seleccionar una opción\n                                        "
          ),
        ]),
      ]
    )
  },
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/repositorio/folderAdmin.vue":
/*!*************************************************************!*\
  !*** ./resources/js/components/repositorio/folderAdmin.vue ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _folderAdmin_vue_vue_type_template_id_0051a8ec___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./folderAdmin.vue?vue&type=template&id=0051a8ec& */ "./resources/js/components/repositorio/folderAdmin.vue?vue&type=template&id=0051a8ec&");
/* harmony import */ var _folderAdmin_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./folderAdmin.vue?vue&type=script&lang=js& */ "./resources/js/components/repositorio/folderAdmin.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _folderAdmin_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _folderAdmin_vue_vue_type_template_id_0051a8ec___WEBPACK_IMPORTED_MODULE_0__["render"],
  _folderAdmin_vue_vue_type_template_id_0051a8ec___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/repositorio/folderAdmin.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/repositorio/folderAdmin.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/repositorio/folderAdmin.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_folderAdmin_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./folderAdmin.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/repositorio/folderAdmin.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_folderAdmin_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/repositorio/folderAdmin.vue?vue&type=template&id=0051a8ec&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/repositorio/folderAdmin.vue?vue&type=template&id=0051a8ec& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_folderAdmin_vue_vue_type_template_id_0051a8ec___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./folderAdmin.vue?vue&type=template&id=0051a8ec& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/repositorio/folderAdmin.vue?vue&type=template&id=0051a8ec&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_folderAdmin_vue_vue_type_template_id_0051a8ec___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_folderAdmin_vue_vue_type_template_id_0051a8ec___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
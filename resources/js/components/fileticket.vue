<template>
    <div>
        <form>
            <div aria-hidden="true" class="modal inmodal" id="SubirArchivo" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header"
                            style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                            <h5 class="modal-title barlow semi_bold blanco">
                                Cargar Archivos
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" class="blanco">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="barlow semi_bold">
                                    Tipo Archivo
                                </label>
                                <select @change.prevent="deleteErrorFile" class="form-control" name="tipo_archivo"
                                    v-model="tipo_archivo">
                                    <option v-bind:value="tipoArchivo.COD_TIPO_ARCHIVO"
                                        v-for="tipoArchivo in tipoArchivos">
                                        {{tipoArchivo.TIPO_ARCHIVO}}
                                    </option>
                                </select>
                                <div id="errorTipoArchivpo" style="display:none">
                                    <p style="color:red">
                                        Favor Indicar el tipo de archivo
                                    </p>
                                </div>
                            </div>
                            <div class="form-group" id="textInpu">
                                <label class="barlow semi_bold">
                                    Seleccione o arrastre el archivo
                                </label>
                                <input class="form-control" id="files" multiple="" ref="files" type="file"
                                    v-on:change="handleFileUploads()" />
                                <div id="errorArchivos" style="display:none">
                                    <p style="color:red">
                                        Debe subir al menos un archivo
                                    </p>
                                </div>
                            </div>
                            <div class="card" style="border-radius: 5px;" v-if="files.length != 0">
                                <div class="card-body">
                                    <p class="barlow semi_bold" style="text-align: center">
                                        {{files.length == 1 ? files.length+' '+'Archivo seleccionado' :(files.length > 1
                                        ? files.length +' '+ 'Archivos seleccionados':'')}}
                                    </p>
                                    <ul class="list-unstyled">
                                        <li class="media" style="margin-top: 10px;" v-for="(file, key) in files">
                                            <i :class="getFileExtension(file.name) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(file.name) == 'xls' || getFileExtension(file.name) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(file.name) == 'doc' || getFileExtension(file.name) == 'docx' ? 'far fa-file-word':( getFileExtension(file.name) == 'img' || getFileExtension(file.name) == 'jpg' || getFileExtension(file.name) == 'jpeg' ||  getFileExtension(file.name) == 'png' ? 'far fa-image':'far fa-file')))"
                                                class="fas fa-file mr-3" style="font-size: 50px;">
                                            </i>
                                            <div class="media-body">
                                                <p class="barlow regular">
                                                    {{file.name}}
                                                </p>
                                            </div>
                                            <button @click.prevent="removeFile( key )" class="btn btn-danger mr-3"
                                                style="margin-top: 18px; ">
                                                <i class="fas fa-window-close blanco">
                                                </i>
                                            </button>
                                        </li>
                                        <hr />

                                        <div id="progressBarFileUpoad" style="display: none">
                                            <div class="progress mb-3 " data-height="25">
                                                <div :style="'width:'+ getProgress" aria-valuemax="100"
                                                    aria-valuemin="0" aria-valuenow="100" class="progress-bar bg-info"
                                                    role="progressbar">
                                                    <div v-if=" getProgress == 'NaN%'">
                                                    </div>
                                                    <div v-if=" getProgress != 'NaN%'">
                                                        {{getProgress}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"
                            style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99);">
                            <button @click.prevent="uploadFiles()" id="btn_upload_files"
                                class="btn btn-secondary btn-grey " type="button">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    import EventBus from "./event-bus"


    export default {
        props: ['idticket'],
        data() {
            return {
                tipo_archivo: '',
                tipoArchivos: [],
                files: [],
                porcentaje: {
                    type: Number,
                    default: 0
                },
                extensions:[]


            }
        },
        computed: {
            getProgress() {
                return Math.round(this.porcentaje) + '%'
            }
        },


        created: function () {



            this.getTypeFiles();
            this.getExtensions();

        },
        mounted: function () { /* Agrega mounted y con el siguiente contenido */

        },
        methods: {
            getExtensions() {
                axios.get('/repositorio/extensions').then((response) => {
                    this.extensions = response.data;
                })
            },
            getTypeFiles: function () {
                axios.get('/getTipoArchivos').then((response) => {
                    this.tipoArchivos = response.data;
                })
            },
            removeFile(key) {
                this.files.splice(key, 1);
            },
            deleteErrorFile: function () {
                if (this.tipo_archivo != '') {
                    document.getElementById("errorTipoArchivpo").style.display = "none";
                }
            },
            toastFunction: function () {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 6500,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    type: 'success',
                    title: 'Archivo(s) cargado(s) correctamente.'
                })
            },
            loadFunction: function () {
                let loader = this.$loading.show({
                    // Optional parameters
                    container: this.fullPage ? null : this.$refs.formContainer,
                    canCancel: true,
                    onCancel: this.onCancel,
                });
                // simulate AJAX
                setTimeout(() => {
                    loader.hide()
                }, 400)
            },
            uploadFiles: function () {
                if (this.tipo_archivo == '') {
                    document.getElementById("errorTipoArchivpo").style.display = "";

                }
                if (this.files.length == 0) {
                    document.getElementById("errorArchivos").style.display = "";
                }

                if (this.files.length != 0 && this.tipo_archivo != '') {
                    document.getElementById("btn_upload_files").disabled = true;
                    let formData = new FormData();

                    for (var i = 0; i < this.files.length; i++) {
                        let file = this.files[i];


                        formData.append('files[' + i + ']', file);
                    }
                    formData.append('tipo_archivo', this.tipo_archivo);


                    document.getElementById("progressBarFileUpoad").style.display = 'block';
                    axios.post('/subidaArchivo/' + this.$route.params.id, formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            },
                            onUploadProgress: e => {
                                if (e.lengthComputable) {

                                    this.porcentaje = (e.loaded / e.total) * 100

                                }
                            }
                        }).then((response) => {
                            EventBus.$emit('archivosTick.load');
                            $('#SubirArchivo').modal('hide');

                            this.toastFunction();
                            this.files = [];
                            this.tipo_archivo = '';
                            $("#files").val('');
                            this.loadFunction();
                            document.getElementById("btn_upload_files").disabled = false;
                        })
                }


            },
            handleFileUploads: function () {
                let uploadedFiles = this.$refs.files.files;
                for (var i = 0; i < uploadedFiles.length; i++) {

                    let file = uploadedFiles[i];
                    let file_extension = file.name.split(".").pop()
                    let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                    if (extension_permited) {
                        this.files.push(uploadedFiles[i]);
                    }
                }
                document.getElementById("errorArchivos").style.display = "none";
            },
            getFileExtension: function (filename) {
                return (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename)[0] : undefined;
            },
        }
    }
</script>
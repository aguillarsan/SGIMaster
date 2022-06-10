<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="UploadFiles" role="dialog"
            tabindex="-1">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header"
                        style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Subir archivos
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>
                                Tipo de archivo*
                            </label>
                            <select class="form-control select" v-model="tipo_archivo_id">
                                <option v-bind:value="tipo.COD_TIPO_ARCHIVO" v-for="tipo in tipo_archivos">
                                    {{tipo.TIPO_ARCHIVO}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                Archivo(s)*
                            </label>
                            <input @change.prevent="ShowFiles" class="form-control" id="archivosUpload" multiple="true"
                                name="" ref="archivosUpload" type="file">
                            </input>
                        </div>
                        <div class="file-listing " v-for="(file, key) in files_upload">
                            <div>
                                <div style="margin-top: 8px;">
                                </div>
                                <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                    {{ file.name }}
                                    <a href="#" v-on:click="removeFiles( key )">
                                        <i class="fas fa-times-circle boxBounce" style="color:white">
                                        </i>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6 col-12" id="DivLoadFiles" style="display: none">
                            <label class="modal-title">
                                Subiendo archivos...
                            </label>
                            <div class="progress mb-3" data-height="25">
                                <div :style="'width:'+ getProgress" aria-valuemax="100" aria-valuemin="0"
                                    aria-valuenow="100" class="progress-bar" role="progressbar">
                                    <div v-if=" getProgress == 'NaN%'">
                                    </div>
                                    <div v-if=" getProgress != 'NaN%'">
                                        {{getProgress}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="UploadFilesRequest" class="btn btn-info " href="#" id="btnUpladFiles"
                            style="color:white">
                            Aceptar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    import EventBus from "../event-bus"


    export default {
        data() {
            return {
                archivos: [],
                tipo_archivos: [],
                tipo_archivo_id: '',
                files_upload: [],

                solicitud_id: '',
                porcentaje: {
                    type: Number,
                    default: 0
                },




            }
        },
        computed: {
            getProgress() {
                return Math.round(this.porcentaje) + '%'
            }
        },

        created: function () {

            this.GetTypeFiles()
            this.getExtensions()


        },
        mounted: function () { /* Agrega mounted y con el siguiente contenido */
            let self = this;
            EventBus.$on('sgc.modalUploadFiles', function (solicitud) {



                self.ShowModal(solicitud); // ejecutas el metodo que desees

            });


        },
        methods: {
            getExtensions() {
                axios.get('/repositorio/extensions').then((response) => {
                    this.extensions = response.data;
                })
            },
            ShowModal: function (solicitud) {
                this.solicitud_id = solicitud
                this.descripcion_old = solicitud.descripcion
                $('#UploadFiles').modal('show');
            },
            GetTypeFiles: function () {
                axios.get('/getTipoArchivos').then((response) => {
                    this.tipo_archivos = response.data
                })
            },


            UploadFilesRequest: function () {
                if (this.tipo_archivo_id != '' && this.files_upload.length != 0) {
                    EventBus.$emit('sgc.load_tab_files')
                    let formData = new FormData();

                    for (var i = 0; i < this.files_upload.length; i++) {
                        let file = this.files_upload[i];
                        formData.append('files[' + i + ']', file);
                    }
                    formData.append('solicitud_id', this.solicitud_id)
                    formData.append('tipo_archivo_id', this.tipo_archivo_id)
                    document.getElementById("btnUpladFiles").disabled = 'true'
                    document.getElementById("DivLoadFiles").style.display = 'block'


                    axios.post(`/UploadFilesSgc`, formData,
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

                            $('#UploadFiles').modal('hide');
                            this.toastfunction()
                            this.tipo_archivo_id = ''
                            this.files_upload = []
                            EventBus.$emit('sgc.RefrheshFiles')
                            document.getElementById("btnUpladFiles").disabled = 'false'
                            document.getElementById("DivLoadFiles").style.display = 'none'

                        }).finally(() => EventBus.$emit('sgc.finalizar_load_data'))
                } else {
                    if (this.tipo_archivo_id == '') {
                        this.$swal({
                            type: 'error',
                            title: 'Debes seleccionar el tipo de archivo.',
                            showCloseButton: true,
                        });
                    } else {
                        if (this.files_upload.length == 0) {
                            this.$swal({
                                type: 'error',
                                title: 'Debes cargar al menos un archivo.',
                                showCloseButton: true,
                            });
                        }
                    }
                }
            },

            ShowFiles: function (e) {
                let uploadedFiles = this.$refs.archivosUpload.files;
                for (var i = 0; i < uploadedFiles.length; i++) {

                    let file = uploadedFiles[i];
                    let file_extension = file.name.split(".").pop()
                    let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                    if (extension_permited) {
                        this.files_upload.push(uploadedFiles[i]);
                    }
                }


            },
            removeFiles(key) {
                this.files_upload.splice(key, 1);
                $("#archivosUpload").val('');
            },

            toastfunction: function () {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,

                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    type: 'success',
                    title: 'Archivo(s) cargado(s)'
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
                }, 300)
            },


        },


    }
</script>
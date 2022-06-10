<template>
    <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="formCnt" role="dialog" tabindex="-1">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header"
                    style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                    <h5 class="modal-title barlow bold" style="color: white">
                        Formulario
                    </h5>
                    <button aria-label="Close" @click="CleandForm" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true" style="color: white">
                            ×
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-12 col-lg-8 offset-lg-2">
                            <div class="wizard-steps">
                                <div class="wizard-step " v-bind:class="step == 1 ?'wizard-step-active':''">
                                    <div class="wizard-step-icon">
                                        <i class="fas fa-ticket-alt">
                                        </i>
                                    </div>
                                    <div class="wizard-step-label barlow semi_bold">
                                        Datos del ticket
                                    </div>
                                </div>
                                <div class="wizard-step" v-bind:class="step == 2 ?'wizard-step-active':''">
                                    <div class="wizard-step-icon">
                                        <i class="fas fa-file-upload">
                                        </i>
                                    </div>
                                    <div class="wizard-step-label barlow semi_bold">
                                        Archivos
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="wizard-content mt-2">
                        <div class="wizard-pane">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12" v-if="step == 1">
                                    <div class="form-group ">
                                        <label class="barlow semi_bold">
                                            Sitio
                                        </label>
                                        <div id="site_select" v-if="site_data">
                                            <div class="input-group">
                                                <input class="form-control" disabled="true" name=""
                                                    style="background-color:#015dff;color:white;" type=""
                                                    v-bind:value="site_data" />
                                                <div class="input-group-append">
                                                    <div @click.prevent="changeSite()" class="input-group-text "
                                                        style="cursor: pointer  ">
                                                        <i class="fas fa-times boxBounce text_red"
                                                            style="font-size: 18px">
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="site_data == '' ">
                                            <div class="input-group">
                                                <input class="form-control" name="siteName" placeholder="Buscar Sitio"
                                                    style="position: relative;" id="siteInput" type="text"
                                                    v-model="site" @keyup="searchSite" value="" />
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-search">
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="listPops" v-if="sites.length != 0">
                                            <div class="s_l">
                                                <div :style="'width:'+input_width_form+'px'+';'"
                                                    class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                                    <div v-for="site in sites">
                                                        <a @click.prevent="selectSite(site)" href="" class="text_black">
                                                            {{site.nem_site}} {{site.nombre}}
                                                            <hr style="margin-top: -1px;" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="errors.site">
                                            <p class="text_red">
                                                Favor seleccionar un sitio
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="barlow semi_bold">
                                            Motivo *
                                        </label>
                                        <select class="form-control select barlow regular" id="motivo" name="motivo"
                                            v-model="formInput.motivo_id">
                                            <option :value="motivo.id" v-for="motivo in tipo_motivos">
                                                {{motivo.nombre}}
                                            </option>

                                        </select>
                                        <div v-if="errors.motivo">
                                            <p class="text_red">
                                                Favor seleccionar el Motivo
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group" v-if="formInput.motivo_id == 3">
                                        <label class="barlow semi_bold">
                                            Tipo mantención *
                                        </label>
                                        <select class="form-control select barlow regular" name="mantencion"
                                            v-model="formInput.tipo_mantencion_id">
                                            <option v-bind:value="mantencion.id"
                                                v-for="mantencion in tipo_mantenciones">
                                                {{mantencion.name}}
                                            </option>
                                        </select>
                                        <div v-if="errors.tipo_mantencion">
                                            <p class="text_red">
                                                Favor seleccionar el Tipo de mantención
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="barlow semi_bold">
                                            Descripción*
                                        </label>
                                        <textarea class="form-control" placeholder=""
                                            style="width: 100%; height: 100px;" v-model="formInput.descripcion">
                                        </textarea>
                                        <div v-if="errors.descripcion">
                                            <p class="text_red">
                                                Favor indicar una descripción
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12" v-if="step == 1">
                                    <div class="form-group">
                                        <label class="barlow semi_bold">
                                            Área *
                                        </label>
                                        <select class="form-control select barlow regular" id="areas" name="area"
                                            v-model="formInput.area_id" v-on:change="getTecnica">
                                            <option v-bind:value="area.id" v-for="area in areas">
                                                {{area.descripcion}}
                                            </option>
                                        </select>
                                        <div v-if="errors.area ">
                                            <p class="text_red">
                                                Favor seleccionar el área
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="barlow semi_bold">
                                            Técnica *
                                        </label>
                                        <select class="form-control select barlow regular " id="tecnicas" name="tecnica"
                                            v-model="formInput.tecnica_id" @change="getEquipo">
                                            <option v-bind:value="tecnica.id" v-for="tecnica in tecnicas">
                                                {{tecnica.descripcion}}
                                            </option>
                                        </select>
                                        <div v-if="errors.tecnica ">
                                            <p class="text_red">
                                                Favor seleccionar la Tecnia
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="barlow semi_bold">
                                            Equipos *
                                        </label>
                                        <select class="form-control select barlow regular"
                                            v-model="formInput.equipo_id">
                                            <option v-bind:value="equipo.id" v-for="equipo in equipos">
                                                {{equipo.descripcion}}
                                            </option>
                                        </select>
                                        <div v-if="errors.equipo ">
                                            <p class="text_red">
                                                Favor seleccionar el equipo
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12" v-if="step == 2">
                                    <div>
                                        <div class="image-upload-wrap">
                                            <input class="file-upload-input" id="cotizaciones" multiple=""
                                                ref="cotizaciones" type="file" v-on:change="getCotizaciones()" />
                                            <div class="drag-text">
                                                <h2 style="font-size: 20px;" class="barlow semi_bold">
                                                    Cotizaciones

                                                </h2>
                                            </div>
                                        </div>

                                        <div class="row tck_suport mt-2" v-if="formInput.cotizaciones.length != 0">
                                            <div class="col-lg-3 text-center"
                                                v-for="(file,key) in formInput.cotizaciones">
                                                <div class="browser " :title="file.name"> <i style="font-size:55px"
                                                        :class="typeFile(file.name)"></i></div>
                                                <div class="mt-2 barlow regular">{{shortName(file.name)}}</div>
                                                <div class="text-muted text-small">
                                                    <a href="#" @click="deleteFile(key,1)"><i
                                                            class="fa fa-trash text_red" style="font-size:15px"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <div class="image-upload-wrap">
                                            <input class="file-upload-input" id="validacionCompras" multiple=""
                                                ref="validacionCompras" type="file"
                                                v-on:change="getValidacionCompras()" />
                                            <div class="drag-text">
                                                <h2 style="font-size: 20px;" class="barlow semi_bold">
                                                    Validación de compras

                                                </h2>
                                            </div>
                                        </div>
                                        <div class="row tck_suport mt-2"
                                            v-if="formInput.validacion_compras.length != 0">
                                            <div class="col-lg-3 text-center"
                                                v-for="(file,key) in formInput.validacion_compras">
                                                <div class="browser " :title="file.name"> <i style="font-size:55px"
                                                        :class="typeFile(file.name)"></i></div>
                                                <div class="mt-2 barlow regular">{{shortName(file.name)}}</div>
                                                <div class="text-muted text-small">
                                                    <a href="#" @click="deleteFile(key,2)"><i
                                                            class="fa fa-trash text_red" style="font-size:15px"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99);">
                    <button @click="nextStep" class="btn btn-secondary btn-grey" v-if="step == 1">
                        Siguiente
                        <i class="fas fa-angle-right"></i>
                    </button>
                    <button @click="BackStep" class="btn btn-secondary btn-grey" v-if="step == 2">
                        <i class="fas fa-angle-left"></i>
                        Atrás

                    </button>
                    <button class="btn btn-success btn-grey" @click="crateTicket" v-if="step == 2">
                        Crear Ticket
                    </button>

                </div>
            </div>

        </div>
    </div>

</template>

<script>
    import axios from 'axios';
    import EventBus from "../event-bus"
    export default {
        data() {
            return {
                step: 1,
                site_data: "",
                site: "",
                sites: [],
                input_width_form: "",
                tipo_motivos: [

                    { id: 3, nombre: 'Mantenimiento' },
                    { id: 9, nombre: 'Degradación' },
                    { id: 11, nombre: 'Recurrente anual' },

                ],
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
                tipo_mantenciones: [{ id: 3, name: 'Correctiva' }, { id: 4, name: 'Preventiva' }],
                errors: {
                    site: false,
                    motivo: false,
                    descripcion: false,
                    area: false,
                    tecnica: false,
                    equipo: false,
                    tipo_mantencion: false
                },


                formData: new FormData,
                extensions: []


            }
        },
        mounted: function () {
            let self = this;
            EventBus.$on('get-data-form-cnt', function () {
                self.getDataArea();
            });
            this.getExtensions()
        },
        computed: {

        },
        watch: {
            'formInput.site_id'(v, b) {
                if (this.formInput.site_id) {
                    this.errors.site = false
                }
            },
            'formInput.motivo_id'(v, b) {
                if (this.formInput.motivo_id) {
                    this.errors.motivo = false
                }
            },
            'formInput.tipo_mantencion_id'(v, b) {
                if (this.formInput.tipo_mantencion_id) {
                    this.errors.tipo_mantencion = false
                }
            },
            'formInput.descripcion'(v, b) {
                if (this.formInput.descripcion) {
                    this.errors.descripcion = false
                }
            },
            'formInput.area_id'(v, b) {
                if (this.formInput.area_id) {
                    this.errors.area = false
                }
            },
            'formInput.tecnica_id'(v, b) {
                if (this.formInput.tecnica_id) {
                    this.errors.tecnica = false
                }
            },
            'formInput.equipo_id'(v, b) {
                if (this.formInput.equipo_id) {
                    this.errors.equipo = false
                }
            },
        },


        methods: {
            changeSite() {

                this.site_data = ""
                this.formInput.site_id = ""
            },
            getExtensions() {
                axios.get('/repositorio/extensions').then((response) => {
                    this.extensions = response.data;
                })
            },
            searchSite() {

                if (this.site.length >= 3) {

                    this.input_width_form = document.getElementById("siteInput").clientWidth;

                    axios.get(`/GetPop?datositio=${this.site}`).then((response) => {
                        this.sites = response.data
                    });

                } else {

                    this.sites = '';
                }
            },
            selectSite(site) {

                this.site = ''
                this.sites = ''
                this.site_data = site.nombre + ' ' + site.nem_site

                this.formInput.site_id = site.id

            },
            getDataArea() {

                axios.get('/Getarea').then(response => {
                    this.areas = response.data
                })

            },
            getTecnica() {
                this.formInput.tecnica_id = null
                axios.get('/GetTecnica/' + this.formInput.area_id).then(response => {
                    this.tecnicas = response.data
                })
            },
            getEquipo() {
                this.formInput.equipo_id = null
                axios.get('/GetEquipo/' + this.formInput.tecnica_id).then(response => {
                    this.equipos = response.data
                })
            },
            nextStep() {
                this.validateFormStepOne()
                if (this.formInput.motivo_id == 3) {
                    if (this.formInput.site_id && this.formInput.motivo_id && this.formInput.tipo_mantencion_id && this.formInput.descripcion && this.formInput.area_id && this.formInput.tecnica_id &&
                        this.formInput.equipo_id) {
                        this.step = 2

                    }
                } else if (this.formInput.site_id && this.formInput.motivo_id && this.formInput.descripcion && this.formInput.area_id && this.formInput.tecnica_id &&
                    this.formInput.equipo_id) {
                    this.formInput.tipo_mantencion_id = null
                    this.step = 2
                }

            },
            crateTicket() {

                this.formData.append('site_id', this.formInput.site_id);
                this.formData.append('tipo_motivo_id', this.formInput.motivo_id);
                this.formData.append('tipo_mantencion_id', this.formInput.tipo_mantencion_id != null ? this.formInput.tipo_mantencion_id : '');
                this.formData.append('descripcion', this.formInput.descripcion);
                this.formData.append('area_id', this.formInput.area_id);
                this.formData.append('tecnica_id', this.formInput.tecnica_id);
                this.formData.append('equipo_id', this.formInput.equipo_id);
                this.formData.append('estado_id', 1);

                for (var i = 0; i < this.formInput.cotizaciones.length; i++) {

                    let cotizacion = this.formInput.cotizaciones[i];
                    this.formData.append('cotizacion[' + i + ']', cotizacion);
                }
                for (var i = 0; i < this.formInput.validacion_compras.length; i++) {

                    let validacion_compras = this.formInput.validacion_compras[i];
                    this.formData.append('validacion_compra[' + i + ']', validacion_compras);
                }

                axios.post('/create/ticket/cnt', this.formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: e => {
                        if (e.lengthComputable) {
                            this.porcentaje = (e.loaded / e.total) * 100
                        }
                    }
                }).then(response => {
                    $('#formCnt').modal('hide');
                    this.AlertFunction('success', 'Éxito', response.data);
                    this.CleandForm();
                    EventBus.$emit('ticket.created');
                }).catch(
                    error => {
                        $('#formCnt').modal('hide');
                        this.AlertFunction('error', 'Error', 'Se produjo un error al crear el ticket, favor contactarse con soporte');
                        this.CleandForm();

                    });


            },
            validateFormStepOne() {
                if (!this.formInput.site_id) {
                    this.errors.site = true
                }
                if (!this.formInput.motivo_id) {
                    this.errors.motivo = true
                }
                if (this.formInput.motivo_id == 3) {
                    if (!this.formInput.tipo_mantencion_id) {
                        this.errors.tipo_mantencion = true
                    }
                }
                if (!this.formInput.descripcion) {
                    this.errors.descripcion = true
                }
                if (!this.formInput.area_id) {
                    this.errors.area = true
                }
                if (!this.formInput.tecnica_id) {
                    this.errors.tecnica = true
                }
                if (!this.formInput.equipo_id) {
                    this.errors.equipo = true
                }
            },
            BackStep() {
                this.step = 1
            },
            getCotizaciones() {
                let files = this.$refs.cotizaciones.files;

                for (var i = 0; i < files.length; i++) {

                    let file = files[i];
                    let file_extension = file.name.split(".").pop()
                    let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                    if (extension_permited) {
                        this.formInput.cotizaciones.push(files[i]);
                    }
                }
            },
            getValidacionCompras() {
                let files = this.$refs.validacionCompras.files;
                for (var i = 0; i < files.length; i++) {

                    let file = files[i];
                    let file_extension = file.name.split(".").pop()
                    let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                    if (extension_permited) {
                        this.formInput.validacion_compras.push(files[i]);
                    }
                }
            },
            typeFile(file) {
                let type = file.split(".").pop()
                if (type == "xlsx" || type == "xls" || type == "xlm") {
                    return "fas fa-file-excel"

                } else if (type == "png" || type == "jpg" || type == "jpeg") {
                    return "fas fa-file-image"
                } else if (type == "pdf" || type == "PDF") {
                    return "fas fa-file-pdf"
                } else {
                    return "fas fa-file"
                }
            },
            shortName(name) {
                if (name.length > 14) {
                    let short_name = name.substr(0, 12) + '...';
                    return short_name;
                } else {
                    let short_name = name;
                    return short_name;
                }
            },
            deleteFile(key, type_file) {
                if (type_file == 1) {
                    this.formInput.cotizaciones.splice(key, 1)
                } else if (type_file == 2) {
                    this.formInput.validacion_compras.splice(key, 1)
                }
            },

            AlertFunction: function (Type, Title, Message) {

                Swal.fire({
                    type: Type,
                    title: Title,
                    text: Message,
                })


            },

            CleandForm() {
                this.changeSite()
                this.step = 1;
                this.formInput.motivo_id = null,
                    this.formInput.site_id = null,
                    this.formInput.tipo_mantencion_id = null,
                    this.formInput.descripcion = null,
                    this.formInput.area_id = null,
                    this.formInput.tecnica_id = null,
                    this.formInput.equipo_id = null,
                    this.formInput.cotizaciones = [],
                    this.formInput.validacion_compras = []

            }

        }
    }
</script>
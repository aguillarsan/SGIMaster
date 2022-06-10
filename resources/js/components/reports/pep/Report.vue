<template>
    <div class="main-content">
        <div class="wrapper wrapper-content">
            <section class="section">
                <div class="section-header shadow-box-ag">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6 col-12 ">
                            <div class="card-stats-title">
                                <h1 class="barlow semi_bold">
                                    Reportes {{current_tab ? '/ '+ current_tab.name:''}}
                                </h1>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <a type="hidden" :href="document_url" id="download_document"></a>
            <input hidden="true" @change="uploadFle" id="file" name="file" type="file" value="" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-lg-12">
                                <div style="    align-items: center;
                                display: flex;
                                justify-content: center;color:#191919">
                                    <h3 class="barlow semi_bold">Seleccione una opción</h3>
                                </div>
                                <ul class="nav nav-pills" style="    align-items: center;
                                display: flex;
                                justify-content: center; margin-top:10px;">
                                    <a v-for="tab in tabs" @click="selectTab(tab)"
                                        :style="current_tab != null && current_tab.id == tab.id ? 'background: #005CFF;color:white':''"
                                        style="margin-left:10px; border-radius: 5px;font-size:16px" href="#"
                                        class="btn btn-outline-primary btn-lg barlow regular">{{tab.name}}</a>



                                </ul>
                            </div>
                        </div>
                        <div id="data_report" v-if="tab != 8">
                            <div class="card-header" v-if="current_tab">
                                <div class="col-lg-12">


                                    <div class="dropdown d-inline">
                                        <a class="font-weight-600 dropdown-toggle barlow bold" data-toggle="dropdown"
                                            href="#" id="orders-month">
                                            Opciones
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-sm">
                                            <li class="dropdown-title barlow semi_bold">
                                                Selecione una opción
                                            </li>
                                            <li v-for="options in options_tab_select">

                                                <a href="#" @click="selecOption(options)"
                                                    class="dropdown-item barlow regular">
                                                    <i :class="options.class">
                                                    </i>
                                                    {{options.name}}
                                                </a>
                                            </li>

                                        </ul>
                                    </div>

                                </div>


                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped" v-if="!load">
                                        <thead>
                                            <tr>
                                                <th v-for="head in data_head " class="barlow bold">{{head.name_head}}
                                                </th>

                                            </tr>

                                        </thead>
                                        <tbody v-if="current_tab  != null && current_tab.id == 1">
                                            <tr v-for="data in data_t_body.data">
                                                <td v-text="data.pep"></td>
                                                <td v-text="data.pop"></td>
                                                <td v-text="dateFormat(data.date_extreme_start)"></td>
                                                <td v-text="dateFormat(data.date_extreme_finish)"></td>
                                                <td> {{ data.estimate ? '$'+moneyFormat(data.estimate):''}}</td>
                                                <td v-text="data.responsible"></td>
                                                <td v-text="data.status"></td>
                                            </tr>


                                        </tbody>
                                        <tbody v-if="current_tab  != null && current_tab.id == 2">
                                            <tr v-for="data in data_t_body.data">
                                                <td v-text="data.pep"></td>
                                                <td v-text="data.store ? '$'+moneyFormat(data.store):'' "></td>
                                                <td v-text="data.services ? '$'+moneyFormat(data.services):'' "></td>
                                                <td v-text="data.activation ? '$'+moneyFormat(data.activation):'' ">
                                                </td>
                                                <td
                                                    v-text="data.total_general ? '$'+moneyFormat(data.total_general):'' ">
                                                </td>
                                                <td v-text="data.q_batery ? moneyFormat(data.q_batery):'' "></td>
                                            </tr>


                                        </tbody>
                                        <tbody v-if="current_tab  != null && current_tab.id == 3">
                                            <tr v-for="data in data_t_body.data">
                                                <td v-text="data.pep"></td>
                                                <td v-text="data.pop"></td>
                                                <td v-text="data.estimate ? '$'+ moneyFormat(data.estimate):'' "></td>
                                                <td v-text="data.real ? '$'+ moneyFormat(data.real):'' "></td>
                                                <td v-text="data.committed ? '$'+ moneyFormat(data.committed):'' "></td>
                                                <td
                                                    v-text="data.plan_res_ord ? '$'+ moneyFormat(data.plan_res_ord):'' ">
                                                </td>
                                                <td v-text="data.disposed ? '$'+ moneyFormat(data.disposed):'' "></td>
                                                <td v-text="data.available ? '$'+ moneyFormat(data.available):'' "></td>


                                            </tr>


                                        </tbody>
                                        <tbody v-if="current_tab  != null && current_tab.id == 4">
                                            <tr v-for="data in data_t_body.data">
                                                <td v-text="data.pep"></td>

                                                <td v-text="data.bateria ? '$'+ moneyFormat(data.bateria):'' "></td>
                                                <td v-text="data.q_baterias"></td>
                                                <td v-text="data.teams ? '$'+ moneyFormat(data.teams):'' "></td>
                                                <td
                                                    v-text="data.total_bodega ? '$'+ moneyFormat(data.total_bodega):'' ">
                                                </td>
                                                <td
                                                    v-text="data.total_servicio ? '$'+ moneyFormat(data.total_servicio):'' ">
                                                </td>
                                                <td
                                                    v-text="data.total_activacion ? '$'+ moneyFormat(data.total_activacion):'' ">
                                                </td>
                                                <td
                                                    v-text="data.inversion_total_aperturada ? '$'+ moneyFormat(data.inversion_total_aperturada):'' ">
                                                </td>


                                            </tr>


                                        </tbody>
                                        <tbody v-if="current_tab  != null && current_tab.id == 5">
                                            <tr v-for="data in data_t_body.data">
                                                <td v-text="data.ework_id"></td>
                                                <td v-text="data.nombre_solicitud"></td>
                                                <td v-text="data.estado_solicitud"></td>
                                                <td v-text="data.nombre_solicitante"></td>
                                                <td v-text="data.unidad_solicitante"></td>
                                                <td v-text="data.usuario"></td>
                                                <td v-text="data.activo_siniestrado"></td>

                                                <td v-text="data.fecha_siniestro"></td>
                                                <td v-text="data.lugar"></td>
                                                <td v-text="data.tipo_evento"></td>
                                                <td v-text="data.pep"></td>
                                                <td v-text="data.nro_denuncia"></td>
                                                <td v-text="data.total_reporte"></td>
                                                <td v-text="data.valor_recuperado_seguro"></td>
                                                <td v-text="data.tipo_sitio"></td>
                                                <td v-text="data.pxq_completo"></td>
                                                <td v-text="data.boleta_red"></td>
                                                <td v-text="data.id_reza"></td>
                                                <td v-text="data.tipo_flujo"></td>
                                                <td v-text="data.nombre_actividad"></td>
                                                <td v-text="data.fecha_habilitacion"></td>
                                                <td v-text="data.unidad_ejecutora"></td>



                                            </tr>


                                        </tbody>
                                        <tbody v-if="current_tab  != null && current_tab.id == 6">
                                            <tr v-for="data in data_t_body.data">
                                                <td v-text="data.pep"></td>
                                                <td v-text="data.total_oc_sin_facturar">
                                                </td>
                                                <td v-text="data.cuenta_doc_compras"></td>




                                            </tr>


                                        </tbody>
                                        <tbody v-if="current_tab  != null && current_tab.id == 7">
                                            <tr v-for="data in data_t_body.data">
                                                <td v-text="data.pep"></td>
                                                <td v-text="data.material">
                                                </td>
                                                <td v-text="data.descripcion_material"></td>
                                                <td v-text="data.valor_mon_so_co"></td>
                                                <td v-text="data.sum_total_red"></td>






                                            </tr>


                                        </tbody>
                                    </table>
                                    <div class="col-12 col-md-12 col-sm-12" v-if="load">
                                        <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                            <div class="card-body">
                                                <div class="empty-state" data-height="400">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="spinner-border text-primary" role="status"
                                                            style="width: 8rem;height: 8rem;color: #007bff!important;">
                                                            <span class="sr-only" style="color: #191919">
                                                                Cargando...
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top: 30px;" v-if="data_t_body != null">
                                        <nav aria-label="pagination" class="pagination" role="navigation">
                                            <vue-pagination :offset="4" :pagination="data_t_body"
                                                @paginate="paginateData()">
                                            </vue-pagination>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="data_report" v-if="tab == 8">
                            <base_reporte></base_reporte>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    import BaseReporte from './BaseReporte.vue';
    import VuePagination from '../Pagination.vue';
    export default {
        components: {

            'vue-pagination': VuePagination,

            base_reporte: () => import(/* webpackChunkName: "chunks/reports/pep/BaseReporte"*/'./BaseReporte'),




        },
        data() {
            return {
                current_tab: null,
                load: false,
                tabs: [
                    { id: 1, name: 'DD SAP', url: '/dd/sap/data' },
                    { id: 2, name: 'Inf. Apertura SAP', url: '/opening/report/data' },
                    { id: 3, name: 'SAP', url: '' },
                    { id: 4, name: 'Detalle PPTO', url: '' },
                    { id: 5, name: 'Ework', url: '' },
                    { id: 6, name: 'OC sin facturar', url: '' },
                    { id: 7, name: 'Baterías en estado 11', url: '' },
                    { id: 8, name: 'Consolidado', url: '' },
                ],
                data_head: null,
                data_t_body: {
                    'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0

                },
                options_tab: [

                    { id: 1, name: 'Importar Excel', class: 'fas fa-upload', metod: 1 },
                    { id: 1, name: 'Formato Excel', class: 'fas fa-download', metod: 2, rute_file: 'Formatos_reporte/formato_dd_sap.xlsx', name_file: 'formato_dd_sap.xlsx' },
                    { id: 2, name: 'Importar Excel', class: 'fas fa-upload', metod: 1 },
                    { id: 3, name: 'Importal Excel', class: 'fas fa-upload', metod: 1 },
                    { id: 3, name: "Formato Excel", class: 'fas fa-download', metod: 2, rute_file: 'Formatos_reporte/formato_sap.xlsx', name_file: 'formato_sap.xlsx' },
                    { id: 4, name: 'Importal Excel', class: 'fas fa-upload', metod: 1 },
                    { id: 5, name: 'Importal Excel', class: 'fas fa-upload', metod: 1 },
                    { id: 6, name: 'Importal Excel', class: 'fas fa-upload', metod: 1 },
                    { id: 7, name: 'Importal Excel', class: 'fas fa-upload', metod: 1 },
                    { id: 7, name: 'Formato Excel', class: 'fas fa-download', metod: 2, rute_file: 'Formatos_reporte/formato_baterias_estado_11.xlsx', name_file: 'formato_baterias_estado_11.xlsx' },
                ],
                options_tab_select: null,
                file: '',
                document_url: '',
                url_prod: 'http://172.16.100.112/',
                url_dev: 'http://127.0.0.1:8000/',
                load: false,
                tab: '',
                extensions: []
            }
        },
        created: function () {
            this.getExtensions()
        },
        methods: {
            selectTab(tab) {
                this.options_tab_select = this.options_tab.filter((obj => obj.id == tab.id));
                this.current_tab = tab
                this.load = true;
                this.data_t_body.current_page = 1;
                this.tab = tab.id

                if (tab.id != 8) {
                    this.getData();
                }



            },
            getExtensions() {
                axios.get('/repositorio/extensions').then((response) => {
                    this.extensions = response.data;
                })
            },
            getData() {


                let url_get = '/report/data/' + this.current_tab.id + `?page=${this.data_t_body.current_page}`



                axios.get(url_get).then(response => {
                    this.data_head = response.data.head
                    this.data_t_body = response.data.data
                    this.load = false;
                })
            },
            paginateData() {
                axios.get(`/report/data/` + this.current_tab.id + `?page=${this.data_t_body.current_page}`).then(response => {
                    this.data_t_body = response.data.data
                })
            },
            moneyFormat(value) {
                if (value % 1 == 0) {

                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                } else {
                    let val = (value / 1).toFixed(2).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                }

            },
            selecOption(option) {

                if (option.metod == 1) {
                    document.getElementById("file").click();
                } else {
                    if (option.metod == 2) {
                        this.downloadFile(option);
                    }
                }

            },

            uploadFle(e) {
                let file = e.target.files[0];
                this.file = file;

                let file_extension = file.name.split(".").pop()
                let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                if (extension_permited) {
                    let formData = new FormData();
                    formData.append('file', this.file);
                    formData.append('current_tab', this.current_tab.id);
                    this.load = !this.load;
                    axios.post('/upload/data/pep/report', formData).then(response => {
                        console.log(response.data)
                        $("#file").val('');
                        this.file = '';
                        this.load = !this.load;
                    }).finally(() => this.paginateData()).catch(
                        error => {
                            this.load = !this.load;
                            this.file = '';
                            this.alert('error','Error','Se produjo un error al importar los datos, favor contactar con soporte.')
                        });
                } else {
                    this.alert('error','Error de archivo','El tipo de archivo selecionado no esta permitido.')
                    
                }

            },
            downloadFile(option) {
                axios({
                    url: this.url_prod + option.rute_file,
                    method: 'GET',
                    responseType: 'blob'
                })
                    .then((response) => {
                        const url = window.URL
                            .createObjectURL(new Blob([response.data]));
                        const link = document.createElement('a');
                        link.href = url;
                        link.setAttribute('download', option.name_file);
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    })
            },
            dateFormat: function (d) {
                return moment(d).format("DD/MM/YYYY");
            },
            alert: function (Type,Title,Text) {
                Swal.fire({
                    type: Type,
                    title: Title,
                    text: Text,

                })
            },
        }
    }
</script>
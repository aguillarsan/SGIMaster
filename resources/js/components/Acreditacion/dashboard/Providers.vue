<template>
    <div class="main-content">
        <div class="wrapper wrapper-content">
            <section class="section">
                <div class="section-header shadow-box-ag">
                    <div class="row">
                        <div class="col-lg-11 col-md-6 col-sm-6 col-12">
                            <div class="card-stats-title">
                                <h1 class="barlow semi_bold">
                                    Proveedores
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12" v-for="card_total in card_totals">
                    <div :key="card_total.id" class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn">
                        <div :class="card_total.color" class="card-icon shadow-box-ag ">
                            <i :class="card_total.icon" style="font-size: 28px;color: white">
                            </i>
                        </div>
                        <div class="card-wrap ">
                            <div class="card-header barlow bold">
                                <h4>
                                    {{card_total.name}}
                                </h4>
                            </div>
                            <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;">
                                {{card_total.value}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input @change="uploadFile" hidden="true" id="file" name="file" type="file" value="" />
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
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
                                        <li>
                                            <a @click="importExcel" class="dropdown-item barlow regular" href="#">
                                                <i class="fas fa-upload">
                                                </i>
                                                Cargar excel
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="barlow bold" style="width:100px;">
                                                Proveedor
                                            </th>

                                            <th class="barlow bold" style="width:80px;">
                                                Mes
                                            </th>
                                            <th class="barlow bold" style="width:80px;">
                                                Año
                                            </th>
                                            <th class="barlow bold" style="width:30px  !important">
                                              Cumplimiento Legal Anual
                                            </th>
                                            <th class="barlow bold" style="width:80px;">
                                              Cumplimiento Entel Anual
                                            </th>
                                            <th class="barlow bold" style="width:50px;">
                                               Cumplimiento Legal Mensual
                                            </th>
                                            <th class="barlow bold" style="width:50px;">
                                               Control Operacional
                                            </th>
                                            <th class="barlow bold" style="width:50px;">
                                               Gestión De Personas
                                            </th>
                                            <th class="barlow bold" style="width:50px;">
                                                Control Documental
                                            </th>
                                            <th class="barlow bold" style="width:50px;">
                                                Matriz De Riesgos
                                            </th>
                                            <th class="barlow bold" style="width:50px;">
                                                Cumplimiento Plazo Entrega
                                            </th>
                                            <th class="barlow bold" style="width:50px;">
                                               Cumplimiento Global Mes
                                            </th>
                                            <th class="barlow bold" style="width:50px;">
                                                Cumplimiento
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="!load">
                                        <tr style="height: 180px;" v-for="proveedor in proveedores.data">
                                            <td style="width:100px">
                                                <div class="barlow regular">
                                                    Nombre
                                                    <div>
                                                        <strong>
                                                            {{proveedor.proveedor ?
                                                            proveedor.proveedor.PROVEEDOR:''}}
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="mt-3 barlow regular">
                                                    Rut
                                                    <div>
                                                        <strong>
                                                            {{proveedor.proveedor ?
                                                            proveedor.proveedor.RUT_PROVEEDOR:''}}
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="mt-3 barlow regular">
                                                    Contacto
                                                    <div>
                                                        <strong>
                                                            {{proveedor.proveedor ? proveedor.proveedor.contacto:''}}
                                                        </strong>
                                                    </div>
                                                </div>

                                            </td>

                                            <td>
                                                {{proveedor.mes}}
                                            </td>
                                            <td>
                                                {{proveedor.annio}}
                                            </td>
                                            <td style="width:50px;">
                                                <span :class="getClass(proveedor.cumplimiento_legal_anual)">
                                                    {{percentValue(proveedor.cumplimiento_legal_anual)}}%</span>

                                            </td>
                                            <td>
                                                <span :class="getClass(proveedor.cumplimineto_entel_anual)">
                                                    {{percentValue(proveedor.cumplimineto_entel_anual)}}%</span>
                                            </td>
                                            <td>
                                                <span
                                                    :class="getClass(proveedor.cumplimiento_legal_mensual)">{{percentValue(proveedor.cumplimiento_legal_mensual)}}%</span>
                                            </td>
                                            <td>
                                                <span
                                                    :class="getClass(proveedor.control_operacional)">{{percentValue(proveedor.control_operacional)}}%</span>
                                            </td>
                                            <td>
                                                <span
                                                    :class="getClass(proveedor.gestion_personas)">{{percentValue(proveedor.gestion_personas)}}%</span>
                                            </td>
                                            <td>
                                                <span
                                                    :class="getClass(proveedor.control_documental)">{{percentValue(proveedor.control_documental)}}%</span>
                                            </td>
                                            <td>
                                                <span
                                                    :class="getClass(proveedor.matriz_riesgos)">{{percentValue(proveedor.matriz_riesgos)}}%</span>
                                            </td>
                                            <td>
                                                <span
                                                    :class="getClass(proveedor.cumplimiento_plazo_entrega)">{{percentValue(proveedor.cumplimiento_plazo_entrega)}}%</span>
                                            </td>
                                            <td>
                                                <span
                                                    :class="getClass(proveedor.cumplimiento_global_mes)">{{percentValue(proveedor.cumplimiento_global_mes)}}%</span>
                                            </td>
                                            <td>
                                                <span
                                                    :class="setClass(proveedor.cumplimiento_id)">{{proveedor.cumplimiento
                                                    ? proveedor.cumplimiento.cumplimiento:''}}</span>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                                <div style="margin-top: 30px;">
                                    <nav aria-label="pagination" class="pagination" role="navigation">
                                        <vue-pagination :offset="4" :pagination="proveedores"
                                            @paginate="getProveedor()">
                                        </vue-pagination>
                                    </nav>
                                </div>
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
                            </div>
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
    import VuePagination from '../VuePagination.vue';
    export default {
        components: {

            'vue-pagination': VuePagination
        },
        data() {
            return {
                card_totals: [
                    { id: 1, name: 'Proveedores Acreditados', value: 0, icon: 'fas fa-user-check', color: 'verde' },
                    { id: 2, name: 'Proveedores No Acreditados', value: 0, icon: 'fas fa-user-times', color: 'red' }
                ],
                proveedores: {
                    'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0

                },
                proveedor: '',
                file: '',
                load: true,
            }
        },
        created: function () {
            this.getProveedor()
        },
        methods: {
            getProveedor() {
                axios.get(`/get/proveedores/cumplimiento?page=${this.proveedores.current_page}&proveedor=${this.proveedor}`).then((response) => {
                    this.proveedores = response.data
                    this.load = false

                })
            },

            uploadFile(e) {
                this.load = !this.load
                let file = e.target.files[0];
                this.file = file;
                let formData = new FormData();
                formData.append('file', this.file);

                axios.post('/import/proveedores/cumplimiento/global', formData, {


                }).then(response => {

                    alert("Datos cargados")
                }).catch(
                    error => {
                        console.log(error)

                        alert("Se produjo un error al importar los datos")
                    });
            },
            importExcel() {
                document.getElementById("file").click();
            },
            percentValue(value) {
                let new_value = Math.round(value * 100)
                return new_value
            },
            getClass(value) {
                let new_val = this.percentValue(value);
                console.log(new_val)
                if (new_val >= 80 && new_val <= 100) return 'badge badge-success'
                if (new_val >= 0 && new_val < 40) return 'badge badge-danger'
                if (new_val >= 40 && new_val < 80) return 'badge badge-warning'

            },
            setClass(val) {
                if (val == 1) return 'badge badge-success'
                if (val == 2) return 'badge badge-warning'
                if (val == 3) return 'badge badge-danger'
            }
        }
    }
</script>
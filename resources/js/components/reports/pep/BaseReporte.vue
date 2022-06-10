<template>
    <div>
        <div class="card-header">
            <div class="col-lg-10">


                <div class="dropdown d-inline">
                    <a class="font-weight-600 dropdown-toggle barlow bold" data-toggle="dropdown" href="#"
                        id="orders-month">
                        Opciones
                    </a>
                    <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title barlow semi_bold">
                            Selecione una opción
                        </li>

                        <li>

                            <a href="#" @click="updateData()" class="dropdown-item barlow regular">
                                <i class="fas fa-sync"></i>

                                Actualizar consolidado

                            </a>
                        </li>
                        <li>
                            <a href="#modalCreateLayout" @click="getDataHead" data-toggle="modal"
                                class="dropdown-item barlow regular">
                                <i class="fas fa-bezier-curve"></i>

                                Crear layout
                            </a>

                        </li>




                    </ul>
                </div>

            </div>
            <div class="col-lg-2">
                <button class="btn btn-primary barlow regular btn-block" v-if="!load_excel" data-toggle="modal"
                    @click="getLayouts" data-target="#layoutsAll" style="border-radius: 5px;"> Generar reporte</button>
                <a href="#" class="btn disabled btn-primary btn-progress" style="border-radius: 5px;"
                    v-if="load_excel">Progress</a>
            </div>


        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="barlow bold">
                                Pep
                            </th>
                            <th class="barlow bold">
                                In.extremo
                            </th>
                            <th class="barlow bold">
                                Fin extremo
                            </th>
                            <th class="barlow bold">
                                Dias de Vigencia
                            </th>
                            <th class="barlow bold">
                                Mes texto
                            </th>
                            <th class="barlow bold">
                                Mes
                            </th>
                            <th>Ejecucion </th>
                            <th>Observacion de Cierre </th>
                            <th>Estado 11 </th>
                            <th>OC sin Facturar</th>
                            <th>flujo</th>
                            <th>Disminuido</th>
                            <th>Nombre Ework</th>
                            <th>nombre_actividad</th>
                            <th>f_habilitacion</th>
                            <th>unidad_ejecutora</th>
                            <th>usuario</th>
                            <th>Status</th>
                            <th>Diff_pptop</th>
                            <th>ppto_sap</th>







                        </tr>
                    </thead>
                    <tbody v-if="!load">
                        <tr v-for="d in data.data">
                            <td v-text="d.pep" style="width:250px;"></td>
                            <td v-text="d.inicio_extremo" style="width:150px;">
                            </td>
                            <td v-text="d.fin_extremo" style="width:150px;"></td>
                            <td v-text="d.dias_vigencia" style="width:100px;"></td>
                            <td v-text="d.mes" style="width:50px;"></td>
                            <td v-text="d.mes_n"></td>
                            <td v-text="d.ejecucion"></td>
                            <td v-text="d.observacion"></td>
                            <td v-text="d.estado_once"></td>
                            <td v-text="d.cuenta_de_documento_compras"></td>
                            <td v-text="d.ework_id ? 'data' : ''"></td>
                            <td v-text="d.ppto_sap == 0 ? 'X':''"></td>
                            <td v-text="d.ework_id ? 'data' : ''"></td>
                            <td v-text="d.ework_id ? 'data' : ''"></td>
                            <td v-text="d.ework_id ? 'data' : ''"></td>
                            <td v-text="d.ework_id ? 'data' : ''"></td>
                            <td v-text="d.ework_id ? 'data' : ''"></td>
                            <td v-text="d.estado_dd_sap"></td>
                            <td v-text="d.dif_ppto"></td>
                            <td v-text="d.ppto_sap"></td>










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
            </div>
        </div>
        <div aria-hidden="true" class="modal inmodal" id="modalCreateLayout" role="dialog" tabindex="-1"
            data-backdrop="static">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header"
                        style="background: -webkit-linear-gradient(rgb(0, 210, 255), rgb(58, 123, 213); height: 70px;">
                        <h5 class="modal-title barlow semi_bold" style="color: white">
                            Crear layout
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 style="text-align: center" class="barlow semi_bold">Columnas</h5>
                        <div class="row tck_suport mt-1">
                            <div class="col-lg-3" v-for="head in heads">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" @click="selectColumn(head)" type="checkbox"
                                        :id="'columName'+head.id">
                                    <label class="form-check-label" style="word-break: break-all;"
                                        for="inlineCheckbox1">{{head.name_head}}</label>
                                </div>
                            </div>


                        </div>
                        <div class="form-group mt-5">
                            <label>Nombre del Layout*</label>
                            <input class="form-control" type="text" v-model="name_layout">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-info " @click="saveLayout" href="#" style="color:white">
                            Guardar layout
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div aria-hidden="true" class="modal inmodal" id="layoutsAll" role="dialog" tabindex="-1"
            data-backdrop="static">
            <div class="modal-dialog  ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header"
                        style="background: -webkit-linear-gradient(rgb(0, 210, 255), rgb(58, 123, 213); height: 70px;">
                        <h5 class="modal-title barlow semi_bold" style="color: white">
                            Layouts creados
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            <a style="cursor: pointer;">
                                <li class="list-group-item barlow semi_bold"
                                    :style="layout_id == layout.id ?'background-color:#005cff;color:white':''"
                                    @click="selectLayout(layout)" v-for="layout in layouts">{{layout.name_layout}}
                                </li>
                            </a>




                        </ul>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-info" @click.prevent="exportExcelData" href="#" style="color:white">
                            Descargar reporte
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
    export default {
        data() {
            return {
                data: {
                    'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0

                },
                load: false,
                load_excel: false,
                heads: [],
                column_select: [],
                name_layout: '',
                layouts: [],
                layout_id: '',
                layout_name: ''
            }
        },
        created: function () {
            this.getData();
        },
        mounted() {
            // let self = this;
            // this.$eventBus.$on('get-data-base-reporte', function () {
            //     self.getData();
            // });
        },
        methods: {

            getData() {
                this.load = true;

                axios.get(`/data/base/report?page=${this.data.current_page}`).then(response => {
                    this.data = response.data
                    this.load = false;
                })
            },
            updateData() {
                this.load = true;
                axios.get('/update/data/base/report').then(response => {

                    this.getData();
                })
            },
            exportExcelData: function () {
                if (this.layout_id != "") {
                    $("#layoutsAll").modal("hide");
                    this.load_excel = true;
                    axios.get('/excel/export/base/report/' + this.layout_id, {

                        responseType: 'arraybuffer'
                    }).then(response => {
                        const blob = new Blob([response.data], { type: 'application/xlsx' })


                        if (window.navigator && window.navigator.msSaveOrOpenBlob) {
                            window.navigator.msSaveOrOpenBlob(newBlob)
                            return
                        }

                        const data = window.URL.createObjectURL(blob)
                        let link = document.createElement('a')
                        link.href = data
                        link.download = this.layout_name + '_' + moment().format('YYYY-MM-DD hh:mm:ss') + '.xlsx'
                        link.click()
                        this.load_excel = false;
                        this.message('success','Éxito al descargar','Su reporte  '+'"'+this.layout_name+'"'+' fue generado exitosamente')
                        this.layout_id = ''
                        this.layout_name = ''
                    }).catch(
                        error => {
                            this.load_excel = false;
                            this.message('error','Error','Se produjo un error inesperado al generar el reporte, favor contactar con soporte')
                           
                        });
                }

            },
            toastFunction: function (messaje) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 3000,

                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    type: 'success',
                    title: messaje
                })
            },
            getDataHead() {
                axios.get('/base/report/name/tabs/layout').then(response => {
                    this.heads = response.data
                })
            },
            selectColumn(column) {
                let check = document.getElementById("columName" + column.id)
                if (check.checked) {
                    this.column_select.push({ column_id: column.id })
                } else {
                    let filter = this.column_select.filter((item) => item.column_id != column.id);
                    this.column_select = filter
                }
            },
            saveLayout() {
                if (this.name_layout != "" && this.column_select.length != 0) {

                    let formData = new FormData
                    formData.append('name_layout', this.name_layout)

                    axios.post('/create/layout/base/report', formData).then(response => {
                        $("#modalCreateLayout").modal("hide")
                        this.message('success','Éxito','Layout creado')
                        let layout_id = response.data

                        for (let index = 0; index < this.column_select.length; index++) {

                            const element = this.column_select[index];
                            let formData = new FormData
                            formData.append('column_id', element.column_id)
                            formData.append('layout_id', layout_id)
                            axios.post('/register/columns/layout', formData).then(response => {
                                this.column_select = [];
                                this.name_layout = '';
                            })

                        }
                    })
                }
            },
            getLayouts() {
                axios.get('/get/layouts/created').then(response => {
                    this.layouts = response.data
                })
            },
            selectLayout(layout) {
                this.layout_id = layout.id
                this.layout_name = layout.name_layout
            },
            message(Type, Title, Text) {
                Swal.fire({
                    type: Type,
                    title: Title,
                    text: Text,
                })
            }


        }
    }
</script>
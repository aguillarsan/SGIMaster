<template>
    <div class="main-content">
        <div class="wrapper wrapper-content">
            <section class="section">
                <div class="section-header shadow-box-ag">
                    <div class="row">
                        <div class="col-lg-11 col-md-6 col-sm-6 col-12">
                            <div class="card-stats-title">
                                <h1 class="barlow semi_bold">Trabajadores  </h1>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn">

                        <div class="card-icon shadow-box-ag azul">
                            <i class="fas fa-user" style="font-size: 28px;color: white">
                            </i>
                        </div>
                        <div class="card-wrap ">
                            <div class="card-header barlow bold">
                                <h4>
                                    Trabajadores registrados
                                </h4>
                            </div>
                            <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;">

                                {{data_tab.total}}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn">

                        <div class="card-icon shadow-box-ag verde">
                            <i class="fas fa-user-check" style="font-size: 28px;color: white">
                            </i>

                        </div>
                        <div class="card-wrap ">
                            <div class="card-header barlow bold">
                                <h4>
                                    Trabajadores acreditados
                                </h4>
                            </div>
                            <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;">

                                {{total_acreditado}}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn">

                        <div class="card-icon shadow-box-ag red">
                            <i class="fas fa-user-times" style="font-size: 28px;color: white">
                            </i>

                        </div>
                        <div class="card-wrap ">
                            <div class="card-header barlow bold">
                                <h4>
                                    Trabajadores no acreditados
                                </h4>
                            </div>
                            <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;">

                                {{total_no_acreditado}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <input hidden="true" @change="uploadFile" id="file" name="file" type="file" value="" />

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

                                            <a href="#" @click="importExcel" class="dropdown-item barlow regular">
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
                                            <th class="barlow bold">
                                                Proveedor
                                            </th>
                                            <th class="barlow bold">
                                                Nombre Trabajador
                                            </th>
                                            <th class="barlow bold">
                                                Rut Trabajador
                                            </th>
                                            <th class="barlow bold">
                                                Acreditado
                                            </th>

                                        </tr>

                                    </thead>

                                    <tr>
                                        <th>
                                            <input class="form-control" v-model="proveedor" @keyup.prevent="filterData"
                                                style="width:250px" type="text">

                                        </th>
                                        <th>
                                            <input class="form-control" @keyup.prevent="filterData"
                                                v-model="name_employee" style="width:200px" type="text">

                                        </th>
                                        <th>
                                            <input class="form-control" @keyup.prevent="filterData"
                                                v-model="rut_employee" style="width:200px" type="text">

                                        </th>
                                        <th>

                                            <select class="form-control select barlow regular"
                                                v-if="!tipo_acreditacion_id" @change="filterData" style="width:200px"
                                                v-model="tipo_acreditacion_id">
                                                <option v-for="tipo in tipo_acreditacion" :value="tipo.id">{{tipo.name}}
                                                </option>
                                            </select>
                                            <span class="badge badge-info" v-if="tipo_acreditacion_id"
                                                v-for="name in filterName">
                                                {{name.name}}
                                                <a @click.prevent="cleanFilter" style="color:white" href="">
                                                    <i class="fas fa-times-circle i_con_white boxBounce">
                                                    </i>
                                                </a>
                                            </span>

                                        </th>

                                    </tr>

                                    </tbody>
                                    <tbody v-if="!load">
                                        <tr v-for="data in data_tab.data" style="height: 150px;">
                                            <td style="width:500px">
                                                <div class="barlow regular">
                                                    Nombre
                                                    <div>
                                                        <strong>{{data.proveedor ?
                                                            data.proveedor.PROVEEDOR:''}}
                                                        </strong>
                                                    </div>

                                                </div>
                                                <div class="mt-3 barlow regular">
                                                    Rut
                                                    <div>
                                                        <strong>{{data.proveedor ?
                                                            data.proveedor.RUT_PROVEEDOR:''}}
                                                        </strong>
                                                    </div>
                                                </div>
                                            </td>
                                            <td v-text="data.name +' '+ data.last_name" style="width:200px"
                                                class="barlow regular"></td>
                                            <td v-text="data.rut" style="width:200px" class="barlow regular"></td>

                                            <td style="width:200px" class="barlow regular">
                                                <a @click="viewInfo(data)"
                                                    :style="data.tipo_acreditacion_id == 2 ? 'cursor:pointer':''">
                                                    <span
                                                        :class="checkTipoAcreditacion(data.tipo_acreditacion_id)">{{data.tipo_acreditacion
                                                        ? data.tipo_acreditacion.acreditado :''}}</span>
                                                </a>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="margin-top: 30px;" v-if="!load">
                                    <nav aria-label="pagination" class="pagination" role="navigation">
                                        <vue-pagination :offset="4" :pagination="data_tab" @paginate="getData()">
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
                                    <div class="progress mb-3 " data-height="25">
                                        <div :style="'width:'+ getProgress" aria-valuemax="100" aria-valuemin="0"
                                            aria-valuenow="100" class="progress-bar bg-info" role="progressbar">
                                            <div v-if=" getProgress == 'NaN%'">
                                            </div>
                                            <div v-if=" getProgress != 'NaN%'">
                                                {{getProgress}}
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
        <div aria-hidden="true" class="modal inmodal" id="infoNoAcreditado" role="dialog" tabindex="-1"
            data-backdrop="static">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header"
                        style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            información
                        </h5>
                        <button aria-label="Close" @click="closeModal" class="close" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body " v-if="">
                        <div class="form-group">
                            <label class="barlow semi_bold">Nombre</label>
                            <div>{{detail_info_employee.name}} {{detail_info_employee.lastname}}</div>
                        </div>
                        <div class="form-group">
                            <label class="barlow semi_bold">Rut</label>
                            <div>{{detail_info_employee.rut}}</div>
                        </div>
                        <div class="form-group">
                            <label class="barlow semi_bold">Documentacion Pendiente (Acreditacion Provisoria)
                            </label>
                            <div>{{detail_info_employee ?
                                replaceText(detail_info_employee.documentacion_pendiente_ac_provisoria ):''}}</div>
                        </div>
                        <div class="form-group">
                            <label class="barlow semi_bold">
                                Documentacion Pendiente (Acreditacion Indefinida)

                            </label>
                            <div>{{detail_info_employee ?
                                replaceText(detail_info_employee.documentacion_pendiente_ac_indefinida):''}}</div>
                        </div>
                        <div class="form-group">
                            <label class="barlow semi_bold">
                                Examenes con incumplimiento

                            </label>
                            <div>{{detail_info_employee ?
                                replaceText(detail_info_employee.examenes_con_incumplimiento):''}}</div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-info " @click="closeModal"  style="color:white">
                            Cerrar
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>



    </div>
</template>
<script>
    import axios from 'axios';
    import VuePagination from '../VuePagination.vue';
    export default {
        components: {

            'vue-pagination': VuePagination
        },

        data() {
            return {
                file: '',
                load: false,
                data_tab: {
                    'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0

                },
                setTimeoutBuscador: '',
                proveedor: '',
                rut_employee: '',
                name_employee: '',
                tipo_acreditacion: [{ id: 1, name: 'Acreditado' }, { id: 2, name: 'No Acreditado' }],
                tipo_acreditacion_id: '',
                time: 300,
                total_acreditado: '',
                total_no_acreditado: '',
                porcentaje: {
                    type: Number,
                    default: 0
                },
                detail_info_employee: ''
            }
        },
        created: function () {
            this.getData();
        },
        computed: {
            filterName() {
                if (this.tipo_acreditacion_id) {
                    let name = this.tipo_acreditacion.filter((obj => obj.id == this.tipo_acreditacion_id));
                    return name
                }


            },
            setTime() {
                if (this.tipo_acreditacion_id) {
                    this.time = 0;
                    return this.time;
                } else {
                    this.time = 300;
                    return this.time
                }
            },
            getProgress() {
                return Math.round(this.porcentaje) + '%'
            }
        },
        methods: {

            getData() {

                if (this.data_tab.to == 0 || this.search == 1) {
                    this.load = true;
                }

                axios.get('/acreditation/data/employee', {
                    params: {
                        page: this.data_tab.current_page,
                        proveedor: this.proveedor,
                        rut_employee: this.rut_employee,
                        name_employee: this.name_employee,
                        tipo_acreditacion_id: this.tipo_acreditacion_id
                    }
                }).then(response => {
                    this.data_tab = response.data.employees
                    this.total_acreditado = response.data.acreditado
                    this.total_no_acreditado = response.data.no_acreditado
                    this.load = false;
                })
            },
            importExcel() {
                document.getElementById("file").click();
            },
            uploadFile(e) {
                let file = e.target.files[0];
                this.file = file;
                let formData = new FormData();
                formData.append('file', this.file);
                this.load = !this.load;
                axios.post('/import/excel/acreditation', formData, {

                    onUploadProgress: e => {
                        console.log(e)
                        if (e.lengthComputable) {
                            this.porcentaje = (e.loaded / e.total) * 100
                            console.log(this.porcentaje)
                        }
                    }
                }).then(response => {

                    $("#file").val('');
                    this.file = '';
                    this.load = !this.load;
                    this.getData();
                }).catch(
                    error => {
                        this.load = !this.load;
                        this.file = '';
                        $("#file").val('');
                        alert("Se produjo un error al importar los datos")
                    });
            },
            checkTipoAcreditacion(tipo) {
                if (tipo == 1) {
                    return 'badge badge-success';
                } else {
                    if (tipo == 2) {
                        return 'badge badge-danger';
                    }
                }

            },
            filterData() {

                clearTimeout(this.setTimeoutBuscador)

                this.setTimeoutBuscador = setTimeout(() => this.getData(), this.setTime);
            },
            cleanFilter() {
                this.tipo_acreditacion_id = ''
                this.getData()

            },
            viewInfo(data) {
                if (data.tipo_acreditacion_id == 2) {
                    this.detail_info_employee = data;
                    $("#infoNoAcreditado").modal("show");
                }
            },
            replaceText(text) {
                if (text) {
                    let new_text = text.replace(/_x000D_/g, '')
                    return new_text;
                }


            },
            closeModal() {
                this.detail_info_employee = ''
                $("#infoNoAcreditado").modal("hide");
            }
        }
    }
</script>
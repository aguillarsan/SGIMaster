<template>
    <div>
        <div class="main-content" id="tablesolicitud">
            <div class="wrapper wrapper-content">
                <section class="section">
                    <div class="section-header shadow-box-ag">
                        <div class="row">
                            <div class="col-lg-10 col-md-6 col-sm-6 col-12 ">
                                <div class="card-stats-title">
                                    <h1 class="barlow semi_bold">
                                        Administración de proveedores
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="" style="color: #2d88ff">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn"
                            v-bind:style=" modulo==1 ? 'background-color: #1c538a; border: 2px solid white;' : '' ">
                            <div class="card-icon shadow-box-ag azul"
                                v-bind:style=" modulo==1 ? 'background-color: white; ' : '' ">
                                <i class="far fa-list-alt" style="font-size: 28px;color: white"
                                    v-bind:style=" modulo==1 ? 'color: #6c757d; ' : '' ">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header">
                                    <h4 style="font-size: ;" class="barlow bold"
                                        v-bind:style=" modulo==1 ? 'color: white; ' : '' ">
                                        TOTAL PROVEEDORES
                                    </h4>
                                </div>
                                <div v-if="total != 0" class="card-body animated fadeIn barlow semi-bold"
                                    style="font-size: 35px;" v-bind:style=" modulo==1 ? 'color: white; ' : '' ">
                                    {{proveedores.total}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-lg-9">
                                <h4 style="color: rgb(102, 102, 102)" class="barlow semi_bold">
                                    Proveedores
                                </h4>
                                <div class="dropdown d-inline" v-if="opcion_edit == 1">
                                    <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#"
                                        id="orders-month">
                                        Opciones
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-sm">
                                        <li class="dropdown-title">
                                            Selecione una opción
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-download">
                                                </i>
                                                Descargar reporte
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" @click.prevent="showModal(proveedor,2)">
                                                <i class="fas fa-plus">
                                                </i>
                                                Crear Proveedor
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card-header-form">
                                    <form>
                                        <div class="input-group">
                                            <input class="form-control " @keyup.prevent="getProveedor" name=""
                                                v-model="proveedor" placeholder="Buscar" type="text" value="">

                                            </input>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table project-list">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr class="barlow semi_bold">
                                            <th>
                                                Nombre
                                            </th>
                                            <th>
                                                Rut
                                            </th>
                                            <th>
                                                Contacto
                                            </th>

                                            <th>
                                                Estado
                                            </th>
                                            <th v-if="opcion_edit == 1">
                                                Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="proveedor in proveedores.data">
                                            <td class="barlow semi_bold">
                                                {{proveedor.PROVEEDOR}}
                                            </td>
                                            <td class="barlow regular">
                                                {{proveedor.RUT_PROVEEDOR}}
                                            </td>
                                            <td>
                                                {{proveedor.contacto}}
                                            </td>
                                            <td>
                                                <div v-if="proveedor.ACTIVO == 1">
                                                    <span class="badge badge-success barlow semi-bold"
                                                        style="border-radius: 5px;font-size: 15px">
                                                        Activo
                                                    </span>
                                                </div>
                                                <div v-if="proveedor.ACTIVO == 0">
                                                    <span class="badge badge-danger  barlow semi-bold"
                                                        style="border-radius: 5px;font-size: 15px">
                                                        Inactivo
                                                    </span>
                                                </div>
                                            </td>

                                            <td v-if="opcion_edit == 1">
                                                <div class="col-md-3 col-sm-3 col-12" v-if="proveedor.ACTIVO == 0">
                                                    <button class="btn btn-success"
                                                        @click.prevent="updateProveedor(proveedor)">
                                                        <i class="fas fa-check">
                                                        </i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-12" v-if="proveedor.ACTIVO == 1">
                                                    <button class="btn btn-danger"
                                                        @click.prevent="updateProveedor(proveedor)">
                                                        <i class="fa fa-times-circle">
                                                        </i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-12">
                                                    <button class="btn btn-secondary"
                                                        @click.prevent="showModal(proveedor,1)">
                                                        <i class="fas fa-edit">
                                                        </i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <nav aria-label="pagination" class="pagination" role="navigation">
                                    <vue-pagination :offset="4" :pagination="proveedores" @paginate="getProveedor()">
                                    </vue-pagination>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <modal-edit-proveedor></modal-edit-proveedor>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    import EventBus from "./event-bus"
    import ModalPoveedor from './modals/modaladmineditproveedor.vue'
    import VuePagination from '../VuePagination.vue';


    export default {
        props: ['permisos'],
        components: {
            'modal-edit-proveedor': ModalPoveedor,
            'vue-pagination':VuePagination
        },
        data() {
            return {
             
                total_proveedores: '',
                modulo: 1,
                proveedor: '',
                total: 0,
                opcion_edit: 0,
                proveedores: {
                    'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0

                },





            }
        },
        created: function () {

            this.getPermisos();



        },
        mounted: function () {

            this.getProveedor()/* Agrega mounted y con el siguiente contenido */
            let self = this;
            EventBus.$on('sgc.RefreshTabProveedor', function () {

                self.getProveedor(); // ejecutas el metodo que desees


            });
        },


        methods: {
            getPermisos: function () {
                let permiso = JSON.parse(this.permisos);
                for (var i = 0; i < permiso.length; i++) {
                    let per = permiso[i]
                    if (per.permission_id == 191) {
                        this.opcion_edit = 1;
                    }
                }
            },
            formato: function (d) {
                return moment(d).format("DD/MM/YY - hh:mm:ss");
            },
            showModal: function (proveedor, tipo) {
                EventBus.$emit('sgc.AdminModalEditProveedor', proveedor, tipo);
            },
            getProveedor: function () {
                axios.get(`/get/all/proveedores?page=${this.proveedores.current_page}&proveedor=${this.proveedor}`).then((response) => {
                    this.proveedores = response.data
                    this.total = this.proveedores.length
                })
            },
            updateProveedor: function (proveedor) {
                axios.get(`/updateProveedor?proveedor_id=${proveedor.id}`).then((response) => {
                    this.getProveedor()
                    let mensaje = 'Proveedor actualizado'
                    this.toastFunction(mensaje)
                })
            },
            totalProveedor: function () {
                for (var i = 0; i < this.proveedores; i++) {

                    this.total = this.total + 1
                }
            },
            toastFunction: function (messaje) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
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



        }
    }
</script>
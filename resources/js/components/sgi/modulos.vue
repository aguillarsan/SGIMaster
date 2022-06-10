<template>
    <div>


        <div class="post d-flex flex-column-fluid" id="kt_post" style="margin-top:-20px">

            <div id="kt_content_container" style="min-width: fit-content !important;" class="container-xxl">

                <div class="row gy-5 g-xl-12">

                    <div class="col-xl-12">

                        <div class="card card-xl-stretch">



                            <div class="card-body ">



                                <div class="card-p position-relative">

                                    <div class="row">
                                        <div class="col-lg-4" v-for="modulo in Modulos">
                                            <div class="col  px-6 py-8 rounded-2 me-7 mb-7"
                                                :style=" !checkAccessModulo(modulo) ? 'background-color:#D7D7D7;opacity: .7': 'background: -webkit-linear-gradient(left,'+modulo.color+');'">
                                                <div style="display: flex;justify-content: space-between">
                                                    <span class="svg-icon svg-icon-4x  d-block my-2 text-white "
                                                        :style="!checkAccessModulo(modulo) ? 'color:#181C32 !important':''">
                                                        <svg class="bi" width="32" height="32" fill="currentColor">
                                                            <use
                                                                :xlink:href="'assets/bootstrap-icons/bootstrap-icons.svg#'+modulo.icono" />
                                                        </svg>

                                                    </span>
                                                    <div class="card-toolbar">

                                                        <button type="button"
                                                            class="btn btn-sm btn-icon  btn-white  border-0 me-n3"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">

                                                            <span class="svg-icon svg-icon-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                    height="24px" viewBox="0 0 24 24">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="5" y="5" width="5" height="5" rx="1"
                                                                            fill="#000000"></rect>
                                                                        <rect x="14" y="5" width="5" height="5" rx="1"
                                                                            fill="#000000" opacity="0.3"></rect>
                                                                        <rect x="5" y="14" width="5" height="5" rx="1"
                                                                            fill="#000000" opacity="0.3"></rect>
                                                                        <rect x="14" y="14" width="5" height="5" rx="1"
                                                                            fill="#000000" opacity="0.3"></rect>
                                                                    </g>
                                                                </svg>
                                                            </span>

                                                        </button>

                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                                            data-kt-menu="true" style="">

                                                            <div class="menu-item px-3">
                                                                <div
                                                                    class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                                    Opciones</div>
                                                            </div>

                                                            <div class="menu-item px-3">
                                                                <a href="#" @click="getInfoModulo(modulo)"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#kt_modal_invite_friends"
                                                                    class="menu-link  flex-stack px-3">Información <i
                                                                        class="bi bi-info-circle"></i></a>
                                                            </div>

                                                            <div class="menu-item px-3"
                                                                v-if="!checkAccessModulo(modulo)">
                                                                <a href="#" @click="SolicitarAcceso(modulo)"
                                                                    class="menu-link flex-stack px-3">Solicitar
                                                                    acceso
                                                                    <i class="bi bi-unlock"></i></a>
                                                            </div>


                                                        </div>

                                                    </div>
                                                </div>



                                                <a class="text-white fw-bold fs-3"
                                                    :style="!checkAccessModulo(modulo) ? 'color:#181C32 !important':''">{{modulo.nombre}}</a>
                                                <div style="margin-top:1rem">

                                                    <svg v-if="!checkAccessModulo(modulo)" class="bi" width="45"
                                                        height="45" fill="currentColor">
                                                        <use
                                                            xlink:href="assets/bootstrap-icons/bootstrap-icons.svg#lock-fill" />
                                                    </svg>
                                                    <a :href="modulo.ruta" class="btn btn-white btn-sm"
                                                        v-if="checkAccessModulo(modulo) && modulo.id != 7">Ingresar
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-chevron-right"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                                        </svg>
                                                    </a>
                                                    <a :href="'http://172.16.100.102/outside/bridge/'+(username)+'/'+(password)"
                                                        class="btn btn-white btn-sm"
                                                        v-if="checkAccessModulo(modulo) && modulo.id == 7"
                                                        target="blank__">Ingresar
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-chevron-right"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                                        </svg>
                                                    </a>

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


        <div class="modal fade" id="kt_modal_invite_friends" tabindex="-1" style="display: none;" aria-hidden="true">

            <div class="modal-dialog mw-650px">

                <div class="modal-content">

                    <div class="modal-header pb-0 border-0 justify-content-end">

                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">

                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black"></rect>
                                </svg>
                            </span>

                        </div>

                    </div>

                    <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15" v-if="info">

                        <div class="text-center mb-13">

                            <h1 class="mb-3">{{info.nombre}}</h1>

                            <div class="text-muted fw-bold fs-5">
                                {{info.descripcion}}
                            </div>

                        </div>



                        <div class="mb-10">
                            <div class="fs-3 fw-bold mb-2">¿Qué es?</div>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">

                                <div class="fs-4 fw-bold text-gray-700 mb-5">{{info.informacion}}</div>
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
    import EventBus from "./event-bus"
    import moment from 'moment';
    import VueSweetalert2 from 'vue-sweetalert2';
    Vue.use(VueSweetalert2);


    export default {
        props: ['usuario', 'modulos'],
        data() {
            return {
                Modulos: [],

                acceso1: 0,
                acceso2: 0,
                acceso3: 0,
                acceso4: 0,
                acceso5: 0,
                acceso6: 0,
                acceso7: 0,
                acceso8: 0,
                acceso9: 0,
                info: '',
                solicitudAcceso: [],
                userInfo: [],
                username: '',
                password: '',
                acceso10: 0,
                acceso11: 0,
                acceso12: 0,
                acceso13: 0,
                acceso14: 0

            }
        },

        mounted: function () { /* Agrega mounted y con el siguiente contenido */
            this.Modulos = JSON.parse(this.modulos)
           
            this.LogInventario();

        },

     
        methods: {

            getpermiso: function () {
                EventBus.$emit('permisos.get');
            },
         

            formato: function (d) {
                return moment(d).format("DD/MM/YYYY");
            },
            formatohora: function (d) {
                return moment(d).format("hh:mm:ss");
            },
            getModulos: function () {

                this.Modulos = JSON.parse(this.modulos)


            },




            async LogInventario () {
               await axios.get('/userInfo').then((response) => {
                    this.userInfo = response.data

                    for (var i = this.userInfo.length - 1; i >= 0; i--) {
                        let user = this.userInfo[i]
                        this.username = user.username
                        this.password = user.pass





                    }
                })
            },

            getInfoModulo: function (modulo) {

                this.info = modulo;
            },
            SolicitarAcceso: function (info) {


                axios.get('/solicitudpendiente/' + info.id).then((response) => {
                    if (response.data == 2) {
                        axios.get('/dataAcceso/' + info.id).then((response) => {
                            this.solicitudAcceso = response.data
                            this.alert('error', 'Error', 'Ya solicitaste acceso a este modulo')
                        })

                    } else {
                        if (response.data == 1) {
                            axios.get('/solicitudAccesoModulo/' + info.id).then((response) => {
                                $('#enviado').modal('show');
                                this.alert('success', 'Éxito', 'Su solicitud de acceso fue ingresada')
                            })
                        }
                    }
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
        
            checkAccessModulo(modulo) {
                let permissions = this.usuario.permissions

                let access = permissions.find((obj => obj.permission_id == modulo.permiso_id)) ? true : false;
                return access
              
            },
            alert(Type, Title, Text) {
                Swal.fire({
                    icon: Type,
                    title: Title,
                    text: Text,
                })
            }



        }
    }
</script>
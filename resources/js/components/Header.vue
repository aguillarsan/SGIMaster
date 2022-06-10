<template>
    <div id="kt_header" class="header align-items-stretch" :style="colorHeader">

        <div class="container-fluid d-flex align-items-stretch justify-content-between">

            <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
                <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                    id="kt_aside_mobile_toggle">

                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                fill="black" />
                            <path opacity="0.3"
                                d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                fill="black" />
                        </svg>
                    </span>

                </div>
            </div>

            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                <a href="" class="d-lg-none">
                    <img alt="Logo" src="assets/media/logos/sgi.png" class="h-30px" />
                </a>
            </div>

            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">

                <div class="d-flex align-items-stretch" id="kt_header_nav">

                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">



                        <li class="breadcrumb-item text-dark" >
                            <h1 :style="colorHeader ? 'color:white !important':''">{{nameModule}}</h1>
                        </li>

                    </ul>
                </div>

                <div class="d-flex align-items-stretch flex-shrink-0">





                    <div class="d-flex align-items-center ms-1 ms-lg-3">

                        <div class="btn btn-icon  btn-light w-30px h-30px w-md-40px h-md-40px"
                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                            data-kt-menu-placement="bottom-end" @click.prevent="getModulos">

                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                                </svg>
                            </span>

                        </div>

                        <div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px" data-kt-menu="true">

                            <div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10"
                            :style="colorHeader">

                                <h3 class="text-white fw-bold mb-3">Modulos</h3>

                            </div>
                            <div class="card-body pt-2">
                                <div class="row g-0" style="margin:0 !important;">
                                    <ul class="nav nav-pills nav-pills-custom mb-3">
                                        <li class="nav-item mb-3 me-3 me-lg-6" v-for="modulo in modulos" v-if="checkAccessModulo(modulo)">
                                            <!--begin::Link-->
                                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4 "
                                                :href="modulo.ruta" target="__blank" >
                                                <!--begin::Icon-->
                                                <div class="nav-icon">
                                                    <svg class="bi" width="20" height="20" fill="currentColor">
                                                        <use
                                                            :xlink:href="'assets/bootstrap-icons/bootstrap-icons.svg#'+modulo.icono" />
                                                    </svg>
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Subtitle-->
                                                <span
                                                    class="nav-text text-gray-700 fw-bolder fs-6 lh-1">{{modulo.middle}}</span>
                                                <!--end::Subtitle-->
                                                <!--begin::Bullet-->
                                                <span
                                                    class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                                <!--end::Bullet-->
                                            </a>
                                            <!--end::Link-->
                                        </li>
                                    </ul>



                                </div>
                            </div>





                        </div>

                    </div>



                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">

                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px  symbol-circle "
                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                            data-kt-menu-placement="bottom-end">
                            <img :src="user.avatar" class="symbol-circle" alt="user" />
                        </div>

                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                            data-kt-menu="true">

                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">

                                    <div class="symbol symbol-50px me-5  symbol-circle">
                                        <img alt="Logo" :src="user.avatar" />
                                    </div>

                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">{{user.fullname}}


                                        </div>

                                    </div>
                                </div>

                                <div class="separator my-2"></div>


                                <div class="menu-item px-5">

                                    <router-link class="menu-link px-5"
                                        :to="{ path:`/admin/user/detail/`+user.id, params:{id: user.id}} " href="#">
                                        <i class="bi bi-person" style="padding:5px;font-size: 1.5rem!important;"></i>
                                        Perfil </a>
                                    </router-link>




                                </div>


                                <div class="menu-item px-5">


                                    <a href="#" @click.prevent="logout" class="menu-link px-5">

                                        <i class="bi bi-box-arrow-left"
                                            style="padding:5px;font-size: 1.5rem!important;"></i>
                                        Cerrar
                                        sesión </a>


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

    export default {
        props: ['user', 'nameModule','colorHeader'],
        data() {
            return {
                modulos: []
            }
        },
        created: function () {

        },
        methods: {
            getModulos() {
                axios.get('/GetModulos').then(response => {
                    this.modulos = response.data
                })
            },
            logout() {
                this.loadFunction()
                axios.get("/logout/user").then((response) => {
                    window.location.replace("/login");
                });
            },
            loadFunction() {
                let loader = this.$loading.show({
                    
                    container: this.fullPage ? null : this.$refs.formContainer,
                    canCancel: true,
                    onCancel: this.onCancel,
                });
              
                setTimeout(() => {
                    loader.hide()
                }, 1000)
            },
            checkAccessModulo(modulo) {
                let permissions = this.user.permissions

                let access = permissions.find((obj => obj.permission_id == modulo.permiso_id)) ? true : false;
                return access;

            },


        },

    }
</script>
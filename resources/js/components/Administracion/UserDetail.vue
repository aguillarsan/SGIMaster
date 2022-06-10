<template>

    <div id="kt_content_container" class="container">

        <div class="d-flex flex-column flex-lg-row">
            <div class="flex-column flex-lg-row-auto  w-lg-250px w-xl-350px mb-10">

                <div class="card mb-5 mb-xl-8">

                    <div class="card-body" v-if="load" style="height:400px;">
                        <div class="empty-state" data-height="400">
                            <div class="d-flex justify-content-center  mt-5">
                                <div class="spinner-border text-primary" role="status"
                                    style="width: 8rem;height: 8rem;color: #007bff!important;">
                                    <span class="sr-only" style="color: #191919">
                                        Cargando...
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" v-if="!load">

                        <div class="d-flex flex-center flex-column py-5">

                            <div class="image-input image-input-outline" data-kt-image-input="true">

                                <div class="image-input-wrapper w-125px h-125px" style="border-radius: 100px;"
                                    :style="'background-image: url('+user.avatar+')'"></div>

                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>

                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="avatar_remove">

                                </label>

                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>

                            </div>

                            <a href="#"
                                class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3 ">{{user.fullname}}</a>

                            <div class="mb-9">

                                <div class="badge badge-lg badge-light-primary d-inline">{{getRolName(user.role_user) ?
                                    getRolName(user.role_user) : 'N/A' }}
                                </div>

                            </div>





                        </div>

                        <div class="d-flex flex-stack fs-4 py-3">
                            <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                href="#kt_user_view_details" role="button" aria-expanded="false"
                                aria-controls="kt_user_view_details">Detalles
                                <span class="ms-2 rotate-180">

                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="black"></path>
                                        </svg>
                                    </span>

                                </span>
                            </div>

                        </div>
                        <div class="separator"></div>

                        <div id="kt_user_view_details" class="collapse show">
                            <div class="pb-5 fs-6">

                                <div class="fw-bolder mt-5">Email</div>
                                <div class="text-gray-600">
                                    <a href="#" class="text-gray-600 text-hover-primary">{{user.email ? user.email :
                                        'N/A'}}</a>
                                </div>

                                <div class="fw-bolder mt-5">Telefono</div>
                                {{user.telefono}}
                                <div class="text-gray-600">
                                </div>

                                <div class="fw-bolder mt-5">Área</div>
                                <div class="text-gray-600">{{user.area_id == 1 ? 'O&M':'Ingenieria' }}</div>

                                <div class="fw-bolder mt-5">Fecha de creación</div>
                                <div class="text-gray-600">{{dateFormat(user.created_at)}}</div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <div class="flex-lg-row-fluid ms-lg-15 ">

                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">

                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-kt-countup-tabs="true"
                            data-bs-toggle="tab" href="#kt_user_view_overview_security">Seguridad</a>
                    </li>



                </ul>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade active show" id="kt_user_view_overview_security" role="tabpanel">

                        <div class="card pt-4 mb-6 mb-xl-9">

                            <div class="card-header border-0">

                                <div class="card-title">
                                    <h2>Perfil</h2>
                                </div>

                            </div>

                            <div class="card-body pt-0 pb-5">
                                <!--begin::Table wrapper-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed gy-5"
                                        id="kt_table_users_login_session">
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                            <tr>
                                                <td>Email</td>
                                                <td>{{user.email ? user.email : 'N/A'}}</td>

                                            </tr>
                                            <tr>
                                                <td>Password</td>
                                                <td>******</td>
                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_update_password"
                                                        v-if="userAuth.rol == 1 || userAuth.id == userDetalId ">
                                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                    fill="black"></path>
                                                                <path
                                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                    fill="black"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Role</td>
                                                <td>{{getRolName(user.role_user) ? getRolName(user.role_user) : 'N/A' }}
                                                </td>
                                                <td class="text-end">
                                                    <button type="button" v-if="userAuth.rol == 1"
                                                        class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                        data-bs-toggle="modal" @click="getRoles"
                                                        data-bs-target="#kt_modal_update_role">
                                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                    fill="black"></path>
                                                                <path
                                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                    fill="black"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table wrapper-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        <!--begin::Card-->



                    </div>

                </div>

            </div>
            <div class="modal fade" id="kt_modal_update_password" tabindex="-1" style="display: none;"
                aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered mw-650px">

                    <div class="modal-content">

                        <div class="modal-header">

                            <h2 class="fw-bolder">Actualizar contraseña</h2>

                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">

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
                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                            <form id="kt_modal_update_password_form"
                                class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                <div class="fv-row mb-10 fv-plugins-icon-container" v-if="userAuth.id == userDetalId ">
                                    <div class="mb-1">
                                        <label class="required form-label fs-6 mb-2">Contraseña actual</label>
                                        <div class="position-relative mb-3">
                                            <input class="form-control form-control-lg form-control-solid"
                                                type="password" @change="verifyPass" placeholder=""
                                                name="current_password" id="current_password" v-model="current_password"
                                                autocomplete="off">
                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility" @click="showPass(1)">
                                                <i id="eye_actual" class="bi bi-eye-slash fs-2"></i>
                                            </span>
                                        </div>
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            v-if="!check_current_pass">
                                            <div>La contrseña ingresada es incorrecta
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
                                    <div class="mb-1">
                                        <label class=" required form-label fw-bold fs-6 mb-2">Nueva contraseña</label>
                                        <div class="position-relative mb-3">
                                            <input class="form-control form-control-lg form-control-solid"
                                                type="password" placeholder="" v-model="new_pass" name="new_password"
                                                id="new_password" @keyup.prevent="verifyPassWord" autocomplete="off">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility" @click="showPass(2)">
                                                <i id="eye_bi" class="bi bi-eye-slash fs-2"></i>

                                            </span>
                                        </div>

                                        <div class="d-flex flex-column">
                                            <li class="d-flex align-items-center py-2"
                                                v-for="items_passwd in items_password"
                                                :style="items_passwd.id == 6 && userAuth.rol == 1 && userAuth.id != userDetalId  ? 'visibility:hidden':'display:block'">
                                                <span class="bullet me-5" :class="items_passwd.cls"></span>
                                                {{items_passwd.name}}
                                            </li>

                                        </div>

                                    </div>

                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>

                                <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">

                                    <div class="mb-1">

                                        <label class=" required form-label fw-bold fs-6 mb-2">Confirmar
                                            contraseña</label>

                                        <div class="position-relative mb-3">
                                            <input class="form-control form-control-lg form-control-solid"
                                                type="password" placeholder="" v-model="repeat_pass" name="repeat_pass"
                                                id="repeat_pass" autocomplete="off">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility" @click="showPass(3)">
                                                <i id="eye_bi_repeat_pass" class="bi bi-eye-slash fs-2"></i>

                                            </span>
                                        </div>



                                    </div>


                                </div>

                                <div class="text-center pt-15">
                                    <button type="button" class="btn btn-light me-3"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" @click="changePass"
                                        v-if="userAuth.id == userDetalId  || userAuth.rol == 1" class="btn btn-primary"
                                        data-kt-users-modal-action="submit">
                                        <span class="indicator-label">Guardar cambios</span>
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>

                                <div>

                                </div>
                            </form>

                        </div>

                    </div>

                </div>

            </div>
            <div class="modal fade" id="kt_modal_update_role" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="fw-bolder">Actualizar Rol</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
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
                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                            <form id="kt_modal_update_role_form" class="form" action="#">
                                <div
                                    class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                    <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black">
                                            </rect>
                                            <rect x="11" y="14" width="7" height="2" rx="1"
                                                transform="rotate(-90 11 14)" fill="black"></rect>
                                            <rect x="11" y="17" width="2" height="2" rx="1"
                                                transform="rotate(-90 11 17)" fill="black"></rect>
                                        </svg>
                                    </span>
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="fw-bold">
                                            <div class="fs-6 text-gray-700">
                                                Tenga en cuenta que al cambiar el rol de un usuario, ese usuario perderá
                                                todos los privilegios que se le asignaron a al rol anterior</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fv-row mb-7 scroll-y h-400px">
                                    <label class="fs-6 fw-bold form-label mb-5 ">
                                        <span class="required">Seleccione un Rol</span>
                                    </label>
                                    <div v-for="rol in roles">
                                        <div class="d-flex">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="user_role" type="radio"
                                                    :value="rol.id" v-model="role_id"
                                                    id="kt_modal_update_role_option_0">
                                                <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                    <div class="fw-bolder text-gray-800">{{rol.name}}</div>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-5"></div>
                                    </div>


                                </div>
                                <div class="text-center pt-15">
                                    <button type="reset" class="btn btn-light me-3"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary" @click="updateRolUser"
                                        data-kt-users-modal-action="submit">
                                        <span class="indicator-label">Aceptar</span>
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </form>
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
    export default {
        props: ['userAuth'],
        data() {
            return {
                user: [],
                load: true,
                userDetalId: this.$route.params.id,
                items_password: [
                    { id: 1, name: '14 o más caracteres', check: false, cls: 'bg-secondary' },
                    { id: 2, name: 'Una letra mayúscula', check: false, cls: 'bg-secondary' },
                    { id: 3, name: 'Una letra minúscula', check: false, cls: 'bg-secondary' },
                    { id: 5, name: 'Debe contener un número', check: false, cls: 'bg-secondary' },
                    { id: 6, name: 'Debe ser diferente a la contraseña actual', check: false, cls: 'bg-secondary' },
                ],
                new_pass: '',
                letras_mayusculas: "ABCDEFGHYJKLMNÑOPQRSTUVWXYZ",
                numeros: "0123456789",
                letras_minusculas: "abcdefghyjklmnñopqrstuvwxyz",
                total: 0,
                confirm_passwd: '',
                repeat_pass: '',
                current_password: '',
                check_current_pass: true,
                roles: [],
                role_id: null



            }
        },
        created: function () {
            this.getUserInfo()
        },
        methods: {
            getUserInfo() {
                axios.get('/user/detail/info', {
                    params: {
                        user_id: this.$route.params.id
                    }
                }).then(response => {
                    this.user = response.data
                    this.load = false
                })
            },
            getRolName(role_user) {
                if (role_user) {
                    for (let index = 0; index < role_user.length; index++) {
                        const rolData = role_user[index];
                        return rolData.role.name


                    }
                }

            },
            dateFormat: function (d) {
                return moment(d).format("DD/MM/YY");
            },
            verifyPassWord() {
                //Validar mayuscula
                if (this.new_pass.match(/[A-Z]/)) {
                    let elementIndex = this.items_password.findIndex((obj => obj.id == 2));
                    this.items_password[elementIndex].cls = 'bg-success';
                    this.items_password[elementIndex].check = true;
                } else {
                    let elementIndex = this.items_password.findIndex((obj => obj.id == 2));
                    this.items_password[elementIndex].cls = 'bg-secondary';
                    this.items_password[elementIndex].check = false;
                }
                //Validar largo
                if (this.new_pass.length >= 14) {
                    let elementIndex = this.items_password.findIndex((obj => obj.id == 1));
                    this.items_password[elementIndex].cls = 'bg-success';
                    this.items_password[elementIndex].check = true;
                } else {
                    let elementIndex = this.items_password.findIndex((obj => obj.id == 1));
                    this.items_password[elementIndex].cls = 'bg-secondary';
                    this.items_password[elementIndex].check = false;
                }

                //Validar minuscula
                if (this.new_pass.match(/[a-z]/)) {
                    let elementIndex = this.items_password.findIndex((obj => obj.id == 3));
                    this.items_password[elementIndex].cls = 'bg-success';
                    this.items_password[elementIndex].check = true;
                } else {
                    let elementIndex = this.items_password.findIndex((obj => obj.id == 3));
                    this.items_password[elementIndex].cls = 'bg-secondary';
                    this.items_password[elementIndex].check = false;
                }
                //Validar numero

                if (this.new_pass.match(/\d/)) {
                    let elementIndex = this.items_password.findIndex((obj => obj.id == 5));
                    this.items_password[elementIndex].cls = 'bg-success';
                    this.items_password[elementIndex].check = true;
                } else {
                    let elementIndex = this.items_password.findIndex((obj => obj.id == 5));
                    this.items_password[elementIndex].cls = 'bg-secondary';
                    this.items_password[elementIndex].check = false;
                }
                //Validar que las claves sean distintas
                if (this.userAuth.id == this.userDetalId) {
                    if (this.new_pass != this.current_password) {
                        let elementIndex = this.items_password.findIndex((obj => obj.id == 6));
                        this.items_password[elementIndex].cls = 'bg-success';
                        this.items_password[elementIndex].check = true;
                    } else {
                        let elementIndex = this.items_password.findIndex((obj => obj.id == 6));
                        this.items_password[elementIndex].cls = 'bg-secondary';
                        this.items_password[elementIndex].check = false;
                    }
                }


            },

            changePass() {

                let success = this.items_password.filter(element => element.check == true)
                if (this.userAuth.rol == 1 && this.userAuth.id != this.userDetalId) {

                    if (success.length == 4) {
                        if (this.repeat_pass != this.new_pass) return Swal.fire('Las contraseñas no coinciden', '', 'error')
                        if (this.repeat_pass == this.new_pass) return this.updatePass()
                    } else {

                        return Swal.fire('La nueva contraseña no cumple con los requisitos', '', 'error')
                    }
                } else {
                    if (success.length == 5) {
                        this.verifyPass()
                        if (this.repeat_pass != this.new_pass) return Swal.fire('Las contraseñas no coinciden', '', 'error')
                        if (this.check_current_pass) return this.updatePass()
                    } else {
                        return Swal.fire('La nueva contraseña no cumple con los requisitos', '', 'error')
                    }
                }
            },
            showPass(val) {
                let input = document.getElementById(val == 2 ? "new_password" : val == 3 ? "repeat_pass" : (val == 1 ? "current_password" : ''));
                let icon = document.getElementById(val == 2 ? "eye_bi" : val == 3 ? "eye_bi_repeat_pass" : (val == 1 ? "eye_actual" : ''));

                if (input.type == 'password') return input.type = 'text', icon.className = 'bi bi-eye fs-2';
                if (input.type == 'text') return input.type = 'password', icon.className = 'bi bi-eye-slash fs-2'


            },
            verifyPass() {
                axios.get('/verify-pass', {
                    params: {
                        'password': this.current_password
                    }
                }).then(response => {

                    if (!response.data) return this.check_current_pass = false
                    if (response.data) return this.check_current_pass = true


                })
            },

            updatePass() {
                let formData = new FormData;
                formData.append('password', this.new_pass);
                formData.append('user_id', this.userDetalId);
                axios.post('/change-pass', formData).then(response => {
                    $("#kt_modal_update_password").modal('hide');
                    Swal.fire('Contraseña actualizada', '', 'success')
                    this.cleanForm()
                })
            },
            cleanForm() {
                this.confirm_passwd = ''
                this.repeat_pass = ''
                this.current_password = ''
                this.new_pass = ''
                this.check_current_pass = true
            },
            getRoles() {
                axios.get('/admin/get/rol').then(response => {
                    this.roles = response.data
                })
            },
            updateRolUser() {
                if (this.role_id) {
                    axios.get('/update/rol/user', {
                        params: {
                            'user_id': this.$route.params.id,
                            'role_id': this.role_id
                        }
                    }).then(response => {
                        $("#kt_modal_update_role").modal('hide')
                        Swal.fire('Rol actualizado', '', 'success')
                    })
                }

            }

        }
    }
</script>
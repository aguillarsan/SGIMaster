<template>
    <div id="kt_content_container" class="container">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-10">




                <div class="card-body card-flush mt-n20">
                    <div class="row">

                        <div class="col-lg-4 " v-for="cards in cards_user">
                            <div class=" rounded-2 px-6 py-5 card-rise  inactive-card">

                                <div class="symbol symbol-30px me-5 mb-8">
                                    <span class="symbol-label">

                                        <span class="svg-icon svg-icon-1 svg-icon-primary" id="svg">
                                            <svg class="bi svg-icon-primary" width="32" height="32" fill="currentColor">
                                                <use
                                                    :xlink:href="'assets/bootstrap-icons/bootstrap-icons.svg#'+cards.icono" />
                                            </svg>
                                        </span>

                                    </span>
                                </div>

                                <div class="m-0">

                                    <span
                                        class="text-gray-700 fw-boldest d-block fs-2qx lh-1 mb-1">{{cards.value}}</span>

                                    <span class="text-gray-500 fw-bold fs-6">{{cards.name}}</span>

                                </div>

                            </div>
                        </div>




                    </div>

                </div>



            </div>
        </div>
        <div class="card">

            <div class="card-header border-0 pt-6">

                <div class="card-title">

                    <div class="d-flex align-items-center position-relative my-1">

                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>

                        <input type="text" @keyup="searchUser" v-model="nameuser" data-kt-user-table-filter="search"
                            class="form-control form-control-solid w-250px ps-14" placeholder="Buscar usuario">
                    </div>

                </div>

                <div class="card-toolbar">

                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">






                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_user">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </span>
                            Añadir usuario
                        </button>

                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none"
                        data-kt-user-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete
                            Selected</button>
                    </div>




                </div>

            </div>

            <div class="card-body py-4">

                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            id="kt_table_users">

                            <thead>

                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">

                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                        style="width: 287.281px;">Usuario</th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending"
                                        style="width: 159.734px;">Rol</th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending"
                                        style="width: 159.734px;">Estado</th>

                                    <th class="min-w-125px sorting" rowspan="1" colspan="1" aria-label="Actions"
                                        style="width: 128.359px;">Opciones</th>
                                </tr>

                            </thead>

                            <tbody class="text-gray-600 fw-bold" v-if="!load">



                                <tr class="odd" v-for="(user, index) in users.data">

                                    <td class="d-flex align-items-center">

                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <router-link
                                                :to="{ path:`/admin/user/detail/`+user.id, params: {id: user.id}}"
                                                href="#">
                                                <div class="symbol-label">
                                                    <img :src="user.avatar" :alt="user.name" class="w-100">
                                                </div>
                                            </router-link>
                                        </div>

                                        <div class="d-flex flex-column">
                                            <router-link
                                                :to="{ path:`/admin/user/detail/`+user.id, params:{id: user.id}} "
                                                href="#" class="text-gray-800 text-hover-primary mb-1">{{user.fullname}}
                                            </router-link>
                                            <span>{{user.email}}</span>
                                        </div>

                                    </td>
                                    <td>
                                        <div>
                                            {{getRolName(user.role_user) ? getRolName(user.role_user) :'Sin rol'}}

                                        </div>

                                    </td>
                                    <td>
                                        <span :class="user.estado == 1 ? 'badge-light-success':'badge-light-danger'"
                                            class="badge ">{{user.estado == 1 ? 'Activo':'Inactivo'}}</span>
                                    </td>
                                    <td class="">

                                        <a href="#" @click.prevent="blockedAccount(user)" style="color:grey">
                                            <button type="button"
                                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="Tooltip on top">
                                                <span class="svg-icon svg-icon-1">
                                                    <span class="svg-icon  svg-icon-1x ">
                                                        <svg v-if="user.estado == 1" xmlns="http://www.w3.org/2000/svg"
                                                            width="5" height="10" fill="currentColor"
                                                            class="bi bi-lock-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                                        </svg>
                                                        <svg v-if="user.estado == 0" xmlns="http://www.w3.org/2000/svg"
                                                            width="10" height="10" fill="currentColor"
                                                            class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z" />
                                                        </svg>
                                                    </span>
                                                </span>
                                            </button>

                                        </a>


                                        <router-link :to="{ path:`/admin/user/detail/`+user.id, params: {id: user.id}}"
                                            style="color:grey">
                                            <button type="button"
                                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto">
                                                <span class="svg-icon svg-icon-3">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                    </svg>
                                                    </svg>
                                                </span>
                                            </button>
                                        </router-link>


                                    </td>

                                </tr>

                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <div class="card-body mt-5" v-if="load" style="height:400px;">
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
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center ">
                        </div>
                        <div class="col-sm-12 col-md-7 d-flex align-items-center  ">
                            <nav aria-label="pagination" class="pagination" role="navigation">
                                <vue-pagination :offset="4" :pagination="users" @paginate="getAllUsers()">
                                </vue-pagination>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="modal fade" id="kt_modal_add_user" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <h2 class="fw-bolder">Crear usuario</h2>
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" @click="closeModal">
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
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" id="modal_body_add_user">
                        <form id="kt_modal_add_user_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                            action="#">
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px"
                                style="max-height: 629px;">
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-bold fs-6 mb-2">Nombre</label>
                                    <input type="text" name="user_name" class="form-control  mb-3 mb-lg-0"
                                        v-model="form.name">
                                    <div class="fv-plugins-message-container invalid-feedback">

                                    </div>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-bold fs-6 mb-2">Apellido</label>
                                    <input type="text" name="user_name" class="form-control  mb-3 mb-lg-0"
                                        v-model="form.last_name">
                                    <div class="fv-plugins-message-container invalid-feedback">

                                    </div>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-bold fs-6 mb-2">Email</label>
                                    <input type="email" name="user_email" class="form-control  mb-3 mb-lg-0"
                                        v-model="form.email" @change="validateEmail()">
                                    <div class="fv-plugins-message-container invalid-feedback">{{errorEmailTxt}}</div>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fw-bold fs-6 mb-2">Nombre de usuario</label>
                                    <input type="text" name="user_email" class="form-control  mb-3 mb-lg-0"
                                        v-model="form.username" disabled="true">
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fw-bold fs-6 mb-2 required">Rol</label>
                                    <select class="form-select" aria-label="Select example" v-model="form.rol_id">
                                        <option :value="rol.id" v-for="(rol,key) in roles">{{rol.name}}</option>
                                    </select>
                                </div>
                                <div id="crm_list" class="fv-row mb-7 fv-plugins-icon-container"
                                    v-if="form.rol_id == 12   || form.rol_id == 5 ">
                                    <label class="fw-bold fs-6 mb-2 required">Crm</label>
                                    <select class="form-select" aria-label="Select example" v-model="form.crm_id">
                                        <option :value="crm.id" v-for="(crm,key) in crms">{{crm.name}}</option>

                                    </select>
                                </div>
                            </div>
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3"
                                   @click="closeModal">Cancelar</button>
                                <button type="button" @click="createUser" id="kt_new_user_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">Crear</span>
                                    <span class="indicator-progress">Creando...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    import VuePagination from '../VuePagination.vue';
    export default {
        components: {
            'vue-pagination': VuePagination,
        },
        data() {
            return {
                load: true,
                users: {
                    'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0

                },
                option_id: '',
                modulo: 1,
                nameuser: '',
                setTimeoutBuscador: '',
                cards_user: [{ id: 1, name: 'Total usuarios', value: 0, icono: 'people-fill' }],
                roles: [
                    { id: 1, name: 'Administrador' },
                    { id: 12, name: 'Ingeniero O&M' },
                    { id: 5, name: 'Ingeniero Électrico' },
                    { id: 5, name: 'Ingeniero Zonal' },
                    { id: 8, name: 'Control O&M' },
                    { id: 14, name: 'Control Ingenieria' },
                    { id: 26, name: 'PM Tikcetera conexiones' },
                    { id: 34, name: 'CNT' },
                    { id: 35, name: 'Supervisor ITOS' },
                    { id: 36, name: 'Analista' },
                ],
                crms: [
                    { id: 1, name: 'Norte' },
                    { id: 2, name: 'Centro Norte' },
                    { id: 3, name: 'Metropolitano' },
                    { id: 4, name: 'Centro Sur' },
                    { id: 5, name: 'Sur' },
                    { id: 6, name: 'Austral' }
                ],
                form: {
                    name: '',
                    last_name: '',
                    email: '',
                    password: '',
                    username: '',
                    rol_id: '',
                    crm_id: '',
                    zona_id: ''
                },
                validation: {
                    name: false,
                    last_name: false,
                    email: false,
                    password: false,
                    rol_id: false,
                    crm_id: false,
                    zona_id: false,
                    emailFormat: false
                },
                emailRegex: /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i,
                errorEmailTxt: '',
                errorPassTxt: '',
                formData: new FormData

            }
        },

        created: function () {
            this.getAllUsers()
        },
        watch: {

            'form.name'(text) {
                text ? this.validation.name = true : this.validation.name = false
            },
            'form.last_name'(text) {
                text ? this.validation.last_name = true : this.validation.last_name = false
            },
            'form.email'(text) {
                if (this.emailRegex.test(text)) {
                    this.validation.emailFormat = true
                    this.errorEmailTxt = ''
                } else {
                    this.errorEmailTxt = 'El correo electrónico ingresado no es valido'
                    this.validation.emailFormat = false
                }

            },
            'form.password'(text) {
                if (text.length < 14) {
                    this.validation.password = false
                    this.errorPassTxt = 'La contraseña debe tener minimo 14 caracteres'
                } else if (text.length >= 14) {
                    this.validation.password = true
                    this.errorPassTxt = ''
                }
            },
            'form.rol_id'(text) {
                text ? this.validation.rol_id = true : this.validation.rol_id = false
            },


        },
        computed: {

        },
        methods: {
            getAllUsers() {
                axios.get(`/GetAllUsers?page=${this.users.current_page}&user=${this.nameuser}`).then((response) => {
                    this.users = response.data;
                    this.cards_user.map(function (card) {
                        if (card.id == 1) {
                            card.value = response.data.total;
                        }
                    });
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
            searchUser() {

                clearTimeout(this.setTimeoutBuscador)
                this.setTimeoutBuscador = setTimeout(() => this.getAllUsers(), 300);
            },
            blockedAccount(user) {

                Swal.fire({
                    icon: 'warning',
                    title: 'Atención',
                    text: user.estado == 1 ? 'Esta seguro que desea bloquear esta cuenta?' : 'Esta seguro que desea desbloquear esta cuenta?',

                    showCancelButton: true,
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'

                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        axios.get('/update/estate/user', {
                            params: {
                                'user_id': user.id
                            }
                        }).then(response => {
                            Swal.fire('Usuario actualizado!', '', 'success')
                            this.getAllUsers()
                        })

                    }
                })


            },
            validateEmail() {
                axios.get('/admin/create/user/validateEmail', {
                    params: {
                        'email': this.form.email
                    }
                }).then(response => {
                    if (response.data) {
                        this.errorEmailTxt = 'El email ingresado ya existe'
                        this.validation.email = false;
                    } else {
                        this.validation.email = true;
                        this.errorEmailTxt = ''
                        let usr = this.form.email.split('@')[0]
                        this.form.username = usr
                    }
                })
            },
            showPass() {
                let input = document.getElementById("password")
                let icon = document.getElementById("eye_pass");
                if (input.type == 'password') {
                    input.type = 'text'
                    icon.className = 'bi bi-eye-slash fs-2'
                } else {
                    input.type = 'password';
                    icon.className = 'bi bi-eye fs-2'
                }
            },
            createUser() {
                let button = document.getElementById("kt_new_user_submit");
                if (this.form.rol_id == 12 || this.form.rol_id == 5) {
                    if (this.validation.name && this.validation.email && this.validation.last_name && this.validation.rol_id && this.validation.crm_id && this.validation.emailFormat) {
                        button.setAttribute("data-kt-indicator", "on");
                        button.disabled = true;
                        this.setFormData();
                    }
                } else {
                    if (this.validation.name && this.validation.email && this.validation.last_name && this.validation.rol_id && this.validation.emailFormat) {
                        button.setAttribute("data-kt-indicator", "on");
                        button.disabled = true;
                        this.setFormData();
                    }
                }
            },
            setFormData() {
                this.formData.append('username', this.form.username);
                this.formData.append('name', this.form.name);
                this.formData.append('last_name', this.form.last_name);
                this.formData.append('password', this.generateRandomPassword(8));
                this.formData.append('role_id', this.form.rol_id);
                this.formData.append('crm_id', this.form.crm_id);
                this.formData.append('email', this.form.email);
                this.storeUser()
            },
            storeUser() {
                axios.post('/admin/create/user', this.formData).then(response => {
                    $("#kt_modal_add_user").modal('hide');
                    Swal.fire('Usuario creado con éxito, se le envio un email al usuario con las credenciales', '', 'success')
                    let user = response.data
                    this.sendEmail(user)
                }).catch(
                    error => {
                        Swal.fire('Se produjo un error al intentar crear al usuario!', '', 'error')
                    });
            },
            generateRandomPassword(num) {
                const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                let randomPassword = Math.random().toString(36).substring(0, num);
                this.form.password = randomPassword
                return this.form.password;
            },
            sendEmail(user) {
                let formData = new FormData
                formData.append('temporal_password', this.form.password)
                formData.append('user_id', user)
                axios.post('/send/mail/user/created', formData).then(response => {
                    this.cleanForm();
                })
            },
            cleanForm() {
                let button = document.getElementById("kt_new_user_submit");
                button.removeAttribute("data-kt-indicator");
                button.disabled = false;
                this.form.username = '';
                this.form.name = '';
                this.form.last_name = '';
                this.form.rol_id = '';
                this.form.crm_id = '';
                this.form.email = '';
                this.form.password = '';
                this.validation.name = false;
                this.validation.email = false;
                this.validation.last_name = false;
                this.validation.rol_id = false;
                this.validation.crm_id = false;
                this.validation.emailFormat = false;
                this.errorEmailTxt = ''
            },
            closeModal(){
                $("#kt_modal_add_user").modal('hide')
            }


        }
    }
</script>

<style>
    .inactive-card {
        background-color: white
    }
</style>
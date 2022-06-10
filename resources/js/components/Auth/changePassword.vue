<template>
    <div class="d-flex flex-column flex-root">
        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

                <a class="mb-12">
                    <img alt="Logo" src="assets/media/logos/sgi-l-w.png" class="h-200px">
                </a>
                <div class="w-lg-550px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                        id="kt_new_password_form">
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Actualización de contraseña</h1>
                        </div>
                        <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
                            <div class="mb-1">
                                <label class="form-label fw-bolder text-dark fs-6">Nueva Contraseña</label>
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid" type="password"
                                        placeholder="" @keyup.prevent="verifyPassWord" name="password"
                                        v-model="new_pass" autocomplete="off">
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <li class="d-flex align-items-center py-2" v-for="items_passwd in items_password"
                                        :style="items_passwd.id == 6 && userAuth.rol == 1 && userAuth.id != userDetalId  ? 'visibility:hidden':'display:block'">
                                        <span class="bullet me-5" :class="items_passwd.cls"></span>
                                        {{items_passwd.name}}
                                    </li>

                                </div>
                            </div>

                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <label class="form-label fw-bolder text-dark fs-6">Confirmar Contraseña</label>
                            <input class="form-control form-control-lg form-control-solid" @change="checkpass"
                                type="password" placeholder="" v-model="confirm_passwd" name="confirm-password"
                                autocomplete="off">
                            <div class="fv-plugins-message-container invalid-feedback">{{error}}</div>
                        </div>
                        <div class="text-center">
                            <button type="button" @click="updatePass" id="kt_new_password_submit"
                                class="btn btn-lg btn-primary fw-bolder">
                                <span class="indicator-label">Aceptar</span>
                                <span class="indicator-progress">Espere...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <div></div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                items_password: [
                    { id: 1, name: '14 o más caracteres', check: false, cls: 'bg-secondary' },
                    { id: 2, name: 'Una letra mayúscula', check: false, cls: 'bg-secondary' },
                    { id: 3, name: 'Una letra minúscula', check: false, cls: 'bg-secondary' },
                    { id: 4, name: 'Debe contener un número', check: false, cls: 'bg-secondary' },

                ],
                new_pass: '',
                confirm_passwd: '',
                error: ''
            }
        },
        methods: {
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
                    let elementIndex = this.items_password.findIndex((obj => obj.id == 4));
                    this.items_password[elementIndex].cls = 'bg-success';
                    this.items_password[elementIndex].check = true;
                } else {
                    let elementIndex = this.items_password.findIndex((obj => obj.id == 4));
                    this.items_password[elementIndex].cls = 'bg-secondary';
                    this.items_password[elementIndex].check = false;
                }



            },
            checkpass() {
                if (this.new_pass != this.confirm_passwd) {
                    this.error = 'Las contraseñas no coinciden'
                } else {
                    this.error = ''
                }

            },
            updatePass() {
                let success = this.items_password.filter(element => element.check == true)
                if (success.length == 4) {
                    let button = document.getElementById("kt_new_password_submit");
                    button.setAttribute("data-kt-indicator", "on");
                    button.disabled = true;

                    let formData = new FormData;
                    formData.append('password', this.new_pass);
                    formData.append('updateOldPass', true);
                    axios.post('/change-pass', formData).then(response => {
                        this.alert()
                        window.location.replace('/modulos')
                    })
                }
            },
            alert() {
                let timerInterval
                Swal.fire({
                    icon: 'success',
                    title: 'Contraseña actualizada, serás redirigido al home en',
                    html: '<b></b> s.',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {

                })
            }

        }

    }

</script>
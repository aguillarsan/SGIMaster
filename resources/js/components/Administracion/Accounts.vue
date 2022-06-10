<template>
    <div id="kt_content_container" class="container">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-10">
                <div class="card-body card-flush mt-n20">
                    <div class="row">
                        <div class="col-lg-4 ">
                            <div class=" rounded-2 px-6 py-5 card-rise  inactive-card">
                                <div class="symbol symbol-30px me-5 mb-8">
                                    <span class="symbol-label">

                                        <span class="svg-icon svg-icon-1 svg-icon-primary" id="svg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                <path fill-rule="evenodd"
                                                    d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                            </svg>
                                        </span>

                                    </span>
                                </div>
                                <div class="m-0">

                                    <span class="text-gray-700 fw-boldest d-block fs-2qx lh-1 mb-1">{{accounts.length}}</span>

                                    <span class="text-gray-500 fw-bold fs-6">Cuentas solicitadas</span>

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
                                        style="width: 287.281px;">Nombre</th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending"
                                        style="width: 159.734px;">Apellido</th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending"
                                        style="width: 159.734px;">Email</th>
                                    <th class="min-w-125px sorting" rowspan="1" colspan="1" aria-label="Actions"
                                        style="width: 128.359px;">Cargo</th>
                                    <th class="min-w-125px sorting" rowspan="1" colspan="1" aria-label="Actions"
                                        style="width: 128.359px;">Crm</th>
                                    <th class="min-w-125px sorting" rowspan="1" colspan="1" aria-label="Actions"
                                        style="width: 128.359px;">Zona</th>
                                    <th class="min-w-125px sorting" rowspan="1" colspan="1" aria-label="Actions"
                                        style="width: 128.359px;">Opciones</th>

                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold" v-if="!load && accounts.length != 0">

                                <tr class="odd" v-for="(account, index) in accounts">

                                    <td >
                                        {{account.name}}
                                    </td>
                                    <td >
                                        {{account.last_name}}
                                    </td>
                                    <td >
                                        {{account.email}}
                                    </td>
                                    <td >
                                        <div
                                            v-text="account.cargo_id == 1 ?'Subgerente crm':(account.cargo_id == 2 ? ' Ingeniero O&M':(account.cargo_id == 3 ? 'Electrico':(account.cargo_id == 4 ? 'Lider zonal':''))) ">
                                            Subgerente crm
                                        </div>

                                    </td>
                                    <td>

                                    </td>
                                    <td></td>
                                    <td>
                                        <button type="button"
                                            class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" @click="CreateUser(account)">
                                            <span class="svg-icon svg-icon-3">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                                                </svg>
                                            </span>
                                        </button>
                                        <button type="button"
                                            class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto">
                                            <span class="svg-icon svg-icon-3">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z" />
                                                </svg>
                                            </span>
                                        </button>
                                    </td>

                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
                <div v-if="accounts.length == 0">
                    <div class="card-px text-center py-20 my-10">
                        <!--begin::Title-->
                        <h2 class="fs-2x fw-bolder mb-10">No existe ningún registro</h2>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <p class="text-gray-400 fs-4 fw-bold mb-10">Actualmente no hay cuentas solicitadas
                        </p>
                        <div class="text-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"
                                class="bi bi-inbox-fill" viewBox="0 0 16 16">
                                <path
                                    d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm-1.17-.437A1.5 1.5 0 0 1 4.98 3h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1 .106.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z" />
                            </svg>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        data() {
            return {
                load: false,
                accounts: []
            }
        },
        created: function () {
            this.getData()
        },
        methods: {
            getData() {
                axios.get('/GetAccounts').then((response) => {
                    this.accounts = response.data
                })
            },
            CreateUser: function (account) {
                axios.get('/CreateUser/' + account.id).then((response) => {
                    this.getData();
                    Swal.fire('Cuenta aprobada', '', 'success')
                  
                })
            },
        }
    }
</script>
<style>
    .inactive-card {
        background-color: white
    }
</style>
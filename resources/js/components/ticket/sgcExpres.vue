<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="modalCreateSgcExpres" role="dialog"
            tabindex="-1">
            <div class="modal-dialog  ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header"
                        style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                        <h5 class="modal-title barlow bold" style="color: white">
                            Crear SGC Exprés
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="barlow semi_bold">Proveedor</label>
                            <div class="col-lg-12 col-md-6">
                                <div id="search_proveedor">
                                    <div class="input-group" id="input_group">
                                        <input class="form-control " id="SearchproveedorDontDisplay" name="Proveedor"
                                            placeholder="Buscar proveedor" type="text" v-model="name_proveedor"
                                            v-on:keyup="BuscarProveedor" />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fas fa-search">
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="SelectProveedor" v-if="this.info_proveedor != '' ">
                                    <div class="input-group">
                                        <input class="form-control" disabled="true" name=""
                                            style="background-color:#1e5e98;color:white;" type=""
                                            v-bind:value="info_proveedor" />
                                        <div class="input-group-append">
                                            <div @click.prevent="searchNewProveedor()" class="input-group-text "
                                                style="cursor: pointer  ">
                                                <i class="fas fa-times boxBounce "
                                                    style="color:#fc544b;font-size: 18px;">
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input style="display: none" type="text" v-bind:value="proveedor_id" />
                                <div id="errorProveedor" style="display: none">
                                    <p style="color: red">
                                        Favor seleccionar proveedor
                                    </p>
                                </div>
                                <div class="s_l" id="listProveedor"
                                    v-if="proveedores.length != 0 && this.info_proveedor == '' "
                                    :style="'width:'+width_box+'px !important;'">
                                    <div class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                        <div v-for="proveedor in proveedores">
                                            <a @click.prevent="SelectProveedor(proveedor)" class="changeColor" href=""
                                                id="selectProveedorvalue" style="color: black">
                                                {{proveedor.PROVEEDOR.toLowerCase()}} - {{proveedor.RUT_PROVEEDOR}}
                                                <hr style="margin-top: -1px;" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <p style="color:red" v-if="error_prov">Debe seleccionar a un proveedor</p>
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="barlow semi_bold">Trabajadores</label>
                            <input class="form-control" @keyup="filterEmployees" v-model="search" type="text"
                                placeholder="Buscar" v-if="info_proveedor != ''">
                            <ul class="list-group" v-if="info_proveedor != ''"
                                style="max-height: 350px;overflow-y:scroll;margin-top: 10px;">
                                <a  v-for="(employe,key) in employes" style="cursor: pointer;"  @click="adrOrRmRemoveEmployee(employe)">
                                    <li class="list-group-item d-flex justify-content-between align-items-center"
                                       
                                       >
                                        {{employe.name}} {{employe.last_name}}

                                    </li>
                                </a>

                                <p style="color:red" v-if="error_employee">Debe seleccionar a un trabajador del listado
                                </p>

                            </ul>

                        </div>
                        <div class="form-group">
                            <label class="barlow semi_bold">Trabajadores seleccionados</label>
                            <div class="row">
                                <div class="col-lg-6" v-for="employe in employe_select">
                                    <span class="badge badge-primary" style="border-radius: 5px;">{{employe.name}} <i class=""></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99);">
                        <button class="btn btn-secondary btn-grey" @click="createSgc">
                            Crear
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import EventBus from "../event-bus"



    export default {
        data() {
            return {

                name_proveedor: '',
                proveedores: [],
                proveedor_id: '',
                proveedor_info_select: '',
                info_proveedor: '',
                width_box: '',
                employes: [],
                employe_select: [],
                error_prov: false,
                error_employee: false,
                search: ''


            }
        },

        created: function () {





        },

        methods: {


            searchNewProveedor: function () {
                document.getElementById('SelectProveedor').style.display = 'none';
                document.getElementById('search_proveedor').style.display = '';
                this.info_proveedor = '';
                this.proveedor_id = '';
            },
            SelectProveedor: function (proveedor) {
                this.proveedor_info_select = proveedor.PROVEEDOR.toLowerCase()
                this.proveedor_id = proveedor.id;
                this.info_proveedor = this.proveedor_info_select;
                this.proveedores = []
                this.getEmployees()

                document.getElementById('search_proveedor').style.display = 'none';
                document.getElementById('SelectProveedor').style.display = '';
                document.getElementById('listProveedor').style.display = 'none';
                document.getElementById('errorProveedor').style.display = 'none';
            },
            getEmployees() {
                axios.get('/employess/acretidation/proveedores', {
                    params: {
                        'proveedor_id': this.proveedor_id,
                        'name_employee': this.search
                    }
                }).then(response => {
                    this.employes = response.data
                })
            },
            BuscarProveedor: function () {
                console.log(document.getElementById("input_group").clientWidth)
                this.width_box = document.getElementById("input_group").clientWidth;
                if (this.name_proveedor.length >= 3) {
                    axios.get(`/GetProveedor?proveedor=${this.name_proveedor}`).then((response) => {
                        this.proveedores = response.data;
                    })
                    var box = document.getElementById('listProveedor');
                    box.style.display = '';
                } else {
                    this.proveedores = '';
                    var box = document.getElementById('listProveedor');
                    box.style.display = 'none';
                }
            },
            adrOrRmRemoveEmployee(employee) {

            
                this.employe_select.push({ employee_id: employee , name: employee.name + ' ' + employee.last_name})
               


            },
            createSgc: function () {
                this.validate();
                if (this.proveedor_id != "" && this.employe_select.length != 0) {

                    let formData = new FormData;
                    formData.append('proveedor_id', this.proveedor_id);
                    formData.append('ticket_id', this.$route.params.id);

                    axios.post('/create/sgc/express', formData).then(response => {

                        $("#modalCreateSgcExpres").modal('hide')
                        let sgc_id = response.data
                        this.alert_fn('success', 'Éxito', 'Solicitud nro° ' + sgc_id + ' creada')
                        EventBus.$emit('sgcSlc.load')

                        for (let index = 0; index < this.employe_select.length; index++) {
                            const data_emp = this.employe_select[index];
                            let formData = new FormData
                            formData.append('solicitud_id', sgc_id)
                            formData.append('employee_id', data_emp.employee_id)
                            axios.post('/register/employee/sgc', formData).then(response => {

                            }).catch(
                                error => {
                                    this.alert_fn('error', 'Error', 'Se produjo un error al registrar los datos del empleado')
                                });

                        }

                    }).catch(
                        error => {
                            this.alert_fn('error', 'Error', 'Se produjo un error al crear su solicitud')
                        });


                }



            },

            validate: function () {
                this.error_prov = this.proveedor_id == "" ? true : false
                this.error_employee = this.employe_select.length == 0 ? true : false
            },
            alert_fn: function (Type, Title, Text) {
                Swal.fire({
                    type: Type,
                    title: Title,
                    text: Text,
                })
            },
            filterEmployees() {
                this.getEmployees()
            }



        },



    }
</script>
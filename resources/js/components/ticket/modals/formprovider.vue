<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="form_provider_ticket" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg" style="max-width: 1300px;">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Formulario
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="form_sgc_ticket" style="display: none">
                            <div class="row mt-4">
                                <div class="col-12 col-lg-8 offset-lg-2">
                                    <div class="wizard-steps">
                                        <div class="wizard-step " v-bind:class="step == 4 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-edit">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Datos del trabajo
                                            </div>
                                        </div>
                                        <div class="wizard-step" v-bind:class="step == 5 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-file-upload">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Archivos
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="wizard-content mt-2">
                                <div class="wizard-pane" id="wizard1">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group ">
                                                <label class=" barlow semi-bold">
                                                    Número de trabajo *
                                                </label>
                                                <select @change.prevent="show_form" class="form-control select barlow regular" v-model="trabajo_select">
                                                    <option :value="trabajo" v-for="trabajo in array_job">
                                                        {{trabajo[0].id}} - {{trabajo[0].proveedor.PROVEEDOR}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group ">
                                                <label class=" barlow semi-bold">
                                                    Nro° de ticket *
                                                </label>
                                                <input class="form-control" name="" type="text" v-model="numero_ticket"/>
                                                <div id="errorAreaTrabajo" style="display: none">
                                                    <p style="color: red">
                                                        Favor seleccionar el nro° de ticket
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>
                                                    Sitio
                                                </label>
                                                <input class="form-control" disabled="true" name="" type="text" v-model="nem_site"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>
                                                    Proveedor
                                                </label>
                                                <input class="form-control" disabled="true" name="" type="text" v-model="name_proveedor"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>
                                                    Tipo Moneda
                                                </label>
                                                <input class="form-control" disabled="true" name="" type="text" v-model="moneda"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>
                                                    Activo
                                                </label>
                                                <currency-input class="form-control " currency="USD" locale="de" v-model="activo">
                                                </currency-input>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>
                                                    Servicio
                                                </label>
                                                <currency-input class="form-control " currency="USD" locale="de" v-model="servicio">
                                                </currency-input>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group ">
                                                <label class=" barlow semi-bold">
                                                    Área de trabajo *
                                                </label>
                                                <select class="form-control select barlow regular" name="AreaTrabajo" v-model="
                                                area_trabajo_id">
                                                    <option v-bind:value="[trabajo.id,trabajo.area]" v-for="trabajo in data_form.area">
                                                        {{trabajo.area}}
                                                    </option>
                                                </select>
                                                <div id="errorAreaTrabajo" style="display: none">
                                                    <p style="color: red">
                                                        Favor seleccionar área de trabajo
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class=" barlow semi-bold">
                                                    Tipo de trabajo *
                                                </label>
                                                <select class="form-control select barlow regular" name="TipoTrabajo" v-model="tipo_trabajo_id">
                                                    <option v-bind:value="[Tipo_trabajo.id,Tipo_trabajo.nombre_trabajo]" v-for="Tipo_trabajo in data_form.tipoTrabajo">
                                                        {{Tipo_trabajo.nombre_trabajo}}
                                                    </option>
                                                </select>
                                                <div id="errorTipoTrabajo" style="display: none">
                                                    <p style="color: red">
                                                        Favor seleccionar el tipo de trabajo
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class=" barlow semi-bold">
                                                    Fecha ejecución*
                                                </label>
                                                <div v-if="trabajo_ejecutado == 1">
                                                    <input class="form-control" disabled="true" name="" type="text" v-model="fecha_ejecucion"/>
                                                </div>
                                                <div v-if="trabajo_ejecutado == 0">
                                                    <input class="form-control" name="" type="date" v-model="fecha_ejecucion"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group ">
                                                <label class=" barlow semi-bold">
                                                    Tipo boleta  *
                                                </label>
                                                <select class="form-control select barlow regular" v-model="tipo_boleta_id">
                                                    <option v-bind:value="[Tipo_boleta.id,Tipo_boleta.descripcion]" v-for="Tipo_boleta in data_form.boleta">
                                                        {{Tipo_boleta.descripcion}}
                                                    </option>
                                                </select>
                                                <div id="errorTipoBoleta" style="display: none">
                                                    <p style="color: red">
                                                        Favor seleccionar tipo de boleta
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group ">
                                                <label class=" barlow semi-bold">
                                                    Nro boleta
                                                </label>
                                                <input class="form-control " id="" style="color:#999999" type="text" v-model="nro_boleta"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group ">
                                                <label class="barlow semi-bold">
                                                    Formato de pago *
                                                </label>
                                                <select class="form-control select barlow regular" v-model="tipo_gasto_id">
                                                    <option v-bind:value="[Tipo_gasto.id,Tipo_gasto.nombre_gasto]" v-for="Tipo_gasto in data_form.gastos">
                                                        {{Tipo_gasto.nombre_gasto}}
                                                    </option>
                                                </select>
                                                <div id="errorTipoGasto" style="display: none">
                                                    <p style="color: red">
                                                        Favor seleccionar formato de pago
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group ">
                                                <label class=" barlow semi-bold">
                                                    Tipo contingencia*
                                                </label>
                                                <select class="form-control select barlow regular" disabled="true" id="tipoGasto" v-model="contingencia_id">
                                                    <option v-bind:value="Tipo_contingencia.id" v-for="Tipo_contingencia in Tipo_contingencias">
                                                        {{Tipo_contingencia.nombre_contingencia}}
                                                    </option>
                                                </select>
                                                <div id="errorTipoContingencia" style="display: none">
                                                    <p style="color: red">
                                                        Favor seleccionar una contingencia
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class=" barlow semi-bold">
                                                    Detalle del trabajo*
                                                </label>
                                                <textarea class="form-control" v-model="descripcion">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button @click.prevent="add_data_to_table()" class="btn btn-primary">
                                        <i class="fas fa-plus">
                                        </i>
                                        Agregar
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class=" table-responsive project-list project-table">
                                            <table class="table table-hover table-striped ">
                                                <thead>
                                                    <th>
                                                        N° trabajo
                                                    </th>
                                                    <th>
                                                        N° ticket
                                                    </th>
                                                    <th>
                                                        Descripción
                                                    </th>
                                                    <th>
                                                        Proveedor
                                                    </th>
                                                    <th>
                                                        Costos
                                                    </th>
                                                    <th>
                                                        Fecha ejecución
                                                    </th>
                                                    <th>
                                                        Tipo boleta
                                                    </th>
                                                    <th>
                                                        Opciones
                                                    </th>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="data_table in data_table_show">
                                                        <td>
                                                            <div style="margin-top: 5px;">
                                                                <span class="badge verde blanco barlow semi_bold" style="border-radius: 5px;">
                                                                    {{data_table.numero_trabajo}}
                                                                </span>
                                                            </div>
                                                            <div style="margin-top: 5px;">
                                                                <span class="badge azul blanco barlow semi_bold" style="border-radius: 5px;">
                                                                    {{data_table.area_trabajo}}
                                                                </span>
                                                            </div>
                                                            <div style="margin-top: 5px;">
                                                                <span class="badge rosa blanco barlow semi_bold" style="border-radius: 5px;">
                                                                    {{data_table.tipo_trabajo}}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="badge blue blanco barlow semi_bold" style="border-radius: 5px;">
                                                                {{data_table.numero_ticket}}
                                                            </span>
                                                            <div style="margin-top: 5px;">
                                                                <span class="badge barlow semi_bold azul blanco" style="border-radius: 5px;font-size: 12px;">
                                                                    {{data_table.sitio}}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{data_table.descripcion}}
                                                        </td>
                                                        <td>
                                                            <div class="barlow semi_bold" style="font-size: 13px;">
                                                                {{data_table.proveedor}}
                                                            </div>
                                                            <div style="margin-top: 5px;">
                                                                <span class="badge verde blanco barlow semi_bold" style="border-radius: 5px;">
                                                                    {{data_table.formato_pago}}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div v-if="data_table.activo != null ">
                                                                <div>
                                                                    <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                        ACTIVOS
                                                                    </strong>
                                                                </div>
                                                                <div class="barlow regular">
                                                                    ${{formatPrice(data_table.activo)}}
                                                                </div>
                                                            </div>
                                                            <div v-if="data_table.servicio != null ">
                                                                <div>
                                                                    <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                        SERVICIOS
                                                                    </strong>
                                                                    <div class="barlow regular">
                                                                        ${{formatPrice(data_table.servicio)}}
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="barlow regular">
                                                                {{data_table.fecha_ejecucion}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="barlow regular">
                                                                <strong>
                                                                    {{data_table.boleta}}
                                                                </strong>
                                                                <div>
                                                                    {{data_table.nro_boleta}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-danger ">
                                                                <i class="fas fa-times-circle">
                                                                </i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                     
                       
                    </div>
                </div>
            </div>
        </div>
         <fomulario-ticket></fomulario-ticket>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    import EventBus from "../event-bus";
    import formticket from "../formulario.vue";
    export default{
        components:{
            'fomulario-ticket':formticket
        },
     
        data() {
            return {
                
                step:1,
                data_job:'',
                ticket_created:'',
                ticket_not_created:'',
                data_form:'',
                area_trabajo_id:'',
                tipo_trabajo_id:'',
                array_job:'',
                trabajo_select:'',
                site_id:'',
                nem_site:'',
                descripcion:'',
                trabajo_ejecutado:'',
                fecha_ejecucion:'',
                name_proveedor:'',
                proveedor_id:'',
                activo:0,
                servicio:0,
                tipo_moneda_id:'',
                moneda:'',
                nro_boleta:'',
                tipo_boleta_id:'',
                tipo_gasto_id:'',
                contingencia_id:'',
                tipo_gasto_id:'',
                contingencia_id:'',
                Tipo_contingencias:[],
                data_form_save:[],
                data_table_show:[],
                numero_ticket:'',
                tipo_boleta_id:'',
                name_site:''

              
               
            }
              
        },
      
        mounted:function(){
          let self = this;
          EventBus.$on('ticket.providerform', function(job) {
                   $('#form_provider_ticket').modal('show');
         
                self.get_form(job); // ejecutas el metodo que desees
          });
           EventBus.$on('set.data.job.select', function(job_select) {
                  
                self.question();
                self.array_job = job_select; // ejecutas el metodo que desees
          });
        },
        created: function() {
         

        
        },


        methods: {
          
        get_form: function(job) {
        this.data_job = job
        $('#form_provider_ticket').modal('show');
    },
    get_data_form_sgc: function() {
        axios.get('/dataFormSgcOym').then((response) => {
            this.data_form = response.data
        })
    },
    question: function() {
        Swal.fire({
            title: 'El ticket esta creado?',
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#005cff',
            cancelButtonColor: '#CCCCCC',
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
        }).then((result) => {
            console.log(result.value);
            if (result.value == true) {
                $('#form_provider_ticket').modal('show');
                this.get_data_form_sgc();
                document.getElementById("form_sgc_ticket").style.display = 'block';
                document.getElementById("form_ticket").style.display = 'none';
                this.step = 4;
            } else {
            
                $('#formulario').modal('show');
           
            }
        })
    },
    date_format: function(d) {
        return moment(d).format("DD/MM/YYYY");
    },
    set_form: function() {
        if (this.ticket_created == 1) {
            this.get_data_form_sgc();
            document.getElementById("form_sgc_ticket").style.display = 'block';
            document.getElementById("form_ticket").style.display = 'none';
            this.step = 4;
        } else {
            if (this.ticket_created == 2) {
                this.step = 1;
                document.getElementById("form_ticket").style.display = 'block';
                document.getElementById("form_sgc_ticket").style.display = 'none';
            }
        }
    },
    show_form: function() {
        this.pre_sgc_id = this.trabajo_select[0].id;
        this.site_id = this.trabajo_select[0].site_id;
        this.nem_site = this.trabajo_select[0].site.nem_site + ' ' + this.trabajo_select[0].site.nombre;
        this.descripcion = this.trabajo_select[0].descripcion;
        this.activo = this.trabajo_select[0].servicio;
        this.servicio = this.trabajo_select[0].activo;
        this.tipo_moneda_id = this.trabajo_select[0].tipo_moneda_id;
        this.name_proveedor = this.trabajo_select[0].proveedor.PROVEEDOR;
        this.proveedor_id = this.trabajo_select[0].proveedor_id;
        this.moneda = this.trabajo_select[0].tipo_moneda.moneda;
        if (this.trabajo_select[0].fecha_ejecucion_trabajo != null) {
            this.trabajo_ejecutado = 1;
            this.fecha_ejecucion = this.trabajo_select[0].fecha_ejecucion_trabajo;
        } else {
            if (this.trabajo_select[0].fecha_ejecucion_trabajo == null) {
                this.trabajo_ejecutado = 0;
                this.fecha_ejecucion = '';
            }
        }
    },
    add_data_to_table: function() {
        if (this.trabajo_select == '' || this.numero_ticket == '' || this.nem_site == '' || this.name_proveedor == '' || this.moneda == '' || this.area_trabajo_id == '' || this.tipo_trabajo_id == '' || this.fecha_ejecucion == '' || this.tipo_boleta_id == '' && this.tipo_gasto_id == ''|| this.descripcion == '') {
            this.$swal({
                type: 'error',
                title: 'Error',
                text: 'Todos los campos con *  son obligatorios',
                showCloseButton: true,
            });
        } else {
            if (this.data_table_show.length == this.array_job.length) {
                this.$swal({
                    type: 'error',
                    title: 'Error',
                    text: 'Solo puede agregar' + ' ' + this.array_job.length + ' ' + 'trabajo(s), si desea agregar más debe seleccionarlo del listado principal.',
                    showCloseButton: true,
                });
            } else {
                this.data_table_show.push({
                    numero_trabajo: this.trabajo_select[0].id,
                    numero_ticket: this.numero_ticket,
                    area_trabajo: this.area_trabajo_id[1],
                    sitio: this.nem_site,
                    proveedor: this.name_proveedor,
                    activo: this.activo,
                    servicio: this.servicio,
                    fecha_ejecucion: this.fecha_ejecucion,
                    boleta: this.tipo_boleta_id[1],
                    tipo_trabajo: this.tipo_trabajo_id[1],
                    formato_pago: this.tipo_gasto_id[1],
                    descripcion: this.descripcion,
                    nro_boleta: this.nro_boleta
                })
                this.trabajo_select = '';
                this.numero_ticket = '';
                this.area_trabajo_id = '';
                this.nem_site = '';
                this.name_proveedor = '';
                this.activo = 0;
                this.servicio = 0;
                this.fecha_ejecucion = '';
                this.tipo_boleta_id = '';
                this.tipo_trabajo_id = '';
                this.tipo_gasto_id = '';
                this.descripcion = '';
                this.nro_boleta = '';
                this.moneda = '';
            }
        }
    },
    loadFunction: function() {
        let loader = this.$loading.show({
            container: this.fullPage ? null : this.$refs.formContainer,
            canCancel: true,
            onCancel: this.onCancel,
        });
        setTimeout(() => {
            loader.hide()
        }, 300)
    },
    formatPrice(value) {
        if (value % 1 == 0) {
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        } else {
            let val = (value / 1).toFixed(2).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        }
    },
 
        }
    }
</script>
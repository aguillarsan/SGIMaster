<template>
    <div class="main-content">
        <div class="wrapper wrapper-content">
            <section class="section">
                <div class="section-header shadow-box-ag">
                    <div class="row">
                        <div class="col-lg-11 col-md-6 col-sm-6 col-12 ">
                            <div class="card-stats-title">
                                <h1>
                                    Administración de usuarios y cuentas
                                </h1>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-6 col-sm-6 col-12 ">
                            <button class="btn btn-primary" data-target="#createUserModal" data-toggle="modal">
                                Crear usuario
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="" style="color: #2d88ff" v-on:click.prevent="GetAccounts(1)">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn" v-bind:style=" modulo==1 ? 'background-color: #6777ef; border: 2px solid white;' : '' ">
                            <div class="card-icon shadow-box-ag azul" v-bind:style=" modulo==1 ? 'background-color: white; ' : '' ">
                                <i class="fas fa-users" style="font-size: 28px;color: white" v-bind:style=" modulo==1 ? 'color: #6c757d; ' : '' ">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header">
                                    <h4 style="font-size: ;" v-bind:style=" modulo==1 ? 'color: white; ' : '' ">
                                        TOTAL USUARIOS
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn" style="font-size: 35px;" v-bind:style=" modulo==1 ? 'color: white; ' : '' ">
                                    {{totalUsuarios}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="" style="color: #2d88ff" v-on:click.prevent="GetAccounts(2)">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn" v-bind:style=" modulo==2 ? 'background-color: #6777ef; border: 2px solid white;' : '' ">
                            <div class="card-icon shadow-box-ag blue" v-bind:style=" modulo==2 ? 'background-color: white; ' : '' ">
                                <i class="fas fa-user-circle" style="font-size: 28px;color: white" v-bind:style=" modulo==2 ? 'color: #6c757d; ' : '' ">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header">
                                    <h4 style="font-size: ;" v-bind:style=" modulo==2 ? 'color: white; ' : '' ">
                                        CUENTAS SOLICITADAS
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn" style="font-size: 35px;" v-bind:style=" modulo==2 ? 'color: white; ' : '' ">
                                    {{totalSolicitudesCuentas}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="" style="color: #2d88ff" v-on:click.prevent="GetAccesos(3)">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn" v-bind:style=" modulo==3 ? 'background-color: #6777ef; border: 2px solid white;' : '' ">
                            <div class="card-icon shadow-box-ag verde" v-bind:style=" modulo==3 ? 'background-color: white; ' : '' ">
                                <i class="fas fa-unlock-alt" style="font-size: 28px;color: white" v-bind:style=" modulo==3 ? 'color: #6c757d; ' : '' ">
                                </i>
                            </div>
                            <div class="card-wrap ">
                                <div class="card-header">
                                    <h4 style="font-size: ;" v-bind:style=" modulo==3 ? 'color: white; ' : '' ">
                                        ACCESOS SOLICITADOS
                                    </h4>
                                </div>
                                <div class="card-body animated fadeIn" style="font-size: 35px;" v-bind:style=" modulo==3 ? 'color: white; ' : '' ">
                                    {{TotalAccesos}}
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
                            <h4 style="color: rgb(102, 102, 102)">
                                {{nombre}}
                            </h4>
                            <div class="card-header-form" v-if="modulo==1">
                                <input @keyup.prevent="GetAccounts(modulo)" class="form-control" placeholder="Buscar" type="text" v-model="nameuser">
                                </input>
                            </div>
                        </div>
                        <div class="card-body" v-if="modulo==1">
                            <div class="row">
                                <div class="col-lg-2" v-for="user in users.data" v-if="modulo==1">
                                    <div class="user-item">
                                        <img :src="user.avatar" alt="image" class="img-fluid" style="width: 150px;height: 110px;">
                                            <div class="user-details">
                                                <div class="user-name">
                                                    {{user.name}}  {{user.apellido}}
                                                </div>
                                                <div class="text-job text-muted">
                                                    {{user.email}}
                                                </div>
                                                <div class="user-cta">
                                                    <a @click.prevent="GetDetailsUser(user)" class=" follow-btn" href="#">
                                                        <i class="fas fa-info-circle boxBounce" style="font-size: 30px;">
                                                        </i>
                                                    </a>
                                                </div>
                                            </div>
                                        </img>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 50px;">
                                <nav aria-label="pagination" class="pagination" role="navigation" v-if="modulo==1">
                                    <vue-pagination :offset="4" :pagination="users" @paginate="GetAccounts(modulo)">
                                    </vue-pagination>
                                </nav>
                            </div>
                        </div>
                        <div class="card-body p-0" v-if="modulo==2">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th v-if="modulo==1">
                                                Nombre comppleto
                                            </th>
                                            <th v-if="modulo==2">
                                                Nombre
                                            </th>
                                            <th v-if="modulo==2">
                                                Apellido
                                            </th>
                                            <th>
                                                Nombre usuario
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th v-if="modulo==2">
                                                Cargo
                                            </th>
                                            <th v-if="modulo==2">
                                                Crm
                                            </th>
                                            <th v-if="modulo==2">
                                                Zona
                                            </th>
                                            <th>
                                                Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="account in accounts" v-if="modulo==2">
                                            <td>
                                                {{account.name}}
                                            </td>
                                            <td>
                                                {{account.last_name}}
                                            </td>
                                            <td>
                                                {{account.username}}
                                            </td>
                                            <td>
                                                {{account.email}}
                                            </td>
                                            <td>
                                                <div v-if="account.cargo_id == 1">
                                                    Subgerente crm
                                                </div>
                                                <div v-if="account.cargo_id == 2">
                                                    Ingeniero O&M;
                                                </div>
                                                <div v-if="account.cargo_id == 3">
                                                    Electrico
                                                </div>
                                                <div v-if="account.cargo_id == 4">
                                                    Lider zonal
                                                </div>
                                            </td>
                                            <td>
                                                {{account.crm ? account.crm.nombre_crm:''}}
                                            </td>
                                            <td>
                                                {{account.zona ? account.zona.cod_zona:''}}  {{account.zona ? account.zona.nombre_zona:''}}
                                            </td>
                                            <td>
                                                <button @click.prevent="CreateUser(account)" class="btn btn-success">
                                                    <i class="fas fa-check">
                                                    </i>
                                                </button>
                                                <button class="btn btn-danger">
                                                    <i class="fas fa-times-circle">
                                                    </i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body p-0" v-if="modulo==3">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                Solicitante
                                            </th>
                                            <th>
                                                Modulo
                                            </th>
                                            <th>
                                                Fecha
                                            </th>
                                            <th>
                                                Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="acceso in accesosData">
                                            <td>
                                                {{acceso.user.name}}  {{acceso.user.apellido}}
                                            </td>
                                            <td>
                                                {{acceso.modulo.nombre}}
                                            </td>
                                            <td>
                                                {{formato(acceso.created_at)}}
                                            </td>
                                            <td>
                                                <button @click.prevent="AprobarAcceso(acceso)" class="btn btn-success">
                                                    <i class="fas fa-check">
                                                    </i>
                                                </button>
                                                <button @click.prevent="denegarAcceso(acceso)" class="btn btn-danger">
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
                </div>
            </div>
        </div>
        <div aria-hidden="true" class="modal inmodal" id="detailsUsers" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(left,#9ebaf3 ,#353a5f); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Detalles del usuario
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white;">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <div class="card profile-widget" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                    <div class="profile-widget-header">
                                        <img :src="userDetail.avatar" alt="image" class="rounded-circle profile-widget-picture">
                                            <div class="profile-widget-items">
                                                <div class="profile-widget-item-label" style="margin-left: 20px; font-size: 20px;">
                                                    {{userDetail.name}} {{userDetail.apellido}}
                                                </div>
                                            </div>
                                        </img>
                                    </div>
                                    <div class="profile-widget-description pb-0">
                                        <div class="profile-widget-name">
                                            {{userDetail.name}} {{userDetail.apellido}}
                                            <div class="text-muted d-inline font-weight-normal">
                                                <div class="slash">
                                                </div>
                                                {{rolName}} {{CargoName}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="tickets-list">
                                            <div class="ticket-item">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                        <div class="ticket-title">
                                                            <h4 style="color:;">
                                                                Nombre
                                                            </h4>
                                                        </div>
                                                        <div>
                                                            <input :value="userDetail.name" class="form-control" name="" type="text">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                        <div class="ticket-title">
                                                            <h4 style="color:;">
                                                                Apellido
                                                            </h4>
                                                        </div>
                                                        <div>
                                                            <input class="form-control" name="" type="text" v-bind:value="userDetail.apellido">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                        <div class="ticket-title">
                                                            <h4 style="color:;">
                                                                Rut
                                                            </h4>
                                                        </div>
                                                        <div>
                                                            <input class="form-control" name="" type="text" v-bind:value="userDetail.rut">
                                                            </input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ticket-item">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                        <div class="ticket-title">
                                                            <h4 style="color:;">
                                                                Nombre de usuario
                                                            </h4>
                                                        </div>
                                                        <div>
                                                            <input class="form-control" name="" type="text" v-bind:value="userDetail.username">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                        <div class="ticket-title">
                                                            <h4 style="color:;">
                                                                Correo
                                                            </h4>
                                                        </div>
                                                        <div>
                                                            <input class="form-control" name="" type="text" v-bind:value="userDetail.email">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                        <div class="ticket-title">
                                                            <h4 style="color:;">
                                                                Telefono
                                                            </h4>
                                                        </div>
                                                        <div>
                                                            <input class="form-control" name="" type="text" v-bind:value="userDetail.telefono">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                        <div class="ticket-title">
                                                            <h4 style="color:;">
                                                                Nueva contraseña
                                                            </h4>
                                                        </div>
                                                        <div>
                                                            <input class="form-control" name="" type="text" v-model="new_password">
                                                            </input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-white" data-dismiss="modal" type="button">
                                Cerrar
                            </button>
                            <button @click.prevnt="updatePassword(userDetail)" class="btn btn-secondary" type="button">
                                Guardar cambios
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div aria-hidden="true" class="modal inmodal" id="createUserModal" role="dialog" tabindex="-1">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(left,#9ebaf3 ,#353a5f); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Crear usuario
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white;">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">
                                Nombre
                            </label>
                            <input class="form-control" name="name" type="text" v-model="input.name">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="lastName">
                                Apellido
                            </label>
                            <input class="form-control" name="lastName" type="text" v-model="input.last_name">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Correo
                            </label>
                            <input class="form-control" @change="validateEmail()" name="email" type="text" v-model="input.email">
                            </input>
                            <div style="color:red" v-if="email_exist">
                                Este correo ya se encuentra registrado
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">
                                Contraseña
                            </label>
                            <input class="form-control" name="password" type="text" v-model="input.password">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="role">
                                Rol
                            </label>
                            <select class="form-control select" v-model="input.role_id">
                                <option :value="1">
                                    Administrador
                                </option>
                                <option :value="8">
                                    Control
                                </option>
                                <option :value="10">
                                    Ingeniero
                                </option>
                                <option :value="12">
                                    Ingeniero O&M
                                </option>
                                <option :value="26">
                                    Solicitante Ticket Conexciones (PM)
                                </option>
                            </select>
                        </div>
                        <div class="form-group" v-if="input.role_id == 12">
                            <label for="role">
                                Crm
                            </label>
                            <select class="form-control select" v-model="input.role_id">
                                <option :value="1">
                                    Norte
                                </option>
                                <option :value="2">
                                    Centro norte
                                </option>
                                <option :value="3">
                                    Metropolitano
                                </option>
                                <option :value="4">
                                    Centro Sur
                                </option>
                                <option :value="5">
                                    Sur
                                </option>
                                <option :value="6">
                                    Austral
                                </option>
                                <option :value="7">
                                    Crm Total
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-white" data-dismiss="modal" type="button">
                            Cerrar
                        </button>
                        <button @click.prevnt="createNewUser()" class="btn btn-primary" type="button">
                            Aceptar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
import moment from 'moment';
import EventBus from "./event-bus"
import VuePagination from '../VuePagination.vue';

export default {
     components: {
            'vue-pagination': VuePagination,
          

        },
    data(){
        return{
            accounts:[],
            modulo:'',
            nombre:'',
            users: {
                'total': 0,
                'current_page': 1,
                'per_page': 10,

                'from': 2,
                'to': 0

            },
            input:{
                name:"",
                last_name:"",
                email:"",
                password:"",
                role_id:"",
                cmr_id:""
            },      
            formData: new FormData,      
            nameuser:'',
            userDetail:[],
            rolName:'',
            CargoName:'',
            totalUsuarios:'',
            totalSolicitudesCuentas:'',
            name:'',
            lastname:'',
            number:'',
            email:'',
            username:'',
            TotalAccesos:'',
            accesosData:[],
            new_password:'',
            email_exist:false

        }
    },

    created:function(){



        this.GetAccounts();
        this.getTotalAccesos();
         

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        
    },
    methods:{
        updatePassword:function(user){
            let formData = new FormData();
            formData.append('user_id', user.id)
            formData.append('new_password', this.new_password)
            axios.post('/changePassword',formData).then((response)=>{
                  $("#detailsUsers").modal("hide");
                  this.new_password = '';
            })

        },
        validateEmail(){
              axios.get(`/admin/create/user/validateEmail?email=${this.input.email}`).then(response=>{
                if(response.data){
                     this.email_exist = true;
                }else{
                      this.email_exist = false;
                }
              })
        },
        createNewUser(){
            if(!this.email_exist){
              if(this.input.role_id == 12){
                if(this.input.name != "" &&  this.input.last_name != "" && this.input.password != "" && this.input.email != "" && this.input.role_id != "" && this.input.cmr_id != "" ){
                    this.formData.append('name',this.input.name)
                    this.formData.append('last_name',this.input.last_name)
                    this.formData.append('password',this.input.password)
                    this.formData.append('email',this.input.email)
                    this.formData.append('role_id',this.input.role_id)
                    this.formData.append('cmr_id',this.input.cmr_id)
                    $("#createUserModal").modal("hide");
                    axios.post('/admin/create/user',this.formData).then(response=>{
                        this.toastFunction('Usuario creado')
                        this.input.name = "";
                        this.input.last_name = "";
                        this.input.email = "";
                        this.input.password = "";
                        this.input.role_id = "";
                        this.input.cmr_id = "";
                    })




                }

             }else{
                if(this.input.name != "" &&  this.input.last_name != "" && this.input.password != "" && this.input.email != "" && this.input.role_id != ""){
                    this.formData.append('name',this.input.name)
                    this.formData.append('last_name',this.input.last_name)
                    this.formData.append('password',this.input.password)
                    this.formData.append('email',this.input.email)
                    this.formData.append('role_id',this.input.role_id)
                    $("#createUserModal").modal("hide");
                    axios.post('/admin/create/user',this.formData).then(response=>{
                       this.toastFunction('Usuario creado')
                        this.input.name = "";
                        this.input.last_name = "";
                        this.input.email = "";
                        this.input.password = "";
                        this.input.role_id = "";
                        

                    })
                   


                }
             }
            }
            
        },
        formato:function(d){
            return moment(d).format("DD/MM/YY - hh:mm:ss");
        },
        GetDetailsUser:function(user){
            this.userDetail = user;
            axios.get('/UserRolName/'+user.id).then((response)=>{
                this.rolName = response.data;
            })
            axios.get('/UserCargoName/'+user.id).then((response)=>{
                this.CargoName = response.data;
            })
           $('#detailsUsers').modal('show');
        },
        AprobarAcceso:function(acceso){
            axios.get('/AprobarAcceso/'+acceso.id).then((response)=>{
                 let mensaje = 'Acceso aprobado'
                 this.toastFunction(mensaje)
                 this.GetAccesos(3);
                   this.getTotalAccesos();
            })
        },
        denegarAcceso:function(acceso){
             axios.get('/denegarAcceso/'+acceso.id).then((response)=>{
                let mensaje = 'Acceso denegado'
                 this.toastFunction(mensaje)
                 this.GetAccesos(3);
                   this.getTotalAccesos();
             })
        },
        getTotalAccesos:function(){
             axios.get('/getAccesos').then((response)=>{
                this.TotalAccesos = response.data
             })
        },
        GetAccesos:function(id){
              this.nombre = 'Accesos a modulos solicitados';
              this.modulo = id;
              this.getTotalAccesos()
              axios.get('/GetDataAccesos').then((response=>{
                this.accesosData = response.data
              }))
        },
        GetAccounts:function(id){
             if (id == 2) {
                    
                    this.nombre = 'Cuentas solicitadas';
                    this.modulo = 2;

             } else {
                    
                   
                    this.nombre = 'Usuarios';
                    this.modulo = 1;
                      

                }
            if(this.modulo==1){
              axios.get(`/GetAllUsers?page=${this.users.current_page}&user=${this.nameuser}`).then((response)=>{
                this.users = response.data;
              })
              axios.get(`/GetTotalUsers?&user=${this.nameuser}`).then((response)=>{
                this.totalUsuarios = response.data
              })
            }
            if(this.modulo==2){
               axios.get('/GetAccounts').then((response)=>{
               this.accounts = response.data
               })
               
            }    
            axios.get(`/GetTotalUsersAccountRequest`).then((response)=>{
                this.totalSolicitudesCuentas = response.data
              })
           
        },
        CreateUser:function(account){
          axios.get('/CreateUser/'+account.id).then((response)=>{
            this.GetAccounts(2);
            let message = 'Cuenta de usuario registrada.'
            this.toastFunction(message);
          })
        },
    toastFunction: function(messaje) {
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
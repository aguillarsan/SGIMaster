<template>
    <div>
        <div class="main-content">
            <div class="wrapper wrapper-content">
                <section class="section">
                    <div class="section-header shadow-box-ag">
                        <div class="breadcrumb-item active">
                            <a @click.prevent="GetFolders" href="#" style="font-size: 18px;" v-if="moduloId==1">
                                {{moduloName}}
                            </a>
                            <a @click.prevent="GetFolderDelete" href="#" style="font-size: 18px;" v-if="moduloId==3">
                                {{moduloName}}
                            </a>
                             <a @click.prevent="GetFoldersShared" href="#" style="font-size: 18px;" v-if="moduloId==2">
                                {{moduloName}}
                            </a>
                        </div>
                        <div class="breadcrumb-item" style="font-size: 17px;" v-for="Fold in contenFold">
                            <a @click.prevent="BackFold(Fold.id,Fold.name)" href="" v-if="idContentFold != Fold.id">
                                {{Fold.name}}
                            </a>
                            <a v-else="">
                                {{Fold.name}}
                            </a>
                        </div>
                    </div>
                </section>
                <div class="row" >
                    <div class="col-lg-9 " >
                        <div class="ibox float-e-margins">
                            <div class="card" >
                                <div class="card-header">
                                    <div @click.prevent="CleanSelectAndInfo" class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="dropdown d-inline">
                                                <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">
                                                    Opciones
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-sm">
                                                    <li class="dropdown-title">
                                                        Selecione una opción
                                                    </li>
                                                    <li v-if="moduloId == 1 &&  idContentFold == '' ">
                                                        <a class="dropdown-item" data-toggle="modal" href="#FolderAdd">
                                                            <i class="fas fa-plus">
                                                            </i>
                                                            Crear carpeta
                                                        </a>
                                                    </li>
                                                    <li v-if="moduloId == 1 &&  idContentFold != '' ">
                                                        <a class="dropdown-item" data-toggle="modal" href="#FolderAdd">
                                                            <i class="fas fa-plus">
                                                            </i>
                                                            Crear carpeta
                                                        </a>
                                                    </li>
                                                     <li v-if="moduloId == 1 &&  idContentFold != '' ">
                                                        <a class="dropdown-item" data-toggle="modal">
                                                            <i class="fas fa-upload">
                                                            </i>
                                                            Subir archivo
                                                        </a>
                                                    </li>


                                                   
                                                    <li v-if="moduloId == 3">
                                                        <a class="dropdown-item" data-toggle="modal" href="#FolderAdd">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Vaciar papelera
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="input-group">
                                                <input @keyup.prevent="GetFolders" class="form-control" placeholder="Buscar" type="text" v-if="moduloId ==1" v-model="nombre">
                                                </input>
                                                <input @keyup.prevent="GetFolderDelete" class="form-control" placeholder="Buscar" type="text" v-if="moduloId ==3" v-model="nombre">
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" ref="cardLoad">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12" v-for="folder in folders">
                                            <div class="card card-statistic-1 greyHover" style="border-radius: 15px;border:1.3px solid; " v-bind:style="folder.id == DetailsFolder.id ? 'background-color: #e0e0e0; ' : '' ">
                                                <a @click.prevent="ShowInfoFolder(folder)" @dblclick.prevent="GetContentFolder(folder)" href="#" style="color:#f2f2f2">
                                                    <div class="card-icon ">
                                                        <i class="far fa-folder" style="color: black; font-size: 35px;">
                                                        </i>
                                                    </div>
                                                    <div class="card-wrap">
                                                        <div class="card-header">
                                                            <h4 style="font-size: 13px;color: black;">
                                                                {{folder.nombre}}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown d-inline">
                                                        <a class="font-weight-600 " data-toggle="dropdown" href="#" id="orders-month" style="color: #d47dde">
                                                            <i class="fas fa-ellipsis-h boxBounce" style="font-size: 25px;">
                                                            </i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-sm">
                                                            <li class="dropdown-title">
                                                                Opciones
                                                            </li>
                                                            <li v-if="moduloId==1">
                                                                <a @click.prevent="changeName(folder)" class="dropdown-item" href="#">
                                                                    <i class="fas fa-edit">
                                                                    </i>
                                                                    Editar nombre
                                                                </a>
                                                            </li>
                                                            <li v-if="moduloId==1">
                                                                <a @click.prevent="shareFolder(folder)" class="dropdown-item" href="#">
                                                                    <i class="fas fa-user-plus">
                                                                    </i>
                                                                    Compartir
                                                                </a>
                                                            </li>
                                                            <li v-if="moduloId==1">
                                                                <a @click.prevent="changeStatus(folder)" class="dropdown-item" href="#">
                                                                    <i class="fas fa-trash">
                                                                    </i>
                                                                    Quitar
                                                                </a>
                                                            </li>
                                                            <li v-if="moduloId==3">
                                                                <a @click.prevent="RecoveryFolder(folder)" class="dropdown-item" href="#">
                                                                    <i class="fas fa-history">
                                                                    </i>
                                                                    Restaurar
                                                                </a>
                                                            </li>
                                                            <li v-if="moduloId==3">
                                                                <a @click.prevent="DeleteFolder(folder)" class="dropdown-item" href="#">
                                                                    <i class="fas fa-trash">
                                                                    </i>
                                                                    Eliminar definitivamente
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-2" v-for="file in files">
                                            <div class="col text-center">
                                                <a :href="'/archivos/'+file.nombre" target="blank_">
                                                    <div class="browser boxBounce">
                                                        <img :src="file.icono_archivo" style="width: 55px;height: 55px;">
                                                        </img>
                                                    </div>
                                                </a>
                                                <div class="mt-2 font-weight-bold">
                                                    {{file.nombre}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-sm-12" v-if="vacio == 1">
                                        <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                            <div class="card-body">
                                                <div class="empty-state" data-height="400">
                                                    <div class="empty-state-icon" style="background-image: linear-gradient(#ff8ddb, #bb73e0)">
                                                        <i class="fas fa-question">
                                                        </i>
                                                    </div>
                                                    <h2>
                                                        No se ha encontrado la carpeta o archivo.
                                                    </h2>
                                                    <p class="lead">
                                                        Verifique los datos de busqueda.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 ">
                        <div class="card shadow-box-ag">
                            <div class="card-header">
                                <h2 style="font-size: 22px;">
                                    <i :class="DefaultIcon" style="font-size: 20px;">
                                    </i>
                                    {{DefaultName}}
                                </h2>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a aria-controls="home" aria-selected="true" class="nav-link active" data-toggle="tab" href="#home" id="home-tab" role="tab">
                                            Detalles
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a aria-controls="profile" aria-selected="false" class="nav-link" data-toggle="tab" href="#profile" id="profile-tab" role="tab">
                                            Actividad
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div aria-labelledby="home-tab" class="tab-pane fade show active" id="home" role="tabpanel">
                                        <div class="card-body p-0">
                                            <div class="tickets-list">
                                                <div class="ticket-item" v-if="DetailsFolder.length != 0">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                            <div class="ticket-title">
                                                                <h4 style="color:#6c757d;">
                                                                    Creador
                                                                </h4>
                                                            </div>
                                                            <div>
                                                                {{DetailsFolder.user.name}} {{DetailsFolder.user.apellido}}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                            <div class="ticket-title">
                                                                <h4 style="color:#6c757d;">
                                                                    Fecha de creación
                                                                </h4>
                                                            </div>
                                                            <div v-if="DetailsFolder.length != 0">
                                                                {{formato(DetailsFolder.created_at)}}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                            <div class="ticket-title">
                                                                <h4 style="color:#6c757d;">
                                                                    Última modificación
                                                                </h4>
                                                            </div>
                                                            <div v-if="DetailsFolder.length != 0">
                                                                {{formato(DetailsFolder.updated_at)}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div aria-labelledby="profile-tab" class="tab-pane fade" id="profile" role="tabpanel">
                                        <div class="card chat-box " id="mychatbox" style="min-height: 800px;" v-if="activitys.length!=0">
                                            <div class="card-body chat-content">
                                                <div v-for="activity in activitys">
                                                    <div class="chat-item chat-left" style="">
                                                        <img v-bind:src="activity.user.avatar">
                                                            <div class="chat-details">
                                                                <div class="chat">
                                                                    {{activity.user.name}} {{activity.user.apellido}}
                                                                </div>
                                                                <div class="chat-text">
                                                                    {{activity.descripcion}}
                                                                </div>
                                                                <div class="chat-time">
                                                                    {{formato(activity.created_at)}}
                                                                </div>
                                                            </div>
                                                        </img>
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
            <div aria-hidden="true" class="modal inmodal" id="FolderAdd" role="dialog" tabindex="-1">
                <div class="modal-dialog ">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <h4 class="modal-title" style="color: #999999;text-align: center;">
                                Crear Carpeta
                            </h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>
                                            Nombre *
                                        </label>
                                        <input class="form-control" type="text" v-model="nameFolder">
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Sitio
                                        </label>
                                        <input name="pop" type="hidden" v-bind:value="popid">
                                            <input @click.prevent="
                                                    changePop" class="form-control" id="popcheck" name="" style="display: none" type="text" value="">
                                                <div id="popSearch">
                                                    <input class="form-control" id="inputSitio" name="datositio" placeholder="Buscar Sitio" type="text" v-model="datositio" v-on:keyup="BuscarSitio" value="">
                                                        <div class="row" id="listPops" style="display:none;">
                                                            <div class="col-lg-12 col-md-4 col-sm-4 col-10 shadow-box-ag full-height-scroll " style="max-height:120px;overflow-y:auto">
                                                                <div v-for="pop in pops">
                                                                    <a @click.prevent="selectdpop(pop.id,pop.nem_site,pop.nombre)" href="" id="selectpopvalue" style="color:black">
                                                                        {{pop.nem_site}} {{pop.nombre}}
                                                                        <hr style="margin-top: -1px;"/>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </input>
                                                </div>
                                                <div id="errorPop" style="display: none">
                                                    <p style="color: red">
                                                        Favor Seleccionar el sitio
                                                    </p>
                                                </div>
                                            </input>
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click.prevent="CreateNewFolder" class=" btn btn-primary" data-dismiss="modal" type="button">
                                Crear
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" id="FolderUpdateName" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <h4 class="modal-title" style="color: #999999;text-align: center;">
                                Editar Carpeta
                            </h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>
                                            Nuevo nombre *
                                        </label>
                                        <input class="form-control" type="text" v-model="nameFolder">
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click.prevent="NameUpdateFolder" class=" btn btn-primary" data-dismiss="modal" type="button">
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" id="ShareFolder" role="dialog" tabindex="-1">
                <div class="modal-dialog ">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <h4 class="modal-title" style="color: #999999;text-align: center;">
                                Compartir carpeta
                            </h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-9 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input @keyup.prevent="SearchUser" class="form-control" id="InputUser" type="text" v-model="nameUser" value="">
                                            <div class="row" id="listUsers" style="display:none;">
                                                <div class="col-lg-12 col-md-4 col-sm-4 col-10 shadow-box-ag full-height-scroll " style="max-height:120px;overflow-y:auto">
                                                    <div v-for="user in users">
                                                        <a @click.prevent="selectUser(user)" href="" id="selectpopvalue" style="color:black">
                                                            {{user.name}} {{user.apellido}}
                                                            <hr style="margin-top: -1px;"/>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </input>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="form-control" v-model="permissions">
                                            <option value="1" selected="true">
                                                Lector
                                            </option>
                                            <option value="2">
                                                Editor
                                                <small>
                                                    (añade, elimina y edita)
                                                </small>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" v-if="userSelects.length!= 0">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-inline">
                                            <div v-for="userSelect in userSelects">
                                                <span class="badge badge-primary">
                                                    {{userSelect.name}} {{userSelect.apellido}}
                                                    <a @click.prevent="deleUserThisSelect(userSelect)" href="#" style="color: white">
                                                        <i class="fas fa-times-circle boxBounce" style="font-size: 13px;">
                                                        </i>
                                                    </a>
                                                </span>
                                                <div style="margin-top: 5px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click.prevent="ShareFolderUsers" class=" btn btn-primary" data-dismiss="modal" type="button">
                                Compartir
                            </button>
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
import EventBus from "./event-bus"



export default {
     
    data(){
        return{
            folders:[],
            nombre:'',
            vacio:'',
            popId : '',
            dataPop : [],
            pops:[],
            popid : '',
            datositio:'',
            nameFolder:'',
            contenFold:[],
            nombFolder:'',
            idContentFold:'',
            files:[],
            folderUpdateNameId:'',
            DefaultName:'Mi unidad',
            DetailsFolder:[],
            DefaultIcon:'fas fa-hdd',
            activitys:[],
            nameUser:'',
            users:[],
            userSelects:[],
            userShared:[],
            moduloName:'',
            moduloId:1,
            permissions:'',
            folderSharedId:'',
            fullPage:false
          
        


        }
    },
   

    created:function(){
        let self = this;
         EventBus.$on('folder.Delete', function() {
            self.GetFolderDelete()
        });
        EventBus.$on('folder.unidad', function() {
            self.GetFolders()
        });
        EventBus.$on('folder.shared', function() {
            self.GetFoldersShared()
        });

        

       

        this.GetFolders();

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        
    },
    methods:{
        formato:function(d){
            return moment(d).format("DD/MM/YY - hh:mm:ss");
        },
        NameUpdateFolder:function(){
          axios.get(`/updateNameFolder?nombre=${this.nameFolder}&id=${this.folderUpdateNameId}`).then((response)=>{
            this.loadFunction();
            this.GetFolders();
            let messaje ='Carpeta editada.'
            this.toastFunction(messaje);
            this.nameFolder='';
        })
        },
        selectUser:function(user){
            this.userSelects.push({id:user.id , name:user.name,apellido:user.apellido});
            this.userShared.push(user.id);
        
            document.getElementById('listUsers').style.display = 'none';
            $("#InputUser").val("");
             
        },
        ShareFolderUsers:function(){
          axios.get(`SetSharedFolder?folderId=${this.folderSharedId}&permisos=${this.permissions}&users=${this.userShared}`).then((response)=>{
            console.log(response.data)
             let message = 'Carpeta compartida';
             this.toastFunction(message);
          })
        },
        GetFolderDelete:function(){
            this.DefaultName='Papelera'
            this.DefaultIcon='fas fa-trash'
            this.DetailsFolder=[]
            this.files =[];
            axios.get(`/getFoldersDelete?nombre=${this.nombre}`).then((response)=>{
                this.nombFolder ='';
                this.moduloId = 3;
                this.moduloName='Papelera'
                this.folders = response.data;
                  if(this.folders.length == 0){
                             this.vacio = 1;
                             }else{
                              this.vacio = '';
                             }
                             this.contenFold = [];

            })
        },
        GetFoldersShared:function(){
            this.DefaultName='Compartido conmigo'
            this.DefaultIcon='fas fa-user-friends'
            this.DetailsFolder=[]
            this.files =[];
            axios.get(`/getFoldersShared?nombre=${this.nombre}`).then((response)=>{
                this.nombFolder ='';
                this.moduloId = 2;
                this.moduloName='Compartido conmigo'
                this.folders = response.data;
                  if(this.folders.length == 0){
                             this.vacio = 1;
                             }else{
                              this.vacio = '';
                             }
                             this.contenFold = [];

            })
        },
        deleUserThisSelect:function(user){
          let index = this.userSelects.indexOf(user);
          this.userSelects.splice(index,1);
          this.userShared.splice(index,1);
          
        },
        CleanSelectAndInfo:function(){
        if(this.moduloId == 1){
            this.DetailsFolder = [];
            this.activitys=[];
            this.DefaultName = 'Mi unidad';
            this.DefaultIcon ='fas fa-hdd'
        }
        if(this.moduloId == 3){
            this.DefaultName='Papelera'
            this.DefaultIcon='fas fa-trash'
            this.DetailsFolder=[]
            this.activitys=[];
        }
          if(this.moduloId == 2){
            this.DefaultName='Compartido conmigo'
            this.DefaultIcon='fas fa-user-friends'
            this.DetailsFolder=[]
            this.activitys=[];
        }
        
        },
        SearchUser:function(){
           if (this.nameUser.length >= 3) {
            document.getElementById('listUsers').style.display = '';
            axios.get(`/GetUsers?user=${this.nameUser}`).then((response) => {
                this.users = response.data
            });
        } else {
            this.users = '';
            document.getElementById('listUsers').style.display = 'none';
           
        }
        },
        ShowInfoFolder:function(folder){
            this.DetailsFolder = folder;
            this.DefaultName = folder.nombre;
            this.DefaultIcon ='fas fa-folder'
            axios.get('/GetActivityFolder/'+folder.id).then((response)=>{
                this.activitys = response.data;
            })
        },
        shareFolder:function(folder){
           $('#ShareFolder').modal('show');
           this.folderSharedId = folder.id;
        },
        changeStatus:function(folder){
            axios.get('/moveToFolderTrash/'+folder.id).then((response)=>{
                  this.loadFunction();
                  this.GetFolders();
                  this.CleanSelectAndInfo();
                  let messaje ='Carpeta enviada a la papelera.'
                  this.toastFunction(messaje);
            })
        },
        
        BackFold:function(id,name){

           this.idContentFold = id;
        
            this.nombFolder = name;

    

             this.contenFold.splice(-1,1)



        
           axios.get(`/GetSubFolder?folderid=${id}`).then((response)=>{
             this.folders = response.data;
           })
            axios.get(`/GetFiles?folderid=${id}`).then((response)=>{
             this.files = response.data;
           })
        },
        changeName:function(folder){
            this.folderUpdateNameId = folder.id;
             $('#FolderUpdateName').modal('show');
        },
        GetFolders:function(){
            
            this.moduloId=1;

           this.files =[];
            axios.get(`/getFolders?nombre=${this.nombre}`).then((response)=>{
               this.CleanSelectAndInfo();
                 this.moduloName='Mi unidad'
                this.DefaultName ='Mi unidad';
                this.folders = response.data;
                  if(this.folders.length == 0){
                             this.vacio = 1;
                             }else{
                              this.vacio = '';
                             }
                             this.contenFold = [];

            })
        },
        GetContentFolder:function(folder){
            this.idContentFold = folder.id;
            this.contenFold.push({id:folder.id , name:folder.nombre});
            this.nombFolder = folder.nombre;
        
           axios.get(`/GetSubFolder?folderid=${folder.id}`).then((response)=>{
             this.folders = response.data;
           })
            axios.get(`/GetFiles?folderid=${folder.id}`).then((response)=>{
             this.files = response.data;
           })
        },
        changePop: function() {
        var selectPop = document.getElementById('popcheck');
        var searchPop = document.getElementById('popSearch');
        searchPop.style.display = '';
        selectPop.style.display = 'none';
        this.popId = '';
        this.dataPop = '';
        $('#inputSitio').val('');
        },
        BuscarSitio: function() {
        if (this.datositio.length >= 3) {
            var url = '/GetPop'
            var box = document.getElementById('listPops');
            box.style.display = '';
            axios.get(`/GetPop?datositio=${this.datositio}`).then((response) => {
                this.pops = response.data
            });
        } else {
            this.pops = '';
            var box = document.getElementById('listPops');
            box.style.display = 'none';
        }
    },
      selectdpop: function(id, nemSite, Nombre) {
        this.popid = id;
        var box = document.getElementById('listPops');
        var selectPop = document.getElementById('popcheck');
        var searchPop = document.getElementById('popSearch');
        var divAlertPop = document.getElementById('errorPop');
        this.pops = '';
        searchPop.style.display = 'none';
        selectPop.style.display = '';
        divAlertPop.style.display = 'none';
        box.style.display = 'none';
        $("#popcheck").val(nemSite + '-' + Nombre);
    },
    CreateNewFolder:function(){
        axios.get(`/createNewFolder?nombre=${this.nameFolder}&site=${this.popid}`).then((response)=>{
            this.loadFunction();
            this.GetFolders();
            let messaje ='Carpeta creada.'
            this.toastFunction(messaje);
        })
    },
    RecoveryFolder:function(folder){
     axios.get('/RecoveryFolder/'+folder.id).then((response)=>{
        this.GetFolderDelete();
        let message = 'Carpeta'+' '+folder.nombre+' '+'restaurada'
        this.toastFunction(message);
     })
    },
     loadFunction: function() {
        let loader = this.$loading.show({
            // Optional parameters
            container: this.$refs.cardLoad,
            canCancel: true,
            onCancel: this.onCancel,
            is-full-page: false,
        });
        // simulate AJAX
        setTimeout(() => {
            loader.hide()
        }, 10000)
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

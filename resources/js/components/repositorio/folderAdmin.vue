<template>
    <div>
        <div class="main-content">
            <div class="wrapper wrapper-content">
                <section class="section">
                    <div class="section-header shadow-box-ag barlow bold">
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
                            <a @click.prevent="GetFoldersUsersArea" href="#" style="font-size: 18px;" v-if="moduloId==4">
                                {{moduloName}}
                            </a>
                        </div>
                        <div class="breadcrumb-item barlow bold" style="font-size: 17px;" v-for="Fold in contenFold">
                            <a @click.prevent="BackFold(Fold.id,Fold.name)" href="" v-if="idContentFold != Fold.id">
                                {{Fold.name}}
                            </a>
                            <a v-else="">
                                {{Fold.name}}
                            </a>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-lg-9 ">
                        <div class="ibox float-e-margins">
                            <div class="card shadow-box-ag">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="dropdown d-inline">
                                                <a class="font-weight-600 dropdown-toggle barlow bold" data-toggle="dropdown" href="#" id="orders-month">
                                                    Opciones
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-sm">
                                                    <li class="dropdown-title barlow semi_bold">
                                                        Selecione una opción
                                                    </li>
                                                    <li v-if="moduloId == 1 && idContentFold == '' ">
                                                        <a class="dropdown-item barlow regular" data-toggle="modal" href="#FolderAdd">
                                                            <i class="fas fa-plus">
                                                            </i>
                                                            Crear carpeta
                                                        </a>
                                                    </li>
                                                    <li v-if="moduloId == 1 && idContentFold != '' ">
                                                        <a class="dropdown-item barlow regular" data-toggle="modal" href="#FolderAdd2">
                                                            <i class="fas fa-plus">
                                                            </i>
                                                            Crear carpeta
                                                        </a>
                                                    </li>
                                                    <li v-if="moduloId == 1 && idContentFold != '' ">
                                                        <a class="dropdown-item barlow regular" data-toggle="modal" href="#UploadFile">
                                                            <i class="fas fa-upload">
                                                            </i>
                                                            Subir archivos
                                                        </a>
                                                    </li>
                                                    <li v-if="moduloId == 3">
                                                        <a @click.prevent="DeleAllFolders()" class="dropdown-item barlow regular" data-toggle="modal" href="">
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
                                                <input @keyup.prevent="GetFolders" class="form-control" placeholder="Buscar" style="border-radius: 0px;height: 35px; " type="text" v-if="moduloId ==1 && idContentFold == ''" v-model="nombre"/>
                                                <input @keyup.prevent="GetContentFolderSearch" class="form-control" placeholder="Buscar" style="border-radius: 0px;height: 35px;" type="text" v-if="moduloId ==1 && idContentFold != '' || moduloId ==4 && idContentFold != '' " v-model="nombre"/>
                                                <input @keyup.prevent="GetFolderDelete" class="form-control" placeholder="Buscar" style="border-radius: 0px;height: 35px;" type="text" v-if="moduloId ==3" v-model="nombre"/>
                                                <input @keyup.prevent="GetFoldersUsersArea" class="form-control" placeholder="Buscar" style="border-radius: 0px;height: 35px;" type="text" v-if="moduloId ==4 &&  idContentFold == ''" v-model="nombre"/>
                                                <input @keyup.prevent="GetFoldersShared" class="form-control" placeholder="Buscar" style="border-radius: 0px;height: 35px;" type="text" v-if="moduloId ==2 " v-model="nombre"/>
                                                <div class="input-group-append">
                                                    <div class="input-group-text" style="height: 35px;">
                                                        <i class="fas fa-search">
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12" v-for="folder in folders" v-if="load_data == 2">
                                            <a @click.prevent="ShowInfoFolder(folder)" @dblclick.prevent="GetContentFolder(folder)" href="#" style="color:#f2f2f2">
                                                <div class="card card-statistic-1 greyHover " style="border-radius: 8px;transition: transform 0.5s;border-color:#e5e7eb;border: 1px solid rgba(0,0,0,.125);" v-bind:style="folder.id == idFolderSelected ? 'background-color: #e0e0e0; ' : '' ">
                                                    <div class="card-icon ">
                                                        <i class="far fa-folder" style="color:#191919; font-size: 50px;">
                                                        </i>
                                                    </div>
                                                    <div class="card-wrap">
                                                        <div class="card-header barlow semi_bold">
                                                            <h4 style="font-size: 13px;color: black;">
                                                                {{folder.nombre}}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown d-inline ">
                                                        <a class="font-weight-600 " data-toggle="dropdown" href="#" id="orders-month" style="color: #d47dde">
                                                            <i class="fas fa-ellipsis-h boxBounce" style="font-size: 28px;">
                                                            </i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-sm boxBounce">
                                                            <li class="dropdown-title barlow semi_bold">
                                                                Opciones
                                                            </li>
                                                            <li v-if="moduloId==1">
                                                                <a @click.prevent="changeName(folder)" class="dropdown-item barlow regular" href="#">
                                                                    <i class="fas fa-edit">
                                                                    </i>
                                                                    Editar nombre
                                                                </a>
                                                            </li>
                                                            <li v-if="moduloId==1">
                                                                <a @click.prevent="shareFolder(folder)" class="dropdown-item barlow regular" href="#">
                                                                    <i class="fas fa-user-plus">
                                                                    </i>
                                                                    Compartir
                                                                </a>
                                                            </li>
                                                            <li v-if="moduloId==1">
                                                                <a @click.prevent="changeStatus(folder)" class="dropdown-item barlow regular" href="#">
                                                                    <i class="fas fa-trash">
                                                                    </i>
                                                                    Quitar
                                                                </a>
                                                            </li>
                                                            <li v-if="moduloId==2 && folder.permiso_id==2">
                                                                <a @click.prevent="changeName(folder)" class="dropdown-item barlow regular" href="#">
                                                                    <i class="fas fa-edit">
                                                                    </i>
                                                                    Editar nombre
                                                                </a>
                                                            </li>
                                                            <li v-if="moduloId==2 && folder.permiso_id==2">
                                                                <a @click.prevent="shareFolder(folder)" class="dropdown-item barlow regular" href="#">
                                                                    <i class="fas fa-user-plus">
                                                                    </i>
                                                                    Compartir
                                                                </a>
                                                            </li>
                                                            <li v-if="moduloId==2 && folder.permiso_id==2">
                                                                <a @click.prevent="changeStatus(folder)" class="dropdown-item barlow regular" href="#">
                                                                    <i class="fas fa-trash">
                                                                    </i>
                                                                    Quitar
                                                                </a>
                                                            </li>
                                                            <li v-if="moduloId==3">
                                                                <a @click.prevent="RecoveryFolder(folder)" class="dropdown-item barlow regular" href="#">
                                                                    <i class="fas fa-history">
                                                                    </i>
                                                                    Restaurar
                                                                </a>
                                                            </li>
                                                            <li v-if="moduloId==3">
                                                                <a @click.prevent="DeleteFolder(folder)" class="dropdown-item barlow regular" href="#">
                                                                    <i class="fas fa-trash">
                                                                    </i>
                                                                    Eliminar definitivamente
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2" v-for="file in files" v-if="load_data == 2">
                                            <div class="col text-center">
                                                <a @dblclick.prevent="Previsualizacion(file)" data-toggle="dropdown" href="#">
                                                    <div class="browser boxBounce">
                                                        <i :class="file.class" style="font-size:50px;" v-if="getFileExtension(file.nombre) != 'jpg' ">
                                                        </i>
                                                    </div>
                                                    <div v-if="file.directorio == null">
                                                        <div class="gallery gallery-md" v-if="getFileExtension(file.nombre) == 'jpg' || getFileExtension(file.nombre) == 'png' || getFileExtension(file.nombre) == 'jpeg' ">
                                                            <img :src="'/ArchivosRepositorio/'+file.nombre" style="width: 100%;height: 50%;" v-if="getFileExtension(file.nombre) == 'jpg'"/>
                                                        </div>
                                                    </div>
                                                    <div v-if="file.directorio != null">
                                                        <div class="gallery gallery-md" v-if="getFileExtension(file.nombre) == 'jpg' || getFileExtension(file.nombre) == 'png' || getFileExtension(file.nombre) == 'jpeg' ">
                                                            <img :src="file.directorio+'/'+file.nombre" style="width: 100%;height: 50%;" v-if="getFileExtension(file.nombre) == 'jpg'"/>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="mt-2 font-weight-bold">
                                                    {{file.nombre}}
                                                </div>
                                                <ul class="dropdown-menu dropdown-menu-sm">
                                                    <li class="dropdown-title">
                                                        Opciones
                                                    </li>
                                                    <li v-if="moduloId ==1 || moduloId == 4">
                                                        <a :href="'/ArchivosRepositorio/'+file.nombre" class="dropdown-item" download="" v-if="file.directorio == null">
                                                            <i class="fas fa-download">
                                                            </i>
                                                            Descargar archivo
                                                        </a>
                                                        <a :href="file.directorio+'/'+file.nombre" class="dropdown-item" download="" v-if="file.directorio != null">
                                                            <i class="fas fa-download">
                                                            </i>
                                                            Descargar archivo
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a @click.prevent="Previsualizacion(file)"  class="dropdown-item" href="#">
                                                            <i class="fas fa-eye">
                                                            </i>
                                                            Ver
                                                        </a>
                                                    </li>
                                                    <li v-if="moduloId ==1">
                                                        <a @click.prevent="Deltefile(file)" class="dropdown-item" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Eliminar archivo
                                                        </a>
                                                    </li>
                                                    <li v-if="moduloId == 2 ">
                                                        <a :href="'/ArchivosRepositorio/'+file.nombre" class="dropdown-item" download="">
                                                            <i class="fas fa-download">
                                                            </i>
                                                            Descargar archivo
                                                        </a>
                                                    </li>
                                                    <li v-if="moduloId == 2 && Folderpermisison==2 ">
                                                        <a @click.prevent="Deltefile(file)" class="dropdown-item" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Eliminar archivo
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-sm-12" v-if="vacio == 1 && load_data == 2">
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
                                    <div class="col-12 col-md-12 col-sm-12" v-if="load_data == 1">
                                        <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                            <div class="card-body">
                                                <div class="empty-state" data-height="400">
                                                    <div class="d-flex justify-content-center" v-if="load_data == 1">
                                                        <div class="spinner-border text-primary" role="status" style="width: 8rem;height: 8rem;color: rgba(212, 125, 222)!important;">
                                                            <span class="sr-only" style="color: #191919">
                                                                Cargando...
                                                            </span>
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
                    <div class="col-lg-3 ">
                        <div class="card shadow-box-ag">
                            <div class="card-header">
                                <h2 class="barlow bold" style="font-size: 22px;">
                                    <i :class="DefaultIcon" style="font-size: 20px;">
                                    </i>
                                    {{DefaultName}}
                                </h2>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a aria-controls="home" aria-selected="true" class="nav-link active barlow regular" data-toggle="tab" href="#home" id="home-tab" role="tab">
                                            Detalles
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a aria-controls="profile" aria-selected="false" class="nav-link barlow regular" data-toggle="tab" href="#profile" id="profile-tab" role="tab">
                                            Actividad
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div aria-labelledby="home-tab" class="tab-pane fade show active" id="home" role="tabpanel">
                                        <div class="card-body p-0">
                                            <div class="tickets-list">
                                                <div class="ticket-item"  v-if="DetailsFolder.length != 0">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                            <div class="ticket-title barlow semi_bold">
                                                                <h4 style="color:#6c757d;">
                                                                    Creador
                                                                </h4>
                                                            </div>
                                                            <div class="barlow regular">
                                                                {{DetailsFolder.user.name}} {{DetailsFolder.user.apellido}}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                            <div class="ticket-title barlow semi_bold">
                                                                <h4 style="color:#6c757d;">
                                                                    Fecha de creación
                                                                </h4>
                                                            </div>
                                                            <div class=" barlow regular" v-if="DetailsFolder.length != 0">
                                                                {{formato(DetailsFolder.created_at)}}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                            <div class="ticket-title barlow semi_bold">
                                                                <h4 style="color:#6c757d;">
                                                                    Última modificación
                                                                </h4>
                                                            </div>
                                                            <div class="barlow regular" v-if="DetailsFolder.length != 0">
                                                                {{formato(DetailsFolder.updated_at)}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div aria-labelledby="profile-tab" class="tab-pane fade" id="profile" role="tabpanel" style="max-height:700px;overflow-y:auto">
                                        <div class="col-lg-12 col-md-3 col-sm-6 col-12" v-for="activity in activitys" v-if="activitys.length!=0">
                                            <div class="card card-statistic-1 " style="border-radius: 15px;">
                                                <div class="card-icon dropdown-item-avatar">
                                                    <a :title="activity.user.name +' '+ activity.user.apellido" href="#">
                                                        <figure :data-initial="activity.iniciales" class="avatar mr-2 bg-primary text-white">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <div class="card-wrap">
                                                    <div class="card-header">
                                                    </div>
                                                    <div class="chat-text barlow regular">
                                                        {{activity.descripcion}}
                                                    </div>
                                                    <div class="chat-time">
                                                        <small class="barlow semi_bold">
                                                            {{formato(activity.created_at)}}
                                                        </small>
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
            <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="FolderAdd2" role="dialog" tabindex="-1">
                <div class="modal-dialog ">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header " style="background: -webkit-linear-gradient(#ff8ddb ,#bb73e0); height: 70px;">
                            <h5 class="modal-title" style="color: white">
                                Crear Carpeta
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
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
                                        <input @keyup.prevent="DeleteError" class="form-control" type="text" v-model="nameFolder">
                                        </input>
                                        <div id="errorNombre" style="display: none">
                                            <p style="color: red">
                                                Favor indicar un nombre
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Sitio
                                        </label>
                                        <input name="pop" type="hidden" v-bind:value="popid">
                                            <input @click.prevent="
                                                    changePop" class="form-control" id="popcheck" name="" style="display: none" type="text" value="">
                                                <div id="popSearch">
                                                    <input @keyup.prevent="BuscarSitio()" class="form-control" id="inputSitio" name="datositio" placeholder="Buscar Sitio" type="text" v-model="datositio" value="">
                                                        <div class="row" id="listPopsRepo" style="display:none;">
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
                        <div class="modal-footer" style="background: -webkit-linear-gradient(#ff8ddb ,#bb73e0);height: 60px;">
                            <button @click.prevent="CreateNewFolder2" class=" btn btn-secondary" style="box-shadow: 0 0px 0px;color: #191919" type="button">
                                Crear
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="FolderAdd" role="dialog" tabindex="-1">
                <div class="modal-dialog ">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header " style="background: -webkit-linear-gradient(#ff8ddb ,#bb73e0); height: 70px;">
                            <h5 class="modal-title" style="color: white">
                                Crear Carpeta
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
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
                                        <input @keyup.prevent="DeleteError" class="form-control" type="text" v-model="nameFolder">
                                        </input>
                                        <div id="errorNombre" style="display: none">
                                            <p style="color: red">
                                                Favor indicar un nombre
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Sitio
                                        </label>
                                        <input name="pop" type="hidden" v-bind:value="popid">
                                            <input @click.prevent="
                                                    changePop" class="form-control" id="popcheck" name="" style="display: none" type="text" value="">
                                                <div id="popSearch">
                                                    <input @keyup.prevent="BuscarSitio()" class="form-control" id="inputSitio" name="datositio" placeholder="Buscar Sitio" type="text" v-model="datositio" value="">
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
                        <div class="modal-footer" style="background: -webkit-linear-gradient(#ff8ddb ,#bb73e0);height: 65px;">
                            <button @click.prevent="CreateNewFolder" class=" btn btn-secondary" style="box-shadow: 0 0px 0px;color: #191919" type="button">
                                Crear
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="FolderUpdateName" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header " style="background: -webkit-linear-gradient(#ff8ddb ,#bb73e0); height: 70px;">
                            <h5 class="modal-title" style="color: white">
                                Editar Carpeta
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
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
                                        <div id="errorNameEdit" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar un nombre
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="background: -webkit-linear-gradient(#ff8ddb ,#bb73e0);height: 65px;">
                            <button @click.prevent="NameUpdateFolder" class=" btn btn-secondary" style="box-shadow: 0 0px 0px;color: #191919" type="button" v-if="moduloId == 1">
                                Guardar
                            </button>
                            <button @click.prevent="NameUpdateFolderShared" class=" btn btn-secondary" style="box-shadow: 0 0px 0px;color: #191919" type="button" v-if="moduloId == 2">
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" id="UploadFile" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header " style="background: -webkit-linear-gradient(#ff8ddb ,#bb73e0); height: 70px;">
                            <h5 class="modal-title barlow semi_bold" style="color: white">
                                Subir archivos
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="tickets-list">
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="file-upload" style="margin-top: -20px;">
                                            <div class="image-upload-wrap" style="height: 100px;border:4px dashed #f98bdb">
                                                <input class="file-upload-input" id="files" multiple="" ref="files" type="file" v-on:change="handleFileUploads()"/>
                                                <div class="drag-text">
                                                    <h2 style="font-size: 28px;">
                                                        Arrastre o selecciones sus archivos.
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="border-radius: 5px;" v-if="filesupload.length != 0">
                                        <div class="card-body">
                                            <p class="barlow semi_bold" style="text-align: center">
                                                {{filesupload.length == 1 ? filesupload.length+' '+'Archivo seleccionado' :(filesupload.length > 1 ? filesupload.length +' '+ 'Archivos seleccionados':'')}}
                                            </p>
                                            <ul class="list-unstyled">
                                                <li class="media" style="margin-top: 10px;" v-for="(file, key) in filesupload">
                                                    <i :class="getFileExtension(file.name) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(file.name) == 'xls' || getFileExtension(file.name) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(file.name) == 'doc' || getFileExtension(file.name) == 'docx' ? 'far fa-file-word':( getFileExtension(file.name) == 'img' || getFileExtension(file.name) == 'jpg' || getFileExtension(file.name) == 'jpeg' ||  getFileExtension(file.name) == 'png' ? 'far fa-image':'far fa-file')))" class="fas fa-file mr-3" style="font-size: 50px;">
                                                    </i>
                                                    <div class="media-body">
                                                        <p class="barlow regular">
                                                            {{file.name}}
                                                        </p>
                                                    </div>
                                                    <button @click.prevent="removeFile( key )" class="btn btn-danger mr-3" style="margin-top: 18px; ">
                                                        <i class="fas fa-window-close blanco">
                                                        </i>
                                                    </button>
                                                </li>
                                                <hr/>
                                                <div id="progressBarFileUpoad" style="display: none">
                                                    <div class="progress mb-3 " data-height="25">
                                                        <div :style="'width:'+ getProgress" aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" class="progress-bar bg-primary" role="progressbar">
                                                            <div v-if=" getProgress == 'NaN%'">
                                                            </div>
                                                            <div v-if=" getProgress != 'NaN%'">
                                                                {{getProgress}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card" id="filesDuplicates" style="display: none">
                                        <p class="barlow semi_bold" style="text-align: center">
                                            Archivos duplicados
                                        </p>
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                <li class="media" style="margin-top: 10px;" v-for="FilesDuplicate in FilesDuplicates">
                                                    <i :class="getFileExtension(FilesDuplicate.name) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(FilesDuplicate.name) == 'xls' || getFileExtension(FilesDuplicate.name) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(FilesDuplicate.name) == 'doc' || getFileExtension(FilesDuplicate.name) == 'docx' ? 'far fa-file-word':( getFileExtension(FilesDuplicate.name) == 'img' || getFileExtension(FilesDuplicate.name) == 'jpg' || getFileExtension(FilesDuplicate.name) == 'jpeg' ||  getFileExtension(FilesDuplicate.name) == 'png' ? 'far fa-image':'far fa-file')))" class="fas fa-file mr-3" style="font-size: 50px;">
                                                    </i>
                                                    <div class="media-body">
                                                        <p class="barlow regular">
                                                            {{FilesDuplicate.nombre}}
                                                        </p>
                                                    </div>
                                                </li>
                                                <hr/>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="background: -webkit-linear-gradient(#ff8ddb ,#bb73e0);height: 65px;">
                            <button @click.prevent="UploadFiles" class=" btn btn-secondary" id="btnUploadFiles" style="box-shadow: 0 0px 0px;color: #191919" type="button">
                                Subir archivos
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="ShowDocument" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" style="max-width: 1500px;">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header " style="background: -webkit-linear-gradient(#ff8ddb ,#bb73e0); height: 70px;">
                            <h5 class="modal-title" style="color: white">
                                Previsualización
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body" style="background-color: #e3eaef">
                            <div id="pdf" v-if="tipeFile == 1">
                                <iframe :src="fileShow" style="width:100%; height: 1000px"></iframe>
                               
                            </div>
                            <div id="docx" v-if="tipeFile == 2">
                                <iframe :src="fileShow" style="width: 100%;height: 100%">
                                </iframe>
                            </div>
                            <div v-if="tipeFile == 3">
                                <img :src="fileShow" style="width:100%; height: 100%">
                                </img>
                            </div>
                        </div>
                        <div class="modal-footer" style="background: -webkit-linear-gradient(#ff8ddb ,#bb73e0);height: 65px;">
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="ShareFolder" role="dialog" tabindex="-1">
                <div class="modal-dialog ">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header " style="background: -webkit-linear-gradient(#ff8ddb ,#bb73e0); height: 70px;">
                            <h5 class="modal-title" style="color: white">
                                Compartir carpeta
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-9 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>
                                            Usuario(s) *
                                        </label>
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
                                            <div id="errorCompaprtirUsuario" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar un usuario
                                                </p>
                                            </div>
                                        </input>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>
                                            Permiso *
                                        </label>
                                        <select @change.prevent="DeleteError" class="form-control" v-model="permissions">
                                            <option selected="true" value="1">
                                                Lector
                                            </option>
                                            <option value="2">
                                                Editor
                                                <small>
                                                    (añade, elimina y edita)
                                                </small>
                                            </option>
                                        </select>
                                        <div id="errorCompaprtirPrivilegios" style="display: none">
                                            <p style="color: red">
                                                Seleccionar una opción
                                            </p>
                                        </div>
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
                        <div class="modal-footer" style="background: -webkit-linear-gradient(#ff8ddb ,#bb73e0);height: 65px;">
                            <button @click.prevent="ShareFolderUsers" class=" btn btn-secondary" style="box-shadow: 0 0px 0px;color: #191919" type="button">
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
import axios from 'axios'
import moment from 'moment'
import EventBus from "./event-bus"
import pdf from 'vue-pdf'
import WebViewer from '@pdftron/webviewer'
import { ref, onMounted } from 'vue';
let pdfDocument = null;

export default {
    components: {
        pdf
    },
     
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
            filesupload: [],
            porcentaje:{
                type:Number,
                default:0
            },
            FilesDuplicates:[],
            folderData:[],
            idFolderSelected:'',
            Folderpermisison:'',
            src:'',
            numPages: 0,
          
            page: 1,
            fileShow:'',
            tipeFile:0,
            comprobacion:0,
            load_data:0,
            extensions:[]
           
          
        


        }
    },
    computed:{
        getProgress(){
            return Math.round(this.porcentaje)+'%'
        }
    },
   

    created:function(){

        this.GetFoldersUsersArea();
        this.getExtensions()
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
        EventBus.$on('folders.UsersArea', function() {
            self.GetFoldersUsersArea()
        });


        

        

       

       

    },
  
    methods:{
        GetFolders: function() {
        this.set_load();
        axios.get(`/getFolders?nombre=${this.nombre}`).then((response) => {
            this.folders = response.data;
            this.nombFolder = '';
            if (this.folders.length == 0) {
                this.vacio = 1;
            } else {
                this.vacio = '';
            }
            this.contenFold = [];
            this.moduloName = 'Mi unidad';
            this.moduloId = 1;
            this.files = [];
            this.activitys = [];
            this.idContentFold = '';
            this.DetailsFolder = [];
            this.DefaultName = 'Mi unidad';
            this.idFolderSelected = ''
        }).finally(() => this.load_data = 2);
    },
    getExtensions(){
        axios.get('/repositorio/extensions').then((response) => {
            this.extensions = response.data;
        })
    },
    ShowInfoFolder: function(folder) {
        console.log(folder);
        this.DefaultName = folder.nombre;
        this.idFolderSelected = folder.id;
        this.DetailsFolder = folder;
       
        axios.get('/GetActivityFolder/' + folder.id).then((response) => {
            this.activitys = response.data;
            this.DefaultIcon = 'fas fa-folder'
        })
    },
    formato: function(d) {
        return moment(d).format("MMM-DD-YYYY - hh:mm:ss");
    },
    NameUpdateFolder: function() {
        if (this.nameFolder == '') {
            document.getElementById("errorNameEdit").style.display = 'block'
        }
        if (this.nameFolder != '') {
            $('#FolderUpdateName').modal('hide');
            axios.get(`/updateNameFolder?nombre=${this.nameFolder}&id=${this.folderUpdateNameId}`).then((response) => {
                this.loadFunction();
                this.GetFolders();
                this.ShowInfoFolder(this.folderData);
                let messaje = 'Carpeta editada.'
                this.toastFunction(messaje);
                this.nameFolder = '';
            })
        }
    },
    Previsualizacion: function(file) {
        let nomFile = file.nombre
        let PdfFileNom = nomFile.substr(nomFile.length - 3)
        let DocxFileNom = nomFile.substr(nomFile.length - 4)
        let ImgFileNom = nomFile.substr(nomFile.length - 3)
        if (PdfFileNom == 'pdf' || PdfFileNom == 'PDF') {
            console.log(PdfFileNom)
            if (file.directorio != null) {
                pdfDocument = pdf.createLoadingTask(file.directorio + '/' + file.nombre)
                this.fileShow = file.directorio + '/' + file.nombre
                this.src = pdfDocument
                this.src.promise.then(pdf => {
                    this.numPages = pdf.numPages
                    this.tipeFile = 1
                });
            } else {
                pdfDocument = pdf.createLoadingTask('/ArchivosRepositorio/' + file.nombre)
                this.fileShow = '/ArchivosRepositorio/' + file.nombre;
                this.src = pdfDocument
                this.src.promise.then(pdf => {
                    this.numPages = pdf.numPages
                    this.tipeFile = 1
                });
            }
            $('#ShowDocument').modal('show');
        } else {
            if (DocxFileNom == 'docx') {
                this.fileShow = file
                this.tipeFile = 2
                $('#ShowDocument').modal('show');
            } else {
                if (ImgFileNom == 'png' || ImgFileNom == 'jpg' || ImgFileNom == 'jpeg') {
                    if (file.directorio != null) {
                        this.fileShow = file.directorio + '/' + file.nombre;
                    } else {
                        this.fileShow = '/ArchivosRepositorio/' + file.nombre;
                    }
                    this.tipeFile = 3
                    $('#ShowDocument').modal('show');
                }
            }
        }
    },
    NameUpdateFolderShared: function() {
        if (this.nameFolder == '') {
            document.getElementById("errorNameEdit").style.display = 'block'
        }
        if (this.nameFolder != '') {
            $('#FolderUpdateName').modal('hide');
            axios.get(`/updateNameFolderShared?nombre=${this.nameFolder}&id=${this.folderUpdateNameId}`).then((response) => {
                this.GetFoldersShared();
                this.loadFunction();
                this.ShowInfoFolder(this.folderData);
                let messaje = 'Carpeta editada.'
                this.toastFunction(messaje);
                this.nameFolder = '';
            })
        }
    },
    handleFileUploads: function() {
        let uploadedFiles = this.$refs.files.files;
        for (var i = 0; i < uploadedFiles.length; i++) {
         
         let file = uploadedFiles[i];
         let file_extension = file.name.split(".").pop()
         let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
         if(extension_permited){
                 this.filesupload.push(uploadedFiles[i]);
         }
        }
        let formData = new FormData();
        for (var i = 0; i < this.filesupload.length; i++) {
            let file = this.filesupload[i];
            formData.append('files[' + i + ']', file);
        }
        axios.post('/SearchFileDuplicatesRepositorio', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            },
        }).then((response) => {
            this.FilesDuplicates = response.data;
            if (this.FilesDuplicates.length != 0) {
                document.getElementById("filesDuplicates").style.display = 'block';
                Swal.fire({
                    type: 'warning',
                    title: 'Archivos Duplicados',
                    text: 'Uno o varios archivos seleccionados ya se encuentran registrados, si los cargas se subira una versión 2 tomando el nuevo y dejando el antiguo de lado',
                })
            }
        });
    },
    removeFile(key) {
        this.filesupload.splice(key, 1);
    },
    Deltefile: function(file) {
        axios.get('/Deletefile/' + file.id).then((response) => {
            let message = 'Archivo' + ' ' + file.nombre + ' ' + 'eliminado.'
            this.toastFunction(message);
            this.GetContent(this.idContentFold)
        })
    },
    GetContent: function(id) {
        axios.get(`/GetFiles?folderid=${id}`).then((response) => {
            this.files = response.data;
        })
    },
    UploadFiles: function() {
        let formData = new FormData();
        for (var i = 0; i < this.filesupload.length; i++) {
            let file = this.filesupload[i];
            formData.append('files[' + i + ']', file);
        }
        document.getElementById("btnUploadFiles").disabled = 'true'
        document.getElementById("progressBarFileUpoad").style.display = 'block'
        axios.post('/uploadFilesRepositorio/' + this.idContentFold, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            },
            onUploadProgress: e => {
                if (e.lengthComputable) {
                    this.porcentaje = (e.loaded / e.total) * 100
                }
            }
        }).then((response) => {
            console.log(response.data)
            $('#UploadFile').modal('hide');
            this.filesupload = [];
            this.porcentaje = 0;
            this.loadFunction();
            axios.get(`/GetFiles?folderid=${this.idContentFold}`).then((response) => {
                this.files = response.data;
            })
            document.getElementById("btnUploadFiles").disabled = ''
            let message = 'Archio(s) cargado(s)';
            this.toastFunction(message)
            document.getElementById("progressBarFileUpoad").style.display = 'none';
            document.getElementById("filesDuplicates").style.display = 'none';
            this.FilesDuplicates = [];
        });
    },
    GetFoldersUsersArea: function() {
        this.set_load();
        this.DefaultName = 'Administrador'
        this.DefaultIcon = 'fas fa-user'
        this.DetailsFolder = []
        this.idContentFold = '';
        this.files = [];
        this.activitys = [];
        axios.get(`/getFoldersAreaUsers?nombre=${this.nombre}`).then((response) => {
            this.nombFolder = '';
            this.moduloId = 4;
            this.moduloName = 'Administrador'
            this.folders = response.data;
            if (this.folders.length == 0) {
                this.vacio = 1;
            } else {
                this.vacio = '';
            }
            this.contenFold = [];
        }).finally(() => this.load_data = 2);
    },
    selectUser: function(user) {
        this.userSelects.push({
            id: user.id,
            name: user.name,
            apellido: user.apellido
        });
        this.userShared.push(user.id);
        document.getElementById("errorCompaprtirUsuario").style.display = 'none';
        document.getElementById('listUsers').style.display = 'none';
        $("#InputUser").val("");
    },
    DeleteError: function() {
        if (this.nameFolder != '') {
            document.getElementById("errorNombre").style.display = 'none';
            this.fordelExist()
        }
        if (this.permissions != '') {
            document.getElementById("errorCompaprtirPrivilegios").style.display = 'none';
        }
    },
    validation: function() {
        if (this.permissions == '') {
            document.getElementById("errorCompaprtirPrivilegios").style.display = 'block';
        }
        if (this.userShared.length == 0) {
            document.getElementById("errorCompaprtirUsuario").style.display = 'block';
        }
    },
    ShareFolderUsers: function() {
        this.validation();
        if (this.permissions != '' && this.userShared.length != 0) {
            axios.get(`SetSharedFolder?folderId=${this.folderSharedId}&permisos=${this.permissions}&users=${this.userShared}`).then((response) => {
                $('#ShareFolder').modal('hide');
                this.loadFunction();
                let message = 'Carpeta compartida';
                this.toastFunction(message);
                this.permissions = '';
                this.userShared = [];
                this.userSelects = [];
                $('#InputUser').val('');
            })
        }
    },
    GetFolderDelete: function() {
        this.set_load();
        this.DefaultName = 'Papelera'
        this.DefaultIcon = 'fas fa-trash'
        this.DetailsFolder = []
        this.idContentFold = ''
        this.activitys = [];
        this.files = [];
        axios.get(`/getFoldersDelete?nombre=${this.nombre}`).then((response) => {
            this.nombFolder = '';
            this.moduloId = 3;
            this.moduloName = 'Papelera'
            this.folders = response.data;
            if (this.folders.length == 0) {
                this.vacio = 1;
            } else {
                this.vacio = '';
            }
            this.contenFold = [];
        }).finally(() => this.load_data = 2);
    },
    GetFoldersShared: function() {
        this.set_load();
        this.DefaultName = 'Compartido conmigo'
        this.DefaultIcon = 'fas fa-user-friends'
        this.DetailsFolder = []
        this.idContentFold = ''
        this.files = [];
        this.activitys = [];
        axios.get(`/getFoldersShared?nombre=${this.nombre}`).then((response) => {
            this.nombFolder = '';
            this.moduloId = 2;
            this.moduloName = 'Compartido conmigo'
            this.folders = response.data;
            if (this.folders.length == 0) {
                this.vacio = 1;
            } else {
                this.vacio = '';
            }
            this.contenFold = [];
        }).finally(() => this.load_data = 2);
    },
    deleUserThisSelect: function(user) {
        let index = this.userSelects.indexOf(user);
        this.userSelects.splice(index, 1);
        this.userShared.splice(index, 1);
    },
    CleanSelectAndInfo: function() {
        if (this.moduloId == 1) {
            this.DetailsFolder = [];
            this.activitys = [];
            this.DefaultName = 'Mi unidad';
            this.DefaultIcon = 'fas fa-hdd'
        }
        if (this.moduloId == 3) {
            this.DefaultName = 'Papelera'
            this.DefaultIcon = 'fas fa-trash'
            this.DetailsFolder = []
            this.activitys = [];
        }
        if (this.moduloId == 2) {
            this.DefaultName = 'Compartido conmigo'
            this.DefaultIcon = 'fas fa-user-friends'
            this.DetailsFolder = []
            this.activitys = [];
        }
        if (this.moduloId == 4) {
            this.DefaultName = 'Administrador'
            this.DefaultIcon = 'fas fa-hdd'
            this.DetailsFolder = []
            this.activitys = [];
        }
    },
    SearchUser: function() {
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
    shareFolder: function(folder) {
        $('#ShareFolder').modal('show');
        this.folderSharedId = folder.id;
    },
    changeStatus: function(folder) {
        if (this.moduloId == 1) {
            axios.get('/moveToFolderTrash/' + folder.id).then((response) => {
                this.loadFunction();
                this.activitys = [];
                if (this.idContentFold != '') {
                    this.GetContentFolderAction();
                } else {
                    this.GetFolders();
                }
                this.CleanSelectAndInfo();
                let messaje = 'Carpeta enviada a la papelera.'
                this.toastFunction(messaje);
            })
        } else {
            if (this.moduloId == 2) {
                this.activitys = [];
                axios.get('/trashFolderShared/' + folder.id).then((response) => {
                    this.loadFunction();
                    this.GetFoldersShared();
                })
            }
        }
    },
    DeleteFolder: function(folder) {
        Swal.fire({
            title: 'Esta seguro que desea eliminar esta carpeta?',
            text: "Se eliminara de forma permanente incluyendo su contenido",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#6877ef',
            cancelButtonColor: '#e3eaef',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
                axios.get('/deleteFolderBd/' + folder.id).then((response) => {
                    this.GetFolderDelete();
                    let message = 'Capeta eliminada';
                    this.toastFunction(message);
                })
            }
        })
    },
    DeleAllFolders: function() {
        Swal.fire({
            title: 'Esta seguro que desea vaciar la papelera?',
            text: "Se eliminara todo el contenido de forma permanente ",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#6877ef',
            cancelButtonColor: '#e3eaef',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
                axios.get('/delteAllfoldersUserTrash/').then((response) => {
                    this.GetFolderDelete();
                    let message = 'Papelera limpiada';
                    this.toastFunction(message);
                })
            }
        })
    },
    BackFold: function(id, name) {
        this.set_load();
        this.idContentFold = id;
        this.nombFolder = name;
        this.contenFold.splice(-1, 1);
        axios.get(`/GetSubFolder?folderid=${id}`).then((response) => {
            this.folders = response.data.folder;
            this.files = response.data.files;
        }).finally(() => this.load_data = 2);
    },
    changeName: function(folder) {
        this.folderUpdateNameId = folder.id;
        this.folderData = folder;
        $('#FolderUpdateName').modal('show');
    },
    GetContentFolder: function(folder) {
        this.set_load();
        axios.get(`/GetSubFolder?folderid=${folder.id}`).then((response) => {
            this.folders = response.data.folder;
            this.files = response.data.files;
        }).finally(() => this.load_data = 2);
        if (this.moduloId == 2) {
            this.Folderpermisison = folder.permiso_id;
        }
        this.nombre = '';
        this.idContentFold = folder.id;
        this.contenFold.push({
            id: folder.id,
            name: folder.nombre
        });
        this.nombFolder = folder.nombre;
    },
    GetContentFolderAction: function() {
        axios.get(`/GetSubFolder?folderid=${this.idContentFold}`).then((response) => {
            this.folders = response.data.folder;
            this.files = response.data.files;
        });
    },
    GetContentFolderSearch: function() {
        axios.get(`/GetSubFolder?folderid=${this.idContentFold}&nombre=${this.nombre}`).then((response) => {
            this.folders = response.data.folder;
            this.files = response.data.files;
        });
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
            document.getElementById('listPopsRepo').style.display = 'block';
            axios.get(`/GetPop?datositio=${this.datositio}`).then((response) => {
                this.pops = response.data
            });
        } else {
            this.pops = '';
            document.getElementById('listPopsRepo').style.display = 'none';
        }
    },
    selectdpop: function(id, nemSite, Nombre) {
        this.popid = id;
        var selectPop = document.getElementById('popcheck');
        var searchPop = document.getElementById('popSearch');
        var divAlertPop = document.getElementById('errorPop');
        this.pops = '';
        searchPop.style.display = 'none';
        selectPop.style.display = '';
        divAlertPop.style.display = 'none';
        document.getElementById('listPopsRepo').style.display = 'none';
        $("#popcheck").val(nemSite + '-' + Nombre);
    },
    CreateNewFolder: function() {
        console.log(this.comprobacion)
        if (this.nameFolder == '') {
            document.getElementById("errorNombre").style.display = 'block';
        }
        if (this.nameFolder != '') {
            if (this.comprobacion == 1) {
                axios.get(`/createNewFolder?nombre=${this.nameFolder}&site=${this.popid}`).then((response) => {
                    $('#FolderAdd').modal('hide');
                    this.loadFunction();
                    this.GetFolders();
                    this.changePop();
                    this.nameFolder = '';
                    this.popid = '';
                    let messaje = 'Carpeta creada.'
                    this.toastFunction(messaje);
                })
            } else {
                if (this.comprobacion == 2) {
                    let mensaje = 'ya existe una carpeta con ese nombre'
                    this.messajeError(mensaje)
                }
            }
        }
    },
    fordelExist: function() {
        axios.get(`/FindNewFolder?nombre=${this.nameFolder}`).then((response) => {
            if (response.data.length == 0) {
                this.comprobacion = 1
            }
            if (response.data.length != 0) {
                this.comprobacion = 2
            }
        })
    },
    messajeError: function(mensaje) {
        this.$swal({
            type: 'error',
            title: 'Error',
            text: mensaje,
            showCloseButton: true,
        });
    },
    CreateNewFolder2: function() {
        if (this.nameFolder == '') {
            document.getElementById("errorNombre").style.display = 'block';
        }
        if (this.nameFolder != '') {
            this.set_load();
            axios.get(`/createSubFolder?nombre=${this.nameFolder}&site=${this.popid}&idFolder=${this.idContentFold}`).then((response) => {
                $('#FolderAdd2').modal('hide');
                this.changePop();
                this.nameFolder = '';
                this.popid = '';
                let messaje = 'Carpeta creada.'
                this.toastFunction(messaje);
                this.GetContentFolderSubFolder(this.idContentFold)
            })
        }
    },
    GetContentFolderSubFolder: function(folder) {
        axios.get(`/GetSubFolder?folderid=${folder}`).then((response) => {
            this.folders = response.data.folder;
            this.files = response.data.files;
        }).finally(() => this.load_data = 2);
    },
    RecoveryFolder: function(folder) {
        axios.get('/RecoveryFolder/' + folder.id).then((response) => {
            this.GetFolderDelete();
            let message = 'Carpeta' + ' ' + folder.nombre + ' ' + 'restaurada'
            this.toastFunction(message);
        })
    },
    loadFunction: function() {
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
    getFileExtension: function(filename) {
        return (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename)[0] : undefined;
    },
    set_load: function() {
        this.load_data = 1;
    }
         

   
    

    
    }
}
</script>

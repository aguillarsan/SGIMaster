<template>
    <div>
        <div class="main-content">
            <section class="section">
                <div class="section-header shadow-box-ag">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6 col-12 ">
                            <div class="card-stats-title">
                                <h1 class="barlow bold">
                                    Solicitudes
                                </h1>
                            </div>
                            <div class="barlow semi_bold">
                                <a href="/solicitudExcelPsa" style="color: #ed765e">
                                    <i class="fas fa-download">
                                    </i>
                                    Descargar Reporte General
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-4 col-sm-12 ">
                        <div class="row">
                            <div class="col-12">
                                <div class=" mb-0 ">
                                    <div class="card-body">
                                        <ul class="nav nav-pills">
                                            <div class="col-lg-2">
                                                <li class="nav-item">
                                                    <a class="nav-link active barlow semi_bold" style="font-size: 19px; text-align: center;background: -webkit-linear-gradient(left,#fea858 ,#ed765e)">
                                                        <div class="card-icon" style="float: left; background-color: white;color: #191919;border-radius: 2px;">
                                                            <i class="fas fa-check" style="color: #191919;font-size: 16px;">
                                                            </i>
                                                        </div>
                                                        Validación
                                                        <span class="badge badge-white barlow regular" style="float: right; font-size: 20px;">
                                                            <div class="spinner-border text-primary" role="status" style="width: 1.5rem;height: 1.5rem;color: rgb(237, 118, 94)!important;" v-if="load_data == 1">
                                                            </div>
                                                            {{total.validacion}}
                                                        </span>
                                                    </a>
                                                </li>
                                            </div>
                                            <div class="col-lg-2">
                                                <li class="nav-item">
                                                    <a class="nav-link active barlow semi_bold" style="font-size: 19px; text-align: center;background: -webkit-linear-gradient(left,#fea858 ,#ed765e)">
                                                        <div class="card-icon" style="float: left; background-color: white;color: #191919;border-radius: 2px;">
                                                            <i class="fas fa-edit" style="color: #191919;font-size: 18px;">
                                                            </i>
                                                        </div>
                                                        Gestión
                                                        <span class="badge badge-white barlow regular" style="float: right;font-size: 20px;">
                                                            <div class="spinner-border text-primary" role="status" style="width: 1.5rem;height: 1.5rem;color: rgb(237, 118, 94)!important;" v-if="load_data == 1">
                                                            </div>
                                                            {{total.gestion}}
                                                        </span>
                                                    </a>
                                                </li>
                                            </div>
                                            <div class="col-lg-2">
                                                <li class="nav-item">
                                                    <a class="nav-link active barlow semi_bold" style="font-size: 19px; text-align: center;background: -webkit-linear-gradient(left,#fea858 ,#ed765e)">
                                                        <div class="card-icon" style="float: left; background-color: white;color: #191919;border-radius: 2px;">
                                                            <i class="fas fa-dolly" style="color: #191919;font-size: 20px;">
                                                            </i>
                                                        </div>
                                                        Despacho
                                                        <span class="badge badge-white barlow regular" style="float: right;font-size: 20px;">
                                                            <div class="spinner-border text-primary" role="status" style="width: 1.5rem;height: 1.5rem;color: rgb(237, 118, 94)!important;" v-if="load_data == 1">
                                                            </div>
                                                            {{total.despacho}}
                                                        </span>
                                                    </a>
                                                </li>
                                            </div>
                                            <div class="col-lg-2">
                                                <li class="nav-item">
                                                    <a class="nav-link active barlow semi_bold" style="font-size: 19px; text-align: center;background: -webkit-linear-gradient(left,#fea858 ,#ed765e)">
                                                        <div class="card-icon" style="float: left; background-color: white;color: #191919;border-radius: 2px;">
                                                            <i class="fas fa-toolbox" style="color: #191919;font-size: 20px;">
                                                            </i>
                                                        </div>
                                                        Instalación
                                                        <span class="badge badge-white barlow regular" style="float: right;font-size: 20px;">
                                                            <div class="spinner-border text-primary" role="status" style="width: 1.5rem;height: 1.5rem;color: rgb(237, 118, 94)!important;" v-if="load_data == 1">
                                                            </div>
                                                            {{total.instalacion}}
                                                        </span>
                                                    </a>
                                                </li>
                                            </div>
                                            <div class="col-lg-2">
                                                <li class="nav-item">
                                                    <a class="nav-link active barlow semi_bold" style="font-size: 19px; text-align: center;background: -webkit-linear-gradient(left,#fea858 ,#ed765e)">
                                                        <div class="card-icon" style="float: left; background-color: white;color: #191919;border-radius: 2px;">
                                                            <i class="fab fa-font-awesome-alt" style="color: #191919;font-size: 22px;">
                                                            </i>
                                                        </div>
                                                        Finalizadas
                                                        <span class="badge badge-white barlow regular" style="float: right;font-size: 20px;">
                                                            <div class="spinner-border text-primary" role="status" style="width: 1.5rem;height: 1.5rem;color: rgb(237, 118, 94)!important;" v-if="load_data == 1">
                                                            </div>
                                                            {{total.finalizada}}
                                                        </span>
                                                    </a>
                                                </li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="ibox float-e-margins">
                            <div class="card shadow-box-ag ">
                                <div class="card-header">
                                    <div class="col-lg-11">
                                        <h4 class="barlow bold" style="color: #191919">
                                            Solicitudes
                                        </h4>
                                        <div class="dropdown d-inline barlow semi_bold">
                                            <a class="font-weight-600 dropdown-toggle barlow regular" data-toggle="dropdown" href="#" id="orders-month">
                                                Opciones
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-sm">
                                                <li class="dropdown-title barlow semi_bold">
                                                    Selecione una opción
                                                </li>
                                                <li>
                                                    <a class="dropdown-item barlow regular" data-toggle="modal" href="#upload_masive_data_psa_modal">
                                                        <i class="fas fa-upload">
                                                        </i>
                                                        Solicitudes masivas
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item barlow regular" data-toggle="modal" href="#upload_masive_data_delivery_modal">
                                                        <i class="fas fa-upload">
                                                        </i>
                                                        Datos de despacho
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <button @click.prevent="getDataOficina" class="btn shadow-box-ag boxBounce" data-target="#formulario" data-toggle="modal" style=" background-color: #ed765e;color: white;border-radius: 3px;" type="submit">
                                            <i class="fa fa-plus">
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <div class="ibox">
                                    <div class=" table-responsive project-list project-table">
                                        <table class="table table-hover table-striped ">
                                            <thead>
                                                <tr class=" barlow bold">
                                                    <th class="">
                                                        #
                                                    </th>
                                                    <th>
                                                        Solicitante
                                                    </th>
                                                    <th style="width: 100px;">
                                                        Sitio/Categoría
                                                    </th>
                                                    <th>
                                                        Crm
                                                    </th>
                                                    <th class="centrado" style="width: 100px;">
                                                        Motivo
                                                    </th>
                                                    <th class="centrado" style="text-align: center">
                                                        Total activo
                                                    </th>
                                                    <th>
                                                        Cod Sap
                                                    </th>
                                                    <th>
                                                        Descripción
                                                    </th>
                                                    <th>
                                                        Prioridad gestión
                                                    </th>
                                                    <th>
                                                        Estado
                                                    </th>
                                                    <th>
                                                        Opciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <th>
                                                    <input @keyup.prevent="GetDatosSolicitud(modulo)" class="form-control logo-buscar" name="codigo" placeholder="" style="width:80px; " type="" v-model="codigo">
                                                    </input>
                                                </th>
                                                <th>
                                                    <input @keyup.prevent="GetDatosSolicitud(modulo)" class="form-control logo-buscar" name="user" placeholder="" style="width:100px; " type="" v-model="user">
                                                    </input>
                                                </th>
                                                <th>
                                                    <input @keyup.prevent="GetDatosSolicitud(modulo)" class="form-control logo-buscar" name="sitio" placeholder="" style="width:120px; " type="" v-model="sitio">
                                                    </input>
                                                </th>
                                                <th>
                                                    <div id="option_crm">
                                                        <select @change.prevent="GetDatosSolicitud(modulo)" class="form-control select" v-model="crm_search">
                                                            <option v-bind:value="1">
                                                                Norte
                                                            </option>
                                                            <option v-bind:value="2">
                                                                Centro Norte
                                                            </option>
                                                            <option v-bind:value="3">
                                                                Metropolitano
                                                            </option>
                                                            <option v-bind:value="4">
                                                                Centro Sur
                                                            </option>
                                                            <option v-bind:value="5">
                                                                Sur
                                                            </option>
                                                            <option v-bind:value="6">
                                                                Austral
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div id="crm_option_select" style="display: none">
                                                        <span class="badge " style="background-color:#fea858;color:white;border-radius:3px;">
                                                            {{nombre_crm}}
                                                            <a @click.prevent="clear_crm_select()" href="" style="color:white ">
                                                                <i class="fas fa-times-circle">
                                                                </i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div id="div_buscar_motivo">
                                                        <select class="form-control select" @change.prevent="GetDatosSolicitud(modulo)" v-model="motivo_serach_id">
                                                            <option v-bind:value="1">
                                                                Degradación
                                                            </option>
                                                            <option v-bind:value="2">
                                                                Vandalismo
                                                            </option>
                                                            <option v-bind:value="3">
                                                                Envío Stock
                                                            </option>
                                                            <option v-bind:value="4">
                                                                Crecimiento
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div id="motivo_seleccionado" style="display: none">
                                                        <span class="badge " style="background-color:#fea858;color:white;border-radius:3px;">
                                                            {{nombre_motivo}}
                                                            <a @click.prevent="clear_motivo_select()" href="" style="color:white ">
                                                                <i class="fas fa-times-circle">
                                                                </i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </th>
                                                <th style="width:120px;">
                                                    <input @keyup.prevent="GetDatosSolicitud(modulo)" class="form-control logo-buscar" placeholder="" style="width:; " v-model="totalBatery">
                                                    </input>
                                                </th>
                                                <th>
                                                    <input @keyup.prevent="GetDatosSolicitud(modulo)" class="form-control logo-buscar" placeholder="" style="width:100px; " type="" v-model="cod_sap">
                                                    </input>
                                                </th>
                                                <th>
                                                </th>
                                                <th>
                                                    <select @change.prevent="GetDatosSolicitud()" class="form-control select" id="selectPrioridad" v-model="PrioridadSearchId">
                                                        <option v-bind:value="1">
                                                            Alta
                                                        </option>
                                                        <option v-bind:value="2">
                                                            Media
                                                        </option>
                                                        <option v-bind:value="3">
                                                            Baja
                                                        </option>
                                                    </select>
                                                    <div id="PrioridadDiv" style="display:none">
                                                        <span class="badge " style="background-color:#fea858;color:white;border-radius:3px;">
                                                            {{SelectPrioridad}}
                                                            <a @click.prevent="ClearPrioridad()" href="" style="color:white ">
                                                                <i class="fas fa-times-circle">
                                                                </i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div style="width: 150px;">
                                                        <select @change.prevent="GetDatosSolicitud()" class="form-control select" id="selectEstado" v-model="estado">
                                                            <option v-bind:value="1">
                                                                Validación
                                                            </option>
                                                            <option v-bind:value="2">
                                                                Gestión
                                                            </option>
                                                            <option v-bind:value="3">
                                                                Despacho
                                                            </option>
                                                            <option v-bind:value="4">
                                                                Instalación
                                                            </option>
                                                            <option v-bind:value="5">
                                                                Finalizada
                                                            </option>
                                                            <option v-bind:value="7">
                                                                Rechazada
                                                            </option>
                                                            <option v-bind:value="8">
                                                                Eliminada
                                                            </option>
                                                        </select>
                                                        <div id="selectedEstadoInfo" style="display:none">
                                                            <span class="badge " style="background-color:#fea858;color:white;border-radius:3px;">
                                                                {{SelectEstadoDesc}}
                                                                <a @click.prevent="ClearState()" href="" style="color:white ">
                                                                    <i class="fas fa-times-circle">
                                                                    </i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <tr style="height: 150px;" v-for="solicitud in datosSolicitud.data" v-if="load_data_table == 2">
                                                    <td>
                                                        <a :href="'/DetalleSolicitudPsa/'+(solicitud.id)" target="blank__">
                                                            <span class="badge shadow-box-ag boxBounce barlow regular" style="background: -webkit-linear-gradient(left,#fea858 ,#ed765e);color: white;border-radius:5px;font-size:15px;">
                                                                {{solicitud.id}}
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <strong class="barlow semi_bold">
                                                                {{solicitud.user.name}} {{solicitud.user.apellido}}
                                                            </strong>
                                                        </div>
                                                        <div style="margin-top: 7px;">
                                                            <span class="badge orange_enterprise blanco" style="border-radius: 5px;">
                                                                {{formato(solicitud.created_at)}}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" barlow semi_bold" style="margin-top: 5px;">
                                                            <div style="font-size: 10px;">
                                                                <span class="badge " style="background-color: rgb(0, 92, 255);color: white;border-radius: 5px">
                                                                    {{solicitud.site ?solicitud.site.nem_site:''}} - {{solicitud.site ?solicitud.site.nombre:''}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="barlow semi_bold" style="margin-top: 10px;" v-if="solicitud.site_id != null">
                                                            <span class="badge " style="background-color:#42e8b4;color: white;border-radius:3px; " v-if="solicitud.site.classification_type_id == 1 ">
                                                                A
                                                            </span>
                                                            <span class="badge " style="background-color:#005cff;color: white;border-radius:3px; " v-if="solicitud.site.classification_type_id == 2 ">
                                                                B
                                                            </span>
                                                            <span class="badge badge-warning" style="border-radius:3px;" v-if="solicitud.site.classification_type_id == 3">
                                                                C
                                                            </span>
                                                            <span class="badge " style="background-color:#6c757d;color: white;border-radius:3px; " v-if="solicitud.site.classification_type_id == 4 ">
                                                                D
                                                            </span>
                                                            <span class="badge " style="background-color:#6c757d;color: white;border-radius:3px; " v-if="solicitud.site.classification_type_id == 5 ">
                                                                E
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" barlow semi_bold" style="margin-top: 10px;">
                                                            <div style="font-size: 10px;">
                                                                <span class="badge orange_enterprise blanco" style="border-radius: 5px;">
                                                                    {{solicitud.site ? solicitud.site.pop.comuna.zona.crm.nombre_crm:''}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{solicitud.motivo ? solicitud.motivo.descripcion :''}}
                                                    </td>
                                                    <td style="width:120px;">
                                                        <div style="text-align: center;">
                                                            {{solicitud.total_activo}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div v-if="solicitud.cod_sap_id != null">
                                                            {{solicitud.cod_sap_id}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{solicitud.descripcion}}
                                                    </td>
                                                    <td>
                                                        <div v-if="solicitud.prioridad_id == null && agregar_prioridad == 1 ">
                                                            <button @click.prevent="Prioridad(solicitud,1)" class="btn btn-secondary">
                                                                <i class="fas fa-plus">
                                                                </i>
                                                            </button>
                                                        </div>
                                                        <div v-if="solicitud.prioridad_id != null">
                                                            <span :style="solicitud.prioridad_id==1 ? 'background-color:#fc544b;'+'color:white;'+'border-radius:5px;':(solicitud.prioridad_id==2 ? 'background-color:rgb(254, 168, 88);'+'color:white;'+'border-radius:5px;':(solicitud.prioridad_id==3 ? 'background-color:rgb(66, 232, 180);'+'color:white;'+'border-radius:5px;':''))" class="badge">
                                                                {{solicitud.prioridad.descripcion}}
                                                            </span>
                                                            <a @click.prevent="Prioridad(solicitud,2)" class="" href="#" v-if="editar_prioridad == 1">
                                                                <i class="fas fa-edit">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="text-align: center">
                                                            <span :style="'color:white;border-radius:5px;font-size:15px;'+'background-color:#2fcbf1;'+'font-size:12px;'+'background-color:'+solicitud.estado.color+';'" class="badge badge-info barlow semi_bold">
                                                                {{solicitud.estado.descripcion}}
                                                            </span>
                                                        </div>
                                                        <div class="barlow semi_bold" style="text-align: center" v-if="solicitud.subestado_id != null">
                                                            {{solicitud.subestado.descripcion}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div v-if="solicitud.estado_id == 1 & solicitud.subestado_id == 1">
                                                            <div v-for="cargo in cargos">
                                                                <div v-if="cargo.id_cargo == 2">
                                                                    <button @click.prevent="AprobarSoliIng(solicitud)" class="btn btn-success">
                                                                        <i class="fas fa-check">
                                                                        </i>
                                                                    </button>
                                                                    <button @click.prevent="GetIdSlc(solicitud)" class="btn btn-danger" data-target="#rechazoSolicitud" data-toggle="modal">
                                                                        <i class="fas fa-times-circle">
                                                                        </i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-if="solicitud.estado_id == 1 & solicitud.subestado_id == 14">
                                                            <div>
                                                                <div v-if="aprobar_solcititud == 1">
                                                                    <button @click.prevent="AprobarSoliIng(solicitud)" class="btn btn-success">
                                                                        <i class="fas fa-check">
                                                                        </i>
                                                                    </button>
                                                                    <button @click.prevent="GetIdSlc(solicitud)" class="btn btn-danger" data-target="#rechazoSolicitud" data-toggle="modal">
                                                                        <i class="fas fa-times-circle">
                                                                        </i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="col-12 col-md-12 col-sm-12" v-if="load_data_table == 1">
                                            <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                                <div class="card-body">
                                                    <div class="empty-state" data-height="400">
                                                        <div class="d-flex justify-content-center" v-if="load_data_table == 1">
                                                            <div class="spinner-border text-primary" role="status" style="width: 8rem;height: 8rem;color: rgb(237, 118, 94)!important;">
                                                                <span class="sr-only" style="color: #191919">
                                                                    Cargando...
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <nav aria-label="pagination" class="pagination" role="navigation">
                                            <vue-pagination :offset="4" :pagination="datosSolicitud" @paginate="GetDatosSolicitud(modulo)">
                                            </vue-pagination>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <form method="POST" v-on:submit.prevent="RechazarSolicitud">
                <div aria-hidden="true" class="modal inmodal" id="rechazoSolicitud" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);height: 70px;">
                                <h5 class="modal-title" style="color: white;">
                                    Rechazo de solicitud
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true" style="color:white">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>
                                                Motivo del rechazo*
                                            </label>
                                            <textarea class="form-control" required="true" style="height:200px;" v-model="motivoRechazo">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color:white" type="button">
                                    Cerrar
                                </button>
                                <button class=" btn btn-warning" style="color:white" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form method="POST">
                <div aria-hidden="true" class="modal inmodal" id="AddPrioridad" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);">
                                <h4 class="modal-title" style="color: white;text-align: center;">
                                    <div v-if="tipoPrioridad == 1">
                                        Añadir prioridad
                                    </div>
                                    <div v-if="tipoPrioridad == 2">
                                        Editar Prioridad
                                    </div>
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
                                                Prioridad *
                                            </label>
                                            <select class="form-control select" v-model="prioridad_id">
                                                <option v-bind:value="1">
                                                    Alta
                                                </option>
                                                <option v-bind:value="2">
                                                    Media
                                                </option>
                                                <option v-bind:value="3">
                                                    Baja
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-white" data-dismiss="modal" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="AddPrioridadSolicitud()" class=" btn btn-warning" type="button">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form method="POST" v-on:submit.prevent="crearSolicitud">
                <div aria-hidden="true" class="modal inmodal" id="formulario" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);height: 70px;">
                                <h5 class="modal-title barlow semi_bold" style="color: white;">
                                    Formulario
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true" class="blanco">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="barlow semi_bold">
                                                Sitio
                                            </label>
                                            <div id="site_select_psa" style="display: none">
                                                <div class="input-group">
                                                    <input class="form-control" disabled="true" name="" style="background-color:rgb(254, 168, 88);color:white;" type="" v-bind:value="site_info_select"/>
                                                    <div class="input-group-append">
                                                        <div @click.prevent="changePop()" class="input-group-text " style="cursor: pointer  ">
                                                            <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                                            </i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="popSearch">
                                                <div class="input-group ">
                                                    <input class="form-control " id="inputSitio" name="datositio" placeholder="Buscar Sitio" type="text" v-model="datositio" v-on:keyup="BuscarSitio">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-search">
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </input>
                                                </div>
                                            </div>
                                            <div id="list_sites_psa" style="display: none">
                                                <div class="s_l">
                                                    <div :style="'width:'+input_width_form+'px'+';'" class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                                        <div v-for="pop in pops">
                                                            <a @click.prevent="selectdpop(pop)" href="" id="selectpopvalue" style="color:black">
                                                                {{pop.nem_site}}  {{pop.nombre}}
                                                                <hr style="margin-top: -1px;"/>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="errorPop" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar el sitio o la oficina
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="barlow semi_bold">
                                                Activo *
                                            </label>
                                            <select @change.prevent="deleteError" class="form-control select" v-model="activoId">
                                                <option v-bind:value="activo.id" v-for="activo in activos">
                                                    {{activo.descripcion}}
                                                </option>
                                            </select>
                                            <div id="errorActivo" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar el activo
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="barlow semi_bold">
                                                Descripción *
                                            </label>
                                            <textarea class="form-control" style="height: 100px;" v-model="descripcion">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="barlow semi_bold" v-if="activoId == 1">
                                                Total baterías (unidad) *
                                            </label>
                                            <label class="barlow semi_bold" v-if="activoId != 1">
                                                Total activos *
                                            </label>
                                            <div class="input-group">
                                                <input @keyup.prevent="deleteError" class="form-control" name="" type="number" v-model="cantidad"/>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-boxes">
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="errorCantidad" style="display: none">
                                                <p style="color: red">
                                                    Favor indicar la cantidad
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group" v-if="activoId==1">
                                            <label class="barlow semi_bold">
                                                Prioritario *
                                            </label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input class="selectgroup-input" name="value" type="radio" v-model="prioridad_select" value="1"/>
                                                    <span class="selectgroup-button">
                                                        Si
                                                    </span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input class="selectgroup-input" name="value" type="radio" v-model="prioridad_select" value="2"/>
                                                    <span class="selectgroup-button">
                                                        No
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="barlow semi_bold">
                                                Motivo *
                                            </label>
                                            <select @change.prevent="deleteError" class="form-control select" v-model="motivoId">
                                                <option v-bind:value="motivo.id" v-for="motivo in motivos">
                                                    {{motivo.descripcion}}
                                                </option>
                                            </select>
                                            <div id="errorMotivo" style="display: none">
                                                <p style="color: red">
                                                    Favor Seleccionar el motivo
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color: white" type="button">
                                    Cerrar
                                </button>
                                <button class=" btn btn-warning " style="color: white" type="submit">
                                    Crear
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form method="POST" v-on:submit.prevent="codSap">
                <div aria-hidden="true" class="modal inmodal" id="codSap" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color: #999999;text-align: center">
                                    Añadir Codigo SAP
                                </h5>
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
                                                Codigo SAP *
                                            </label>
                                            <input @keyup.prevent="deleteErrorSap" class="form-control" name="codSap" placeholder="codigo sap" type="text" v-model="codSAP"/>
                                            <div id="errorCodSap" style="display: none">
                                                <p style="color: red">
                                                    Favor Ingresar El Codigo SAP
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-light" data-dismiss="modal" type="button">
                                    Cerrar
                                </button>
                                <button class=" btn btn-info" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div aria-hidden="true" class="modal inmodal" id="upload_masive_data_delivery_modal" role="dialog" tabindex="-1">
                <div class="modal-dialog ">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);">
                            <h5 class="modal-title" style="color: white;">
                                Carga masiva datos de despacho
                            </h5>
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
                                            Seleccione o arrastre el archivo *
                                        </label>
                                        <input @change="upload_data_file_psa_delivery_masive" class="form-control" name="myfile" type="file"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" data-dismiss="modal" type="button">
                                Cerrar
                            </button>
                            <button @click.prevent="upload_excel_delivery_data()" class=" btn btn-info" type="button">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" id="upload_masive_data_psa_modal" role="dialog" tabindex="-1">
                <div class="modal-dialog ">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);">
                            <h5 class="modal-title" style="color: white;">
                                Carga masiva de solicitudes
                            </h5>
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
                                            Seleccione o arrastre el archivo *
                                        </label>
                                        <input @change="upload_data_file_psa_masive" class="form-control" name="myfile" type="file"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" data-dismiss="modal" type="button">
                                Cerrar
                            </button>
                            <button @click.prevent="upload_excel_masive_data()" class=" btn btn-info" type="button">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" id="solicitudes_more_banc" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(#fea858 ,#ed765e);">
                            <h5 class="modal-title" style="color: white;">
                                Soliciudes con más de 16 bancos
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="barlow semi_bold">
                                                <th>
                                                    Nro° solicitud
                                                </th>
                                                <th>
                                                    Solicitante
                                                </th>
                                                <th>
                                                    Sitio
                                                </th>
                                                <th>
                                                    Cantidad de bancos
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="data in data_alert">
                                                <td>
                                                    {{data.solicitud_id}}
                                                </td>
                                                <td>
                                                    {{data.user ? data.user.name +' '+ data.user.apellido:''}}
                                                </td>
                                                <td>
                                                    {{data.site ? data.site.nem_site :''}}
                                                </td>
                                                <td>
                                                    {{data.cantidad_bancos}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click.prevent="update_state_request_exceed_banks()" class=" btn " style="background-color: rgb(254, 168, 88);color: white" type="button">
                                Aceptar
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
    import EventBus from "./event-bus";
import VueSweetalert2 from 'vue-sweetalert2';
import Loading from 'vue-loading-overlay';
import VuePagination from '../VuePagination.vue';
    // Import stylesheet
    import 'vue-loading-overlay/dist/vue-loading.css';
    import moment from 'moment';

// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);
Vue.use(Loading);


export default {
  props:['permision'],  
  components:{
    'vue-pagination':VuePagination
    



  },
  data(){
    return{

      pops:[],
      datositio:'',
      dataPop:[],
      popId:'',
      activos:[],
      motivos:[],
      activoId:'',
      cantidad:'',
      motivoId:'',
      marcas:[],
      marcaId:'',
      capacidades:[],
      capacidadId:'',
      fullPage: false,
      SolicitudId:'',
      SelectCategoryLeter:'',
      totalBatery:'',
   
      modulo:'',
      codSAP:'',
      idCodSap:'',
      nombre:'',
      total:'',
    
      categoria:'',
      codigo:'',
      sitio:'',
      user:'',
      cod_sap:'',
      datosSolicitud: {
        'total': 0,
        'current_page': 1,
        'per_page': 10,

        'from': 2,
        'to': 0

      },
      SelectCategoryLeter:'',
      oficinas:[],
      oficinaId:'',
      sitioSelected:'',
      cargos:[],
      roles:'',
      motivoRechazo:'',
      IdRechazo:'',
      estado:'',
      SelectEstadoDesc:'',
      colorNoti:3,
      tipoPrioridad:'',
      prioridad_id:'',
      id_slc_prioridad:'',
      PrioridadSearchId:'',
      SelectPrioridad:'',
      prioridad_select:'',
      cantidad_banco:'',
      file_delivery:'',
      file_data_psa:'',
      data_alert:[],
      per_view_request_banc:0,
      per_add_priority:0,
      permiso:[],
      descripcion:'',
      input_width_form:0,
      site_info_select:'',
      aprobar_solcititud:0,
      agregar_prioridad:0,
      editar_prioridad:0,
      crm_search:'',
      nombre_crm:'',
      load_data:1,
      load_data_table:1,
      motivo_serach_id:'',
      nombre_motivo:''






    }
  }, 
  mounted: function() { 
      EventBus.$emit('notificacion.color',this.colorNoti);
      window.Echo.channel('logout-session').listen('CloseSessionLogoutEvent',(e)=>{
             window.location.replace("/login");
            });

  },
   
  created:function(){
   
    this.set_permisos();
    this.GetTotalValidacion();
    this.GetDatosSolicitud();
    this.getCargoRolUser();
    this.verificacion_alert();

   



  },

  methods: {
       set_permisos:function(){
          this.permiso = JSON.parse(this.permision);
          for (var i = 0; i < this.permiso.length; i++) {
               let per = this.permiso[i]
               if(per.permission_id == 1){
                   this.aprobar_solcititud = 1;
               }
               if(per.permission_id == 21){
                   this.agregar_prioridad = 1;
               }

              if(per.permission_id == 22){
                   this.editar_prioridad = 1;
               }

               
          }
       },
       GetTotalValidacion: function() {
           axios.get('/GetTotalValidacion').then((response) => {
               this.total = response.data;
           }).finally(() => this.load_data = 2);
       },
       GetDatosSolicitud: function() {
           this.load_data_table = 1;
           if (this.categoria != '') {
               var selectCategoria = document.getElementById('selectCategoria');
               selectCategoria.style.display = 'none';
               var selectCategoriaInfo = document.getElementById('selectedCateInfo');
               selectCategoriaInfo.style.display = '';
               this.setLeterCategory();
           }
           if (this.PrioridadSearchId != '') {
               document.getElementById('selectPrioridad').style.display = 'none';
               document.getElementById('PrioridadDiv').style.display = 'block';
               this.setPrioridad();
           }
           if (this.estado != '') {
               document.getElementById('selectEstado').style.display = 'none';
               document.getElementById('selectedEstadoInfo').style.display = 'block';
               this.setEsatdo();
           }
           if(this.crm_search != ''){
              this.set_crm_select();
           }
           if(this.motivo_serach_id != ''){
              this.set_motivo_search();
           }
           axios.get(`/GetDatosSolicitudPsa?page=${this.datosSolicitud.current_page}&state=${this.modulo}&codigo=${this.codigo}&sitio=${this.sitio}&user=${this.user}&categoria=${this.categoria}&total=${this.totalBatery}&cod_sap=${this.cod_sap}&estado=${this.estado}&prioridad_id=${this.PrioridadSearchId}&crm=${this.crm_search}&motivo=${this.motivo_serach_id}`).then((response) => {
               this.datosSolicitud = response.data;
           }).finally(() => this.load_data_table = 2)
       },
       verificacion_alert: function() {
           if(this.per_view_request_banc == 1){
              axios.get('/get_alert_data_banc').then(response => {
               this.data_alert = response.data;
               if (this.data_alert.length != 0) {
                   this.$swal({
                       type: 'warning',
                       title: 'Aviso!',
                       text: 'Hay un total de' + ' ' + this.data_alert.length + ' ' + 'solicitud(es) con más de 16 bancos, presione el botón "OK" para visualizar el listado.',
                       confirmButtonText: 'Ok'
                   }).then((result) => {
                       $('#solicitudes_more_banc').modal('show');
                   });
                }
              })
           }
          
       },
       RechazarSolicitud: function() {
           axios.get(`/RechazoSolicitudPsa?id=${this.IdRechazo}&motivo=${this.motivoRechazo}`).then((response) => {
               $('#rechazoSolicitud').modal('hide');
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
               this.GetDatosSolicitud();
               this.motivoRechazo = '';
               this.IdRechazo = '';
           })
       },
       Prioridad: function(solicitud, prioridad) {
           this.tipoPrioridad = prioridad
           this.id_slc_prioridad = solicitud.id
           $('#AddPrioridad').modal('show');
       },
       AddPrioridadSolicitud: function() {
           if (this.prioridad_id != '') {
               axios.get(`/AddPrioridadPsa?id=${this.id_slc_prioridad}&prioridad_id=${this.prioridad_id}&tipoEdicion=${this.tipoPrioridad}`).then((response) => {
                   $('#AddPrioridad').modal('hide');
                   this.prioridad_id = ''
                   this.loadFunction()
                   this.GetDatosSolicitud()
               })
           }
       },
       GetIdSlc: function(solicitud) {
           this.IdRechazo = solicitud.id;
       },
       getDataOficina: function() {
           axios.get('/GetOficina').then((response) => {
               this.oficinas = response.data;
           })
           this.GetData();
       },
       getCargoRolUser: function() {
           axios.get('/Getcargo').then((response) => {
               this.cargos = response.data;
           })
           axios.get('/Getrol').then((response) => {
               this.roles = response.data;
           })
       },
       ClearCate: function() {
           this.categoria = '';
           var selectCategoria = document.getElementById('selectCategoria');
           selectCategoria.style.display = '';
           var selectCategoriaInfo = document.getElementById('selectedCateInfo');
           selectCategoriaInfo.style.display = 'none';
           this.GetDatosSolicitud(this.modulo);
       },
       codSap: function() {
           var errorDiv = document.getElementById('errorCodSap');
           if (this.codSAP == '') {
               errorDiv.style.display = '';
           }
           if (this.codSAP != '') {
               $('#codSap').modal('hide');
               axios.post(`updateSap?id=${this.idCodSap}&valorSap=${this.codSAP}`).then((response) => {
                   this.GetDatosSolicitud(this.modulo);
               })
           }
       },
       deleteErrorSap: function() {
           var errorDiv = document.getElementById('errorCodSap');
           errorDiv.style.display = 'none';
       },
       GetModalSap: function(solicitud) {
           this.idCodSap = solicitud.id;
           $('#codSap').modal('show');
       },
       AprobarSoliIng: function(solicitud) {
           var id = solicitud.id;
           axios.get('/updateSlc/' + id).then((response) => {
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
               this.GetDatosSolicitud(this.modulo);
               this.GetTotalValidacion();
           })
       },
       formato: function(d) {
           return moment(d).format("DD/MM/YY");
       },
       setLeterCategory: function() {
           if (this.categoria == 1) {
               this.SelectCategoryLeter = 'A';
           }
           if (this.categoria == 2) {
               this.SelectCategoryLeter = 'B';
           }
           if (this.categoria == 3) {
               this.SelectCategoryLeter = 'C';
           }
           if (this.categoria == 4) {
               this.SelectCategoryLeter = 'D';
           }
           if (this.categoria == 5) {
               this.SelectCategoryLeter = 'E';
           }
       },
       setEsatdo: function() {
           if (this.estado == 1) {
               this.SelectEstadoDesc = 'Validación';
           }
           if (this.estado == 2) {
               this.SelectEstadoDesc = 'Gestión';
           }
           if (this.estado == 3) {
               this.SelectEstadoDesc = 'Despacho';
           }
           if (this.estado == 4) {
               this.SelectEstadoDesc = 'Instalación';
           }
           if (this.estado == 5) {
               this.SelectEstadoDesc = 'Finalizada';
           }
           if (this.estado == 7) {
               this.SelectEstadoDesc = 'Rechazada';
           }
           if (this.estado == 8) {
               this.SelectEstadoDesc = 'Eliminada';
           }
       },

       set_crm_select:function(){
          document.getElementById("option_crm").style.display = 'none';
          document.getElementById("crm_option_select").style.display = 'block';
          if(this.crm_search == 1){
              this.nombre_crm = 'Norte'
          }else{
            if(this.crm_search == 2){
                this.nombre_crm = 'Centro Norte'

            }else{
                if(this.crm_search == 3){
                    this.nombre_crm = 'Metropolitano'

                }else{
                    if(this.crm_search == 4){
                        this.nombre_crm = 'Centro Sur'

                    }else{
                        if(this.crm_search == 5){
                            this.nombre_crm = 'Sur'

                        }else{
                            if(this.crm_search == 6){
                                this.nombre_crm = 'Austral'

                            }
                        }
                    }
                }
            }
          }
       },
       clear_crm_select:function(){
          document.getElementById("option_crm").style.display = 'block';
          document.getElementById("crm_option_select").style.display = 'none';
          this.crm_search = '';
          this.nombre_crm = '';
          this.GetDatosSolicitud();
       },
       set_motivo_search:function(){
          document.getElementById("div_buscar_motivo").style.display = 'none';
          document.getElementById("motivo_seleccionado").style.display = 'block';
          if(this.motivo_serach_id == 1){
            this.nombre_motivo='Degradación';

          }else{
            if(this.motivo_serach_id == 2){
                this.nombre_motivo='Vandalismo';

            }else{
                if(this.motivo_serach_id == 3){
                    this.nombre_motivo='Envío Stock';

                }else{
                    if(this.motivo_serach_id == 4){
                        this.nombre_motivo='Crecimiento';

                    }
                }
            }
          }
 
       },
       clear_motivo_select:function(){
        document.getElementById("div_buscar_motivo").style.display = 'block';
        document.getElementById("motivo_seleccionado").style.display = 'none';
        this.motivo_serach_id = '';
        this.nombre_motivo = '';
        this.GetDatosSolicitud();
           
       },
       setPrioridad: function() {
           if (this.PrioridadSearchId == 1) {
               this.SelectPrioridad = 'Alta';
           }
           if (this.PrioridadSearchId == 2) {
               this.SelectPrioridad = 'Media';
           }
           if (this.PrioridadSearchId == 3) {
               this.SelectPrioridad = 'Baja';
           }
       },
       ClearPrioridad: function() {
           document.getElementById('selectPrioridad').style.display = 'block';
           document.getElementById('PrioridadDiv').style.display = 'none';
           this.SelectPrioridad = ''
           this.PrioridadSearchId = ''
           this.GetDatosSolicitud()
       },
       ClearState: function() {
           document.getElementById('selectEstado').style.display = 'block'
           document.getElementById('selectedEstadoInfo').style.display = 'none'
           this.estado = ''
           this.GetDatosSolicitud()
       },
      
       GetCapacidad: function() {
           axios.get('/GetCapacidad/' + this.marcaId).then((response) => {
               this.capacidades = response.data;
           })
           if (this.marcaId != '') {
               var errorMarca = document.getElementById('errorMarca');
               errorMarca.style.display = 'none';
           }
       },
       BuscarSitio: function() {
           if (this.datositio.length >= 3) {
               
               this.input_width_form = document.getElementById("inputSitio").clientWidth;
               var box = document.getElementById('list_sites_psa').style.display = 'block';
            
               axios.get(`/GetPop?datositio=${this.datositio}`).then((response) => {
                   this.pops = response.data
               });
           } else {
               this.pops = '';
               var box = document.getElementById('list_sites_psa');
               box.style.display = 'none';
           }
       },
       selectdpop: function(pop) {
           this.popId = pop.id;
           document.getElementById('list_sites_psa').style.display = 'none';
           document.getElementById('site_select_psa').style.display = 'block';
           var searchPop = document.getElementById('popSearch').style.display = 'none';
           var divAlertPop = document.getElementById('errorPop').style.display = 'none';
           this.pops = '';
           this.sitioSelected = 1;
         
           this.site_info_select = pop.nem_site + '-' + pop.nombre

          
       },
       changePop: function() {
           var selectPop = document.getElementById('site_select_psa');
           var searchPop = document.getElementById('popSearch');
           searchPop.style.display = '';
           selectPop.style.display = 'none';
           this.popId = '';
           this.dataPop = '';
           this.datositio='';
           this.site_info_select = '';
       },
       GetData: function() {
           axios.get('/GetActivo').then((response) => {
               this.activos = response.data;
           })
           axios.get('/GetMotivo').then((response) => {
               this.motivos = response.data;
           })
       },
     
     
       crearSolicitud: function() {
           if (this.popId == '' ) {
               var divAlertPop = document.getElementById('errorPop');
               divAlertPop.style.display = '';
               
           }
           if (this.activoId == '') {
               var divAlertActivo = document.getElementById('errorActivo');
               divAlertActivo.style.display = '';
           }
        
           if (this.cantidad == '') {
               var errorCantidad = document.getElementById('errorCantidad');
               errorCantidad.style.display = '';
           }
           if (this.motivoId == '') {
               var errorMotivo = document.getElementById('errorMotivo');
               errorMotivo.style.display = '';
           }
         
           
           if (this.activoId == 1) {
               if (this.popId != '' && this.activoId != '' && this.cantidad != '' && this.motivoId != '' && this.prioridad_select != '' && this.descripcion != '') {
                   $('#formulario').modal('hide');
                   let loader = this.$loading.show({
                       // Optional parameters 
                       container: this.fullPage ? null : this.$refs.formContainer,
                       canCancel: true,
                       onCancel: this.onCancel,
                   });
                   // simulate AJAX
                   setTimeout(() => {
                       loader.hide()
                   }, 1000)
                   axios.get(`CrearSolicitud?pop=${this.popId}&activo=${this.activoId}&cantidad=${this.cantidad}&motivo=${this.motivoId}&prioridad=${this.prioridad_select}&descripcion=${this.descripcion}`).then((response) => {
                       this.SolicitudId = response.data;
                       this.cleanForm();
                       this.GetTotalValidacion();
                       this.loadFunction()
                       var mensaje = 'Solicitud Nro' + ' ' + this.SolicitudId + ' ' + 'de activos creada';
                       this.alertsuccessFunction(mensaje)
                       this.GetDatosSolicitud();
                   })
               }
           } else {
               if (this.popId != '' && this.activoId != '' && this.cantidad != '' && this.motivoId != '' ) {
                   $('#formulario').modal('hide');
                   this.loadFunction()
                   axios.get(`CrearSolicitud?pop=${this.popId}&activo=${this.activoId}&cantidad=${this.cantidad}&motivo=${this.motivoId}&descripcion=${this.descripcion}`).then((response) => {
                       this.SolicitudId = response.data;
                       this.cleanForm();
                 
                       this.GetTotalValidacion();
                       this.changePop();
                       this.$swal({
                           type: 'success',
                           title: 'Solicitud Nro' + ' ' + this.SolicitudId + ' ' + 'de activos creada',
                           showCloseButton: true,
                       });
                       this.loadFunction()
                       this.GetDatosSolicitud();
                   })
               }
           }
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
           }, 1000)
       },
       deleteError: function() {
           if (this.oficinaId != '') {
               var errorOficina = document.getElementById('errorOficina');
               errorOficina.style.display = 'none';
               var divAlertPop = document.getElementById('errorPop');
               divAlertPop.style.display = 'none';
               this.sitioSelected = 1;
           } else {
               this.sitioSelected = 0;
           }
           if (this.activoId != '') {
               var divAlertActivo = document.getElementById('errorActivo');
               divAlertActivo.style.display = 'none';
               axios.get(`/GetMarca?activo=${this.activoId}`).then((response) => {
                   this.marcas = response.data
               })
               if (this.activoId == 2 || this.activoId == 3) {
                   var capacidadBatery = document.getElementById('capacidadBatery');
                   capacidadBatery.style.display = 'none';
               }
               if (this.activoId == 1) {
                   var capacidadBatery = document.getElementById('capacidadBatery');
                   capacidadBatery.style.display = '';
               }
           }
           if (this.cantidad != '') {
               var errorCantidad = document.getElementById('errorCantidad');
               errorCantidad.style.display = 'none';
           }
           if (this.motivoId != '') {
               var errorMotivo = document.getElementById('errorMotivo');
               errorMotivo.style.display = 'none';
           }
           if (this.capacidadId != '') {
               var errorCapacidad = document.getElementById('errorCapacidad');
               errorCapacidad.style.display = 'none';
           }
       },
       cleanForm: function() {
           this.popId = '';
           this.descripcion = '';
           this.cantidad = '';
           this.motivoId = '';
           this.activoId = '';
           this.datositio = '';
      
           this.prioridad_select = '';
           this.changePop();
       },
       alertsuccessFunction: function(mensaje) {
           this.$swal({
               type: 'success',
               title: 'Solicitud creada',
               text: mensaje,
               showCloseButton: true,
           });
       },
       upload_data_file_psa_delivery_masive: function() {
           this.file_delivery = event.target.files[0];
       },
       upload_data_file_psa_masive:function(){
            this.file_data_psa = event.target.files[0];
       },
       upload_excel_masive_data: function() {
           if (this.file_data_psa.length != 0) {
               $('#upload_masive_data_psa_modal').modal('hide');
               let formData = new FormData();
               formData.append('file', this.file_data_psa);
               axios.post('/upload_masive_data_psa', formData, {
                   headers: {
                       'Content-Type': 'multipart/form-data'
                   },
               }).then((response) => {
                   this.loadFunction();
                   Swal.fire({
                       type: 'success',
                       title: 'Solicitudes creadas',
                       text: 'Su carga masiva fue todo un exito',
                   })
                   this.GetDatosSolicitud()
                   this.file_data_psa = ''
               })
           } else {
               Swal.fire({
                   type: 'error',
                   title: 'Error',
                   text: 'Debe cargar almenos un archivo',
               })
           }
       },
       upload_excel_delivery_data: function() {
           if (this.file_delivery.length != 0) {
               $('#upload_masive_data_delivery_modal').modal('hide');
               let formData = new FormData();
               formData.append('file', this.file_delivery);
               axios.post('/upload_masive_data_delivery', formData, {
                   headers: {
                       'Content-Type': 'multipart/form-data'
                   },
               }).then((response) => {
                   this.loadFunction();
                   Swal.fire({
                       type: 'success',
                       title: 'Datos de despacho actualizados',
                       text: 'Su carga masiva fue todo un exito',
                   })
                   this.GetDatosSolicitud()
                   this.file_delivery = ''
               })
           } else {
               Swal.fire({
                   type: 'error',
                   title: 'Error',
                   text: 'Debe cargar almenos un archivo',
               })
           }
       },
       update_state_request_exceed_banks:function(){
            for (var i = 0; i < this.data_alert.length; i++) {
                let data = this.data_alert[i]

                axios.get('/update_alert_data_exceed_banks/'+data.id).then(response=>{
                  
                })
           }
           $('#solicitudes_more_banc').modal('hide');
           Swal.fire({
                      type: 'success',
                      title:'Solicitudes visualizadas'
                     
           })
       }
       
 

  }
}
</script>
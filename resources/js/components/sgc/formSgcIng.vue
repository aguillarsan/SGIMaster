<template>
    <div>
        <form>
            <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="createSolicitudIng" ref="formContainer" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" style="max-width: 1200px;">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header " style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                            <h5 class="modal-title" style="color: white">
                                Formulario solicitud
                            </h5>
                            <button @click.prevent="CleanAllFormIng()" aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row mt-4">
                                <div class="col-12 col-lg-8 offset-lg-2">
                                    <div class="wizard-steps">
                                        <div @click.prevent="BackStepOneOnClick" class="wizard-step " v-bind:class="step == 1 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-tools">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label barlow bold">
                                                Datos  Trabajo
                                            </div>
                                        </div>
                                        <div @click.prevent="BackStepTwoOnClick" class="wizard-step" v-bind:class="step == 2 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-globe-americas">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label barlow bold">
                                                Sitio
                                            </div>
                                        </div>
                                        <div @click.prevent="BackStepThreeOnClick" class="wizard-step" v-bind:class="step == 3 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-edit">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label barlow bold">
                                                Datos solicitud
                                            </div>
                                        </div>
                                        <div class="wizard-step" v-bind:class="step == 4 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-file-upload">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label barlow bold">
                                                Archivos
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="wizard-content mt-2" v-if="load_data_form == 0">
                                <div class="wizard-pane" id="wizardIng1">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Flujo de Trabajo*
                                                </label>
                                                <div>
                                                    <select @change.prevent="DeleteErrorform()" class="form-control select " v-model="flujoId">
                                                        <option v-bind:value="flujo_trabajo.id" v-for="flujo_trabajo in flujo_trabajos">
                                                            {{flujo_trabajo.nombre_flujo}}
                                                        </option>
                                                    </select>
                                                    <div id="errorFlujo" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar flujo de trabajo
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    P.GPON*
                                                </label>
                                                <div>
                                                    <select @change.prevent="DeleteErrorform()" class="form-control select" v-model="pgpon">
                                                        <option v-bind:value="1">
                                                            SI
                                                        </option>
                                                        <option v-bind:value="2">
                                                            NO
                                                        </option>
                                                    </select>
                                                    <div id="errorPgpon" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar una opción
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Tipo de trabajo*
                                                </label>
                                                <div>
                                                    <select @change.prevent="DeleteErrorform()" class="form-control select" v-model="tipo_trabajoid">
                                                        <option v-bind:value="tipo_trabajo.id" v-for="tipo_trabajo in tipo_trabajos">
                                                            {{tipo_trabajo.nombre_trabajo_ingenieria}}
                                                        </option>
                                                    </select>
                                                    <div id="errorTipoTrabajoIng" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar una opción
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Modo de trabajo*
                                                </label>
                                                <div>
                                                    <select @change.prevent="GetTipoModoTrabajo()" class="form-control select" v-model="modo_trabajo_id">
                                                        <option v-bind:value="modo_trabajo.id" v-for="modo_trabajo in modo_trabajos">
                                                            {{modo_trabajo.nombre_identificacion}}
                                                        </option>
                                                    </select>
                                                    <div id="errorModoTrabajo" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar modo de trabajo
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold" v-if="modo_trabajo_id == 1">
                                                    Tipo de equipo*
                                                </label>
                                                <label class="barlow semi-bold" v-if="modo_trabajo_id==2">
                                                    Tipo de servicio*
                                                </label>
                                                <div v-if="modo_trabajo_id == 1">
                                                    <select @change.prevent="DeleteErrorform()" class="form-control select" v-model="equipo_id">
                                                        <option v-bind:value="tipo_modo.id" v-for="tipo_modo in tipo_modos">
                                                            {{tipo_modo.nombre_equipamiento}}
                                                        </option>
                                                    </select>
                                                    <div id="errortipoEquipo" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar un equipo
                                                        </p>
                                                    </div>
                                                </div>
                                                <div v-if="modo_trabajo_id == 2">
                                                    <select @change.prevent="DeleteErrorform()" class="form-control select" v-model="servicio_id">
                                                        <option v-bind:value="tipo_modo.id" v-for="tipo_modo in tipo_modos">
                                                            {{tipo_modo.nombre_servicio}}
                                                        </option>
                                                    </select>
                                                    <div id="errorTipoServicio" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar un servicio
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Motivo del trabajo*
                                                </label>
                                                <div>
                                                    <select @change.prevent="DeleteErrorform()" class="form-control select" v-model="motivo_trabajo_id">
                                                        <option v-bind:value="motivo_trabajo.id" v-for="motivo_trabajo in motivo_trabajos">
                                                            {{motivo_trabajo.motivo}}
                                                        </option>
                                                    </select>
                                                    <div id="errorMotivoTrabajo" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar el motido del trabajo
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Fecha trabajo*
                                                </label>
                                                <div>
                                                    <input @change.prevent="DeleteErrorform()" class="form-control" name="" type="date" v-model="Fecha_trabajo">
                                                    </input>
                                                    <div id="errorFecha" style="display: none">
                                                        <p style="color: red">
                                                            Favor ingresar una fecha
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Área de trabajo*
                                                </label>
                                                <div>
                                                    <select @change.prevent="DeleteErrorform()" class="form-control select" name="AreaTrabajo" v-model="AreaTrabajoId">
                                                        <option v-bind:value="trabajo.id" v-for="trabajo in area_trabajos">
                                                            {{trabajo.area}}
                                                        </option>
                                                    </select>
                                                    <div id="errorAreaTrabajoIng" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar área de trabajo
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    SubG. Cargo de Pago*
                                                </label>
                                                <div>
                                                    <select @change.prevent="DeleteErrorform()" class="form-control select" v-model="responsable_id">
                                                        <option v-bind:value="responsable.id" v-for="responsable in responsables">
                                                            {{responsable.nombre}}
                                                        </option>
                                                    </select>
                                                    <div id="errorResponsablePago" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar una opción
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Pm Proyecto*
                                                </label>
                                                <div>
                                                    <div id="pm_proyecto_search_sgc">
                                                        <div class="input-group">
                                                            <input class="form-control " id="input_pm_proyecto_search" placeholder="Buscar pm proyecto" type="text" v-model="nombre_pm_proyecto" v-on:keyup="buscar_pm_proyecto"/>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-search">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="select_pm_proyecto_sgc" style="display: none">
                                                        <div class="input-group">
                                                            <input class="form-control" disabled="true" name="" style="background-color:#1e5e98;color:white;" type="" v-bind:value="nombre_pm_proyecto_select"/>
                                                            <div class="input-group-append">
                                                                <div @click.prevent="cambiar_pm_proyecto()" class="input-group-text " style="cursor: pointer  ">
                                                                    <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="list_pm_pryectos" style="display:none;">
                                                        <div class="s_l">
                                                            <div :style="'width:'+input_width_form_pm_proyecto+'px'+';'" class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                                                <div v-for="pm_proyecto in pm_proyectos">
                                                                    <a @click.prevent="select_pm_proyecto_sgc_fun(pm_proyecto)" href="" style="color:black">
                                                                        {{pm_proyecto.nombre_completo}}
                                                                        <hr style="margin-top: -1px;"/>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="errorPmProyecto" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar un pm de proyecto
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Pm Interno*
                                                </label>
                                                <div>
                                                    <div id="pm_interno_search_sgc">
                                                        <div class="input-group">
                                                            <input class="form-control " id="input_pm_interno_search" placeholder="Buscar pm interno" type="text" v-model="nombre_pm_interno" v-on:keyup="buscar_pm_interno"/>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-search">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="select_pm_interno_sgc" style="display: none">
                                                        <div class="input-group">
                                                            <input class="form-control" disabled="true" name="" style="background-color:#1e5e98;color:white;" type="" v-bind:value="nombre_pm_interno_select"/>
                                                            <div class="input-group-append">
                                                                <div @click.prevent="cambiar_pm_interno()" class="input-group-text " style="cursor: pointer  ">
                                                                    <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="list_pm_internos" style="display:none;">
                                                        <div class="s_l">
                                                            <div :style="'width:'+input_width_form_pm_interno+'px'+';'" class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                                                <div v-for="pm_interno in pm_internos">
                                                                    <a @click.prevent="select_pm_interno_sgc_fun(pm_interno)" href="" style="color:black">
                                                                        {{pm_interno.nombre_completo}}
                                                                        <hr style="margin-top: -1px;"/>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="errorPminterno" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar un pm interno
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Solicitante*
                                                </label>
                                                <div>
                                                    <div id="solicitante_search_sgc">
                                                        <div class="input-group">
                                                            <input class="form-control " id="input_solicitante_search" placeholder="Buscar solicitante" type="text" v-model="nombre_solicitante" v-on:keyup="buscar_solicitante"/>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-search">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="select_solicitante_sgc" style="display: none">
                                                        <div class="input-group">
                                                            <input class="form-control" disabled="true" name="" style="background-color:#1e5e98;color:white;" type="" v-bind:value="nombre_solicitante_select"/>
                                                            <div class="input-group-append">
                                                                <div @click.prevent="cambiar_solicitante()" class="input-group-text " style="cursor: pointer  ">
                                                                    <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="list_solicitantes" style="display:none;">
                                                        <div class="s_l">
                                                            <div :style="'width:'+input_width_form_solicitante+'px'+';'" class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                                                <div v-for="solicitante in solicitantes">
                                                                    <a @click.prevent="select_solicitante_fun(solicitante)" href="" style="color:black">
                                                                        {{solicitante.nombre_completo}}
                                                                        <hr style="margin-top: -1px;"/>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="errorsolicitante" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar un solicitante
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Nombre Proyecto*
                                                </label>
                                                <div>
                                                    <input @keyup.prevent="DeleteErrorform()" class="form-control" name="" type="text" v-model="nombre_proyecto">
                                                    </input>
                                                    <div id="errorNombreProyecto" style="display: none">
                                                        <p style="color: red">
                                                            Favor rellenar el campo
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold" v-if="responsable_id == 2">
                                                    Trabajo ejecutado*
                                                </label>
                                                <label class="barlow semi-bold" v-if="responsable_id != 2">
                                                    Trabajo ejecutado
                                                </label>
                                                <div>
                                                    <select @change.prevent="DeleteErrorform()" class="form-control select" v-model="trabajo_ejecutado">
                                                        <option v-bind:value="1">
                                                            SI
                                                        </option>
                                                        <option v-bind:value="2">
                                                            NO
                                                        </option>
                                                    </select>
                                                    <div id="errorPropyectoEjecutado" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar una opción
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Agregar Tp
                                                </label>
                                                <div>
                                                    <button @click.prevent="addTpIng(1)" class="btn btn-secondary btn-block" style="color:white" type="button">
                                                        <i class="fas fa-plus">
                                                        </i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Añadir participantes
                                                </label>
                                                <div>
                                                    <button @click.prevent="getParticipantes()" class="btn btn-secondary btn-block">
                                                        <i class="fas fa-plus">
                                                        </i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Indicar cantidad de pagos
                                                </label>
                                                <div>
                                                    <button @click.prevent="Addpagos()" class="btn btn-secondary btn-block">
                                                        <i class="fas fa-plus">
                                                        </i>
                                                    </button>
                                                </div>
                                                <div id="errorCantidadPagos" style="display: none">
                                                    <p style="color: red">
                                                        Favor indicar cantidad de pagos
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" id="AddTpIngblock" style="display: none">
                                            <label class="barlow semi-bold">
                                                Agregar números de tp
                                            </label>
                                            <div class="form-inline">
                                                <input class="form-control" name="" type="number" v-model="nroTp"/>
                                                <button @click.prevent="addtp()" class="btn btn-secondary" style="margin-left: 10px;">
                                                    <i class="fas fa-plus">
                                                    </i>
                                                </button>
                                            </div>
                                            <div class="wrapper wrapper-content" style="background-color: #f4f6f9; border-radius: 3px;margin-top: 10px;">
                                                <div class="card-body">
                                                    <div class=" row">
                                                        <div class=" " v-for="(tp, key) in tps">
                                                            <div style="margin-left: 12px;margin-top: 10px;">
                                                                <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                                                    {{tp.numero}}
                                                                    <a @click.prevent="deleteTp(key)" class="" href="#" style="color: white">
                                                                        <i class="fas fa-times-circle boxBounce">
                                                                        </i>
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" id="participantediv" style="display: none">
                                            <label class="barlow semi-bold">
                                                Seleccione a los participantes
                                            </label>
                                            <div class="wrapper wrapper-content" style="background-color: #f4f6f9; border-radius: 3px;margin-top: 10px;">
                                                <div class="wrapper wrapper-content" style="background-color: #f4f6f9; border-radius: 3px;margin-top: 10px;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="form-check form-check-inline" style="margin-left: 8px;" v-for="interesado in interesados">
                                                                <input class="form-check-input" type="checkbox" v-bind:value="interesado.id" v-model="list_interesados">
                                                                    <label class="form-check-label" for="inlineCheckbox1">
                                                                        {{interesado.name}} {{interesado.apellido}}
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" id="cuotasDiv" style="display: none">
                                            <label class="barlow semi-bold">
                                                Seleccione el número de cuotas
                                            </label>
                                            <div class="form-group">
                                                <select @change.prevnt="showTotalFechas()" class="form-control select" style="width: 20%;" v-model="cantCuotas">
                                                    <option v-bind:value="1">
                                                        1
                                                    </option>
                                                    <option v-bind:value="2">
                                                        2
                                                    </option>
                                                    <option v-bind:value="3">
                                                        3
                                                    </option>
                                                    <option v-bind:value="4">
                                                        4
                                                    </option>
                                                    <option v-bind:value="5">
                                                        5
                                                    </option>
                                                    <option v-bind:value="6">
                                                        6
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="wrapper wrapper-content" style="background-color: #f4f6f9; border-radius: 3px;margin-top: 10px;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div id="divFechas" style="margin-left: 10px;" v-for="(coutasselc,key) in coutasselcs">
                                                            <input @change.prevent="DeleteErrorInput" class="form-control" name="" type="date" v-model="fecha_select[key]">
                                                            </input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Detalle del trabajo*
                                                </label>
                                                <div>
                                                    <textarea @keyup.prevent="DeleteErrorform()" class="form-control " style="height: 150px;" v-model="detalle_trabajo">
                                                    </textarea>
                                                    <div id="errorDetalle" style="display: none">
                                                        <p style="color: red">
                                                            Favor rellenar el campo
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-pane" id="wizardIng2" style="display: none; min-height: 300px;">
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Seleccione una opción *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input @click="selectoptionSite(1)" class="selectgroup-input" name="value" type="radio" value="50">
                                                        <span class="selectgroup-button">
                                                            Ingreso normal
                                                        </span>
                                                    </input>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input @click="selectoptionSite(2)" class="selectgroup-input" name="value" type="radio" value="100">
                                                        <span class="selectgroup-button">
                                                            Ingreso manual
                                                        </span>
                                                    </input>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input @click="selectoptionSite(3)" class="selectgroup-input" name="value" type="radio" value="150">
                                                        <span class="selectgroup-button">
                                                            Sin sitio
                                                        </span>
                                                    </input>
                                                </label>
                                            </div>
                                            <div id="errorSelectopcion" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar una opción
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ingresoNormalIng" style="display: none">
                                        <div class="form-group row align-items-center">
                                            <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                                Sitio*
                                            </label>
                                            <div class="col-lg-4 col-md-6">
                                                <div id="popcheckIng" style="display: none">
                                                    <div class="input-group ">
                                                        <input @click.prevent="
                                                      changePop" class="form-control " id="popNameIng" name="" type="text" value=""/>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-undo-alt">
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="popSearchIng">
                                                    <div class="input-group ">
                                                        <input class="form-control " id="inputSitio" name="datositio" placeholder="Buscar Sitio" type="text" v-model="datositio" v-on:keyup="BuscarSitio"/>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-search">
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="s_l_p" id="listPopsIng" style="display:none;">
                                                        <div class="s_l_m ">
                                                            <div class="dropdown-item " v-for="pop in pops">
                                                                <a @click.prevent="selectdpop(pop)" href="" id="selectpopvalue" style="color:black">
                                                                    {{pop.nem_site}}  {{pop.nombre}}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="errorPopIng" style="display: none">
                                                    <p style="color: red">
                                                        Favor Seleccionar el sitio
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ingresoManualIng" style="display: none">
                                        <div class="form-group row align-items-center">
                                            <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                                Nemonico movil *
                                            </label>
                                            <div class="col-lg-4 col-md-6">
                                                <input @keyup.prevent="DeleteErrorformIng" class="form-control" type="text" v-model="nemonico_movil">
                                                    <div id="errorNemonicoing" style="display: none">
                                                        <p style="color: red">
                                                            Favor rellenar el campo
                                                        </p>
                                                    </div>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                                Nombre sitio *
                                            </label>
                                            <div class="col-lg-4 col-md-6">
                                                <input @keyup.prevent="DeleteErrorformIng" class="form-control" type="text" v-model="nombre_sitio">
                                                    <div id="errorNombreSitioing" style="display: none">
                                                        <p style="color: red">
                                                            Favor rellenar el campo
                                                        </p>
                                                    </div>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                                Dirección *
                                            </label>
                                            <div class="col-lg-4 col-md-6">
                                                <input @keyup.prevent="DeleteErrorformIng" class="form-control" type="text" v-model="direccion_sitio">
                                                    <div id="errorDireccioning" style="display: none">
                                                        <p style="color: red">
                                                            Favor rellenar el campo
                                                        </p>
                                                    </div>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                                Región  *
                                            </label>
                                            <div class="col-lg-4 col-md-6">
                                                <select @change.prevent="searchComuna()" class="form-control select" v-model="region_ingreso_manual">
                                                    <option v-bind:value="region.id" v-for="region in regiones">
                                                        {{region.nombre_region}}
                                                    </option>
                                                </select>
                                                <div id="errorRegioning" style="display: none">
                                                    <p style="color: red">
                                                        Favor rellenar el campo
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                                Comuna  *
                                            </label>
                                            <div class="col-lg-4 col-md-6">
                                                <select @change.prevent="DeleteErrorformIng()" class="form-control select" v-model="comuna_ingreso_manual">
                                                    <option v-bind:value="comuna.id" v-for="comuna in comunas">
                                                        {{comuna.nombre_comuna}}
                                                    </option>
                                                </select>
                                                <div id="errorComunaing" style="display: none">
                                                    <p style="color: red">
                                                        Favor rellenar el campo
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                                Categoria  *
                                            </label>
                                            <div class="col-lg-4 col-md-6">
                                                <select @change.prevent="DeleteErrorformIng()" class="form-control select" v-model="categoria_id">
                                                    <option v-bind:value="1">
                                                        A
                                                    </option>
                                                    <option v-bind:value="2">
                                                        B
                                                    </option>
                                                    <option v-bind:value="3">
                                                        C
                                                    </option>
                                                    <option v-bind:value="4">
                                                        D
                                                    </option>
                                                    <option v-bind:value="5">
                                                        E
                                                    </option>
                                                    <option v-bind:value="6">
                                                        NN
                                                    </option>
                                                </select>
                                                <div id="errorCategoriaing" style="display: none">
                                                    <p style="color: red">
                                                        Favor rellenar el campo
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="SinSitioIng" style="display: none">
                                        <div class="form-group row align-items-center">
                                            <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                                Región  *
                                            </label>
                                            <div class="col-lg-4 col-md-6">
                                                <select @change.prevent="DeleteErrorformIng()" class="form-control select" v-model="region_sin_sitio">
                                                    <option v-bind:value="region.id" v-for="region in regiones">
                                                        {{region.nombre_region}}
                                                    </option>
                                                </select>
                                                <div id="errorRegion2Ing" style="display: none">
                                                    <p style="color: red">
                                                        Favor rellenar el campo
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-pane" id="wizardIng3" style="display: none">
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Proveedor  *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <input style="display: none" type="text" v-bind:value="idproveedor">
                                                <input @click.prevent="searchNewProveedor" class="form-control" id="SelectProveedorIng" name="SelectProveedor" style="display: none" type="text" value="">
                                                    <input class="form-control " id="SearchproveedorDontDisplayIng" name="Proveedor" placeholder="Buscar proveedor" style="color:#999999" type="text" v-model="Buscarproveedor" v-on:keyup="BuscarProveedor">
                                                        <div class="s_l" id="listProveedorIng" style="display:none;">
                                                            <div class="s_l_m">
                                                                <div class="dropdown-item" v-for="proveedor in Proveedores">
                                                                    <a @click.prevent="SelectProveedor(proveedor)" class="changeColor" href="" id="selectProveedorvalueIng">
                                                                        {{proveedor.PROVEEDOR.toLowerCase()}} - {{proveedor.RUT_PROVEEDOR}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="errorProveedorIng" style="display: none">
                                                            <p style="color: red">
                                                                Favor seleccionar proveedor
                                                            </p>
                                                        </div>
                                                    </input>
                                                </input>
                                            </input>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Tipo boleta  *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <select @change.prevent="DeleteErrorformboleta()" class="form-control select" v-model="boleta_id">
                                                <option v-bind:value="boleta.id" v-for="boleta in Tipo_boletas">
                                                    {{boleta.descripcion}}
                                                </option>
                                            </select>
                                            <div id="errorBoletaIng" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar una opción
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Nro° boleta
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <input @change.prevent="validateBoleta" class="form-control" name="" type="text" v-model="nroBoleta">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Tipo Moneda *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <select @change.prevent="DeleteErrorformCosto" class="form-control select" v-model="Tipo_moneda_id">
                                                <option v-bind:value="Tipo_moneda.id" v-for="  Tipo_moneda in   Tipo_monedas">
                                                    {{Tipo_moneda.moneda}}
                                                </option>
                                            </select>
                                            <div id="errorTipoMonedaIng" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar tipo de moneda
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Costo total *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <currency-input class="form-control " currency="USD" locale="de" v-model="costo">
                                            </currency-input>
                                            <div id="errorcostoIng" style="display: none">
                                                <p style="color: red">
                                                    Favor rellenar el campo
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Codigo SAP *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <input @keyup.prevent="DeleteErrorformIng" class="form-control" name="" style="width: 100%" type="number" v-model="cod_sap">
                                                <div id="errorSaping" style="display: none">
                                                    <p style="color: red">
                                                        Favor rellenar el campo
                                                    </p>
                                                </div>
                                            </input>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Tipo de pago *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <select @change.prevent="DeleteErrorformIng" class="form-control select" v-model="tipo_pago_id">
                                                <option v-bind:value="1">
                                                    Fijo
                                                </option>
                                                <option v-bind:value="2">
                                                    Variable
                                                </option>
                                            </select>
                                            <div id="errorTipoPago" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar tipo de pago
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-pane" id="wizardIng4" style="display: none">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Carta adjudicación
                                                </label>
                                                <div>
                                                    <input @change.prevent="MostrarDatosArchivosCaj" class="form-control" id="adjudicacion" multiple="" ref="cartaAdjudicaciones" type="file"/>
                                                </div>
                                                <div class="file-listing " v-for="(file, key) in cartaAdjudicaciones">
                                                    <div>
                                                        <div style="margin-top: 8px;">
                                                        </div>
                                                        <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                            {{ file.name }}
                                                            <a href="#" v-on:click="removeAdjudicación( key )">
                                                                <i class="fas fa-times-circle boxBounce" style="color:white">
                                                                </i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    LPU
                                                </label>
                                                <div>
                                                    <input @change.prevent="MostrarDatosArchivosLpu" class="form-control" id="lpu" multiple="" ref="lpus" type="file"/>
                                                </div>
                                                <div class="file-listing " v-for="(file, key) in lpus">
                                                    <div>
                                                        <div style="margin-top: 8px;">
                                                        </div>
                                                        <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                            {{ file.name }}
                                                            <a href="#" v-on:click="removeLpu( key )">
                                                                <i class="fas fa-times-circle boxBounce" style="color:white">
                                                                </i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Mail de compras
                                                </label>
                                                <div>
                                                    <input @change.prevent="MostrarDatosArchivosMail" class="form-control" id="mails" multiple="" ref="mailsFile" type="file"/>
                                                </div>
                                                <div class="file-listing " v-for="(file, key) in mails">
                                                    <div>
                                                        <div style="margin-top: 8px;">
                                                        </div>
                                                        <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                            {{ file.name }}
                                                            <a href="#" v-on:click="removeMail( key )">
                                                                <i class="fas fa-times-circle boxBounce" style="color:white">
                                                                </i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Cotizaciones
                                                </label>
                                                <div>
                                                    <input @change.prevent="MostrarDatosArchivosCotizaciones" class="form-control" id="coti" multiple="" ref="cotizacionFile" type="file"/>
                                                </div>
                                                <div class="file-listing " v-for="(file, key) in cotizaciones">
                                                    <div>
                                                        <div style="margin-top: 8px;">
                                                        </div>
                                                        <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                            {{ file.name }}
                                                            <a href="#" v-on:click="removeCotizacoin( key )">
                                                                <i class="fas fa-times-circle boxBounce" style="color:white">
                                                                </i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12" id="progressBarFileUpoadIng" style="display: none">
                                        <div class="card-title barlow semi-bold">
                                            <h2 style="font-size: 20px;">
                                                Subiendo archivos...
                                            </h2>
                                        </div>
                                        <div class="progress mb-3 " data-height="25">
                                            <div :style="'width:'+ getProgress" aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" class="progress-bar bg-secondary" role="progressbar">
                                                <div v-if=" getProgress == 'NaN%'">
                                                </div>
                                                <div v-if=" getProgress != 'NaN%'">
                                                    {{getProgress}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="col-12 col-md-12 col-sm-12" v-if="load_data_form == 1 ">
                                <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                    <div class="card-body">
                                        <div class="empty-state" data-height="400">
                                            <div class="d-flex justify-content-center" >
                                                <div class="spinner-border text-primary" role="status" style="width: 8rem;height: 8rem;color: #007bff!important;">
                                                 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer " style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29);">
                            <a @click.prevent="BackStepOneIng()" class="btn btn-icon icon-left btn-secondary" href="#" id="backStepIng1" style="display: none;box-shadow: 0 0px 0px;color: #191919">
                                <i class="fas fa-arrow-left">
                                </i>
                                Atrás
                            </a>
                            <a @click.prevent="BackStepTwoIng()" class="btn btn-icon icon-left btn-secondary" href="#" id="backStepIng2" style="display: none;box-shadow: 0 0px 0px;color: #191919">
                                <i class="fas fa-arrow-left">
                                </i>
                                Atrás
                            </a>
                            <a @click.prevent="BackStepThreeIng()" class="btn btn-icon icon-left btn-secondary" href="#" id="backStepIng3" style="display: none; box-shadow: 0 0px 0px;color: #191919">
                                <i class="fas fa-arrow-left">
                                </i>
                                Atrás
                            </a>
                            <a @click.prevent="ValidateFormSgcStepOneIng()" class="btn btn-icon icon-right btn-secondary" href="#" id="btnNextStepOneIng" style="box-shadow: 0 0px 0px;color: #191919">
                                Siguiente
                                <i class="fas fa-arrow-right">
                                </i>
                            </a>
                            <a @click.prevent="ValidateFormSgcStepTwo()" class="btn btn-icon icon-right btn-secondary" href="#" id="btnNextStepTwoIng" style="display: none;box-shadow: 0 0px 0px;color: #191919">
                                Siguiente
                                <i class="fas fa-arrow-right">
                                </i>
                            </a>
                            <a @click.prevent="ValidateFormSgcStepThree()" class="btn btn-icon icon-right btn-secondary" href="#" id="btnNextStepThreeIng" style="display: none;box-shadow: 0 0px 0px;color: #191919">
                                Siguiente
                                <i class="fas fa-arrow-right">
                                </i>
                            </a>
                            <a @click.prevent="CreateSolicitudIng()" class="btn btn-icon icon-right btn-secondary" href="#" id="btnFinSolicitudIng" style="display: none;box-shadow: 0 0px 0px;color: #191919">
                                Finalizar
                                <i class="fas fa-arrow-right">
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import axios from 'axios';
import moment from 'moment';
import EventBus from "./event-bus"


export default {
    data(){
        return{
            load_data_form:1,
            fullPage: false,
            step:1,
            flujo_trabajos:[],
            flujoId:'',
            pgpon:'',
            tipo_trabajos:[],
            tipo_trabajoid:'',
            modo_trabajos:[],
            modo_trabajo_id:'',
            tipo_modos:[],
            equipo_id:'',
            servicio_id:'',
            motivo_trabajos:[],
            motivo_trabajo_id:'',
            area_trabajos:[],
            AreaTrabajoId:'',
            responsables:[],
            solicitantes:[],
            pm_proyectos:[],
            pm_internos:[],
            responsable_id:'',
            pm_proyecto_id:'',
            pm_interno_id:'',
            solicitante_id:'',
            Fecha_trabajo:'',
            detalle_trabajo:'',
            nombre_proyecto:'',
            trabajo_ejecutado:'',
            tps:[],
            nroTp:'',
            interesados:[],
            list_interesados:[],
            coutasselcs:[],
            fecha_select:[],
            cantCuotas:'',
            popId:'',
            dataPop:'',
            pops:[],
            nemonico_movil:'',
            nombre_sitio:'',
            direccion_sitio:'',
            region_ingreso_manual:'',
            comuna_ingreso_manual:'',
            categoria_id:'',
            region_sin_sitio:'',
            comunas:[],
            regiones:[],
            datositio:'',
            formatoPep:'',
            idproveedor:'',
            Buscarproveedor:'',
            Proveedores:[],
            idproveedor:'',
            NombreProveedorSelect:'',
            Tipo_boletas:[],
            boleta_id:'',
            nroBoleta:'',
            confirmacion_boleta:'',
            Tipo_monedas:[],
            Tipo_moneda_id:'',
            costo:0,
            cod_sap:'',
            tipo_pago_id:'',
            correct_job_amount:'',
            cartaAdjudicaciones:[],
            lpus:[],
            mails:[],
            cotizaciones:[],
            porcentaje:{
                type:Number,
                default:0
            },
            stepTwoPass:'',
            stepThreePass:'',
            nombre_pm_proyecto:'',
            input_width_form_pm_proyecto:0,
            nombre_pm_proyecto_select:'',
            nombre_pm_interno:'',
            nombre_pm_interno_select:'',
            input_width_form_pm_interno:0,
            nombre_solicitante:'',
            nombre_solicitante_select:'',
            input_width_form_solicitante:0,
            

        }
    },

    created:function(){




    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.formIng', function () {
            self.GetDataForm()
         
        });
    },
    computed:{
        getProgress(){
            return Math.round(this.porcentaje)+'%'
        }
    },
















    methods:{
        formato: function(d) {
            return moment(d).format("DD/MM/YY - hh:mm:ss");
        },
        GetDataForm: function() {
            $('#createSolicitudIng').modal('show');

            axios.get('/getDataFormIng').then((response) => {
                this.flujo_trabajos = response.data.flujos;
                this.tipo_trabajos = response.data.tipo_trabajo;
                this.modo_trabajos = response.data.tipo_identificacion_trabajo;
                this.motivo_trabajos = response.data.motivo_trabajo;
                this.responsables = response.data.responsable_pago;
            }).finally(() =>this.load_data_form = 0);
           
           
            axios.get('/GetAreaTrabajo').then((response) => {
                this.area_trabajos = response.data;
            })
                   
            axios.get('/GetTipoBoleta').then((response) => {
                this.Tipo_boletas = response.data;
            })
            axios.get('/GetTipoMoneda').then((response) => {
                this.Tipo_monedas = response.data;
            })
        },
        CleanAllFormIng: function() {
            this.flujoId = ''
            this.pgpon = ''
            this.tipo_trabajoid = ''
            this.modo_trabajo_id = ''
            this.equipo_id = ''
            this.servicio_id = ''
            this.motivo_trabajo_id = ''
            this.Fecha_trabajo = ''
            this.AreaTrabajoId = ''
            this.responsable_id = ''
            this.pm_proyecto_id = ''
            this.pm_interno_id = ''
            this.solicitante_id = ''
            this.nombre_proyecto = ''
            this.trabajo_ejecutado = ''
            this.detalle_trabajo = ''
            document.getElementById('AddTpIngblock').style.display = 'none'
            this.tps = []
            document.getElementById('participantediv').style.display = 'none'
            this.list_interesados = []
            this.coutasselcs = this.cantCuotas
            this.fecha_select = []
            this.cantCuotas = ''
            this.coutasselcs = []
            document.getElementById("cuotasDiv").style.display = 'none'
            this.changePop()
            document.getElementById('ingresoNormalIng').style.display = 'none'
            this.cleanIngresoManual()
            this.cleanSinSitio()
            document.getElementById("ingresoManualIng").style.display = 'none'
            document.getElementById("SinSitioIng").style.display = 'none'
            this.BackStepOneOnClick()
            this.boleta_id = ''
            this.nroBoleta = ''
            this.Tipo_moneda_id = ''
            this.costo = 0
            this.cod_sap = ''
            this.tipo_pago_id = ''
            this.cartaAdjudicaciones = []
            this.lpus = []
            this.mails = []
            this.cotizaciones = []
            this.idproveedor = ''
            this.searchNewProveedor()
            document.getElementById("progressBarFileUpoadIng").style.display = 'none'
            this.porcentaje = 0
            this.cambiar_pm_proyecto();
            this.cambiar_pm_interno();
            this.cambiar_solicitante();
        },
        SelectProveedor: function(proveedor) {
            this.idproveedor = proveedor.id;
            this.NombreProveedorSelect = proveedor.PROVEEDOR;
            var SearchproveedorDontDisplay = document.getElementById('SearchproveedorDontDisplayIng');
            SearchproveedorDontDisplay.style.display = 'none'
            var SelectProveedor = document.getElementById('SelectProveedorIng');
            SelectProveedor.style.display = ''
            var box = document.getElementById('listProveedorIng');
            box.style.display = 'none';
            $("#SelectProveedorIng").val(proveedor.PROVEEDOR.toLowerCase());
            document.getElementById('errorProveedorIng').style.display = 'none'
            this.Buscarproveedor = ''
        },
        DeleteErrorformCosto: function() {
            if (this.Tipo_moneda_id != '') {
                document.getElementById("errorTipoMonedaIng").style.display = 'none'
                if (this.costo != 0) {
                    this.costo = ''
                }
            }
        },
        DeleteErrorformboleta: function() {
            if (this.boleta_id != '') {
                document.getElementById("errorBoletaIng").style.display = 'none'
                if (this.nroBoleta != '') {
                    this.nroBoleta = ''
                }
            }
        },
        validateMonto: function() {
            document.getElementById('errorcostoIng').style.display = 'none'
            axios.get('/getValorUf').then((response) => {
                let valorUf = response.data
                if (this.Tipo_moneda_id == 1) {
                    let conversion = this.costo / valorUf
                    if (conversion > 1000 && this.tipo_trabajoid != 1 && this.tipo_trabajoid != 3 && this.tipo_trabajoid != 4) {
                        Swal.fire({
                            title: '¡ERROR!',
                            text: 'El monto excede las 1000 UF, el campo  "tipo de trabajo" debe indicar LICITACIÓN  o LPU',
                            type: 'error',
                            confirmButtonText: 'Aceptar',
                        })
                        this.correct_job_amount = 2
                    } else {
                        this.correct_job_amount = 1
                    }
                } else {
                    if (this.Tipo_moneda_id == 2) {
                        if (this.costo > 1000 && this.tipo_trabajoid != 1 && this.tipo_trabajoid != 3 && this.tipo_trabajoid != 4) {
                            Swal.fire({
                                title: '¡ERROR!',
                                text: 'El monto excede las 1000 UF, el campo  "tipo de trabajo" debe indicar LICITACIÓN  o LPU',
                                type: 'error',
                                confirmButtonText: 'Aceptar',
                            })
                            this.correct_job_amount = 2
                        } else {
                            this.correct_job_amount = 1
                        }
                    } else {
                        if (this.Tipo_moneda_id == 3) {
                            if (this.costo > 41677 && this.tipo_trabajoid != 1 && this.tipo_trabajoid != 3 && this.tipo_trabajoid != 4) {
                                Swal.fire({
                                    title: '¡ERROR!',
                                    text: 'El monto excede las 1000 UF, el campo  "tipo de trabajo" debe indicar LICITACIÓN  o LPU',
                                    type: 'error',
                                    confirmButtonText: 'Aceptar',
                                })
                                this.correct_job_amount = 2
                            } else {
                                this.correct_job_amount = 1
                            }
                        } else {
                            if (this.costo > 33875 && this.tipo_trabajoid != 1 && this.tipo_trabajoid != 3 && this.tipo_trabajoid != 4) {
                                Swal.fire({
                                    title: '¡ERROR!',
                                    text: 'El monto excede las 1000 UF, el campo  "tipo de trabajo" debe indicar LICITACIÓN  o LPU',
                                    type: 'error',
                                    confirmButtonText: 'Aceptar',
                                })
                                this.correct_job_amount = 2
                            } else {
                                this.correct_job_amount = 1
                            }
                        }
                    }
                }
            })
        },
        validar_bloqueo:function(){
               axios.get(`/pep-blocked?pep=${this.nroBoleta}`).then((response) => {
                          if (response.data == 1) {
                              this.$swal({
                                  type: 'error',
                                  title: 'Error',
                                  text: 'El PEP ' + ' ' + this.nroBoleta + ' ' + ' se encuentra bloqueado actualmente, favor contactar a jefatura directa para mayor información.',
                                  showCloseButton: true,
                              });
                              this.nroBoleta = '';
                          } 
                })
        },
        validateBoleta: function() {
            if (this.nroBoleta.length != 0) {
                if (this.boleta_id == 1) {
                    if (this.nroBoleta.length < 5 || this.nroBoleta.length > 5) {
                        Swal.fire({
                            title: '¡ERROR!',
                            text: 'Debes ingresar 5 números',
                            type: 'error',
                            confirmButtonText: 'Aceptar',
                            closeOnConfirm: false
                        })
                        this.confirmacion_boleta = 2
                    } else {
                        if (this.nroBoleta.length == 5) {
                            if (isNaN(this.nroBoleta)) {
                                Swal.fire({
                                    title: '¡ERROR!',
                                    text: 'Debes ser una cadena númerica de 5 dígitos',
                                    type: 'error',
                                    confirmButtonText: 'Aceptar',
                                    closeOnConfirm: false
                                })
                                this.confirmacion_boleta = 2
                            } else {
                                this.confirmacion_boleta = 1
                            }
                        }
                    }
                } else {
                    if (this.boleta_id == 2) {
                        if (this.nroBoleta.substr(0, 2) == 'R-' && !isNaN(this.nroBoleta.substr(2, 8)) && this.nroBoleta.substr(10, 1) == '.' && !isNaN(this.nroBoleta.substr(11, 4)) && (this.nroBoleta.substr(11, 4).length == 4)) {
                            console.log('pasoBred')
                            this.confirmacion_boleta = 1
                        } else {
                            Swal.fire({
                                title: '¡ERROR!',
                                text: 'Formato ingresado incorrecto, debe seguir este formato "R-8NÚMEROS.4NÚMEROS"',
                                type: 'error',
                                confirmButtonText: 'Aceptar',
                                closeOnConfirm: false
                            })
                            this.confirmacion_boleta = 2
                        }
                    } else {
                        if (this.boleta_id == 3) {
                            if (this.nroBoleta.substr(0, 2) != 'E-' && this.nroBoleta.substr(0, 7) != 'GRE-GRE' && this.nroBoleta.substr(0, 4) != 'GSI-' && this.nroBoleta.substr(0, 4) != 'VCO-' && this.nroBoleta.substr(0, 7) != 'GRE-GCI' && this.nroBoleta.substr(0,7) != 'VPE-GCI' ){
                                Swal.fire({
                                    title: '¡ERROR!',
                                    text: 'Formato ingresado incorrecto, debe seguir alguno de estos formatos "E-6NÚMEROS.3CARACTERES", "GRE-GRE-3CARACTERES2NÚMEROS.8CARACTERES", "GSI-GRE-3CARACTERES2NÚMEROS.8CARACTERES", "VCO-GRE-3CARACTERES2NÚMEROS.8CARACTERES" o "GRE-GCI-MIM20.5GMFG007" o "VPE-GCI-FIF22.GPHINF01"',
                                    type: 'error',
                                    confirmButtonText: 'Aceptar',
                                    closeOnConfirm: false
                                })
                                this.confirmacion_boleta = 2
                            } else {
                                if (this.nroBoleta.substr(0, 2) == 'E-') {
                                    if (this.nroBoleta.substr(0, 2) == 'E-' && this.nroBoleta.substr(2, 6) && this.nroBoleta.substr(8, 1) == '.' && this.nroBoleta.substr(9, 4).length == 3) {
                                        console.log('PasofomatoPepFijo')
                                        this.confirmacion_boleta = 1
                                        this.validar_bloqueo();
                                    } else {
                                        Swal.fire({
                                            title: '¡ERROR!',
                                            text: 'Formato ingresado incorrecto, debe seguir este formato "E-6NÚMEROS.3CARACTERES que pueden números o letras, nunca alfanumérico"',
                                            type: 'error',
                                            confirmButtonText: 'Aceptar',
                                            closeOnConfirm: false
                                        })
                                        this.confirmacion_boleta = 2
                                    }
                                } else {
                                    if (this.nroBoleta.substr(0, 7) == 'GRE-GRE') {
                                        console.log(this.nroBoleta.substr(14, 7))
                                        if (this.nroBoleta.substr(0, 4) == 'GRE-' && this.nroBoleta.substr(4, 4) == 'GRE-' && this.nroBoleta.substr(8, 3).length == 3 && (this.nroBoleta.substr(11, 2).length == 2) && this.nroBoleta.substr(13, 1) == '.' && this.nroBoleta.substr(14, 8).length == 8) {
                                            console.log('PasofomatoPepMovil')
                                            this.confirmacion_boleta = 1
                                             this.validar_bloqueo();
                                        } else {
                                            Swal.fire({
                                                title: '¡ERROR!',
                                                text: 'Formato ingresado incorrecto, debe seguir este formato "GRE-GRE-3CARACTERES2NÚMEROS.8CARACTERES que deben ser alfanuméricos"',
                                                type: 'error',
                                                confirmButtonText: 'Aceptar',
                                                closeOnConfirm: false
                                            })
                                            this.confirmacion_boleta = 2
                                        }
                                    } else {
                                        if (this.nroBoleta.substr(0, 4) == 'GSI-') {
                                            if (this.nroBoleta.substr(0, 4) == 'GSI-' && this.nroBoleta.substr(4, 4) == 'GRE-' && this.nroBoleta.substr(8, 3).length == 3 && (this.nroBoleta.substr(11, 2).length == 2) && this.nroBoleta.substr(13, 1) == '.' && this.nroBoleta.substr(14, 8).length == 8) {
                                                this.confirmacion_boleta = 1
                                            } else {
                                                Swal.fire({
                                                    title: '¡ERROR!',
                                                    text: 'Formato ingresado incorrecto, debe seguir este formato "GSI-GRE-3CARACTERES2NÚMEROS.8CARACTERES que deben ser alfanuméricos"',
                                                    type: 'error',
                                                    confirmButtonText: 'Aceptar',
                                                    closeOnConfirm: false
                                                })
                                                this.confirmacion_boleta = 2
                                            }
                                        } else {
                                            if (this.nroBoleta.substr(0, 4) == 'VCO-') {
                                                if (this.nroBoleta.substr(0, 4) == 'VCO-' && this.nroBoleta.substr(4, 4) == 'GRE-' && this.nroBoleta.substr(8, 3).length == 3 && (this.nroBoleta.substr(11, 2).length == 2) && this.nroBoleta.substr(13, 1) == '.' && this.nroBoleta.substr(14, 8).length == 8) {
                                                    this.confirmacion_boleta = 1
                                                    this.validar_bloqueo();
                                                } else {
                                                    Swal.fire({
                                                        title: '¡ERROR!',
                                                        text: 'Formato ingresado incorrecto, debe seguir este formato         "GSI-GRE-3CARACTERES2NÚMEROS.8CARACTERES que deben ser alfanuméricos"',
                                                        type: 'error',
                                                        confirmButtonText: 'Aceptar',
                                                        closeOnConfirm: false
                                                    })
                                                    this.confirmacion_boleta = 2
                                                }
                                            } else {
                                                if (this.nroBoleta.substr(0, 7) == 'GRE-GCI') {
                                                    if (this.nroBoleta.substr(0, 4) == 'GRE-' && this.nroBoleta.substr(4, 4) == 'GCI-' && this.nroBoleta.substr(8, 5).length == 5 && (this.nroBoleta.substr(11, 2).length == 2) && this.nroBoleta.substr(13, 1) == '.' && this.nroBoleta.substr(14, 8).length == 8) {
                                                        this.confirmacion_boleta = 1
                                                        this.validar_bloqueo();
                                                    } else {
                                                        Swal.fire({
                                                            title: '¡ERROR!',
                                                            text: 'Formato ingresado incorrecto, debe seguir este formato "GRE-GCI-MIM20.5GMFG007" que deben ser alfanuméricos',
                                                            type: 'error',
                                                            confirmButtonText: 'Aceptar',
                                                            closeOnConfirm: false
                                                        })
                                                        this.confirmacion_boleta = 2
                                                    }
                                                }else{
                                                    if(this.nroBoleta.substr(0, 7) == 'VPE-GCI'){
                                                          if (this.nroBoleta.substr(0, 4) == 'VPE-' && this.nroBoleta.substr(4, 4) == 'GCI-' && this.nroBoleta.substr(8, 5).length == 5 && (this.nroBoleta.substr(11, 2).length == 2) && this.nroBoleta.substr(13, 1) == '.' && this.nroBoleta.substr(14, 8).length == 8) {
                                                              this.confirmacion_boleta = 1
                                                              this.validar_bloqueo();
                                                        } else {
                                                              Swal.fire({
                                                                  title: '¡ERROR!',
                                                                  text: 'Formato ingresado incorrecto, debe seguir este formato "VPE-GCI-FIF22.GPHINF01" que deben ser alfanuméricos',
                                                                  type: 'error',
                                                                  confirmButtonText: 'Aceptar',
                                                                  closeOnConfirm: false
                                                              })
                                                              this.confirmacion_boleta = 2
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            if (this.boleta_id == 4) {
                                if (this.nroBoleta.substr(0, 2) == 'T-' && !isNaN(this.nroBoleta.substr(2, 11)) && this.nroBoleta.substr(13, 1) == '.' && !isNaN(this.nroBoleta.substr(14, 4)) && this.nroBoleta.substr(14, 4).length == 4) {
                                    console.log('PasofomatoOtc')
                                    this.confirmacion_boleta = 1
                                } else {
                                    Swal.fire({
                                        title: '¡ERROR!',
                                        text: 'Formato ingresado incorrecto, debe seguir este formato "T-11NÚMEROS.4NÚMEROS"',
                                        type: 'error',
                                        confirmButtonText: 'Aceptar',
                                        closeOnConfirm: false
                                    })
                                    this.confirmacion_boleta = 2
                                }
                            } else {
                                if (this.boleta_id == 5) {
                                    if (this.nroBoleta.substr(0, 2) == 'O-' && !isNaN(this.nroBoleta.substr(2, 8)) && this.nroBoleta.substr(10, 1) == '.' && !isNaN(this.nroBoleta.substr(11, 4)) && this.nroBoleta.substr(11, 4).length == 4) {
                                        console.log('PasofomatoOpr')
                                        this.confirmacion_boleta = 1
                                    } else {
                                        Swal.fire({
                                            title: '¡ERROR!',
                                            text: 'Formato ingresado incorrecto, debe seguir este formato "O-8NÚMEROS.4NÚMEROS"',
                                            type: 'error',
                                            confirmButtonText: 'Aceptar',
                                            closeOnConfirm: false
                                        })
                                        this.confirmacion_boleta = 2
                                    }
                                }
                            }
                        }
                    }
                }
            }
        },
        ValidateFormSgcStepThree: function() {
            if (this.idproveedor == '') {
                document.getElementById("errorProveedorIng").style.display = 'block'
            }
            if (this.boleta_id == '') {
                document.getElementById("errorBoletaIng").style.display = 'block'
            }
            if (this.Tipo_moneda_id == '') {
                document.getElementById("errorTipoMonedaIng").style.display = 'block'
            }
            if (this.costo == 0) {
                document.getElementById("errorcostoIng").style.display = 'block'
            }
            if (this.cod_sap == '') {
                document.getElementById("errorSaping").style.display = 'block'
            }
            if (this.tipo_pago_id == '') {
                document.getElementById("errorTipoMonedaIng").style.display = 'block'
            }
            if (this.tipo_pago_id == '') {
                document.getElementById("errorTipoPago").style.display = 'block'
            }
            this.validateMonto()
            if (this.nroBoleta != '') {
                if (this.confirmacion_boleta == 1 && this.idproveedor != '' && this.costo != 0 && this.cod_sap != '' && this.tipo_pago_id != '' && this.Tipo_moneda_id != '') {
                    if (this.correct_job_amount != '') {
                        if (this.correct_job_amount == 2) {
                            Swal.fire({
                                title: '¡ERROR!',
                                text: 'El monto excede las 1000 UF, el campo  "tipo de trabajo" debe indicar LICITACIÓN  o LPU',
                                type: 'error',
                                confirmButtonText: 'Aceptar',
                            })
                        } else {
                            if (this.correct_job_amount == 1) {
                                this.step = 4
                                document.getElementById("wizardIng3").style.display = 'none'
                                document.getElementById("btnNextStepThreeIng").style.display = 'none'
                                document.getElementById("backStepIng2").style.display = 'none'
                                document.getElementById("backStepIng3").style.display = 'block'
                                document.getElementById("btnFinSolicitudIng").style.display = 'block'
                                document.getElementById("wizardIng4").style.display = 'block'
                                this.stepThreePass = 1
                            }
                        }
                    } else {
                        if (this.correct_job_amount == '') {
                            this.step = 4
                            document.getElementById("wizardIng3").style.display = 'none'
                            document.getElementById("btnNextStepThreeIng").style.display = 'none'
                            document.getElementById("backStepIng2").style.display = 'none'
                            document.getElementById("backStepIng3").style.display = 'block'
                            document.getElementById("btnFinSolicitudIng").style.display = 'block'
                            document.getElementById("wizardIng4").style.display = 'block'
                            this.stepThreePass = 1
                        }
                    }
                }
            } else {
                if (this.idproveedor != '' && this.costo != 0 && this.cod_sap != '' && this.tipo_pago_id != '' && this.Tipo_moneda_id != '') {
                    if (this.correct_job_amount != '') {
                        if (this.correct_job_amount == 2) {
                            Swal.fire({
                                title: '¡ERROR!',
                                text: 'El monto excede las 1000 UF, el campo  "tipo de trabajo" debe indicar LICITACIÓN  o LPU',
                                type: 'error',
                                confirmButtonText: 'Aceptar',
                            })
                        } else {
                            if (this.correct_job_amount == 1) {
                                this.step = 4
                                document.getElementById("wizardIng3").style.display = 'none'
                                document.getElementById("btnNextStepThreeIng").style.display = 'none'
                                document.getElementById("backStepIng2").style.display = 'none'
                                document.getElementById("backStepIng3").style.display = 'block'
                                document.getElementById("btnFinSolicitudIng").style.display = 'block'
                                document.getElementById("wizardIng4").style.display = 'block'
                                this.stepThreePass = 1
                            }
                        }
                    } else {
                        if (this.correct_job_amount == '') {
                            this.step = 4
                            document.getElementById("wizardIng3").style.display = 'none'
                            document.getElementById("btnNextStepThreeIng").style.display = 'none'
                            document.getElementById("backStepIng2").style.display = 'none'
                            document.getElementById("backStepIng3").style.display = 'block'
                            document.getElementById("btnFinSolicitudIng").style.display = 'block'
                            document.getElementById("wizardIng4").style.display = 'block'
                            this.stepThreePass = 1
                        }
                    }
                }
            }
        },
        BackStepThreeIng: function() {
            this.step = 3
            document.getElementById("wizardIng3").style.display = 'block'
            document.getElementById("btnNextStepThreeIng").style.display = 'block'
            document.getElementById("backStepIng2").style.display = 'block'
            document.getElementById("backStepIng3").style.display = 'none'
            document.getElementById("btnFinSolicitudIng").style.display = 'none'
            document.getElementById("wizardIng4").style.display = 'none'
        },
        searchNewProveedor: function() {
            var SelectProveedor = document.getElementById('SelectProveedorIng');
            SelectProveedor.style.display = 'none'
            var SearchproveedorDontDisplay = document.getElementById('SearchproveedorDontDisplayIng');
            SearchproveedorDontDisplay.style.display = ''
            $("#SearchproveedorDontDisplayIng").val('');
            this.idproveedor = '';
        },
        BuscarProveedor: function() {
            if (this.Buscarproveedor.length >= 3) {
                axios.get(`/GetProveedor?proveedor=${this.Buscarproveedor}`).then((response) => {
                    this.Proveedores = response.data;
                })
                var box = document.getElementById('listProveedorIng');
                box.style.display = '';
            } else {
                this.Proveedores = '';
                var box = document.getElementById('listProveedorIng');
                box.style.display = 'none';
            }
        },
        getParticipantes: function() {
            axios.get('/GetInteresados').then((response) => {
                this.interesados = response.data
            })
            document.getElementById('participantediv').style.display = 'block'
        },
        addTpIng: function(buton) {
            if (buton == 1) {
                document.getElementById('AddTpIngblock').style.display = 'block'
            } else {
                if (buton == 2) {
                    document.getElementById('AddTpIngblock').style.display = 'none'
                }
            }
        },
        addtp: function() {
            if (this.nroTp != '') {
                this.tps.push({
                    numero: this.nroTp
                })
                this.nroTp = ''
            }
        },
        searchComuna: function() {
            axios.get('/searchComua/' + this.region_ingreso_manual).then((response) => {
                this.comunas = response.data
            })
            document.getElementById("errorRegioning").style.display = 'none'
        },
        cleanIngresoManual: function() {
            this.nemonico_movil = ''
            this.nombre_sitio = ''
            this.direccion_sitio = ''
            this.region_ingreso_manual = ''
            this.comuna_ingreso_manual = ''
            this.categoria_id = ''
            this.regiones = []
            this.comunas = []
        },
        cleanSinSitio: function() {
            this.region_sin_sitio = ''
            this.regiones = []
        },
        DeleteErrorformIng: function() {
            if (this.tipo_pago_id != '') {
                document.getElementById("errorTipoPago").style.display = 'none'
            }
            if (this.nemonico_movil != '') {
                document.getElementById("errorNemonicoing").style.display = 'none'
            }
            if (this.nombre_sitio != '') {
                document.getElementById("errorNombreSitioing").style.display = 'none'
            }
            if (this.direccion_sitio != '') {
                document.getElementById("errorDireccioning").style.display = 'none'
            }
            if (this.comuna_ingreso_manual != '') {
                document.getElementById("errorComunaing").style.display = 'none'
            }
            if (this.categoria_id != '') {
                document.getElementById("errorCategoriaing").style.display = 'none'
            }
            if (this.cod_sap != '') {
                document.getElementById("errorSaping").style.display = 'none'
            }
        },
        ValidateFormSgcStepTwo: function() {
            if (this.optionSite == 1) {
                document.getElementById("errorRegion2Ing").style.display = 'none'
                document.getElementById("errorNemonicoing").style.display = 'none'
                document.getElementById("errorNombreSitioing").style.display = 'none'
                document.getElementById("errorDireccioning").style.display = 'none'
                document.getElementById("errorRegioning").style.display = 'none'
                document.getElementById("errorComunaing").style.display = 'none'
                document.getElementById("errorCategoriaing").style.display = 'none'
                if (this.popId == '') {
                    document.getElementById("errorPopIng").style.display = 'block'
                }
            } else {
                if (this.optionSite == 2) {
                    document.getElementById("errorPopIng").style.display = 'none'
                    document.getElementById("errorRegion2Ing").style.display = 'none'
                    if (this.nemonico_movil == '') {
                        document.getElementById("errorNemonicoing").style.display = 'block'
                    }
                    if (this.nombre_sitio == '') {
                        document.getElementById("errorNombreSitioing").style.display = 'block'
                    }
                    if (this.direccion_sitio == '') {
                        document.getElementById("errorDireccioning").style.display = 'block'
                    }
                    if (this.region_ingreso_manual == '') {
                        document.getElementById("errorRegioning").style.display = 'block'
                    }
                    if (this.comuna_ingreso_manual == '') {
                        document.getElementById("errorComunaing").style.display = 'block'
                    }
                    if (this.categoria_id == '') {
                        document.getElementById("errorCategoriaing").style.display = 'block'
                    }
                } else {
                    if (this.optionSite == 3) {
                        if (this.region_sin_sitio == '') {
                            document.getElementById("errorRegion2Ing").style.display = 'block'
                        }
                    }
                }
            }
            if (this.popId != '' || this.nemonico_movil != '' && this.nombre_sitio != '' && this.direccion_sitio != '' && this.region_ingreso_manual != '' && this.comuna_ingreso_manual != '' && this.categoria_id != '' || this.region_sin_sitio != '') {
                this.step = 3
                document.getElementById('wizardIng2').style.display = 'none'
                document.getElementById('backStepIng2').style.display = 'block'
                document.getElementById('backStepIng1').style.display = 'none'
                document.getElementById('btnNextStepTwoIng').style.display = 'none'
                document.getElementById('btnNextStepThreeIng').style.display = 'block'
                document.getElementById('wizardIng3').style.display = 'block'
                this.stepTwoPass = 1
            }
        },
        Addpagos: function() {
            document.getElementById('cuotasDiv').style.display = 'block'
        },
        showTotalFechas: function() {
            this.coutasselcs = this.cantCuotas
            this.fecha_select = []
        },
        BackStepTwoIng: function() {
            this.step = 2
            document.getElementById('wizardIng2').style.display = 'block'
            document.getElementById('backStepIng2').style.display = 'none'
            document.getElementById('backStepIng1').style.display = 'block'
            document.getElementById('btnNextStepTwoIng').style.display = 'block'
            document.getElementById('btnNextStepThreeIng').style.display = 'none'
            document.getElementById('wizardIng3').style.display = 'none'
        },
        BackStepOneIng: function() {
            this.step = 1
            document.getElementById('wizardIng1').style.display = 'block'
            document.getElementById('wizardIng2').style.display = 'none'
            document.getElementById('btnNextStepOneIng').style.display = 'block'
            document.getElementById('btnNextStepTwoIng').style.display = 'none'
            document.getElementById('backStepIng1').style.display = 'none'
        },
        selectdpop: function(pop) {
            this.popId = pop.id;
            var box = document.getElementById('listPopsIng');
            var selectPop = document.getElementById('popcheckIng');
            var searchPop = document.getElementById('popSearchIng');
            var divAlertPop = document.getElementById('errorPop');
            document.getElementById("errorPopIng").style.display = 'none'
            this.pops = '';
            searchPop.style.display = 'none';
            selectPop.style.display = '';
            divAlertPop.style.display = 'none';
            $("#popNameIng").val(pop.nem_site + '-' + pop.nombre);
            box.style.display = 'none';
        },
        selectoptionSite: function(option) {
            if (option == 1) {
                document.getElementById('ingresoNormalIng').style.display = 'block'
                document.getElementById('ingresoManualIng').style.display = 'none'
                document.getElementById('SinSitioIng').style.display = 'none'
                this.cleanIngresoManual()
                this.cleanSinSitio()
                this.optionSite = 1
                document.getElementById('errorSelectopcion').style.display = 'none'
                document.getElementById("errorPopIng").style.display = 'none'
                document.getElementById("errorNemonicoing").style.display = 'none'
                document.getElementById("errorNombreSitioing").style.display = 'none'
                document.getElementById("errorDireccioning").style.display = 'none'
                document.getElementById("errorRegioning").style.display = 'none'
                document.getElementById("errorComunaing").style.display = 'none'
                document.getElementById("errorCategoriaing").style.display = 'none'
            } else {
                if (option == 2) {
                    document.getElementById('ingresoManualIng').style.display = 'block'
                    document.getElementById('ingresoNormalIng').style.display = 'none'
                    document.getElementById('SinSitioIng').style.display = 'none'
                    this.changePop()
                    this.cleanSinSitio()
                    axios.get('/region').then((response) => {
                        this.regiones = response.data
                    })
                    this.optionSite = 2
                    document.getElementById('errorSelectopcion').style.display = 'none'
                } else {
                    if (option == 3) {
                        document.getElementById('ingresoManualIng').style.display = 'none'
                        document.getElementById('ingresoNormalIng').style.display = 'none'
                        document.getElementById('SinSitioIng').style.display = 'block'
                        this.cleanIngresoManual()
                        this.changePop()
                        axios.get('/region').then((response) => {
                            this.regiones = response.data
                        })
                        document.getElementById("errorPopIng").style.display = 'none'
                        document.getElementById("errorNemonicoing").style.display = 'none'
                        document.getElementById("errorNombreSitioing").style.display = 'none'
                        document.getElementById("errorDireccioning").style.display = 'none'
                        document.getElementById("errorRegioning").style.display = 'none'
                        document.getElementById("errorComunaing").style.display = 'none'
                        document.getElementById("errorCategoriaing").style.display = 'none'
                        this.optionSite = 3
                        document.getElementById('errorSelectopcion').style.display = 'none'
                    }
                }
            }
        },
        BuscarSitio: function() {
            if (this.datositio.length >= 3) {
                var url = '/GetPop'
                var box = document.getElementById('listPopsIng');
                box.style.display = '';
                axios.get(`/GetPop?datositio=${this.datositio}`).then((response) => {
                    this.pops = response.data
                });
            } else {
                this.pops = '';
                var box = document.getElementById('listPopsIng');
                box.style.display = 'none';
            }
        },
        deleteTp: function(key) {
            this.tps.splice(key, 1)
        },
        ValidateFormSgcStepOneIng: function() {
            if (this.flujoId == '') {
                document.getElementById('errorFlujo').style.display = 'block'
            }
            if (this.pgpon == '') {
                document.getElementById('errorPgpon').style.display = 'block'
            }
            if (this.fecha_select.length == 0) {
                document.getElementById('errorCantidadPagos').style.display = 'block'
            }
            if (this.tipo_trabajoid == '') {
                document.getElementById('errorTipoTrabajoIng').style.display = 'block'
            }
            if (this.modo_trabajo_id == '') {
                document.getElementById('errorModoTrabajo').style.display = 'block'
            }
            if (this.modo_trabajo_id == 1) {
                if (this.equipo_id == '') {
                    document.getElementById('errortipoEquipo').style.display = 'block'
                }
            } else {
                if (this.modo_trabajo_id == 2) {
                    if (this.servicio_id == '') {
                        document.getElementById('errorTipoServicio').style.display = 'block'
                    }
                }
            }
            if (this.motivo_trabajo_id == '') {
                document.getElementById('errorMotivoTrabajo').style.display = 'block'
            }
            if (this.Fecha_trabajo == '') {
                document.getElementById('errorFecha').style.display = 'block'
            }
            if (this.AreaTrabajoId == '') {
                document.getElementById('errorAreaTrabajoIng').style.display = 'block'
            }
            if (this.responsable_id == '') {
                document.getElementById('errorResponsablePago').style.display = 'block'
            }
            if (this.responsable_id == 2) {
                if (this.trabajo_ejecutado == '') {
                    document.getElementById('errorPropyectoEjecutado').style.display = 'block'
                }
            } else {
                document.getElementById('errorPropyectoEjecutado').style.display = 'none'
            }
            if (this.pm_proyecto_id == '') {
                document.getElementById('errorPmProyecto').style.display = 'block'
            }
            if (this.pm_interno_id == '') {
                document.getElementById('errorPminterno').style.display = 'block'
            }
            if (this.solicitante_id == '') {
                document.getElementById('errorsolicitante').style.display = 'block'
            }
            if (this.nombre_proyecto == '') {
                document.getElementById('errorNombreProyecto').style.display = 'block'
            }
            if (this.detalle_trabajo == '') {
                document.getElementById('errorDetalle').style.display = 'block'
            }
            if (this.flujoId != '' && this.pgpon != '' && this.tipo_trabajoid != '' && this.modo_trabajo_id != '' && this.motivo_trabajo_id != '' && this.Fecha_trabajo != '' && this.AreaTrabajoId != '' && this.responsable_id != '' && this.pm_proyecto_id != '' && this.pm_interno_id != '' && this.solicitante_id != '' && this.nombre_proyecto != '' && this.detalle_trabajo != '' && this.fecha_select.length != 0) {
                if (this.equipo_id != '' || this.servicio_id != '') {
                    if (this.responsable_id == 2) {
                        if (this.trabajo_ejecutado != '') {
                            this.step = 2
                            this.stepOnePass = 1
                            document.getElementById('wizardIng1').style.display = 'none'
                            document.getElementById('wizardIng2').style.display = 'block'
                            document.getElementById('btnNextStepOneIng').style.display = 'none'
                            document.getElementById('btnNextStepTwoIng').style.display = 'block'
                            document.getElementById('backStepIng1').style.display = 'block'
                        }
                    } else {
                        if (this.responsable_id != 2) {
                            this.step = 2
                            this.stepOnePass = 1
                            document.getElementById('wizardIng1').style.display = 'none'
                            document.getElementById('wizardIng2').style.display = 'block'
                            document.getElementById('btnNextStepOneIng').style.display = 'none'
                            document.getElementById('btnNextStepTwoIng').style.display = 'block'
                            document.getElementById('backStepIng1').style.display = 'block'
                        }
                    }
                }
            }
        },
        BackStepOneOnClick: function() {
            if (this.stepOnePass == 1) {
                if (this.step == 2) {
                    this.step = 1
                    document.getElementById('wizardIng1').style.display = 'block'
                    document.getElementById('wizardIng2').style.display = 'none'
                    document.getElementById('btnNextStepOneIng').style.display = 'block'
                    document.getElementById('btnNextStepTwoIng').style.display = 'none'
                    document.getElementById('backStepIng1').style.display = 'none'
                } else {
                    if (this.step == 3) {
                        this.step = 1
                        document.getElementById('wizardIng1').style.display = 'block'
                        document.getElementById('wizardIng3').style.display = 'none'
                        document.getElementById('btnNextStepOneIng').style.display = 'block'
                        document.getElementById('btnNextStepThreeIng').style.display = 'none'
                        document.getElementById('backStepIng2').style.display = 'none'
                    } else {
                        if (this.step == 4) {
                            this.step = 1
                            document.getElementById('wizardIng1').style.display = 'block'
                            document.getElementById('wizardIng4').style.display = 'none'
                            document.getElementById('btnNextStepOneIng').style.display = 'block'
                            document.getElementById('btnFinSolicitudIng').style.display = 'none'
                            document.getElementById('backStepIng3').style.display = 'none'
                        }
                    }
                }
            }
        },
        BackStepTwoOnClick: function() {
            if (this.stepTwoPass == 1) {
                if (this.step == 1) {
                    this.step = 2
                    document.getElementById('wizardIng1').style.display = 'none'
                    document.getElementById('wizardIng2').style.display = 'block'
                    document.getElementById('btnNextStepOneIng').style.display = 'none'
                    document.getElementById('btnNextStepTwoIng').style.display = 'block'
                    document.getElementById('backStepIng1').style.display = 'block'
                } else {
                    if (this.step == 3) {
                        this.step = 2
                        document.getElementById('wizardIng2').style.display = 'block'
                        document.getElementById('wizardIng3').style.display = 'none'
                        document.getElementById('btnNextStepTwoIng').style.display = 'block'
                        document.getElementById('btnNextStepThreeIng').style.display = 'none'
                        document.getElementById('backStepIng2').style.display = 'none'
                        document.getElementById('backStepIng1').style.display = 'block'
                    } else {
                        if (this.step == 4) {
                            this.step = 2
                            document.getElementById('wizardIng2').style.display = 'block'
                            document.getElementById('wizardIng4').style.display = 'none'
                            document.getElementById('btnNextStepTwoIng').style.display = 'block'
                            document.getElementById('backStepIng1').style.display = 'block'
                            document.getElementById('btnFinSolicitudIng').style.display = 'none'
                            document.getElementById('backStepIng3').style.display = 'none'
                        }
                    }
                }
            }
        },
        BackStepThreeOnClick: function() {
            if (this.stepThreePass == 1) {
                if (this.step == 1) {
                    this.step = 3
                    document.getElementById('wizardIng1').style.display = 'none'
                    document.getElementById('wizardIng3').style.display = 'block'
                    document.getElementById('btnNextStepOneIng').style.display = 'none'
                    document.getElementById('btnNextStepThreeIng').style.display = 'block'
                    document.getElementById('backStepIng2').style.display = 'block'
                } else {
                    if (this.step == 2) {
                        this.step = 3
                        document.getElementById('wizardIng2').style.display = 'none'
                        document.getElementById('wizardIng3').style.display = 'block'
                        document.getElementById('btnNextStepTwoIng').style.display = 'none'
                        document.getElementById('btnNextStepThreeIng').style.display = 'block'
                        document.getElementById('backStepIng2').style.display = 'block'
                        document.getElementById('backStepIng1').style.display = 'none'
                    } else {
                        if (this.step == 4) {
                            this.step = 3
                            document.getElementById('wizardIng3').style.display = 'block'
                            document.getElementById('wizardIng4').style.display = 'none'
                            document.getElementById('btnNextStepThreeIng').style.display = 'block'
                            document.getElementById('backStepIng2').style.display = 'block'
                            document.getElementById('btnFinSolicitudIng').style.display = 'none'
                            document.getElementById('backStepIng3').style.display = 'none'
                        }
                    }
                }
            }
        },
        CreateSolicitudIng: function() {
            let formData = new FormData();
            formData.append('flujoId', this.flujoId)
            formData.append('pgpon', this.pgpon)
            formData.append('tipo_trabajoid', this.tipo_trabajoid)
            formData.append('modo_trabajo_id', this.modo_trabajo_id)
            formData.append('equipo_id', this.equipo_id)
            formData.append('servicio_id', this.servicio_id)
            formData.append('motivo_trabajo_id', this.motivo_trabajo_id)
            formData.append('Fecha_trabajo', this.Fecha_trabajo)
            formData.append('AreaTrabajoId', this.AreaTrabajoId)
            formData.append('responsable_id', this.responsable_id)
            formData.append('pm_proyecto_id', this.pm_proyecto_id)
            formData.append('pm_interno_id', this.pm_interno_id)
            formData.append('solicitante_id', this.solicitante_id)
            formData.append('nombre_proyecto', this.nombre_proyecto)
            formData.append('trabajo_ejecutado', this.trabajo_ejecutado)
            formData.append('detalle_trabajo', this.detalle_trabajo)
            formData.append('site_id', this.popId)
            formData.append('nemonico_movil', this.nemonico_movil)
            formData.append('nombre_sitio', this.nombre_sitio)
            formData.append('direccion_sitio', this.direccion_sitio)
            formData.append('region_ingreso_manual', this.region_ingreso_manual)
            formData.append('comuna_ingreso_manual', this.comuna_ingreso_manual)
            formData.append('categoria_id', this.categoria_id)
            formData.append('region_sin_sitio', this.region_sin_sitio)
            formData.append('boleta_id', this.boleta_id)
            formData.append('nroBoleta', this.nroBoleta)
            formData.append('Tipo_moneda_id', this.Tipo_moneda_id)
            formData.append('costo', this.costo)
            formData.append('cod_sap', this.cod_sap)
            formData.append('tipo_pago_id', this.tipo_pago_id)
            formData.append('proveedor_id', this.idproveedor)
            for (var i = 0; i < this.cotizaciones.length; i++) {
                let cotizacion = this.cotizaciones[i];
                formData.append('cotizacion[' + i + ']', cotizacion);
            }
            for (var i = 0; i < this.cartaAdjudicaciones.length; i++) {
                let cartaAdjudicacion = this.cartaAdjudicaciones[i];
                formData.append('Carta_Adjudicación[' + i + ']', cartaAdjudicacion);
            }
            for (var i = 0; i < this.lpus.length; i++) {
                let lpu = this.lpus[i];
                formData.append('lpu_file[' + i + ']', lpu);
            }
            for (var i = 0; i < this.mails.length; i++) {
                let mail = this.mails[i];
                formData.append('mail_file[' + i + ']', mail);
            }
            if (this.tipo_trabajoid == 1) {
                if (this.cartaAdjudicaciones.length == 0 && this.mails.length == 0) {
                    Swal.fire({
                        title: '¡ERROR!',
                        text: 'Debes cargar una carta de adjudicación o un mail.',
                        type: 'error',
                        confirmButtonText: 'Aceptar',
                    })
                } else {
                    document.getElementById("backStepIng3").style.display = 'none'
                    document.getElementById("btnFinSolicitudIng").style.display = 'none'
                    document.getElementById("progressBarFileUpoadIng").style.display = 'block'
                    axios.post('/CreateRequestIng', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },
                        onUploadProgress: e => {
                            if (e.lengthComputable) {
                                this.porcentaje = (e.loaded / e.total) * 100
                            }
                        }
                    }).then((response => {
                        if (this.tps.length != 0) {
                            for (var i = 0; i < this.tps.length; i++) {
                                let tp = this.tps[i]
                                let NewformData = new FormData()
                                NewformData.append('tp', tp.numero)
                                NewformData.append('solicitud_id', response.data)
                                axios.post('/setNumberTpRequest', NewformData).then((response) => {})
                            }
                        }
                        if (this.fecha_select.length != 0) {
                            let count = 0
                            for (var i = 0; i < this.fecha_select.length; i++) {
                                count++
                                let fecha = this.fecha_select[i]
                                let NewformDataFecha = new FormData()
                                NewformDataFecha.append('fecha', fecha)
                                NewformDataFecha.append('nro_fecha', count)
                                NewformDataFecha.append('total_cuotas', this.cantCuotas)
                                NewformDataFecha.append('solicitud_id', response.data)
                                axios.post('/setFechasCuota', NewformDataFecha).then((response) => {})
                            }
                        }
                        if (this.list_interesados.length != 0) {
                            for (var i = 0; i < this.list_interesados.length; i++) {
                                let interesado_id = this.list_interesados[i]
                                let NewformDataInteresados = new FormData()
                                NewformDataInteresados.append('interesado_id', interesado_id)
                                NewformDataInteresados.append('solicitud_id', response.data)
                                axios.post('/setInteresadosRequest', NewformDataInteresados).then((response) => {})
                            }
                        }
                        $('#createSolicitudIng').modal('hide');
                        let mensaje = 'Solicitud nro°' + ' ' + response.data + ' ' + 'creada.'
                        this.CleanAllFormIng()
                        this.successAlert(mensaje)
                        EventBus.$emit('sgc.RefreshTable')
                    }))
                }
            } else {
                if (this.tipo_trabajoid == 2) {
                    if (this.cotizaciones.length == 0) {
                        Swal.fire({
                            title: '¡ERROR!',
                            text: 'Debes cargar una cotización.',
                            type: 'error',
                            confirmButtonText: 'Aceptar',
                        })
                    } else {
                        document.getElementById("backStepIng3").style.display = 'none'
                        document.getElementById("btnFinSolicitudIng").style.display = 'none'
                        document.getElementById("progressBarFileUpoadIng").style.display = 'block'
                        axios.post('/CreateRequestIng', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }).then((response => {
                            if (this.tps.length != 0) {
                                for (var i = 0; i < this.tps.length; i++) {
                                    let tp = this.tps[i]
                                    let NewformData = new FormData()
                                    NewformData.append('tp', tp.numero)
                                    NewformData.append('solicitud_id', response.data)
                                    axios.post('/setNumberTpRequest', NewformData).then((response) => {})
                                }
                            }
                            if (this.fecha_select.length != 0) {
                                let count = 0
                                for (var i = 0; i < this.fecha_select.length; i++) {
                                    count++
                                    let fecha = this.fecha_select[i]
                                    let NewformDataFecha = new FormData()
                                    NewformDataFecha.append('fecha', fecha)
                                    NewformDataFecha.append('nro_fecha', count)
                                    NewformDataFecha.append('solicitud_id', response.data)
                                    NewformDataFecha.append('total_cuotas', this.cantCuotas)
                                    axios.post('/setFechasCuota', NewformDataFecha).then((response) => {})
                                }
                            }
                            if (this.list_interesados.length != 0) {
                                for (var i = 0; i < this.list_interesados.length; i++) {
                                    let interesado_id = this.list_interesados[i]
                                    let NewformDataInteresados = new FormData()
                                    NewformDataInteresados.append('interesado_id', interesado_id)
                                    NewformDataInteresados.append('solicitud_id', response.data)
                                    axios.post('/setInteresadosRequest', NewformDataInteresados).then((response) => {})
                                }
                            }
                            $('#createSolicitudIng').modal('hide');
                            let mensaje = 'Solicitud nro°' + ' ' + response.data + ' ' + 'creada.'
                            this.CleanAllFormIng()
                            this.successAlert(mensaje)
                            EventBus.$emit('sgc.RefreshTable')
                        }))
                    }
                } else {
                    if (this.tipo_trabajoid == 3 || this.tipo_trabajoid == 3) {
                        if (this.lpus.length == 0) {
                            Swal.fire({
                                title: '¡ERROR!',
                                text: 'Debes cargar una lpu.',
                                type: 'error',
                                confirmButtonText: 'Aceptar',
                            })
                        } else {
                            document.getElementById("backStepIng3").style.display = 'none'
                            document.getElementById("btnFinSolicitudIng").style.display = 'none'
                            document.getElementById("progressBarFileUpoadIng").style.display = 'block'
                            axios.post('/CreateRequestIng', formData, {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            }).then((response => {
                                if (this.tps.length != 0) {
                                    for (var i = 0; i < this.tps.length; i++) {
                                        let tp = this.tps[i]
                                        let NewformData = new FormData()
                                        NewformData.append('tp', tp.numero)
                                        NewformData.append('solicitud_id', response.data)
                                        axios.post('/setNumberTpRequest', NewformData).then((response) => {})
                                    }
                                }
                                if (this.fecha_select.length != 0) {
                                    let count = 0
                                    for (var i = 0; i < this.fecha_select.length; i++) {
                                        count++
                                        let fecha = this.fecha_select[i]
                                        let NewformDataFecha = new FormData()
                                        NewformDataFecha.append('fecha', fecha)
                                        NewformDataFecha.append('nro_fecha', count)
                                        NewformDataFecha.append('solicitud_id', response.data)
                                        NewformDataFecha.append('total_cuotas', this.cantCuotas)
                                        axios.post('/setFechasCuota', NewformDataFecha).then((response) => {})
                                    }
                                }
                                if (this.list_interesados.length != 0) {
                                    for (var i = 0; i < this.list_interesados.length; i++) {
                                        let interesado_id = this.list_interesados[i]
                                        let NewformDataInteresados = new FormData()
                                        NewformDataInteresados.append('interesado_id', interesado_id)
                                        NewformDataInteresados.append('solicitud_id', response.data)
                                        axios.post('/setInteresadosRequest', NewformDataInteresados).then((response) => {})
                                    }
                                }
                                $('#createSolicitudIng').modal('hide');
                                let mensaje = 'Solicitud nro°' + ' ' + response.data + ' ' + 'creada.'
                                this.CleanAllFormIng()
                                this.successAlert(mensaje)
                                EventBus.$emit('sgc.RefreshTable')
                            }))
                        }
                    }
                }
            }
        },
        successAlert: function(mensaje) {
            this.$swal({
                type: 'success',
                title: 'Éxito',
                text: mensaje,
                showCloseButton: true,
            });
        },
        changePop: function() {
            var selectPop = document.getElementById('popcheckIng');
            var searchPop = document.getElementById('popSearchIng');
            searchPop.style.display = '';
            selectPop.style.display = 'none';
            this.popId = '';
            this.dataPop = '';
            $('#inputSitio').val('');
        },
        GetTipoModoTrabajo: function() {
            axios.get('/GetTipoModoTrabajo/' + this.modo_trabajo_id).then((response) => {
                this.tipo_modos = response.data
            })
            if (this.modo_trabajo_id != '') {
                document.getElementById('errorModoTrabajo').style.display = 'none'
            }
            if (this.modo_trabajo_id == 1) {
                this.servicio_id = ''
            } else {
                if (this.modo_trabajo_id == 2) {
                    this.equipo_id = ''
                }
            }
        },
        DeleteErrorform: function() {
            if (this.flujoId != '') {
                document.getElementById('errorFlujo').style.display = 'none'
            }
            if (this.pgpon != '') {
                document.getElementById('errorPgpon').style.display = 'none'
            }
            if (this.tipo_trabajoid != '') {
                document.getElementById('errorTipoTrabajoIng').style.display = 'none'
                if (this.tipo_trabajoid == 1 || this.tipo_trabajoid == 3 || this.tipo_trabajoid == 4) {
                    if (this.correct_job_amount == 2) {
                        this.correct_job_amount = 1
                    }
                }
            }
            if (this.motivo_trabajo_id != '') {
                document.getElementById('errorMotivoTrabajo').style.display = 'none'
            }
            if (this.Fecha_trabajo != '') {
                document.getElementById('errorFecha').style.display = 'none'
            }
            if (this.AreaTrabajoId != '') {
                document.getElementById('errorAreaTrabajoIng').style.display = 'none'
            }
            if (this.responsable_id != '') {
                document.getElementById('errorResponsablePago').style.display = 'none'
            }
            if (this.pm_proyecto_id != '') {
                document.getElementById('errorPmProyecto').style.display = 'none'
            }
            if (this.pm_interno_id != '') {
                document.getElementById('errorPminterno').style.display = 'none'
            }
            if (this.solicitante_id != '') {
                document.getElementById('errorsolicitante').style.display = 'none'
            }
            if (this.nombre_proyecto != '') {
                document.getElementById('errorNombreProyecto').style.display = 'none'
            }
            if (this.trabajo_ejecutado != '') {
                document.getElementById('errorPropyectoEjecutado').style.display = 'none'
            }
            if (this.servicio_id != '') {
                document.getElementById('errorTipoServicio').style.display = 'none'
            }
            if (this.equipo_id != '') {
                document.getElementById('errortipoEquipo').style.display = 'none'
            }
            if (this.detalle_trabajo != '') {
                document.getElementById('errorDetalle').style.display = 'none'
            }
        },
        MostrarDatosArchivosLpu: function(e) {
            let uploadedFiles = this.$refs.lpus.files;
            for (var i = 0; i < uploadedFiles.length; i++) {
                this.lpus.push(uploadedFiles[i]);
            }
        },
        removeLpu(key) {
            this.lpus.splice(key, 1);
        },
        MostrarDatosArchivosCaj: function(e) {
            let uploadedFiles = this.$refs.cartaAdjudicaciones.files;
            for (var i = 0; i < uploadedFiles.length; i++) {
                this.cartaAdjudicaciones.push(uploadedFiles[i]);
            }
        },
        removeAdjudicación(key) {
            this.cartaAdjudicaciones.splice(key, 1);
        },
        MostrarDatosArchivosMail: function(e) {
            let uploadedFiles = this.$refs.mailsFile.files;
            for (var i = 0; i < uploadedFiles.length; i++) {
                this.mails.push(uploadedFiles[i]);
            }
        },
        removeMail(key) {
            this.mails.splice(key, 1);
        },
        MostrarDatosArchivosCotizaciones: function() {
            let uploadedFiles = this.$refs.cotizacionFile.files;
            for (var i = 0; i < uploadedFiles.length; i++) {
                this.cotizaciones.push(uploadedFiles[i]);
            }
        },
        removeCotizacoin(key) {
            this.cotizaciones.splice(key, 1);
        },
        DeleteErrorInput: function() {
            document.getElementById("errorCantidadPagos").style.display = 'none'
        },
        buscar_pm_proyecto: function() {
            if (this.nombre_pm_proyecto.length >= 3) {
                axios.get(`/GetPmProyecto?nombre=${this.nombre_pm_proyecto}`).then((response) => {
                    this.pm_proyectos = response.data;
                    this.input_width_form_pm_proyecto = document.getElementById("input_pm_proyecto_search").clientWidth;
                    document.getElementById("list_pm_pryectos").style.display = 'block';
                })
            } else {
                if (this.nombre_pm_proyecto.length < 3 || this.nombre_pm_proyecto.length == 0) {
                    this.pm_proyectos = [];
                    document.getElementById("list_pm_pryectos").style.display = 'none';
                }
            }
        },
        select_pm_proyecto_sgc_fun: function(pm_proyecto) {
            this.pm_proyecto_id = pm_proyecto.id;
            this.nombre_pm_proyecto_select = pm_proyecto.nombre_completo;
            this.nombre_pm_proyecto = '';
            document.getElementById("errorPmProyecto").style.display = 'none';
            document.getElementById("list_pm_pryectos").style.display = 'none';
            document.getElementById("select_pm_proyecto_sgc").style.display = 'block';
            document.getElementById("pm_proyecto_search_sgc").style.display = 'none';
        },
        cambiar_pm_proyecto: function() {
            this.pm_proyecto_id = '';
            this.nombre_pm_proyecto_select = '';
            document.getElementById("select_pm_proyecto_sgc").style.display = 'none';
            document.getElementById("pm_proyecto_search_sgc").style.display = 'block';
        },
        buscar_pm_interno:function(){
             if (this.nombre_pm_interno.length >= 3) {
                axios.get(`/GetPmInterno?nombre=${this.nombre_pm_interno}`).then((response) => {
                    this.pm_internos = response.data;
                    this.input_width_form_pm_interno = document.getElementById("input_pm_interno_search").clientWidth;
                    document.getElementById("list_pm_internos").style.display = 'block';
                })
            } else {
                if (this.nombre_pm_interno.length < 3 || this.nombre_pm_interno.length == 0) {
                    this.pm_internos = [];
                    document.getElementById("list_pm_internos").style.display = 'none';
                }
            }

        },
        select_pm_interno_sgc_fun:function(pm_interno){
            this.pm_interno_id = pm_interno.id;
            this.nombre_pm_interno_select = pm_interno.nombre_completo;
            this.nombre_pm_interno = '';
            document.getElementById("errorPminterno").style.display = 'none';
            document.getElementById("list_pm_internos").style.display = 'none';
            document.getElementById("select_pm_interno_sgc").style.display = 'block';
            document.getElementById("pm_interno_search_sgc").style.display = 'none';
            
        },
        cambiar_pm_interno:function(){
            this.pm_interno_id = '';
            this.nombre_pm_interno_select='';
            document.getElementById("select_pm_interno_sgc").style.display = 'none';
            document.getElementById("pm_interno_search_sgc").style.display = 'block';

        },
        buscar_solicitante:function(){
            if (this.nombre_solicitante.length >= 3) {
                axios.get(`/GetSolicitante?nombre=${this.nombre_solicitante}`).then((response) => {
                    this.solicitantes = response.data;
                    this.input_width_form_solicitante = document.getElementById("input_solicitante_search").clientWidth;
                    document.getElementById("list_solicitantes").style.display = 'block';
                })
            } else {
                if (this.nombre_solicitante.length < 3 || this.nombre_solicitante.length == 0) {
                    this.solicitantes = [];
                    document.getElementById("list_solicitantes").style.display = 'none';
                }
            }

        },
        select_solicitante_fun:function(solicitante){
            this.solicitante_id = solicitante.id;
            this.nombre_solicitante_select = solicitante.nombre_completo;
            this.nombre_solicitante = '';
            document.getElementById("errorsolicitante").style.display = 'none';
            document.getElementById("list_solicitantes").style.display = 'none';
            document.getElementById("select_solicitante_sgc").style.display = 'block';
            document.getElementById("solicitante_search_sgc").style.display = 'none';
            
        },
        cambiar_solicitante:function(){
            this.solicitante_id = '';
            this.nombre_solicitante_select='';
            document.getElementById("select_solicitante_sgc").style.display = 'none';
            document.getElementById("solicitante_search_sgc").style.display = 'block';

        },

        



        



    }
        
}
</script>

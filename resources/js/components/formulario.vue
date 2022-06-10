<template>
    <div>
        <form>
            <div aria-hidden="true" class="modal inmodal" id="formulario" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated bounceInRight">
                        <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
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
                            <div class="card-body">
                                <div class="row mt-4">
                                    <div class="col-12 col-lg-8 offset-lg-2">
                                        <div class="wizard-steps">
                                            <div class="wizard-step " v-bind:class="step == 1 ?'wizard-step-active':''">
                                                <div class="wizard-step-icon">
                                                    <i class="fas fa-ticket-alt">
                                                    </i>
                                                </div>
                                                <div class="wizard-step-label">
                                                    Datos del ticket
                                                </div>
                                            </div>
                                            <div class="wizard-step" v-bind:class="step == 2 ?'wizard-step-active':''">
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
                                    <div class="wizard-pane">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12" id="stepOneDivOne">
                                                <div class="form-group ">
                                                    <label>
                                                        Sitio
                                                    </label>
                                                    <div id="popcheck" style="display: none">
                                                        <div class="input-group">
                                                            <input class="form-control" disabled="true" name="" style="background-color:#015dff;color:white;" type="" v-bind:value="site_info_select"/>
                                                            <div class="input-group-append">
                                                                <div @click.prevent="changePop()" class="input-group-text " style="cursor: pointer  ">
                                                                    <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="popSearch">
                                                        <div class="input-group">
                                                            <input class="form-control" id="inputSitio" name="datositio" placeholder="Buscar Sitio" style="position: relative;" type="text" v-model="datositio" v-on:keyup="BuscarSitio" value=""/>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-search">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="listPops" style="display: none">
                                                        <div class="s_l">
                                                            <div :style="'width:'+input_width_form+'px'+';'" class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                                                <div v-for="pop in pops">
                                                                    <a @click.prevent="selectdpop(pop.id,pop.nem_site,pop.nombre)" href="" id="selectpopvalue" style="color:black">
                                                                        {{pop.nem_site}} {{pop.nombre}}
                                                                        <hr style="margin-top: -1px;"/>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="errorPop" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar el sitio o tecnología
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Tecnología
                                                    </label>
                                                    <div id="tec_select_value" style="display: none">
                                                        <div class="input-group">
                                                            <input class="form-control" disabled="true" name="" style="background-color:#015dff;color:white;" type="" v-bind:value="tec_info_select"/>
                                                            <div class="input-group-append">
                                                                <div @click.prevent="cambiar_tecnologia()" class="input-group-text " style="cursor: pointer  ">
                                                                    <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tec_search">
                                                        <div class="input-group">
                                                            <input class="form-control" id="input_tec" placeholder="Buscar Tecnología" type="text" v-model="data_tec_search" v-on:keyup="BuscarTecnologia()" value=""/>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-search">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="list_tecologias" style="display: none">
                                                        <div class="s_l">
                                                            <div :style="'width:'+input_width_form_tec+'px'+';'" class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                                                <div v-for="data_t in data_tec">
                                                                    <a @click.prevent="selectTech(data_t)" href="" id="select_tech_value" style="color:black">
                                                                        {{data_t.nem_tech}} {{data_t.ran_device_name}}
                                                                        <hr style="margin-top: -1px;"/>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="error_tech" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar la tecnoloía o sitio
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Motivo *
                                                    </label>
                                                    <select @change.prevent="deleteError" class="form-control select" id="motivo" name="motivo" v-model="motivoId">
                                                        <option v-bind:value="1">
                                                            Vandalismo menor
                                                        </option>
                                                        <option v-bind:value="7">
                                                            Vandalismo mayor
                                                        </option>
                                                        <option v-bind:value="2">
                                                            Falla Mayor
                                                        </option>
                                                        <option v-bind:value="6">
                                                            Falla menor
                                                        </option>
                                                        <option v-bind:value="3">
                                                            Mantenimiento
                                                        </option>
                                                        <option v-bind:value="4">
                                                            Solicitud Stock
                                                        </option>
                                                        <option v-bind:value="5">
                                                            Solicitud de mejora
                                                        </option>
                                                        <option v-bind:value="8">
                                                            Gestión de residuo
                                                        </option>
                                                    </select>
                                                    <div id="errorMotivo" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar el Motivo
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="TipoMantencion" style="display: none">
                                                    <label>
                                                        Tipo mantención *
                                                    </label>
                                                    <select @change.prevent="deleteError" class="form-control select" id="mantencion" name="mantencion" v-model="mantencionId">
                                                        <option v-bind:value="mantencion.id" v-for="mantencion in mantenciones">
                                                            {{mantencion.descripcion}}
                                                        </option>
                                                    </select>
                                                    <div id="errortipoMantencion" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar el Tipo de mantención
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Descripción*
                                                    </label>
                                                    <textarea @keyup.prevent="deleteError" class="form-control" id="descripcion" name="descripcion" placeholder="" style="width: 100%; height: 100px;" v-model="descripcion">
                                                    </textarea>
                                                    <div id="errorDescripcion" style="display: none">
                                                        <p style="color: red">
                                                            Favor indicar una descripción
                                                        </p>
                                                    </div>
                                                </div>
                                                <div id="DivResago" style="display: none">
                                                    <div class="form-group">
                                                        <label>
                                                            Más de 10 años de antigüedad *
                                                        </label>
                                                        <select @change.prevent="deleteError" class="form-control select" v-model="antiguedad">
                                                            <option v-bind:value="1">
                                                                Si
                                                            </option>
                                                            <option v-bind:value="2">
                                                                No
                                                            </option>
                                                        </select>
                                                        <div id="errorantiguedad" style="display: none">
                                                            <p style="color: red">
                                                                Favor seleccionar la antigüedad
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            Equipo/Material *
                                                        </label>
                                                        <select @change.prevent="deleteError" class="form-control select" v-model="tipo_activo_id">
                                                            <option v-bind:value="1">
                                                                Equipo
                                                            </option>
                                                            <option v-bind:value="2">
                                                                Material
                                                            </option>
                                                        </select>
                                                        <div id="errorEquipoMaterial" style="display: none">
                                                            <p style="color: red">
                                                                Favor seleccionar el equipo o material
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            Descripción del activo *
                                                        </label>
                                                        <input @keyup.prevent="deleteError" class="form-control" name="" type="text" v-model="desc_activo">
                                                        </input>
                                                        <div id="errorDescActivo" style="display: none">
                                                            <p style="color: red">
                                                                Favor indicar la descripción del activo
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            Código SAP
                                                        </label>
                                                        <input @keyup.prevent="deleteError" class="form-control" name="" type="text" v-model="cod_sap_activo_resago">
                                                        </input>
                                                        <div id="errorCodSapActivo" style="display: none">
                                                            <p style="color: red">
                                                                Favor indicar el codigo sap
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12" id="stepOneDivTwoResago" style="display: none">
                                                <div class="form-group">
                                                    <label>
                                                        Cantidad *
                                                    </label>
                                                    <input @keyup.prevent="deleteError" class="form-control" name="" style="width: 100%" type="number" v-model="cant_activo_resago">
                                                    </input>
                                                    <div id="errorCAntidadActivoResago" style="display: none">
                                                        <p style="color: red">
                                                            Favor indicar la cantidad
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Fecha puesta en marcha *
                                                    </label>
                                                    <input @change.prevent="deleteError" class="form-control" name="" type="date" v-model="fecha_puesta_marcha">
                                                    </input>
                                                    <div id="errorFechaResago" style="display: none">
                                                        <p style="color: red">
                                                            Favor indicar la fecha
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Valor estimado *
                                                    </label>
                                                    <input @keyup.prevent="deleteError" class="form-control" name="" style="width: 100%" type="number" v-model="valor_estimado">
                                                    </input>
                                                    <div id="errorValorEstimado" style="display: none">
                                                        <p style="color: red">
                                                            Favor indicar el valor estimado
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        PEP de puesta en marcha/origen
                                                    </label>
                                                    <input @keyup.prevent="deleteError" class="form-control" name="" type="text" v-model="pep_puesta_marcha">
                                                    </input>
                                                    <div id="errorPepOrigen" style="display: none">
                                                        <p style="color: red">
                                                            Favor indicar el PEP
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Número de ework al pep asociado
                                                    </label>
                                                    <input @keyup.prevent="deleteError" class="form-control" name="" type="text" v-model="ework_pep_asociado">
                                                    </input>
                                                    <div id="errorEworkResago" style="display: none">
                                                        <p style="color: red">
                                                            Favor indicar el n° de ework
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12" id="stepOneDivTwo">
                                                <div class="form-group">
                                                    <label>
                                                        Área *
                                                    </label>
                                                    <select @change.prevent="deleteError" class="form-control select" id="areas" name="area" v-model="areaId" v-on:change="tecnica">
                                                        <option v-bind:value="area.id" v-for="area in areas">
                                                            {{area.descripcion}}
                                                        </option>
                                                    </select>
                                                    <div id="errorArea" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar el área
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fechaInicio">
                                                        Técnica *
                                                    </label>
                                                    <select @change.prevent="deleteError" class="form-control select" id="tecnicas" name="tecnica" v-model="tecnicaId" v-on:change="equipo">
                                                        <option v-bind:value="tecnica.id" v-for="tecnica in tecnicas">
                                                            {{tecnica.descripcion}}
                                                        </option>
                                                    </select>
                                                    <div id="errorTecnica" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar la Tecnia
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="equiposId">
                                                    <label for="fechaInicio">
                                                        Equipos *
                                                    </label>
                                                    <select @change.prevent="deleteError" class="form-control select" id="equipo" name="equipo" v-model="equipoId">
                                                        <option v-bind:value="equipo.id" v-for="equipo in equipos">
                                                            {{equipo.descripcion}}
                                                        </option>
                                                    </select>
                                                    <div id="errorEquipo" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar el equipo
                                                        </p>
                                                    </div>
                                                </div>
                                                 <div class="form-group" id="capacity_cells_div" style="display: none">
                                                    <label for="fechaInicio">
                                                        Capacidad de celdas *
                                                    </label>
                                                    <select @change.prevent="deleteError" class="form-control select" id="equipo" name="equipo" v-model="capacitye_cell_id">
                                                        <option v-bind:value="capacityes_cell.id" v-for="capacityes_cell in capacityes_cells">
                                                            {{capacityes_cell.descripcion}}
                                                        </option>
                                                    </select>
                                                    <div id="error_cap_cell" style="display: none">
                                                        <p style="color: red">
                                                            Favor seleccionar la capacidad de las celdas
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="CantidadEquipo" style="display:none">
                                                    <label>
                                                        Cantidad *
                                                    </label>
                                                    <input @keyup.prevent="deleteError" class="form-control" name="cantidad" style="width:100%" type="number" v-model="cantidadEquipo"/>
                                                    <div id="errorCantidadEquipo" style="display:none">
                                                        <p style="color:red">
                                                            Favor Indicar la Cantidad
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="total_bateri" style="display:none">
                                                    <label>
                                                        Cantidad baterías*
                                                    </label>
                                                    <input @keyup.prevent="deleteError" class="form-control" name="cantidad" style="width:100%" type="number" v-model="total_batery"/>
                                                    <div id="error_total_batery" style="display:none">
                                                        <p style="color:red">
                                                            Favor indicar la cantidad de baterías
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12" id="stepTwoneDivOne" style="display: none">
                                            <div class="form-group">
                                                <div class="file-upload" style="margin-top: -20px; width: 90%;margin-left: ;">
                                                    <div class="image-upload-wrap">
                                                        <input class="file-upload-input" id="cotizaciones" multiple="" ref="cotizaciones" type="file" v-on:change="handleFileUploads()"/>
                                                        <div class="drag-text">
                                                            <h2 style="font-size: 20px;">
                                                                Cotizaciones
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div class="file-listing " v-for="(file, key) in cotizaciones">
                                                        <div>
                                                            <div style="margin-top: 8px;">
                                                            </div>
                                                            <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                                {{ file.name }}
                                                                <a href="#" v-on:click="removeFileCotizaciones( key )">
                                                                    <i class="fas fa-times-circle boxBounce" style="color:white">
                                                                    </i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="file-upload" style="margin-top: -20px; width: 90%;margin-left: ;">
                                                    <div class="image-upload-wrap">
                                                        <input class="file-upload-input" id="lpu" multiple="" ref="lpu" type="file" v-on:change="handleLpuUploads()"/>
                                                        <div class="drag-text">
                                                            <h2 style="font-size: 20px;">
                                                                Lpu
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div class="file-listing " v-for="(file, key) in lpu">
                                                        <div>
                                                            <div style="margin-top: 8px;">
                                                            </div>
                                                            <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                                {{ file.name }}
                                                                <a href="#" v-on:click="removeFileLpu( key )">
                                                                    <i class="fas fa-times-circle boxBounce" style="color:white">
                                                                    </i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="file-upload" style="margin-top: -20px; width: 90%;margin-left: ;">
                                                    <div class="image-upload-wrap">
                                                        <input class="file-upload-input" id="checklist" multiple="" ref="checklist" type="file" v-on:change="handleChecklistUploads()"/>
                                                        <div class="drag-text">
                                                            <h2 style="font-size: 20px;">
                                                                Chek list
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div class="file-listing " v-for="(file, key) in checklist">
                                                        <div>
                                                            <div style="margin-top: 8px;">
                                                            </div>
                                                            <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                                {{ file.name }}
                                                                <a href="#" v-on:click="removeFileCheckList( key )">
                                                                    <i class="fas fa-times-circle boxBounce" style="color:white">
                                                                    </i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12" id="stepTwoneDivTwo" style="display: none">
                                            <div class="form-group">
                                                <div class="file-upload" style="margin-top: -20px; width: 90%;margin-left: ;">
                                                    <div class="image-upload-wrap">
                                                        <input class="file-upload-input" id="pxqs" multiple="" ref="pxqs" type="file" v-on:change="handleFileUploadsPxq()"/>
                                                        <div class="drag-text">
                                                            <h2 style="font-size: 18px;">
                                                                PXQ
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div class="file-listing " v-for="(file, key) in pxqs">
                                                        <div>
                                                            <div style="margin-top: 8px;">
                                                            </div>
                                                            <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                                {{ file.name }}
                                                                <a href="#" v-on:click="removeFilePxQ( key )">
                                                                    <i class="fas fa-times-circle boxBounce" style="color:white">
                                                                    </i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="file-upload" style="margin-top: -20px; width: 90%;margin-left: ;">
                                                    <div class="image-upload-wrap">
                                                        <input class="file-upload-input" id="informefotografico" multiple="" ref="informefotografico" type="file" v-on:change="handleFileUploadsInformefotografico()"/>
                                                        <div class="drag-text">
                                                            <h2 style="font-size: 20px;">
                                                                Imagenes
                                                                <small>
                                                                    (informe fotográfico)
                                                                </small>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div class="file-listing " v-for="(file, key) in informefotografico">
                                                        <div>
                                                            <div style="margin-top: 8px;">
                                                            </div>
                                                            <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                                {{ file.name }}
                                                                <a href="#" v-on:click="removeFileInformefotografico( key )">
                                                                    <i class="fas fa-times-circle boxBounce" style="color:white">
                                                                    </i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="file-upload" style="margin-top: -20px; width: 90%;margin-left: ;">
                                                    <div class="image-upload-wrap">
                                                        <input class="file-upload-input" id="docdenuncia" multiple="" ref="docdenuncia" type="file" v-on:change="handleFileUploadsDocdenuncia()"/>
                                                        <div class="drag-text">
                                                            <h2 style="font-size: 20px;">
                                                                Documento denuncia
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div class="file-listing " v-for="(file, key) in docdenuncia">
                                                        <div>
                                                            <div style="margin-top: 8px;">
                                                            </div>
                                                            <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                                {{ file.name }}
                                                                <a href="#" v-on:click="removeFileDocdenuncia( key )">
                                                                    <i class="fas fa-times-circle boxBounce" style="color:white">
                                                                    </i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12" id="progressBarFileUpoad" style="display: none">
                                        <div class="card-title">
                                            <h2 style="font-size: 20px;">
                                                Subiendo archivos...
                                            </h2>
                                        </div>
                                        <div class="progress mb-3 " data-height="25">
                                            <div :style="'width:'+ getProgress" aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" class="progress-bar bg-info" role="progressbar">
                                                <div v-if=" getProgress == 'NaN%'">
                                                </div>
                                                <div v-if=" getProgress != 'NaN%'">
                                                    {{getProgress}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a @click.prevent="BackStepOne()" class="btn btn-icon icon-left btn-primary" href="#" id="backStep1" style="display: none">
                                            <i class="fas fa-arrow-left">
                                            </i>
                                            Atrás
                                        </a>
                                        <a @click.prevent="ValidateFormTicektStepOne()" class="btn btn-icon icon-right btn-primary" href="#" id="btnNextStepOne">
                                            Siguiente
                                            <i class="fas fa-arrow-right">
                                            </i>
                                        </a>
                                        <a @click.prevent="CreateTicket()" class="btn btn-icon icon-right btn-primary" href="#" id="btnCreateTicket" style="display: none">
                                            Finalizar
                                            <i class="fas fa-arrow-right">
                                            </i>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
import axios from 'axios';
import EventBus from "../event-bus"
export default {
    props: [ 'rol' ],
    data(){
        return{
            imagen :'',
            pops:[],
            motivos:[],
            areas:[],
            tecnicas:[],
            equipos:[],
            mantencionId:'',
            datositio:'',
            popid:'',
            dataPop:[],
            archivos:[],
            descripcion:'',
            motivoId:'',
            feinicioproblema:'',
        
            areaId:'',
            tecnicaId:'',
            ticektCreado:'',
            cantidadEquipo:'',
            validacionCampo:'',
            attachment:null,
            tipoArchivos:[],
            mantenciones:[],
            motivoId:'',
            areaId:'',
            tecnicaId:'',
            equipoId:'',
            cantidadEquipo:'',
            tipo_archivo:'',
            AllData: 0,
            cotizaciones: [],
            lpu:[],
            checklist:[],
            step:1,
            pxqs:[],
            informefotografico:[],
            docdenuncia:[],
            porcentaje:{
                type:Number,
                default:0
            },
            tipo_activo_id:'',
            desc_activo:'',
            cod_sap_activo_resago:'',
            cant_activo_resago:'',
            fecha_puesta_marcha:'',
            pep_puesta_marcha:'',
            ework_pep_asociado:'',
            valor_estimado:'',
            antiguedad:'',
            input_width_form:0,
            data_tec_search:'',
            data_tec:[],
            input_width_form_tec:0,
            tec_id:'',
            tec_info_select:'',
            site_info_select:'',
            form_complete:0,
            pre_ticket_proveedor:'',
            pre_ticket_id:'',
            total_batery:'',
            capacityes_cells:[],
            capacitye_cell_id:''
            
        }

    },
    computed:{
        getProgress(){
            return Math.round(this.porcentaje)+'%'
        }
    },
    mounted: function(){
        let self = this;
        EventBus.$on('app.getBFormulario', function() {
            
            self.getFormulario(); // ejecutas el metodo que desees 
            $('#formulario').modal('show');
        });
        EventBus.$on('provider.getFormulario', function(job) {
            if(job.site_id != null){
                self.popid = job.site_id
                document.getElementById('listPops').style.display = 'none';
                document.getElementById('popcheck').style.display = 'block';
                document.getElementById('popSearch').style.display = 'none';
                document.getElementById('errorPop').style.display = 'none';
                document.getElementById('error_tech').style.display = 'none';
                self.pre_ticket_proveedor = 1;
                self.site_info_select = job.site.nem_site + '-' + job.site.nombre;
 
          
            }
            self.pre_ticket_id = job.id;
            self.descripcion = job.descripcion;
            self.getFormulario(); // ejecutas el metodo que desees 
            $('#formulario').modal('show');
        });
    },
    created:function(){
        
        this.getFormulario();
       


     

    },

    methods:{
      update_state_pre_ticket:function(ticket_id){
           console.log('hole')
           axios.get(`/provider_update_ticket?ticket_id=${ticket_id}&pre_ticket_id=${this.pre_ticket_id}`).then(response=>{
              EventBus.$emit('job.created.ticket');
           })
      },
      changeFiles(e) {
          let selectedFile = e.target.files[0];
          this.attachment = selectedFile;
      },
      removeFileCotizaciones(key) {
          this.cotizaciones.splice(key, 1);
      },
      removeFileLpu(key) {
          this.lpu.splice(key, 1);
      },
      removeFileCheckList(key) {
          this.checklist.splice(key, 1);
      },
      removeFilePxQ(key) {
          this.pxqs.splice(key, 1);
      },
      removeFileInformefotografico(key) {
          this.informefotografico.splice(key, 1);
      },
      removeFileDocdenuncia(key) {
          this.docdenuncia.splice(key, 1)
      },
      handleFileUploads: function() {
          let uploadedFiles = this.$refs.cotizaciones.files;
          /*
            Adds the uploaded file to the files array
          */
          for (var i = 0; i < uploadedFiles.length; i++) {
              this.cotizaciones.push(uploadedFiles[i]);
          }
      },
      handleLpuUploads: function() {
          let uploadedFiles = this.$refs.lpu.files;
          /*
            Adds the uploaded file to the files array
          */
          for (var i = 0; i < uploadedFiles.length; i++) {
              this.lpu.push(uploadedFiles[i]);
          }
      },
      handleChecklistUploads: function() {
          let uploadedFiles = this.$refs.checklist.files;
          /*
            Adds the uploaded file to the files array
          */
          for (var i = 0; i < uploadedFiles.length; i++) {
              this.checklist.push(uploadedFiles[i]);
          }
      },
      handleFileUploadsPxq: function() {
          let uploadedFiles = this.$refs.pxqs.files;
          /*
            Adds the uploaded file to the files array
          */
          for (var i = 0; i < uploadedFiles.length; i++) {
              this.pxqs.push(uploadedFiles[i]);
          }
      },
      handleFileUploadsInformefotografico: function() {
          let uploadedFiles = this.$refs.informefotografico.files;
          /*
            Adds the uploaded file to the files array
          */
          for (var i = 0; i < uploadedFiles.length; i++) {
              this.informefotografico.push(uploadedFiles[i]);
          }
      },
      handleFileUploadsDocdenuncia: function() {
          let uploadedFiles = this.$refs.docdenuncia.files;
          /*
            Adds the uploaded file to the files array
          */
          for (var i = 0; i < uploadedFiles.length; i++) {
              this.docdenuncia.push(uploadedFiles[i]);
          }
      },
      BackStepOne: function() {
          if (this.motivoId == 8) {
              document.getElementById("stepOneDivTwo").style.display = 'none'
              document.getElementById("stepOneDivOne").style.display = 'block'
              this.step = 1;
              document.getElementById("backStep1").style.display = 'none'
              document.getElementById('stepOneDivTwoResago').style.display = 'block'
              document.getElementById('DivResago').style.display = 'block'
              document.getElementById("btnNextStepOne").style.display = 'block'
              document.getElementById("btnCreateTicket").style.display = 'none'
              document.getElementById("stepTwoneDivOne").style.display = 'none'
              document.getElementById("stepTwoneDivTwo").style.display = 'none'
          } else {
              document.getElementById("stepOneDivTwo").style.display = 'block'
              document.getElementById("stepOneDivOne").style.display = 'block'
              document.getElementById("backStep1").style.display = 'none'
              document.getElementById("btnNextStepOne").style.display = 'block'
              document.getElementById("btnCreateTicket").style.display = 'none'
              document.getElementById("stepTwoneDivOne").style.display = 'none'
              document.getElementById("stepTwoneDivTwo").style.display = 'none'
          }
      },
      deleteError: function() {
          if (this.motivoId != '') {
              var errorMotivo = document.getElementById('errorMotivo');
              errorMotivo.style.display = 'none';
              if (this.motivoId == 4) {
                  axios.get('/GetFilterArea').then((response) => {
                      this.areas = response.data;
                  })
                  var ChancheEquipoId = document.getElementById('equiposId');
                  var ChangeCantEquipo = document.getElementById('CantidadEquipo');
                  ChancheEquipoId.style.display = 'none';
                  ChangeCantEquipo.style.display = '';
              } else {
                  if (this.motivoId == 8) {
                      document.getElementById('stepOneDivTwo').style.display = 'none'
                      document.getElementById('stepOneDivTwoResago').style.display = 'block'
                      document.getElementById('DivResago').style.display = 'block'
                      if (this.desc_activo != '') {
                          document.getElementById('errorDescActivo').style.display = 'none'
                      }
                      if (this.cod_sap_activo_resago != '') {
                          document.getElementById('errorCodSapActivo').style.display = 'none'
                      }
                      if (this.fecha_puesta_marcha != '') {
                          document.getElementById('errorFechaResago').style.display = 'none'
                      }
                      if (this.pep_puesta_marcha != '') {
                          document.getElementById('errorPepOrigen').style.display = 'none'
                      }
                      if (this.ework_pep_asociado != '') {
                          document.getElementById('errorEworkResago').style.display = 'none'
                      }
                      if (this.cant_activo_resago != '') {
                          document.getElementById('errorCAntidadActivoResago').style.display = 'none'
                      }
                      if (this.valor_estimado != '') {
                          document.getElementById('errorValorEstimado').style.display = 'none'
                      }
                      if (this.tipo_activo_id != '') {
                          document.getElementById('errorEquipoMaterial').style.display = 'none'
                      }
                  } else {
                      axios({
                          method: 'Get',
                          responseType: 'json',
                          url: '/Getarea',
                      }).then(response => {
                          this.areas = response.data
                      });
                      var ChancheEquipoId = document.getElementById('equiposId');
                      var ChangeCantEquipo = document.getElementById('CantidadEquipo');
                      document.getElementById('stepOneDivTwo').style.display = 'block'
                      document.getElementById('stepOneDivTwoResago').style.display = 'none'
                      document.getElementById('DivResago').style.display = 'none'
                      ChancheEquipoId.style.display = '';
                      ChangeCantEquipo.style.display = 'none';
                  }
              }
              if (this.motivoId == 3) {
                  var tipoMantencion = document.getElementById('TipoMantencion');
                  tipoMantencion.style.display = '';
                  axios.get('/tipoMantencion').then((response) => {
                      this.mantenciones = response.data;
                  })
              } else {
                  this.mantenciones = '';
                  this.mantencionId = '';
                  var tipoMantencion = document.getElementById('TipoMantencion');
                  tipoMantencion.style.display = 'none';
              }
          }
          if (this.mantencionId != '') {
              var errortipoMantencion = document.getElementById('errortipoMantencion');
              errortipoMantencion.style.display = 'none';
          }
          if (this.descripcion != '') {
              var errorDescripcion = document.getElementById('errorDescripcion');
              errorDescripcion.style.display = 'none';
          }
          if (this.areaId != '') {
              var errorArea = document.getElementById('errorArea');
              errorArea.style.display = 'none';
          }
          if (this.tecnicaId != '') {
              var errorTecnica = document.getElementById('errorTecnica');
              errorTecnica.style.display = 'none';
              if(this.tecnicaId == 5){
                 document.getElementById("total_bateri").style.display = 'block'
              }else{
                if(this.tecnicaId != 5){
                      document.getElementById("total_bateri").style.display = 'none'
                }
              }
          }
          if (this.tipo_archivo != '') {
              var errorTipoArchivpo = document.getElementById('errorTipoArchivpo');
              errorTipoArchivpo.style.display = 'none';
          }
          if (this.motivoId == 4) {
              if (this.cantidadEquipo != '') {
                  var errorCantidadEquipo = document.getElementById('errorCantidadEquipo');
                  errorCantidadEquipo.style.display = 'none';
              }
          } else {
              if (this.equipoId != '') {
                  var errorEquipo = document.getElementById('errorEquipo');
                  errorEquipo.style.display = 'none';
              }
          }
          if(this.equipoId == 42){
            document.getElementById("capacity_cells_div").style.display = 'block';
            axios.get('/get_capacyti_cells').then(response=>{
                 this.capacityes_cells = response.data;
            })
          }else{
            document.getElementById("capacity_cells_div").style.display = 'none';
            this.capacityes_cells = [];
            this.capacitye_cell_id = '';
          }
          if (this.equipoId != '' || this.cantidadEquipo != '') {
              this.validacionCampo = 1;
          }

          if (this.popid != '' && this.motivoId != '' && this.descripcion != '' && this.areaId != '' && this.tecnicaId != '' && this.validacionCampo == 1) {
              this.AllData = 1;
          } else {
              this.AllData = 0;
          }

           if(this.capacitye_cell_id != ''){
                document.getElementById("error_cap_cell").style.display = 'none'
           }
           if(this.total_batery != ''){
                document.getElementById("error_total_batery").style.display = 'none'
           }
      },
      CleandForm: function() {
          this.changePop();
          this.cambiar_tecnologia();
          this.descripcion = '';
          this.cantidadEquipo = '';
          this.areaId = '';
          this.tecnicaId = '';
          this.equipoId = '';
          this.motivoId = '';
          this.mantencionId = '';
          this.tipo_archivo = '';
          this.files = [];
          this.cotizaciones = [];
          this.lpu = [];
          this.checklist = [];
          this.pxqs = [];
          this.informefotografico = [];
          this.docdenuncia = [];
          this.porcentaje = 0;
          this.tipo_activo_id = '';
          this.desc_activo = '';
          this.cod_sap_activo_resago = '';
          this.cant_activo_resago = '';
          this.fecha_puesta_marcha = '';
          this.valor_estimado = '';
          this.pep_puesta_marcha = '';
          this.ework_pep_asociado = '';
          this.capacitye_cell_id = '';
          this.total_batery = '';
          this.capacityes_cells=[];
          this.step = 1;

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
          }, 500)
      },
      toastFunction: function(Messaje) {
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 6500,
              onOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
          })
          Toast.fire({
              type: 'success',
              title: 'Ticket nro°' + ' ' + Messaje + ' ' + 'creado'
          })
      },
      ValidateFormTicektStepOne: function() {
          if (this.popid == '' && this.tec_id == '') {
              Swal.fire({
                  type: 'error',
                  title: 'Error',
                  text: 'Debes selecionar un sitio o una tecnología.',
              })
              document.getElementById('errorPop').style.display = 'block';
              document.getElementById('error_tech').style.display = 'block';
          }
          if (this.motivoId == 3) {
              if (this.mantencionId == '') {
                  var errortipoMantencion = document.getElementById('errortipoMantencion');
                  errortipoMantencion.style.display = '';
              }
          }
          if (this.motivoId == '') {
              var errorMotivo = document.getElementById('errorMotivo');
              errorMotivo.style.display = '';
          }
          if (this.descripcion == '') {
              var errorDescripcion = document.getElementById('errorDescripcion');
              errorDescripcion.style.display = '';
          }
          if (this.motivoId == 3) {} else {
              if (this.areaId == '') {
                  var errorArea = document.getElementById('errorArea');
                  errorArea.style.display = '';
              }
              if (this.tecnicaId == '') {
                  var errorTecnica = document.getElementById('errorTecnica');
                  errorTecnica.style.display = '';
              }
              if (this.motivoId == 4) {
                  if (this.cantidadEquipo == '') {
                      var errorCantidadEquipo = document.getElementById('errorCantidadEquipo');
                      errorCantidadEquipo.style.display = '';
                  }
              } else {
                  if (this.equipoId == '') {
                      var errorEquipo = document.getElementById('errorEquipo');
                      errorEquipo.style.display = '';
                  }
              }
          }
          if (this.motivoId == 8) {
              if (this.antiguedad == 1) {
                  if (this.desc_activo == '') {
                      document.getElementById('errorDescActivo').style.display = 'block'
                  }
                  if (this.fecha_puesta_marcha == '') {
                      document.getElementById('errorFechaResago').style.display = 'block'
                  }
                  if (this.cant_activo_resago == '') {
                      document.getElementById('errorCAntidadActivoResago').style.display = 'block'
                  }
                  if (this.valor_estimado == '') {
                      document.getElementById('errorValorEstimado').style.display = 'block'
                  }
                  if (this.tipo_activo_id == '') {
                      document.getElementById('errorEquipoMaterial').style.display = 'block'
                  }
              } else {
                  if (this.antiguedad == 2) {
                      if (this.desc_activo == '') {
                          document.getElementById('errorDescActivo').style.display = 'block'
                      }
                      if (this.cod_sap_activo_resago == '') {
                          document.getElementById('errorCodSapActivo').style.display = 'block'
                      }
                      if (this.fecha_puesta_marcha == '') {
                          document.getElementById('errorFechaResago').style.display = 'block'
                      }
                      if (this.pep_puesta_marcha == '') {
                          document.getElementById('errorPepOrigen').style.display = 'block'
                      }
                      if (this.ework_pep_asociado == '') {
                          document.getElementById('errorEworkResago').style.display = 'block'
                      }
                      if (this.cant_activo_resago == '') {
                          document.getElementById('errorCAntidadActivoResago').style.display = 'block'
                      }
                      if (this.valor_estimado == '') {
                          document.getElementById('errorValorEstimado').style.display = 'block'
                      }
                      if (this.tipo_activo_id == '') {
                          document.getElementById('errorEquipoMaterial').style.display = 'block'
                      }
                  }
              }
          }
          if (this.tecnicaId != '' || this.cantidadEquipo != '') {
              this.validacionCampo = 1;
          }
          if(this.tecnicaId == 5){
              if(this.equipoId == 42){
                  if(this.capacitye_cell_id == ''){
                    document.getElementById("error_cap_cell").style.display = 'block'
                  }
                  if(this.total_batery == ''){
                    document.getElementById("error_total_batery").style.display = 'block'
                  }

                  if(this.motivoId != '' && this.descripcion != '' && this.areaId != '' && this.tecnicaId != '' && this.capacitye_cell_id != '' &&
                    this.total_batery != ''){
                    if(this.popid != '' || this.tec_id != ''){
                        document.getElementById("stepOneDivTwo").style.display = 'none'
                        document.getElementById("stepOneDivOne").style.display = 'none'
                        this.step = 2;
                        document.getElementById("backStep1").style.display = 'block'
                        document.getElementById("btnNextStepOne").style.display = 'none'
                        document.getElementById("btnCreateTicket").style.display = 'block'
                        document.getElementById("stepTwoneDivOne").style.display = 'block'
                        document.getElementById("stepTwoneDivTwo").style.display = 'block'
                        document.getElementById('stepOneDivTwoResago').style.display = 'none'
                        document.getElementById('DivResago').style.display = 'none'
                        this.form_complete = 1;
                        this.validacionCampo = 1;
                    }
                     
                      
                  }
              }else{
                if(this.total_batery == ''){
                    document.getElementById("error_total_batery").style.display = 'block'
                }

                if(this.motivoId != '' && this.descripcion != '' && this.areaId != '' && this.tecnicaId != '' &&
                    this.total_batery != ''){
                      if(this.popid != '' || this.tec_id != ''){
                        document.getElementById("stepOneDivTwo").style.display = 'none'
                        document.getElementById("stepOneDivOne").style.display = 'none'
                        this.step = 2;
                        document.getElementById("backStep1").style.display = 'block'
                        document.getElementById("btnNextStepOne").style.display = 'none'
                        document.getElementById("btnCreateTicket").style.display = 'block'
                        document.getElementById("stepTwoneDivOne").style.display = 'block'
                        document.getElementById("stepTwoneDivTwo").style.display = 'block'
                        document.getElementById('stepOneDivTwoResago').style.display = 'none'
                        document.getElementById('DivResago').style.display = 'none'
                        this.form_complete = 1;
                        this.validacionCampo = 1;
                      }
                     

                }
              }
          }else{
             if (this.motivoId == 3) {
              if (this.popid != '' || this.tec_id != '' ) {
                  if(this.motivoId != '' && this.descripcion != '' && this.mantencionId != ''){
                     document.getElementById("stepOneDivTwo").style.display = 'none'
                     document.getElementById("stepOneDivOne").style.display = 'none'
                     this.step = 2;
                     document.getElementById("backStep1").style.display = 'block'
                     document.getElementById("btnNextStepOne").style.display = 'none'
                     document.getElementById("btnCreateTicket").style.display = 'block'
                     document.getElementById("stepTwoneDivOne").style.display = 'block'
                     document.getElementById('stepOneDivTwoResago').style.display = 'none'
                     document.getElementById('DivResago').style.display = 'none'
                      this.form_complete = 1;
                  }
                 
              }
          } else {
              if (this.motivoId == 8) {
                  if (this.antiguedad == 1) {
                      if (this.tipo_activo_id != '' && this.desc_activo != '' && this.cant_activo_resago != '' && this.fecha_puesta_marcha != '' && this.valor_estimado != '') {
                          document.getElementById("stepOneDivTwo").style.display = 'none'
                          document.getElementById("stepOneDivOne").style.display = 'none'
                          this.step = 2;
                          document.getElementById("backStep1").style.display = 'block'
                          document.getElementById("btnNextStepOne").style.display = 'none'
                          document.getElementById("btnCreateTicket").style.display = 'block'
                          document.getElementById("stepTwoneDivOne").style.display = 'block'
                          document.getElementById('stepOneDivTwoResago').style.display = 'none'
                          document.getElementById('DivResago').style.display = 'none'
                          document.getElementById("stepTwoneDivTwo").style.display = 'block'
                           this.form_complete = 1;
                      }
                  } else {
                      if (this.antiguedad == 2) {
                          if (this.tipo_activo_id != '' && this.desc_activo != '' && this.cod_sap_activo_resago != '' && this.cant_activo_resago != '' && this.fecha_puesta_marcha != '' && this.valor_estimado != '' && this.pep_puesta_marcha != '' && this.ework_pep_asociado != '') {
                              document.getElementById("stepOneDivTwo").style.display = 'none'
                              document.getElementById("stepOneDivOne").style.display = 'none'
                              this.step = 2;
                              document.getElementById("backStep1").style.display = 'block'
                              document.getElementById("btnNextStepOne").style.display = 'none'
                              document.getElementById("btnCreateTicket").style.display = 'block'
                              document.getElementById("stepTwoneDivOne").style.display = 'block'
                              document.getElementById('stepOneDivTwoResago').style.display = 'none'
                              document.getElementById('DivResago').style.display = 'none'
                              document.getElementById("stepTwoneDivTwo").style.display = 'block'
                               this.form_complete = 1;

                          }
                      }
                  }
              } else {
                  if (this.popid != '' || this.tec_id != '') {
                      if (this.motivoId != '' && this.descripcion != '' && this.areaId != '' && this.tecnicaId != '' && this.validacionCampo == 1) {
                          document.getElementById("stepOneDivTwo").style.display = 'none'
                          document.getElementById("stepOneDivOne").style.display = 'none'
                          this.step = 2;
                          document.getElementById("backStep1").style.display = 'block'
                          document.getElementById("btnNextStepOne").style.display = 'none'
                          document.getElementById("btnCreateTicket").style.display = 'block'
                          document.getElementById("stepTwoneDivOne").style.display = 'block'
                          document.getElementById("stepTwoneDivTwo").style.display = 'block'
                          document.getElementById('stepOneDivTwoResago').style.display = 'none'
                          document.getElementById('DivResago').style.display = 'none'
                          this.form_complete = 1;
                      }
                  }
              }
          }
          }

          
      },
      CreateTicket: function() {
          let formData = new FormData();
          formData.append('pop', this.popid);
          formData.append('descripcion', this.descripcion);
          formData.append('cantidad', this.cantidadEquipo);
          formData.append('area', this.areaId);
          formData.append('tecnica', this.tecnicaId);
          formData.append('equipo', this.equipoId);
          formData.append('motivo', this.motivoId);
          formData.append('mantencion', this.mantencionId);
          formData.append('tipo_archivo', this.tipo_archivo);
          formData.append('activo_id', this.tipo_activo_id)
          formData.append('desc_activo', this.desc_activo)
          formData.append('cod_sap', this.cod_sap_activo_resago)
          formData.append('cant_activo_resago', this.cant_activo_resago)
          formData.append('fecha_puesta_marcha', this.fecha_puesta_marcha)
          formData.append('valor_estimado', this.valor_estimado)
          formData.append('pep', this.pep_puesta_marcha)
          formData.append('ework', this.ework_pep_asociado)
          formData.append('tech_id',this.tec_id)
          formData.append('total_batery',this.total_batery)
          

          for (var i = 0; i < this.cotizaciones.length; i++) {
              let cotizacion = this.cotizaciones[i];
              formData.append('cotizacion[' + i + ']', cotizacion);
          }
          for (var i = 0; i < this.lpu.length; i++) {
              let lpus = this.lpu[i];
              formData.append('lpu[' + i + ']', lpus);
          }
          for (var i = 0; i < this.checklist.length; i++) {
              let checklists = this.checklist[i];
              formData.append('checklist[' + i + ']', checklists);
          }
          for (var i = 0; i < this.pxqs.length; i++) {
              let pxq = this.pxqs[i];
              formData.append('pxq[' + i + ']', pxq);
          }
          for (var i = 0; i < this.informefotografico.length; i++) {
              let informefotograficos = this.informefotografico[i];
              formData.append('informefotografico[' + i + ']', informefotograficos);
          }
          for (var i = 0; i < this.docdenuncia.length; i++) {
              let docdenuncias = this.docdenuncia[i];
              formData.append('docdenuncia[' + i + ']', docdenuncias);
          }

          if (this.motivoId == 3) {
              if (this.form_complete == 1 ) {
                    
                  document.getElementById("progressBarFileUpoad").style.display = 'block';
                  document.getElementById("backStep1").style.display = 'none';
                  document.getElementById("btnCreateTicket").style.display = 'none';
                  axios.post('/CrearTicket', formData, {
                      headers: {
                          'Content-Type': 'multipart/form-data'
                      },
                      onUploadProgress: e => {
                          if (e.lengthComputable) {
                              this.porcentaje = (e.loaded / e.total) * 100
                          }
                      }
                  }).then((response) => {
                      $('#formulario').modal('hide');
                      document.getElementById("backStep1").style.display = 'block';
                      document.getElementById("btnCreateTicket").style.display = 'block';
                      document.getElementById("progressBarFileUpoad").style.display = 'none';
                      this.loadFunction();
                      this.AlertFunction(response.data);
                      if(this.pre_ticket_proveedor == ''){
                           EventBus.$emit('GetTotalTicekts.getBacklog');
                           EventBus.$emit('ticket.created');
                      }

                      if(this.pre_ticket_proveedor == 1){
                          this.update_state_pre_ticket(response.data);
                      }

                  
                      if (this.rol == 29) {
                          axios.get(`/SendMailCrmTicket?sitio=${this.popid}&ticket=${response.data}&motivo=${this.motivoId}&descripcion=${this.descripcion}`)
                      }
                      this.BackStepOne();
                      this.CleandForm();
                  })
                  
                  
              }
          } else {
              if ( this.form_complete == 1) {
                  //$('#formulario').modal('hide');
                
                  document.getElementById("progressBarFileUpoad").style.display = 'block';
                  document.getElementById("backStep1").style.display = 'none';
                  document.getElementById("btnCreateTicket").style.display = 'none';
                  axios.post('/CrearTicket', formData, {
                      headers: {
                          'Content-Type': 'multipart/form-data'
                      },
                      onUploadProgress: e => {
                          if (e.lengthComputable) {
                              this.porcentaje = (e.loaded / e.total) * 100
                          }
                      }
                  }).then((response) => {
                      $('#formulario').modal('hide');
                      document.getElementById("backStep1").style.display = 'block';
                      document.getElementById("btnCreateTicket").style.display = 'block';
                      document.getElementById("progressBarFileUpoad").style.display = 'none';
                      document.getElementById("capacity_cells_div").style.display = 'none'; 
                      document.getElementById("total_bateri").style.display = 'none'; 
                      this.loadFunction();
                      this.AlertFunction(response.data);
                      EventBus.$emit('GetTotalTicekts.getBacklog');
                      EventBus.$emit('ticket.created');
                      if (this.rol == 29) {
                          axios.get(`/SendMailCrmTicket?sitio=${this.popid}&ticket=${response.data}&motivo=${this.motivoId}&descripcion=${this.descripcion}`)
                      }

                      this.CleandForm();
                      this.BackStepOne();
                      if(this.pre_ticket_proveedor == 1){
                          this.update_state_pre_ticket(response.data);
                      }
                  })
              } else {
                  if (this.motivoId == 8) {
                      if (this.antiguedad == 1) {
                          if ( this.form_complete == 1) {
                             
                              document.getElementById("progressBarFileUpoad").style.display = 'block';
                              document.getElementById("backStep1").style.display = 'none';
                              document.getElementById("btnCreateTicket").style.display = 'none';
                              axios.post('/CrearTicket', formData, {
                                  headers: {
                                      'Content-Type': 'multipart/form-data'
                                  },
                                  onUploadProgress: e => {
                                      if (e.lengthComputable) {
                                          this.porcentaje = (e.loaded / e.total) * 100
                                      }
                                  }
                              }).then((response) => {
                                  $('#formulario').modal('hide');
                                  document.getElementById("backStep1").style.display = 'block';
                                  document.getElementById("btnCreateTicket").style.display = 'block';
                                  document.getElementById("progressBarFileUpoad").style.display = 'none';
                                  this.loadFunction();
                                  this.AlertFunction(response.data);
                                  this.CleandForm();
                                  this.BackStepOne();
                                  document.getElementById('stepOneDivTwoResago').style.display = 'none'
                                  document.getElementById('DivResago').style.display = 'none'
                                  EventBus.$emit('GetTotalTicekts.getBacklog');
                                  document.getElementById('errorArea').style.display = 'none'
                                  document.getElementById('errorTecnica').style.display = 'none'
                                  document.getElementById('errorEquipo').style.display = 'none'
                                  document.getElementById("capacity_cells_div").style.display = 'none'; 
                                  document.getElementById("total_bateri").style.display = 'none'; 
                                  if(this.pre_ticket_proveedor == 1){
                                    this.update_state_pre_ticket(response.data);
                                  }
                              })
                          }
                      } else {
                          if (this.antiguedad == 2) {
                              if ( this.form_complete == 1) {
                                  document.getElementById("progressBarFileUpoad").style.display = 'block';
                                  document.getElementById("backStep1").style.display = 'none';
                                  document.getElementById("btnCreateTicket").style.display = 'none';
                                  axios.post('/CrearTicket', formData, {
                                      headers: {
                                          'Content-Type': 'multipart/form-data'
                                      },
                                      onUploadProgress: e => {
                                          if (e.lengthComputable) {
                                              this.porcentaje = (e.loaded / e.total) * 100
                                          }
                                      }
                                  }).then((response) => {
                                      $('#formulario').modal('hide');
                                      document.getElementById("capacity_cells_div").style.display = 'none'; 
                                      document.getElementById("total_bateri").style.display = 'none'; 
                                      document.getElementById("backStep1").style.display = 'block';
                                      document.getElementById("btnCreateTicket").style.display = 'block';
                                      document.getElementById("progressBarFileUpoad").style.display = 'none';
                                      this.loadFunction();
                                      this.AlertFunction(response.data);
                                      this.CleandForm();
                                      this.BackStepOne();
                                      document.getElementById('stepOneDivTwoResago').style.display = 'none'
                                      document.getElementById('DivResago').style.display = 'none'
                                      EventBus.$emit('GetTotalTicekts.getBacklog');
                                      document.getElementById('errorArea').style.display = 'none'
                                      document.getElementById('errorTecnica').style.display = 'none'
                                      document.getElementById('errorEquipo').style.display = 'none'
                                      if(this.pre_ticket_proveedor == 1){
                                       this.update_state_pre_ticket(response.data);
                                      }
                                  })
                              }
                          }
                      }
                  }
              }
          }
      },
      AlertFunction: function(messaje) {
          if(messaje.solicitud_psa_id != 0){
               Swal.fire({
                 type: 'success',
                 title: 'Ticket creado',
                 text: 'Ticket nro°' + ' ' + messaje.ticket_id + ' ' + 'creado y solicitud de activos nro°'+' '+ messaje.solicitud_psa_id+' '+'creada.' ,
               })
          }else{
               Swal.fire({
                  type: 'success',
                  title: 'Ticket creado',
                  text: 'Ticket nro°' + ' ' + messaje.ticket_id + ' ' + 'creado.',
                })
          }
        
      },
      getFormulario: function() {
          axios({
              method: 'Get',
              responseType: 'json',
              url: '/Tipomotivo',
          }).then(response => {
              this.motivos = response.data
          });
          axios.get('/getTipoArchivos').then((response) => {
              this.tipoArchivos = response.data;
          })
          axios({
              method: 'Get',
              responseType: 'json',
              url: '/Getarea',
          }).then(response => {
              this.areas = response.data
          });
      },
      BuscarSitio: function() {
          if (this.datositio.length >= 3) {
              this.input_width_form = document.getElementById("inputSitio").clientWidth;
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
      BuscarTecnologia: function() {
          if (this.data_tec_search.length >= 3) {
              this.input_width_form_tec = document.getElementById("input_tec").clientWidth;
              document.getElementById('list_tecologias').style.display = 'block';
              axios.get(`/search-technologie?tech=${this.data_tec_search}`).then((response) => {
                  this.data_tec = response.data
              });
          } else {
              this.data_tec = '';
              document.getElementById('list_tecologias').style.display = 'none';
          }
      },
      getFiles: function() {
          this.archivos = document.getElementById('filesupload').value;
          console.log(this.archivos);
      },
      selectdpop: function(id, nemSite, Nombre) {
          this.popid = id;
          document.getElementById('listPops').style.display = 'none';
          document.getElementById('popcheck').style.display = 'block';
          document.getElementById('popSearch').style.display = 'none';
          document.getElementById('errorPop').style.display = 'none';
          document.getElementById('error_tech').style.display = 'none';
          this.pops = '';
          this.site_info_select = nemSite + '-' + Nombre
          if (this.tec_id != '') {
              this.cambiar_tecnologia()
          }
      },
      selectTech: function(tec) {
          this.tec_id = tec.id
          document.getElementById('list_tecologias').style.display = 'none';
          document.getElementById('tec_search').style.display = 'none';
          document.getElementById('tec_select_value').style.display = 'block';
          document.getElementById('errorPop').style.display = 'none';
          document.getElementById('error_tech').style.display = 'none';
          this.tec_info_select = tec.nem_tech + '-' + tec.ran_device_name;
          $("#input_tec").val('')
          if (this.popid != '') {
              this.changePop()
          }
      },
      cambiar_tecnologia: function() {
          this.tec_id = ''
          this.data_tec_search = ''
          document.getElementById('tec_select_value').style.display = 'none';
          document.getElementById('tec_search').style.display = 'block';
          $("#tec_select_value").val('');
      },
      tecnica: function() {
          var idaea = document.getElementById('areas').value;
          if (this.motivoId == 4 && this.areaId == 1) {
              axios.get('/GetFilterTecnica').then((response) => {
                  this.tecnicas = response.data;
              })
          } else {
              if (this.motivoId == 4 && this.areaId == 2) {
                  axios.get('/GetFilterTecnicaClima').then((response) => {
                      this.tecnicas = response.data;
                  })
              } else {
                  axios({
                      method: 'Get',
                      responseType: 'json',
                      url: '/GetTecnica/' + idaea,
                  }).then(response => {
                      this.tecnicas = response.data
                  });
              }
          }
      },
      equipo: function() {
          var idtecnica = document.getElementById('tecnicas').value;
          axios({
              method: 'Get',
              responseType: 'json',
              url: '/GetEquipo/' + idtecnica,
          }).then(response => {
              this.equipos = response.data
          });
      },
      changePop: function() {
          var selectPop = document.getElementById('popcheck');
          var searchPop = document.getElementById('popSearch');
          searchPop.style.display = '';
          selectPop.style.display = 'none';
          this.popId = '';
          this.popid = '';
          this.dataPop = '';
          this.datositio = '';
          $('#inputSitio').val('');
      },
      tecnica: function() {
          var idaea = document.getElementById('areas').value;
          if (this.motivoId == 4 && this.areaId == 1) {
              axios.get('/GetFilterTecnica').then((response) => {
                  this.tecnicas = response.data;
              })
          } else {
              if (this.motivoId == 4 && this.areaId == 2) {
                  axios.get('/GetFilterTecnicaClima').then((response) => {
                      this.tecnicas = response.data;
                  })
              } else {
                  axios({
                      method: 'Get',
                      responseType: 'json',
                      url: '/GetTecnica/' + idaea,
                  }).then(response => {
                      this.tecnicas = response.data
                  });
              }
          }
      },
      equipo: function() {
          var idtecnica = document.getElementById('tecnicas').value;
          axios({
              method: 'Get',
              responseType: 'json',
              url: '/GetEquipo/' + idtecnica,
          }).then(response => {
              this.equipos = response.data
          });
      },
         

    }


    }
</script>
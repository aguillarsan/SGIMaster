<template>
    <div>
        <form>
            <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="createSolicitudOym" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" style="max-width: 1200px;">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header " style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                            <h5 class="modal-title" style="color: white">
                                Formulario solicitud
                            </h5>
                            <button @click.prevent="CleanAllForm()" aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row mt-4">
                                <div class="col-12 col-lg-8 offset-lg-2">
                                    <div class="wizard-steps">
                                        <div class="wizard-step " v-bind:class="step == 1 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-tools">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label barlow bold">
                                                Datos del Trabajo
                                            </div>
                                        </div>
                                        <div class="wizard-step" v-bind:class="step == 2 ?'wizard-step-active':''">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-globe-americas">
                                                </i>
                                            </div>
                                            <div class="wizard-step-label barlow bold">
                                                Sitio
                                            </div>
                                        </div>
                                        <div class="wizard-step" v-bind:class="step == 3 ?'wizard-step-active':''">
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
                                <div class="wizard-pane" id="wizard1">
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Área de trabajo *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <select @change.prevent="DeleteErrorSgcform" class="form-control select barlow regular" name="AreaTrabajo" v-model="AreaTrabajoId">
                                                <option v-bind:value="trabajo.id" v-for="trabajo in data_form.area">
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
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Tipo de trabajo *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <select @change.prevent="DeleteErrorSgcform" class="form-control select barlow regular" name="TipoTrabajo" v-model="TipoTrabajoId">
                                                <option v-bind:value="Tipo_trabajo.id" v-for="Tipo_trabajo in data_form.tipoTrabajo">
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
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Fecha ejecución *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <input @change.prevent="DeleteErrorSgcform" class="form-control " id="" style="color:#999999" type="date" v-model="FechaEjecución">
                                                <div id="errorFechaEjecución" style="display: none">
                                                    <p style="color: red">
                                                        Favor indicar la fecha de ejecuión
                                                    </p>
                                                </div>
                                            </input>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Detalle del trabajo *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <textarea @keyup.prevent="DeleteErrorSgcform" class="form-control" style="height: 150px;" v-model="detalle">
                                            </textarea>
                                            <div id="errorDetalletrabajo" style="display: none">
                                                <p style="color: red">
                                                    Favor rellenar el campo
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-pane" id="wizard2" style="display: none;min-height: 300px">
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Seleccione una opción *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input @click="selectoptionSite(1)" class="selectgroup-input" name="value" type="radio" value="50">
                                                        <span class="selectgroup-button barlow semi-bold">
                                                            Ingreso normal
                                                        </span>
                                                    </input>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input @click="selectoptionSite(2)" class="selectgroup-input" name="value" type="radio" value="100">
                                                        <span class="selectgroup-button barlow semi-bold">
                                                            Ingreso manual
                                                        </span>
                                                    </input>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input @click="selectoptionSite(3)" class="selectgroup-input" name="value" type="radio" value="150">
                                                        <span class="selectgroup-button barlow semi-bold">
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
                                    <div id="ingresoNormal" style="display: none">
                                        <div class="form-group row align-items-center">
                                            <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                                Sitio*
                                            </label>
                                            <div class="col-lg-4 col-md-6">
                                                <div id="select_site_sgc" style="display: none">
                                                    <div class="input-group">
                                                        <input class="form-control" disabled="true" name="" style="background-color:#1e5e98;color:white;" type="" v-bind:value="site_info_select"/>
                                                        <div class="input-group-append">
                                                            <div @click.prevent="changePop()" class="input-group-text " style="cursor: pointer  ">
                                                                <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="site_search_sgc">
                                                    <div class="input-group">
                                                        <input class="form-control " id="input_site_search" placeholder="Buscar Sitio" type="text" v-model="datositio" v-on:keyup="BuscarSitio"/>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-search">
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="listPops" style="display:none;">
                                                    <div class="s_l">
                                                        <div :style="'width:'+input_width_form+'px'+';'" class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                                            <div v-for="pop in pops">
                                                                <a @click.prevent="select_site_sgc_fun(pop)" href="" id="selectpopvalue" style="color:black">
                                                                    {{pop.nem_site}} {{pop.nombre}}
                                                                    <hr style="margin-top: -1px;"/>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="errorPop" style="display: none">
                                                    <p style="color: red">
                                                        Favor Seleccionar el sitio
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ingresoManual" style="display: none">
                                        <div class="form-group row align-items-center">
                                            <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                                Nemonico movil *
                                            </label>
                                            <div class="col-lg-4 col-md-6">
                                                <input @keyup.prevent="DeleteErrorSgcform" class="form-control" type="text" v-model="nemonico_movil">
                                                    <div id="errorNemonico" style="display: none">
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
                                                <input @keyup.prevent="DeleteErrorSgcform" class="form-control" type="text" v-model="nombre_sitio">
                                                    <div id="errorNombreSitio" style="display: none">
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
                                                <input @keyup.prevent="DeleteErrorSgcform" class="form-control" type="text" v-model="direccion_sitio">
                                                    <div id="errorDireccion" style="display: none">
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
                                                <select @change.prevent="searchComuna()" class="form-control select barlow regular" v-model="region_ingreso_manual">
                                                    <option v-bind:value="region.id" v-for="region in regiones">
                                                        {{region.nombre_region}}
                                                    </option>
                                                </select>
                                                <div id="errorRegion" style="display: none">
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
                                                <select @change.prevent="DeleteErrorSgcform()" class="form-control select barlow regular" v-model="comuna_ingreso_manual">
                                                    <option v-bind:value="comuna.id" v-for="comuna in comunas">
                                                        {{comuna.nombre_comuna}}
                                                    </option>
                                                </select>
                                                <div id="errorComuna" style="display: none">
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
                                                <select @change.prevent="DeleteErrorSgcform()" class="form-control select barlow regular" v-model="categoria_id">
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
                                                <div id="errorCategoria" style="display: none">
                                                    <p style="color: red">
                                                        Favor rellenar el campo
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="SinSitio" style="display: none">
                                        <div class="form-group row align-items-center">
                                            <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                                Región  *
                                            </label>
                                            <div class="col-lg-4 col-md-6">
                                                <select @change.prevent="DeleteErrorSgcform()" class="form-control select barlow regular" v-model="region_sin_sitio">
                                                    <option v-bind:value="region.id" v-for="region in regiones">
                                                        {{region.nombre_region}}
                                                    </option>
                                                </select>
                                                <div id="errorRegion2" style="display: none">
                                                    <p style="color: red">
                                                        Favor rellenar el campo
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-pane" id="wizard3" style="display: none">
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Proveedor  *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <div id="search_proveedor">
                                                <div class="input-group">
                                                    <input class="form-control " id="SearchproveedorDontDisplay" name="Proveedor" placeholder="Buscar proveedor" type="text" v-model="Buscarproveedor" v-on:keyup="BuscarProveedor"/>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-search">
                                                            </i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="SelectProveedor" style="display: none">
                                                <div class="input-group">
                                                    <input class="form-control" disabled="true" name="" style="background-color:#1e5e98;color:white;" type="" v-bind:value="proveedor_info_select"/>
                                                    <div class="input-group-append">
                                                        <div @click.prevent="searchNewProveedor()" class="input-group-text " style="cursor: pointer  ">
                                                            <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                                            </i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input style="display: none" type="text" v-bind:value="idproveedor"/>
                                            <div id="errorProveedor" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar proveedor
                                                </p>
                                            </div>
                                            <div class="s_l" id="listProveedor" style="display: none">
                                                <div class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                                    <div v-for="proveedor in Proveedores">
                                                        <a @click.prevent="SelectProveedor(proveedor.id,proveedor.PROVEEDOR)" class="changeColor" href="" id="selectProveedorvalue" style="color: black">
                                                            {{proveedor.PROVEEDOR.toLowerCase()}} - {{proveedor.RUT_PROVEEDOR}}
                                                            <hr style="margin-top: -1px;"/>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Tipo boleta  *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <select @change.prevent="DeleteErrorSgcform" class="form-control select barlow regular" v-model="TipoBoletaId">
                                                <option v-bind:value="Tipo_boleta.id" v-for="Tipo_boleta in data_form.boleta">
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
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Nro boleta
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <input @change.prevent="val_data" class="form-control " id="" style="color:#999999" type="text" v-model="NroBoleta">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Tipo moneda *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <select @change.prevent="DeleteErrorSgcform" class="form-control select barlow regular" v-model="TipoMonedaId">
                                                <option v-bind:value="Tipo_moneda.id" v-for="  Tipo_moneda in data_form.modena">
                                                    {{Tipo_moneda.moneda}}
                                                </option>
                                            </select>
                                            <div id="errorTipoMoneda" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar tipo de moneda
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Formato de pago *
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <select @change.prevent="DeleteErrorSetContingencia" class="form-control select barlow regular" v-model="TipoGastoid">
                                                <option v-bind:value="Tipo_gasto.id" v-for="Tipo_gasto in data_form.gastos">
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
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Tipo contingencia*
                                        </label>
                                        <div class="col-lg-4 col-md-6">
                                            <select @change.prevent="DeleteErrorSgcform" class="form-control select barlow regular" disabled="true" id="tipoGasto" v-model="ContingenciaId">
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
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Costos activos
                                        </label>
                                        <div class="col-lg-4 col-md-6" id="activo" style="display: none">
                                            <currency-input class="form-control " currency="USD" locale="de" v-model="activo">
                                            </currency-input>
                                            <div id="errorCosto1" style="display: none">
                                                <p style="color: red">
                                                    Favor indicar un tipo de costo
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left barlow semi-bold">
                                            Costos servicios
                                        </label>
                                        <div class="col-lg-4 col-md-6" id="servicio" style="display: none">
                                            <currency-input class="form-control " currency="USD" locale="de" v-model="servicio">
                                            </currency-input>
                                            <div id="errorCosto2" style="display: none">
                                                <p style="color: red">
                                                    Favor indicar un tipo de costo
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-pane" id="wizard4" style="display: none">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Cotizaciones
                                                </label>
                                                <div>
                                                    <input @change.prevent="MostrarDatosArchivosCotizacion" class="form-control" id="cotizaciones" multiple="" name="TipeFile1[]" ref="cotizaciones" type="file"/>
                                                </div>
                                                <div class="file-listing " v-for="(file, key) in cotizaciones">
                                                    <div>
                                                        <div style="margin-top: 8px;">
                                                        </div>
                                                        <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                            {{ file.name }}
                                                            <a href="#" v-on:click="removeFileCotizacion( key )">
                                                                <i class="fas fa-times-circle boxBounce" style="color:white">
                                                                </i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Informe  Final
                                                </label>
                                                <div>
                                                    <input @change.prevent="MostrarDatosinformeFinal" class="form-control" id="informeFinal" multiple="" ref="informeFinal" type="file"/>
                                                </div>
                                                <div class="file-listing " v-for="(file, key) in informeFinal">
                                                    <div>
                                                        <div style="margin-top: 8px;">
                                                        </div>
                                                        <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                            {{ file.name }}
                                                            <a href="#" v-on:click="removeFileInformeFinal( key )">
                                                                <i class="fas fa-times-circle boxBounce" style="color:white">
                                                                </i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Guía de despacho
                                                </label>
                                                <div>
                                                    <input @change.prevent="MostrarDatosGuiaDespacho" class="form-control" id="guiaDespacho" multiple="" ref="guiaDespacho" type="file"/>
                                                </div>
                                                <div class="file-listing " v-for="(file, key) in guiaDespacho">
                                                    <div>
                                                        <div style="margin-top: 8px;">
                                                        </div>
                                                        <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                            {{ file.name }}
                                                            <a href="#" v-on:click="removeFileGuiaDespacho( key )">
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
                                                    Carta adjudicación
                                                </label>
                                                <div>
                                                    <input @change.prevent="MostrarDatosArchivosCaj" class="form-control" id="cartaAdjudicaciones" multiple="" ref="cartaAdjudicaciones" type="file"/>
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
                                                    <input @change.prevent="MostrarDatosArchivosLpu" class="form-control" id="lpus" multiple="" ref="lpus" type="file"/>
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
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Documento PXQ
                                                </label>
                                                <div>
                                                    <input @change.prevent="MostrarDatosArchivosPxq" class="form-control" id="pxqs" multiple="" ref="pxqs" type="file"/>
                                                </div>
                                                <div class="file-listing " v-for="(file, key) in pxqs">
                                                    <div>
                                                        <div style="margin-top: 8px;">
                                                        </div>
                                                        <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                            {{ file.name }}
                                                            <a href="#" v-on:click="removePxq( key )">
                                                                <i class="fas fa-times-circle boxBounce" style="color:white">
                                                                </i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="barlow semi-bold">
                                                    Otros
                                                </label>
                                                <div>
                                                    <input @change.prevent="MostrarDatosArchivosOtros" class="form-control" id="otros" multiple="" ref="otros" type="file"/>
                                                </div>
                                                <div class="file-listing " v-for="(file, key) in otros">
                                                    <div>
                                                        <div style="margin-top: 8px;">
                                                        </div>
                                                        <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                                            {{ file.name }}
                                                            <a href="#" v-on:click="removeOtros( key )">
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
                            </form>
                            <div class="col-12 col-md-12 col-sm-12" v-if="load_data_form == 1 ">
                                <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                    <div class="card-body">
                                        <div class="empty-state" data-height="400">
                                            <div class="d-flex justify-content-center">
                                                <div class="spinner-border text-primary" role="status" style="width: 8rem;height: 8rem;color: #007bff!important;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6 col-12" id="progressBarOymForm" style="display: none">
                            <div class="card-title">
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
                        <div class="modal-footer " style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29);">
                            <a @click.prevent="BackStepOne()" class="btn btn-icon icon-left btn-secondary" href="#" id="backStep1" style="display: none;box-shadow: 0 0px 0px;color: #191919">
                                <i class="fas fa-arrow-left">
                                </i>
                                Atrás
                            </a>
                            <a @click.prevent="BackStepTwo()" class="btn btn-icon icon-left btn-secondary" href="#" id="backStep2" style="display: none;box-shadow: 0 0px 0px;color: #191919">
                                <i class="fas fa-arrow-left">
                                </i>
                                Atrás
                            </a>
                            <a @click.prevent="BackStepThree()" class="btn btn-icon icon-left btn-secondary" href="#" id="backStep3" style="display: none; box-shadow: 0 0px 0px;color: #191919">
                                <i class="fas fa-arrow-left">
                                </i>
                                Atrás
                            </a>
                            <a @click.prevent="ValidateFormSgcStepOne()" class="btn btn-icon icon-right btn-secondary" href="#" id="btnNextStepOne" style="box-shadow: 0 0px 0px;color: #191919">
                                Siguiente
                                <i class="fas fa-arrow-right">
                                </i>
                            </a>
                            <a @click.prevent="ValidateFormSgcStepTwo()" class="btn btn-icon icon-right btn-secondary" href="#" id="btnNextStepTwo" style="display: none;box-shadow: 0 0px 0px;color: #191919">
                                Siguiente
                                <i class="fas fa-arrow-right">
                                </i>
                            </a>
                            <a @click.prevent="ValidateFormSgcStepThree()" class="btn btn-icon icon-right btn-secondary" href="#" id="btnNextStepThree" style="display: none;box-shadow: 0 0px 0px;color: #191919">
                                Siguiente
                                <i class="fas fa-arrow-right">
                                </i>
                            </a>
                            <a @click.prevent="CreateSolicitud()" class="btn btn-icon icon-right btn-secondary" href="#" id="btnFinSolicitud" style="display: none;box-shadow: 0 0px 0px;color: #191919">
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
    props: [ 'idticket' ],
    data(){
        return{
            load_data_form:1,
            bitacoras:[],
            datoslog:{'descripcion':''},
            nombre:'',
            area_trabajos:[],
            Tipo_trabajos:[],
            Tipo_boletas:[],
            Tipo_gastos:[],
            Tipo_monedas:[],
            TotalCotizacionesTicekt:'',
            AreaTrabajoId:'',
            TipoTrabajoId:'',
            FechaEjecución:'',
            TipoBoletaId:'',
            TipoMonedaId:'',
            TipoGastoid:'',
            activo:0,
            servicio:0,
            idproveedor:'',
            NombreProveedorSelect:'',
            Buscarproveedor:'',
            ContingenciaId:'',
            Tipo_contingencias:[],
            declaracionCpu: '',
            descripcionNecesidades: '',
            NombreProyecto: '',
            NombreCotizaciones: [],
            NombreInformeFinal: [],
            NombreCartaAdjudicacion: [],
            NombreOtros: [],
            NombreGuiaDespacho: [],
            NecesidadId: '',
            NombrePxq:[],
            NombreLpu:[],
            Proveedores:[],
            cotizaciones:[],
            cartaAdjudicaciones:[],
            lpus:[],
            pxqs:[],
            otros:[],
            NroBoleta:'',
            NcotizacionCpu:'',
            descripcionProveedorCpu:'',
            nombreMensajeTrabajo:'',
            eworkn:'',
            step:1,
            detalle:'',
            datositio:'',
            pops:[],
            popId:'',
            nemonico_movil:'',
            nombre_sitio:'',
            direccion_sitio:'',
            region_ingreso_manual:'',
            comuna_ingreso_manual:'',
            categoria_id:'',
            region_sin_sitio:'',
            regiones:[],
            comunas:[],
            optionSite:0,
            informeFinal:[],
            guiaDespacho:[],
            FilesVerification:0,
            porcentaje:{
                type:Number,
                default:0
            },
            data_form:'',
            input_width_form:0,
            site_info_select:'',
            proveedor_info_select:'',
            valor_limite_cotizacion:0


        }
    },

    created:function(){

     this.GetDataSgcForm()
       

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.form', function() {
            self.GetDataSgcForm(); // ejecutas el metodo que desees 
         
        });

    },
    computed:{
        getProgress(){
            return Math.round(this.porcentaje)+'%'
        }
    },

    methods:{
        formatPrice: function(v) {
        let val = (v / 1).toFixed(2).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    },
    ValidateFormSgcStepOne: function() {
        if (this.AreaTrabajoId == '') {
            document.getElementById('errorAreaTrabajo').style.display = 'block'
        }
        if (this.TipoTrabajoId == '') {
            document.getElementById('errorTipoTrabajo').style.display = 'block'
        }
        if (this.FechaEjecución == '') {
            document.getElementById('errorFechaEjecución').style.display = 'block'
        }
        if (this.detalle == '') {
            document.getElementById('errorDetalletrabajo').style.display = 'block'
        }
        if (this.AreaTrabajoId != '' && this.TipoTrabajoId != '' && this.FechaEjecución != '' && this.detalle != '') {
            document.getElementById('wizard1').style.display = 'none'
            document.getElementById('wizard2').style.display = 'block'
            document.getElementById('backStep1').style.display = 'block'
            document.getElementById('btnNextStepOne').style.display = 'none'
            document.getElementById('btnNextStepTwo').style.display = 'block'
            this.step = 2
        }
    },
    CleanAllForm: function() {
        this.cleanIngresoManual()
        this.cleanSinSitio()
        this.changePop()
        this.searchNewProveedor()
        this.AreaTrabajoId = ''
        this.TipoTrabajoId = ''
        this.FechaEjecución = ''
        this.detalle = ''
        this.TipoBoletaId = ''
        this.NroBoleta = ''
        this.TipoMonedaId = ''
        this.TipoGastoid = ''
        this.ContingenciaId = ''
        this.activo = 0
        this.servicio = 0
        this.step = 1
        this.cotizaciones = []
        this.informeFinal = []
        this.guiaDespacho = []
        this.cartaAdjudicaciones = []
        this.lpus = []
        this.pxqs = []
        this.otros = []
        this.datositio = ''
        this.optionSite = 0
        $("#SearchproveedorDontDisplay").val('')
        $("#inputSitio").val('')
        $("#popName").val('')
        $("#SearchproveedorDontDisplay").val('')
        $("#cotizaciones").val('')
        $("#informeFinal").val('')
        $("#guiaDespacho").val('')
        $("#cartaAdjudicaciones").val('')
        $("#lpus").val('')
        $("#pxqs").val('')
        $("#otros").val('')
        document.getElementById('activo').style.display = 'none'
        document.getElementById('servicio').style.display = 'none'
        document.getElementById('btnFinSolicitud').style.display = 'none'
        document.getElementById('backStep3').style.display = 'none'
        document.getElementById('backStep2').style.display = 'none'
        document.getElementById('backStep1').style.display = 'none'
        document.getElementById('wizard4').style.display = 'none'
        document.getElementById('wizard2').style.display = 'none'
        document.getElementById('wizard3').style.display = 'none'
        document.getElementById('progressBarOymForm').style.display = 'none'
        document.getElementById("btnFinSolicitud").disabled = false
        document.getElementById('ingresoNormal').style.display = 'none'
        document.getElementById('ingresoManual').style.display = 'none'
        document.getElementById('SinSitio').style.display = 'none'
        this.BackStepOne()
    },
    ValidateFormSgcStepTwo: function() {
        if (this.optionSite == 0) {
            document.getElementById('errorSelectopcion').style.display = 'block'
        } else {
            if (this.optionSite == 1) {
                if (this.popId == '') {
                    document.getElementById('errorPop').style.display = 'block'
                } else {
                    if (this.popId != '') {
                        document.getElementById('wizard2').style.display = 'none'
                        document.getElementById('wizard3').style.display = 'block'
                        document.getElementById('backStep2').style.display = 'block'
                        document.getElementById('backStep1').style.display = 'none'
                        document.getElementById('btnNextStepThree').style.display = 'block'
                        document.getElementById('btnNextStepTwo').style.display = 'none'
                        this.step = 3
                    }
                }
            } else {
                if (this.optionSite == 2) {
                    if (this.nemonico_movil == '' && this.nombre_sitio == '' && this.direccion_sitio == '' && this.region_ingreso_manual == '' && this.comuna_ingreso_manual == '' && this.categoria_id == '') {
                        document.getElementById('errorNemonico').style.display = 'block'
                        document.getElementById('errorNombreSitio').style.display = 'block'
                        document.getElementById('errorDireccion').style.display = 'block'
                        document.getElementById('errorRegion').style.display = 'block'
                        document.getElementById('errorComuna').style.display = 'block'
                        document.getElementById('errorCategoria').style.display = 'block'
                    } else {
                        if (this.nemonico_movil != '' && this.nombre_sitio != '' && this.direccion_sitio != '' && this.region_ingreso_manual != '' && this.comuna_ingreso_manual != '' && this.categoria_id != '') {
                            document.getElementById('wizard2').style.display = 'none'
                            document.getElementById('wizard3').style.display = 'block'
                            document.getElementById('backStep2').style.display = 'block'
                            document.getElementById('backStep1').style.display = 'none'
                            document.getElementById('btnNextStepThree').style.display = 'block'
                            document.getElementById('btnNextStepTwo').style.display = 'none'
                            this.step = 3
                        }
                    }
                } else {
                    if (this.optionSite == 3) {
                        if (this.region_sin_sitio == '') {
                            document.getElementById('errorRegion2').style.display = 'block'
                        } else {
                            if (this.region_sin_sitio != '') {
                                document.getElementById('errorRegion2').style.display = 'none'
                                document.getElementById('wizard2').style.display = 'none'
                                document.getElementById('wizard3').style.display = 'block'
                                document.getElementById('backStep2').style.display = 'block'
                                document.getElementById('backStep1').style.display = 'none'
                                document.getElementById('btnNextStepThree').style.display = 'block'
                                document.getElementById('btnNextStepTwo').style.display = 'none'
                                this.step = 3
                            }
                        }
                    }
                }
            }
        }
    },
    ValidateFormSgcStepThree: function() {
        this.TransformDinnerDeleErrorActivo()
        this.TransformDinnerDeleErrorServicio()
        if (this.idproveedor == '') {
            document.getElementById('errorProveedor').style.display = 'block'
        }
        if (this.TipoBoletaId == '') {
            document.getElementById('errorTipoBoleta').style.display = 'block'
        }
        if (this.TipoMonedaId == '') {
            document.getElementById('errorTipoMoneda').style.display = 'block'
        }
        if (this.TipoGastoid == '') {
            document.getElementById('errorTipoGasto').style.display = 'block'
        }
        if (this.TipoGastoid == 4) {
            if (this.ContingenciaId == '') {
                document.getElementById('errorTipoContingencia').style.display = 'block'
            }
        }
        if (this.activo == '' && this.servicio == '') {
            document.getElementById('errorCosto1').style.display = 'block'
            document.getElementById('errorCosto2').style.display = 'block'
        }
        if (this.TipoGastoid == 4) {
            if (this.idproveedor != '' && this.TipoBoletaId != '' && this.TipoMonedaId != '' && this.ContingenciaId != '') {
                if (this.activo != 0 || this.servicio != 0) {
                    document.getElementById('wizard3').style.display = 'none'
                    document.getElementById('wizard4').style.display = 'block'
                    document.getElementById('backStep2').style.display = 'none'
                    document.getElementById('btnNextStepThree').style.display = 'none'
                    document.getElementById('backStep3').style.display = 'block'
                    document.getElementById('btnFinSolicitud').style.display = 'block'
                    this.step = 4
                }
            }
        } else {
            if (this.idproveedor != '' && this.TipoBoletaId != '' && this.TipoMonedaId != '' && this.TipoGastoid != '') {
                if (this.activo != 0 || this.servicio != 0) {
                    document.getElementById('wizard3').style.display = 'none'
                    document.getElementById('wizard4').style.display = 'block'
                    document.getElementById('backStep2').style.display = 'none'
                    document.getElementById('btnNextStepThree').style.display = 'none'
                    document.getElementById('backStep3').style.display = 'block'
                    document.getElementById('btnFinSolicitud').style.display = 'block'
                    this.step = 4
                }
            }
        }
    },
    CreateSolicitud: function() {
        this.GetFilesUpload()
        if (this.FilesVerification == 0) {
            console.log('No paso')
        } else {
            if (this.FilesVerification == 1) {
                console.log('paso')
                let formData = new FormData();
                formData.append('area_id', this.AreaTrabajoId)
                formData.append('tipo_trabajo_id', this.TipoTrabajoId)
                formData.append('fecha_ejecucion', this.FechaEjecución)
                formData.append('detalle', this.detalle)
                formData.append('site_id', this.popId)
                formData.append('nemonico_movil', this.nemonico_movil)
                formData.append('nombre_sitio', this.nombre_sitio)
                formData.append('direccion_sitio', this.direccion_sitio)
                formData.append('region_ingreso_manual', this.region_ingreso_manual)
                formData.append('comuna_ingreso_manual', this.comuna_ingreso_manual)
                formData.append('categoria_id', this.categoria_id)
                formData.append('region_sin_sitio', this.region_sin_sitio)
                formData.append('proveedor_id', this.idproveedor)
                formData.append('boleta_id', this.TipoBoletaId)
                formData.append('nro_boleta', this.NroBoleta)
                formData.append('tipo_moneda_id', this.TipoMonedaId)
                formData.append('tipo_gasto_id', this.TipoGastoid)
                formData.append('contingencia_id', this.ContingenciaId)
                if (this.activo != 0) {
                    formData.append('Activo', this.activo)
                } else {
                    if (this.activo == 0) {
                        formData.append('Activo', null)
                    }
                }
                if (this.Servicio != 0) {
                    formData.append('Servicio', this.servicio)
                } else {
                    if (this.Servicio == 0) {
                        formData.append('Servicio', null)
                    }
                }
                for (var i = 0; i < this.cotizaciones.length; i++) {
                    let cotizacion = this.cotizaciones[i];
                    formData.append('cotizacion[' + i + ']', cotizacion);
                }
                for (var i = 0; i < this.informeFinal.length; i++) {
                    let informefinal = this.informeFinal[i];
                    formData.append('InfFinal[' + i + ']', informefinal);
                }
                for (var i = 0; i < this.guiaDespacho.length; i++) {
                    let guiadespacho = this.guiaDespacho[i];
                    formData.append('guiaDespacho[' + i + ']', guiadespacho);
                }
                for (var i = 0; i < this.cartaAdjudicaciones.length; i++) {
                    let cartaAdjudicacion = this.cartaAdjudicaciones[i];
                    formData.append('CartaAdjudicación[' + i + ']', cartaAdjudicacion);
                }
                for (var i = 0; i < this.lpus.length; i++) {
                    let lpu = this.lpus[i];
                    formData.append('lpufile[' + i + ']', lpu);
                }
                for (var i = 0; i < this.pxqs.length; i++) {
                    let pxq = this.pxqs[i];
                    formData.append('pxq[' + i + ']', pxq);
                }
                for (var i = 0; i < this.otros.length; i++) {
                    let otro = this.otros[i];
                    formData.append('otro[' + i + ']', otro);
                }
                document.getElementById("progressBarOymForm").style.display = 'block'
                document.getElementById("btnFinSolicitud").disabled = true
                axios.post('/CreateRequestSgc', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: e => {
                        if (e.lengthComputable) {
                            this.porcentaje = (e.loaded / e.total) * 100
                        }
                    }
                }).then((response) => {
                    $('#createSolicitudOym').modal('hide');
                    this.CleanAllForm()
                    let mensaje = response.data
                    this.successAlert(mensaje)
                    EventBus.$emit('sgc.RefreshTable')
                })
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
    BackStepOne: function() {
        document.getElementById('wizard1').style.display = 'block'
        document.getElementById('wizard2').style.display = 'none'
        document.getElementById('backStep1').style.display = 'none'
        document.getElementById('btnNextStepOne').style.display = 'block'
        document.getElementById('btnNextStepTwo').style.display = 'none'
        this.step = 1
    },
    BackStepTwo: function() {
        document.getElementById('wizard2').style.display = 'block'
        document.getElementById('wizard3').style.display = 'none'
        document.getElementById('backStep1').style.display = 'block'
        document.getElementById('backStep2').style.display = 'none'
        document.getElementById('btnNextStepThree').style.display = 'none'
        document.getElementById('btnNextStepTwo').style.display = 'block'
        this.step = 2
    },
    BackStepThree: function() {
        document.getElementById('wizard4').style.display = 'none'
        document.getElementById('wizard3').style.display = 'block'
        document.getElementById('backStep3').style.display = 'none'
        document.getElementById('btnFinSolicitud').style.display = 'none'
        document.getElementById('backStep2').style.display = 'block'
        document.getElementById('btnNextStepThree').style.display = 'block'
        this.step = 3
    },
    selectoptionSite: function(option) {
        if (option == 1) {
            document.getElementById('ingresoNormal').style.display = 'block'
            document.getElementById('ingresoManual').style.display = 'none'
            document.getElementById('SinSitio').style.display = 'none'
            this.cleanIngresoManual()
            this.cleanSinSitio()
            this.optionSite = 1
            document.getElementById('errorSelectopcion').style.display = 'none'
        } else {
            if (option == 2) {
                document.getElementById('ingresoManual').style.display = 'block'
                document.getElementById('ingresoNormal').style.display = 'none'
                document.getElementById('SinSitio').style.display = 'none'
                this.changePop()
                this.cleanSinSitio()
                axios.get('/region').then((response) => {
                    this.regiones = response.data
                })
                this.optionSite = 2
                document.getElementById('errorSelectopcion').style.display = 'none'
            } else {
                if (option == 3) {
                    document.getElementById('ingresoManual').style.display = 'none'
                    document.getElementById('ingresoNormal').style.display = 'none'
                    document.getElementById('SinSitio').style.display = 'block'
                    this.cleanIngresoManual()
                    this.changePop()
                    axios.get('/region').then((response) => {
                        this.regiones = response.data
                    })
                    this.optionSite = 3
                    document.getElementById('errorSelectopcion').style.display = 'none'
                }
            }
        }
    },
    searchComuna: function() {
        axios.get('/searchComua/' + this.region_ingreso_manual).then((response) => {
            this.comunas = response.data
        })
        document.getElementById('errorRegion').style.display = 'none'
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
    BuscarSitio: function() {
        if (this.datositio.length >= 3) {
            this.input_width_form = document.getElementById("input_site_search").clientWidth;
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
    select_site_sgc_fun: function(pop) {
        document.getElementById('select_site_sgc').style.display = 'block';
        document.getElementById('site_search_sgc').style.display = 'none';
        document.getElementById('listPops').style.display = 'none';
        document.getElementById('errorPop').style.display = 'none';
        this.pops = '';
        this.site_info_select = pop.nem_site + '-' + pop.nombre;
        this.popId = pop.id;
    },
    changePop: function() {
        document.getElementById('select_site_sgc').style.display = 'none';
        document.getElementById('site_search_sgc').style.display = 'block';
        this.site_info_select = '';
        this.popId = '';
        this.datositio = '';
    },
    DeleteErrorSetContingencia: function() {
        if (this.TipoGastoid != '') {
            var errorTipoGasto = document.getElementById('errorTipoGasto');
            errorTipoGasto.style.display = 'none'
            if (this.TipoGastoid == 4) {
                var tipoGasto = document.getElementById('tipoGasto');
                tipoGasto.disabled = false;
                axios.get('/TipoContingencia').then((response) => {
                    this.Tipo_contingencias = response.data;
                })
                this.$swal({
                    type: 'warning',
                    title: 'Debe seleccionar el tipo de contingencia',
                    showCloseButton: true,
                });
            } else {
                this.Tipo_contingencias = '';
                var tipoGasto = document.getElementById('tipoGasto');
                tipoGasto.disabled = true;
                var errorTipoContingencia = document.getElementById('errorTipoContingencia');
                errorTipoContingencia.style.display = 'none'
                this.ContingenciaId = ''
            }
        }
    },
    ShowModalCpuCloseThis: function() {
        $('#ModalSgc').modal('hide');
        $('#ModalSgcCpu').modal('show');
        $("#ProveedorCPu").val(this.NombreProveedorSelect.toLowerCase());
    },
    GetDataSgcForm: function() {
        $('#createSolicitudOym').modal('show');
        axios.get('/dataFormSgcOym').then((response) => {
            this.data_form = response.data
        }).finally(() => this.load_data_form = 0)
        axios.get('/get-valor-limite').then(response => {
            this.valor_limite_cotizacion = response.data;
        })
       
    },
    ValidarDatosCpu: function() {
        if (this.NecesidadId == '') {
            document.getElementById('errorNecesidad').style.display = '';
        }
        if (this.NombreProyecto == '') {
            document.getElementById('errorProyecto').style.display = '';
        }
        if (this.descripcionNecesidades == '') {
            document.getElementById('errorDescripcionNecesidad').style.display = '';
        }
        if (this.declaracionCpu == '') {
            this.$swal({
                type: 'warning',
                title: 'Debe aceptar los terminos de la declaración',
                showCloseButton: true,
            });
        } else {
            this.cpu = 1;
        }
        if (this.NecesidadId != '' && this.NombreProyecto != '' && this.descripcionNecesidades != '' && this.declaracionCpu != '') {
            $('#ModalSgc').modal('show');
            $('#ModalSgcCpu').modal('hide');
        }
    },
    DeleteErrorSgcform: function() {
        if (this.nemonico_movil != '') {
            document.getElementById('errorNemonico').style.display = 'none'
        }
        if (this.nombre_sitio != '') {
            document.getElementById('errorNombreSitio').style.display = 'none'
        }
        if (this.direccion_sitio != '') {
            document.getElementById('errorDireccion').style.display = 'none'
        }
        if (this.comuna_ingreso_manual != '') {
            document.getElementById('errorComuna').style.display = 'none'
        }
        if (this.categoria_id != '') {
            document.getElementById('errorCategoria').style.display = 'none'
        }
        if (this.region_sin_sitio != '') {
            document.getElementById('errorRegion2').style.display = 'none'
        }
        if (this.ContingenciaId != '') {
            document.getElementById('errorTipoContingencia').style.display = 'none';
        }
        if (this.detalle != '') {
            document.getElementById('errorDetalletrabajo').style.display = 'none'
        }
        if (this.AreaTrabajoId != '') {
            document.getElementById('errorAreaTrabajo').style.display = 'none';
        }
        if (this.TipoTrabajoId != '') {
            document.getElementById('errorTipoTrabajo').style.display = 'none';
            if (this.TipoTrabajoId == 9) {
                this.nombreMensajeTrabajo = 'carta de adjudicación';
            }
            if (this.TipoTrabajoId == 11) {
                this.nombreMensajeTrabajo = 'LPU';
            }
        }
        if (this.FechaEjecución != '') {
            document.getElementById('errorFechaEjecución').style.display = 'none';
        }
        if (this.TipoBoletaId != '') {
            document.getElementById('errorTipoBoleta').style.display = 'none';
        }
        if (this.TipoMonedaId != '') {
            document.getElementById('errorTipoMoneda').style.display = 'none';
            document.getElementById('activo').style.display = 'block';
            document.getElementById('servicio').style.display = 'block';
            this.activo = 0;
            this.servicio = 0;
        }
    },
    DeleteErrorCpu: function() {
        if (this.NecesidadId != '') {
            document.getElementById('errorNecesidad').style.display = 'none';
        }
        if (this.descripcionNecesidades != '') {
            document.getElementById('errorDescripcionNecesidad').style.display = 'none';
        }
        if (this.NombreProyecto != '') {
            document.getElementById('errorProyecto').style.display = 'none';
        }
    },
    //COTIZACIONES
    MostrarDatosArchivosCotizacion: function(e) {
        let uploadedFiles = this.$refs.cotizaciones.files;
        for (var i = 0; i < uploadedFiles.length; i++) {
            this.cotizaciones.push(uploadedFiles[i]);
        }
        this.GetFilesUpload()
    },
    MostrarDatosinformeFinal: function(e) {
        let uploadedFiles = this.$refs.informeFinal.files;
        for (var i = 0; i < uploadedFiles.length; i++) {
            this.informeFinal.push(uploadedFiles[i]);
        }
    },
    MostrarDatosGuiaDespacho: function(e) {
        let uploadedFiles = this.$refs.guiaDespacho.files;
        for (var i = 0; i < uploadedFiles.length; i++) {
            this.guiaDespacho.push(uploadedFiles[i]);
        }
    },
    removeFileGuiaDespacho(key) {
        this.guiaDespacho.splice(key, 1);
    },
    removeFileInformeFinal(key) {
        this.informeFinal.splice(key, 1);
    },
    removeFileCotizacion(key) {
        this.cotizaciones.splice(key, 1);
    },
    ////////////////////////////////////////////
    //INFORME  FINAL FILES
    MostrarDatosArchivosInf: function(e) {
        let uploadedFiles = this.$refs.informefinales.files;
        for (var i = 0; i < uploadedFiles.length; i++) {
            this.informefinales.push(uploadedFiles[i]);
        }
    },
    removeFileinformefinal(key) {
        this.informefinales.splice(key, 1);
    },
    ////////////////////////////////////////////
    //INFORME  GUIA DESPACHO FILES
    MostrarDatosArchivosGpd: function(e) {
        let uploadedFiles = this.$refs.guiadespachos.files;
        for (var i = 0; i < uploadedFiles.length; i++) {
            this.guiadespachos.push(uploadedFiles[i]);
        }
    },
    ////////////////////////////////////////////
    //INFORME  GUIA DESPACHO FILES
    MostrarDatosArchivosCaj: function(e) {
        let uploadedFiles = this.$refs.cartaAdjudicaciones.files;
        for (var i = 0; i < uploadedFiles.length; i++) {
            this.cartaAdjudicaciones.push(uploadedFiles[i]);
        }
        this.GetFilesUpload()
    },
    removeAdjudicación(key) {
        this.cartaAdjudicaciones.splice(key, 1);
    },
    ////////////////////////////////////////////
    /////////// LPU
    MostrarDatosArchivosLpu: function(e) {
        let uploadedFiles = this.$refs.lpus.files;
        for (var i = 0; i < uploadedFiles.length; i++) {
            this.lpus.push(uploadedFiles[i]);
        }
        this.GetFilesUpload()
    },
    removeLpu(key) {
        this.lpus.splice(key, 1);
    },
    ////////////////////////////////////////////
    /////////// PQX
    MostrarDatosArchivosPxq: function(e) {
        let uploadedFiles = this.$refs.pxqs.files;
        for (var i = 0; i < uploadedFiles.length; i++) {
            this.pxqs.push(uploadedFiles[i]);
        }
    },
    removePxq(key) {
        this.pxqs.splice(key, 1);
    },
    ////////////////////////////////////////////
    /////////// OTROS
    MostrarDatosArchivosOtros: function(e) {
        let uploadedFiles = this.$refs.otros.files;
        for (var i = 0; i < uploadedFiles.length; i++) {
            this.otros.push(uploadedFiles[i]);
        }
    },
    removeOtros(key) {
        this.otros.splice(key, 1);
    },
    ////////////////////////////////////////////
    MostrarDatosImagenes: function(e) {
        if (this.NombreImagen != null) {
            this.NombreImagen = []
        }
        let vm = this;
        var selectedFiles = e.target.files;
        for (let i = 0; i < selectedFiles.length; i++) {
            this.NombreImagen.push(selectedFiles[i]);
        }
        for (let i = 0; i < this.NombreImagen.length; i++) {
            let reader = new FileReader();
            reader.onload = (e) => {
                this.$refs.image[i].src = reader.result;
            };
        }
    },
    datosTicektShow: function() {
        document.getElementById("barra").style.display = "";
        document.getElementById("ticektList").style.display = "";
        document.getElementById("linea1").style.display = "";
        document.getElementById("linea2").style.display = "";
        document.getElementById("linea3").style.display = "";
        document.getElementById("SgcTkc").style.display = "none";
        document.getElementById("BtnBack").style.display = "none";
        document.getElementById("PreWorkTkc").style.display = "none";
    },
    GetFilesUpload: function() {
        if (this.TipoMonedaId == 1) {
            if (this.activo != 0 && this.activo > this.valor_limite_cotizacion || this.servicio != 0 && this.servicio > this.valor_limite_cotizacion) {
                var TotalCUpload = this.TotalCotizacionesTicekt + this.TotalCoti;
                if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                    var cartaAdjudicación = document.getElementById('cartaAdjudicaciones');
                    var lpu = document.getElementById('lpus');
                    if (this.TipoTrabajoId == 9 && this.cartaAdjudicaciones.length != 0 || this.TipoTrabajoId == 11 && this.lpus.length != 0) {
                        this.succes_cotizaciones_alert()
                        this.FilesVerification = 1
                    } else {
                        this.error_lpu_c_adj_alert();
                        this.FilesVerification = 0
                    }
                } else {
                    if (this.cotizaciones.length < 3) {
                        this.error_cotizaciones_alert_t();
                        this.FilesVerification = 0
                    } else {
                        if (this.cotizaciones.length >= 3) {
                            this.succes_cotizaciones_alert()
                            this.FilesVerification = 1
                        }
                    }
                }
            } else {
                if (this.activo != 0 && this.activo <= this.valor_limite_cotizacion || this.servicio != 0 && this.servicio <= this.valor_limite_cotizacion) {
                    var TotalCUpload = this.TotalCotizacionesTicekt + this.TotalCoti;
                    if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                        var cartaAdjudicación = document.getElementById('cartaAdjudicaciones');
                        var lpu = document.getElementById('lpus');
                        if (this.TipoTrabajoId == 9 && this.cartaAdjudicaciones.length != 0 || this.TipoTrabajoId == 11 && this.lpus.length != 0) {
                            this.succes_cotizaciones_alert()
                            this.FilesVerification = 1
                        } else {
                            this.error_lpu_c_adj_alert();
                            this.FilesVerification = 0
                        }
                    } else {
                        if (this.cotizaciones.length == 0) {
                            this.error_cotizaciones_alert()
                            this.FilesVerification = 0
                        } else {
                            if (this.cotizaciones.length >= 1) {
                                this.succes_cotizaciones_alert()
                                this.FilesVerification = 1
                            }
                        }
                    }
                }
            }
        } else {
            if (this.TipoMonedaId == 2 || this.TipoMonedaId == 3 || this.TipoMonedaId == 4) {
                if (this.conversionActivo > this.valor_limite_cotizacion || this.conversionServicio > this.valor_limite_cotizacion) {
                    var TotalCUpload = this.TotalCotizacionesTicekt + this.TotalCoti;
                    if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                        var cartaAdjudicación = document.getElementById('cartaAdjudicaciones');
                        var lpu = document.getElementById('lpus');
                        if (this.TipoTrabajoId == 9 && this.cartaAdjudicaciones.length != 0 || this.TipoTrabajoId == 11 && this.lpus.length != 0) {
                            this.succes_cotizaciones_alert()
                            this.FilesVerification = 1
                        } else {
                            this.error_lpu_c_adj_alert();
                            this.FilesVerification = 0
                        }
                    } else {
                        if (this.cotizaciones.length < 3) {
                            this.error_cotizaciones_alert_t();
                            this.FilesVerification = 0
                        } else {
                            if (this.cotizaciones.length >= 3) {
                                this.succes_cotizaciones_alert();
                                this.FilesVerification = 1;
                            }
                        }
                    }
                } else {
                    if (this.conversionActivo <= this.valor_limite_cotizacion || this.conversionServicio <= this.valor_limite_cotizacion) {
                        var TotalCUpload = this.TotalCotizacionesTicekt + this.TotalCoti;
                        if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                            var cartaAdjudicación = document.getElementById('cartaAdjudicaciones');
                            var lpu = document.getElementById('lpus');
                            if (this.TipoTrabajoId == 9 && this.cartaAdjudicaciones.length != 0 || this.TipoTrabajoId == 11 && this.lpus.length != 0) {
                                this.succes_cotizaciones_alert()
                                this.FilesVerification = 1
                            } else {
                                this.error_lpu_c_adj_alert();
                                this.FilesVerification = 0
                            }
                        } else {
                            if (this.cotizaciones.length == 0) {
                                this.error_cotizaciones_alert()
                                this.FilesVerification = 0
                            } else {
                                if (this.cotizaciones.length >= 1) {
                                    this.succes_cotizaciones_alert()
                                    this.FilesVerification = 1
                                }
                            }
                        }
                    }
                }
            }
        }
    },
    succes_cotizaciones_alert: function() {
        this.$swal({
            type: 'success',
            title: 'Éxito',
            text: 'Archivo(s) cargado(s), puedes crear tu solicitud',
            showCloseButton: true,
        });
    },
    error_cotizaciones_alert: function() {
        this.$swal({
            type: 'error',
            title: 'Error',
            text: 'Te falta subir una cotización',
            showCloseButton: true,
        });
    },
    error_cotizaciones_alert_t: function() {
        this.$swal({
            type: 'error',
            title: 'Error',
            text: 'Te faltan cotizaciones, tienes' + ' ' + this.cotizaciones.length + ' ' + 'cotizacion(es)',
            showCloseButton: true,
        });
    },
    error_lpu_c_adj_alert: function() {
        this.$swal({
            type: 'error',
            title: 'Error',
            text: 'Debes adjuntar la ' + ' ' + this.nombreMensajeTrabajo,
            showCloseButton: true,
        });
    },
    info_costo_alert: function() {
        this.$swal({
            type: 'info',
            title: 'Atención',
            text: 'Debe subir una cotización',
            showCloseButton: true,
        });
    },
    info_costo_max: function() {
        this.$swal({
            type: 'info',
            title: 'Atención',
            text: 'Tienes 2 opciones, subir 3 cotizaciones o subir 1 cotización y carta de proovedor unico',
            showCloseButton: true,
        });
    },
    info_lpu_c_adj_alert: function() {
        this.$swal({
            type: 'info',
            title: 'Atención',
            text: 'Debes adjuntar la ' + ' ' + this.nombreMensajeTrabajo,
            showCloseButton: true,
        });
    },
    searchNewProveedor: function() {
        document.getElementById('SelectProveedor').style.display = 'none';
        document.getElementById('search_proveedor').style.display = '';
        this.Buscarproveedor = '';
        this.idproveedor = '';
    },
    toastFunction: function(Messaje) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 6500,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            type: 'success',
            title: Messaje
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
        }, 900)
    },
    loadFunction2: function() {
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
    cleanData: function() {
        this.AreaTrabajoId = '';
        this.TipoTrabajoId = '';
        this.FechaEjecución = '';
        this.TipoGastoid = '';
        this.ContingenciaId = '';
        this.idproveedor = '';
        this.TipoBoletaId = '';
        this.TipoMonedaId = '';
        this.activo = '';
        this.servicio = '';
        this.tipo_archivo = '';
        this.NroBoleta = '';
        this.NcotizacionCpu = '';
        this.NombreProyecto = '';
        this.NecesidadId = '';
        this.descripcionNecesidades = '';
        this.descripcionProveedorCpu = '';
        this.declaracionCpu = '';
        this.cotizaciones = [];
        this.informefinales = [];
        this.guiadespachos = [];
        this.cartaAdjudicaciones = [];
        this.lpus = [];
        this.pxqs = [];
        this.otros = [];
        this.eworkn = ''
        this.searchNewProveedor();
    },
    TransformDinnerDeleErrorActivo: function() {
        console.log(this.valor_limite_cotizacion)
        if (this.activo != 0 || this.servicio != 0) {
            var errorCosto1 = document.getElementById('errorCosto1');
            errorCosto1.style.display = 'none'
            var errorCosto2 = document.getElementById('errorCosto2');
            errorCosto2.style.display = 'none'
        }
        axios.get(`/GetValues?TipoMoneda=${this.TipoMonedaId}`).then((response) => {
            this.valorTipoMoneda = response.data;
            if (this.TipoMonedaId == 2 || this.TipoMonedaId == 3 || this.TipoMonedaId == 4) {
                if (this.activo != 0) {
                    this.conversionActivo = parseInt(this.activo) * this.valorTipoMoneda
                    if (this.conversionActivo > this.valor_limite_cotizacion) {
                        if (this.TipoTrabajoId != 9 && this.TipoTrabajoId != 11) {
                            this.info_costo_max();
                        } else {
                            this.info_lpu_c_adj_alert();
                        }
                    } else {
                        if (this.conversionActivo <= this.valor_limite_cotizacion) {
                            if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                                this.info_lpu_c_adj_alert();
                            } else {
                                this.info_costo_alert();
                            }
                        }
                    }
                }
            } else {
                if (this.TipoMonedaId == 1) {
                    if (this.activo != 0) {
                        if (this.activo > this.valor_limite_cotizacion) {
                            if (this.TipoTrabajoId != 9 && this.TipoTrabajoId != 11) {
                                this.info_costo_max();
                            } else {
                                this.info_lpu_c_adj_alert();
                            }
                        } else {
                            if (this.activo <= this.valor_limite_cotizacion) {
                                if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                                    this.info_lpu_c_adj_alert();
                                } else {
                                    this.info_costo_alert();
                                }
                            }
                        }
                    }
                }
            }
        })
    },
    TransformDinnerDeleErrorServicio: function() {
        if (this.activo != 0 || this.servicio != 0) {
            var errorCosto1 = document.getElementById('errorCosto1');
            errorCosto1.style.display = 'none'
            var errorCosto2 = document.getElementById('errorCosto2');
            errorCosto2.style.display = 'none'
        }
        axios.get(`/GetValues?TipoMoneda=${this.TipoMonedaId}`).then((response) => {
            this.valorTipoMoneda = response.data;
            if (this.TipoMonedaId == 2 || this.TipoMonedaId == 3 || this.TipoMonedaId == 4) {
                if (this.servicio != 0) {
                    this.conversionServicio = parseInt(this.servicio) * this.valorTipoMoneda
                    if (this.conversionServicio > this.valor_limite_cotizacion) {
                        if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                            this.info_lpu_c_adj_alert();
                        } else {
                            this.info_costo_max();
                        }
                    } else {
                        if (this.conversionServicio <= this.valor_limite_cotizacion) {
                            if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                                this.info_lpu_c_adj_alert();
                            } else {
                                this.info_costo_alert();
                            }
                        }
                    }
                }
            } else {
                if (this.TipoMonedaId == 1) {
                    if (this.servicio != 0) {
                        if (this.servicio > this.valor_limite_cotizacion) {
                            if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                                this.info_lpu_c_adj_alert();
                            } else {
                                this.info_costo_max();
                            }
                        } else {
                            if (this.servicio <= this.valor_limite_cotizacion) {
                                if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                                    this.info_lpu_c_adj_alert();
                                } else {
                                    this.info_costo_alert();
                                }
                            }
                        }
                    }
                }
            }
        })
    },
    SelectProveedor: function(id, nombreProveedor) {
        this.proveedor_info_select = nombreProveedor.toLowerCase()
        this.idproveedor = id;
        this.NombreProveedorSelect = nombreProveedor;
        document.getElementById('search_proveedor').style.display = 'none';
        document.getElementById('SelectProveedor').style.display = '';
        document.getElementById('listProveedor').style.display = 'none';
        document.getElementById('errorProveedor').style.display = 'none';
    },
    BuscarProveedor: function() {
        if (this.Buscarproveedor.length >= 3) {
            axios.get(`/GetProveedor?proveedor=${this.Buscarproveedor}`).then((response) => {
                this.Proveedores = response.data;
            })
            var box = document.getElementById('listProveedor');
            box.style.display = '';
        } else {
            this.Proveedores = '';
            var box = document.getElementById('listProveedor');
            box.style.display = 'none';
        }
    },
    val_data: function() {
        if (this.TipoBoletaId == 3) {
            axios.get(`/pep-blocked?pep=${this.NroBoleta}`).then((response) => {
                if (response.data == 1) {
                    this.$swal({
                        type: 'error',
                        title: 'Error',
                        text: 'El PEP ' + ' ' + this.NroBoleta + ' ' + ' se encuentra bloqueado actualmente, favor contactar a jefatura directa para mayor información.',
                        showCloseButton: true,
                    });
                    this.NroBoleta = '';
                }
            })
        }
    }
    },
  

}
</script>
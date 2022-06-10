<template>
    <div>
        <form>
            <div class="row" id="formulario_sgc_ticket">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12" id="SgcTkc" style="display: none;">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(rgb(0, 92, 255), #007bff99);">
                            <div class="card-icon">
                                <i class="fas fa-pencil-alt" style="color: #42E8B4">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Formulario SGC
                            </h4>
                            <div class="card-description barlow semi_bold ">
                                Ingrese los datos requeridos
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="tickets-list" v-if="load_data == 0">
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p class="barlow semi_bold black_e">
                                                    Área de trabajo *
                                                </p>
                                                <select @change.prevent="DeleteErrorSgcform"
                                                    class="form-control barlow regular select" name="AreaTrabajo"
                                                    v-model="AreaTrabajoId">
                                                    <option class="barlow regular" v-bind:value="trabajo.id"
                                                        v-for="trabajo in area_trabajos">
                                                        {{trabajo.area}}
                                                    </option>
                                                </select>
                                                <div id="errorAreaTrabajo" style="display: none">
                                                    <p class="barlow semi_bold" style="color: red">
                                                        Favor seleccionar área de trabajo
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p class="barlow semi_bold black_e">
                                                    Tipo de trabajo *
                                                </p>
                                                <select @change.prevent="DeleteErrorSgcform"
                                                    class="form-control barlow regular select" name="TipoTrabajo"
                                                    v-model="TipoTrabajoId">
                                                    <option v-bind:value="Tipo_trabajo.id"
                                                        v-for="Tipo_trabajo in Tipo_trabajos">
                                                        {{Tipo_trabajo.nombre_trabajo}}
                                                    </option>
                                                </select>
                                                <div id="errorTipoTrabajo" style="display: none">
                                                    <p class="barlow semi_bold" style="color: red">
                                                        Favor seleccionar el tipo de trabajo
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p class="barlow semi_bold black_e">
                                                    Fecha ejecución *
                                                </p>
                                                <input @change.prevent="DeleteErrorSgcform"
                                                    class="form-control barlow regular" id="" style="color:#999999"
                                                    type="date" v-model="FechaEjecución" />
                                                <div id="errorFechaEjecución" style="display: none">
                                                    <p class="barlow semi_bold" style="color: red">
                                                        Favor indicar la fecha de ejecuión
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div id="searchproveedor">
                                                <div class="form-group" id="textInpu">
                                                    <p class="barlow semi_bold black_e">
                                                        Proveedor *
                                                    </p>
                                                    <div class="input-group" id="SearchproveedorDontDisplay">
                                                        <input class="form-control " name="Proveedor"
                                                            placeholder="Buscar proveedor" style="color:#999999"
                                                            type="text" v-model="Buscarproveedor"
                                                            v-on:keyup="BuscarProveedor" />
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-search">
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input style="display: none" type="text"
                                                        v-bind:value="idproveedor" />
                                                    <div id="SelectProveedor" style="display: none">
                                                        <div class="input-group">
                                                            <input class="form-control" disabled="true" name=""
                                                                style="background-color:rgb(0, 92, 255);color:white;"
                                                                type="" v-bind:value="proveedor_info_select" />
                                                            <div class="input-group-append">
                                                                <div @click.prevent="searchNewProveedor()"
                                                                    class="input-group-text " style="cursor: pointer  ">
                                                                    <i class="fas fa-times boxBounce "
                                                                        style="color:#fc544b;font-size: 18px">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="s_l" id="listProveedor" style="display: none">
                                                        <div class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                                            <div v-for="proveedor in Proveedores">
                                                                <a @click.prevent="SelectProveedor(proveedor)"
                                                                    class="changeColor" href=""
                                                                    id="selectProveedorvalue">
                                                                    {{proveedor.PROVEEDOR.toLowerCase()}} -
                                                                    {{proveedor.RUT_PROVEEDOR}}
                                                                    <hr style="margin-top: -1px;" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="errorProveedor" style="display: none">
                                                        <p class="barlow semi_bold" style="color: red">
                                                            Favor seleccionar proveedor
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p class="barlow semi_bold black_e">
                                                    Tipo boleta *
                                                </p>
                                                <select @change.prevent="DeleteErrorSgcform"
                                                    class="form-control barlow regular select" v-model="TipoBoletaId">
                                                    <option v-bind:value="Tipo_boleta.id"
                                                        v-for="Tipo_boleta in Tipo_boletas">
                                                        {{Tipo_boleta.descripcion}}
                                                    </option>
                                                </select>
                                                <div id="errorTipoBoleta" style="display: none">
                                                    <p class="barlow semi_bold" style="color: red">
                                                        Favor seleccionar tipo de boleta
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p class="barlow semi_bold black_e">
                                                    Nro boleta
                                                </p>
                                                <input class="form-control " id="nro_boleta" @change="validar_boleta()"
                                                    style="color:#999999" type="text" v-model="NroBoleta">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p class="barlow semi_bold black_e">
                                                    Tipo moneda *
                                                </p>
                                                <select @change.prevent="DeleteErrorSgcform"
                                                    class="form-control barlow regular select" v-model="TipoMonedaId">
                                                    <option v-bind:value="Tipo_moneda.id"
                                                        v-for="  Tipo_moneda in   Tipo_monedas">
                                                        {{Tipo_moneda.moneda}}
                                                    </option>
                                                </select>
                                                <div id="errorTipoMoneda" style="display: none">
                                                    <p class="barlow semi_bold" style="color: red">
                                                        Favor seleccionar tipo de moneda
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p class="barlow semi_bold black_e">
                                                    Formato de pago *
                                                </p>
                                                <select @change.prevent="DeleteErrorSetContingencia"
                                                    class="form-control barlow regular select" v-model="TipoGastoid">
                                                    <option v-bind:value="Tipo_gasto.id"
                                                        v-for="Tipo_gasto in Tipo_gastos">
                                                        {{Tipo_gasto.nombre_gasto}}
                                                    </option>
                                                </select>
                                                <div id="errorTipoGasto" style="display: none">
                                                    <p class="barlow semi_bold" style="color: red">
                                                        Favor seleccionar formato de pago
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p class="barlow semi_bold black_e">
                                                    Tipo contingencia*
                                                </p>
                                                <select @change.prevent="DeleteErrorSgcform"
                                                    class="form-control barlow regular select" disabled="true"
                                                    id="tipoGasto" v-model="ContingenciaId">
                                                    <option v-bind:value="Tipo_contingencia.id"
                                                        v-for="Tipo_contingencia in Tipo_contingencias">
                                                        {{Tipo_contingencia.nombre_contingencia}}
                                                    </option>
                                                </select>
                                                <div id="errorTipoContingencia" style="display: none">
                                                    <p class="barlow semi_bold" style="color: red">
                                                        Favor seleccionar una contingencia
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p class="barlow semi_bold black_e">
                                                    Costos activos
                                                </p>
                                                <input @change.prevent="TransformDinnerDeleErrorActivo"
                                                    class="form-control " disabled="true" id="activo" min="1"
                                                    name="Activo" style="color:#999999;width: 100%" type="number"
                                                    v-model="activo">
                                                <div id="errorCosto1" style="display: none">
                                                    <p class="barlow semi_bold" style="color: red">
                                                        Favor indicar un tipo de costo
                                                    </p>
                                                </div>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p class="barlow semi_bold black_e">
                                                    Costos servicios
                                                </p>
                                                <input @change.prevent="TransformDinnerDeleErrorServicio"
                                                    class="form-control " disabled="true" id="servicio" name="Servicio"
                                                    style="color:#999999;width: 100%" type="number" v-model="servicio">
                                                <div id="errorCosto2" style="display: none">
                                                    <p class="barlow semi_bold" style="color: red">
                                                        Favor indicar un tipo de costo
                                                    </p>
                                                </div>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p class="barlow semi_bold black_e">
                                                    Nro° ework
                                                </p>
                                                <input class="form-control " id="" name="ework"
                                                    style="color:#999999;width: 100%" type="number" v-model="eworkn">
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-lg-1 col-md-6 col-sm-6 col-12">
                                                <button class="btn shadow-box-ag boxBounce barlow semi_bold "
                                                    data-target="#ModalArchivos" data-toggle="modal" id="archivo"
                                                    style="background-color: #42e8b4;color:white;" type="button">
                                                    Cargar archivos
                                                </button>
                                            </div>
                                            <div class="col-lg-10 col-md-6 col-sm-6 col-12">
                                                <button @click.prevent="ShowModalCpuCloseThis"
                                                    class="btn shadow-box-ag boxBounce barlow semi_bold" id="BtnCpu"
                                                    style="background-color: #42e8b4;color:white;">
                                                    Crear CPU
                                                </button>
                                            </div>
                                            <div class="col-lg-1 col-md-6 col-sm-6 col-12">
                                                <button @click.prevent="CreatedSgcValidation"
                                                    class="btn shadow-box-ag boxBounce barlow semi_bold"
                                                    style="background-color: #3386ff;color:white;" type="button">
                                                    Crear
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-sm-12" v-if="load_data == 1">
                                <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                    <div class="card-body">
                                        <h5 class="barlow regular" style="text-align: center;font-size:30px;">
                                            Creando su solicitud...
                                        </h5>
                                        <div class="empty-state" data-height="400">
                                            <div class="d-flex justify-content-center" v-if="load_data == 1">
                                                <div class="spinner-border text-primary" role="status"
                                                    style="width: 8rem;height: 8rem;color: #007bff!important;">
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
            <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="ModalArchivos" role="dialog"
                tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated fadeIn">
                        <div class="modal-header"
                            style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                            <h5 class="modal-title barlow bold" style="color: white">
                                Carga de archivos
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color:white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card" style="box-shadow: 0 0px 0px rgb(0 0 0 / 0);">
                                <div class="card-body">
                                    <div class="file-upload" style="margin-top: -20px; width: 90%;margin-left: ;">
                                        <div class="image-upload-wrap barlow semi_bold">
                                            <input class="file-upload-input" id="cotizaciones" multiple=""
                                                ref="cotizaciones" type="file"
                                                v-on:change="MostrarDatosArchivosCotizacion()" />
                                            <div class="drag-text">
                                                <h2 class="barlow semi_bold" style="font-size: 20px;">
                                                    Cotizaciones
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li class="media" style="margin-top: 10px;" v-for="(file, key) in cotizaciones">
                                            <i :class="getFileExtension(file.name) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(file.name) == 'xls' || getFileExtension(file.name) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(file.name) == 'doc' || getFileExtension(file.name) == 'docx' ? 'far fa-file-word':( getFileExtension(file.name) == 'img' || getFileExtension(file.name) == 'jpg' || getFileExtension(file.name) == 'jpeg' ||  getFileExtension(file.name) == 'png' ? 'far fa-image':'far fa-file')))"
                                                class="fas fa-file mr-3" style="font-size: 50px;">
                                            </i>
                                            <div class="media-body">
                                                <p class="barlow regular">
                                                    {{file.name}}
                                                </p>
                                            </div>
                                            <button @click.prevent="removeFileCotizacion( key )"
                                                class="btn btn-danger mr-3" style="margin-top: 18px; ">
                                                <i class="fas fa-window-close blanco">
                                                </i>
                                            </button>
                                        </li>
                                        <hr />
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="file-upload" style="margin-top: -20px; width: 90%;margin-left: ;">
                                        <div class="image-upload-wrap barlow semi_bold">
                                            <input class="file-upload-input" id="informefinales" multiple=""
                                                ref="informefinales" type="file"
                                                v-on:change="MostrarDatosArchivosInf()" />
                                            <div class="drag-text">
                                                <h2 class="barlow semi_bold" style="font-size: 20px;">
                                                    Informe Final
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li class="media" style="margin-top: 10px;"
                                            v-for="(file, key) in informefinales">
                                            <i :class="getFileExtension(file.name) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(file.name) == 'xls' || getFileExtension(file.name) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(file.name) == 'doc' || getFileExtension(file.name) == 'docx' ? 'far fa-file-word':( getFileExtension(file.name) == 'img' || getFileExtension(file.name) == 'jpg' || getFileExtension(file.name) == 'jpeg' ||  getFileExtension(file.name) == 'png' ? 'far fa-image':'far fa-file')))"
                                                class="fas fa-file mr-3" style="font-size: 50px;">
                                            </i>
                                            <div class="media-body">
                                                <p class="barlow regular">
                                                    {{file.name}}
                                                </p>
                                            </div>
                                            <button @click.prevent="removeFileinformefinal( key )"
                                                class="btn btn-danger mr-3" style="margin-top: 18px; ">
                                                <i class="fas fa-window-close blanco">
                                                </i>
                                            </button>
                                        </li>
                                        <hr />
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="file-upload" style="margin-top: -20px; width: 90%;margin-left: ;">
                                        <div class="image-upload-wrap barlow semi_bold">
                                            <input class="file-upload-input" id="guiadespachos" multiple=""
                                                ref="guiadespachos" type="file"
                                                v-on:change="MostrarDatosArchivosGpd()" />
                                            <div class="drag-text">
                                                <h2 class="barlow semi_bold" style="font-size: 20px;">
                                                    Guía de despacho
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li class="media" style="margin-top: 10px;"
                                            v-for="(file, key) in guiadespachos">
                                            <i :class="getFileExtension(file.name) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(file.name) == 'xls' || getFileExtension(file.name) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(file.name) == 'doc' || getFileExtension(file.name) == 'docx' ? 'far fa-file-word':( getFileExtension(file.name) == 'img' || getFileExtension(file.name) == 'jpg' || getFileExtension(file.name) == 'jpeg' ||  getFileExtension(file.name) == 'png' ? 'far fa-image':'far fa-file')))"
                                                class="fas fa-file mr-3" style="font-size: 50px;">
                                            </i>
                                            <div class="media-body">
                                                <p class="barlow regular">
                                                    {{file.name}}
                                                </p>
                                            </div>
                                            <button @click.prevent="removeGuiadespacho( key )"
                                                class="btn btn-danger mr-3" style="margin-top: 18px; ">
                                                <i class="fas fa-window-close blanco">
                                                </i>
                                            </button>
                                        </li>
                                        <hr />
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="file-upload" style="margin-top: -20px; width: 90%;">
                                        <div class="image-upload-wrap barlow semi_bold">
                                            <input class="file-upload-input" id="validacionCompras" multiple=""
                                                ref="validacionCompras" type="file"
                                                v-on:change="MostrarDatosArchivosValidacionCompras()" />
                                            <div class="drag-text">
                                                <h2 class="barlow semi_bold" style="font-size: 20px;">
                                                    Validación de compras
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li class="media" style="margin-top: 10px;"
                                            v-for="(file, key) in validacionCompras">
                                            <i :class="getFileExtension(file.name) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(file.name) == 'xls' || getFileExtension(file.name) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(file.name) == 'doc' || getFileExtension(file.name) == 'docx' ? 'far fa-file-word':( getFileExtension(file.name) == 'img' || getFileExtension(file.name) == 'jpg' || getFileExtension(file.name) == 'jpeg' ||  getFileExtension(file.name) == 'png' ? 'far fa-image':'far fa-file')))"
                                                class="fas fa-file mr-3" style="font-size: 50px;">
                                            </i>
                                            <div class="media-body">
                                                <p class="barlow regular">
                                                    {{file.name}}
                                                </p>
                                            </div>
                                            <button @click.prevent="removeValidacionCompras( key )"
                                                class="btn btn-danger mr-3" style="margin-top: 18px; ">
                                                <i class="fas fa-window-close blanco">
                                                </i>
                                            </button>
                                        </li>
                                        <hr />
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="file-upload" style="margin-top: -20px; width: 90%;">
                                        <div class="image-upload-wrap barlow semi_bold">
                                            <input class="file-upload-input" id="cartaAdjudicaciones" multiple=""
                                                ref="cartaAdjudicaciones" type="file"
                                                v-on:change="MostrarDatosArchivosCaj()" />
                                            <div class="drag-text">
                                                <h2 class="barlow semi_bold" style="font-size: 20px;">
                                                    Carta adjudicación
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li class="media" style="margin-top: 10px;"
                                            v-for="(file, key) in cartaAdjudicaciones">
                                            <i :class="getFileExtension(file.name) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(file.name) == 'xls' || getFileExtension(file.name) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(file.name) == 'doc' || getFileExtension(file.name) == 'docx' ? 'far fa-file-word':( getFileExtension(file.name) == 'img' || getFileExtension(file.name) == 'jpg' || getFileExtension(file.name) == 'jpeg' ||  getFileExtension(file.name) == 'png' ? 'far fa-image':'far fa-file')))"
                                                class="fas fa-file mr-3" style="font-size: 50px;">
                                            </i>
                                            <div class="media-body">
                                                <p class="barlow regular">
                                                    {{file.name}}
                                                </p>
                                            </div>
                                            <button @click.prevent="removeAdjudicación( key )"
                                                class="btn btn-danger mr-3" style="margin-top: 18px; ">
                                                <i class="fas fa-window-close blanco">
                                                </i>
                                            </button>
                                        </li>
                                        <hr />
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="file-upload" style="margin-top: -20px; width: 90%;margin-left: ;">
                                        <div class="image-upload-wrap barlow semi_bold">
                                            <input class="file-upload-input" id="lpus" multiple="" ref="lpus"
                                                type="file" v-on:change="MostrarDatosArchivosLpu()" />
                                            <div class="drag-text">
                                                <h2 class="barlow semi_bold" style="font-size: 20px;">
                                                    LPU
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li class="media" style="margin-top: 10px;" v-for="(file, key) in lpus">
                                            <i :class="getFileExtension(file.name) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(file.name) == 'xls' || getFileExtension(file.name) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(file.name) == 'doc' || getFileExtension(file.name) == 'docx' ? 'far fa-file-word':( getFileExtension(file.name) == 'img' || getFileExtension(file.name) == 'jpg' || getFileExtension(file.name) == 'jpeg' ||  getFileExtension(file.name) == 'png' ? 'far fa-image':'far fa-file')))"
                                                class="fas fa-file mr-3" style="font-size: 50px;">
                                            </i>
                                            <div class="media-body">
                                                <p class="barlow regular">
                                                    {{file.name}}
                                                </p>
                                            </div>
                                            <button @click.prevent="removeLpu( key )" class="btn btn-danger mr-3"
                                                style="margin-top: 18px; ">
                                                <i class="fas fa-window-close blanco">
                                                </i>
                                            </button>
                                        </li>
                                        <hr />
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="file-upload" style="margin-top: -20px; width: 90%;margin-left: ;">
                                        <div class="image-upload-wrap barlow semi_bold">
                                            <input class="file-upload-input" id="pxqs" multiple="" ref="pxqs"
                                                type="file" v-on:change="MostrarDatosArchivosPxq()" />
                                            <div class="drag-text">
                                                <h2 class="barlow semi_bold" style="font-size: 20px;">
                                                    Documento PXQ
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li class="media" style="margin-top: 10px;" v-for="(file, key) in pxqs">
                                            <i :class="getFileExtension(file.name) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(file.name) == 'xls' || getFileExtension(file.name) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(file.name) == 'doc' || getFileExtension(file.name) == 'docx' ? 'far fa-file-word':( getFileExtension(file.name) == 'img' || getFileExtension(file.name) == 'jpg' || getFileExtension(file.name) == 'jpeg' ||  getFileExtension(file.name) == 'png' ? 'far fa-image':'far fa-file')))"
                                                class="fas fa-file mr-3" style="font-size: 50px;">
                                            </i>
                                            <div class="media-body">
                                                <p class="barlow regular">
                                                    {{file.name}}
                                                </p>
                                            </div>
                                            <button @click.prevent="removePxq( key )" class="btn btn-danger mr-3"
                                                style="margin-top: 18px; ">
                                                <i class="fas fa-window-close blanco">
                                                </i>
                                            </button>
                                        </li>
                                        <hr />
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="file-upload" style="margin-top: -20px; width: 90%;margin-left: ;">
                                        <div class="image-upload-wrap barlow semi_bold">
                                            <input class="file-upload-input" id="otros" multiple="" ref="otros"
                                                type="file" v-on:change="MostrarDatosArchivosOtros()" />
                                            <div class="drag-text">
                                                <h2 class="barlow semi_bold" style="font-size: 20px;">
                                                    Otros
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li class="media" style="margin-top: 10px;" v-for="(file, key) in otros">
                                            <i :class="getFileExtension(file.name) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(file.name) == 'xls' || getFileExtension(file.name) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(file.name) == 'doc' || getFileExtension(file.name) == 'docx' ? 'far fa-file-word':( getFileExtension(file.name) == 'img' || getFileExtension(file.name) == 'jpg' || getFileExtension(file.name) == 'jpeg' ||  getFileExtension(file.name) == 'png' ? 'far fa-image':'far fa-file')))"
                                                class="fas fa-file mr-3" style="font-size: 50px;">
                                            </i>
                                            <div class="media-body">
                                                <p class="barlow regular">
                                                    {{file.name}}
                                                </p>
                                            </div>
                                            <button @click.prevent="removeOtros( key )" class="btn btn-danger mr-3"
                                                style="margin-top: 18px; ">
                                                <i class="fas fa-window-close blanco">
                                                </i>
                                            </button>
                                        </li>
                                        <hr />
                                    </ul>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger boxBounce" data-dismiss="modal" type="">
                                    Cancelar
                                </button>
                                <button @click.prevent="GetFilesUpload" class="btn shadow-box-ag boxBounce "
                                    data-dismiss="modal" style="background-color: #3386ff;color:white;" type="button">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="ModalSgcCpu" role="dialog"
                tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated bounceIn">
                        <div class="modal-header">
                            <p class="modal-title" style="color: #999999;font-size: 28px;">
                                Ficha de Justificación a la adjudicación CPU
                            </p>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="tickets-list">
                                <div class="ticket-item">
                                    <p class="title" style="color: #999999; font-size: 18px;">
                                        <strong>
                                            1. Descripción Proveedor:
                                        </strong>
                                        Escriba los datos del proveedor en los campos correspondientes.
                                    </p>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p style="color: #999999">
                                                    Proveedor
                                                </p>
                                                <input class="form-control" disabled="true" id="ProveedorCPu"
                                                    name="ProveedorCpu" type="text" value="">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p style="color: #999999">
                                                    N° cotización
                                                </p>
                                                <input class="form-control" type="text" v-model="NcotizacionCpu">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p style="color: #999999">
                                                    Moneda
                                                </p>
                                                <input class="form-control" disabled="" name="totalCpu" type="text"
                                                    v-if="TipoMonedaId == 1" value="CLP">
                                                </input>
                                                <input class="form-control" disabled="" name="totalCpu" type="text"
                                                    v-if="TipoMonedaId == 2" value="UF">
                                                </input>
                                                <input class="form-control" disabled="" name="totalCpu" type="text"
                                                    v-if="TipoMonedaId == 3" value="USD">
                                                </input>
                                                <input class="form-control" disabled="" name="totalCpu" type="text"
                                                    v-if="TipoMonedaId == 4" value="EURO">
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket-item">
                                    <p class="title" style="color: #999999; font-size: 18px;">
                                        <strong>
                                            2. Descripción Proyecto:
                                        </strong>
                                        Escriba los datos del Proyecto en los campos correspondientes.
                                    </p>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p style="color: #999999">
                                                    Nombre del Proyecto/Tipo de compra*
                                                </p>
                                                <input @keyup.prevent="DeleteErrorCpu" class="form-control"
                                                    name="NombreProyectoCpu" type="text" v-model="NombreProyecto">
                                                <div id="errorProyecto" style="display: none">
                                                    <p style="color: red">
                                                        Favor indicar Nombre del Proyecto/Tipo de compra
                                                    </p>
                                                </div>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket-item">
                                    <p class="title" style="color: #999999; font-size: 18px;">
                                        <strong>
                                            3. Motivo Justificacion Tecnica:
                                        </strong>
                                        Seleccione los datos del Proyecto.
                                    </p>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p style="color: #999999">
                                                    Seleccione necesidad*
                                                </p>
                                                <select @change.prevent="DeleteErrorCpu" class="form-control"
                                                    v-model="NecesidadId">
                                                    <option value="1">
                                                        <h2>
                                                            Proveedor único:
                                                        </h2>
                                                        "Único proveedor en el mercado"
                                                    </option>
                                                    <option value="2">
                                                        <strong>
                                                            Proveedor Obligado:
                                                        </strong>
                                                        "Proveedor indicado por el cliente final, ejemplo: Minsal, Banco
                                                        Chile, etc."
                                                    </option>
                                                    <option value="3">
                                                        <strong>
                                                            Característica técnica unica:
                                                        </strong>
                                                        "solo un proveedor cumple con el requisito tecnico, plazos,
                                                        etc."
                                                    </option>
                                                    <option value="4">
                                                        <strong>
                                                            Otro:
                                                        </strong>
                                                        "cuando la elección del proveedor no es ninguna de las
                                                        anteriores"
                                                    </option>
                                                </select>
                                                <div id="errorNecesidad" style="display: none">
                                                    <p style="color: red">
                                                        Favor seleccionar necesidad
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <p style="color: #999999">
                                                    Descripción necesidad*
                                                </p>
                                                <textarea @keyup.prevent="DeleteErrorCpu" class="form-control"
                                                    style="height: 150px;" v-model="descripcionNecesidades">
                                                </textarea>
                                                <div id="errorDescripcionNecesidad" style="display: none">
                                                    <p style="color: red">
                                                        Favor rellenar la descripción
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                            <p class="title" style="color: #999999; font-size: 18px;">
                                                <strong>
                                                    4. Descripción:
                                                </strong>
                                                Justificación Técnica a elección del Proveedor.
                                            </p>
                                            <div class="form-group">
                                                <textarea class="form-control" placeholder="Ingrese observación"
                                                    style="height: 150px;" v-model="descripcionProveedorCpu">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                            <p class="title" style="color: #999999; font-size: 18px;">
                                                <strong>
                                                    5. Declaración:
                                                </strong>
                                            </p>
                                            <p>
                                                <strong>
                                                    1-
                                                </strong>
                                                Contratista/Proveedor no presenta relación comercial con personal de
                                                Entel y que implique conflicto de interez, en linea con el Código de
                                                Etica vigente.
                                            </p>
                                            <p>
                                                <strong>
                                                    2-
                                                </strong>
                                                Para el caso de proveedores obligatorios, estos seran evaluados según el
                                                estándar mínimo legal y si su resultado fuera no recomendable sera
                                                informado al area solicitante quien deberá comunicar al cliente final a
                                                fin de apelar su obligatoriedad.
                                            </p>
                                            <p>
                                                <strong>
                                                    3-
                                                </strong>
                                                El proveedor deberá ser creado y bloqueado(para proveedores nuevos) de
                                                acuerdo al procedimiento vigente N°COMP-05-00-P.
                                            </p>
                                            <div class="form-inline">
                                                <li>
                                                    <input class="form-control" type="checkbox"
                                                        v-model="declaracionCpu">
                                                    <strong>
                                                        Declaro estar en pleno cononcimento de no haber realizado el
                                                        proceso de compra (bien y/o servicio) para el proveedor
                                                        individualizado.
                                                    </strong>
                                                    </input>
                                                </li>
                                                <div id="errordeclaracionCpu " style="display: none">
                                                    <p style="color: red">
                                                        Favor aceptar la declaración
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" data-dismiss="modal" type="">
                                    Cerrar
                                </button>
                                <button @click.prevent="ValidarDatosCpu" class="btn btn-success" type="submit">
                                    Guardar
                                </button>
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
    import moment from 'moment';
    import EventBus from "./event-bus"


    export default {
        props: ['usuario'],
        data() {
            return {
                bitacoras: [],
                datoslog: { 'descripcion': '' },
                nombre: '',
                area_trabajos: [],
                Tipo_trabajos: [],
                Tipo_boletas: [],
                Tipo_gastos: [],
                Tipo_monedas: [],
                TotalCotizacionesTicekt: '',
                AreaTrabajoId: '',
                TipoTrabajoId: '',
                FechaEjecución: '',
                TipoBoletaId: '',
                TipoMonedaId: '',
                TipoGastoid: '',
                activo: '',
                servicio: '',
                idproveedor: '',
                NombreProveedorSelect: '',
                Buscarproveedor: '',
                ContingenciaId: '',
                Tipo_contingencias: [],
                declaracionCpu: '',
                descripcionNecesidades: '',
                NombreProyecto: '',
                NombreCotizaciones: [],
                NombreInformeFinal: [],
                NombreCartaAdjudicacion: [],
                NombreOtros: [],
                NombreGuiaDespacho: [],
                NecesidadId: '',
                NombrePxq: [],
                NombreLpu: [],
                Proveedores: [],
                cotizaciones: [],
                informefinales: [],
                guiadespachos: [],
                cartaAdjudicaciones: [],
                lpus: [],
                pxqs: [],
                otros: [],
                NroBoleta: '',
                NcotizacionCpu: '',
                descripcionProveedorCpu: '',
                nombreMensajeTrabajo: '',
                eworkn: '',
                proveedor_info_select: '',
                cotizacion_ticket: '',
                valor_limite: 0,
                load_data: 0,
                mensaje_confirmacion: '',
                conversionActivo: '',
                conversionServicio: '',
                estado_presupuesto: '',
                montoTotalActivoServicio: 0,
                validacion_compras_ticket: '',
                validacionCompras: [],
                extensions: []


            }
        },

        created: function () {
            this.getExtensions()



        },
        mounted: function () { /* Agrega mounted y con el siguiente contenido */
            let self = this;
            EventBus.$on('sgc.getDatosform', function () {
                self.GetDataSgcForm(); // ejecutas el metodo que desees 

            });
        },
        watch: {
            TipoBoletaId() {
                if (this.usuario.rol == 34) {

                    let input_boleta = document.getElementById("nro_boleta");
                    input_boleta.disabled = true;
                    this.NroBoleta = this.TipoBoletaId == 8 ? '30661' : (this.TipoBoletaId == 9 ? '30655' : '')


                }
            }
        },
        methods: {
            getExtensions() {
                axios.get('/repositorio/extensions').then((response) => {
                    this.extensions = response.data;
                })
            },
            DeleteErrorSetContingencia: function () {
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
                            type: 'info',
                            title: 'Atención',
                            text: 'Debe seleccionar el tipo de contingencia',
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
            ShowModalCpuCloseThis: function () {
                $('#ModalSgc').modal('hide');
                $('#ModalSgcCpu').modal('show');
                $("#ProveedorCPu").val(this.NombreProveedorSelect.toLowerCase());
            },
            GetDataSgcForm: function () {
                document.getElementById("ticektList").style.display = "none";
                document.getElementById("linea1").style.display = "none";
                document.getElementById("linea2").style.display = "none";
                document.getElementById("linea3").style.display = "none";
                document.getElementById("BtnBack").style.display = "";
                document.getElementById("SgcTkc").style.display = "";
                window.location.href = '#head_data_ticket'
                axios.get('/dataFormSgcOym').then(response => {
                    this.area_trabajos = response.data.area;


                    this.Tipo_boletas = response.data.boleta;


                    this.Tipo_gastos = response.data.gastos;
                    this.Tipo_trabajos = response.data.tipoTrabajo;
                    this.Tipo_monedas = response.data.modena;
                })
                axios.get('/total-cotizaciones-ticket/' + this.$route.params.id).then(response => {
                    this.cotizacion_ticket = response.data;

                })
                axios.get('/get-valor-limite').then(response => {
                    this.valor_limite = response.data;
                })
                axios.get('/total-sgc-ticket/' + this.$route.params.id).then(response => {
                    console.log(response.data)
                    if (response.data != 0) {
                        this.cotizacion_ticket = 0;
                    }
                })

                if (this.usuario.rol == 34) {
                    axios.get('/total/validacion/compras/' + this.$route.params.id).then(response => {
                        this.validacion_compras_ticket = response.data;

                    })
                }

            },
            ValidarDatosCpu: function () {
                if (this.NecesidadId == '') {
                    var errorNecesidad = document.getElementById('errorNecesidad');
                    errorNecesidad.style.display = ''
                }
                if (this.NombreProyecto == '') {
                    var errorProyecto = document.getElementById('errorProyecto');
                    errorProyecto.style.display = ''
                }
                if (this.descripcionNecesidades == '') {
                    var errorDescripcionNecesidad = document.getElementById('errorDescripcionNecesidad');
                    errorDescripcionNecesidad.style.display = ''
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
            DeleteErrorSgcform: function () {
                if (this.ContingenciaId != '') {
                    var errorTipoContingencia = document.getElementById('errorTipoContingencia');
                    errorTipoContingencia.style.display = 'none'
                }
                if (this.AreaTrabajoId != '') {
                    var errorAreaTrabajo = document.getElementById('errorAreaTrabajo');
                    errorAreaTrabajo.style.display = 'none'
                }
                if (this.TipoTrabajoId != '') {
                    var errorTipoTrabajo = document.getElementById('errorTipoTrabajo');
                    errorTipoTrabajo.style.display = 'none'
                }
                if (this.FechaEjecución != '') {
                    var errorFechaEjecución = document.getElementById('errorFechaEjecución');
                    errorFechaEjecución.style.display = 'none'
                }
                if (this.TipoBoletaId != '') {

                    var errorTipoBoleta = document.getElementById('errorTipoBoleta');
                    errorTipoBoleta.style.display = 'none'

                }
                if (this.TipoMonedaId != '') {
                    var errorTipoMoneda = document.getElementById('errorTipoMoneda');
                    errorTipoMoneda.style.display = 'none'
                    var divActivo = document.getElementById('activo');
                    var divServicio = document.getElementById('servicio');
                    divActivo.disabled = false;
                    divServicio.disabled = false;
                    this.activo = '';
                    this.servicio = '';
                    this.conversionActivo = '';
                    this.conversionServicio = '';
                }
            },
            DeleteErrorCpu: function () {
                if (this.NecesidadId != '') {
                    var errorNecesidad = document.getElementById('errorNecesidad');
                    errorNecesidad.style.display = 'none'
                }
                if (this.descripcionNecesidades != '') {
                    var errorDescripcionNecesidad = document.getElementById('errorDescripcionNecesidad');
                    errorDescripcionNecesidad.style.display = 'none'
                }
                if (this.NombreProyecto != '') {
                    var errorProyecto = document.getElementById('errorProyecto');
                    errorProyecto.style.display = 'none'
                }
            },
            //COTIZACIONES
            MostrarDatosArchivosCotizacion: function (e) {
                let uploadedFiles = this.$refs.cotizaciones.files;
                for (var i = 0; i < uploadedFiles.length; i++) {

                    let file = uploadedFiles[i];
                    let file_extension = file.name.split(".").pop()
                    let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                    if (extension_permited) {
                        this.cotizaciones.push(uploadedFiles[i]);
                    }
                }

            },
            removeFileCotizacion(key) {
                this.cotizaciones.splice(key, 1);
            },
            ////////////////////////////////////////////
            //INFORME  FINAL FILES
            MostrarDatosArchivosInf: function (e) {
                let uploadedFiles = this.$refs.informefinales.files;
                for (var i = 0; i < uploadedFiles.length; i++) {

                    let file = uploadedFiles[i];
                    let file_extension = file.name.split(".").pop()
                    let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                    if (extension_permited) {
                        this.informefinales.push(uploadedFiles[i]);
                    }
                }

            },
            removeFileinformefinal(key) {
                this.informefinales.splice(key, 1);
            },
            ////////////////////////////////////////////
            //INFORME  GUIA DESPACHO FILES
            MostrarDatosArchivosGpd: function (e) {
                let uploadedFiles = this.$refs.guiadespachos.files;
                for (var i = 0; i < uploadedFiles.length; i++) {

                    let file = uploadedFiles[i];
                    let file_extension = file.name.split(".").pop()
                    let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                    if (extension_permited) {
                        this.guiadespachos.push(uploadedFiles[i]);
                    }
                }

            },
            removeGuiadespacho(key) {
                this.guiadespachos.splice(key, 1);
            },
            //VALIDACIÓN COMPRAS 
            MostrarDatosArchivosValidacionCompras() {
                let uploadedFiles = this.$refs.validacionCompras.files;

                for (var i = 0; i < uploadedFiles.length; i++) {

                    let file = uploadedFiles[i];
                    let file_extension = file.name.split(".").pop()
                    let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                    if (extension_permited) {
                        this.validacionCompras.push(uploadedFiles[i]);
                    }
                }
            },
            removeValidacionCompras(key) {
                this.validacionCompras.splice(key, 1);
            },
            ////////////////////////////////////////////
            //INFORME  GUIA DESPACHO FILES
            MostrarDatosArchivosCaj: function (e) {
                let uploadedFiles = this.$refs.cartaAdjudicaciones.files;
                for (var i = 0; i < uploadedFiles.length; i++) {

                    let file = uploadedFiles[i];
                    let file_extension = file.name.split(".").pop()
                    let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                    if (extension_permited) {
                        this.cartaAdjudicaciones.push(uploadedFiles[i]);
                    }
                }
            },
            removeAdjudicación(key) {
                this.cartaAdjudicaciones.splice(key, 1);
            },
            ////////////////////////////////////////////
            /////////// LPU
            MostrarDatosArchivosLpu: function (e) {
                let uploadedFiles = this.$refs.lpus.files;
                for (var i = 0; i < uploadedFiles.length; i++) {

                    let file = uploadedFiles[i];
                    let file_extension = file.name.split(".").pop()
                    let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                    if (extension_permited) {
                        this.lpus.push(uploadedFiles[i]);
                    }
                }

            },
            removeLpu(key) {
                this.lpus.splice(key, 1);
            },
            ////////////////////////////////////////////
            /////////// PQX
            MostrarDatosArchivosPxq: function (e) {
                let uploadedFiles = this.$refs.pxqs.files;
                for (var i = 0; i < uploadedFiles.length; i++) {

                    let file = uploadedFiles[i];
                    let file_extension = file.name.split(".").pop()
                    let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                    if (extension_permited) {
                        this.pxqs.push(uploadedFiles[i]);
                    }
                }

            },
            removePxq(key) {
                this.pxqs.splice(key, 1);
            },
            ////////////////////////////////////////////
            /////////// OTROS
            MostrarDatosArchivosOtros: function (e) {
                let uploadedFiles = this.$refs.otros.files;
                for (var i = 0; i < uploadedFiles.length; i++) {

                    let file = uploadedFiles[i];
                    let file_extension = file.name.split(".").pop()
                    let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                    if (extension_permited) {
                        this.otros.push(uploadedFiles[i]);
                    }
                }

            },
            removeOtros(key) {
                this.otros.splice(key, 1);
            },
            ////////////////////////////////////////////
            MostrarDatosImagenes: function (e) {
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
            GetFilesUpload: function () {
                if (this.TipoMonedaId == 1) {
                    if (this.activo != '' && this.activo > this.valor_limite || this.servicio != '' && this.servicio > this.valor_limite) {
                        var TotalCUpload = this.TotalCotizacionesTicekt + this.TotalCoti;
                        if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                            var cartaAdjudicación = document.getElementById('cartaAdjudicaciones');
                            var lpu = document.getElementById('lpus');
                            if (this.TipoTrabajoId == 9 && this.cartaAdjudicaciones.length != 0 || this.TipoTrabajoId == 11 && this.lpus.length != 0 || this.validacionCompras.length != 0) {
                                this.$swal({
                                    type: 'success',
                                    title: 'Archivo cargado con éxito, puedes crear tu solicitud.',
                                    showCloseButton: true,
                                });
                            } else {
                                if (this.TipoTrabajoId == 9) {
                                    this.nombreMensajeTrabajo = 'carta de adjudicación';
                                }
                                if (this.TipoTrabajoId == 11) {
                                    this.nombreMensajeTrabajo = 'LPU';
                                }
                                this.$swal({
                                    type: 'error',
                                    title: 'Debes adjuntar la ' + ' ' + this.nombreMensajeTrabajo,
                                    showCloseButton: true,
                                });
                            }
                        } else {
                            if (this.cotizaciones.length != 0 && this.cartaAdjudicaciones.length != 0 || this.validacionCompras.length != 0) {
                                this.$swal({
                                    type: 'success',
                                    title: 'Archivos adjuntados con éxito, puedes crear tu solicitud.',
                                    showCloseButton: true,
                                });
                                return;
                            }
                            if (this.cotizaciones.length < 3 || this.validacionCompras.length == 0) {
                                this.$swal({
                                    type: 'error',
                                    title: 'Te faltan cotizaciones, tienes' + ' ' + this.TotalCoti + ' ' + 'cotizaciones.',
                                    showCloseButton: true,
                                });
                            } else {
                                if (this.cotizaciones.length >= 3 || this.validacionCompras.length != 0) {
                                    this.$swal({
                                        type: 'success',
                                        title: 'Acrhivos cargados con éxito, puedes crear tu solicitud.',
                                        showCloseButton: true,
                                    });
                                }
                            }
                        }
                    } else {
                        if (this.activo != '' && this.activo < this.valor_limite || this.servicio != '' && this.servicio < this.valor_limite) {
                            var TotalCUpload = this.TotalCotizacionesTicekt + this.TotalCoti;
                            if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                                var cartaAdjudicación = document.getElementById('cartaAdjudicaciones');
                                var lpu = document.getElementById('lpus');
                                if (this.TipoTrabajoId == 9 && this.cartaAdjudicaciones.length != 0 || this.TipoTrabajoId == 11 && this.lpus.length != 0 || this.validacionCompras.length != 0) {
                                    this.$swal({
                                        type: 'success',
                                        title: 'Archivo cargado con éxito, puedes crear tu solicitud.',
                                        showCloseButton: true,
                                    });
                                } else {
                                    if (this.TipoTrabajoId == 9) {
                                        this.nombreMensajeTrabajo = 'carta de adjudicación';
                                    }
                                    if (this.TipoTrabajoId == 11) {
                                        this.nombreMensajeTrabajo = 'LPU';
                                    }
                                    this.$swal({
                                        type: 'error',
                                        title: 'Debes adjuntar la ' + ' ' + this.nombreMensajeTrabajo,
                                        showCloseButton: true,
                                    });
                                }
                            } else {
                                if (this.cotizaciones.length == 0) {
                                    this.$swal({
                                        type: 'error',
                                        title: 'Te falta subir una cotización',
                                        showCloseButton: true,
                                    });
                                }
                                if (this.cotizaciones.length != 0) {
                                    this.$swal({
                                        type: 'success',
                                        title: 'Archivos cargado con éxito, puedes crear tu solicitud.',
                                        showCloseButton: true,
                                    });
                                }
                            }
                        }
                    }
                } else {
                    if (this.TipoMonedaId == 2 || this.TipoMonedaId == 3 || this.TipoMonedaId == 4) {
                        if (this.conversionActivo > this.valor_limite || this.conversionServicio > this.valor_limite) {
                            var TotalCUpload = this.TotalCotizacionesTicekt + this.TotalCoti;
                            if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                                var cartaAdjudicación = document.getElementById('cartaAdjudicaciones');
                                var lpu = document.getElementById('lpus');
                                if (this.TipoTrabajoId == 9 && this.cartaAdjudicaciones.length != 0 || this.TipoTrabajoId == 11 && this.lpus.length != 0 || this.validacionCompras.length != 0) {
                                    this.$swal({
                                        type: 'success',
                                        title: 'Archivo cargado con éxito, puedes crear tu solicitud.',
                                        showCloseButton: true,
                                    });
                                } else {
                                    if (this.TipoTrabajoId == 9) {
                                        this.nombreMensajeTrabajo = 'carta de adjudicación';
                                    }
                                    if (this.TipoTrabajoId == 11) {
                                        this.nombreMensajeTrabajo = 'LPU';
                                    }
                                    this.$swal({
                                        type: 'error',
                                        title: 'Debes adjuntar la ' + ' ' + this.nombreMensajeTrabajo,
                                        showCloseButton: true,
                                    });
                                }
                            } else {
                                if (this.cotizaciones.length != 0 && this.cartaAdjudicaciones.length != 0 || this.validacionCompras.length != 0) {
                                    this.$swal({
                                        type: 'success',
                                        title: 'Archivos adjuntados con éxito, puedes crear tu solicitud.',
                                        showCloseButton: true,
                                    });
                                    return;
                                }
                                if (this.cotizaciones.length < 3 || this.validacionCompras.length == 0) {
                                    this.$swal({
                                        type: 'error',
                                        title: 'Te faltan cotizaciones, tienes' + ' ' + this.TotalCoti + ' ' + 'cotizaciones.',
                                        showCloseButton: true,
                                    });
                                } else {
                                    if (this.cotizaciones.length >= 3 || this.validacionCompras.length != 0) {
                                        this.$swal({
                                            type: 'success',
                                            title: 'Archivos cargados con éxito, puedes crear tu solicitud.',
                                            showCloseButton: true,
                                        });
                                    }
                                }
                            }
                        } else {
                            if (this.conversionActivo < this.valor_limite || this.conversionServicio < this.valor_limite) {
                                var TotalCUpload = this.TotalCotizacionesTicekt + this.TotalCoti;
                                if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                                    var cartaAdjudicación = document.getElementById('cartaAdjudicaciones');
                                    var lpu = document.getElementById('lpus');
                                    if (this.TipoTrabajoId == 9 && this.cartaAdjudicaciones.length != 0 || this.TipoTrabajoId == 11 && this.lpus.length != 0 || this.validacionCompras.length != 0) {
                                        this.$swal({
                                            type: 'success',
                                            title: 'Archivo cargado con éxito, puedes crear tu solicitud.',
                                            showCloseButton: true,
                                        });
                                    } else {
                                        if (this.TipoTrabajoId == 9) {
                                            this.nombreMensajeTrabajo = 'carta de adjudicación';
                                        }
                                        if (this.TipoTrabajoId == 11) {
                                            this.nombreMensajeTrabajo = 'LPU';
                                        }
                                        this.$swal({
                                            type: 'error',
                                            title: 'Debes adjuntar la ' + ' ' + this.nombreMensajeTrabajo,
                                            showCloseButton: true,
                                        });
                                    }
                                } else {
                                    if (this.cotizaciones.length == 0) {
                                        this.$swal({
                                            type: 'error',
                                            title: 'Te falta subir una cotización',
                                            showCloseButton: true,
                                        });
                                    }
                                    if (this.cotizaciones.length != 0) {
                                        this.$swal({
                                            type: 'success',
                                            title: 'Archivos cargado con éxito, puedes crear tu solicitud.',
                                            showCloseButton: true,
                                        });
                                    }
                                }
                            }
                        }
                    }
                }
            },
            searchNewProveedor: function () {
                var SelectProveedor = document.getElementById('SelectProveedor');
                SelectProveedor.style.display = 'none'
                var SearchproveedorDontDisplay = document.getElementById('SearchproveedorDontDisplay');
                SearchproveedorDontDisplay.style.display = ''
                $("#SearchproveedorDontDisplay").val('');
                this.idproveedor = '';
            },
            toastFunction: function (Messaje) {
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
            loadFunction: function () {
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
            loadFunction2: function () {
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
            cleanData: function () {
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
                this.conversionActivo = '';
                this.conversionServicio = '';
                this.searchNewProveedor();
            },
            CreatedSgcValidation: function () {
                let formData = new FormData();
                formData.append('AreaTrabajo', this.AreaTrabajoId);
                formData.append('TipoTrabajo', this.TipoTrabajoId);
                formData.append('FechaEjecución', this.FechaEjecución);
                formData.append('TipoGasto', this.TipoGastoid);
                formData.append('TipoContingencia', this.ContingenciaId);
                formData.append('ProveedorId', this.idproveedor);
                formData.append('TipoBoleta', this.TipoBoletaId);
                formData.append('TipoMoneda', this.TipoMonedaId);
                formData.append('Activo', this.activo);
                formData.append('Servicio', this.servicio);
                formData.append('ework', this.eworkn);
                formData.append('Boleta', this.NroBoleta);
                formData.append('NcotizaciónCpu', this.NcotizacionCpu);
                formData.append('NombreProyectoCpu', this.NombreProyecto);
                formData.append('NecesidadId', this.NecesidadId);
                formData.append('Necesidades', this.descripcionNecesidades);
                formData.append('descripcionProveedorCpu', this.descripcionProveedorCpu);
                formData.append('DeclaracionCpu', this.declaracionCpu);
                formData.append('monto_imputacion_ceco', this.montoTotalActivoServicio);
                formData.append('estado_monto_ceco', this.estado_presupuesto);
                for (var i = 0; i < this.cotizaciones.length; i++) {
                    let cotizacion = this.cotizaciones[i];
                    formData.append('Cotizacion[' + i + ']', cotizacion);
                }
                for (var i = 0; i < this.informefinales.length; i++) {
                    let informefinal = this.informefinales[i];
                    formData.append('InfFinal[' + i + ']', informefinal);
                }
                for (var i = 0; i < this.guiadespachos.length; i++) {
                    let guiadespacho = this.guiadespachos[i];
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
                    formData.append('Otros[' + i + ']', otro);
                }
                for (var i = 0; i < this.validacionCompras.length; i++) {
                    let validacion = this.validacionCompras[i];
                    formData.append('validacion_compras[' + i + ']', validacion);
                }
                if (this.AreaTrabajoId == '') {
                    var errorAreaTrabajo = document.getElementById('errorAreaTrabajo');
                    errorAreaTrabajo.style.display = ''
                }
                if (this.TipoTrabajoId == '') {
                    var errorTipoTrabajo = document.getElementById('errorTipoTrabajo');
                    errorTipoTrabajo.style.display = ''
                }
                if (this.FechaEjecución == '') {
                    var errorFechaEjecución = document.getElementById('errorFechaEjecución');
                    errorFechaEjecución.style.display = ''
                }
                if (this.TipoGastoid == '') {
                    var errorTipoGasto = document.getElementById('errorTipoGasto');
                    errorTipoGasto.style.display = ''
                }
                if (this.TipoBoletaId == '') {
                    var errorTipoBoleta = document.getElementById('errorTipoBoleta');
                    errorTipoBoleta.style.display = ''
                }
                if (this.TipoMonedaId == '') {
                    var errorTipoMoneda = document.getElementById('errorTipoMoneda');
                    errorTipoMoneda.style.display = ''
                }
                if (this.activo == '' && this.servicio == '') {
                    var errorCosto1 = document.getElementById('errorCosto1');
                    errorCosto1.style.display = ''
                    var errorCosto2 = document.getElementById('errorCosto2');
                    errorCosto2.style.display = ''
                }
                if (this.idproveedor == '') {
                    var errorProveedor = document.getElementById('errorProveedor');
                    errorProveedor.style.display = ''
                }
                if (this.TipoGastoid == 4) {
                    if (this.ContingenciaId == '') {
                        var errorTipoContingencia = document.getElementById('errorTipoContingencia');
                        errorTipoContingencia.style.display = ''
                    }
                }
                if (this.AreaTrabajoId != '' && this.TipoTrabajoId != '' && this.FechaEjecución != '' && this.TipoGastoid != '' && this.TipoBoletaId != '' && this.TipoMonedaId != '' && this.idproveedor != '' && this.TipoGastoid != '') {
                    if (this.activo != '' || this.servicio != '') {

                        if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                            var cartaAdjudicación = document.getElementById('cartaAdjudicaciones');
                            var lpu = document.getElementById('lpus');

                            if (this.usuario.rol == 34) {
                                if (this.validacion_compras_ticket != 0) {
                                    this.load_data = 1;
                                    axios.post('/CreateformSgc/' + this.$route.params.id, formData, {
                                        headers: {
                                            'Content-Type': 'multipart/form-data'
                                        }
                                    }).then((response) => {
                                        this.mensaje_confirmacion = response.data
                                        this.sendMail(response.data)
                                    }).finally(() => this.end_create_request())
                                    return;
                                } else {

                                    this.alertFunctionMessage('error', 'Te faltan subir cotizaciones o archivo de validación de compras')
                                    return;
                                }
                            }

                            if (this.TipoTrabajoId == 9 && this.cartaAdjudicaciones.length != 0 || this.TipoTrabajoId == 11 && this.lpus.length != 0 || this.validacionCompras.length != 0) {
                                this.load_data = 1;
                                axios.post('/CreateformSgc/' + this.$route.params.id, formData, {
                                    headers: {
                                        'Content-Type': 'multipart/form-data'
                                    }
                                }).then((response) => {
                                    this.mensaje_confirmacion = response.data
                                    this.sendMail(response.data)

                                }).finally(() => this.end_create_request())
                            } else {
                                if (this.TipoTrabajoId == 9) {
                                    this.nombreMensajeTrabajo = 'carta de adjudicación';
                                }
                                if (this.TipoTrabajoId == 11) {
                                    this.nombreMensajeTrabajo = 'LPU';
                                }
                                this.$swal({
                                    type: 'error',
                                    title: 'Debes cargar la ' + ' ' + this.nombreMensajeTrabajo,
                                    showCloseButton: true,
                                });
                            }
                        } else {
                            if (this.TipoMonedaId == 1) {
                                if (this.activo > this.valor_limite || this.servicio > this.valor_limite) {
                                    var TotalArchivosC = this.cotizacion_ticket + this.cotizaciones.length;

                                    if (this.usuario.rol == 34) {
                                        if (this.validacion_compras_ticket != 0) {
                                            this.load_data = 1;
                                            axios.post('/CreateformSgc/' + this.$route.params.id, formData, {
                                                headers: {
                                                    'Content-Type': 'multipart/form-data'
                                                }
                                            }).then((response) => {
                                                this.mensaje_confirmacion = response.data
                                                this.sendMail(response.data)
                                            }).finally(() => this.end_create_request())
                                            return;
                                        } else {

                                            this.alertFunctionMessage('error', 'Te faltan subir cotizaciones o archivo de validación de compras')
                                            return;
                                        }
                                    }


                                    if (TotalArchivosC >= 3 || this.cpu == 1 && this.cotizaciones.length >= 1 || this.cpu == 1 && this.cotizacion_ticket >= 1 || this.cotizaciones.length != 0 && this.cartaAdjudicaciones.length != 0 || this.validacionCompras.length != 0) {
                                        this.load_data = 1;
                                        axios.post('/CreateformSgc/' + this.$route.params.id, formData, {
                                            headers: {
                                                'Content-Type': 'multipart/form-data'
                                            }
                                        }).then((response) => {
                                            this.mensaje_confirmacion = response.data
                                            this.sendMail(response.data)
                                        }).finally(() => this.end_create_request())
                                    } else {
                                        if (this.cpu == '' && TotalArchivosC <= 0 || TotalArchivosC < 3) {
                                            this.$swal({
                                                type: 'error',
                                                title: 'Te faltan subir cotizaciones o crear la carta de proveedor unico',
                                                showCloseButton: true,
                                            });
                                        }

                                    }
                                } else {
                                    if (this.activo <= this.valor_limite || this.servicio <= this.valor_limite) {
                                        var TotalArchivosC = this.cotizacion_ticket + this.cotizaciones.length;

                                        if (this.usuario.rol == 34) {
                                            if (this.validacion_compras_ticket != 0) {
                                                this.load_data = 1;
                                                axios.post('/CreateformSgc/' + this.$route.params.id, formData, {
                                                    headers: {
                                                        'Content-Type': 'multipart/form-data'
                                                    }
                                                }).then((response) => {
                                                    this.mensaje_confirmacion = response.data
                                                    this.sendMail(response.data)
                                                }).finally(() => this.end_create_request())
                                                return;
                                            } else {

                                                this.alertFunctionMessage('error', 'Te faltan subir cotizaciones o archivo de validación de compras')
                                                return;
                                            }
                                        }

                                        if (TotalArchivosC == 0) {
                                            this.$swal({
                                                type: 'error',
                                                title: 'Debes subir una cotización',
                                                showCloseButton: true,
                                            });
                                        } else {
                                            this.load_data = 1;
                                            axios.post('/CreateformSgc/' + this.$route.params.id, formData, {
                                                headers: {
                                                    'Content-Type': 'multipart/form-data'
                                                }
                                            }).then((response) => {
                                                this.mensaje_confirmacion = response.data
                                                this.sendMail(response.data)
                                            }).finally(() => this.end_create_request())
                                        }
                                    }
                                }
                            } else {
                                if (this.TipoMonedaId == 2 || this.TipoMonedaId == 3 || this.TipoMonedaId == 4) {
                                    if (this.conversionServicio > this.valor_limite || this.conversionActivo > this.valor_limite) {
                                        var TotalArchivosC = this.cotizacion_ticket + this.cotizaciones.length;

                                        if (this.usuario.rol == 34) {
                                            if (this.validacion_compras_ticket != 0) {
                                                this.load_data = 1;
                                                axios.post('/CreateformSgc/' + this.$route.params.id, formData, {
                                                    headers: {
                                                        'Content-Type': 'multipart/form-data'
                                                    }
                                                }).then((response) => {
                                                    this.mensaje_confirmacion = response.data
                                                    this.sendMail(response.data)
                                                }).finally(() => this.end_create_request())
                                                return;
                                            } else {

                                                this.alertFunctionMessage('error', 'Te faltan subir cotizaciones o archivo de validación de compras')
                                                return;
                                            }
                                        }

                                        if (TotalArchivosC >= 3 || this.cpu == 1 && TotalArchivosC >= 1 || this.cotizaciones.length != 0 && this.cartaAdjudicaciones.length != 0 || this.validacionCompras.length != 0) {
                                            this.load_data = 1;
                                            axios.post('/CreateformSgc/' + this.$route.params.id, formData, {
                                                headers: {
                                                    'Content-Type': 'multipart/form-data'
                                                }
                                            }).then((response) => {
                                                this.mensaje_confirmacion = response.data
                                                this.sendMail(response.data)
                                            }).finally(() => this.end_create_request())
                                        } else {
                                            if (this.cpu == '' && TotalArchivosC <= 0 || TotalArchivosC < 3) {
                                                this.$swal({
                                                    type: 'error',
                                                    title: 'Te faltan subir cotizaciones o crear la carta de proveedor unico',
                                                    showCloseButton: true,
                                                });
                                            }
                                        }
                                    } else {
                                        if (this.conversionServicio <= this.valor_limite || this.conversionActivo <= this.valor_limite) {
                                            var TotalArchivosC = this.cotizacion_ticket + this.cotizaciones.length;

                                            if (this.usuario.rol == 34) {
                                                if (this.validacion_compras_ticket != 0) {
                                                    this.load_data = 1;
                                                    axios.post('/CreateformSgc/' + this.$route.params.id, formData, {
                                                        headers: {
                                                            'Content-Type': 'multipart/form-data'
                                                        }
                                                    }).then((response) => {
                                                        this.mensaje_confirmacion = response.data
                                                        this.sendMail(response.data)
                                                    }).finally(() => this.end_create_request())
                                                    return;
                                                } else {

                                                    this.alertFunctionMessage('error', 'Te faltan subir cotizaciones o archivo de validación de compras')
                                                    return;
                                                }
                                            }

                                            if (TotalArchivosC == 0) {
                                                this.$swal({
                                                    type: 'error',
                                                    title: 'Debes subir una cotización',
                                                    showCloseButton: true,
                                                });
                                            } else {
                                                this.load_data = 1;
                                                axios.post('/CreateformSgc/' + this.$route.params.id, formData, {
                                                    headers: {
                                                        'Content-Type': 'multipart/form-data'
                                                    }
                                                }).then((response) => {
                                                    this.mensaje_confirmacion = response.data
                                                    this.sendMail(response.data)
                                                }).finally(() => this.end_create_request())
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            },
            sendMail(mensaje) {
                axios.get('/send/generic/mail/platform', {
                    params: {
                        'ticket_id': this.$route.params.id,
                        'plataforma': 1,
                        'create_sgc': true,
                        'solicitudes': mensaje
                    }
                }).then((response) => {

                })
            },
            TransformDinnerDeleErrorActivo: function () {

                if (this.activo == 0) {
                    this.$swal({
                        type: 'error',
                        title: 'Error',
                        text: 'El activo debe ser un valor distinto de cero',
                        showCloseButton: true,
                    });
                    this.activo = '';
                }
                if (this.activo != '' || this.servicio != '') {
                    var errorCosto1 = document.getElementById('errorCosto1');
                    errorCosto1.style.display = 'none'
                    var errorCosto2 = document.getElementById('errorCosto2');
                    errorCosto2.style.display = 'none'
                }

                axios.get(`/GetValues?TipoMoneda=${this.TipoMonedaId}`).then((response) => {
                    var TotalArchivosC = this.cotizacion_ticket + this.cotizaciones.length;
                    this.valorTipoMoneda = response.data;
                    if (this.TipoMonedaId == 2 || this.TipoMonedaId == 3 || this.TipoMonedaId == 4) {
                        if (this.activo != '') {
                            this.conversionActivo = parseInt(this.activo) * this.valorTipoMoneda
                            if (this.conversionActivo > this.valor_limite) {
                                if (this.validacion_compras_ticket != 0) {
                                    this.alertFunctionMessage('success', 'Actualmente tienes ' + this.validacion_compras_ticket + ' archivo de validación de compras cargadas en el ticket, puedes crear tu solicitud')
                                    return;
                                }
                                if (this.TipoTrabajoId != 9 && this.TipoTrabajoId != 11) {
                                    if (TotalArchivosC == 0) {

                                        this.alertFunctionMessage('warning', 'Tienes 4 opciones, subir 3 cotizaciones, subir 1 cotización y carta de proovedor unico, subir una cotización y  una carta de adjudicación o validación de compras')

                                    } else {
                                        if (TotalArchivosC >= 0 && TotalArchivosC < 3) {

                                            this.alertFunctionMessage('warning', 'Actualmente tienes' + ' ' + TotalArchivosC + ' ' + 'cotizaciones cargada(s), puedes subir las cotizaciones faltantes o crear la carta de proveedor unico')

                                        } else {
                                            if (TotalArchivosC == 3) {

                                                this.alertFunctionMessage('success', 'Actualmente tienes' + ' ' + TotalArchivosC + ' ' + 'cotizaciones cargadas en el ticket, puedes crear tu solicitud')

                                            }
                                        }
                                    }
                                } else {
                                    if (this.TipoTrabajoId == 9) {
                                        this.nombreMensajeTrabajo = 'carta de adjudicación';
                                    }
                                    if (this.TipoTrabajoId == 11) {
                                        this.nombreMensajeTrabajo = 'LPU';
                                    }

                                    this.alertFunctionMessage('warning', 'Debes subir una' + ' ' + this.nombreMensajeTrabajo)

                                }
                            } else {
                                if (this.conversionActivo < this.valor_limite) {
                                    if (this.validacion_compras_ticket != 0) {
                                        this.alertFunctionMessage('success', 'Actualmente tienes ' + this.validacion_compras_ticket + ' archivo de validación de compras cargadas en el ticket, puedes crear tu solicitud')
                                        return;
                                    }
                                    if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                                        if (this.TipoTrabajoId == 9) {
                                            this.nombreMensajeTrabajo = 'carta de adjudicación';
                                        }
                                        if (this.TipoTrabajoId == 11) {
                                            this.nombreMensajeTrabajo = 'LPU';
                                        }

                                        this.alertFunctionMessage('warning', 'Debes subir una' + ' ' + this.nombreMensajeTrabajo)

                                    } else {
                                        if (TotalArchivosC == 0) {
                                            this.alertFunctionMessage('warning', 'Debe subir una cotización')

                                        } else {

                                            if (TotalArchivosC != 0) {
                                                this.alertFunctionMessage('success', 'Actualmente tienes' + ' ' + TotalArchivosC + ' ' + 'cotización cargada en el ticket, puedes  crear tu solicitud')


                                            }

                                        }
                                    };
                                }
                            }
                        }
                    } else {
                        if (this.TipoMonedaId == 1) {
                            if (this.activo != '') {
                                if (this.activo > this.valor_limite) {
                                    if (this.validacion_compras_ticket != 0) {
                                        this.alertFunctionMessage('success', 'Actualmente tienes ' + this.validacion_compras_ticket + ' archivo de validación de compras cargadas en el ticket, puedes crear tu solicitud')
                                        return;
                                    }
                                    if (this.TipoTrabajoId != 9 && this.TipoTrabajoId != 11) {
                                        if (TotalArchivosC == 0) {
                                            this.alertFunctionMessage('warning', 'Tienes 3 opciones, subir 3 cotizaciones, subir 1 cotización y carta de proovedor unico o subir una cotización y una carta de adjudicación')

                                        } else {
                                            if (TotalArchivosC >= 0 && TotalArchivosC < 3) {
                                                this.$swal({
                                                    type: 'warning',
                                                    title: 'Actualmente tienes' + ' ' + this.cotizacion_ticket + ' ' + 'cotizaciones cargada(s), puedes subir las cotizaciones faltantes o crear la carta de proveedor unico',
                                                    confirmButtonText: 'OK',
                                                }).then((result) => {

                                                    if (result.value == true) {
                                                        this.saldoCeco();
                                                    }
                                                });
                                            } else {
                                                if (TotalArchivosC == 3) {
                                                    this.$swal({
                                                        type: 'success',
                                                        title: 'Actualmente tienes' + ' ' + TotalArchivosC + ' ' + 'cotizaciónes cargadas en el ticket, puedes  crear tu solicitud',
                                                        confirmButtonText: 'OK',
                                                    }).then((result) => {

                                                        if (result.value == true) {
                                                            this.saldoCeco();
                                                        }
                                                    });
                                                }
                                            }
                                        }
                                    } else {
                                        if (this.TipoTrabajoId == 9) {
                                            this.nombreMensajeTrabajo = 'carta de adjudicación';
                                        }
                                        if (this.TipoTrabajoId == 11) {
                                            this.nombreMensajeTrabajo = 'LPU';
                                        }
                                        this.$swal({
                                            type: 'warning',
                                            title: 'Debes subir una ' + ' ' + this.nombreMensajeTrabajo,
                                            confirmButtonText: 'OK',
                                        }).then((result) => {

                                            if (result.value == true) {
                                                this.saldoCeco();
                                            }
                                        });
                                    }
                                } else {
                                    if (this.activo < this.valor_limite) {
                                        if (this.validacion_compras_ticket != 0) {
                                            this.alertFunctionMessage('success', 'Actualmente tienes ' + this.validacion_compras_ticket + ' archivo de validación de compras cargadas en el ticket, puedes crear tu solicitud')
                                            return;
                                        }
                                        if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                                            if (this.TipoTrabajoId == 9) {
                                                this.nombreMensajeTrabajo = 'carta de adjudicación';
                                            }
                                            if (this.TipoTrabajoId == 11) {
                                                this.nombreMensajeTrabajo = 'LPU';
                                            }
                                            this.$swal({
                                                type: 'warning',
                                                title: 'Debes subir una ' + ' ' + this.nombreMensajeTrabajo,
                                                confirmButtonText: 'OK',
                                            }).then((result) => {

                                                if (result.value == true) {
                                                    this.saldoCeco();
                                                }
                                            });
                                        } else {
                                            if (TotalArchivosC == 0) {
                                                this.$swal({
                                                    type: 'warning',
                                                    title: 'Debe subir una cotización',
                                                    confirmButtonText: 'OK',
                                                }).then((result) => {

                                                    if (result.value == true) {
                                                        this.saldoCeco();
                                                    }
                                                });
                                            } else {
                                                if (TotalArchivosC != 0) {
                                                    this.$swal({
                                                        type: 'success',
                                                        title: 'Actualmente tienes' + ' ' + TotalArchivosC + ' ' + 'cotización cargada en el ticket, puedes  crear tu solicitud',
                                                        confirmButtonText: 'OK',
                                                    }).then((result) => {

                                                        if (result.value == true) {
                                                            this.saldoCeco();
                                                        }
                                                    });
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                })

            },
            TransformDinnerDeleErrorServicio: function () {
                if (this.servicio == 0) {
                    this.$swal({
                        type: 'error',
                        title: 'Error',
                        text: 'El servicio debe ser un valor distinto de cero',
                        showCloseButton: true,
                    });
                    this.servicio = '';
                }
                if (this.activo != '' || this.servicio != '') {
                    var errorCosto1 = document.getElementById('errorCosto1');
                    errorCosto1.style.display = 'none'
                    var errorCosto2 = document.getElementById('errorCosto2');
                    errorCosto2.style.display = 'none'
                }
                axios.get(`/GetValues?TipoMoneda=${this.TipoMonedaId}`).then((response) => {
                    var TotalArchivosC = this.cotizacion_ticket + this.cotizaciones.length;
                    this.valorTipoMoneda = response.data;
                    if (this.TipoMonedaId == 2 || this.TipoMonedaId == 3 || this.TipoMonedaId == 4) {
                        if (this.servicio != '') {
                            this.conversionServicio = parseInt(this.servicio) * this.valorTipoMoneda
                            if (this.conversionServicio > this.valor_limite) {
                                if (this.validacion_compras_ticket != 0) {
                                    this.alertFunctionMessage('success', 'Actualmente tienes ' + this.validacion_compras_ticket + ' archivo de validación de compras cargadas en el ticket, puedes crear tu solicitud')
                                    return;
                                }
                                if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                                    if (this.TipoTrabajoId == 9) {
                                        this.nombreMensajeTrabajo = 'carta de adjudicación';
                                    }
                                    if (this.TipoTrabajoId == 11) {
                                        this.nombreMensajeTrabajo = 'LPU';
                                    }
                                    this.$swal({
                                        type: 'warning',
                                        title: 'Debes subir una ' + ' ' + this.nombreMensajeTrabajo,
                                        confirmButtonText: 'OK',
                                    }).then((result) => {
                                        console.log(result.value)
                                        if (result.value == true) {
                                            this.saldoCeco();
                                        }
                                    });
                                } else {
                                    if (TotalArchivosC == 0) {
                                        this.$swal({
                                            type: 'warning',
                                            title: 'Tienes 4 opciones, subir 3 cotizaciones, subir 1 cotización y carta de proovedor unico, subir una cotización y  una carta de adjudicación o validación de compras',
                                            confirmButtonText: 'OK',
                                        }).then((result) => {
                                            console.log(result.value)
                                            if (result.value == true) {
                                                this.saldoCeco();
                                            }
                                        });
                                    } else {
                                        if (TotalArchivosC >= 0 && TotalArchivosC < 3) {
                                            this.$swal({
                                                type: 'warning',
                                                title: 'Actualmente tienes' + ' ' + TotalArchivosC + ' ' + 'cotización cargada, puedes subir las cotizaciones faltantes o crear la carta de proveedor unico',
                                                confirmButtonText: 'OK',
                                            }).then((result) => {
                                                console.log(result.value)
                                                if (result.value == true) {
                                                    this.saldoCeco();
                                                }
                                            });
                                        } else {
                                            if (TotalArchivosC == 3) {
                                                this.$swal({
                                                    type: 'success',
                                                    title: 'Actualmente tienes' + ' ' + TotalArchivosC + ' ' + 'cotización cargada en el ticket, puedes crear tu solicitud',
                                                    confirmButtonText: 'OK',
                                                }).then((result) => {
                                                    console.log(result.value)
                                                    if (result.value == true) {
                                                        this.saldoCeco();
                                                    }
                                                });
                                            }
                                        }
                                    }
                                }
                            } else {
                                if (this.conversionServicio < this.valor_limite) {
                                    if (this.validacion_compras_ticket != 0) {
                                        this.alertFunctionMessage('success', 'Actualmente tienes ' + this.validacion_compras_ticket + ' archivo de validación de compras cargadas en el ticket, puedes crear tu solicitud')
                                        return;
                                    }
                                    if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                                        if (this.TipoTrabajoId == 9) {
                                            this.nombreMensajeTrabajo = 'carta de adjudicación';
                                        }
                                        if (this.TipoTrabajoId == 11) {
                                            this.nombreMensajeTrabajo = 'LPU';
                                        }
                                        this.$swal({
                                            type: 'warning',
                                            title: 'Debes subir una ' + ' ' + this.nombreMensajeTrabajo,
                                            confirmButtonText: 'OK',
                                        }).then((result) => {
                                            console.log(result.value)
                                            if (result.value == true) {
                                                this.saldoCeco();
                                            }
                                        });
                                    } else {
                                        if (TotalArchivosC == 0) {
                                            this.$swal({
                                                type: 'warning',
                                                title: 'Debes subir una cotización',
                                                confirmButtonText: 'OK',
                                            }).then((result) => {
                                                console.log(result.value)
                                                if (result.value == true) {
                                                    this.saldoCeco();
                                                }
                                            });
                                        } else {
                                            if (TotalArchivosC != 0) {
                                                this.$swal({
                                                    type: 'success',
                                                    title: 'Actualmente tienes' + ' ' + TotalArchivosC + ' ' + 'cotización cargada en el ticket, puedes crear tu solicitud',
                                                    confirmButtonText: 'OK',
                                                }).then((result) => {
                                                    console.log(result.value)
                                                    if (result.value == true) {
                                                        this.saldoCeco();
                                                    }
                                                });
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        if (this.TipoMonedaId == 1) {
                            if (this.servicio != '') {
                                if (this.servicio > this.valor_limite) {
                                    if (this.validacion_compras_ticket != 0) {
                                        this.alertFunctionMessage('success', 'Actualmente tienes ' + this.validacion_compras_ticket + ' archivo de validación de compras cargadas en el ticket, puedes crear tu solicitud')
                                        return;
                                    }
                                    if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                                        if (this.TipoTrabajoId == 9) {
                                            this.nombreMensajeTrabajo = 'carta de adjudicación';
                                        }
                                        if (this.TipoTrabajoId == 11) {
                                            this.nombreMensajeTrabajo = 'LPU';
                                        }
                                        this.$swal({
                                            type: 'warning',
                                            title: 'Debes subir una ' + ' ' + this.nombreMensajeTrabajo,
                                            confirmButtonText: 'OK',
                                        }).then((result) => {
                                            console.log(result.value)
                                            if (result.value == true) {
                                                this.saldoCeco();
                                            }
                                        });
                                    } else {
                                        if (TotalArchivosC == 0) {
                                            this.$swal({
                                                type: 'warning',
                                                title: 'Tienes 3 opciones, subir 3 cotizaciones, subir 1 cotización y carta de proovedor unico o subir una cotización y una carta de adjudicación',
                                                confirmButtonText: 'OK',
                                            }).then((result) => {
                                                console.log(result.value)
                                                if (result.value == true) {
                                                    this.saldoCeco();
                                                }
                                            });
                                        } else {
                                            if (TotalArchivosC >= 0 && TotalArchivosC < 3) {
                                                this.$swal({
                                                    type: 'warning',
                                                    title: 'Actualmente tienes' + ' ' + TotalArchivosC + ' ' + 'cotización cargada, puedes subir las cotizaciones faltantes o crear la carta de proveedor unico',
                                                    confirmButtonText: 'OK',
                                                }).then((result) => {
                                                    console.log(result.value)
                                                    if (result.value == true) {
                                                        this.saldoCeco();
                                                    }
                                                });
                                            } else {
                                                if (TotalArchivosC == 3) {
                                                    this.$swal({
                                                        type: 'success',
                                                        title: 'Actualmente tienes' + ' ' + TotalArchivosC + ' ' + 'cotización cargada en el ticket, puedes crear tu solicitud',
                                                        confirmButtonText: 'OK',
                                                    }).then((result) => {
                                                        console.log(result.value)
                                                        if (result.value == true) {
                                                            this.saldoCeco();
                                                        }
                                                    });
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    if (this.servicio < this.valor_limite) {
                                        if (this.validacion_compras_ticket != 0) {
                                            this.alertFunctionMessage('success', 'Actualmente tienes ' + this.validacion_compras_ticket + ' archivo de validación de compras cargadas en el ticket, puedes crear tu solicitud')
                                            return;
                                        }
                                        if (this.TipoTrabajoId == 9 || this.TipoTrabajoId == 11) {
                                            if (this.TipoTrabajoId == 9) {
                                                this.nombreMensajeTrabajo = 'carta de adjudicación';
                                            }
                                            if (this.TipoTrabajoId == 11) {
                                                this.nombreMensajeTrabajo = 'LPU';
                                            }
                                            this.$swal({
                                                type: 'warning',
                                                title: 'Debes subir una ' + ' ' + this.nombreMensajeTrabajo,
                                                confirmButtonText: 'OK',
                                            }).then((result) => {
                                                console.log(result.value)
                                                if (result.value == true) {
                                                    this.saldoCeco();
                                                }
                                            });
                                        } else {
                                            if (TotalArchivosC == 0) {
                                                this.$swal({
                                                    type: 'warning',
                                                    title: 'Debes subir una cotización',
                                                    confirmButtonText: 'OK',
                                                }).then((result) => {
                                                    console.log(result.value)
                                                    if (result.value == true) {
                                                        this.saldoCeco();
                                                    }
                                                });
                                            } else {
                                                if (TotalArchivosC != 0) {
                                                    this.$swal({
                                                        type: 'success',
                                                        title: 'Actualmente tienes' + ' ' + TotalArchivosC + ' ' + 'cotización cargada en el ticket, puedes crear tu solicitud',
                                                        confirmButtonText: 'OK',
                                                    }).then((result) => {
                                                        console.log(result.value)
                                                        if (result.value == true) {
                                                            this.saldoCeco();
                                                        }
                                                    });
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                })


            },
            saldoCeco: function () {



            },
            successAlert: function (mensaje) {
                this.$swal({
                    type: 'success',
                    title: mensaje,
                    showCloseButton: true,
                });
            },
            alertCuentaCeco: function (mensaje) {
                this.$swal({
                    type: 'warning',
                    title: mensaje,
                    showCloseButton: true,
                });
            },
            SelectProveedor: function (proveedor) {
                this.proveedor_info_select = proveedor.PROVEEDOR.toLowerCase();
                this.idproveedor = proveedor.id;
                this.Buscarproveedor = '';
                document.getElementById('SearchproveedorDontDisplay').style.display = 'none';
                document.getElementById('SelectProveedor').style.display = 'block';
                document.getElementById('listProveedor').style.display = 'none';
                document.getElementById('errorProveedor').style.display = 'none';
            },
            BuscarProveedor: function () {
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
            end_create_request: function () {
                this.load_data = 0;
                EventBus.$emit('sgc.CloseFormTicket');
                this.successAlert(this.mensaje_confirmacion);
                this.cleanData();
            },
            get_total_cotizaciones_ticket: function () {
                axios.get('/total-cotizaciones-ticket/' + this.$route.params.id).then(response => {
                    this.cotizacion_ticket = response.data;

                })

            },
            getFileExtension: function (filename) {
                return (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename)[0] : undefined;
            },
            validar_boleta: function () {
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
            },
            alertFunctionMessage: function (Type, Title) {
                this.$swal({
                    type: Type,
                    title: Title,
                    confirmButtonText: 'OK',
                });
            }


        },




    }
</script>
        
 <form action="/CreateformSgc" enctype="multipart/form-data" id="sgcFormThis" method="GET">
            {{method_field('POST')}}
                    {{csrf_field()}}
           
        <div class="row" style="margin-top: -50px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12" id="SgcTkc" style="display: none">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(rgb(0, 92, 255), #007bff99);">
                            <div class="card-icon">
                                <i class="fas fa-pencil-alt" style="color: #42E8B4">
                                </i>
                            </div>
                            <h4>
                                Formulario SGC.
                            </h4>
                            <div class="card-description">
                                Ingrese los datos requeridos.
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="tickets-list">
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p style="color: #999999">
                                                    Área de trabajo *
                                                </p>
                                                <select @change.prevent="DeleteErrorSgcform" class="form-control" name="AreaTrabajo" v-model="AreaTrabajoId">
                                                    <option v-bind:value="trabajo.id" v-for="trabajo in area_trabajos">
                                                        @{{trabajo.descripcion}}
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
                                            <div class="form-group" id="textInpu">
                                                <p style="color: #999999">
                                                    Tipo de trabajo *
                                                </p>
                                                <select @change.prevent="DeleteErrorSgcform" class="form-control" name="TipoTrabajo" v-model="TipoTrabajoId">
                                                    <option v-bind:value="Tipo_trabajo.id" v-for="Tipo_trabajo in Tipo_trabajos">
                                                        @{{Tipo_trabajo.nombre_trabajo}}
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
                                            <div class="form-group" id="textInpu">
                                                <p style="color: #999999">
                                                    Fecha Ejecución *
                                                </p>
                                                <input @change.prevent="DeleteErrorSgcform" class="form-control " id="" name="FechaEjecución" style="color:#999999" type="date" v-model="FechaEjecución">
                                                    <div id="errorFechaEjecución" style="display: none">
                                                        <p style="color: red">
                                                            Favor indicar la fecha de ejecuión
                                                        </p>
                                                    </div>
                                             
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div id="searchproveedor">
                                                <div class="form-group" id="textInpu">
                                                    <p style="color: #999999">
                                                        Proveedor *
                                                    </p>
                                                    <input name="ProveedorId" style="display: none" type="text" v-bind:value="idproveedor">
                                                        <input @click.prevent="searchNewProveedor" class="form-control" id="SelectProveedor" name="SelectProveedor" style="display: none" type="text" value="">
                                                            <input class="form-control " id="SearchproveedorDontDisplay" name="Proveedor" placeholder="Buscar proveedor" style="color:#999999" type="text" v-model="Buscarproveedor" v-on:keyup="BuscarProveedor">
                                                                <div class="row" id="listProveedor" style="display:none;">
                                                                    <div class="col-lg-12 col-md-4 col-sm-4 col-10 shadow-box-ag full-height-scroll " style="max-height:120px;overflow-y:auto;border-radius: 10px;">
                                                                        <div v-for="proveedor in Proveedores">
                                                                            <a @click.prevent="SelectProveedor(proveedor.id,proveedor.PROVEEDOR)" class="changeColor" href="" id="selectProveedorvalue">
                                                                                @{{proveedor.PROVEEDOR.toLowerCase()}}
                                                                                <hr style="margin-top: -1px;"/>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="errorProveedor" style="display: none">
                                                                    <p style="color: red">
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
                                                <p style="color: #999999">
                                                    Tipo boleta *
                                                </p>
                                                <select @change.prevent="DeleteErrorSgcform" class="form-control" name="TipoBoleta" v-model="TipoBoletaId">
                                                    <option v-bind:value="Tipo_boleta.id" v-for="Tipo_boleta in Tipo_boletas">
                                                        @{{Tipo_boleta.descripcion}}
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
                                            <div class="form-group" id="textInpu">
                                                <p style="color: #999999">
                                                    Nro Boelta
                                                </p>
                                                <input class="form-control " id="" name="TipoMoneda" style="color:#999999" type="text">
                                           
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p style="color: #999999">
                                                    Tipo Moneda *
                                                </p>
                                                <select @change.prevent="DeleteErrorSgcform" class="form-control" name="TipoMoneda" v-model="TipoMonedaId">
                                                    <option v-bind:value="Tipo_moneda.id" v-for="  Tipo_moneda in   Tipo_monedas">
                                                        @{{Tipo_moneda.moneda}}
                                                    </option>
                                                </select>
                                                <div id="errorTipoMoneda" style="display: none">
                                                    <p style="color: red">
                                                        Favor seleccionar tipo de moneda
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p style="color: #999999">
                                                    Formato de pago *
                                                </p>
                                                <select @change.prevent="DeleteErrorSetContingencia" class="form-control" name="TipoGasto" v-model="TipoGastoid">
                                                    <option v-bind:value="Tipo_gasto.id" v-for="Tipo_gasto in Tipo_gastos">
                                                        @{{Tipo_gasto.nombre_gasto}}
                                                    </option>
                                                </select>
                                                <div id="errorTipoGasto" style="display: none">
                                                    <p style="color: red">
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
                                                <p style="color: #999999">
                                                    Tipo contingencia*
                                                </p>
                                                <select @change.prevent="DeleteErrorSgcform" class="form-control" disabled="true" id="tipoGasto" name="TipoContingencia" v-model="ContingenciaId">
                                                    <option v-bind:value="Tipo_contingencia.id" v-for="Tipo_contingencia in Tipo_contingencias">
                                                        @{{Tipo_contingencia.nombre_contingencia}}
                                                    </option>
                                                </select>
                                                <div id="errorTipoContingencia" style="display: none">
                                                    <p style="color: red">
                                                        Favor seleccionar una contingencia
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p style="color: #999999">
                                                    Costos activos
                                                </p>
                                                <input @change.prevent="TransformDinnerDeleErrorActivo" class="form-control " id="" name="Activo" style="color:#999999;width: 100%" type="number" v-model="activo">
                                                    <div id="errorCosto1" style="display: none">
                                                        <p style="color: red">
                                                            Favor indicar un tipo de costo
                                                        </p>
                                                    </div>
                                        
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p style="color: #999999">
                                                    Costos servicios
                                                </p>
                                                <input @change.prevent="TransformDinnerDeleErrorServicio" class="form-control " id="" name="Servicio" style="color:#999999;width: 100%" type="number" v-model="servicio">
                                                    <div id="errorCosto2" style="display: none">
                                                        <p style="color: red">
                                                            Favor indicar un tipo de costo
                                                        </p>
                                                    </div>
                                              
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="form-group" id="textInpu">
                                                <p style="color: #999999">
                                                    Nro° ework
                                                </p>
                                                <input class="form-control " id="" name="ework" style="color:#999999;width: 100%" type="number">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-lg-1 col-md-6 col-sm-6 col-12">
                                                <button class="btn shadow-box-ag boxBounce" data-target="#ModalArchivos" data-toggle="modal" id="archivo" style="background-color: #42e8b4;color:white;" type="button">
                                                    Cargar archivos
                                                </button>
                                            </div>
                                            <div class="col-lg-10 col-md-6 col-sm-6 col-12">
                                                <button @click.prevent="ShowModalCpuCloseThis" class="btn shadow-box-ag boxBounce " disabled="true" id="BtnCpu" style="background-color: #42e8b4;color:white;">
                                                    Crear CPU
                                                </button>
                                            </div>
                                            <div class="col-lg-1 col-md-6 col-sm-6 col-12">
                                                <button @click.prevent="CreatedSgcValidation" class="btn shadow-box-ag boxBounce " style="background-color: #3386ff;color:white;" type="button">
                                                    Crear
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="ModalArchivos" role="dialog" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content animated bounceIn">
                                        <div class="modal-header">
                                            <p class="modal-title" style="color: #999999;font-size: 28px;">
                                                Carga de archivos
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
                                                        <p class="title" style="color: #999999; font-size: 21px;">
                                                            <strong>
                                                             Cotizaciones
                                                            </strong>
                                                           
                                                        </p>
                                                        <div class="row" >
                                                            <div class="file-upload" style="margin-top: -20px">
                                                                <div class="image-upload-wrap">
                                                                    <input class="file-upload-input" multiple="" name="cotizacion" type="file"/>
                                                                    <div class="drag-text">
                                                                        <h2 style="font-size: 20px;">
                                                                            Arrastre o selecciones sus archivos.
                                                                        </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="tickets-list">
                                                    <div class="ticket-item">
                                                        <p class="title" style="color: #999999; font-size: 21px;">
                                                            <strong>
                                                            Informe  Final
                                                            </strong>
                                                           
                                                        </p>
                                                        <div class="row">
                                                            <div class="file-upload" >
                                                                <div class="image-upload-wrap">
                                                                    <input class="file-upload-input" multiple="" name="informefinal" type="file"/>
                                                                    <div class="drag-text">
                                                                        <h2 style="font-size: 20px;">
                                                                            Arrastre o selecciones sus archivos.
                                                                        </h2>
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


                            <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="ModalSgcCpu" role="dialog" tabindex="-1">
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
                                    <input class="form-control" disabled="true" id="ProveedorCPu" name="ProveedorCpu" type="text" value="">
                                   
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="form-group" id="textInpu">
                                    <p style="color: #999999">
                                        N° cotización
                                    </p>
                                    <input class="form-control" name="Ncotización Cpu" type="text">
                                  
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="form-group" id="textInpu">
                                    <p style="color: #999999">
                                        Moneda
                                    </p>
                                    <input class="form-control" name="totalCpu" type="text">
                                 
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
                                    <input @keyup.prevent="DeleteErrorCpu" class="form-control" name="NombreProyectoCpu" type="text" v-model="NombreProyecto">
                                   
                                    <div id="errorProyecto" style="display: none">
                                        <p style="color: red">
                                            Favor indicar Nombre del Proyecto/Tipo de compra
                                        </p>
                                    </div>
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
                                    <select @change.prevent="DeleteErrorCpu" name="NecesidadId " class="form-control" v-model="NecesidadId">
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
                                            "Proveedor indicado por el cliente final, ejemplo: Minsal, Banco Chile, etc."
                                        </option>
                                        <option value="3">
                                            <strong>
                                                Característica técnica unica:
                                            </strong>
                                            "solo un proveedor cumple con el requisito tecnico, plazos, etc."
                                        </option>
                                        <option value="4">
                                            <strong>
                                                Otro:
                                            </strong>
                                            "cuando la elección del proveedor no es ninguna de las anteriores"
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
                                    <textarea @keyup.prevent="DeleteErrorCpu" class="form-control" name="Necesidades" style="height: 150px;" v-model="descripcionNecesidades">
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
                                    <textarea class="form-control" name="descripcionProveedorCpu" placeholder="Ingrese observación" style="height: 150px;">
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
                                    Contratista/Proveedor no presenta relación comercial con personal de Entel y que implique conflicto de interez, en linea con el Código de Etica vigente.
                                </p>
                                <p>
                                    <strong>
                                        2-
                                    </strong>
                                    Para el caso de proveedores obligatorios, estos seran evaluados según el estándar mínimo legal y si su resultado fuera no recomendable sera informado al area solicitante quien deberá comunicar al cliente final a fin de apelar su obligatoriedad.
                                </p>
                                <p>
                                    <strong>
                                        3-
                                    </strong>
                                    El proveedor deberá ser creado y bloqueado(para proveedores nuevos) de acuerdo al procedimiento vigente N°COMP-05-00-P.
                                </p>
                                <div class="form-inline">
                                    <li>
                                        <input class="form-control" name="DeclaracionCpu" type="checkbox" v-model="declaracionCpu">
                                            <strong>
                                                Declaro estar en pleno cononcimento de no haber realizado el proceso de compra (bien y/o servicio) para el proveedor individualizado.
                                            </strong>
                                  
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
    </form>
    </div>
</div>



</form>            

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Events\CloseSessionLogoutEvent;
use App\Permiso_rol;

Route::get('/', 'AdminController@ifLoggin');

Auth::routes();
Route::get('/confirm-login-data', 'UserController@UserDataCheck');
Route::get('/FormCovid', 'FormCovidController@index');
Route::post('/createFormCovid', 'FormCovidController@store');
Route::get('/test', 'FileExperimentController@index');
Route::get('/confirmacionEmail', 'EmailConfirmController@confirmacionEmail');
Route::get('/GetZonas', 'SitioController@GetZonas');
Route::post('/CreateUserPortal', 'UserController@createUserPortal');
Route::get('/CopyfileDataE', 'ArchivoSgcController@CopyFile');
Route::get('/sheets', 'GoogleSheetsController@Googleconection');
Route::get('/formUser', function () {
    return view('portal.registro');
});
Route::get('/import-data-ing', function () {
    return view('masive.upload');
});



Route::get('/authUser', function () {
    if (Auth::check()) {
        return true;
    } else {
        return false;
    }
});
Route::get('/duplicarSgc', 'AdminController@duplicarSgc');

Route::get('/halted-montos', 'PopController@montos');

Route::get('/data-dashboard-powerbi-sgc', 'PowerBiDataController@index');

Route::get('/updatesolcitudes', 'AdminController@updatesolcitudes');
Route::post('/importsRequestIng', 'importController@importsRequestIng');
Route::get('/get-data-sgc', 'GetDataExcelController@getDataSgcCa');
Route::get('/get-data-new-sgc', 'GetDataExcelController@getDataSgcNew');

Route::post('/register-form-data-mbo', 'FormularioDataController@store');
Route::get('/form-data-mbo', 'FormularioDataController@index');
Route::get('/GetRequestCreateAccountUser', 'UserController@GetRequestCreateAccountUser');
Route::get('/CreateAccount', 'AccountController@CreateAccount');
Route::get('/hash', 'UserController@pass');
Route::get('/create-provider-account', 'ProveedorModuloController@createAccounts');
Route::get('/set-rol-proveedor', 'ProveedorModuloController@setRolProveedor');
Route::get('/setConfigurationProveedor', 'ProveedorModuloController@setConfigurationProveedor');
Route::get('/list-data-mbo', 'FormularioDataController@listData');
Route::post('/validate-data', 'FormularioDataController@validateData');

Route::post('/upload-coti-and-inf-sgc-file', 'AdminController@uploadCotizacionesInformefinal');
Route::get('/upload-coti', function () {
    return view('masive.upload');
});

Route::get('/logout/user', function () {
    Auth::logout();
    event(new CloseSessionLogoutEvent);

    return;
});
Route::get('/get/user', function () {
    return Auth::user();
});
Route::get('/logout/platform', function () {
    Auth::logout();
    event(new CloseSessionLogoutEvent);

    return redirect('/login');
});





route::middleware('auth')->group(function () {

    ///////////////// RUTAS CAMBIAR CONTRASENIA CONTRASENIA //////////////////////////////////
    Route::get('/verify-pass', 'UserController@verifyPass');
    Route::post('/change-pass', 'UserController@changePass');
    //////////////////////////////////////////////////////////////////////////////////////////////////

    route::middleware('updatePassword')->group(function () {
        ######################### MODULO RENDICION DE PAGO ####################
        Route::get('/data/form/payment', 'Surrender\SurrenderPaymentsController@getDataform');
        Route::post('/rendicion/store/payment', 'Surrender\SurrenderPaymentsController@storePayment');
        Route::post('/rendicion/store/tp', 'Surrender\SurrenderPaymentsController@storePaymentTp');
        Route::post('/rendicion/store/detail/payment', 'Surrender\SurrenderPaymentsController@storePaymentDetail');
        Route::post('/rendicion/store/files', 'Surrender\SurrenderPaymentsController@storePaymentFiles');
        Route::get(' /rendicion/surrenders', 'Surrender\SurrenderPaymentsController@getSurrenders');
        Route::post('/rendicion/update/state','Surrender\SurrenderPaymentsController@updateState');
        Route::get('/rendicion/filters', 'Surrender\SurrenderPaymentsController@getFilters');
        Route::get('/rendicion/export', 'Surrender\SurrenderPaymentsController@exportData');
        Route::get('/rendicion/add/oc','Surrender\SurrenderPaymentsController@addOc');
       


        //////////////////////////////////////////////////////////////////////////////////////////////////

        Route::get('/update/proveedores', 'AdminController@updateProveedores');

        Route::get('/admin/create/user/validateEmail', 'AdminController@validateEmail');
        Route::post('/admin/create/user', 'AdminController@createNewUser');
        Route::get('/sgc/folders/data', 'CarpetaController@sgcRequest');

        Route::get('/reporteAq', 'ExportController@reporteAq');
        Route::get('/reporteAqJson', 'Sgc\ReporteAqController@reporteAq');
        ///////////////// RUTAS PROVEEDOR MODULO  //////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////
        Route::get('/provider_update_ticket', 'ProveedorModuloController@updateJob');
        Route::get('/get_job_created', 'ProveedorModuloController@getJobCreated');
        Route::get('/proveedor_module', 'ProveedorModuloController@index');
        Route::get('/proveedor_solicitudes_sgc', 'ProveedorModuloController@getsolicitudSgc');
        Route::get('/get_type_contact', 'ContactTypeJobController@index');
        Route::post('/create_request_provider', 'ProveedorModuloController@store');
        Route::get('/rejected_job', 'ProveedorModuloController@rejectedJob');
        Route::get('/proveedor/export','ProveedorController@exportProveedor');
        //////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////

        ///////////////// RUTAS REPORT //////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////
        Route::get('/report/data/{option}', 'Report\ddSapController@getDataReportOption');
        Route::post('/upload/data/pep/report', 'Report\ddSapController@importData');
        Route::get('/update/data/base/report', 'Report\ddSapController@addDataBaseReport');
        Route::get('/data/base/report', 'Report\ddSapController@getDataConsolidadoBaseReporte');
        Route::get('/excel/export/base/report/{layout}', 'Report\ddSapController@exportBaseReporte');
        Route::get('/base/report/name/tabs/layout', 'Report\ddSapController@getHeadNames');
        Route::get('/get/layouts/created', 'Report\ddSapController@getAllLayouts');
        Route::post('/create/layout/base/report', 'Report\ddSapController@storeLayout');
        Route::post('/register/columns/layout', 'Report\ddSapController@storeLayoutColumns');





        //////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////
        Route::get('/update/estate/user', 'AdminController@updateUserStatus');
        Route::get('/user/detail/info', 'UserController@infoUser');
        Route::get('/admin/get/rol', 'UserController@getRoles');
        Route::get('/update/rol/user', 'UserController@updateRol');




        ///////////////// RUTAS REUTILIZABLES  //////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////

        Route::get('/search-technologie', 'TechnologiController@index');
        Route::get('/get-presupuesto-ceco', 'MontoCuentaCecoController@disponibleIngMes');
        Route::get('/monto-disponible-ceco-mes', 'MontoCuentaCecoController@montoDisponibleCeco');
        //////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////

        ///////////////// RUTAS MAIl   //////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////
        Route::get('/sendmailrechazosgc', 'MailController@RechazoSgc');
        Route::get('/SendMailCrmTicket', 'MailController@TicketMonitoreo');
        Route::get('/send/generic/mail/platform', 'MailController@sendMailChangeStatusTicket');
        Route::post('/send/mail/user/created', 'MailController@sendMailUserStore');


        ///////////////// RUTAS PARA CARGAR DATOS PSA ///////////////////////////////////////////////////
        Route::post('/upload_masive_data_psa', 'ImportPsaController@uploadMasiveRequest');

        Route::post('/upload_masive_data_delivery', 'ImportPsaController@uploadMasiveDataDeliveryPsa');

        ///////////////// RUTAS DE GENERACION DE ARCHIVOS EXCEL    //////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////
        Route::get('/SgcPmoControlIngExcelWithFilter', 'ExportController@SgcPmoControlIngExcelWithFilter');
        Route::get('/ticketExcelResago', 'ExportController@ticketExcelResago');
        Route::get('/SgcIngOymExcelWithFilter', 'ExportController@SgcIngOymExcelWithFilter');
        Route::get('/SgcSolicitudFilterExcelAll', 'ExportController@SgcSolicitudFilterExcelAll');
        Route::get('/solicitudExcelPsa', 'ExportController@ExportSolicitudPsa');
        Route::get('/InputacionExcel', 'ExportController@downloadInputacion');
        Route::get('/SgcIngIngExcelWithFilter', 'ExportController@SgcIngIngExcelWithFilter');
        Route::get('/TkcfilterExcel', 'ExportController@DonwloadTicketWithFilter');
        Route::get('/ticketExcel', 'ExportController@download');
        Route::get('/ticketExcelCurso', 'ExportController@downloadCurso');
        Route::get('/ticketExcelFin', 'ExportController@downloadFin');
        Route::get('/ticketExcelCrm/{crm}', 'ExportController@exportCrm');
        Route::get('/ticketExcelObrasCiviles', 'ExportController@OOCC');
        Route::get('/ticketExcelClima', 'ExportController@Clima');
        Route::get('/ticketExcelObrasCivilesCrm/{id}', 'ExportController@ObrasCrm');
        Route::get('/ticketExcelClimaCrm/{id}', 'ExportController@ClimaCrm');
        Route::get('/export-detalle-fechas-cesta-oc-das-user', 'ExportController@detalleCestaOCDasUser');
        Route::get('/export-data-tp-ticket-ingenieria', 'ExportController@reporteTpTicketIngenieria');
        //////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////

        ///////////////// RUTAS CONTROL PEP   //////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////
        Route::get('/saveHistoryRanking', 'HistoryRankingController@saveHistoryRanking');
        Route::get('/control-pep', 'ControlPepController@index');
        Route::get('/get-data-control-pep', 'ControlPepController@data');
        Route::get('/change-status-request/{id}', 'ControlPepController@changeStatus');
        Route::get('/calculate-total-sgc-pep', 'ControlPepController@calculateTotalSgcPep');
        Route::get('/data-pep-asociate/{id}', 'ControlPepController@dataPepAsociate');
        Route::post('/upload-pep-data', 'importController@ImportPepData');
        Route::get('/calculate-value-sgc/{id}', 'ControlPepController@calculateValueSgcConOc');
        Route::get('/old-data-ranking', 'ControlPepController@oldRanking');
        Route::get('/pep-export-excel', 'ExportController@exportDataPep');
        Route::get('/update-subestado-pep', 'ControlPepController@updateSubestado');
        Route::get('/update-pep-re-apertura', 'ControlPepController@updateReaperturaPep');
        Route::get('/set-estado-revision', 'ControlPepController@estadoRevision');
        Route::get('/back-subestado-pep', 'ControlPepController@backSubestado');
        //////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////

        Route::post('/changePassword', 'AdminController@changePassword');

        //////////////////////////  RUTAS MODULO SGC    //////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////

        //                        --rutas edición--
        Route::get('/reclasificar/solicitud', 'SgcEditController@reclasificarSolicitud');
        Route::get('/update-slc-apr-jefe-area/{id}', 'SgcAprobacionController@ArobarReenviarJefeArea');
        Route::get('/update-slc-apr-control/{id}', 'SgcAprobacionController@AprobarControl');
        Route::get('/updateslcapringoym/{id}', 'SgcAprobacionController@AprobarReenviarIngOym');
        Route::get('/update-slc-apr-validador/{id}', 'SgcAprobacionController@AprobarReenviarValidador');
        Route::get('/update-formato-pago', 'SgcEditController@editarFormatoPago');
        Route::get('/edit-fecha-ejecucion', 'SgcEditController@editarFechaEjecucion');
        Route::get('/addticketSgc', 'SgcEditController@addticketSgc');
        Route::get('/codSapUpdate', 'SgcEditController@codSapUpdate');
        Route::get('/tipoTrabajoIngupdateSgc', 'SgcEditController@EditTipoTrabajoIng');
        Route::get('/EditEstadoSolicitud', 'SgcEditController@EditEstadoSolicitud');
        Route::get('/UpdateEworkSgc', 'SgcEditController@UpdateEworkSgc');
        Route::get('/UpdateCotizacionSgc', 'SgcEditController@UpdateCotizacionSgc');
        Route::get('/DeleteFileSgc/{id}', 'SgcEditController@DeleteFileSgc');
        Route::post('/UploadFilesSgc', 'SgcEditController@UploadFilesSgc');
        Route::get('/UpdateDas', 'SgcEditController@editdasOym');
        Route::get('/UpdateOc', 'SgcEditController@editOc');
        Route::get('/UpdateCesta', 'SgcEditController@editCesta');
        Route::get('/updateTipoBoleta', 'SgcEditController@editTipoBoleta');
        Route::get('/editCostosSgc', 'SgcEditController@editCostosSgc');
        Route::get('/tipoTrabajoupdateSgc', 'SgcEditController@editTipoTrabajoOym');
        Route::get('/proveedorUpdatesgc', 'SgcEditController@editProveedor');
        Route::get('/updateSiteSgc', 'SgcEditController@editSite');
        Route::get('/editDescripcionSgc', 'SgcEditController@editDescripcion');
        Route::get('/editAreaTrabajoSgc', 'SgcEditController@editArea');
        Route::get('/userUpdatesgc', 'SgcEditController@editUser');
        Route::get('/editPmProyectoSgc', 'SgcEditIngenieriaController@editPmProyectoSgc');
        Route::get('/editPmInternoSgc', 'SgcEditIngenieriaController@editPmInternoSgc');
        Route::get('/editSolicitanteSgc', 'SgcEditIngenieriaController@editSolicitanteSgc');
        Route::get('/editTipoPagoSgc', 'SgcEditIngenieriaController@editTipoPagoSgc');
        Route::get('/editPGpon', 'SgcEditIngenieriaController@editPGpon');
        Route::get('/delete-montos', 'LiberacionPagoController@EliminarMonto');
        Route::get('/falla-movil-sgc/{id}', 'SgcEditController@FallaMovil');
        Route::get('/edit-numero-ticket-sgc', 'SgcEditController@editarNumeroTicket');
        Route::get('/sgc/edit/name/project', 'SgcEditController@editNameProject');


        //                    --rutas total solicitudes--
        Route::get('/GetTotalActivasControl', 'TotalSgcController@GetTotalActivasControl');
        Route::get('/GetTotalRechazadaControl', 'TotalSgcController@GetTotalRechazadaControl');
        Route::get('/GetTotalPorAprobarControl', 'TotalSgcController@GetTotalPorAprobarControl');
        Route::get('/GetTotalCreatedIng', 'TotalSgcController@GetTotalCreatedIng');
        Route::get('/GetTotalPorAprobarPmo', 'TotalSgcController@GetTotalPorAprobarPmo');
        Route::get('/GetTotalPorAprobarValidador', 'TotalSgcController@GetTotalPorAprobarValidador');
        Route::get('/GetTotalPorAprobarJefeArea', 'TotalSgcController@GetTotalPorAprobarJefeArea');
        Route::get('/GetTotalHistorialOym', 'TotalSgcController@GetTotalHistorialOym');
        Route::get('/GetTotalHistorialIng', 'TotalSgcController@GetTotalHistorialIng');
        Route::get('/GetTotalCreadaElectrico', 'TotalSgcController@GetTotalCreadaElectrico');
        Route::get('/GetTotalCreadaZonal', 'TotalSgcController@GetTotalCreadaZonal');
        Route::get('/GetTotalControl', 'TotalSgcController@GetTotalControl');
        Route::get('/GetTotalCreada', 'TotalSgcController@GetTotalCreada');
        Route::get('/GetTotalHistorialController', 'TotalSgcController@GetTotalHistorialController');
        Route::get('/GetTotalPorAprobar', 'TotalSgcController@GetTotalPorAprobar');
        Route::get('/GetTotalIngOym', 'TotalSgcController@GetTotalIngOym');
        Route::get('/GetTotalCrm', 'TotalSgcController@GetTotalCrm');
        Route::get('/GetTotalActivasIng', 'TotalSgcController@GetTotalActivasIng');
        Route::get('/GetTotalOOCC', 'TotalSgcController@GetTotalOOCC');

        //                 -- rutas sgc---
        Route::get('/pep-blocked', 'PepBlockedController@index');
        Route::get('/dataFormSgcOym', 'DataFormSgcOym@GetDataForm');
        Route::get('/procesos', 'SgcTablesController@GetProcesos');
        Route::get('/GetSubProcesos', 'SgcTablesController@GetSubProcesos');
        Route::get('/getDatosSolicitud/{id}', 'SgcTablesController@dataSolicitud');
        Route::post('/duplicate-request-sgc', 'Sgc\DuplicateRequest@duplicateRequest');
        Route::get('/GetSolicitudesSgc', 'SgcTablesController@GetSolicitudesSgc');
        Route::get('/sgc/{id}', 'SgcTablesController@index');
        Route::get('/SendMessageSgcBitacora', 'BitacoraSgcController@SendMessageSgcBitacora');
        Route::get('/MutliplesDas/{id}', 'LiberacionPagoController@MutliplesDas');
        Route::post('/aprobraMontoLiberacionPago', 'LiberacionPagoController@aprobraMontoLiberacionPago');
        Route::post('/requestAmount', 'LiberacionPagoController@store');
        Route::get('/totalMontos/{id}', 'LiberacionPagoController@totalMontos');
        Route::get('/montosSolicitados/{id}', 'LiberacionPagoController@montosSolicitados');
        Route::get('/editResponsableSgc', 'SgcEditIngenieriaController@editResponsableSgc');
        Route::get('/GetTpRequest/{id}', 'SgcShowController@GetTp');
        Route::get('/sgcLogin', 'SgcLoginController@index');
        Route::get('/FinalizarSolictudSgc', 'SgcAprobacionController@FinalizarSolictudSgc');
        Route::get('/AnularSolicitudSgc', 'SgcAprobacionController@AnularSolicitud');
        Route::get('/GestionEnd/{id}', 'SgcAprobacionController@GestionEnd');
        Route::get('/Gestion/{id}', 'SgcAprobacionController@Gestion');
        Route::get('/PagoRetenido/{id}', 'SgcAprobacionController@PagoRetenido');
        Route::get('/Esperapresupuesto/{id}', 'SgcAprobacionController@Esperapresupuesto');
        Route::get('/aprobarSolicitudOym/{id}', 'SgcAprobacionController@Aprobar');
        Route::get('/show/{id}', 'SgcShowController@index');
        Route::post('/CreateRequestSgc', 'SgcFormController@store');
        Route::get('/showSgc/{id}', 'SgcShowController@index');
        Route::post('/CreateformSgc/{id}', 'FormSgcController@store');
        Route::get('GetBitacoraSgc/{id}', 'BitacoraSgcController@index');
        Route::get('/totalCotizacionesSgc/{id}', 'ArchivoSgcController@totalCotizacionesSgc');
        Route::get('/searchArchivoSgc/{id}', 'ArchivoSgcController@index');
        Route::get('/ProvAdmin', 'ProveedorController@ProvAdmin');
        Route::get('/getProveedor', 'ProveedorController@getProveedor');
        Route::get('/updateProveedor', 'ProveedorController@updateProveedor');
        Route::get('/UpdateDataProveedor', 'ProveedorController@UpdateDataProveedor');
        Route::get('/GetUserList', 'UserController@GetUsers');
        Route::post('/MasiveUploadSGC', 'importController@MasiveUploadSGC');
        Route::get('/GetProyectosVinculados', 'SgcTablesController@GetProyectosVinculados');
        Route::get('/GetBillAssociate', 'BillController@GetBillAssociate');
        Route::get('/BillRequest', 'BillController@BillRequest');
        Route::get('/GetBillOne', 'BillController@GetBillOne');
        Route::get('/GetBillTwo', 'BillController@GetBillTwo');
        Route::get('/GetBillThree', 'BillController@GetBillThree');
        Route::get('/GetBillFour', 'BillController@GetBillFour');
        Route::post('/setInteresadosRequest', 'CreateRquestIngenieriaController@setInteresadosRequest');
        Route::post('/setFechasCuota', 'CreateRquestIngenieriaController@setFechasCuota');
        Route::post('/setNumberTpRequest', 'CreateRquestIngenieriaController@tpRequest');
        Route::post('/CreateRequestIng', 'CreateRquestIngenieriaController@store');
        Route::get('/get/all/proveedores', 'ProveedorController@getAllProveedores');
        Route::get('/change/state/valditor', 'SgcEditController@updateStateValidator');
        //////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////

        //////////////////////////  RUTAS MODULO PSA    //////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////
        Route::get('/add-orden-traslado', 'PsaController@agregarOdenTraslado');
        Route::get('/get-estados-psa', 'PsaController@getEstados');
        Route::get('/get-sub-estados-psa', 'PsaController@getSubEstados');
        Route::get('/update-estado-sub-estado-psa', 'PsaController@updateEstadoSubestado');
        Route::get('/anular-solicitud', 'PsaController@AnularSolicitud');
        Route::get('/get-cod-sap-psa-request/{id}', 'PsaController@GetCodSap');
        Route::get('/update_alert_data_exceed_banks/{id}', 'AlertRequestBancController@updateAlert');
        Route::get('/get_alert_data_banc', 'AlertRequestBancController@index');
        Route::get('/AddSitePsa', 'PsaController@AddSitePsa');
        Route::get('/AddPrioridadPsa', 'PsaController@AddPrioridadPsa');
        Route::get('updateStockBatery', 'StockPsaController@updateStockBatery');
        Route::get('getBateriaStock', 'StockPsaController@getStockBaterias');
        Route::get('stockPsaBateria', 'StockPsaController@index');
        Route::get('/GetFilesPsa/{id}', 'SolicitudPsaController@GetFilesPsa');
        Route::get('/recepcionista/{id}', 'SolicitudPsaController@recepcionista');
        Route::post('confirmacionInstlacion', 'SolicitudPsaController@confirmacionInstlacion');
        Route::get('/receptionBaterias', 'SolicitudPsaController@receptionBaterias');
        Route::get('/add_orden_servicio', 'SolicitudPsaController@addOrdenServicio');
        Route::get('/add_nro_guia_despacho', 'SolicitudPsaController@addNroGuiaDespacho');
        Route::get('/add_nro_ework', 'SolicitudPsaController@addNroEwork');
        Route::get('/addIdPedido', 'SolicitudPsaController@addIdPedido');
        Route::get('/addNroPedido', 'SolicitudPsaController@addNroPedido');
        Route::get('/addAlmacen', 'SolicitudPsaController@addAlmacen');
        Route::get('/GestionarDespacho/{id}', 'SolicitudPsaController@GestionarDespacho');
        Route::get('/addPepOrigen', 'SolicitudPsaController@addPepOrigen');
        Route::get('/addPepDestino', 'SolicitudPsaController@addPepDestino');
        Route::get('/addNroLote', 'SolicitudPsaController@addNroLote');
        Route::get('/stockAprob/{id}', 'SolicitudPsaController@ComprobacionStock');
        Route::get('/updateCodSap', 'SolicitudPsaController@updateCodSap');
        Route::get('/updateNecogioCodSap', 'SolicitudPsaController@updateNecogioCodSap');
        Route::get('/GetAlmacenes', 'SolicitudPsaController@GetAlmacenes');
        Route::get('/GetNegocio', 'SolicitudPsaController@GetNegocio');
        Route::get('/datosSolicitudPsa/{id}', 'SolicitudPsaController@datosSolicitudPsa');
        Route::get('/DetalleSolicitudPsa/{id}', 'SolicitudPsaController@DetalleSolicitud');
        Route::get('/RechazoSolicitudPsa', 'PsaController@RechazoSolicitud');
        Route::get('/updateSlc/{id}', 'PsaController@AprobarIng');
        Route::get('CrearSolicitud', 'SolicitudPsaController@store');
        Route::get('/GetCapacidad/{id}', 'PsaController@GetCapacidad');
        Route::get('/GetMarca', 'PsaController@GetMarcas');
        Route::get('GetActivo', 'PsaController@GetActivo');
        Route::get('GetMotivo', 'PsaController@GetMotivo');
        Route::get('/GetDatosSolicitudPsa', 'PsaController@GetDatosSolicitudPsa');
        Route::get('/GetTotalValidacion', 'TotalPsaController@GetTotalValidacion');
        Route::get('/inventario', 'InventarioLoginController@login');
        Route::get('/psa', 'PsaController@index');
        Route::get('/get_capacyti_cells', 'CapacityCellController@index');
        Route::get('/add_marca_request', 'PsaController@AddMarca');
        Route::get('/get_capacidades_request', 'PsaController@GetCapacidades');
        Route::get('/add_capacidad_request', 'PsaController@AddCapacidad');
        Route::get('/edit-total-batery-psa', 'PsaController@EditTotalBatery');
        Route::get('/regsitrar-bitacora-psa', 'PsaController@registrarBitacora');
        Route::get('/get-msj-log-psa/{id}', 'PsaController@getBitacora');
        //////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////RUTAS TICKETERA//////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////
        Route::post('/udpate/data/ticket/expres', 'TicketController@updateDataTicketExpres');
        Route::get('/data_psa_ticket/{id}', 'TicketController@getDataPsa');
        Route::get('/ticket-proveedor', 'TicketProveedorController@index');
        Route::post('/UploadTickets', 'importController@ImportTicketsRedCore');
        Route::get('/editMotivoTicket', 'TicketController@editMotivoTicket');
        Route::get('/MonitoreoTicketIng', 'MonitoreoController@index');
        Route::get('/change_state_pep_new/{id}', 'ImputacionController@change_state_pep_new');
        Route::get('/total_sitios_tickets', 'PopController@total_sitios_tickets');
        Route::get('/get-ticket-site/{id}', 'PopController@get_ticket_site');
        Route::get('/ework_edit_ticket', 'EworkTicketController@editEworkNumber');
        Route::get('/request-ticket-psa', 'TicketController@psaRequestTicket');
        Route::get('/total-cotizaciones-ticket/{id}', 'TotalController@GetTotalCotizacionTicket');
        Route::get('/get-valor-limite', 'GetValuesController@GetValorLimite');
        Route::get('/total-sgc-ticket/{id}', 'TotalController@TotalSgcticket');
        Route::get('/get-all-subgerencia', 'IngenieriaController@getSubgerencia');
        Route::get('/getl-all-responsable-subgerencia', 'IngenieriaController@getResponsable');
        Route::post('/propuesta-cambio-sitio', 'IngenieriaController@propuestaCambioSitio');
        Route::get('/get-datos-propuesta/{id}', 'IngenieriaController@getDatosPropuesta');
        Route::post('/aprobar-cambio-sitio', 'IngenieriaController@actualizarCambioSitioSala');
        Route::post('/editar-c-equipos', 'IngenieriaController@actualizarCantidadEquipos');
        Route::post('/editar-c-racks', 'IngenieriaController@actualizarCantidadRack');
        Route::post('/editar-p-proyecto', 'IngenieriaController@actualizaPotenciaTotal');
        Route::get('/get-activdades-ticket', 'IngenieriaController@getActividades');
        Route::get('/get-supervisor', 'IngenieriaController@getSupervisor');
        Route::post('/registrar-proveedor-ticket', 'IngenieriaController@registrarProveedor');
        Route::post('/editar-fecha-ejecucion-tp', 'IngenieriaController@editarFechaEjecucion');
        Route::get('/get-material-equipment', 'Resago\ResagoController@getData');
        Route::get('/get-data-hc', 'Resago\ResagoController@getDataFormHc');
        Route::post('/create/ticket/cnt', 'TicketController@createTicketCnt');
        Route::get('//total/validacion/compras/{id}', 'TotalController@GetTotalValidacionCompraTicket');
        Route::get('/sgcObrasCiviles', 'ExportController@exportSgcOOCC');
        Route::get('/send/mail/update/data/notification', 'MailController@sendMailNotificationUpdateData');
        //////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////

        Route::get('/ultimatesharedFolder', 'CarpetaController@ultimatesharedFolder');
        Route::get('/deleImputacion', 'ImputacionController@deleImputacion');

        Route::get('/GetCargoUser', 'UserController@getCargoId');

        Route::get('/userInfo', 'UserController@getTempUser');

        Route::get('/delteAllfoldersUserTrash', 'CarpetaController@delteAllfoldersUserTrash');
        Route::get('/FindNewFolder', 'CarpetaController@FindNewFolder');
        Route::get('/moreInfo', 'IngenieriaController@moreInfo');
        Route::post('/setEquiposIngSolicitud', 'IngenieriaController@setEquiposIngSolicitud');
        Route::get('/donwloadDocumentControlCambio/{id}', 'PdfConvertController@ControlCambioDocument');
        Route::get('/GetsolcitudControlCambio', 'ControlCambioFormController@GetsolcitudControlCambio');
        Route::post('/PostControlCambio', 'ControlCambioFormController@PostControlCambio');
        Route::post('/setParrafosNoticia', 'PortalController@setParrafosNoticia');
        Route::get('/GetCambioEstado', 'ControlCambioFormController@GetCambioEstado');
        Route::get('/tipo-solicitud-control-cambio', 'ControlCambioFormController@GetTiposolicitud');
        Route::get('/GetTipoDocumentos', 'ControlCambioFormController@GetTipoDocumentos');
        Route::get('/GetInteresados', 'DataformIng@GetInteresados');
        Route::get('/GetResponsable', 'DataformIng@GetResponsable');
        Route::get('/GetSolicitante', 'DataformIng@GetSolicitante');
        Route::get('/getDataFormIng', 'DataformIng@getDataFormIng');
        Route::get('/GetPmProyecto', 'DataformIng@GetPmProyecto');
        Route::get('/GetPmInterno', 'DataformIng@GetPmInterno');
        Route::get('/GetMotivosTrabajosIng', 'DataformIng@GetMotivosTrabajosIng');
        Route::get('/GetTipoModoTrabajo/{id}', 'DataformIng@GetTipoModoTrabajo');
        Route::get('/FlujoTrabajoIng', 'DataformIng@FlujoTrabajoIng');
        Route::get('/GetTipoTrabajoIng', 'DataformIng@GetTipoTrabajoIng');
        Route::get('/GetTipoIdentificacionTrabajo', 'DataformIng@GetTipoIdentificacionTrabajo');
        Route::get('/searchComua/{id}', 'RegionController@searchComua');
        Route::get('/region', 'RegionController@index');

        Route::get('/GetOficina', 'Oficinacontroller@index');
        Route::get('/Getrol', 'UserController@GetRol');
        Route::get('/Getcargo', 'UserController@Getcargo');

        Route::get('/setReaccion/{id}/{reaccion}', 'TotalReaccionController@setReaccion');
        Route::get('/ListPlataform', 'PortalController@plataformas');
        Route::get('/portal', 'ContenidoController@index');

        Route::get('/denegarAcceso/{id}', 'AccesoController@denegarAcceso');
        Route::get('/AprobarAcceso/{id}', 'AccesoController@AprobarAcceso');
        Route::get('/GetDataAccesos', 'AccesoController@GetDataAccesos');
        Route::get('/getAccesos', 'AccesoController@getAccesos');
        Route::get('/dataAcceso/{id}', 'AccesoController@dataAcceso');
        Route::get('/solicitudpendiente/{id}', 'AccesoController@solicitudpendiente');
        Route::get('/solicitudAccesoModulo/{id}', 'AccesoController@store');
        Route::get('/logInventario', 'InventarioLoginController@index');
        Route::get('/AprobacionJefeArea/{id}', 'AprobacionSgcController@AprobacionJefeArea');
        Route::post('/createNews', 'PortalController@createNews');
        Route::get('/GetFirstSeccion', 'PortalController@GetFirstSeccion');
        Route::get('/portalAddContent', 'PortalController@index');

        Route::get('/controlCambios', 'ControlCambioController@index');

        Route::get('/GetTotalUsersAccountRequest', 'AccountController@GetTotalUsersAccountRequest');
        Route::get('/GetTotalUsers', 'UserController@GetTotalUsers');
        Route::get('/UserCargoName/{id}', 'UserController@UserCargoName');
        Route::get('/UserRolName/{id}', 'RolController@UserRolName');
        Route::get('/GetAllUsers', 'UserController@getUsersAdmin');
        Route::get('/CreateUser/{id}', 'UserController@CreateUser');
        Route::get('/GetAccounts', 'UserController@GetAccounts');

        Route::get('/totalnotificaciones', 'NotificacionController@totalnotificaciones');
        Route::get('/trashFolderShared/{id}', 'CompartirCarpetaController@trashFolderShared');
        Route::get('/GetDetailsFolder/{id}', 'CarpetaController@GetDetailsFolder');
        Route::get('/updateNameFolderShared', 'CompartirCarpetaController@updateNameFolderShared');
        Route::post('/SearchFileDuplicatesRepositorio', 'CarpetaController@SearchFileDuplicatesRepositorio');
        Route::get('/repositorio/extensions', 'CarpetaController@getExtensions');
        Route::get('/createSubFolder', 'CarpetaController@createSubFolder');
        Route::get('/TotalTicketsCrm', 'TotalController@TotalTicketsCrm');
        Route::get('/Deletefile/{id}', 'CarpetaController@Deletefile');
        Route::get('/editSite', 'SitioController@editSite');
        Route::post('/uploadFilesRepositorio/{id}', 'CarpetaController@uploadFilesRepositorio');
        Route::get('/deleteFolderBd/{id}', 'CarpetaController@deleteFolderBd');
        Route::get('/TotalTickets', 'TotalController@TotalTickets');
        Route::get('/getFoldersAreaUsers', 'CarpetaController@getFoldersAreaUsers');
        Route::get('/GetModulos', 'ModuloController@GetModulos');
        Route::get('/getFoldersShared', 'CompartirCarpetaController@getFoldersShared');
        Route::get('/SetSharedFolder', 'CompartirCarpetaController@SetSharedFolder');
        Route::get('/RecoveryFolder/{id}', 'CarpetaController@RecoveryFolder');
        Route::get('/getFoldersDelete', 'CarpetaController@getFoldersDelete');
        Route::get('/GetUsers', 'UserController@GetUsers');
        Route::get('/GetActivityFolder/{id}', 'ActividadCarpetaController@index');
        Route::get('/moveToFolderTrash/{id}', 'CarpetaController@moveToFolderTrash');
        Route::get('/updateNameFolder', 'CarpetaController@updateNameFolder');
        Route::get('/GetFiles', 'CarpetaController@GetFiles');
        Route::get('/GetSubFolder', 'CarpetaController@GetSubFolder');
        Route::get('/createNewFolder', 'CarpetaController@store');
        Route::get('/getFolders', 'CarpetaController@index');
        Route::get('/repositorio', 'RepositorioController@index');
        Route::get('/repositorio-zonas', 'RepositorioController@CarpetaZona');
        Route::get('/repositorioInformes', 'RepositorioController@carpetaInforme');
        Route::get('/repocreatersubfolder', 'RepositorioController@creartesubfolder');
        Route::get('/elimarfiles', 'RepositorioController@elimarfiles');
        Route::get('/ValidacionTotalTicketPlataforma', 'PlataformaTicketTotalController@TotalValidacion');
        Route::get('/CursoTotalTicketPlataforma', 'PlataformaTicketTotalController@TotalCurso');
        Route::get('/finalizadaTotalTicketPlataforma', 'PlataformaTicketTotalController@TotalFinalizada');
        Route::get('/ArchivosTicketanida/{id}', 'PlataformasMantencionController@ArchivosTicketanida');
        Route::get('/ticketsTrabajos', 'PlataformasMantencionController@ticketsTrabajos');
        Route::post('/formularioTicketRequisito', 'PlataformasMantencionController@store');
        Route::get('/GetPrioridades', 'PrioridadController@index');
        Route::get('/GetPlataformasInfra', 'PlataformasData@index');
        Route::get('/GetAreasPlataformas', 'AreaPlataformaController@index');
        Route::get('/GetRequisitos', 'RequisitoController@index');
        Route::get('/PlataformaTicket', 'PlataformasMantencionController@index');
        Route::get('/GetEworks', 'SolicitudEworkController@index');
        Route::get('/indexEwork', 'EworkModuloController@index');
        Route::get('/modulos', 'ModuloController@index')->name('modulos')->middleware('updatePassword');
        Route::get('/GetTotalChecklist/{id}', 'ArchivoController@GetTotalChecklist');
        Route::get('/GetTotalDenuncia/{id}', 'ArchivoController@GetTotalDenuncia');
        Route::post('/uploadFilesComplaint/{id}', 'DenunciaController@uploadFilesComplaint');
        Route::get('/totalDenunciado', 'DenunciaController@totalDenunciado');
        Route::get('/totalDenuncia', 'DenunciaController@totalDenuncia');
        Route::get('/DenunciaTicketGet', 'DenunciaController@index');
        Route::get('/getPermisos', 'PermisoController@index');
        Route::get('/AddEwork', 'EworkTicketController@AddEwork');
        Route::get('/InformeFotografico/{id}', 'FormularioController@exportPdf');
        Route::get('/DeleteRecordElemento/{id}', 'EworkTicketController@DeleteRecordElemento');
        Route::get('/GetElementosTicket/{id}', 'EworkTicketController@index');
        Route::post('/DatosEwork/{id}', 'EworkTicketController@store');
        Route::get('/montosOtroPreEwork', 'MontoController@index');
        Route::get('/GetElementosPxqTkcPreEwork', 'ElementoPreEworkController@index');
        Route::get('/exportCovid', 'FormCovidController@export');
        Route::get('/updateticket', 'TicketController@updateticket');
        Route::get('/slcTicket', 'SolicitudSgcTicketController@index');
        Route::get('/perfilusuario', 'UserController@perfilusuario');
        Route::get('/ticketControl', 'ControlController@index');
        Route::get('/ControlTicketGet', 'ControlController@getTickets');
        Route::get('/updateModeuser', 'ConfiguracionUserController@updateMode')->name('updatemode');
        Route::get('/getMode', 'ConfiguracionUserController@index');

        Route::post('/RequestStore', 'FormSgcController@store');
        Route::get('/TicketsMotivos/{id}', 'TicketMotivoController@index');
        Route::get('/GetTotalTicketMotivo', 'TicketMotivoController@GetTotalTicketMotivo');
        Route::get('/delte_file_ticket_ing/{id}', 'ArchivoControllerIng@destroy');
        Route::get('/GetTotalArchivos/{id}', 'ArchivoController@GetTotalArchivos');
        Route::get('/GetTotalImagenes/{id}', 'ArchivoController@GetTotalImagenes');
        Route::get('/RechazoSolicitud', 'SgcRechazoController@rechazo');
        Route::get('/GetValues', 'GetValuesController@Value');
        Route::get('/getValorUf', 'GetValuesController@getUf');
        Route::get('/TipoContingencia', 'ContingenciaController@index');
        Route::get('/LastTicketsCreated', 'TicketController@LastTicketsCreated');
        Route::get('/rechazoFactibilidad', 'LogControllerIng@rechazoFactibilidad');
        Route::post('/subidaArchivoIng/{id}', 'ArchivoControllerIng@subidaArchivoIng');
        Route::post('/updateMantencion/{id}', 'MantencionRealizadaController@store');
        Route::get('/CestaTicketIngenieria', 'IngenieriaController@CestaTicketIngenieria');
        Route::get('/GetTipoTrabajo', 'TipotrabajoController@index');
        Route::get('/GetProveedor', 'ProveedorController@index');
        Route::get('/GetTipoBoleta', 'TipoBoletaController@index');
        Route::get('/GetTipoGastos', 'TipoGastoController@index');
        Route::get('/GetTipoMoneda', 'TipoMonedaController@index');
        Route::get('/FinalizarSlcIng/{id}', 'IngenieriaController@FinalizarSlcIng');
        Route::get('/OcTicketIngenieria', 'IngenieriaController@OcTicketIngenieria');
        Route::get('/DASTicketIngenieria', 'IngenieriaController@DASTicketIngenieria');
        Route::get('/GetAreaTrabajo', 'AreaTrabajo@index');
        Route::get('/GetNroEwrok', 'EworkController@index');
        Route::get('/getTipoArchivoIng', 'ArchivoControllerIng@getTipoArchivoIng');
        Route::post('/logIng/{id}', 'LogControllerIng@mensaje');
        Route::get('/GetTp', 'TpController@index');
        Route::get('/AprobarTicketIng/{id}', 'IngenieriaController@AprobarTicketIng');
        Route::get('/getTypes', 'NettypesController@index');
        Route::get('/getSlcIng/{id}', 'IngenieriaController@getSlc');
        Route::get('/Slc/{id}', 'IngenieriaController@show');
        Route::post('/Create_tp_ticket', 'TicketIngTpController@CreateTp');
        Route::get('/get_totales_cliente_ing', 'TotalIngController@getTotales');
        Route::get('/GetTotalValidacionIng', 'TotalIngController@GetTotalValidacionIng');
        Route::get('/GetTotalTpIng', 'TotalIngController@GetTotalTpIng');

        Route::get('/get-totales-tipo-tickets', 'IngenieriaController@getTotalesTipoTicket');
        Route::get('/GetTotalGestion', 'TotalIngController@GetTotalGestion');
        Route::get('/get_estados', 'IngenieriaController@getEstados');
        Route::get('/GetTotalActiva', 'TotalIngController@GetTotalActiva');
        Route::get('/GetTotalFinalizada', 'TotalIngController@GetTotalFinalizada');
        Route::get('/GetRolUser', 'RolController@index');
        Route::get('/ticket-ing', 'IngenieriaController@ingIndx');
        Route::get('/GetSolicitudesIng', 'IngenieriaController@index');
        Route::post('/CreateSolicitudIng', 'IngenieriaController@store');
        Route::get('/GetPops', 'PopController@GetThisPops');
        Route::get('/GetSalas/{id}', 'RoomController@index');
        Route::get('/tipoMantencion', 'TipoMantencionController@index');
        Route::post('/chekmantenciones/{id}', 'MantencionRealizadaController@store');
        Route::post('/chekmantenciones2/{id}', 'MantencionRealizadaController@store');
        Route::post('/chekmantenciones3/{id}', 'MantencionRealizadaController@store');
        Route::get('/EquipoTicketIngController/{id}', 'GetEquipoTicketIngController@index');
        Route::get('/UpdateNotificaciones', 'NotificacionController@UpdateNotificaciones');
        Route::get('/notificaciones', 'NotificacionController@index');
        Route::get('/statusNotificaction', 'NotificacionController@statusNotificaction');
        Route::get('/AprobarSitio/{id}', 'PopController@AprobarSitio');
        Route::get('/CreateSolicitudIng', 'IngenieriaController@store');
        Route::get('/GetEquipoTecnicaRectificadores', 'EquipoController@GetEquipoTecnicaRectificadores');
        Route::post('/setItemsMantencionTicket', 'AreaItemMantencionController@store');
        Route::get('/GetMantenciones/{id}', 'AreaItemMantencionController@GetMantenciones');
        Route::get('/GetMantencionesdc/{id}', 'AreaItemMantencionController@GetMantencionesdc');
        Route::get('/GetMantencionesClima/{id}', 'AreaItemMantencionController@GetMantencionesClima');

        Route::get('/GetEquipoTecnicaGrupoElectrogeno', 'EquipoController@GetEquipoTecnicaGrupoElectrogeno');
        Route::get('/GetEquipoTecnicaMotor', 'EquipoController@GetEquipoTecnicaMotor');
        Route::get('/GetEquipoTecnicaGenerador', 'EquipoController@GetEquipoTecnicaGenerador');
        Route::get('/GetEquipoTecnicaEstanqueCombustibler', 'EquipoController@GetEquipoTecnicaEstanqueCombustibler');
        Route::get('/GetEquipoTecnicaControladorG', 'EquipoController@GetEquipoTecnicaControladorG');
        Route::get('/GetEquipoTecnicaControladorTTA', 'EquipoController@GetEquipoTecnicaControladorTTA');

        Route::get('/GetEquipoTecnicaLineaElectrica', 'EquipoController@GetEquipoTecnicaLineaElectrica');
        Route::get('/GetEquipoTecnicaTransformador', 'EquipoController@GetEquipoTecnicaTransformador');
        Route::get('/GetEquipoTecnicaCompactoDeMedida', 'EquipoController@GetEquipoTecnicaCompactoDeMedida');

        Route::get('/TecnicasEnergia', 'TecnicaController@TecnicasEnergia');
        Route::get('/TotalLineasElectricas', 'TecnicaController@TotalLineasElectricas');
        Route::get('/TotalGrupoElectrogeno', 'TecnicaController@TotalGrupoElectrogeno');
        Route::get('/TotalPlantaRectificadora', 'TecnicaController@TotalPlantaRectificadora');
        Route::get('/TotalPanelesSolares', 'TecnicaController@TotalPanelesSolares');
        Route::get('/TotalBaterias', 'TecnicaController@TotalBaterias');
        Route::get('/Totaleolicos', 'TecnicaController@Totaleolicos');
        Route::get('/TotalAireAcondicionado', 'TecnicaController@TotalAireAcondicionado');
        Route::get('/TotalVentiladores', 'TecnicaController@TotalVentiladores');
        Route::get('/TotalEstructuraVertical', 'TecnicaController@TotalEstructuraVertical');
        Route::get('/TotalInfraestructura', 'TecnicaController@TotalInfraestructura');
        Route::get('/TotalCercoPerimetral', 'TecnicaController@TotalCercoPerimetral');
        Route::get('/TotalReforzamiento', 'TecnicaController@TotalReforzamiento');
        Route::get('/TotalDerrameCombustible', 'TecnicaController@TotalDerrameCombustible');

        Route::get('/getHaltedTotal', 'HaltedController@getHaltedTotal');
        Route::get('/getOperativoTotal', 'HaltedController@getOperativoTotal');
        Route::get('/GetStios', 'PopController@GetStios');
        Route::get('/GetStiosOperativos', 'PopController@GetSitiosOperativos');
        Route::get('/totalObras', 'GraficoController@totalObras');
        Route::get('/totalMedio', 'GraficoController@totalMedio');

        Route::get('/TotalTicketsAreas', 'GraficoController@TotalTicketsAreas');

        Route::get('/totalCotizaciones/{id}', 'ArchivoController@totalCotizaciones');
        Route::get('/totalInformeFinal/{id}', 'ArchivoController@totalInformeFinal');
        Route::get('/totalguiaDespacho/{id}', 'ArchivoController@totalguiaDespacho');
        Route::get('/totalotro/{id}', 'ArchivoController@totalotro');
        Route::get('/totallpu/{id}', 'ArchivoController@totallpu');
        Route::get('/totaladjudicacion/{id}', 'ArchivoController@totaladjudicacion');
        Route::get('/totalinformeParcial/{id}', 'ArchivoController@totalinformeParcial');

        Route::get('/totalMail/{id}', 'ArchivoController@totalMail');
        Route::get('/totalPxq/{id}', 'ArchivoController@totalPxq');
        Route::get('/totalCotizacionesIng/{id}', 'ArchivoControllerIng@totalCotizaciones');
        Route::get('/totalInformeFinalIng/{id}', 'ArchivoControllerIng@totalInformeFinal');
        Route::get('/totalguiaDespachoIng/{id}', 'ArchivoControllerIng@totalguiaDespacho');
        Route::get('/totalotroIng/{id}', 'ArchivoControllerIng@totalotro');
        Route::get('/totallpuIng/{id}', 'ArchivoControllerIng@totallpu');
        Route::get('/totaladjudicacionIng/{id}', 'ArchivoControllerIng@totaladjudicacion');
        Route::get('/totalinformeParcialIng/{id}', 'ArchivoControllerIng@totalinformeParcial');
        Route::get('/totalMailIng/{id}', 'ArchivoControllerIng@totalMail');
        Route::get('/totalInformeejecucion/{id}', 'ArchivoControllerIng@totalInformeejecucion');

        Route::get('/getTipoArchivos', 'TipoArchivoController@getTipoArchivos');

        Route::get('/TotalTicektsClima', 'GraficoController@TotalTicektsClima');
        Route::get('/TotalTicekts', 'GraficoController@totalTicekts');
        Route::get('/DeleteFile/{id}', 'ArchivoController@ElminarArchivo');
        Route::get('/graficos', 'GraficoController@index');
        Route::get('/GetTotalRechazadas', 'TotalController@GetTotalRechazadas');
        Route::get('/GetImputacion/{id}', 'ImputacionController@GetImputacion');
        Route::post('/RedirectTicket', 'ChangeEstadoController@redirect');
        Route::get('/GetFilterTecnicaClima', 'TecnicaController@GetFilterTecnicaClima');
        Route::get('/GetFilterTecnica', 'TecnicaController@GetFilterTecnica');
        Route::get('/GetFilterArea', 'AreaController@GetAreaFilter');
        Route::get('/ticketblade/{id}', 'TicketController@index');
        Route::post('/UpdateFecha1', 'EditController@EditDateCreated');
        Route::get('/GetRolUser', 'UserController@GetRol');
        Route::get('/rechazadasList', 'HomeController@rechazadas');
        Route::post('/CrearTicket', 'TicketController@store');
        Route::post('/subidaArchivo/{id}', 'ArchivoController@upload');
        Route::get('/listCotizacion/{id}', 'TareaController@cotizacion');
        Route::get('/listPxq/{id}', 'TareaController@pxq');
        Route::get('/listCuenta/{id}', 'TareaController@Cuenta');
        Route::get('/listEmpresa/{id}', 'TareaController@Empresa');
        Route::get('/listSgc/{id}', 'TareaController@sgc');
        Route::get('/listOc/{id}', 'TareaController@oc');
        Route::get('/listInforme/{id}', 'TareaController@informe');
        Route::get('/Cheklist/{id}/{select}', 'TicketController@check');
        Route::post('/addTarea/{id}', 'TicketController@addTarea');
        Route::get('/getTp/{id}', 'TicketTpController@getTp');
        Route::get('/GetPop2/{id}', 'PopController@GetPop2');
        Route::get('/addTp/{id}', 'TicketTpController@addTp');
        Route::get('/Getarea', 'BacklogController@area');
        Route::get('/GetEquipo/{id}', 'EquipoController@index');
        Route::get('/GetTecnica/{id}', 'TecnicaController@index');

        Route::get('/totalBacklog', 'TotalController@backlog');

        Route::get('/totalBacklogCrm/{crm}', 'TotalController@backlogCrm');

        Route::get('/Tipomotivo', 'TicketController@TipoMotivo');
        Route::get('/tikectList', 'TicketController@listaBacklog');
        Route::get('/searchArchivo/{id}', 'ArchivoController@searchArchivoTicket');
        Route::get('/searchArchivoIng', 'ArchivoController@searchArchivoIng');
        Route::get('/shopba', 'TicketController@pbaShow');
        Route::put('/descripcionedit/{id}', 'TicketController@descriptionEdit');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/moreInfo', 'IngenieriaController@moreInfo');
        Route::put('/elimarArchivo/{id}', 'ArchivoController@ElminarArchivo');
        Route::get('/GetItemsMantencion', 'AreaItemMantencionController@GetEnergiaAc');
        Route::get('/GetEnergiaDc', 'AreaItemMantencionController@GetEnergiaDc');
        Route::get('/GetsitemsClima', 'AreaItemMantencionController@GetsitemsClima');

        Route::get('/crm/{id}', 'TicketController@crm');
        Route::put('/especialista/{id}', 'EspecialistaController@asignar');
        Route::put('/especialista2/{id}', 'EspecialistaController@asignarOcc');
        Route::put('/Agregarpop/{id}', 'PopController@pop');
        Route::resource('/ticket', 'TicketController');
        Route::get('/tareas', 'TareaController@index');
        Route::post('/log/{id}', 'LogController@mensaje');
        Route::get('/datosTicket/{id}', 'TicketController@datosTicket');
        Route::get('/datosTicketPop/{id}', 'SitioController@index');
        Route::get('/buscar', 'TicketController@index');
        Route::post('/inputacion/{id}', 'ImputacionController@inputacion');
        Route::put('/cambioestado/{id}', 'TicketController@aprobar1');
        Route::put('/cambioestado2/{id}', 'TicketController@aprobar2');
        Route::put('/retroceso/{id}', 'TicketController@retroceso');
        Route::put('/cambioestado3/{id}', 'TicketController@aprobar3');
        Route::put('/rechazo/{id}', 'TicketController@rechazo1');
        Route::put('/rechazo2/{id}', 'TicketController@rechazo2');
        Route::put('/rechazo3/{id}', 'TicketController@rechazo3');
        Route::get('/json-tecnica', 'TecnicaController@index');
        Route::get('/json-equipo', 'EquipoController@index');
        Route::get('/curso', 'CursoController@curso');
        Route::get('/validacion', 'ValidacionController@validacion');
        Route::get('/fin', 'FinController@finalizada');
        Route::get('/showTicket/{id}', 'TicketController@show');
        Route::post('/crear', 'TicketController@store');
        Route::get('/rechazadaView', 'HomeController@rechazadaView');
        Route::post('/reenvio/{id}', 'TicketController@reenvio');
        Route::get('/bitacoraTicket/{id}', 'LogController@logTicket');
        Route::get('/bitacoraIng/{id}', 'LogControllerIng@logIng');
        Route::get('/bitacoraTicket2/{id}', 'LogController@logTicket2');
        Route::put('/cambioestadocrm1/{t}/{m}/{id}', 'CursoController@aprobar');
        Route::put('/cambioestadoCurso/{t}/{m}/{id}', 'BacklogController@aprobar');
        Route::put('/IngresoFecha/{t}/{m}/{id}', 'BacklogController@fecha');
        Route::put('/rechazoCrm1/{t}/{m}/{id}', 'BacklogController@rechazar');
        Route::put('/rechazoCrm2/{t}/{m}/{id}', 'CursoController@rechazar2');
        Route::put('/inputacion2/{t}/{m}/{id}', 'ImputacionController@inputacion2');

        Route::get('/pop', 'PopController@index');
        Route::post('/halted', 'PopController@store');
        Route::get('/lista', 'PopController@lista');
        Route::put('/haltedUpdate/{id}', 'HaltedController@updatestate');
        Route::get('/operativo', 'PopController@operativo');
        Route::get('/GetPop', 'PopController@Getsite');

        Route::get('/detalleHalted/{id}', ['uses' => 'HaltedController@show', 'as' => 'halted.show']);

        Route::get('/crmPop/{id}', 'HaltedController@crm');
        Route::put('/MensajeHalted/{id}', 'LogController@mensajeHalted');
        Route::put('/subirArchivosHalted/{id}', 'ArchivoController@uploadFilesHalted');
        Route::put('/elimarArchivoHalted/{id}', 'ArchivoController@ElminarArchivoHalted');
        Route::put('/haltedUpdatecrm/{t}/{m}/{id}', 'HaltedController@aprobarcrm');
        Route::put('/rechazocrmHalted/{t}/{m}/{id}', 'HaltedController@rechazocrmHalted');
        Route::get('/estadistica', 'EstadisticaController@index');

        Route::get('/officetrack/sub/folders', 'CarpetaController@GetSubFolderOfficeTrack');
        Route::get('/officetrack/folders/data', 'CarpetaController@officeTrackFolderData');

        ########################### ticket soporte #####################

        Route::get('/tickets/support', 'Ticket_support\TicketSupportController@getTicketsSuport');
        Route::get('/tickets/form/data', 'Ticket_support\TicketSupportController@getDataForm');
        Route::post('/ticket/suport/create', 'Ticket_support\TicketSupportController@createTicketSupport');
        Route::post('/ticket/suport/create/task', 'Ticket_support\TicketSupportController@createTaskSupportTicket');
        Route::get('/task/ticket/select', 'Ticket_support\TicketSupportController@getTaskTicket');
        Route::get('/update/task/list/ticket', 'Ticket_support\TicketSupportController@updateListTaskTicket');
        Route::get('/ticket/support/aprove', 'Ticket_support\TicketSupportController@aproveTicket');
        Route::get('/send/mail/developer', 'MailController@TicketSupport');
        Route::get('/send/mail/change/status/ticket/support', 'MailController@TicketMailChangeStatus');
        Route::get('/send/message/suport', 'MailController@sendMailMessageTicket');


        ########################### ACREDITACION PROVEEDORES #####################
        Route::post('/import/excel/acreditation', 'Sgc\AcreditationController@uploadData');
        Route::get('/acreditation/data/employee', 'Sgc\AcreditationController@getDataEmployee');
        Route::get('/employess/acretidation/proveedores', 'Sgc\AcreditationController@getDataEmployeeProveedor');
        Route::post('/create/sgc/express', 'Sgc\AcreditationController@registerSgcEmployee');
        Route::post('/register/employee/sgc', 'Sgc\AcreditationController@registerEmployeeSgc');
        Route::post('/import/proveedores/cumplimiento/global', 'Sgc\AcreditationController@uploadDataCumplimientoGlobal');
        Route::get('/get/proveedores/cumplimiento', 'Sgc\AcreditationController@getDataCumplimiento');

        ########################### MODULO ITOS #####################
        Route::post('/create/event/ito', 'itos\EventController@registerEvent');
        Route::get('/get/all/event/ito', 'itos\EventController@getAllevents');
        Route::get('/data/form/itos', 'itos\EventController@getDataFormItos');
        Route::get('/event/select/{id}', 'itos\EventController@getEventSelect');
        Route::get('/get/task/itos', 'itos\EventController@getTasks');
        Route::post('/update/state/task', 'itos\EventController@changeStateTask');
        Route::post('/upload/task/itos', 'itos\EventController@importTask');



        Route::get('/itos/{optional?}', function () {
            if (Auth::check()) {
                $user = Auth::user();
                $permisos = Permiso_rol::where('role_id', $user->rol)->where('permission_id', 203)->first();
                if ($permisos) {
                    return view('layouts.itos');
                } else {
                    return view('errores.403');
                }
            } else {
                return view('auth.login');
            }
        })->name('basepath')->where('optional', '.*');

        Route::get('/admin/{optional?}', function () {
            if (Auth::check()) {
                return view('layouts.menuAdmin');
            } else {
                return view('auth.login');
            }
        })->name('basepath')->where('optional', '.*');



        Route::get('/support/{optional?}', function () {

            if (Auth::check()) {
                $user = Auth::user();
                $permisos = Permiso_rol::where('role_id', $user->rol)->where('permission_id', 147)->first();
                if ($permisos) {
                    return view('layouts.suport');
                } else {
                    return view('errores.403');
                }
            } else {
                return redirect('/login');
            }
        })->name('basepath')->where('optional', '.*');

        Route::get('/accreditation/{optional?}', function () {


            if (Auth::check()) {
                $user = Auth::user();
                $permisos = Permiso_rol::where('role_id', $user->rol)->where('permission_id', 202)->first();
                if ($permisos) {
                    return view('layouts.acreditation');
                } else {
                    return view('errores.403');
                }
            } else {
                return redirect('/login');
            }
        })->name('basepath')->where('optional', '.*');



        Route::get('/reports/{optional?}', function () {


            if (Auth::check()) {
                $user = Auth::user();
                $permisos = Permiso_rol::where('role_id', $user->rol)->where('permission_id', 201)->first();
                if ($permisos) {
                    return view('layouts.reports');
                } else {
                    return view('errores.403');
                }
            } else {
                return redirect('/login');
            }
        })->name('basepath')->where('optional', '.*');


        Route::get('/repositorio/{optional?}', function () {
            if (Auth::check()) {
                $user = Auth::user();
                $permisos = Permiso_rol::where('role_id', $user->rol)->where('permission_id', 146)->first();
                if ($permisos) {
                    return view('layouts.MenuRepositorio');
                } else {
                    return view('errores.403');
                }
            } else {
                return redirect('/login');
            }
        })->name('basepath')->where('optional', '.*');

        Route::get('/rendicion/{optional?}', function () {
            if (Auth::check()) {
                $user = Auth::user();
                $permisos = Permiso_rol::where('role_id', $user->rol)->where('permission_id', 204)->first();
                if ($permisos) {
                    return view('layouts.rendicionPago');
                } else {
                    return view('errores.403');
                }
            } else {
                return redirect('/login');
            }
        })->name('basepath')->where('optional', '.*');
    });



    Route::get('/user/update/pass', ['as' => 'changePassWord', function () {
        return view('auth.passwords.changePassword');
    }]);
});

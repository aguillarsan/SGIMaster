<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\ArchivoSgc;
use App\Cargo_user;
use App\Formulario;
use App\Log;
use App\presupuesto_ceco;
use App\Site;
use App\SolicitudSgc;
use App\Solicitud_duplicada;
use App\Ticket;
use App\Tipo_moneda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormSgcController extends Controller
{

    public function __construct()
    {
        Carbon::setLocale('es');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        //VARIABLES NECESARIAS///////////////////////////

        try {
            $ticket_id               = $id;
            $fechaActual             = Carbon::now();
            $fechaActualFormato      = $fechaActual->format('Y-m-d');
            $tipo_moneda_actualizada = Tipo_moneda::where('updated', 'like', "%" . $fechaActualFormato . "%")->count();

            $moneda       = Tipo_moneda::find($request->TipoMoneda);
            $valor_moneda = $moneda->valor;

            if ($request->Activo != null) {
                $conversionActivo = floatval($request->Activo) * $valor_moneda;
            }

            if ($request->Servicio != null) {
                $conversionservicio = floatval($request->Servicio) * $valor_moneda;
            }

            $ticket = Ticket::find($id);
            $sitio  = Site::find($ticket->site_id);

            $cargo = Cargo_user::where('id_user', Auth::user()->id)->count();


            if ($cargo == 0 || $cargo == null) {
                $cargo_id  = 0;
                $proceso   = 15;
                $subestado = 7;
            } else {
                $cargo = Cargo_user::where('id_user', Auth::user()->id)->get();

                foreach ($cargo as $c) {
                    $cargo_id = $c->id_cargo;
                }

                if ($cargo_id == 1) {
                    $proceso   = 7;
                    $subestado = 7;
                } else {
                    if ($cargo_id == 2) {
                        $proceso   = 6;
                        $subestado = 7;
                    } else {

                        $proceso   = 15;
                        $subestado = 7;
                    }
                }
            }




            ////////////////////////////////////////////////

            if ($request->Activo != null && $request->Servicio != null) {

                $solicitud                   = new SolicitudSgc;
                $solicitud->user_id          = Auth::user()->id;
                $solicitud->area_id          = $request->AreaTrabajo;
                $solicitud->tipo_trabajo_id  = $request->TipoTrabajo;
                $solicitud->fecha_ejecucion  = $request->FechaEjecución;
                $solicitud->descripcion      = $ticket->descripcion;
                $solicitud->site_id          = $ticket->site_id;
                $solicitud->tipo_gasto_id    = $request->TipoGasto;
                $solicitud->contingencia_id  = $request->TipoContingencia;
                $solicitud->proveedor_id     = $request->ProveedorId;
                $solicitud->tipo_boleta_id   = $request->TipoBoleta;
                $solicitud->tipo_moneda_id   = $request->TipoMoneda;
                $solicitud->costos_activos   = floatval($request->Activo);
                $solicitud->costos_servicios = null;
                $solicitud->ework            = $request->ework;
                $solicitud->fecha_creacion   = Carbon::now();
                $solicitud->estado_id        = 1;
                $solicitud->boleta           = $request->Boleta;
                $solicitud->subgrencia       = 1;
                $solicitud->proceso_id       = $proceso;
                $solicitud->subestado_id     = $subestado;
                $solicitud->creacion         = 1;
                $solicitud->id_crm           = $ticket->crm_id;
                $solicitud->ticket_id        = $ticket->id;
                $solicitud->estado_id        = 1;
                $solicitud->save();

                /////////////CARGA ARCHIVOS PRIMERA SOLICITUD////////////////
                $this->filesUploadFirstRequest($request, $solicitud, $ticket_id);

                ///////////////////////////////////////////////////////////

                //////////SOLICITUD DUPLICADA TAB NUEVASSOLICITUDES
                $duplicado = new SolicitudSgc;

                $duplicado->user_id          = Auth::user()->id;
                $duplicado->area_id          = $request->AreaTrabajo;
                $duplicado->tipo_trabajo_id  = $request->TipoTrabajo;
                $duplicado->fecha_ejecucion  = $request->FechaEjecución;
                $duplicado->descripcion      = $ticket->descripcion;
                $duplicado->site_id          = $ticket->site_id;
                $duplicado->tipo_gasto_id    = $request->TipoGasto;
                $duplicado->contingencia_id  = $request->TipoContingencia;
                $duplicado->proveedor_id     = $request->ProveedorId;
                $duplicado->tipo_moneda_id   = $request->TipoMoneda;
                $duplicado->costos_activos   = null;
                $duplicado->costos_servicios = floatval($request->Servicio);
                $duplicado->ework            = $request->ework;
                $duplicado->fecha_creacion   = Carbon::now();
                $duplicado->estado_id        = 1;
                $duplicado->boleta           = $request->Boleta;
                $duplicado->subgrencia       = 1;
                $duplicado->proceso_id       = $proceso;
                $duplicado->subestado_id     = $subestado;
                $duplicado->creacion         = 1;
                $duplicado->id_crm           = $ticket->crm_id;
                $duplicado->ticket_id        = $ticket->id;
                $duplicado->tipo_boleta_id   = $request->TipoBoleta;
                $duplicado->save();

                $solicitud->solicitud_duplicada_id = $duplicado->id;
                $solicitud->first_request          = 1;
                $solicitud->save();

                $log                  = new Log;
                $log->ticket_id       = $ticket->id;
                $log->tipo_mensaje_id = 1;
                $log->descripcion     = 'Solicitudes en sgc creada, nro°:' . ' ' . $solicitud->id . ' ' . 'y' . ' ' . $duplicado->id;
                $log->user_id         = Auth::user()->id;
                $log->save();

                ////////// SOLICITUD DUPLICADA TAB SOLICITUD_DUPLCIADAS

                $solicitud_duplicada                  = new Solicitud_duplicada;
                $solicitud_duplicada->id              = $duplicado->id;
                $solicitud_duplicada->user_id         = Auth::user()->id;
                $solicitud_duplicada->area_id         = $request->AreaTrabajo;
                $solicitud_duplicada->tipo_trabajo_id = $request->TipoTrabajo;
                $solicitud_duplicada->fecha_ejecucion = $request->FechaEjecución;
                $solicitud_duplicada->descripcion     = $ticket->descripcion;
                $solicitud_duplicada->site_id         = $ticket->site_id;
                $solicitud_duplicada->tipo_gasto_id   = $request->TipoGasto;
                $solicitud_duplicada->contingencia_id = $request->TipoContingencia;
                $solicitud_duplicada->proveedor_id    = $request->ProveedorId;

                $solicitud_duplicada->tipo_moneda_id   = $request->TipoMoneda;
                $solicitud_duplicada->costos_activos   = null;
                $solicitud_duplicada->costos_servicios = floatval($request->Servicio);
                $solicitud_duplicada->ework            = $request->ework;
                $solicitud_duplicada->fecha_creacion   = Carbon::now();
                $solicitud_duplicada->estado_id        = 1;
                $solicitud_duplicada->boleta           = $request->Boleta;
                $solicitud_duplicada->subgrencia       = 1;
                $solicitud_duplicada->proceso_id       = $proceso;
                $solicitud_duplicada->subestado_id     = $subestado;
                $solicitud_duplicada->creacion         = 1;
                $solicitud_duplicada->id_crm           = $ticket->crm_id;
                $solicitud_duplicada->tipo_boleta_id   = $request->TipoBoleta;

                $solicitud_duplicada->save();
                ///ARCHIVOS SEGUNDA SOLICITUD//////////
                $this->filesUploadSecondRequest($request, $duplicado, $ticket_id, $solicitud);
                ///////////////////////////////////////////////////////////////////////////////////////////////////////

                ///////////////////////////////////////////////////////////////////////////////////////////////////////
                ///////////////////////////////////////////////////////////////////////////////////////////////////////

                if ($conversionActivo > 1435544) {
                    if ($request->DeclaracionCpu == "on") {
                        $solicitud->formulario = 1;
                        $solicitud->save();

                        $formulario                      = new Formulario;
                        $formulario->cod_tipo_formulario = 1;
                        $formulario->nuevassolicitud_id  = $solicitud->id;
                        $formulario->numero_cotizacion   = $request->NcotizacionCpu;
                        $formulario->nombre_proyecto     = $request->NombreProyectoCpu;
                        $formulario->cod_tipo_motivo     = $request->NecesidadId;
                        $formulario->descripcion_motivo  = $request->Necesidades;
                        $formulario->justificacion       = $request->descripcionProveedorCpu;
                        $formulario->save();
                    }
                } else {
                    if ($conversionservicio > 1435544) {
                        if ($request->DeclaracionCpu == "on") {
                            $solicitud->formulario = 1;
                            $solicitud->save();

                            $formulario                      = new Formulario;
                            $formulario->cod_tipo_formulario = 1;
                            $formulario->nuevassolicitud_id  = $duplicado->id;
                            $formulario->numero_cotizacion   = $request->NcotizacionCpu;
                            $formulario->nombre_proyecto     = $request->NombreProyectoCpu;
                            $formulario->cod_tipo_motivo     = $request->NecesidadId;
                            $formulario->descripcion_motivo  = $request->Necesidades;
                            $formulario->justificacion       = $request->descripcionProveedorCpu;
                            $formulario->save();
                        }
                    }
                }

                $mensaje = 'Solicitud sgc nro ' . ' ' . $solicitud->id . ' ' . 'y' . ' ' . 'solicitud nro' . ' ' . $duplicado->id . ' ' . 'creadas  para el sitio' . ' ' . $sitio->nem_site;
                return $mensaje;
            } else {

                $solicitud                  = new SolicitudSgc;
                $solicitud->user_id         = Auth::user()->id;
                $solicitud->area_id         = $request->AreaTrabajo;
                $solicitud->tipo_trabajo_id = $request->TipoTrabajo;
                $solicitud->fecha_ejecucion = $request->FechaEjecución;
                $solicitud->descripcion     = $ticket->descripcion;
                $solicitud->site_id         = $ticket->site_id;
                $solicitud->tipo_gasto_id   = $request->TipoGasto;
                $solicitud->contingencia_id = $request->TipoContingencia;
                $solicitud->proveedor_id    = $request->ProveedorId;
                $solicitud->tipo_moneda_id  = $request->TipoMoneda;
                $solicitud->first_request   = 1;
                if ($request->Activo != null) {
                    $solicitud->costos_activos   = floatval($request->Activo);
                    $solicitud->costos_servicios = null;
                } else {
                    if ($request->Servicio != null) {
                        $solicitud->costos_activos   = null;
                        $solicitud->costos_servicios = floatval($request->Servicio);
                    }
                }

                $solicitud->ework          = $request->ework;
                $solicitud->fecha_creacion = Carbon::now();
                $solicitud->estado_id      = 1;
                $solicitud->boleta         = $request->Boleta;
                $solicitud->subgrencia     = 1;
                $solicitud->proceso_id     = $proceso;
                $solicitud->subestado_id   = $subestado;
                $solicitud->creacion       = 1;
                $solicitud->id_crm         = $ticket->crm_id;
                $solicitud->ticket_id      = $ticket->id;
                $solicitud->tipo_boleta_id = $request->TipoBoleta;
                $solicitud->save();

                /////////////CARGA ARCHIVOS PRIMERA SOLICITUD////////////////
                $this->filesUploadFirstRequest($request, $solicitud, $ticket_id);
                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                $log                  = new Log;
                $log->ticket_id       = $ticket->id;
                $log->tipo_mensaje_id = 1;
                $log->descripcion     = 'Solicitud en sgc creada, nro°:' . ' ' . $solicitud->id;
                $log->user_id         = Auth::user()->id;
                $log->save();

                if ($request->DeclaracionCpu == "on") {
                    $solicitud->formulario = 1;
                    $solicitud->save();

                    $formulario                      = new Formulario;
                    $formulario->cod_tipo_formulario = 1;
                    $formulario->nuevassolicitud_id  = $duplicado->id;
                    $formulario->numero_cotizacion   = $request->NcotizaciónCpu;
                    $formulario->nombre_proyecto     = $request->NombreProyectoCpu;
                    $formulario->cod_tipo_motivo     = $request->NecesidadId;
                    $formulario->descripcion_motivo  = $request->Necesidades;
                    $formulario->justificacion       = $request->descripcionProveedorCpu;
                    $formulario->save();
                }

                $mensaje = 'Solicitud sgc nro ' . ' ' . $solicitud->id . ' ' . 'creada para el sitio' . ' ' . $sitio->nem_site;
                return $mensaje;
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filesUploadFirstRequest($request, $solicitud, $ticket_id)
    {
        try {

            $destinationPath         = 'archivosSgc';
            $carpeta_archivos_ticket = 'archivos';
            $sgc_ticket              = SolicitudSgc::where('ticket_id', $ticket_id)->count();

            if ($sgc_ticket == 1) {
                ///////////////////////// COPIA DE ARCHIVOS DESDE LA TICKETERA////////////////////////////////

                ////////// COTIZACIONES ////////////////////////////
                $cotizacion_ticket = Archivo::where('ticket_id', $ticket_id)->where('tipo_archivo_id', 1)->get();
                if ($cotizacion_ticket) {
                    $a = 0;
                    foreach ($cotizacion_ticket as $c_t) {
                        $a++;
                        $archivo                     = new ArchivoSgc;
                        $nombre_nuevo                = $solicitud->id . '_' . 'COTIZACION' . '(' . $a . ')' . '.' . $c_t->extension;
                        $archivo->nombre_archivo     = $nombre_nuevo;
                        $archivo->nuevassolicitud_id = $solicitud->id;
                        $archivo->extension          = $c_t->extension;

                        $archivo->tipo_archivo_id = 1;
                        if ($c_t->extension == 'xls' || $c_t->extension == 'xlsx') {
                            $archivo->class = 'far fa-file-excel';
                        } else {
                            if ($c_t->extension == 'doc' || $c_t->extension == 'docx') {
                                $archivo->class = 'far fa-file-word';
                            } else {
                                if ($c_t->extension == 'pdf' || $c_t->extension == 'PDF') {
                                    $archivo->class = 'fas fa-file-pdf';
                                } else {
                                    if ($c_t->extension == 'img' || $c_t->extension == 'png' || $c_t->extension == 'jpg' || $c_t->extension == 'jpeg' || $c_t->extension == 'JPG' || $c_t->extension == 'PNG' || $c_t->extension == 'IMG' || $c_t->extension == 'JPEG') {

                                        $archivo->class = 'fas fa-file-image';
                                    }
                                }
                            }
                        }

                        $archivo->save();

                        copy($carpeta_archivos_ticket . '/' . $c_t->nombre_archivo, $destinationPath . '/' . $nombre_nuevo);
                    }
                }
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

                ////////// INFORME FINAL ////////////////////////////
                $informe_final_ticket = Archivo::where('ticket_id', $ticket_id)->where('tipo_archivo_id', 2)->count();
                if ($informe_final_ticket != 0) {
                    $a                    = 0;
                    $informe_final_ticket = Archivo::where('ticket_id', $ticket_id)->where('tipo_archivo_id', 2)->get();
                    foreach ($informe_final_ticket as $f_t) {
                        $a++;
                        $archivo                     = new ArchivoSgc;
                        $nombre_nuevo                = $solicitud->id . '_' . 'INFORME_FINAL' . '(' . $a . ')' . '.' . $f_t->extension;
                        $archivo->nombre_archivo     = $nombre_nuevo;
                        $archivo->nuevassolicitud_id = $solicitud->id;
                        $archivo->extension          = $f_t->extension;

                        $archivo->tipo_archivo_id = 2;
                        if ($f_t->extension == 'xls' || $f_t->extension == 'xlsx') {
                            $archivo->class = 'far fa-file-excel';
                        } else {
                            if ($f_t->extension == 'doc' || $f_t->extension == 'docx') {
                                $archivo->class = 'far fa-file-word';
                            } else {
                                if ($f_t->extension == 'pdf' || $f_t->extension == 'PDF') {
                                    $archivo->class = 'fas fa-file-pdf';
                                } else {
                                    if ($f_t->extension == 'img' || $f_t->extension == 'png' || $f_t->extension == 'jpg' || $f_t->extension == 'jpeg' || $f_t->extension == 'JPG' || $f_t->extension == 'PNG' || $f_t->extension == 'IMG' || $f_t->extension == 'JPEG') {

                                        $archivo->class = 'fas fa-file-image';
                                    }
                                }
                            }
                        }

                        $archivo->save();

                        copy($carpeta_archivos_ticket . '/' . $f_t->nombre_archivo, $destinationPath . '/' . $nombre_nuevo);
                    }
                    $solicitud->informefinal = 1;
                    $solicitud->save();
                }
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

                ////////// GUIA DE DESPACHO ////////////////////////////
                $guia_despacho_ticket = Archivo::where('ticket_id', $ticket_id)->where('tipo_archivo_id', 4)->count();
                if ($guia_despacho_ticket != 0) {
                    $guia_despacho_ticket = Archivo::where('ticket_id', $ticket_id)->where('tipo_archivo_id', 4)->get();
                    $a                    = 0;
                    foreach ($guia_despacho_ticket as $g_t) {
                        $a++;
                        $archivo                     = new ArchivoSgc;
                        $nombre_nuevo                = $solicitud->id . '_' . 'GUIA_DESPACHO' . '(' . $a . ')' . '.' . $g_t->extension;
                        $archivo->nombre_archivo     = $nombre_nuevo;
                        $archivo->nuevassolicitud_id = $solicitud->id;
                        $archivo->extension          = $g_t->extension;

                        $archivo->tipo_archivo_id = 4;
                        if ($g_t->extension == 'xls' || $g_t->extension == 'xlsx') {
                            $archivo->class = 'far fa-file-excel';
                        } else {
                            if ($g_t->extension == 'doc' || $g_t->extension == 'docx') {
                                $archivo->class = 'far fa-file-word';
                            } else {
                                if ($g_t->extension == 'pdf' || $g_t->extension == 'PDF') {
                                    $archivo->class = 'fas fa-file-pdf';
                                } else {
                                    if ($g_t->extension == 'img' || $g_t->extension == 'png' || $g_t->extension == 'jpg' || $g_t->extension == 'jpeg' || $g_t->extension == 'JPG' || $g_t->extension == 'PNG' || $g_t->extension == 'IMG' || $g_t->extension == 'JPEG') {

                                        $archivo->class = 'fas fa-file-image';
                                    }
                                }
                            }
                        }

                        $archivo->save();

                        copy($carpeta_archivos_ticket . '/' . $g_t->nombre_archivo, $destinationPath . '/' . $nombre_nuevo);
                    }
                    $solicitud->guiadespacho = 1;
                    $solicitud->save();
                }
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

                ////////// VALIDACIÓN DE COMPRAS ////////////////////////////
                $validacion_compras = Archivo::where('ticket_id', $ticket_id)->where('tipo_archivo_id', 17)->count();
                if ($validacion_compras != 0) {
                    $validacion_compras = Archivo::where('ticket_id', $ticket_id)->where('tipo_archivo_id', 17)->get();
                    $a                    = 0;
                    foreach ($validacion_compras as $g_t) {
                        $a++;
                        $archivo                     = new ArchivoSgc;
                        $nombre_nuevo                = $solicitud->id . '_' . 'validacion_compras' . '(' . $a . ')' . '.' . $g_t->extension;
                        $archivo->nombre_archivo     = $nombre_nuevo;
                        $archivo->nuevassolicitud_id = $solicitud->id;
                        $archivo->extension          = $g_t->extension;

                        $archivo->tipo_archivo_id = 17;
                        if ($g_t->extension == 'xls' || $g_t->extension == 'xlsx') {
                            $archivo->class = 'far fa-file-excel';
                        } else {
                            if ($g_t->extension == 'doc' || $g_t->extension == 'docx') {
                                $archivo->class = 'far fa-file-word';
                            } else {
                                if ($g_t->extension == 'pdf' || $g_t->extension == 'PDF') {
                                    $archivo->class = 'fas fa-file-pdf';
                                } else {
                                    if ($g_t->extension == 'img' || $g_t->extension == 'png' || $g_t->extension == 'jpg' || $g_t->extension == 'jpeg' || $g_t->extension == 'JPG' || $g_t->extension == 'PNG' || $g_t->extension == 'IMG' || $g_t->extension == 'JPEG') {

                                        $archivo->class = 'fas fa-file-image';
                                    }
                                }
                            }
                        }

                        $archivo->save();

                        copy($carpeta_archivos_ticket . '/' . $g_t->nombre_archivo, $destinationPath . '/' . $nombre_nuevo);
                    }
                    $solicitud->guiadespacho = 1;
                    $solicitud->save();
                }
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

            }

            /////////////////////////CARGA DE ARCHIVOS SELECCIONADOS EN EL FORMULARIO TICKET-SGC////////////////////////////////

            $files = $request->file('Cotizacion');
            if ($files != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($files as $file) {
                    $a++;

                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_nuevo                = $solicitud->id . '_' . 'COTIZACION' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo;
                    $archivo->nuevassolicitud_id = $solicitud->id;
                    $archivo->extension          = $extension;
                    $archivo->tipo_archivo_id    = 1;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->class = 'far fa-file-excel';
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->class = 'far fa-file-word';
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->class = 'fas fa-file-pdf';
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {

                                    $archivo->class = 'fas fa-file-image';
                                }
                            }
                        }
                    }
                    $archivo->save();

                    $upload_success = $file->move($destinationPath, $nombre_nuevo);
                }
            }

            
            $files = $request->file('validacion_compras');
            if ($files != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($files as $file) {
                    $a++;

                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_nuevo                = $solicitud->id . '_' . 'VALIDACION_COMPRAS' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo;
                    $archivo->nuevassolicitud_id = $solicitud->id;
                    $archivo->extension          = $extension;
                    $archivo->tipo_archivo_id    = 17;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->class = 'far fa-file-excel';
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->class = 'far fa-file-word';
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->class = 'fas fa-file-pdf';
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {

                                    $archivo->class = 'fas fa-file-image';
                                }
                            }
                        }
                    }
                    $archivo->save();

                    $upload_success = $file->move($destinationPath, $nombre_nuevo);
                }
            }

            $fileslpu = $request->file('lpufile');
            if ($fileslpu != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($fileslpu as $file) {
                    $a++;

                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_nuevo                = $solicitud->id . '_' . 'LPU' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo;
                    $archivo->nuevassolicitud_id = $solicitud->id;
                    $archivo->extension          = $extension;

                    $archivo->tipo_archivo_id = 6;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->class = 'far fa-file-excel';
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->class = 'far fa-file-word';
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->class = 'fas fa-file-pdf';
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {

                                    $archivo->class = 'fas fa-file-image';
                                }
                            }
                        }
                    }
                    $archivo->save();

                    $upload_success = $file->move($destinationPath, $nombre_nuevo);
                }
            }

            $filespxq = $request->file('pxq');

            if ($filespxq != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($filespxq as $file) {
                    $a++;

                    $filename                    = $file->getClientOriginalName();
                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_nuevo                = $solicitud->id . '_' . 'PXQ' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo;
                    $archivo->nuevassolicitud_id = $solicitud->id;
                    $archivo->extension          = $extension;

                    $archivo->tipo_archivo_id = 11;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->class = 'far fa-file-excel';
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->class = 'far fa-file-word';
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->class = 'fas fa-file-pdf';
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {

                                    $archivo->class = 'fas fa-file-image';
                                }
                            }
                        }
                    }
                    $archivo->save();

                    $upload_success = $file->move($destinationPath, $nombre_nuevo);
                }
            }

            ///////////////INFORME FINAL

            $fileInforme = $request->file('InfFinal');

            if ($fileInforme != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($fileInforme as $file) {
                    $a++;

                    $filename                    = $file->getClientOriginalName();
                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_nuevo                = $solicitud->id . '_' . 'INFORME_FINAL' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo;
                    $archivo->nuevassolicitud_id = $solicitud->id;
                    $archivo->extension          = $extension;

                    $archivo->tipo_archivo_id = 2;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->class = 'far fa-file-excel';
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->class = 'far fa-file-word';
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->class = 'fas fa-file-pdf';
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {

                                    $archivo->class = 'fas fa-file-image';
                                }
                            }
                        }
                    }
                    $archivo->save();

                    $upload_success = $file->move($destinationPath, $nombre_nuevo);
                }

                $solicitud->informefinal = 1;
                $solicitud->save();
            }

            ///////////////GUIA DESPACHO
            $fileGuia = $request->file('guiaDespacho');

            if ($fileGuia != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($fileGuia as $file) {
                    $a++;

                    $filename                    = $file->getClientOriginalName();
                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_nuevo                = $solicitud->id . '_' . 'GUIA_DESPACHO' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo;
                    $archivo->nuevassolicitud_id = $solicitud->id;
                    $archivo->extension          = $extension;

                    $archivo->tipo_archivo_id = 4;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->class = 'far fa-file-excel';
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->class = 'far fa-file-word';
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->class = 'fas fa-file-pdf';
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {

                                    $archivo->class = 'fas fa-file-image';
                                }
                            }
                        }
                    }
                    $archivo->save();

                    $upload_success = $file->move($destinationPath, $nombre_nuevo);
                }

                $solicitud->guiadespacho = 1;
                $solicitud->save();
            }

            ///////////////CARTA ADJUDICACION
            $fileCarta = $request->file('CartaAdjudicación');

            if ($fileCarta != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($fileCarta as $file) {
                    $a++;

                    $filename                    = $file->getClientOriginalName();
                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_nuevo                = $solicitud->id . '_' . 'CARTA_ADJUDICACIÓN' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo;
                    $archivo->extension          = $extension;
                    $archivo->nuevassolicitud_id = $solicitud->id;

                    $archivo->tipo_archivo_id = 8;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->class = 'far fa-file-excel';
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->class = 'far fa-file-word';
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->class = 'fas fa-file-pdf';
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {

                                    $archivo->class = 'fas fa-file-image';
                                }
                            }
                        }
                    }
                    $archivo->save();

                    $upload_success = $file->move($destinationPath, $nombre_nuevo);
                }
            }

            ///////////////OTROS
            $fileOtros = $request->file('Otros');

            if ($fileOtros != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($fileOtros as $file) {
                    $a++;

                    $filename                    = $file->getClientOriginalName();
                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_nuevo                = $solicitud->id . '_' . 'OTRO' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo;
                    $archivo->extension          = $extension;
                    $archivo->nuevassolicitud_id = $solicitud->id;

                    $archivo->tipo_archivo_id = 5;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->class = 'far fa-file-excel';
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->class = 'far fa-file-word';
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->class = 'fas fa-file-pdf';
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {

                                    $archivo->class = 'fas fa-file-image';
                                }
                            }
                        }
                    }
                    $archivo->save();

                    $upload_success = $file->move($destinationPath, $nombre_nuevo);
                }
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filesUploadSecondRequest($request, $duplicado, $ticket_id, $solicitud)
    {
        try {

            $destinationPath         = 'archivosSgc';
            $carpeta_archivos_ticket = 'archivos';
            $sgc_ticket              = SolicitudSgc::where('ticket_id', $ticket_id)->where('solicitud_duplicada_id', $duplicado->id)->count();
            $sgc_ticket_first        = SolicitudSgc::where('ticket_id', $ticket_id)->count();

            if ($sgc_ticket != 0 && $sgc_ticket_first == 2) {
                ///////////////////////// COPIA DE ARCHIVOS DESDE LA TICKETERA////////////////////////////////

                ////////// COTIZACIONES ////////////////////////////
                $cotizacion_ticket = Archivo::where('ticket_id', $ticket_id)->where('tipo_archivo_id', 1)->get();
                if ($cotizacion_ticket) {
                    $a = 0;
                    foreach ($cotizacion_ticket as $c_t) {
                        $a++;
                        $archivo                     = new ArchivoSgc;
                        $nombre_nuevo                = $duplicado->id . '_' . 'COTIZACION' . '(' . $a . ')' . '.' . $c_t->extension;
                        $archivo->nombre_archivo     = $nombre_nuevo;
                        $archivo->nuevassolicitud_id = $duplicado->id;
                        $archivo->extension          = $c_t->extension;

                        $archivo->tipo_archivo_id = 1;
                        if ($c_t->extension == 'xls' || $c_t->extension == 'xlsx') {
                            $archivo->class = 'far fa-file-excel';
                        } else {
                            if ($c_t->extension == 'doc' || $c_t->extension == 'docx') {
                                $archivo->class = 'far fa-file-word';
                            } else {
                                if ($c_t->extension == 'pdf' || $c_t->extension == 'PDF') {
                                    $archivo->class = 'fas fa-file-pdf';
                                } else {
                                    if ($c_t->extension == 'img' || $c_t->extension == 'png' || $c_t->extension == 'jpg' || $c_t->extension == 'jpeg' || $c_t->extension == 'JPG' || $c_t->extension == 'PNG' || $c_t->extension == 'IMG' || $c_t->extension == 'JPEG') {

                                        $archivo->class = 'fas fa-file-image';
                                    }
                                }
                            }
                        }

                        $archivo->save();

                        copy($carpeta_archivos_ticket . '/' . $c_t->nombre_archivo, $destinationPath . '/' . $nombre_nuevo);
                    }
                }
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

                ////////// INFORME FINAL ////////////////////////////
                $informe_final_ticket = Archivo::where('ticket_id', $ticket_id)->where('tipo_archivo_id', 2)->get();
                if ($informe_final_ticket) {
                    $a = 0;
                    foreach ($informe_final_ticket as $f_t) {
                        $a++;
                        $archivo                     = new ArchivoSgc;
                        $nombre_nuevo                = $duplicado->id . '_' . 'INFORME_FINAL' . '(' . $a . ')' . '.' . $f_t->extension;
                        $archivo->nombre_archivo     = $nombre_nuevo;
                        $archivo->nuevassolicitud_id = $duplicado->id;
                        $archivo->extension          = $f_t->extension;

                        $archivo->tipo_archivo_id = 2;
                        if ($f_t->extension == 'xls' || $f_t->extension == 'xlsx') {
                            $archivo->class = 'far fa-file-excel';
                        } else {
                            if ($f_t->extension == 'doc' || $f_t->extension == 'docx') {
                                $archivo->class = 'far fa-file-word';
                            } else {
                                if ($f_t->extension == 'pdf' || $f_t->extension == 'PDF') {
                                    $archivo->class = 'fas fa-file-pdf';
                                } else {
                                    if ($f_t->extension == 'img' || $f_t->extension == 'png' || $f_t->extension == 'jpg' || $f_t->extension == 'jpeg' || $f_t->extension == 'JPG' || $f_t->extension == 'PNG' || $f_t->extension == 'IMG' || $f_t->extension == 'JPEG') {

                                        $archivo->class = 'fas fa-file-image';
                                    }
                                }
                            }
                        }

                        $archivo->save();

                        copy($carpeta_archivos_ticket . '/' . $f_t->nombre_archivo, $destinationPath . '/' . $nombre_nuevo);
                    }
                    $duplicado->informefinal = 1;
                    $duplicado->save();
                }
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

                ////////// GUIA DE DESPACHO ////////////////////////////
                $guia_despacho_ticket = Archivo::where('ticket_id', $ticket_id)->where('tipo_archivo_id', 4)->get();
                if ($guia_despacho_ticket) {
                    $a = 0;
                    foreach ($guia_despacho_ticket as $g_t) {
                        $a++;
                        $archivo                     = new ArchivoSgc;
                        $nombre_nuevo                = $duplicado->id . '_' . 'GUIA_DESPACHO' . '(' . $a . ')' . '.' . $g_t->extension;
                        $archivo->nombre_archivo     = $nombre_nuevo;
                        $archivo->nuevassolicitud_id = $duplicado->id;
                        $archivo->extension          = $g_t->extension;

                        $archivo->tipo_archivo_id = 4;
                        if ($g_t->extension == 'xls' || $g_t->extension == 'xlsx') {
                            $archivo->class = 'far fa-file-excel';
                        } else {
                            if ($g_t->extension == 'doc' || $g_t->extension == 'docx') {
                                $archivo->class = 'far fa-file-word';
                            } else {
                                if ($g_t->extension == 'pdf' || $g_t->extension == 'PDF') {
                                    $archivo->class = 'fas fa-file-pdf';
                                } else {
                                    if ($g_t->extension == 'img' || $g_t->extension == 'png' || $g_t->extension == 'jpg' || $g_t->extension == 'jpeg' || $g_t->extension == 'JPG' || $g_t->extension == 'PNG' || $g_t->extension == 'IMG' || $g_t->extension == 'JPEG') {

                                        $archivo->class = 'fas fa-file-image';
                                    }
                                }
                            }
                        }

                        $archivo->save();

                        copy($carpeta_archivos_ticket . '/' . $g_t->nombre_archivo, $destinationPath . '/' . $nombre_nuevo);
                    }
                    $duplicado->guiadespacho = 1;
                    $duplicado->save();
                }
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

                ////////// VALIDACIÓN DE COMPRAS ////////////////////////////
                $validacion_compras = Archivo::where('ticket_id', $ticket_id)->where('tipo_archivo_id', 17)->count();
                if ($validacion_compras != 0) {
                    $validacion_compras = Archivo::where('ticket_id', $ticket_id)->where('tipo_archivo_id', 17)->get();
                    $a                    = 0;
                    foreach ($validacion_compras as $g_t) {
                        $a++;
                        $archivo                     = new ArchivoSgc;
                        $nombre_nuevo                = $solicitud->id . '_' . 'validacion_compras' . '(' . $a . ')' . '.' . $g_t->extension;
                        $archivo->nombre_archivo     = $nombre_nuevo;
                        $archivo->nuevassolicitud_id = $solicitud->id;
                        $archivo->extension          = $g_t->extension;

                        $archivo->tipo_archivo_id = 17;
                        if ($g_t->extension == 'xls' || $g_t->extension == 'xlsx') {
                            $archivo->class = 'far fa-file-excel';
                        } else {
                            if ($g_t->extension == 'doc' || $g_t->extension == 'docx') {
                                $archivo->class = 'far fa-file-word';
                            } else {
                                if ($g_t->extension == 'pdf' || $g_t->extension == 'PDF') {
                                    $archivo->class = 'fas fa-file-pdf';
                                } else {
                                    if ($g_t->extension == 'img' || $g_t->extension == 'png' || $g_t->extension == 'jpg' || $g_t->extension == 'jpeg' || $g_t->extension == 'JPG' || $g_t->extension == 'PNG' || $g_t->extension == 'IMG' || $g_t->extension == 'JPEG') {

                                        $archivo->class = 'fas fa-file-image';
                                    }
                                }
                            }
                        }

                        $archivo->save();

                        copy($carpeta_archivos_ticket . '/' . $g_t->nombre_archivo, $destinationPath . '/' . $nombre_nuevo);
                    }
                    $solicitud->guiadespacho = 1;
                    $solicitud->save();
                }
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

            } else {
                $archivos_solcitud_primaria = ArchivoSgc::where('nuevassolicitud_id', $solicitud->id)->get();

                $a = 0;
                foreach ($archivos_solcitud_primaria as $slc_p) {
                    if ($slc_p->tipo_archivo_id == 1) {
                        $nombre_tipo_archivo = 'COTIZACION';
                        $tipo_archivo_id     = 1; //esto falta
                    } else {
                        if ($slc_p->tipo_archivo_id == 2) {
                            $nombre_tipo_archivo     = 'INFORME_FINAL';
                            $tipo_archivo_id         = 2;
                            $duplicado->informefinal = 1;
                            $duplicado->save();
                        } else {
                            if ($slc_p->tipo_archivo_id == 4) {
                                $nombre_tipo_archivo     = 'GUIA_DESPACHO';
                                $duplicado->guiadespacho = 1;
                                $tipo_archivo_id         = 4;
                                $duplicado->save();
                            } else {
                                if ($slc_p->tipo_archivo_id == 5) {
                                    $tipo_archivo_id     = 5;
                                    $nombre_tipo_archivo = 'OTRO';
                                } else {
                                    if ($slc_p->tipo_archivo_id == 6) {
                                        $tipo_archivo_id     = 6;
                                        $nombre_tipo_archivo = 'LPU';
                                    } else {
                                        if ($slc_p->tipo_archivo_id == 8) {
                                            $tipo_archivo_id     = 8;
                                            $nombre_tipo_archivo = 'CARTA_ADJUDICACION';
                                        } else {
                                            if ($slc_p->tipo_archivo_id == 11) {
                                                $tipo_archivo_id     = 11;
                                                $nombre_tipo_archivo = 'PQX';
                                            }else{
                                                if ($slc_p->tipo_archivo_id == 17) {
                                                    $tipo_archivo_id     = 17;
                                                    $nombre_tipo_archivo = 'VALIDACION_COMPRAS';
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    $a++;
                    $archivo                     = new ArchivoSgc;
                    $nombre_nuevo                = $duplicado->id . '_' . $nombre_tipo_archivo . '(' . $a . ')' . '.' . $slc_p->extension;
                    $archivo->nombre_archivo     = $nombre_nuevo;
                    $archivo->nuevassolicitud_id = $duplicado->id;
                    $archivo->class              = $slc_p->class;
                    $archivo->extension          = $slc_p->extension;
                    $archivo->tipo_archivo_id    = $tipo_archivo_id;
                    $archivo->save();

                    copy($destinationPath . '/' . $slc_p->nombre_archivo, $destinationPath . '/' . $nombre_nuevo);
                }
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\ArchivoSgc;
use App\BitacoraSgc;
use App\Detalle_ingreso_data;
use App\SolicitudSgc;
use App\Solicitud_duplicada;
use App\Ticket;
use App\Tipo_boleta;
use App\Tipo_moneda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\updateListSgcEvent;

class SgcEditController extends Controller
{
    public function __construct()
    {

        Carbon::setLocale('es');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editUser(Request $request)
    {

        $solicitud          = SolicitudSgc::find($request->solicitud_id);
        $solicitud->user_id = $request->user_id;
        $solicitud->save();
        $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
        if ($verficicación != 0) {
            $data_duplicada          = Solicitud_duplicada::find($request->solicitud_id);
            $data_duplicada->user_id = $request->user_id;
            $data_duplicada->save();
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = 'El usuario creador fue modificado.';
        $bitacora->save();
        // event(new updateListSgcEvent);
        return;
    }

    public function UpdateCotizacionSgc(Request $request)
    {
        $solicitud = SolicitudSgc::find($request->solicitud_id);
        if ($solicitud->cotizacion == null) {
            $mensaje = 'El nro° de cotización fue ingresado';
        } else {
            if ($solicitud->cotizacion != null) {
                $mensaje = 'El nro° de cotización fue editado';
            }
        }
        $solicitud->cotizacion = $request->cotizacion;
        $solicitud->save();
        $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
        if ($verficicación != 0) {
            $data_duplicada             = Solicitud_duplicada::find($request->solicitud_id);
            $data_duplicada->cotizacion = $request->cotizacion;
            $data_duplicada->save();
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = $mensaje;
        $bitacora->save();
        // event(new updateListSgcEvent);
        return;
    }

    public function UpdateEworkSgc(Request $request)
    {
        $solicitud = SolicitudSgc::find($request->solicitud_id);
        if ($solicitud->ework == null) {
            $mensaje = 'El nro° de ework fue ingresado';
        } else {
            if ($solicitud->ework != null) {
                $mensaje = 'El nro° de ework fue editado';
            }
        }
        $solicitud->ework = $request->ework;
        $solicitud->save();
        $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
        if ($verficicación != 0) {
            $data_duplicada        = Solicitud_duplicada::find($request->solicitud_id);
            $data_duplicada->ework = $request->ework;
            $data_duplicada->save();
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = $mensaje;
        $bitacora->save();
        // event(new updateListSgcEvent);
        return;
    }

    public function DeleteFileSgc($id)
    {
        $archivo = ArchivoSgc::find($id);
        if ($archivo->tipo_archivo_id == 2) {
            $solicitud               = SolicitudSgc::find($archivo->nuevassolicitud_id);
            $solicitud->informefinal = null;
            $solicitud->save();
        } else {
            if ($archivo->tipo_archivo_id == 4) {
                $solicitud               = SolicitudSgc::find($archivo->nuevassolicitud_id);
                $solicitud->guiadespacho = null;
                $solicitud->save();
            }
        }

        $verficicación = Solicitud_duplicada::where('id', $id)->count();
        if ($verficicación != 0) {
            $data_duplicada = Solicitud_duplicada::find($id);
            if ($archivo->tipo_archivo_id == 2) {

                $data_duplicada->informefinal = null;
                $data_duplicada->save();
            } else {
                if ($archivo->tipo_archivo_id == 4) {

                    $data_duplicada->guiadespacho = null;
                    $data_duplicada->save();
                }
            }
        }

        if (file_exists('archivosSgc/' . $archivo->nombre_archivo) == true) {

            unlink('archivosSgc/' . $archivo->nombre_archivo);
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $archivo->nuevassolicitud_id;
        $bitacora->mensaje            = "Archivo  $archivo->nombre_archivo eliminado";
        $bitacora->save();
        $archivo->delete();
        return;
    }

    public function EditEstadoSolicitud(Request $request)
    {
        if (Solicitud_duplicada::where('id', $request->solicitud_id)->count() != 0) {
            $solicitud_duplicada               = Solicitud_duplicada::find($request->solicitud_id);
            $solicitud_duplicada->proceso_id   = $request->proceso_id;
            $solicitud_duplicada->subestado_id = $request->subproceso_id;
            $solicitud_duplicada->save();
        }

        $solicitud               = SolicitudSgc::find($request->solicitud_id);
        $solicitud->proceso_id   = $request->proceso_id;
        $solicitud->subestado_id = $request->subproceso_id;
        $solicitud->save();

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = 'El estado fue editado.';
        $bitacora->save();

        return;
    }

    public function UploadFilesSgc(Request $request)
    {
        try {

            $destinationPath = 'archivosSgc';
            $solicitud       = SolicitudSgc::find($request->solicitud_id);
            $files           = $request->file('files');
            $total           = ArchivoSgc::where('nuevassolicitud_id', $request->solicitud_id)->where('tipo_archivo_id', $request->tipo_archivo_id)->count();
            if ($total != 0) {
                $a = $total;
            } else {
                $a = 0;
            }
            if ($files != null) {

                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($files as $file) {

                    $filename  = $file->getClientOriginalname();
                    $extension = $file->getClientOriginalExtension();
                    if ($request->tipo_archivo_id == 1) {
                        $nombre = 'Cotizacion';
                        $tipo   = 1;
                    }
                    if ($request->tipo_archivo_id == 2) {
                        $nombre = 'Informe_Final';
                        $tipo   = 2;
                    }
                    if ($request->tipo_archivo_id == 4) {
                        $nombre = 'Guia_despacho';
                        $tipo   = 4;
                    }
                    if ($request->tipo_archivo_id == 5) {
                        $nombre = 'Otro';
                        $tipo   = 5;
                    }
                    if ($request->tipo_archivo_id == 6) {
                        $nombre = 'LPU';
                        $tipo   = 6;
                    }
                    if ($request->tipo_archivo_id == 7) {
                        $nombre = 'Mail';
                        $tipo   = 7;
                    }
                    if ($request->tipo_archivo_id == 8) {
                        $nombre = 'Carta_Adjudicacion';
                        $tipo   = 8;
                    }
                    if ($request->tipo_archivo_id == 9) {
                        $nombre = 'Informe_Parcial';
                        $tipo   = 9;
                    }
                    if (request('tipo_archivo_id') == 11) {
                        $nombre = $filename;
                        $tipo   = 11;
                    }
                    if ($request->tipo_archivo_id == 12) {
                        $nombre = 'Imagen informe fotografico';
                        $tipo   = 12;
                    }
                    if ($request->tipo_archivo_id == 13) {
                        $nombre = $filename;
                        $tipo   = 13;
                    }
                    if ($request->tipo_archivo_id == 14) {
                        $nombre = $filename;
                        $tipo   = 14;
                    }
                    if ($request->tipo_archivo_id == 17) {
                        $nombre = 'Validación de compras';
                        $tipo   = 17;
                    }

                    $a++;

                    $bitacora                     = new BitacoraSgc;
                    $bitacora->user_id            = Auth::user()->id;
                    $bitacora->nuevassolicitud_id = $request->solicitud_id;
                    $bitacora->mensaje            = 'Archivo ' . ' ' . $filename . ' ' . 'cargado';
                    $bitacora->save();

                    $archivo                     = new ArchivoSgc;
                    $new_name_file               = $solicitud->id . '_' . $nombre . '(' . $a . ')' . '_' . $archivo->id . '.' . $extension;
                    $name_temporal               = $solicitud->id . '_' . $nombre . '(' . $a . ')' . '_' . $archivo->id;
                    $archivo->nombre_archivo     = $new_name_file;
                    $archivo->nuevassolicitud_id = $solicitud->id;
                    $archivo->extension          = $extension;

                    $archivo->tipo_archivo_id = $request->tipo_archivo_id;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->icono_archivo = "/logosEntel/exel.png";
                        $archivo->class         = 'far fa-file-excel';
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->icono_archivo = "/logosEntel/doc3.png";
                            $archivo->class         = 'far fa-file-word';
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->icono_archivo = "/logosEntel/nuevopdf2.png";
                                $archivo->class         = 'fas fa-file-pdf';
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {;
                                    $archivo->icono_archivo = "/logosEntel/img2.png";
                                    $archivo->class         = 'fas fa-file-image';
                                } else {
                                    if ($extension == 'msg' || $extension == 'MSG') {
                                        $archivo->class = 'fas fa-envelope';
                                    }
                                }
                            }
                        }
                    }
                    $archivo->save();

                    $upload_success = $file->move($destinationPath, $new_name_file);
                    if ($request->tipo_archivo_id == 4) {
                        if (Auth::user()->id == 2 || Auth::user()->id == 66 || Auth::user()->id == 70) {

                            $pdf       = new \setasign\Fpdi\Fpdi();
                            $pageCount = $pdf->setSourceFile($destinationPath . '/' . $new_name_file);
                            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                                $template = $pdf->importPage($pageNo);
                                $pdf->AddPage();

                                $pdf->useTemplate($template);
                                // $pdf->setSourceFile($destinationPath . '/' . $new_name_file); // Sin extensión

                                $pdf->Image('firma/firma.jpeg', 140, 180, 50, 20);
                            }
                            unlink('archivosSgc/' . $new_name_file);
                            $pdf->Output('archivosSgc/' . $new_name_file, "F");
                        }
                    }

                    if ($request->tipo_archivo_id == 1 && $solicitud->proceso_id == 6 && $solicitud->subestado_id == 21 || $request->tipo_archivo_id == 17 && $solicitud->proceso_id == 6 && $solicitud->subestado_id == 22) {

                        $solicitud->subestado_id = 7;
                        $solicitud->proceso_id   = 15;
                        $solicitud->save();

                        $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();

                        if ($verficicación != 0) {
                            $data_duplicada               = Solicitud_duplicada::find($request->solicitud_id);
                            $data_duplicada->subestado_id = 7;
                            $data_duplicada->proceso_id   = 15;
                            $data_duplicada->save();
                        }
                    }

                    if ($request->tipo_archivo_id == 2 && $solicitud->proceso_id == 6 && $solicitud->subestado_id == 3) {

                        if ($solicitud->area_creadora_id == 1) {

                            $solicitud->subestado_id = 12;

                            $solicitud->informefinal = 1;

                            $solicitud->save();
                        } else {

                            $solicitud->subestado_id = 2;
                            $solicitud->proceso_id   = 2;

                            $solicitud->informefinal = 1;

                            $solicitud->save();

                            $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
                            if ($verficicación != 0) {
                                $data_duplicada               = Solicitud_duplicada::find($request->solicitud_id);
                                $data_duplicada->subestado_id = 2;
                                $data_duplicada->proceso_id   = 2;

                                $data_duplicada->informefinal = 1;

                                $data_duplicada->save();
                            }
                        }
                    } else {
                        if ($request->tipo_archivo_id == 2) {
                            $solicitud->informefinal = 1;

                            $solicitud->save();
                            $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
                            if ($verficicación != 0) {
                                $data_duplicada               = Solicitud_duplicada::find($request->solicitud_id);
                                $data_duplicada->informefinal = 1;

                                $data_duplicada->save();
                            }
                        } else {
                            if ($request->tipo_archivo_id == 4) {
                                if ($solicitud->area_creadora_id == 1) {

                                    if ($solicitud->subestado_id == 3) {
                                        $solicitud->subestado_id = 12;
                                    }
                                    $solicitud->guiadespacho = 1;

                                    $solicitud->save();
                                } else {
                                    if ($solicitud->subestado_id == 19 && $solicitud->proceso_id == 6) {
                                        if ($solicitud->proveedor_id == 547) {
                                            $solicitud->proceso_id   = 13;
                                            $solicitud->subestado_id = 4;
                                        } else {
                                            $solicitud->proceso_id   = 2;
                                            $solicitud->subestado_id = 2;
                                        }

                                        $verficicación          = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
                                        if ($verficicación != 0) {
                                            $data_duplicada               = Solicitud_duplicada::find($request->solicitud_id);
                                            if ($data_duplicada->proveedor_id == 547) {
                                                $data_duplicada->proceso_id   = 13;
                                                $data_duplicada->subestado_id = 4;
                                            } else {
                                                $data_duplicada->proceso_id   = 2;
                                                $data_duplicada->subestado_id = 2;
                                            }



                                            $data_duplicada->save();
                                        }
                                    }
                                    $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
                                    if ($verficicación != 0) {
                                        $data_duplicada               = Solicitud_duplicada::find($request->solicitud_id);
                                        $data_duplicada->guiadespacho = 1;

                                        $data_duplicada->save();
                                    }
                                    $solicitud->guiadespacho = 1;

                                    $solicitud->save();
                                }
                            }
                        }
                    }
                }
            }

            return;
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editArea(Request $request)
    {
        $solicitud          = SolicitudSgc::find($request->solicitud_id);
        $solicitud->area_id = $request->area_id;
        $solicitud->save();

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = 'El área de trabajo fue modificada.';
        $bitacora->save();

        $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
        if ($verficicación != 0) {
            $data_duplicada          = Solicitud_duplicada::find($request->solicitud_id);
            $data_duplicada->area_id = $request->area_id;
            $data_duplicada->save();
        }
        // event(new updateListSgcEvent);
        return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editDescripcion(Request $request)
    {
        $solicitud              = SolicitudSgc::find($request->solicitud_id);
        $solicitud->descripcion = $request->descripcion;
        $solicitud->save();
        $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
        if ($verficicación != 0) {
            $data_duplicada              = Solicitud_duplicada::find($request->solicitud_id);
            $data_duplicada->descripcion = $request->descripcion;
            $data_duplicada->save();
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = 'La descripcion de la solicitud fue modificada.';
        $bitacora->save();
        // event(new updateListSgcEvent);
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSite(Request $request)
    {
        $solicitud          = SolicitudSgc::find($request->solicitud_id);
        $solicitud->site_id = $request->site_id;
        $solicitud->save();

        $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
        if ($verficicación != 0) {
            $data_duplicada          = Solicitud_duplicada::find($request->solicitud_id);
            $data_duplicada->site_id = $request->site_id;
            $data_duplicada->save();
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = 'El sitio fue modificado.';
        $bitacora->save();
        // event(new updateListSgcEvent);
        return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProveedor(Request $request)
    {
        $solicitud               = SolicitudSgc::find($request->solicitud_id);
        $solicitud->proveedor_id = $request->proveedor_id;
        $solicitud->save();

        $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
        if ($verficicación != 0) {
            $data_duplicada               = Solicitud_duplicada::find($request->solicitud_id);
            $data_duplicada->proveedor_id = $request->proveedor_id;
            $data_duplicada->save();
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = 'El proveedor fue modificado.';
        $bitacora->save();
        // event(new updateListSgcEvent);
        return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTipoTrabajoOym(Request $request)
    {
        $solicitud                  = SolicitudSgc::find($request->solicitud_id);
        $solicitud->tipo_trabajo_id = $request->tipo_trabajo_id;
        $solicitud->save();

        $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
        if ($verficicación != 0) {
            $data_duplicada                  = Solicitud_duplicada::find($request->solicitud_id);
            $data_duplicada->tipo_trabajo_id = $request->tipo_trabajo_id;
            $data_duplicada->save();
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = 'El tipo de trabajo fue modificado.';
        $bitacora->save();
        // event(new updateListSgcEvent);
        return;
    }

    public function EditTipoTrabajoIng(Request $request)
    {
        $solicitud                             = SolicitudSgc::find($request->solicitud_id);
        $solicitud->tipo_trabajo_ingenieria_id = $request->tipo_trabajo_id;
        $solicitud->save();

        $mensaje = 'El tipo de trabajo fue modificado.';
        $this->mensaje($mensaje, $request->solicitud_id);
        // event(new updateListSgcEvent);
        return;
    }

    public function codSapUpdate(Request $request)
    {
        $solicitud          = SolicitudSgc::find($request->solicitud_id);
        $solicitud->cod_sap = $request->cod_sap;
        $solicitud->save();
        $mensaje = 'El código SAP fue editado.';
        $this->mensaje($mensaje, $request->solicitud_id);
        // event(new updateListSgcEvent);
        return;
    }

    public function editarFormatoPago(Request $request)
    {
        $solicitud                = SolicitudSgc::find($request->solicitud_id);
        $solicitud->tipo_gasto_id = $request->tipo_gasto_id;
        $solicitud->save();
        $mensaje = 'El formato de pago fue editado.';
        $this->mensaje($mensaje, $request->solicitud_id);
        // event(new updateListSgcEvent);
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCostosSgc(Request $request)
    {

        $solicitud = SolicitudSgc::find($request->solicitud_id);

        if ($request->activo > 0) {

            $solicitud->costos_activos   = floatval($request->activo);
            $solicitud->costos_servicios = null;
            $solicitud->tipo_moneda_id   = $request->tipo_moneda_id;
            $money_format                = number_format($request->activo);
            $moneda     = Tipo_moneda::find($request->tipo_moneda_id);
            $tipo_monto = "$   $money_format $moneda->moneda, en activos";
            $solicitud->save();
        } else {
            if ($request->servicio > 0) {
                $solicitud->costos_servicios = floatval($request->servicio);
                $solicitud->costos_activos   = null;
                $solicitud->tipo_moneda_id   = $request->tipo_moneda_id;
                $moneda                      = Tipo_moneda::find($request->tipo_moneda_id);
                $money_format                = number_format($request->servicio);
                $tipo_monto                  = "$ $money_format $moneda->moneda, en servicios";
                $solicitud->save();
            } else {
                if ($solicitud->area_creadora_id == 1) {
                    $solicitud->activo_servicio = floatval($request->activo_servicio);
                    $solicitud->tipo_moneda_id  = $request->tipo_moneda_id;
                    $moneda                     = Tipo_moneda::find($request->tipo_moneda_id);
                    $money_format               = number_format($request->activo_servicio);
                    $tipo_monto                 = "$  $money_format $moneda->moneda, en totales";
                    $solicitud->save();
                }
            }
        }
        $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
        if ($verficicación != 0) {
            $data_duplicada = Solicitud_duplicada::find($request->solicitud_id);
            if ($request->activo > 0) {

                $data_duplicada->costos_activos   = floatval($request->activo);
                $data_duplicada->costos_servicios = null;
                $data_duplicada->tipo_moneda_id   = $request->tipo_moneda_id;

                $data_duplicada->save();
            } else {
                if ($request->servicio > 0) {
                    $data_duplicada->costos_servicios = floatval($request->servicio);
                    $data_duplicada->costos_activos   = null;
                    $data_duplicada->tipo_moneda_id   = $request->tipo_moneda_id;
                    $data_duplicada->save();
                }
            }
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = "El monto fue editado, el nuevo monto es $tipo_monto";
        $bitacora->save();
        // event(new updateListSgcEvent);
        return;
    }

    public function editTipoBoleta(Request $request)
    {

        $solicitud = SolicitudSgc::find($request->solicitud_id);

        if ($solicitud->proceso_id == 15 && $solicitud->subestado_id == 17) {
            if ($request->tipo_boleta_id == 3) {
                $solicitud->proceso_id   = 15;
                $solicitud->subestado_id = 7;
                $solicitud->save();
            }
        }
        $boleta_data_old = Tipo_boleta::find($solicitud->tipo_boleta_id);
        if ($boleta_data_old) {
            $boleta_old = 'TIPO' . ' ' . $boleta_data_old->descripcion . ',' . ' ' . 'Nro° ' . ' ' . $solicitud->boleta;
        } else {
            $boleta_old = 'Sin tipo de boleta';
        }

        $solicitud->tipo_boleta_id = $request->tipo_boleta_id;

        $solicitud->boleta = $request->nro_boleta;
        $solicitud->save();
        $boleta_data_new = Tipo_boleta::find($request->tipo_boleta_id);
        $boleta_new      = 'TIPO' . ' ' . $boleta_data_new->descripcion . ',' . ' ' . 'Nro°' . ' ' . $request->nro_boleta;

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = 'Boleta editada, el de nro boleta' . ' ' . $boleta_old . ' ' . 'se modifico al siguiente número' . ' ' . $boleta_new;
        $bitacora->save();

        $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
        if ($verficicación != 0) {
            $data_duplicada                 = Solicitud_duplicada::find($request->solicitud_id);
            $data_duplicada->tipo_boleta_id = $request->tipo_boleta_id;

            $data_duplicada->boleta = $request->nro_boleta;
            $data_duplicada->save();
        }

        // event(new updateListSgcEvent);

        return;
    }
    public function editCesta(Request $request)
    {

        $solicitud = SolicitudSgc::find($request->solicitud_id);

        if ($solicitud->cesta == null) {

            $solicitud->subestado_id        = 1;
            $solicitud->cesta               = $request->cesta;
            $solicitud->fecha_ingreso_cesta = Carbon::now();
            $mensaje                        = 'Nro° de cesta ingresado, nro' . ' ' . $request->cesta;
            $solicitud->save();

            $data_detalle = Detalle_ingreso_data::where('nuevassolicitud_id', $request->solicitud_id)->first();

            if ($data_detalle) {

                $data_detalle->user_cesta_id       = Auth::user()->id;
                $data_detalle->fecha_ingreso_cesta = Carbon::now();
                $data_detalle->save();
            } else {

                $data_detalle                      = new Detalle_ingreso_data;
                $data_detalle->user_cesta_id       = Auth::user()->id;
                $data_detalle->nuevassolicitud_id  = $request->solicitud_id;
                $data_detalle->fecha_ingreso_cesta = Carbon::now();
                $data_detalle->save();
            }
        } else {
            if ($solicitud->cesta != null) {

                $solicitud->cesta = $request->cesta;
                $mensaje          = 'Nro° de cesta editado, nuevo nro' . ' ' . $request->cesta;
                $solicitud->save();
            }
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = $mensaje;
        $bitacora->save();

        $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
        if ($verficicación != 0) {
            $data_duplicada = Solicitud_duplicada::find($request->solicitud_id);
            if ($data_duplicada->cesta == null) {
                $data_duplicada->subestado_id = 1;
                $data_duplicada->cesta        = $request->cesta;

                $data_duplicada->save();
            } else {
                if ($data_duplicada->cesta != null) {
                    $data_duplicada->cesta = $request->cesta;

                    $data_duplicada->save();
                }
            }
        }
        // event(new updateListSgcEvent);
        return;
    }
    public function editOc(Request $request)
    {
        $solicitud = SolicitudSgc::find($request->solicitud_id);
        if ($solicitud->oc == null) {
            if ($solicitud->area_creadora_id == 1) {
                $solicitud->subestado_id     = 12;
                $solicitud->oc               = $request->oc;
                $solicitud->fecha_ingreso_oc = Carbon::now();
                $mensaje                     = 'Nro° de oc ingresado, nro' . ' ' . $request->oc;
                $solicitud->save();
            } else {
                if ($solicitud->tipo_gasto_id == 3) {
                    $solicitud->subestado_id     = 3;
                    $solicitud->proceso_id       = 6;
                    $solicitud->oc               = $request->oc;
                    $solicitud->fecha_ingreso_oc = Carbon::now();
                    $solicitud->save();
                    $mensaje = 'Nro° de oc ingresado, nro' . ' ' . $request->oc;
                } else {
                    if ($solicitud->costos_activos != null && $solicitud->costos_activos != 0) {
                        if ($solicitud->guiadespacho == 1) {
                            $solicitud->subestado_id     = 2;
                            $solicitud->proceso_id       = 2;
                            $solicitud->oc               = $request->oc;
                            $solicitud->fecha_ingreso_oc = Carbon::now();
                            $solicitud->save();
                            $mensaje = 'Nro° de oc ingresado, nro' . ' ' . $request->oc;
                        } else {
                            if ($solicitud->guiadespacho == null) {
                                $solicitud->subestado_id     = 19;
                                $solicitud->proceso_id       = 6;
                                $solicitud->oc               = $request->oc;
                                $solicitud->fecha_ingreso_oc = Carbon::now();
                                $solicitud->save();
                                $mensaje = 'Nro° de oc ingresado, nro' . ' ' . $request->oc;
                            }
                        }
                    } else {
                        if ($solicitud->costos_servicios != null && $solicitud->costos_servicios != 0) {
                            if ($solicitud->informefinal == 1) {
                                $solicitud->subestado_id     = 2;
                                $solicitud->proceso_id       = 2;
                                $solicitud->oc               = $request->oc;
                                $solicitud->fecha_ingreso_oc = Carbon::now();
                                $solicitud->save();
                                $mensaje = 'Nro° de oc ingresado, nro' . ' ' . $request->oc;
                            } else {
                                if ($solicitud->informefinal == null) {
                                    $solicitud->subestado_id     = 3;
                                    $solicitud->proceso_id       = 6;
                                    $solicitud->oc               = $request->oc;
                                    $solicitud->fecha_ingreso_oc = Carbon::now();
                                    $solicitud->save();
                                    $mensaje = 'Nro° de oc ingresado, nro' . ' ' . $request->oc;
                                }
                            }
                        }
                    }
                }
            }

            $data_detalle = Detalle_ingreso_data::where('nuevassolicitud_id', $request->solicitud_id)->first();
            if ($data_detalle) {

                $data_detalle->user_oc_id         = Auth::user()->id;
                $data_detalle->fecha_ingreso_oc   = Carbon::now();
                $data_detalle->nuevassolicitud_id = $request->solicitud_id;
                $data_detalle->save();
            }
        } else {
            if ($solicitud->oc != null) {
                $solicitud->oc = $request->oc;
                $mensaje       = 'Nro° de oc editado, nuevo nro' . ' ' . $request->oc;
                $solicitud->save();
            }
        }

        $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
        if ($verficicación != 0) {
            $data_duplicada = Solicitud_duplicada::find($request->solicitud_id);
            if ($data_duplicada->tipo_gasto_id == 3) {
                $data_duplicada->subestado_id = 3;
                $data_duplicada->proceso_id   = 6;
                $data_duplicada->oc           = $request->oc;
                $data_duplicada->save();
            } else {
                if ($data_duplicada->costos_activos != null && $data_duplicada->costos_activos != 0) {
                    if ($data_duplicada->guiadespacho == 1) {
                        $data_duplicada->subestado_id = 2;
                        $data_duplicada->proceso_id   = 2;
                        $data_duplicada->oc           = $request->oc;

                        $data_duplicada->save();
                    } else {
                        if ($data_duplicada->guiadespacho == null) {
                            $data_duplicada->subestado_id = 19;
                            $data_duplicada->proceso_id   = 6;
                            $data_duplicada->oc           = $request->oc;

                            $data_duplicada->save();
                        }
                    }
                } else {
                    if ($solicitud->costos_servicios != null && $solicitud->costos_servicios != 0) {
                        if ($data_duplicada->guiadespacho == 1) {
                            $data_duplicada->subestado_id = 2;
                            $data_duplicada->proceso_id   = 2;
                            $data_duplicada->oc           = $request->oc;

                            $data_duplicada->save();
                        } else {
                            if ($data_duplicada->guiadespacho == null) {
                                $data_duplicada->subestado_id = 3;
                                $data_duplicada->proceso_id   = 6;
                                $data_duplicada->oc           = $request->oc;

                                $data_duplicada->save();
                            }
                        }
                    }
                }
            }
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = $mensaje;
        $bitacora->save();
        // event(new updateListSgcEvent);
        return;
    }
    public function editdasOym(Request $request)
    {
        $solicitud = SolicitudSgc::find($request->solicitud_id);
        if ($solicitud->DAS == null) {
            $solicitud->subestado_id      = 5;
            $solicitud->proceso_id        = 17;
            $solicitud->DAS               = $request->das;
            $solicitud->fecha_ingreso_das = Carbon::now();
            $mensaje                      = 'Nro° de DAS ingresado, nro' . ' ' . $request->das;
            $solicitud->save();
            $data_detalle = Detalle_ingreso_data::where('nuevassolicitud_id', $request->solicitud_id)->first();
            if ($data_detalle) {

                $data_detalle->user_das_id        = Auth::user()->id;
                $data_detalle->fecha_ingreso_das  = Carbon::now();
                $data_detalle->nuevassolicitud_id = $request->solicitud_id;
                $data_detalle->save();
            }
        } else {
            if ($solicitud->DAS != null) {
                $solicitud->DAS = $request->das;
                $mensaje        = 'Nro° de das editado, nuevo nro' . ' ' . $request->das;
                $solicitud->save();
            }
        }

        $verficicación = Solicitud_duplicada::where('id', $request->solicitud_id)->count();
        if ($verficicación != 0) {
            $data_duplicada = Solicitud_duplicada::find($request->solicitud_id);
            if ($data_duplicada->DAS == null) {
                $data_duplicada->subestado_id = 5;
                $data_duplicada->proceso_id   = 17;
                $data_duplicada->DAS          = $request->das;

                $data_duplicada->save();
            } else {
                if ($data_duplicada->DAS != null) {

                    $data_duplicada->save();
                }
            }
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = $mensaje;
        $bitacora->save();
        // event(new updateListSgcEvent);
        return;
    }

    public function FallaMovil($id)
    {
        $solicitud = SolicitudSgc::find($id);
        if ($solicitud->proceso_id == 15 && $solicitud->subestado_id == 7) {
            $solicitud->subestado_id = 17;
            $solicitud->save();

            $bitacora                     = new BitacoraSgc;
            $bitacora->user_id            = Auth::user()->id;
            $bitacora->nuevassolicitud_id = $id;
            $bitacora->mensaje            = 'En gestión de solicitud de PEP falla movil';
            $bitacora->save();
            // event(new updateListSgcEvent);
            return;
        } else {
            if ($solicitud->proceso_id == 15 && $solicitud->subestado_id == 17) {
                $solicitud->subestado_id = 7;
                $solicitud->save();
                $bitacora                     = new BitacoraSgc;
                $bitacora->user_id            = Auth::user()->id;
                $bitacora->nuevassolicitud_id = $id;
                $bitacora->mensaje            = 'Gestión de solicitud PEP falla movil terminada';
                $bitacora->save();
                // event(new updateListSgcEvent);
                return;
            }
        }
    }

    public function mensaje($mensaje, $solicitud_id)
    {
        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $solicitud_id;
        $bitacora->mensaje            = $mensaje;
        $bitacora->save();
    }

    public function addticketSgc(Request $request)
    {
        $ticket = Ticket::find($request->nro_ticket);
        if ($ticket) {
            $solicitud            = SolicitudSgc::find($request->solicitud_id);
            $solicitud->ticket_id = $request->nro_ticket;
            $solicitud->save();
            $mensaje = 'Se ingreso el número de ticket' . ' ' . $request->nro_ticket;
            $this->mensaje($mensaje, $request->solicitud_id);
            return 0;
        } else {
            return 1;
        }
    }

    public function editarFechaEjecucion(Request $request)
    {
        $solicitud                  = SolicitudSgc::find($request->solicitud_id);
        $solicitud->fecha_ejecucion = $request->fecha_ejecucion;
        $solicitud->save();
        $mensaje = 'La fecha de ejecución fue editada';
        $this->mensaje($mensaje, $request->solicitud_id);
        return;
    }

    public function editarNumeroTicket(Request $request)
    {
        $solicitud            = SolicitudSgc::find($request->solicitud_id);
        $solicitud->ticket_id = $request->ticket_id;
        $solicitud->save();
        if ($request->ticket_id != null) {
            $mensaje = 'El número de ticket fue editado.';
        } else {
            $mensaje = 'El número de ticket fue eliminado.';
        }

        $this->mensaje($mensaje, $request->solicitud_id);
        // event(new updateListSgcEvent);
        return;
    }

    public function editNameProject(Request $request)
    {
        $solicitud                      = SolicitudSgc::find($request->solicitud_id);
        $solicitud->nombre_proyecto_ing = $request->name_project;
        $solicitud->save();

        $mensaje = 'El nombre del proyecto fue editado';

        $this->mensaje($mensaje, $request->solicitud_id);
        return;
    }

    public function updateStateValidator(Request $request)
    {

        $solicitud                      = SolicitudSgc::find($request->solicitud_id);
        $solicitud->proceso_id = 6;
        if ($request->type == 1) {
            $solicitud->subestado_id = 22;
            $mensaje = 'Solicitud a la espera de validación de compras';
        } else {
            $solicitud->subestado_id = 21;
            $mensaje = 'Solicitud a la espera de cotizaciones';
        }

        $solicitud->save();



        $this->mensaje($mensaje, $request->solicitud_id);
        // event(new updateListSgcEvent);
        return;
    }

    public function reclasificarSolicitud(Request $request)
    {
        $solicitud = SolicitudSgc::find($request->solicitud_id);
        $solicitud->proceso_id = 6;
        $solicitud->subestado_id = 19;
        $solicitud->save();
        return;
    }
}

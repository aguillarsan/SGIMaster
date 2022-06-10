<?php

namespace App\Http\Controllers;

use App\ArchivoSgc;
use App\Interesado_solicitud;
use App\Site;
use App\SolicitudSgc;
use App\TempSgcPop;
use App\Tp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateRquestIngenieriaController extends Controller
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
    public function setFechasCuota(Request $request)
    {
        $solicitud = SolicitudSgc::find($request->solicitud_id);

        if ($request->nro_fecha == 1) {
            $solicitud->fecha_pago_1 = $request->fecha;
            $solicitud->save();
        } else {
            if ($request->nro_fecha == 2) {
                $solicitud->fecha_pago_2 = $request->fecha;
                $solicitud->save();
            } else {
                if ($request->nro_fecha == 3) {
                    $solicitud->fecha_pago_3 = $request->fecha;
                    $solicitud->save();
                } else {
                    if ($request->nro_fecha == 4) {
                        $solicitud->fecha_pago_4 = $request->fecha;
                        $solicitud->save();
                    } else {
                        if ($request->nro_fecha == 5) {
                            $solicitud->fecha_pago_5 = $request->fecha;
                            $solicitud->save();
                        } else {
                            if ($request->nro_fecha == 6) {
                                $solicitud->fecha_pago_6 = $request->fecha;
                                $solicitud->save();
                            }
                        }
                    }
                }
            }
        }
        $solicitud->nro_cuota = $request->total_cuotas;
        $solicitud->save();

    }

    public function setInteresadosRequest(Request $request)
    {
        $interesado                     = new Interesado_solicitud;
        $interesado->nuevassolicitud_id = $request->solicitud_id;
        $interesado->user_id            = $request->interesado_id;
        $interesado->save();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tpRequest(Request $request)
    {
        $tp                   = new Tp;
        $tp->solicitud_sgc_id = $request->solicitud_id;
        $tp->nro_tp           = $request->tp;
        $tp->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $solicitud                             = new SolicitudSgc;
            $solicitud->tipo_trabajo_ingenieria_id = $request->tipo_trabajoid;
            $solicitud->modo_trabajo_id            = $request->modo_trabajo_id;
            if ($request->modo_trabajo_id == 1) {
                $solicitud->Tipo_equipamiento_id = $request->equipo_id;
            } else {
                $solicitud->Tipo_servicio_id = $request->servicio_id;
            }
            $solicitud->proveedor_id     = $request->proveedor_id;
            $solicitud->tipo_moneda_id   = $request->Tipo_moneda_id;
            $solicitud->tipo_boleta_id   = $request->boleta_id;
            $solicitud->fecha_ejecucion  = $request->Fecha_trabajo;
            $solicitud->costos_activos   = null;
            $solicitud->costos_servicios = null;
            $solicitud->region_id        = $request->region_sin_sitio;
            $solicitud->fecha_creacion   = Carbon::now();
            $solicitud->activo_servicio  = $request->costo;
            $solicitud->creacion         = 1;

            $solicitud->cod_sap = $request->cod_sap;
            if ($request->site_id != null) {
                $sitio              = Site::find($request->site_id);
                $solicitud->id_crm  = $sitio->pop->comuna->zona->crm_id;
                $solicitud->site_id = $request->site_id;
            }

            $solicitud->proceso_id   = 11;
            $solicitud->subestado_id = 7;
            $solicitud->user_id      = Auth::user()->id;

            $solicitud->descripcion           = $request->detalle_trabajo;
            $solicitud->estado_id             = 1;
            $solicitud->formulario            = 0;
            $solicitud->area_creadora_id      = 1;
            $solicitud->motivo_trabajo_id     = $request->motivo_trabajo_id;
            $solicitud->nombre_proyecto_ing   = $request->nombre_proyecto;
            $solicitud->trabajo_ejecutado_ing = $request->trabajo_ejecutado;
            $solicitud->flujo_trabajo_id      = $request->flujoId;
            $solicitud->pm_proyecto_id        = $request->pm_proyecto_id;
            $solicitud->pm_interno_id         = $request->pm_interno_id;
            $solicitud->solicitante_id        = $request->solicitante_id;
            $solicitud->responsable_pago_id   = $request->responsable_id;
            $solicitud->area_id               = $request->AreaTrabajoId;
            $solicitud->boleta                = $request->nroBoleta;
            $solicitud->proyecto_gpon         = $request->pgpon;
            $solicitud->tipo_pago_id          = $request->tipo_pago_id;
            $solicitud->first_request         = 1;
            $solicitud->save();

            if ($request->nemonico_movil != null) {

                $tempPop                    = new TempSgcPop;
                $tempPop->nem_movil         = $request->nemonico_movil;
                $tempPop->nombre            = $request->nombre_sitio;
                $tempPop->direccion         = $request->direccion_sitio;
                $tempPop->comuna_id         = $request->comuna_ingreso_manual;
                $tempPop->classification_id = $request->categoria_id;
                $tempPop->save();
                $solicitud->temp_sgc_pop_id = $tempPop->id;
                $solicitud->save();

            }

            $destinationPath = 'archivosSgc';
            $files           = $request->file('cotizacion');

            if ($files != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($files as $file) {
                    $a++;

                    $filename                    = $file->getClientOriginalName();
                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_cotizacion           = $solicitud->id . '_' . 'COTIZACION' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_cotizacion;
                    $archivo->nuevassolicitud_id = $solicitud->id;
                    $archivo->extension          = $extension;

                    $archivo->tipo_archivo_id = 1;
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
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                                    ;
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

                    $upload_success = $file->move($destinationPath, $nombre_cotizacion);

                }
            }
            $files = $request->file('lpu_file');
            if ($files != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($files as $file) {
                    $a++;

                    $filename                    = $file->getClientOriginalName();
                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_lpu                  = $solicitud->id . '_' . 'LPU' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_lpu;
                    $archivo->nuevassolicitud_id = $solicitud->id;
                    $archivo->extension          = $extension;

                    $archivo->tipo_archivo_id = 6;
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
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                                    ;
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

                    $upload_success = $file->move($destinationPath, $nombre_lpu);

                }
            }
            $files = $request->file('mail_file');
            if ($files != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($files as $file) {
                    $a++;

                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();

                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $filename;
                    $archivo->nuevassolicitud_id = $solicitud->id;
                    $archivo->extension          = $extension;

                    $archivo->tipo_archivo_id = 7;
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
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                                    ;
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

                    $upload_success = $file->move($destinationPath, $filename);

                }
            }
            $files = $request->file('Carta_Adjudicación');
            if ($files != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($files as $file) {
                    $a++;

                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();

                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $filename;
                    $archivo->nuevassolicitud_id = $solicitud->id;
                    $archivo->extension          = $extension;

                    $archivo->tipo_archivo_id = 8;
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
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                                    ;
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

                    $upload_success = $file->move($destinationPath, $filename);

                }
            }
            return $solicitud->id;

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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

<?php

namespace App\Http\Controllers\Sgc;

use App\ArchivoSgc;
use App\BitacoraSgc;
use App\Http\Controllers\Controller;
use App\SolicitudSgc;
use App\Solicitud_duplicada;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DuplicateRequest extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function duplicateRequest(Request $request)
    {
        try {
            $requestOriginal = SolicitudSgc::find($request->id);

            if ($requestOriginal->area_creadora_id == 1) {
                $newRequest                             = new SolicitudSgc;
                $newRequest->tipo_trabajo_ingenieria_id = $requestOriginal->tipo_trabajo_ingenieria_id;
                $newRequest->modo_trabajo_id            = $requestOriginal->modo_trabajo_id;
                if ($requestOriginal->modo_trabajo_id == 1) {
                    $newRequest->Tipo_equipamiento_id = $requestOriginal->Tipo_equipamiento_id;
                } else {
                    $newRequest->Tipo_servicio_id = $requestOriginal->Tipo_servicio_id;
                }
                $newRequest->tipo_servicio_id = $requestOriginal->tipo_servicio_id;
                $newRequest->tipo_equipamiento_id = $requestOriginal->tipo_equipamiento_id;
                $newRequest->proveedor_id     = $requestOriginal->proveedor_id;
                $newRequest->tipo_moneda_id   = $requestOriginal->tipo_moneda_id; 
                $newRequest->tipo_boleta_id   = $requestOriginal->tipo_boleta_id;
                $newRequest->fecha_ejecucion  = $requestOriginal->fecha_ejecucion;
                $newRequest->costos_activos   = null;
                $newRequest->costos_servicios = null;
                $newRequest->region_id        = $requestOriginal->region_id;
                $newRequest->fecha_creacion   = Carbon::now();
                $newRequest->activo_servicio  = $requestOriginal->activo_servicio;
                $newRequest->creacion         = 1;

                $newRequest->cod_sap = $requestOriginal->cod_sap;
                if ($requestOriginal->site_id != null) {
                  
                    $newRequest->id_crm  = $requestOriginal->id_crm;
                    $newRequest->site_id = $requestOriginal->site_id;
                }

                $newRequest->proceso_id   = 11;
                $newRequest->subestado_id = 7;
                $newRequest->user_id      = $requestOriginal->user_id;

                $newRequest->descripcion           = $requestOriginal->descripcion;
                $newRequest->estado_id             = 1;
                $newRequest->formulario            = 0;
                $newRequest->area_creadora_id      = 1;
                $newRequest->motivo_trabajo_id     = $requestOriginal->motivo_trabajo_id;
                $newRequest->nombre_proyecto_ing   = $requestOriginal->nombre_proyecto_ing;
                $newRequest->trabajo_ejecutado_ing = $requestOriginal->trabajo_ejecutado_ing;
                $newRequest->flujo_trabajo_id      = $requestOriginal->flujo_trabajo_id;
                $newRequest->pm_proyecto_id        = $requestOriginal->pm_proyecto_id;
                $newRequest->pm_interno_id         = $requestOriginal->pm_interno_id;
                $newRequest->solicitante_id        = $requestOriginal->solicitante_id;
                $newRequest->responsable_pago_id   = $requestOriginal->responsable_pago_id;
                $newRequest->area_id               = $requestOriginal->area_id;
                $newRequest->boleta                = $requestOriginal->boleta;
                $newRequest->proyecto_gpon         = $requestOriginal->proyecto_gpon;
                $newRequest->tipo_pago_id          = $requestOriginal->tipo_pago_id;
                $newRequest->first_request         = 1;
                $newRequest->save();

                $bitacora                     = new BitacoraSgc;
                $bitacora->user_id            = Auth::user()->id;
                $bitacora->nuevassolicitud_id = $newRequest->id;
                $bitacora->mensaje            = "Solicitud duplicada";
                $bitacora->save();

                $archivos = ArchivoSgc::where('nuevassolicitud_id', $requestOriginal->id)->get();
                foreach ($archivos as $archivo) {
                    $newFile = new ArchivoSgc;

                    $newFile->nombre_archivo     = $archivo->nombre_archivo;
                    $newFile->nuevassolicitud_id = $newRequest->id;
                    $newFile->extension          = $archivo->extension;
                    $newFile->tipo_archivo_id    = $archivo->tipo_archivo_id;
                    $newFile->class              = $archivo->class;
                    $newFile->save();
                }

                $message = "Solicitud duplicada, número de SGC" . " " . $newRequest->id;

                return $message;

            } else {
                $verficicacion = Solicitud_duplicada::where('id', $requestOriginal->id)->count();

                if ($verficicacion == 1) {

                    $requestOriginalPrincipal = SolicitudSgc::where('solicitud_duplicada_id', $request->id)->get();

                    foreach ($requestOriginalPrincipal as $requestData) {

                        $idRequest = $requestData->id;

                    }

                    $requestOriginal = SolicitudSgc::find($idRequest);
                    ################################

                    $newRequest                   = new SolicitudSgc;
                    $newRequest->user_id          = $requestOriginal->user_id;
                    $newRequest->area_id          = $requestOriginal->area_id;
                    $newRequest->tipo_trabajo_id  = $requestOriginal->tipo_trabajo_id;
                    $newRequest->fecha_ejecucion  = $requestOriginal->fecha_ejecucion;
                    $newRequest->descripcion      = $requestOriginal->descripcion;
                    $newRequest->site_id          = $requestOriginal->site_id;
                    $newRequest->tipo_gasto_id    = $requestOriginal->tipo_gasto_id;
                    $newRequest->contingencia_id  = $requestOriginal->contingencia_id;
                    $newRequest->proveedor_id     = $requestOriginal->proveedor_id;
                    $newRequest->tipo_boleta_id   = $requestOriginal->tipo_boleta_id;
                    $newRequest->tipo_moneda_id   = $requestOriginal->tipo_moneda_id;
                    $newRequest->costos_activos   = $requestOriginal->costos_activos ? $requestOriginal->costos_activos : null;
                    $newRequest->costos_servicios = $requestOriginal->costos_servicios ? $requestOriginal->costos_servicios : null;
                    $newRequest->ework            = $requestOriginal->ework;
                    $newRequest->fecha_creacion   = Carbon::now();
                    $newRequest->estado_id        = 1;
                    $newRequest->boleta           = $requestOriginal->boleta;
                    $newRequest->subgrencia       = 1;
                    $newRequest->proceso_id       = 15;
                    $newRequest->subestado_id     = 7;
                    $newRequest->creacion         = 1;
                    $newRequest->id_crm           = $requestOriginal->id_crm;
                    $newRequest->ticket_id        = $requestOriginal->ticket_id;
                    $newRequest->estado_id        = 1;
                    $newRequest->first_request    = 1;
                    $newRequest->save();

                    $bitacora                     = new BitacoraSgc;
                    $bitacora->user_id            = Auth::user()->id;
                    $bitacora->nuevassolicitud_id = $newRequest->id;
                    $bitacora->mensaje            = "Solicitud duplicada";
                    $bitacora->save();

                    $archivos = ArchivoSgc::where('nuevassolicitud_id', $requestOriginal->id)->get();
                    foreach ($archivos as $archivo) {
                        $newFile = new ArchivoSgc;

                        $newFile->nombre_archivo     = $archivo->nombre_archivo;
                        $newFile->nuevassolicitud_id = $newRequest->id;
                        $newFile->extension          = $archivo->extension;
                        $newFile->tipo_archivo_id    = $archivo->tipo_archivo_id;
                        $newFile->class              = $archivo->class;
                        $newFile->save();
                    }

                    if ($requestOriginal->solicitud_duplicada_id != null) {
                        $dataRequestDuplicate = SolicitudSgc::find($requestOriginal->solicitud_duplicada_id);
                        ################################
                        $newRequestDuplicated                   = new SolicitudSgc;
                        $newRequestDuplicated->user_id          = $dataRequestDuplicate->user_id;
                        $newRequestDuplicated->area_id          = $dataRequestDuplicate->area_id;
                        $newRequestDuplicated->tipo_trabajo_id  = $dataRequestDuplicate->tipo_trabajo_id;
                        $newRequestDuplicated->fecha_ejecucion  = $dataRequestDuplicate->fecha_ejecucion;
                        $newRequestDuplicated->descripcion      = $dataRequestDuplicate->descripcion;
                        $newRequestDuplicated->site_id          = $dataRequestDuplicate->site_id;
                        $newRequestDuplicated->tipo_gasto_id    = $dataRequestDuplicate->tipo_gasto_id;
                        $newRequestDuplicated->contingencia_id  = $dataRequestDuplicate->contingencia_id;
                        $newRequestDuplicated->proveedor_id     = $dataRequestDuplicate->proveedor_id;
                        $newRequestDuplicated->tipo_boleta_id   = $dataRequestDuplicate->tipo_boleta_id;
                        $newRequestDuplicated->tipo_moneda_id   = $dataRequestDuplicate->tipo_moneda_id;
                        $newRequestDuplicated->costos_activos   = null;
                        $newRequestDuplicated->costos_servicios = $dataRequestDuplicate->costos_servicios;
                        $newRequestDuplicated->ework            = $dataRequestDuplicate->ework;
                        $newRequestDuplicated->fecha_creacion   = Carbon::now();
                        $newRequestDuplicated->estado_id        = 1;
                        $newRequestDuplicated->boleta           = $dataRequestDuplicate->boleta;
                        $newRequestDuplicated->subgrencia       = 1;
                        $newRequestDuplicated->proceso_id       = 15;
                        $newRequestDuplicated->subestado_id     = 7;
                        $newRequestDuplicated->creacion         = 1;
                        $newRequestDuplicated->id_crm           = $dataRequestDuplicate->id_crm;
                        $newRequestDuplicated->ticket_id        = $dataRequestDuplicate->ticket_id;
                        $newRequestDuplicated->estado_id        = 1;
                        $newRequestDuplicated->save();

                        $bitacora                     = new BitacoraSgc;
                        $bitacora->user_id            = Auth::user()->id;
                        $bitacora->nuevassolicitud_id = $newRequestDuplicated->id;
                        $bitacora->mensaje            = "Solicitud duplicada";
                        $bitacora->save();

                        $archivos = ArchivoSgc::where('nuevassolicitud_id', $requestOriginal->solicitud_duplicada_id)->get();
                        foreach ($archivos as $archivo) {
                            $newFile = new ArchivoSgc;

                            $newFile->nombre_archivo     = $archivo->nombre_archivo;
                            $newFile->nuevassolicitud_id = $newRequestDuplicated->id;
                            $newFile->extension          = $archivo->extension;
                            $newFile->tipo_archivo_id    = $archivo->tipo_archivo_id;
                            $newFile->class              = $archivo->class;
                            $newFile->save();
                        }
                        ################################
                        $solicitud_duplicada                  = new Solicitud_duplicada;
                        $solicitud_duplicada->id              = $newRequestDuplicated->id;
                        $solicitud_duplicada->user_id         = $newRequestDuplicated->user_id;
                        $solicitud_duplicada->area_id         = $newRequestDuplicated->area_id;
                        $solicitud_duplicada->tipo_trabajo_id = $newRequestDuplicated->tipo_trabajo_id;
                        $solicitud_duplicada->fecha_ejecucion = $newRequestDuplicated->fecha_ejecucion;
                        $solicitud_duplicada->descripcion     = $newRequestDuplicated->descripcion;
                        $solicitud_duplicada->site_id         = $newRequestDuplicated->site_id;
                        $solicitud_duplicada->tipo_gasto_id   = $newRequestDuplicated->tipo_gasto_id;
                        $solicitud_duplicada->contingencia_id = $newRequestDuplicated->contingencia_id;
                        $solicitud_duplicada->proveedor_id    = $newRequestDuplicated->proveedor_id;

                        $solicitud_duplicada->tipo_moneda_id   = $newRequestDuplicated->tipo_moneda_id;
                        $solicitud_duplicada->costos_activos   = null;
                        $solicitud_duplicada->costos_servicios = $newRequestDuplicated->costos_servicios;
                        $solicitud_duplicada->ework            = $newRequestDuplicated->ework;
                        $solicitud_duplicada->fecha_creacion   = Carbon::now();
                        $solicitud_duplicada->estado_id        = 1;
                        $solicitud_duplicada->boleta           = $newRequestDuplicated->boleta;
                        $solicitud_duplicada->subgrencia       = 1;
                        $solicitud_duplicada->proceso_id       = 15;
                        $solicitud_duplicada->subestado_id     = 7;
                        $solicitud_duplicada->creacion         = 1;
                        $solicitud_duplicada->id_crm           = $newRequestDuplicated->id_crm;
                        $solicitud_duplicada->tipo_boleta_id   = $newRequestDuplicated->tipo_boleta_id;
                        $solicitud_duplicada->save();

                        $newRequest->solicitud_duplicada_id = $newRequestDuplicated->id;
                        $newRequest->save();

                        $message = "Solicitudes duplicadas, números de SGC" . " " . $newRequest->id . " " . "y" . " " . $newRequestDuplicated->id;

                        return $message;

                    }

                    $message = "Solicitud duplicada, número de SGC" . " " . $newRequest->id;

                    return $message;

                } else {
                    ################################

                    $newRequest                   = new SolicitudSgc;
                    $newRequest->user_id          = $requestOriginal->user_id;
                    $newRequest->area_id          = $requestOriginal->area_id;
                    $newRequest->tipo_trabajo_id  = $requestOriginal->tipo_trabajo_id;
                    $newRequest->fecha_ejecucion  = $requestOriginal->fecha_ejecucion;
                    $newRequest->descripcion      = $requestOriginal->descripcion;
                    $newRequest->site_id          = $requestOriginal->site_id;
                    $newRequest->tipo_gasto_id    = $requestOriginal->tipo_gasto_id;
                    $newRequest->contingencia_id  = $requestOriginal->contingencia_id;
                    $newRequest->proveedor_id     = $requestOriginal->proveedor_id;
                    $newRequest->tipo_boleta_id   = $requestOriginal->tipo_boleta_id;
                    $newRequest->tipo_moneda_id   = $requestOriginal->tipo_moneda_id;
                    $newRequest->costos_activos   = $requestOriginal->costos_activos ? $requestOriginal->costos_activos : null;
                    $newRequest->costos_servicios = $requestOriginal->costos_servicios ? $requestOriginal->costos_servicios : null;
                    $newRequest->ework            = $requestOriginal->ework;
                    $newRequest->fecha_creacion   = Carbon::now();
                    $newRequest->estado_id        = 1;
                    $newRequest->boleta           = $requestOriginal->boleta;
                    $newRequest->subgrencia       = 1;
                    $newRequest->proceso_id       = 15;
                    $newRequest->subestado_id     = 7;
                    $newRequest->creacion         = 1;
                    $newRequest->id_crm           = $requestOriginal->id_crm;
                    $newRequest->ticket_id        = $requestOriginal->ticket_id;
                    $newRequest->estado_id        = 1;
                    $newRequest->first_request    = 1;
                    $newRequest->save();

                    $bitacora                     = new BitacoraSgc;
                    $bitacora->user_id            = Auth::user()->id;
                    $bitacora->nuevassolicitud_id = $newRequest->id;
                    $bitacora->mensaje            = "Solicitud duplicada";
                    $bitacora->save();

                    $archivos = ArchivoSgc::where('nuevassolicitud_id', $requestOriginal->id)->get();
                    foreach ($archivos as $archivo) {
                        $newFile = new ArchivoSgc;

                        $newFile->nombre_archivo     = $archivo->nombre_archivo;
                        $newFile->nuevassolicitud_id = $newRequest->id;
                        $newFile->extension          = $archivo->extension;
                        $newFile->tipo_archivo_id    = $archivo->tipo_archivo_id;
                        $newFile->class              = $archivo->class;
                        $newFile->save();
                    }

                    if ($requestOriginal->solicitud_duplicada_id != null) {
                        $dataRequestDuplicate = SolicitudSgc::find($requestOriginal->solicitud_duplicada_id);
                        ################################
                        $newRequestDuplicated                   = new SolicitudSgc;
                        $newRequestDuplicated->user_id          = $dataRequestDuplicate->user_id;
                        $newRequestDuplicated->area_id          = $dataRequestDuplicate->area_id;
                        $newRequestDuplicated->tipo_trabajo_id  = $dataRequestDuplicate->tipo_trabajo_id;
                        $newRequestDuplicated->fecha_ejecucion  = $dataRequestDuplicate->fecha_ejecucion;
                        $newRequestDuplicated->descripcion      = $dataRequestDuplicate->descripcion;
                        $newRequestDuplicated->site_id          = $dataRequestDuplicate->site_id;
                        $newRequestDuplicated->tipo_gasto_id    = $dataRequestDuplicate->tipo_gasto_id;
                        $newRequestDuplicated->contingencia_id  = $dataRequestDuplicate->contingencia_id;
                        $newRequestDuplicated->proveedor_id     = $dataRequestDuplicate->proveedor_id;
                        $newRequestDuplicated->tipo_boleta_id   = $dataRequestDuplicate->tipo_boleta_id;
                        $newRequestDuplicated->tipo_moneda_id   = $dataRequestDuplicate->tipo_moneda_id;
                        $newRequestDuplicated->costos_activos   = null;
                        $newRequestDuplicated->costos_servicios = $dataRequestDuplicate->costos_servicios;
                        $newRequestDuplicated->ework            = $dataRequestDuplicate->ework;
                        $newRequestDuplicated->fecha_creacion   = Carbon::now();
                        $newRequestDuplicated->estado_id        = 1;
                        $newRequestDuplicated->boleta           = $dataRequestDuplicate->boleta;
                        $newRequestDuplicated->subgrencia       = 1;
                        $newRequestDuplicated->proceso_id       = 15;
                        $newRequestDuplicated->subestado_id     = 7;
                        $newRequestDuplicated->creacion         = 1;
                        $newRequestDuplicated->id_crm           = $dataRequestDuplicate->id_crm;
                        $newRequestDuplicated->ticket_id        = $dataRequestDuplicate->ticket_id;
                        $newRequestDuplicated->estado_id        = 1;
                        $newRequestDuplicated->save();

                        $bitacora                     = new BitacoraSgc;
                        $bitacora->user_id            = Auth::user()->id;
                        $bitacora->nuevassolicitud_id = $newRequestDuplicated->id;
                        $bitacora->mensaje            = "Solicitud duplicada";
                        $bitacora->save();

                        $archivos = ArchivoSgc::where('nuevassolicitud_id', $requestOriginal->solicitud_duplicada_id)->get();
                        foreach ($archivos as $archivo) {
                            $newFile = new ArchivoSgc;

                            $newFile->nombre_archivo     = $archivo->nombre_archivo;
                            $newFile->nuevassolicitud_id = $newRequestDuplicated->id;
                            $newFile->extension          = $archivo->extension;
                            $newFile->tipo_archivo_id    = $archivo->tipo_archivo_id;
                            $newFile->class              = $archivo->class;
                            $newFile->save();
                        }
                        ################################
                        $solicitud_duplicada                  = new Solicitud_duplicada;
                        $solicitud_duplicada->id              = $newRequestDuplicated->id;
                        $solicitud_duplicada->user_id         = $newRequestDuplicated->user_id;
                        $solicitud_duplicada->area_id         = $newRequestDuplicated->area_id;
                        $solicitud_duplicada->tipo_trabajo_id = $newRequestDuplicated->tipo_trabajo_id;
                        $solicitud_duplicada->fecha_ejecucion = $newRequestDuplicated->fecha_ejecucion;
                        $solicitud_duplicada->descripcion     = $newRequestDuplicated->descripcion;
                        $solicitud_duplicada->site_id         = $newRequestDuplicated->site_id;
                        $solicitud_duplicada->tipo_gasto_id   = $newRequestDuplicated->tipo_gasto_id;
                        $solicitud_duplicada->contingencia_id = $newRequestDuplicated->contingencia_id;
                        $solicitud_duplicada->proveedor_id    = $newRequestDuplicated->proveedor_id;

                        $solicitud_duplicada->tipo_moneda_id   = $newRequestDuplicated->tipo_moneda_id;
                        $solicitud_duplicada->costos_activos   = null;
                        $solicitud_duplicada->costos_servicios = $newRequestDuplicated->costos_servicios;
                        $solicitud_duplicada->ework            = $newRequestDuplicated->ework;
                        $solicitud_duplicada->fecha_creacion   = Carbon::now();
                        $solicitud_duplicada->estado_id        = 1;
                        $solicitud_duplicada->boleta           = $newRequestDuplicated->boleta;
                        $solicitud_duplicada->subgrencia       = 1;
                        $solicitud_duplicada->proceso_id       = 15;
                        $solicitud_duplicada->subestado_id     = 7;
                        $solicitud_duplicada->creacion         = 1;
                        $solicitud_duplicada->id_crm           = $newRequestDuplicated->id_crm;
                        $solicitud_duplicada->tipo_boleta_id   = $newRequestDuplicated->tipo_boleta_id;
                        $solicitud_duplicada->save();

                        $newRequest->solicitud_duplicada_id = $newRequestDuplicated->id;
                        $newRequest->save();

                        $message = "Solicitudes duplicadas, números de SGC" . " " . $newRequest->id . " " . "y" . " " . $newRequestDuplicated->id;

                        return $message;

                    }

                    $message = "Solicitud duplicada, número de SGC" . " " . $newRequest->id;

                    return $message;
                }
            }

        } catch (Exception $e) {
            return $e;
        }

    }

}

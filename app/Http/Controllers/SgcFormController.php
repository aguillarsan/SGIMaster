<?php

namespace App\Http\Controllers;

use App\ArchivoSgc;
use App\Cargo_user;
use App\Site;
use App\SolicitudSgc;
use App\Solicitud_duplicada;
use App\TempSgcPop;
use App\Tipo_moneda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SgcFormController extends Controller
{
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
    public function store(Request $request)
    {
        $destinationPath         = 'archivosSgc';
        $fechaActual             = Carbon::now();
        $fechaActualFormato      = $fechaActual->format('Y-m-d');
        $tipo_moneda_actualizada = Tipo_moneda::where('updated', 'like', "%" . $fechaActualFormato . "%")->count();

        $moneda       = Tipo_moneda::find($request->tipo_moneda_id);
        $valor_moneda = $moneda->valor;

        if ($request->Activo != 0) {
            $conversionActivo = floatval($request->Activo) * $valor_moneda;

        }

        if ($request->Servicio != 0) {
            $conversionservicio = floatval($request->Servicio) * $valor_moneda;
        }

        $solicitud = new SolicitudSgc;
        $cargo     = Cargo_user::where('id_user', Auth::user()->id)->count();

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
        if ($request->Activo != 0 && $request->Servicio != 0) {

            if ($request->site_id != null) {

                //BUSQUEDA DEL POP Y LUEGO DEL CRM
                $site = Site::find($request->site_id);

                $crm = $site->pop->comuna->zona->crm->id;

                /////////////////////////////
            } else {

                $crm = null;
            }

            $solicitud                   = new SolicitudSgc;
            $solicitud->user_id          = Auth::user()->id;
            $solicitud->area_id          = $request->area_id;
            $solicitud->tipo_trabajo_id  = $request->tipo_trabajo_id;
            $solicitud->fecha_ejecucion  = $request->fecha_ejecucion;
            $solicitud->descripcion      = $request->detalle;
            $solicitud->site_id          = $request->site_id;
            $solicitud->tipo_gasto_id    = $request->tipo_gasto_id;
            $solicitud->contingencia_id  = $request->contingencia_id;
            $solicitud->proveedor_id     = $request->proveedor_id;
            $solicitud->region_id        = $request->region_sin_sitio;
            $solicitud->tipo_boleta_id   = $request->boleta_id;
            $solicitud->tipo_moneda_id   = $request->tipo_moneda_id;
            $solicitud->costos_activos   = floatval($request->Activo);
            $solicitud->costos_servicios = null;
            $solicitud->estado_id        = 1;
            $solicitud->boleta           = $request->nro_boleta;
            $solicitud->subgrencia       = 1;
            $solicitud->proceso_id       = $proceso;
            $solicitud->subestado_id     = $subestado;
            $solicitud->creacion         = 1;
            $solicitud->id_crm           = $crm;
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

            }

            /////////////CARGA ARCHIVOS////////////////
            $files = $request->file('cotizacion');

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

                    $upload_success = $file->move($destinationPath, $nombre_cotizacion);

                }
            }

            $fileslpu = $request->file('lpufile');

            if ($fileslpu != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($fileslpu as $file) {
                    $a++;

                    $filename                    = $file->getClientOriginalName();
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
                    $archivo->save();

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
                    $archivo->nuevassolicitud_id = $solicitud->id;
                    $archivo->extension          = $extension;

                    $archivo->tipo_archivo_id = 8;
                    $archivo->save();

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
            $fileOtros = $request->file('otro');

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
                    $archivo->nuevassolicitud_id = $solicitud->id;
                    $archivo->extension          = $extension;

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

            ///////////////////////////////////////////////////////////
            //////////////////////////////////////////////////////////
            //////////////////////////////////////////////////////////

            //////////SOLICITUD DUPLICADA TAB NUEVASSOLICITUDES

            $duplicado = new SolicitudSgc;

            $duplicado->area_id = $request->area_id;

            $duplicado->tipo_trabajo_id  = $request->tipo_trabajo_id;
            $duplicado->fecha_ejecucion  = $request->fecha_ejecucion;
            $duplicado->descripcion      = $request->detalle;
            $duplicado->site_id          = $request->site_id;
            $duplicado->tipo_gasto_id    = $request->tipo_gasto_id;
            $duplicado->contingencia_id  = $request->contingencia_id;
            $duplicado->proveedor_id     = $request->proveedor_id;
            $duplicado->region_id        = $request->region_sin_sitio;
            $duplicado->tipo_boleta_id   = $request->boleta_id;
            $duplicado->tipo_moneda_id   = $request->tipo_moneda_id;
            $duplicado->costos_activos   = null;
            $duplicado->costos_servicios = floatval($request->Servicio);
            $duplicado->estado_id        = 1;
            $duplicado->boleta           = $request->nro_boleta;
            $duplicado->subgrencia       = 1;
            $duplicado->proceso_id       = $proceso;
            $duplicado->subestado_id     = $subestado;
            $duplicado->creacion         = 1;
            $duplicado->id_crm           = $crm;
            $duplicado->user_id          = $solicitud->user_id;

            $duplicado->save();
            $solicitud->solicitud_duplicada_id = $duplicado->id;
            $solicitud->first_request          = 1;
            $solicitud->save();

            ////////// SOLICITUD DUPLICADA TAB SOLICITUD_DUPLCIADAS

            $solicitud_duplicada     = new Solicitud_duplicada;
            $solicitud_duplicada->id = $duplicado->id;

            $solicitud_duplicada->user_id          = Auth::user()->id;
            $solicitud_duplicada->area_id          = $request->area_id;
            $solicitud_duplicada->tipo_trabajo_id  = $request->tipo_trabajo_id;
            $solicitud_duplicada->fecha_ejecucion  = $request->fecha_ejecucion;
            $solicitud_duplicada->descripcion      = $request->detalle;
            $solicitud_duplicada->site_id          = $request->site_id;
            $solicitud_duplicada->tipo_gasto_id    = $request->tipo_gasto_id;
            $solicitud_duplicada->contingencia_id  = $request->contingencia_id;
            $solicitud_duplicada->proveedor_id     = $request->proveedor_id;
            $solicitud_duplicada->region_id        = $request->region_sin_sitio;
            $solicitud_duplicada->tipo_boleta_id   = $request->boleta_id;
            $solicitud_duplicada->tipo_moneda_id   = $request->tipo_moneda_id;
            $solicitud_duplicada->costos_activos   = null;
            $solicitud_duplicada->costos_servicios = floatval($request->Servicio);
            $solicitud_duplicada->estado_id        = 1;
            $solicitud_duplicada->boleta           = $request->nro_boleta;
            $solicitud_duplicada->subgrencia       = 1;
            $solicitud_duplicada->proceso_id       = $proceso;
            $solicitud_duplicada->subestado_id     = $subestado;
            $solicitud_duplicada->creacion         = 1;
            $solicitud_duplicada->id_crm           = $crm;

            $solicitud_duplicada->save();

            if ($request->nemonico_movil != null) {

                $tempPop                    = new TempSgcPop;
                $tempPop->nem_movil         = $request->nemonico_movil;
                $tempPop->nombre            = $request->nombre_sitio;
                $tempPop->direccion         = $request->direccion_sitio;
                $tempPop->comuna_id         = $request->comuna_ingreso_manual;
                $tempPop->classification_id = $request->categoria_id;
                $tempPop->save();
                $duplicado->temp_sgc_pop_id = $tempPop->id;
                $duplicado->save();

            }

            ////////////////////////////////// CARGA ARCHIVOS SOLICITUD DUPLICADA /////////////////////////////////

            $files = $request->file('cotizacion');

            if ($files != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($files as $file) {
                    $a++;

                    $filename                    = $file->getClientOriginalName();
                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_nuevo_duplicado      = $duplicado->id . '_' . 'COTIZACION' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo_duplicado;
                    $archivo->nuevassolicitud_id = $duplicado->id;

                    $archivo->tipo_archivo_id = 1;
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
                                    ;
                                    $archivo->class = 'fas fa-file-image';
                                }
                            }
                        }
                    }
                    $archivo->save();

                }

                $archivosSolicitudOne = ArchivoSgc::where('nuevassolicitud_id', $solicitud->id)->where('tipo_archivo_id', 1)->get();
                $b                    = 0;
                foreach ($archivosSolicitudOne as $a) {
                    $b++;
                    $nombre_archivo_duplicado = $duplicado->id . '_' . 'COTIZACION' . '(' . $b . ')' . '.' . $a->extension;
                    copy($destinationPath . '/' . $a->nombre_archivo, $destinationPath . '/' . $nombre_archivo_duplicado);

                }

            }

            $fileslpu = $request->file('lpufile');

            if ($fileslpu != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($fileslpu as $file) {
                    $a++;

                    $filename                    = $file->getClientOriginalName();
                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_nuevo_duplicado      = $duplicado->id . '_' . 'LPU' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo_duplicado;
                    $archivo->nuevassolicitud_id = $duplicado->id;

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

                }
                $archivosSolicitudOne = ArchivoSgc::where('nuevassolicitud_id', $solicitud->id)->where('tipo_archivo_id', 6)->get();
                $c                    = 0;
                foreach ($archivosSolicitudOne as $a) {
                    $c++;
                    $nombre_archivo_duplicado = $duplicado->id . '_' . 'LPU' . '(' . $c . ')' . '.' . $a->extension;
                    copy($destinationPath . '/' . $a->nombre_archivo, $destinationPath . '/' . $nombre_archivo_duplicado);

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
                    $nombre_nuevo_duplicado      = $duplicado->id . '_' . 'PXQ' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo_duplicado;
                    $archivo->nuevassolicitud_id = $duplicado->id;

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

                }
                $archivo->save();
                $archivosSolicitudOne = ArchivoSgc::where('nuevassolicitud_id', $solicitud->id)->where('tipo_archivo_id', 11)->get();
                $b                    = 0;
                foreach ($archivosSolicitudOne as $a) {
                    $b++;
                    $nombre_archivo_duplicado = $duplicado->id . '_' . 'PXQ' . '(' . $b . ')' . '.' . $a->extension;
                    copy($destinationPath . '/' . $a->nombre_archivo, $destinationPath . '/' . $nombre_archivo_duplicado);

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
                    $nombre_nuevo_duplicado      = $duplicado->id . '_' . 'INFORME_FINAL' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo_duplicado;
                    $archivo->nuevassolicitud_id = $duplicado->id;

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

                }
                $archivosSolicitudOne = ArchivoSgc::where('nuevassolicitud_id', $solicitud->id)->where('tipo_archivo_id', 2)->get();
                $b                    = 0;
                foreach ($archivosSolicitudOne as $a) {
                    $b++;
                    $nombre_archivo_duplicado = $duplicado->id . '_' . 'INFORME_FINAL' . '(' . $b . ')' . '.' . $a->extension;
                    copy($destinationPath . '/' . $a->nombre_archivo, $destinationPath . '/' . $nombre_archivo_duplicado);

                }

                $duplicado->informefinal = 1;
                $duplicado->save();
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
                    $nombre_nuevo_duplicado      = $duplicado->id . '_' . 'GUIA_DESPACHO' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo_duplicado;
                    $archivo->nuevassolicitud_id = $duplicado->id;

                    $archivo->tipo_archivo_id = 4;
                    $archivo->save();

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

                }
                $archivosSolicitudOne = ArchivoSgc::where('nuevassolicitud_id', $solicitud->id)->where('tipo_archivo_id', 4)->get();
                $b                    = 0;
                foreach ($archivosSolicitudOne as $a) {
                    $b++;
                    $nombre_archivo_duplicado = $duplicado->id . '_' . 'GUIA_DESPACHO' . '(' . $b . ')' . '.' . $a->extension;
                    copy($destinationPath . '/' . $a->nombre_archivo, $destinationPath . '/' . $nombre_archivo_duplicado);

                }

                $duplicado->guiadespacho = 1;
                $duplicado->save();
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
                    $nombre_nuevo_duplicado      = $duplicado->id . '_' . 'CARTA_ADJUDICACIÓN' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo_duplicado;
                    $archivo->nuevassolicitud_id = $duplicado->id;

                    $archivo->tipo_archivo_id = 8;
                    $archivo->save();

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

                }
                $archivo->save();
                $archivosSolicitudOne = ArchivoSgc::where('nuevassolicitud_id', $solicitud->id)->where('tipo_archivo_id', 8)->get();
                $b                    = 0;
                foreach ($archivosSolicitudOne as $a) {
                    $b++;
                    $nombre_archivo_duplicado = $duplicado->id . '_' . 'CARTA_ADJUDICACIÓN' . '(' . $b . ')' . '.' . $a->extension;
                    copy($destinationPath . '/' . $a->nombre_archivo, $destinationPath . '/' . $nombre_archivo_duplicado);

                }

            }

            ///////////////OTROS
            $fileOtros = $request->file('otro');

            if ($fileOtros != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($fileOtros as $file) {
                    $a++;

                    $filename                    = $file->getClientOriginalName();
                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_nuevo_duplicado      = $duplicado->id . '_' . 'OTRO' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo_duplicado;
                    $archivo->nuevassolicitud_id = $duplicado->id;

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

                }
                $archivo->save();

                $archivosSolicitudOne = ArchivoSgc::where('nuevassolicitud_id', $solicitud->id)->where('tipo_archivo_id', 5)->get();
                $b                    = 0;
                foreach ($archivosSolicitudOne as $a) {
                    $b++;
                    $nombre_archivo_duplicado = $duplicado->id . '_' . 'OTRO' . '(' . $b . ')' . '.' . $a->extension;
                    copy($destinationPath . '/' . $a->nombre_archivo, $destinationPath . '/' . $nombre_archivo_duplicado);

                }

            }

            ///////////////////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////////////////////////

            $mensaje = 'Solicitud nro ' . ' ' . $solicitud->id . ' ' . 'y' . ' ' . 'solicitud nro' . ' ' . $duplicado->id . ' ' . 'creada';
            return $mensaje;

        } else {
            if ($request->site_id != null) {

                //BUSQUEDA DEL POP Y LUEGO DEL CRM
                $site = Site::find($request->site_id);

                $crm = $site->pop->comuna->zona->crm->id;

                /////////////////////////////
            } else {

                $crm = null;
            }

            $solicitud                  = new SolicitudSgc;
            $solicitud->user_id         = Auth::user()->id;
            $solicitud->area_id         = $request->area_id;
            $solicitud->tipo_trabajo_id = $request->tipo_trabajo_id;
            $solicitud->fecha_ejecucion = $request->fecha_ejecucion;
            $solicitud->descripcion     = $request->detalle;
            $solicitud->site_id         = $request->site_id;
            $solicitud->tipo_gasto_id   = $request->tipo_gasto_id;
            $solicitud->contingencia_id = $request->contingencia_id;
            $solicitud->proveedor_id    = $request->proveedor_id;
            $solicitud->region_id       = $request->region_sin_sitio;
            $solicitud->tipo_boleta_id  = $request->boleta_id;
            $solicitud->tipo_moneda_id  = $request->tipo_moneda_id;
            $solicitud->first_request   = 1;
            if ($request->Activo != 0) {
                $solicitud->costos_activos   = floatval($request->Activo);
                $solicitud->costos_servicios = null;
            } else {
                if ($request->Servicio != 0) {
                    $solicitud->costos_activos   = null;
                    $solicitud->costos_servicios = floatval($request->Servicio);
                }
            }
            $solicitud->estado_id    = 1;
            $solicitud->boleta       = $request->nro_boleta;
            $solicitud->subgrencia   = 1;
            $solicitud->proceso_id   = $proceso;
            $solicitud->subestado_id = $subestado;
            $solicitud->creacion     = 1;
            $solicitud->id_crm       = $crm;
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

            $files = $request->file('cotizacion');

            if ($files != null) {
                $a = 0;
                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($files as $file) {
                    $a++;

                    $filename                    = $file->getClientOriginalName();
                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_nuevo                = $solicitud->id . '_' . 'COTIZACION' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo;
                    $archivo->nuevassolicitud_id = $solicitud->id;

                    $archivo->tipo_archivo_id = 1;
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
                                    ;
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

                    $filename                    = $file->getClientOriginalName();
                    $extension                   = $file->getClientOriginalExtension();
                    $nombre_nuevo                = $solicitud->id . '_' . 'LPU' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo;
                    $archivo->nuevassolicitud_id = $solicitud->id;

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
                    $nombre_nuevo                = $solicitud->id . '_' . 'LPU' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $nombre_nuevo;
                    $archivo->nuevassolicitud_id = $solicitud->id;

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

                    $archivo->tipo_archivo_id = 4;
                    $archivo->save();

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
                    $archivo->nuevassolicitud_id = $solicitud->id;

                    $archivo->tipo_archivo_id = 8;
                    $archivo->save();

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
            $fileOtros = $request->file('otro');

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

            $mensaje = 'Solicitud nro ' . ' ' . $solicitud->id . ' ' . 'creada';
            return $mensaje;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SolicitudDuplicada($solicitud)
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

<?php

namespace App\Http\Controllers;

use App\ArchivoSgc;
use App\BitacoraSgc;
use App\SolicitudSgc;
use App\Solicitud_das;
use App\Solicitud_monto;
use App\Tipo_moneda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LiberacionPagoController extends Controller
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
    public function totalMontos($id)
    {
        return Solicitud_monto::where('solicitud_sgc_id', $id)->where('estado', 1)->count(['id']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function montosSolicitados($id)
    {
        $request = Solicitud_monto::where('solicitud_sgc_id', $id)->get(['monto_total', 'monto_solicitado_porcentaje', 'monto_solicitado', 'monto_restante', 'estado', 'id', 'created_at']);
        return $request;

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
            $solicitud = SolicitudSgc::find($request->solicitud_id);
            $moneda    = Tipo_moneda::find($solicitud->tipo_moneda_id);
            if ($solicitud->tipo_moneda_id == 1) {
                $totales = $solicitud->activo_servicio;

            } else {

                $totales = $solicitud->activo_servicio * $moneda->valor;

            }

            $monto = floatval($request->monto_solicitado);

            if ($request->formato_id == 1) {
                $totalPorcentaje = $monto . '%';
                $totalPesos      = ($monto * $totales) / 100;
                $totalPorce      = $monto;

            } else {
                if ($request->formato_id == 2) {
                    $totalPesos = $monto;

                    $totalPorce      = ($monto * 100) / $totales;
                    $totalPorcentaje = $totalPorce . '%';
                }
            }
            $aprox_pesos = round($totalPesos);

            $total = ArchivoSgc::where('nuevassolicitud_id', $request->solicitud_id)->where('tipo_archivo_id', 2)->count();
            if ($total != 0) {
                $a = $total;
            } else {
                $a = 0;
            }

            $solicitud_monto = Solicitud_monto::where('solicitud_sgc_id', $request->solicitud_id)->count();
            if ($solicitud_monto != 0) {
                $solicitud_monto = Solicitud_monto::where('solicitud_sgc_id', $request->solicitud_id)->get();
                $ultimaSolicitud = $solicitud_monto->last();
                $suma            = $aprox_pesos + $ultimaSolicitud->monto_solicitado;
                $resto           = $ultimaSolicitud->monto_restante - $aprox_pesos;
                if ($ultimaSolicitud->monto_restante == 0) {
                    $mss = 'No puedes solicitar más liberaciones de pago.';
                    return $mss;
                } else {
                    if ($suma > $ultimaSolicitud->monto_total) {

                        $mss = 'El monto solicitado supera el limite.';
                        return $mss;

                    }
                }

            } else {
                if ($request->formato_id == 1 && $request->monto_solicitado == 100) {

                    $monto                              = new Solicitud_monto;
                    $monto->solicitud_sgc_id            = $request->solicitud_id;
                    $monto->monto_total                 = $totales;
                    $monto->monto_solicitado_porcentaje = $totalPorcentaje;
                    $monto->monto_solicitado            = $aprox_pesos;
                    $monto->monto_restante              = 0;
                    $monto->user_id                     = Auth::user()->id;
                    $monto->estado                      = 1;

                    $monto->save();

                    $solicitud = SolicitudSgc::find($request->solicitud_id);

                    $files           = $request->file('files');
                    $destinationPath = 'archivosSgc';

                    if ($files != null) {

                        //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                        foreach ($files as $file) {
                            $a++;

                            $filename      = $file->getClientOriginalName();
                            $extension     = $file->getClientOriginalExtension();
                            $new_name_file = $solicitud->id . '_' . 'Informe_Final' . '(' . $a . ')' . '.' . $extension;

                            $archivo                     = new ArchivoSgc;
                            $archivo->nombre_archivo     = $new_name_file;
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
                                            ;
                                            $archivo->class = 'fas fa-file-image';
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

                        }
                    }
                    $mss = 'Monto solicitado con éxito';
                    return $mss;
                } else {
                    if ($aprox_pesos > $totales) {
                        $mss = 'El monto solicitado supera al monto total.';
                        return $mss;
                    } else {
                        $resto = $totales - $aprox_pesos;
                    }
                }

            }

            $monto                              = new Solicitud_monto;
            $monto->solicitud_sgc_id            = $request->solicitud_id;
            $monto->monto_total                 = $totales;
            $monto->monto_solicitado_porcentaje = $totalPorcentaje;
            $monto->monto_solicitado            = $aprox_pesos;
            $monto->monto_restante              = $resto;
            $monto->user_id                     = Auth::user()->id;
            $monto->estado                      = 1;

            $monto->save();

            $solicitud = SolicitudSgc::find($request->solicitud_id);

            $files           = $request->file('files');
            $destinationPath = 'archivosSgc';

            if ($files != null) {

                //////CARGA Y REGISTRO EN BD SGC DE ARCHIVOS
                foreach ($files as $file) {
                    $a++;

                    $filename                    = $file->getClientOriginalName();
                    $extension                   = $file->getClientOriginalExtension();
                    $new_name_file               = $solicitud->id . '_' . 'Informe_Final' . '(' . $a . ')' . '.' . $extension;
                    $archivo                     = new ArchivoSgc;
                    $archivo->nombre_archivo     = $new_name_file;
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
                                    ;
                                    $archivo->class = 'fas fa-file-image';
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

                }
            }
            $mss = 'Monto solicitado con éxito';
            return $mss;

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
    public function aprobraMontoLiberacionPago(Request $request)
    {

        try {
            $solicitud = SolicitudSgc::find($request->solicitud_id);
            if ($solicitud->DAS == null) {
                $solicitud->DAS               = $request->das;
                $solicitud->fecha_ingreso_das = Carbon::now();
                $solicitud->save();

                $solicitud_das                   = new Solicitud_das;
                $solicitud_das->solicitud_sgc_id = $request->solicitud_id;
                $solicitud_das->das              = $request->das;
                $solicitud_das->save();
            } else {
                if ($solicitud->DAS != null) {
                    $solicitud_das                   = new Solicitud_das;
                    $solicitud_das->solicitud_sgc_id = $request->solicitud_id;
                    $solicitud_das->das              = $request->das;
                    $solicitud_das->save();
                }
            }

            $liberacion         = Solicitud_monto::find($request->monto_id);
            $liberacion->estado = 2;
            $liberacion->save();
            if ($liberacion->monto_restante == 0) {
                $solicitud->proceso_id   = 17;
                $solicitud->subestado_id = 5;
                $solicitud->save();
            }

            return;

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
    public function MutliplesDas($id)
    {
        $solicitud = SolicitudSgc::find($id);
        $data      = Solicitud_das::where('solicitud_sgc_id', $id)->where('das', '!=', $solicitud->DAS)->get(['das']);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EliminarMonto(Request $request)
    {
        try {
            $solicitud_monto = Solicitud_monto::find($request->monto_id);

            $bitacora                     = new BitacoraSgc;
            $bitacora->mensaje            = 'Solicitud de liberacion de pago eliminada';
            $bitacora->nuevassolicitud_id = $request->solicitud_id;
            $bitacora->user_id            = Auth::user()->id;
            $bitacora->save();

            $solicitud_monto->delete();
            $solicitud     = SolicitudSgc::find($request->solicitud_id);
            $solicitud_das = Solicitud_das::where('solicitud_sgc_id', $solicitud->id)->count();
            if ($solicitud_das != 0) {
                $solicitud_das = Solicitud_das::where('solicitud_sgc_id', $solicitud->id)->get();
                foreach ($solicitud_das as $s_d) {
                    $delete_das = Solicitud_das::find($s_d->id);
                    $delete_das->delete();
                }
            } else {
                $solicitud->DAS          = null;
                $solicitud->proceso_id   = 2;
                $solicitud->subestado_id = 12;
                $solicitud->save();
            }
            return;
        } catch (Exception $e) {
            return $e;
        }

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

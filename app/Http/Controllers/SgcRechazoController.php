<?php

namespace App\Http\Controllers;

use App\BitacoraSgc;
use App\SolicitudSgc;
use App\Solicitud_duplicada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SgcRechazoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rechazo(Request $request)
    {
        $solicitud = SolicitudSgc::find($request->solicitud_id);
        if ($solicitud->proceso_id == 7 && $solicitud->subestado_id == 8 || $solicitud->proceso_id == 7 && $solicitud->subestado_id == 7) {
            if ($solicitud->area_creadora_id == null) {
                if ($solicitud->solicitud_duplicada_id != null) {

                    $soliciutduno = SolicitudSgc::where('id', $solicitud->solicitud_duplicada_id)->get();

                    foreach ($soliciutduno as $sol) {
                        $idUno = $sol->id;
                    }
                    if ($solicitud->proceso_id != 14) {
                        $solicitud->proceso_id   = 8;
                        $solicitud->subestado_id = 8;
                        $solicitud->save();
                    }

                    $solicitudprimera = SolicitudSgc::find($idUno);
                    if ($solicitudprimera->proceso_id != 14) {
                        $solicitudprimera->proceso_id   = 8;
                        $solicitudprimera->subestado_id = 8;
                        $solicitudprimera->save();
                    }

                } else {
                    $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $request->solicitud_id)->count();
                    if ($verificacion != 0) {
                        $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $request->solicitud_id)->get();

                        foreach ($verificacion as $v) {
                            $idDupli = $v->id;
                        }
                        if ($solicitud->proceso_id != 14) {
                            $solicitud->proceso_id   = 8;
                            $solicitud->subestado_id = 8;
                            $solicitud->save();
                        }

                        $soliudDuplicada = SolicitudSgc::find($idDupli);
                        if ($soliudDuplicada->proceso_id != 14) {
                            $soliudDuplicada->proceso_id   = 8;
                            $soliudDuplicada->subestado_id = 8;
                            $soliudDuplicada->save();
                        }

                    } else {
                        if ($solicitud->proceso_id != 14) {
                            $solicitud->proceso_id   = 8;
                            $solicitud->subestado_id = 8;
                            $solicitud->save();
                        }

                    }

                }

                $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->solicitud_duplicada_id)->count();
                $verficicaciónTwo = Solicitud_duplicada::where('id', $solicitud->id)->count();
                if ($verficicaciónOne != 0) {
                    $data_duplicada = Solicitud_duplicada::find($solicitud->solicitud_duplicada_id);

                    if ($data_duplicada->proceso_id != 14) {
                        $data_duplicada->proceso_id   = 8;
                        $data_duplicada->subestado_id = 8;
                        $data_duplicada->save();
                    }
                } else {
                    if ($verficicaciónTwo != 0) {
                        $data_duplicada = Solicitud_duplicada::find($solicitud->id);
                        if ($data_duplicada->proceso_id != 14) {
                            $data_duplicada->proceso_id   = 8;
                            $data_duplicada->subestado_id = 8;
                            $data_duplicada->save();
                        }
                    }
                }

                $bitacora                     = new BitacoraSgc;
                $bitacora->mensaje            = 'Solicitud Rechazda, motivo:' . ' ' . $request->descripcion;
                $bitacora->nuevassolicitud_id = $request->solicitud_id;
                $bitacora->user_id            = Auth::user()->id;

                $bitacora->save();
                return;
            } else {
                if ($solicitud->area_creadora_id == 1) {
                    $solicitud->proceso_id   = 11;
                    $solicitud->subestado_id = 8;
                    $solicitud->save();
                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = 'Solicitud Rechazda, motivo:' . ' ' . $request->descripcion;
                    $bitacora->nuevassolicitud_id = $request->solicitud_id;
                    $bitacora->user_id            = Auth::user()->id;

                    $bitacora->save();

                }
            }

        } else {
            if ($solicitud->proceso_id == 15 && $solicitud->subestado_id == 8 || $solicitud->proceso_id == 15 && $solicitud->subestado_id == 7) {
                if ($solicitud->solicitud_duplicada_id != null) {

                    $soliciutduno = SolicitudSgc::where('id', $solicitud->solicitud_duplicada_id)->get();

                    foreach ($soliciutduno as $sol) {
                        $idUno = $sol->id;
                    }
                    if ($solicitud->proceso_id != 14) {
                        $solicitud->proceso_id   = 6;
                        $solicitud->subestado_id = 8;
                        $solicitud->save();
                    }

                    $solicitudprimera = SolicitudSgc::find($idUno);
                    if ($solicitudprimera->proceso_id != 14) {
                        $solicitudprimera->proceso_id   = 6;
                        $solicitudprimera->subestado_id = 8;
                        $solicitudprimera->save();
                    }

                } else {
                    $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $request->solicitud_id)->count();
                    if ($verificacion != 0) {
                        $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $request->solicitud_id)->get();

                        foreach ($verificacion as $v) {
                            $idDupli = $v->id;
                        }
                        if ($solicitud->proceso_id != 14) {
                            $solicitud->proceso_id   = 6;
                            $solicitud->subestado_id = 8;
                            $solicitud->save();
                        }

                        $soliudDuplicada = SolicitudSgc::find($idDupli);
                        if ($soliudDuplicada->proceso_id != 14) {
                            $soliudDuplicada->proceso_id   = 6;
                            $soliudDuplicada->subestado_id = 8;
                            $soliudDuplicada->save();
                        }

                    } else {
                        if ($solicitud->proceso_id != 14) {
                            $solicitud->proceso_id   = 6;
                            $solicitud->subestado_id = 8;
                            $solicitud->save();
                        }

                    }

                }
                $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->solicitud_duplicada_id)->count();
                $verficicaciónTwo = Solicitud_duplicada::where('id', $solicitud->id)->count();
                if ($verficicaciónOne != 0) {
                    $data_duplicada = Solicitud_duplicada::find($solicitud->solicitud_duplicada_id);

                    if ($data_duplicada->proceso_id != 14) {
                        $data_duplicada->proceso_id   = 6;
                        $data_duplicada->subestado_id = 8;
                        $data_duplicada->save();
                    }
                } else {
                    if ($verficicaciónTwo != 0) {
                        $data_duplicada = Solicitud_duplicada::find($solicitud->id);
                        if ($data_duplicada->proceso_id != 14) {
                            $data_duplicada->proceso_id   = 6;
                            $data_duplicada->subestado_id = 8;
                            $data_duplicada->save();
                        }
                    }
                }

                $bitacora                     = new BitacoraSgc;
                $bitacora->mensaje            = 'Solicitud Rechazda, motivo:' . ' ' . $request->descripcion;
                $bitacora->nuevassolicitud_id = $request->solicitud_id;
                $bitacora->user_id            = Auth::user()->id;

                $bitacora->save();
                return;
            } else {
                if ($solicitud->proceso_id == 16 && $solicitud->subestado_id == 8 || $solicitud->proceso_id == 16 && $solicitud->subestado_id == 7) {
                    if ($solicitud->solicitud_duplicada_id != null) {

                        $soliciutduno = SolicitudSgc::where('id', $solicitud->solicitud_duplicada_id)->get();

                        foreach ($soliciutduno as $sol) {
                            $idUno = $sol->id;
                        }
                        if ($solicitud->proceso_id != 14) {
                            $solicitud->proceso_id   = 15;
                            $solicitud->subestado_id = 8;
                            $solicitud->save();
                        }

                        $solicitudprimera = SolicitudSgc::find($idUno);
                        if ($solicitudprimera->proceso_id != 14) {
                            $solicitudprimera->proceso_id   = 15;
                            $solicitudprimera->subestado_id = 8;
                            $solicitudprimera->save();
                        }

                    } else {
                        $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $request->solicitud_id)->count();
                        if ($verificacion != 0) {
                            $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $request->solicitud_id)->get();

                            foreach ($verificacion as $v) {
                                $idDupli = $v->id;
                            }
                            if ($solicitud->proceso_id != 14) {
                                $solicitud->proceso_id   = 15;
                                $solicitud->subestado_id = 8;
                                $solicitud->save();
                            }

                            $soliudDuplicada = SolicitudSgc::find($idDupli);
                            if ($soliudDuplicada->proceso_id != 14) {
                                $soliudDuplicada->proceso_id   = 15;
                                $soliudDuplicada->subestado_id = 8;
                                $soliudDuplicada->save();
                            }

                        } else {
                            if ($solicitud->proceso_id != 14) {
                                $solicitud->proceso_id   = 15;
                                $solicitud->subestado_id = 8;
                                $solicitud->save();
                            }

                        }

                    }

                    $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->solicitud_duplicada_id)->count();
                    $verficicaciónTwo = Solicitud_duplicada::where('id', $solicitud->id)->count();
                    if ($verficicaciónOne != 0) {
                        $data_duplicada = Solicitud_duplicada::find($solicitud->solicitud_duplicada_id);

                        if ($data_duplicada->proceso_id != 14) {
                            $data_duplicada->proceso_id   = 15;
                            $data_duplicada->subestado_id = 8;
                            $data_duplicada->save();
                        }
                    } else {
                        if ($verficicaciónTwo != 0) {
                            $data_duplicada = Solicitud_duplicada::find($solicitud->id);
                            if ($data_duplicada->proceso_id != 14) {
                                $data_duplicada->proceso_id   = 15;
                                $data_duplicada->subestado_id = 8;
                                $data_duplicada->save();
                            }
                        }
                    }

                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = 'Solicitud Rechazda, motivo:' . ' ' . $request->descripcion;
                    $bitacora->nuevassolicitud_id = $request->solicitud_id;
                    $bitacora->user_id            = Auth::user()->id;

                    $bitacora->save();
                    return;

                } else {
                    if ($solicitud->proceso_id == 2 && $solicitud->subestado_id == 7) {
                        if ($solicitud->area_creadora_id == 1) {
                            if ($solicitud->proceso_id != 14) {
                                $solicitud->proceso_id   = 11;
                                $solicitud->subestado_id = 8;
                                $solicitud->save();

                                $bitacora                     = new BitacoraSgc;
                                $bitacora->mensaje            = 'Solicitud Rechazda, motivo:' . ' ' . $request->descripcion;
                                $bitacora->nuevassolicitud_id = $request->solicitud_id;
                                $bitacora->user_id            = Auth::user()->id;

                                $bitacora->save();
                                return;
                            }
                        } else {
                            if ($solicitud->area_creadora_id == null) {

                                if ($solicitud->proceso_id != 14) {
                                    $solicitud->proceso_id   = 16;
                                    $solicitud->subestado_id = 8;
                                    $solicitud->save();
                                }

                                $verficicaciónTwo = Solicitud_duplicada::where('id', $solicitud->id)->count();

                                if ($verficicaciónTwo != 0) {
                                    $data_duplicada = Solicitud_duplicada::find($solicitud->id);
                                    if ($data_duplicada->proceso_id != 14) {
                                        $data_duplicada->proceso_id   = 16;
                                        $data_duplicada->subestado_id = 8;
                                        $data_duplicada->save();
                                    }
                                }

                                $bitacora                     = new BitacoraSgc;
                                $bitacora->mensaje            = 'Solicitud Rechazda, motivo:' . ' ' . $request->descripcion;
                                $bitacora->nuevassolicitud_id = $request->solicitud_id;
                                $bitacora->user_id            = Auth::user()->id;

                                $bitacora->save();
                                return;
                            }
                        }
                    } else {
                        if ($solicitud->proceso_id == 11 && $solicitud->subestado_id == 8 || $solicitud->proceso_id == 11 && $solicitud->subestado_id == 7) {
                            if ($solicitud->proceso_id != 14) {
                                $solicitud->proceso_id   = 12;
                                $solicitud->subestado_id = 8;
                                $solicitud->save();

                                $bitacora                     = new BitacoraSgc;
                                $bitacora->mensaje            = 'Solicitud Rechazda, motivo:' . ' ' . $request->descripcion;
                                $bitacora->nuevassolicitud_id = $request->solicitud_id;
                                $bitacora->user_id            = Auth::user()->id;

                                $bitacora->save();
                                return;
                            }
                        } else {
                            if ($solicitud->proceso_id == 6 && $solicitud->subestado_id == 7 || $solicitud->proceso_id == 6 && $solicitud->subestado_id == 8) {
                                if ($solicitud->solicitud_duplicada_id != null) {

                                    $soliciutduno = SolicitudSgc::where('id', $solicitud->solicitud_duplicada_id)->get();

                                    foreach ($soliciutduno as $sol) {
                                        $idUno = $sol->id;
                                    }
                                    if ($solicitud->proceso_id != 14) {
                                        $solicitud->proceso_id   = 7;
                                        $solicitud->subestado_id = 8;
                                        $solicitud->save();
                                    }

                                    $solicitudprimera = SolicitudSgc::find($idUno);
                                    if ($solicitudprimera->proceso_id != 14) {
                                        $solicitudprimera->proceso_id   = 7;
                                        $solicitudprimera->subestado_id = 8;
                                        $solicitudprimera->save();
                                    }

                                } else {
                                    $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $request->solicitud_id)->count();
                                    if ($verificacion != 0) {
                                        $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $request->solicitud_id)->get();

                                        foreach ($verificacion as $v) {
                                            $idDupli = $v->id;
                                        }
                                        if ($solicitud->proceso_id != 14) {
                                            $solicitud->proceso_id   = 7;
                                            $solicitud->subestado_id = 8;
                                            $solicitud->save();
                                        }

                                        $soliudDuplicada = SolicitudSgc::find($idDupli);
                                        if ($soliudDuplicada->proceso_id != 14) {
                                            $soliudDuplicada->proceso_id   = 7;
                                            $soliudDuplicada->subestado_id = 8;
                                            $soliudDuplicada->save();
                                        }

                                    } else {
                                        if ($solicitud->proceso_id != 14) {
                                            $solicitud->proceso_id   = 7;
                                            $solicitud->subestado_id = 8;
                                            $solicitud->save();
                                        }

                                    }

                                }
                                $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->solicitud_duplicada_id)->count();
                                $verficicaciónTwo = Solicitud_duplicada::where('id', $solicitud->id)->count();
                                if ($verficicaciónOne != 0) {
                                    $data_duplicada = Solicitud_duplicada::find($solicitud->solicitud_duplicada_id);

                                    if ($data_duplicada->proceso_id != 14) {
                                        $data_duplicada->proceso_id   = 7;
                                        $data_duplicada->subestado_id = 8;
                                        $data_duplicada->save();
                                    }
                                } else {
                                    if ($verficicaciónTwo != 0) {
                                        $data_duplicada = Solicitud_duplicada::find($solicitud->id);
                                        if ($data_duplicada->proceso_id != 14) {
                                            $data_duplicada->proceso_id   = 7;
                                            $data_duplicada->subestado_id = 8;
                                            $data_duplicada->save();
                                        }
                                    }
                                }

                                $bitacora                     = new BitacoraSgc;
                                $bitacora->mensaje            = 'Solicitud Rechazda, motivo:' . ' ' . $request->descripcion;
                                $bitacora->nuevassolicitud_id = $request->solicitud_id;
                                $bitacora->user_id            = Auth::user()->id;

                                $bitacora->save();
                                return;

                            }
                        }
                    }

                }
            }
        }
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
        //
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

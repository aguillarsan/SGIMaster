<?php

namespace App\Http\Controllers;

use App\BitacoraSgc;
use App\Notificacion;
use App\Old_state;
use App\SolicitudSgc;
use App\Solicitud_duplicada;
use App\Events\updateListSgcEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SgcAprobacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Aprobar($id)
    {

        //APROBACIÓN VALIDADOR///
        $solicitud = SolicitudSgc::find($id);
        if ($solicitud->proceso_id == 15 && $solicitud->subestado_id == 7 || $solicitud->proceso_id == 15 && $solicitud->subestado_id == 8) {
            $this->AprobarReenviarValidador($id);
        } else {
            //APROBACIÓN JEFE DE ÁREA///
            if ($solicitud->proceso_id == 16 && $solicitud->subestado_id == 7 || $solicitud->proceso_id == 16 && $solicitud->subestado_id == 8) {
                $this->ArobarReenviarJefeArea($id);
            } else {
                //APROBACIÓN CONTROL///
                if (floatval($solicitud->proceso_id) === floatval(2) && floatval($solicitud->subestado_id) === floatval(7)) {
                    $this->AprobarControl($id);
                } else {
                    if ($solicitud->proceso_id == 6 && $solicitud->subestado_id == 7 || $solicitud->proceso_id == 6 && $solicitud->subestado_id == 8) {
                        $this->AprobarReenviarIngOym($id);
                    } else {
                        if (floatval($solicitud->proceso_id) === floatval(7) && floatval($solicitud->subestado_id) === floatval(7) || floatval($solicitud->proceso_id) === floatval(7) && floatval($solicitud->subestado_id) === floatval(8)) {
                            $solicitud = SolicitudSgc::find($id);
                            if ($solicitud->solicitud_duplicada_id != null) {

                                $soliciutduno = SolicitudSgc::where('id', $solicitud->solicitud_duplicada_id)->get();

                                foreach ($soliciutduno as $sol) {
                                    $idUno = $sol->id;
                                }
                                if ($solicitud->proceso_id != 14) {
                                    $solicitud->proceso_id   = 6;
                                    $solicitud->subestado_id = 7;
                                    $solicitud->save();
                                }

                                $solicitudprimera = SolicitudSgc::find($idUno);
                                if ($solicitudprimera->proceso_id != 14) {
                                    $solicitudprimera->proceso_id   = 6;
                                    $solicitudprimera->subestado_id = 7;
                                    $solicitudprimera->save();
                                }
                            } else {
                                $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $id)->count();
                                if ($verificacion != 0) {
                                    $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $id)->get();

                                    foreach ($verificacion as $v) {
                                        $idDupli = $v->id;
                                    }
                                    if ($solicitud->proceso_id != 14) {
                                        $solicitud->proceso_id   = 6;
                                        $solicitud->subestado_id = 7;
                                        $solicitud->save();
                                    }

                                    $soliudDuplicada = SolicitudSgc::find($idDupli);
                                    if ($soliudDuplicada->proceso_id != 14) {
                                        $soliudDuplicada->proceso_id   = 6;
                                        $soliudDuplicada->subestado_id = 7;
                                        $soliudDuplicada->save();
                                    }
                                } else {
                                    if ($solicitud->proceso_id != 14) {
                                        $solicitud->proceso_id   = 6;
                                        $solicitud->subestado_id = 7;
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
                                    $data_duplicada->subestado_id = 7;
                                    $data_duplicada->save();
                                }
                            } else {
                                if ($verficicaciónTwo != 0) {
                                    $data_duplicada = Solicitud_duplicada::find($solicitud->id);
                                    if ($data_duplicada->proceso_id != 14) {
                                        $data_duplicada->proceso_id   = 6;
                                        $data_duplicada->subestado_id = 7;
                                        $data_duplicada->save();
                                    }
                                }
                            }

                            $user                         = Auth::user()->id;
                            $nom                          = Auth::user()->name;
                            $resp                         = Auth::user()->avatar;
                            $bitacora                     = new BitacoraSgc;
                            $bitacora->mensaje            = 'Solicitud Aprobada';
                            $bitacora->nuevassolicitud_id = $id;
                            $bitacora->user_id            = $user;
                            $bitacora->usuario            = $nom;
                            $bitacora->responsable        = $resp;

                            $bitacora->save();
                            // event(new updateListSgcEvent);
                            return;
                        } else {
                            if (floatval($solicitud->proceso_id) === floatval(11) && floatval($solicitud->subestado_id) === floatval(7) || floatval($solicitud->proceso_id) === floatval(11) && floatval($solicitud->subestado_id) === floatval(8)) {

                                if ($solicitud->proceso_id != 14) {
                                    $solicitud->proceso_id   = 2;
                                    $solicitud->subestado_id = 7;
                                    $solicitud->aprobador_pmo_id = Auth::user()->id;
                                    $solicitud->save();
                                    $user                         = Auth::user()->id;
                                    $nom                          = Auth::user()->name;
                                    $resp                         = Auth::user()->avatar;
                                    $bitacora                     = new BitacoraSgc;
                                    $bitacora->mensaje            = 'Solicitud Aprobada';
                                    $bitacora->nuevassolicitud_id = $id;
                                    $bitacora->user_id            = $user;
                                    $bitacora->usuario            = $nom;
                                    $bitacora->responsable        = $resp;

                                    $bitacora->save();
                                    // event(new updateListSgcEvent);
                                    return;
                                }
                            } else {
                                if (floatval($solicitud->proceso_id) === floatval(8) && floatval($solicitud->subestado_id) === floatval(8)) {
                                    $solicitud = SolicitudSgc::find($id);
                                    if ($solicitud->solicitud_duplicada_id != null) {

                                        $soliciutduno = SolicitudSgc::where('id', $solicitud->solicitud_duplicada_id)->get();

                                        foreach ($soliciutduno as $sol) {
                                            $idUno = $sol->id;
                                        }
                                        if ($solicitud->proceso_id != 14) {
                                            $solicitud->proceso_id   = 7;
                                            $solicitud->subestado_id = 7;
                                            $solicitud->save();
                                        }

                                        $solicitudprimera = SolicitudSgc::find($idUno);
                                        if ($solicitudprimera->proceso_id != 14) {
                                            $solicitudprimera->proceso_id   = 7;
                                            $solicitudprimera->subestado_id = 7;
                                            $solicitudprimera->save();
                                        }
                                    } else {
                                        $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $id)->count();
                                        if ($verificacion != 0) {
                                            $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $id)->get();

                                            foreach ($verificacion as $v) {
                                                $idDupli = $v->id;
                                            }
                                            if ($solicitud->proceso_id != 14) {
                                                $solicitud->proceso_id   = 7;
                                                $solicitud->subestado_id = 7;
                                                $solicitud->save();
                                            }

                                            $soliudDuplicada = SolicitudSgc::find($idDupli);
                                            if ($soliudDuplicada->proceso_id != 14) {
                                                $soliudDuplicada->proceso_id   = 7;
                                                $soliudDuplicada->subestado_id = 7;
                                                $soliudDuplicada->save();
                                            }
                                        } else {
                                            if ($solicitud->proceso_id != 14) {
                                                $solicitud->proceso_id   = 7;
                                                $solicitud->subestado_id = 7;
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
                                            $data_duplicada->subestado_id = 7;
                                            $data_duplicada->save();
                                        }
                                    } else {
                                        if ($verficicaciónTwo != 0) {
                                            $data_duplicada = Solicitud_duplicada::find($solicitud->id);
                                            if ($data_duplicada->proceso_id != 14) {
                                                $data_duplicada->proceso_id   = 7;
                                                $data_duplicada->subestado_id = 7;
                                                $data_duplicada->save();
                                            }
                                        }
                                    }

                                    $user                         = Auth::user()->id;
                                    $nom                          = Auth::user()->name;
                                    $resp                         = Auth::user()->avatar;
                                    $bitacora                     = new BitacoraSgc;
                                    $bitacora->mensaje            = 'Solicitud Aprobada';
                                    $bitacora->nuevassolicitud_id = $id;
                                    $bitacora->user_id            = $user;
                                    $bitacora->usuario            = $nom;
                                    $bitacora->responsable        = $resp;

                                    $bitacora->save();
                                    // event(new updateListSgcEvent);
                                    return;
                                }
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
    public function AprobarReenviarValidador($id)
    {
        $solicitud = SolicitudSgc::find($id);
        if ($solicitud->subestado_id == 8) {
            $mensaje = 'Solicitud reenviada por validador';
        } else {
            if ($solicitud->subestado_id == 7) {
                $mensaje = 'Solicitud aprobada por validador';
            }
        }
        if ($solicitud->proveedor_id == 547) {
            $proceso = 2;
            $subestado = 23;
        } else {
            $proceso = 16;
            $subestado = 7;
        }
        if ($solicitud->solicitud_duplicada_id != null) {

            $soliciutduno = SolicitudSgc::where('id', $solicitud->solicitud_duplicada_id)->get();

            foreach ($soliciutduno as $sol) {
                $idUno = $sol->id;
            }
            if ($solicitud->proceso_id != 14) {
                $solicitud->proceso_id   =  $proceso;
                $solicitud->subestado_id =  $subestado;
                $solicitud->save();
                ////BITACORA////
                $bitacora                     = new BitacoraSgc;
                $bitacora->mensaje            = $mensaje;
                $bitacora->nuevassolicitud_id = $solicitud->id;
                $bitacora->user_id            = Auth::user()->id;

                $bitacora->save();
            }

            $solicitudprimera = SolicitudSgc::find($idUno);
            if ($solicitudprimera->proceso_id != 14) {
                $solicitud->proceso_id   =  $proceso;
                $solicitud->subestado_id =  $subestado;
                $solicitudprimera->save();
                ////BITACORA////
                $bitacora                     = new BitacoraSgc;
                $bitacora->mensaje            = $mensaje;
                $bitacora->nuevassolicitud_id = $solicitudprimera->id;
                $bitacora->user_id            = Auth::user()->id;

                $bitacora->save();
            }
        } else {
            $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $id)->count();
            if ($verificacion != 0) {
                $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $id)->get();

                foreach ($verificacion as $v) {
                    $idDupli = $v->id;
                }
                if ($solicitud->proceso_id != 14) {
                    $solicitud->proceso_id   =  $proceso;
                    $solicitud->subestado_id =  $subestado;
                    $solicitud->save();
                    ////BITACORA////
                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = $mensaje;
                    $bitacora->nuevassolicitud_id = $solicitud->id;
                    $bitacora->user_id            = Auth::user()->id;

                    $bitacora->save();
                }

                $soliudDuplicada = SolicitudSgc::find($idDupli);
                if ($soliudDuplicada->proceso_id != 14) {
                    $soliudDuplicada->proceso_id   = $proceso;
                    $soliudDuplicada->subestado_id = $subestado;
                    $soliudDuplicada->save();
                    ////BITACORA////
                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = $mensaje;
                    $bitacora->nuevassolicitud_id = $soliudDuplicada->id;
                    $bitacora->user_id            = Auth::user()->id;

                    $bitacora->save();
                }
            } else {
                if ($solicitud->proceso_id != 14) {
                    $solicitud->proceso_id   =  $proceso;
                    $solicitud->subestado_id =  $subestado;
                    $solicitud->save();
                    ////BITACORA////
                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = $mensaje;
                    $bitacora->nuevassolicitud_id = $solicitud->id;
                    $bitacora->user_id            = Auth::user()->id;

                    $bitacora->save();
                }
            }
        }

        $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->solicitud_duplicada_id)->count();
        $verficicaciónTwo = Solicitud_duplicada::where('id', $solicitud->id)->count();
        if ($verficicaciónOne != 0) {
            $data_duplicada = Solicitud_duplicada::find($solicitud->solicitud_duplicada_id);

            if ($data_duplicada->proceso_id != 14) {
                $data_duplicada->proceso_id   = $proceso;
                $data_duplicada->subestado_id = $subestado;
                $data_duplicada->save();
            }
        } else {
            if ($verficicaciónTwo != 0) {
                $data_duplicada = Solicitud_duplicada::find($solicitud->id);
                if ($data_duplicada->proceso_id != 14) {
                    $data_duplicada->proceso_id   = $proceso;
                    $data_duplicada->subestado_id = $subestado;
                    $data_duplicada->save();
                }
            }
        }

        // event(new updateListSgcEvent);

        return;
    }

    public function ArobarReenviarJefeArea($id)
    {
        $solicitud = SolicitudSgc::find($id);
        if ($solicitud->subestado_id == 8) {
            $mensaje = 'Solicitud reenviada por jefe de área';
        } else {
            if ($solicitud->subestado_id == 7) {
                $mensaje = 'Solicitud aprobada por jefe de área';
            }
        }
        if ($solicitud->solicitud_duplicada_id != null) {

            $soliciutduno = SolicitudSgc::where('id', $solicitud->solicitud_duplicada_id)->get();

            foreach ($soliciutduno as $sol) {
                $idUno = $sol->id;
            }
            if ($solicitud->proceso_id != 14) {
                $solicitud->proceso_id   = 2;
                $solicitud->subestado_id = 6;
                $solicitud->save();
                ////BITACORA////
                $bitacora                     = new BitacoraSgc;
                $bitacora->mensaje            = $mensaje;
                $bitacora->nuevassolicitud_id = $solicitud->id;
                $bitacora->user_id            = Auth::user()->id;

                $bitacora->save();
            }

            $solicitudprimera = SolicitudSgc::find($idUno);
            if ($solicitudprimera->proceso_id != 14) {
                $solicitudprimera->proceso_id   = 2;
                $solicitudprimera->subestado_id = 6;
                $solicitudprimera->save();
                ////BITACORA////
                $bitacora                     = new BitacoraSgc;
                $bitacora->mensaje            = $mensaje;
                $bitacora->nuevassolicitud_id = $solicitudprimera->id;
                $bitacora->user_id            = Auth::user()->id;

                $bitacora->save();
            }
        } else {
            $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $id)->count();
            if ($verificacion != 0) {
                $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $id)->get();

                foreach ($verificacion as $v) {
                    $idDupli = $v->id;
                }
                if ($solicitud->proceso_id != 14) {
                    $solicitud->proceso_id   = 2;
                    $solicitud->subestado_id = 6;
                    $solicitud->save();
                    ////BITACORA////
                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = $mensaje;
                    $bitacora->nuevassolicitud_id = $solicitud->id;
                    $bitacora->user_id            = Auth::user()->id;

                    $bitacora->save();
                }

                $soliudDuplicada = SolicitudSgc::find($idDupli);
                if ($soliudDuplicada->proceso_id != 14) {
                    $soliudDuplicada->proceso_id   = 2;
                    $soliudDuplicada->subestado_id = 6;
                    $soliudDuplicada->save();
                    ////BITACORA////
                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = $mensaje;
                    $bitacora->nuevassolicitud_id = $soliudDuplicada->id;
                    $bitacora->user_id            = Auth::user()->id;

                    $bitacora->save();
                }
            } else {
                if ($solicitud->proceso_id != 14) {
                    $solicitud->proceso_id   = 2;
                    $solicitud->subestado_id = 6;
                    $solicitud->save();
                    ////BITACORA////
                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = $mensaje;
                    $bitacora->nuevassolicitud_id = $solicitud->id;
                    $bitacora->user_id            = Auth::user()->id;

                    $bitacora->save();
                }
            }
        }

        $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->solicitud_duplicada_id)->count();
        $verficicaciónTwo = Solicitud_duplicada::where('id', $solicitud->id)->count();
        if ($verficicaciónOne != 0) {
            $data_duplicada = Solicitud_duplicada::find($solicitud->solicitud_duplicada_id);

            if ($data_duplicada->proceso_id != 14) {
                $data_duplicada->proceso_id   = 2;
                $data_duplicada->subestado_id = 6;
                $data_duplicada->save();
            }
        } else {
            if ($verficicaciónTwo != 0) {
                $data_duplicada = Solicitud_duplicada::find($solicitud->id);
                if ($data_duplicada->proceso_id != 14) {
                    $data_duplicada->proceso_id   = 2;
                    $data_duplicada->subestado_id = 6;
                    $data_duplicada->save();
                }
            }
        }

        // event(new updateListSgcEvent);

        return;
    }
    public function AprobarControl($id)
    {
        $solicitud = SolicitudSgc::find($id);
        if ($solicitud->solicitud_duplicada_id != null) {

            $soliciutduno = SolicitudSgc::where('id', $solicitud->solicitud_duplicada_id)->get();

            foreach ($soliciutduno as $sol) {
                $idUno = $sol->id;
            }
            if ($solicitud->proceso_id != 14) {
                $solicitud->proceso_id   = 2;
                $solicitud->subestado_id = 6;
                $solicitud->save();
                //BITACORA//////
                $bitacora                     = new BitacoraSgc;
                $bitacora->mensaje            = 'Solicitud aprobada por control';
                $bitacora->nuevassolicitud_id = $solicitud->id;
                $bitacora->user_id            = Auth::user()->id;

                $bitacora->save();
            }

            $solicitudprimera = SolicitudSgc::find($idUno);
            if ($solicitudprimera->proceso_id != 14) {
                $solicitudprimera->proceso_id   = 2;
                $solicitudprimera->subestado_id = 6;
                $solicitudprimera->save();
                //BITACORA//////
                $bitacora                     = new BitacoraSgc;
                $bitacora->mensaje            = 'Solicitud aprobada por control';
                $bitacora->nuevassolicitud_id = $solicitudprimera->id;
                $bitacora->user_id            = Auth::user()->id;

                $bitacora->save();
            }
        } else {
            $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $id)->count();
            if ($verificacion != 0) {
                $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $id)->get();

                foreach ($verificacion as $v) {
                    $idDupli = $v->id;
                }
                if ($solicitud->proceso_id != 14) {
                    $solicitud->proceso_id   = 2;
                    $solicitud->subestado_id = 6;
                    $solicitud->save();
                    //BITACORA//////
                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = 'Solicitud aprobada por control';
                    $bitacora->nuevassolicitud_id = $solicitud->id;
                    $bitacora->user_id            = Auth::user()->id;

                    $bitacora->save();
                }

                $soliudDuplicada = SolicitudSgc::find($idDupli);
                if ($soliudDuplicada->proceso_id != 14) {
                    $soliudDuplicada->proceso_id   = 2;
                    $soliudDuplicada->subestado_id = 6;
                    $soliudDuplicada->save();
                    //BITACORA//////
                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = 'Solicitud aprobada por control';
                    $bitacora->nuevassolicitud_id = $soliudDuplicada->id;
                    $bitacora->user_id            = Auth::user()->id;

                    $bitacora->save();
                }
            } else {
                if ($solicitud->proceso_id != 14) {
                    $solicitud->proceso_id   = 2;
                    $solicitud->subestado_id = 6;
                    $solicitud->save();
                    //BITACORA//////
                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = 'Solicitud aprobada por control';
                    $bitacora->nuevassolicitud_id = $solicitud->id;
                    $bitacora->user_id            = Auth::user()->id;

                    $bitacora->save();
                }
            }
        }

        $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->solicitud_duplicada_id)->count();
        $verficicaciónTwo = Solicitud_duplicada::where('id', $solicitud->id)->count();
        if ($verficicaciónOne != 0) {
            $data_duplicada = Solicitud_duplicada::find($solicitud->solicitud_duplicada_id);

            if ($data_duplicada->proceso_id != 14) {
                $data_duplicada->proceso_id   = 2;
                $data_duplicada->subestado_id = 6;
                $data_duplicada->save();
            }
        } else {
            if ($verficicaciónTwo != 0) {
                $data_duplicada = Solicitud_duplicada::find($solicitud->id);
                if ($data_duplicada->proceso_id != 14) {
                    $data_duplicada->proceso_id   = 2;
                    $data_duplicada->subestado_id = 6;
                    $data_duplicada->save();
                }
            }
        }

        // event(new updateListSgcEvent);

        return;
    }
    public function AprobarReenviarIngOym($id)
    {
        $solicitud = SolicitudSgc::find($id);
        if ($solicitud->subestado_id == 8) {
            $mensaje = 'Solicitud reenviada por ingeniero O&M';
        } else {
            if ($solicitud->subestado_id == 7) {
                $mensaje = 'Solicitud aprobada por ingeniero O&M';
            }
        }
        if ($solicitud->solicitud_duplicada_id != null) {

            $soliciutduno = SolicitudSgc::where('id', $solicitud->solicitud_duplicada_id)->get();

            foreach ($soliciutduno as $sol) {
                $idUno = $sol->id;
            }
            if ($solicitud->proceso_id != 14) {
                $solicitud->proceso_id   = 15;
                $solicitud->subestado_id = 7;
                $solicitud->save();
                //BITACORA//////
                $bitacora                     = new BitacoraSgc;
                $bitacora->mensaje            = $mensaje;
                $bitacora->nuevassolicitud_id = $solicitud->id;
                $bitacora->user_id            = Auth::user()->id;

                $bitacora->save();
            }

            $solicitudprimera = SolicitudSgc::find($idUno);
            if ($solicitudprimera->proceso_id != 14) {
                $solicitudprimera->proceso_id   = 15;
                $solicitudprimera->subestado_id = 7;
                $solicitudprimera->save();
                //BITACORA//////
                $bitacora                     = new BitacoraSgc;
                $bitacora->mensaje            = $mensaje;
                $bitacora->nuevassolicitud_id = $solicitudprimera->id;
                $bitacora->user_id            = Auth::user()->id;

                $bitacora->save();
            }
        } else {
            $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $id)->count();
            if ($verificacion != 0) {
                $verificacion = SolicitudSgc::where('solicitud_duplicada_id', $id)->get();

                foreach ($verificacion as $v) {
                    $idDupli = $v->id;
                }
                if ($solicitud->proceso_id != 14) {
                    $solicitud->proceso_id   = 15;
                    $solicitud->subestado_id = 7;
                    $solicitud->save();
                    //BITACORA//////
                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = $mensaje;
                    $bitacora->nuevassolicitud_id = $solicitud->id;
                    $bitacora->user_id            = Auth::user()->id;

                    $bitacora->save();
                }

                $soliudDuplicada = SolicitudSgc::find($idDupli);
                if ($soliudDuplicada->proceso_id != 14) {
                    $soliudDuplicada->proceso_id   = 15;
                    $soliudDuplicada->subestado_id = 7;
                    $soliudDuplicada->save();
                    //BITACORA//////
                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = $mensaje;
                    $bitacora->nuevassolicitud_id = $soliudDuplicada->id;
                    $bitacora->user_id            = Auth::user()->id;

                    $bitacora->save();
                }
            } else {
                if ($solicitud->proceso_id != 14) {
                    $solicitud->proceso_id   = 15;
                    $solicitud->subestado_id = 7;
                    $solicitud->save();
                    //BITACORA//////
                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = $mensaje;
                    $bitacora->nuevassolicitud_id = $solicitud->id;
                    $bitacora->user_id            = Auth::user()->id;

                    $bitacora->save();
                }
            }
        }

        $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->solicitud_duplicada_id)->count();
        $verficicaciónTwo = Solicitud_duplicada::where('id', $solicitud->id)->count();
        if ($verficicaciónOne != 0) {
            $data_duplicada = Solicitud_duplicada::find($solicitud->solicitud_duplicada_id);

            if ($data_duplicada->proceso_id != 14) {
                $data_duplicada->proceso_id   = 15;
                $data_duplicada->subestado_id = 7;
                $data_duplicada->save();
            }
        } else {
            if ($verficicaciónTwo != 0) {
                $data_duplicada = Solicitud_duplicada::find($solicitud->id);
                if ($data_duplicada->proceso_id != 14) {
                    $data_duplicada->proceso_id   = 15;
                    $data_duplicada->subestado_id = 7;
                    $data_duplicada->save();
                }
            }
        }

        // event(new updateListSgcEvent);
        return;
    }
    public function Esperapresupuesto($id)
    {
        $solicitud = SolicitudSgc::find($id);
        if (floatval($solicitud->proceso_id) === floatval(2) && floatval($solicitud->subestado_id) === floatval(7)) {

            $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->id)->count();

            if ($verficicaciónOne != 0) {
                $data_duplicada               = Solicitud_duplicada::find($solicitud->id);
                $data_duplicada->subestado_id = 10;
                $data_duplicada->save();
            }

            $solicitud->subestado_id = 10;
            $solicitud->save();
            $bitacora                     = new BitacoraSgc;
            $bitacora->user_id            = Auth::user()->id;
            $bitacora->nuevassolicitud_id = $id;
            $bitacora->mensaje            = 'Solicitud en espera de presupuesto.';
            $bitacora->save();
            return;
        } else {
            if (floatval($solicitud->proceso_id) === floatval(2) && floatval($solicitud->subestado_id) === floatval(10)) {

                $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->id)->count();

                if ($verficicaciónOne != 0) {
                    $data_duplicada               = Solicitud_duplicada::find($solicitud->id);
                    $data_duplicada->subestado_id = 7;
                    $data_duplicada->save();
                }

                $solicitud->subestado_id = 7;
                $solicitud->save();
                $bitacora                     = new BitacoraSgc;
                $bitacora->user_id            = Auth::user()->id;
                $bitacora->nuevassolicitud_id = $id;
                $bitacora->mensaje            = 'Solicitud en control por aprobar.';
                $bitacora->save();

                return;
            }
        }
    }

    public function PagoRetenido($id)
    {
        $solicitud = SolicitudSgc::find($id);
        if (floatval($solicitud->proceso_id) === floatval(2) && floatval($solicitud->subestado_id) === floatval(7)) {

            $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->id)->count();

            if ($verficicaciónOne != 0) {
                $data_duplicada               = Solicitud_duplicada::find($solicitud->id);
                $data_duplicada->subestado_id = 11;
                $data_duplicada->save();
            }

            $solicitud->subestado_id = 11;
            $solicitud->save();
            $bitacora                     = new BitacoraSgc;
            $bitacora->user_id            = Auth::user()->id;
            $bitacora->nuevassolicitud_id = $id;
            $bitacora->mensaje            = 'Solicitud en pago retenido.';
            $bitacora->save();
            // event(new updateListSgcEvent);
            return;
        } else {
            if (floatval($solicitud->proceso_id) === floatval(2) && floatval($solicitud->subestado_id) === floatval(11)) {

                $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->id)->count();

                if ($verficicaciónOne != 0) {
                    $data_duplicada               = Solicitud_duplicada::find($solicitud->id);
                    $data_duplicada->subestado_id = 7;
                    $data_duplicada->save();
                }
                $solicitud->subestado_id = 7;
                $solicitud->save();
                $bitacora                     = new BitacoraSgc;
                $bitacora->user_id            = Auth::user()->id;
                $bitacora->nuevassolicitud_id = $id;
                $bitacora->mensaje            = 'Solicitud en control por aprobar.';
                $bitacora->save();
                // event(new updateListSgcEvent);
                return;
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Gestion($id)
    {
        $solicitud                     = SolicitudSgc::find($id);
        $old_state                     = new Old_state;
        $old_state->nuevassolicitud_id = $id;
        $old_state->subestado_id       = $solicitud->subestado_id;
        $old_state->save();

        $nombreCompleto = Auth::user()->name . ' ' . Auth::user()->apellido;

        $solicitud->subestado_id   = 14;
        $solicitud->gestionador_id = $nombreCompleto;
        $solicitud->save();

        $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->id)->count();
        if ($verficicaciónOne != 0) {
            $data_duplicada                 = Solicitud_duplicada::find($solicitud->id);
            $data_duplicada->subestado_id   = 14;
            $data_duplicada->gestionador_id = $nombreCompleto;
            $data_duplicada->save();
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $id;
        $bitacora->mensaje            = 'Solicitud en Gestión por ' . ' ' . $nombreCompleto;
        $bitacora->save();
        // event(new updateListSgcEvent);
        return;
    }

    public function GestionEnd($id)
    {

        $old_state = Old_state::where('nuevassolicitud_id', $id)->get();
        foreach ($old_state as $old) {
            $subestado_id = $old->subestado_id;
            $idoldstate   = $old->id;
        }

        $nombreCompleto            = Auth::user()->name . ' ' . Auth::user()->apellido;
        $solicitud                 = SolicitudSgc::find($id);
        $solicitud->gestionador_id = null;
        $solicitud->subestado_id   = $subestado_id;

        $solicitud->save();

        $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->id)->count();
        if ($verficicaciónOne != 0) {
            $data_duplicada                 = Solicitud_duplicada::find($solicitud->id);
            $data_duplicada->subestado_id   = $subestado_id;
            $data_duplicada->gestionador_id = null;
            $data_duplicada->save();
        }

        $deleteold = Old_state::find($idoldstate);
        $deleteold->delete();

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $id;
        $bitacora->mensaje            = 'Fin de la  Gestión por ' . ' ' . $nombreCompleto;
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
    public function AnularSolicitud(Request $request)
    {
        $solicitud               = SolicitudSgc::find($request->solicitud_id);
        $solicitud->proceso_id   = 14;
        $solicitud->subestado_id = 13;
        $solicitud->save();
        $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->id)->count();

        if ($verficicaciónOne != 0) {
            $data_duplicada               = Solicitud_duplicada::find($solicitud->id);
            $data_duplicada->subestado_id = 13;
            $data_duplicada->proceso_id   = 14;
            $data_duplicada->save();
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = 'Solicitud Anulada, motivo ' . ' ' . $request->descripcion;
        $bitacora->save();

        $notification              = new Notificacion;
        $notification->user_id     = $solicitud->user_id;
        $notification->activo_id   = 1;
        $notification->descripcion = 'La solicitud nro°' . ' ' . $solicitud->id . ' ' . 'fue anulada';
        $notification->save();
        // event(new updateListSgcEvent);
        return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function FinalizarSolictudSgc(Request $request)
    {
        $solicitud                    = SolicitudSgc::find($request->solicitud_id);
        $solicitud->proceso_id        = 13;
        $solicitud->subestado_id      = 4;
        $solicitud->fecha_facturacion = $request->fecha_facturacion;
        $solicitud->save();

        $verficicaciónOne = Solicitud_duplicada::where('id', $solicitud->id)->count();

        if ($verficicaciónOne != 0) {
            $data_duplicada                    = Solicitud_duplicada::find($solicitud->id);
            $data_duplicada->proceso_id        = 13;
            $data_duplicada->subestado_id      = 4;
            $data_duplicada->fecha_facturacion = $request->fecha_facturacion;
            $data_duplicada->save();
        }

        $bitacora                     = new BitacoraSgc;
        $bitacora->user_id            = Auth::user()->id;
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->mensaje            = 'Solicitud finalizada.';
        $bitacora->save();

        $notification              = new Notificacion;
        $notification->user_id     = $solicitud->user_id;
        $notification->activo_id   = 1;
        $notification->descripcion = 'La solicitud de SGC nro°' . ' ' . $solicitud->id . ' ' . 'finalizo';
        $notification->save();
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

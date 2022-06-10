<?php

namespace App\Imports;

use App\BitacoraSgc;
use App\SolicitudSgc;
use App\Solicitud_duplicada;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataSolicitudSgcImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $solicitud = SolicitudSgc::where('id', $row['id'])->get();

        foreach ($solicitud as $soli) {

            if ($soli->proceso_id == 13) {
                if ($row['boleta_red'] != null) {
                    SolicitudSgc::where('id', $row['id'])->update([

                        'boleta_red' => $row['boleta_red'],

                    ]);
                }
                if ($row['nro_cesta'] != null) {
                    SolicitudSgc::where('id', $row['id'])->update([

                        'cesta' => $row['nro_cesta'],

                    ]);

                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = 'Cesta ingresada, nro' . ' ' . $row['nro_cesta'];
                    $bitacora->nuevassolicitud_id = $row['id'];
                    $bitacora->user_id            = Auth::user()->id;
                    $bitacora->save();
                }

                if ($row['oc'] != null) {

                    if ($soli->area_creadora_id == 1) {

                        SolicitudSgc::where('id', $row['id'])->update([

                            'oc' => $row['oc'],

                        ]);

                    } else {
                        SolicitudSgc::where('id', $row['id'])->update([

                            'oc' => $row['oc'],

                        ]);

                    }

                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = 'OC ingresada, nro' . ' ' . $row['oc'];
                    $bitacora->nuevassolicitud_id = $row['id'];
                    $bitacora->user_id            = Auth::user()->id;
                    $bitacora->save();

                }

                if ($row['das'] != null) {

                    SolicitudSgc::where('id', $row['id'])->update([

                        'DAS' => $row['das'],

                    ]);

                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = 'DAS ingresada, nro' . ' ' . $row['das'];
                    $bitacora->nuevassolicitud_id = $row['id'];
                    $bitacora->user_id            = Auth::user()->id;
                    $bitacora->save();
                }

                if ($row['e_work'] != null) {
                    SolicitudSgc::where('id', $row['id'])->update([

                        'ework' => $row['e_work'],

                    ]);

                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = 'Ework ingresado, nro' . ' ' . $row['e_work'];
                    $bitacora->nuevassolicitud_id = $row['id'];
                    $bitacora->user_id            = Auth::user()->id;
                    $bitacora->save();
                }

                if ($row['nro_cotizacion'] != null) {
                    SolicitudSgc::where('id', $row['id'])->update([
                        'cotizacion' => $row['nro_cotizacion'],

                    ]);

                    $bitacora                     = new BitacoraSgc;
                    $bitacora->mensaje            = 'cotización  ingresada, nro' . ' ' . $row['nro_cotizacion'];
                    $bitacora->nuevassolicitud_id = $row['id'];
                    $bitacora->user_id            = Auth::user()->id;
                    $bitacora->save();
                }

                $verficicacion = Solicitud_duplicada::where('id', $row['id'])->count();
                if ($verficicacion != 0) {
                    $solicitud_duplicada = Solicitud_duplicada::where('id', $row['id'])->get();
                    foreach ($solicitud_duplicada as $dupli) {
                        if ($row['boleta_red'] != null) {
                            Solicitud_duplicada::where('id', $row['id'])->update([

                                'boleta_red' => $row['boleta_red'],

                            ]);
                        }

                        if ($row['nro_cesta'] != null) {
                            Solicitud_duplicada::where('id', $row['id'])->update([

                                'cesta' => $row['nro_cesta'],

                            ]);

                        }

                        if ($row['oc'] != null) {

                            if ($soli->area_creadora_id == 1) {
                                Solicitud_duplicada::where('id', $row['id'])->update([

                                    'oc' => $row['oc'],

                                ]);

                            } else {
                                Solicitud_duplicada::where('id', $row['id'])->update([

                                    'oc' => $row['oc'],

                                ]);

                            }

                        }

                        if ($row['das'] != null) {
                            Solicitud_duplicada::where('id', $row['id'])->update([

                                'DAS' => $row['das'],

                            ]);

                        }

                        if ($row['e_work'] != null) {
                            Solicitud_duplicada::where('id', $row['id'])->update([

                                'ework' => $row['e_work'],

                            ]);

                        }

                        if ($row['nro_cotizacion'] != null) {
                            Solicitud_duplicada::where('id', $row['id'])->update([
                                'cotizacion' => $row['nro_cotizacion'],

                            ]);

                        }

                    }
                }

            } else {
                if ($soli->proceso_id != 13 && $soli->proceso_id != 14 && $soli->proceso_id != 17) {
                    if ($row['boleta_red'] != null) {
                        SolicitudSgc::where('id', $row['id'])->update([

                            'boleta_red' => $row['boleta_red'],

                        ]);
                    }
                    if ($row['nro_cesta'] != null) {
                        SolicitudSgc::where('id', $row['id'])->update([

                            'cesta'        => $row['nro_cesta'],

                            'subestado_id' => 2,
                            'proceso_id'   => 2,

                        ]);

                        $bitacora                     = new BitacoraSgc;
                        $bitacora->mensaje            = 'Cesta ingresada, nro' . ' ' . $row['nro_cesta'];
                        $bitacora->nuevassolicitud_id = $row['id'];
                        $bitacora->user_id            = Auth::user()->id;
                        $bitacora->save();
                    }

                    if ($row['oc'] != null) {

                        if ($soli->area_creadora_id == 1) {

                            SolicitudSgc::where('id', $row['id'])->update([

                                'oc'           => $row['oc'],

                                'subestado_id' => 12,
                                'proceso_id'   => 2,
                            ]);

                        } else {
                            if ($soli->costos_activos != null && $soli->costos_activos != 0) {
                                if ($soli->guiadespacho == 1) {
                                    SolicitudSgc::where('id', $row['id'])->update([

                                        'oc'           => $row['oc'],

                                        'subestado_id' => 2,
                                        'proceso_id'   => 2,
                                    ]);

                                } else {
                                    if ($soli->guiadespacho == null) {
                                        SolicitudSgc::where('id', $row['id'])->update([

                                            'oc'           => $row['oc'],

                                            'subestado_id' => 19,
                                            'proceso_id'   => 6,
                                        ]);
                                    }
                                }
                            } else {
                                if ($soli->costos_servicios != null && $soli->costos_servicios != 0) {
                                    if ($soli->informefinal == 1) {
                                        SolicitudSgc::where('id', $row['id'])->update([

                                            'oc'           => $row['oc'],

                                            'subestado_id' => 2,
                                            'proceso_id'   => 2,
                                        ]);
                                    } else {
                                        if ($soli->informefinal == null) {
                                            SolicitudSgc::where('id', $row['id'])->update([

                                                'oc'           => $row['oc'],

                                                'subestado_id' => 3,
                                                'proceso_id'   => 6,
                                            ]);
                                        }
                                    }

                                }
                            }

                        }

                        $bitacora                     = new BitacoraSgc;
                        $bitacora->mensaje            = 'OC ingresada, nro' . ' ' . $row['oc'];
                        $bitacora->nuevassolicitud_id = $row['id'];
                        $bitacora->user_id            = Auth::user()->id;
                        $bitacora->save();

                    }

                    if ($row['das'] != null) {
                        if ($soli->area_creadora_id != 1) {
                            if ($soli->proceso_id == 2 && $soli->subestado_id == 2) {
                                SolicitudSgc::where('id', $row['id'])->update([

                                    'DAS'          => $row['das'],

                                    'subestado_id' => 5,
                                    'proceso_id'   => 17,
                                ]);
                            }

                            $bitacora                     = new BitacoraSgc;
                            $bitacora->mensaje            = 'DAS ingresada, nro' . ' ' . $row['das'];
                            $bitacora->nuevassolicitud_id = $row['id'];
                            $bitacora->user_id            = Auth::user()->id;
                            $bitacora->save();
                        }

                    }

                    if ($row['e_work'] != null) {
                        SolicitudSgc::where('id', $row['id'])->update([

                            'ework' => $row['e_work'],

                        ]);

                        $bitacora                     = new BitacoraSgc;
                        $bitacora->mensaje            = 'Ework ingresado, nro' . ' ' . $row['e_work'];
                        $bitacora->nuevassolicitud_id = $row['id'];
                        $bitacora->user_id            = Auth::user()->id;
                        $bitacora->save();
                    }

                    if ($row['nro_cotizacion'] != null) {
                        SolicitudSgc::where('id', $row['id'])->update([
                            'cotizacion' => $row['nro_cotizacion'],

                        ]);

                        $bitacora                     = new BitacoraSgc;
                        $bitacora->mensaje            = 'cotización  ingresada, nro' . ' ' . $row['nro_cotizacion'];
                        $bitacora->nuevassolicitud_id = $row['id'];
                        $bitacora->user_id            = Auth::user()->id;
                        $bitacora->save();
                    }

                    if ($row['fecha_facturacion'] != null) {
                        SolicitudSgc::where('id', $row['id'])->update([
                            'fecha_facturacion' => $row['fecha_facturacion'],
                            'subestado_id'      => 4,
                            'proceso_id'        => 13,

                        ]);

                        $bitacora                     = new BitacoraSgc;
                        $bitacora->mensaje            = 'Solicitud facturada';
                        $bitacora->nuevassolicitud_id = $row['id'];
                        $bitacora->user_id            = Auth::user()->id;
                        $bitacora->save();
                    }

                    $verficicacion = Solicitud_duplicada::where('id', $row['id'])->count();
                    if ($verficicacion != 0) {
                        $solicitud_duplicada = Solicitud_duplicada::where('id', $row['id'])->get();
                        foreach ($solicitud_duplicada as $dupli) {
                            if ($row['boleta_red'] != null) {
                                Solicitud_duplicada::where('id', $row['id'])->update([

                                    'boleta_red' => $row['boleta_red'],

                                ]);
                            }

                            if ($row['nro_cesta'] != null) {
                                Solicitud_duplicada::where('id', $row['id'])->update([

                                    'cesta'        => $row['nro_cesta'],

                                    'subestado_id' => 2,
                                    'proceso_id'   => 2,

                                ]);

                            }

                            if ($row['oc'] != null) {

                                if ($soli->area_creadora_id == 1) {
                                    Solicitud_duplicada::where('id', $row['id'])->update([

                                        'oc'           => $row['oc'],

                                        'subestado_id' => 12,
                                        'proceso_id'   => 2,
                                    ]);

                                } else {
                                    if ($soli->costos_activos != null && $solicitud->costos_activos != 0) {
                                        if ($soli->guiadespacho == 1) {
                                            Solicitud_duplicada::where('id', $row['id'])->update([

                                                'oc'           => $row['oc'],

                                                'subestado_id' => 2,
                                                'proceso_id'   => 2,
                                            ]);

                                        } else {
                                            if ($soli->guiadespacho == null) {
                                                Solicitud_duplicada::where('id', $row['id'])->update([

                                                    'oc'           => $row['oc'],

                                                    'subestado_id' => 19,
                                                    'proceso_id'   => 6,
                                                ]);
                                            }
                                        }
                                    } else {
                                        if ($soli->costos_servicios != null && $soli->costos_servicios != 0) {
                                            if ($soli->informefinal == 1) {
                                                Solicitud_duplicada::where('id', $row['id'])->update([

                                                    'oc'           => $row['oc'],

                                                    'subestado_id' => 2,
                                                    'proceso_id'   => 2,
                                                ]);
                                            } else {
                                                if ($soli->informefinal == null) {
                                                    Solicitud_duplicada::where('id', $row['id'])->update([

                                                        'oc'           => $row['oc'],

                                                        'subestado_id' => 3,
                                                        'proceso_id'   => 6,
                                                    ]);
                                                }
                                            }

                                        }
                                    }

                                }

                            }

                            if ($row['das'] != null) {
                                if ($soli->proceso_id == 2 && $soli->subestado_id == 2) {
                                    Solicitud_duplicada::where('id', $row['id'])->update([

                                        'DAS'          => $row['das'],

                                        'subestado_id' => 5,
                                        'proceso_id'   => 17,
                                    ]);
                                }

                            }

                            if ($row['e_work'] != null) {
                                Solicitud_duplicada::where('id', $row['id'])->update([

                                    'ework' => $row['e_work'],

                                ]);

                            }

                            if ($row['nro_cotizacion'] != null) {
                                Solicitud_duplicada::where('id', $row['id'])->update([
                                    'cotizacion' => $row['nro_cotizacion'],

                                ]);

                            }

                            if ($row['fecha_facturacion'] != null) {
                                Solicitud_duplicada::where('id', $row['id'])->update([
                                    'fecha_facturacion' => $row['fecha_facturacion'],
                                    'subestado_id'      => 4,
                                    'proceso_id'        => 13,

                                ]);

                            }
                        }
                    }

                } else {
                    if ($soli->proceso_id == 17) {

                        if ($row['fecha_facturacion'] != null) {
                            SolicitudSgc::where('id', $row['id'])->update([
                                'fecha_facturacion' => $row['fecha_facturacion'],
                                'subestado_id'      => 4,
                                'proceso_id'        => 13,

                            ]);

                            $bitacora                     = new BitacoraSgc;
                            $bitacora->mensaje            = 'Solicitud facturada';
                            $bitacora->nuevassolicitud_id = $row['id'];
                            $bitacora->user_id            = Auth::user()->id;
                            $bitacora->save();
                        }
                        $verficicacion = Solicitud_duplicada::where('id', $row['id'])->count();
                        if ($verficicacion != 0) {
                            $solicitud_duplicada = Solicitud_duplicada::where('id', $row['id'])->get();
                            foreach ($solicitud_duplicada as $dupli) {
                                if ($row['fecha_facturacion'] != null) {
                                    Solicitud_duplicada::where('id', $row['id'])->update([
                                        'fecha_facturacion' => $row['fecha_facturacion'],
                                        'subestado_id'      => 4,
                                        'proceso_id'        => 13,

                                    ]);

                                }

                            }
                        }
                    }
                }

            }
        }

    }
}

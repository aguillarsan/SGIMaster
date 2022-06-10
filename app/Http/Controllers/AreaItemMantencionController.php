<?php

namespace App\Http\Controllers;

use App\Area_item_mantencion;
use App\Product;
use App\Ticket;
use App\Ticket_mantencion_olt;
use Illuminate\Http\Request;

class AreaItemMantencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetEnergiaAc()
    {
        $items = Area_item_mantencion::where('area_mantencion_id', 1)->with('product')->get();
        return $items;
    }

    public function GetEnergiaDc()
    {
        $items = Area_item_mantencion::where('area_mantencion_id', 2)->with('product')->get();
        return $items;
    }

    public function GetsitemsClima()
    {
        $items = Area_item_mantencion::where('area_mantencion_id', 3)->with('product')->get();
        return $items;
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
        $ticket_mantencion = Ticket_mantencion_olt::where('ticket_id', $request->ticket_id)->count();
        if ($ticket_mantencion != 0) {
            $ticket_mantencion_find = Ticket_mantencion_olt::where('ticket_id', $request->ticket_id)->get();
            foreach ($ticket_mantencion_find as $t) {
                $id_ma = $t->id;
            }
            $ticket_mantencion = Ticket_mantencion_olt::find($id_ma);
            if ($request->product_id == 1) {
                $ticket_mantencion->empalme = 1;
            } else {
                if ($request->product_id == 2) {
                    $ticket_mantencion->grupo_generador = 1;
                } else {
                    if ($request->product_id == 3) {
                        $ticket_mantencion->autonomía_generado = 1;
                    } else {
                        if ($request->product_id == 4) {
                            $ticket_mantencion->fuente_cc = 1;
                        } else {
                            if ($request->product_id == 5) {
                                $ticket_mantencion->autonomía_baterías = 1;
                            } else {
                                if ($request->product_id == 6) {
                                    $ticket_mantencion->distribucion_N1 = 1;
                                } else {
                                    if ($request->product_id == 7) {
                                        $ticket_mantencion->distribucion_N2 = 1;
                                    } else {
                                        if ($request->product_id == 8) {
                                            $ticket_mantencion->equipamiento = 1;
                                        } else {
                                            if ($request->product_id == 9) {
                                                $ticket_mantencion->capacidad = 1;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $ticket_mantencion->ticket_id = $request->ticket_id;
            $ticket_mantencion->save();
        } else {
            $ticket_mantencion = new Ticket_mantencion_olt;
            if ($request->product_id == 1) {
                $ticket_mantencion->empalme = 1;
            } else {
                if ($request->product_id == 2) {
                    $ticket_mantencion->grupo_generador = 1;
                } else {
                    if ($request->product_id == 3) {
                        $ticket_mantencion->autonomia_generador = 1;
                    } else {
                        if ($request->product_id == 4) {
                            $ticket_mantencion->fuente_cc = 1;
                        } else {
                            if ($request->product_id == 5) {
                                $ticket_mantencion->autonomia_baterias = 1;
                            } else {
                                if ($request->product_id == 6) {
                                    $ticket_mantencion->distribucion_N1 = 1;
                                } else {
                                    if ($request->product_id == 7) {
                                        $ticket_mantencion->distribucion_N2 = 1;
                                    } else {
                                        if ($request->product_id == 8) {
                                            $ticket_mantencion->equipamiento = 1;
                                        } else {
                                            if ($request->product_id == 9) {
                                                $ticket_mantencion->capacidad = 1;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $ticket_mantencion->ticket_id = $request->ticket_id;
            $ticket_mantencion->save();
        }

        $product = Product::find($request->product_id);
        $ticket  = Ticket::find($request->ticket_id);
        if ($ticket->porcentaje_avance == null) {
            $ticket->porcentaje_avance = $product->porcentaje;
        } else {
            $ticket->porcentaje_avance = $ticket->porcentaje_avance + $product->porcentaje;
        }

        $ticket->save();
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function GetMantenciones($id)
    {
        $data = Ticket_mantencion_olt::where('ticket_id', $id)->select('empalme', 'grupo_generador',
            'autonomia_generador')->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function GetMantencionesdc($id)
    {
        $data = Ticket_mantencion_olt::where('ticket_id', $id)->select('fuente_cc',
            'autonomia_baterias',
            'distribucion_N1',
            'distribucion_N2')->get();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function GetMantencionesClima($id)
    {
        $data = Ticket_mantencion_olt::where('ticket_id', $id)->select('equipamiento',
            'capacidad'
        )->get();
        return $data;
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

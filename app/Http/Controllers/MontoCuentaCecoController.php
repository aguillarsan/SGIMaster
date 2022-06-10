<?php

namespace App\Http\Controllers;

use App\presupuesto_ceco;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MontoCuentaCecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function montoDisponibleCeco(Request $request)
    {

        $fecha = Carbon::now()->format('Y-m-d');
        $mes   = Carbon::now()->month;
        $anio  = Carbon::now()->year;

        $monto = $request->monto;

        $presupuesto = presupuesto_ceco::where('user_id', Auth::user()->id)->whereMonth('periodo', $mes)->whereYear('periodo', $anio)->first();

        if ($monto > $presupuesto->monto_limite) {
            $data = [
                'estado'           => 1,
                'monto_disponible' => $presupuesto->monto_disponible,
            ];
            return $data;
        } else {
            if ($monto > $presupuesto->monto_disponible) {

                $data = [
                    'estado'           => 2,
                    'monto_disponible' => $presupuesto->monto_disponible,
                ];
                return $data;
            } else {
                if ($presupuesto->monto_disponible == 0) {

                    $data = [
                        'estado'           => 3,
                        'monto_disponible' => $presupuesto->monto_disponible,
                    ];
                    return $data;
                } else {
                    if ($monto < $presupuesto->monto_disponible) {

                        $data = [
                            'estado'           => 4,
                            'monto_disponible' => $presupuesto->monto_disponible,
                        ];
                        return $data;
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
    public function disponibleIngMes(Request $request)
    {
        if ($request->year != null && $request->month != null) {
            $mes         = (int) $request->month;
            $anio        = (int) $request->year;
            $presupuesto = presupuesto_ceco::where('user_id', Auth::user()->id)->whereMonth('periodo', $mes)->whereYear('periodo', $anio)->first();
            return $presupuesto;
        } else {
            $mes  = Carbon::now()->month;
            $anio = Carbon::now()->year;

            $presupuesto = presupuesto_ceco::where('user_id', Auth::user()->id)->whereMonth('periodo', $mes)->whereYear('periodo', $anio)->first();

            return $presupuesto;
        }

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

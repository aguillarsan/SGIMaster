<?php

namespace App\Http\Controllers;

use App\CuentaSgc;
use App\SolicitudSgc;
use App\Tipo_moneda;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetBillOne()
    {
        $fecha      = Carbon::now();
        $fec        = $fecha->toDateString();
        $fechafinal = substr($fec, 6, -3);
        $numeromes  = (int) $fechafinal;

        if ($numeromes >= 1 && $numeromes <= 9) {
            $data = [
                'cuenta1' => CuentaSgc::where('numeromes', $numeromes)->where('tipo', '=', 1)->where('annio', '2020')->get(['id','cuenta', 'Descripcion', 'montoutilizado'
                    , 'montodisponible']),
                'cuenta2' => CuentaSgc::where('numeromes', $numeromes)->where('tipo', '=', 2)->where('annio', '2020')->get(['id','cuenta', 'Descripcion', 'montoutilizado'
                    , 'montodisponible']),
                'cuenta3' => CuentaSgc::where('numeromes', $numeromes)->where('tipo', '=', 3)->where('annio', '2020')->get(['id','cuenta', 'Descripcion', 'montoutilizado'
                    , 'montodisponible']),
                'cuenta4' => CuentaSgc::where('numeromes', $numeromes)->where('tipo', '=', 4)->where('annio', '2020')->get(['id','cuenta', 'Descripcion', 'montoutilizado'
                    , 'montodisponible']),
            ];

            return $data;
        } else {
            $fecha2      = Carbon::now();
            $fec2        = $fecha->toDateString();
            $fechafinal2 = substr($fec, 5, -3);
            $numeromes2  = (int) $fechafinal2;

            if ($numeromes2 >= 10 && $numeromes2 <= 12) {
                $data = [
                    'cuenta1' => CuentaSgc::where('numeromes', $numeromes2)->where('tipo', '=', 1)->where('annio', '2020')->get(['id','cuenta', 'Descripcion', 'montoutilizado'
                    , 'montodisponible']),
                    'cuenta2' => CuentaSgc::where('numeromes', $numeromes2)->where('tipo', '=', 2)->where('annio', '2020')->get(['id','cuenta', 'Descripcion', 'montoutilizado'
                    , 'montodisponible']),
                    'cuenta3' => CuentaSgc::where('numeromes', $numeromes2)->where('tipo', '=', 3)->where('annio', '2020')->get(['id','cuenta', 'Descripcion', 'montoutilizado'
                    , 'montodisponible']),
                    'cuenta4' => CuentaSgc::where('numeromes', $numeromes2)->where('tipo', '=', 4)->where('annio', '2020')->get(['id','cuenta', 'Descripcion', 'montoutilizado'
                    , 'montodisponible']),
                ];

                return $data;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function BillRequest(Request $request)
    {
        $solicitud = SolicitudSgc::find($request->solicitud_id);
        $moneda    = Tipo_moneda::find($solicitud->tipo_moneda_id);

        if ($solicitud->costos_activos != 0) {

            $cuenta = CuentaSgc::find($request->cuenta_id);

            if ($solicitud->tipo_moneda_id == 1) {
                $monto_suma             = $solicitud->costos_activos;
                $cuenta->montoutilizado = $cuenta->montoutilizado + $monto_suma;
                $cuenta->save();
            } else {

                $monto_suma             = $solicitud->costos_activos * $moneda->valor;
                $cuenta->montoutilizado = $cuenta->montoutilizado + $monto_suma;
                $cuenta->save();
            }

            $solicitud->cuenta_id = $request->cuenta_id;
            $solicitud->save();
            return;

        } else {
            if ($solicitud->costos_servicios != 0) {

                $cuenta = CuentaSgc::find($request->cuenta_id);

                if ($solicitud->tipo_moneda_id == 1) {
                    $monto_suma             = $solicitud->costos_servicios;
                    $cuenta->montoutilizado = $cuenta->montoutilizado + $monto_suma;
                    $cuenta->save();
                } else {

                    $monto_suma             = $solicitud->costos_servicios * $moneda->valor;
                    $cuenta->montoutilizado = $cuenta->montoutilizado + $monto_suma;
                    $cuenta->save();
                }

                $solicitud->cuenta_id = $request->cuenta_id;
                $solicitud->save();
                return;

            } else {
                if ($solicitud->activo_servicio != 0) {
                    $cuenta = CuentaSgc::find($request->cuenta_id);

                    if ($solicitud->tipo_moneda_id == 1) {
                        $monto_suma             = $solicitud->activo_servicio;
                        $cuenta->montoutilizado = $cuenta->montoutilizado + $monto_suma;
                        $cuenta->save();
                    } else {

                        $monto_suma             = $solicitud->activo_servicio * $moneda->valor;
                        $cuenta->montoutilizado = $cuenta->montoutilizado + $monto_suma;
                        $cuenta->save();
                    }

                    $solicitud->cuenta_id = $request->cuenta_id;
                    $solicitud->save();
                    return;
                }
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function GetBillAssociate(Request $request)
    {
        $solicitud = SolicitudSgc::find($request->solicitud_id);
        if ($solicitud->cuenta_id != null) {
            $cuenta = CuentaSgc::where('id', $solicitud->cuenta_id)->get();
            return $cuenta;
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

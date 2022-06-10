<?php

namespace App\Http\Controllers;

use App\Tipo_moneda;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GetValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Value(Request $request)
    {
        $fechaActual        = Carbon::now();
        $fechaActualFormato = $fechaActual->format('Y-m-d');
        $date_last_update   = Tipo_moneda::where('id', 2)->first();
        $days               = $fechaActual->diffInDays($date_last_update->updated);

        if ($days == 7 || $days > 7) {
            $apiUrl = 'https://mindicador.cl/api';

            //De otra forma utilizamos cURL
            $curl = curl_init($apiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($curl);
            curl_close($curl);

            $dailyIndicators = json_decode($json);

            $uf          = Tipo_moneda::find(2);
            $uf->valor   = $dailyIndicators->uf->valor;
            $uf->updated = Carbon::now();
            $uf->save();

            $dolar          = Tipo_moneda::find(3);
            $dolar->valor   = $dailyIndicators->dolar->valor;
            $dolar->updated = Carbon::now();
            $dolar->save();

            $euro          = Tipo_moneda::find(4);
            $euro->valor   = $dailyIndicators->euro->valor;
            $euro->updated = Carbon::now();
            $euro->save();

            $moneda       = Tipo_moneda::find($request->TipoMoneda);
            $valor_moneda = $moneda->valor;

        } else {
            if ($request->TipoMoneda != 1) {
                $moneda       = Tipo_moneda::find($request->TipoMoneda);
                $valor_moneda = $moneda->valor;
                return $valor_moneda;

            }
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUf()
    {

        $fechaActual        = Carbon::now();
        $fechaActualFormato = $fechaActual->format('Y-m-d');
        $date_last_update   = Tipo_moneda::where('id', 2)->first();
        $days               = $fechaActual->diffInDays($date_last_update->updated);

        if ($days == 7 || $days > 7) {
            $apiUrl = 'https://mindicador.cl/api';

            //De otra forma utilizamos cURL
            $curl = curl_init($apiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($curl);
            curl_close($curl);

            $dailyIndicators = json_decode($json);

            $uf          = Tipo_moneda::find(2);
            $uf->valor   = $dailyIndicators->uf->valor;
            $uf->updated = Carbon::now();
            $uf->save();

            return $dailyIndicators->uf->valor;
        } else {
            $moneda       = Tipo_moneda::find(2);
            $valor_moneda = $moneda->valor;
            return $valor_moneda;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function GetValorLimite()
    {
        $fechaActual        = Carbon::now();
        $fechaActualFormato = $fechaActual->format('Y-m-d');
        $date_last_update   = Tipo_moneda::where('id', 2)->first();
        $days               = $fechaActual->diffInDays($date_last_update->updated);
        if ($days == 7 || $days > 7) {
            $apiUrl = 'https://mindicador.cl/api';

            //De otra forma utilizamos cURL
            $curl = curl_init($apiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($curl);
            curl_close($curl);

            $dailyIndicators = json_decode($json);
            $valor_moneda    = $dailyIndicators->uf->valor * 50;
            return $valor_moneda;
        } else {
            $moneda       = Tipo_moneda::find(2);
            $valor_moneda = $moneda->valor * 50;
            return $valor_moneda;
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

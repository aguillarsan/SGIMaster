<?php

namespace App\Http\Controllers;

use App\Solicitud;
use App\Ticket_ingenieria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TotalIngController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getTotales(Request $request)
    {
        $total_creada      = Ticket_ingenieria::buscar()->where('user_id', Auth::user()->id)->where('tipo_ticket_id',$request->tipo_ticket)->count(['id']);
        $total_ework       = Ticket_ingenieria::buscar()->where('user_id', Auth::user()->id)->where('proceso_id', 2)->where('subproceso_id', 4)->where('tipo_ticket_id',$request->tipo_ticket)->count(['id']);
        $total_espera_pago = Ticket_ingenieria::buscar()->where('subproceso_id', 5)->where('tipo_ticket_id',$request->tipo_ticket)->count(['id']);
        $data              = [
            'total_creada'      => $total_creada,
            'total_ework'       => $total_ework,
            'total_espera_pago' => $total_espera_pago,
        ];
        return $data;
    }
    public function GetTotalCreadaIng(Request $request)
    {

        $total = Ticket_ingenieria::buscar()->where('user_id', Auth::user()->id)->count();
        return $total;
    }
    public function GetTotalEsperaPago(Request $request)
    {
        $total = Ticket_ingenieria::buscar()->where('subproceso_id', 5)->count();
        return $total;
    }
    public function GetTotalValidacionIng(Request $request)
    {
        $total_validacion  = Ticket_ingenieria::buscar()->where('proceso_id', 1)->where('subproceso_id', 1)->count(['id']);
        $total_ejecucion   = Ticket_ingenieria::buscar()->where('proceso_id', 1)->where('subproceso_id', 2)->count(['id']);
        $total_gestion     = Ticket_ingenieria::buscar()->where('proceso_id', 1)->where('subproceso_id', 3)->count(['id']);
        $total_espera_pago = Ticket_ingenieria::buscar()->where('subproceso_id', 5)->count(['id']);
        $data              = [
            'total_validacion'      => $total_validacion,
            'total_ejecucion'       => $total_ejecucion,
            'total_espera_pago' => $total_espera_pago,
            'total_gestion' => $total_gestion
        ];
        return $data;
    }

    public function GetTotalTpIng(Request $request)
    {
        $total = Ticket_ingenieria::buscar()->where('proceso_id', 1)->where('subproceso_id', 2)->count();
        return $total;
    }

    public function GetTotalEworkIng(Request $request)
    {
        $total = Ticket_ingenieria::buscar()->where('user_id', Auth::user()->id)->where('proceso_id', 2)->where('subproceso_id', 4)->count();
        return $total;
    }

    public function GetTotalActiva(Request $request)
    {
        $total = Ticket_ingenieria::buscar()->where('subproceso_id', '!=', 7)->count();
        return $total;
    }
    public function GetTotalFinalizada(Request $request)
    {
        $total = Ticket_ingenieria::buscar()->where('subproceso_id', 7)->count();
        return $total;
    }

    public function GetTotalGestion(Request $request)
    {
        $total = Ticket_ingenieria::buscar()->where('proceso_id', 1)->where('subproceso_id', 3)->count();
        return $total;
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

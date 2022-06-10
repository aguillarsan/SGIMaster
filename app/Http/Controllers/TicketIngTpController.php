<?php

namespace App\Http\Controllers;

use App\Log_ingenieria;
use App\Ticket_ingenieria;
use App\Ticket_ingenieria_tp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketIngTpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $tps = Ticket_ingenieria_tp::where('solicitud_id', $id)->get();
        return $tps;
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
    public function CreateTp(Request $request)
    {
        try {
            $ticket_ingenieria                = Ticket_ingenieria::find($request->ticket_id);
            $ticket_ingenieria->subproceso_id = 3;
            $ticket_ingenieria->save();

            $tp                      = new Ticket_ingenieria_tp;
            $tp->ticket_ingenieria_id           = $request->ticket_id;
            $tp->tp                  = $request->tp;
            $tp->fecha_ejecucion_tp  = $request->fecha_ejecucion;
            $tp->actividad_id        = $request->actividad_id;
            $tp->tipo_supervision_id = $request->tipo_supervision_id;
            $tp->supervisor_id       = $request->supervisor_id;
            $tp->save();

            $log              = new Log_ingenieria;
            $log->ticket_id   = $request->ticket_id;
            $log->descripcion = 'Nro de tp ingresado, número:' . ' ' . $request->tp;
            $log->user_id     = Auth::user()->id;
            $log->save();
            return;
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

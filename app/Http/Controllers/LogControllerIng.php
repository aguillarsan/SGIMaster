<?php

namespace App\Http\Controllers;

use App\Log_ingenieria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ticket_ingenieria;

class LogControllerIng extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logIng($id)
    {
        $bitacora = Log_ingenieria::where('ticket_id', $id)->with('user')->orderBy('id', 'desc')->get();

        return $bitacora;
    }

    public function rechazoFactibilidad(Request $request){
          $ticket_ingenieria = Ticket_ingenieria::find($request->id);
          $ticket_ingenieria->subproceso_id = 6;
          $ticket_ingenieria->proceso_id = 2;
          $ticket_ingenieria->save();

        $log               = new Log_ingenieria;
        $log->ticket_id = $request->id;

        $log->descripcion = 'Factibilidad negativa, motivo:'.' '.$request->motivo;
        $log->user_id     = Auth::user()->id;
        $log->save();

        return;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mensaje(Request $request, $id)
    {

        $log               = new Log_ingenieria;
        $log->ticket_id = $id;

        $log->descripcion = $request->input('descripcion');
        $log->user_id     = Auth::user()->id;
        $log->save();

        return;
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

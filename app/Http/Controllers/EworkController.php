<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket_ingenieria;
use App\Log_ingenieria;
use Illuminate\Support\Facades\Auth;

class EworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ticket_ingenieria = Ticket_ingenieria::find($request->id);
        $ticket_ingenieria->ework=$request->ework;
        $ticket_ingenieria->subproceso_id = 9;
        $ticket_ingenieria->save();

        $log               = new Log_ingenieria;
        $log->ticket_id = $request->id;

        $log->descripcion = 'Número de ework ingresado, número:'.' '.$request->ework;
        $log->user_id     = Auth::user()->id;
        $log->save();

        return;
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

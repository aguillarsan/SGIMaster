<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Site;
use App\SolicitudSgc;
use  App\Log;
use App\Zona;
use Illuminate\Support\Facades\Auth;

class SitioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $ticket = Ticket::find($id);
        $sitio = Site::where('id',$ticket->site_id)->with('pop.comuna.zona','coverage_type')->get();
        return $sitio;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editSite(Request $request)
    {
        $ticket = Ticket::find($request->ticketid);
        $old_site = $ticket->site->nem_site;
        $ticket->site_id = $request->site_id;
        $ticket->save();
        $sgc = SolicitudSgc::where('ticket_id',$ticket->id)->get();
        if($sgc != null){
            foreach ($sgc as $solicitud ) {
                $solicitudUpdate = SolicitudSgc::find($solicitud->id);
                $solicitudUpdate->site_id = $request->site_id;
                $solicitudUpdate->save();
            }
        }
        $site = Site::find($request->site_id);
        $log               = new Log;
        $log->ticket_id = $request->ticketid;
        $log->descripcion = 'El sitio'.' '.$old_site.' '.'se modifico por el sitio'.' '.$site->nem_site;
        $log->tipo_mensaje_id = 2;
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
    public function GetZonas()
    {
        $zone = Zona::get();
        return $zone;
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

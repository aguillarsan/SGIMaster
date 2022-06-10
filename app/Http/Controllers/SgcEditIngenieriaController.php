<?php

namespace App\Http\Controllers;

use App\BitacoraSgc;
use App\SolicitudSgc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SgcEditIngenieriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editResponsableSgc(Request $request)
    {
        $solicitud                      = SolicitudSgc::find($request->solicitud_id);
        $solicitud->responsable_pago_id = $request->responsable_id;
        $solicitud->save();

        $bitacora                     = new BitacoraSgc;
        $bitacora->mensaje            = 'El responsable de pago fue editado';
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->user_id            = Auth::user()->id;

        $bitacora->save();
        return;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPmProyectoSgc(Request $request)
    {
        $solicitud                      = SolicitudSgc::find($request->solicitud_id);
        $solicitud->pm_proyecto_id = $request->pm_proyecto_id;
        $solicitud->save();

        $bitacora                     = new BitacoraSgc;
        $bitacora->mensaje            = 'El pm del proyecto fue editado';
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->user_id            = Auth::user()->id;

        $bitacora->save();
        return;
    }

    public function editPmInternoSgc(Request $request)
    {
        $solicitud                      = SolicitudSgc::find($request->solicitud_id);
        $solicitud->pm_interno_id = $request->pm_interno_id;
        $solicitud->save();

        $bitacora                     = new BitacoraSgc;
        $bitacora->mensaje            = 'El pm interno del proyecto fue editado';
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->user_id            = Auth::user()->id;

        $bitacora->save();
        return;
    }


    public function editSolicitanteSgc(Request $request)
    {
        $solicitud                      = SolicitudSgc::find($request->solicitud_id);
        $solicitud->solicitante_id = $request->solicitante_id;
        $solicitud->save();

        $bitacora                     = new BitacoraSgc;
        $bitacora->mensaje            = 'El solicitante fue editado';
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->user_id            = Auth::user()->id;

        $bitacora->save();
        return;
    }

    public function editTipoPagoSgc(Request $request)
    {
        $solicitud                      = SolicitudSgc::find($request->solicitud_id);
        $solicitud->tipo_pago_id = $request->tipo_pago_id;
        $solicitud->save();

        $bitacora                     = new BitacoraSgc;
        $bitacora->mensaje            = 'El tipo de pago fue editado';
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->user_id            = Auth::user()->id;

        $bitacora->save();
        return;
    }

     public function editPGpon(Request $request)
    {
        $solicitud                      = SolicitudSgc::find($request->solicitud_id);
        $solicitud->proyecto_gpon = $request->pgpon;
        $solicitud->save();

        $bitacora                     = new BitacoraSgc;
        $bitacora->mensaje            = 'El P.Gpon fue editado';
        $bitacora->nuevassolicitud_id = $request->solicitud_id;
        $bitacora->user_id            = Auth::user()->id;

        $bitacora->save();
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

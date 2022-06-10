<?php

namespace App\Http\Controllers;
use App\Cambio_estado_control_cambio_data;
use App\Tipo_solicitud_control_cambio_data;
use App\Item_control_cambio;
use App\Control_cambio_data;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PdfConvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ControlCambioDocument($id)
    {
           $data_request = Control_cambio_data::with('estado_control_cambio')->find($id);
           $type_request = Tipo_solicitud_control_cambio_data::where('control_cambio_data_id',$id)->get();
           $state_change = Cambio_estado_control_cambio_data::where('control_cambio_data_id',$id)->get();
           $items = Item_control_cambio::where('control_cambio_data_id',$id)->get();
           $pdf = PDF::loadView('pdf.controlCambio', compact('data_request','type_request','state_change','items'));
           return $pdf->download('Control_cambio.pdf');
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

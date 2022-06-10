<?php

namespace App\Http\Controllers;

use App\Cambio_estado;
use App\Cambio_estado_control_cambio_data;
use App\Control_cambio_data;
use App\Item_control_cambio;
use App\Tipo_documento;
use App\Tipo_solicitud_control_cambio;
use App\Tipo_solicitud_control_cambio_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControlCambioFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetTipoDocumentos()
    {
        $doc = Tipo_documento::get();
        return $doc;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetTiposolicitud()
    {
        $data = Tipo_solicitud_control_cambio::get();
        return $data;
    }

    public function GetsolcitudControlCambio()
    {
        $data = Control_cambio_data::with('user', 'tipo_documento')->get();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function GetCambioEstado()
    {
        $data = Cambio_estado::get();
        return $data;
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
    public function PostControlCambio(Request $request)
    {

        $document_control_cambio                                  = new Control_cambio_data;
        $document_control_cambio->nombre_proyecto                 = $request->nombre_proyecto;
        $document_control_cambio->estado_control_cambio_id        = $request->estado_control_cambio_id;
        $document_control_cambio->tipo_documento_id               = 4;
        $document_control_cambio->pep_proyecto                    = $request->pep_proyecto;
        $document_control_cambio->nombre_cliente                  = $request->cliente_cambio;
        $document_control_cambio->nro_control_cambio              = $request->nro_control_cambio;
        $document_control_cambio->autor                           = $request->autor_control_cambio;
        $document_control_cambio->area_departamento               = $request->area_depa_control_cambio;
        $document_control_cambio->lugar_trabajo_jp                = $request->lugar_trabajo_jp;
        $document_control_cambio->direccion_mail                  = $request->email_control_cambio_solicitante;
        $document_control_cambio->alcance                         = $request->alcance_control_cambio;
        $document_control_cambio->nueva_fecha_termino             = $request->nueva_fecha_termino;
        $document_control_cambio->fecha_termino_anterior          = $request->fecha_termino_anterior;
        $document_control_cambio->fecha_paso_produccion           = $request->fecha_paso_produccion;
        $document_control_cambio->total_dias_desvio               = $request->total_dias_desvio;
        $document_control_cambio->justificacion__extension_plazo = $request->justificacion_extension_plazo;
        $document_control_cambio->justificacion_capex              = $request->justificacion_aumento_capex;
        $document_control_cambio->cusa_raiz                       = $request->causa_raiz;
        $document_control_cambio->user_id                         = Auth::user()->id;

        $document_control_cambio->save();

        $array_tipo = explode(",", $request->list_tipo_documento);
        foreach ($array_tipo as $tipo) {
            $tipo_solicitud                                   = new Tipo_solicitud_control_cambio_data;
            $tipo_solicitud->control_cambio_data_id           = $document_control_cambio->id;
            $tipo_solicitud->tipo_solicitud_control_cambio_id = $tipo;
            $tipo_solicitud->save();

        }

        if (empty($request->cambio_estado_id)) {

        } else {
            $array_cambio_estado = explode(",", $request->cambio_estado_id);

            foreach ($array_cambio_estado as $estado) {
                $cambio_estado                         = new Cambio_estado_control_cambio_data;
                $cambio_estado->control_cambio_data_id = $document_control_cambio->id;
                $cambio_estado->cambio_estado_id       = $estado;
                $cambio_estado->save();

            }
        }

        $items = json_decode($request->item_solicitados);

        foreach ($items as $item) {
            $items                         = new Item_control_cambio;
            $items->control_cambio_data_id = $document_control_cambio->id;
            $items->item                   = $item->item;
            $items->monto                  = $item->item_costo;
            $items->save();
        }

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

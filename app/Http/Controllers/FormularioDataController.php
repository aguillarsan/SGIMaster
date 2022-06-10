<?php

namespace App\Http\Controllers;

use App\Data;
use App\TempData;
use Illuminate\Http\Request;

class FormularioDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('formulario.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listData()
    {

        $temp_data = TempData::get();
        return view('formulario.list', compact('temp_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data                                      = new TempData;
        $data->incidencia                          = $request->incidencia;
        $data->condicion                           = $request->condicion;
        $data->mbo_n1_revisado                     = $request->mbo_n1_revisado;
        $data->mbo_n2_revisado                     = $request->mbo_n2_revisado;
        $data->nombre_primer_revisor               = $request->nombre_primer_revisor;
        $data->revision_aplica                     = $request->revision_aplica;
        $data->comentario_revison                  = $request->comentario_revisión;
        $data->nombre_segundo_revisor              = $request->nombre_segundo_revisor;
        $data->segundo_revisor_acepta_incidencia   = $request->segundo_revisor_acepta_incidencia;
        $data->segundo_revisor_aplica              = $request->segundo_revisor_aplica;
        $data->duracion_revisada                   = $request->duracion_revisada;
        $data->segundo_revisor_comentario_revision = $request->comentario_segundo_revisor_revision;
        $data->fecha_conclusion                    = $request->fecha_conclusion;
        $data->comentario_cgleiva                  = null;
        $data->conclusion_cgleiva                  = null;
        $data->save();
        return redirect('/form-data-mbo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validateData(Request $request)
    {
        $tem_data                                  = TempData::find($request->id_solicitud);
        $data                                      = new Data;
        $data->incidencia                          = $tem_data->incidencia;
        $data->condicion                           = $tem_data->condicion;
        $data->mbo_n1_revisado                     = $tem_data->mbo_n1_revisado;
        $data->mbo_n2_revisado                     = $tem_data->mbo_n2_revisado;
        $data->nombre_primer_revisor               = $tem_data->nombre_primer_revisor;
        $data->revision_aplica                     = $tem_data->revision_aplica;
        $data->comentario_revison                  = $tem_data->comentario_revison;
        $data->nombre_segundo_revisor              = $tem_data->nombre_segundo_revisor;
        $data->segundo_revisor_acepta_incidencia   = $tem_data->segundo_revisor_acepta_incidencia;
        $data->segundo_revisor_aplica              = $tem_data->segundo_revisor_aplica;
        $data->duracion_revisada                   = $tem_data->duracion_revisada;
        $data->segundo_revisor_comentario_revision = $tem_data->segundo_revisor_comentario_revision;
        $data->fecha_conclusion                    = $tem_data->fecha_conclusion;
        $data->comentario_cgleiva                  = $request->comentario_cleiva;
        $data->conclusion_cgleiva                  = $request->conclusion_cgleiva;
        $data->save();

        $tem_data->delete();

         return redirect('/list-data-mbo');

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

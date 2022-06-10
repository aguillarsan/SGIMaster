<?php

namespace App\Http\Controllers\Sgc;

use App\Http\Controllers\Controller;
use App\SolicitudSgc;
use Illuminate\Http\Request;

class ReporteAqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reporteAq()
    {
        $solicitud = SolicitudSgc::buscar()->with([
            'user'      => function ($query) {
                $query->select('id', 'name', 'apellido');
            },
            'site'      => function ($query) {
                $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id');
            },

            'subestado' => function ($query) {
                $query->select('id', 'subestado');
            },
            'proveedor' => function ($query) {
                $query->select('id', 'PROVEEDOR', 'RUT_PROVEEDOR');
            },

        ])
            ->orderBy('id', 'DESC')
            ->get(['id', 'user_id', 'site_id', 'subestado_id', 'proveedor_id', 'oc', 'informefinal', 'guiadespacho', 'boleta']);

        return $solicitud;
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

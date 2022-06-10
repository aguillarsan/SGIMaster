<?php

namespace App\Http\Controllers;

use App\FlujoTrabajo;
use App\Motivo_Trabajos_ing;
use App\Pm_interno;
use App\Pm_proyecto;
use App\Responsable_pago;
use App\Solicitante;
use App\TipoEquipamiento;
use App\TipoIdentificacionTrabajo;
use App\TipoServicio;
use App\TipoTrabajoIng;
use App\User;
use Illuminate\Http\Request;

class DataformIng extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getDataFormIng()
    {
        $flujos                      = FlujoTrabajo::get(['id', 'nombre_flujo']);
        $tipo_trabajo                = TipoTrabajoIng::get(['id', 'nombre_trabajo_ingenieria']);
        $tipo_identificacion_trabajo = TipoIdentificacionTrabajo::get();
        $motivo_trabajo              = Motivo_Trabajos_ing::get(['id', 'motivo']);
        $responsable_pago            = Responsable_pago::get();
        $data                        = [
            'flujos'                      => $flujos,
            'tipo_trabajo'                => $tipo_trabajo,
            'tipo_identificacion_trabajo' => $tipo_identificacion_trabajo,
            'motivo_trabajo'              => $motivo_trabajo,
            'responsable_pago'            => $responsable_pago,
        ];

        return $data;

    }
    public function FlujoTrabajoIng()
    {
        $flujos = \Cache::remember('flujos', 3600, function () {
            return FlujoTrabajo::get(['id', 'nombre_flujo']);
        });

        return $flujos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetTipoTrabajoIng()
    {
        $tipo = TipoTrabajoIng::get(['id', 'nombre_trabajo_ingenieria']);
        return $tipo;
    }
    public function GetTipoIdentificacionTrabajo()
    {
        $tipo = TipoIdentificacionTrabajo::get();
        return $tipo;
    }
    public function GetTipoModoTrabajo($id)
    {
        if ($id == 1) {
            $data = TipoEquipamiento::get(['id', 'nombre_equipamiento']);
            return $data;
        } else {
            if ($id == 2) {
                $data = TipoServicio::get(['id', 'nombre_servicio']);
                return $data;
            }
        }
    }
    public function GetMotivosTrabajosIng()
    {
        $motivo = Motivo_Trabajos_ing::get(['id', 'motivo']);
        return $motivo;
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
    public function GetInteresados()
    {
        $interesados = User::where('area_id', 2)->where('estado', 1)->get(['name', 'apellido', 'id']);
        return $interesados;
    }

    public function GetResponsable()
    {
        $data = Responsable_pago::get();
        return $data;
    }
    public function GetSolicitante(Request $request)
    {
        $data = Solicitante::where('estado', 1)->where('nombre_completo', 'like', "%" . $request->nombre . "%")->get(['id', 'nombre_completo']);
        return $data;
    }
    public function GetPmProyecto(Request $request)
    {
        $data = Pm_proyecto::where('estado', 1)->where('nombre_completo', 'like', "%" . $request->nombre . "%")->get(['id', 'nombre_completo']);
        return $data;
    }
    public function GetPmInterno(Request $request)
    {
        $data = Pm_interno::where('estado', 1)->where('nombre_completo', 'like', "%" . $request->nombre . "%")->get(['id', 'nombre_completo']);
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

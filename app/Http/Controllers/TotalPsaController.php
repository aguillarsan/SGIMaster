<?php

namespace App\Http\Controllers;

use App\Cargo_user;
use App\crm_user;
use App\PsaSolicitud;
use App\role_user;
use App\Zona_user;
use App\Rol_user_psa;
use App\Permission_role_psa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TotalPsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetTotalValidacion()
    {

        $rol = Rol_user_psa::where('user_id', Auth::user()->id)->select('role_id')->get();
        $crm = crm_user::where('user_id', Auth::user()->id)->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }

        foreach ($crm as $c) {
            $crm_id = $c->crm_id;
        }

        if ($RoleId == 1 || $RoleId == 2) {
            $validacion  = PsaSolicitud::buscar()->select('id')->where('estado_id', 1)->count();
            $gestion     = PsaSolicitud::buscar()->select('id')->where('estado_id', 2)->count();
            $despacho    = PsaSolicitud::buscar()->select('id')->where('estado_id', 3)->count();
            $instalacion = PsaSolicitud::buscar()->select('id')->where('estado_id', 4)->count();
            $finalizada  = PsaSolicitud::buscar()->select('id')->where('estado_id', 5)->count();
            $data        = [
                'validacion'  => $validacion,
                'gestion'     => $gestion,
                'despacho'    => $despacho,
                'instalacion' => $instalacion,
                'finalizada'  => $finalizada,

            ];

            return $data;
        }

        if ($RoleId == 3) {

            $validacion  = PsaSolicitud::buscar()->select('id')->where('estado_id', 1)->where('crm_id', $crm_id)->count();
            $gestion     = PsaSolicitud::buscar()->select('id')->where('estado_id', 2)->where('crm_id', $crm_id)->count();
            $despacho    = PsaSolicitud::buscar()->select('id')->where('estado_id', 3)->where('crm_id', $crm_id)->count();
            $instalacion = PsaSolicitud::buscar()->select('id')->where('estado_id', 4)->where('crm_id', $crm_id)->count();
            $finalizada  = PsaSolicitud::buscar()->select('id')->where('estado_id', 5)->where('crm_id', $crm_id)->count();
            $data        = [
                'validacion'  => $validacion,
                'gestion'     => $gestion,
                'despacho'    => $despacho,
                'instalacion' => $instalacion,
                'finalizada'  => $finalizada,

            ];
            return $data;
        }
        if (floatval(Auth::user()->id) === floatval(11)) {

            $validacion  = PsaSolicitud::buscar()->select('id')->filterF()->where('estado_id', 1)()->count();
            $gestion     = PsaSolicitud::buscar()->select('id')->filterF()->where('estado_id', 2)()->count();
            $despacho    = PsaSolicitud::buscar()->select('id')->filterF()->where('estado_id', 3)()->count();
            $instalacion = PsaSolicitud::buscar()->select('id')->filterF()->where('estado_id', 4)()->count();
            $finalizada  = PsaSolicitud::buscar()->select('id')->filterF()->where('estado_id', 5)()->count();

            $data = [
                'validacion'  => $validacion,
                'gestion'     => $gestion,
                'despacho'    => $despacho,
                'instalacion' => $instalacion,
                'finalizada'  => $finalizada,

            ];
            return $data;
        }

        if (floatval($RoleId) === floatval(5)) {
            $cargosCount = Cargo_user::where('id_user', Auth::user()->id)->count();
            if ($cargosCount != 0) {
                $cargos = Cargo_user::where('id_user', Auth::user()->id)->get();
                foreach ($cargos as $cargo) {
                    $cargo_id = $cargo->id_cargo;
                }
                if (floatval($cargo_id) === floatval(2)) {
                    $validacion  = PsaSolicitud::buscar()->select('id')->where('estado_id', 1)->where('crm_id', $crm_id)->count();
                    $gestion     = PsaSolicitud::buscar()->select('id')->where('estado_id', 2)->where('crm_id', $crm_id)->count();
                    $despacho    = PsaSolicitud::buscar()->select('id')->where('estado_id', 3)->where('crm_id', $crm_id)->count();
                    $instalacion = PsaSolicitud::buscar()->select('id')->where('estado_id', 4)->where('crm_id', $crm_id)->count();
                    $finalizada  = PsaSolicitud::buscar()->select('id')->where('estado_id', 5)->where('crm_id', $crm_id)->count();
                    $data        = [
                        'validacion'  => $validacion,
                        'gestion'     => $gestion,
                        'despacho'    => $despacho,
                        'instalacion' => $instalacion,
                        'finalizada'  => $finalizada,

                    ];

                    return $data;
                }
            }
        }
        if (floatval($RoleId) === floatval(4)) {
            $validacion  = PsaSolicitud::buscar()->select('id')->where('estado_id', 1)->count();
            $gestion     = PsaSolicitud::buscar()->select('id')->where('estado_id', 2)->count();
            $despacho    = PsaSolicitud::buscar()->select('id')->where('estado_id', 3)->count();
            $instalacion = PsaSolicitud::buscar()->select('id')->where('estado_id', 4)->count();
            $finalizada  = PsaSolicitud::buscar()->select('id')->where('estado_id', 5)->count();
            $data        = [
                'validacion'  => $validacion,
                'gestion'     => $gestion,
                'despacho'    => $despacho,
                'instalacion' => $instalacion,
                'finalizada'  => $finalizada,

            ];

            return $data;
        }

        $cargosCount = Cargo_user::where('id_user', Auth::user()->id)->count();
        if ($cargosCount != 0) {
            $cargos = Cargo_user::where('id_user', Auth::user()->id)->get();
            foreach ($cargos as $cargo) {
                $cargo_id = $cargo->id_cargo;
            }

            if (floatval($cargo_id) === floatval(1)) {
                $zonaUsers = Zona_user::where('user_id', Auth::user()->id)->get();
                foreach ($zonaUsers as $z) {
                    $zona_id = $z->zona_id;
                }

                if ($zona_id != null) {
                    $validacion  = PsaSolicitud::buscar()->select('id')->where('estado_id', 1)->where('zona_id', $zona_id)->count();
                    $gestion     = PsaSolicitud::buscar()->select('id')->where('estado_id', 2)->where('zona_id', $zona_id)->count();
                    $despacho    = PsaSolicitud::buscar()->select('id')->where('estado_id', 3)->where('zona_id', $zona_id)->count();
                    $instalacion = PsaSolicitud::buscar()->select('id')->where('estado_id', 4)->where('zona_id', $zona_id)->count();
                    $finalizada  = PsaSolicitud::buscar()->select('id')->where('estado_id', 5)->where('zona_id', $zona_id)->count();
                    $data        = [
                        'validacion'  => $validacion,
                        'gestion'     => $gestion,
                        'despacho'    => $despacho,
                        'instalacion' => $instalacion,
                        'finalizada'  => $finalizada,

                    ];
                    return $data;
                }
            }
        }
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

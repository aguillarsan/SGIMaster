<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Cargo_user;
use App\crm_user;
use App\role_user;
use App\SolicitudSgc;
use App\Ticket;
use App\Zona_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TotalController extends Controller
{

    public function GetTotalRechazadas()
    {
        $id = Auth::user()->id;

        $rol = role_user::where('user_id', $id)->select('role_id')->get(['role_id']);

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }
        /////////////

        //BUSQUEDA DEL CRM

        $crm = crm_user::where('user_id', Auth::user()->id)->get(['crm_id']);

        foreach ($crm as $c) {
            $crm_id = $c->crm_id;
        }

        ///////

        if ($RoleId == 5) {

            $total = Ticket::buscar()->where('subestado_id', 1)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->count(['id']);

            return $total;
        }

        if ($id == 11) {

            $total = Ticket::buscar()->userRechazada()->orderBy('id', 'desc')->count(['id']);

            return $total;
        }
        if ($crm_id == 7 || $RoleId == 16) {

            $total = Ticket::buscar()->where('subestado_id', 1)->orderBy('id', 'desc')->count(['id']);

            return $total;
        } else {
            if ($RoleId == 12) {

                $total = Ticket::buscar()->where('subestado_id', 1)->where('user_id', $id)->orderBy('id', 'desc')->count(['id']);

                return $total;
            } else {

                $total = Ticket::buscar()->where('subestado_id', 1)->orderBy('id', 'desc')->count(['id']);

                return $total;
            }
        }
    }
    public function backlog(Request $request)
    {

        $rol = role_user::where('user_id', Auth::user()->id)->select('role_id')->get(['role_id']);

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }
        /////////////

        //BUSQUEDA DEL CRM

        $crm = crm_user::where('user_id', Auth::user()->id)->get();

        foreach ($crm as $c) {
            $crm_id = $c->crm_id;
        }
        if ($RoleId == 29) {
            $data = [
                'backlog'    => Ticket::buscar()->where('estado_id', 1)->count(['id']),
                'curso'      => Ticket::buscar()->where('estado_id', 2)->count(['id']),
                'validacion' => Ticket::buscar()->where('estado_id', 3)->count(['id']),
                'finalizada' => Ticket::buscar()->where('estado_id', 4)->count(['id']),
            ];
            return $data;
        }

        if ($RoleId == 34) {
            $data = [
                'backlog'    => Ticket::buscar()->where('estado_id', 1)->whereIn('user_id', [443,444,445])->count(['id']),
                'curso'      => Ticket::buscar()->where('estado_id', 2)->whereIn('user_id', [443,444,445])->count(['id']),
                'validacion' => Ticket::buscar()->where('estado_id', 3)->whereIn('user_id', [443,444,445])->count(['id']),
                'finalizada' => Ticket::buscar()->where('estado_id', 4)->whereIn('user_id', [443,444,445])->count(['id']),
            ];
            return $data;
        }

        if ($RoleId == 32) {

            $data = [
                'backlog'    => Ticket::buscar()->where('estado_id', 1)->whereIn('user_id', [21,268,267])->where('tipo_motivo_id', '!=', 3)->count(['id']),

                'curso'      => Ticket::buscar()->where('estado_id', 2)->whereIn('user_id', [21,268,267])->where('tipo_motivo_id', '!=', 3)->count(['id']),

                'validacion' => Ticket::buscar()->where('estado_id', 3)->whereIn('user_id', [21,268,267])->where('tipo_motivo_id', '!=', 3)->count(['id']),

                'finalizada' => Ticket::buscar()->where('estado_id', 4)->whereIn('user_id', [21,268,267])->where('tipo_motivo_id', '!=', 3)->count(['id']),

            ];
            return $data;
        }
        if ($RoleId == 33) {
            $data = [
                'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('crm_id',    $crm_id )->count(['id']),
                'curso'      => Ticket::buscar()->where('estado_id', 2)->where('crm_id',    $crm_id )->count(['id']),
                'validacion' => Ticket::buscar()->where('estado_id', 3)->where('crm_id',    $crm_id )->count(['id']),
                'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('crm_id',    $crm_id )->count(['id']),

            ];

            return $data;
        }

        if (floatval(Auth::user()->id) === floatval(12)) {
            if (floatval($request->motivoSelectIng) === floatval(7)) {

                $data = [
                    'backlog'    => Ticket::filtroCrm()->buscar()->where('estado_id', 1)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                    'curso'      => Ticket::filtroCrm()->buscar()->where('estado_id', 2)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                    'validacion' => Ticket::filtroCrm()->buscar()->where('estado_id', 3)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                    'finalizada' => Ticket::filtroCrm()->buscar()->where('estado_id', 4)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                ];
                return $data;
            } else {
                if (floatval($request->motivoSelectIng) === floatval(8)) {

                    $data = [
                        'backlog'    => Ticket::filtroCrm()->buscar()->where('estado_id', 1)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                        'curso'      => Ticket::filtroCrm()->buscar()->where('estado_id', 2)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                        'validacion' => Ticket::filtroCrm()->buscar()->where('estado_id', 3)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                        'finalizada' => Ticket::filtroCrm()->buscar()->where('estado_id', 4)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                    ];
                    return $data;
                } else {
                    if (floatval($request->motivoSelectIng) === floatval(11)) {

                        $data = [
                            'backlog'    => Ticket::filtroCrm()->buscar()->where('estado_id', 1)->where('tipo_motivo_id', 8)->count(['id']),
                            'curso'      => Ticket::filtroCrm()->buscar()->where('estado_id', 2)->where('tipo_motivo_id', 8)->count(['id']),
                            'validacion' => Ticket::filtroCrm()->buscar()->where('estado_id', 3)->where('tipo_motivo_id', 8)->count(['id']),
                            'finalizada' => Ticket::filtroCrm()->buscar()->where('estado_id', 4)->where('tipo_motivo_id', 8)->count(['id']),
                        ];
                        return $data;
                    } else {
                        if (floatval($request->motivoSelectIng) === floatval(12)) {

                            $data = [
                                'backlog'    => Ticket::filtroCrm()->buscar()->where('estado_id', 1)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                'curso'      => Ticket::filtroCrm()->buscar()->where('estado_id', 2)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                'validacion' => Ticket::filtroCrm()->buscar()->where('estado_id', 3)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                'finalizada' => Ticket::filtroCrm()->buscar()->where('estado_id', 4)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                            ];
                            return $data;
                        } else {

                            $data = [
                                'backlog'    => Ticket::filtroCrm()->buscar()->where('estado_id', 1)->count(['id']),
                                'curso'      => Ticket::filtroCrm()->buscar()->where('estado_id', 2)->count(['id']),
                                'validacion' => Ticket::filtroCrm()->buscar()->where('estado_id', 3)->count(['id']),
                                'finalizada' => Ticket::filtroCrm()->buscar()->where('estado_id', 4)->count(['id']),
                            ];
                            return $data;
                        }
                    }
                }
            }
        } else {
            if (floatval(Auth::user()->id) === floatval(260)) {
                if ($request->motivoSelectIng == 7) {

                    $data = [
                        'backlog'    => Ticket::buscar()->where('estado_id', 1)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                        'curso'      => Ticket::buscar()->where('estado_id', 2)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                        'validacion' => Ticket::buscar()->where('estado_id', 3)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                        'finalizada' => Ticket::buscar()->where('estado_id', 4)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                    ];
                    return $data;
                } else {
                    if ($request->motivoSelectIng == 8) {

                        $data = [
                            'backlog'    => Ticket::buscar()->where('estado_id', 1)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', '!=', 3)->count(['id']),
                            'curso'      => Ticket::buscar()->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', '!=', 3)->count(['id']),
                            'validacion' => Ticket::buscar()->where('estado_id', 3)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', '!=', 3)->count(['id']),
                            'finalizada' => Ticket::buscar()->where('estado_id', 4)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', '!=', 3)->count(['id']),
                        ];
                        return $data;
                    } else {
                        if ($request->motivoSelectIng == 11) {

                            $data = [
                                'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('crm_id', '!=', 1)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', 8)->count(['id']),
                                'curso'      => Ticket::buscar()->where('estado_id', 2)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', 8)->count(['id']),
                                'validacion' => Ticket::buscar()->where('estado_id', 3)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', 8)->count(['id']),
                                'finalizada' => Ticket::buscar()->where('estado_id', 4)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', 8)->count(['id']),
                            ];
                            return $data;
                        } else {
                            if (floatval($request->motivoSelectIng) === floatval(12)) {

                                $data = [
                                    'backlog'    => Ticket::buscar()->where('estado_id', 1)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                    'curso'      => Ticket::buscar()->where('estado_id', 2)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                    'validacion' => Ticket::buscar()->where('estado_id', 3)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                    'finalizada' => Ticket::buscar()->where('estado_id', 4)->whereIn('crm_id', [1, 2])->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                ];
                                return $data;
                            } else {

                                $data = [
                                    'backlog'    => Ticket::buscar()->where('estado_id', 1)->whereIn('crm_id', [1, 2])->count(['id']),
                                    'curso'      => Ticket::buscar()->where('estado_id', 2)->whereIn('crm_id', [1, 2])->count(['id']),
                                    'validacion' => Ticket::buscar()->where('estado_id', 3)->whereIn('crm_id', [1, 2])->count(['id']),
                                    'finalizada' => Ticket::buscar()->where('estado_id', 4)->whereIn('crm_id', [1, 2])->count(['id']),
                                ];
                                return $data;
                            }
                        }
                    }
                }
            } else {
                if (floatval(Auth::user()->id) === floatval(21)) {
                    if ($request->motivoSelectIng == 7) {

                        $data = [
                            'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('especialista_id', 21)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                            'curso'      => Ticket::buscar()->where('estado_id', 2)->where('especialista_id', 21)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                            'validacion' => Ticket::buscar()->where('estado_id', 3)->where('especialista_id', 21)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                            'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('especialista_id', 21)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                        ];
                        return $data;
                    } else {
                        if ($request->motivoSelectIng == 8) {

                            $data = [
                                'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('especialista_id', 21)->where('tipo_motivo_id', '!=', 3)->count(['id']),

                                'curso'      => Ticket::buscar()->where('estado_id', 2)->where('especialista_id', 21)->where('tipo_motivo_id', '!=', 3)->count(['id']),

                                'validacion' => Ticket::buscar()->where('estado_id', 3)->where('especialista_id', 21)->where('tipo_motivo_id', '!=', 3)->count(['id']),

                                'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('especialista_id', 21)->where('tipo_motivo_id', '!=', 3)->count(['id']),

                            ];
                            return $data;
                        } else {
                            if ($request->motivoSelectIng == 11) {

                                $data = [
                                    'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('especialista_id', 21)->where('tipo_motivo_id', 8)->count(['id']),

                                    'curso'      => Ticket::buscar()->where('estado_id', 2)->where('especialista_id', 21)->where('tipo_motivo_id', 8)->count(['id']),

                                    'validacion' => Ticket::buscar()->where('estado_id', 3)->where('especialista_id', 21)->where('tipo_motivo_id', 8)->count(['id']),

                                    'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('especialista_id', 21)->where('tipo_motivo_id', 8)->count(['id']),

                                ];
                                return $data;
                            } else {
                                if (floatval($request->motivoSelectIng) === floatval(12)) {

                                    $data = [
                                        'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('especialista_id', 21)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),

                                        'curso'      => Ticket::buscar()->where('estado_id', 2)->where('especialista_id', 21)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),

                                        'validacion' => Ticket::buscar()->where('estado_id', 3)->where('especialista_id', 21)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),

                                        'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('especialista_id', 21)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                    ];
                                    return $data;
                                } else {
                                    $data = [
                                        'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('especialista_id', 21)->count(['id']),
                                        'curso'      => Ticket::buscar()->where('estado_id', 2)->where('especialista_id', 21)->count(['id']),
                                        'validacion' => Ticket::buscar()->where('estado_id', 3)->where('especialista_id', 21)->count(['id']),
                                        'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('especialista_id', 21)->count(['id']),
                                    ];
                                    return $data;
                                }
                            }
                        }
                    }
                } else {
                    if (floatval(Auth::user()->id) === floatval(11)) {

                        if ($request->motivoSelectIng == 7) {

                            $data = [
                                'backlog'    => Ticket::buscar()->userCreada()->where('estado_id', 1)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                                'curso'      => Ticket::buscar()->userCreada()->where('estado_id', 2)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                                'validacion' => Ticket::buscar()->userCreada()->where('estado_id', 3)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                                'finalizada' => Ticket::buscar()->userCreada()->where('estado_id', 4)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                            ];
                            return $data;
                        } else {
                            if ($request->motivoSelectIng == 8) {

                                $data = [
                                    'backlog'    => Ticket::buscar()->userCreada()->where('estado_id', 1)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                                    'curso'      => Ticket::buscar()->userCreada()->where('estado_id', 2)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                                    'validacion' => Ticket::buscar()->userCreada()->where('estado_id', 3)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                                    'finalizada' => Ticket::buscar()->userCreada()->where('estado_id', 4)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                                ];
                                return $data;
                            } else {
                                if (floatval($request->motivoSelectIng) === floatval(12)) {

                                    $data = [
                                        'backlog'    => Ticket::buscar()->userCreada()->where('estado_id', 1)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                        'curso'      => Ticket::buscar()->userCreada()->where('estado_id', 2)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                        'validacion' => Ticket::buscar()->userCreada()->where('estado_id', 3)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                        'finalizada' => Ticket::buscar()->userCreada()->where('estado_id', 4)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                    ];
                                    return $data;
                                } else {

                                    $data = [
                                        'backlog'    => Ticket::buscar()->userCreada()->where('estado_id', 1)->count(['id']),
                                        'curso'      => Ticket::buscar()->userCreada()->where('estado_id', 2)->count(['id']),
                                        'validacion' => Ticket::buscar()->userCreada()->where('estado_id', 3)->count(['id']),
                                        'finalizada' => Ticket::buscar()->userCreada()->where('estado_id', 4)->count(['id']),
                                    ];
                                    return $data;
                                }
                            }
                        }
                    } else {
                        if (floatval(Auth::user()->id) === floatval(14)) {
                            if ($request->motivoSelectIng == 7) {

                                $data = [
                                    'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('especialista_id', 14)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                                    'curso'      => Ticket::buscar()->where('estado_id', 2)->where('especialista_id', 14)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                                    'validacion' => Ticket::buscar()->where('estado_id', 3)->where('especialista_id', 14)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                                    'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('especialista_id', 14)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                                ];
                                return $data;
                            } else {
                                if ($request->motivoSelectIng == 8) {

                                    $data = [
                                        'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('especialista_id', 14)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                                        'curso'      => Ticket::buscar()->where('estado_id', 2)->where('especialista_id', 14)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                                        'validacion' => Ticket::buscar()->where('estado_id', 3)->where('especialista_id', 14)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                                        'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('especialista_id', 14)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                                    ];
                                    return $data;
                                } else {
                                    if ($request->motivoSelectIng == 11) {

                                        $data = [
                                            'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('especialista_id', 14)->where('tipo_motivo_id', 8)->count(['id']),
                                            'curso'      => Ticket::buscar()->where('estado_id', 2)->where('especialista_id', 14)->where('tipo_motivo_id', 8)->count(['id']),
                                            'validacion' => Ticket::buscar()->where('estado_id', 3)->where('especialista_id', 14)->where('tipo_motivo_id', 8)->count(['id']),
                                            'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('especialista_id', 14)->where('tipo_motivo_id', 8)->count(['id']),
                                        ];
                                        return $data;
                                    } else {
                                        if (floatval($request->motivoSelectIng) === floatval(12)) {

                                            $data = [
                                                'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('especialista_id', 14)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                                'curso'      => Ticket::buscar()->where('estado_id', 2)->where('especialista_id', 14)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                                'validacion' => Ticket::buscar()->where('estado_id', 3)->where('especialista_id', 14)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                                'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('especialista_id', 14)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                            ];
                                            return $data;
                                        } else {

                                            $data = [
                                                'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('especialista_id', 14)->count(['id']),
                                                'curso'      => Ticket::buscar()->where('estado_id', 2)->where('especialista_id', 14)->count(['id']),
                                                'validacion' => Ticket::buscar()->where('estado_id', 3)->where('especialista_id', 14)->count(['id']),
                                                'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('especialista_id', 14)->count(['id']),
                                            ];
                                            return $data;
                                        }
                                    }
                                }
                            }
                        } else {
                            if (floatval($RoleId) === floatval(5)) {

                                $cargo = Cargo_user::where('id_user', Auth::user()->id)->count();
                                if ($cargo == 0 || $cargo == null) {
                                    $cargo  = 0;
                                    $estado = 1;
                                } else {
                                    $cargo = Cargo_user::where('id_user', Auth::user()->id)->get();

                                    foreach ($cargo as $c) {
                                        $cargo_id = $c->id_cargo;
                                    }
                                }
                                if ($cargo_id == 1) {
                                    $zonaUser = Zona_user::where('user_id', Auth::user()->id)->get();
                                    foreach ($zonaUser as $z) {
                                        $zona = $z->zona_id;
                                    }

                                    $data = [
                                        'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('zona_id', $zona)->count(['id']),
                                        'curso'      => Ticket::buscar()->where('estado_id', 2)->where('zona_id', $zona)->count(['id']),
                                        'validacion' => Ticket::buscar()->where('estado_id', 3)->where('zona_id', $zona)->count(['id']),
                                        'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('zona_id', $zona)->count(['id']),
                                    ];
                                    return $data;
                                } else {
                                    if ($request->motivoSelectIng == 7) {

                                        $data = [
                                            'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                                            'curso'      => Ticket::buscar()->where('estado_id', 2)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                                            'validacion' => Ticket::buscar()->where('estado_id', 3)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                                            'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->count(['id']),
                                        ];
                                        return $data;
                                    } else {
                                        if ($request->motivoSelectIng == 8) {

                                            $data = [
                                                'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('crm_id', $crm_id)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                                                'curso'      => Ticket::buscar()->where('estado_id', 2)->where('crm_id', $crm_id)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                                                'validacion' => Ticket::buscar()->where('estado_id', 3)->where('crm_id', $crm_id)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                                                'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('crm_id', $crm_id)->where('tipo_motivo_id', '!=', 3)->count(['id']),
                                            ];
                                            return $data;
                                        } else {
                                            if ($request->motivoSelectIng == 11) {

                                                $data = [
                                                    'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('crm_id', $crm_id)->where('tipo_motivo_id', 8)->count(['id']),
                                                    'curso'      => Ticket::buscar()->where('estado_id', 2)->where('crm_id', $crm_id)->where('tipo_motivo_id', 8)->count(['id']),
                                                    'validacion' => Ticket::buscar()->where('estado_id', 3)->where('crm_id', $crm_id)->where('tipo_motivo_id', 8)->count(['id']),
                                                    'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('crm_id', $crm_id)->where('tipo_motivo_id', 8)->count(['id']),
                                                ];
                                                return $data;
                                            } else {
                                                if (floatval($request->motivoSelectIng) === floatval(12)) {

                                                    $data = [
                                                        'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                                        'curso'      => Ticket::buscar()->where('estado_id', 2)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                                        'validacion' => Ticket::buscar()->where('estado_id', 3)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                                        'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                                    ];
                                                    return $data;
                                                } else {
                                                    $data = [
                                                        'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('crm_id', $crm_id)->count(['id']),
                                                        'curso'      => Ticket::buscar()->where('estado_id', 2)->where('crm_id', $crm_id)->count(['id']),
                                                        'validacion' => Ticket::buscar()->where('estado_id', 3)->where('crm_id', $crm_id)->count(['id']),
                                                        'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('crm_id', $crm_id)->count(['id']),
                                                    ];
                                                    return $data;
                                                }
                                            }
                                        }
                                    }
                                }
                            } else {
                                if (floatval($crm_id) === floatval(7) || floatval($RoleId) === floatval(16)) {
                                    if (floatval($request->motivoSelectIng) === floatval(7)) {

                                        $data = [
                                            'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->select('id')->count(['id']),
                                            'curso'      => Ticket::buscar()->where('estado_id', 2)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->select('id')->count(['id']),
                                            'validacion' => Ticket::buscar()->where('estado_id', 3)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->select('id')->count(['id']),
                                            'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->select('id')->count(['id']),
                                        ];
                                        return $data;
                                    } else {
                                        if (floatval($request->motivoSelectIng) === floatval(8)) {

                                            $data = [
                                                'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('tipo_motivo_id', '!=', 3)->select('id')->count(['id']),
                                                'curso'      => Ticket::buscar()->where('estado_id', 2)->where('tipo_motivo_id', '!=', 3)->select('id')->count(['id']),
                                                'validacion' => Ticket::buscar()->where('estado_id', 3)->where('tipo_motivo_id', '!=', 3)->select('id')->count(['id']),
                                                'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('tipo_motivo_id', '!=', 3)->select('id')->count(['id']),
                                            ];
                                            return $data;
                                        } else {
                                            if (floatval($request->motivoSelectIng) === floatval(11)) {

                                                $data = [
                                                    'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('tipo_motivo_id', 8)->count(['id']),

                                                    'curso'      => Ticket::buscar()->where('estado_id', 2)->where('tipo_motivo_id', 8)->count(['id']),

                                                    'validacion' => Ticket::buscar()->where('estado_id', 3)->where('tipo_motivo_id', 8)->count(['id']),

                                                    'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('tipo_motivo_id', 8)->count(['id']),
                                                ];
                                                return $data;
                                            } else {
                                                if (floatval($request->motivoSelectIng) === floatval(12)) {

                                                    $data = [
                                                        'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),

                                                        'curso'      => Ticket::buscar()->where('estado_id', 2)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),

                                                        'validacion' => Ticket::buscar()->where('estado_id', 3)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),

                                                        'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->count(['id']),
                                                    ];
                                                    return $data;
                                                } else {

                                                    $data = [
                                                        'backlog'    => Ticket::buscar()->where('estado_id', 1)->count(['id']),
                                                        'curso'      => Ticket::buscar()->where('estado_id', 2)->count(['id']),
                                                        'validacion' => Ticket::buscar()->where('estado_id', 3)->count(['id']),
                                                        'finalizada' => Ticket::buscar()->where('estado_id', 4)->count(['id']),
                                                    ];
                                                    return $data;
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    if ($request->motivoSelectIng == 7) {

                                        $data = [
                                            'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->select('id')->count(['id']),
                                            'curso'      => Ticket::buscar()->where('estado_id', 2)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->select('id')->count(['id']),
                                            'validacion' => Ticket::buscar()->where('estado_id', 3)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->select('id')->count(['id']),
                                            'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->select('id')->count(['id']),
                                        ];
                                        return $data;
                                    } else {
                                        if ($request->motivoSelectIng == 8) {

                                            $data = [
                                                'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('crm_id', $crm_id)->where('tipo_motivo_id', '!=', 3)->select('id')->count(['id']),
                                                'curso'      => Ticket::buscar()->where('estado_id', 2)->where('crm_id', $crm_id)->where('tipo_motivo_id', '!=', 3)->select('id')->count(['id']),
                                                'validacion' => Ticket::buscar()->where('estado_id', 3)->where('crm_id', $crm_id)->where('tipo_motivo_id', '!=', 3)->select('id')->count(['id']),
                                                'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('crm_id', $crm_id)->where('tipo_motivo_id', '!=', 3)->select('id')->count(['id']),
                                            ];
                                            return $data;
                                        } else {
                                            if ($request->motivoSelectIng == 11) {

                                                $data = [
                                                    'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('crm_id', $crm_id)->where('tipo_motivo_id', 8)->select('id')->count(['id']),
                                                    'curso'      => Ticket::buscar()->where('estado_id', 2)->where('crm_id', $crm_id)->where('tipo_motivo_id', 8)->select('id')->count(['id']),
                                                    'validacion' => Ticket::buscar()->where('estado_id', 3)->where('crm_id', $crm_id)->where('tipo_motivo_id', 8)->select('id')->count(['id']),
                                                    'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('crm_id', $crm_id)->where('tipo_motivo_id', 8)->select('id')->count(['id']),
                                                ];
                                                return $data;
                                            } else {
                                                if (floatval($request->motivoSelectIng) === floatval(12)) {

                                                    $data = [
                                                        'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->select('id')->count(['id']),
                                                        'curso'      => Ticket::buscar()->where('estado_id', 2)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->select('id')->count(['id']),
                                                        'validacion' => Ticket::buscar()->where('estado_id', 3)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->select('id')->count(['id']),
                                                        'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->select('id')->count(['id']),
                                                    ];
                                                    return $data;
                                                } else {

                                                    $data = [
                                                        'backlog'    => Ticket::buscar()->where('estado_id', 1)->where('crm_id', $crm_id)->select('id')->count(['id']),
                                                        'curso'      => Ticket::buscar()->where('estado_id', 2)->where('crm_id', $crm_id)->select('id')->count(['id']),
                                                        'validacion' => Ticket::buscar()->where('estado_id', 3)->where('crm_id', $crm_id)->select('id')->count(['id']),
                                                        'finalizada' => Ticket::buscar()->where('estado_id', 4)->where('crm_id', $crm_id)->select('id')->count(['id']),
                                                    ];
                                                    return $data;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function TotalTicketsCrm(Request $request)
    {

        $rol = role_user::where('user_id', Auth::user()->id)->select('role_id')->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }

        $crm = crm_user::where('user_id', Auth::user()->id)->get();

        foreach ($crm as $c) {
            $crm_id = $c->crm_id;
        }

        if (Auth::user()->id == 21) {

            $backlog = Ticket::buscar()->filterState()->where('especialista_id', 21)->count(['id']);
            return $backlog;
        }

        if (Auth::user()->id == 14) {

            $backlog = Ticket::buscar()->filterState()->where('especialista_id', 14)->count(['id']);
            return $backlog;
        }

        if (Auth::user()->id == 12) {

            $backlog = Ticket::buscar()->filterState()->where('crm_id', '!=', 1)->where('crm_id', '!=', 2)->where('crm_id', '!=', 5)->where('crm_id', '!=', 6)->count(['id']);
            return $backlog;
        }

        if ($RoleId == 5) {

            $backlog = Ticket::buscar()->filterState()->where('crm_id', $crm_id)->where('user_id', '!=', Auth::user()->id)->count(['id']);
            return $backlog;
        }

        if (Auth::user()->id == 11) {

            $backlog = Ticket::buscar()->filterState()->userCreada()->where('user_id', '!=', Auth::user()->id)->count(['id']);
            return $backlog;
        }

        if ($crm_id == 7 || $RoleId == 16) {

            $backlog = Ticket::buscar()->filterState()->count(['id']);
            return $backlog;
        } else {

            $backlog = Ticket::buscar()->filterState()->where('user_id', '!=', Auth::user()->id)->where('crm_id', $crm_id)->count(['id']);
            return $backlog;
        }
    }

    public function TotalTickets(Request $request)
    {
        $id = Auth::user()->id;

        $rol = role_user::where('user_id', $id)->select('role_id')->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }
        /////////////

        //BUSQUEDA DEL CRM

        $crm = crm_user::where('user_id', Auth::user()->id)->get();

        foreach ($crm as $c) {
            $crm_id = $c->crm_id;
        }

        if ($id == 21) {

            $backlog = Ticket::buscar()->filterState()->where('especialista_id', 21)->count(['id']);
            return $backlog;
        }

        if ($id == 14) {

            $backlog = Ticket::buscar()->filterState()->where('especialista_id', 14)->count(['id']);
            return $backlog;
        }

        if ($id == 12) {

            $backlog = Ticket::buscar()->filterState()->where('crm_id', '!=', 1)->where('crm_id', '!=', 2)->where('crm_id', '!=', 5)->where('crm_id', '!=', 6)->count(['id']);
            return $backlog;
        }

        if ($RoleId == 5) {

            $backlog = Ticket::buscar()->filterState()->where('crm_id', $crm_id)->count(['id']);
            return $backlog;
        }

        if ($id == 11) {

            $backlog = Ticket::buscar()->filterState()->userCreada()->count(['id']);
            return $backlog;
        }

        if ($crm_id == 7 || $RoleId == 16) {

            $backlog = Ticket::buscar()->filterState()->count(['id']);
            return $backlog;
        } else {

            $backlog = Ticket::buscar()->filterState()->where('crm_id', $crm_id)->count(['id']);
            return $backlog;
        }
    }

    public function backlogCrm($crm)
    {

        $rol = role_user::where('user_id', Auth::user()->id)->select('role_id')->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }

        if (Auth::user()->id == 21) {

            $data = [
                'backlog'    => Ticket::where('estado_id', 1)->where('especialista_id', 21)->where('crm_id', $crm)->count(['id']),
                'curso'      => Ticket::where('estado_id', 2)->where('especialista_id', 21)->where('crm_id', $crm)->count(['id']),
                'validacion' => Ticket::where('estado_id', 3)->where('especialista_id', 21)->where('crm_id', $crm)->count(['id']),
                'finalizada' => Ticket::where('estado_id', 4)->where('especialista_id', 21)->where('crm_id', $crm)->count(['id']),
            ];
            return $data;
        }
        if (Auth::user()->id == 14) {

            $data = [
                'backlog'    => Ticket::where('estado_id', 1)->where('especialista_id', 14)->where('crm_id', $crm)->count(['id']),
                'curso'      => Ticket::where('estado_id', 2)->where('especialista_id', 14)->where('crm_id', $crm)->count(['id']),
                'validacion' => Ticket::where('estado_id', 3)->where('especialista_id', 14)->where('crm_id', $crm)->count(['id']),
                'finalizada' => Ticket::where('estado_id', 4)->where('especialista_id', 14)->where('crm_id', $crm)->count(['id']),
            ];
            return $data;
        }
        if ($RoleId == 16) {

            $data = [
                'backlog'    => Ticket::where('estado_id', 1)->where('crm_id', $crm)->count(['id']),
                'curso'      => Ticket::where('estado_id', 2)->where('crm_id', $crm)->count(['id']),
                'validacion' => Ticket::where('estado_id', 3)->where('crm_id', $crm)->count(['id']),
                'finalizada' => Ticket::where('estado_id', 4)->where('crm_id', $crm)->count(['id']),
            ];
            return $data;
        } else {

            $data = [
                'backlog'    => Ticket::where('estado_id', 1)->where('crm_id', $crm)->count(['id']),
                'curso'      => Ticket::where('estado_id', 2)->where('crm_id', $crm)->count(['id']),
                'validacion' => Ticket::where('estado_id', 3)->where('crm_id', $crm)->count(['id']),
                'finalizada' => Ticket::where('estado_id', 4)->where('crm_id', $crm)->count(['id']),
            ];
            return $data;
        }
    }

    public function cursoCrm($crm)
    {
        $id = Auth::user()->id;

        $rol = role_user::where('user_id', $id)->select('role_id')->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }

        if ($id == 21) {
            $curso = Ticket::where('estado_id', 2)->where('especialista_id', 21)->where('crm_id', $crm)->count(['id']);
            return $curso;
        }
        if ($id == 14) {
            $curso = Ticket::where('estado_id', 2)->where('especialista_id', 14)->where('crm_id', $crm)->count(['id']);
            return $curso;
        }
        if ($RoleId == 16) {
            $curso = Ticket::where('estado_id', 2)->where('crm_id', $crm)->count(['id']);
            return $curso;
        } else {
            $curso = Ticket::where('estado_id', 2)->where('crm_id', $crm)->count(['id']);
            return $curso;
        }
    }

    public function validacionCrm($crm)
    {
        $id = Auth::user()->id;

        $rol = role_user::where('user_id', $id)->select('role_id')->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }

        if ($id == 21) {
            $validacion = Ticket::where('estado_id', 3)->where('especialista_id', 21)->where('crm_id', $crm)->count(['id']);
            return $validacion;
        }
        if ($id == 14) {
            $validacion = Ticket::where('estado_id', 3)->where('especialista_id', 14)->where('crm_id', $crm)->count(['id']);
            return $validacion;
        }
        if ($RoleId == 16) {
            $validacion = Ticket::where('estado_id', 3)->where('crm_id', $crm)->count(['id']);
            return $validacion;
        } else {
            $validacion = Ticket::where('estado_id', 3)->where('crm_id', $crm)->count(['id']);
            return $validacion;
        }
    }

    public function finalizadaCrm($crm)
    {
        $id = Auth::user()->id;

        $rol = role_user::where('user_id', $id)->select('role_id')->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }

        if ($id == 21) {
            $finalizada = Ticket::where('estado_id', 4)->where('especialista_id', 21)->where('crm_id', $crm)->count(['id']);
            return $finalizada;
        }
        if ($id == 14) {
            $finalizada = Ticket::where('estado_id', 4)->where('especialista_id', 14)->where('crm_id', $crm)->count(['id']);
            return $finalizada;
        }
        if ($RoleId == 16) {
            $finalizada = Ticket::where('estado_id', 4)->where('crm_id', $crm)->count(['id']);
            return $finalizada;
        } else {
            $finalizada = Ticket::where('estado_id', 4)->where('crm_id', $crm)->count(['id']);
            return $finalizada;
        }
    }

    public function GetTotalCotizacionTicket($id)
    {
        $total_cotizacion = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 1)->count(['id']);
        return $total_cotizacion;
    }

    public function GetTotalValidacionCompraTicket($id){
        $total = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 17)->count(['id']);
        return $total;
    }

    public function TotalSgcticket($id)
    {
        $total = SolicitudSgc::where('ticket_id', $id)->count();
        return $total;
    }
}

<?php

namespace App\Http\Controllers;

use App\crm_user;
use App\role_user;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketMotivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('ModuloMotivo.index', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetTotalTicketMotivo(Request $request)
    {
        $id = Auth::user()->id;

        $rol = role_user::where('user_id', $id)->select('role_id')->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }

        $crm = crm_user::where('user_id', Auth::user()->id)->get();

        foreach ($crm as $c) {
            $crm_id = $c->crm_id;
        }

        if ($request->motivo == 1) {

            if ($id == 21) {
                $total = Ticket::where('especialista_id', 21)->where('tipo_mantencion_id', 1)->where('tipo_motivo_id', 3)->count();

                return $total;

            } else {

                if ($id == 14) {
                    $total = Ticket::where('especialista_id', 14)->where('tipo_mantencion_id', 1)->where('tipo_motivo_id', 3)->count();

                    return $total;

                } else {
                    if ($id == 11) {
                        $total = Ticket::where('crm_id', '!=', 1)
                            ->where('crm_id', '!=', 2)
                            ->where('crm_id', '!=', 3)
                            ->where('crm_id', '!=', 4)->where('tipo_mantencion_id', 1)->where('tipo_motivo_id', 3)->count();

                        return $total;

                    } else {
                        if ($id == 12) {
                            $total = Ticket::where('crm_id', '!=', 1)
                                ->where('crm_id', '!=', 2)

                                ->where('crm_id', '!=', 5)->where('crm_id', '!=', 6)->where('tipo_mantencion_id', 1)->where('tipo_motivo_id', 3)->count();

                            return $total;

                        } else {
                            if ($crm_id == 7 || $RoleId == 16) {

                                $total = Ticket::where('tipo_mantencion_id', 1)->where('tipo_motivo_id', 3)->count();

                                return $total;

                            } else {
                                $total = Ticket::where('crm_id', $crm_id)->where('tipo_mantencion_id', 1)->where('tipo_motivo_id', 3)->count();

                                return $total;
                            }
                        }
                    }
                }
            }
        }

        if ($request->motivo == 2) {
            if ($id == 21) {
                $total = Ticket::where('especialista_id', 21)->where('tipo_motivo_id','!=', 3)->count();

                return $total;

            } else {

                if ($id == 14) {
                    $total = Ticket::where('especialista_id', 14)->where('tipo_motivo_id','!=', 3)->count();

                    return $total;

                } else {
                    if ($id == 11) {
                        $total = Ticket::where('crm_id', '!=', 1)
                            ->where('crm_id', '!=', 2)
                            ->where('crm_id', '!=', 3)
                            ->where('crm_id', '!=', 4)->where('tipo_motivo_id','!=', 3)->count();

                        return $total;

                    } else {
                        if ($id == 12) {
                            $total = Ticket::where('crm_id', '!=', 1)
                                ->where('crm_id', '!=', 2)

                                ->where('crm_id', '!=', 5)->where('crm_id', '!=', 6)->where('tipo_motivo_id','!=', 3)->count();

                            return $total;

                        } else {
                            if ($crm_id == 7 || $RoleId == 16) {

                                $total = Ticket::where('tipo_motivo_id','!=', 3)->count();

                                return $total;

                            } else {
                                $total = Ticket::where('crm_id', $crm_id)->where('tipo_motivo_id','!=', 3)->count();

                                return $total;
                            }
                        }
                    }
                }
            }
        }
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

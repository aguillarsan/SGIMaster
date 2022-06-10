<?php

namespace App\Http\Controllers;

use App\role_user;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('control.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTickets(Request $request)
    {

        $rol = role_user::where('user_id', Auth::user()->id)->select('role_id')->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }
        if ($RoleId == 16) {
            $ticket = Ticket::controlBuscar()->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 4)->with('user', 'area', 'site.pop.comuna.zona', 'crm', 'estado', 'tipo_motivo')->orderBy('clasificacion_id', 'asc')->paginate(20);
        } else {
            $ticket = Ticket::controlBuscar()->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->with('user', 'area', 'site.pop.comuna.zona', 'crm', 'estado', 'tipo_motivo')->orderBy('clasificacion_id', 'asc')->paginate(20);
        }

        return $ticket;
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

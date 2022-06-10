<?php

namespace App\Http\Controllers;
use App\Solicitud_ework;
use App\role_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudEworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;

        $rol = role_user::where('user_id', $id)->select('role_id')->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }

        if($RoleId == 1 || $RoleId == 16){
            $solicitud = Solicitud_ework::where('estado_id','!=',3)->where('estado_id','!=',4)->with('site.pop.comuna.zona.crm','estado','user','tipo_motivo')->orderby('id','desc')->paginate(20);
            return $solicitud;
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

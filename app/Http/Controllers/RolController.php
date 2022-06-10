<?php

namespace App\Http\Controllers;

use App\role_user;
use Illuminate\Http\Request;
use App\Rol;
use Illuminate\Support\Facades\Auth;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = role_user::where('user_id', Auth::user()->id)->select('role_id')->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }

        return $RoleId;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function UserRolName($id)
    {
         $rol = role_user::where('user_id', $id)->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }
        $rolsearch = Rol::where('id',$RoleId)->get();
        foreach ($rolsearch as $role) {
            $rolName = $role->name;
        }

        return $rolName;
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

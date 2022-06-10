<?php

namespace App\Http\Controllers;

use App\Contenido;
use App\Contenido_parrafo;
use App\Permiso_rol;
use App\PlataformasInfra;
use App\role_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolUser = role_user::where('user_id', Auth::user()->id)->get();
        foreach ($rolUser as $r) {
            $rol = $r->role_id;
        }
        $permisos = Permiso_rol::where('role_id', $rol)->where('permission_id', 157)->count();
        if ($permisos == 1) {
            return view('moduloPortal.index');
        } else {
            return view('errores.403');
        }

    }
    public function plataformas()
    {
        $plataformas = PlataformasInfra::get();
        return view('moduloPortal.plataforma', compact('plataformas'));
    }
    public function details($id)
    {
        $detail = Contenido::find($id);
        return view('portal.show', compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetFirstSeccion()
    {
        $secOne = Contenido::where('seccion_id', 1)->orderBy('id', 'desc')->get();
        return $secOne;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createNews(Request $request)
    {
        $files           = $request->file('file');
        $destinationPath = 'imagenesPortal/marca';
        foreach ($files as $file) {

            $filename       = $file->getClientOriginalname();
            $extension      = $file->getClientOriginalExtension();
            $upload_success = $file->move($destinationPath, $filename);
        }
        $contenido         = new Contenido;
        $contenido->titulo = $request->titulo;

        $contenido->introduccion = $request->introduccion;
        $contenido->imagen       = '../imagenesPortal/marca/' . $filename;
        $contenido->seccion_id   = 1;
        $contenido->save();

        return $contenido->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setParrafosNoticia(Request $request)
    {

        $contenido_parrafo               = new Contenido_parrafo;
        $contenido_parrafo->contenido_id = $request->noticia_id;
        $contenido_parrafo->parrafo      = $request->parrafo;
        $contenido_parrafo->save();

        return;

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

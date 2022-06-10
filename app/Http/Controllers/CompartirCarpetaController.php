<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Carpeta;
use App\CarpetaCompartida;
use App\User;
use App\Notificacion;
use App\Models\Repositorio\Folder;
use App\Models\Repositorio\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompartirCarpetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateNameFolderShared(Request $request)
    {
        $folder         = Folder::find($request->id);
        $folder->nombre = $request->nombre;
        $folder->save();
        $folderShared         = CarpetaCompartida::find($request->id);
        $folderShared->nombre = $request->nombre;
        $folderShared->save();
        $actividad              = new Actividad;
        $actividad->carpeta_id  = $request->id;
        $actividad->descripcion = 'Se edito el nombre de la carpeta';
        $actividad->user_id     = Auth::user()->id;
        $actividad->iniciales   = substr(Auth::user()->name, 0, 1) . substr(Auth::user()->apellido, 0, 1);
        $actividad->save();

        return;
    }
    public function trashFolderShared($id){
        $folder         = Folder::find($id);
        $folder->estado_id = 3;
        $folder->save();
        $folderShared         = CarpetaCompartida::find($id);
        $folderShared->estado_id = 3;
        $folderShared->save();
        $actividad              = new Actividad;
        $actividad->carpeta_id  = $id;
        $actividad->descripcion = 'Se movio'.' '.$folder->nombre.' '.'a la papelera';
        $actividad->user_id     = Auth::user()->id;
        $actividad->iniciales   = substr(Auth::user()->name, 0, 1) . substr(Auth::user()->apellido, 0, 1);
        $actividad->save();

        return;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFoldersShared(Request $request)
    {
        $folder = CarpetaCompartida::buscar()->where('user_shared_id', Auth::user()->id)->where('estado_id','!=',3)->with('user')->get();
        return $folder;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SetSharedFolder(Request $request)
    {

        $carpeta = Folder::find($request->folderId);

        $array = explode(",", $request->users);

        if (isset($array)) {
            foreach ($array as $u) {
                $folderShared                 = new CarpetaCompartida;
                $folderShared->id             = $carpeta->id;
                $folderShared->nombre         = $carpeta->nombre;
                $folderShared->sub_carpeta_id = $carpeta->sub_carpeta_id;
                $folderShared->user_id        = $carpeta->user_id;
                $folderShared->user_shared_id = $u;
                $folderShared->estado_id      = $carpeta->estado_id;
                $folderShared->permiso_id     = $request->permisos;
                $folderShared->pop_id         = $carpeta->pop_id;
                $folderShared->save();
                $userData               = User::find($u);
                $actividad              = new Actividad;
                $actividad->carpeta_id  = $carpeta->id;
                $actividad->descripcion = 'Has compartido la carpeta' . ' ' . $carpeta->nombre . ' ' . 'a' . ' ' . $userData->name . ' ' . $userData->apellido;
                $actividad->user_id     = Auth::user()->id;
                $actividad->iniciales   = substr(Auth::user()->name, 0, 1) . substr(Auth::user()->apellido, 0, 1);
                $actividad->save();

                $notification = new Notificacion;
                $notification->user_id = $u;
                $notification->activo_id = 1;
                $notification->descripcion = 'El usuario'.' '.Auth::user()->name.' '.Auth::user()->apellido.' '.'te a compartido la carpeta'.' '.$carpeta->nombre;
                $notification->save();

            }
            return;
        }

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

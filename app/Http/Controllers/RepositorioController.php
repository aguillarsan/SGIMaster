<?php

namespace App\Http\Controllers;

use App\Acces_user_module;
use App\ArchivosRepositorio;
use App\Carpeta;
use App\Permiso_rol;
use App\role_user;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepositorioController extends Controller
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
        $permisos = Permiso_rol::where('role_id', $rol)->where('permission_id', 146)->count();
        if ($permisos != 0) {
            Acces_user_module::create([
                'user_id'   => Auth::user()->id,
                'modulo_id' => 4,

            ]);
            return view('layouts.MenuRepositorio');
        } else {
            return view('errores.403');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CarpetaZona()
    {
        $folder = Carpeta::where('id', '>=', 1953)->where('id','<=',1964)->get();
      
        foreach ($folder as $f) {
            //$name = Carpeta::find($f->sub_carpeta_id);
            $pat       = 'ArchivosRepositorio/Z20 Región XII ICETEL/'.$f->nombre.'/Foto';
            $subfolder = Carpeta::where('nombre', 'Foto')->where('sub_carpeta_id', $f->id)->get();
           
            foreach ($subfolder as $sub) {
                if ($dir = opendir($pat)) {

                    while ($archivos = readdir($dir)) {
                        if ($archivos != '.' && $archivos != '..') {

                            $archivo = new ArchivosRepositorio;

                            $archivo->nombre     = $archivos;
                            $archivo->directorio = 'ArchivosRepositorio/Z20 Región XII ICETEL/'.$f->nombre.'/Foto';
                            $archivo->carpeta_id = $sub->id;

                            $archivo->save();

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
    public function carpetaInforme()
    {

        $folder = Carpeta::where('sub_carpeta_id', '>=', 391)->where('sub_carpeta_id','<=',396)->get();

        foreach ($folder as $f) {

            $name = Carpeta::find($f->sub_carpeta_id);
             
            $pat       = 'ArchivosRepositorio/'.$name->nombre.'/'.$f->nombre.'/Informes';
            $subfolder = Carpeta::where('nombre', 'Informes')->where('sub_carpeta_id', $f->id)->get();
            foreach ($subfolder as $sub) {
                if ($dir = opendir($pat)) {

                    while ($archivos = readdir($dir)) {
                        if ($archivos != '.' && $archivos != '..') {

                            $archivo = new ArchivosRepositorio;

                            $archivo->nombre     = $archivos;
                            $archivo->directorio = 'ArchivosRepositorio/'.$name->nombre.'/'.$f->nombre.'/Informes';
                            $archivo->carpeta_id = $sub->id;
                            $archivo->class      = 'fas fa-file-pdf';
                            $archivo->save();

                        }

                    }
                }
            }

        }
        return;

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function creartesubfolder()
    {

        $folder = Carpeta::where('sub_carpeta_id', '>=', 383)->where('sub_carpeta_id','<=',396)->get();
        foreach ($folder as $f) {
            $sub         = new Carpeta;
            $sub->nombre = 'Foto';

            $sub->user_id        = Auth::user()->id;
            $sub->area_id        = 1;
            $sub->sub_carpeta_id = $f->id;
            $sub->estado_id      = 1;
            $sub->save();
        }
        $folder = Carpeta::where('sub_carpeta_id', '>=', 383)->where('sub_carpeta_id','<=',396)->get();
        foreach ($folder as $f) {
            $sub         = new Carpeta;
            $sub->nombre = 'Informes';

            $sub->user_id        = Auth::user()->id;
            $sub->area_id        = 1;
            $sub->sub_carpeta_id = $f->id;
            $sub->estado_id      = 1;
            $sub->save(); 
        }
        dd($folder);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function elimarfiles()
    {
        $files = ArchivosRepositorio::where('carpeta_id','>=',643)->where('carpeta_id','<=',710)->get();
        foreach ($files as $f){
            $f_delete = ArchivosRepositorio::find($f->id);
            $f_delete->delete();
        }
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

<?php

namespace App\Http\Controllers;

use App\ArchivoSgc;
use App\Configuracion_user;
use App\crm_user;
use App\Permiso_rol;
use App\role_user;
use App\SolicitudSgc;
use App\User;
use App\List_proveedor;
use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        $permisos = Permiso_rol::where('role_id', $rol)->where('permission_id', 148)->count();
        if ($permisos == 1) {
            return view('administrador.index');
        } else {
            return view('errores.403');
        }
    }

    public function updateUserStatus(Request $request){
        $user = User::find($request->user_id);
        $user->estado = $user->estado == 1 ? 0 : 1;
        $user->save();
        return;
    }


    public function updateProveedores()
    {
        $list = List_proveedor::groupBy('rut')->get();
        foreach ($list as $new_prov) {
            $check = Proveedor::where('RUT_PROVEEDOR', $new_prov->rut)->first();
            if ($check) {
            } else {
                $prov = new Proveedor;
                $prov->RUT_PROVEEDOR = $new_prov->rut;
                $prov->PROVEEDOR = $new_prov->nombre;
                $prov->ACTIVO = 1;
                $prov->save();
            }
        }
    }

    public function validateEmail(Request $request)
    {
        $exist = User::where('email', $request->email)->first() ? true : false;
        if ($exist) {
            return true;
        } else {
            return false;
        }
    }
   

    public function createNewUser(Request $request)
    {
        try {
            $user           = new User;
            $user->name     = $request->name;
            $user->apellido = $request->last_name;
            $user->email    = $request->email;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->avatar   = '../responsables/default.png';
            $user->estado   = 1;
            $user->save();

            $role_user          = new role_user;
            $role_user->role_id = $request->rol_id;
            $role_user->user_id = $user->id;
            $role_user->save();

            if ($request->crm_id) {
                $crm          = new crm_user;
                $crm->user_id = $user->id;
                $crm->crm_id  = $request->crm_id;
                $crm->save();
            }

            $configuracionUser                   = new Configuracion_user;
            $configuracionUser->user_id          = $user->id;
            $configuracionUser->configuracion_id = 1;
            $configuracionUser->save();

            return $user->id;

        } catch (Exception $e) {
            return $e;
        }
    }

    public function uploadCotizacionesInformefinal(Request $request)
    {


        $files           = $request->file('files_upload');
        $destinationPath = 'archivosSgc';
   


       
        
            $a = 0;
            foreach ($files as $file) {
                $a++;
                $id_solicitud = substr($file->getClientOriginalName(), 0, 5);
                $solicitud     = SolicitudSgc::find($id_solicitud);

                $filename = $file->getClientOriginalName();
                $cod      = substr($filename, 0, -4);



                $extension    = $file->getClientOriginalExtension();
                $nombre_nuevo = $solicitud->id . '_' . 'Informe_final_' . $a . '.' . $extension;

                $upload_success = $file->move($destinationPath, $nombre_nuevo);

                $archivo                     = new ArchivoSgc;
                $archivo->nombre_archivo     = $nombre_nuevo;
                $archivo->nuevassolicitud_id = $solicitud->id;

                $archivo->tipo_archivo_id = 2;
                if ($extension == 'xls' || $extension == 'xlsx') {

                    $archivo->class = 'far fa-file-excel';
                } else {
                    if ($extension == 'doc' || $extension == 'docx') {

                        $archivo->class = 'far fa-file-word';
                    } else {
                        if ($extension == 'pdf' || $extension == 'PDF') {

                            $archivo->class = 'fas fa-file-pdf';
                        } else {
                            if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {;

                                $archivo->class = 'fas fa-file-image';
                            } else {
                                if ($extension == 'msg' || $extension == 'MSG') {
                                    $archivo->class = 'fas fa-envelope';
                                }
                            }
                        }
                    }
                }
                $archivo->save();

             
                $solicitud->informefinal = 1;
                $solicitud->proceso_id = 2;
                $solicitud->subestado_id = 2;
                $solicitud->save();
            }
        


        return redirect("/upload-coti");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ifLoggin()
    {

        if (Auth::check()) {
            return redirect('/modulos');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        $user           = User::find($request->user_id);
        $user->password = Hash::make($request->new_password);
        $user->save();
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatesolcitudes()
    {
        $solicitudes = SolicitudSgc::where('guiadespacho', 1)->get();
        foreach ($solicitudes as $solicitud) {
            $informe_final = ArchivoSgc::where('nuevassolicitud_id', $solicitud->id)->where('tipo_archivo_id', 4)->first();
            if (!$informe_final) {
                $slc_updtae               = SolicitudSgc::find($solicitud->id);
                $slc_updtae->guiadespacho = null;
                $slc_updtae->save();
            }
        }

        $solicitudes = SolicitudSgc::where('informefinal', 1)->get();
        foreach ($solicitudes as $solicitud) {
            $informe_final = ArchivoSgc::where('nuevassolicitud_id', $solicitud->id)->where('tipo_archivo_id', 2)->first();
            if (!$informe_final) {
                $slc_updtae               = SolicitudSgc::find($solicitud->id);
                $slc_updtae->informefinal = null;
                $slc_updtae->save();
            }
        }
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

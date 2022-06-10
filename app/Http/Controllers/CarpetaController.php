<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\ArchivosRepositorio;
use App\Carpeta;
use App\CarpetaCompartida;
use App\Models\Repositorio\File;
use App\Models\Repositorio\Folder;
use App\Notificacion;
use App\role_user;
use App\SolicitudSgc;
use App\User;
use App\User_repositorio_area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Repositorio\Extension;

class CarpetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $folder = Folder::buscar()->where('estado_id', 1)->where('sub_carpeta_id', null)->where('user_id', Auth::user()->id)->with([
            'user' => function ($query) {
                $query->select('id', 'name', 'apellido');
            }])->orderBy('id', 'desc')->get(['id', 'nombre', 'user_id']);
        return $folder;
    }
    public function GetDetailsFolder($id)
    {
        $folder = Folder::where('id', $id)->with([
            'user' => function ($query) {
                $query->select('id', 'name', 'apellido');
            }])->get(['created_at', 'updated_at', 'user_id', 'nombre']);
        return $folder;
    }
    public function GetSubFolder(Request $request)
    {
        $folder = Folder::buscar()->where('sub_carpeta_id', $request->folderid)->where('estado_id', 1)->with([
            'user' => function ($query) {
                $query->select('id', 'name', 'apellido');
            }])->get(['id', 'nombre', 'user_id', 'created_at', 'updated_at']);

        $files = File::buscar()->where('carpeta_id', $request->folderid)->get(['nombre', 'id', 'carpeta_id', 'estado_id', 'icono_archivo', 'class', 'directorio']);

        $data = [
            'folder' => $folder,
            'files'  => $files,
        ];

        return $data;
    }
    public function GetFiles(Request $request)
    {
        $folder = File::buscar()->where('carpeta_id', $request->folderid)->get(['nombre', 'id', 'carpeta_id', 'estado_id', 'icono_archivo', 'class', 'directorio']);
        return $folder;
    }
    public function uploadFilesRepositorio(Request $request, $id)
    {
        $files = $request->file('files');

        $destinationPath = 'ArchivosRepositorio';
        if ($files != null) {

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();

                $filename = $file->getClientOriginalname();

                $upload_success = $file->move($destinationPath, $filename);

                $archivo             = new File;
                $archivo->nombre     = $filename;
                $archivo->carpeta_id = $id;

                if ($extension == 'xls' || $extension == 'xlsx') {

                    $archivo->class = 'far fa-file-excel';
                } else {
                    if ($extension == 'doc' || $extension == 'docx') {

                        $archivo->class = 'far fa-file-word';
                    } else {
                        if ($extension == 'pdf' || $extension == 'PDF') {
                            $archivo->class = 'fas fa-file-pdf';
                        } else {
                            if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {

                                $archivo->class = 'fas fa-file';
                            } else {
                                if ($extension == 'csv') {
                                    $archivo->class = 'fas fa-file-csv';
                                } else {
                                    if ($extension == 'rar' || $extension == 'zip') {
                                        $archivo->class = 'fas fa-file-archive';
                                    } else {
                                        if ($extension == 'dwg') {
                                            $archivo->class = 'fas fa-file';
                                        } else {}
                                        if ($extension == 'pptx') {
                                            $archivo->class = 'fas fa-file-powerpoint';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                $archivo->save();
                $actividad              = new Actividad;
                $actividad->carpeta_id  = $id;
                $actividad->descripcion = 'Archivo' . ' ' . $filename . ' ' . 'cargado';
                $actividad->user_id     = Auth::user()->id;
                $actividad->iniciales   = substr(Auth::user()->name, 0, 1) . substr(Auth::user()->apellido, 0, 1);
                $actividad->save();

            }

        }
        return response()->json([
            'uploaded' => true,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getFoldersDelete(Request $request)
    {
        $folder = Folder::buscar()->where('estado_id', 3)->where('user_id', Auth::user()->id)->with('user')->get();
        return $folder;
    }

    public function SearchFileDuplicatesRepositorio(Request $request)
    {
        $files = $request->file('files');
        if ($files != null) {

            foreach ($files as $file) {
                $archivos = File::where('nombre', 'like', "%" . $file->getClientOriginalname() . "%")->get();
            }

            return $archivos;

        }
    }

    public function delteAllfoldersUserTrash()
    {
        $carpetas = Folder::where('user_id', Auth::user()->id)->where('estado_id', 3)->get();
        foreach ($carpetas as $carpeta) {
            $folder = Carpeta::find($carpeta->id);
            $folder->delete();
        }
        return;
    }

    public function FindNewFolder(Request $request)
    {
        $folder = Folder::where('nombre', $request->nombre)->where('user_id', Auth::user()->id)->get();
        return $folder;
    }

    public function updateNameFolder(Request $request)
    {
        $folder         = Folder::find($request->id);
        $folder->nombre = $request->nombre;
        $folder->save();

        $actividad              = new Actividad;
        $actividad->carpeta_id  = $request->id;
        $actividad->descripcion = 'Has editado el nombre';
        $actividad->user_id     = Auth::user()->id;
        $actividad->iniciales   = substr(Auth::user()->name, 0, 1) . substr(Auth::user()->apellido, 0, 1);
        $actividad->save();
        return;
    }
    public function deleteFolderBd($id)
    {
        //$archivosCarpeta = ArchivosRepositorio::where('carpeta_id', $id);
        //return $archivosCarpeta;
        //foreach ($archivosCarpeta as $archvivo) {
        // $file = ArchivosRepositorio::find($archivo->id);
        //if ($file != null) {
        //   unlink('ArchivosRepositorio/' . $file->nombre);
        // $file->delete();
        //}
        //}

        $folder     = Folder::find($id);
        $Subfolders = Folder::where('sub_carpeta_id', $id)->get();
        if ($Subfolders != null) {
            foreach ($Subfolders as $sub) {
                $subfolder = Folder::find($sub->id);
                $subfolder->delete();
            }
        }
        $folder->delete();

        $actividad              = new Actividad;
        $actividad->carpeta_id  = $id;
        $actividad->descripcion = 'Se elimino la carpeta';
        $actividad->user_id     = Auth::user()->id;
        $actividad->iniciales   = substr(Auth::user()->name, 0, 1) . substr(Auth::user()->apellido, 0, 1);
        $actividad->save();
        return;
    }
    public function moveToFolderTrash($id)
    {
        $folder            = Folder::find($id);
        $folder->estado_id = 3;
        $folder->save();
        $actividad              = new Actividad;
        $actividad->carpeta_id  = $id;
        $actividad->descripcion = 'Has movido un elemento a la papelera';
        $actividad->iniciales   = substr(Auth::user()->name, 0, 1) . substr(Auth::user()->apellido, 0, 1);
        $actividad->user_id     = Auth::user()->id;
        $actividad->save();
        return;

    }
    public function RecoveryFolder($id)
    {
        $folder            = Folder::find($id);
        $folder->estado_id = 1;
        $folder->save();
        $actividad              = new Actividad;
        $actividad->carpeta_id  = $id;
        $actividad->descripcion = 'Has restaurado la carpeta' . ' ' . $folder->nombre;
        $actividad->iniciales   = substr(Auth::user()->name, 0, 1) . substr(Auth::user()->apellido, 0, 1);
        $actividad->user_id     = Auth::user()->id;
        $actividad->save();
        return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $area               = User_repositorio_area::find(Auth::user()->id);
        $carpeta            = new Folder;
        $carpeta->nombre    = $request->nombre;
        $carpeta->pop_id    = $request->site;
        $carpeta->user_id   = Auth::user()->id;
        $carpeta->area_id   = $area->area_id;
        $carpeta->estado_id = 1;
        $carpeta->save();
        $actividad              = new Actividad;
        $actividad->carpeta_id  = $carpeta->id;
        $actividad->descripcion = 'Has creado la carpeta' . ' ' . $carpeta->nombre;
        $actividad->iniciales   = substr(Auth::user()->name, 0, 1) . substr(Auth::user()->apellido, 0, 1);
        $actividad->user_id     = Auth::user()->id;
        $actividad->save();
        return;
    }
    public function createSubFolder(Request $request)
    {
        $area                    = User_repositorio_area::find(Auth::user()->id);
        $carpeta                 = new Folder;
        $carpeta->nombre         = $request->nombre;
        $carpeta->pop_id         = $request->site;
        $carpeta->user_id        = Auth::user()->id;
        $carpeta->area_id        = $area->area_id;
        $carpeta->sub_carpeta_id = $request->idFolder;
        $carpeta->estado_id      = 1;
        $carpeta->save();
        $actividad              = new Actividad;
        $actividad->carpeta_id  = $carpeta->id;
        $actividad->descripcion = 'Has creado la carpeta' . ' ' . $carpeta->nombre;
        $actividad->iniciales   = substr(Auth::user()->name, 0, 1) . substr(Auth::user()->apellido, 0, 1);
        $actividad->user_id     = Auth::user()->id;
        $actividad->save();
        return;
    }

    public function getFoldersAreaUsers(Request $request)
    {
        $area   = User_repositorio_area::find(Auth::user()->id);
        $folder = Folder::buscar()->where('sub_carpeta_id', null)->with('user')->orderBy('id', 'desc')->get();
        return $folder;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Deletefile($id)
    {
        $file                   = File::find($id);
        $actividad              = new Actividad;
        $actividad->carpeta_id  = $file->carpeta_id;
        $actividad->descripcion = 'Archivo' . ' ' . $file->nombre . ' ' . 'eliminado';
        $actividad->iniciales   = substr(Auth::user()->name, 0, 1) . substr(Auth::user()->apellido, 0, 1);
        $actividad->user_id     = Auth::user()->id;
        $actividad->save();

        //unlink('ArchivosRepositorio/' . $file->nombre);
        $file->delete();

        return;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function ultimatesharedFolder()
    {
        //$carpetas = Carpeta::where('pop_id', '!=', null)->get();
        $carpetas = Folder::where('id', '>=', 45)->where('id', '<=', 67)->get();
        foreach ($carpetas as $carpeta) {
            $folderShared                 = new CarpetaCompartida;
            $folderShared->id             = $carpeta->id;
            $folderShared->nombre         = $carpeta->nombre;
            $folderShared->sub_carpeta_id = $carpeta->sub_carpeta_id;
            $folderShared->user_id        = $carpeta->user_id;
            $folderShared->user_shared_id = 285;
            $folderShared->estado_id      = $carpeta->estado_id;
            $folderShared->permiso_id     = 2;
            $folderShared->pop_id         = $carpeta->pop_id;
            $folderShared->save();
            $userData               = User::find(285);
            $actividad              = new Actividad;
            $actividad->carpeta_id  = $carpeta->id;
            $actividad->descripcion = 'Has compartido la carpeta' . ' ' . $carpeta->nombre . ' ' . 'a' . ' ' . $userData->name . ' ' . $userData->apellido;
            $actividad->user_id     = Auth::user()->id;
            $actividad->iniciales   = substr(Auth::user()->name, 0, 1) . substr(Auth::user()->apellido, 0, 1);
            $actividad->save();

            $notification              = new Notificacion;
            $notification->user_id     = 285;
            $notification->activo_id   = 1;
            $notification->descripcion = 'El usuario' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido . ' ' . 'te a compartido la carpeta' . ' ' . $carpeta->nombre;
            $notification->save();

        }
        return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function officeTrackFolderView()
    {
        return view('repositorio.officeTrack');
    }
    public function officeTrackFolderData()
    {
        $folder = Carpeta::buscar()->whereIn('id', [197, 364, 365, 366, 367, 368, 369, 370, 371, 372, 373, 374, 375, 376, 377, 378, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 394, 395, 396])->with([
            'user' => function ($query) {
                $query->select('id', 'name', 'apellido');
            }])->orderBy('id', 'desc')->get(['id', 'nombre', 'user_id']);
        return $folder;
    }
    public function GetSubFolderOfficeTrack(Request $request)
    {
        $folder = Carpeta::buscar()->where('sub_carpeta_id', $request->folderid)->where('estado_id', 1)->with([
            'user' => function ($query) {
                $query->select('id', 'name', 'apellido');
            }])->get(['id', 'nombre', 'user_id', 'created_at', 'updated_at']);

        $files = ArchivosRepositorio::buscar()->where('carpeta_id', $request->folderid)->get(['nombre', 'id', 'carpeta_id', 'estado_id', 'icono_archivo', 'class', 'directorio']);

        $data = [
            'folder' => $folder,
            'files'  => $files,
        ];

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sgcRequest()
    {
        $rol = role_user::where('user_id', Auth::user()->id)->first();

        if ($rol->role_id == 1 || $rol->role_id == 8 || $rol->role_id == 16 || $rol->role_id == 26) {
            $solicitud = SolicitudSgc::searchFile()->with('site', 'user')->orderby('id', 'desc')->paginate(20, ['user_id', 'id', 'site_id']);
            return $solicitud;
        } else {
            if ($rol->role_id == 14) {
                $solicitud = SolicitudSgc::searchFile()->with('site', 'user')->where('area_id', 1)->orderby('id', 'desc')->paginate(20, ['user_id', 'id', 'site_id']);
                return $solicitud;
            } else {
                $solicitud = SolicitudSgc::searchFile()->with('site', 'user')->where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(20, ['user_id', 'id', 'site_id']);
                return $solicitud;
            }
        }

    }

    public function getExtensions(){
        $extensions = Extension::get();
        return $extensions;
    }
}

<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Log;
use App\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DenunciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
  
            $ticket = Ticket::DenunciaBuscar()->where('denuncia_id', $request->modulo)->with('user', 'area', 'site.pop.comuna.zona', 'crm', 'estado', 'tipo_motivo')->orderBy('clasificacion_id', 'asc')->paginate(20);
            return $ticket;
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function totalDenuncia(Request $request)
    {
        $ticket = Ticket::DenunciaBuscar()->where('denuncia_id', 1)->count();
        return $ticket;
    }
    public function totalDenunciado(Request $request)
    {
        $ticket = Ticket::DenunciaBuscar()->where('denuncia_id', 2)->count();
        return $ticket;
    }

    public function uploadFilesComplaint(Request $request, $id)
    {
        $files = $request->file('files');

        $destinationPath = 'archivos';
        if ($files != null) {

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();

                $filename  = $file->getClientOriginalname();
                $upload_success = $file->move($destinationPath, $filename);

                $archivo                  = new Archivo;
                $archivo->nombre_archivo  = $filename;
                $archivo->tipo_archivo_id = 13;
                $archivo->ticket_id       = $id;
                if ($extension == 'xls' || $extension == 'xlsx') {
                    $archivo->icono_archivo = "/logosEntel/exel.png";
                } else {
                    if ($extension == 'doc' || $extension == 'docx') {
                        $archivo->icono_archivo = "/logosEntel/doc3.png";
                    } else {
                        if ($extension == 'pdf' || $extension == 'PDF') {
                            $archivo->icono_archivo = "/logosEntel/nuevopdf2.png";
                        } else {
                            if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                               
                                $archivo->icono_archivo = "/logosEntel/img2.png";
                            }
                        }
                    }
                }

                $archivo->save();

                $log                  = new Log;
                $log->ticket_id       = $id;
                $log->tipo_mensaje_id = 2;
                $log->descripcion     = 'Ticket Nro' . ' ' . $id . ' ' . 'Archivo cargado, Nombre del archivo' . ' ' . $filename;
                $log->user_id         = Auth::user()->id;
                $log->save();

            }

        }
        $ticket              = Ticket::find($id);
        $ticket->denuncia_id = 2;
        $ticket->documento_denuncia = 1;
        $ticket->save();
        $log                  = new Log;
        $log->ticket_id       = $id;
        $log->tipo_mensaje_id = 1;
        $log->descripcion     = 'Ticket Nro' . ' ' . $id . ' ' . 'denunciado';
        $log->user_id         = Auth::user()->id;
        $log->save();
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

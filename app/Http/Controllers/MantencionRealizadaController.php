<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Log;
use App\Mantencion_realizada;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MantencionRealizadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMantencion()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
         
        $files = $request->file('archivos');
        if($files!= null){
             foreach ($files as $f ) {
            $file = $f; 
        }
        }
       
        $ticket                         = Ticket::find($id);
        $mantencionRealizada            = new Mantencion_realizada;
        $mantencionRealizada->ticket_id = $id;

        if (request('na') != null) {

            $mantencionRealizada->mantencion_selected = substr(request('na'), -1);
            $mantencionRealizada->mantencion_id       = substr(request('na'), 0, -1);

            if ($mantencionRealizada->mantencion_id == 1) {
                $ticket->mantencion_energia = "N/A";
                $ticket->save();

            } else {
                if ($mantencionRealizada->mantencion_id == 2) {
                    $ticket->mantencion_clima = "N/A";
                    $ticket->save();

                } else {
                    if ($mantencionRealizada->mantencion_id == 3) {
                        $ticket->mantencion_ge = "N/A";
                        $ticket->save();

                    }
                }
            }

        }
        if (request('si') != null) {

            $mantencionRealizada->mantencion_selected = substr(request('si'), -1);
            $mantencionRealizada->mantencion_id       = substr(request('si'), 0, -1);

            if ($mantencionRealizada->mantencion_id == 1) {
                $ticket->mantencion_energia = "SI";
                $ticket->save();

            } else {
                if ($mantencionRealizada->mantencion_id == 2) {
                    $ticket->mantencion_clima = "SI";
                    $ticket->save();

                } else {
                    if ($mantencionRealizada->mantencion_id == 3) {
                        $ticket->mantencion_ge = "SI";
                        $ticket->save();

                    }
                }
            }
        }
        if (request('no') != null) {

            $mantencionRealizada->mantencion_selected = substr(request('no'), -1);
            $mantencionRealizada->mantencion_id       = substr(request('no'), 0, -1);

            if ($mantencionRealizada->mantencion_id == 1) {
                $ticket->mantencion_energia = "NO";
                $ticket->save();

            } else {
                if ($mantencionRealizada->mantencion_id == 2) {
                    $ticket->mantencion_clima = "NO";
                    $ticket->save();

                } else {
                    if ($mantencionRealizada->mantencion_id == 3) {
                        $ticket->mantencion_ge = "NO";
                        $ticket->save();

                    }
                }
            }
        }
        if ($mantencionRealizada->mantencion_selected == 1 && $mantencionRealizada->mantencion_id == 1) {
            $log                  = new Log;
            $log->ticket_id       = $id;
            $log->descripcion     = "Mantención de energia realizada";
            $log->user_id         = Auth::user()->id;
            $log->tipo_mensaje_id = 2;
            $log->save();

        }
        if ($mantencionRealizada->mantencion_selected == 1 && $mantencionRealizada->mantencion_id == 2) {
            $log                  = new Log;
            $log->ticket_id       = $id;
            $log->descripcion     = "Mantención de  clima realizada";
            $log->user_id         = Auth::user()->id;
            $log->tipo_mensaje_id = 2;
            $log->save();

        }

        if ($mantencionRealizada->mantencion_selected == 1 && $mantencionRealizada->mantencion_id == 3) {
            $log                  = new Log;
            $log->ticket_id       = $id;
            $log->descripcion     = "Mantención de  GG.EE realizada";
            $log->user_id         = Auth::user()->id;
            $log->tipo_mensaje_id = 2;
            $log->save();

        }

      

        if (substr(request('si'), 0, -1) == 1) {

            $extension                           = $file->getClientOriginalExtension();
            $nombre_nuevo                        = $id . '_' . 'Informe_energia' . '.' . $extension;
            $mantencionRealizada->nombre_archivo = $nombre_nuevo;
            $mantencionRealizada->fecha          = request('fec');

            $destinationPath = 'archivos';
            $upload_success  = $file->move($destinationPath, $nombre_nuevo);

            $archivo                  = new Archivo;
            $archivo->nombre_archivo  = $nombre_nuevo;
            $archivo->tipo_archivo_id = 10;
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

        }

        if (substr(request('si'), 0, -1) == 2) {

            $extension                           = $file->getClientOriginalExtension();
            $nombre_nuevo                        = $id . '_' . 'Informe_clima' . '.' . $extension;

            $destinationPath = 'archivos';
            $upload_success  = $file->move($destinationPath, $nombre_nuevo);

            $mantencionRealizada->nombre_archivo = $nombre_nuevo;
            $mantencionRealizada->fecha          = request('fechaNueva2');
            $archivo                             = new Archivo;
            $archivo->nombre_archivo             = $nombre_nuevo;
            $archivo->tipo_archivo_id            = 10;
            $archivo->ticket_id                  = $id;
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
        }

        if (substr(request('si'), 0, -1) == 3) {

            $extension                           = $file->getClientOriginalExtension();
            $nombre_nuevo                        = $id . '_' . 'Informe_GG.EE' . '.' . $extension;
            $destinationPath = 'archivos';
            $upload_success  = $file->move($destinationPath, $nombre_nuevo);
            $mantencionRealizada->nombre_archivo = $nombre_nuevo;
            $mantencionRealizada->fecha          = request('fechaNueva3');
            $archivo                             = new Archivo;
            $archivo->nombre_archivo             = $nombre_nuevo;
            $archivo->tipo_archivo_id            = 10;
            $archivo->ticket_id                  = $id;
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

        }


        $mantencionRealizada->save();
          $mantenciones = Mantencion_realizada::where('ticket_id', $id)->count();
    
        if ($mantenciones == 3) {
            $ticket                  = Ticket::find($id);
            $ticket->mantencion_data = 1;
            $ticket->save();
        }

        return redirect('/showTicket/'.$id);

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

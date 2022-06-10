<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Archivo_ingenieria;
use App\Log;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchivoController extends Controller
{

    
    public function searchArchivoIng(Request $request)
    {
        $archivos = Archivo_ingenieria::where('ticket_id', $request->id)->where('tipo_archivo_id',$request->tipo)->get();
        return $archivos;

    }
    public function GetTotalArchivos($id)
    {
        $archivos = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 1)->count();
        return $archivos;
    }
    public function GetTotalDenuncia($id)
    {
        $archivos = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 13)->count();
        return $archivos;
    }
    public function GetTotalChecklist($id)
    {
          $archivos = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 14)->count();
        return $archivos;
    }
    public function GetTotalImagenes($id)
    {
        $archivos = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 12)->count();
        return $archivos;
    }

    public function totalMail($id)
    {
        $total = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 7)->count();
        return $total;
    }

    public function totalPxq($id)
    {
        $total = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 11)->count();
        return $total;
    }

    public function totalCotizaciones($id)
    {
        $cotizaciones = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 1)->count();
        $informe_final = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 2)->count();
        $guia_despacho = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 4)->count();
        $otro = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 5)->count();
        $lpu = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 6)->count();
        $carta_adjudicacion = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 8)->count();
        $informe_parcial = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 9)->count();
        $pxq = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 11)->count();
        $mail = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 7)->count();
        $checklist = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 14)->count();
        $archivo_denuncia = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 13)->count();
        $informe_fotografico =Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 12)->count();
        $total_validacion_compras = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 17)->count();
         
        $data = [
          'cotizaciones' =>$cotizaciones,
          'informe_final' => $informe_final,
          'guia_despacho' => $guia_despacho,
          'otro' => $otro,
          'lpu' => $lpu,
          'carta_adjudicacion' => $carta_adjudicacion,
          'informe_parcial' => $informe_parcial,
          'pxq' => $pxq,
          'mail' => $mail,
          'checklist' => $checklist,
          'archivo_denuncia' => $archivo_denuncia,
          'informe_fotografico' => $informe_fotografico,
          'total_validacion_compras' => $total_validacion_compras
        ];
        return $data;
    }
    public function totalInformeFinal($id)
    {
        $total = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 2)->count();
        return $total;
    }
    public function totalguiaDespacho($id)
    {
        $total = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 4)->count();
        return $total;
    }
    public function totalotro($id)
    {
        $total = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 5)->count();
        return $total;
    }
    public function totallpu($id)
    {
        $total = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 6)->count();
        return $total;
    }
    public function totaladjudicacion($id)
    {
        $total = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 8)->count();
        return $total;
    }
    public function totalinformeParcial($id)
    {
        $total = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', 9)->count();
        return $total;
    }
    public function upload(Request $request, $id)
    {

        $files           = $request->file('files');
        $destinationPath = 'archivos';
        if ($files != null) {
            $a = 0;
            foreach ($files as $file) {

                $filename  = $file->getClientOriginalname();
                $extension = $file->getClientOriginalExtension();
                if (request('tipo_archivo') == 1) {
                    $nombre = 'Cotizacion';
                    $tipo   = 1;
                }
                if (request('tipo_archivo') == 2) {
                    $nombre = 'Informe_Final';
                    $tipo   = 2;
                }
                if (request('tipo_archivo') == 4) {
                    $nombre = 'Guia_despacho';
                    $tipo   = 4;
                }
                if (request('tipo_archivo') == 5) {
                    $nombre = 'Otro';
                    $tipo   = 5;
                }
                if (request('tipo_archivo') == 6) {
                    $nombre = 'LPU';
                    $tipo   = 6;
                }
                if (request('tipo_archivo') == 7) {
                    $nombre = 'Mail';
                    $tipo   = 7;
                }
                if (request('tipo_archivo') == 8) {
                    $nombre = 'Carta_Adjudicacion';
                    $tipo   = 8;
                }
                if (request('tipo_archivo') == 9) {
                    $nombre = 'Informe_Parcial';
                    $tipo   = 9;
                }
                if (request('tipo_archivo') == 11) {
                    $nombre = $filename;
                    $tipo   = 11;
                }
                if (request('tipo_archivo') == 12) {
                    $nombre = 'Imagen informe fotografico';
                    $tipo   = 12;
                }
                if (request('tipo_archivo') == 13) {
                    $nombre = $filename;
                    $tipo   = 13;
                }
                if (request('tipo_archivo') == 14) {
                    $nombre = $filename;
                    $tipo   = 14;
                }
                if (request('tipo_archivo') == 17) {
                    $nombre =  'Validacion_compras';
                    $tipo   = 17;
                }

                $a++;
                $tipoArchivo = Archivo::where('ticket_id', $id)->where('tipo_archivo_id', $tipo)->count();
                if ($tipoArchivo != 0) {
                    $a = $tipoArchivo + 1;
                }
                $filenames      = $id . '_' . $nombre . '(' . $a . ')' . '.' . $extension;
                $upload_success = $file->move($destinationPath, $filenames);

                $archivo                  = new Archivo;
                $archivo->nombre_archivo  = $filenames;
                $archivo->tipo_archivo_id = request('tipo_archivo');
                $archivo->ticket_id       = $id;
                $archivo->extension = $extension;
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
                                $archivo->numero        = $a;
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

                if ($tipo == 1) {
                    $ticket             = Ticket::find($id);
                    $ticket->cotizacion = 1;
                    $ticket->save();
                }
                if ($tipo == 2) {
                    $ticket                = Ticket::find($id);
                    $ticket->informe_final = 1;
                    $ticket->save();
                }
                if ($tipo == 11) {
                    $ticket      = Ticket::find($id);
                    $ticket->pxq = 1;
                    $ticket->save();
                }
                if ($tipo == 14) {
                    $ticket      = Ticket::find($id);
                    $ticket->checklist = 1;
                    $ticket->save();
                }
                if ($tipo == 5) {
                    $ticket      = Ticket::find($id);
                    $ticket->otros = 1;
                    $ticket->save();
                }
                if ($tipo == 12) {
                    $ticket      = Ticket::find($id);
                    $ticket->fotos_informe_fotografico = 1;
                    $ticket->save();
                }
                if ($tipo == 13) {
                    $ticket      = Ticket::find($id);
                    $ticket->documento_denuncia = 1;
                    $ticket->save();
                }
            }

        }

        return;
    }

    public function ElminarArchivo($id)
    {
        $archivo = Archivo::find($id);

        $log                  = new Log;
        $log->ticket_id       = $archivo->ticket_id;
        $log->tipo_mensaje_id = 2;
        $log->descripcion     = 'Ticket Nro' . ' ' . $archivo->ticket_id . ' ' . 'Archivo eliminado, Nombre del archivo' . ' ' . $archivo->nombre_archivo;
        $log->user_id         = Auth::user()->id;
        $log->save();

        $idT = $archivo->ticket_id;
        if (file_exists('archivos/' . $archivo->nombre_archivo) == true) {

            unlink('archivos/' . $archivo->nombre_archivo);
        }

    
        $archivo->delete();

        return;

    }

    public function uploadFilesHalted(Request $request, $id)
    {

        $files           = $request->file('files');
        $destinationPath = 'archivos';
        if ($files != null) {
            $a = 0;
            foreach ($files as $file) {

                $filename  = $file->getClientOriginalname();
                $extension = $file->getClientOriginalExtension();

                $a++;
                $upload_success = $file->move($destinationPath, $filename);

                $archivo                 = new Archivo;
                $archivo->nombre_archivo = $filename;
                $archivo->halted_id      = $id;
                if ($extension == 'xls' || $extension == 'xlsx') {
                    $archivo->icono_archivo = "../logosEntel/exel.png";
                } else {
                    if ($extension == 'doc' || $extension == 'docx') {
                        $archivo->icono_archivo = "../logosEntel/doc3.png";
                    } else {
                        if ($extension == 'pdf' || $extension == 'PDF') {
                            $archivo->icono_archivo = "../logosEntel/nuevopdf2.png";
                        } else {
                            if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                                $archivo->numero        = $a;
                                $archivo->icono_archivo = "../logosEntel/img2.png";
                            }
                        }
                    }
                }

                $archivo->save();

                $log              = new Log;
                $log->halted_id   = $id;
                $log->descripcion = 'Halted Nro' . ' ' . $id . ' ' . 'Archivo cargado, Nombre del archivo' . ' ' . $filename;
                $log->user_id     = Auth::user()->id;
                $log->save();
            }

        }

        $id = \Crypt::encrypt($id);

        return redirect('/detalleHalted/' . $id);
    }

    public function ElminarArchivoHalted($id)
    {
        $archivo = Archivo::find($id);

        $log              = new Log;
        $log->halted_id   = $archivo->halted_id;
        $log->descripcion = 'Halted Nro' . ' ' . $archivo->halted_id . ' ' . 'Archivo eliminado, Nombre del archivo' . ' ' . $archivo->nombre_archivo;
        $log->user_id     = Auth::user()->id;
        $log->save();

        $idT = $archivo->halted_id;
        unlink('archivos/' . $archivo->nombre_archivo);
        $archivo->delete();
        $idt = \Crypt::encrypt($idT);

        return redirect('/detalleHalted/' . $idt);

    }

    public function searchArchivoTicket($id)
    {
        $archivos = Archivo::where('ticket_id', $id)->get();
        return $archivos;

    }

}

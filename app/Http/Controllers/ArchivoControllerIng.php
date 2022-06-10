<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Log_ingenieria;
use App\Ticket_ingenieria;
use App\Tipo_archivo;
use App\Archivo_ingenieria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchivoControllerIng extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 

    public function __construct()
    {
        Carbon::setLocale('es');
    }
    public function subidaArchivoIng(Request $request, $id)
    {
        try {
            $files           = $request->file('files');
            $destinationPath = 'TicketeraIngenieria/'.$id;

           
            if (!file_exists($destinationPath)) {
                \File::makeDirectory($destinationPath);
            }
           
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
                        $nombre         = 'LPU';
                        $tipo           = 6;
                        $ticket_ingenieria      = Ticket_ingenieria::find($id);
                        $ticket_ingenieria->lpu = 1;
                        if ($ticket_ingenieria->subproceso_id == 3) {
                            $ticket_ingenieria->proceso_id    = 1;
                            $ticket_ingenieria->subproceso_id = 12;
                        }
                        $ticket_ingenieria->monto_lpu = $request->monto_lpu;
                        $ticket_ingenieria->tipo_moneda_id = $request->tipo_moneda_id;

                  
                        $ticket_ingenieria->save();
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
                    if (request('tipo_archivo') == 10) {
                        $nombre = 'Informe_Mantencion';
                        $tipo   = 10;

                    }

                    if (request('tipo_archivo') == 15) {
                        $nombre                   = 'Informe_Ejecucion';
                        $tipo                     = 11;
                        $ticket_ingenieria                = Ticket_ingenieria::find($id);
                        $ticket_ingenieria->inf_ejecucion = 1;
                        if ($ticket_ingenieria->subproceso_id == 12) {
                            $ticket_ingenieria->proceso_id         = 2;
                            $ticket_ingenieria->subproceso_id      = 4;
                            $ticket_ingenieria->fecha_estado_ework = Carbon::now();
                        }

                        $ticket_ingenieria->save();
                    }

                    $a++;
                    $tipoArchivo = Archivo_ingenieria::where('ticket_id', $id)->where('tipo_archivo_id', $tipo)->count();
                    if ($tipoArchivo != 0) {
                        $a = $tipoArchivo + 1;
                    }
                    $filenames      = $id . '_' . $nombre . '(' . $a . ')' . '.' . $extension;
                    $upload_success = $file->move($destinationPath, $filenames);

                    $archivo                  = new Archivo_ingenieria;
                    $archivo->nombre_archivo  = $filenames;
                    $archivo->tipo_archivo_id = request('tipo_archivo');
                    $archivo->ticket_id    = $id;
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

                    $log                  = new Log_ingenieria;
                    $log->ticket_id    = $id;
                  
                    $log->descripcion     = 'Ticket Nro' . ' ' . $id . ' ' . 'Archivo cargado, Nombre del archivo' . ' ' . $filename;
                    $log->user_id         = Auth::user()->id;
                    $log->save();
                }

            }

            return;
        } catch (Exception $e) {
            return $e;
        }

    }
    public function getTipoArchivoIng()
    {
        $archivos = Tipo_archivo::get();
        return $archivos;
    }
    public function totalInformeejecucion($id)
    {
        $total = Archivo_ingenieria::where('ticket_id', $id)->where('tipo_archivo_id', 15)->count();
        return $total;
    }
    public function totalMail($id)
    {
        $total = Archivo_ingenieria::where('ticket_id', $id)->where('tipo_archivo_id', 7)->count();
        return $total;
    }
    public function totalCotizaciones($id)
    {
        $total = Archivo_ingenieria::where('ticket_id', $id)->where('tipo_archivo_id', 1)->count();
        return $total;
    }
    public function totalInformeFinal($id)
    {
        $total = Archivo_ingenieria::where('ticket_id', $id)->where('tipo_archivo_id', 2)->count();
        return $total;
    }
    public function totalguiaDespacho($id)
    {
        $total = Archivo_ingenieria::where('ticket_id', $id)->where('tipo_archivo_id', 4)->count();
        return $total;
    }
    public function totalotro($id)
    {
        $total = Archivo_ingenieria::where('ticket_id', $id)->where('tipo_archivo_id', 5)->count();
        return $total;
    }
    public function totallpu($id)
    {
        $total = Archivo_ingenieria::where('ticket_id', $id)->where('tipo_archivo_id', 6)->count();
        return $total;
    }
    public function totaladjudicacion($id)
    {
        $total = Archivo_ingenieria::where('ticket_id', $id)->where('tipo_archivo_id', 8)->count();
        return $total;
    }
    public function totalinformeParcial($id)
    {
        $total = Archivo_ingenieria::where('ticket_id', $id)->where('tipo_archivo_id', 9)->count();
        return $total;
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
        $archivo = Archivo_ingenieria::find($id);

        $log               = new Log_ingenieria;
        $log->ticket_id = $archivo->ticket_id;

        $log->descripcion = 'Ticket Nro' . ' ' . $archivo->ticket_id . ' ' . 'Archivo eliminado, Nombre del archivo' . ' ' . $archivo->nombre_archivo;
        $log->user_id     = Auth::user()->id;
        $log->save();

       
        if (file_exists('TicketeraIngenieria/'.$archivo->ticket_id .'/' . $archivo->nombre_archivo) == true) {

            unlink('TicketeraIngenieria/'.$archivo->ticket_id .'/' . $archivo->nombre_archivo);
        }

        $archivo->delete();

        return;
    }
}

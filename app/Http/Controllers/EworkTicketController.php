<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Elemento_ticket_ework;
use App\Log;
use App\PsaSolicitud;
use App\SolicitudSgc;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EworkTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $elementos = Elemento_ticket_ework::where('ticket_id', $id)->with('elemento')->get();
        return $elementos;
    }
    public function AddEwork(Request $request)
    {

        $ticket        = Ticket::find($request->id);
        $ticket->ework = $request->ework;
        $ticket->save();

        $log                  = new Log;
        $log->ticket_id       = $ticket->id;
        $log->tipo_mensaje_id = 1;
        $log->descripcion     = 'Nro:' . ' ' . $request->ework . ' ' . 'de Ework ingresado';
        $log->user_id         = Auth::user()->id;
        $log->save();

        $sgc = SolicitudSgc::where('ticket_id', $ticket->id)->count();

        if ($sgc != 0) {
            $sgc = SolicitudSgc::where('ticket_id', $ticket->id)->get();

            foreach ($sgc as $s) {
                $update        = SolicitudSgc::find($s->id);
                $update->ework = $request->ework;
                $update->save();
            }
        }

        $psa = PsaSolicitud::where('ticket_id', $ticket->id)->first();

        if ($psa) {
            $psa_update = PsaSolicitud::find($psa->id);

            $psa_update->ework = $request->ework;
            $psa_update->save();

        }
        return;
    }

    public function editEworkNumber(Request $request)
    {

        $ticket        = Ticket::find($request->id);
        $ticket->ework = $request->nro_ework;
        $ticket->save();

        $psa = PsaSolicitud::where('ticket_id', $ticket->id)->first();

        if ($psa) {
            $psa_update = PsaSolicitud::find($psa->id);

            $psa_update->ework = $request->nro_ework;
            $psa_update->save();
           

        }

        $log                  = new Log;
        $log->ticket_id       = $ticket->id;
        $log->tipo_mensaje_id = 1;
        $log->descripcion     = 'Nro de ework editado, nuevo número' . ' ' . $request->nro_ework;
        $log->user_id         = Auth::user()->id;
        $log->save();
        return;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function DeleteRecordElemento($id)
    {
        $elemento_ticket_ework   = Elemento_ticket_ework::find($id);
        $ticket                  = Ticket::find($elemento_ticket_ework->ticket_id);
        $ticket->prevalorizacion = $ticket->prevalorizacion - $elemento_ticket_ework->total;
        $ticket->save();
        $elemento_ticket_ework->delete();
        return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        if ($request->bateria != null) {
            $elemento_ticket_ework              = new Elemento_ticket_ework;
            $elemento_ticket_ework->elemento_id = 1;
            $elemento_ticket_ework->ticket_id   = $id;
            $elemento_ticket_ework->cantidad    = floatval($request->bateria);
            $elemento_ticket_ework->total       = floatval($request->MontoTotalBateria);
            $elemento_ticket_ework->save();

        }
        if ($request->GGEE != null) {
            $elemento_ticket_ework              = new Elemento_ticket_ework;
            $elemento_ticket_ework->elemento_id = 2;
            $elemento_ticket_ework->ticket_id   = $id;
            $elemento_ticket_ework->cantidad    = floatval($request->GGEE);
            $elemento_ticket_ework->total       = floatval($request->MontoTotalGgEe);
            $elemento_ticket_ework->save();

        }
        if ($request->aireAcondicionado != null) {
            $elemento_ticket_ework              = new Elemento_ticket_ework;
            $elemento_ticket_ework->elemento_id = 4;
            $elemento_ticket_ework->ticket_id   = $id;
            $elemento_ticket_ework->cantidad    = floatval($request->aireAcondicionado);
            $elemento_ticket_ework->total       = floatval($request->MontoTotalAire);
            $elemento_ticket_ework->save();

        }
        if ($request->fuenteRectificadora != null) {
            $elemento_ticket_ework              = new Elemento_ticket_ework;
            $elemento_ticket_ework->elemento_id = 5;
            $elemento_ticket_ework->ticket_id   = $id;
            $elemento_ticket_ework->cantidad    = floatval($request->fuenteRectificadora);
            $elemento_ticket_ework->total       = floatval($request->MontoTotalFuente);
            $elemento_ticket_ework->save();

        }
        if ($request->SelecImpacto == 1) {
            $elemento_ticket_ework              = new Elemento_ticket_ework;
            $elemento_ticket_ework->elemento_id = 3;
            $elemento_ticket_ework->ticket_id   = $id;
            if ($request->MontoSelecImpacto == 400000) {
                $elemento_ticket_ework->nivel_id = 1;
            } else {
                if ($request->MontoSelecImpacto == 1000000) {
                    $elemento_ticket_ework->nivel_id = 2;
                } else {
                    if ($request->MontoSelecImpacto == 3000000) {
                        $elemento_ticket_ework->nivel_id = 3;
                    }
                }
            }

            $elemento_ticket_ework->total = floatval($request->MontoSelecImpacto);
            $elemento_ticket_ework->save();

        }

        if ($request->SelectOtroInput == 1) {
            $elemento_ticket_ework              = new Elemento_ticket_ework;
            $elemento_ticket_ework->elemento_id = 6;
            $elemento_ticket_ework->ticket_id   = $id;
            $elemento_ticket_ework->descripcion = $request->Descripcionotro;
            if ($request->ValorOtroMontoSelect == 1) {
                $elemento_ticket_ework->total = 500000;
            } else {
                if ($request->ValorOtroMontoSelect == 2) {
                    $elemento_ticket_ework->total = 1000000;
                } else {

                }if ($request->ValorOtroMontoSelect == 3) {
                    $elemento_ticket_ework->total = 5000000;
                } else {
                    if ($request->ValorOtroMontoSelect == 4) {
                        $elemento_ticket_ework->total = 10000000;
                    }
                }
            }

            $elemento_ticket_ework->save();

        }

        $ticket = Ticket::find($id);
        if ($ticket->prevalorizacion != null) {
            $ticket->prevalorizacion = $ticket->prevalorizacion + floatval($request->valorTotal);
        } else {
            $ticket->prevalorizacion = floatval($request->valorTotal);
        }

        $ticket->save();

        $destinationPath = 'archivos';

        $files = $request->file('archivosElementoEwork');

        if ($files != null) {
            $a = 0;
            foreach ($files as $file) {
                $a++;
                $filename  = $file->getClientOriginalname();
                $extension = $file->getClientOriginalExtension();

                $tipoArchivo = Archivo::where('ticket_id', $ticket->id)->where('tipo_archivo_id', 12)->count();
                if ($tipoArchivo != 0) {
                    $a = $tipoArchivo + 1;
                }
                $filenames = $ticket->id . '_' . 'Inf.fotografico' . '(' . $a . ')' . '.' . $extension;

                $upload_success = $file->move($destinationPath, $filenames);

                $archivo                  = new Archivo;
                $archivo->nombre_archivo  = $filenames;
                $archivo->ticket_id       = $id;
                $archivo->tipo_archivo_id = 12;
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

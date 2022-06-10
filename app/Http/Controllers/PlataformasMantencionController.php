<?php

namespace App\Http\Controllers;

use App\Archivo_requisito_ticket;
use App\AreaRequisitoTicket;
use App\Plataforma;
use App\Plataforma_responsable;
use App\Prioridad;
use App\Ticket_requisito;
use App\Tipo_requisito;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Permiso_rol;
use App\role_user;

class PlataformasMantencionController extends Controller
{

    public function __construct()
    {

        Carbon::setLocale('es');
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisito  = Tipo_requisito::get();
        $prioridad  = Prioridad::get();
        $area       = AreaRequisitoTicket::get();
        $plataforma = Plataforma::get();
          $rolUser = role_user::where('user_id', Auth::user()->id)->get();
        foreach ($rolUser as $r) {
            $rol = $r->role_id;
        }
        $permisos = Permiso_rol::where('role_id', $rol)->where('permission_id', 147)->count();
        if ($permisos == 1) {
                return view('ticketPlataforma.index', compact('requisito', 'prioridad', 'area', 'plataforma'));
        } else {
            return view('errores.403');
        }

      
    }

    public function ArchivosTicketanida($id)
    {
        $archivo = Archivo_requisito_ticket::where('ticket_requisito_id', $id)->get();
        return $archivo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ticketsTrabajos(Request $request)
    {
        if (Auth::user()->id == 315 || Auth::user()->id == 314) {
            $tickets = Ticket_requisito::where('responsable_id', Auth::user()->id)->where('estado_id', $request->estado)->with('area', 'user', 'plataforma', 'responsable', 'tipo_requisito', 'prioridad', 'estado')->orderby('prioridad_id', 'desc')->paginate(4);
            return $tickets;
        }else{
             $tickets = Ticket_requisito::where('user_id', Auth::user()->id)->where('estado_id', $request->estado)->with('area', 'user', 'plataforma', 'responsable', 'tipo_requisito', 'prioridad', 'estado')->orderby('prioridad_id', 'desc')->paginate(4);
            return $tickets;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $responsable_plataforma = Plataforma_responsable::where('plataforma_id', $request->plataforma)->get();
        foreach ($responsable_plataforma as $r) {
            $responsableid = $r->responsable_id;
        }

        $ticket                    = new Ticket_requisito;
        $ticket->area_id           = $request->AreaSolicitante;
        $ticket->plataforma_id     = $request->plataforma;
        $ticket->responsable_id    = $responsableid;
        $ticket->tipo_requisito_id = $request->requisito;
        $ticket->prioridad_id      = $request->prioridad;
        $ticket->descripcion       = $request->descripcion;
        $ticket->user_id           = Auth::user()->id;
        $ticket->estado_id         = 1;
        $ticket->fecha_validacion  = Carbon::now();
        $ticket->save();

        $files           = $request->file('Documento');
        $destinationPath = 'evidencia';
        if ($files != null) {
            $a = 0;
            foreach ($files as $file) {

                $filename  = $file->getClientOriginalname();
                $extension = $file->getClientOriginalExtension();

                if ($extension == 'xls' || $extension == 'xlsx') {

                    $tipo = 1;
                } else {
                    if ($extension == 'doc' || $extension == 'docx') {

                        $tipo = 2;
                    } else {
                        if ($extension == 'pdf' || $extension == 'PDF') {

                            $tipo = 3;
                        } else {
                            if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {

                                $tipo = 4;
                            }
                        }
                    }
                }

                $a++;
                $tipoArchivo = Archivo_requisito_ticket::where('ticket_requisito_id', $ticket->id)->where('tipo_archivo_id', $tipo)->count();
                if ($tipoArchivo != 0) {
                    $a = $tipoArchivo + 1;
                }
                $filenames      = $ticket->id . '_' . $filename;
                $upload_success = $file->move($destinationPath, $filenames);

                $archivo                  = new Archivo_requisito_ticket;
                $archivo->nombre_archivo  = $filenames;
                $archivo->tipo_archivo_id = $tipo;

                $archivo->ticket_requisito_id = $ticket->id;

                if ($extension == 'xls' || $extension == 'xlsx') {
                    $archivo->icono_archivo = "/logosEntel/exel.png";

                } else {
                    if ($extension == 'doc' || $extension == 'docx') {
                        $archivo->icono_archivo = "/logosEntel/doc3.png";

                    } else {
                        if ($extension == 'pdf' || $extension == 'PDF') {
                            $archivo->icono_archivo = "/logosEntel/nuevopdf2.png";
                            $tipo                   = 3;
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
        return redirect('/PlataformaTicket');
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

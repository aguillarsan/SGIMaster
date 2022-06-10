<?php

namespace App\Http\Controllers;

use App\Exports\ClimaExport;
use App\Exports\ClimaExportCrm;
use App\Exports\DetalleFechasSgcExport;
use App\Exports\InputacionTicketExport;
use App\Exports\NorteExport;
use App\Exports\OOCCExport;
use App\Exports\OOCCExportCrm;
use App\Exports\PepExport;
use App\Exports\ResagoExport;
use App\Exports\SgcAllExport;
use App\Exports\SgcIngAllExportSheets;
use App\Exports\SgcIngIngExport;
use App\Exports\SgcIngOymExport;
use App\Exports\SolicitudExportPsa;
use App\Exports\TicektFilterExport;
use App\Exports\TicketAllExport;
use App\Exports\TicketCursoExport;
use App\Exports\TicketFinExport;
use App\Exports\TpTicketIngenieriaExport;
use App\Exports\SolicitudAqExport;
use App\Exports\SolicitudesSgcOOCCExport;
use Illuminate\Support\Facades\Auth;
use  App\Ticket_ingenieria;
use Carbon\Carbon;
use Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{

    public function __construct()
    {

        Carbon::setLocale('es');
    }

    public function exportSgcOOCC()
    {
        $date = Carbon::now()->toDateTimeString();
        return Excel::download(new SolicitudesSgcOOCCExport, 'Solicitudes_' . $date . '.xlsx');
    }
    public function download()
    {
        $date = Carbon::now()->toDateTimeString();
        return Excel::download(new TicketAllExport, 'Tickets_' . $date . '.xlsx');
    }

    public function reporteAq()
    {
        $date = Carbon::now()->toDateTimeString();
        return Excel::download(new SolicitudAqExport, 'Sgc' . $date . '.xlsx');
    }


    public function reporteTpTicketIngenieria()
    {
     
        $date = Carbon::now()->format('d-m-Y');
        return Excel::download(new TpTicketIngenieriaExport, 'Tickets_Ingenieria' . $date . '.' . 'xlsx');
    }
    public function ticketExcelResago()
    {
        $date = Carbon::now()->format('d-m-Y');
        return Excel::download(new ResagoExport, 'Tickets resago' . $date . '.' . 'xlsx');
    }
    public function SgcPmoControlIngExcelWithFilter(Request $request)
    {
        $date = Carbon::now()->format('d-m-Y');
        return Excel::download(new SgcIngAllExportSheets($request), 'Solicitudes_' . $date . '.' . 'xlsx');
    }
    public function SgcIngIngExcelWithFilter(Request $request)
    {
        $date = Carbon::now()->format('d-m-Y');
        return Excel::download(new SgcIngIngExport($request), 'Solicitudes_' . $date . '.' . 'xlsx');
    }
    public function SgcIngOymExcelWithFilter(Request $request)
    {
        if (Auth::user()->id == 83) {
            $date = Carbon::now()->format('d-m-Y');
            return Excel::download(new SgcAllExport($request), 'Solicitudes_' . $date . '.' . 'xlsx');
        } else {
            $date = Carbon::now()->format('d-m-Y');
            return Excel::download(new SgcIngOymExport($request), 'Solicitudes_' . $date . '.' . 'xlsx');
        }
    }
    public function SgcSolicitudFilterExcelAll(Request $request)
    {
        $date = Carbon::now()->format('d-m-Y');
        return Excel::download(new SgcAllExport($request), 'Solicitudes_' . $date . '.' . 'xlsx');
    }
    public function exportDataPep()
    {
        $date = Carbon::now()->format('d-m-Y');
        return Excel::download(new PepExport(), 'Peps' . $date . '.' . 'xlsx');
    }
    public function ExportSolicitudPsa()
    {
        $date = Carbon::now()->format('d-m-Y');
        return Excel::download(new SolicitudExportPsa, 'SolicitudesPsa_' . $date . '.' . 'xlsx');
    }
    public function downloadInputacion()
    {
        return Excel::download(new InputacionTicketExport, 'Inputaciones.xlsx');
    }
    public function downloadCurso()
    {
        return Excel::download(new TicketCursoExport, 'Curso.xlsx');
    }

    public function detalleCestaOCDasUser()
    {
        $date = Carbon::now()->format('d-m-Y');
        return Excel::download(new DetalleFechasSgcExport, 'Detalle_fecha_ingreso_' . $date . '.' . 'xlsx');
    }

    public function downloadFin()
    {
        return Excel::download(new TicketFinExport, 'Finalizadas.xlsx');
    }

    public function exportCrm($crm)
    {
        if ($crm == 1) {
            $name_sheet = 'Ticket_Crm_Norte.xlsx';
        } else {
            if ($crm == 2) {
                $name_sheet = 'Ticket_Crm_CentroNorte.xlsx';
            } else {
                if ($crm == 3) {
                    $name_sheet = 'Ticket_Crm_Metropolitano.xlsx';
                } else {
                    if ($crm == 4) {
                        $name_sheet = 'Ticket_Crm_CentroSur.xlsx';
                    } else {
                        if ($crm == 5) {
                            $name_sheet = 'Ticket_Crm_Sur.xlsx';
                        } else {
                            if ($crm == 6) {
                                $name_sheet = 'Ticket_Crm_Austral.xlsx';
                            }
                        }
                    }
                }
            }
        }

        return Excel::download(new NorteExport($crm), $name_sheet);
    }

    public function OOCC()
    {
        return Excel::download(new OOCCExport, 'tickets.xlsx');
    }

    public function Clima()
    {
        return Excel::download(new ClimaExport, 'ticekts.xlsx');
    }

    public function ClimaCrm($id)
    {
        return Excel::download(new ClimaExportCrm($id), 'CrmExportClima.xlsx');
    }

    public function ObrasCrm($id)
    {
        return Excel::download(new OOCCExportCrm($id), 'CrmExportOOCC.xlsx');
    }

    public function DonwloadTicketWithFilter(Request $request)
    {
        if ($request->modulo == 1) {
            $nombre = 'Ticekts_En_espera_';
        } else {
            if ($request->modulo == 2) {
                $nombre = 'Ticekts_En_curso_';
            } else {
                if ($request->modulo == 3) {
                    $nombre = 'Ticekts_En_Validación_';
                } else {
                    if ($request->modulo == 4) {
                        $nombre = 'Ticekts_Finalizadas_';
                    } else {

                        if ($request->vista == 9) {
                            $nombre = 'Reporte_General_Tickets_';
                        }
                    }
                }
            }
        }

        $date = Carbon::now()->format('d-m-Y');

        return Excel::download(new TicektFilterExport($request), $nombre . $date . '.xlsx');
    }
}

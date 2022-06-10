<?php

namespace App\Http\Controllers\Sgc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sgc\Trabajadores_acreditado;
use App\Imports\AcreditacionImport;
use App\Models\Sgc\Trabajador_solicitud;
use App\SolicitudSgc;
use Illuminate\Support\Facades\Auth;
use App\Ticket;
use App\Imports\CcSgpSsoMultipleSheet;
use App\Models\Sgc\Cumplimiento_global;
use Excel;

class AcreditationController extends Controller
{
    public function uploadData(Request $request)
    {
        config(['excel.import.startRow' => 6]);
        Excel::import(new AcreditacionImport, request()->file('file'));
    }
    public function uploadDataCumplimientoGlobal(Request $request)
    {
        
         Excel::import(new CcSgpSsoMultipleSheet, request()->file('file'));
      
    }

    public function getDataCumplimiento(Request $request){
       $cumplimiento = Cumplimiento_global::with('proveedor','cumplimiento')->orderBy('id','desc')->paginate(20);
       return $cumplimiento;
    }

    
    public function getDataEmployee(Request $request)
    {
        $employees = Trabajadores_acreditado::search()->with('proveedor', 'tipo_acreditacion')->paginate(20);
        $acreditados =  Trabajadores_acreditado::where('tipo_acreditacion_id', 1)->count();
        $no_acreditados =  Trabajadores_acreditado::where('tipo_acreditacion_id', 2)->count();
        $data = [
            'employees' => $employees,
            'acreditado' => $acreditados,
            'no_acreditado' => $no_acreditados
        ];
        return $data;
    }

    public function getDataEmployeeProveedor(Request $request)
    {
        $employees = Trabajadores_acreditado::search()->where('proveedor_id', $request->proveedor_id)->where('tipo_acreditacion_id', 1)->get();
        return $employees;
    }

    public function registerSgcEmployee(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        $solicitud  = new SolicitudSgc;
        $solicitud->first_request = 1;
        $solicitud->proveedor_id = $request->proveedor_id;
        $solicitud->user_id = Auth::user()->id;
        $solicitud->site_id = $ticket->site_id;
        $solicitud->proceso_id = 18;
        $solicitud->subestado_id = 20;
        $solicitud->ticket_id =   $ticket->id;
        $solicitud->limite_monto = 3;
        $solicitud->save();
        return  $solicitud->id;
    }

    public function registerEmployeeSgc(Request $request){
        $employee_solicitud = new Trabajador_solicitud;
        $employee_solicitud->solicitud_sgc_id = $request->solicitud_id;
        $employee_solicitud->trabajadores_acreditado_id = $request->employee_id;
        $employee_solicitud->save();
        return;
    }
}

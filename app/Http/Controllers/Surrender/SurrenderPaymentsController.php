<?php

namespace App\Http\Controllers\Surrender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surrender\Expense_type;
use App\Models\Surrender\Payment;
use App\Models\Surrender\State;
use App\Models\Surrender\Work_area;
use App\Models\Surrender\Payment_tp;
use App\Models\Surrender\Payment_detail;
use App\Models\Surrender\File;
use App\Models\Itos\Project_manager;
use Illuminate\Support\Facades\Auth;
use App\Exports\RendicionExport\Rendiciones;
use Carbon\Carbon;
use Excel;
class SurrenderPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getSurrenders(Request $request)
    {
        $registered_payment = Payment::count();
        if (Auth::user()->rol == 1 || Auth::user()->rol == 14) {
            $payment = Payment::filter()->with('user', 'site', 'project_manager', 'state', 'payment_detail.expense_type', 'payment_tp', 'file.type_file')->orderby('id', 'desc')->paginate(10);
            $total_payment = Payment::filter()->count();
            $total_payment_pending = Payment::filter()->where('state_id', 1)->count();
            $total_payment_pay = Payment::filter()->where('state_id', 2)->count();
            $data = [
                'payment' => $payment,
                'total_payment' => $total_payment,
                'total_payment_pending' => $total_payment_pending,
                'total_payment_pay' => $total_payment_pay,
                'registered_payment' =>$registered_payment
            ];
        }else{
            $payment = Payment::filter()->where('user_id',Auth::user()->id)->with('user', 'site', 'project_manager', 'state', 'payment_detail.expense_type', 'payment_tp', 'file.type_file')->orderby('id', 'desc')->paginate(10);
            $total_payment = Payment::filter()->where('user_id',Auth::user()->id)->count();
            $total_payment_pending = Payment::filter()->where('user_id',Auth::user()->id)->where('state_id', 1)->count();
            $total_payment_pay = Payment::filter()->where('user_id',Auth::user()->id)->where('state_id', 2)->count();
            $data = [
                'payment' => $payment,
                'total_payment' => $total_payment,
                'total_payment_pending' => $total_payment_pending,
                'total_payment_pay' => $total_payment_pay,
                'registered_payment' =>$registered_payment
            ];
        }

        return $data;
    }
    public function getDataform()
    {
        $expense_types = Expense_type::get();
        $project_managers  = Project_manager::get();
        $work_areas = Work_area::get();
        $data = [
            'expense_types' => $expense_types,
            'project_managers' => $project_managers,
            'work_areas' => $work_areas,
        ];
        return $data;
    }
    public function storePayment(Request $request)
    {
        $payment = new Payment;
        $payment->site_id = $request->site_id;
        $payment->pep = $request->pep;
        $payment->responsable_entel = $request->responsable_entel;
        $payment->project_manager_id = $request->project_manager_id;
        $payment->fecha_actividad = $request->fecha_actividad;
        $payment->fecha_fin = $request->fecha_fin;
        $payment->monto_total = $request->monto_total;
        $payment->work_area_id = $request->work_area_id;
        $payment->state_id = 1;
        $payment->user_id = Auth::user()->id;
        $payment->save();
        return $payment->id;
    }
    public function storePaymentTp(Request $request)
    {
        $payment_tp = new Payment_tp;
        $payment_tp->payment_id = $request->payment_id;
        $payment_tp->tp = $request->tp;
        $payment_tp->save();
        return;
    }
    public function storePaymentDetail(Request $request)
    {
        $payment_detail = new Payment_detail;
        $payment_detail->expense_type_id = $request->expense_type_id;
        $payment_detail->amount = $request->amount;
        $payment_detail->payment_id = $request->payment_id;
        $payment_detail->save();
        return;
    }
    public function storePaymentFiles(Request $request)
    {
        $new_path = "RendicionPagoFIles/" . $request->payment_id;
        if (!file_exists($new_path)) {
            \File::makeDirectory($new_path);
        }
        $file = $request->file('file');
        $payment_file = new File;
        $payment_file->name  = $file->getClientOriginalName();
        $payment_file->payment_id = $request->payment_id;
        $payment_file->type_file_id = $request->type_file;
        $payment_file->full_path = '/' . $new_path . '/' . $payment_file->name;
        $payment_file->save();

        $file->move($new_path,  $payment_file->name);

        return;
    }

    public function updateState(Request $request)
    {
        $payment =  Payment::find($request->payment_id);
        $payment->state_id = $request->state_id;
        $payment->save();
        return;
    }

    public function getFilters()
    {
        $project_managers  = Project_manager::get();
        $states  = State::get();
        $data = [

            'project_managers' => $project_managers,
            'states' => $states
        ];
        return $data;
    }
    public function exportData(){
        $date = Carbon::now()->toDateTimeString();
        return \Excel::download(new Rendiciones, 'Rendiciones_' . $date . '.xlsx');
    }
    public function addOc(Request $request){
        $payment =  Payment::find($request->payment_id);
        $payment->oc = $request->oc;
        $payment->save();
        return;
    }
}

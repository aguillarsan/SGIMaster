<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReportePep\DD_SAP;
use App\Imports\DDSapImport;
use App\Imports\SapOpeningReportsImport;
use App\Models\ReportePep\Sap_opening_reports;
use App\Imports\SapImport;
use App\Models\ReportePep\Sap;
use App\Imports\DetallePptoImport;
use App\Models\ReportePep\Detalle_ppto;
use App\Models\ReportePep\Reporte_ework;
use App\Models\ReportePep\Oc_sin_facturar;
use App\Models\ReportePep\Baterias_estado_once;
use App\Imports\ReporteEworkImport;
use App\Imports\OcSinFacturarImport;
use App\Imports\BateriasEstadoOnceMultipleSheet;
use App\Models\ReportePep\Base_reporte;
use App\SolicitudSgc;
use App\Site;
use App\Models\ReportePep\Head_tab_name;
use App\Exports\BaseDataExport;
use Carbon\Carbon;
use App\Models\ReportePep\Layout;
use App\Models\ReportePep\Layout_column;
use Illuminate\Support\Facades\Auth;
use App\Exports\LayoutConsolidadoExport;



use Excel;

class ddSapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function getHeadTabName($tab)
    // {
    //     $data = Head_tab_name::where('tab_id', $tab)->get();
    //     return $data;
    // }
    public function getDataReportOption($option)
    {
        if ($option == 1) {

            return $this->getDataDdSap($option);
        } else {
            if ($option == 2) {
                return $this->getDataSapOpeningReport($option);
            } else {
                if ($option == 3) {
                    return $this->getDataSap($option);
                } else {
                    if ($option == 4) {
                        return $this->getDetallePpto($option);
                    } else {
                        if ($option == 5) {
                            return $this->getDataEwork($option);
                        } else {
                            if ($option == 6) {
                                return $this->getDataOcSinFacturar($option);
                            } else {
                                if ($option == 7) {
                                    return $this->getDataBateriasEstadoOnce($option);
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function getDataDdSap($option)
    {
        $data = DD_SAP::paginate(20);
        $head = Head_tab_name::where('tab_id', $option)->get();
        $full_data = [
            'data' => $data,
            'head' => $head
        ];
        return $full_data;
    }
    public function getDataSapOpeningReport($option)
    {
        $data = Sap_opening_reports::paginate(20);
        $head = Head_tab_name::where('tab_id', $option)->get();
        $full_data = [
            'data' => $data,
            'head' => $head
        ];
        return $full_data;
    }
    public function getDataSap($option)
    {
        $data = Sap::paginate(20);
        $head = Head_tab_name::where('tab_id', $option)->get();
        $full_data = [
            'data' => $data,
            'head' => $head
        ];
        return $full_data;
    }
    public function getDetallePpto($option)
    {
        $data = Detalle_ppto::paginate(20);
        $head = Head_tab_name::where('tab_id', $option)->get();
        $full_data = [
            'data' => $data,
            'head' => $head
        ];
        return $full_data;
    }

    public function getDataEwork($option)
    {
        $data = Reporte_ework::paginate(20);
        $head = Head_tab_name::where('tab_id', $option)->get();
        $full_data = [
            'data' => $data,
            'head' => $head
        ];
        return $full_data;
    }
    public function getDataOcSinFacturar($option)
    {
        $data = Oc_sin_facturar::paginate(20);
        $head = Head_tab_name::where('tab_id', $option)->get();
        $full_data = [
            'data' => $data,
            'head' => $head
        ];
        return $full_data;
    }
    public function getDataBateriasEstadoOnce($option)
    {
        $data = Baterias_estado_once::paginate(20);
        $head = Head_tab_name::where('tab_id', $option)->get();
        $full_data = [
            'data' => $data,
            'head' => $head
        ];
        return $full_data;
    }
    public function getDataConsolidadoBaseReporte()
    {
        $data = Base_reporte::paginate(20);

        return $data;
    }








    public function importData(Request $request)
    {
        if ($request->current_tab == 1) {
            Excel::import(new DDSapImport, request()->file('file'));
        } else {
            if ($request->current_tab == 2) {
                Excel::import(new SapOpeningReportsImport, request()->file('file'));
            } else {
                if ($request->current_tab == 3) {
                    Excel::import(new SapImport, request()->file('file'));
                } else {
                    if ($request->current_tab == 4) {
                        Excel::import(new DetallePptoImport, request()->file('file'));
                    } else {
                        if ($request->current_tab == 5) {
                            Excel::import(new ReporteEworkImport, request()->file('file'));
                        } else {
                            if ($request->current_tab == 6) {
                                Excel::import(new OcSinFacturarImport, request()->file('file'));
                            } else {
                                if ($request->current_tab == 7) {

                                    Excel::import(new BateriasEstadoOnceMultipleSheet, request()->file('file'));
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function addDataBaseReport()
    {
        $mt1 = 2600000;
        $mt2 = 5300000;
        $mt3 = 32000000;
        $datas = \DB::connection('reports')->select('CALL sp_unir_reportes_data');

        foreach ($datas as $data) {
            $exist_data = Base_reporte::where('pep', $data->pep)->first();
            if ($exist_data) {
                $base_reporte =  Base_reporte::where('pep', $data->pep)->first();
            } else {
                $base_reporte = new Base_reporte;
            }

            $base_reporte->pep = $data->pep;
            $base_reporte->inicio_extremo = $data->date_extreme_start;
            $base_reporte->fin_extremo = $data->date_extreme_finish;
            $base_reporte->dias_vigencia = $data->dias_vigencia;
            $base_reporte->annio = $data->annio;
            $base_reporte->mes = $data->mes;
            $base_reporte->mes_n =  $data->mes_n;
            $base_reporte->estado_dd_sap = $data->estado_dd_sap;
            if ($data->presupuesto > $data->inversion_total_aperturada) {
                $base_reporte->dif_ppto =  $data->presupuesto - $data->inversion_total_aperturada;
            } else {
                $base_reporte->dif_ppto =   $data->inversion_total_aperturada - $data->presupuesto;
            }
            $base_reporte->ppto_sap = $data->presupuesto;
            $base_reporte->bateria = $data->bateria;
            $base_reporte->q_bateria = (int)$data->q_baterias;
            $base_reporte->teams = $data->teams;
            $base_reporte->total_bodega = $data->total_bodega;
            $base_reporte->total_servicio = $data->total_servicio;
            $base_reporte->total_activacion = $data->total_activacion;
            $base_reporte->inversion_total_aperturada = $data->inversion_total_aperturada;
            if ($data->monto_real_sap < $mt1) {
                $base_reporte->esfuerzo_id = 1;
            } else {
                if ($data->monto_real_sap > $mt1 && $data->monto_real_sap < $mt2) {
                    $base_reporte->esfuerzo_id = 2;
                } else {
                    if ($data->monto_real_sap > $mt2 && $data->monto_real_sap < $mt3) {
                        $base_reporte->esfuerzo_id = 3;
                    } else {
                        if ($data->monto_real_sap > $mt3) {
                            $base_reporte->esfuerzo_id = 4;
                        }
                    }
                }
            }

            $base_reporte->activacion_pendiente = $data->activacion == 0 ? $data->total_activacion :  0;
            $base_reporte->servicios = $data->servicios;
            $base_reporte->bodega =  $data->bodega;
            $base_reporte->real_sap = $data->monto_real_sap;
            $base_reporte->comprometido = $data->comprometido;
            $base_reporte->activacion = $data->activacion;
            if ($data->monto_real_sap != 0 &&  $data->presupuesto != 0) {
                $diferencia = round($data->monto_real_sap / $data->presupuesto, 2) * 100;
                if ($diferencia < 50) {
                    $base_reporte->rango_id = 1;
                } else {
                    if ($diferencia > 50 && $diferencia < 75) {
                        $base_reporte->rango_id = 2;
                    } else {
                        if ($diferencia > 75 && $diferencia < 90) {
                            $base_reporte->rango_id = 3;
                        } else {
                            if ($diferencia > 90) {
                                $base_reporte->rango_id = 4;
                            }
                        }
                    }
                }
                $base_reporte->porcentaje_ao =  $diferencia;
            }
            if ($data->bodega != 0 &&  $data->total_bodega != 0) {
                $percent_imp_mat = round($data->bodega / $data->total_bodega, 2) * 100;
                $base_reporte->imp_mat =  $percent_imp_mat;
            }
            $site = Site::where('nem_site', $data->nemonico)->first();
            if ($site) {
                $base_reporte->site_id = $site->id;
            }
            $base_reporte->disponible =  $data->presupuesto - $data->monto_real_sap - $data->comprometido - $base_reporte->activacion_pendiente;

            $base_reporte->total_validador_aprobar = SolicitudSgc::where('boleta', $base_reporte->pep)->where('proceso_id', 15)->where('subestado_id', 7)->count();
            $base_reporte->total_control_aprobar = SolicitudSgc::where('boleta', $base_reporte->pep)->where('proceso_id', 2)->where('subestado_id', 7)->count();
            $base_reporte->total_ingreso_oc =  SolicitudSgc::where('boleta', $base_reporte->pep)->where('proceso_id', 2)->where('subestado_id', 1)->count();
            $base_reporte->total_ingreso_cesta =  SolicitudSgc::where('boleta', $base_reporte->pep)->where('proceso_id', 2)->where('subestado_id', 6)->count();
            $base_reporte->total_autorizacion_oc =  SolicitudSgc::where('boleta', $base_reporte->pep)->where('proceso_id', 2)->where('subestado_id', 2)->count();
            $base_reporte->total_facturada =  SolicitudSgc::where('boleta', $base_reporte->pep)->where('proceso_id', 13)->where('subestado_id', 4)->count();
            $base_reporte->total_validador = SolicitudSgc::where('boleta', $base_reporte->pep)->where('proceso_id', 15)->count();
            $base_reporte->total_validador_rechazada = SolicitudSgc::where('boleta', $base_reporte->pep)->where('proceso_id', 15)->where('subestado_id', 8)->count();
            $base_reporte->total_control = SolicitudSgc::where('boleta', $base_reporte->pep)->where('proceso_id', 2)->count();
            $base_reporte->total_jefe_area_aprobar = SolicitudSgc::where('boleta', $base_reporte->pep)->where('proceso_id', 16)->where('subestado_id', 7)->count();
            $base_reporte->total_informe_final_guia_despacho = SolicitudSgc::where('boleta', $base_reporte->pep)->where('subestado_id', 3)->count() + SolicitudSgc::where('boleta', $base_reporte->pep)->where('subestado_id', 19)->count();
            $base_reporte->total_proveedor_por_facturar = SolicitudSgc::where('boleta', $base_reporte->pep)->where('proceso_id', 17)->where('subestado_id', 5)->count();
            $base_reporte->total_ingeniero_oym = SolicitudSgc::where('boleta', $base_reporte->pep)->where('proceso_id', 6)->count();


            $base_reporte->save();
        }
    }

    public function exportBaseReporte($layout_id)
    {
        
        $date = Carbon::now()->toDateTimeString();
        if ($layout_id != 1) {
            $layout = Layout::find($layout_id);
            
            $columns = Layout_column::where('layout_id', $layout->id)->with('head_tab_name')->get();
            $select = [];

            foreach ($columns as $column) {
                array_push($select, $column->head_tab_name->name_head);
            }

        
         
            $base = Base_reporte::get($select);
            return Excel::download(new LayoutConsolidadoExport ($base,$select),   $layout->name_layout . $date . '.xlsx');
        } else {
            if ($layout_id == 1) {
               
                return Excel::download(new BaseDataExport, 'Base reporte' . $date . '.xlsx');
            }
        }
    }

    public function getHeadNames()
    {
        $head = Head_tab_name::where('tab_id', 8)->get();
        return $head;
    }

    public function  storeLayout(Request $request)
    {
        $layout = new Layout;
        $layout->name_layout = $request->name_layout;
        $layout->user_id = Auth::user()->id;
        $layout->save();
        return $layout->id;
    }
    public function  storeLayoutColumns(Request $request)
    {
        $layout_column = new Layout_column;
        $layout_column->head_tab_name_id = $request->column_id;
        $layout_column->layout_id = $request->layout_id;
        $layout_column->save();
        return;
    }
    public function getAllLayouts()
    {
        $layouts = Layout::get();
        return  $layouts;
    }
}

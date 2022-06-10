<?php

namespace App\Http\Controllers;
use App\User;
class GetDataExcelController extends Controller
{
    public function getDataSgcCa()
    {

        $solicitudes = \DB::connection('sgc')->select('CALL proc_get_solcitudes');
        return response()->json($solicitudes);                                                     
    }
    public function getDataSgcNew()
    {

        $solicitudes = \DB::connection('sgc')->select('CALL SP_GET_DATOS_SOLICITUDES_C_A');
        return response()->json($solicitudes);                                                     
    }

}

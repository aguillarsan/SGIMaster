<?php

namespace App\Http\Controllers;

use App\Area_trabajo_sgc;
use App\Tipo_boleta;
use App\Tipo_gasto;
use App\Tipo_moneda;
use App\Tipo_trabajo;
use Illuminate\Support\Facades\Auth;
use App\User;

class DataFormSgcOym extends Controller
{
    public function GetDataForm()
    {
        $user = User::find(Auth::user()->id);
        $area = \Cache::remember('area', 3600, function () {
            return Area_trabajo_sgc::get(['id', 'area']);
        });
        $tipoTrabajo = Tipo_trabajo::get();
        
        if ($user->rol == 34) {
            $boleta = Tipo_boleta::whereIn('id',[8,9])->get();
        } else {
            $boleta = Tipo_boleta::get();
        }




        $gastos = \Cache::remember('tip_gasto', 3600, function () {
            return Tipo_gasto::get();
        });

        $modena = \Cache::remember('tip_moneda', 3600, function () {
            return Tipo_moneda::get();
        });

        $data = [
            'area' => $area,
            'tipoTrabajo' => $tipoTrabajo,
            'boleta' => $boleta,
            'gastos' => $gastos,
            'modena' => $modena
        ];

        return $data;
    }
}

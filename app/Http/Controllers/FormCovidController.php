<?php

namespace App\Http\Controllers;

use App\Covid;
use App\Proveedor;
use Illuminate\Http\Request;
use App\Exports\CovidExport;
use Excel;
class FormCovidController extends Controller
{
    public function index()
    {
        $proveedor = Proveedor::get();
        return view('covid.index', compact('proveedor'));
    }
    public function store(Request $request)
    {
        $formId = Covid::count();

        $form                               = new Covid;
        $form->id                           = $formId + 1;
        $form->nombre_completo              = $request->nombre;
        $form->mandante_entel               = $request->mandante;
        $form->actividad                    = $request->mandante;
        $form->temperatura_actual           = floatval($request->Temperatura);
        $form->dificultad_respirar          = $request->dificultad;
        $form->contacto_covid               = $request->contacto;
        $form->contacto_extranjero          = $request->extranjero;
        $form->contacto_paciente_confirmado = $request->paciente;
        $form->otros_sintomas               = $request->otrosSintomas;
        $form->tuvo_fiebre                  = $request->fiebre;
        $form->proveedor_id                 = $request->proveedor;
        $form->tipo_id                      = $request->tipo;
        $form->nro_tipo                     = $request->nrotipo;
        $form->save();
        return redirect('/FormCovid');
    }
    public function export(){
        return Excel::download(new CovidExport, 'Respuestas.xlsx');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_archivo;
use App\Archivo;
class TipoArchivoController extends Controller
{
    public function getTipoArchivos(){
       $tipo_archivos = Tipo_archivo::where('COD_TIPO_ARCHIVO','!=',9)->get();
       return $tipo_archivos;
    }

   
}

<?php

namespace App\Http\Controllers;

use App\ArchivoSgc;
use App\SolicitudSgc;
use App\Solicitud_monto;
use Illuminate\Http\Request;

class ArchivoSgcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $archivos = ArchivoSgc::where('nuevassolicitud_id', $id)->get(['nombre_archivo', 'class', 'tipo_archivo_id', 'id']);
        return $archivos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function totalCotizacionesSgc($id)
    {
        $data = [
            'cotizacion'         => ArchivoSgc::where('tipo_archivo_id', 1)->where('nuevassolicitud_id', $id)->count(['id']),
            'informe_final'      => ArchivoSgc::where('tipo_archivo_id', 2)->where('nuevassolicitud_id', $id)->count(['id']),
            'guia_despacho'      => ArchivoSgc::where('tipo_archivo_id', 4)->where('nuevassolicitud_id', $id)->count(['id']),
            'otros'              => ArchivoSgc::where('tipo_archivo_id', 5)->where('nuevassolicitud_id', $id)->count(['id']),
            'lpu'                => ArchivoSgc::where('tipo_archivo_id', 6)->where('nuevassolicitud_id', $id)->count(['id']),
            'carta_adjudicacion' => ArchivoSgc::where('tipo_archivo_id', 8)->where('nuevassolicitud_id', $id)->count(['id']),
            'informe_parcial'    => ArchivoSgc::where('tipo_archivo_id', 9)->where('nuevassolicitud_id', $id)->count(['id']),
            'mail'               => ArchivoSgc::where('tipo_archivo_id', 7)->where('nuevassolicitud_id', $id)->count(['id']),
            'validacion_compras'               => ArchivoSgc::where('tipo_archivo_id', 17)->where('nuevassolicitud_id', $id)->count(['id']),
        ];
        return $data;

    }

    public function updatedatainforme()
    {
        $solicitud = SolicitudSgc::where('id', '>=', 18433)->get();
        foreach ($solicitud as $s) {
            $archivo = ArchivoSgc::where('nuevassolicitud_id', $s->id)->where('tipo_archivo_id', 2)->first();
            if (!$archivo) {
                $s->informefinal = null;
                $s->save();
            }
        }
    }

    public function CopyFile()
    {
        $fichero = 'CartaData/informe_final_nuevo.docx';
         //LIBERACIÓN DE PAGO
        $solicitudes = SolicitudSgc::whereBetween('id', [18872,19003])->get(['id','activo_servicio']);
        foreach ($solicitudes as $solicitud) {
            $solicitud_monto = new Solicitud_monto;
            $solicitud_monto->solicitud_sgc_id = $solicitud->id;
            $solicitud_monto->user_id = 291;
            $solicitud_monto->monto_total = $solicitud->activo_servicio;
            $solicitud_monto->monto_solicitado_porcentaje = "100%";
            $solicitud_monto->monto_solicitado = $solicitud->activo_servicio;
            $solicitud_monto->monto_restante= 0;
            $solicitud_monto->estado=1;
            $solicitud_monto->save();
            

        }
      
        //SUBIDA MASIVA DE ARCHIVOS
        foreach ($solicitudes as $solicitud) {
            $new_name =  $solicitud->id . '_' . 'informe_final.docx';
            if (copy($fichero, 'archivosSgc/'.$new_name)) {
                $archivo                     = new ArchivoSgc;
                $archivo->nombre_archivo     =  $new_name;
                $archivo->tipo_archivo_id    = 2;
                $archivo->nuevassolicitud_id = $solicitud->id;
                $archivo->class              = 'far fa-file-word';
                $archivo->extension          = 'docx';

                $archivo->save();
                $s = SolicitudSgc::find($solicitud->id);
                $s->informefinal = 1;
                $s->save();
            }

        }
        return;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

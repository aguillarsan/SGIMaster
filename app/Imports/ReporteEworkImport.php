<?php

namespace App\Imports;

use App\Models\ReportePep\Reporte_ework;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReporteEworkImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        
        if ($row['fecha_siniestro'] != null && is_numeric($row['fecha_siniestro'])) {
            $UNIX_DATE = ($row['fecha_siniestro'] - 25569) * 86400;

            $timestamp     = strtotime("+1 day", $UNIX_DATE);
            $fecha_siniestro = date("Y-m-d", $timestamp);

          
            
        } else {
            $fecha_siniestro = $row['fecha_siniestro'];
        }

        if ($row['f_habilitacion'] != null) {
            $UNIX_DATE = ($row['f_habilitacion'] - 25569) * 86400;

            $timestamp     = strtotime("+1 day", $UNIX_DATE);
            $fecha_habilitacion = date("Y-m-d", $timestamp);
        } else {
            $fecha_habilitacion = null;
        }


        $ework_update = Reporte_ework::where('ework_id', $row['id'])->first();
        if ($ework_update) {
            $ework_update->nombre_solicitud = $row['nombre_solicitud'];
            $ework_update->estado_solicitud = $row['estado_solicitud'];
            $ework_update->nombre_solicitante = $row['nombre_solicitante'];
            $ework_update->unidad_solicitante = $row['unidad_solicitante'];
            $ework_update->usuario = $row['usuario'];
            $ework_update->activo_siniestrado = $row['activo_siniestrado'];
            $ework_update->fecha_siniestro = $fecha_siniestro;
            $ework_update->lugar = $row['lugar'];
            $ework_update->tipo_evento = $row['tipo_evento'];
            $ework_update->pep = $row['pep_creado'];
            $ework_update->nro_denuncia = $row['nro_denuncia'];
            $ework_update->total_reporte = $row['total_reporte'];
            $ework_update->valor_recuperado_seguro = $row['valor_recuperado_seguro'];
            $ework_update->tipo_sitio = $row['tipo_sitio'];
            $ework_update->pxq_completo = $row['pxq_completo'];
            $ework_update->boleta_red = $row['boleta_red'];
            $ework_update->id_reza = $row['id_rezago'];
            $ework_update->tipo_flujo = $row['tipo_flujo'];
            $ework_update->nombre_actividad = $row['nombre_actividad'];
            $ework_update->fecha_habilitacion = $fecha_habilitacion;
            $ework_update->unidad_ejecutora = $row['unidad_ejecutora'];
            $ework_update->save();
            return;
        } else {
            $ework = new Reporte_ework();
            $ework->ework_id = $row['id'];
            $ework->nombre_solicitud = $row['nombre_solicitud'];
            $ework->estado_solicitud = $row['estado_solicitud'];
            $ework->nombre_solicitante = $row['nombre_solicitante'];
            $ework->unidad_solicitante = $row['unidad_solicitante'];
            $ework->usuario = $row['usuario'];
            $ework->activo_siniestrado = $row['activo_siniestrado'];
            $ework->fecha_siniestro = $fecha_siniestro;
            $ework->lugar = $row['lugar'];
            $ework->tipo_evento = $row['tipo_evento'];
            $ework->pep = $row['pep_creado'];
            $ework->nro_denuncia = $row['nro_denuncia'];
            $ework->total_reporte = $row['total_reporte'];
            $ework->valor_recuperado_seguro = $row['valor_recuperado_seguro'];
            $ework->tipo_sitio = $row['tipo_sitio'];
            $ework->pxq_completo = $row['pxq_completo'];
            $ework->boleta_red = $row['boleta_red'];
            $ework->id_reza = $row['id_rezago'];
            $ework->tipo_flujo = $row['tipo_flujo'];
            $ework->nombre_actividad = $row['nombre_actividad'];
            $ework->fecha_habilitacion = $fecha_habilitacion;
            $ework->unidad_ejecutora = $row['unidad_ejecutora'];
            $ework->save();
            return;
        }
    }
}

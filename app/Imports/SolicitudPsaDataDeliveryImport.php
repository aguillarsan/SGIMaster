<?php

namespace App\Imports;

use App\Almacen;
use App\PsaSolicitud;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SolicitudPsaDataDeliveryImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try
        {
            $solicitudes = PsaSolicitud::where('id', $row['cod_solicitud'])->get();

            foreach ($solicitudes as $solicitud) {
                $solicitud_find = PsaSolicitud::find($solicitud->id);
                if ($solicitud_find->estado_id == 3) {
                    if ($row['pep_origen'] != null) {
                        $solicitud_find->pep_origen   = $row['pep_origen'];
                        $solicitud_find->subestado_id = 6;
                    }
                    if ($row['pep_destino'] != null) {
                        $solicitud_find->pep_destino  = $row['pep_destino'];
                        $solicitud_find->subestado_id = 7;
                    }
                    if ($row['nro_lote'] != null) {
                        $solicitud_find->lote         = $row['nro_lote'];
                        $solicitud_find->subestado_id = 8;
                    }
                    if ($row['cod_almacen'] != null) {
                        $alamcen_data = Almacen::where('cod_almacen', $row['cod_almacen'])->get();
                        foreach ($alamcen_data as $almacen) {
                            $al_id = $almacen->id;
                        }
                        $solicitud_find->almacen_id   = $al_id;
                        $solicitud_find->subestado_id = 9;
                    }
                    if ($row['nro_retiro'] != null) {
                        $solicitud_find->nro_pedido   = $row['nro_retiro'];
                        $solicitud_find->subestado_id = 10;
                    }
                    if ($row['nro_retiro'] != null) {
                        $solicitud_find->nro_pedido   = $row['nro_retiro'];
                        $solicitud_find->subestado_id = 10;
                    }
                    if ($row['id_pedido'] != null) {
                        $solicitud_find->pedido_id    = $row['id_pedido'];
                        $solicitud_find->subestado_id = 15;
                    }
                    if ($row['orden_servicio'] != null) {
                        $solicitud_find->os           = $row['orden_servicio'];
                        $solicitud_find->subestado_id = 16;
                    }
                    if ($row['nro_guia_despacho'] != null) {
                        $solicitud_find->nro_guia_despacho = $row['nro_guia_despacho'];
                        $solicitud_find->subestado_id      = 17;
                    }
                    if ($row['orden_traslado'] != null) {
                        $solicitud_find->orden_traslado = $row['orden_traslado'];
                        $solicitud_find->subestado_id      = 17;
                    }
                    $solicitud_find->save();
                }

            }

        } catch (Exception $e) {
            return $e;
        }

    }
}

<?php

namespace App\Imports;

use App\Activo;
use App\Capacidad;
use App\Marca;
use App\MotivoPsa;
use App\Oficina;
use App\PsaSolicitud;
use App\Site;
use App\PrioridadPsa;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PsaSolicitudImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try {
            $sitio = Site::where('nem_site', '=', $row['nemonico'])->get();
            foreach ($sitio as $s) {
                $site_id             = $s->id;
                $crm                 = $s->pop->comuna->zona->crm->id;
                $zonaId              = $s->pop->comuna->zona->id;
                $classification_type = $s->classification_type_id;

            }

            $activos = Activo::where('descripcion', '=', $row['activo'])->get();
            foreach ($activos as $a) {
                $activo_id = $a->id;
            }

            $marcas = Marca::where('descripcion', $row['marca'])->get();
            foreach ($marcas as $m) {
                $marca_id = $m->id;
            }

            $capacidades = Capacidad::where('descripcion', $row['capacidad'])->get();
            foreach ($capacidades as $c) {
                $capacidad_id = $c->id;
            }

            $motivos = MotivoPsa::where('descripcion', $row['motivo'])->get();
            foreach ($motivos as $m) {
                $motivo_id = $m->id;
            }

            if ($row['prioridad'] == 'SI') {
                $prioridad = 1;
                if ($row['nivel_prioridad'] != null) {
                    $niveles = PrioridadPsa::where('descripcion', $row['nivel_prioridad'])->get();
                    foreach ($niveles as $n) {
                        $nivel_id = $n->id;
                    }
                }
            } else {
                if ($row['prioridad'] == 'NO') {
                    $prioridad = 2;
                    $nivel_id  = null;
                } else {
                    if ($row['prioridad'] == null) {
                        $prioridad = 2;
                        $nivel_id  = null;
                    }
                }
            }

            $oficinas = Oficina::where('zona', $row['oficina'])->get();
            foreach ($oficinas as $o) {
                $oficina_id = $o->id;
            }

            $solicitud                        = new PsaSolicitud;
            $solicitud->site_id               = $site_id;
            $solicitud->oficina_id            = $oficina_id;
            $solicitud->activo_id             = $activo_id;
            $solicitud->total_activo          = $row['total_activo'];
            $solicitud->marca_id              = $marca_id;
            $solicitud->capacidad_id          = $capacidad_id;
            $solicitud->motivo_id             = $motivo_id;
            $solicitud->banco                 = $row['cantidad_bancos'];
            $solicitud->user_id               = Auth::user()->id;
            $solicitud->estado_id             = 1;
            $solicitud->subestado_id          = 14;
            $solicitud->prioridad_id          = $nivel_id;
            $solicitud->prioridad_solicitante = $prioridad;
            $solicitud->save();

        } catch (Exception $e) {
            return $e;
        }

    }
}

<?php

namespace App\Imports;

use App\Site;
use App\Ticket;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TicketRedCoreImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * 
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $sitio = Site::where('nem_site', '=', $row['nemonico'])->get();
        foreach ($sitio as $s) {
            $site_id             = $s->id;
            $crm                 = $s->pop->comuna->zona->crm->id;
            $zonaId              = $s->pop->comuna->zona->id;
            $classification_type = $s->classification_type_id;

        }

        $ticket                   = new Ticket;
        $ticket->site_id          = $site_id;
        $ticket->tipo_motivo_id   = $row['tipo_motivo_id'];
        $ticket->zona_id          = $zonaId;
        $ticket->crm_id           = $crm;
        $ticket->clasificacion_id = $classification_type;
        $ticket->descripcion      = $row['descripcion'];
        $ticket->tipo_mantencion_id = $row['tipo_mantencion_id'];
        $ticket->trimestre          = $row['trimestre'];
        $ticket->anio_mantencion = $row['anio_mantencion'];
        $ticket->estado_id = $row['estado_id'];
        $ticket->user_id = 2;
        $ticket->created_at = null;
        $ticket->save();
    }
}

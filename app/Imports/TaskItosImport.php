<?php

namespace App\Imports;

use App\Models\Itos\Event;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Site;
use App\Models\Itos\Project_manager;
use App\Models\Itos\Resource;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;

class TaskItosImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        //// FECHA INICIO
        $UNIX_fecha_inicio = ($row['fecha_inicio'] - 25569) * 86400;
        $timestamp     = strtotime("+1 day", $UNIX_fecha_inicio);
        $fecha_inicio = date("Y-m-d", $timestamp);
        //// FECHA TERMINO
        $UNIX_fecha_termino = ($row['fecha_termino'] - 25569) * 86400;
        $timestamp     = strtotime("+1 day", $UNIX_fecha_termino);
        $fecha_termino = date("Y-m-d", $timestamp);
        //// BUSQUEDA DE IDS
        $sitio = Site::where('nem_site', $row['sitio'])->first();
        $project_manager = Project_manager::where('name_manager', $row['jefe_de_proyecto'])->first();
        $resource = Resource::where('name_resource', $row['supervisor'])->first();
        //// REGISTRO DE ITO
        $ito = new Event();
        $ito->site_id = $sitio->id;
        $ito->site_id = $sitio->id;
        $ito->start = $fecha_inicio;
        $ito->end = $fecha_termino;
        $ito->title = $row['descripcion'];
        $ito->state_id = 1;
        $ito->project_manager_id = $project_manager->id;
        $ito->category_id = 1;
        $ito->resource_id = $resource->id;
        $ito->user_id = Auth::user()->id;
        $ito->pep = $row['pep'];
        $ito->tp = $row['tp'];
        $ito->save();
        return;
    }
}

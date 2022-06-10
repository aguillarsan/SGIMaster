<?php

namespace App\Exports;

use App\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TicketCursoExport implements FromCollection,   WithMapping , WithHeadings , ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function collection()
    {
    	$ticket =  Ticket::with('user', 'area', 'tecnica', 'equipo', 'site.pop.comuna.zona', 'crm', 'estado','tipo_motivo')->where('estado_id',2)

    	->orderBy('id', 'desc')
    	->get();
    	return $ticket;
    }

    public function map($ticket): array {
    	return[
    		$ticket->id,
    		$ticket->user->name.' '.$ticket->user->apellido,

    		$ticket->tipo_tecnologia == 1?$ticket->pop->nem_fijo:($ticket->tipo_tecnologia ==2?$ticket->pop->nem_movil:''),
    		$ticket->tipo_tecnologia ==1? 'FIJO':($ticket->tipo_tecnologia==2?'MOVIL':''),
    		$ticket->pop?$ticket->pop->nombre:'',

    		$ticket->pop && $ticket->pop->classification?$ticket->pop->classification->classification:'',
    		$ticket->pop && $ticket->pop->bafi == 1?'SI':'',
    		$ticket->pop?$ticket->pop->comuna->zona->zona:'',
    		$ticket->pop?$ticket->pop->comuna->zona->cod_zona:'',

    		$ticket->crm?$ticket->crm->crm:'',
    		$ticket->area?$ticket->area->descripcion:'',
    		$ticket->tecnica?$ticket->tecnica->descripcion:'',
    		$ticket->equipo?$ticket->equipo->descripcion:'',
    		$ticket->created_at?substr($ticket->created_at,8,-8).'/'.substr($ticket->created_at,5,-12).'/'.substr($ticket->created_at,0,-15):'SIN FECHA DE INICIO',
    		$ticket->fecha_compromiso?substr($ticket->fecha_compromiso,8,-8).'/'.substr($ticket->fecha_compromiso,5,-12).'/'.substr($ticket->fecha_compromiso,0,-15):'SIN FECHA DE TERMINO',
    		$ticket->estado?$ticket->estado->descripcion:'',
    		$ticket->tipo_motivo?$ticket->tipo_motivo->descripcion:'',
    		$ticket->descripcion



    	];
    }

    public function headings(): array{
    	return[
    		'COD TICKET',
    		'CREADOR',

    		'NEMONICO',
    		'TECNOLOGIA',
    		'NOMBRE',

    		'CATEGORIA',
    		'BAFI',
    		'ZONA',
    		'COD_ZONA',
    		'CRM',
    		'ÁREA',
    		'TECNICA',
    		'EQUIPO',
    		'FECHA DE INICIO',
    		'FECHA DE TERMINO',
    		'ESTADO',
    		'MOTIVO',
    		'DESCRIPCION'
    		
    	];
    }
}

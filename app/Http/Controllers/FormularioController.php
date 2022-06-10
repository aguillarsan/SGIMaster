<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Pop_imagen;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use PDF;

class FormularioController extends Controller
{

    public function __construct()
    {

        Carbon::setLocale('es');
        $this->middleware('auth');

    }

    public function exportPdf($id)
    {

        $ticket  = Ticket::find($id);
        $archivos = Archivo::where('ticket_id', $ticket->id)->get();

        $imagensite = Pop_imagen::where('site_id', $ticket->site->id)->count();

        if ($imagensite != 0) {

            $imagensite = Pop_imagen::where('site_id', $ticket->site->id)->get();

            foreach ($imagensite as $p) {
                $imagePath = $p->imagePath;
            }

      

            $pdf = PDF::loadView('pdf.informeFotografico', compact('ticket', 'archivos','imagePath'));
            return $pdf->download('Informe_Fotografico.pdf');

        } else {

            $src = 'https://maps.googleapis.com/maps/api/staticmap?center=' . $ticket->site->pop->latitude . ',' . $ticket->site->pop->longitude . '&markers=color:red%7Clabel:C%7C' . $ticket->site->pop->latitude . ',' . $ticket->site->pop->longitude . '&zoom=13&size=600x400&key=AIzaSyB9sCBS2cEpZvmMHGI-D-Re4WN6DHquDrc';

            $time      = time();
            $desFolder = 'FotosPop/';
            $imageName = $ticket->site->id . '_' . $ticket->site->nem_site . '_' . $ticket->site->nombre . '.PNG';
            $imagePath = $desFolder . $imageName;

            file_put_contents($imagePath, file_get_contents($src));

            $site_img            = new Pop_imagen;
            $site_img->imagePath = $imagePath;
            $site_img->site_id   = $ticket->site_id;

            $site_img->nombre_archivo = $imageName;
            $site_img->save();

           
            

            $pdf = PDF::loadView('pdf.informeFotografico', compact('ticket', 'archivos','imagePath'));
            return $pdf->download('Informe_Fotografico.pdf');
        }



       
    }
}

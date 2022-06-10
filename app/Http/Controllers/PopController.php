<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Area;
use App\crm_user;
use App\Equipo;
use App\Halted;
use App\Log;
use App\Pop;
use App\role_user;
use App\Site;
use App\SolicitudSgc;
use App\State_pop_halted;
use App\Ticket;
use App\Tipo_motivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Halted_costos;

class PopController extends Controller
{
    public function pop(Request $request, $id)
    {

        //TRANFORMACION DE DATOS DEL SITIO
        if (request('pop') != null) {
            $popid      = (int) substr(request('pop'), 0, 4);
            $tecnologia = (int) substr(request('pop'), -1);

            //BUSQUEDA DEL POP Y LUEGO DEL CRM
            $pop = Pop::find($popid);

            $crm = $pop->comuna->zona->crm->id;

            /////////////////////////////
        } else {
            $popid      = null;
            $tecnologia = null;
            $crm        = null;
        }
        $ticket                  = Ticket::find($id);
        $ticket->pop_id          = $popid;
        $ticket->tipo_tecnologia = $tecnologia;
        $ticket->crm_id          = $crm;
        $ticket->save();

        $log              = new Log;
        $log->ticket_id   = $id;
        $log->descripcion = 'Ticket Nro°' . ' ' . $ticket->id . ' ' . 'Editado, Sitio Ingresado, nombre' . ' ' . $ticket->pop->nombre;
        $log->user_id     = Auth::user()->id;
        $log->save();
        $id = \Crypt::encrypt($id);

        return redirect('/Tkc/' . $id);
    }
    public function AprobarSitio($id)
    {
        $sitio                      = Halted::find($id);
        $sitio->state_halted_id     = 2;
        $sitio->state_pop_halted_id = 8;
        $sitio->save();
        return;
    }

    public function total_sitios_tickets(Request $request)
    {
        $data = Ticket::selectRaw('count(id) as total,site_id')->with('site')->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->groupBy('site_id')
            ->orderBy('total', 'desc')->paginate(36);
        return $data;
    }

    public function lista()
    {
        //$halted = Halted::buscar()->where('state_halted_id',1)->orderBy('id','desc')->paginate(20);
        //$totalhalted = Halted::buscar()->where('state_halted_id',1)->count();
        //$totaloperativo = Halted::buscar()->where('state_halted_id',2)->count();
        return view('pop.lista');
    }
    public function get_ticket_site($id)
    {
        $ticket = Ticket::Where('site_id', $id)->with('tipo_motivo', 'estado', 'user')->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->get();
        return $ticket;
    }
    public function montos()
    {

        $sitios_id   = [1531, 1734, 1622, 1646, 6545, 4146, 1970, 2624, 6448, 6449, 7241, 6662, 6123, 6304, 6700, 5019, 6474, 6515, 6451, 6464, 6472, 6491, 6492, 6479, 6207, 2898, 9288, 6394, 6527, 6525, 6484, 6557, 6377, 6466, 6493, 1278, 6511, 14751743, 1805, 1809, 9241, 4906, 1081, 4874, 4927, 4957, 1630, 1712, 1615, 4096, 4007, 4494, 4719, 5292, 1879, 4785, 4561, 5896, 3905, 4087, 1962, 1970, 2862, 3004, 2874, 2126, 1281, 4886, 6476, 5440, 9423, 1366];
        $solicitudes = SolicitudSgc::whereIn('site_id', $sitios_id)->get();
        $array       = [];
        foreach ($solicitudes as $s) {
            $total = 0;
            if ($s->costos_activos != null) {
                $total = $s->costos_activos * $s->tipo_moneda->valor;
            }else{
                if($s->costos_servicios != null){
                     $total = $s->costos_servicios * $s->tipo_moneda->valor;
                }else{
                    if($s->activo_servicio != null){
                         $total = $s->activo_servicio * $s->tipo_moneda->valor;
                    }
                }
            }
            $data = [
                'id'    => $s->id,
                'total' => $total,
                'sitio' => $s->site->nem_site,
                'fecha' => date("Y", strtotime($s->created_at))
            ];
            array_push($array, $data);
        }

        foreach ($array as $a) {
            
           $halted_costos = new Halted_costos;
           $halted_costos->nem_site = $a['sitio'];
           $halted_costos->fecha = $a['fecha'];
           $halted_costos->sgc_id = $a['id'];
           $halted_costos->total = $a['total'];
           $halted_costos->save();
        }
        

        return;

    }
    public function GetStios()
    {

        $id = Auth::user()->id;

        $rol = role_user::where('user_id', $id)->select('role_id')->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }
/////////////

//BUSQUEDA DEL CRM

        $crm = crm_user::where('user_id', Auth::user()->id)->get();

        foreach ($crm as $c) {
            $crm_id = $c->crm_id;
        }

        if ($id == 11) {

            $sitio = Halted::userg()->buscar()->where('state_halted_id', 1)->with('user', 'area', 'site.pop.comuna.zona.crm', 'state_halted', 'state_pop_halted')->orderBy('id', 'desc')->get();
            return $sitio;
        }
        if ($RoleId == 12) {

            $sitio = Halted::buscar()->where('state_halted_id', 1)->where('crm_id', $crm_id)->with('user', 'area', 'site.pop.comuna.zona.crm', 'state_halted', 'state_pop_halted')->orderBy('id', 'desc')->get();
            return $sitio;
        }
        if ($RoleId == 1) {
            $sitio = Halted::buscar()->where('state_halted_id', 1)->with('user', 'area', 'site.pop.comuna.zona.crm', 'state_halted', 'state_pop_halted')->orderBy('id', 'desc')->get();
            return $sitio;
        }

    }

    public function GetSitiosOperativos()
    {
        $id = Auth::user()->id;

        $rol = role_user::where('user_id', $id)->select('role_id')->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }
/////////////

//BUSQUEDA DEL CRM

        $crm = crm_user::where('user_id', Auth::user()->id)->get();

        foreach ($crm as $c) {
            $crm_id = $c->crm_id;
        }

        if ($id == 11) {

            $sitio = Halted::userg()->buscar()->where('state_halted_id', 2)->with('user', 'area', 'site.pop.comuna.zona.crm', 'state_halted', 'state_pop_halted')->orderBy('id', 'desc')->get();
            return $sitio;
        }
        if ($RoleId == 12) {

            $sitio = Halted::buscar()->where('state_halted_id', 2)->where('crm_id', $crm_id)->with('user', 'area', 'site.pop.comuna.zona.crm', 'state_halted', 'state_pop_halted')->orderBy('id', 'desc')->get();
            return $sitio;
        }
        if ($RoleId == 1) {
            $sitio = Halted::buscar()->where('state_halted_id', 2)->with('user', 'area', 'site.pop.comuna.zona.crm', 'state_halted', 'state_pop_halted')->orderBy('id', 'desc')->get();
            return $sitio;
        }
    }

    public function index()
    {
        $area      = Area::get();
        $sitio     = Site::get();
        $motivo    = Tipo_motivo::get();
        $state_pop = State_pop_halted::get();
        $equipos   = Equipo::where('category_id', 1)->get();
        //CATIDAD DE HALTED POR ESTADO
        $halted    = Halted::where('state_halted_id', 1)->count();
        $operativo = Halted::where('state_halted_id', 2)->count();

        //CANTIDAD DE HALTED POR CRM NORTE
        $norteHalted    = Halted::where('crm_id', 1)->where('state_halted_id', 1)->count();
        $norteOperativo = Halted::where('crm_id', 1)->where('state_halted_id', 2)->count();

        //CANTIDAD DE HALTED POR CRM CENTRO NORTE
        $centronorteHalted    = Halted::where('crm_id', 2)->where('state_halted_id', 1)->count();
        $centronorteOperativo = Halted::where('crm_id', 2)->where('state_halted_id', 2)->count();

        //CANTIDAD DE HALTED POR CRM METROPOLITANO
        $metropolitanoHalted    = Halted::where('crm_id', 3)->where('state_halted_id', 1)->count();
        $metropolitanoOperativo = Halted::where('crm_id', 3)->where('state_halted_id', 2)->count();

        //CANTIDAD DE HALTED POR CRM CENTRO SUR
        $centrosurHalted    = Halted::where('crm_id', 4)->where('state_halted_id', 1)->count();
        $centrosurOperativo = Halted::where('crm_id', 4)->where('state_halted_id', 2)->count();

        //CANTIDAD DE HALTED POR CRM SUR
        $surHalted    = Halted::where('crm_id', 5)->where('state_halted_id', 1)->count();
        $surOperativo = Halted::where('crm_id', 5)->where('state_halted_id', 2)->count();

        //CANTIDAD DE HALTED POR CRM AUSTRAL
        $australHalted    = Halted::where('crm_id', 6)->where('state_halted_id', 1)->count();
        $australOperativo = Halted::where('crm_id', 6)->where('state_halted_id', 2)->count();

        return view('pop.index', compact('area', 'sitio', 'motivo', 'state_pop', 'halted', 'operativo', 'norteHalted', 'norteOperativo', 'centronorteHalted',
            'centronorteOperativo',
            'metropolitanoHalted',
            'metropolitanoOperativo',
            'centrosurHalted',
            'centrosurOperativo',
            'surHalted',
            'surOperativo',
            'australHalted',
            'australOperativo',
            'equipos'));
    }

    public function store(Request $request)
    {
        if (request('pop') != null) {

            //BUSQUEDA DEL POP Y LUEGO DEL CRM
            $site = Site::find(request('pop'));

            $crm = $site->pop->comuna->zona->crm->id;

            /////////////////////////////
        } else {
            $popid = null;

            $crm = null;
        }

        $halted = new Halted;

        $halted->site_id             = request('pop');
        $halted->tipo_problema       = request('problema');
        $halted->descripcion         = request('descripcion');
        $halted->fecha_inicio        = request('feiniciohalted');
        $halted->fecha_solucion      = request('fechasolucion');
        $halted->crm_id              = $crm;
        $halted->state_halted_id     = 1;
        $halted->state_pop_halted_id = request('state_pop_halted');
        $halted->user_id             = Auth::user()->id;
        $halted->area_id             = request('area');
        $halted->tecnica_id          = request('tecnica');
        $halted->equipo_id           = request('equipo');
        $halted->tipo_motivo_id      = request('motivo');
        $halted->save();

        $equipos = $request->input('ck');

        $cantidad = $request->input('cantidad');

        //if ($equipos != null) {
        // foreach ($equipos as $e) {

        // $equipement_ticket            = new Equipement_ticket;
        // $equipement_ticket->halted_id = $halted->id;
        // $equipement_ticket->equipo_id = $e;

        // $equipement_ticket->cantidad    = $cantidad[$e];

        // $equipement_ticket->save();

        //}

        // }

        $files           = $request->file('files');
        $destinationPath = 'archivos';
        if ($files != null) {
            $a = 0;
            foreach ($files as $file) {

                $filename  = $file->getClientOriginalname();
                $extension = $file->getClientOriginalExtension();

                $a++;
                $upload_success = $file->move($destinationPath, $filename);

                $archivo                 = new Archivo;
                $archivo->nombre_archivo = $filename;
                $archivo->ticket_id      = $halted->id;
                if ($extension == 'xls' || $extension == 'xlsx') {
                    $archivo->icono_archivo = "../logosEntel/exel.png";
                } else {
                    if ($extension == 'doc' || $extension == 'docx') {
                        $archivo->icono_archivo = "../logosEntel/doc3.png";
                    } else {
                        if ($extension == 'pdf' || $extension == 'PDF') {
                            $archivo->icono_archivo = "../logosEntel/nuevopdf2.png";
                        } else {
                            if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                                $archivo->numero        = $a;
                                $archivo->icono_archivo = "../logosEntel/img2.png";
                            }
                        }
                    }
                }

                $archivo->save();
            }
        }

        $log              = new Log;
        $log->halted_id   = $halted->id;
        $log->descripcion = 'Halted Nro' . ' ' . $halted->id . ' ' . 'Creado por' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido;
        $log->user_id     = Auth::user()->id;
        $log->save();

        return;
    }

    public function GetThisPops(Request $request)
    {

        $pop = Pop::where('nombre', 'like', "%" . $request->pop . "%")->where('net_type_id', 'like', "%" . $request->type . "%")->get();
        return $pop;
    }

    public function Getsite(Request $request)
    {

        $site = Site::where('nem_site', 'like', "%" . $request->datositio . "%")->orWhere('nombre', 'like', "%" . $request->datositio . "%")->get(['nem_site', 'nombre', 'id', 'pop_id']);
        return $site;
    }

    public function GetPop2($id)
    {

        $pop = Site::where('id', $id)->get();

        return $pop;
    }
}

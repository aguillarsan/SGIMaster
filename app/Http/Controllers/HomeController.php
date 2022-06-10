<?php

namespace App\Http\Controllers;

use App\Acces_user_module;
use App\crm_user;
use App\Inputacion;
use App\Permiso_rol;
use App\Pop;
use App\role_user;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Carbon::setLocale('es');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //BUSQUEDA DEL ROL

        $id = Auth::user()->id;

        $rol = role_user::where('user_id', Auth::user()->id)->get(['role_id']);

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }
        $permisos = Permiso_rol::where('role_id', $RoleId)->where('permission_id', 143)->count();

        if ($permisos != 0) {

            Acces_user_module::create([
                'user_id'   => Auth::user()->id,
                'modulo_id' => 1,

            ]);

            if ($RoleId == 22) {
                return view('vandalismo.index');
            }

            if (Auth::user()->id == 14) {

                $backlog    = Ticket::where('estado_id', 1)->where('especialista_id', 14)->count();
                $curso      = Ticket::where('estado_id', 2)->where('especialista_id', 14)->count();
                $validacion = Ticket::where('estado_id', 3)->where('especialista_id', 14)->count();
                $finalizada = Ticket::where('estado_id', 4)->where('especialista_id', 14)->count();

                //CANTIDAD TOTAL DE TICKETS POR CRM
                $total_norte         = Ticket::where('crm_id', 1)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->where('especialista_id', 14)->count(['id']);
                $total_centro_norte  = Ticket::where('crm_id', 2)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->where('especialista_id', 14)->count(['id']);
                $total_metropolitano = Ticket::where('crm_id', 3)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->where('especialista_id', 14)->count(['id']);
                $total_centro_sur    = Ticket::where('crm_id', 4)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->where('especialista_id', 14)->count(['id']);
                $total_sur           = Ticket::where('crm_id', 5)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->where('especialista_id', 14)->count(['id']);
                $total_austral       = Ticket::where('crm_id', 6)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->where('especialista_id', 14)->count(['id']);

                //CANTIDAD DE TICKET POR CR NORTE
                $norteback  = Ticket::where('crm_id', 1)->where('estado_id', 1)->where('especialista_id', 14)->count();
                $nortecurso = Ticket::where('crm_id', 1)->where('estado_id', 2)->where('especialista_id', 14)->count();
                $nortevali  = Ticket::where('crm_id', 1)->where('estado_id', 3)->where('especialista_id', 14)->count();
                $nortefin   = Ticket::where('crm_id', 1)->where('estado_id', 4)->where('especialista_id', 14)->count();
                //CANTIDAD DE TICKET POR CR CENTRO NORTE
                $centronorteback  = Ticket::where('crm_id', 2)->where('estado_id', 1)->where('especialista_id', 14)->count();
                $centronortecurso = Ticket::where('crm_id', 2)->where('estado_id', 2)->where('especialista_id', 14)->count();
                $centrovali       = Ticket::where('crm_id', 2)->where('estado_id', 3)->where('especialista_id', 14)->count();
                $centronortefin   = Ticket::where('crm_id', 2)->where('estado_id', 4)->where('especialista_id', 14)->count();
                //CANTIDAD DE TICKET POR CR METROPOLITANO
                $metropolitanoback  = Ticket::where('crm_id', 3)->where('estado_id', 1)->where('especialista_id', 14)->count();
                $metropolitanocurso = Ticket::where('crm_id', 3)->where('estado_id', 2)->where('especialista_id', 14)->count();
                $metrovali          = Ticket::where('crm_id', 3)->where('estado_id', 3)->where('especialista_id', 14)->count();
                $metropolitanofin   = Ticket::where('crm_id', 3)->where('estado_id', 4)->where('especialista_id', 14)->count();
                //CANTIDAD DE TICKET POR CR CENTRO SUR
                $centrosurback  = Ticket::where('crm_id', 4)->where('estado_id', 1)->where('especialista_id', 14)->count();
                $centrosurcurso = Ticket::where('crm_id', 4)->where('estado_id', 2)->where('especialista_id', 14)->count();
                $centrosurvali  = Ticket::where('crm_id', 4)->where('estado_id', 3)->where('especialista_id', 14)->count();
                $centrosurfin   = Ticket::where('crm_id', 4)->where('estado_id', 4)->where('especialista_id', 14)->count();
                //CANTIDAD DE TICKET POR CR SUR
                $surback  = Ticket::where('crm_id', 5)->where('estado_id', 1)->where('especialista_id', 14)->count();
                $surcurso = Ticket::where('crm_id', 5)->where('estado_id', 2)->where('especialista_id', 14)->count();
                $survali  = Ticket::where('crm_id', 5)->where('estado_id', 3)->where('especialista_id', 14)->count();
                $surfin   = Ticket::where('crm_id', 5)->where('estado_id', 4)->where('especialista_id', 14)->count();
                //CANTIDAD DE TICKET POR CR AUSTRAL
                $australback  = Ticket::where('crm_id', 6)->where('estado_id', 1)->where('especialista_id', 14)->count();
                $australcurso = Ticket::where('crm_id', 6)->where('estado_id', 2)->where('especialista_id', 14)->count();
                $australvali  = Ticket::where('crm_id', 6)->where('estado_id', 3)->where('especialista_id', 14)->count();
                $australfin   = Ticket::where('crm_id', 6)->where('estado_id', 4)->where('especialista_id', 14)->count();

                return view('dashboard', compact('backlog', 'curso', 'finalizada', 'norteback', 'nortecurso', 'nortefin', 'centronorteback', 'centronortecurso', 'centronortefin', 'metropolitanoback', 'metropolitanocurso', 'metropolitanofin', 'centrosurback', 'centrosurcurso', 'centrosurfin', 'surback', 'surcurso', 'surfin', 'australback', 'australcurso', 'australfin', 'nortevali', 'centrovali', 'metrovali', 'centrosurvali', 'survali', 'australvali', 'validacion', 'total_norte', 'total_centro_norte', 'total_metropolitano', 'total_centro_sur', 'total_sur', 'total_austral'));

            }

            /////////ESPECIALISTA OBRAS CIVILES//////////
            if (Auth::user()->id == 21) {

                $backlog    = Ticket::where('estado_id', 1)->where('especialista_id', 21)->count();
                $curso      = Ticket::where('estado_id', 2)->where('especialista_id', 21)->count();
                $validacion = Ticket::where('estado_id', 3)->where('especialista_id', 21)->count();
                $finalizada = Ticket::where('estado_id', 4)->where('especialista_id', 21)->count();

                //CANTIDAD TOTAL DE TICKETS POR CRM
                $total_norte         = Ticket::where('crm_id', 1)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->where('especialista_id', 21)->count(['id']);
                $total_centro_norte  = Ticket::where('crm_id', 2)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->where('especialista_id', 21)->count(['id']);
                $total_metropolitano = Ticket::where('crm_id', 3)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->where('especialista_id', 21)->count(['id']);
                $total_centro_sur    = Ticket::where('crm_id', 4)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->where('especialista_id', 21)->count(['id']);
                $total_sur           = Ticket::where('crm_id', 5)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->where('especialista_id', 21)->count(['id']);
                $total_austral       = Ticket::where('crm_id', 6)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->where('especialista_id', 21)->count(['id']);

                //CANTIDAD DE TICKET POR CR NORTE
                $norteback  = Ticket::where('crm_id', 1)->where('estado_id', 1)->where('especialista_id', 21)->count();
                $nortecurso = Ticket::where('crm_id', 1)->where('estado_id', 2)->where('especialista_id', 21)->count();
                $nortevali  = Ticket::where('crm_id', 1)->where('estado_id', 3)->where('especialista_id', 21)->count();
                $nortefin   = Ticket::where('crm_id', 1)->where('estado_id', 4)->where('especialista_id', 21)->count();

                //CANTIDAD DE TICKET POR CR CENTRO NORTE
                $centronorteback  = Ticket::where('crm_id', 2)->where('estado_id', 1)->where('especialista_id', 21)->count();
                $centronortecurso = Ticket::where('crm_id', 2)->where('estado_id', 2)->where('especialista_id', 21)->count();
                $centrovali       = Ticket::where('crm_id', 2)->where('estado_id', 3)->where('especialista_id', 21)->count();
                $centronortefin   = Ticket::where('crm_id', 2)->where('estado_id', 4)->where('especialista_id', 21)->count();

                //CANTIDAD DE TICKET POR CR METROPOLITANO
                $metropolitanoback  = Ticket::where('crm_id', 3)->where('estado_id', 1)->where('especialista_id', 21)->count();
                $metropolitanocurso = Ticket::where('crm_id', 3)->where('estado_id', 2)->where('especialista_id', 21)->count();
                $metrovali          = Ticket::where('crm_id', 3)->where('estado_id', 3)->where('especialista_id', 21)->count();
                $metropolitanofin   = Ticket::where('crm_id', 3)->where('estado_id', 4)->where('especialista_id', 21)->count();

                //CANTIDAD DE TICKET POR CR CENTRO SUR
                $centrosurback  = Ticket::where('crm_id', 4)->where('estado_id', 1)->where('especialista_id', 21)->count();
                $centrosurcurso = Ticket::where('crm_id', 4)->where('estado_id', 2)->where('especialista_id', 21)->count();
                $centrosurvali  = Ticket::where('crm_id', 4)->where('estado_id', 3)->where('especialista_id', 21)->count();
                $centrosurfin   = Ticket::where('crm_id', 4)->where('estado_id', 4)->where('especialista_id', 21)->count();

                //CANTIDAD DE TICKET POR CR SUR
                $surback  = Ticket::where('crm_id', 5)->where('estado_id', 1)->where('especialista_id', 21)->count();
                $surcurso = Ticket::where('crm_id', 5)->where('estado_id', 2)->where('especialista_id', 21)->count();
                $survali  = Ticket::where('crm_id', 5)->where('estado_id', 3)->where('especialista_id', 21)->count();
                $surfin   = Ticket::where('crm_id', 5)->where('estado_id', 4)->where('especialista_id', 21)->count();

                //CANTIDAD DE TICKET POR CR AUSTRAL
                $australback  = Ticket::where('crm_id', 6)->where('estado_id', 1)->where('especialista_id', 21)->count();
                $australcurso = Ticket::where('crm_id', 6)->where('estado_id', 2)->where('especialista_id', 21)->count();
                $australvali  = Ticket::where('crm_id', 6)->where('estado_id', 3)->where('especialista_id', 21)->count();
                $australfin   = Ticket::where('crm_id', 6)->where('estado_id', 4)->where('especialista_id', 21)->count();

                return view('dashboard', compact('backlog', 'curso', 'finalizada', 'norteback', 'nortecurso', 'nortefin', 'centronorteback', 'centronortecurso', 'centronortefin', 'metropolitanoback', 'metropolitanocurso', 'metropolitanofin', 'centrosurback', 'centrosurcurso', 'centrosurfin', 'surback', 'surcurso', 'surfin', 'australback', 'australcurso', 'australfin', 'nortevali', 'centrovali', 'metrovali', 'centrosurvali', 'survali', 'australvali', 'validacion', 'total_norte', 'total_centro_norte', 'total_metropolitano', 'total_centro_sur', 'total_sur', 'total_austral'));

            }
/////////////

           

            if ($RoleId == 16 || $RoleId == 1 || $RoleId == 7 || Auth::user()->id == 84 || Auth::user()->id == 83 ) {
                //CANTIDAD DE TICKET POR ESTADO
                $backlog    = Ticket::where('estado_id', 1)->count(['id']);
                $curso      = Ticket::where('estado_id', 2)->count(['id']);
                $validacion = Ticket::where('estado_id', 3)->count(['id']);
                $finalizada = Ticket::where('estado_id', 4)->count(['id']);

                //CANTIDAD TOTAL DE TICKETS POR CRM
                $total_norte         = Ticket::where('crm_id', 1)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->count(['id']);
                $total_centro_norte  = Ticket::where('crm_id', 2)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->count(['id']);
                $total_metropolitano = Ticket::where('crm_id', 3)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->count(['id']);
                $total_centro_sur    = Ticket::where('crm_id', 4)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->count(['id']);
                $total_sur           = Ticket::where('crm_id', 5)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->count(['id']);
                $total_austral       = Ticket::where('crm_id', 6)->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->count(['id']);

             
                //CANTIDAD DE TICKET POR CR NORTE
                $norteback  = Ticket::where('crm_id', 1)->where('estado_id', 1)->count(['id']);
                $nortecurso = Ticket::where('crm_id', 1)->where('estado_id', 2)->count(['id']);
                $nortevali  = Ticket::where('crm_id', 1)->where('estado_id', 3)->count(['id']);
                $nortefin   = Ticket::where('crm_id', 1)->where('estado_id', 4)->count(['id']);
                //CANTIDAD DE TICKET POR CR CENTRO NORTE
                $centronorteback  = Ticket::where('crm_id', 2)->where('estado_id', 1)->count(['id']);
                $centronortecurso = Ticket::where('crm_id', 2)->where('estado_id', 2)->count(['id']);
                $centrovali       = Ticket::where('crm_id', 2)->where('estado_id', 3)->count(['id']);
                $centronortefin   = Ticket::where('crm_id', 2)->where('estado_id', 4)->count(['id']);
                //CANTIDAD DE TICKET POR CR METROPOLITANO
                $metropolitanoback  = Ticket::where('crm_id', 3)->where('estado_id', 1)->count(['id']);
                $metropolitanocurso = Ticket::where('crm_id', 3)->where('estado_id', 2)->count(['id']);
                $metrovali          = Ticket::where('crm_id', 3)->where('estado_id', 3)->count(['id']);
                $metropolitanofin   = Ticket::where('crm_id', 3)->where('estado_id', 4)->count(['id']);
                //CANTIDAD DE TICKET POR CR CENTRO SUR
                $centrosurback  = Ticket::where('crm_id', 4)->where('estado_id', 1)->count(['id']);
                $centrosurcurso = Ticket::where('crm_id', 4)->where('estado_id', 2)->count(['id']);
                $centrosurvali  = Ticket::where('crm_id', 4)->where('estado_id', 3)->count(['id']);
                $centrosurfin   = Ticket::where('crm_id', 4)->where('estado_id', 4)->count(['id']);
                //CANTIDAD DE TICKET POR CR SUR
                $surback  = Ticket::where('crm_id', 5)->where('estado_id', 1)->count(['id']);
                $surcurso = Ticket::where('crm_id', 5)->where('estado_id', 2)->count(['id']);
                $survali  = Ticket::where('crm_id', 5)->where('estado_id', 3)->count(['id']);
                $surfin   = Ticket::where('crm_id', 5)->where('estado_id', 4)->count(['id']);
                //CANTIDAD DE TICKET POR CR AUSTRAL
                $australback  = Ticket::where('crm_id', 6)->where('estado_id', 1)->count(['id']);
                $australcurso = Ticket::where('crm_id', 6)->where('estado_id', 2)->count(['id']);
                $australvali  = Ticket::where('crm_id', 6)->where('estado_id', 3)->count(['id']);
                $australfin   = Ticket::where('crm_id', 6)->where('estado_id', 4)->count(['id']);

                return view('dashboard', compact('backlog', 'curso', 'finalizada', 'norteback', 'nortecurso', 'nortefin', 'centronorteback', 'centronortecurso', 'centronortefin', 'metropolitanoback', 'metropolitanocurso', 'metropolitanofin', 'centrosurback', 'centrosurcurso', 'centrosurfin', 'surback', 'surcurso', 'surfin', 'australback', 'australcurso', 'australfin', 'nortevali', 'centrovali', 'metrovali', 'centrosurvali', 'survali', 'australvali', 'validacion', 'total_norte', 'total_centro_norte', 'total_metropolitano', 'total_centro_sur', 'total_sur', 'total_austral'));
            } else {
                $id = 9;
                return redirect('/ticketblade/' . $id);
            }
        } else {
            return view('errores.403');
        }

    }

    public function rechazadaView()
    {
        return view('rechazadas');
    }

    public function rechazadas()
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
///////

        $sitio = Pop::get();

        $inputaciones = Inputacion::get();

        if ($RoleId == 5) {

            $tickets = Ticket::where('estado_id', 9)->with('user', 'area', 'site.pop.comuna.zona', 'crm', 'estado', 'tipo_motivo')->orderBy('id', 'desc')->get();

            return $tickets;
        }

        if ($id == 11) {
            $tickets = Ticket::where('estado_id', 9)->with('user', 'area', 'site.pop.comuna.zona', 'crm', 'estado', 'tipo_motivo')->orderBy('id', 'desc')->get();

            return $tickets;

        }
        if ($crm_id == 7 || $RoleId == 16) {

            $tickets = Ticket::where('estado_id', 9)->with('user', 'area', 'site.pop.comuna.zona', 'crm', 'estado', 'tipo_motivo')->orderBy('id', 'desc')->get();

            return $tickets;
        } else {
            if ($RoleId == 12) {
                $tickets = Ticket::where('estado_id', 9)->with('user', 'area', 'site.pop.comuna.zona', 'crm', 'estado', 'tipo_motivo')->orderBy('id', 'desc')->get();

                return $tickets;
            } else {
                $tickets = Ticket::where('estado_id', 9)->with('user', 'area', 'site.pop.comuna.zona', 'crm', 'estado', 'tipo_motivo')->orderBy('id', 'desc')->get();

                return $tickets;
            }

        }

    }
}

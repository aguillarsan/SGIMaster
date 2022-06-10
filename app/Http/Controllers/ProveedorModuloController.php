<?php

namespace App\Http\Controllers;

use App\Configuracion_user;
use App\Proveedor;
use App\Providers_Pre_Tickets;
use App\role_user;
use App\SolicitudSgc;
use App\User;
use App\LogProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProveedorModuloController extends Controller
{
    public function index()
    {
        $rol = role_user::where('user_id', Auth::user()->id)->get(['role_id']);

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }
        return view('provider_ticket.index', compact('RoleId'));
    }

    public function getJobCreated()
    {

        $rol = role_user::where('user_id', Auth::user()->id)->get(['role_id']);

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }

        if ($RoleId == 30) {
            $proveedor_info = Proveedor::where('RUT_PROVEEDOR', Auth::user()->username)->get();

            foreach ($proveedor_info as $p) {
                $p_id = $p->id;
            }

            $jobs = Providers_Pre_Tickets::where('proveedor_id', $p_id)->with([
                'user'                     => function ($query) {
                    $query->select('id', 'name', 'apellido');
                },
                'site'                     => function ($query) {
                    $query->select('id', 'nem_site', 'nombre');
                },

                'contactTypeJob'           => function ($query) {
                    $query->select('id', 'descripcion');
                },
                'providersPreTicketsState' => function ($query) {
                    $query->select('id', 'descripcion', 'color');
                },
                'typeJob'                  => function ($query) {
                    $query->select('id', 'descripcion', 'color');
                },
                'tipo_moneda' => function ($query) {
                         $query->select('id', 'moneda');
                    }
            ])->orderby('id', 'desc')->paginate((20), ['site_id', 'user_id', 'descripcion', 'providers_pre_tickets_state_id', 'contact_type_job_id', 'id', 'created_at', 'numero_cotizacion', 'type_job_id', 'fecha_ejecucion_trabajo', 'trabajo_realizado', 'visita_fuera_horario', 'activo', 'servicio','tipo_moneda_id']);
            $total_job     = Providers_Pre_Tickets::where('proveedor_id', $p_id)->count(['id']);
            $total_job_sgc = SolicitudSgc::where('proveedor_id', $p_id)->count(['id']);
            $data          = [
                'total_job' => $total_job,
                'jobs'      => $jobs,
                'total_sgc' => $total_job_sgc,
            ];
            return $data;
        } else {
            if ($RoleId == 12) {
                $jobs = Providers_Pre_Tickets::with([
                    'user'                     => function ($query) {
                        $query->select('id', 'name', 'apellido');
                    },
                    'site'                     => function ($query) {
                        $query->select('id', 'nem_site', 'nombre');
                    },

                    'contactTypeJob'           => function ($query) {
                        $query->select('id', 'descripcion');
                    },
                    'providersPreTicketsState' => function ($query) {
                        $query->select('id', 'descripcion', 'color');
                    },
                    'typeJob'                  => function ($query) {
                        $query->select('id', 'descripcion', 'color');
                    },
                    'proveedor'                => function ($query) {
                        $query->select('id', 'PROVEEDOR', 'RUT_PROVEEDOR');
                    },
                    'tipo_moneda' => function ($query) {
                         $query->select('id', 'moneda');
                    }
                ])->where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate((20), ['site_id', 'user_id', 'descripcion', 'providers_pre_tickets_state_id', 'contact_type_job_id', 'id', 'created_at', 'numero_cotizacion', 'type_job_id', 'fecha_ejecucion_trabajo', 'trabajo_realizado', 'visita_fuera_horario', 'proveedor_id', 'activo', 'servicio','tipo_moneda_id']);

                $data = [

                    'jobs' => $jobs,

                ];
                return $data;
            } else {
                $jobs = Providers_Pre_Tickets::with([
                    'user'                     => function ($query) {
                        $query->select('id', 'name', 'apellido');
                    },
                    'site'                     => function ($query) {
                        $query->select('id', 'nem_site', 'nombre');
                    },

                    'contactTypeJob'           => function ($query) {
                        $query->select('id', 'descripcion');
                    },
                    'providersPreTicketsState' => function ($query) {
                        $query->select('id', 'descripcion', 'color');
                    },
                    'typeJob'                  => function ($query) {
                        $query->select('id', 'descripcion', 'color');
                    },
                    'proveedor'                => function ($query) {
                        $query->select('id', 'PROVEEDOR', 'RUT_PROVEEDOR');
                    },
                    'tipo_moneda' => function ($query) {
                         $query->select('id', 'moneda');
                    }
                ])->orderby('id', 'desc')->paginate((20), ['site_id', 'user_id', 'descripcion', 'providers_pre_tickets_state_id', 'contact_type_job_id', 'id', 'created_at', 'numero_cotizacion', 'type_job_id', 'fecha_ejecucion_trabajo', 'trabajo_realizado', 'visita_fuera_horario', 'activo', 'servicio', 'proveedor_id','tipo_moneda_id']);
                $total_job     = Providers_Pre_Tickets::count(['id']);
                $total_job_sgc = SolicitudSgc::count(['id']);
                $data          = [
                    'total_job' => $total_job,
                    'jobs'      => $jobs,
                    'total_sgc' => $total_job_sgc,
                ];
                return $data;
            }

        }

    }

    public function getsolicitudSgc(Request $request)
    {

        $rol = role_user::where('user_id', Auth::user()->id)->get(['role_id']);

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }

        if ($RoleId == 30) {
            $proveedor_info = Proveedor::where('RUT_PROVEEDOR', Auth::user()->username)->get();

            foreach ($proveedor_info as $p) {
                $p_id = $p->id;
            }

            $solicitudes = SolicitudSgc::buscar()->where('proveedor_id', $p_id)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo_ing')->orderby('id', 'desc')->paginate(20);
            return $solicitudes;
        } else {
            $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo_ing')->orderby('id', 'desc')->paginate(20);
            return $solicitudes;
        }

    }

    public function store(Request $request)
    {
        $proveedor_info = Proveedor::where('RUT_PROVEEDOR', Auth::user()->username)->get();

        foreach ($proveedor_info as $p) {
            $p_id = $p->id;
        }

        $pre_job                                 = new Providers_Pre_Tickets;
        $pre_job->site_id                        = $request->site_id;
        $pre_job->user_id                        = $request->user_id;
        $pre_job->contact_type_job_id            = $request->contact_type_id;
        $pre_job->descripcion                    = $request->descripcion;
        $pre_job->numero_cotizacion              = $request->nro_cotizacion;
        $pre_job->providers_pre_tickets_state_id = 1;
        $pre_job->proveedor_id                   = $p_id;
        $pre_job->type_job_id                    = $request->type_job_id;
        $pre_job->fecha_ejecucion_trabajo        = $request->date_executed;
        $pre_job->trabajo_realizado              = $request->job_executed;
        $pre_job->visita_fuera_horario           = $request->visit_after_hours;
        $pre_job->activo                         = $request->activo;
        $pre_job->servicio                       = $request->servicio;
        $pre_job->tipo_moneda_id                 = $request->tipo_moneda_id;
        $pre_job->save();
        return;

    }

    public function createAccounts()
    {
        $proveedores = Proveedor::get();
        foreach ($proveedores as $proveedor) {
            $user           = new User;
            $user->username = $proveedor->RUT_PROVEEDOR;
            $user->name     = $proveedor->PROVEEDOR;
            $user->email    = 'example@example.com';
            $user->avatar   = '../responsables/default.png';
            $user->estado   = 1;
            $user->password = Hash::make(substr($proveedor->RUT_PROVEEDOR, 0, 4));
            $user->save();

        }

    }

    public function setRolProveedor()
    {
        $users = User::where('id', '>=', 355)->get();
        foreach ($users as $user) {
            $role          = new role_user;
            $role->role_id = 30;
            $role->user_id = $user->id;
            $role->save();
        }

    }

    public function setConfigurationProveedor()
    {
        $users = User::where('id', '>=', 355)->get();
        foreach ($users as $user) {
            $confi                   = new Configuracion_user;
            $confi->configuracion_id = 1;
            $confi->user_id          = $user->id;
            $confi->save();
        }

    }

    public function updateJob(Request $request)
    {

        $job                                 = Providers_Pre_Tickets::find($request->pre_ticket_id);
        $job->providers_pre_tickets_state_id = 2;
        $job->save();
        $mensaje ='Trabajo aprobado.';
        $this->log($mensaje,$request->pre_ticket_id);
        return;
    }

    public function rejectedJob(Request $request){
        $job                                 = Providers_Pre_Tickets::find($request->job_id);
        $job->providers_pre_tickets_state_id = 4;
        $job->save();
        $this->log($request->motivo,$request->job_id);
        return;
    }

    public function log($mensaje,$id){
       $log = new LogProvider;
       $log->descripcion = $mensaje;
       $log->pre_sgc_id = $id;
       $log->user_id = Auth::user()->id;
       $log->save();
       return;
    }
}

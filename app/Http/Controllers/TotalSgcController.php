<?php

namespace App\Http\Controllers;

use App\crm_user;
use App\InteresadoSolicitud;
use App\SolicitudSgc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TotalSgcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetTotalIngOym()
    {
        $crm = crm_user::where('user_id', Auth::user()->id)->get(['crm_id']);

        foreach ($crm as $c) {
            $crm_id = $c->crm_id;
        }
        if (floatval(Auth::user()->id) === floatval(11)) {
            $data = [
                'creadas'       => SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->where('proceso_id', '!=', 14)->select('id')->count(['id']),
                'aprobar'       => SolicitudSgc::buscar()->where('id_crm', '!=', 1)->where('id_crm', '!=', 2)->where('id_crm', '!=', 3)->where('id_crm', '!=', 4)->where('proceso_id', 6)->where('subestado_id', 7)->count(['id']),
                'rechazadas'    => SolicitudSgc::buscar()->where('proceso_id', 6)->where('subestado_id', 8)->where('user_id', Auth::user()->id)->count(['id']),
                'informe_final' => SolicitudSgc::buscar()->filtroInfGuia()->where('proceso_id', 6)->where('user_id', Auth::user()->id)->count(['id']),
            ];

            return $data;
        } else {
            if (floatval(Auth::user()->id) === floatval(12)) {
                $data = [
                    'creadas'       => SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->where('proceso_id', '!=', 14)->select('id')->count(['id']),
                    'aprobar'       => SolicitudSgc::buscar()->where('id_crm', '!=', 1)->where('id_crm', '!=', 2)->where('id_crm', '!=', 3)->where('id_crm', '!=', 4)->where('proceso_id', 6)->where('subestado_id', 7)->count(['id']),
                    'rechazadas'    => SolicitudSgc::buscar()->where('proceso_id', 6)->where('subestado_id', 8)->where('user_id', Auth::user()->id)->count(['id']),
                    'informe_final' => SolicitudSgc::buscar()->filtroInfGuia()->where('proceso_id', 6)->where('user_id', Auth::user()->id)->count(['id']),
                ];

                return $data;
            } else {
                $data = [
                    'creadas'       => SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->where('proceso_id', '!=', 14)->select('id')->count(['id']),
                    'aprobar'       => SolicitudSgc::buscar()->where('id_crm', $crm_id)->where('proceso_id', 6)->where('subestado_id', 7)->count(['id']),
                    'rechazadas'    => SolicitudSgc::buscar()->where('proceso_id', 6)->where('subestado_id', 8)->where('user_id', Auth::user()->id)->count(['id']),
                    'informe_final' => SolicitudSgc::buscar()->filtroInfGuia()->where('proceso_id', 6)->where('user_id', Auth::user()->id)->count(['id']),
                ];

                return $data;
            }

        }

    }

    public function GetTotalOOCC(Request $request){
        $data = [
            'creadas'       => SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->where('proceso_id', '!=', 14)->select('id')->count(['id']),
           
            'rechazadas'    => SolicitudSgc::buscar()->where('proceso_id', 6)->where('subestado_id', 8)->where('user_id', Auth::user()->id)->count(['id']),
            'informe_final' => SolicitudSgc::buscar()->filtroInfGuia()->where('proceso_id', 6)->where('user_id', Auth::user()->id)->count(['id']),
        ];

        return $data;

    }
    public function GetTotalHistorialController(){
       $total =  SolicitudSgc::buscar()->count(['id']);
       return $total;
    }
    public function GetTotalCreada()
    {
       
        $data = [
            'total_validador'     => SolicitudSgc::buscar()->where('proceso_id', 15)->where('subestado_id', 7)->count(['id']),
            'historial'   => SolicitudSgc::buscar()->count(['id']),
            'total_jefe_area' => SolicitudSgc::buscar()->where('proceso_id', 16)->where('subestado_id', 7)->count(['id']),
            'control_aprobar_ingreso_cesta' =>SolicitudSgc::buscar()->where('proceso_id', 2)->where('subestado_id', 1)->where('subestado_id',6)->count(['id']) + SolicitudSgc::buscar()->where('proceso_id', 2)->where('subestado_id', 6)->count(['id']),
        ];

        return $data;
    }
    public function GetTotalPorAprobar()
    {
        $crm = crm_user::where('user_id', Auth::user()->id)->get();
        foreach ($crm as $c) {
            $crm_id = $c->crm_id;
        }
        if (floatval(Auth::user()->id) === floatval(11)) {
            $total = SolicitudSgc::buscar()->where('id_crm', '!=', 1)->where('id_crm', '!=', 2)->where('id_crm', '!=', 3)->where('id_crm', '!=', 4)->where('proceso_id', 6)->where('subestado_id', 7)->count(['id']);
            return $total;
        } else {
            $total = SolicitudSgc::buscar()->where('id_crm', $crm_id)->where('proceso_id', 6)->where('subestado_id', 7)->count(['id']);
            return $total;
        }

    }
    public function GetTotalCreadaZonal()
    {
        $data = [
            'creada'    => SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->where('proceso_id', '!=', 14)->count(['id']),
            'rechazada' => SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->where('proceso_id', 8)->where('subestado_id', 8)->count(['id']),
        ];

        return $data;
    }

    public function GetTotalCreadaElectrico()
    {
        $crm_user = crm_user::where('user_id', Auth::user()->id)->get();
        foreach ($crm_user as $crm) {
            $crm_id = $crm->crm_id;
        }
        $data = [
            'creada'    => SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->where('proceso_id', '!=', 14)->count(['id']),
            'rechazada' => SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->where('proceso_id', 7)->where('subestado_id', 8)->count(['id']),
            'aprobar'   => SolicitudSgc::buscar()->where('proceso_id', 7)->where('subestado_id', 7)->where('id_crm', $crm_id)->count(['id']),

        ];
        return $data;

    }

    public function GetTotalControIngInactivas()
    {
        $total = SolicitudSgc::buscar()->where('area_creadora_id', 1)->where('proceso_id', '!=', 1)->where('proceso_id', '!=', 2)->where('proceso_id', '!=', 3)->where('proceso_id', '!=', 4)->where('proceso_id', '!=', 5)->where('proceso_id', '!=', 6)->where('proceso_id', '!=', 7)->where('proceso_id', '!=', 8)->where('proceso_id', '!=', 9)->where('proceso_id', '!=', 10)->where('proceso_id', '!=', 11)->where('proceso_id', '!=', 12)->where('proceso_id', '!=', 15)->where('proceso_id', '!=', 16)->count(['id']);
        return $total;
    }
    public function GetTotalInactivasOym()
    {
        $total = SolicitudSgc::buscar()->where('proceso_id', '!=', 1)->where('proceso_id', '!=', 2)->where('proceso_id', '!=', 3)->where('proceso_id', '!=', 4)->where('proceso_id', '!=', 5)->where('proceso_id', '!=', 6)->where('proceso_id', '!=', 7)->where('proceso_id', '!=', 8)->where('proceso_id', '!=', 9)->where('proceso_id', '!=', 10)->where('proceso_id', '!=', 11)->where('proceso_id', '!=', 12)->where('proceso_id', '!=', 15)->where('proceso_id', '!=', 16)->count(['id']);
        return $total;
    }
    public function GetTotalHistorialOym()
    {
        $total = SolicitudSgc::buscar()->where('area_creadora_id', null)->count(['id']);
        return $total;
    }
    public function GetTotalHistorialIng()
    {
        $total = SolicitudSgc::buscar()->where('area_creadora_id', 1)->count(['id']);
        return $total;
    }
    public function GetTotalCrm()
    {

        if (Auth::user()->id == 9) {
            return SolicitudSgc::buscar()->where('id_crm', '!=', 1)->where('id_crm', '!=', 5)->where('id_crm', '!=', 3)->where('id_crm', '!=', 6)->count(['id']);
        } else {
            if (Auth::user()->id == 11) {
                return SolicitudSgc::buscar()->where('id_crm', '!=', 2)->where('id_crm', '!=', 3)->where('id_crm', '!=', 4)->count(['id']);
            } else {
                $crm = crm_user::where('user_id', Auth::user()->id)->get(['crm_id']);

                foreach ($crm as $c) {
                    $crm_id = $c->crm_id;
                }
                return SolicitudSgc::buscar()->where('id_crm', $crm_id)->count(['id']);
            }
        }
    }
    public function GetTotalRechazadasPmo()
    {
        $total = SolicitudSgc::buscar()->where('area_creadora_id', 1)->where('proceso_id', 11)->where('subestado_id', 8)->count(['id']);
        return $total;
    }
    public function GetTotalPorAprobarJefeArea()
    {
        $data = [
            'aprobar'     => SolicitudSgc::buscar()->where('proceso_id', 16)->where('subestado_id', 7)->count(['id']),
            'reachazadas' => SolicitudSgc::buscar()->where('proceso_id', 16)->where('subestado_id', 8)->count(['id']),
            'inactivas'   => SolicitudSgc::InactivaOym()->buscar()->count(['id']),
            'historial'   => SolicitudSgc::buscar()->where('area_creadora_id', null)->count(['id']),
        ];

        return $data;
    }
    public function GetTotalRechazadaJefeArea()
    {

    }
    public function GetTotalPorAprobarValidador()
    {
        $data = [
            'aprobar'    => SolicitudSgc::buscar()->where('proceso_id', 15)->where('subestado_id', 7)->count(['id']),
            'rechazadas' => SolicitudSgc::buscar()->where('proceso_id', 15)->where('subestado_id', 8)->count(['id']),
            'activas'    => SolicitudSgc::buscar()->where('proceso_id', '!=', 14)->where('proceso_id', '!=', 13)->count(['id']),
        ];

        return $data;
    }
    public function GetTotalRechazadaValidador()
    {
        $total = SolicitudSgc::buscar()->where('proceso_id', 15)->where('subestado_id', 8)->count(['id']);
        return $total;
    }
    public function GetTotalPorAprobarPmo()
    {
        $data = [
            'aprobar'   => SolicitudSgc::buscar()->where('area_creadora_id', 1)->where('proceso_id', 11)->where('subestado_id', 7)->count(['id']),
            'rechazada' => SolicitudSgc::buscar()->where('area_creadora_id', 1)->where('proceso_id', 11)->where('subestado_id', 8)->count(['id']),
            'activas'   => SolicitudSgc::buscar()->where('area_creadora_id', 1)->where('proceso_id', '!=', 13)->where('proceso_id', '!=', 14)->count(),
            'aprobadas_pmo'   => SolicitudSgc::buscar()->where('aprobador_pmo_id', Auth::user()->id)->count(),
        ];

        return $data;
    }
    public function GetTotalProyectosVinculadosIng()
    {
        $total = InteresadoSolicitud::where('user_id', Auth::user()->id)->count(['id']);
        return $total;
    }
    public function GetTotalActivasIng()
    {
        $data = [
            'activas'       => SolicitudSgc::buscar()->where('area_creadora_id', 1)->where('proceso_id', '!=', 13)->where('proceso_id', '!=', 14)->count(['id']),
            'aprobar'       => SolicitudSgc::buscar()->where('area_creadora_id', 1)->where('proceso_id', 11)->where('subestado_id', 7)->count(['id']),
            'total_control' => SolicitudSgc::buscar()->where('proceso_id', 2)->count(['id']),
            'inactivas_pmo' => SolicitudSgc::inactivaPmo()->buscar()->count(['id']),
        ];

        return $data;
    }
    public function GetTotalCreatedIng()
    {
        $data = [
            'creadas'    => SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->where('subestado_id', '!=', 8)->count(['id']),
            'rechazadas' => SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->where('proceso_id', 12)->where('subestado_id', 8)->count(['id']),
            'proyectos'  => InteresadoSolicitud::where('user_id', Auth::user()->id)->count(['id']),
            'activas'    => SolicitudSgc::buscar()->where('area_creadora_id', 1)->where('proceso_id', '!=', 13)->where('proceso_id', '!=', 14)->count(['id']),
        ];

        return $data;

    }

    public function GetTotalControl()
    {
        $data = [
            'total_control' => SolicitudSgc::buscar()->where('proceso_id', 2)->count(['id']),
            'aprobar'       => SolicitudSgc::buscar()->where('proceso_id', 2)->where('subestado_id', 7)->count(['id']),
            'rechazadas'    => SolicitudSgc::buscar()->where('proceso_id', 2)->where('subestado_id', 8)->count(['id']),
            'activas'       => SolicitudSgc::buscar()->where('proceso_id', '!=', 14)->where('proceso_id', '!=', 13)->count(['id']),
            'reclasificacion'       => SolicitudSgc::buscar()->where('proceso_id',  2)->where('subestado_id',  23)->count(['id']),

        ];

        return $data;
    }

    public function GetTotalRechazada()
    {
        $total = SolicitudSgc::buscar()->where('proceso_id', 6)->where('subestado_id', 8)->where('user_id', Auth::user()->id)->count(['id']);
        return $total;
    }
    public function GetTotalInformeFinal()
    {
        $total = SolicitudSgc::buscar()->where('proceso_id', 6)->where('subestado_id', 3)->where('user_id', Auth::user()->id)->count(['id']);
        return $total;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

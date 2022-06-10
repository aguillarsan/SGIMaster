<?php

namespace App\Http\Controllers;

use App\Almacen;
use App\ArchivosPsa;
use App\Cargo_user;
use App\Cod_sap;
use App\LogPsa;
use App\Negocio;
use App\Permission_role_psa;
use App\PsaSolicitud;
use App\role_user;
use App\Rol_user_psa;
use App\Site;
use App\Stock_bateria;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudPsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datosSolicitudPsa($id)
    {
        $solicitud = PsaSolicitud::where('id', $id)->with('site.pop.comuna.region', 'oficina', 'activo', 'capacidad', 'marca', 'estado', 'subestado', 'almacen', 'codSap', 'motivo')->get();
        return $solicitud;
    }
    public function GetAlmacenes()
    {
        $almacen = Almacen::get();
        return $almacen;
    }
    public function GetNegocio()
    {
        $negocio = Negocio::get();
        return $negocio;
    }
    public function GetFilesPsa($id)
    {
        $archivo = ArchivosPsa::where('solicitud_id', $id)->get();
        return $archivo;
    }
    public function receptionBaterias(Request $request)
    {
        $solicitud                             = PsaSolicitud::find(request('id'));
        $solicitud->cantidad_recepcionada      = request('cantidadRecivida');
        $solicitud->fecha_estimada_instalacion = request('fechaInstalacion');
        $solicitud->subestado_id               = 12;
        $solicitud->recepcion                  = 1;
        $solicitud->recepcionista_id           = Auth::user()->id;
        $solicitud->save();
        $log               = new LogPsa;
        $log->solicitud_id = $solicitud->id;
        $log->user_id      = Auth::user()->id;
        $log->descripcion  = 'Baterías recepcionadas, cantidad recepcionada:' . ' ' . request('cantidadRecivida') . ' ' . 'Fecha estimada de instalación:' . ' ' . request('fechaInstalacion');
        $log->save();
        return;
    }
    public function confirmacionInstlacion(Request $request)
    {
        try {
            $site = Site::find(request('pop'));

            $solicitud                           = PsaSolicitud::find($request->id);
            $solicitud->subestado_id             = 13;
            $solicitud->nombre_sitio_instalacion = $site->nem_site;
            $solicitud->fecha_instalacion        = Carbon::now();
            $solicitud->total_bateria_instalado = $request->total_bateria_instalada;
            $solicitud->save();

            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Instalación de baterías realizada';
            $log->save();

            $files = $request->file('files');

            $destinationPath = 'archivospsa';

            $a = 0;
            foreach ($files as $file) {

                $archivo   = new ArchivosPsa;
                $filename  = $file->getClientOriginalname();
                $extension = $file->getClientOriginalExtension();

                $a++;
                $upload_success = $file->move($destinationPath, $filename);

                $archivo->nombre_archivo = $filename;
                $archivo->solicitud_id   = $request->id;
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

                $log               = new LogPsa;
                $log->solicitud_id = $request->id;
                $log->descripcion  = 'solicitud Nro' . ' ' . $request->id . ' ' . 'Archivo cargado, Nombre del archivo' . ' ' . $filename;
                $log->user_id      = Auth::user()->id;
                $log->save();
            }

            return;
        } catch (Exception $e) {
            return $e;
        }

    }
    public function recepcionista($id)
    {
        $solicitud = PsaSolicitud::find($id);

        $recepcionista = User::where('id', $solicitud->recepcionista_id)->get();
        return $recepcionista;

    }
    public function addAlmacen(Request $request)
    {
        $solicitud = PsaSolicitud::find(request('id'));
        if ($solicitud->almacen_id != null) {
            $solicitud->almacen_id = request('almacen');

            $solicitud->save();

            $almacen           = Almacen::find(request('almacen'));
            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Almacen editado, Nro:' . ' ' . $almacen->cod_almacen;
            $log->save();
            return;
        } else {
            $solicitud->almacen_id   = request('almacen');
            $solicitud->subestado_id = 9;
            $solicitud->save();

            $almacen           = Almacen::find(request('almacen'));
            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Almacen ingresado, Nro:' . ' ' . $almacen->cod_almacen;
            $log->save();
            return;
        }

    }

    public function addNroPedido(Request $request)
    {
        $solicitud = PsaSolicitud::find(request('id'));
        if ($solicitud->nro_pedido != null) {
            $solicitud->nro_pedido = request('dato');

            $solicitud->save();
            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Nro de Pedido editado, Nro:' . ' ' . request('dato');
            $log->save();

        } else {
            $solicitud->nro_pedido   = request('dato');
            $solicitud->subestado_id = 10;
            $solicitud->save();
            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Nro de Pedido ingresado, Nro:' . ' ' . request('dato');
            $log->save();

        }
        if ($solicitud->activo_id == 1) {
            $stock = Stock_bateria::where('marca_id', $solicitud->marca_id)->where('capacidad_id', $solicitud->capacidad_id)->where('negocio_id', $solicitud->negocio_id)->get();
            foreach ($stock as $s) {
                $stockId = $s->id;
            }
            
        }
        return;

    }

    public function addIdPedido(Request $request)
    {
        $solicitud = PsaSolicitud::find(request('id'));
        if ($solicitud->pedido_id != null) {
            $solicitud->pedido_id = request('dato');

            $solicitud->save();
            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Id de Pedido editado, Nro:' . ' ' . request('dato');
            $log->save();
            return;
        } else {
            $solicitud->pedido_id    = request('dato');
            $solicitud->subestado_id = 15;
            $solicitud->save();
            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Id de Pedido ingresado, Nro:' . ' ' . request('dato');
            $log->save();
            return;
        }

    }

    public function addOrdenServicio(Request $request)
    {
        $solicitud = PsaSolicitud::find(request('id'));
        if ($solicitud->os != null) {
            $solicitud->os = request('dato');

            $solicitud->save();
            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Orden de servicio editada, Nro:' . ' ' . request('dato');
            $log->save();
            return;
        } else {
            $solicitud->os           = request('dato');
            $solicitud->subestado_id = 16;
            $solicitud->save();
            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Orden de servicio  ingresado, Nro:' . ' ' . request('dato');
            $log->save();
            return;
        }
    }

    public function addNroGuiaDespacho(Request $request)
    {
        $solicitud = PsaSolicitud::find(request('id'));
        if ($solicitud->nro_guia_despacho != null) {
            $solicitud->nro_guia_despacho = request('dato');

            $solicitud->save();
            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Nro de guía de despacho editada, Nro:' . ' ' . request('dato');
            $log->save();
            return;
        } else {
            $solicitud->nro_guia_despacho = request('dato');
            $solicitud->subestado_id      = 18;
            $solicitud->save();
            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Nro de guía de despacho ingresada, Nro:' . ' ' . request('dato');
            $log->save();
            return;
        }
    }

    public function addNroEwork(Request $request)
    {
        $solicitud = PsaSolicitud::find(request('id'));
        if ($solicitud->ework != null) {
            $solicitud->ework = request('dato');

            $solicitud->save();
            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Nro de ework editado, Nro:' . ' ' . request('dato');
            $log->save();
            return;
        } else {
            $solicitud->ework = request('dato');

            $solicitud->save();
            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Nro de ework ingresado, Nro:' . ' ' . request('dato');
            $log->save();
            return;
        }
    }

    public function updateNecogioCodSap(Request $request)
    {
        $solicitud = PsaSolicitud::find(request('id'));
        $cod_sap   = Cod_sap::where('negocio_id', request('negocio'))->get();

        $solicitud->negocio_id = request('negocio');
        $solicitud->save();
        return $cod_sap;

    }
    public function updateCodSap(Request $request)
    {
        $solicitud = PsaSolicitud::find(request('id'));
        if ($solicitud->cod_sap_id != null) {
            $solicitud->cod_sap_id = request('sapId');
            $solicitud->save();
        } else {
            $solicitud->cod_sap_id   = request('sapId');
            $solicitud->subestado_id = 4;
            $solicitud->save();
        }

        return;

    }
    public function ComprobacionStock($id)
    {
        $solicitud                   = PsaSolicitud::find($id);
        $solicitud->subestado_id     = 4;
        $solicitud->validacion_stock = 1;
        $solicitud->save();
        $log               = new LogPsa;
        $log->solicitud_id = $solicitud->id;
        $log->user_id      = Auth::user()->id;
        $log->descripcion  = 'Stock Aprobado, Cambio de estado de "Verificación stock baterías" a "Gestión OYM"';
        $log->save();
        return;
    }
    public function addPepOrigen(Request $request)
    {
        $solicitud = PsaSolicitud::find(request('id'));
        if ($solicitud->pep_origen != null) {
            $solicitud->pep_origen = request('dato');

            $solicitud->save();

            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Pep de Origen editado, Nro:' . ' ' . request('dato');
            $log->save();
            return;
        } else {
            $solicitud->pep_origen   = request('dato');
            $solicitud->subestado_id = 6;
            $solicitud->save();

            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Pep de Origen Ingresado, Nro:' . ' ' . request('dato');
            $log->save();
            return;
        }

    }
    public function addPepDestino(Request $request)
    {

        $solicitud = PsaSolicitud::find(request('id'));
        if ($solicitud->pep_destino != null) {
            $solicitud->pep_destino = request('dato');

            $solicitud->save();

            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Pep de Destino editado, Nro:' . ' ' . request('dato');
            $log->save();
            return;
        } else {
            $solicitud->pep_destino  = request('dato');
            $solicitud->subestado_id = 7;
            $solicitud->save();

            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Pep de Destino Ingresado, Nro:' . ' ' . request('dato');
            $log->save();
            return;
        }

    }
    public function addNroLote(Request $request)
    {
        $Solicitud = PsaSolicitud::find(request('id'));
        if ($Solicitud->lote != null) {
            $Solicitud->lote = request('dato');

            $Solicitud->save();
            $log               = new LogPsa;
            $log->solicitud_id = $Solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Nro de lote editado, Nro:' . ' ' . request('dato');
            $log->save();
            return;
        } else {
            $Solicitud->lote         = request('dato');
            $Solicitud->subestado_id = 8;
            $Solicitud->save();
            $log               = new LogPsa;
            $log->solicitud_id = $Solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Nro de lote Ingresado, Nro:' . ' ' . request('dato');
            $log->save();
            return;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function DetalleSolicitud($id)
    {
        $rol_user_psa = Rol_user_psa::where('user_id', Auth::user()->id)->first();

        $permision = Permission_role_psa::where('role_id', $rol_user_psa->role_id)->get();
        $bitacora = LogPsa::where('solicitud_id',$id)->with('user')->orderby('id','desc')->get();

        $solicitud = PsaSolicitud::where('id', $id)->with('site.pop.comuna.region', 'oficina', 'activo', 'capacidad', 'marca', 'estado', 'subestado', 'almacen', 'codSap', 'motivo')->get();
        return view('psa.show', compact('id', 'permision', 'solicitud','bitacora'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Busqueda del rol del usuario
        $roleId = role_user::where('user_id', Auth::user()->id)->get();
        foreach ($roleId as $r) {
            $rol_id = $r->role_id;
        }

        $solicitud = new PsaSolicitud;

        if ($request->pop != null) {
            $solicitud->site_id = $request->pop;

            ///BUSQUEDA DEL CRM

            $site = Site::find($solicitud->site_id);

            $solicitud->crm_id  = $site->pop->comuna->zona->crm->id;
            $solicitud->zona_id = $site->pop->comuna->zona->id;
        }

        ////////////////////////////////////

        $solicitud->activo_id    = $request->activo;
        $solicitud->total_activo = $request->cantidad;
        $solicitud->descripcion  = $request->descripcion;
        $solicitud->motivo_id    = $request->motivo;

        $solicitud->prioridad_solicitante = $request->prioridad;

        //VERIFICACION DEL ROL Y CARGO PARA ASIGNAR EL ESTADO A LA SOLICITUD
        if ($rol_id == 5) {
            $cargos = Cargo_user::where('id_user', Auth::user()->id)->get();

            foreach ($cargos as $c) {
                $cargoId = $c->id_cargo;
            }

            if ($cargoId == 1) {
                $solicitud->estado_id    = 1;
                $solicitud->subestado_id = 14;
            }
            if ($cargoId == 2) {
                $solicitud->estado_id    = 1;
                $solicitud->subestado_id = 14;
            }

        } else {

            if ($rol_id == 12) {
                $solicitud->estado_id    = 1;
                $solicitud->subestado_id = 14;
            } else {
                $solicitud->estado_id    = 1;
                $solicitud->subestado_id = 14;
            }
        }
        //////////////////////////////////////////////////////////
        $solicitud->user_id = Auth::user()->id;
        $solicitud->save();

        //if ($solicitud->banco > 16) {
        // $alert                  = new AlertRequestBanc;
        //$alert->solicitud_id    = $solicitud->id;
        //$alert->site_id         = $request->pop;
        //$alert->user_id         = Auth::user()->id;
        //$alert->state           = 1;
        //$alert->cantidad_bancos = $request->cant_banco;
        //$alert->save();
        // }

        $id                = $solicitud->id;
        $log               = new LogPsa;
        $log->solicitud_id = $solicitud->id;
        $log->user_id      = Auth::user()->id;
        $log->descripcion  = 'Solicitud Nro' . ' ' . $solicitud->id . ' de activos creada  ';
        $log->save();

        return $solicitud->id;
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

<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\Permiso_rol;
use App\role_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Exports\ProveedorExport;
use Excel;
class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $proveedor = Proveedor::where('ACTIVO', 1)->where('PROVEEDOR', 'like', "%" . $request->proveedor . "%")->orWhere('RUT_PROVEEDOR', 'like', "%" . $request->proveedor . "%")->get();
        return $proveedor;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ProvAdmin()
    {
        $rolUser = role_user::where('user_id', Auth::user()->id)->get(['role_id']);

        $rol = $rolUser[0]['role_id'];

        $permisos = Permiso_rol::where('role_id', $rol)->get(['permission_id']);


        return view('proveedor.index',compact('permisos'));
    }

    public function exportProveedor(){

        $date = Carbon::now()->toDateTimeString();
        return Excel::download(new ProveedorExport, 'Proveedores' . $date . '.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getProveedor(Request $request)
    {
        $proveedor = Proveedor::where('PROVEEDOR', 'like', "%" . $request->proveedor . "%")->orWhere('RUT_PROVEEDOR', 'like', "%" . $request->proveedor . "%")->get();
        return $proveedor;
    }
    public function getAllProveedores(Request $request)
    {
        $proveedor = Proveedor::where('PROVEEDOR', 'like', "%" . $request->proveedor . "%")->orWhere('RUT_PROVEEDOR', 'like', "%" . $request->proveedor . "%")->paginate(20,['id', 'RUT_PROVEEDOR', 'PROVEEDOR', 'ACTIVO', 'contacto']);
        return $proveedor;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProveedor(Request $request)
    {
        $proveedor = Proveedor::find($request->proveedor_id);
        if (floatval($proveedor->ACTIVO) === floatval(1)) {
            $proveedor->activo = 0;
            $proveedor->save();
            return;
        } else {
            if (floatval($proveedor->ACTIVO) === floatval(0)) {
                $proveedor->activo = 1;
                $proveedor->save();
                return;
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateDataProveedor(Request $request)
    {
        if ($request->proveedor_id == null) {
            $buscar = Proveedor::where('RUT_PROVEEDOR', $request->rut)->count();
            if ($buscar != 0) {
                $error = 1;
                return $error;
            } else {
                $proveedor                = new Proveedor;
                $proveedor->PROVEEDOR     = $request->nombre;
                $proveedor->RUT_PROVEEDOR = $request->rut;
                $proveedor->save();
                return;
            }

        } else {
            $proveedor                = Proveedor::find($request->proveedor_id);
            $proveedor->PROVEEDOR     = $request->nombre;
            $proveedor->RUT_PROVEEDOR = $request->rut;
            $proveedor->contacto      = $request->contacto;
            $proveedor->save();
            return;
        }

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

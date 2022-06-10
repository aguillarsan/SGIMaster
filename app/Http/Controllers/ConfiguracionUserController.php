<?php

namespace App\Http\Controllers;

use App\Configuracion_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfiguracionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mode = Configuracion_user::where('user_id', Auth::user()->id)->get();
        foreach ($mode as $m) {
            $modeid = $m->configuracion_id;
        }
        return $modeid;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateMode()
    {
        
        $mode = Configuracion_user::where('user_id', Auth::user()->id)->get();
        foreach ($mode as $m) {
            $configuracion = Configuracion_user::find($m->id);
            if ($m->configuracion_id == 1) {
                $configuracion->configuracion_id = 2;
                $configuracion->save();
                return redirect('/perfilusuario');
            } else {
                if ($m->configuracion_id == 2) {
                    $configuracion->configuracion_id = 1;
                    $configuracion->save();
                    return redirect('/perfilusuario');
                }
            }

        }
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

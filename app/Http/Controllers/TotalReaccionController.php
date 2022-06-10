<?php

namespace App\Http\Controllers;

use App\ContenidoReaccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TotalReaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetLikes($id)
    {
        $total = ContenidoReaccion::where('contenido_id', $id)->where('reaccion_id', 1)->count();
        return $total;
    }
    public function GetAsombro($id)
    {
        $total = ContenidoReaccion::where('contenido_id', $id)->where('reaccion_id', 2)->count();
        return $total;
    }
    public function GetAngry($id)
    {
        $total = ContenidoReaccion::where('contenido_id', $id)->where('reaccion_id', 3)->count();
        return $total;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setReaccion($id, $reaccion)
    {
        $convertReaction = floatval($reaccion);
        if (ContenidoReaccion::where('user_id', Auth::user()->id)->where('reaccion_id', $convertReaction)->count() != 0) {
            $reaccion = ContenidoReaccion::where('user_id', Auth::user()->id)->where('reaccion_id', $convertReaction)->get();
            foreach ($reaccion as $r) {
                $recId = $r->id;
            }
            $deleteReaccion = ContenidoReaccion::find($recId);
            $deleteReaccion->delete();
            return;
        } else {
            if (ContenidoReaccion::where('user_id', Auth::user()->id)->count() == 0) {

                $reaccion               = new ContenidoReaccion;
                $reaccion->user_id      = Auth::user()->id;
                $reaccion->contenido_id = $id;
                $reaccion->reaccion_id  = $convertReaction;
                $reaccion->save();
                return;
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

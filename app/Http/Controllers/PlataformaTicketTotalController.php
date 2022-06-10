<?php

namespace App\Http\Controllers;

use App\Ticket_requisito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlataformaTicketTotalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function TotalValidacion(Request $request)
    {

        if (Auth::user()->id == 315 || Auth::user()->id == 314) {
            $total = Ticket_requisito::where('estado_id', 1)->where('responsable_id', Auth::user()->id)->count();
            return $total;
        } else {
            $total = Ticket_requisito::where('estado_id', 1)->where('user_id', Auth::user()->id)->count();
            return $total;

        }

    }
    public function TotalCurso(Request $request)
    {

        if (Auth::user()->id == 315 || Auth::user()->id == 314) {
            $total = Ticket_requisito::where('estado_id', 2)->where('responsable_id', Auth::user()->id)->count();
            return $total;
        } else {
            $total = Ticket_requisito::where('estado_id', 2)->where('user_id', Auth::user()->id)->count();
            return $total;

        }

    }

    public function TotalFinalizada(Request $request)
    {

        if (Auth::user()->id == 315 || Auth::user()->id == 314) {
            $total = Ticket_requisito::where('estado_id', 3)->where('responsable_id', Auth::user()->id)->count();
            return $total;
        } else {
            $total = Ticket_requisito::where('estado_id', 3)->where('user_id', Auth::user()->id)->count();
            return $total;

        }

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

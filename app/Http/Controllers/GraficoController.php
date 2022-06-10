<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('graficos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function totalTicekts()
    {
        $tickets         = Ticket::count();
        $clima           = Ticket::where('area_id', 2)->count();
        $porcentajeClima = floatval(round(($clima * 100) / $tickets, 1));

        return $porcentajeClima;
    }

    public function TotalTicektsClima()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function TotalTicketsAreas(Request $request)
    {
        $clima   = Ticket::where('area_id', 2)->where('estado_id', '!=', 7)->count(['id']);
        $energia = Ticket::where('area_id', 1)->where('estado_id', '!=', 7)->count(['id']);
        $obras   = Ticket::where('area_id', 3)->where('estado_id', '!=', 7)->count(['id']);
        $medio   = Ticket::where('area_id', 4)->where('estado_id', '!=', 7)->count(['id']);

        $data = [
            'clima'   => $clima,
            'energia' => $energia,
            'obras'   => $obras,
            'medio'   => $medio,
        ];
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

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

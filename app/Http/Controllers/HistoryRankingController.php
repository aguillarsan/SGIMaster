<?php

namespace App\Http\Controllers;

use App\Ranking;
use Illuminate\Http\Request;

class HistoryRankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveHistoryRanking()
    {
        try {
            $ranking_data = \DB::connection('control_pep')->select('CALL proc_ranking_crm');

            foreach ($ranking_data as $rk) {
                $ranking                   = new Ranking;
                $ranking->nombre_crm       = $rk->nombre_crm;
                $ranking->disponible_real  = $rk->disponible_real;
                $ranking->comprometido_clp = $rk->comprometido_clp;
                $ranking->total            = $rk->total;
                $ranking->save();
            }

            return;

        } catch (Exception $e) {
            return $e;
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

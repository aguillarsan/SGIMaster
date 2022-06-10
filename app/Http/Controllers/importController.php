<?php

namespace App\Http\Controllers;

use App\Imports\DataSolicitudSgcImport;
use App\Imports\PepImport;
use App\Imports\TicketRedCoreImport;
use App\Ranking;
use Excel;
use Illuminate\Http\Request;

class importController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ImportTicketsRedCore(Request $request)
    {
        Excel::import(new TicketRedCoreImport, request()->file('file_masive'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function MasiveUploadSGC(Request $request)
    {

        Excel::import(new DataSolicitudSgcImport, request()->file('file_upload_masive'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ImportPepData(Request $request)
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

            Excel::import(new PepImport, request()->file('filepep'));

            return;

        } catch (Exception $e) {
            return $e;
        }

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

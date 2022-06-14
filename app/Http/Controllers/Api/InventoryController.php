<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Site;
use App\Pop;
use App\Technologie;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSites()
    {
        $sites = \DB::table('entel_pops.sites as s')
            ->join('entel_pops.classification_types as c', 'c.id', '=', 's.classification_type_id')

            ->select('s.id', 's.nem_site', 's.nombre', 'c.classification_type')
            ->get();


        return response()->json($sites, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPops()
    {
        $pops = \DB::table('entel_pops.pops as p')
            ->join('entel_pops.comunas as c', 'c.id', '=', 'p.comuna_id')
            ->join('entel_pops.regions as r', 'r.id', '=', 'c.region_id')

            ->select('p.id',  'p.nombre', 'r.nombre_region')
            ->get();




        return response()->json($pops, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTotalInventario()
    {
        $total_pop = Pop::count();
        $total_site = Site::count();
        $total_tech = Technologie::count();
        $data = array();

        $data_pop = [
            'nombre' => 'Pops',
            'total'  => $total_pop,
            'column' => 0
        ];
        $data_sitio = [
            'nombre' => 'Sitios',
            'total'  => $total_site,
            'column' => 1
        ];
        $data_tec = [
            'nombre' => 'Tecnologias',
            'total'  => $total_tech,
            'column' => 2
        ];

        array_push($data, $data_pop,$data_sitio,$data_tec);
        return response()->json($data);

      
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

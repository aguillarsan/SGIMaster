<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileExperimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Storage::disk('local')->put('prueba.txt', 'Contents');
        //dd(\Storage::get('local'));
      
        // dd( \Storage::disk('public')->files('prueba.docx'));
        //$f =  \Storage::disk('public')->files('1558_Cotizacion(1).pdf');
        // $file = file($f,FILE_IGNORE_NEW_LINES );
         //dd($f);

         $fp = fopen("archivos/1558_Cotizacion(1).pdf", "r");
         $finfo = new \finfo(FILEINFO_MIME); 
         $finfo->file($fp);
         dd( $finfo->file($fp));
        
        
        
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

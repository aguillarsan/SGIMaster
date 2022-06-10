<?php

namespace App\Http\Controllers;

use App\TempUserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class InventarioLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $userInfo = TempUserLog::where('user_id', Auth::user()->id)->get();
        foreach ($userInfo as $u) {
            $username = $u->username;
            $password = $u->pass;
        }

        $response =  Http::get('http://172.16.100.102/outside/bridge/'.$username.'/'.$password);
     
        if($response->status() == 200){
            return redirect('http://172.16.100.102/deshboard');
        }
        //$data = $response->cookies();
    
        //foreach ($data as $d) {
        //    $token = $d->getValue();
       // }
    

        //$log = Http::withHeaders([
          //  'X-SRF-TOKEN'  => $token ,
          
        //])->post('http://172.16.100.102/login', [
         //   'username' => $username,
          //  'password' => $password,
        //]);

        //dd($log->body());

        //if ($response == true) {
        //    return redirect('http://172.16.100.102/dashboard');
        //} else {
        //    dd('no Paso');
        //}

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

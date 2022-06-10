<?php

namespace App\Http\Controllers;

use App\AlertRequestBanc;

class AlertRequestBancController extends Controller
{
    public function index()
    {
        $alert = AlertRequestBanc::where('state', 1)->with('site', 'user')->get();
        return $alert;
    }

    public function updateAlert($id)
    {
        $alert        = AlertRequestBanc::find($id);
        $alert->state = 2;
        $alert->save();
        return;
    }
}

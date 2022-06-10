<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
class AreaController extends Controller
{
    public function GetAreaFilter(){
        
        $areas = Area::where('id','!=',3)->where('id','!=',4)->get();
        return $areas;
    }
}

<?php

namespace App\Http\Controllers\Resago;

use Illuminate\Http\Request;
use App\Models\Ticket\Residue;
use App\Models\Ticket\Material;
use App\Models\Ticket\Equipment;
use App\Models\Ticket\Type_container;
use App\Models\Ticket\Type_residue;
use App\Http\Controllers\Controller;

class ResagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {

        if($request->type_residue == 1){
            $data = Equipment::get();
            return $data;
        }else{
            if($request->type_residue == 2){
               $data = Material::get();
               return $data;
            }
           
        }
       
    }
    public function getDataFormHc(){
        $type_residue = Type_residue::get();
        $type_container = Type_container::get();

        $data = [
            'type_residue'=> $type_residue,
           'type_container' => $type_container
        ];
        return $data;
    }

   
}

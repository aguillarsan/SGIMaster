<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact_type_job;
use App\Type_job;
class ContactTypeJobController extends Controller
{
    public function index() {
    	$contact_type = Contact_type_job::get(['id','descripcion']);
    	$type_job = Type_job::get(['id','descripcion']);
    	$data= [
    		'contact_type'=> $contact_type,
            'type_job'=> $type_job
    	];
    	return $data;
    }
}

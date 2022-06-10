<?php

namespace App\Models\Repositorio;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Folder extends Model
{
    protected $connection = 'repositorio';
    protected $table      = 'folders';

    public function user()
    {

        return $this->belongsTo(User::class);
    }


	public function scopeBuscar($query){

		

		if(request()->nombre){
			$query->where('nombre','like',"%".request()->nombre."%" 
				
			);
		}
	


	}
}


<?php

namespace App\Models\Repositorio;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $connection = 'repositorio';
    protected $table      = 'files';

    public function scopeBuscar($query)
    {

        if (request()->nombre) {
            $query->where('nombre', 'like', "%" . request()->nombre . "%"

            );
        }

    }
}


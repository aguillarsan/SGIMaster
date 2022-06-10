<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivosRepositorio extends Model
{
    protected $connection = 'repositorio';

    protected $table = 'archivos';
    public function scopeBuscar($query)
    {

        if (request()->nombre) {
            $query->where('nombre', 'like', "%" . request()->nombre . "%"

            );
        }

    }
}

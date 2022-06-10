<?php

namespace App\Models\Surrender;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $connection = "surrender";
    protected $table = "files";

    public function type_file()
    {

        return $this->belongsTo(Type_file::class);
    }

}

<?php

namespace App\Models\ReportePep;

use Illuminate\Database\Eloquent\Model;
use App\Models\ReportePep\Head_tab_name;
class Layout_column extends Model
{
    protected $connection ="reports";
    protected $table      = 'layout_columns';

    public function head_tab_name()
    {

        return $this->belongsTo(Head_tab_name::class);
    }
}

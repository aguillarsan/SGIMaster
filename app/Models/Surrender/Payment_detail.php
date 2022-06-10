<?php

namespace App\Models\Surrender;

use Illuminate\Database\Eloquent\Model;

class Payment_detail extends Model
{
    protected $connection = "surrender";
    protected $table = "payment_details";

    public function expense_type()
    {

        return $this->belongsTo(Expense_type::class);
    }
}

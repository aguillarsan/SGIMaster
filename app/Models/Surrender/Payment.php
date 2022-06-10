<?php

namespace App\Models\Surrender;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Site;
use App\Models\Itos\Project_manager;

class Payment extends Model
{
    protected $connection = "surrender";
    protected $table = "payments";

    public function site()
    {

        return $this->belongsTo(Site::class);
    }

    public function state()
    {

        return $this->belongsTo(State::class);
    }
    public function user()
    {

        return $this->belongsTo(User::class);
    }
    public function project_manager()
    {

        return $this->belongsTo(Project_manager::class);
    }
    public function work_area()
    {

        return $this->belongsTo(Work_area::class);
    }

    
    public function payment_detail()
    {

        return $this->hasMany(Payment_detail::class);
    }
    public function payment_tp()
    {

        return $this->hasMany(Payment_tp::class);
    }
    public function file()
    {

        return $this->hasMany(File::class);
    }

    public function ScopeFilter($query)
    {
        if (request()->project_manager_id) {
            $query->where('project_manager_id', request()->project_manager_id);
        }
        if (request()->state_id) {
            $query->where('state_id', request()->state_id);
        }
        if (request()->general_search) {
            $query->whereIn(
                'site_id',
                Site::where('nem_site', 'like', "%" . request()->general_search . "%")->orWhere('nombre', 'like', "%" . request()->general_search . "%")->pluck('id')
            )->orWhereIn(
               'user_id',
               User::whereRaw("CONCAT(name, ' ', apellido) LIKE ?", ['%'.request()->general_search.'%'])->pluck('id')
            )->orWhere('responsable_entel', 'like', "%" . request()->general_search . "%");
        }
    }
}

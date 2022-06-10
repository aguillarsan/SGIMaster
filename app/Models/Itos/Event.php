<?php

namespace App\Models\Itos;

use Illuminate\Database\Eloquent\Model;
use App\Models\Itos\State;
use App\User;
use App\Site;

class Event extends Model
{
    protected $table = 'events';
    protected $connection = 'itos';

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

    public function resource()
    {

        return $this->belongsTo(Resource::class);
    }
    public function site()
    {

        return $this->belongsTo(Site::class);
    }


    public function category()
    {

        return $this->belongsTo(Category::class);
    }





    protected $appends = ['color'];



    public function getColorAttribute()
    {

        return $this->state->color_state;
    }
}

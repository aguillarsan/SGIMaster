<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Support\Tipo_requisito;
use App\Models\Support\Prioridad;

class Ticket_support extends Model
{
    protected $connection = 'plataforma';
    protected $table = 'ticket_support';

    public function ScopeFilter($query)
    {
        if (request()->module) {
            $query->where('estado_id', 'like', "%" . request()->module . "%");
        }
        if (request()->search) {
            $query->where('id','like', "%" . request()->search . "%")
            ->orwhereIn(
                'user_id',
                User::where('name', 'like', "%" . request()->search . "%")->orWhere('apellido', 'like', "%" . request()->search . "%")->pluck('id')
            )->orWhereIn(
                'prioridad_id',
                Prioridad::where('descripcion', 'like', "%" . request()->search . "%")->pluck('id')
            );
        }
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function tipo_requisito()
    {

        return $this->belongsTo(Tipo_requisito::class);
    }
    public function prioridad()
    {

        return $this->belongsTo(Prioridad::class);
    }
    public function plataforma()
    {

        return $this->belongsTo(Plataforma::class);
    }
}

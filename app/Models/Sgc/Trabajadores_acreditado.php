<?php

namespace App\Models\Sgc;

use Illuminate\Database\Eloquent\Model;
use App\Proveedor;
use App\Models\Sgc\Tipo_acreditacion;
class Trabajadores_acreditado extends Model
{
    protected $connection = 'sgc';

    protected $table = 'trabajadores_acreditados';
    
    public function proveedor()
    {

        return $this->belongsTo(Proveedor::class);
    }
    public function tipo_acreditacion()
    {

        return $this->belongsTo(Tipo_acreditacion::class);
    }

     public function ScopeSearch($query){
        if (request()->proveedor) {
            $query->whereIn('proveedor_id',
            Proveedor::where('RUT_PROVEEDOR', 'like', "%" . request()->proveedor . "%")->orWhere('PROVEEDOR', 'like', "%" . request()->proveedor . "%")->pluck('id')
            );
        }
        if (request()->rut_employee) {
            $query->where('rut', 'like', "%" . request()->rut_employee . "%");
        }

        if (request()->name_employee) {

            $query->where('name', 'like', "%" . request()->name_employee . "%")->orWhere('last_name', 'like', "%" . request()->name_employee . "%");

        }
        if (request()->tipo_acreditacion_id) {

            $query->where('tipo_acreditacion_id',request()->tipo_acreditacion_id);

        }

        
        
     }
}

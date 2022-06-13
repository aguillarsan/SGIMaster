<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use App\role_user;
use App\Permiso_rol;
use App\Notifications\ResetPasswordNotification;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','changed_password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $connection = 'mysql';
    protected $table      = 'users';

    protected $appends = ['rol','permissions','fullname'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }



    public function getRolAttribute()
    {
        $rol = role_user::where('user_id',Auth::user()->id)->first();

        return $rol->role_id ; 
    } 
    public function getPermissionsAttribute(){
          $permission = Permiso_rol::where('role_id',$this->rol)->get();
          return $permission;
    }
    public function getFullnameAttribute()
  {
      return "{$this->name} {$this->apellido}";
  }

    public function getJWTIdentifier()
    {
       return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }

    public function tikecets()
    {

        return $this->hasMany(ticket::class);
    }
    public function solicitudes()
    {

        return $this->hasMany(Solicitud::class);
    }
    public function carpetas()
    {

        return $this->hasMany(Carpeta::class);
    }
    public function control_cambio_data()
    {
        return $this->hasMany(Control_cambio_data::class);
    }
    public function solicitudessgc()
    {

        return $this->hasMany(SolicitudSgc::class);
    }

    public function logs()
    {

        return $this->hasMany(Log::class);
    }

    public function halteds()
    {

        return $this->hasMany(Halted::class);
    }

    public function role_user()
    {

        return $this->hasMany(role_user::class);
    }

    public function scopeBuscar($query)
    {
        if (request()->user) {

            $query->where(\DB::raw('CONCAT(name," ",apellido)'), 'like', "%" . request()->user . "%");

        }
    }

}

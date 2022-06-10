<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Cargo_user;
use App\Configuracion_user;
use App\crm_user;
use App\Rol;
use App\role_user;
use App\SolicitudSgc;
use App\Solicitud_ework;
use App\TempUserLog;
use App\Ticket;
use App\User;
use App\User_temp;
use App\Zona_user;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    use AuthenticatesUsers;

    public function GetRol()
    {

        $userRol = role_user::where('user_id', Auth::user()->id)->get();
        foreach ($userRol as $r) {
            $idRol = $r->role_id;
        }
        return $idRol;
    }

    public function pass(Request $request)
    {

        dd(Hash::make($request['password']));
    }

    public function verifyPass(Request $request)
    {
        if (\Hash::check($request->password, Auth::user()->password)) {
            return true;
        } else {
            return false;
        }
    }
    public function changePass(Request $request)
    {

        if ($request->updateOldPass) {
            $user           = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->changed_password = Carbon::now();
            $user->save();

            $checkUser = TempUserLog::where('user_id', Auth::user()->id)->first() ? true : false;
            if ($checkUser) {
                $userTem           = TempUserLog::where('user_id', Auth::user()->id)->first();
                $userTem->user_id  = Auth::user()->id;
                $userTem->pass     = $request->password;
                $userTem->save();
            } else {
                $userTem           = new TempUserLog;
                $userTem->user_id  = Auth::user()->id;
                $userTem->pass     = $request->password;
                $userTem->save();
            }

            return;
        } else {
            $checkUser = TempUserLog::where('user_id', $request->user_id)->first() ? true : false;
            if ($checkUser) {
                $userTem           = TempUserLog::where('user_id', $request->user_id)->first();
                $userTem->user_id  = $request->user_id;
                $userTem->pass     = $request->password;
                $userTem->save();
            } else {
                $userTem           = new TempUserLog;
                $userTem->user_id  = $request->user_id;
                $userTem->pass     = $request->password;
                $userTem->save();
            }
            $user           = User::find($request->user_id);
            $user->password = Hash::make($request->password);
            $user->changed_password = Carbon::now();
            $user->save();
            return;
        }
    }

    public function UserDataCheck(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {

            if (Auth::user()->estado == 0) {
                Auth::logout();
                return 3;
            } else {
                $checkUser = TempUserLog::where('user_id', Auth::user()->id)->first() ? true : false;
                if ($checkUser) {
                    $userTem           = TempUserLog::where('user_id', Auth::user()->id)->first();
                    $userTem->user_id  = Auth::user()->id;
                    $userTem->pass     = $request->password;
                    $userTem->username = $request->username;
                    $userTem->save();
                } else {
                    $userTem           = new TempUserLog;
                    $userTem->user_id  = Auth::user()->id;
                    $userTem->pass     = $request->password;
                    $userTem->username = $request->username;
                    $userTem->save();
                }

                return 1;
            }
        } else {
            return 2;
        }
    }

    public function perfilusuario()
    {
        $usuario  = User::find(Auth::user()->id);
        $ticket   = Ticket::where('user_id', Auth::user()->id)->count();
        $sgc      = SolicitudSgc::where('user_id', Auth::user()->id)->count();
        $preEwork = Solicitud_ework::where('user_id', Auth::user()->id)->count();
        $rol      = role_user::where('user_id', Auth::user()->id)->get();
        foreach ($rol as $r) {
            $idRol = $r->role_id;
        }
        $rolUser = Rol::find($idRol);

        $mode = Configuracion_user::where('user_id', Auth::user()->id)->get();
        foreach ($mode as $m) {
            $modeid = $m->configuracion_id;
        }
        return view('usuario.index', compact('usuario', 'ticket', 'sgc', 'preEwork', 'rolUser', 'modeid'));
    }
    public function Getcargo()
    {
        $cargos = Cargo_user::where('id_user', Auth::user()->id)->get();
        return $cargos;
    }
    public function getCargoId()
    {
        $cargos = Cargo_user::where('id_user', Auth::user()->id)->get();
        foreach ($cargos as $c) {
            $cargo_id = $c->id_cargo;
        }
        return $cargo_id;
    }
    public function GetUsers(Request $request)
    {
        $users = User::where(\DB::raw('CONCAT(name," ",apellido)'), 'like', "%" . $request->user . "%")->get();
        return $users;
    }

    public function infoUser(Request $request)
    {
        $user = User::with('role_user.role')->find($request->user_id);
        return $user;
    }
    public function GetTotalUsers(Request $request)
    {
        $users = User::where('name', 'like', "%" . $request->user . "%")->orWhere('apellido', 'like', "%" . $request->user . "%")->count();
        return $users;
    }
    public function GetRequestCreateAccountUser(Request $request)
    {
        $user_temp            = new User_temp;
        $user_temp->name      = $request->name;
        $user_temp->last_name = $request->lastName;
        $user_temp->cargo_id  = $request->cargo;
        $user_temp->crm_id    = $request->crm;
        $user_temp->zona_id   = $request->zona;
        $user_temp->email     = $request->email;
        $user_temp->password  = $request->password;
        $user_temp->username  = substr($request->name, 0, 1) . $request->lastName;
        $user_temp->save();
        return;
    }
    public function GetAllUsers(Request $request)
    {
        $users = User::buscar()->paginate(24);
        return $users;
    }
    public function getUsersAdmin(Request $request)
    {
        $users = User::with('role_user.role')->buscar()->where('id', '!=', 1)->where('id', '!=', 2)->paginate(24);
        return $users;
    }
    public function getRoles()
    {
        $roles = Rol::where('active', 1)->get();
        return $roles;
    }
    public function updateRol(Request $request)
    {

        $roles = role_user::where('user_id', $request->user_id)->first();
        $roles->role_id = $request->role_id;
        $roles->save();
        return;
    }
    public function UserCargoName($id)
    {
        $rol = role_user::where('user_id', $id)->get();
        if ($rol != null) {
            foreach ($rol as $r) {
                $rolUser = $r->role_id;
            }
            if ($rolUser == 5) {
                $cargo = Cargo_user::where('id_user', $id)->get();
                if ($cargo != null) {
                    foreach ($cargo as $c) {
                        $CargoDetail = Cargo::find($c->id_cargo);
                        $namecargo   = $CargoDetail->nombre_cargo;
                        return $namecargo;
                    }
                }
            }
        }
    }
    public function GetAccounts()
    {
        $accounts = User_temp::with('zona', 'crm')->get();
        return $accounts;
    }
    public function getTempUser()
    {
        $userInfo = TempUserLog::where('user_id', Auth::user()->id)->get();
        return $userInfo;
    }
    public function createUserPortal(Request $request)
    {
        $user           = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->apellido = $request->last_name;

        $user->avatar   = '../responsables/default.png';
        $user->estado   = 1;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/portal');
    }
    protected function CreateUser($id)
    {
        $utemp          = User_temp::find($id);
        $user           = new User;
        $user->name     = $utemp->name;
        $user->email    = $utemp->email;
        $user->apellido = $utemp->last_name;
        $user->username = $utemp->username;
        $user->avatar   = '../responsables/default.png';
        $user->estado   = 1;
        $user->password = Hash::make($utemp->password);
        $user->save();
        ///ASIGNACIÓN DE ROL
        $roleUser = new role_user;
        if ($utemp->cargo_id == 1) {
            $roleUser->role_id = 13;
        }
        if ($utemp->cargo_id == 2) {
            $roleUser->role_id = 12;
        }
        if ($utemp->cargo_id == 3 || $utemp->cargo_id == 4) {
            $roleUser->role_id = 5;
        }

        $roleUser->user_id = $user->id;
        $roleUser->save();
        /////////////////////////////////////
        ////////////////////////////////////

        ///ASIGNACION DE CRM  O ZONA
        if ($utemp->cargo_id == 1 || $utemp->cargo_id == 2 || $utemp->cargo_id == 3) {
            $crm          = new crm_user;
            $crm->user_id = $user->id;
            $crm->crm_id  = $utemp->crm_id;
            $crm->save();
        }
        if ($utemp->cargo_id == 4) {
            $zona          = new Zona_user;
            $zona->user_id = $user->id;
            $zona->zona_id = $utemp->zona_id;
            $zona->save();
        }

        /////////////////////////////////////
        ////////////////////////////////////

        //ASIGNACIÓN DE CARGO

        if ($utemp->cargo_id == 3) {
            $cargoUser           = new Cargo_user;
            $cargoUser->id_cargo = 2;
            $cargoUser->id_user  = $user->id;
            $cargoUser->save();
        }
        if ($utemp->cargo_id == 4) {
            $cargoUser           = new Cargo_user;
            $cargoUser->id_cargo = 1;
            $cargoUser->id_user  = $user->id;
            $cargoUser->save();
        }
        $config                   = new Configuracion_user;
        $config->user_id          = $user->id;
        $config->configuracion_id = 1;
        $config->save();

        $utemp->delete();

        return;
    }
}

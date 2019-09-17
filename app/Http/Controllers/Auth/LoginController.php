<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;


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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:operator')->except('logout');
        $this->middleware('guest:club')->except('logout');
    }


    public function showOperatorLoginForm(){
        return view('auth.login',['url'=> Config::get('constants.guards.operator')]);
    }


    public function showClubLoginForm(){
        return view('auth.login',['url'=> Config::get('constants.guards.club')]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }


    protected function guardLogin(Request $request, $guard)
    {

        $this->validator($request->all())->validate();

        return Auth::guard($guard)->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ],
            $request->get('remember')
        );
    }

    protected function guardLogout(Request $request, $guard)
    {
        Auth::guard($guard)->logout();
        $request->session()->flush();
        $request->session()->regenerate();
    }

    public function operatorlogin(Request $request)
    {
        if ($this->guardLogin($request, Config::get('constants.guards.operator'))) {
            return redirect()->intended('dashboard/operator');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

   

    public function clubLogin(Request $request)
    {
          if ($this->guardLogin($request,Config::get('constants.guards.club'))) {
            return redirect()->intended('dashboard/club');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function operatorLogout(Request $request)
    {
       $this->guardLogout($request, Config::get('constants.guards.operator'));
       return redirect()->guest(route('login.operator'));
    }
    
    public function clubLogout(Request $request)
    {
        $this->guardLogout($request, Config::get('constants.guards.'));
        return redirect()->guest(route('login.club'));
    }
}

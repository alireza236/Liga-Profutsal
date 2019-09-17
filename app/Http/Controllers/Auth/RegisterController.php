<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Operator;
use App\Club;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:operator');
        $this->middleware('guest:club');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showOperatorRegisterForm()
    {
        return view('auth.register', ['url' => 'operator']);
    }

    public function showClubRegisterForm()
    {
        return view('auth.register', ['url' => 'club']);
    }

    protected function createOperator(Request $request)
    {
        $this->validator($request->all())->validate();
        Operator::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        //return redirect()->intended('login/operator');
        
        //After registration login the use then redirect
        if (Auth::guard('operator')->attempt(['email' => $request->email, 'password' => $request->password])) {
              return redirect()->intended('operator');
          } 
    }

    protected function createClub(Request $request)
    {
        $this->validator($request->all())->validate();
        Club::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        //return redirect()->intended('login/club');
        
          if (Auth::guard('club')->attempt(['email' => $request->email, 'password' => $request->password])) {
             return redirect()->intended('club');
          } 
    }
}

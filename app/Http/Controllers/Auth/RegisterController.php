<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
    public function showSecurityRegistrationForm()
    { 
        return view('auth.securityLogin');
    }
    public function securityRegister(Request $request){
        // dd($this);
        $request->validate([
            'branch_name' => 'required|string|min:3|max:120|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'security_question' => 'required|string',
            'security_answer' => 'required|string|min:2|max:100',
            'security_key' => 'required|string|min:5|max:5',
            'password' => 'required|string|min:8|max:20|confirmed',
        ]);
        $user = User::create([
            'branch_name' => $request->branch_name,
            'email' => $request->email,
            'security_question' => $request->security_question,
            'security_answer' => $request->security_answer,
            // 'security_key' => $request->security_key,
            'password' => Hash::make($request->password),
            'user_role' => 'security',
        ]);
        $this->guard()->login($user);
        return redirect('/security/dashboard');
        // dd($request->all());
    }
}

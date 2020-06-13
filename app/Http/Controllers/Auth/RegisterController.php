<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\SecurityKeyCode;
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
        // dd(intval((time() - strtotime($data['date_of_birth']) ) / 31536000));
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'string', 'min:8','max:21'],
            'date_of_birth' => ['required', 'string', 'min:10', 'max:10'],
            'security_question' => ['required', 'string', 'max:255'],
            'security_answer' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
        ]);
    }
    public function register(Request $request){
        // dd();
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'string', 'min:8', 'max:21'],
            'date_of_birth' => ['required', 'date', 'min:10', 'max:10'],
            'security_question' => ['required', 'string', 'max:255'],
            'security_answer' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
        ]);
        // Verify The Phone Number Format
        $phoneNumberFormat = '/(\+?233|0)(55|54|24|20|50|27|57)\d{7}/';
        $isPhoneCorrect = preg_match($phoneNumberFormat, $request->phone_number);

        if($isPhoneCorrect == 1){
            // Verify the Phone Number Format
            $userAge = intval((time() - strtotime($request->date_of_birth)) / 31536000);
            if($userAge >= 18 && $userAge <= 70){
                return back()->withInput()->with(['age_err' => 'You must be within 18 to 70 years old']);
            }else{
                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'middle_name' => $request->middle_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone_number' => $request->phone_number,
                    'date_of_birth' => $request->date_of_birth,
                    'security_question' => $request->security_question,
                    'security_answer' => $request->security_answer,
                    'gender' => $request->gender,
                    'user_role' => 'end_user',
                ]);
                $this->guard()->login($user);
                return redirect('/home');
            }
            // dd($isPhoneCorrect);
        }else{
            return back()->withInput()->with(['phone_err' => 'Incorrect Phone number format']);
        }
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        dd(explode('-',$data['date_of_birth']));
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function showSecurityRegistrationForm()
    { 
        return view('auth.securityRegister');
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
        $securityKeyCode = SecurityKeyCode::where([['key_code',$request->security_key]]);
        if(count($securityKeyCode->get()) === 1){
            if($securityKeyCode->first()->user_id === null){
                $user = User::create([
                    'branch_name' => $request->branch_name,
                    'email' => $request->email,
                    'security_question' => $request->security_question,
                    'security_answer' => $request->security_answer,
                    // 'security_key' => $request->security_key,
                    'password' => Hash::make($request->password),
                    'user_role' => 'security',
                ]);
                $securityKeyCode->update([
                    'user_id' => $user->id
                ]);
                $this->guard()->login($user);
            }else{
                return back()->with('err', 'Key Code Already Assigned')->withInput();
            }
        }else{
            return back()->with('err','Incorrect Security Key')->withInput();
        }
        return redirect('/security/dashboard');
        // dd($request->all());
    }
}

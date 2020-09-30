<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
            'mobile' => ['required', 'numeric', 'digits:10', 'unique:users'],
            'dob' => [ 'nullable', 'date', 'date_format:m/d/Y' ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'franchisee_code' => [ 'nullable', 'exists:users,franchisee_code' ]
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
        $type = 0;
        if (Hash::check(0, $data['type'])) {
            $type = 0;
        }

        $user = User::max('id') + 1;
        $code = Str::random(5).''.$user;

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'prefix' => $data['prefix'],
            'franchisee_code' => $data['franchisee_code'],
            'dob' => (!empty($data['dob']) ? \Carbon\Carbon::parse($data['dob'])->format('Y-m-d') : null),
            'country_code' => $data['country_code'],
            'mobile' => $data['mobile'],
            'code' => $code,
            'type' => 0,
        ]);
    }

    public function showRegistrationForm(Request $request)
    {
        if (!empty(Session::get('question_1')) && !empty(Session::get('question_2')) 
                && !empty(Session::get('question_3'))) {
                return view('auth.register');
        }

        return redirect()->route('happiness');
    }

    public function redirectTo()
    {
        if (Auth::user()->type == 0) {
            return'/user/program';
            die;
        }

        return '/';
    }
}

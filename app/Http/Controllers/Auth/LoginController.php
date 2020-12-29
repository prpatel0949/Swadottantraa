<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(Request $request)
    {
        $type = '';
        if (Hash::check(0, $request->type)) {
            $type = 0;
        } else if (Hash::check(1, $request->type)) {
            $type = 1;
        } else if (Hash::check(2, $request->type)) {
            $type = 2;
        } else {
            abort(404);
        }

        return view('auth.login');
    }

    public function authenticated(Request $request, $user)
    {
        $type = '';
        if (Hash::check(0, $request->type)) {
            $type = 0;
        } else if (Hash::check(1, $request->type)) {
            $type = 1;
        } else if (Hash::check(2, $request->type)) {
            $type = 2;
        }
        
        if ($user->type != $type) {
            $this->logout($request);
            return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => 'These credentials do not match our records.'
            ]);
        }
    }

    public function redirectTo()
    {
        if (Auth::user()->type == 0) {
            return 'user/program';
        }

        if (Auth::user()->type == 2) {
            return 'franchisee/dashboard';
        }

        if (Auth::user()->type == 1) {
            return 'institue/dashboard';
        }

        return '/';
    }
}

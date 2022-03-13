<?php

namespace App\Http\Controllers\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        # set type of form to show
        $type = 'signIn';
        return view('auth.master',compact('type'));
    }

    public function redirectTo(){
        if(auth()->user()->isAdmin()){
            return url('admin/users');
        }
        return route('wallets');
    }

    public function username(){
        # credentials
        $credentials = 'username';

        # filter and check if credentials is email or username
        if(filter_var(request()->credentials, FILTER_VALIDATE_EMAIL)){
            # set credentials to email 
            $credentials = 'email';
        }
        
        # merger credentials to request validate
        request()->merge([
            $credentials => request()->credentials
        ]);
        
        # return credentails
        return $credentials;
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * The LoginController class uses an AuthenticatesUsers trait that defines the 
     * showLoginForm method that the /login route handler refers to. 
     * We overwrite that method so it simply returns our app view.
     * 
     * Since this instance of the view doesn't need any data to be 
     * inlined in the head (the login form has no state), 
     * we will pass an empty array to the data template variable.
     * 
     * @return view Vue app
     */
    public function showLoginForm()
    {
        return view('app', ['data' => []]);
    }
}

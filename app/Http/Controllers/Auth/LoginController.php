<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get the login username to be used by the controller.
     * 
     * Modification by Guillaume : use username or email adress
     *
     * @return string
     */
    public function username()
    {
        return 'login';
    }


    /**
     * Get the needed authorization credentials from the request.
     * Modification by Guillaume : use username or email adress
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $login = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) 
                 ? 'email' : 'username';

        return [$login     => $request->login,
                'password' => $request->password];

        //return $request->only($this->username(), 'password');
    }

    /**
     * Attempt to log the user into the application.
     * 
     * Modification by Guillaume : use username or email adress
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {

        return $this->guard()->attempt(
            $this->credentials($request), $request->has('remember')
        );

        /*if (Auth::attempt(['username' => $request->login, 
                             'password' => $request->password])) {

                dd("success with username!");
        } 

        elseif (Auth::attempt(['email'=> $request->login, 
                             'password' => $request->password])) {

                dd("success with email!"); 
        } 


        else {
                dd("fail!");

        }*/
    }

}

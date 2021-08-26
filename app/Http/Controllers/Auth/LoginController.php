<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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

    public function showLogin() {
        return view('auth.login');
    }

    public function studentLogin(Request $request) {
        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required');
      // password has to be greater than 3 characters and can only be alphanumeric and);
      // checking all field
      $validator = Validator::make($request->all() , $rules);
      // if the validator fails, redirect back to the form
      if ($validator->fails())
      {
          return Redirect::to('stdlogin')->withErrors($validator) // send back all errors to the login form
          ->withInput($request->input('password')); // send back the input (not the password) so that we can repopulate the form
      }
      else
      {
          // create our user data for the authentication
          $userData = array(
              'email' => $request->input('email'),
              'password' => $request->input('password')
          );
          // attempt to do the login
          if (Auth::attempt($userData))
          {
            if(auth()->user()->user_type == 0) {
                return Redirect::to('/dashboard');
            } else {
                return Redirect::to('/');
            }
          }
          else
          {
              // validation not successful, send back to form
              return Redirect::to('stdlogin')->with('error', 'User email/password is incorrect');
          }
      }
    }

    public function Logout()
    {
        Auth::logout();// log the user out of our application
        return Redirect::to('/'); // redirect the user to the login screen
    }

}

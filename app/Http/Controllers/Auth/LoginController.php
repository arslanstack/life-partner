<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Attempt to authenticate the user
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            // update last login for user
            $user = Auth::user();
            $user->last_login = date('Y-m-d H:i:s');
            $user->save();
            return redirect()->route('home');
        } else {
            return redirect()->route('login')
                ->with('error', 'Email Address or Password Are Wrong.');
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

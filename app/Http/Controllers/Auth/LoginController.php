<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

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

    protected function redirectTo()
    {
        if (auth()->user()->role=='admin'){
            return'dashboard';
        }else{
            return'daftarbuku'; //ini ketika user login
        }
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => ['Email atau password anda salah']
        ]);
    }
    protected function validateLogin(Request $request)
{
    $request->validate([
        $this->username() => 'required|email', // Menggunakan aturan email untuk memeriksa format email
        'password' => 'required|string',
    ], [
        $this->username() . '.required' => 'Email harus diisi.',
        $this->username() . '.email' => 'Email harus berupa alamat email yang valid.',
        'password.required' => 'Password harus diisi.',
    ]);
}




    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

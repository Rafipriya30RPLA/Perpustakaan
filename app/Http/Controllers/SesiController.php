<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{

    public function login(){
        return view('login');
    }
    public function loginproses(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('penerbit')->with('success', 'Berhasil Login');
        } else {
            return redirect('login')->with('error', 'Email atau password salah. Silakan coba lagi.');
        }
    }
    public function register(){
        return view('register');
    }
    public function registeruser(Request $request){
        // Check if the email already exists
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            return redirect('/register')
                ->with('error', 'Email sudah terdaftar. Silakan gunakan email lain.');
        }

        // Check if the password is at least 9 characters
        if (strlen($request->password) < 9) {
            return redirect('/register')
                ->with('error', 'Password harus memiliki minimal 9 karakter.');
        }

        // Check if password and password confirmation match
        if ($request->password !== $request->password_confirmation) {
            return redirect('/register')
                ->with('error', 'Konfirmasi password tidak cocok. Silakan coba lagi.');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect('/login')->with('success', 'Berhasil Register, Harap Login terlebih dahulu');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success', 'Berhasil Logout');
    }
}

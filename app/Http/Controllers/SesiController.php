<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Registerpengguna;

class SesiController extends Controller
{

    public function login(){
        return view('auth.login');
    }

    public function loginproses(Request $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role === 'user') {
                return redirect('/daftarbuku')->with('success', 'Anda Berhasil Login');
            } elseif (Auth::user()->role === 'admin') {
                return redirect('penerbit')->with('success',' Anda Berhasil Login');
            }


        } else {
            return redirect('login')->with('error', 'Email Atau Password Salah. Silakan Coba Lagi.');
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
                ->with('error', 'Email Sudah Terdaftar. Silakan Gunakan Email Yang Lain.');
        }

        // Check if the password is at least 9 characters
        if (strlen($request->password) < 9) {
            return redirect('/register')
                ->with('error', 'Password Harus Memiliki Minimal 9 Karakter.');
        }

        // Check if password and password confirmation match
        if ($request->password !== $request->password_confirmation) {
            return redirect('/register')
                ->with('error', 'Konfirmasi Password Tidak Cocok. Silakan Coba lagi.');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);


        return redirect('/login')->with('success', 'Berhasil Register, Harap Login Terlebih Dahulu');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success', ' Anda Berhasil Logout');
    }
}

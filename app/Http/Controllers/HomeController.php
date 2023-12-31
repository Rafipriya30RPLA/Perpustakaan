<?php

namespace App\Http\Controllers;

use App\Models\User;
use illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.dashboard-user');
    }
    public function profil()
    {
        $user = User::all();
        return view('profil');
    }

    public function simpanprofil(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('fotoprofil')) {
            // Hapus gambar lama jika ada
            if ($user->fotoprofil) {
                Storage::delete('public/img/fotoprofil/' . $user->fotoprofil);
            }

            $file = $request->file('fotoprofil');
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/img/fotoprofil', $filename);
            $user->fotoprofil = $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil Berhasil Di edit');
    }

    public function lihatprofil()
    {
        $user = User::all();
        return view('profil');
    }
    public function dashboard()
    {
        return view('dashboard.dashboard-user');
    }



}

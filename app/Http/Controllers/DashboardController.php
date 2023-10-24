<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\peminjam;
use App\Models\tambahbuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $datatambahbuku = tambahbuku::all();
        $datapeminjam = peminjam::all();        $user = Auth::user();
        return view('dashboard.index', compact('datapeminjam','datatambahbuku'))->with('row');
    }
    public function hitungStok()
{
    $totalStok = tambahbuku::sum('stok');
    return $totalStok;
}
public function hitungPeminjam()
{
    $count = peminjam::distinct('tenggat')->count();
    return $count;
}
public function hitungNamabuku()
{
    $count = tambahbuku::distinct('nama_buku')->count();
    return $count;
}
public function hitungPengguna()
{
    $count = User::distinct('name')->count();
    $count = User::where('role', '!=', 'admin')->distinct('name')->count();
    return $count;
}
}

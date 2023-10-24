<?php

namespace App\Http\Controllers;

use App\Models\peminjam;
use App\Models\tambahbuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PeminjamController extends Controller
{
    public function index()
    {
        $datatambahbuku = tambahbuku::all();
        $datapeminjam = peminjam::where('status', 'pending')->get(); // Mengambil hanya data peminjam dengan status 'acc'
        return view('peminjam.index', compact('datapeminjam','datatambahbuku'))->with('row');
    }
    public function index2()
    {
        $datatambahbuku = tambahbuku::all();
        $datapeminjam = peminjam::where('status', 'acc')->get(); // Mengambil hanya data peminjam dengan status 'acc'
        return view('pengembalian.index', compact('datapeminjam','datatambahbuku'))->with('row');
    }
    public function dashboard()
    {
        $datatambahbuku = tambahbuku::all();
        $datapeminjam = peminjam::all(); // Mengambil hanya data peminjam dengan status 'acc'
        return view('dashboard.index', compact('datapeminjam','datatambahbuku'))->with('row');
    }
    public function create()
    {
        $datatambahbuku = tambahbuku::all();
        $datapeminjam = peminjam::all();
        return view('peminjam.create', compact('datapeminjam','datatambahbuku'))->with('row');
    }

    public function store(Request $request)
{   
        $validator = Validator::make($request->all(), [
            'nama_peminjam' => 'required|max:225',
            'id_tambahbuku' => 'required',
            'kode_buku' => 'required|unique:tambahbuku,kode_buku', // Validasi kode_buku harus unik
        ], [
            'nama_peminjam.required' => 'Nama Peminjam harus diisi',
            'nama_peminjam.max' => 'Nama Peminjam Tidak Boleh Lebih Dari 225 Karakter',
            'id_tambahbuku.required' => 'Nama buku harus diisi',
            'kode_buku.required' => 'kode_buku harus diisi',
            'kode_buku.unique' => 'Kode buku sudah ada, harap pilih kode buku lain.',
        ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $datapeminjam = new peminjam();
    $datapeminjam->nama_peminjam = $request->input('nama_peminjam');
    $datapeminjam->id_tambahbuku = $request->input('id_tambahbuku');
    $datapeminjam->kode_buku = $request->input('kode_buku');

    // Isi tanggal_pinjam dengan hari ini
    $datapeminjam->tanggal_pinjam = now();

    // Isi tenggat dengan sehari setelah tanggal_pinjam
    $datapeminjam->tenggat = now()->addDays(7);

    $datapeminjam->save();

    return redirect()->route('peminjam.index')->with('success', 'Data Berhasil Di Tambahkan');
}
            public function edit($id)
        {
            $data = peminjam::find($id);
            $datapeminjam = tambahbuku::all();
            return view('peminjam.edit', compact('datapeminjam','data'));
        }
    public function update(Request $request, $id)
    {

        $datapeminjam = peminjam::find($id);

        // Update data lainnya
            $datapeminjam->status = 'acc'; // Ubah status menjadi "acc"
            $datapeminjam->save();


        $datapeminjam->save();

        return redirect()->route('peminjam.index')->with('success', 'Buku Berhasil Disetujui,Silahkan Cek Halaman Histori Anda.');
    }
    public function show($id)
    {

        $datapeminjam = peminjam::find($id);
        return view('peminjam.edit', compact('datapeminjam' , 'tambahbuku'));
    }



    public function destroy($id)
    {
        // Temukan data peminjam
        $datapeminjam = peminjam::find($id);

        if (!$datapeminjam) {
            return redirect()->route('peminjam.index')->with('error', 'Data Peminjam Tidak Di Temukan.');
        }

        // Temukan buku yang akan dikembalikan
        $tambahbuku = tambahbuku::find($datapeminjam->id_tambahbuku);

        // Tambahkan stok buku sesuai jumlah yang dikembalikan
        $tambahbuku->stok += 1;
        $tambahbuku->save();

        // Hapus data peminjam
        $datapeminjam->delete();

        return redirect()->route('peminjam.index')->with('success', 'Data Peminjam Berhasil Bihapus Dan Stok Buku Di Kembalikan.');
    }
    public function destroy2($id)
    {
        // Temukan data peminjam
        $datapeminjam = peminjam::find($id);

        if (!$datapeminjam) {
            return redirect()->route('pengembalian.index')->with('error', 'Data Pengembalian Tidak Di Temukan.');
        }

        // Temukan buku yang akan dikembalikan
        $tambahbuku = tambahbuku::find($datapeminjam->id_tambahbuku);

        // Tambahkan stok buku sesuai jumlah yang dikembalikan
        $tambahbuku->stok += 1;
        $tambahbuku->save();

        // Hapus data peminjam
        $datapeminjam->delete();

        return redirect()->route('pengembalian.index')->with('success', 'Data Pengembalian Berhasil Bihapus Dan Stok Buku Di Kembalikan.');
    }

}




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
        $datapeminjam = peminjam::all();
        return view('peminjam.index', compact('datapeminjam','datatambahbuku'))->with('row');
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
        'nama_peminjam' => 'required',
        'id_tambahbuku' => 'required',
        'kode_buku' => 'required',
    ], [
        'nama_peminjam.required' => 'Nama Peminjam harus diisi',
        'id_tambahbuku.required' => 'Nama buku harus diisi',
        'kode_buku.required' => 'kode_buku harus diisi',
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

    return redirect()->route('peminjam.index')->with('success', 'Data Berhasil Ditambahkan');
}
            public function edit($id)
        {
            $data = peminjam::find($id);
            $datapeminjam = tambahbuku::all();
            return view('peminjam.edit', compact('datapeminjam','data'));
        }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_peminjam' => 'required',
            'id_tambahbuku' => 'required',
            'kode_buku' => 'required',
            'tanggal_pinjam' => 'required',
            'tenggat' => 'required'



        ], [
            'nama_peminjam.required' => 'Nama Peminjam harus diisi',
            'id_tambahbuku.required' => 'Nama Buku harus diisi',
            'kode_buku.required' => 'kode_buku harus diisi',
            'tanggal_pinjam.required' => 'tanggal_pinjam harus diisi',
            'tenggat.required' => 'tenggat harus diisi'


        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $datapeminjam = peminjam::find($id);

        // Update data lainnya
        $datapeminjam->nama_peminjam = $request->input('nama_peminjam');
        $datapeminjam->id_tambahbuku = $request->input('id_tambahbuku');
        $datapeminjam->kode_buku = $request->input('kode_buku');
        $datapeminjam->tanggal_pinjam = $request->input('tanggal_pinjam');
        $datapeminjam->tenggat = $request->input('tenggat');



        $datapeminjam->save();

        return redirect()->route('peminjam.index')->with('success', 'Data penerbit berhasil diupdate.');
    }
    public function show($id)
    {

        $datapeminjam = peminjam::find($id);
        return view('peminjam.edit', compact('datapeminjam' , 'tambahbuku'));
    }



    public function destroy($id)
    {

        $datapeminjam = tambahbuku::where('id', $id)->firstOrFail();
        // if (peminjam::where('id_tambahbuku', $id)->exists()) {
        //     return redirect()->route('peminjam.index')->with('error', "Data" . $datapeminjam->nama_buku . " Masih di gunakan di tabel tambah buku!" );
        // }

        $datapeminjam = peminjam::find($id);
        $datapeminjam->delete();
        return redirect()->route('peminjam.index')->with('success', 'Data Berhasil Di Delete');
    }

}




<?php

namespace App\Http\Controllers;

use App\Models\peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PeminjamController extends Controller
{
    public function index()
    {
        $data = peminjam::all();
        return view('peminjam.index', compact('data'));
    }

    public function create()
    {
        return view('peminjam.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_peminjam' => 'required',
            'nama_buku' => 'required',
            'kode_buku' => 'required',
            'tanggal_pinjam' => 'required',
            'tenggat' => 'required'



        ], [
            'nama_peminjam.required' => 'Nama Penulis harus diisi',
            'nama_buku.required' => 'Nama Penerbit harus diisi',
            'kode_buku.required' => 'kode_buku harus diisi',
            'tanggal_pinjam.required' => 'tanggal_pinjam harus diisi',
            'tenggat.required' => 'tenggat harus diisi'


        ]);



        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new peminjam();
        $data->nama_peminjam = $request->input('nama_peminjam');
        $data->nama_buku = $request->input('nama_buku');
        $data->kode_buku = $request->input('kode_buku');
        $data->tanggal_pinjam = $request->input('tanggal_pinjam');
        $data->tenggat = $request->input('tenggat');

        $data->save();

        return redirect()->route('peminjam.index')->with('success', 'Data Berhasil Ditambahkan');
    }
            public function edit($id)
        {
            $data = peminjam::find($id);
            return view('peminjam.edit', compact('data'));
        }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_peminjam' => 'required',
            'nama_buku' => 'required',
            'kode_buku' => 'required',
            'tanggal_pinjam' => 'required',
            'tenggat' => 'required'



        ], [
            'nama_peminjam.required' => 'Nama Penulis harus diisi',
            'nama_buku.required' => 'Nama Penerbit harus diisi',
            'kode_buku.required' => 'kode_buku harus diisi',
            'tanggal_pinjam.required' => 'tanggal_pinjam harus diisi',
            'tenggat.required' => 'tenggat harus diisi'


        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = peminjam::find($id);

        // Update data lainnya
        $data->nama_peminjam = $request->input('nama_peminjam');
        $data->nama_buku = $request->input('nama_buku');
        $data->kode_buku = $request->input('kode_buku');
        $data->tanggal_pinjam = $request->input('tanggal_pinjam');
        $data->tenggat = $request->input('tenggat');



        $data->save();

        return redirect()->route('peminjam.index')->with('success', 'Data penerbit berhasil diupdate.');
    }
    public function show($id)
    {
        $data = peminjam::find($id);
        return view('peminjam.edit', compact('data'));
    }



    public function destroy($id)
    {
        $data = peminjam::find($id);
        $data->delete();
        return redirect()->route('peminjam.index')->with('success', 'Data Berhasil Di Delete');
    }

}




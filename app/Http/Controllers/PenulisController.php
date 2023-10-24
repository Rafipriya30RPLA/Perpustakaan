<?php

namespace App\Http\Controllers;

use App\Models\penerbit;
use App\Models\tambahbuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\penulis;

class PenulisController extends Controller
{
    public function index()
    {
        $datapenerbit = penerbit::all();
        $datapenulis = penulis::all();
        return view('penulis.index', compact('datapenulis','datapenerbit'))-> with('row');
    }

    public function create()
    {
        $datapenerbit = penerbit::all();
        $datapenulis = penulis::all();
        return view('penulis.create', compact('datapenulis','datapenerbit'))->with('row');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_penulis' => 'required|max:225',
            'id_penerbit' => 'required'


        ], [
            'nama_penulis.required' => 'Nama Penulis harus diisi',
            'nama_penulis.max' => 'Nama Penulis Maksimal 225 Karakter',
            'id_penerbit.required' => 'Nama Penerbit harus diisi'
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $datapenulis = new penulis();
        $datapenulis->nama_penulis = $request->input('nama_penulis');
        $datapenulis->id_penerbit = $request->input('id_penerbit');

        $datapenulis->save();

        return redirect()->route('penulis.index')->with('success', 'Data Berhasil Di Tambahkan');
    }
            public function edit($id)
        {
            $data = penulis::find($id);
            $datapenulis = penerbit::all();
            return view('penulis.edit', compact('datapenulis','data'));
        }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_penulis' => 'required|max:225',
            'id_penerbit' => 'required'

        ], [
            'nama_penulis.required' => ' Nama Penulis harus diisi',
            'nama_penulis.max' =>  'Nama Penulis Maksimal 225 Karakter',
            'id_penerbit.required' => 'Nama Penerbit harus diisi'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $datapenulis = penulis::find($id);

        // Update data lainnya
        $datapenulis->nama_penulis = $request->input('nama_penulis');
        $datapenulis->id_penerbit = $request->input('id_penerbit');



        $datapenulis->save();


        return redirect()->route('penulis.index')->with('success', 'Data Penerbit Berhasil Di Perbarui.');

    }
    public function show($id)
    {
        $datapenulis = penulis::find($id);
        return view('penulis.edit', compact('datapenulis','penerbit'));
    }



    public function destroy($id)
    {
        $tambahbuku = penulis::where('id', $id)->firstOrFail();
        if (tambahbuku::where('id_penulis', $id)->exists()) {
            return redirect()->route('penulis.index')->with('error', "Data" . $tambahbuku->nama_penulis . " Masih Di Gunakan Di Tabel Tambah Buku!" );
        }

        $datapenulis = penulis::find($id);
        $datapenulis->delete();
        return redirect()->route('penulis.index')->with('success', 'Data Berhasil Di Hapus');
    }

}



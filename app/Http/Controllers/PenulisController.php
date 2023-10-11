<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\penulis;

class PenulisController extends Controller
{
    public function index()
    {
        $data = penulis::all();
        return view('penulis.index', compact('data'));
    }

    public function create()
    {
        return view('penulis.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_penulis' => 'required',
            'nama_penerbit' => 'required'



        ], [
            'nama_penulis.required' => 'Nama Penulis harus diisi',
            'nama_penerbit.required' => 'Nama Penerbit harus diisi'


        ]);



        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new penulis();
        $data->nama_penulis = $request->input('nama_penulis');
        $data->nama_penerbit = $request->input('nama_penerbit');

        $data->save();

        return redirect()->route('penulis.index')->with('success', 'Data Berhasil Ditambahkan');
    }
            public function edit($id)
        {
            $data = penulis::find($id);
            return view('penulis.edit', compact('data'));
        }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_penulis' => 'required',
            'nama_penerbit' => 'required'

        ], [
            'nama_penulis.required' => ' Nama Penulis harus diisi',
            'nama_penerbit.required' => 'Nama Penerbit harus diisi'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = penulis::find($id);

        // Update data lainnya
        $data->nama_penulis = $request->input('nama_penulis');
        $data->nama_penerbit = $request->input('nama_penerbit');



        $data->save();

        return redirect()->route('penulis.index')->with('success', 'Data penerbit berhasil diupdate.');
    }
    public function show($id)
    {
        $data = penulis::find($id);
        return view('penulis.edit', compact('data'));
    }



    public function destroy($id)
    {
        $data = penulis::find($id);
        $data->delete();
        return redirect()->route('penulis.index')->with('success', 'Data Berhasil Di Delete');
    }

}



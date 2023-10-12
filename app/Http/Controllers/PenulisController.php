<?php

namespace App\Http\Controllers;

use App\Models\penerbit;
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
            'nama_penulis' => 'required',
            'penerbit_id' => 'required'



        ], [
            'nama_penulis.required' => 'Nama Penulis harus diisi',
            'penerbit_id.required' => 'Nama Penerbit harus diisi'
        ]);



        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $datapenulis = new penulis();
        $datapenulis->nama_penulis = $request->input('nama_penulis');
        $datapenulis->id_penerbit = $request->input('penerbit_id');

        $datapenulis->save();

        return redirect()->route('penulis.index')->with('success', 'Data Berhasil Ditambahkan');
    }
            public function edit($id)
        {
            $datapenulis = penulis::find($id);
            return view('penulis.edit', compact('datapenulis'));
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

        $datapenulis = penulis::find($id);

        // Update data lainnya
        $datapenulis->nama_penulis = $request->input('nama_penulis');
        $datapenulis->nama_penerbit = $request->input('nama_penerbit');



        $datapenulis->save();

        return redirect()->route('penulis.index')->with('success', 'Data penerbit berhasil diupdate.');
    }
    public function show($id)
    {
        $datapenulis = penulis::find($id);
        return view('penulis.edit', compact('datapenulis','penerbit'));
    }



    public function destroy($id)
    {
        $datapenulis = penulis::find($id);
        $datapenulis->delete();
        return redirect()->route('penulis.index')->with('success', 'Data Berhasil Di Delete');
    }

}



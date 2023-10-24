<?php

namespace App\Http\Controllers;

use App\Models\penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\penulis;

class PenerbitController extends Controller
{

    public function index()
    {
        $data = penerbit::all();
        return view('penerbit.index', compact('data'));
    }

    public function create()
    {
        return view('penerbit.create');
    }

    public function shop()
    {
        return view('shop');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_penerbit' => 'required',
            'no_telepon' => 'required|min:12|gt:-0',
            'alamat' => 'required|max:255',

        ], [
            'nama_penerbit.required' => 'Nama Penerbit harus diisi',
            'no_telepon.required' => 'No Telepon harus diisi',
            'no_telepon.numeric' => 'No Telepon Harus berupa angka',
            'no_telepon.digits' => 'No Telepon Harus Memiliki 12 karakter',
            'no_telepon.gt' => 'No Telepon Tidak Boleh min',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.max' => 'Alamat tidak boleh lebih dari 255 karakter',

        ]);



        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new penerbit();
        $data->nama_penerbit = $request->input('nama_penerbit');
        $data->no_telepon = $request->input('no_telepon');
        $data->alamat = $request->input('alamat');

        $data->save();

        return redirect()->route('penerbit.index')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function edit($id)
{
    $data = penerbit::find($id);
    return view('penerbit.edit', compact('data'));
}
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_penerbit' => 'required',
            'no_telepon'=>'required|min:12|gt:-0',
            'alamat' => 'required|max:255'

        ], [
            'nama_penerbit.required' => 'Nama Penerbit harus diisi',
            'no_telepon.required' => 'No Telepon harus diisi',
            'no_telepon.min' => 'No Telepon Minimal 12 digit',
            'no_telepon.gt' => 'No Telepon tidak boleh minus',
            'alamat.required' => ' alamat harus diisi',
            'alamat.max' => 'Alamat tidak boleh lebih dari 225 karakter'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = penerbit::find($id);

        // Update data lainnya
        $data->nama_penerbit = $request->input('nama_penerbit');
        $data->no_telepon = $request->input('no_telepon');
        $data->alamat = $request->input('alamat');


        $data->save();



        return redirect()->route('penerbit.index')->with('success', 'Data Penerbit Berhasil Di Perbarui.');

    }
    public function show($id)
    {
        $data = penerbit::find($id);
        return view('penerbit.edit', compact('data'));
    }



    public function destroy($id)
    {
        $penulis = penerbit::where('id', $id)->firstOrFail();
        if (penulis::where('id_penerbit', $id)->exists()) {
            return redirect()->route('penerbit.index')->with('error', "Data " . $penulis->nama_penerbit . " Masih Di Gunakan Di Tabel Penulis!" );
        }

        $data = penerbit::find($id);
        $data->delete();
        return redirect()->route('penerbit.index')->with('success', 'Data Berhasil Di Hapus');
    }

}

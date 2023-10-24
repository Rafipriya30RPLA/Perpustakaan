<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class KaryawanController extends Controller
{
    public function index()
    {
        $data = karyawan::all();
        return view('karyawan.index', compact('data'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:225',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'required|min:12|gt:-0',
            'alamat' => 'required|max:5000'


        ], [
            'nama.required' => 'Nama Peminjam harus diisi',
            'nama.max' => 'Nama Peminjam Tidak Boleh Diatas 225 Karakter',
            'jenis_kelamin.required' => 'Jenis Kelamin harus di isi',
            'no_telepon.required' => 'Nomer Telpon harus di isi',
            'no_telepon.min' => 'No Telepon Minimal 12 digit',
            'no_telepon.gt' => 'No Telepon tidak boleh minus',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.max' => 'Alamat tidak boleh lebih dari 5000 karakter'

        ]);



        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new karyawan();
        $data->nama = $request->input('nama');
        $data->jenis_kelamin = $request->input('jenis_kelamin');
        $data->no_telepon = $request->input('no_telepon');
        $data->alamat = $request->input('alamat');

        $data->save();

        return redirect()->route('karyawan.index')->with('success', 'Data Berhasil Di Tambahkan');
    }
            public function edit($id)
        {
            $data = karyawan::find($id);
            return view('karyawan.edit', compact('data'));
        }
    public function update(Request $request, $id)
    {
    //    dd($request);
    $validator = Validator::make($request->all(), [
        'nama' => 'required|max:225',
        'jenis_kelamin' => 'required',
        'no_telepon' => 'required|min:12|gt:-0',
        'alamat' => 'required|max:5000'


    ], [
        'nama.required' => 'Nama Peminjam harus diisi',
        'nama.max' => 'Nama Peminjam Tidak Boleh Diatas 225 Karakter',
        'jenis_kelamin.required' => 'Jenis Kelamin harus di isi',
        'no_telepon.required' => 'Nomer Telpon harus di isi',
        'no_telepon.min' => 'No Telepon Minimal 12 digit',
        'no_telepon.gt' => 'No Telepon tidak boleh minus',
        'alamat.required' => 'Alamat harus diisi',
        'alamat.max' => 'Alamat tidak boleh lebih dari 5000 karakter'


    ]);




        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = karyawan::find($id);
        $data->nama = $request->input('nama');
        $data->jenis_kelamin = $request->input('jenis_kelamin');
        $data->no_telepon = $request->input('no_telepon');
        $data->alamat = $request->input('alamat');

        $data->save();
        return redirect()->route('karyawan.index')->with('success', 'Data Karyawan Berhasil Di Perbarui.');

    }
    public function show($id)
    {
        $data = karyawan::find($id);
        return view('karyawan.edit', compact('data'));
    }



    public function destroy($id)
    {
        $data = karyawan::find($id);
        $data->delete();
        return redirect()->route('karyawan.index')->with('success', 'Data Berhasil Di Hapus');
    }
}

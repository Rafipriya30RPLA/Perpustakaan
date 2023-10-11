<?php

namespace App\Http\Controllers;


use App\Models\tambahbuku;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoretambahbukuRequest;
use App\Http\Requests\UpdatetambahbukuRequest;

class TambahbukuController extends Controller
{
    public function index()
    {
        $data = tambahbuku::all();
        return view('tambahbuku.index', compact('data'));
    }

    public function create()
    {
        return view('tambahbuku.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_buku' => 'required',
            'deskripsi' => 'required',
            'kode_buku' => 'required|unique:tambahbukus,kode_buku|gt:-0',
            'nama_penulis' => 'required',
            'nama_penerbit' => 'required',
            'tanggal_terbit' => 'required',
            'foto' => 'image|mimes:jpeg,png,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
        ], [
            'nama_buku.required' => 'Nama harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'kode_buku.unique' => 'Kode Buku Telah digunakan',
            'kode_buku.gt' => 'Kode Buku tidak boleh minus',
            'nama_penulis.required' => 'Nama Penulis harus diisi',
            'nama_penerbit.required' => 'Nama Penerbit harus diisi',
            'nama_penerbit.required' => 'Nama Penerbit harus diisi',
            'tanggal_terbit.required' => 'Tanggal Terbit harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'File harus berformat jpeg, png, atau gif',
            'foto.max' => 'File gambar tidak boleh lebih dari 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new tambahbuku();
        $data->nama_buku = $request->input('nama_buku');
        $data->deskripsi = $request->input('deskripsi');
        $data->kode_buku = $request->input('kode_buku');
        $data->nama_penulis = $request->input('nama_penulis');
        $data->nama_penerbit = $request->input('nama_penerbit');
        $data->tanggal_terbit = $request->input('tanggal_terbit');
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension(); // Menggunakan Str::random() untuk nama random
            Storage::disk('public')->putFileAs('tambahbuku', $file, $fileName);
            $data->foto = $fileName;
        }

        $data->save();

        return redirect()->route('tambahbuku.index')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit($id)
{
    $data = tambahbuku::find($id);
    return view('tambahbuku.edit', compact('data'));
}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'nama_buku' => 'required',
            'deskripsi' => 'required',
            'kode_buku' => 'required|gt:-0',
            'nama_penulis' => 'required',
            'nama_penerbit' => 'required',
            'tanggal_terbit' => 'required',
            'foto' => 'image|mimes:jpeg,png,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
        ], [
            'nama_buku.required' => 'Nama harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'kode_buku.unique' => 'Kode Buku Telah digunakan',
            'kode_buku.gt' => 'Kode Buku tidak boleh minus',
            'nama_penulis.required' => 'Nama Penulis harus diisi',
            'nama_penerbit.required' => 'Nama Penerbit harus diisi',
            'nama_penerbit.required' => 'Nama Penerbit harus diisi',
            'tanggal_terbit.required' => 'Tanggal Terbit harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'File harus berformat jpeg, png, atau gif',
            'foto.max' => 'File gambar tidak boleh lebih dari 2MB',
        ]);
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $data = tambahbuku::find($id);

    // Update data lainnya
    $data->nama_buku = $request->input('nama_buku');
    $data->deskripsi = $request->input('deskripsi');
    $data->kode_buku = $request->input('kode_buku');
    $data->nama_penulis = $request->input('nama_penulis');
    $data->nama_penerbit = $request->input('nama_penerbit');
    $data->tanggal_terbit = $request->input('tanggal_terbit');
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($data->foto) {
            Storage::disk('public')->delete('tambahbuku/' . $data->foto);
        }

        // Upload foto yang baru
        $file = $request->file('foto');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('tambahbuku', $file, $fileName);
        $data->foto = $fileName;
    }

    $data->save();

    return redirect()->route('tambahbuku.index')->with('success', 'Data daftar berhasil diupdate.');
}
    public function show($id)
    {
        $data = tambahbuku::find($id);
        return view('tambahbuku.edit', compact('data'));
    }


    public function destroy($id)
    {
        $tambahbuku = Tambahbuku::find($id);

        // Periksa apakah data masih digunakan dalam tabel Pinjam


        // Jika tidak digunakan dalam transaksi peminjaman, hapus data
        if ($tambahbuku->foto) {
            Storage::disk('public')->delete('fotodaftar/' . $tambahbuku->foto);
        }
        $tambahbuku->delete();

        return redirect()->route('tambahbuku.index')->with('success', 'Data buku berhasil dihapus.');
    }
}

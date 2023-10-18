<?php

namespace App\Http\Controllers;


use App\Models\penulis;
use App\Models\Komentar;
use App\Models\tambahbuku;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TambahbukuController extends Controller
{
    public function index()
    {
        $datapenulis = penulis::all();
        $datatambahbuku = tambahbuku::all();
        return view('tambahbuku.index', compact('datatambahbuku','datapenulis'))-> with('row');
    }

    public function create()
    {
        $datapenulis = penulis::all();
        $datatambahbuku = tambahbuku::all();
        return view('tambahbuku.create', compact('datatambahbuku','datapenulis'))-> with('row');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_buku' => 'required',
            'deskripsi' => 'required',
            'kode_buku' => 'required|unique:tambahbukus,kode_buku|gt:-0',
            'stok' => 'required|gt:-0',
            'id_penulis' => 'required',
            'tanggal_terbit' => 'required|date|after_or_equal:'.now()->format('Y-m-d'),
            'foto' =>  'required|image|mimes:jpeg,png,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
        ], [
            'nama_buku.required' => 'Nama harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'kode_buku.unique' => 'Kode Buku Telah digunakan',
            'kode_buku.gt' => 'Kode Buku tidak boleh minus',
            'stok.required' => 'stok harus di isi',
            'stok.gt' => 'stok tidak boleh minus',
            'id_penulis.required' => 'Nama Penulis harus diisi',
            'tanggal_terbit.required' => 'Tanggal Terbit harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'File harus berformat jpeg, png, atau gif',
            'foto.max' => 'File gambar tidak boleh lebih dari 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $datatambahbuku = new tambahbuku();
        $datatambahbuku->nama_buku = $request->input('nama_buku');
        $datatambahbuku->deskripsi = $request->input('deskripsi');
        $datatambahbuku->kode_buku = $request->input('kode_buku');
        $datatambahbuku->stok = $request->input('stok');
        $datatambahbuku->id_penulis = $request->input('id_penulis');
        $datatambahbuku->tanggal_terbit = $request->input('tanggal_terbit');


        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension(); // Menggunakan Str::random() untuk nama random
            Storage::disk('public')->putFileAs('tambahbuku', $file, $fileName);
            $datatambahbuku->foto = $fileName;
        }

        $datatambahbuku->save();

        return redirect()->route('tambahbuku.index')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit($id)
{
    $data = tambahbuku::find($id);
    $datatambahbuku = penulis::all();
    return view('tambahbuku.edit', compact('datatambahbuku','data'));
}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
           'nama_buku' => 'required',
            'deskripsi' => 'required',
            'kode_buku' => 'required|gt:-0',
            'stok' => 'required|gt:-0',
            'id_penulis' => 'required',
            'tanggal_terbit' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
        ], [
            'nama_buku.required' => 'Nama harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'kode_buku.unique' => 'Kode Buku Telah digunakan',
            'kode_buku.gt' => 'Kode Buku tidak boleh minus',
            'stok.required' => 'stok harus di isi',
            'stok.gt' => 'stok tidak boleh minus',
            'id_penulis.required' => 'Nama Penulis harus diisi',
            'tanggal_terbit.required' => 'Tanggal Terbit harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'File harus berformat jpeg, png, atau gif',
            'foto.max' => 'File gambar tidak boleh lebih dari 2MB',
        ]);
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $datatambahbuku = tambahbuku::find($id);

    // Update data lainnya
    $datatambahbuku->nama_buku = $request->input('nama_buku');
    $datatambahbuku->deskripsi = $request->input('deskripsi');
    $datatambahbuku->kode_buku = $request->input('kode_buku');
    $datatambahbuku->stok = $request->input('stok');
    $datatambahbuku->id_penulis = $request->input('id_penulis');
    $datatambahbuku->tanggal_terbit = $request->input('tanggal_terbit');


    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($datatambahbuku->foto) {
            Storage::disk('public')->delete('tambahbuku/' . $datatambahbuku->foto);
        }

        // Upload foto yang baru
        $file = $request->file('foto');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('tambahbuku', $file, $fileName);
        $datatambahbuku->foto = $fileName;
    }

    $datatambahbuku->save();

    return redirect()->route('tambahbuku.index')->with('success', 'Data daftar berhasil diupdate.');
}
    public function show($id)
    {
        $datatambahbuku = tambahbuku::find($id);
        return view('tambahbuku.edit', compact('data'));
    }


    public function destroy($id)
    {
        $tambahbuku = Tambahbuku::find($id);

        if ($tambahbuku) {
            // Hapus foto jika ada
            if ($tambahbuku->foto) {
                Storage::disk('public')->delete('tambahbuku/' . $tambahbuku->foto);
            }

            // Hapus data buku
            $tambahbuku->delete();

            return redirect()->route('tambahbuku.index')->with('success', 'Data buku berhasil dihapus beserta fotonya.');
        } else {
            return redirect()->route('tambahbuku.index')->with('error', 'Data buku tidak ditemukan.');
        }
    }
    public function daftarbuku(){
        $Buku = tambahbuku::all();
        return view('daftarbuku.index', compact('Buku'));
    }
    public function preview($id){
        $Buku = tambahbuku::findOrFail($id);
        $Komentar = Komentar::where('id_buku', $id)->orderBy('created_at', 'desc')->get();
        return view('daftarbuku.preview', compact('Buku','Komentar'));
    }
    public function postreview(Request $request)
    {
        $request->validate([
            'review' => 'required|max:5000'
        ],[
            'review.required' => 'Woy kosong njir',
            'review.max' => 'Woy kebanyakan cok, max nya 5000',
        ]);

        $Buku = tambahbuku::findOrFail($request->id_buku);

        Komentar::create([
            'id_user' => Auth::id(),
            'id_buku' => $Buku->id,
            'review' => $request->review,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan review pada buku yang bernama ' . $Buku->nama_buku);
    }
}

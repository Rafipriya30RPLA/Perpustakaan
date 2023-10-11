<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\review;

class ReviewController extends Controller
{
    public function index()
    {
        $data = review::all();
        return view('review.index', compact('data'));
    }

    public function create()
    {
        return view('review.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_peminjam' => 'required',
            'review' => 'required'


        ], [
            'nama_peminjam.required' => 'Nama Peminjam harus diisi',
            'review.required' => 'Review harus diisi'

        ]);



        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new review();
        $data->nama_peminjam = $request->input('nama_peminjam');
        $data->review = $request->input('review');

        $data->save();

        return redirect()->route('review.index')->with('success', 'Data Berhasil Ditambahkan');
    }
            public function edit($id)
        {
            $data = review::find($id);
            return view('review.edit', compact('data'));
        }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_peminjam' => 'required',
            'review' => 'required'


        ], [
            'nama_peminjam.required' => 'Nama Peminjam harus diisi',
            'review.required' => 'Review harus diisi'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = review::find($id);

        // Update data lainnya
        $data->nama_peminjam = $request->input('nama_peminjam');
        $data->review = $request->input('review');



        $data->save();

        return redirect()->route('review.index')->with('success', 'Data penerbit berhasil diupdate.');
    }
    public function show($id)
    {
        $data = review::find($id);
        return view('review.edit', compact('data'));
    }



    public function destroy($id)
    {
        $data = review::find($id);
        $data->delete();
        return redirect()->route('review.index')->with('success', 'Data Berhasil Di Delete');
    }
public function index2()
{
    return view('review.index2');
}
}



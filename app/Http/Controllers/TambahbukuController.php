<?php

namespace App\Http\Controllers;

use App\Models\tambahbuku;
use App\Http\Requests\StoretambahbukuRequest;
use App\Http\Requests\UpdatetambahbukuRequest;

class TambahbukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tambahbuku = tambahbuku::all();
        return view('tambahbuku.index',compact('tambahbuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretambahbukuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tambahbuku $tambahbuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tambahbuku $tambahbuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetambahbukuRequest $request, tambahbuku $tambahbuku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tambahbuku $tambahbuku)
    {
        //
    }
}

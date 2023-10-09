<?php

namespace App\Http\Controllers;

use App\Models\penerbit;
use App\Http\Requests\StorepenerbitRequest;
use App\Http\Requests\UpdatepenerbitRequest;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = penerbit::all();
        return view ('penerbit.index',compact('data'));
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
    public function store(StorepenerbitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(penerbit $penerbit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penerbit $penerbit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepenerbitRequest $request, penerbit $penerbit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penerbit $penerbit)
    {
        //
    }
}

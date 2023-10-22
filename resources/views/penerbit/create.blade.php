@extends('nav-side')
@section('sidebar')
@section('header')

@endsection
@endsection

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penerbit</title>
    @section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @endsection
  </head>
  <body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>

<body>
    @section('content')

    <h3 class="text-center mb-5">Tambah data Penerbit</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('penerbit.store') }}"method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Nama Penerbit</label>
                                <input type="text" name="nama_penerbit" value="{{ old('nama_penerbit') }}"
                                    class="form-control @error('nama_penerbit')is-invalid @enderror"  id="">
                            </div>
                            @error('nama_penerbit')
                                <div class="alert alert-danger mt-2">
                                   {{ $message }}
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">No Telepon</label>
                                <input type="number" name="no_telepon"
                                value="{{ old('no_telepon') }}"  min="0" class="form-control @error('no_telepon')is-invalid
                                @enderror"
                                id="">
                            </div>
                            @error('no_telepon')
                                <div class="alert alert-danger mt-2">
                                   {{ $message }}
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Alamat</label>
                                <textarea type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputText">{{ old('alamat') }}</textarea>
                            </div>

                            @error('alamat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                            <a href="{{ route('penerbit.index') }}"  style="margin-left: 10px;" type="button" class="btn btn-outline-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

  </body>
</html>

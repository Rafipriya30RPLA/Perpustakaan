@extends('nav-side')
@section('sidebar')
@section('header')

@endsection
@endsection
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    @section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @endsection
</head>
  <body>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<body>
    @section('content')

    <h3 class="text-center mb-5">Edit Data Peminjam</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">

                        <form action="{{route('peminjam.update',$data->id) }}"method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Nama Peminjam</label>
                                <input type="text" name="nama_peminjam" class="form-control @error('nama_peminjam')is-invalid
                                @enderror" id=""value="{{$data->nama_peminjam}}">
                            </div>
                            @error('nama_peminjam')

                            @enderror

                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Nama Buku</label>
                                <input type="text" name="nama_buku" class="form-control @error('nama_buku')is-invalid
                                @enderror" id=""value="{{$data->nama_buku}}">
                            </div>
                            @error('nama_buku')

                            @enderror

                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Kode Buku</label>
                                <input type="number" name="kode_buku" class="form-control @error('kode_buku')is-invalid
                                @enderror" id=""value="{{$data->kode_buku}}">
                            </div>
                            @error('kode_buku')

                            @enderror

                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Tanggal Pinjam</label>
                                <input type="date" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam')is-invalid
                                @enderror" id=""value="{{$data->tanggal_pinjam}}">
                            </div>
                            @error('tanggal_pinjam')

                            @enderror

                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Tenggat</label>
                                <input type="date" name="tenggat" class="form-control @error('tenggat')is-invalid
                                @enderror" id=""value="{{$data->tenggat}}">
                            </div>
                            @error('tenggat')

                            @enderror
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                            <a href="{{route('peminjam.index')}}"style="margin-left: 10px;" type="button" class="btn btn-outline-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
            @endsection
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

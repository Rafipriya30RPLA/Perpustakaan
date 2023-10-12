@extends('nav-side')
@section('header')
@section('sidebar')
@endsection
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>

<body>
@section('content')
    <h3 class="text-center mb-5">Tambah data Penulis</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('penulis.store') }}"method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Nama Penulis</label>
                                <input type="text" name="nama_penulis" value="{{ old('nama_penulis') }}" class="form-control @error('nama_penulis')is-invalid  @enderror"id="">
                            </div>
                            @error('nama_penulis')
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: '{{ $message }}',
                                    })
                                </script>
                            @enderror

                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Nama Penerbit</label>
                                <select name="id_penerbit" id="" class="form-select">
                                    <option value=""disabled selected>Pilih Nama Penerbit</option>
                                    @foreach ($datapenerbit as $penerbit)
                                        <option value="{{ $penerbit->id }}">{{ $penerbit->nama_penerbit }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('id_penerbit')
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: '{{ $message }}',
                                    })
                                </script>
                            @enderror
                            <div class="mb-3">
                                <button type="submit" class="btn btn-outline-info">Simpan</button>
                            <a href="{{ route('penulis.index') }}"  style="margin-left: 10px;" class="btn btn-outline-secondary">Kembali</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

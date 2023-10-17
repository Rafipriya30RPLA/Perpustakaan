@extends('nav-side-admin')
@section('sidebar')
@section('header')

@endsection
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>
<body>
    @section('content')

    <h3 class="text-center mb-5">Tambah data Peminjam</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">

                        <form action="{{route('peminjam.store')}}"method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Nama Peminjam</label>
                                <input type="text" name="nama_peminjam" value="{{old('nama_peminjam')}}" class="form-control @error('nama_peminjam')is-invalid
                                @enderror" id="">
                            </div>
                            @error('nama_peminjam')
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: '{{$message}}',
                                })
                                </script>
                      @enderror
                      <div class="mb-3">
                          <label for="exampleInputText" class="form-label">Nama Buku</label>
                          <input type="text" name="nama_buku" value="{{old('nama_buku')}}" class="form-control @error('nama_buku')is-invalid
                          @enderror" id="">
                        </div>
                        @error('nama_buku')
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{$message}}',
                            })
                            </script>
                      @enderror
                      <div class="mb-3">
                          <label for="exampleInputText" class="form-label">Kode Buku</label>
                          <input type="number" name="kode_buku"  value="{{old('kode_buku')}}"class="form-control @error('kode_buku')is-invalid
                          @enderror" id="">
                        </div>
                        @error('kode_buku')
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{$message}}',
                            })
                            </script>
                      @enderror
                      <div class="mb-3">
                          <label for="exampleInputText" class="form-label">Tanggal Pinjam</label>
                          <input type="date" name="tanggal_pinjam"  value="{{old('tanggal_pinjam')}}"class="form-control @error('tanggal_pinjam')is-invalid
                          @enderror" id="">
                        </div>
                        @error('tanggal_pinjam')
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{$message}}',
                            })
                            </script>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputText" class="form-label">Tenggat</label>
                        <input type="date" name="tenggat" value="{{old('tenggat')}}"class="form-control @error('tenggat')is-invalid
                        @enderror" id="">
                    </div>
                    @error('tenggat')
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '{{$message}}',
                        })
                        </script>
                    @enderror

                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    <a href="{{route('penerbit.index')}}" style="margin-left: 10px;" type="button" class="btn btn-outline-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection


@extends('nav-side')
@section('sidebar')
@section('header')

@endsection
@endsection

<!doctype html>
<html lang="en">
  <head>

    @section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @endsection
  </head>
  <body>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>
  <body>
    @section('content')

    <h3 class="text-center mb-5">Tambah data Buku</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">

                        <form action="{{route('tambahbuku.store')}}"method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Nama Buku</label>
                                <input type="text" name="nama_buku"  value="{{old('nama_buku')}}"class="form-control @error('nama_buku')is-invalid
                                @enderror" id="">
                            </div>
                            @error('nama_buku')
                                <div class="alert alert-danger mt-2">
                                   {{ $message }}
                                </div>
                          @enderror
                          <div class="mb-3">
                              <label for="exampleInputText" class="form-label" >Kode Buku</label>
                              <input type="number"name="kode_buku" value="{{old('kode_buku')}}" class="form-control" id="">
                            </div>
                            @error('kode_buku')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                          @enderror
                          <div class="mb-3">
                            <label for="exampleInputText" class="form-label" >Stok</label>
                            <input type="number"name="stok" value="{{old('stok')}}" class="form-control" id="">
                          </div>
                          @error('stok')
                            <div class="alert alert-danger mt-2">
                               {{ $message }}
                           </div>
                        @enderror
                          <div class="mb-3">
                              <label for="exampleInputText" class="form-label">Nama penulis</label>
                              <select name="id_penulis" id="" class="form-select">
                                <option value=""disabled selected>Pilih Nama Penulis</option>
                                @foreach ($datapenulis as $penulis)
                                    <option value="{{ $penulis->id }}">{{ $penulis->nama_penulis }}</option>
                                @endforeach
                            </select>
                            </div>
                            @error('id_penulis')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                          @enderror
                          <div class="mb-3">
                              <label for="exampleInputText" class="form-label">Tanggal Terbit</label>
                              <input type="date" name="tanggal_terbit" value="{{old('tanggal_terbit')}}" class="form-control @error('tanggal_terbit')is-invalid
                              @enderror" id="">
                            </div>
                            @error('tanggal_terbit')
                                <div class="alert alert-danger mt-2">
                                   {{ $message }}
                                </div>
                          @enderror
                          <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" id="exampleInputText">{{ old('deskripsi') }}</textarea>
                        </div>

                          @error('deskripsi')
                            <div class="alert alert-danger mt-2">
                               {{ $message }}
                            </div>
                        @enderror
                          <div class="mb-3">
                              <label for="exampleInputText" class="form-label" >Masukkan Foto</label>
                              <input type="file"name="foto" value="{{old('foto')}}" class="form-control" id="">
                            </div>
                            @error('foto')
                                <div class="alert alert-danger mt-2">
                                   {{ $message }}
                                </div>
                          @enderror
                          <button type="submit" class="btn btn-outline-primary">Simpan</button>
                          <a href="{{route('tambahbuku.index')}}" style="margin-left: 10px;" type="button" class="btn btn-outline-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

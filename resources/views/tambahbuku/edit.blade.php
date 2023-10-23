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
    <title>List Buku</title>
    @section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @endsection
  </head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>
  <body>
    @section('content')

    <h3 class="text-center mb-5">Edit Data Buku</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">

                        <form action="{{route('tambahbuku.update',$data->id) }}"method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Nama Buku</label>
                                <input type="text" name="nama_buku" class="form-control @error('nama_buku')is-invalid
                                @enderror" id=""value="{{$data->nama_buku}}">
                            </div>
                            @error('nama_buku')
                                <div class="alert alert-danger mt-2">
                                   {{ $message }}
                                </div>
                          @enderror
                          <div class="mb-3">
                              <label for="exampleInputText" class="form-label" >Kode Buku</label>
                              <input type="number"name="kode_buku"value="{{$data->kode_buku}}" class="form-control @error('kode_buku')is-invalid
                              @enderror" id="">
                            </div>
                            @error('kode_buku')
                                <div class="alert alert-danger mt-2">
                                   {{ $message }}
                                </div>
                          @enderror
                          <div class="mb-3">
                            <label for="exampleInputText" class="form-label" >Stok</label>
                            <input type="number"name="stok"value="{{$data->stok}}" class="form-control @error('stok')is-invalid
                            @enderror" id="">
                          </div>
                          @error('stok')
                            <div class="alert alert-danger mt-2">
                               {{ $message }}
                            </div>
                        @enderror
                          <div class="mb-3">
                              <label for="exampleInputText" class="form-label">Nama Penulis</label>
                              <select name="id_penulis" id="id_penulis" class="form-select">
                                <option value="" disabled>Pilih Nama Penulis</option>
                                @foreach ($datatambahbuku as $tambahbuku)
                                    <option value="{{ $tambahbuku->id }}" {{ $tambahbuku->id == $data->id_penulis ? 'selected' : '' }}>
                                        {{ $tambahbuku->nama_penulis }}
                                    </option>
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
                              <input type="date" name="tanggal_terbit" class="form-control @error('tanggal_terbit')is-invalid
                              @enderror" id=""value="{{$data->tanggal_terbit}}">
                            </div>
                            @error('tanggal_terbit')
                                <div class="alert alert-danger mt-2">
                                   {{ $message }}
                                </div>
                          @enderror
                          <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="exampleInputText" rows="5">{{ $data->deskripsi }}</textarea>
                        </div>
                          @error('deskripsi')
                            <div class="alert alert-danger mt-2">
                               {{ $message }}
                           </div>
                        @enderror
                          <div class="mb-3">
                              <label for="exampleInputText" class="form-label">Masukkan Foto</label>
                              <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="inputFoto">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label"> </label>
                                @if($data->foto)
                                <img src="{{ asset('storage/tambahbuku/'.$data->foto) }}" alt="Foto Lama" width="150" id="previewFoto">
                                @else
                                <p>Tidak ada foto lama.</p>
                                @endif
                            </div>

                            <!-- Input hidden untuk menyimpan nama foto baru -->
                            <input type="hidden" name="foto_lama" value="{{ $data->foto }}">

                            <script>
                                // JavaScript untuk memantau perubahan pada input file
                                document.getElementById('inputFoto').addEventListener('change', function (event) {
                                    var input = event.target;
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            // Mengganti tampilan foto dengan foto yang baru dipilih
                                            document.getElementById('previewFoto').src = e.target.result;
                                        };

                                        // Membaca foto yang baru dipilih
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                });
                                </script>
                          @error('foto')
                            <div class="alert alert-danger mt-2">
                              {{ $message }}
                            </div>
                          @enderror

                          <button type="submit" class="btn btn-outline-primary">Simpan</button>
                          <a href="{{route('tambahbuku.index')}}"  style="margin-left: 10px;" type="button" class="btn btn-outline-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>

</html>


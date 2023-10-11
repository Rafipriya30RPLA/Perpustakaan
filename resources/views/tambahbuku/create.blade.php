<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>
  <body>
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
                          <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{$message}}',
                            })
                        </script>
                          @enderror

                          <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi"  value="{{old('deskripsi')}}"class="form-control @error('deskripsi')is-invalid
                            @enderror" id="">
                          </div>
                          @error('deskripsi')
                          <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{$message}}',
                            })
                        </script>
                          @enderror
                          <div class="mb-3">
                            <label for="exampleInputText" class="form-label" >Kode Buku</label>
                            <input type="number"name="kode_buku" value="{{old('kode_buku')}}" class="form-control" id="">
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
                            <label for="exampleInputText" class="form-label">Nama penulis</label>
                            <input type="text" name="nama_penulis" value="{{old('nama_penulis')}}" class="form-control @error('nama_penulis')is-invalid
                            @enderror" id="">
                          </div>
                          @error('nama_penulis')
                          <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{$message}}',
                            })
                        </script>
                          @enderror
                          <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Nama Penerbit</label>
                            <input type="text" name="nama_penerbit" value="{{old('nama_penerbit')}}" class="form-control @error('nama_penerbit')is-invalid
                            @enderror" id="">
                          </div>
                          @error('nama_penerbit')
                          <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{$message}}',
                            })
                        </script>
                          @enderror
                          <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Tanggal Terbit</label>
                            <input type="date" name="tanggal_terbit" value="{{old('tanggal_terbit')}}" class="form-control @error('tanggal_terbit')is-invalid
                            @enderror" id="">
                          </div>
                          @error('tanggal_terbit')
                          <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{$message}}',
                            })
                        </script>
                          @enderror
                          <div class="mb-3">
                            <label for="exampleInputText" class="form-label" >Masukkan Foto</label>
                            <input type="file"name="foto" value="{{old('foto')}}" class="form-control" id="">
                          </div>
                          @error('foto')
                          <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{$message}}',
                            })
                        </script>
                          @enderror
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('tambahbuku.index')}}" type="button" class="btn btn-secondary">Kembali</a>
                      </form>
                </div>
    </div>
            </div>
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

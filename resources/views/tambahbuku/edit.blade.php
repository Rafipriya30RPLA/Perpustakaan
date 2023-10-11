
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>

  <body>
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
                            <input type="text" name="deskripsi" class="form-control @error('deskripsi')is-invalid
                            @enderror" id=""value="{{$data->deskripsi}}">
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
                            <input type="number"name="kode_buku"value="{{$data->kode_buku}}" class="form-control @error('kode_buku')is-invalid
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
                            <label for="exampleInputText" class="form-label">Nama Penulis</label>
                            <input type="text" name="nama_penulis" class="form-control @error('nama_penulis')is-invalid
                            @enderror" id=""value="{{$data->nama_penulis}}">
                          </div>
                          @error('namapenerbit')
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
                            <input type="text" name="nama_penerbit" class="form-control @error('nama_penerbit')is-invalid
                            @enderror" id=""value="{{$data->nama_penerbit}}">
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
                            <input type="text" name="tanggal_terbit" class="form-control @error('tanggal_terbit')is-invalid
                            @enderror" id=""value="{{$data->tanggal_terbit}}">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>

</html>

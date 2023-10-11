
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>
<body>
<h3 class="text-center mb-5">Tambah data Review</h3>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
    <div class="card">
        <div class="card-body">

                <form action="{{route('review.store')}}"method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputText" class="form-label">Nama Peminjam</label>
                        <input type="text" name="nama_peminjam" value="{{old('nama_peminjam"')}}" class="form-control @error('nama_peminjam"')is-invalid
                        @enderror" id="">
                    </div>
                    @error('nama_peminjam"')
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '{{$message}}',
                        })
                        </script>
                      @enderror

                    <div class="mb-3">
                        <label for="exampleInputText" class="form-label">Review</label>
                        <input type="text" name="review" value="{{old('review')}}" class="form-control @error('review')is-invalid
                        @enderror" id="">
                    </div>
                    @error('review')
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '{{$message}}',
                        })
                        </script>
                      @enderror

                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a href="{{route('review.index')}}" type="button" class="btn btn-secondary">Kembali</a>
                  </form>
            </div>
</div>
        </div>
</div>
</div>
